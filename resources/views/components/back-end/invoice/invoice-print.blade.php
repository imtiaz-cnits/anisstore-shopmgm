<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8" />
    <title>বিক্রয় ইনভয়েস - মেসার্স আনিস ষ্টোর</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Bootstrap Css -->
    <link href="{{ asset('back-end/assets/css/vendor/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Axios -->
    <script src="{{ asset('back-end/assets/js/vendor/axios.min.js') }}"></script>
    
    <style>
        body {
            background-color: #eef2f6;
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans Bengali', 'Segoe UI', Tahoma, sans-serif;
            color: #1e293b;
            font-size: 11px;
        }

        /* Top Purple Navigation Bar (Screen Only) */
        .invoice-top-bar {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: #ffffff;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .invoice-top-bar .back-link {
            color: #ffffff;
            font-size: 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .invoice-top-bar .top-title {
            margin: 0;
            font-weight: 700;
            font-size: 16px;
        }

        /* Printable Sheet Paper Container - Styled for A5 (5.8 in x 8.3 in / 148 x 210 mm) */
        .invoice-page-container {
            background: #ffffff;
            width: 5.8in;
            min-height: 8.3in;
            margin: 15px auto 70px auto;
            padding: 5mm 6mm;
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
            background-color: #6366f1 !important;
            color: #ffffff !important;
            font-weight: 700;
            padding: 5px 8px;
            font-size: 11px;
            border: 1px solid #6366f1 !important;
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
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1050;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.18);
        }

        .paper-select-dropdown {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 8px;
            padding: 5px 12px;
            font-weight: 700;
            font-size: 13px;
            outline: none;
            cursor: pointer;
        }

        .paper-select-dropdown option {
            color: #0f172a;
            background: #ffffff;
        }

        /* Print Specific Styling for A5 Portrait (5.8 in x 8.3 in) */
        @media print {
            @page {
                size: 5.8in 8.3in portrait;
                margin: 4mm;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                box-sizing: border-box !important;
            }

            body {
                background: #ffffff !important;
                padding: 0 !important;
                margin: 0 !important;
                width: 5.8in !important;
                height: 8.3in !important;
            }

            .no-print, .invoice-top-bar, .invoice-bottom-bar {
                display: none !important;
            }

            .invoice-page-container {
                width: 5.8in !important;
                max-width: 5.8in !important;
                min-height: 8.3in !important;
                margin: 0 auto !important;
                padding: 4mm !important;
                box-shadow: none !important;
                border-radius: 0 !important;
            }

            .invoice-table th {
                background-color: #6366f1 !important;
                color: #ffffff !important;
            }
        }
    </style>
</head>
<body>

    <!-- 1. Top Purple App Navigation Header (Screen Mode) -->
    <div class="invoice-top-bar no-print">
        <a href="{{ url('admin-dashboard-pos') }}" class="back-link" title="পস পেজে ফিরুন">
            <i class="fa-solid fa-chevron-left me-1"></i> <span style="font-size: 14px;">পস</span>
        </a>
        <h5 class="top-title">বিক্রয় ইনভয়েস</h5>
        <button type="button" class="btn text-white p-0" onclick="window.print()" title="ইনভয়েস প্রিন্ট করুন">
            <i class="fa-solid fa-print fs-5"></i>
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
                    <div>ইনভয়েস নম্বর: <span id="order_no" class="fw-bold text-indigo"></span></div>
                    <div>তারিখ: <span id="headerInvoiceDate" class="fw-bold"></span></div>
                </div>
            </div>
        </div>

        <!-- Order & Customer Info Metadata Grid (Compact Row) -->
        <div class="d-flex justify-content-between align-items-center mb-2 px-2 py-1 bg-light rounded-2" style="font-size: 10.5px; border: 1px solid #e2e8f0;">
            <div>
                <span class="text-muted">কাস্টমার:</span> <strong id="CustomerName" class="text-dark"></strong>
                <span class="ms-2 text-muted">ফোন:</span> <span id="CustomerMobile" class="fw-semibold text-dark"></span>
            </div>
            <div>
                <span class="text-muted">ঠিকানা:</span> <span id="CustomerAddress" class="fw-semibold text-dark"></span>
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
            <tbody id="order_details">
                <!-- Dynamic Product Rows -->
            </tbody>
        </table>

        <!-- Calculations Summary & In Words Section (Compact Height including Previous Due) -->
        <div class="d-flex justify-content-between align-items-start mt-2 mb-2 pt-1 border-top" style="font-size: 10.5px;">
            <!-- Left: In Words (কথায়) -->
            <div class="in-words-box pe-2" style="max-width: 52%; line-height: 1.3;">
                <span class="text-muted">কথায়:</span> <span id="taka_words" class="fw-bold text-dark"></span>
                <div id="orderNoteWrap" class="text-muted mt-1" style="font-size: 9.5px; display: none;">
                    <strong>নোট:</strong> <span id="orderNoteDisplay"></span>
                </div>
            </div>

            <!-- Right: Calculation Totals (Includes Previous Due & Total Combined Due) -->
            <div class="calc-totals-box text-end" style="min-width: 210px; line-height: 1.45;">
                <div class="d-flex justify-content-between gap-3">
                    <span class="text-muted">আজকের সাব টোটাল:</span>
                    <strong id="sub_total">৳ ০.০০</strong>
                </div>
                <div class="d-flex justify-content-between gap-3" id="rowDiscount" style="display: none;">
                    <span class="text-muted">ছাড় / ডিসকাউন্ট:</span>
                    <strong id="Discountamount" class="text-danger">৳ ০.০০</strong>
                </div>
                <div class="d-flex justify-content-between gap-3 fw-bold border-top py-0.5 my-0.5">
                    <span class="text-dark">আজকের বিল:</span>
                    <strong id="BillTotalAmount" class="text-dark">৳ ০.০০</strong>
                </div>
                <div class="d-flex justify-content-between gap-3">
                    <span class="text-muted">আজকের জমা:</span>
                    <strong id="paidamount" class="text-success">৳ ০.০০</strong>
                </div>
                <div class="d-flex justify-content-between gap-3">
                    <span class="text-muted">আজকের বকেয়া:</span>
                    <strong id="due_amount" class="text-danger fw-bold">৳ ০.০০</strong>
                </div>
                <div class="d-flex justify-content-between gap-3 border-top pt-0.5 mt-0.5">
                    <span class="text-muted">পূর্বের বকেয়া:</span>
                    <strong id="previousdueamount" class="text-secondary fw-bold">৳ ০.০০</strong>
                </div>
                <div class="d-flex justify-content-between gap-3 border-top border-bottom py-0.5 my-0.5 px-1 rounded-1" style="background: #f8fafc;">
                    <span class="text-dark fw-bold">সর্বমোট বকেয়া:</span>
                    <strong id="Totaldueamount" class="text-danger fw-extrabold fs-6">৳ ০.০০</strong>
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
        <button type="button" class="btn text-white p-0" title="শেয়ার করুন" onclick="navigator.share ? navigator.share({title: 'বিক্রয় ইনভয়েস', url: window.location.href}) : alert('শেয়ার লিংক কপি করা হয়েছে!')">
            <i class="fa-solid fa-share-nodes fs-5"></i>
        </button>

        <div class="d-flex align-items-center gap-3">
            <select class="paper-select-dropdown" onchange="changePaperFormat(this.value)">
                <option value="a5" selected>A5 (5.8 × 8.3 in)</option>
                <option value="a4">A4 (8.3 × 11.7 in)</option>
                <option value="pos">80mm POS Thermal</option>
            </select>
            <button type="button" class="btn btn-light btn-sm fw-bold px-3 py-1.5" onclick="window.print()" style="border-radius: 8px;">
                <i class="fa-solid fa-print me-1"></i> প্রিন্ট
            </button>
        </div>
    </div>

    <script>
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

        function HeaderToken() {
            let token = localStorage.getItem('token');
            return {
                headers: {
                    "Authorization": "Bearer " + token
                }
            }
        }

        function changePaperFormat(fmt) {
            const container = document.getElementById('printArea');
            if (fmt === 'pos') {
                container.style.width = '80mm';
                container.style.minHeight = 'auto';
                container.style.padding = '5mm';
            } else if (fmt === 'a4') {
                container.style.width = '210mm';
                container.style.minHeight = '297mm';
                container.style.padding = '15mm';
            } else {
                container.style.width = '5.8in';
                container.style.minHeight = '8.3in';
                container.style.padding = '5mm 6mm';
            }
        }

        fetchInvoiceDetails();

        async function fetchInvoiceDetails() {
            try {
                const response = await axios.get("/api/invoice-print-receipt", HeaderToken());

                if (response.data && !response.data.hasOwnProperty('error')) {
                    const invoiceData = response.data;

                    // Dates and Header Info
                    const invDateBn = engToBanglaNum(invoiceData.invoice_date || '');
                    document.getElementById('headerInvoiceDate').innerText = invDateBn;
                    document.getElementById('order_no').innerText = engToBanglaNum(invoiceData.order_no || '');

                    // Customer info
                    if (invoiceData.customer) {
                        document.getElementById('CustomerName').innerText = invoiceData.customer.customer_name || 'Cash Sale';
                        document.getElementById('CustomerMobile').innerText = engToBanglaNum(invoiceData.customer.mobile || '');
                        document.getElementById('CustomerAddress').innerText = invoiceData.customer.address || '';
                    }

                    if (invoiceData.order_note) {
                        const noteWrap = document.getElementById('orderNoteWrap');
                        const noteDisp = document.getElementById('orderNoteDisplay');
                        if (noteWrap && noteDisp) {
                            noteDisp.innerText = invoiceData.order_note;
                            noteWrap.style.display = 'block';
                        }
                    }

                    // Render Table rows
                    const orderDetailsTable = document.getElementById('order_details');
                    orderDetailsTable.innerHTML = '';
                    if (Array.isArray(invoiceData.order_details)) {
                        invoiceData.order_details.forEach((detail, index) => {
                            const qty = parseFloat(detail.quantity) || 1;
                            const price = parseFloat(detail.selling_price) || 0;
                            const rowTotal = qty * price;

                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td style="text-align: center; padding: 4px 6px;">${engToBanglaNum(index + 1)}</td>
                                <td class="fw-medium" style="padding: 4px 6px;">${detail.product_name || detail.product?.product_name || 'প্রোডাক্ট'}</td>
                                <td style="text-align: center; padding: 4px 6px;">${engToBanglaNum(qty)}</td>
                                <td style="text-align: right; padding: 4px 6px;">৳ ${engToBanglaNum(price.toFixed(2))}</td>
                                <td style="text-align: right; padding: 4px 6px;" class="fw-bold">৳ ${engToBanglaNum(rowTotal.toFixed(2))}</td>
                            `;
                            orderDetailsTable.appendChild(tr);
                        });
                    }

                    // Calculate Totals
                    const subTotalVal = parseFloat(invoiceData.sub_total) || 0;
                    const discountVal = parseFloat(invoiceData.discount_amount) || 0;
                    const paidVal = parseFloat(invoiceData.paid_amount) || 0;
                    const dueVal = parseFloat(invoiceData.due_amount) || 0;
                    const prevDueVal = parseFloat(invoiceData.previous_due_amount) || 0;
                    const netTotalVal = subTotalVal - discountVal;
                    const totalDueVal = prevDueVal + dueVal;

                    document.getElementById('sub_total').innerText = '৳ ' + engToBanglaNum(subTotalVal.toFixed(2));
                    
                    if (discountVal > 0) {
                        const rowDisc = document.getElementById('rowDiscount');
                        if (rowDisc) rowDisc.style.display = 'flex';
                        document.getElementById('Discountamount').innerText = '৳ ' + engToBanglaNum(discountVal.toFixed(2));
                    }

                    document.getElementById('BillTotalAmount').innerText = '৳ ' + engToBanglaNum(netTotalVal.toFixed(2));
                    document.getElementById('paidamount').innerText = '৳ ' + engToBanglaNum(paidVal.toFixed(2));
                    document.getElementById('due_amount').innerText = '৳ ' + engToBanglaNum(dueVal.toFixed(2));

                    // Previous Due & Total Combined Due
                    document.getElementById('previousdueamount').innerText = '৳ ' + engToBanglaNum(prevDueVal.toFixed(2));
                    document.getElementById('Totaldueamount').innerText = '৳ ' + engToBanglaNum(totalDueVal.toFixed(2));

                    // Convert Net Total to Words
                    document.getElementById('taka_words').innerText = numToBanglaWords(netTotalVal);

                } else {
                    console.error('Error fetching invoice data:', response.data.error);
                }
            } catch (error) {
                console.error("Error fetching invoice print data:", error);
            }
        }
    </script>
</body>
</html>