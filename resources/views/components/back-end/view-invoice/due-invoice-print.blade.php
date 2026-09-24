<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8" />
    <title>ইনভয়েস #{{ $invoice->order_no }} - মেসার্স আনিস ষ্টোর</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Bootstrap Css -->
    <link href="{{ asset('back-end/assets/css/vendor/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        (function() {
            var mode = localStorage.getItem("layout-mode") || localStorage.getItem("light-mode") || localStorage.getItem("lightMode") || localStorage.getItem("theme");
            if (mode === "dark" || (!mode && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.setAttribute("data-bs-theme", "dark");
                document.documentElement.setAttribute("light-mode", "dark");
                document.documentElement.setAttribute("data-layout-mode", "dark");
                document.documentElement.classList.add("dark-mode");
                window.addEventListener('DOMContentLoaded', function() {
                    document.body && document.body.setAttribute("data-layout-mode", "dark");
                });
            }
        })();
    </script>

    <style>
        body {
            background-color: #eef2f6;
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans Bengali', 'Segoe UI', Tahoma, sans-serif;
            color: #1e293b;
            font-size: 11px;
        }

        /* Screen Dark Mode Styling */
        @media screen {
            [data-bs-theme="dark"],
            [data-layout-mode="dark"],
            [light-mode="dark"],
            .dark-mode {
                background-color: #0b1120 !important;
                color: #f1f5f9 !important;
            }

            [data-bs-theme="dark"] body,
            [data-layout-mode="dark"] body,
            [light-mode="dark"] body,
            body.dark-mode,
            body[data-layout-mode="dark"] {
                background-color: #0b1120 !important;
                color: #f1f5f9 !important;
            }

            [data-bs-theme="dark"] .invoice-page-container,
            [data-layout-mode="dark"] .invoice-page-container,
            [light-mode="dark"] .invoice-page-container,
            .dark-mode .invoice-page-container,
            body[data-layout-mode="dark"] .invoice-page-container {
                background-color: #1e293b !important;
                color: #f1f5f9 !important;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4) !important;
                border: 1px solid #334155 !important;
            }

            [data-bs-theme="dark"] .store-name,
            [data-layout-mode="dark"] .store-name,
            [light-mode="dark"] .store-name,
            .dark-mode .store-name {
                color: #a78bfa !important;
            }

            [data-bs-theme="dark"] .store-desc,
            [data-layout-mode="dark"] .store-desc,
            [light-mode="dark"] .store-desc,
            .dark-mode .store-desc {
                color: #94a3b8 !important;
            }

            [data-bs-theme="dark"] .store-meta,
            [data-layout-mode="dark"] .store-meta,
            [light-mode="dark"] .store-meta,
            .dark-mode .store-meta,
            [data-bs-theme="dark"] .invoice-main-heading,
            [data-layout-mode="dark"] .invoice-main-heading,
            [light-mode="dark"] .invoice-main-heading,
            .dark-mode .invoice-main-heading,
            [data-bs-theme="dark"] .text-dark,
            [data-layout-mode="dark"] .text-dark,
            [light-mode="dark"] .text-dark,
            .dark-mode .text-dark {
                color: #f8fafc !important;
            }

            [data-bs-theme="dark"] .text-muted,
            [data-layout-mode="dark"] .text-muted,
            [light-mode="dark"] .text-muted,
            .dark-mode .text-muted {
                color: #94a3b8 !important;
            }

            [data-bs-theme="dark"] .bg-light,
            [data-layout-mode="dark"] .bg-light,
            [light-mode="dark"] .bg-light,
            .dark-mode .bg-light {
                background-color: #0f172a !important;
                border-color: #334155 !important;
            }

            [data-bs-theme="dark"] .border-bottom,
            [data-layout-mode="dark"] .border-bottom,
            [data-bs-theme="dark"] .border-top,
            [data-layout-mode="dark"] .border-top,
            [light-mode="dark"] .border-bottom,
            [light-mode="dark"] .border-top,
            [data-bs-theme="dark"] .border,
            [data-layout-mode="dark"] .border {
                border-color: #334155 !important;
            }

            [data-bs-theme="dark"] .invoice-table td,
            [data-layout-mode="dark"] .invoice-table td,
            [light-mode="dark"] .invoice-table td,
            .dark-mode .invoice-table td {
                border-bottom: 1px solid #334155 !important;
                color: #f1f5f9 !important;
            }

            [data-bs-theme="dark"] .signature-line,
            [data-layout-mode="dark"] .signature-line,
            [light-mode="dark"] .signature-line,
            .dark-mode .signature-line {
                border-top: 1.5px solid #475569 !important;
            }

            [data-bs-theme="dark"] .calc-totals-box > div,
            [data-layout-mode="dark"] .calc-totals-box > div {
                border-color: #334155 !important;
            }

            [data-bs-theme="dark"] div[style*="background: #f8fafc"],
            [data-layout-mode="dark"] div[style*="background: #f8fafc"],
            [light-mode="dark"] div[style*="background: #f8fafc"] {
                background: #0f172a !important;
                border-color: #334155 !important;
            }
        }

        /* Top Purple Navigation Bar (Screen Only) - Sticky & Modern */
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
            color: #ffffff !important; /* White color */
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

        /* Printable Sheet Paper Container - Styled for A4 Full Width */
        .invoice-page-container {
            background: #ffffff;
            width: 100%;
            max-width: 210mm;
            min-height: 297mm;
            margin: 15px auto 70px auto;
            padding: 10mm 12mm;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-radius: 4px;
            box-sizing: border-box;
            position: relative;
        }

        @media (max-width: 991px) {
            .invoice-page-container {
                width: 96%;
                min-height: auto;
                padding: 12px;
                margin: 12px auto 70px auto;
            }
        }

        .store-name {
            font-size: 17px;
            font-weight: 800;
            color: #4f46e5 !important;
            letter-spacing: -0.3px;
            line-height: 1.2;
        }

        .invoice-main-heading {
            font-size: 22px;
            font-weight: 900;
            color: #0f172a;
            margin: 0;
            line-height: 1.1;
        }

        /* Compact Table Styling with Purple Header Bar */
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .invoice-table th {
            background-color: #8C56D4 !important;
            color: #ffffff !important;
            font-weight: 700;
            padding: 5px 8px;
            font-size: 11px;
            border: 1px solid #8C56D4 !important;
        }

        .invoice-table td {
            padding: 4px 8px;
            font-size: 11px;
            border-bottom: 1px solid #e2e8f0;
            color: #1e293b;
        }

        .signature-line {
            border-top: 1.5px solid #94a3b8;
            width: 130px;
            margin: 0 auto 4px auto;
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
                margin: 8mm 10mm;
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
                height: auto !important;
            }

            .no-print, .invoice-top-bar, .invoice-bottom-bar {
                display: none !important;
            }

            .invoice-page-container {
                width: 100% !important;
                max-width: 100% !important;
                min-height: auto !important;
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
            }

            .invoice-table {
                width: 100% !important;
            }

            .invoice-table th {
                background-color: #8C56D4 !important;
                color: #ffffff !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>
<body>

    <!-- 1. Top Purple App Navigation Header (Screen Mode) -->
    <div class="invoice-top-bar no-print">
        <button type="button" onclick="goBackToPreviousPage(event)" ontouchend="goBackToPreviousPage(event)" class="back-link" title="ফিরে যান">
            <i class="fa-solid fa-arrow-left"></i> <span>ফিরে যান</span>
        </button>
        <h5 class="top-title">বিক্রয় ইনভয়েস</h5>
        <button type="button" class="print-top-btn" onclick="window.print()" title="ইনভয়েস প্রিন্ট করুন">
            <i class="fa-solid fa-print fs-6"></i>
        </button>
    </div>

    <!-- 2. Printable Invoice Sheet Paper (A5 / 5.8 x 8.3 in Layout) -->
    <div class="invoice-page-container" id="printArea">
        
        <!-- Header Grid: Branding Left (মেসার্স আনিস ষ্টোর) & Invoice Heading Right -->
        <div class="d-flex justify-content-between align-items-start mb-2 pb-2 border-bottom" style="gap: 10px;">
            <!-- Left Store Branding (মেসার্স আনিস ষ্টোর) -->
            <div class="store-branding" style="max-width: 62%;">
                <h2 class="store-name text-dark fw-extrabold m-0">
                    মেসার্স আনিস ষ্টোর
                </h2>
                <div class="store-desc text-muted mt-1" style="font-size: 9.5px; line-height: 1.25; color: #475569;">
                    বিভিন্ন প্রকার দেশী বিদেশী কমেটিক, ষ্টেশনারী, ইমিটেশন, ব্রেসিয়ার, পেন্টি, বেল্ট পাইকারী ও খুচরা বিক্রেতা ৷
                </div>
                <div class="store-meta text-dark fw-bold mt-1" style="font-size: 9.5px; line-height: 1.2;">
                    <span>ঝালাইপট্টি, পাবনা ৷</span> | <span>মোবাইলঃ ০১৭৯২-৮৩৩৭৪৭, ০১৭১১-৪৫১৩৩</span>
                </div>
            </div>

            <!-- Right Invoice Title & Date -->
            <div class="text-end" style="max-width: 36%;">
                <h1 class="invoice-main-heading">ইনভয়েস</h1>
                <div class="text-dark fw-semibold mt-1" style="font-size: 10px;">
                    <div>ইনভয়েস নম্বর: <span class="fw-bold text-indigo bn-num">{{ $invoice->order_no }}</span></div>
                    <div>তারিখ: <span class="fw-bold bn-num">{{ \Carbon\Carbon::parse($invoice->created_at)->format('d/m/Y') }}</span></div>
                </div>
            </div>
        </div>

        <!-- Order & Customer Info Metadata Grid (Compact Row) -->
        <div class="d-flex justify-content-between align-items-center mb-2 px-2 py-1 bg-light rounded-2" style="font-size: 10.5px; border: 1px solid #e2e8f0;">
            <div>
                <span class="text-muted">কাস্টমার:</span> <strong class="text-dark">{{ $invoice->customer->customer_name ?? 'Cash Sale' }}</strong>
                <span class="ms-2 text-muted">ফোন:</span> <span class="fw-semibold text-dark bn-num">{{ $invoice->customer->mobile ?? '' }}</span>
            </div>
            <div>
                <span class="text-muted">ঠিকানা:</span> <span class="fw-semibold text-dark">{{ $invoice->customer->address_details ?? '' }}</span>
            </div>
        </div>

        <!-- Products Details Table with Compact Height Spacing -->
        <table class="table invoice-table">
            <thead>
                <tr>
                    <th style="width: 7%; text-align: center;">ক্রম</th>
                    <th style="width: 47%;">পণ্যের নাম</th>
                    <th style="width: 12%; text-align: center;">পরিমাণ</th>
                    <th style="width: 17%; text-align: right;">মূল্য</th>
                    <th style="width: 17%; text-align: right;">মোট মূল্য</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $subTotalVal = 0;
                @endphp
                @if($invoice->details && $invoice->details->isNotEmpty())
                    @foreach($invoice->details as $key => $detail)
                        @php
                            $qty = $detail->quantity ?? 1;
                            $price = $detail->selling_price ?? 0;
                            $rowTotal = $qty * $price;
                            $subTotalVal += $rowTotal;
                        @endphp
                        <tr>
                            <td style="text-align: center; padding: 4px 6px;" class="bn-num">{{ $key + 1 }}</td>
                            <td class="fw-medium" style="padding: 4px 6px;">{{ $detail->product->product_name ?? 'প্রোডাক্ট' }}</td>
                            <td style="text-align: center; padding: 4px 6px;" class="bn-num">{{ $qty }}</td>
                            <td style="text-align: right; padding: 4px 6px;">৳ <span class="bn-num">{{ number_format($price, 2) }}</span></td>
                            <td style="text-align: right; padding: 4px 6px;" class="fw-bold">৳ <span class="bn-num">{{ number_format($rowTotal, 2) }}</span></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        @php
            $discountVal = $invoice->discount_amount ?? 0;
            $paidVal = $invoice->paid_amount ?? 0;
            $dueVal = $invoice->due_amount ?? 0;
            $netTotalVal = $subTotalVal - $discountVal;
            $prevDueAmountVal = $actualPreviousDue ?? 0;
            $totalDueCombined = $prevDueAmountVal + $dueVal;
        @endphp

        <!-- Calculations Summary & In Words Section (Compact Height) -->
        <div class="d-flex justify-content-between align-items-start mt-2 mb-2 pt-1 border-top" style="font-size: 10.5px;">
            <!-- Left: In Words (কথায়) -->
            <div class="in-words-box pe-2" style="max-width: 52%; line-height: 1.3;">
                <span class="text-muted">কথায়:</span> <span id="taka_words_due" class="fw-bold text-dark"></span>
                @if(!empty($invoice->order_note))
                <div class="text-muted mt-1" style="font-size: 9.5px;">
                    <strong>নোট:</strong> <span>{{ $invoice->order_note }}</span>
                </div>
                @endif
            </div>

            <!-- Right: Calculation Totals (Includes Previous Due & Total Combined Due) -->
            <div class="calc-totals-box text-end" style="min-width: 210px; line-height: 1.45;">
                <div class="d-flex justify-content-between gap-3">
                    <span class="text-muted">আজকের সাব টোটাল:</span>
                    <strong>৳ <span class="bn-num">{{ number_format($subTotalVal, 2) }}</span></strong>
                </div>
                @if($discountVal > 0)
                <div class="d-flex justify-content-between gap-3">
                    <span class="text-muted">ছাড় / ডিসকাউন্ট:</span>
                    <strong class="text-danger">৳ <span class="bn-num">{{ number_format($discountVal, 2) }}</span></strong>
                </div>
                @endif
                <div class="d-flex justify-content-between gap-3 fw-bold border-top py-0.5 my-0.5">
                    <span class="text-dark">আজকের বিল:</span>
                    <strong class="text-dark">৳ <span class="bn-num">{{ number_format($netTotalVal, 2) }}</span></strong>
                </div>
                <div class="d-flex justify-content-between gap-3">
                    <span class="text-muted">আজকের জমা:</span>
                    <strong class="text-success">৳ <span class="bn-num">{{ number_format($paidVal, 2) }}</span></strong>
                </div>
                <div class="d-flex justify-content-between gap-3">
                    <span class="text-muted">আজকের বকেয়া:</span>
                    <strong class="text-danger fw-bold">৳ <span class="bn-num">{{ number_format($dueVal, 2) }}</span></strong>
                </div>
                <div class="d-flex justify-content-between gap-3 border-top pt-0.5 mt-0.5">
                    <span class="text-muted">পূর্বের বকেয়া:</span>
                    <strong class="text-secondary fw-bold">৳ <span class="bn-num">{{ number_format($prevDueAmountVal, 2) }}</span></strong>
                </div>
                <div class="d-flex justify-content-between gap-3 border-top border-bottom py-0.5 my-0.5 px-1 rounded-1" style="background: #f8fafc;">
                    <span class="text-dark fw-bold">সর্বমোট বকেয়া:</span>
                    <strong class="text-danger fw-extrabold fs-6">৳ <span class="bn-num">{{ number_format($totalDueCombined, 2) }}</span></strong>
                </div>
            </div>
        </div>

        <!-- Footer Signatures -->
        <div class="signature-section d-flex justify-content-between align-items-center mt-3 pt-3" style="font-size: 10px;">
            <div class="text-center" style="width: 140px;">
                <div class="signature-line"></div>
                <div class="fw-bold text-dark">ক্রেতার স্বাক্ষর</div>
            </div>
            <div class="text-center" style="width: 140px;">
                <div class="signature-line"></div>
                <div class="fw-bold text-dark">পক্ষে: মেসার্স আনিস ষ্টোর</div>
            </div>
        </div>

        <!-- Bottom Page 1/1 Indicator -->
        <div class="text-end text-muted mt-2" style="font-size: 9.5px;">
            Page 1/1
        </div>
    </div>

    <!-- 3. Bottom Fixed Purple Action Bar (Screen Mode) -->
    <div class="invoice-bottom-bar no-print">
        <button type="button" class="btn text-white p-0 d-flex align-items-center justify-content-center" title="শেয়ার করুন" onclick="navigator.share ? navigator.share({title: 'বিক্রয় ইনভয়েস', url: window.location.href}) : alert('শেয়ার লিংক কপি করা হয়েছে!')" style="width: 38px; height: 38px; background: rgba(255,255,255,0.18); border-radius: 50%; transition: all 0.2s;">
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
            try {
                let savedUrl = sessionStorage.getItem('invoice_back_url') || sessionStorage.getItem('return_back_url');
                if (savedUrl && savedUrl !== window.location.href && savedUrl.indexOf('/invoice/') === -1) {
                    sessionStorage.removeItem('invoice_back_url');
                    window.location.href = savedUrl;
                    return;
                }
            } catch (e) {}

            if (document.referrer && document.referrer.indexOf(window.location.host) !== -1 && document.referrer !== window.location.href) {
                window.location.href = document.referrer;
                return;
            }

            if (window.history && window.history.length > 1) {
                window.history.back();
                return;
            }

            window.location.href = '/customer-list';
        }

        function engToBanglaNum(str) {
            if (str === null || str === undefined) return '';
            str = String(str);
            const en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            const bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            for (let i = 0; i < 10; i++) {
                str = str.split(en[i]).join(bn[i]);
            }
            return str;
        }

        function numToBanglaWords(number) {
            number = Math.floor(parseFloat(number) || 0);
            if (number === 0) return 'শূন্য টাকা মাত্র';

            const digitsMap = {
                1: 'এক', 2: 'দুই', 3: 'তিন', 4: 'চার', 5: 'পাঁচ', 6: 'ছয়', 7: 'সাত', 8: 'আট', 9: 'নয়', 10: 'দশ',
                11: 'এগারো', 12: 'বারো', 13: 'তেরো', 14: 'চৌদ্দ', 15: 'পনেরো', 16: 'ষোলো', 17: 'সতেরো', 18: 'আঠারো', 19: 'উনিশ', 20: 'বিশ',
                21: 'একুশ', 22: 'বাইশ', 23: 'তেইশ', 24: 'চব্বিশ', 25: 'পঁচিশ', 26: 'ছাব্বিশ', 27: 'সাতাশ', 28: 'আঠাশ', 29: 'উনত্রিশ', 30: 'ত্রিশ',
                31: 'একত্রিশ', 32: 'বত্রিশ', 33: 'তেত্রিশ', 34: 'চৌত্রিশ', 35: 'পঁয়ত্রিশ', 36: 'ছত্রিশ', 37: 'সাইত্রিশ', 38: 'আটত্রিশ', 39: 'উনচল্লিশ', 40: 'চল্লিশ',
                41: 'একচল্লিশ', 42: 'বয়াল্লিশ', 43: 'তেতাল্লিশ', 44: 'চৌয়াল্লিশ', 45: 'পঁয়তাল্লিশ', 46: 'ছেচল্লিশ', 47: 'সাতচল্লিশ', 48: 'আটচল্লিশ', 49: 'উনপঞ্চাশ', 50: 'পঞ্চাশ',
                51: 'একান্ন', 52: 'বায়ান্ন', 53: 'তিপ্পান্ন', 54: 'চৌয়ান্ন', 55: 'পঞ্চান্ন', 56: 'ছাপ্পান্ন', 57: 'সাতান্ন', 58: 'আটান্ন', 59: 'উনষাট', 60: 'ষাট',
                61: 'একষট্টি', 62: 'বাষট্টি', 63: 'তেষট্টি', 64: 'চৌষট্টি', 65: 'পঁয়ষট্টি', 66: 'ছেষট্টি', 67: 'সাতষট্টি', 68: 'আটষট্টি', 69: 'উনসত্তর', 70: 'সত্তর',
                71: 'একাত্তর', 72: 'বাহাত্তর', 73: 'তিয়াত্তর', 74: 'চৌহাত্তর', 75: 'পঁচাত্তর', 76: 'ছিয়াত্তর', 77: 'সাতাত্তর', 78: 'আটাত্তর', 79: 'উনাশীতি', 80: 'আশি',
                81: 'একাশি', 82: 'বিরাশি', 83: 'তিরাশি', 84: 'চৌরাশি', 85: 'পঁচাশি', 86: 'ছিয়াশি', 87: 'সাতাশি', 88: 'অষ্টাসীতি', 89: 'উননব্বই', 90: 'নব্বই',
                91: 'একানব্বই', 92: 'বিয়ানব্বই', 93: 'তিয়ানব্বই', 94: 'চৌয়ানব্বই', 95: 'পঁচানব্বই', 96: 'ছিয়ানব্বই', 97: 'সাতানব্বই', 98: 'আটানব্বই', 99: 'নিরানব্বই'
            };

            function convertTwoDigits(n) {
                if (n === 0) return '';
                return digitsMap[n] || '';
            }

            let words = '';

            if (Math.floor(number / 10000000) > 0) {
                words += convertTwoDigits(Math.floor(number / 10000000)) + ' কোটি ';
                number %= 10000000;
            }
            if (Math.floor(number / 100000) > 0) {
                words += convertTwoDigits(Math.floor(number / 100000)) + ' লাখ ';
                number %= 100000;
            }
            if (Math.floor(number / 1000) > 0) {
                words += convertTwoDigits(Math.floor(number / 1000)) + ' হাজার ';
                number %= 1000;
            }
            if (Math.floor(number / 100) > 0) {
                words += convertTwoDigits(Math.floor(number / 100)) + ' শত ';
                number %= 100;
            }
            if (number > 0) {
                words += convertTwoDigits(number) + ' ';
            }

            return words.trim() + ' টাকা মাত্র';
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
                container.style.padding = '10mm 12mm';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Convert all Bangla numbers in Blade rendered spans
            document.querySelectorAll('.bn-num').forEach(el => {
                el.textContent = engToBanglaNum(el.textContent);
            });

            // Convert Net Total to Bangla Words
            const netVal = {{ $netTotalVal ?? 0 }};
            const wordsEl = document.getElementById('taka_words_due');
            if (wordsEl) {
                wordsEl.textContent = numToBanglaWords(netVal);
            }
        });
    </script>
</body>
</html>