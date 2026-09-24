<!-- Flatpickr CSS & JS per rules.md -->
@once
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endonce

<style>
    /* ===== Base Page & Layout Variables ===== */
    :root {
        --ob-primary: #8C56D4;
        --ob-primary-hover: #793FC5;
        --ob-primary-light: #FAF7FD;
        --ob-border-subtle: #E5D5F7;
    }

    /* Mobile & Tablet Background & Zero Padding Constraint per rules.md 40-42 */
    @media (max-width: 991.98px) {
        .page-content {
            background-color: #ffffff !important;
            padding: 10px !important;
        }
        .ob-main-card {
            border: 0 !important;
            border-color: transparent !important;
            box-shadow: none !important;
            background: transparent !important;
        }
        .ob-main-card .card-body {
            padding: 0 !important;
            border-radius: 0 !important;
            background: transparent !important;
        }
    }

    /* Header Icons & Action Buttons */
    .ob-header-icon-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1.5px solid #E2E8F0;
        background: #ffffff;
        color: #475569;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 14px;
    }
    .ob-header-icon-btn:hover {
        background: #FAF7FD;
        border-color: #8C56D4;
        color: #8C56D4;
    }

    /* Custom Dropdown Styling */
    .ob-dropdown-menu {
        position: absolute;
        top: calc(100% + 6px);
        right: 0;
        z-index: 1050;
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #E2E8F0;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        padding: 6px;
        min-width: 170px;
        display: none;
    }
    .ob-dropdown-menu.show {
        display: block;
        animation: fadeInObDrop 0.15s ease-out;
    }
    @keyframes fadeInObDrop {
        from { opacity: 0; transform: translateY(-6px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .ob-dropdown-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        color: #334155;
        text-decoration: none;
        transition: all 0.15s ease;
        cursor: pointer;
    }
    .ob-dropdown-item:hover,
    .ob-dropdown-item.active {
        background: #FAF7FD;
        color: #8C56D4;
        font-weight: 600;
    }

    /* Search Inputs */
    .ob-search-input {
        height: 42px;
        border-radius: 10px;
        border: 1.5px solid #cbd5e1;
        font-size: 13.5px;
        transition: all 0.2s ease;
    }
    .ob-search-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
    }

    .ob-search-close-btn {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #ef4444;
        color: #ffffff;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        flex-shrink: 0;
        transition: all 0.2s ease;
    }
    .ob-search-close-btn:hover {
        background: #dc2626;
    }

    /* Top Dynamic Summary Strip per rules.md 7.2 */
    .ob-top-summary-strip {
        background: #ffffff;
        border-radius: 6px !important;
        border: none !important;
        box-shadow: 0 4px 18px rgba(140, 86, 212, 0.08), 0 1px 3px rgba(0, 0, 0, 0.04) !important;
    }

    /* Summary Vertical Divider */
    .ob-summary-divider {
        width: 1.5px;
        height: 32px;
        background-color: #E5D5F7;
        flex-shrink: 0;
        margin: 0 16px;
    }

    /* Header Bottom Border & Dividers */
    .ob-header-bottom-border {
        border-bottom: 1px solid #E2E8F0 !important;
    }

    .ob-card-divider {
        border-color: #E2E8F0 !important;
    }

    .ob-footer-border {
        border-top: 1px solid #E2E8F0 !important;
    }

    /* Desktop Table Styling (>= 992px) */
    .ob-table-container {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #E2E8F0;
        overflow: hidden;
    }
    .ob-table-container thead th {
        background-color: #f8fafc;
        color: #475569;
        font-size: 13px;
        font-weight: 600;
        border-bottom: 1.5px solid #e2e8f0;
    }
    .ob-table-container tbody tr {
        transition: background-color 0.15s ease;
    }
    .ob-table-container tbody tr:hover {
        background-color: #FAF7FD;
    }

    /* Mobile & Tablet Box Cards (< 992px) per rules.md 7.3 & 8.3 */
    .ob-card-item {
        background: #ffffff;
        border: 1px solid #E2E8F0 !important;
        border-radius: 12px !important;
        padding: 12px 14px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
        transition: all 0.2s ease;
        position: relative;
    }
    .ob-card-item:hover {
        border-color: #D2B7F1 !important;
        box-shadow: 0 6px 16px rgba(140, 86, 212, 0.1) !important;
    }

    @media (max-width: 767.98px) {
        .ob-card-col {
            width: 100% !important;
            flex: 0 0 100% !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991.98px) {
        .ob-card-col {
            width: calc(50% - 5px) !important;
            flex: 0 0 calc(50% - 5px) !important;
        }
    }

    /* Action Buttons Inside Card / Table */
    .ob-action-btn {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s ease;
        border: 1px solid transparent;
        text-decoration: none;
    }
    .ob-action-edit {
        background: #F3ECFB;
        color: #8C56D4;
        border-color: #E5D5F7;
    }
    .ob-action-edit:hover {
        background: #8C56D4;
        color: #ffffff;
    }
    .ob-action-delete {
        background: #FEE2E2;
        color: #DC2626;
        border-color: #FECACA;
    }
    .ob-action-delete:hover {
        background: #DC2626;
        color: #ffffff;
    }

    /* Floating Action Button (FAB per rules.md 7.6) */
    .ob-floating-btn {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 999;
        width: 52px;
        height: 52px;
        border-radius: 50% !important;
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 20px rgba(140, 86, 212, 0.4);
        border: none;
        cursor: pointer;
        font-size: 20px;
        transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .ob-floating-btn:hover {
        transform: scale(1.08) translateY(-3px);
        box-shadow: 0 10px 24px rgba(140, 86, 212, 0.5);
        color: #ffffff;
    }

    /* ===== Universal Dark Mode Rules per rules.md ===== */
    body[light-mode="dark"] .page-content,
    body[data-layout-mode="dark"] .page-content,
    html[light-mode="dark"] .page-content,
    html[data-layout-mode="dark"] .page-content,
    body.dark-mode .page-content {
        background-color: #0f172a !important;
    }

    /* Dark Mode Borders (Eliminate ALL white border lines) */
    body[light-mode="dark"] .border-bottom,
    body[data-layout-mode="dark"] .border-bottom,
    body.dark-mode .border-bottom,
    html[light-mode="dark"] .border-bottom,
    html[data-layout-mode="dark"] .border-bottom,
    html.dark .border-bottom,
    body[light-mode="dark"] .border-top,
    body[data-layout-mode="dark"] .border-top,
    body.dark-mode .border-top,
    html[light-mode="dark"] .border-top,
    html[data-layout-mode="dark"] .border-top,
    html.dark .border-top,
    body[light-mode="dark"] .border-light-subtle,
    body[data-layout-mode="dark"] .border-light-subtle,
    body.dark-mode .border-light-subtle,
    html[light-mode="dark"] .border-light-subtle,
    html[data-layout-mode="dark"] .border-light-subtle,
    html.dark .border-light-subtle,
    body[light-mode="dark"] .border,
    body[data-layout-mode="dark"] .border,
    body.dark-mode .border,
    html[light-mode="dark"] .border,
    html[data-layout-mode="dark"] .border,
    html.dark .border,
    body[light-mode="dark"] .ob-header-bottom-border,
    body[data-layout-mode="dark"] .ob-header-bottom-border,
    body.dark-mode .ob-header-bottom-border,
    html[light-mode="dark"] .ob-header-bottom-border,
    html[data-layout-mode="dark"] .ob-header-bottom-border,
    html.dark .ob-header-bottom-border,
    body[light-mode="dark"] .ob-card-divider,
    body[data-layout-mode="dark"] .ob-card-divider,
    body.dark-mode .ob-card-divider,
    html[light-mode="dark"] .ob-card-divider,
    html[data-layout-mode="dark"] .ob-card-divider,
    html.dark .ob-card-divider,
    body[light-mode="dark"] .ob-footer-border,
    body[data-layout-mode="dark"] .ob-footer-border,
    body.dark-mode .ob-footer-border,
    html[light-mode="dark"] .ob-footer-border,
    html[data-layout-mode="dark"] .ob-footer-border,
    html.dark .ob-footer-border {
        border-color: #334155 !important;
    }

    /* Summary Vertical Divider in Dark Mode */
    body[light-mode="dark"] .ob-summary-divider,
    body[data-layout-mode="dark"] .ob-summary-divider,
    body.dark-mode .ob-summary-divider,
    html[light-mode="dark"] .ob-summary-divider,
    html[data-layout-mode="dark"] .ob-summary-divider,
    html.dark .ob-summary-divider {
        background-color: #334155 !important;
    }

    /* Title text color in Dark Mode */
    body[light-mode="dark"] .text-dark,
    body[data-layout-mode="dark"] .text-dark,
    body.dark-mode .text-dark,
    html[light-mode="dark"] .text-dark,
    html[data-layout-mode="dark"] .text-dark,
    html.dark .text-dark {
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .ob-top-summary-strip,
    body[data-layout-mode="dark"] .ob-top-summary-strip,
    body.dark-mode .ob-top-summary-strip,
    html[light-mode="dark"] .ob-top-summary-strip,
    html[data-layout-mode="dark"] .ob-top-summary-strip {
        background: #1e293b !important;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.3) !important;
    }

    body[light-mode="dark"] .ob-header-icon-btn,
    body[data-layout-mode="dark"] .ob-header-icon-btn,
    body.dark-mode .ob-header-icon-btn {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .ob-dropdown-menu,
    body[data-layout-mode="dark"] .ob-dropdown-menu,
    body.dark-mode .ob-dropdown-menu {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .ob-dropdown-item,
    body[data-layout-mode="dark"] .ob-dropdown-item,
    body.dark-mode .ob-dropdown-item {
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .ob-dropdown-item:hover,
    body[light-mode="dark"] .ob-dropdown-item.active,
    body[data-layout-mode="dark"] .ob-dropdown-item:hover,
    body[data-layout-mode="dark"] .ob-dropdown-item.active {
        background: #0f172a !important;
        color: #D2B7F1 !important;
    }

    body[light-mode="dark"] .ob-search-input,
    body[data-layout-mode="dark"] .ob-search-input,
    body.dark-mode .ob-search-input {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .ob-table-container,
    body[data-layout-mode="dark"] .ob-table-container,
    body.dark-mode .ob-table-container {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .ob-table-container thead th,
    body[data-layout-mode="dark"] .ob-table-container thead th,
    body.dark-mode .ob-table-container thead th {
        background-color: #0f172a !important;
        color: #cbd5e1 !important;
        border-bottom-color: #334155 !important;
    }
    body[light-mode="dark"] .ob-table-container tbody tr,
    body[data-layout-mode="dark"] .ob-table-container tbody tr,
    body.dark-mode .ob-table-container tbody tr {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .ob-table-container tbody tr:hover,
    body[data-layout-mode="dark"] .ob-table-container tbody tr:hover,
    body.dark-mode .ob-table-container tbody tr:hover {
        background-color: rgba(140, 86, 212, 0.08) !important;
    }

    body[light-mode="dark"] .ob-card-item,
    body[data-layout-mode="dark"] .ob-card-item,
    body.dark-mode .ob-card-item {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .ob-card-item:hover,
    body[data-layout-mode="dark"] .ob-card-item:hover,
    body.dark-mode .ob-card-item:hover {
        border-color: #8C56D4 !important;
    }

    /* Action Buttons in Dark Mode */
    body[light-mode="dark"] .ob-action-edit,
    body[data-layout-mode="dark"] .ob-action-edit,
    body.dark-mode .ob-action-edit,
    html[light-mode="dark"] .ob-action-edit,
    html[data-layout-mode="dark"] .ob-action-edit,
    html.dark .ob-action-edit {
        background: #260B4A !important;
        color: #D2B7F1 !important;
        border-color: #532391 !important;
    }
    body[light-mode="dark"] .ob-action-edit:hover,
    body[data-layout-mode="dark"] .ob-action-edit:hover,
    body.dark-mode .ob-action-edit:hover {
        background: #8C56D4 !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .ob-action-delete,
    body[data-layout-mode="dark"] .ob-action-delete,
    body.dark-mode .ob-action-delete,
    html[light-mode="dark"] .ob-action-delete,
    html[data-layout-mode="dark"] .ob-action-delete,
    html.dark .ob-action-delete {
        background: rgba(239, 68, 68, 0.18) !important;
        color: #f87171 !important;
        border-color: rgba(239, 68, 68, 0.3) !important;
    }
    body[light-mode="dark"] .ob-action-delete:hover,
    body[data-layout-mode="dark"] .ob-action-delete:hover,
    body.dark-mode .ob-action-delete:hover {
        background: #DC2626 !important;
        color: #ffffff !important;
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

<!-- Opening Balance Main Content Start -->
<div class="main-content">
    <div class="page-content" style="padding: 10px !important;">
        <div class="data-table border-0 shadow-none bg-transparent">
            <div class="ob-main-card border-0 border-none shadow-none bg-transparent">
                <div class="card-body border-0 p-0" style="padding: 0px !important; background: transparent !important;">

                    <!-- 1. Page Header (Bengali title, purple bar, search toggle, filter dropdown & add button) -->
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3 pb-2 ob-header-bottom-border">
                        <!-- Left: Purple Accent Bar + Title -->
                        <div class="d-flex align-items-center gap-2 flex-grow-1 overflow-hidden">
                            <span style="display: inline-block; width: 4.5px; height: 22px; background: #8C56D4; border-radius: 2px; margin-right: 6px; flex-shrink: 0;"></span>
                            <div class="rounded-3 d-none d-lg-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; background: #F3ECFB; color: #8C56D4;">
                                <i class="fa-solid fa-wallet fs-6"></i>
                            </div>
                            <h4 class="m-0 p-0 fw-bold text-dark d-flex align-items-center gap-1.5" style="font-size: 18px; line-height: 1.3;">
                                <span>প্রারম্ভিক ব্যালেন্স (Opening Balance)</span>
                            </h4>
                        </div>

                        <!-- Right: Actions for Mobile/Tab & Desktop -->
                        <div class="d-flex align-items-center gap-2 flex-shrink-0">
                            <!-- Mobile Search Toggle Button -->
                            <button type="button" id="mobileSearchToggleBtn" class="ob-header-icon-btn d-lg-none" onclick="toggleMobileSearchBar()" title="অনুসন্ধান">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>

                            <!-- Filter Dropdown Button -->
                            <div class="position-relative" id="filterDropdownContainer">
                                <button type="button" class="ob-header-icon-btn" id="filterDropdownToggle" onclick="toggleFilterDropdown()" title="ফিল্টার">
                                    <i class="fa-solid fa-filter"></i>
                                </button>
                                <div class="ob-dropdown-menu end-0 shadow-lg" id="filterDropdownMenu">
                                    <a href="javascript:void(0)" class="ob-dropdown-item active" data-filter="all" onclick="selectFilterDate('all', 'সকল ব্যালেন্স', event)">
                                        <i class="fa-solid fa-list me-1.5 opacity-75"></i> <span>সকল ব্যালেন্স</span>
                                    </a>
                                    <a href="javascript:void(0)" class="ob-dropdown-item" data-filter="today" onclick="selectFilterDate('today', 'আজকের ব্যালেন্স', event)">
                                        <i class="fa-solid fa-calendar-day me-1.5 opacity-75"></i> <span>আজকের ব্যালেন্স</span>
                                    </a>
                                    <a href="javascript:void(0)" class="ob-dropdown-item" data-filter="last_7_days" onclick="selectFilterDate('last_7_days', 'গত ৭ দিন', event)">
                                        <i class="fa-solid fa-calendar-week me-1.5 opacity-75"></i> <span>গত ৭ দিন</span>
                                    </a>
                                    <a href="javascript:void(0)" class="ob-dropdown-item" data-filter="this_month" onclick="selectFilterDate('this_month', 'চলতি মাস', event)">
                                        <i class="fa-solid fa-calendar-days me-1.5 opacity-75"></i> <span>চলতি মাস</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Desktop New Opening Balance Button -->
                            <button type="button" id="mainNewOpeningBalanceBtn" onclick="triggerCreateOpeningBalanceModal()" class="btn btn-primary d-none d-lg-inline-flex align-items-center gap-1.5 px-3 py-2 fw-bold text-white shadow-sm" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; border-radius: 10px; font-size: 13.5px;">
                                <i class="fa-solid fa-plus"></i>
                                <span>নতুন ব্যালেন্স</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Search Bar Section -->
                    <!-- Mobile Expandable Search Bar -->
                    <div id="mobileSearchWrap" class="mb-3 d-none position-relative">
                        <div class="d-flex align-items-center gap-2 mb-0">
                            <div class="position-relative flex-grow-1 mb-0">
                                <input type="text" id="mobileSearchInput" class="form-control ob-search-input mb-0" placeholder="🔍 ব্যালেন্স খুঁজুন (তারিখ, টাকা, নোট)..." autocomplete="off" />
                                <div id="mobileSearchDropdown" class="search-live-dropdown shadow-lg rounded-3 d-none position-absolute w-100 start-0"></div>
                            </div>
                            <button type="button" class="ob-search-close-btn mb-0" onclick="closeMobileSearchBar()" title="বন্ধ করুন">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Desktop Search Toolbar (>= 992px) -->
                    <div class="mb-3 d-none d-lg-flex align-items-center justify-content-between gap-3">
                        <div class="position-relative flex-grow-1" style="max-width: 440px;">
                            <input type="text" id="searchInput" class="form-control ob-search-input ps-5" placeholder="🔍 ব্যালেন্স খুঁজুন (তারিখ, টাকা, নোট)..." autocomplete="off" />
                            <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="left: 16px; top: 50%; transform: translateY(-50%); font-size: 14px;"></i>
                            <div id="desktopSearchDropdown" class="search-live-dropdown shadow-lg rounded-3 d-none position-absolute w-100 start-0"></div>
                        </div>
                        <div id="filterBadgeText" class="badge px-3 py-2 fw-bold text-muted bg-light border" style="font-size: 12.5px; border-radius: 8px;">
                            <i class="fa-solid fa-filter me-1 text-primary" style="color: #8C56D4 !important;"></i> ফিল্টার: সকল ব্যালেন্স
                        </div>
                    </div>

                    <!-- 3. Top Dynamic Summary Strip (rules.md 7.2: 1 Row, 2 Columns, Vertical Divider, Purple Color) -->
                    <div class="ob-top-summary-strip mb-3 p-2.5 px-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Left: মোট এন্ট্রি সংখ্যা -->
                            <div class="d-flex flex-column text-start ps-1 flex-grow-1">
                                <span class="text-muted small fw-medium" style="font-size: 12px;">মোট এন্ট্রি সংখ্যা</span>
                                <span class="fw-bold" id="topSummaryTotalCount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">০ টি</span>
                            </div>

                            <!-- Middle Vertical Divider Bar -->
                            <div class="ob-summary-divider"></div>

                            <!-- Right: সর্বমোট প্রারম্ভিক ব্যালেন্স -->
                            <div class="d-flex flex-column text-end pe-1 flex-grow-1">
                                <span class="text-muted small fw-medium" style="font-size: 12px;">সর্বমোট প্রারম্ভিক ব্যালেন্স</span>
                                <span class="fw-bold" id="topSummaryTotalAmount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">৳ ০.০০</span>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Desktop Table View (>= 992px) -->
                    <div class="table-responsive d-none d-lg-block ob-table-container shadow-sm mb-3">
                        <table class="table table-hover align-middle mb-0" id="openingBalanceTable">
                            <thead>
                                <tr>
                                    <th class="ps-4 py-3" style="width: 70px;">#</th>
                                    <th class="py-3" style="width: 150px;">তারিখ</th>
                                    <th class="py-3 text-end" style="width: 180px;">ব্যালেন্স পরিমাণ</th>
                                    <th class="py-3 ps-4">নোট / বিবরণ</th>
                                    <th class="pe-4 py-3 text-center" style="width: 120px;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody id="tableList">
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="fa-solid fa-circle-notch fa-spin me-2"></i> ডাটা লোড হচ্ছে...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- 5. Mobile & Tablet Box-Type Card Layout (< 992px: Tab = 2 cards per row, Mobile = 1 card per row per rules.md 8.3) -->
                    <div id="mobileCardList" class="d-flex flex-wrap d-lg-none m-0 p-0 border-0 shadow-none bg-transparent" style="gap: 10px !important;">
                        <div class="col-12 text-center py-4 text-muted w-100 ob-card-item rounded-3">
                            <i class="fa-solid fa-circle-notch fa-spin me-2"></i> ডাটা লোড হচ্ছে...
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Floating Add Opening Balance Button (FAB per rules.md 7.6) -->
        <button type="button" onclick="triggerCreateOpeningBalanceModal()" class="ob-floating-btn d-lg-none" title="নতুন প্রারম্ভিক ব্যালেন্স যুক্ত করুন">
            <i class="fa-solid fa-plus"></i>
        </button>

        <!-- Footer -->
        <footer class="footer text-center py-3 mt-4 text-muted small ob-footer-border">&copy; {{ date('Y') }} মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="fw-bold text-decoration-none" style="color: #8C56D4 !important;">CodeNext IT</a></footer>
    </div>
</div>
<!-- Opening Balance Main Content End -->

<script>
    // Global State
    window.rawOpeningBalanceData = [];
    window.currentFilterDateMode = 'all';
    window.currentSearchTerm = '';

    document.addEventListener('DOMContentLoaded', function() {
        getList();

        // Close dropdown when clicked outside
        document.addEventListener('click', function(e) {
            const container = document.getElementById('filterDropdownContainer');
            const menu = document.getElementById('filterDropdownMenu');
            if (container && menu && !container.contains(e.target)) {
                menu.classList.remove('show');
            }
        });
    });

    // Mobile Search Bar Toggle
    function toggleMobileSearchBar() {
        const wrap = document.getElementById('mobileSearchWrap');
        if (wrap) {
            wrap.classList.remove('d-none');
            const input = document.getElementById('mobileSearchInput');
            if (input) input.focus();
        }
    }

    function closeMobileSearchBar() {
        const wrap = document.getElementById('mobileSearchWrap');
        const input = document.getElementById('mobileSearchInput');
        if (input) input.value = '';
        const desktopInput = document.getElementById('searchInput');
        if (desktopInput) desktopInput.value = '';
        $('.search-live-dropdown').addClass('d-none').empty();
        if (wrap) wrap.classList.add('d-none');
        handleSearch('');
    }

    // Filter Dropdown Toggle
    function toggleFilterDropdown() {
        const menu = document.getElementById('filterDropdownMenu');
        if (menu) menu.classList.toggle('show');
    }

    function selectFilterDate(mode, label, event) {
        if (event) event.preventDefault();
        window.currentFilterDateMode = mode;

        // Update active class
        document.querySelectorAll('.ob-dropdown-item').forEach(el => el.classList.remove('active'));
        if (event && event.currentTarget) event.currentTarget.classList.add('active');

        // Update badge text on desktop
        const badge = document.getElementById('filterBadgeText');
        if (badge) {
            badge.innerHTML = `<i class="fa-solid fa-filter me-1" style="color: #8C56D4 !important;"></i> ফিল্টার: ${label}`;
        }

        // Close dropdown
        const menu = document.getElementById('filterDropdownMenu');
        if (menu) menu.classList.remove('show');

        // Re-render
        renderFilteredData();
    }

    // Live Search
    function handleSearch(term) {
        window.currentSearchTerm = (term || '').trim().toLowerCase();
        renderFilteredData();
    }

    function handleLiveSearch(term) {
        let cleanTerm = (term || "").toLowerCase().trim();
        renderLiveDropdown("mobileSearchDropdown", cleanTerm);
        renderLiveDropdown("desktopSearchDropdown", cleanTerm);
    }

    function renderLiveDropdown(containerId, cleanTerm) {
        const dropdown = $("#" + containerId);
        let items = window.rawOpeningBalanceData || [];
        if (!cleanTerm || cleanTerm.length === 0 || !items || items.length === 0) {
            dropdown.addClass("d-none").empty();
            return;
        }

        let matches = items.filter(i => {
            const dateMatch = (i.date || '').toLowerCase().includes(cleanTerm);
            const amountMatch = (i.amount || '').toString().includes(cleanTerm);
            const noteMatch = (i.note || '').toLowerCase().includes(cleanTerm);
            return dateMatch || amountMatch || noteMatch;
        }).slice(0, 8);

        if (matches.length === 0) {
            dropdown.html('<div class="p-3 text-center text-muted small"><i class="fa-solid fa-circle-exclamation me-1"></i>কোনো ব্যালেন্স পাওয়া যায়নি</div>').removeClass("d-none");
            return;
        }

        let html = '';
        matches.forEach(item => {
            const dateStr = item.date ? formatBengaliDate(item.date) : '-';
            const amountFormatted = parseFloat(item.amount || 0).toLocaleString('en-US', {minimumFractionDigits: 2});
            const noteText = item.note ? `<span class="text-muted small d-block text-truncate" style="font-size: 11px;"><i class="fa-solid fa-note-sticky me-1"></i>${item.note}</span>` : '<span class="text-muted small d-block" style="font-size: 11px;">প্রারম্ভিক ব্যালেন্স</span>';
            const safeSearchTerm = (item.date || item.amount || '').toString().replace(/'/g, "\\'");

            html += `
                <div class="search-live-item" onclick="selectSearchDropdownItem('${safeSearchTerm}')">
                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px; background: #FAF5FF; color: #8C56D4; font-size: 13px;">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <div class="overflow-hidden">
                            <span class="fw-bold text-dark d-block text-truncate" style="font-size: 13px;">তারিখ: ${dateStr}</span>
                            ${noteText}
                        </div>
                    </div>
                    <div class="text-end flex-shrink-0 ms-2">
                        <span class="badge bg-light text-dark border mb-1 d-inline-block" style="font-size: 10px;">ব্যালেন্স</span>
                        <div class="text-success fw-bold" style="font-size: 11.5px;">৳ ${toBengaliNumber(amountFormatted)}</div>
                    </div>
                </div>
            `;
        });

        dropdown.html(html).removeClass("d-none");
    }

    function selectSearchDropdownItem(term) {
        $("#searchInput").val(term);
        $("#mobileSearchInput").val(term);
        $(".search-live-dropdown").addClass("d-none").empty();
        handleSearch(term);
    }

    $(document).ready(function() {
        $("#searchInput").on("keyup search input focus", function () {
            let val = $(this).val();
            $("#mobileSearchInput").val(val);
            handleLiveSearch(val);
            handleSearch(val);
        });

        $("#mobileSearchInput").on("keyup search input focus", function () {
            let val = $(this).val();
            $("#searchInput").val(val);
            handleLiveSearch(val);
            handleSearch(val);
        });

        $(document).on("click", function (e) {
            if (!$(e.target).closest("#searchInput, #mobileSearchInput, #desktopSearchDropdown, #mobileSearchDropdown").length) {
                $(".search-live-dropdown").addClass("d-none").empty();
            }
        });
    });

    // Number to Bengali digits helper
    function toBengaliNumber(num) {
        if (num === null || num === undefined) return '';
        const banglaDigits = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
        return num.toString().replace(/[0-9]/g, function(d) {
            return banglaDigits[d] || d;
        });
    }

    // Format Date to DD-MM-YYYY (Bengali)
    function formatBengaliDate(dateStr) {
        if (!dateStr) return '-';
        const parts = dateStr.split('-');
        if (parts.length === 3) {
            // YYYY-MM-DD -> DD-MM-YYYY
            const formatted = `${parts[2]}-${parts[1]}-${parts[0]}`;
            return toBengaliNumber(formatted);
        }
        return toBengaliNumber(dateStr);
    }

    // Fetch List from Server
    async function getList() {
        try {
            showLoader();
            let res = await axios.get("/api/opening-balance-list", typeof HeaderToken === 'function' ? HeaderToken() : {});
            hideLoader();

            if (res.data && res.data.status === "success" && Array.isArray(res.data.data)) {
                window.rawOpeningBalanceData = res.data.data;
            } else {
                window.rawOpeningBalanceData = [];
            }

            renderFilteredData();

        } catch (e) {
            hideLoader();
            console.error("Error loading opening balance list:", e);
            if (e.response?.status === 401 && typeof unauthorized === 'function') {
                unauthorized(401);
            }
        }
    }

    // Render Data based on Filters and Search
    function renderFilteredData() {
        let items = window.rawOpeningBalanceData || [];
        const todayStr = new Date().toISOString().slice(0, 10);

        // Date Filter
        if (window.currentFilterDateMode === 'today') {
            items = items.filter(i => (i.date || '').slice(0, 10) === todayStr);
        } else if (window.currentFilterDateMode === 'last_7_days') {
            const d7 = new Date();
            d7.setDate(d7.getDate() - 7);
            const d7Str = d7.toISOString().slice(0, 10);
            items = items.filter(i => {
                const itemDate = (i.date || '').slice(0, 10);
                return itemDate >= d7Str && itemDate <= todayStr;
            });
        } else if (window.currentFilterDateMode === 'this_month') {
            const currentMonthPrefix = todayStr.slice(0, 7); // YYYY-MM
            items = items.filter(i => (i.date || '').slice(0, 7) === currentMonthPrefix);
        }

        // Search Filter
        if (window.currentSearchTerm) {
            const term = window.currentSearchTerm;
            items = items.filter(i => {
                const dateMatch = (i.date || '').toLowerCase().includes(term);
                const amountMatch = (i.amount || '').toString().includes(term);
                const noteMatch = (i.note || '').toLowerCase().includes(term);
                return dateMatch || amountMatch || noteMatch;
            });
        }

        // Update Top Summary Strip
        const totalCount = items.length;
        const totalAmount = items.reduce((sum, i) => sum + (parseFloat(i.amount) || 0), 0);

        const countEl = document.getElementById('topSummaryTotalCount');
        const amountEl = document.getElementById('topSummaryTotalAmount');

        if (countEl) countEl.innerText = `${toBengaliNumber(totalCount)} টি`;
        if (amountEl) amountEl.innerText = `৳ ${toBengaliNumber(totalAmount.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }))}`;

        // Render Desktop Table
        const tableBody = document.getElementById('tableList');
        if (tableBody) {
            tableBody.innerHTML = '';
            if (items.length > 0) {
                items.forEach((item, idx) => {
                    const row = `
                        <tr>
                            <td class="ps-4 fw-bold text-muted">${toBengaliNumber(idx + 1)}</td>
                            <td>
                                <span class="d-inline-flex align-items-center fw-medium" style="gap: 8px !important;">
                                    <i class="fa-solid fa-calendar-day text-primary opacity-75" style="color: #8C56D4 !important; font-size: 13px;"></i>
                                    <span>${formatBengaliDate(item.date)}</span>
                                </span>
                            </td>
                            <td class="text-end fw-bold fs-6" style="color: #8C56D4;">
                                ৳ ${toBengaliNumber(parseFloat(item.amount || 0).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }))}
                            </td>
                            <td class="ps-4 text-muted small">${item.note ? item.note : '<span class="text-muted opacity-50">- কোনো নোট নেই -</span>'}</td>
                            <td class="pe-4 text-center">
                                <div class="d-inline-flex align-items-center" style="gap: 8px !important;">
                                    <button type="button" class="ob-action-btn ob-action-edit" title="সম্পাদনা করুন" onclick="openEditOpeningBalanceModal('${item.id}')">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="ob-action-btn ob-action-delete" title="মুছে ফেলুন" onclick="openDeleteOpeningBalanceModal('${item.id}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            } else {
                tableBody.innerHTML = `<tr><td colspan="5" class="text-center py-4 text-muted">কোনো প্রারম্ভিক ব্যালেন্স পাওয়া যায়নি</td></tr>`;
            }
        }

        // Render Mobile & Tablet Box Cards
        const cardList = document.getElementById('mobileCardList');
        if (cardList) {
            cardList.innerHTML = '';
            if (items.length > 0) {
                items.forEach((item) => {
                    const card = `
                        <div class="ob-card-col">
                            <div class="ob-card-item">
                                <!-- Top Row: Date Badge & Actions -->
                                <div class="d-flex align-items-center justify-content-between pb-2 mb-2 ob-card-divider" style="border-bottom: 1px solid #E2E8F0;">
                                    <div class="d-flex align-items-center small fw-bold text-muted" style="gap: 8px !important;">
                                        <i class="fa-solid fa-calendar-days" style="color: #8C56D4; font-size: 13.5px;"></i>
                                        <span>${formatBengaliDate(item.date)}</span>
                                    </div>
                                    <div class="d-flex align-items-center" style="gap: 8px !important;">
                                        <button type="button" class="ob-action-btn ob-action-edit" title="সম্পাদনা" onclick="openEditOpeningBalanceModal('${item.id}')">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="ob-action-btn ob-action-delete" title="মুছে ফেলুন" onclick="openDeleteOpeningBalanceModal('${item.id}')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Middle: Balance Amount -->
                                <div class="d-flex align-items-baseline justify-content-between mb-1">
                                    <span class="small text-muted fw-medium">ব্যালেন্স পরিমাণ:</span>
                                    <span class="fs-6 fw-bold" style="color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">
                                        ৳ ${toBengaliNumber(parseFloat(item.amount || 0).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }))}
                                    </span>
                                </div>

                                <!-- Note -->
                                <div class="mt-1 pt-1 ob-card-divider" style="border-top: 1px solid #E2E8F0;">
                                    <p class="m-0 text-muted small" style="font-size: 11.5px; line-height: 1.4;">
                                        <span class="fw-semibold">নোট:</span> ${item.note ? item.note : '<span class="opacity-50">কোনো মন্তব্য নেই</span>'}
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                    cardList.insertAdjacentHTML('beforeend', card);
                });
            } else {
                cardList.innerHTML = `<div class="col-12 text-center py-4 text-muted w-100 ob-card-item rounded-3">কোনো প্রারম্ভিক ব্যালেন্স পাওয়া যায়নি</div>`;
            }
        }
    }

    // Trigger Delete Modal
    function openDeleteOpeningBalanceModal(id) {
        const idInput = document.getElementById('deleteOpeningBalanceId');
        if (idInput) idInput.value = id;
        $("#deleteOpeningBalanceModal").modal('show');
    }
</script>
