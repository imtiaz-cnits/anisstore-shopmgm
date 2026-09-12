<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderPaymentDetails;
use Illuminate\Support\Facades\DB;

DB::beginTransaction();
try {
    // Duplicate order IDs to remove: 2, 3, 4, 6 (duplicates of 1) and 8 (duplicate of 7)
    $deleteOrderIds = [2, 3, 4, 6, 8];

    echo "Deleting duplicate order records with IDs: " . implode(', ', $deleteOrderIds) . "...\n";

    OrderDetails::whereIn('order_id', $deleteOrderIds)->delete();
    OrderPaymentDetails::whereIn('order_id', $deleteOrderIds)->delete();
    Order::whereIn('id', $deleteOrderIds)->delete();

    // Now update remaining order IDs with exact due amounts
    // Order 1 (#InvID00001): Subtotal 946, Discount 6, Net 940, Paid 900, Due 40
    $o1 = Order::find(1);
    if ($o1) {
        $o1->sub_total = 946.00;
        $o1->discount_amount = 6.00;
        $o1->paid_amount = 900.00;
        $o1->due_amount = 40.00;
        $o1->save();

        $pd1 = OrderPaymentDetails::where('order_id', 1)->first();
        if ($pd1) {
            $pd1->paid_amount = 900.00;
            $pd1->payment_status = 'আংশিক';
            $pd1->save();
        }
    }

    // Order 7 (#InvID00002): Subtotal 300, Discount 0, Net 300, Paid 0, Due 300
    $o7 = Order::find(7);
    if ($o7) {
        $o7->sub_total = 300.00;
        $o7->discount_amount = 0.00;
        $o7->paid_amount = 0.00;
        $o7->due_amount = 300.00;
        $o7->save();

        $pd7 = OrderPaymentDetails::where('order_id', 7)->first();
        if ($pd7) {
            $pd7->paid_amount = 0.00;
            $pd7->payment_status = 'বাকী';
            $pd7->save();
        }
    }

    // Order 9 (#InvID00003): Subtotal 840, Discount 0, Net 840, Paid 800, Due 40
    $o9 = Order::find(9);
    if ($o9) {
        $o9->sub_total = 840.00;
        $o9->discount_amount = 0.00;
        $o9->paid_amount = 800.00;
        $o9->due_amount = 40.00;
        $o9->save();

        $pd9 = OrderPaymentDetails::where('order_id', 9)->first();
        if ($pd9) {
            $pd9->paid_amount = 800.00;
            $pd9->payment_status = 'আংশিক';
            $pd9->save();
        }
    }

    // Order 10 (#InvID00004): Subtotal 40, Discount 0, Net 40, Paid 0, Due 40
    $o10 = Order::find(10);
    if ($o10) {
        $o10->sub_total = 40.00;
        $o10->discount_amount = 0.00;
        $o10->paid_amount = 0.00;
        $o10->due_amount = 40.00;
        $o10->save();

        $pd10 = OrderPaymentDetails::where('order_id', 10)->first();
        if ($pd10) {
            $pd10->paid_amount = 0.00;
            $pd10->payment_status = 'বাকী';
            $pd10->save();
        }
    }

    DB::commit();
    echo "\nDuplicates deleted and orders successfully updated!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}
