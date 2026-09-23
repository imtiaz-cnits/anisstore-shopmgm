<!-- Flatpickr CSS & JS per rules.md -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Expense List Main Content Start -->
<div class="main-content">
    <div class="page-content" style="padding: 10px !important;">
        <!-- Page Title & Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
            <!-- Left: Title with clear gap from the purple vertical bar -->
            <h4 class="fw-bold m-0 p-0 text-dark d-flex align-items-center" style="font-size: 18px; line-height: 1.3;">
                <span style="display: inline-block; width: 4.5px; height: 22px; background: #8C56D4; border-radius: 2px; margin-right: 12px; flex-shrink: 0;"></span>
                <span>এক্সপেন্স ও সেলারি ম্যানেজমেন্ট</span>
            </h4>

            <!-- Right: Search Toggle & Filter Dropdown -->
            <div class="d-flex align-items-center gap-2 ms-auto flex-shrink-0">
                <!-- Search Toggle Button -->
                <button type="button" id="mobileSearchToggleBtn" class="mobile-header-icon-btn" onclick="toggleMobileSearchBar()" title="অনুসন্ধান">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

                <!-- Filter Dropdown -->
                <div class="custom-dropdown-wrap position-relative" id="mobileFilterDropdownContainer">
                    <button type="button" class="mobile-header-icon-btn" id="mobileFilterDropdownToggle" onclick="toggleCustomDropdown('mobileFilterDropdownMenu')" title="ফিল্টার">
                        <i class="fa-solid fa-filter"></i>
                    </button>
                    <div class="custom-dropdown-menu dropdown-menus end-0 shadow-lg" id="mobileFilterDropdownMenu" style="min-width: 175px;">
                        <a href="#" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterOption('all', 'সব খরচ', event)">সব খরচ</a>
                        <a href="#" class="custom-dropdown-item" data-filter="today" onclick="selectFilterOption('today', 'আজকের খরচ', event)">আজকের খরচ</a>
                        <a href="#" class="custom-dropdown-item" data-filter="month" onclick="selectFilterOption('month', 'চলতি মাসের খরচ', event)">চলতি মাসের খরচ</a>
                        <a href="#" class="custom-dropdown-item" data-filter="salary" onclick="selectFilterOption('salary', 'স্টাফ মোট বেতন', event)">স্টাফ মোট বেতন</a>
                        <a href="#" class="custom-dropdown-item" data-filter="general" onclick="selectFilterOption('general', 'সাধারণ খরচ', event)">সাধারণ খরচ</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile & Global Expandable Search Bar -->
        <div id="mobileSearchWrap" class="mb-3 d-none position-relative">
            <div class="d-flex align-items-center gap-2 mb-0">
                <div class="position-relative flex-grow-1 mb-0">
                    <input type="text" id="searchInput" class="form-control invoice-search-input mb-0" placeholder="🔍 টাইপ / বিবরণ / স্টাফ খুঁজুন..." autocomplete="off" />
                </div>
                <button type="button" class="mobile-search-close-btn mb-0" onclick="closeMobileSearchBar()" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <!-- Metric Cards Grid: Auto Height, Compact Content Padding, No Icons -->
        <div class="expense-metric-cards-grid mb-3">
            <!-- 1. Total Expense -->
            <div class="card expense-metric-card-box shadow-sm mb-0" style="border-left: 4px solid #dc2626 !important; border-radius: 12px !important; border-bottom: 0px !important;">
                <div class="card-body p-2">
                    <small class="text-muted fw-bold uppercase d-block" style="font-size: 11px;">সর্বমোট খরচ</small>
                    <h4 class="fw-extrabold text-danger my-0.5" id="statTotalExpense">৳ 0.00</h4>
                    <small class="text-secondary d-none d-sm-inline" style="font-size: 10px;"><i class="fa-solid fa-receipt me-1"></i> সমস্থ এন্ট্রি</small>
                </div>
            </div>

            <!-- 2. Today's Expense -->
            <div class="card expense-metric-card-box shadow-sm mb-0" style="border-left: 4px solid #16a34a !important; border-radius: 12px !important; border-bottom: 0px !important;">
                <div class="card-body p-2">
                    <small class="text-muted fw-bold uppercase d-block" style="font-size: 11px;">আজকের খরচ</small>
                    <h4 class="fw-extrabold text-success my-0.5" id="statTodayExpense">৳ 0.00</h4>
                    <small class="text-secondary d-none d-sm-inline" style="font-size: 10px;"><i class="fa-regular fa-calendar-check me-1"></i> আজকের মোট</small>
                </div>
            </div>

            <!-- 3. This Month Expense -->
            <div class="card expense-metric-card-box shadow-sm mb-0" style="border-left: 4px solid #0284c7 !important; border-radius: 12px !important; border-bottom: 0px !important;">
                <div class="card-body p-2">
                    <small class="text-muted fw-bold uppercase d-block" style="font-size: 11px;">এই মাসের খরচ</small>
                    <h4 class="fw-extrabold text-info my-0.5" id="statMonthExpense">৳ 0.00</h4>
                    <small class="text-secondary d-none d-sm-inline" style="font-size: 10px;"><i class="fa-solid fa-chart-line me-1"></i> চলতি মাস</small>
                </div>
            </div>

            <!-- 4. General Expense -->
            <div class="card expense-metric-card-box shadow-sm mb-0" style="border-left: 4px solid #f59e0b !important; border-radius: 12px !important; border-bottom: 0px !important;">
                <div class="card-body p-2">
                    <small class="text-muted fw-bold uppercase d-block" style="font-size: 11px;">সাধারণ খরচ</small>
                    <h4 class="fw-extrabold text-warning my-0.5" id="statGeneralExpense">৳ 0.00</h4>
                    <small class="text-secondary d-none d-sm-inline" style="font-size: 10px;"><i class="fa-solid fa-file-invoice-dollar me-1"></i> অন্যান্য খরচ</small>
                </div>
            </div>

            <!-- 5. Staff Salary Paid -->
            <div class="card expense-metric-card-box shadow-sm mb-0" style="border-left: 4px solid #8C56D4 !important; border-radius: 12px !important; border-bottom: 0px !important;">
                <div class="card-body p-2">
                    <small class="text-muted fw-bold uppercase d-block" style="font-size: 11px;">স্টাফ মোট বেতন</small>
                    <h4 class="fw-extrabold my-0.5" id="statSalaryExpense" style="color: #8C56D4;">৳ 0.00</h4>
                    <small class="text-secondary d-none d-sm-inline" style="font-size: 10px;"><i class="fa-solid fa-user-tie me-1"></i> বেতন পরিশোধ</small>
                </div>
            </div>
        </div>

        <!-- Expense Data View: Desktop Table & Mobile Card List (NO outer border or shadow around mobileCardList) -->
        <div class="w-100 p-0 m-0 border-0 shadow-none bg-transparent">
            <!-- Desktop Table View (>= 992px) -->
            <div class="table-responsive d-none d-lg-block expense-table-container shadow-sm overflow-hidden">
                <table id="printTable" class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small uppercase">
                        <tr>
                            <th class="ps-4 py-3" style="width: 60px;">#</th>
                            <th class="py-3">তারিখ</th>
                            <th class="py-3">খাত / টাইপ</th>
                            <th class="py-3">স্টাফ নাম</th>
                            <th class="py-3">বিবরণ</th>
                            <th class="py-3">পরিমাণ</th>
                            <th class="pe-4 py-3 text-end">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                <i class="fa-solid fa-circle-notch fa-spin me-2"></i> ডাটা লোড হচ্ছে...
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Mobile & Tablet Card List View (< 992px: Tab = 2 cards per row, Mobile = 1 card per row; Completely free of outer border & shadow) -->
            <div id="mobileCardList" class="d-flex flex-wrap d-lg-none m-0 p-0 border-0 shadow-none bg-transparent" style="gap: 10px !important;">
                <div class="col-12 text-center py-4 text-muted w-100 expense-mobile-card rounded-3">
                    <i class="fa-solid fa-circle-notch fa-spin me-2"></i> ডাটা লোড হচ্ছে...
                </div>
            </div>
        </div>

        <!-- Floating Add Expense Action Button (FAB per rules.md 7.6) -->
        <button type="button" onclick="openExpenseModal()" class="floating-add-invoice-btn" title="নতুন খরচ এন্ট্রি করুন">
            <i class="fa-solid fa-plus"></i>
        </button>

        <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; 2026 মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-primary fw-bold text-decoration-none" style="color: #8C56D4 !important;">CodeNext IT</a></footer>
    </div>
</div>
<!-- Expense List Main Content End -->

<!-- Printable Expense Voucher Container (Injected for Current-Tab Printing) -->
<div id="expensePrintContainer" class="d-none"></div>

<style>
    /* Metric Cards Grid Responsive */
    .expense-metric-cards-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 8px;
    }

    .expense-metric-card-box {
        height: auto !important;
        min-height: auto !important;
        background-color: #ffffff;
        border: 1px solid #e2e8f0 !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        transition: all 0.2s ease-in-out;
    }
    .expense-metric-card-box .card-body {
        padding: 6px 10px !important;
        background-color: transparent !important;
        border-radius: 12px !important;
    }
    .expense-metric-card-box h4 {
        font-size: 15px !important;
        margin: 2px 0 !important;
    }

    .expense-table-container {
        background-color: #ffffff;
        border: 1px solid #e2e8f0 !important;
        border-radius: 14px !important;
    }
    .expense-mobile-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0 !important;
        border-radius: 12px !important;
    }

    /* Mobile & Tablet Card Layout: No Col Left/Right Padding & 10px Gap */
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

    @media (max-width: 991.98px) and (min-width: 768px) {
        .expense-metric-cards-grid {
            grid-template-columns: repeat(5, 1fr) !important;
            gap: 6px;
        }
    }

    @media (max-width: 767.98px) {
        .expense-metric-cards-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 6px;
        }
        .expense-metric-cards-grid > .expense-metric-card-box {
            padding: 4px 6px !important;
        }
        .expense-metric-cards-grid > .expense-metric-card-box h4 {
            font-size: 13.5px !important;
            margin: 2px 0 !important;
        }
        .expense-metric-cards-grid > .expense-metric-card-box small {
            font-size: 10px !important;
        }
        .expense-metric-cards-grid > .expense-metric-card-box:last-child {
            grid-column: 1 / -1 !important;
        }
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

    /* Floating Action Button (FAB per rules.md) */
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

    /* Filter Dropdown */
    .custom-dropdown-wrap {
        position: relative;
    }
    .custom-dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        margin-top: 6px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 6px 0;
        z-index: 1050;
        min-width: 175px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .custom-dropdown-menu.show {
        display: block;
    }
    .custom-dropdown-item {
        display: block;
        padding: 8px 16px;
        color: #334155;
        font-size: 13px;
        text-decoration: none;
        transition: all 0.15s ease;
    }
    .custom-dropdown-item:hover,
    .custom-dropdown-item.active {
        background: #F3ECFB;
        color: #8C56D4;
        font-weight: 600;
    }

    /* Action Buttons Styled Exactly like 1st Image (Supplier Profile/List Style) */
    .mobile-action-btn {
        flex: 1 1 0;
        height: 34px;
        border-radius: 8px !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
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
    .mobile-action-btn.action-btn-edit {
        background: #E0F2FE;
        color: #0284C7;
        border-color: #BAE6FD;
    }
    .mobile-action-btn.action-btn-edit:hover {
        background: #0284C7;
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

    /* Print Styles */
    @media print {
        body * { visibility: hidden !important; }
        #expensePrintContainer, #expensePrintContainer * { visibility: visible !important; }
        #expensePrintContainer {
            position: fixed !important;
            left: 0 !important; top: 0 !important;
            width: 100% !important;
            display: block !important;
            padding: 10px !important;
            box-sizing: border-box !important;
        }
        @page { margin: 10px; }
    }

    /* ===== Dark Mode Support ===== */
    body[light-mode="dark"] .card,
    body[data-layout-mode="dark"] .card,
    html[light-mode="dark"] .card,
    html[data-layout-mode="dark"] .card,
    body.dark-mode .card,
    html.dark .card {
        background-color: #1e293b !important;
        color: #F3ECFB !important;
    }

    /* Metric cards: 12px border radius + dark border on top/right/bottom + preserved left colored border */
    body[light-mode="dark"] .expense-metric-card-box,
    body[data-layout-mode="dark"] .expense-metric-card-box,
    html[light-mode="dark"] .expense-metric-card-box,
    html[data-layout-mode="dark"] .expense-metric-card-box,
    body.dark-mode .expense-metric-card-box,
    html.dark .expense-metric-card-box {
        background-color: #1e293b !important;
        background: #1e293b !important;
        border-top: 1px solid #334155 !important;
        border-right: 1px solid #334155 !important;
        border-bottom: 1px solid #334155 !important;
        border-radius: 12px !important;
        overflow: hidden !important;
    }
    body[light-mode="dark"] .expense-metric-card-box .card-body,
    body[data-layout-mode="dark"] .expense-metric-card-box .card-body,
    html[light-mode="dark"] .expense-metric-card-box .card-body,
    html[data-layout-mode="dark"] .expense-metric-card-box .card-body,
    body.dark-mode .expense-metric-card-box .card-body,
    html.dark .expense-metric-card-box .card-body {
        background-color: transparent !important;
        background: transparent !important;
        border-radius: 12px !important;
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
    body[light-mode="dark"] .mobile-header-icon-btn.active,
    body[data-layout-mode="dark"] .mobile-header-icon-btn:hover,
    body[data-layout-mode="dark"] .mobile-header-icon-btn.active,
    html[light-mode="dark"] .mobile-header-icon-btn:hover,
    html[light-mode="dark"] .mobile-header-icon-btn.active,
    html[data-layout-mode="dark"] .mobile-header-icon-btn:hover,
    html[data-layout-mode="dark"] .mobile-header-icon-btn.active,
    body.dark-mode .mobile-header-icon-btn:hover,
    body.dark-mode .mobile-header-icon-btn.active,
    html.dark .mobile-header-icon-btn:hover,
    html.dark .mobile-header-icon-btn.active {
        background-color: #260B4A !important;
        border-color: #8C56D4 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .custom-dropdown-menu,
    body[data-layout-mode="dark"] .custom-dropdown-menu,
    html[light-mode="dark"] .custom-dropdown-menu,
    html[data-layout-mode="dark"] .custom-dropdown-menu,
    body.dark-mode .custom-dropdown-menu,
    html.dark .custom-dropdown-menu {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .custom-dropdown-item,
    body[data-layout-mode="dark"] .custom-dropdown-item,
    html[light-mode="dark"] .custom-dropdown-item,
    html[data-layout-mode="dark"] .custom-dropdown-item,
    body.dark-mode .custom-dropdown-item,
    html.dark .custom-dropdown-item {
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .custom-dropdown-item:hover,
    body[light-mode="dark"] .custom-dropdown-item.active,
    body[data-layout-mode="dark"] .custom-dropdown-item:hover,
    body[data-layout-mode="dark"] .custom-dropdown-item.active,
    html[light-mode="dark"] .custom-dropdown-item:hover,
    html[light-mode="dark"] .custom-dropdown-item.active,
    html[data-layout-mode="dark"] .custom-dropdown-item:hover,
    html[data-layout-mode="dark"] .custom-dropdown-item.active,
    body.dark-mode .custom-dropdown-item:hover,
    body.dark-mode .custom-dropdown-item.active,
    html.dark .custom-dropdown-item:hover,
    html.dark .custom-dropdown-item.active {
        background-color: #334155 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .invoice-search-input,
    body[data-layout-mode="dark"] .invoice-search-input,
    html[light-mode="dark"] .invoice-search-input,
    html[data-layout-mode="dark"] .invoice-search-input,
    body.dark-mode .invoice-search-input,
    html.dark .invoice-search-input,
    body[light-mode="dark"] .form-control,
    body[data-layout-mode="dark"] .form-control,
    html[light-mode="dark"] .form-control,
    html[data-layout-mode="dark"] .form-control,
    body.dark-mode .form-control,
    html.dark .form-control {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }

    /* Desktop table — dark container, borders, headers */
    body[light-mode="dark"] .expense-table-container,
    body[data-layout-mode="dark"] .expense-table-container,
    html[light-mode="dark"] .expense-table-container,
    html[data-layout-mode="dark"] .expense-table-container,
    body.dark-mode .expense-table-container,
    html.dark .expense-table-container,
    body[light-mode="dark"] .table-responsive,
    body[data-layout-mode="dark"] .table-responsive,
    html[light-mode="dark"] .table-responsive,
    html[data-layout-mode="dark"] .table-responsive,
    body.dark-mode .table-responsive,
    html.dark .table-responsive {
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
        border-radius: 14px !important;
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
    body[light-mode="dark"] .table-hover > tbody > tr:hover > *,
    body[data-layout-mode="dark"] .table-hover > tbody > tr:hover > *,
    html[light-mode="dark"] .table-hover > tbody > tr:hover > *,
    html[data-layout-mode="dark"] .table-hover > tbody > tr:hover > *,
    body.dark-mode .table-hover > tbody > tr:hover > *,
    html.dark .table-hover > tbody > tr:hover > * {
        background-color: #0f172a !important;
    }
    body[light-mode="dark"] thead.bg-light,
    body[data-layout-mode="dark"] thead.bg-light,
    html[light-mode="dark"] thead.bg-light,
    html[data-layout-mode="dark"] thead.bg-light,
    body.dark-mode thead.bg-light,
    html.dark thead.bg-light {
        background-color: #0f172a !important;
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] thead.bg-light th,
    body[data-layout-mode="dark"] thead.bg-light th,
    html[light-mode="dark"] thead.bg-light th,
    html[data-layout-mode="dark"] thead.bg-light th,
    body.dark-mode thead.bg-light th,
    html.dark thead.bg-light th {
        background-color: #0f172a !important;
        color: #94a3b8 !important;
        border-bottom-color: #334155 !important;
    }
    body[light-mode="dark"] tr:hover,
    body[data-layout-mode="dark"] tr:hover,
    html[light-mode="dark"] tr:hover,
    html[data-layout-mode="dark"] tr:hover,
    body.dark-mode tr:hover,
    html.dark tr:hover {
        background-color: #1e293b !important;
    }

    /* Mobile expense card — dark background + border + date divider */
    body[light-mode="dark"] .expense-mobile-card,
    body[data-layout-mode="dark"] .expense-mobile-card,
    html[light-mode="dark"] .expense-mobile-card,
    html[data-layout-mode="dark"] .expense-mobile-card,
    body.dark-mode .expense-mobile-card,
    html.dark .expense-mobile-card {
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
        border-radius: 12px !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .expense-date-divider,
    body[data-layout-mode="dark"] .expense-date-divider,
    html[light-mode="dark"] .expense-date-divider,
    html[data-layout-mode="dark"] .expense-date-divider,
    body.dark-mode .expense-date-divider,
    html.dark .expense-date-divider {
        border-right-color: #334155 !important;
    }
    body[light-mode="dark"] .expense-mobile-card .mobile-card-actions,
    body[data-layout-mode="dark"] .expense-mobile-card .mobile-card-actions,
    html[light-mode="dark"] .expense-mobile-card .mobile-card-actions,
    html[data-layout-mode="dark"] .expense-mobile-card .mobile-card-actions,
    body.dark-mode .expense-mobile-card .mobile-card-actions,
    html.dark .expense-mobile-card .mobile-card-actions {
        border-top-color: #334155 !important;
    }
    body[light-mode="dark"] .text-dark,
    body[data-layout-mode="dark"] .text-dark,
    html[light-mode="dark"] .text-dark,
    html[data-layout-mode="dark"] .text-dark,
    body.dark-mode .text-dark,
    html.dark .text-dark,
    body[light-mode="dark"] h4.text-dark,
    body[data-layout-mode="dark"] h4.text-dark,
    html[light-mode="dark"] h4.text-dark,
    html[data-layout-mode="dark"] h4.text-dark,
    body.dark-mode h4.text-dark,
    html.dark h4.text-dark {
        color: #F3ECFB !important;
    }

</style>

<script>
    let rawExpenseList = [];
    let currentFilterType = 'all';

    function isDarkModeActive() {
        return document.body.getAttribute('light-mode') === 'dark' ||
               document.documentElement.getAttribute('light-mode') === 'dark' ||
               document.body.getAttribute('data-layout-mode') === 'dark' ||
               document.documentElement.getAttribute('data-layout-mode') === 'dark' ||
               document.body.classList.contains('dark-mode') ||
               document.documentElement.classList.contains('dark') ||
               localStorage.getItem('lightMode') === 'dark' ||
               localStorage.getItem('layout-mode') === 'dark';
    }

    // Globally accessible dark mode helper for expense cards
    function applyDarkModeCardFix() {
        const isDark = isDarkModeActive();
        // Metric cards inline style override
        document.querySelectorAll('.expense-metric-card-box').forEach(el => {
            el.style.backgroundColor = isDark ? '#1e293b' : '#ffffff';
            el.style.borderTopColor = isDark ? '#334155' : '#e2e8f0';
            el.style.borderRightColor = isDark ? '#334155' : '#e2e8f0';
            el.style.borderBottomColor = isDark ? '#334155' : '#e2e8f0';
        });
        // Mobile cards bg + border
        document.querySelectorAll('.expense-mobile-card').forEach(el => {
            el.style.backgroundColor = isDark ? '#1e293b' : '#ffffff';
            el.style.borderColor = isDark ? '#334155' : '#E2E8F0';
        });
        // Date dividers
        document.querySelectorAll('.expense-date-divider').forEach(el => {
            el.style.borderRightColor = isDark ? '#334155' : '#e2e8f0';
        });
    }
    window.applyDarkModeCardFix = applyDarkModeCardFix;

    document.addEventListener("DOMContentLoaded", function () {
        getExpenseList();

        document.getElementById('searchInput')?.addEventListener('keyup', filterExpenseTable);

        // Close dropdown when clicked outside
        document.addEventListener('click', function(e) {
            const container = document.getElementById('mobileFilterDropdownContainer');
            if (container && !container.contains(e.target)) {
                document.getElementById('mobileFilterDropdownMenu')?.classList.remove('show');
            }
        });

        applyDarkModeCardFix();

        // Watch for dark mode toggle on both body and documentElement
        const dmObserver = new MutationObserver(applyDarkModeCardFix);
        dmObserver.observe(document.body, { attributes: true, attributeFilter: ['light-mode', 'data-layout-mode', 'class'] });
        dmObserver.observe(document.documentElement, { attributes: true, attributeFilter: ['light-mode', 'data-layout-mode', 'class'] });
    });

    function toggleMobileSearchBar() {
        const wrap = document.getElementById('mobileSearchWrap');
        const btn = document.getElementById('mobileSearchToggleBtn');
        if (wrap) {
            wrap.classList.toggle('d-none');
            const isVisible = !wrap.classList.contains('d-none');
            if (btn) btn.classList.toggle('active', isVisible);
            if (isVisible) {
                setTimeout(() => document.getElementById('searchInput')?.focus(), 100);
            }
        }
    }

    function closeMobileSearchBar() {
        const wrap = document.getElementById('mobileSearchWrap');
        const btn = document.getElementById('mobileSearchToggleBtn');
        const input = document.getElementById('searchInput');
        if (wrap) wrap.classList.add('d-none');
        if (btn) btn.classList.remove('active');
        if (input) {
            input.value = '';
            filterExpenseTable();
        }
    }

    function toggleCustomDropdown(menuId) {
        const menu = document.getElementById(menuId);
        if (menu) menu.classList.toggle('show');
    }

    function selectFilterOption(type, label, event) {
        if (event) event.preventDefault();
        currentFilterType = type;

        document.querySelectorAll('#mobileFilterDropdownMenu .custom-dropdown-item').forEach(el => {
            el.classList.toggle('active', el.getAttribute('data-filter') === type);
        });

        document.getElementById('mobileFilterDropdownMenu')?.classList.remove('show');
        filterExpenseTable();
    }

    async function getExpenseList() {
        try {
            showLoader();
            let res = await axios.get("/api/expense-list", HeaderToken());
            hideLoader();

            if (res.data.status === "success" || res.data.ExpenseData) {
                rawExpenseList = res.data.ExpenseData || [];

                const total = res.data.subTotal || 0;
                const today = res.data.todayExpense || 0;
                const thisMonth = res.data.thisMonthExpense || 0;
                const salary = res.data.totalSalaryPaid || 0;
                const general = Math.max(0, total - salary);

                // Set Counter Stats
                document.getElementById('statTotalExpense').innerText = `৳ ${total.toLocaleString('en-IN', {minimumFractionDigits: 2})}`;
                document.getElementById('statTodayExpense').innerText = `৳ ${today.toLocaleString('en-IN', {minimumFractionDigits: 2})}`;
                document.getElementById('statMonthExpense').innerText = `৳ ${thisMonth.toLocaleString('en-IN', {minimumFractionDigits: 2})}`;
                document.getElementById('statSalaryExpense').innerText = `৳ ${salary.toLocaleString('en-IN', {minimumFractionDigits: 2})}`;
                if (document.getElementById('statGeneralExpense')) {
                    document.getElementById('statGeneralExpense').innerText = `৳ ${general.toLocaleString('en-IN', {minimumFractionDigits: 2})}`;
                }

                filterExpenseTable();
            }
        } catch (e) {
            hideLoader();
            console.error("Expense List fetch error:", e);
            unauthorized(e.response ? e.response.status : 500);
        }
    }

    function filterExpenseTable() {
        const searchVal = (document.getElementById('searchInput')?.value || '').toLowerCase().trim();
        const todayStr = new Date().toISOString().split('T')[0];
        const currentMonthStr = todayStr.substring(0, 7);

        const filtered = rawExpenseList.filter(item => {
            const type = (item.type_name || '').toLowerCase();
            const details = (item.expense_details || '').toLowerCase();
            const staff = (item.staff_name || '').toLowerCase();
            const amount = (item.expense_amount || '').toString();
            const dateStr = (item.date || '');

            const matchSearch = !searchVal || type.includes(searchVal) || details.includes(searchVal) || staff.includes(searchVal) || amount.includes(searchVal);
            if (!matchSearch) return false;

            if (currentFilterType === 'today') {
                return dateStr.startsWith(todayStr);
            } else if (currentFilterType === 'month') {
                return dateStr.startsWith(currentMonthStr);
            } else if (currentFilterType === 'salary') {
                return item.staff_id !== null || type.includes('salary') || type.includes('বেতন');
            } else if (currentFilterType === 'general') {
                return item.staff_id === null && !type.includes('salary') && !type.includes('বেতন');
            }

            return true;
        });

        renderExpenseTable(filtered);
    }

    function renderExpenseTable(data) {
        let tableList = $("#tableList");
        let mobileCardList = $("#mobileCardList");

        tableList.empty();
        mobileCardList.empty();

        if (!data || data.length === 0) {
            let emptyMsg = `
                <div class="text-center py-4 text-muted">
                    <i class="fa-solid fa-inbox fs-3 mb-2 d-block opacity-50"></i>
                    কোনো এক্সপেন্স ডাটা পাওয়া যায়নি।
                </div>
            `;
            tableList.append(`<tr><td colspan="7">${emptyMsg}</td></tr>`);
            mobileCardList.append(`<div class="col-12 p-3 bg-white rounded-3 border text-center text-muted">${emptyMsg}</div>`);
            return;
        }

        data.forEach(function(item, index) {
            const dateFormatted = item.date ? new Date(item.date).toLocaleDateString('en-GB') : '-';
            const amountFormatted = parseFloat(item.expense_amount || 0).toLocaleString('en-IN', {minimumFractionDigits: 2});
            
            // Format Day/Month for compact card
            let cardDay = '-';
            let cardYear = '';
            if (item.date) {
                const d = new Date(item.date);
                if (!isNaN(d.getTime())) {
                    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    cardDay = `${d.getDate()} ${months[d.getMonth()]}`;
                    cardYear = d.getFullYear();
                }
            }

            let staffBadge = '<span class="text-muted small" style="font-size: 11px;">সাধারণ খরচ</span>';
            if (item.staff_id && item.staff_name) {
                staffBadge = `
                    <a href="/admin-dashboard-staff-profile?id=${item.staff_id}" class="badge bg-primary-subtle text-primary border border-primary-subtle text-decoration-none px-2 py-0.5 rounded-pill" title="স্টাফের প্রোফাইল ও স্যালারি রিপোর্ট দেখুন" style="font-size: 10.5px;">
                        <i class="fa-solid fa-user-tie me-1"></i>${item.staff_name}
                    </a>
                `;
            } else if (item.staff_name) {
                staffBadge = `<span class="badge bg-light text-dark border px-2 py-0.5" style="font-size: 10.5px;">${item.staff_name}</span>`;
            }

            // Desktop Table Row
            let row = `
                <tr>
                    <td class="ps-4 fw-bold text-muted">${index + 1}</td>
                    <td class="fw-semibold text-dark"><i class="fa-regular fa-calendar-check text-success me-1"></i> ${dateFormatted}</td>
                    <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill" style="font-size: 11.5px;">${item.type_name || 'N/A'}</span></td>
                    <td>${staffBadge}</td>
                    <td class="text-secondary small">${item.expense_details || '-'}</td>
                    <td class="fw-extrabold text-danger fs-6">৳ ${amountFormatted}</td>
                    <td class="pe-4 text-end">
                        <div class="d-inline-flex gap-1.5">
                            <button type="button" class="btn btn-sm rounded-2 d-flex align-items-center justify-content-center p-0" onclick="printSingleExpense(${item.id})" title="প্রিন্ট করুন" style="width: 32px; height: 32px; background: #F3ECFB; border: 1px solid #E5D5F7; color: #8C56D4;">
                                <i class="fa-solid fa-print"></i>
                            </button>
                            <button type="button" data-id="${item.id}" class="btn btn-sm rounded-2 edit-link d-flex align-items-center justify-content-center p-0" data-bs-toggle="modal" data-bs-target="#exampleModal" title="এডিট করুন" style="width: 32px; height: 32px; background: #E0F2FE; border: 1px solid #BAE6FD; color: #0284C7;">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="button" data-id="${item.id}" class="btn btn-sm rounded-2 custom-delete-modal-btn d-flex align-items-center justify-content-center p-0" data-bs-toggle="modal" data-bs-target="#confirmationModal" title="ডিলিট করুন" style="width: 32px; height: 32px; background: #FEE2E2; border: 1px solid #FECACA; color: #DC2626;">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            tableList.append(row);

            // Box-Type Card View with 1st Image Action Buttons Style (Print, Edit, Delete)
            let mobileCard = `
                <div class="col-12 col-md-6 align-self-start">
                    <div class="expense-mobile-card card border shadow-sm p-3 position-relative mb-0" style="border-radius: 12px !important;">
                        <!-- Top Section: Left Date/Day Column + Right Content -->
                        <div class="d-flex align-items-stretch">
                        <!-- Left Date & Day Column with gap after divider -->
                            <div class="expense-date-divider d-flex flex-column justify-content-center align-items-center text-center flex-shrink-0" style="min-width: 62px; padding-right: 12px; margin-right: 12px; border-right: 1.5px solid;">
                                <span class="fw-bold" style="color: #8C56D4; font-size: 13.5px; line-height: 1.2;">${cardDay}</span>
                                <span class="small mt-0.5 text-muted" style="font-size: 10px; font-weight: 500;">${cardYear}</span>
                            </div>

                            <!-- Right Content Area -->
                            <div class="flex-grow-1 min-w-0 d-flex flex-column justify-content-between pl-2">
                                <!-- Line 1: Type Name + Staff Badge -->
                                <div class="d-flex align-items-center justify-content-between gap-1 mb-0.5">
                                    <div class="fw-bold text-dark text-truncate" style="font-size: 14.5px;">
                                        ${item.type_name || 'খরচ'}
                                    </div>
                                    <div class="flex-shrink-0">
                                        ${staffBadge}
                                    </div>
                                </div>

                                <!-- Line 2: Details Note -->
                                <div class="text-truncate text-muted mb-1" style="font-size: 11.5px; color: #64748b;">
                                    <i class="fa-solid fa-align-left me-1 opacity-75"></i>${item.expense_details || 'কোনো বিবরণ নেই'}
                                </div>

                                <!-- Line 3: Amount -->
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <div class="small text-muted" style="font-size: 11px;">পরিমাণ:</div>
                                    <div class="fw-bold text-danger" style="font-size: 14.5px;">
                                        ৳ ${amountFormatted}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 1st Image Style 3 Action Buttons (Print, Edit, Delete) -->
                        <div class="mobile-card-actions pt-2 mt-2 border-top d-flex align-items-center gap-2" onclick="event.stopPropagation();">
                            <button type="button" class="mobile-action-btn action-btn-print flex-grow-1" onclick="printSingleExpense(${item.id})" title="প্রিন্ট ভাউচার">
                                <i class="fa-solid fa-print"></i>
                            </button>
                            <button type="button" class="mobile-action-btn action-btn-edit edit-link flex-grow-1" data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#exampleModal" title="এডিট">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="mobile-action-btn action-btn-delete custom-delete-modal-btn flex-grow-1" data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#confirmationModal" title="মুছুন">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>`;
            mobileCardList.append(mobileCard);
        });
        // Re-apply dark mode fix after cards are rendered
        if (typeof applyDarkModeCardFix === 'function') applyDarkModeCardFix();

        // Delete modal click handler
        $('.custom-delete-modal-btn').off('click').on('click', function(e) {
            let id = $(this).data('id');
            $("#deleteID").val(id);
        });
    }

    // Single Expense Voucher Print Function in Current Tab
    function printSingleExpense(id) {
        const item = rawExpenseList.find(e => e.id == id);
        if (!item) {
            errorToast("খরচের তথ্য পাওয়া যায়নি!");
            return;
        }

        const dateFormatted = item.date ? new Date(item.date).toLocaleDateString('en-GB') : '-';
        const amountFormatted = parseFloat(item.expense_amount || 0).toLocaleString('en-IN', {minimumFractionDigits: 2});

        const printHtml = `
            <div style="max-width: 680px; margin: 0 auto; padding: 0 !important; border: none !important; font-family: 'Poppins', 'Noto Sans Bengali', sans-serif; background: #ffffff;">
                <div style="text-align: center; border-bottom: 2px dashed #8C56D4; padding-bottom: 12px; margin-bottom: 15px;">
                    <h2 style="margin: 0; color: #8C56D4; font-size: 22px; font-weight: 800;">মেসার্স আনিস ষ্টোর</h2>
                    <p style="margin: 3px 0; font-size: 12px; color: #64748b;">প্রোঃ মোঃ আনিসুর রহমান | মোবাইল: ০১৭৫৭০১৭৯৭৮</p>
                    <div style="display: inline-block; background: #F3ECFB; color: #8C56D4; font-weight: 700; font-size: 13px; padding: 4px 16px; border-radius: 20px; border: 1px solid #E5D5F7; margin-top: 6px;">
                        খরচের ভাউচার (Expense Voucher)
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; font-size: 12.5px; margin-bottom: 12px; color: #334155;">
                    <div><strong>ভাউচার নং:</strong> #EXP-${item.id}</div>
                    <div><strong>তারিখ:</strong> ${dateFormatted}</div>
                </div>

                <table style="width: 100%; border-collapse: collapse; margin-bottom: 16px; font-size: 13px;">
                    <thead>
                        <tr style="background: #F8FAFC; border-bottom: 1.5px solid #cbd5e1;">
                            <th style="padding: 8px; text-align: left;">বিবরণ</th>
                            <th style="padding: 8px; text-align: right;">পরিমাণ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 10px 8px;">
                                <div style="font-weight: 700; color: #1e293b;">${item.type_name || 'সাধারণ খরচ'}</div>
                                ${item.staff_name ? `<div style="font-size: 11px; color: #8C56D4; margin-top: 2px;">👨‍💼 স্টাফ: ${item.staff_name}</div>` : ''}
                                <div style="font-size: 11.5px; color: #64748b; margin-top: 2px;">${item.expense_details || 'কোনো বিবরণ নেই'}</div>
                            </td>
                            <td style="padding: 10px 8px; text-align: right; font-weight: 700; color: #dc2626; font-size: 14px;">
                                ৳ ${amountFormatted}
                            </td>
                        </tr>
                        <tr style="background: #FAF7FD; font-weight: 800; border-top: 2px solid #8C56D4;">
                            <td style="padding: 10px 8px; color: #8C56D4; font-size: 14px;">সর্বমোট পরিশোধ</td>
                            <td style="padding: 10px 8px; text-align: right; color: #8C56D4; font-size: 16px;">
                                ৳ ${amountFormatted}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div style="display: flex; justify-content: space-between; margin-top: 40px; padding-top: 10px;">
                    <div style="text-align: center; border-top: 1px solid #94a3b8; width: 140px; font-size: 11px; color: #64748b;">
                        গ্রহীতার স্বাক্ষর
                    </div>
                    <div style="text-align: center; border-top: 1px solid #94a3b8; width: 140px; font-size: 11px; color: #64748b;">
                        অনুমোদনকারীর স্বাক্ষর
                    </div>
                </div>

                <div style="text-align: center; margin-top: 20px; font-size: 10px; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 6px;">
                    প্রিন্ট তারিখ: ${new Date().toLocaleString('bn-BD')} | Software By: CodeNext IT
                </div>
            </div>
        `;

        let printBox = document.getElementById('expensePrintContainer');
        if (!printBox) {
            printBox = document.createElement('div');
            printBox.id = 'expensePrintContainer';
            document.body.appendChild(printBox);
        }
        printBox.innerHTML = printHtml;

        // Current-tab Native Printing
        window.print();
    }
</script>