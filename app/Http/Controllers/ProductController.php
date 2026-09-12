<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\BuyerInfo;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    public function ProductIDSearch(Request $request)
    {
        $productID = $request->input('product_id');

        // Check if the product_code (which is a JSON array) contains the given product_id
        $product = Product::whereJsonContains('product_code', $productID)->first();

        if ($product) {
            return response()->json([
                'status' => 'success',
                'product' => $product
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }
    }




    public function AllProductsDataShow()
    {
        try {
            // Fetch first 30 products regardless of category
            $products = Product::limit(30)->get();

            return response()->json([
                'ProductFrontData' => $products,
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    public function ProductStockOut(Request $request)
    {
        try {
            // Get start_date and end_date from the request
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Query only out-of-stock products (quantity = 0)
            $query = Product::where('quantity', 0);

            // If start_date and end_date are provided, filter by created_at date range
            if (!empty($startDate) && !empty($endDate)) {
                $startDate = Carbon::parse($startDate)->startOfDay();
                $endDate = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }

            // Fetch filtered data
            $ProductData = $query->latest()->get();

            return response()->json(['status' => 'success', 'ProductData' => $ProductData]);

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }




  public function ProductList()
{
    try {
        $ProductData = Product::with(['category', 'subCategory', 'unit'])->get();
        return response()->json(['status' => 'success', 'ProductData' => $ProductData]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

    // public function ProductList()
    // {
    //     try {
    //         $ProductData = Product::select('id', 'img_url', 'product_name', 'cost_price', 'sell_price', 'product_code', 'quantity')->get();
    //         return response()->json(['status' => 'success', 'ProductData' => $ProductData]);
    //     } catch (Exception $e) {
    //         return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    //     }
    // }



    public function ProductCreate(Request $request)
    {
        try {
            $user_id = Auth::id();

            // Decode and extract barcodes from request
            $barcodes = [];
            if (is_array($request->product_code)) {
                $barcodes = array_filter($request->product_code);
            } else if (is_string($request->product_code)) {
                $decoded = json_decode($request->product_code, true);
                if (is_array($decoded)) {
                    $barcodes = array_filter($decoded);
                } else if (!empty(trim($request->product_code))) {
                    $barcodes = [trim($request->product_code)];
                }
            }

            // Check for duplicate barcodes in database
            foreach ($barcodes as $code) {
                $codeStr = trim((string)$code);
                if (empty($codeStr)) continue;

                $existingProduct = Product::whereJsonContains('product_code', $codeStr)->first();
                if ($existingProduct) {
                    return response()->json([
                        'status' => 'fail',
                        'message' => "এই বারকোডটি ({$codeStr}) ইতিমধ্যে \"{$existingProduct->product_name}\" প্রোডাক্টে যুক্ত রয়েছে!"
                    ]);
                }
            }

            // Initialize image paths as null
            $productImgPath = null;

            // Handle product image upload
            if ($request->hasFile('img')) {
                $productImg = $request->file('img');
                $productImgName = time() . '-' . $user_id . '-' . $productImg->getClientOriginalName();
                $productImgPath = "uploads/Product-img/{$productImgName}";
                $productImg->storeAs('uploads/Product-img', $productImgName, 'public');
            }

            $firstBrand = \App\Models\Brand::first();
            if (!$firstBrand) {
                $firstBrand = \App\Models\Brand::create([
                    'name' => 'General',
                    'status' => 'Active',
                    'user_id' => $user_id
                ]);
            }

            $firstCategory = \App\Models\Category::first();
            if (!$firstCategory) {
                $firstCategory = \App\Models\Category::create([
                    'category_name' => 'General',
                    'status' => 'Active',
                    'user_id' => $user_id
                ]);
            }

            $reqBrand = $request->brand_id;
            $brandId = (!empty($reqBrand) && $reqBrand !== 'none' && $reqBrand !== 'disabled' && \App\Models\Brand::where('id', $reqBrand)->exists())
                ? $reqBrand 
                : $firstBrand->id;

            $reqCat = $request->category_id;
            $categoryId = (!empty($reqCat) && $reqCat !== 'none' && $reqCat !== 'disabled' && \App\Models\Category::where('id', $reqCat)->exists())
                ? $reqCat 
                : $firstCategory->id;

            $reqSub = $request->sub_category_id;
            $subCategoryId = (!empty($reqSub) && $reqSub !== 'none' && $reqSub !== 'disabled' && \App\Models\SubCategory::where('id', $reqSub)->exists())
                ? $reqSub 
                : null;

            $reqUnit = $request->unit_id;
            $unitId = (!empty($reqUnit) && $reqUnit !== 'none' && $reqUnit !== 'disabled' && \App\Models\Unit::where('id', $reqUnit)->exists())
                ? $reqUnit 
                : null;

            // Create Product
            $product = Product::create([
                'img_url' => $productImgPath,
                'product_name' => $request->product_name,
                'quantity' => ($request->quantity !== null && $request->quantity !== '') ? $request->quantity : 0,
                'cost_price' => ($request->cost_price !== null && $request->cost_price !== '') ? $request->cost_price : 0,
                'sell_price' => ($request->sell_price !== null && $request->sell_price !== '') ? $request->sell_price : 0,
                'status' => $request->status ?? 'Active',
                'product_code' => is_string($request->product_code) ? $request->product_code : json_encode(array_values($barcodes)),
                'brand_id' => $brandId,
                'category_id' => $categoryId,
                'sub_category_id' => $subCategoryId,
                'unit_id' => $unitId,
                'user_id' => $user_id,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Product Created Successfully', 'product' => $product]);
        } catch (Exception $e) {
            Log::error($e->getMessage()); // Log the error message
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function ProductByID(Request $request)
    {

        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required']);
            $rows = Product::with(['category', 'subCategory', 'unit'])->where('id', $request->input('id'))->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }


    }


public function ProductUpdate(Request $request)
{
    try {
        $user_id = Auth::id();

        // Update Product Info
        $product = Product::findOrFail($request->input('id'));

        $product->product_name = $request->input('product_name');
        $product->quantity = ($request->input('quantity') !== null && $request->input('quantity') !== '') ? $request->input('quantity') : 0;
        $product->cost_price = ($request->input('cost_price') !== null && $request->input('cost_price') !== '') ? $request->input('cost_price') : 0;
        $product->sell_price = ($request->input('sell_price') !== null && $request->input('sell_price') !== '') ? $request->input('sell_price') : 0;
        $product->status = $request->input('status') ?? 'Active';
        $firstBrand = \App\Models\Brand::first();
        if (!$firstBrand) {
            $firstBrand = \App\Models\Brand::create([
                'name' => 'General',
                'status' => 'Active',
                'user_id' => $user_id
            ]);
        }

        $firstCategory = \App\Models\Category::first();
        if (!$firstCategory) {
            $firstCategory = \App\Models\Category::create([
                'category_name' => 'General',
                'status' => 'Active',
                'user_id' => $user_id
            ]);
        }

        $updateBrand = $request->input('brand_id');
        if (!empty($updateBrand) && $updateBrand !== 'none' && $updateBrand !== 'disabled' && \App\Models\Brand::where('id', $updateBrand)->exists()) {
            $product->brand_id = $updateBrand;
        } else if (!$product->brand_id || !\App\Models\Brand::where('id', $product->brand_id)->exists()) {
            $product->brand_id = $firstBrand->id;
        }

        $updateCat = $request->input('category_id');
        if (!empty($updateCat) && $updateCat !== 'none' && $updateCat !== 'disabled' && \App\Models\Category::where('id', $updateCat)->exists()) {
            $product->category_id = $updateCat;
        } else if (!$product->category_id || !\App\Models\Category::where('id', $product->category_id)->exists()) {
            $product->category_id = $firstCategory->id;
        }

        $updateSub = $request->input('sub_category_id');
        if (!empty($updateSub) && $updateSub !== 'none' && $updateSub !== 'disabled' && \App\Models\SubCategory::where('id', $updateSub)->exists()) {
            $product->sub_category_id = $updateSub;
        }

        $updateUnit = $request->input('unit_id');
        if (!empty($updateUnit) && $updateUnit !== 'none' && $updateUnit !== 'disabled' && \App\Models\Unit::where('id', $updateUnit)->exists()) {
            $product->unit_id = $updateUnit;
        }

        // Handle Product Barcodes
        if ($request->has('product_code')) {
            $rawCode = $request->input('product_code');
            $codes = json_decode($rawCode, true);
            if (!is_array($codes)) {
                if (!empty(trim((string)$rawCode))) {
                    $codes = array_map('trim', explode(',', $rawCode));
                } else {
                    $codes = [];
                }
            }
            
            $cleanCodes = [];
            foreach ($codes as $code) {
                $codeStr = trim((string)$code);
                if (empty($codeStr)) continue;

                $existing = Product::whereJsonContains('product_code', $codeStr)
                                   ->where('id', '!=', $product->id)
                                   ->first();
                if ($existing) {
                    return response()->json([
                        'status' => 'fail',
                        'message' => "এই বারকোডটি ({$codeStr}) ইতিমধ্যে \"{$existing->product_name}\" প্রোডাক্টে যুক্ত রয়েছে!"
                    ]);
                }
                $cleanCodes[] = $codeStr;
            }
            $product->product_code = json_encode(array_values(array_unique($cleanCodes)));
        }


        // Handle Product Image Upload
        if ($request->hasFile('img_url')) {
            $img = $request->file('img_url');
            $img_name = time() . '-' . $user_id . '-' . $img->getClientOriginalName();
            $img_url = "uploads/Product-img/{$img_name}";
            $img->storeAs('uploads/Product-img', $img_name, 'public');

            // Remove old image if exists
            if ($product->img_url) {
                $oldPath = preg_replace('/^(\/?storage\/|\/)/', '', $product->img_url);
                \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
            }

            $product->img_url = $img_url;
        }

        $product->save();

        return response()->json(['status' => 'success', 'message' => 'Product updated successfully']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

public function ProductDelete(Request $request)
{
    try {
        // Validate input
        $request->validate([
            'id' => 'required|integer',
        ]);

        $productID = $request->input('id');

        // Check if the product exists
        $product = Product::find($productID);
        if (!$product) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Product not found.'
            ]);
        }

        // Delete associated image file if it exists
        if ($product->img_url) {
            $oldPath = preg_replace('/^(\/?storage\/|\/)/', '', $product->img_url);
            \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
        }
        // Delete the product record
        $product->delete();

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully.'
        ]);
    } catch (Exception $e) {
        // Log the error for debugging
        Log::error('Product Delete Error: ' . $e->getMessage());

        // Return failure response
        return response()->json([
            'status' => 'fail',
            'message' => 'An error occurred while deleting the product.'
        ]);
    }
}

public function UnitList()
{
    try {
        $units = Unit::all();
        return response()->json(['status' => 'success', 'units' => $units]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}
}
