<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8" />
    <title>রিটার্ন বিবরণী - মেসার্স আনিস ষ্টোর</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- App Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />
    
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
            var mode = localStorage.getItem("lightMode") || localStorage.getItem("layout-mode") || "light";
            if (mode === "dark") {
                document.documentElement.setAttribute("data-layout-mode", "dark");
                document.documentElement.setAttribute("light-mode", "dark");
                document.documentElement.classList.add("dark");
            }
        })();
    </script>
    
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
            max-height: 50px;
            max-width: 160px;
            object-fit: contain;
            margin-top: 2px;
        }

        .billed-to-box {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            margin-bottom: 10px;
        }

        .meta-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 4px;
            box-sizing: border-box !important;
            border: 1px solid #000000 !important;
        }

        .meta-table td {
            border: 1px solid #000000 !important;
            padding: 3.5px 8px;
            font-size: 11px;
            color: #000000 !important;
            font-weight: 600;
            box-sizing: border-box !important;
        }

        .meta-table .meta-label {
            background-color: #ffffff;
            font-weight: 700;
            width: 44%;
            color: #000000 !important;
        }

        /* Classic Bordered Table - Fixed Layout & Solid Black Borders for Screen, Mobile, Tab & Print */
        .invoice_table_list {
            width: 100% !important;
            max-width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 10px !important;
            margin-bottom: 0px !important;
            table-layout: fixed !important;
            box-sizing: border-box !important;
            border: 1px solid #000000 !important;
        }

        .invoice_table_list th,
        .invoice_table_list td {
            border: 1px solid #000000 !important;
            padding: 5px 8px;
            font-size: 11.5px;
            color: #000000 !important;
            box-sizing: border-box !important;
            word-break: break-word;
        }

        .invoice_table_list th {
            background-color: #ffffff;
            font-weight: 700;
            text-align: center;
        }

        .status-badge-container {
            font-size: 18px;
            font-weight: 800;
            text-align: center;
            vertical-align: middle;
            letter-spacing: 0.5px;
            border: 1px solid #000000 !important;
        }

        .summary-label-cell {
            text-align: right;
            font-weight: 700;
            color: #000000 !important;
            padding: 4px 10px !important;
            font-size: 11.5px;
            width: 16%;
            border: 1px solid #000000 !important;
        }

        .summary-val-cell {
            text-align: right;
            font-weight: 700;
            color: #000000 !important;
            padding: 4px 10px !important;
            font-size: 11.5px;
            width: 24%;
            white-space: nowrap;
            border: 1px solid #000000 !important;
        }

        .footer-powered-cell {
            border: 1px solid #000000 !important;
            border-top: 1px solid #000000 !important;
            padding: 5px 8px !important;
            font-size: 10.5px !important;
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
        /* Universal Dark Mode for Return Details Page (Screen Only) */
        html[data-layout-mode="dark"],
        html[light-mode="dark"],
        html.dark,
        body[data-layout-mode="dark"],
        body[light-mode="dark"],
        body.dark-mode {
            background-color: #0f172a !important;
            color: #f1f5f9 !important;
        }

        html[data-layout-mode="dark"] .invoice-page-container,
        html[light-mode="dark"] .invoice-page-container,
        html.dark .invoice-page-container,
        body[data-layout-mode="dark"] .invoice-page-container,
        body[light-mode="dark"] .invoice-page-container,
        body.dark-mode .invoice-page-container {
            background-color: #1e293b !important;
            color: #f1f5f9 !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
            border: 1px solid #334155 !important;
        }

        html[data-layout-mode="dark"] .store-name,
        html[data-layout-mode="dark"] .invoice-main-heading,
        html[data-layout-mode="dark"] .text-dark,
        html.dark .store-name,
        html.dark .invoice-main-heading,
        html.dark .text-dark,
        body[data-layout-mode="dark"] .store-name,
        body[data-layout-mode="dark"] .invoice-main-heading,
        body[data-layout-mode="dark"] .text-dark,
        body.dark-mode .store-name,
        body.dark-mode .invoice-main-heading,
        body.dark-mode .text-dark {
            color: #f8fafc !important;
        }

        html[data-layout-mode="dark"] .text-muted,
        html.dark .text-muted,
        body[data-layout-mode="dark"] .text-muted,
        body.dark-mode .text-muted {
            color: #94a3b8 !important;
        }

        html[data-layout-mode="dark"] .meta-table,
        html[data-layout-mode="dark"] .meta-table td,
        html.dark .meta-table,
        html.dark .meta-table td,
        body[data-layout-mode="dark"] .meta-table,
        body[data-layout-mode="dark"] .meta-table td,
        body.dark-mode .meta-table,
        body.dark-mode .meta-table td {
            border-color: #475569 !important;
            color: #f1f5f9 !important;
        }

        html[data-layout-mode="dark"] .meta-table .meta-label,
        html.dark .meta-table .meta-label,
        body[data-layout-mode="dark"] .meta-table .meta-label,
        body.dark-mode .meta-table .meta-label {
            background-color: #334155 !important;
            color: #e2e8f0 !important;
        }

        html[data-layout-mode="dark"] .invoice_table_list,
        html[data-layout-mode="dark"] .invoice_table_list th,
        html[data-layout-mode="dark"] .invoice_table_list td,
        html.dark .invoice_table_list,
        html.dark .invoice_table_list th,
        html.dark .invoice_table_list td,
        body[data-layout-mode="dark"] .invoice_table_list,
        body[data-layout-mode="dark"] .invoice_table_list th,
        body[data-layout-mode="dark"] .invoice_table_list td,
        body.dark-mode .invoice_table_list,
        body.dark-mode .invoice_table_list th,
        body.dark-mode .invoice_table_list td {
            border-color: #475569 !important;
            color: #f1f5f9 !important;
        }

        html[data-layout-mode="dark"] .invoice_table_list th,
        html.dark .invoice_table_list th,
        body[data-layout-mode="dark"] .invoice_table_list th,
        body.dark-mode .invoice_table_list th {
            background-color: #334155 !important;
            color: #f8fafc !important;
        }

        html[data-layout-mode="dark"] .summary-label-cell,
        html.dark .summary-label-cell,
        body[data-layout-mode="dark"] .summary-label-cell,
        body.dark-mode .summary-label-cell {
            color: #cbd5e1 !important;
        }

        html[data-layout-mode="dark"] .summary-val-cell,
        html.dark .summary-val-cell,
        body[data-layout-mode="dark"] .summary-val-cell,
        body.dark-mode .summary-val-cell {
            color: #f8fafc !important;
        }

        html[data-layout-mode="dark"] .footer-powered-cell,
        html.dark .footer-powered-cell,
        body[data-layout-mode="dark"] .footer-powered-cell,
        body.dark-mode .footer-powered-cell {
            background-color: #1e293b !important;
            color: #94a3b8 !important;
            border-color: #475569 !important;
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
            .footer-powered-cell {
                border: 1px solid #000000 !important;
                border-color: #000000 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                box-sizing: border-box !important;
            }

            .footer-powered-cell {
                border-top: 1px solid #000000 !important;
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
        <h5 class="top-title">রিটার্ন বিবরণী</h5>
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="print-top-btn" onclick="toggleDetailsDarkMode()" title="ডার্ক / লাইট মোড">
                <i class="fa-regular fa-moon fs-6" id="detailsThemeIcon"></i>
            </button>
            <button type="button" class="print-top-btn" onclick="window.print()" title="প্রিন্ট করুন">
                <i class="fa-solid fa-print fs-6"></i>
            </button>
        </div>
    </div>

    <!-- 2. Printable Sheet Paper Container (A4 Layout - 10px padding on all 4 sides) -->
    <div class="invoice-page-container" id="printArea">
        
        <!-- Header 3-Column Grid: Billed To (Left), Return Details & Logo (Center), Store Info (Right) -->
        <div class="d-flex justify-content-between align-items-start pb-0 mb-0" style="gap: 12px;">
            
            <!-- Left: Billed To / Party Info & Metadata -->
            <div style="flex: 1; max-width: 32%;">
                <div class="billed-to-box">
                    <div class="fw-bold text-dark fs-6 mb-1">বিল প্রাপক:</div>
                    <div class="fw-bold text-dark">{{ $partyName }}</div>
                    <div class="text-muted" style="font-size: 11px;">{{ $partyAddress }}</div>
                    <div style="font-size: 11px;">মোবাইল: <span class="fw-semibold">{{ $partyMobile }}</span></div>
                </div>

                <table class="meta-table">
                    <tr>
                        <td class="meta-label">রিটার্ন নং:</td>
                        <td>{{ $returnNo }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">তারিখ:</td>
                        <td>{{ \Carbon\Carbon::parse($date)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">রেফারেন্স নং:</td>
                        <td>{{ $refNo }}</td>
                    </tr>
                </table>
            </div>

            <!-- Center: Return Statement Heading & Logo -->
            <div class="text-center" style="flex: 1; max-width: 34%;">
                <h1 class="invoice-main-heading mb-1.5">রিটার্ন বিবরণী</h1>
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

        <!-- 3. Classic Return Table Section (Bordered 4-Column Design) - Exactly 10px top gap -->
        <table class="invoice_table_list">
            <thead>
                <tr>
                    <th style="width: 14%; text-align: center;">ক্রমিক</th>
                    <th style="width: 46%; text-align: left; padding-left: 10px;">পণ্যের বিবরণ</th>
                    <th style="width: 16%; text-align: center;">পরিমাণ</th>
                    <th style="width: 24%; text-align: right; padding-right: 10px;">মূল্য</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center fw-bold">১</td>
                    <td style="text-align: left; padding-left: 10px;" class="fw-bold">{{ $productName }}</td>
                    <td class="text-center fw-bold">{{ $qty }}</td>
                    <td style="text-align: right; padding-right: 10px;" class="fw-bold">৳ {{ number_format($amount, 2) }}</td>
                </tr>

                <!-- Summary Section inside Table -->
                <tr>
                    <td colspan="2" rowspan="4" class="status-badge-container">
                        <span style="color: #16a34a; font-weight: 800; font-size: 18px;">রিটার্ন সম্পন্ন</span>
                    </td>
                    <td class="summary-label-cell">সাব টোটাল:</td>
                    <td class="summary-val-cell">৳ {{ number_format($amount, 2) }}</td>
                </tr>
                <tr>
                    <td class="summary-label-cell">রিফান্ড পরিশোধ:</td>
                    <td class="summary-val-cell">৳ {{ number_format($amount, 2) }}</td>
                </tr>
                <tr>
                    <td class="summary-label-cell">অবশিষ্ট বকেয়া:</td>
                    <td class="summary-val-cell">৳ {{ number_format($dueAmount, 2) }}</td>
                </tr>
                <tr>
                    <td class="summary-label-cell">সর্বমোট রিফান্ড:</td>
                    <td class="summary-val-cell fw-extrabold" style="color: #8C56D4; font-size: 13px;">৳ {{ number_format($amount, 2) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="footer-powered-cell">
                        Powered by: CodeNext IT - www.codenextit.com
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>

    <!-- 5. Bottom Purple App Action Footer (Screen Mode Only) -->
    <div class="invoice-bottom-bar no-print">
        <button type="button" class="btn text-white p-0" onclick="shareInvoice()" title="শেয়ার করুন" style="font-size: 16px;">
            <i class="fa-solid fa-share-nodes"></i>
        </button>

        <div class="d-flex align-items-center gap-2">
            <select class="paper-select-dropdown" id="paperSizeSelect" onchange="changePaperSize(this.value)">
                <option value="A4" selected>A4 (8.3 &times; 11.7 in)</option>
                <option value="Letter">Letter (8.5 &times; 11 in)</option>
                <option value="POS">POS রিসিট (80mm)</option>
            </select>
            <button type="button" class="btn btn-light fw-bold text-dark px-3 py-1.5 d-flex align-items-center gap-1.5 shadow-sm" onclick="window.print()" style="border-radius: 6px; font-size: 12.5px;">
                <i class="fa-solid fa-print"></i> <span>প্রিন্ট</span>
            </button>
        </div>
    </div>

    <script>
        function goBackToPreviousPage(e) {
            e.preventDefault();
            if (window.history.length > 1 && document.referrer && document.referrer.includes(window.location.host)) {
                window.history.back();
            } else {
                window.location.href = '/admin-dashboard-return-list';
            }
        }

        function changePaperSize(size) {
            const printArea = document.getElementById('printArea');
            if (size === 'POS') {
                printArea.style.maxWidth = '80mm';
            } else if (size === 'Letter') {
                printArea.style.maxWidth = '216mm';
            } else {
                printArea.style.maxWidth = '210mm';
            }
        }

        function shareInvoice() {
            if (navigator.share) {
                navigator.share({
                    title: 'রিটার্ন বিবরণী - মেসার্স আনিস ষ্টোর',
                    text: 'রিটার্ন বিবরণী মেসার্স আনিস ষ্টোর',
                    url: window.location.href,
                }).catch((err) => console.log('Share canceled or failed', err));
            } else {
                navigator.clipboard.writeText(window.location.href);
                alert('রিটার্ন বিবরণীর লিংক কপি করা হয়েছে!');
            }
        }

        // Theme application and toggle for Return Details
        function applyDetailsTheme(mode) {
            const isDark = mode === 'dark';
            document.documentElement.setAttribute('data-layout-mode', mode);
            document.documentElement.setAttribute('light-mode', mode);
            if (document.body) {
                document.body.setAttribute('data-layout-mode', mode);
                document.body.setAttribute('light-mode', mode);
            }
            if (isDark) {
                document.documentElement.classList.add('dark');
                if (document.body) document.body.classList.add('dark-mode');
            } else {
                document.documentElement.classList.remove('dark');
                if (document.body) document.body.classList.remove('dark-mode');
            }
            const icon = document.getElementById('detailsThemeIcon');
            if (icon) {
                icon.className = isDark ? 'fa-regular fa-sun fs-6' : 'fa-regular fa-moon fs-6';
            }
        }

        function toggleDetailsDarkMode() {
            const current = localStorage.getItem('lightMode') || localStorage.getItem('layout-mode') || 'light';
            const newMode = current === 'dark' ? 'light' : 'dark';
            localStorage.setItem('lightMode', newMode);
            localStorage.setItem('layout-mode', newMode);
            applyDetailsTheme(newMode);
        }

        // Auto print trigger if print parameter is in query
        window.addEventListener('DOMContentLoaded', () => {
            const saved = localStorage.getItem('lightMode') || localStorage.getItem('layout-mode') || 'light';
            applyDetailsTheme(saved);

            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('print') === 'true') {
                setTimeout(() => window.print(), 350);
            }
        });
    </script>
</body>
</html>
