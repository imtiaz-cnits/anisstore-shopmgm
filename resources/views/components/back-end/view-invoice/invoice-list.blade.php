<!-- Flatpickr CSS & JS per rules.md -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- html2pdf.js for Bengali Unicode PDF Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- Hero Main Content Start -->
<div class="main-content">
    <div class="page-content">
        <!-- Table Start -->
        <div class="data-table">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-3 p-sm-4">
                    <!-- 1. Title: Icon + Title with clean gap, no description, no margins -->
                    <div class="invoice-card-header mb-3 pb-2 border-bottom d-flex align-items-center">
                        <div class="d-flex align-items-center gap-3">
                            <div class="invoice-title-icon-box rounded-3 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-file-invoice-dollar fs-5"></i>
                            </div>
                            <h4 class="invoice-main-heading m-0 p-0 fw-bold">ইনভয়েস তালিকা</h4>
                        </div>
                    </div>

                    <!-- 2. Date Fields (1 Row, 2 Columns on Mobile, Tab, Desktop) -->
                    <div class="invoice-date-section mb-3">
                        <div class="invoice-date-grid mb-2.5" style="display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 10px !important;">
                            <!-- Start Date -->
                            <div class="date-field-col" style="min-width: 0;">
                                <label for="startDate" class="form-label mb-1 fw-semibold text-slate-700 dark:text-slate-200" style="font-size: 13px;">শুরুর তারিখ *</label>
                                <div class="custom-date-input-wrap position-relative">
                                    <input type="text" id="startDate" name="dateInput" class="custom-flatpickr-input form-control w-100 text-start" placeholder="DD-MM-YYYY" readonly autocomplete="off" />
                                    <span class="calendar-addon-btn" onclick="openDatePicker('startDate')">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- End Date -->
                            <div class="date-field-col" style="min-width: 0;">
                                <label for="endDate" class="form-label mb-1 fw-semibold text-slate-700 dark:text-slate-200" style="font-size: 13px;">শেষের তারিখ *</label>
                                <div class="custom-date-input-wrap position-relative">
                                    <input type="text" id="endDate" name="dateInput" class="custom-flatpickr-input form-control w-100 text-start" placeholder="DD-MM-YYYY" readonly autocomplete="off" />
                                    <span class="calendar-addon-btn" onclick="openDatePicker('endDate')">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <button type="button" class="invoice-search-submit-btn w-100 fw-bold d-flex align-items-center justify-content-center gap-2" onclick="fetchInvoiceReport()">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span>অনুসন্ধান করুন</span>
                        </button>
                    </div>

                    <!-- Search Input Box -->
                    <div class="invoice-search-box-wrap mb-3 position-relative">
                        <input type="text" id="searchInput" class="form-control invoice-search-input" placeholder="ইনভয়েস খুঁজুন..." autocomplete="off" />
                        <i class="fa-solid fa-magnifying-glass invoice-search-addon-icon"></i>
                    </div>

                    <!-- 3. Toolbar Section: Row 1 (Entry & Filter in 1 row 2 col), Row 2 (PDF & Print in 1 row 2 col) -->
                    <div class="invoice-toolbar-section mb-3 d-flex flex-column gap-3">
                        <!-- Row 1: Entry & Filter (1 Row, 2 Columns) -->
                        <div class="toolbar-row-1 d-flex align-items-center justify-content-between gap-2 w-100 mb-1">
                            <!-- Left: "এন্ট্রি:" text + Entry dropdown (width fits content) -->
                            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                <span class="fw-semibold text-slate-700 dark:text-slate-200 small" style="font-size: 13.5px; white-space: nowrap;">এন্ট্রি:</span>
                                <div class="custom-dropdown-wrap position-relative" id="entriesDropdownContainer" style="width: auto !important;">
                                    <button type="button" class="toolbar-control-btn d-inline-flex align-items-center justify-content-between px-3 gap-2" id="entriesDropdownToggle" onclick="toggleCustomDropdown('entriesDropdownMenu')" style="width: auto !important; min-width: 80px;">
                                        <span id="currentEntriesText" class="fw-bold fs-7 fs-sm-6">১৫</span>
                                        <i class="fa-solid fa-chevron-down dropdown-arrow-icon"></i>
                                    </button>
                                    <input type="hidden" id="entries" value="15">
                                    <div class="custom-dropdown-menu" id="entriesDropdownMenu">
                                        <div class="custom-dropdown-item" data-value="10" onclick="selectEntriesOption(10, '১০')">১০ টি</div>
                                        <div class="custom-dropdown-item active" data-value="15" onclick="selectEntriesOption(15, '১৫')">১৫ টি</div>
                                        <div class="custom-dropdown-item" data-value="25" onclick="selectEntriesOption(25, '২৫')">২৫ টি</div>
                                        <div class="custom-dropdown-item" data-value="50" onclick="selectEntriesOption(50, '৫০')">৫০ টি</div>
                                        <div class="custom-dropdown-item" data-value="100" onclick="selectEntriesOption(100, '১০০')">১০০ টি</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Filter Dropdown (gap after filter icon) -->
                            <div class="custom-dropdown-wrap position-relative flex-grow-1" id="filterDropdownContainer" style="max-width: 220px;">
                                <button type="button" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-between px-3" id="filterDropdownToggle" onclick="toggleCustomDropdown('filterDropdownMenu')">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-filter me-2" style="color: #8C56D4; font-size: 13px;"></i>
                                        <span id="currentFilterText" class="fw-bold fs-7 fs-sm-6 text-truncate">ফিল্টার</span>
                                    </div>
                                    <i class="fa-solid fa-chevron-down dropdown-arrow-icon ms-1"></i>
                                </button>
                                <div class="custom-dropdown-menu dropdown-menus end-0" id="filterDropdownMenu">
                                    <a href="#" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterOption('all', 'সব সময়', event)">সব সময়</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="today" onclick="selectFilterOption('today', 'আজকের', event)">আজকের</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="7" onclick="selectFilterOption('7', 'গত ৭ দিন', event)">গত ৭ দিন</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="30" onclick="selectFilterOption('30', 'গত ৩০ দিন', event)">গত ৩০ দিন</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="365" onclick="selectFilterOption('365', 'গত বছর', event)">গত বছর</a>
                                </div>
                            </div>
                        </div>

                        <!-- Row 2: PDF & Print Buttons (1 Row, 2 Columns with gap between icon & text) -->
                        <div class="toolbar-row-2 w-100" style="display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 10px !important;">
                            <!-- PDF Button -->
                            <button type="button" id="pdfBtn" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-center px-3" title="PDF ডাউনলোড করুন">
                                <i class="fa-solid fa-file-pdf text-danger me-2" style="font-size: 15px;"></i>
                                <span class="fw-bold fs-7 fs-sm-6">PDF</span>
                            </button>

                            <!-- Print Button -->
                            <button type="button" id="printBtn" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-center px-3" title="প্রিন্ট করুন">
                                <i class="fa-solid fa-print me-2" style="color: #8C56D4; font-size: 15px;"></i>
                                <span class="fw-bold fs-7 fs-sm-6">প্রিন্ট</span>
                            </button>
                        </div>
                    </div>

                    <!-- Table View (Desktop screens >= 992px) -->
                    <div class="table-responsive d-none d-lg-block">
                        <table id="printTable" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 55px;">ক্রমিক</th>
                                    <th class="text-start" style="width: 140px;">ইনভয়েস নং</th>
                                    <th class="text-start">কাস্টমার তথ্য</th>
                                    <th class="text-start">হিসাবের বিবরণ</th>
                                    <th class="text-start">তৈরি করেছেন</th>
                                    <th class="text-start">তারিখ</th>
                                    <th class="text-center" style="width: 120px;">স্ট্যাটাস</th>
                                    <th class="text-center" style="width: 130px;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <!-- Mobile & Tablet Responsive Card List View (< 992px) - 2 Cards per row on Tablet (col-md-6) -->
                    <div id="mobileCardList" class="row g-3 d-flex flex-wrap d-lg-none mb-3 align-items-start"></div>

                    <!-- Smart Pagination & Display Info Footer -->
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between pt-3 mt-3 border-top gap-2">
                        <div class="text-muted small fw-medium" id="display-info" style="font-size: 13px;">
                            মোট ০ টির মধ্যে ০ - ০ টি ইনভয়েস প্রদর্শিত হচ্ছে
                        </div>
                        <div id="pagination" class="d-flex align-items-center gap-1.5 flex-wrap justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; {{ date('Y') }} মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-primary fw-bold text-decoration-none" style="color: #8C56D4 !important;">CodeNext IT</a></footer>
        </div>
        <!-- Table End -->
    </div>
</div>
<!-- Hero Main Content End -->

<style>
    .bg-purple-subtle {
        background-color: #f3e8ff !important;
        color: #7e22ce !important;
    }

    /* 1. Header & Title Box */
    .invoice-card-header {
        border-color: #f1f5f9;
    }
    .invoice-title-icon-box {
        width: 42px;
        height: 42px;
        background: #F3ECFB;
        color: #8C56D4;
        border: 1px solid #E5D5F7;
        flex-shrink: 0;
    }
    .invoice-main-heading {
        color: #1e293b;
        font-size: 20px;
        letter-spacing: -0.2px;
        font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;
    }

    /* 2. Standardized Form Inputs & Datepicker */
    .custom-flatpickr-input,
    .invoice-search-input {
        height: 42px !important;
        min-height: 42px !important;
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 10px !important;
        padding: 8px 14px !important;
        font-size: 14px !important;
        color: #1e293b !important;
        background: #ffffff !important;
        transition: all 0.2s ease-in-out !important;
        font-family: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
        box-shadow: none !important;
    }

    .custom-date-input-wrap .custom-flatpickr-input {
        padding-right: 38px !important;
        cursor: pointer !important;
    }

    .custom-flatpickr-input:focus,
    .invoice-search-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.2) !important;
        outline: none !important;
    }

    .calendar-addon-btn {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #8C56D4;
        cursor: pointer;
        font-size: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: auto;
        transition: transform 0.2s ease;
    }
    .calendar-addon-btn:hover {
        transform: translateY(-50%) scale(1.15);
    }

    .invoice-search-addon-icon {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 15px;
        pointer-events: none;
    }

    .invoice-search-submit-btn {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border: none !important;
        height: 42px !important;
        border-radius: 10px !important;
        font-size: 15px !important;
        font-weight: 700 !important;
        letter-spacing: 0.3px;
        transition: all 0.2s ease-in-out !important;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.25) !important;
        cursor: pointer !important;
    }
    .invoice-search-submit-btn:hover {
        background: linear-gradient(135deg, #793FC5 0%, #672EB0 100%) !important;
        box-shadow: 0 4px 14px rgba(140, 86, 212, 0.4) !important;
        transform: translateY(-1px);
        color: #ffffff !important;
    }
    .invoice-search-submit-btn:active {
        transform: translateY(0);
    }

    /* Toolbar Controls */
    .toolbar-control-btn {
        height: 42px !important;
        min-height: 42px !important;
        background: #ffffff !important;
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 10px !important;
        color: #1e293b !important;
        font-size: 13.5px !important;
        font-weight: 600 !important;
        cursor: pointer !important;
        transition: all 0.2s ease-in-out !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04) !important;
        outline: none !important;
        user-select: none;
    }
    .toolbar-control-btn:hover {
        border-color: #8C56D4 !important;
        background: #FAF7FD !important;
        color: #8C56D4 !important;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(140, 86, 212, 0.15) !important;
    }
    .dropdown-arrow-icon {
        font-size: 11px;
        color: #94a3b8;
        transition: transform 0.2s ease;
        flex-shrink: 0;
    }
    .custom-dropdown-wrap.open .dropdown-arrow-icon {
        transform: rotate(180deg);
        color: #8C56D4;
    }

    /* Custom Dropdown Menus */
    .custom-dropdown-menu {
        display: none;
        position: absolute;
        top: calc(100% + 6px);
        left: 0;
        min-width: 100%;
        width: max-content;
        max-width: 220px;
        background: #ffffff;
        border: 1px solid #E5D5F7;
        border-radius: 10px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.14);
        z-index: 1050;
        overflow: hidden;
        padding: 5px;
    }
    .custom-dropdown-menu.show {
        display: block;
        animation: dropdownFadeIn 0.18s cubic-bezier(0.16, 1, 0.3, 1);
    }
    @keyframes dropdownFadeIn {
        from { opacity: 0; transform: translateY(-6px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .custom-dropdown-item {
        padding: 8px 12px;
        font-size: 13.5px;
        font-weight: 500;
        color: #334155;
        border-radius: 6px;
        cursor: pointer !important;
        transition: all 0.15s ease;
        display: block;
        text-decoration: none !important;
    }
    .custom-dropdown-item:hover {
        background: #F3ECFB;
        color: #8C56D4;
    }
    .custom-dropdown-item.active {
        background: #8C56D4 !important;
        color: #ffffff !important;
        font-weight: 700;
    }

    /* Modern 3-Dot Action Button & Dropdown Styles */
    .action-dots-btn {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #64748b;
        transition: all 0.2s ease;
        outline: none !important;
        box-shadow: none !important;
    }
    .action-dots-btn:hover,
    .action-dots-btn:focus,
    .action-dots-btn[aria-expanded="true"] {
        background-color: #F3ECFB;
        border-color: #8C56D4;
        color: #8C56D4;
    }
    .invoice-action-dropdown-menu {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12) !important;
        padding: 6px;
    }
    .invoice-action-dropdown-menu .dropdown-item {
        padding: 8px 14px;
        font-size: 13.5px;
        color: #334155;
        border-radius: 8px;
        transition: all 0.15s ease;
    }
    .invoice-action-dropdown-menu .dropdown-item:hover {
        background-color: #F3ECFB;
        color: #8C56D4;
    }
    .invoice-action-dropdown-menu .dropdown-item.text-danger:hover {
        background-color: #FEF2F2;
        color: #DC2626;
    }

    .table-responsive {
        min-height: 280px;
        overflow: visible !important;
    }
    #mobileCardList {
        align-items: flex-start !important;
    }
    .invoice-mobile-card {
        overflow: visible !important;
        height: auto !important;
        min-height: 0 !important;
        align-self: flex-start !important;
        border: 1.5px solid #E5D5F7 !important;
        border-color: #E5D5F7 !important;
        border-radius: 14px !important;
        box-shadow: 0 2px 10px rgba(140, 86, 212, 0.08) !important;
        background-color: #ffffff;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }
    .invoice-mobile-card:hover {
        box-shadow: 0 4px 16px rgba(140, 86, 212, 0.14) !important;
        border-color: #d1b7f3 !important;
    }

    /* Print media query for Invoices List */
    @media print {
        @page {
            size: A4 landscape;
            margin: 8mm 10mm;
        }
        body, html {
            background: #ffffff !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .left-sidenav, .topbar, .invoice-card-header, .invoice-date-section, .invoice-search-box-wrap, .invoice-toolbar-section, #pagination, #mobileCardList, .action-dots-btn, .invoice-action-dropdown-menu, .dropdown {
            display: none !important;
        }
        .main-content, .page-content, .data-table, .card, .card-body {
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            box-shadow: none !important;
            width: 100% !important;
            background: transparent !important;
        }
        .table-responsive {
            display: block !important;
            overflow: visible !important;
            width: 100% !important;
        }
        #printTable {
            width: 100% !important;
            border-collapse: collapse !important;
        }
        #printTable th:last-child,
        #printTable td:last-child {
            display: none !important;
        }
        #printTable th {
            background-color: #8C56D4 !important;
            color: #ffffff !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }

    /* Modern Smart Pagination Button Styles */
    .custom-pagination-btn {
        min-width: 38px;
        height: 38px;
        padding: 0 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13.5px;
        font-weight: 600;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background-color: #ffffff;
        color: #475569;
        transition: all 0.2s ease-in-out;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .custom-pagination-btn:hover:not(.disabled):not(.active) {
        background-color: #f1f5f9;
        color: #0f172a;
        border-color: #cbd5e1;
    }

    .custom-pagination-btn.active {
        background: linear-gradient(135deg, #8C56D4, #793FC5) !important;
        color: #ffffff !important;
        border-color: #8C56D4 !important;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.35) !important;
        font-weight: 700;
    }

    .custom-pagination-btn.disabled {
        opacity: 0.45;
        cursor: not-allowed;
        background-color: #f8fafc;
        border-color: #e2e8f0;
        color: #94a3b8;
    }

    /* Financial Summary Strip in Mobile & Tablet Cards */
    .invoice-summary-strip {
        background: #FAF7FD !important; /* Soft luxury purple tint in Light mode - NO black box */
        border: 1px solid #E5D5F7 !important;
        border-radius: 10px !important;
    }
    .invoice-summary-strip .summary-label {
        font-size: 11px !important;
        color: #64748b;
        text-transform: uppercase;
        margin-bottom: 2px;
    }
    .invoice-summary-strip .summary-price {
        font-size: 13.5px !important; /* Price font size */
        font-weight: 700 !important;
        letter-spacing: -0.2px;
        white-space: nowrap !important;
    }
    .invoice-summary-strip .border-end {
        border-color: #E5D5F7 !important;
    }

    /* Flatpickr Royal Purple Theme */
    .flatpickr-calendar {
        z-index: 99999 !important;
        border-radius: 14px !important;
        border: 1.5px solid #8C56D4 !important;
        box-shadow: 0 12px 30px rgba(140, 86, 212, 0.22) !important;
        font-family: 'Poppins', 'Noto Sans Bengali', sans-serif !important;
        overflow: hidden !important;
        background: #ffffff !important;
    }
    .flatpickr-calendar .flatpickr-months {
        background-color: #8C56D4 !important;
        border-top-left-radius: 12px !important;
        border-top-right-radius: 12px !important;
        padding: 4px 0 !important;
        position: relative;
    }
    .flatpickr-calendar .flatpickr-month {
        background-color: #8C56D4 !important;
        color: #ffffff !important;
        fill: #ffffff !important;
        height: 38px !important;
    }
    .flatpickr-current-month {
        padding: 4px 0 0 0 !important;
    }
    .flatpickr-current-month .cur-month {
        font-weight: 700 !important;
        color: #ffffff !important;
        font-size: 15px !important;
        margin-right: 4px !important;
    }
    .flatpickr-current-month .flatpickr-monthDropdown-months,
    .flatpickr-current-month input.cur-year {
        color: #ffffff !important;
        font-weight: 700 !important;
    }
    .flatpickr-calendar .flatpickr-prev-month,
    .flatpickr-calendar .flatpickr-next-month {
        fill: #ffffff !important;
        color: #ffffff !important;
        padding: 6px 10px !important;
        top: 2px !important;
    }
    .flatpickr-calendar .flatpickr-prev-month svg,
    .flatpickr-calendar .flatpickr-next-month svg {
        fill: #ffffff !important;
        width: 14px !important;
        height: 14px !important;
    }
    .flatpickr-calendar .flatpickr-prev-month:hover svg,
    .flatpickr-calendar .flatpickr-next-month:hover svg {
        fill: #E5D5F7 !important;
    }
    .flatpickr-calendar .flatpickr-weekdays {
        background-color: #793FC5 !important;
        height: 30px !important;
    }
    .flatpickr-calendar span.flatpickr-weekday {
        color: #ffffff !important;
        font-weight: 600 !important;
        font-size: 12px !important;
    }
    .flatpickr-calendar .flatpickr-day {
        background-color: #ffffff;
        border-radius: 8px !important;
        color: #1e293b;
        font-weight: 500;
    }
    .flatpickr-calendar .flatpickr-day:hover {
        background-color: #F3ECFB !important;
        color: #8C56D4 !important;
        border-color: #E5D5F7 !important;
    }
    .flatpickr-calendar .flatpickr-day.selected,
    .flatpickr-calendar .flatpickr-day.selected:hover {
        background-color: #8C56D4 !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
        font-weight: 700 !important;
    }
    .flatpickr-calendar .flatpickr-day.today {
        border-color: #8C56D4 !important;
    }
    .flatpickr-calendar .flatpickr-arrow svg {
        fill: #ffffff !important;
    }

    /* ================= 8. DARK MODE FIXES ================= */
    /* Uniform slate borders (#334155) - NOT harsh/bright stark white */
    body[light-mode="dark"] .data-table .card,
    html[light-mode="dark"] .data-table .card,
    body[light-mode="dark"] .invoice-card-header,
    html[light-mode="dark"] .invoice-card-header,
    body[light-mode="dark"] .custom-flatpickr-input,
    html[light-mode="dark"] .custom-flatpickr-input,
    body[light-mode="dark"] .invoice-search-input,
    html[light-mode="dark"] .invoice-search-input,
    body[light-mode="dark"] .toolbar-control-btn,
    html[light-mode="dark"] .toolbar-control-btn,
    body[light-mode="dark"] .custom-dropdown-menu,
    html[light-mode="dark"] .custom-dropdown-menu,
    body[light-mode="dark"] .custom-pagination-btn,
    html[light-mode="dark"] .custom-pagination-btn,
    body[light-mode="dark"] .invoice-mobile-card,
    html[light-mode="dark"] .invoice-mobile-card,
    body[light-mode="dark"] .invoice-mobile-card .border-bottom,
    html[light-mode="dark"] .invoice-mobile-card .border-bottom,
    body[light-mode="dark"] .invoice-mobile-card .border-top,
    html[light-mode="dark"] .invoice-mobile-card .border-top,
    body[light-mode="dark"] .invoice-summary-strip,
    html[light-mode="dark"] .invoice-summary-strip,
    body[light-mode="dark"] .invoice-summary-strip .border-end,
    html[light-mode="dark"] .invoice-summary-strip .border-end,
    body[light-mode="dark"] #printTable,
    html[light-mode="dark"] #printTable,
    body[light-mode="dark"] #printTable thead tr th,
    html[light-mode="dark"] #printTable thead tr th,
    body[light-mode="dark"] #printTable tbody tr td,
    html[light-mode="dark"] #printTable tbody tr td,
    body[light-mode="dark"] .action-dots-btn,
    html[light-mode="dark"] .action-dots-btn,
    body[light-mode="dark"] .invoice-action-dropdown-menu,
    html[light-mode="dark"] .invoice-action-dropdown-menu,
    body[light-mode="dark"] .invoice-action-dropdown-menu .dropdown-divider,
    html[light-mode="dark"] .invoice-action-dropdown-menu .dropdown-divider {
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .action-dots-btn,
    html[light-mode="dark"] .action-dots-btn {
        background-color: #0f172a !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .action-dots-btn:hover,
    html[light-mode="dark"] .action-dots-btn:hover,
    body[light-mode="dark"] .action-dots-btn[aria-expanded="true"] {
        background-color: #1e293b !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
    }

    body[light-mode="dark"] .invoice-action-dropdown-menu,
    html[light-mode="dark"] .invoice-action-dropdown-menu {
        background-color: #1e293b !important;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6) !important;
    }
    body[light-mode="dark"] .invoice-action-dropdown-menu .dropdown-item,
    html[light-mode="dark"] .invoice-action-dropdown-menu .dropdown-item {
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .invoice-action-dropdown-menu .dropdown-item:hover,
    html[light-mode="dark"] .invoice-action-dropdown-menu .dropdown-item:hover {
        background-color: #334155 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .invoice-action-dropdown-menu .dropdown-item.text-danger:hover {
        background-color: rgba(239, 68, 68, 0.15) !important;
        color: #f87171 !important;
    }

    body[light-mode="dark"] .data-table .card,
    html[light-mode="dark"] .data-table .card {
        background-color: #1e293b !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4) !important;
    }

    body[light-mode="dark"] .invoice-title-icon-box,
    html[light-mode="dark"] .invoice-title-icon-box {
        background: #261343 !important;
        color: #D2B7F1 !important;
        border-color: #532391 !important;
    }

    body[light-mode="dark"] .invoice-main-heading,
    html[light-mode="dark"] .invoice-main-heading {
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .custom-flatpickr-input,
    html[light-mode="dark"] .custom-flatpickr-input,
    body[light-mode="dark"] .invoice-search-input,
    html[light-mode="dark"] .invoice-search-input {
        background-color: #0f172a !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .custom-flatpickr-input:focus,
    html[light-mode="dark"] .custom-flatpickr-input:focus,
    body[light-mode="dark"] .invoice-search-input:focus,
    html[light-mode="dark"] .invoice-search-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.35) !important;
    }

    body[light-mode="dark"] .calendar-addon-btn,
    html[light-mode="dark"] .calendar-addon-btn {
        color: #D2B7F1 !important;
    }

    body[light-mode="dark"] .toolbar-control-btn,
    html[light-mode="dark"] .toolbar-control-btn {
        background: #0f172a !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .toolbar-control-btn:hover,
    html[light-mode="dark"] .toolbar-control-btn:hover {
        background: #1e293b !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
    }

    body[light-mode="dark"] .custom-dropdown-menu,
    html[light-mode="dark"] .custom-dropdown-menu {
        background: #1e293b !important;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6) !important;
    }

    body[light-mode="dark"] .custom-dropdown-item,
    html[light-mode="dark"] .custom-dropdown-item {
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .custom-dropdown-item:hover,
    html[light-mode="dark"] .custom-dropdown-item:hover {
        background: #334155 !important;
        color: #D2B7F1 !important;
    }

    body[light-mode="dark"] .custom-dropdown-item.active,
    html[light-mode="dark"] .custom-dropdown-item.active {
        background: #8C56D4 !important;
        color: #ffffff !important;
    }

    body[light-mode="dark"] .custom-pagination-btn {
        background-color: #1e293b !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .custom-pagination-btn:hover:not(.disabled):not(.active) {
        background-color: #334155 !important;
        color: #ffffff !important;
    }

    body[light-mode="dark"] .custom-pagination-btn.active {
        background: linear-gradient(135deg, #8C56D4, #672EB0) !important;
        color: #ffffff !important;
        border-color: #8C56D4 !important;
    }

    body[light-mode="dark"] .custom-pagination-btn.disabled {
        background-color: #0f172a !important;
        border-color: #1e293b !important;
        color: #475569 !important;
    }

    /* Dark Mode Flatpickr */
    body[light-mode="dark"] .flatpickr-calendar,
    html[light-mode="dark"] .flatpickr-calendar {
        background: #1e293b !important;
        border-color: #8C56D4 !important;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6) !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-months,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-months {
        background-color: #672EB0 !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-month,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-month {
        background-color: #672EB0 !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-weekdays,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-weekdays {
        background-color: #532391 !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-days,
    body[light-mode="dark"] .flatpickr-calendar .dayContainer,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-days,
    html[light-mode="dark"] .flatpickr-calendar .dayContainer {
        background: #1e293b !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day {
        background-color: #1e293b !important;
        color: #f8fafc !important;
        border-color: transparent !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day:hover,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day:hover {
        background-color: #3b1d6e !important;
        color: #D2B7F1 !important;
        border-color: #793FC5 !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.selected,
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.selected:hover,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day.selected,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day.selected:hover {
        background-color: #8C56D4 !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.prevMonthDay,
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.nextMonthDay,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day.prevMonthDay,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day.nextMonthDay {
        color: #64748b !important;
        background: #1e293b !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.today,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day.today {
        border-color: #8C56D4 !important;
    }

    /* Invoice Mobile Card & Dark Mode Styling */
    body[light-mode="dark"] .invoice-mobile-card,
    html[light-mode="dark"] .invoice-mobile-card,
    body[data-layout-mode="dark"] .invoice-mobile-card,
    html[data-layout-mode="dark"] .invoice-mobile-card,
    body.dark-mode .invoice-mobile-card,
    html.dark .invoice-mobile-card,
    [data-bs-theme="dark"] .invoice-mobile-card {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.4) !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .text-dark,
    html[light-mode="dark"] .invoice-mobile-card .text-dark,
    body[data-layout-mode="dark"] .invoice-mobile-card .text-dark,
    body.dark-mode .invoice-mobile-card .text-dark,
    body[light-mode="dark"] .invoice-mobile-card h6,
    html[light-mode="dark"] .invoice-mobile-card h6,
    body[data-layout-mode="dark"] .invoice-mobile-card h6 {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .customer-title,
    html[light-mode="dark"] .invoice-mobile-card .customer-title,
    body[data-layout-mode="dark"] .invoice-mobile-card .customer-title {
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .invoice-summary-strip,
    html[light-mode="dark"] .invoice-summary-strip,
    body[data-layout-mode="dark"] .invoice-summary-strip,
    body[light-mode="dark"] .invoice-summary-grid,
    html[light-mode="dark"] .invoice-summary-grid,
    body[data-layout-mode="dark"] .invoice-summary-grid {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .invoice-summary-grid .border,
    html[light-mode="dark"] .invoice-summary-grid .border,
    body[data-layout-mode="dark"] .invoice-summary-grid .border {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .invoice-summary-strip .summary-label,
    html[light-mode="dark"] .invoice-summary-strip .summary-label {
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] .invoice-summary-strip .summary-price.text-dark,
    html[light-mode="dark"] .invoice-summary-strip .summary-price.text-dark {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .text-muted,
    html[light-mode="dark"] .invoice-mobile-card .text-muted,
    body[data-layout-mode="dark"] .invoice-mobile-card .text-muted {
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .badge.bg-light,
    html[light-mode="dark"] .invoice-mobile-card .badge.bg-light,
    body[data-layout-mode="dark"] .invoice-mobile-card .badge.bg-light {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .badge.bg-secondary-subtle,
    html[light-mode="dark"] .invoice-mobile-card .badge.bg-secondary-subtle,
    body[data-layout-mode="dark"] .invoice-mobile-card .badge.bg-secondary-subtle {
        background-color: #334155 !important;
        color: #e2e8f0 !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .border-bottom,
    html[light-mode="dark"] .invoice-mobile-card .border-bottom,
    body[data-layout-mode="dark"] .invoice-mobile-card .border-bottom,
    body[light-mode="dark"] .invoice-mobile-card .border-top,
    html[light-mode="dark"] .invoice-mobile-card .border-top,
    body[data-layout-mode="dark"] .invoice-mobile-card .border-top {
        border-color: #334155 !important;
    }

    /* Desktop Table Dark Mode */
    body[light-mode="dark"] #printTable {
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] #printTable thead tr th {
        background-color: #0f172a !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] #printTable tbody tr td {
        background-color: #1e293b !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] #printTable tbody tr:hover td {
        background-color: #273549 !important;
    }
    body[light-mode="dark"] #display-info {
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] #display-info .badge.bg-light {
        background-color: #0f172a !important;
        color: #f8fafc !important;
    }

    /* Invoice Mobile & Tablet Card styling with border color */
    @media (max-width: 991.98px) {
        .invoice-mobile-card,
        .data-table .invoice-mobile-card,
        #mobileCardList .invoice-mobile-card {
            border: 1.5px solid #E5D5F7 !important;
            border-color: #E5D5F7 !important;
            border-radius: 14px !important;
            box-shadow: 0 2px 10px rgba(140, 86, 212, 0.08) !important;
            padding: 14px !important;
            margin-bottom: 4px !important;
        }

        body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .invoice-mobile-card {
            background-color: #ffffff !important;
        }
    }

    /* Explicit Desktop Light Mode Overrides (Guarantees card and interior never turn dark on desktop in light mode) */
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .data-table > .card,
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .data-table .card-body {
        background-color: #ffffff !important;
        color: #1e293b !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .invoice-main-heading {
        color: #1e293b !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .invoice-title-icon-box {
        background: #F3ECFB !important;
        color: #8C56D4 !important;
        border-color: #E5D5F7 !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .custom-flatpickr-input,
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .invoice-search-input,
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .toolbar-control-btn {
        background-color: #ffffff !important;
        color: #1e293b !important;
        border-color: #cbd5e1 !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) #printTable {
        background-color: #ffffff !important;
        color: #1e293b !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) #printTable thead tr th {
        background-color: #f8fafc !important;
        color: #475569 !important;
        border-color: #e2e8f0 !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) #printTable tbody tr td {
        background-color: #ffffff !important;
        color: #1e293b !important;
        border-color: #e2e8f0 !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) #printTable tbody tr:hover td {
        background-color: #FAF7FD !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) #display-info {
        color: #64748b !important;
    }

    /* Modern Action Button Icons under Financial Box in Mobile & Tab Cards */
    .mobile-card-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 6px;
    }
    .mobile-action-btn {
        flex: 1 1 0;
        height: 36px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        border: 1px solid transparent;
        text-decoration: none;
    }
    .mobile-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
    }
    .mobile-action-btn.action-btn-print {
        background: #F3ECFB;
        color: #8C56D4;
        border-color: #E5D5F7;
    }
    .mobile-action-btn.action-btn-print:hover {
        background: #8C56D4;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-return {
        background: #FEF3C7;
        color: #D97706;
        border-color: #FDE68A;
    }
    .mobile-action-btn.action-btn-return:hover {
        background: #D97706;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-due {
        background: #DCFCE7;
        color: #16A34A;
        border-color: #BBF7D0;
    }
    .mobile-action-btn.action-btn-due:hover {
        background: #16A34A;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-edit {
        background: #E0F2FE;
        color: #0284C7;
        border-color: #BAE6FD;
    }
    .mobile-action-btn.action-btn-edit:hover {
        background: #0284C7;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-share {
        background: #FAF5FF;
        color: #7E22CE;
        border-color: #E9D5FF;
    }
    .mobile-action-btn.action-btn-share:hover {
        background: #7E22CE;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-delete {
        background: #FEE2E2;
        color: #DC2626;
        border-color: #FECACA;
    }
    .mobile-action-btn.action-btn-delete:hover {
        background: #DC2626;
        color: #ffffff;
    }

    /* Dark Mode styles for action buttons */
    body[light-mode="dark"] .mobile-action-btn,
    html[light-mode="dark"] .mobile-action-btn,
    body[data-layout-mode="dark"] .mobile-action-btn {
        border-color: #334155 !important;
        background: #0f172a !important;
    }
    body[light-mode="dark"] .mobile-action-btn.action-btn-print,
    html[light-mode="dark"] .mobile-action-btn.action-btn-print { color: #D2B7F1 !important; }
    body[light-mode="dark"] .mobile-action-btn.action-btn-return,
    html[light-mode="dark"] .mobile-action-btn.action-btn-return { color: #FBBF24 !important; }
    body[light-mode="dark"] .mobile-action-btn.action-btn-due,
    html[light-mode="dark"] .mobile-action-btn.action-btn-due { color: #4ADE80 !important; }
    body[light-mode="dark"] .mobile-action-btn.action-btn-edit,
    html[light-mode="dark"] .mobile-action-btn.action-btn-edit { color: #38BDF8 !important; }
    body[light-mode="dark"] .mobile-action-btn.action-btn-share,
    html[light-mode="dark"] .mobile-action-btn.action-btn-share { color: #C084FC !important; }
    body[light-mode="dark"] .mobile-action-btn.action-btn-delete,
    html[light-mode="dark"] .mobile-action-btn.action-btn-delete { color: #F87171 !important; }

    /* Summary Grid & Price Boxes in Mobile & Tablet Card */
    .invoice-summary-grid {
        background-color: #FAF7FD;
        border-color: #E5D5F7 !important;
        cursor: pointer !important;
        transition: all 0.2s ease-in-out;
    }
    .invoice-summary-grid:hover {
        border-color: #8C56D4 !important;
        background-color: #F6F0FC !important;
    }
    .invoice-summary-grid .border {
        border-color: #E5D5F7 !important;
    }
    .invoice-price-box {
        cursor: pointer !important;
        transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease, background-color 0.15s ease !important;
    }
    .invoice-price-box:hover,
    .invoice-price-box:active {
        border-color: #8C56D4 !important;
        background-color: #FAF7FE !important;
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(140, 86, 212, 0.15) !important;
    }
    @media (max-width: 991.98px) {
        .invoice-summary-grid .summary-price {
            font-size: 18.5px !important;
            font-weight: 800 !important;
            line-height: 1.3 !important;
            letter-spacing: -0.2px;
        }
        .invoice-summary-grid .summary-label {
            font-size: 12.5px !important;
            font-weight: 700 !important;
            margin-bottom: 2px !important;
        }
    }
    body[light-mode="dark"] .invoice-summary-grid,
    html[light-mode="dark"] .invoice-summary-grid,
    body[data-layout-mode="dark"] .invoice-summary-grid,
    html[data-layout-mode="dark"] .invoice-summary-grid,
    body.dark-mode .invoice-summary-grid,
    html.dark .invoice-summary-grid {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .invoice-summary-grid .border,
    html[light-mode="dark"] .invoice-summary-grid .border,
    body[data-layout-mode="dark"] .invoice-summary-grid .border,
    body.dark-mode .invoice-summary-grid .border {
        border-color: #334155 !important;
        background-color: #1e293b !important;
    }
    body[light-mode="dark"] .invoice-price-box:hover,
    html[light-mode="dark"] .invoice-price-box:hover,
    body[data-layout-mode="dark"] .invoice-price-box:hover,
    body.dark-mode .invoice-price-box:hover {
        border-color: #8C56D4 !important;
        background-color: #273549 !important;
    }
    body[light-mode="dark"] .invoice-summary-grid .summary-label,
    html[light-mode="dark"] .invoice-summary-grid .summary-label,
    body[data-layout-mode="dark"] .invoice-summary-grid .summary-label {
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] .invoice-summary-grid .summary-price.text-dark,
    html[light-mode="dark"] .invoice-summary-grid .summary-price.text-dark,
    body[data-layout-mode="dark"] .invoice-summary-grid .summary-price.text-dark {
        color: #f8fafc !important;
    }
</style>

<script>
    let currentPage = 1;
    let pageSize = 15;
    let rawInvoiceData = [];
    let startDatePickerInstance = null;
    let endDatePickerInstance = null;

    // Bengali Numeral Helper Functions
    function engToBanglaNum(num) {
        if (num === null || num === undefined) return '';
        const bngDigits = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
        return String(num).replace(/[0-9]/g, w => bngDigits[+w]);
    }

    function banglaToEngNum(str) {
        if (!str) return '';
        const bngDigits = {'০':'0','১':'1','২':'2','৩':'3','৪':'4','৫':'5','৬':'6','৭':'7','৮':'8','৯':'9'};
        return String(str).replace(/[০-৯]/g, w => bngDigits[w]);
    }

    // Helper Date Functions for DD-MM-YYYY (d-m-Y)
    function formatDateToDMY(date) {
        if (!date) return '';
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }

    function parseDMYDate(dateStr) {
        if (!dateStr) return null;
        if (dateStr instanceof Date) return dateStr;
        const engStr = banglaToEngNum(String(dateStr)).trim();
        const parts = engStr.split('-');
        if (parts.length === 3) {
            if (parts[0].length === 4) { // Y-m-d
                return new Date(parts[0], parts[1] - 1, parts[2]);
            } else { // d-m-Y
                return new Date(parts[2], parts[1] - 1, parts[0]);
            }
        }
        const d = new Date(engStr);
        return isNaN(d.getTime()) ? null : d;
    }

    function dmyToYMD(dmyStr) {
        if (!dmyStr) return '';
        const engStr = banglaToEngNum(String(dmyStr)).trim();
        const parts = engStr.split('-');
        if (parts.length === 3) {
            if (parts[0].length === 4) return engStr; // already Y-m-d
            return `${parts[2]}-${parts[1]}-${parts[0]}`; // converted to Y-m-d
        }
        return dmyStr;
    }

    // Modern Flatpickr Calendar Initialization
    function initInvoiceDatePickers() {
        if (typeof flatpickr === 'undefined') {
            setTimeout(initInvoiceDatePickers, 80);
            return;
        }

        const flatpickrConfig = {
            dateFormat: "d-m-Y",
            disableMobile: true,
            monthSelectorType: "static", // Static header with prev/next arrows (per rules.md)
            allowInput: true,
            clickOpens: true,
            parseDate: parseDMYDate,
            formatDate: formatDateToDMY
        };

        startDatePickerInstance = flatpickr("#startDate", flatpickrConfig);
        endDatePickerInstance = flatpickr("#endDate", flatpickrConfig);
    }

    function openDatePicker(inputId) {
        if (inputId === 'startDate' && startDatePickerInstance) {
            startDatePickerInstance.open();
        } else if (inputId === 'endDate' && endDatePickerInstance) {
            endDatePickerInstance.open();
        }
    }

    // Modern Dropdowns Management
    function toggleCustomDropdown(menuId) {
        const menu = document.getElementById(menuId);
        if (!menu) return;
        const isOpen = menu.classList.contains("show");
        closeAllCustomDropdowns();
        if (!isOpen) {
            menu.classList.add("show");
            const parentWrap = menu.closest(".custom-dropdown-wrap");
            if (parentWrap) parentWrap.classList.add("open");
        }
    }

    function closeAllCustomDropdowns() {
        document.querySelectorAll(".custom-dropdown-menu.show").forEach(menu => {
            menu.classList.remove("show");
            const parentWrap = menu.closest(".custom-dropdown-wrap");
            if (parentWrap) parentWrap.classList.remove("open");
        });
    }

    document.addEventListener("click", function(e) {
        if (!e.target.closest(".custom-dropdown-wrap")) {
            closeAllCustomDropdowns();
        }
    });

    function selectEntriesOption(val, banglaVal) {
        $("#entries").val(val);
        pageSize = parseInt(val) || 15;
        $("#currentEntriesText").text(banglaVal);
        $("#entriesDropdownMenu .custom-dropdown-item").removeClass("active");
        $(`#entriesDropdownMenu [data-value="${val}"]`).addClass("active");
        closeAllCustomDropdowns();
        currentPage = 1;
        renderPaginatedList();
    }

    function selectFilterOption(filter, labelText, e) {
        if (e) e.preventDefault();
        let today = new Date();
        let startDate = '';
        let endDate = formatDateToDMY(today);

        if (filter === 'today') {
            startDate = endDate;
        } else if (filter === '7') {
            let d = new Date();
            d.setDate(d.getDate() - 7);
            startDate = formatDateToDMY(d);
        } else if (filter === '30') {
            let d = new Date();
            d.setDate(d.getDate() - 30);
            startDate = formatDateToDMY(d);
        } else if (filter === '365') {
            let d = new Date();
            d.setDate(d.getDate() - 365);
            startDate = formatDateToDMY(d);
        }

        $("#startDate").val(startDate);
        $("#endDate").val(endDate);

        if (startDatePickerInstance) {
            startDatePickerInstance.setDate(startDate || '', false);
        }
        if (endDatePickerInstance) {
            endDatePickerInstance.setDate(endDate || '', false);
        }

        $("#currentFilterText").text(labelText);
        $("#filterDropdownMenu .custom-dropdown-item").removeClass("active");
        $(`#filterDropdownMenu [data-filter="${filter}"]`).addClass("active");
        closeAllCustomDropdowns();
        fetchInvoiceReport();
    }

    function getFilteredInvoices() {
        if (!rawInvoiceData || !Array.isArray(rawInvoiceData)) return [];
        let searchTerm = ($("#searchInput").val() || "").toLowerCase().trim();

        return rawInvoiceData.filter(function (item) {
            let orderNo = (item.order_no || "").toLowerCase();
            let customerName = (item.customer?.customer_name || "").toLowerCase();
            let customerMobile = (item.customer?.mobile || "").toLowerCase();
            let customerId = (item.customer?.customer_id || "").toLowerCase();
            let userName = (item.user?.name || "").toLowerCase();

            return !searchTerm || orderNo.includes(searchTerm) || customerName.includes(searchTerm) || customerMobile.includes(searchTerm) || customerId.includes(searchTerm) || userName.includes(searchTerm);
        });
    }

    function exportInvoiceListToPDF() {
        let invoices = getFilteredInvoices();
        if (!invoices || invoices.length === 0) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'warning',
                    title: 'কোনো তথ্য নেই',
                    text: 'PDF তৈরির জন্য কোনো ইনভয়েস পাওয়া যায়নি।',
                    confirmButtonColor: '#8C56D4'
                });
            } else {
                alert('PDF তৈরির জন্য কোনো ইনভয়েস পাওয়া যায়নি।');
            }
            return;
        }

        let startDate = $("#startDate").val();
        let endDate = $("#endDate").val();
        let dateRangeText = (startDate && endDate) ? `${engToBanglaNum(startDate)} থেকে ${engToBanglaNum(endDate)}` : 'সর্বশেষ ইনভয়েস বিবরণী';

        let pdfContainer = document.createElement('div');
        pdfContainer.id = 'temp-pdf-export-container';
        pdfContainer.style.position = 'fixed';
        pdfContainer.style.left = '-9999px';
        pdfContainer.style.top = '0';
        pdfContainer.style.width = '1050px';
        pdfContainer.style.background = '#ffffff';
        pdfContainer.style.padding = '20px 24px';
        pdfContainer.style.fontFamily = "'Noto Sans Bengali', 'Segoe UI', Arial, sans-serif";
        pdfContainer.style.color = '#1e293b';

        let rowsHtml = '';
        let totalSubTotal = 0;
        let totalDiscount = 0;
        let totalPaid = 0;
        let totalDue = 0;

        invoices.forEach((item, idx) => {
            const subTotal = item['sub_total'] ? parseFloat(item['sub_total']) : 0;
            const discountAmount = item['discount_amount'] ? parseFloat(item['discount_amount']) : 0;
            const paidAmount = item['paid_amount'] ? parseFloat(item['paid_amount']) : 0;
            const dueAmount = item['due_amount'] ? parseFloat(item['due_amount']) : 0;

            totalSubTotal += subTotal;
            totalDiscount += discountAmount;
            totalPaid += paidAmount;
            totalDue += dueAmount;

            let paymentStatus = '';
            let badgeBg = '#f1f5f9';
            let badgeColor = '#475569';
            if (dueAmount === 0 && paidAmount > 0) {
                paymentStatus = 'পরিশোধিত';
                badgeBg = '#dcfce7';
                badgeColor = '#166534';
            } else if (dueAmount > 0 && paidAmount > 0) {
                paymentStatus = 'আংশিক পরিশোধ';
                badgeBg = '#fef9c3';
                badgeColor = '#854d0e';
            } else if (dueAmount > 0 && paidAmount === 0) {
                paymentStatus = 'বকেয়া';
                badgeBg = '#fee2e2';
                badgeColor = '#991b1b';
            } else {
                paymentStatus = 'ফেরত';
                badgeBg = '#f3e8ff';
                badgeColor = '#6b21a8';
            }

            let formattedDate = item['invoice_date'] ? new Intl.DateTimeFormat('bn-BD', { day: '2-digit', month: 'short', year: 'numeric' }).format(new Date(item['invoice_date'])) : 'N/A';

            rowsHtml += `
                <tr style="border-bottom: 1px solid #e2e8f0; ${idx % 2 === 1 ? 'background-color: #f8fafc;' : ''}">
                    <td style="padding: 7px 6px; text-align: center; font-size: 11px; font-weight: 600;">${engToBanglaNum(idx + 1)}</td>
                    <td style="padding: 7px 6px; font-size: 11px; font-weight: 700; color: #1e293b;">${item['order_no'] || '-'}</td>
                    <td style="padding: 7px 6px; font-size: 11px;">
                        <div style="font-weight: 700; color: #8C56D4;">${item['customer']?.customer_name ?? 'সাধারণ কাস্টমার'}</div>
                        <div style="font-size: 10px; color: #64748b;">${item['customer']?.mobile ?? '-'} ${item['customer']?.customer_id ? `(আইডি: ${item['customer'].customer_id})` : ''}</div>
                    </td>
                    <td style="padding: 7px 6px; text-align: right; font-size: 11px; font-weight: 600;">৳ ${engToBanglaNum(subTotal.toFixed(2))}</td>
                    <td style="padding: 7px 6px; text-align: right; font-size: 11px; color: #64748b;">৳ ${engToBanglaNum(discountAmount.toFixed(2))}</td>
                    <td style="padding: 7px 6px; text-align: right; font-size: 11px; font-weight: 700; color: #166534;">৳ ${engToBanglaNum(paidAmount.toFixed(2))}</td>
                    <td style="padding: 7px 6px; text-align: right; font-size: 11px; font-weight: 700; color: ${dueAmount > 0 ? '#dc2626' : '#64748b'};">৳ ${engToBanglaNum(dueAmount.toFixed(2))}</td>
                    <td style="padding: 7px 6px; font-size: 10.5px; color: #475569;">${item['user']?.name ?? 'System'}</td>
                    <td style="padding: 7px 6px; font-size: 10.5px; color: #475569;">${formattedDate}</td>
                    <td style="padding: 7px 6px; text-align: center;">
                        <span style="display: inline-block; padding: 2px 7px; font-size: 9.5px; font-weight: 700; border-radius: 8px; background-color: ${badgeBg}; color: ${badgeColor};">${paymentStatus}</span>
                    </td>
                </tr>
            `;
        });

        pdfContainer.innerHTML = `
            <div style="border-bottom: 2px solid #8C56D4; padding-bottom: 10px; margin-bottom: 14px; display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <h2 style="margin: 0; color: #8C56D4; font-size: 20px; font-weight: 800; letter-spacing: -0.2px;">মেসার্স আনিস ষ্টোর</h2>
                    <div style="font-size: 10.5px; color: #64748b; margin-top: 2px;">ঝালাইপট্টি, পাবনা ৷ মোবাইলঃ ০১৭৯২-৮৩৩৭৪৭, ০১৭১১-৪৫১৩৩</div>
                </div>
                <div style="text-align: right;">
                    <h3 style="margin: 0; color: #1e293b; font-size: 15px; font-weight: 700;">বিক্রয় ইনভয়েস বিবরণী</h3>
                    <div style="font-size: 10.5px; color: #64748b; margin-top: 2px;">সময়কাল: ${dateRangeText} | মোট ইনভয়েস: ${engToBanglaNum(invoices.length)} টি</div>
                </div>
            </div>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 12px;">
                <thead>
                    <tr style="background-color: #8C56D4; color: #ffffff;">
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: center; border: 1px solid #793FC5; width: 38px;">ক্রমিক</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: left; border: 1px solid #793FC5; width: 95px;">ইনভয়েস নং</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: left; border: 1px solid #793FC5;">কাস্টমার তথ্য</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: right; border: 1px solid #793FC5; width: 90px;">মোট মূল্য</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: right; border: 1px solid #793FC5; width: 70px;">ছাড়</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: right; border: 1px solid #793FC5; width: 90px;">পরিশোধ</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: right; border: 1px solid #793FC5; width: 90px;">বকেয়া</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: left; border: 1px solid #793FC5; width: 85px;">তৈরি করেছেন</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: left; border: 1px solid #793FC5; width: 80px;">তারিখ</th>
                        <th style="padding: 7px 6px; font-size: 10.5px; text-align: center; border: 1px solid #793FC5; width: 80px;">স্ট্যাটাস</th>
                    </tr>
                </thead>
                <tbody>
                    ${rowsHtml}
                </tbody>
                <tfoot>
                    <tr style="background-color: #f1f5f9; font-weight: 700; border-top: 2px solid #cbd5e1;">
                        <td colspan="3" style="padding: 7px 6px; text-align: right; font-size: 11.5px; color: #1e293b;">সর্বমোট:</td>
                        <td style="padding: 7px 6px; text-align: right; font-size: 11.5px; color: #1e293b;">৳ ${engToBanglaNum(totalSubTotal.toFixed(2))}</td>
                        <td style="padding: 7px 6px; text-align: right; font-size: 11.5px; color: #64748b;">৳ ${engToBanglaNum(totalDiscount.toFixed(2))}</td>
                        <td style="padding: 7px 6px; text-align: right; font-size: 11.5px; color: #166534;">৳ ${engToBanglaNum(totalPaid.toFixed(2))}</td>
                        <td style="padding: 7px 6px; text-align: right; font-size: 11.5px; color: #dc2626;">৳ ${engToBanglaNum(totalDue.toFixed(2))}</td>
                        <td colspan="3" style="padding: 7px 6px;"></td>
                    </tr>
                </tfoot>
            </table>

            <div style="font-size: 9.5px; color: #94a3b8; display: flex; justify-content: space-between; margin-top: 10px; border-top: 1px solid #e2e8f0; padding-top: 6px;">
                <span>রিপোর্ট তৈরির সময়: ${new Intl.DateTimeFormat('bn-BD', { dateStyle: 'full', timeStyle: 'short' }).format(new Date())}</span>
                <span>মেসার্স আনিস ষ্টোর - সর্বস্বত্ব সংরক্ষিত</span>
            </div>
        `;

        document.body.appendChild(pdfContainer);

        let opt = {
            margin: [8, 8, 8, 8],
            filename: 'anisstore-invoices-' + new Date().toISOString().slice(0, 10) + '.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, useCORS: true, letterRendering: true, logging: false },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        };

        html2pdf().set(opt).from(pdfContainer).save().then(() => {
            document.body.removeChild(pdfContainer);
        }).catch((err) => {
            console.error('PDF export error:', err);
            document.body.removeChild(pdfContainer);
            alert('PDF তৈরিতে সমস্যা হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।');
        });
    }

    function printInvoiceListTable() {
        let invoices = getFilteredInvoices();
        if (!invoices || invoices.length === 0) {
            window.print();
            return;
        }

        let tableList = $("#printTable tbody");
        let currentHtml = tableList.html();

        let allRowsHtml = '';
        invoices.forEach((item, idx) => {
            const subTotal = item['sub_total'] ? parseFloat(item['sub_total']).toFixed(2) : '0.00';
            const discountAmount = item['discount_amount'] ? parseFloat(item['discount_amount']).toFixed(2) : '0.00';
            const paidAmount = item['paid_amount'] ? parseFloat(item['paid_amount']).toFixed(2) : '0.00';
            const dueAmount = item['due_amount'] ? parseFloat(item['due_amount']).toFixed(2) : '0.00';

            let paymentStatus = '';
            let statusBadgeClass = '';
            if (parseFloat(dueAmount) === 0 && parseFloat(paidAmount) > 0) {
                paymentStatus = 'পরিশোধিত';
                statusBadgeClass = 'bg-success-subtle text-success border border-success-subtle';
            } else if (parseFloat(dueAmount) > 0 && parseFloat(paidAmount) > 0) {
                paymentStatus = 'আংশিক পরিশোধ';
                statusBadgeClass = 'bg-warning-subtle text-warning-emphasis border border-warning-subtle';
            } else if (parseFloat(dueAmount) > 0 && parseFloat(paidAmount) === 0) {
                paymentStatus = 'বকেয়া';
                statusBadgeClass = 'bg-danger-subtle text-danger border border-danger-subtle';
            } else {
                paymentStatus = 'ফেরত';
                statusBadgeClass = 'bg-purple-subtle text-purple border border-purple-subtle';
            }

            let formattedDate = item['invoice_date'] ? new Intl.DateTimeFormat('bn-BD', { day: '2-digit', month: 'short', year: 'numeric' }).format(new Date(item['invoice_date'])) : 'N/A';

            allRowsHtml += `
                <tr>
                    <td class="text-center fw-bold" style="font-size: 14px;">${engToBanglaNum(idx + 1)}</td>
                    <td class="fw-bold text-dark" style="font-size: 14px;">${item['order_no'] || '-'}</td>
                    <td>
                        <div class="fw-bold text-dark" style="font-size: 14.5px;">${item['customer']?.customer_name ?? 'সাধারণ কাস্টমার'}</div>
                        <div class="text-muted" style="font-size: 12px;">${item['customer']?.mobile ?? '-'}</div>
                    </td>
                    <td>
                        <div style="font-size: 13px;">মোট: <span class="fw-bold">৳ ${engToBanglaNum(subTotal)}</span></div>
                        <div class="text-muted" style="font-size: 12px;">ছাড়: ৳ ${engToBanglaNum(discountAmount)}</div>
                        <div class="text-success" style="font-size: 13px;">পরিশোধ: <span class="fw-bold">৳ ${engToBanglaNum(paidAmount)}</span></div>
                        ${parseFloat(dueAmount) > 0 ? `<div class="text-danger fw-bold" style="font-size: 13px;">বকেয়া: ৳ ${engToBanglaNum(dueAmount)}</div>` : ''}
                    </td>
                    <td class="text-secondary" style="font-size: 13px;">${item['user']?.name ?? 'System'}</td>
                    <td class="text-muted" style="font-size: 13px;">${formattedDate}</td>
                    <td class="text-center">
                        <span class="badge ${statusBadgeClass} px-2.5 py-1 fw-bold" style="font-size: 11px; border-radius: 12px;">
                            ${paymentStatus}
                        </span>
                    </td>
                    <td></td>
                </tr>
            `;
        });

        tableList.html(allRowsHtml);
        window.print();
        setTimeout(() => {
            tableList.html(currentHtml);
        }, 500);
    }

    $(document).ready(function() {
        initInvoiceDatePickers();
        $("#entries").val("15");
        fetchInvoiceReport();

        // High Quality Bengali Unicode PDF and Full Width Print Handlers
        $(document).on("click", "#pdfBtn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            exportInvoiceListToPDF();
        });

        $(document).on("click", "#printBtn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            printInvoiceListTable();
        });
    });

    $("#searchInput").on("keyup search input", function () {
        currentPage = 1;
        renderPaginatedList();
    });

    function viewReturn(id) {
        window.location.href = `/return/${id}`;
    }

    function viewInvoice(id) {
        window.location.href = `/invoice/${id}`;
    }

    function shareInvoice(id, orderNo) {
        let invoiceUrl = window.location.origin + '/invoice/' + id;
        let shareData = {
            title: 'ইনভয়েস #' + (orderNo || id),
            text: 'ইনভয়েস নং: ' + (orderNo || id) + ' দেখুন ও প্রিন্ট করুন',
            url: invoiceUrl
        };

        if (navigator.share && navigator.canShare && navigator.canShare(shareData)) {
            navigator.share(shareData).catch((err) => {
                if (err.name !== 'AbortError') {
                    copyInvoiceLink(invoiceUrl);
                }
            });
        } else {
            copyInvoiceLink(invoiceUrl);
        }
    }

    function copyInvoiceLink(url) {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url).then(() => {
                if (typeof successToast === 'function') {
                    successToast('ইনভয়েস লিংক ক্লিপবোর্ডে কপি করা হয়েছে!');
                } else {
                    alert('ইনভয়েস লিংক ক্লিপবোর্ডে কপি করা হয়েছে!');
                }
            }).catch(() => {
                promptCopyFallback(url);
            });
        } else {
            promptCopyFallback(url);
        }
    }

    function promptCopyFallback(url) {
        let tempInput = document.createElement("input");
        tempInput.value = url;
        document.body.appendChild(tempInput);
        tempInput.select();
        try {
            document.execCommand("copy");
            if (typeof successToast === 'function') {
                successToast('ইনভয়েস লিংক ক্লিপবোর্ডে কপি করা হয়েছে!');
            } else {
                alert('ইনভয়েস লিংক ক্লিপবোর্ডে কপি করা হয়েছে!');
            }
        } catch (e) {
            prompt("ইনভয়েস লিংকটি কপি করুন:", url);
        }
        document.body.removeChild(tempInput);
    }

    function deleteInvoicePrompt(id, orderNo) {
        let dispOrder = orderNo || id;
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'ইনভয়েস মুছে ফেলতে চান?',
                text: `ইনভয়েস #${dispOrder} মুছে ফেলা সংরক্ষিত। ইনভয়েস মুছে ফেললে হিসাব ও স্টক সমন্বয়ে অসঙ্গতি হতে পারে। প্রয়োজনে রিটার্ন অথবা এডিট করুন।`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#8C56D4',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'বুঝেছি',
                cancelButtonText: 'বাতিল'
            });
        } else {
            alert(`ইনভয়েস #${dispOrder} মুছে ফেলা সংরক্ষিত। ইনভয়েস মুছে ফেললে হিসাব ও স্টক সমন্বয়ে অসঙ্গতি হতে পারে। প্রয়োজনে রিটার্ন অথবা এডিট করুন।`);
        }
    }

    async function fetchInvoiceReport() {
        const rawStart = document.getElementById("startDate").value;
        const rawEnd = document.getElementById("endDate").value;
        const startDate = dmyToYMD(rawStart);
        const endDate = dmyToYMD(rawEnd);
        await getList(startDate, endDate);
    }

    async function getList(startDate = '', endDate = '') {
        try {
            showLoader();
            let res = await axios.get("/api/invoice-order-payment-details", {
                ...HeaderToken(),
                params: {
                    start_date: startDate,
                    end_date: endDate
                }
            });
            hideLoader();

            if (Array.isArray(res.data['InvoicePaymentDetails'])) {
                rawInvoiceData = res.data['InvoicePaymentDetails'];
            } else {
                rawInvoiceData = [];
            }

            currentPage = 1;
            renderPaginatedList();

        } catch (e) {
            hideLoader();
            console.error(e);
            unauthorized(e.response ? e.response.status : 500);
        }
    }

    function renderPaginatedList() {
        if (!rawInvoiceData) return;

        // 1. Filter Invoices
        let filtered = getFilteredInvoices();

        // 2. Pagination Calculations
        let totalItems = filtered.length;
        let totalPages = Math.ceil(totalItems / pageSize) || 1;
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        let startIndex = (currentPage - 1) * pageSize;
        let endIndex = Math.min(startIndex + pageSize, totalItems);
        let pageItems = filtered.slice(startIndex, endIndex);

        let tableList = $("#printTable tbody");
        let mobileCardList = $("#mobileCardList");

        tableList.empty();
        mobileCardList.empty();

        if (pageItems.length === 0) {
            tableList.html('<tr><td colspan="8" class="text-center text-danger p-4 fw-bold">❌ কোনো ইনভয়েস পাওয়া যায়নি।</td></tr>');
            mobileCardList.html('<div class="col-12 p-4 text-center text-danger fw-bold bg-white rounded-3 border shadow-sm">❌ কোনো ইনভয়েস পাওয়া যায়নি।</div>');
        } else {
            pageItems.forEach(function (item, idx) {
                let realIndex = startIndex + idx;
                const subTotal = item['sub_total'] ? parseFloat(item['sub_total']).toFixed(2) : '0.00';
                const discountAmount = item['discount_amount'] ? parseFloat(item['discount_amount']).toFixed(2) : '0.00';
                const paidAmount = item['paid_amount'] ? parseFloat(item['paid_amount']).toFixed(2) : '0.00';
                const dueAmount = item['due_amount'] ? parseFloat(item['due_amount']).toFixed(2) : '0.00';

                let paymentStatus = '';
                let statusBadgeClass = '';
                if (parseFloat(dueAmount) === 0 && parseFloat(paidAmount) > 0) {
                    paymentStatus = 'পরিশোধিত';
                    statusBadgeClass = 'bg-success-subtle text-success border border-success-subtle';
                } else if (parseFloat(dueAmount) > 0 && parseFloat(paidAmount) > 0) {
                    paymentStatus = 'আংশিক পরিশোধ';
                    statusBadgeClass = 'bg-warning-subtle text-warning-emphasis border border-warning-subtle';
                } else if (parseFloat(dueAmount) > 0 && parseFloat(paidAmount) === 0) {
                    paymentStatus = 'বকেয়া';
                    statusBadgeClass = 'bg-danger-subtle text-danger border border-danger-subtle';
                } else {
                    paymentStatus = 'ফেরত';
                    statusBadgeClass = 'bg-purple-subtle text-purple border border-purple-subtle';
                }

                let formattedDate = item['invoice_date'] ? new Intl.DateTimeFormat('bn-BD', { day: '2-digit', month: 'short', year: 'numeric' }).format(new Date(item['invoice_date'])) : 'N/A';

                // Desktop Row - Larger font sizes for table & prices
                let row = `
                    <tr>
                        <td class="text-center fw-bold" style="font-size: 14.5px;">${engToBanglaNum(realIndex + 1)}</td>
                        <td class="fw-bold text-dark" style="font-size: 14.5px;">${item['order_no'] || '-'}</td>
                        <td>
                            ${item['customer']?.id ? `
                                <a href="/customer/profile/${item['customer'].id}" class="text-decoration-none" title="কাস্টমার প্রোফাইল দেখুন">
                                    <div class="fw-bold text-primary" style="font-size: 15px; color: #8C56D4 !important;">${item['customer']?.customer_name ?? 'সাধারণ কাস্টমার'}</div>
                                </a>
                            ` : `
                                <div class="fw-bold text-dark" style="font-size: 15px;">${item['customer']?.customer_name ?? 'সাধারণ কাস্টমার'}</div>
                            `}
                            <div class="text-muted" style="font-size: 12.5px;"><i class="fa-solid fa-phone me-1 fs-7"></i>${item['customer']?.mobile ?? '-'}</div>
                            ${item['customer']?.customer_id ? `
                                <a href="/customer/profile/${item['customer'].id}" class="text-decoration-none" title="কাস্টমার প্রোফাইল দেখুন">
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-bold" style="font-size: 11px; cursor: pointer;">
                                        আইডি: ${item['customer'].customer_id} <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size: 9px;"></i>
                                    </span>
                                </a>
                            ` : ''}
                        </td>
                        <td>
                            <div style="font-size: 13.5px;">মোট: <span class="fw-bold text-dark" style="font-size: 15px;">৳ ${engToBanglaNum(subTotal)}</span></div>
                            <div class="text-muted" style="font-size: 12.5px;">ছাড়: ৳ ${engToBanglaNum(discountAmount)}</div>
                            <div class="text-success" style="font-size: 13.5px;">পরিশোধ: <span class="fw-bold" style="font-size: 15px;">৳ ${engToBanglaNum(paidAmount)}</span></div>
                            ${parseFloat(dueAmount) > 0 ? `<div class="text-danger fw-bold" style="font-size: 14px;">বকেয়া: ৳ ${engToBanglaNum(dueAmount)}</div>` : ''}
                        </td>
                        <td class="fw-semibold text-secondary" style="font-size: 13.5px;"><i class="fa-solid fa-user me-1"></i>${item['user']?.name ?? 'System'}</td>
                        <td class="text-muted" style="font-size: 13px;"><i class="fa-regular fa-calendar me-1"></i>${formattedDate}</td>
                        <td class="text-center">
                            <span class="badge ${statusBadgeClass} px-2.5 py-1.5 fw-bold" style="font-size: 12px; border-radius: 12px;">
                                ${paymentStatus}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border rounded-circle d-flex align-items-center justify-content-center action-dots-btn mx-auto" type="button" data-bs-toggle="dropdown" data-bs-boundary="viewport" aria-expanded="false" title="অ্যাকশন মেনু" style="width: 34px; height: 34px;">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 py-2 invoice-action-dropdown-menu" style="min-width: 175px; z-index: 1060;">
                                    <li>
                                        <a class="dropdown-item py-2 px-3 d-flex align-items-center gap-2.5" href="javascript:void(0)" onclick="viewInvoice(${item.id})">
                                            <i class="fa-solid fa-print text-primary" style="width: 18px;"></i>
                                            <span class="fw-semibold">প্রিন্ট ইনভয়েস</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 px-3 d-flex align-items-center gap-2.5" href="javascript:void(0)" onclick="viewReturn(${item.id})">
                                            <i class="fa-solid fa-rotate-left text-warning" style="width: 18px;"></i>
                                            <span class="fw-semibold">পণ্য ফেরত</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 px-3 d-flex align-items-center gap-2.5 edit-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${item.id}">
                                            <i class="fa-solid fa-hand-holding-dollar text-success" style="width: 18px;"></i>
                                            <span class="fw-semibold">বকেয়া সংগ্রহ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 px-3 d-flex align-items-center gap-2.5 edit-link" href="#" data-bs-toggle="modal" data-bs-target="#invoiceFullEditModal" data-id="${item.id}">
                                            <i class="fa-solid fa-pen-to-square text-info" style="width: 18px;"></i>
                                            <span class="fw-semibold">ইনভয়েস এডিট</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 px-3 d-flex align-items-center gap-2.5" href="javascript:void(0)" onclick="shareInvoice(${item.id}, '${item.order_no || ''}')">
                                            <i class="fa-solid fa-share-nodes" style="width: 18px; color: #8C56D4;"></i>
                                            <span class="fw-semibold">শেয়ার করুন</span>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1 opacity-25"></li>
                                    <li>
                                        <a class="dropdown-item py-2 px-3 d-flex align-items-center gap-2.5 text-danger" href="javascript:void(0)" onclick="deleteInvoicePrompt(${item.id}, '${item.order_no || ''}')">
                                            <i class="fa-solid fa-trash-can text-danger" style="width: 18px;"></i>
                                            <span class="fw-semibold">মুছে ফেলুন</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>`;
                tableList.append(row);

                // Mobile & Tablet Card View (col-12 on mobile, col-md-6 on tablet = 2 per row)
                let mobileCard = `
                    <div class="col-12 col-md-6 mb-2 align-self-start">
                        <div class="invoice-mobile-card card border shadow-sm rounded-4 p-3 pb-2.5 position-relative mb-0" onclick="if (!event.target.closest('.mobile-card-actions, a, button')) { viewInvoice(${item.id}); }" style="cursor: pointer;">
                            <!-- Top Bar: Serial + Order No on left, Status Badge on right -->
                            <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                <div class="d-flex align-items-center gap-1.5">
                                    <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 11px;">#${engToBanglaNum(realIndex + 1)}</span>
                                    <span class="badge bg-light text-dark border fw-bold" style="font-size: 12px; cursor: pointer;" onclick="event.stopPropagation(); viewInvoice(${item.id})" title="ইনভয়েস প্রিন্ট ভিউ দেখুন">
                                        <i class="fa-solid fa-file-invoice me-1 text-primary" style="color: #8C56D4 !important;"></i>${item['order_no'] || '-'}
                                    </span>
                                </div>
                                <div>
                                    <span class="badge ${statusBadgeClass} px-2.5 py-1 fw-bold" style="font-size: 11px; border-radius: 12px;">
                                        ${paymentStatus}
                                    </span>
                                </div>
                            </div>

                            <!-- Customer Info: Name on left, ID on the far right of the card, Calendar Date directly under name (no phone number) -->
                            <div class="mb-2">
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <div class="d-flex align-items-center gap-1.5 text-truncate">
                                        ${item['customer']?.id ? `
                                            <a href="/customer/profile/${item['customer'].id}" class="text-decoration-none text-truncate" onclick="event.stopPropagation();" title="কাস্টমার প্রোফাইল দেখুন">
                                                <h6 class="fw-bold mb-0 customer-title text-truncate" style="font-size: 15.5px; color: #8C56D4 !important;">
                                                    <i class="fa-solid fa-user-circle me-1" style="color: #8C56D4;"></i>${item['customer']?.customer_name ?? 'সাধারণ কাস্টমার'}
                                                </h6>
                                            </a>
                                        ` : `
                                            <h6 class="fw-bold text-dark mb-0 customer-title text-truncate" style="font-size: 15.5px;">
                                                <i class="fa-solid fa-user-circle me-1" style="color: #8C56D4;"></i>${item['customer']?.customer_name ?? 'সাধারণ কাস্টমার'}
                                            </h6>
                                        `}
                                    </div>
                                    ${item['customer']?.customer_id ? `
                                        <a href="/customer/profile/${item['customer'].id}" class="text-decoration-none flex-shrink-0" onclick="event.stopPropagation();" title="কাস্টমার প্রোফাইল দেখুন">
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-bold" style="font-size: 11px;">
                                                আইডি: ${item['customer'].customer_id}
                                            </span>
                                        </a>
                                    ` : ''}
                                </div>
                                <div class="text-muted mt-1" style="font-size: 12px;">
                                    <i class="fa-regular fa-calendar me-1" style="color: #8C56D4;"></i>${formattedDate}
                                    <span class="ms-1 opacity-75">(${item['user']?.name ?? 'System'})</span>
                                </div>
                            </div>

                            <!-- 2-Column Financial Summary Grid with larger font size & clickable for print view -->
                            <div class="invoice-summary-grid rounded-3 p-2 my-2 border" onclick="event.stopPropagation(); viewInvoice(${item.id})" role="button" title="ইনভয়েস প্রিন্ট ভিউ দেখুন" style="cursor: pointer;">
                                <div class="row g-2 text-center">
                                    <div class="col-6">
                                        <div class="invoice-price-box p-2 rounded-2 border bg-white dark:bg-slate-800" onclick="event.stopPropagation(); viewInvoice(${item.id})" title="ইনভয়েস প্রিন্ট ভিউ দেখুন">
                                            <span class="summary-label d-block text-muted small fw-semibold" style="font-size: 12.5px;">মোট</span>
                                            <span class="summary-price fw-bold text-dark text-nowrap" style="font-size: 18.5px; font-weight: 800;">৳ ${engToBanglaNum(subTotal)}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box p-2 rounded-2 border bg-white dark:bg-slate-800" onclick="event.stopPropagation(); viewInvoice(${item.id})" title="ইনভয়েস প্রিন্ট ভিউ দেখুন">
                                            <span class="summary-label d-block text-muted small fw-semibold" style="font-size: 12.5px;">ছাড়</span>
                                            <span class="summary-price fw-bold text-secondary text-nowrap" style="font-size: 18.5px; font-weight: 800;">৳ ${engToBanglaNum(discountAmount)}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box p-2 rounded-2 border bg-white dark:bg-slate-800" onclick="event.stopPropagation(); viewInvoice(${item.id})" title="ইনভয়েস প্রিন্ট ভিউ দেখুন">
                                            <span class="summary-label d-block text-success small fw-semibold" style="font-size: 12.5px;">পরিশোধ</span>
                                            <span class="summary-price fw-bold text-success text-nowrap" style="font-size: 18.5px; font-weight: 800;">৳ ${engToBanglaNum(paidAmount)}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box p-2 rounded-2 border bg-white dark:bg-slate-800" onclick="event.stopPropagation(); viewInvoice(${item.id})" title="ইনভয়েস প্রিন্ট ভিউ দেখুন">
                                            <span class="summary-label d-block ${parseFloat(dueAmount) > 0 ? 'text-danger' : 'text-muted'} small fw-semibold" style="font-size: 12.5px;">বকেয়া</span>
                                            <span class="summary-price fw-bold ${parseFloat(dueAmount) > 0 ? 'text-danger' : 'text-muted'} text-nowrap" style="font-size: 18.5px; font-weight: 800;">৳ ${engToBanglaNum(dueAmount)}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modern Action Buttons Strip below Financial Grid -->
                            <div class="mobile-card-actions pt-2 mt-1 border-top" onclick="event.stopPropagation();">
                                <button type="button" class="mobile-action-btn action-btn-print" onclick="event.stopPropagation(); viewInvoice(${item.id})" title="প্রিন্ট করুন">
                                    <i class="fa-solid fa-print"></i>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-return" onclick="event.stopPropagation(); viewReturn(${item.id})" title="পণ্য ফেরত">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-due edit-link" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${item.id}" title="বকেয়া সংগ্রহ">
                                    <i class="fa-solid fa-hand-holding-dollar"></i>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-edit edit-link" data-bs-toggle="modal" data-bs-target="#invoiceFullEditModal" data-id="${item.id}" title="ইনভয়েস এডিট">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-share" onclick="event.stopPropagation(); shareInvoice(${item.id}, '${item.order_no || ''}')" title="শেয়ার করুন">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-delete" onclick="event.stopPropagation(); deleteInvoicePrompt(${item.id}, '${item.order_no || ''}')" title="মুছে ফেলুন">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    </div>`;
                mobileCardList.append(mobileCard);
            });
        }

        // 3. Update Display Info & Pagination UI in Bengali
        let fromCount = totalItems > 0 ? startIndex + 1 : 0;
        let toCount = endIndex;
        $("#display-info").html(`মোট <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 mx-1 fw-bold fs-6">${engToBanglaNum(totalItems)}</span> টির মধ্যে <span class="badge bg-light text-dark border px-2 py-1 mx-1 fw-bold fs-6">${engToBanglaNum(fromCount)} - ${engToBanglaNum(toCount)}</span> টি ইনভয়েস প্রদর্শিত হচ্ছে`);

        renderPaginationControls(totalPages);
    }

    function renderPaginationControls(totalPages) {
        let pagContainer = $("#pagination");
        pagContainer.empty();

        if (totalPages <= 1) return;

        // Prev Button
        let prevDisabled = currentPage === 1 ? 'disabled' : '';
        let prevBtn = `<button type="button" class="custom-pagination-btn ${prevDisabled}" ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})">
            <i class="fa-solid fa-chevron-left me-1"></i> পূর্ববর্তী
        </button>`;
        pagContainer.append(prevBtn);

        // Smart Page Numbers
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, currentPage + 2);

        if (startPage > 1) {
            pagContainer.append(`<button type="button" class="custom-pagination-btn" onclick="goToPage(1)">১</button>`);
            if (startPage > 2) {
                pagContainer.append(`<span class="px-1 text-muted fw-bold">...</span>`);
            }
        }

        for (let p = startPage; p <= endPage; p++) {
            let activeClass = (p === currentPage) ? 'active' : '';
            let pageBtn = `<button type="button" class="custom-pagination-btn ${activeClass}" onclick="goToPage(${p})">${engToBanglaNum(p)}</button>`;
            pagContainer.append(pageBtn);
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                pagContainer.append(`<span class="px-1 text-muted fw-bold">...</span>`);
            }
            pagContainer.append(`<button type="button" class="custom-pagination-btn" onclick="goToPage(${totalPages})">${engToBanglaNum(totalPages)}</button>`);
        }

        // Next Button
        let nextDisabled = currentPage === totalPages ? 'disabled' : '';
        let nextBtn = `<button type="button" class="custom-pagination-btn ${nextDisabled}" ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})">
            পরবর্তী <i class="fa-solid fa-chevron-right ms-1"></i>
        </button>`;
        pagContainer.append(nextBtn);
    }

    function goToPage(page) {
        currentPage = page;
        renderPaginatedList();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

</script>
