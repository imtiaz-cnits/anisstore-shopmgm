<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8" />
    <title>Purchase Details - মেসার্স আনিস ষ্টোর</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Bootstrap Css -->
    <link href="{{ asset('back-end/assets/css/vendor/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #eef2f6;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', 'Noto Sans Bengali', 'Segoe UI', Tahoma, sans-serif;
            color: #1e293b;
            font-size: 12px;
        }

        /* Top Purple Navigation Bar (Screen Only) */
        .invoice-top-bar {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);
            color: #ffffff !important;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .invoice-top-bar .back-link {
            color: #ffffff !important;
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.18);
            padding: 6px 14px;
            border-radius: 20px;
            backdrop-filter: blur(4px);
            transition: all 0.2s ease;
            cursor: pointer !important;
            outline: none !important;
            border: none;
            font-family: inherit;
        }

        .invoice-top-bar .back-link:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #ffffff !important;
            transform: translateX(-2px);
        }

        .invoice-top-bar .top-title {
            margin: 0;
            font-weight: 700;
            font-size: 17px;
            color: #ffffff !important;
            letter-spacing: 0.2px;
        }

        .invoice-top-bar .print-top-btn {
            background: rgba(255, 255, 255, 0.18);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff !important;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .invoice-top-bar .print-top-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }

        /* Printable Sheet Paper Container - 10px padding on all 4 sides */
        .invoice-page-container {
            background: #ffffff;
            width: 100%;
            max-width: 210mm;
            min-height: 297mm;
            margin: 15px auto 70px auto;
            padding: 10px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-radius: 4px;
            box-sizing: border-box !important;
            position: relative;
        }

        @media (max-width: 991px) {
            .invoice-page-container {
                width: 96%;
                min-height: auto;
                padding: 10px !important;
                margin: 12px auto 70px auto;
            }
        }

        .store-name {
            font-size: 15px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
        }

        .invoice-main-heading {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            line-height: 1.15;
            white-space: nowrap;
        }

        .center-store-logo {
            max-height: 48px;
            max-width: 110px;
            object-fit: contain;
        }

        @media (max-width: 768px) {
            .invoice-main-heading {
                font-size: 14px !important;
                line-height: 1.2;
            }
            .center-store-logo {
                max-height: 38px !important;
                max-width: 85px !important;
            }
        }

        /* Billed To Box - Transparent, zero border, zero shadow, zero padding, 10px bottom gap */
        .billed-to-box {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin-bottom: 10px !important;
            font-size: 12px;
        }

        /* Meta table (Invoice No & Date) */
        .meta-table {
            border-collapse: collapse !important;
            font-size: 11.5px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
        }
        .meta-table td {
            border: 1px solid #000000 !important;
            padding: 3px 8px;
            font-weight: 600;
            box-sizing: border-box;
        }
        .meta-table .meta-label {
            background-color: #f8fafc;
            color: #1e293b;
            width: 85px;
        }

        /* Classic Purchase Details Table Styling (Bordered Black Style) */
        .invoice_table_list {
            width: 100% !important;
            max-width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 10px !important;
            margin-bottom: 0px !important;
            table-layout: fixed !important;
            box-sizing: border-box !important;
        }

        .invoice_table_list th,
        .invoice_table_list td {
            border: 1px solid #000000 !important;
            padding: 6px 8px;
            font-size: 12px;
            color: #000000;
            box-sizing: border-box !important;
            word-break: break-word;
        }

        .invoice_table_list th {
            background-color: #f1f5f9;
            font-weight: 700;
            text-align: center;
        }

        .invoice_table_list .full-paid {
            font-weight: 800;
            font-size: 15px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap !important;
            box-sizing: border-box;
        }

        .invoice_table_list .amount_text {
            font-weight: 600;
            text-align: right;
            background-color: #ffffff;
            box-sizing: border-box;
        }

        .invoice_table_list .amount {
            font-weight: 700;
            text-align: right;
            background-color: #ffffff;
            box-sizing: border-box;
        }

        .invoice_table_list .footer-powered-cell {
            border: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            padding: 5px 8px !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            color: #334155 !important;
            text-align: left !important;
            background-color: #ffffff !important;
            box-sizing: border-box !important;
        }

        /* Bottom Fixed Action Toolbar */
        .invoice-bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);
            color: #ffffff;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 -4px 15px rgba(0,0,0,0.15);
        }

        .paper-select-dropdown {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            outline: none;
            cursor: pointer;
        }

        .paper-select-dropdown option {
            color: #0f172a;
            background: #ffffff;
        }

        /* Print Specific Styling for A4 Full Width */
        @media print {
            @page {
                size: A4 portrait;
                margin: 6mm 6mm;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                box-sizing: border-box !important;
            }

            html, body {
                background: #ffffff !important;
                padding: 0 !important;
                margin: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
            }

            .no-print, .invoice-top-bar, .invoice-bottom-bar {
                display: none !important;
            }

            .invoice-page-container {
                width: 100% !important;
                max-width: 100% !important;
                min-height: auto !important;
                margin: 0 !important;
                padding: 10px !important;
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
                box-sizing: border-box !important;
            }

            .billed-to-box {
                background: transparent !important;
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                margin-bottom: 10px !important;
            }

            .invoice_table_list {
                width: 100% !important;
                max-width: 100% !important;
                table-layout: fixed !important;
                border-collapse: collapse !important;
                box-sizing: border-box !important;
                margin-top: 10px !important;
            }

            .invoice_table_list th,
            .invoice_table_list td,
            .meta-table td,
            .footer-powered-box {
                border: 1px solid #000000 !important;
                border-color: #000000 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                box-sizing: border-box !important;
            }

            .footer-powered-box {
                width: 100% !important;
                max-width: 100% !important;
                border-top: none !important;
                box-sizing: border-box !important;
            }
        }
    </style>
</head>
<body>

    <!-- 1. Top Purple App Navigation Header (Screen Mode) -->
    <div class="invoice-top-bar no-print">
        <button type="button" onclick="goBackToPreviousPage(event)" class="back-link" title="পেছনে যান">
            <i class="fa-solid fa-arrow-left"></i> <span>পেছনে</span>
        </button>
        <h5 class="top-title">Purchase Details</h5>
        <button type="button" class="print-top-btn" onclick="window.print()" title="প্রিন্ট করুন">
            <i class="fa-solid fa-print fs-6"></i>
        </button>
    </div>

    <!-- 2. Printable Sheet Paper Container (A4 Layout - 10px padding on all 4 sides) -->
    <div class="invoice-page-container" id="printArea">
        
        <!-- Header 3-Column Grid: Billed To (Left), Purchase Details & Logo (Center), Store Info (Right) -->
        <div class="d-flex justify-content-between align-items-start pb-0 mb-0" style="gap: 12px;">
            
            <!-- Left: Billed To / Supplier Info & Metadata -->
            <div style="flex: 1; max-width: 32%;">
                <!-- Billed To Box: Transparent background, zero border, zero padding, 10px bottom gap -->
                <div class="billed-to-box">
                    <div class="fw-bold text-dark fs-6 mb-1">Billed To</div>
                    <div class="fw-bold text-dark">{{ $purchaseinvoicedata->supplier->name ?? 'N/A' }}</div>
                    <div class="text-muted" style="font-size: 11px;">{{ $purchaseinvoicedata->supplier->address ?? 'N/A' }}</div>
                    <div style="font-size: 11px;">Phone: <span class="fw-semibold">{{ $purchaseinvoicedata->supplier->mobile ?? 'N/A' }}</span></div>
                </div>

                <table class="meta-table">
                    <tr>
                        <td class="meta-label">Invoice No:</td>
                        <td>{{ str_starts_with($purchaseinvoicedata->purchase_id, '#') ? $purchaseinvoicedata->purchase_id : '#' . $purchaseinvoicedata->purchase_id }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Invoice Date:</td>
                        <td>{{ \Carbon\Carbon::parse($purchaseinvoicedata->date ?? $purchaseinvoicedata->created_at)->format('d-m-Y') }}</td>
                    </tr>
                    @if(!empty($purchaseinvoicedata->referance_no))
                    <tr>
                        <td class="meta-label">Ref:</td>
                        <td>{{ $purchaseinvoicedata->referance_no }}</td>
                    </tr>
                    @endif
                </table>
            </div>

            <!-- Center: Purchase Details Heading & Logo -->
            <div class="text-center" style="flex: 1; max-width: 34%;">
                <h1 class="invoice-main-heading mb-1.5">Purchase Details</h1>
                <img src="{{ asset('back-end/assets/img/anis-store-logo.png') }}" alt="Anis Store Logo" class="center-store-logo" />
            </div>

            <!-- Right: Store Branding & Contact Details -->
            <div class="text-end" style="flex: 1; max-width: 34%;">
                <div class="store-name fw-extrabold mb-1">মেসার্স আনিস ষ্টোর</div>
                <div class="text-muted" style="font-size: 10px; line-height: 1.35; color: #475569;">
                    বিভিন্ন প্রকার দেশী বিদেশী কসমেটিক, ষ্টেশনারী, ইমিটেশন, ব্রেসিয়ার, পেন্টি, বেল্ট পাইকারী ও খুচরা বিক্রেতা ৷
                </div>
                <div class="text-dark fw-semibold mt-1" style="font-size: 10.5px;">
                    <div>ঝালাইপট্টি, পাবনা ৷</div>
                    <div>মোবাইলঃ ০১৭৯২-৮৩৩৭৪৭, ০১৭১১-৪৫১৩৩৪</div>
                </div>
            </div>
        </div>

        @php
            $calcSubtotal = 0;
            foreach ($purchaseinvoicedata->orderDetails as $od) {
                $q = (float)($od->quantity ?? 1);
                $p = (float)($od->cost_price ?? 0);
                $calcSubtotal += (float)($od->subtotal ?? ($q * $p));
            }
            $finalSubtotal = (float)($subTotal ?? $purchaseinvoicedata->grand_subtotal ?? $calcSubtotal);
            $finalPaid = (float)($paidAmount ?? $purchaseinvoicedata->paid_amount ?? 0);
            $finalDue = (float)($dueAmount ?? $purchaseinvoicedata->due_amount ?? ($finalSubtotal - $finalPaid));
            $finalPrevDue = (float)($PreviousDueAmount ?? 0);
            $finalTotalDue = $finalPrevDue + $finalDue;

            $statusLower = strtolower($statusText);
            if ($finalDue <= 0 || str_contains($statusLower, 'fully') || $statusLower === 'paid' || $statusLower === 'fully paid') {
                $statusText = 'Paid';
                $statusColor = '#16a34a'; // Green
            } elseif ($finalPaid > 0 || str_contains($statusLower, 'partial')) {
                $statusText = 'Partial Paid';
                $statusColor = '#d97706'; // Amber / Orange
            } else {
                $statusText = 'Unpaid';
                $statusColor = '#dc2626'; // Red
            }
        @endphp

        <!-- 3. Classic Purchase Table Section (Bordered 4-Column Design) - Exactly 10px top gap -->
        <table class="invoice_table_list">
            <thead>
                <tr>
                    <th style="width: 16%; text-align: center;">SL. No.</th>
                    <th style="width: 44%; text-align: left;">Product</th>
                    <th style="width: 16%; text-align: center;">Quantity</th>
                    <th style="width: 24%; text-align: right;">Amount</th>
                </tr>
            </thead>
            <tbody id="order_details">
                @foreach ($purchaseinvoicedata->orderDetails as $key => $orderDetail)
                    @php
                        $qty = (float)($orderDetail->quantity ?? 1);
                        $price = (float)($orderDetail->cost_price ?? 0);
                        $lineTotal = (float)($orderDetail->subtotal ?? ($qty * $price));
                    @endphp
                    <tr>
                        <td style="text-align: center;">{{ $key + 1 }}</td>
                        <td style="text-align: left; font-weight: 500;">{{ $orderDetail->product->product_name ?? 'N/A' }}</td>
                        <td style="text-align: center; font-weight: 600;">{{ $qty }}</td>
                        <td style="text-align: right; font-weight: 600;">৳ {{ number_format($price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td rowspan="5" class="full-paid" style="vertical-align: middle; text-align: center; font-weight: 800; font-size: 15px; white-space: nowrap !important; color: {{ $statusColor }} !important;">
                        {{ $statusText }}
                    </td>
                    <td colspan="2" class="amount_text">Sub Total:</td>
                    <td class="amount">৳ {{ number_format($finalSubtotal, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="amount_text">Paid Amount:</td>
                    <td class="amount">৳ {{ number_format($finalPaid, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="amount_text">Due Amount:</td>
                    <td class="amount">৳ {{ number_format($finalDue, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="amount_text">Previous Due Amount:</td>
                    <td class="amount">৳ {{ number_format($finalPrevDue, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="amount_text" style="font-weight: 800;">Total Due Amount:</td>
                    <td class="amount" style="font-weight: 800;">৳ {{ number_format($finalTotalDue, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="footer-powered-cell">
                        Powered by: CodeNext IT - www.codenextit.com
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>

    <!-- 4. Bottom Fixed Action Toolbar (Screen Mode) -->
    <div class="invoice-bottom-bar no-print">
        <button type="button" class="btn text-white p-0 d-flex align-items-center justify-content-center" title="শেয়ার করুন" onclick="navigator.share ? navigator.share({title: 'Purchase Details', url: window.location.href}) : alert('শেয়ার লিংক কপি করা হয়েছে!')" style="width: 38px; height: 38px; background: rgba(255,255,255,0.18); border-radius: 50%; transition: all 0.2s;">
            <i class="fa-solid fa-share-nodes fs-6"></i>
        </button>

        <div class="d-flex align-items-center gap-3">
            <select class="paper-select-dropdown" onchange="changePaperFormat(this.value)">
                <option value="a4" selected>A4 (8.3 × 11.7 in)</option>
                <option value="a5">A5 (5.8 × 8.3 in)</option>
                <option value="pos">80mm POS Thermal</option>
            </select>
            <button type="button" class="btn btn-light btn-sm fw-bold px-3 py-1.5 d-flex align-items-center gap-1.5" onclick="window.print()" style="border-radius: 8px; color: #8C56D4; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                <i class="fa-solid fa-print"></i> <span>প্রিন্ট</span>
            </button>
        </div>
    </div>

    <script>
        function goBackToPreviousPage(event) {
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }
            if (document.referrer && document.referrer.indexOf(window.location.host) !== -1 && document.referrer !== window.location.href) {
                window.location.href = document.referrer;
                return;
            }
            if (window.history && window.history.length > 1) {
                window.history.back();
                setTimeout(function() {
                    window.location.href = '/supplier-list-page';
                }, 300);
                return;
            }
            window.location.href = '/supplier-list-page';
        }

        function changePaperFormat(fmt) {
            const container = document.getElementById('printArea');
            if (fmt === 'pos') {
                container.style.width = '80mm';
                container.style.maxWidth = '80mm';
                container.style.minHeight = 'auto';
                container.style.padding = '5mm';
            } else if (fmt === 'a5') {
                container.style.width = '5.8in';
                container.style.maxWidth = '5.8in';
                container.style.minHeight = '8.3in';
                container.style.padding = '5mm 6mm';
            } else {
                container.style.width = '100%';
                container.style.maxWidth = '210mm';
                container.style.minHeight = '297mm';
                container.style.padding = '10px';
            }
        }
    </script>
</body>
</html>