<!-- Flatpickr CSS & JS per rules.md -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Return Management Main Content Start -->
<div class="main-content">
    <div class="page-content" style="padding: 10px !important;">
        <div class="data-table border-0 shadow-none bg-transparent">
            <div class="border-0 border-none shadow-none bg-transparent">
                <div class="card-body border-0 p-0" style="padding: 0px !important; background: transparent !important;">

                    <!-- 1. Header: Matches Supplier List Layout -->
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3 pb-2 border-bottom">
                        <!-- Left: Purple Accent Bar + Title -->
                        <div class="d-flex align-items-center gap-2 flex-grow-1 overflow-hidden">
                            <span style="display: inline-block; width: 4.5px; height: 22px; background: #8C56D4; border-radius: 2px; margin-right: 6px; flex-shrink: 0;"></span>
                            <div class="invoice-title-icon-box rounded-3 d-none d-lg-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; background: #F3ECFB; color: #8C56D4;">
                                <i class="fa-solid fa-arrow-rotate-left fs-6"></i>
                            </div>
                            <h4 class="m-0 p-0 fw-bold text-dark d-flex align-items-center gap-1.5" style="font-size: 18px; line-height: 1.3;">
                                <span>পণ্য রিটার্ন ব্যবস্থাপনা</span>
                            </h4>
                        </div>

                        <!-- Right: Actions for Mobile/Tab & Desktop -->
                        <div class="d-flex align-items-center gap-2 flex-shrink-0">
                            <!-- Mobile Search Toggle Button -->
                            <button type="button" id="mobileSearchToggleBtn" class="mobile-header-icon-btn d-lg-none" onclick="toggleMobileSearchBar()" title="অনুসন্ধান">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>

                            <!-- Filter Dropdown Button -->
                            <div class="custom-dropdown-wrap position-relative" id="filterDropdownContainer">
                                <button type="button" class="mobile-header-icon-btn" id="filterDropdownToggle" onclick="toggleCustomDropdown('filterDropdownMenu')" title="ফিল্টার">
                                    <i class="fa-solid fa-filter"></i>
                                </button>
                                <div class="custom-dropdown-menu dropdown-menus end-0 shadow-lg" id="filterDropdownMenu" style="min-width: 175px;">
                                    <a href="javascript:void(0)" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterDate('all', 'সকল রিটার্ন', event)">
                                        <i class="fa-solid fa-list me-1.5 opacity-75"></i> <span>সকল রিটার্ন</span>
                                    </a>
                                    <a href="javascript:void(0)" class="custom-dropdown-item" data-filter="today" onclick="selectFilterDate('today', 'আজকের রিটার্ন', event)">
                                        <i class="fa-solid fa-calendar-day me-1.5 opacity-75"></i> <span>আজকের রিটার্ন</span>
                                    </a>
                                    <a href="javascript:void(0)" class="custom-dropdown-item" data-filter="last_7_days" onclick="selectFilterDate('last_7_days', 'গত ৭ দিন', event)">
                                        <i class="fa-solid fa-calendar-week me-1.5 opacity-75"></i> <span>গত ৭ দিন</span>
                                    </a>
                                    <a href="javascript:void(0)" class="custom-dropdown-item" data-filter="last_month" onclick="selectFilterDate('last_month', 'গত মাস', event)">
                                        <i class="fa-solid fa-calendar-days me-1.5 opacity-75"></i> <span>গত মাস</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Desktop New Return Button -->
                            <button type="button" id="mainNewReturnBtn" onclick="triggerNewReturnModal()" class="btn btn-primary d-none d-lg-inline-flex align-items-center gap-1.5 px-3 py-2 fw-bold text-white shadow-sm" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; border-radius: 10px; font-size: 13.5px;">
                                <i class="fa-solid fa-plus"></i>
                                <span id="mainNewReturnBtnText">নতুন রিটার্ন</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Search Bar Section (Above Tab Buttons per user request) -->
                    <!-- Mobile Expandable Search Bar -->
                    <div id="mobileSearchWrap" class="mb-3 d-none position-relative">
                        <div class="d-flex align-items-center gap-2 mb-0">
                            <div class="position-relative flex-grow-1 mb-0">
                                <input type="text" id="mobileSearchInput" class="form-control invoice-search-input mb-0" placeholder="🔍 রিটার্ন খুঁজুন (ইনভয়েস, কাস্টমার, পণ্য)..." autocomplete="off" />
                                <div id="mobileSearchDropdown" class="search-live-dropdown shadow-lg rounded-3 d-none position-absolute w-100 start-0"></div>
                            </div>
                            <button type="button" class="mobile-search-close-btn mb-0" onclick="closeMobileSearchBar()" title="বন্ধ করুন">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Desktop Search & Quick Trigger Toolbar (>= 992px) -->
                    <div class="invoice-toolbar-section mb-3 d-none d-lg-flex align-items-center justify-content-between gap-3">
                        <!-- Left: Live Search Box -->
                        <div class="position-relative flex-grow-1" style="max-width: 440px;">
                            <input type="text" id="searchInput" class="form-control invoice-search-input ps-5" placeholder="🔍 রিটার্ন খুঁজুন (ইনভয়েস, কাস্টমার, পণ্য)..." autocomplete="off" />
                            <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="left: 16px; top: 50%; transform: translateY(-50%); font-size: 14px;"></i>
                            <div id="desktopSearchDropdown" class="search-live-dropdown shadow-lg rounded-3 d-none position-absolute w-100 start-0"></div>
                        </div>

                        <!-- Right: Quick Memo Search Group -->
                        <div class="d-flex align-items-center gap-2">
                            <div class="input-group" style="width: 320px;">
                                <span class="input-group-text bg-white dark-input border-end-0 text-muted" style="border-radius: 10px 0 0 10px; border-color: #cbd5e1;">
                                    <i id="quickSearchAddonIcon" class="fa-solid fa-receipt" style="color: #8C56D4;"></i>
                                </span>
                                <input type="text" id="quickInvoiceSearchInput" class="form-control dark-input border-start-0" placeholder="ইনভয়েস বা মেমো নম্বর লিখুন..." onkeydown="if(event.key==='Enter') triggerQuickReturnSearch()" style="height: 40px; font-size: 13px;" />
                                <button type="button" onclick="triggerQuickReturnSearch()" class="btn btn-primary px-3 fw-bold" style="border-radius: 0 10px 10px 0; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; font-size: 13px;">
                                    <i class="fa-solid fa-arrow-right-to-bracket me-1"></i> প্রসেস
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Top Dynamic Summary Strip (1 Row, 2 Columns, Vertical Divider, Purple Color per rules.md 7.2) -->
                    <div class="invoice-top-summary-strip mb-3 p-2.5 px-3 bg-white" style="border-radius: 6px !important; border: none !important; box-shadow: 0 4px 18px rgba(140, 86, 212, 0.08), 0 1px 3px rgba(0, 0, 0, 0.04) !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Left: মোট রিটার্ন সংখ্যা -->
                            <div class="d-flex flex-column text-start ps-1 flex-grow-1">
                                <span class="text-muted small fw-medium" id="topSummaryLabelCount" style="font-size: 12px;">মোট বিক্রি রিটার্ন</span>
                                <span class="fw-bold" id="topSummaryTotalCount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">০ টি</span>
                            </div>

                            <!-- Middle Vertical Divider Bar -->
                            <div class="summary-divider-bar" style="width: 1.5px; height: 32px; background-color: #E5D5F7; flex-shrink: 0; margin: 0 16px;"></div>

                            <!-- Right: মোট রিফান্ড মূল্য -->
                            <div class="d-flex flex-column text-end pe-1 flex-grow-1">
                                <span class="text-muted small fw-medium" id="topSummaryLabelAmount" style="font-size: 12px;">মোট রিফান্ড পরিশোধ</span>
                                <span class="fw-bold" id="topSummaryTotalAmount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">৳ ০.০০</span>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Mode Switcher Nav Tabs (Directly above Table / Box Cards per user request) -->
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <button type="button" id="tabSalesReturnBtn" onclick="switchReturnTab('sales')" class="return-mode-pill-btn active d-inline-flex align-items-center py-2 px-3 fw-bold" style="border-radius: 10px; font-size: 13px; gap: 8px !important;">
                            <i class="fa-solid fa-cart-shopping me-1"></i>
                            <span>বিক্রি রিটার্ন</span>
                        </button>
                        <button type="button" id="tabPurchaseReturnBtn" onclick="switchReturnTab('purchase')" class="return-mode-pill-btn d-inline-flex align-items-center py-2 px-3 fw-bold" style="border-radius: 10px; font-size: 13px; gap: 8px !important;">
                            <i class="fa-solid fa-truck-ramp-box me-1"></i>
                            <span>ক্রয় রিটার্ন</span>
                        </button>
                    </div>

                    <!-- Desktop Table View (>= 992px) -->
                    <div class="table-responsive d-none d-lg-block return-table-container shadow-sm overflow-hidden mb-3">
                        <table id="printTable" class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted small uppercase">
                                <tr>
                                    <th class="ps-4 py-3" style="width: 50px;">#</th>
                                    <th class="py-3" style="width: 120px;">তারিখ</th>
                                    <th class="py-3" id="thInvoiceNo" style="width: 130px;">ইনভয়েস নং</th>
                                    <th class="py-3" id="thPartyName">কাস্টমার নাম</th>
                                    <th class="py-3">রিটার্নকৃত পণ্য</th>
                                    <th class="py-3 text-center" style="width: 90px;">পরিমাণ</th>
                                    <th class="py-3 text-end" style="width: 130px;">রিফান্ড মূল্য</th>
                                    <th class="pe-4 py-3 text-center" style="width: 190px;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody id="tableList">
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        <i class="fa-solid fa-circle-notch fa-spin me-2"></i> ডাটা লোড হচ্ছে...
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-light fw-bold">
                                <tr>
                                    <td colspan="5" class="ps-4 text-end text-muted small text-uppercase">সর্বমোট রিফান্ড ভ্যালু:</td>
                                    <td id="tfootTotalQty" class="text-center text-dark">০ pcs</td>
                                    <td id="tfootTotalAmount" class="text-end fw-extrabold fs-6" style="color: #8C56D4;">৳ ০.০০</td>
                                    <td class="pe-4"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Mobile & Tablet Card List View (< 992px: Tab = 2 cards per row, Mobile = 1 card per row; Exactly matching Supplier List) -->
                    <div id="mobileCardList" class="d-flex flex-wrap d-lg-none m-0 p-0 border-0 shadow-none bg-transparent" style="gap: 10px !important;">
                        <div class="col-12 text-center py-4 text-muted w-100 return-mobile-card rounded-3">
                            <i class="fa-solid fa-circle-notch fa-spin me-2"></i> ডাটা লোড হচ্ছে...
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Floating Add Return Action Button (FAB per rules.md 7.6) -->
        <button type="button" onclick="triggerNewReturnModal()" class="floating-add-invoice-btn" title="নতুন রিটার্ন এন্ট্রি করুন">
            <i class="fa-solid fa-plus"></i>
        </button>

        <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; {{ date('Y') }} মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-primary fw-bold text-decoration-none" style="color: #8C56D4 !important;">CodeNext IT</a></footer>
    </div>
</div>
<!-- Return Management Main Content End -->

<style>
    /* Mode Pill Buttons */
    .return-mode-pill-btn {
        background: #ffffff;
        color: #64748b;
        border: 1.5px solid #cbd5e1;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        text-decoration: none !important;
    }
    .return-mode-pill-btn:hover {
        background: #F3ECFB;
        border-color: #8C56D4;
        color: #793FC5;
    }
    .return-mode-pill-btn.active {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        border-color: transparent !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25);
    }

    /* Mobile Header Icon Buttons */
    .mobile-header-icon-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #ffffff;
        border: 1.5px solid #cbd5e1;
        color: #8C56D4;
        font-size: 14.5px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease-in-out;
        outline: none !important;
        box-shadow: 0 1px 3px rgba(140, 86, 212, 0.08);
    }
    .mobile-header-icon-btn:hover,
    .mobile-header-icon-btn.active {
        background: #F3ECFB;
        border-color: #8C56D4;
        color: #793FC5;
        transform: translateY(-1px);
    }

    /* Custom Dropdown Menus */
    .custom-dropdown-wrap {
        position: relative;
    }
    .custom-dropdown-menu {
        display: none;
        position: absolute;
        top: calc(100% + 6px);
        right: 0;
        min-width: 175px;
        background: #ffffff;
        border: 1.5px solid #E5D5F7;
        border-radius: 10px !important;
        box-shadow: 0 10px 30px rgba(140, 86, 212, 0.15) !important;
        z-index: 1050 !important;
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
        display: block;
        padding: 8px 12px;
        font-size: 13px;
        font-weight: 500;
        color: #334155;
        border-radius: 6px !important;
        text-decoration: none !important;
        transition: all 0.15s ease;
    }
    .custom-dropdown-item:hover,
    .custom-dropdown-item.active {
        background: #F3ECFB;
        color: #8C56D4;
        font-weight: 600;
    }

    /* Expandable Search Input */
    .invoice-search-input {
        height: 40px !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        font-size: 13.5px !important;
        padding-left: 14px !important;
        padding-right: 14px !important;
    }
    .invoice-search-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
    }

    .mobile-search-close-btn {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #ef4444;
        border: none;
        color: #ffffff;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        flex-shrink: 0;
    }

    /* Containers */
    .return-table-container {
        background-color: #ffffff;
        border: 1px solid #e2e8f0 !important;
        border-radius: 14px !important;
    }

    .return-mobile-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0 !important;
        border-radius: 12px !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .return-mobile-card:hover {
        box-shadow: 0 4px 16px rgba(140, 86, 212, 0.1) !important;
    }

    /* Mobile & Tablet Card Layout: Exactly matching Supplier List & 10px Gap */
    #mobileCardList {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 10px !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
        align-items: flex-start !important;
    }
    #mobileCardList > .col-12,
    #mobileCardList > [class*="col-"] {
        width: 100% !important;
        max-width: 100% !important;
        flex: 0 0 100% !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    @media (min-width: 768px) {
        #mobileCardList > .col-md-6 {
            width: calc(50% - 5px) !important;
            max-width: calc(50% - 5px) !important;
            flex: 0 0 calc(50% - 5px) !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    }

    /* Floating Action Button (FAB) */
    .floating-add-invoice-btn {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 52px;
        height: 52px;
        border-radius: 50% !important;
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        box-shadow: 0 6px 20px rgba(140, 86, 212, 0.4), 0 2px 6px rgba(0, 0, 0, 0.12) !important;
        z-index: 999;
        text-decoration: none !important;
        transition: transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.25s ease;
        border: 2px solid rgba(255, 255, 255, 0.25);
        cursor: pointer;
    }
    .floating-add-invoice-btn:hover {
        transform: scale(1.1) translateY(-3px);
        box-shadow: 0 10px 28px rgba(140, 86, 212, 0.55), 0 4px 10px rgba(0, 0, 0, 0.15) !important;
        color: #ffffff !important;
    }

    /* ===== Universal Dark Mode Rules (rules.md strictly - NO white bg/borders) ===== */
    body[light-mode="dark"] .card,
    body[data-layout-mode="dark"] .card,
    html[light-mode="dark"] .card,
    html[data-layout-mode="dark"] .card,
    body.dark-mode .card,
    html.dark .card,
    body[light-mode="dark"] .invoice-top-summary-strip,
    body[data-layout-mode="dark"] .invoice-top-summary-strip,
    html[light-mode="dark"] .invoice-top-summary-strip,
    html[data-layout-mode="dark"] .invoice-top-summary-strip,
    body.dark-mode .invoice-top-summary-strip,
    html.dark .invoice-top-summary-strip {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .summary-divider-bar,
    body[data-layout-mode="dark"] .summary-divider-bar,
    html[light-mode="dark"] .summary-divider-bar,
    html[data-layout-mode="dark"] .summary-divider-bar {
        background-color: #334155 !important;
    }

    body[light-mode="dark"] .return-mode-pill-btn,
    body[data-layout-mode="dark"] .return-mode-pill-btn,
    html[light-mode="dark"] .return-mode-pill-btn,
    html[data-layout-mode="dark"] .return-mode-pill-btn,
    body.dark-mode .return-mode-pill-btn,
    html.dark .return-mode-pill-btn {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .return-mode-pill-btn.active,
    body[data-layout-mode="dark"] .return-mode-pill-btn.active,
    html[light-mode="dark"] .return-mode-pill-btn.active,
    html[data-layout-mode="dark"] .return-mode-pill-btn.active,
    body.dark-mode .return-mode-pill-btn.active,
    html.dark .return-mode-pill-btn.active {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        border-color: transparent !important;
        color: #ffffff !important;
    }

    body[light-mode="dark"] .mobile-header-icon-btn,
    body[data-layout-mode="dark"] .mobile-header-icon-btn,
    html[light-mode="dark"] .mobile-header-icon-btn,
    html[data-layout-mode="dark"] .mobile-header-icon-btn,
    body.dark-mode .mobile-header-icon-btn,
    html.dark .mobile-header-icon-btn {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .mobile-header-icon-btn:hover,
    body[light-mode="dark"] .mobile-header-icon-btn.active {
        background-color: #260B4A !important;
        border-color: #8C56D4 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .invoice-search-input,
    body[data-layout-mode="dark"] .invoice-search-input,
    html[light-mode="dark"] .invoice-search-input,
    html[data-layout-mode="dark"] .invoice-search-input,
    body.dark-mode .invoice-search-input,
    html.dark .invoice-search-input,
    body[light-mode="dark"] .dark-input,
    body[data-layout-mode="dark"] .dark-input,
    html[light-mode="dark"] .dark-input,
    html[data-layout-mode="dark"] .dark-input,
    body.dark-mode .dark-input,
    html.dark .dark-input {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .return-table-container,
    body[data-layout-mode="dark"] .return-table-container,
    html[light-mode="dark"] .return-table-container,
    html[data-layout-mode="dark"] .return-table-container,
    body.dark-mode .return-table-container,
    html.dark .return-table-container {
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
    }

    body[light-mode="dark"] .table,
    body[data-layout-mode="dark"] .table,
    html[light-mode="dark"] .table,
    html[data-layout-mode="dark"] .table,
    body.dark-mode .table,
    html.dark .table {
        --bs-table-bg: transparent !important;
        --bs-table-hover-bg: #0f172a !important;
        color: #F3ECFB !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .table > :not(caption) > * > *,
    body[data-layout-mode="dark"] .table > :not(caption) > * > *,
    html[light-mode="dark"] .table > :not(caption) > * > *,
    html[data-layout-mode="dark"] .table > :not(caption) > * > *,
    body.dark-mode .table > :not(caption) > * > *,
    html.dark .table > :not(caption) > * > * {
        background-color: transparent !important;
        border-bottom-color: #334155 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] thead.bg-light,
    body[data-layout-mode="dark"] thead.bg-light,
    html[light-mode="dark"] thead.bg-light,
    html[data-layout-mode="dark"] thead.bg-light,
    body.dark-mode thead.bg-light,
    html.dark thead.bg-light,
    body[light-mode="dark"] tfoot.bg-light,
    body[data-layout-mode="dark"] tfoot.bg-light,
    html[light-mode="dark"] tfoot.bg-light,
    html[data-layout-mode="dark"] tfoot.bg-light {
        background-color: #0f172a !important;
        color: #94a3b8 !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .return-mobile-card,
    body[data-layout-mode="dark"] .return-mobile-card,
    html[light-mode="dark"] .return-mobile-card,
    html[data-layout-mode="dark"] .return-mobile-card,
    body.dark-mode .return-mobile-card,
    html.dark .return-mobile-card {
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .text-dark,
    body[data-layout-mode="dark"] .text-dark,
    html[light-mode="dark"] .text-dark,
    html[data-layout-mode="dark"] .text-dark,
    body.dark-mode .text-dark,
    html.dark .text-dark {
        color: #F3ECFB !important;
    }

    /* Card Body padding 0 & transparent */
    .card-body {
        padding: 0px !important;
    }

    /* Dropdown in Dark Mode */
    body[light-mode="dark"] .custom-dropdown-menu,
    body[data-layout-mode="dark"] .custom-dropdown-menu,
    html[light-mode="dark"] .custom-dropdown-menu,
    html[data-layout-mode="dark"] .custom-dropdown-menu,
    body.dark-mode .custom-dropdown-menu,
    html.dark .custom-dropdown-menu {
        background-color: #1e293b !important;
        border: 1.5px solid #334155 !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.45) !important;
    }

    body[light-mode="dark"] .custom-dropdown-item,
    body[data-layout-mode="dark"] .custom-dropdown-item,
    html[light-mode="dark"] .custom-dropdown-item,
    html[data-layout-mode="dark"] .custom-dropdown-item,
    body.dark-mode .custom-dropdown-item,
    html.dark .custom-dropdown-item {
        color: #e2e8f0 !important;
    }

    body[light-mode="dark"] .custom-dropdown-item:hover,
    body[light-mode="dark"] .custom-dropdown-item.active,
    body[data-layout-mode="dark"] .custom-dropdown-item:hover,
    body[data-layout-mode="dark"] .custom-dropdown-item.active,
    body.dark-mode .custom-dropdown-item:hover,
    body.dark-mode .custom-dropdown-item.active,
    html.dark .custom-dropdown-item:hover,
    html.dark .custom-dropdown-item.active {
        background-color: #2e1065 !important;
        color: #d8b4fe !important;
    }

    /* Dark Mode Borders (Prevent White Borders) */
    body[light-mode="dark"] .border-bottom,
    body[data-layout-mode="dark"] .border-bottom,
    html[light-mode="dark"] .border-bottom,
    html[data-layout-mode="dark"] .border-bottom,
    body.dark-mode .border-bottom,
    html.dark .border-bottom {
        border-bottom-color: #334155 !important;
    }

    body[light-mode="dark"] .border-top,
    body[data-layout-mode="dark"] .border-top,
    html[light-mode="dark"] .border-top,
    html[data-layout-mode="dark"] .border-top,
    body.dark-mode .border-top,
    html.dark .border-top {
        border-top-color: #334155 !important;
    }

    body[light-mode="dark"] .border:not(.border-0),
    body[data-layout-mode="dark"] .border:not(.border-0),
    html[light-mode="dark"] .border:not(.border-0),
    html[data-layout-mode="dark"] .border:not(.border-0),
    body.dark-mode .border:not(.border-0),
    html.dark .border:not(.border-0) {
        border-color: #334155 !important;
    }

    .return-card-action-bar {
        border-top: 1px solid #f1f5f9 !important;
    }
    body[light-mode="dark"] .return-card-action-bar,
    body[data-layout-mode="dark"] .return-card-action-bar,
    html[light-mode="dark"] .return-card-action-bar,
    html[data-layout-mode="dark"] .return-card-action-bar,
    body.dark-mode .return-card-action-bar,
    html.dark .return-card-action-bar {
        border-top-color: #334155 !important;
    }

    /* Dark Mode Transparent Containers */
    body[light-mode="dark"] .card-body,
    body[data-layout-mode="dark"] .card-body,
    html[light-mode="dark"] .card-body,
    html[data-layout-mode="dark"] .card-body,
    body.dark-mode .card-body,
    html.dark .card-body,
    body[light-mode="dark"] .card,
    body[data-layout-mode="dark"] .card,
    html[light-mode="dark"] .card,
    html[data-layout-mode="dark"] .card,
    body[light-mode="dark"] .data-table,
    body[data-layout-mode="dark"] .data-table,
    html[light-mode="dark"] .data-table,
    html[data-layout-mode="dark"] .data-table,
    body[light-mode="dark"] .page-content,
    body[data-layout-mode="dark"] .page-content {
        background: transparent !important;
        background-color: transparent !important;
    }

    /* Live Search Dropdown Styles */
    .search-live-dropdown {
        top: calc(100% + 4px);
        background: #ffffff;
        border: 1.5px solid #E5D5F7;
        z-index: 1060;
        max-height: 280px;
        overflow-y: auto;
        box-shadow: 0 12px 32px rgba(140, 86, 212, 0.18) !important;
    }
    .search-live-item {
        padding: 9px 14px;
        border-bottom: 1px solid #f1f5f9;
        cursor: pointer;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .search-live-item:last-child {
        border-bottom: none;
    }
    .search-live-item:hover {
        background: #F3ECFB;
    }
    body[light-mode="dark"] .search-live-dropdown,
    body[data-layout-mode="dark"] .search-live-dropdown,
    body.dark-mode .search-live-dropdown,
    html[light-mode="dark"] .search-live-dropdown,
    html[data-layout-mode="dark"] .search-live-dropdown,
    html.dark .search-live-dropdown,
    [data-bs-theme="dark"] .search-live-dropdown {
        background: #1e293b !important;
        border-color: #334155 !important;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4) !important;
    }
    body[light-mode="dark"] .search-live-item,
    body[data-layout-mode="dark"] .search-live-item,
    body.dark-mode .search-live-item,
    html[light-mode="dark"] .search-live-item,
    html[data-layout-mode="dark"] .search-live-item,
    html.dark .search-live-item,
    [data-bs-theme="dark"] .search-live-item {
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] .search-live-item:hover,
    body[data-layout-mode="dark"] .search-live-item:hover,
    body.dark-mode .search-live-item:hover,
    html[light-mode="dark"] .search-live-item:hover,
    html[data-layout-mode="dark"] .search-live-item:hover,
    html.dark .search-live-item:hover,
    [data-bs-theme="dark"] .search-live-item:hover {
        background: #334155 !important;
    }
</style>

<script>
    let activeReturnTab = 'sales'; // 'sales' or 'purchase'
    let rawReturnList = [];

    document.addEventListener("DOMContentLoaded", () => {
        fetchActiveReturnList();

        $("#searchInput").on("keyup search input focus", function () {
            let val = $(this).val();
            $("#mobileSearchInput").val(val);
            handleLiveSearch(val);
            filterReturnList();
        });

        $("#mobileSearchInput").on("keyup search input focus", function () {
            let val = $(this).val();
            $("#searchInput").val(val);
            handleLiveSearch(val);
            filterReturnList();
        });

        // Click outside to close search dropdown
        $(document).on("click", function (e) {
            if (!$(e.target).closest("#searchInput, #mobileSearchInput, #desktopSearchDropdown, #mobileSearchDropdown").length) {
                $(".search-live-dropdown").addClass("d-none").empty();
            }
        });
    });

    function handleLiveSearch(term) {
        let cleanTerm = (term || "").toLowerCase().trim();
        renderLiveDropdown("mobileSearchDropdown", cleanTerm);
        renderLiveDropdown("desktopSearchDropdown", cleanTerm);
    }

    function renderLiveDropdown(containerId, cleanTerm) {
        const dropdown = $("#" + containerId);
        if (!cleanTerm || cleanTerm.length === 0 || !rawReturnList || rawReturnList.length === 0) {
            dropdown.addClass("d-none").empty();
            return;
        }

        let matches = rawReturnList.filter(item => {
            const refNo = String((activeReturnTab === 'purchase' ? item.purchase_no : item.order_no) || "").toLowerCase();
            const party = String((activeReturnTab === 'purchase' ? item.supplier_name : item.customer_name) || "").toLowerCase();
            const product = String(item.product_name || "").toLowerCase();
            const amount = String(item.amount || "").toLowerCase();

            return refNo.includes(cleanTerm) ||
                   party.includes(cleanTerm) ||
                   product.includes(cleanTerm) ||
                   amount.includes(cleanTerm);
        }).slice(0, 8);

        if (matches.length === 0) {
            dropdown.html('<div class="p-3 text-center text-muted small"><i class="fa-solid fa-circle-exclamation me-1"></i>কোনো রিটার্ন পাওয়া যায়নি</div>').removeClass("d-none");
            return;
        }

        let html = '';
        matches.forEach(item => {
            const refNo = (activeReturnTab === 'purchase' ? item.purchase_no : item.order_no) || 'N/A';
            const partyName = (activeReturnTab === 'purchase' ? item.supplier_name : item.customer_name) || 'N/A';
            const safeSearchTerm = (refNo !== 'N/A' ? refNo : partyName).replace(/'/g, "\\'");
            const amount = parseFloat(item.amount || 0).toLocaleString('en-IN', {minimumFractionDigits: 2});
            const prodText = item.product_name ? `<span class="text-muted small d-block text-truncate" style="font-size: 11px;"><i class="fa-solid fa-box me-1"></i>${item.product_name}</span>` : '';

            html += `
                <div class="search-live-item" onclick="selectSearchDropdownItem('${safeSearchTerm}')">
                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px; background: #FAF5FF; color: #8C56D4; font-size: 13px;">
                            <i class="fa-solid fa-rotate-left"></i>
                        </div>
                        <div class="overflow-hidden">
                            <span class="fw-bold text-dark d-block text-truncate" style="font-size: 13px;">${partyName}</span>
                            ${prodText}
                        </div>
                    </div>
                    <div class="text-end flex-shrink-0 ms-2">
                        <span class="badge bg-light text-dark border mb-1 d-inline-block" style="font-size: 10px;">#${refNo}</span>
                        <div class="text-danger fw-bold" style="font-size: 11.5px;">৳ ${amount}</div>
                    </div>
                </div>
            `;
        });

        dropdown.html(html).removeClass("d-none");
    }

    function selectSearchDropdownItem(name) {
        $("#searchInput").val(name);
        $("#mobileSearchInput").val(name);
        $(".search-live-dropdown").addClass("d-none").empty();
        filterReturnList();
    }

    function toggleMobileSearchBar() {
        const wrap = document.getElementById('mobileSearchWrap');
        const btn = document.getElementById('mobileSearchToggleBtn');
        if (wrap) {
            wrap.classList.toggle('d-none');
            const isVisible = !wrap.classList.contains('d-none');
            if (btn) btn.classList.toggle('active', isVisible);
            if (isVisible) {
                setTimeout(() => document.getElementById('mobileSearchInput')?.focus(), 100);
            }
        }
    }

    function closeMobileSearchBar() {
        const wrap = document.getElementById('mobileSearchWrap');
        const btn = document.getElementById('mobileSearchToggleBtn');
        const input = document.getElementById('mobileSearchInput');
        if (wrap) wrap.classList.add('d-none');
        if (btn) btn.classList.remove('active');
        $("#searchInput").val('');
        $(".search-live-dropdown").addClass("d-none").empty();
        if (input) {
            input.value = '';
            filterReturnList();
        }
    }

    function toggleCustomDropdown(menuId) {
        let menu = $('#' + menuId);
        let wrap = menu.closest('.custom-dropdown-wrap');
        let isOpen = menu.hasClass('show');

        $('.custom-dropdown-wrap').removeClass('open');
        $('.custom-dropdown-menu').removeClass('show');

        if (!isOpen) {
            wrap.addClass('open');
            menu.addClass('show');
        }
    }

    let activeDateFilter = 'all';

    function selectFilterDate(range, text, event) {
        if (event) event.preventDefault();
        activeDateFilter = range;
        $('#filterDropdownMenu .custom-dropdown-item').removeClass('active');
        $(`#filterDropdownMenu .custom-dropdown-item[data-filter="${range}"]`).addClass('active');
        $('.custom-dropdown-wrap').removeClass('open');
        $('.custom-dropdown-menu').removeClass('show');

        filterReturnList();
    }

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.custom-dropdown-wrap').length) {
            $('.custom-dropdown-wrap').removeClass('open');
            $('.custom-dropdown-menu').removeClass('show');
        }
    });

    function switchReturnTab(tab) {
        activeReturnTab = tab;
        const salesBtn = document.getElementById('tabSalesReturnBtn');
        const purchaseBtn = document.getElementById('tabPurchaseReturnBtn');
        const mainNewBtnText = document.getElementById('mainNewReturnBtnText');
        const thInvoiceNo = document.getElementById('thInvoiceNo');
        const thPartyName = document.getElementById('thPartyName');
        const quickInput = document.getElementById('quickInvoiceSearchInput');
        const quickAddonIcon = document.getElementById('quickSearchAddonIcon');
        const topSummaryLabelCount = document.getElementById('topSummaryLabelCount');

        if (tab === 'purchase') {
            salesBtn?.classList.remove('active');
            purchaseBtn?.classList.add('active');
            if (mainNewBtnText) mainNewBtnText.innerText = 'নতুন পারচেজ রিটার্ন';
            if (thInvoiceNo) thInvoiceNo.innerText = 'পারচেজ মেমো নং';
            if (thPartyName) thPartyName.innerText = 'সাপ্লায়ার নাম';
            if (quickInput) quickInput.placeholder = 'পারচেজ মেমো নম্বর লিখুন (যেমন: #PurID00001)...';
            if (quickAddonIcon) quickAddonIcon.className = 'fa-solid fa-file-invoice';
            if (topSummaryLabelCount) topSummaryLabelCount.innerText = 'মোট ক্রয় রিটার্ন';
        } else {
            salesBtn?.classList.add('active');
            purchaseBtn?.classList.remove('active');
            if (mainNewBtnText) mainNewBtnText.innerText = 'নতুন বিক্রি রিটার্ন';
            if (thInvoiceNo) thInvoiceNo.innerText = 'ইনভয়েস নং';
            if (thPartyName) thPartyName.innerText = 'কাস্টমার নাম';
            if (quickInput) quickInput.placeholder = 'ইনভয়েস নম্বর লিখুন (যেমন: #InvID00001)...';
            if (quickAddonIcon) quickAddonIcon.className = 'fa-solid fa-receipt';
            if (topSummaryLabelCount) topSummaryLabelCount.innerText = 'মোট বিক্রি রিটার্ন';
        }

        if (document.getElementById('searchInput')) document.getElementById('searchInput').value = '';
        if (document.getElementById('mobileSearchInput')) document.getElementById('mobileSearchInput').value = '';
        fetchActiveReturnList();
    }

    function triggerNewReturnModal() {
        if (typeof openReturnModal === "function") {
            openReturnModal('', activeReturnTab);
        }
    }

    function triggerQuickReturnSearch() {
        const val = document.getElementById('quickInvoiceSearchInput').value.trim();
        if (!val) {
            alert(activeReturnTab === 'purchase' ? 'পারচেজ মেমো নম্বর লিখুন' : 'ইনভয়েস নম্বর লিখুন');
            return;
        }
        if (typeof openReturnModal === "function") {
            openReturnModal(val, activeReturnTab);
        }
    }

    async function fetchActiveReturnList() {
        try {
            if (typeof showLoader === "function") showLoader();

            let url = activeReturnTab === 'purchase' ? '/api/purchase-return-list' : '/api/return-product-list';
            const res = await axios.get(url, HeaderToken());
            if (typeof hideLoader === "function") hideLoader();

            if (res.data && res.data.status === 'success') {
                rawReturnList = (activeReturnTab === 'purchase' ? res.data.PurchaseReturnData : res.data.ProductReturnData) || [];
                filterReturnList();
            } else {
                rawReturnList = [];
                renderReturnViews([]);
            }
        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error("Fetch Return List Error:", e);
            rawReturnList = [];
            renderReturnViews([]);
        }
    }

    function filterReturnList() {
        const desktopSearch = (document.getElementById('searchInput')?.value || '').toLowerCase().trim();
        const mobileSearch = (document.getElementById('mobileSearchInput')?.value || '').toLowerCase().trim();
        const q = desktopSearch || mobileSearch;

        // Current Date range helpers
        const now = new Date();
        const startOfToday = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 0, 0, 0);
        const endOfToday = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 23, 59, 59, 999);

        const sevenDaysAgo = new Date(now.getFullYear(), now.getMonth(), now.getDate() - 7, 0, 0, 0);
        const thirtyDaysAgo = new Date(now.getFullYear(), now.getMonth(), now.getDate() - 30, 0, 0, 0);

        const filtered = rawReturnList.filter(item => {
            // 1. Date Range Filter
            if (activeDateFilter !== 'all' && item.date) {
                const itemDate = new Date(item.date);
                if (!isNaN(itemDate.getTime())) {
                    if (activeDateFilter === 'today') {
                        if (itemDate < startOfToday || itemDate > endOfToday) return false;
                    } else if (activeDateFilter === 'last_7_days') {
                        if (itemDate < sevenDaysAgo || itemDate > endOfToday) return false;
                    } else if (activeDateFilter === 'last_month') {
                        if (itemDate < thirtyDaysAgo || itemDate > endOfToday) return false;
                    }
                }
            }

            // 2. Query Search
            if (q) {
                const refNo = (activeReturnTab === 'purchase' ? item.purchase_no : item.order_no) || '';
                const party = (activeReturnTab === 'purchase' ? item.supplier_name : item.customer_name) || '';
                const product = item.product_name || '';
                const amount = (item.amount || '').toString();

                return refNo.toLowerCase().includes(q) ||
                       party.toLowerCase().includes(q) ||
                       product.toLowerCase().includes(q) ||
                       amount.includes(q);
            }

            return true;
        });

        renderReturnViews(filtered);
    }

    function renderReturnViews(list) {
        const tbody = document.getElementById("tableList");
        const mobileCardList = document.getElementById("mobileCardList");
        tbody.innerHTML = '';
        mobileCardList.innerHTML = '';

        let sumQty = 0;
        let sumAmount = 0;

        if (!list || list.length === 0) {
            let emptyMsg = `
                <div class="text-center py-4 text-muted">
                    <i class="fa-solid fa-inbox fs-3 mb-2 d-block opacity-50"></i>
                    কোনো ${activeReturnTab === 'purchase' ? 'ক্রয়' : 'বিক্রি'} রিটার্ন রেকর্ড পাওয়া যায়নি।
                </div>
            `;
            tbody.innerHTML = `<tr><td colspan="8">${emptyMsg}</td></tr>`;
            mobileCardList.innerHTML = `<div class="col-12 p-3 bg-white dark:bg-slate-800 rounded-3 border text-center text-muted">${emptyMsg}</div>`;
            
            document.getElementById('topSummaryTotalCount').innerText = '০ টি';
            document.getElementById('topSummaryTotalAmount').innerText = '৳ ০.০০';
            document.getElementById('tfootTotalQty').innerText = '০ pcs';
            document.getElementById('tfootTotalAmount').innerText = '৳ ০.০০';
            return;
        }

        list.forEach((item, index) => {
            const qty = parseInt(item.quantity) || 0;
            const amount = parseFloat(item.amount) || 0;
            sumQty += qty;
            sumAmount += amount;

            const refNo = (activeReturnTab === 'purchase' ? item.purchase_no : item.order_no) || 'N/A';
            const partyName = (activeReturnTab === 'purchase' ? item.supplier_name : item.customer_name) || 'N/A';
            const badgeClass = activeReturnTab === 'purchase' 
                ? 'bg-purple-subtle text-purple border' 
                : 'bg-primary-subtle text-primary border border-primary-subtle';
            const dateFormatted = formatReturnDate(item.date);

            // Desktop Row
            const row = `
                <tr style="cursor: pointer;" onclick="window.location.href='/return-invoice/' + activeReturnTab + '/' + ${item.id}">
                    <td class="ps-4 fw-bold text-muted">${index + 1}</td>
                    <td class="fw-semibold text-dark"><i class="fa-regular fa-calendar-check text-muted me-1"></i> ${dateFormatted}</td>
                    <td>
                        <span class="badge ${badgeClass} font-monospace px-2 py-1 rounded-pill" style="font-size: 11px; background: #F3ECFB; color: #8C56D4; border-color: #E5D5F7;">
                            <i class="fa-solid ${activeReturnTab === 'purchase' ? 'fa-file-invoice' : 'fa-receipt'} me-1"></i>${refNo}
                        </span>
                    </td>
                    <td class="fw-bold text-dark">${partyName}</td>
                    <td class="text-secondary small fw-semibold">${item.product_name || 'N/A'}</td>
                    <td class="text-center"><span class="badge bg-light text-dark border px-2 py-0.5 fw-bold" style="font-size: 11px;">${qty} pcs</span></td>
                    <td class="text-end fw-bold" style="color: #8C56D4; font-size: 14px;">৳ ${formatMoney(amount)}</td>
                    <td class="pe-4 text-center">
                        <div class="d-inline-flex align-items-center gap-1">
                            <button type="button" class="btn btn-sm px-2 py-1 fw-bold" onclick="event.stopPropagation(); window.location.href='/return-invoice/' + activeReturnTab + '/' + ${item.id}" style="font-size: 11px; background: #F3ECFB; color: #8C56D4; border: 1px solid #E5D5F7; border-radius: 6px;" title="ভিউ">
                                <i class="fa-solid fa-eye me-1"></i>ভিউ
                            </button>
                            <button type="button" class="btn btn-sm px-2 py-1 fw-bold" onclick="event.stopPropagation(); window.location.href='/return-invoice/' + activeReturnTab + '/' + ${item.id} + '?print=true'" style="font-size: 11px; background: #EEF2FF; color: #4F46E5; border: 1px solid #C7D2FE; border-radius: 6px;" title="প্রিন্ট">
                                <i class="fa-solid fa-print me-1"></i>প্রিন্ট
                            </button>
                            <button type="button" class="btn btn-sm px-2 py-1 fw-bold" onclick="event.stopPropagation(); triggerDeleteReturn(${item.id})" style="font-size: 11px; background: #FEF2F2; color: #EF4444; border: 1px solid #FECACA; border-radius: 6px;" title="মুছুন">
                                <i class="fa-solid fa-trash me-1"></i>মুছুন
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            tbody.innerHTML += row;

            // Mobile & Tablet Card Layout (Compact, 3 Action Buttons: View, Print, Delete)
            const mobileCard = `
                <div class="col-12 col-md-6 align-self-start">
                    <div class="return-mobile-card card border shadow-sm position-relative mb-0" style="border-radius: 12px !important; padding: 10px 12px !important; cursor: pointer;" onclick="window.location.href='/return-invoice/' + activeReturnTab + '/' + ${item.id}">
                        <!-- Top Row: Serial + Ref Badge on Left | Date on Right -->
                        <div class="d-flex align-items-center justify-content-between mb-1.5">
                            <div class="d-flex align-items-center gap-1.5 overflow-hidden">
                                <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 10px;">#${index + 1}</span>
                                <span class="badge font-monospace px-2 py-0.5 text-truncate" style="font-size: 11px; background: #F3ECFB; color: #8C56D4; border: 1px solid #E5D5F7; border-radius: 6px;">
                                    <i class="fa-solid ${activeReturnTab === 'purchase' ? 'fa-file-invoice' : 'fa-receipt'} me-1"></i>${refNo}
                                </span>
                            </div>
                            <div class="flex-shrink-0 text-end">
                                <span class="badge bg-light text-dark border fw-medium px-2 py-0.5" style="font-size: 10.5px; border-radius: 6px;">
                                    <i class="fa-regular fa-calendar-check me-1 text-muted"></i>${dateFormatted}
                                </span>
                            </div>
                        </div>

                        <!-- Middle Row: Left Avatar/Party Info | Right Refund Amount & Qty -->
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                            <div class="d-flex align-items-center gap-2 flex-grow-1 overflow-hidden">
                                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; background: #F3ECFB; color: #8C56D4; border: 1.5px solid #E5D5F7;">
                                    <i class="fa-solid ${activeReturnTab === 'purchase' ? 'fa-truck-field' : 'fa-user-tie'}" style="font-size: 13px;"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="fw-bold text-dark mb-0 text-truncate" style="font-size: 13px;">${partyName}</h6>
                                    <span class="text-muted text-truncate d-block" style="font-size: 11px;">
                                        <i class="fa-solid fa-box-open me-1 opacity-75"></i>${item.product_name || 'N/A'}
                                    </span>
                                </div>
                            </div>
                            <div class="text-end flex-shrink-0 ms-2">
                                <div style="font-size: 10px; color: #64748b; font-weight: 500;">রিফান্ড মোট</div>
                                <div class="fw-bold" style="font-size: 13.5px; color: #8C56D4;">৳ ${formatMoney(amount)}</div>
                                <span class="badge bg-light text-dark border px-1.5 py-0.5" style="font-size: 9.5px;">${qty} pcs</span>
                            </div>
                        </div>

                        <!-- Bottom Action Bar: View, Print, Delete (1 Row, Side-by-Side with distinct gap) -->
                        <div class="pt-2 border-top d-flex align-items-center return-card-action-bar" style="gap: 8px !important;">
                            <button type="button" class="btn btn-sm flex-grow-1 d-inline-flex align-items-center justify-content-center py-1 px-2 fw-bold" onclick="event.stopPropagation(); window.location.href='/return-invoice/' + activeReturnTab + '/' + ${item.id}" style="font-size: 11.5px; background: #F3ECFB; color: #8C56D4; border: 1px solid #E5D5F7; border-radius: 6px; height: 32px; gap: 5px !important;" title="রিটার্ন বিবরণী দেখুন">
                                <i class="fa-solid fa-eye"></i> <span>ভিউ</span>
                            </button>
                            <button type="button" class="btn btn-sm flex-grow-1 d-inline-flex align-items-center justify-content-center py-1 px-2 fw-bold" onclick="event.stopPropagation(); window.location.href='/return-invoice/' + activeReturnTab + '/' + ${item.id} + '?print=true'" style="font-size: 11.5px; background: #EEF2FF; color: #4F46E5; border: 1px solid #C7D2FE; border-radius: 6px; height: 32px; gap: 5px !important;" title="রিটার্ন বিবরণী প্রিন্ট করুন">
                                <i class="fa-solid fa-print"></i> <span>প্রিন্ট</span>
                            </button>
                            <button type="button" class="btn btn-sm flex-grow-1 d-inline-flex align-items-center justify-content-center py-1 px-2 fw-bold" onclick="event.stopPropagation(); triggerDeleteReturn(${item.id})" style="font-size: 11.5px; background: #FEF2F2; color: #EF4444; border: 1px solid #FECACA; border-radius: 6px; height: 32px; gap: 5px !important;" title="রিটার্ন মুছে ফেলুন">
                                <i class="fa-solid fa-trash"></i> <span>মুছুন</span>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            mobileCardList.innerHTML += mobileCard;
        });

        // Update Summary Bar & Footers
        document.getElementById('topSummaryTotalCount').innerText = list.length.toLocaleString('bn-BD') + ' টি';
        document.getElementById('topSummaryTotalAmount').innerText = '৳ ' + formatMoney(sumAmount);
        document.getElementById('tfootTotalQty').innerText = sumQty + ' pcs';
        document.getElementById('tfootTotalAmount').innerText = '৳ ' + formatMoney(sumAmount);
    }

    function formatReturnDate(dateString) {
        if (!dateString) return 'N/A';
        const dObj = new Date(dateString);
        if (isNaN(dObj)) return dateString;
        return `${dObj.getDate().toString().padStart(2, '0')} ${dObj.toLocaleString('en-US', { month: 'short' })} ${dObj.getFullYear()}`;
    }

    function formatMoney(amount) {
        if (amount === null || isNaN(amount)) return "0.00";
        return parseFloat(amount).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    }
</script>
