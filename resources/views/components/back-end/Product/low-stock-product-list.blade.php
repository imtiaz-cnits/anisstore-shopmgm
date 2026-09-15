<!-- Hero Main Content Start -->
<div class="main-content">
    <div class="page-content">
        <!-- Table Start -->
        <div class="data-table">
            
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                <div class="card-body p-3 p-sm-4">
                    
                    <!-- 1. Title Header matching product-list / invoice-list -->
                    <div class="invoice-card-header mb-3 pb-2 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-3">
                            <div class="invoice-title-icon-box rounded-3 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-triangle-exclamation fs-5 text-danger"></i>
                            </div>
                            <div>
                                <h4 class="invoice-main-heading m-0 p-0 fw-bold d-flex align-items-center gap-2 flex-wrap">
                                    <span>কম স্টক প্রোডাক্ট তালিকা</span>
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2.5 py-0.5" style="font-size: 11px; font-weight: 600;">Low Stock Alerts</span>
                                </h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <button onclick="getLowStockList()" class="toolbar-control-btn d-inline-flex align-items-center justify-content-center px-3 gap-2" style="height: 38px !important; min-height: 38px !important; font-size: 13px !important;" title="ডাটা রিফ্রেশ করুন">
                                <i class="fa-solid fa-rotate-right" style="color: #8C56D4;"></i>
                                <span>রিফ্রেশ</span>
                            </button>
                            <a href="{{ url('admin-dashboard-Purchase') }}" class="btn text-white fw-bold d-inline-flex align-items-center justify-content-center px-3 gap-1 shadow-sm" style="height: 38px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); font-size: 13px; border: none; cursor: pointer; text-decoration: none;">
                                <i class="fa-solid fa-cart-plus me-1"></i>
                                <span>+ স্টক পারচেজ</span>
                            </a>
                        </div>
                    </div>

                    <!-- 2. Smart Summary Metric Cards Bar (2 per row on Mobile & Tablet, 3 per row on Desktop) -->
                    <div class="row g-2 mb-3">
                        <div class="col-6 col-md-6 col-lg-4">
                            <div class="card border-0 shadow-sm rounded-3 py-2 px-3 bg-white border-start border-4 border-primary h-100" style="border-left-color: #8C56D4 !important;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-muted d-block small fw-bold" style="font-size: 10px; text-transform: uppercase;">মোট কম স্টক প্রোডাক্ট</span>
                                        <h4 id="summaryTotalLowStock" class="fw-extrabold mb-0" style="font-size: 17px; color: #8C56D4;">0</h4>
                                    </div>
                                    <div class="rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background: #F3ECFB; color: #8C56D4;">
                                        <i class="fa-solid fa-boxes-stacked fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-4">
                            <div class="card border-0 shadow-sm rounded-3 py-2 px-3 card-out-of-stock border-start border-4 border-danger h-100">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-danger d-block small fw-extrabold" style="font-size: 10px; text-transform: uppercase;">স্টক শূন্য / নেগেটিভ</span>
                                        <h4 id="summaryOutOfStock" class="fw-extrabold text-danger mb-0" style="font-size: 17px;">0</h4>
                                    </div>
                                    <div class="rounded-circle p-2 d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px; background: linear-gradient(135deg, #ef4444 0%, #f43f5e 100%); color: #ffffff;">
                                        <i class="fa-solid fa-circle-exclamation fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card border-0 shadow-sm rounded-3 py-2 px-3 bg-white border-start border-4 border-warning h-100">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-muted d-block small fw-bold" style="font-size: 10px; text-transform: uppercase;">রিঅর্ডার তালিকা (১-১০)</span>
                                        <h4 id="summaryWarningStock" class="fw-extrabold text-warning mb-0" style="font-size: 17px;">0</h4>
                                    </div>
                                    <div class="bg-warning-subtle text-warning rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                        <i class="fa-solid fa-truck-ramp-box fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Prominent Search Input Bar -->
                    <div class="invoice-search-box-wrap mb-3 position-relative">
                        <input type="text" id="searchInput" class="form-control invoice-search-input"
                            placeholder="যেকোনো কম স্টক পণ্য, কোড, দাম বা ব্র্যান্ড টাইপ করে খুঁজুন..." onfocus="this.select()" autocomplete="off" />
                        <i class="fa-solid fa-magnifying-glass invoice-search-addon-icon"></i>
                        <button type="button" id="clearSearchBtn" class="btn p-0 border-0 position-absolute end-0 top-50 translate-middle-y me-3 text-muted d-none" style="z-index: 5;" onclick="clearSearchField()" title="Clear Search">
                            <i class="fa-solid fa-circle-xmark fs-5 text-secondary"></i>
                        </button>
                    </div>

                    <!-- 4. Toolbar Section: Row 1 (Entry & Custom Filter), Row 2 (PDF, Print) -->
                    <div class="invoice-toolbar-section mb-3 d-flex flex-column gap-3">
                        <!-- Row 1: Entry, Filter & Add Product -->
                        <div class="toolbar-row-1 d-flex align-items-center justify-content-between gap-2 w-100 mb-2 flex-wrap">
                            <!-- Left: "এন্ট্রি:" + "ফিল্টার:" Custom dropdowns -->
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <!-- Entry selector -->
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

                                <!-- Filter dropdown (Only number in brackets) -->
                                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                    <span class="fw-semibold text-slate-700 dark:text-slate-200 small" style="font-size: 13.5px; white-space: nowrap;">ফিল্টার:</span>
                                    <div class="custom-dropdown-wrap position-relative" id="filterDropdownContainer" style="width: auto !important;">
                                        <button type="button" class="toolbar-control-btn d-inline-flex align-items-center justify-content-between px-3 gap-2" id="filterDropdownToggle" onclick="toggleCustomDropdown('filterDropdownMenu')" style="width: auto !important; min-width: 170px;">
                                            <span id="currentFilterText" class="fw-bold fs-7 fs-sm-6">সকল কম স্টক (<span id="toggleFilterCount">০</span>)</span>
                                            <i class="fa-solid fa-chevron-down dropdown-arrow-icon"></i>
                                        </button>
                                        <input type="hidden" id="stockStatusFilter" value="all">
                                        <div class="custom-dropdown-menu" id="filterDropdownMenu" style="min-width: 190px;">
                                            <div class="custom-dropdown-item active" data-value="all" onclick="selectFilterOption('all', 'সকল কম স্টক')">
                                                সকল কম স্টক (<span id="filterAllCount">০</span>)
                                            </div>
                                            <div class="custom-dropdown-item" data-value="zero" onclick="selectFilterOption('zero', 'স্টক শূন্য')">
                                                স্টক শূন্য (<span id="filterZeroCount">০</span>)
                                            </div>
                                            <div class="custom-dropdown-item" data-value="low" onclick="selectFilterOption('low', 'রিঅর্ডার')">
                                                রিঅর্ডার (<span id="filterReorderCount">০</span>)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: + Add Product Button -->
                            <button id="openModalBtns" type="button" class="btn text-white fw-bold d-inline-flex align-items-center justify-content-center px-3 gap-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#createProduct" onclick="openPosAddProductModal()" style="height: 42px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); font-size: 13.5px; border: none; cursor: pointer;">
                                <i class="fa-solid fa-plus fs-6 me-1"></i> নতুন প্রোডাক্ট
                            </button>
                        </div>

                        <!-- Row 2: Action Buttons (PDF, Print in 2 columns - CSV removed) -->
                        <div class="toolbar-row-2 w-100" style="display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 10px !important;">
                            <button type="button" id="pdfBtn" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-center px-3 gap-2" title="PDF ডাউনলোড করুন" onclick="exportLowStockPDF()">
                                <i class="fa-solid fa-file-pdf text-danger" style="font-size: 15px;"></i>
                                <span class="fw-bold fs-7 fs-sm-6">PDF</span>
                            </button>
                            <button type="button" id="printBtn" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-center px-3 gap-2" title="প্রিন্ট করুন" onclick="printLowStockTable()">
                                <i class="fa-solid fa-print" style="color: #8C56D4; font-size: 15px;"></i>
                                <span class="fw-bold fs-7 fs-sm-6">প্রিন্ট</span>
                            </button>
                        </div>
                    </div>

                    <!-- 5. Desktop Table View (>= 992px) -->
                    <div class="table-responsive d-none d-lg-block">
                        <table id="printTable" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 50px;">Serial No</th>
                                    <th class="text-center" style="width: 90px;">Action</th>
                                    <th class="text-center" style="width: 70px;">Image</th>
                                    <th class="text-start" style="width: 140px;">Barcode</th>
                                    <th class="text-start">Name</th>
                                    <th class="text-start">Category / Brand</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-end">Cost Price</th>
                                    <th class="text-end">Total Cost Price</th>
                                    <th class="text-end">Selling Price</th>
                                    <th class="text-center" style="width: 110px;">Stock</th>
                                </tr>
                            </thead>
                            <tbody id="tableList">
                                <tr>
                                    <td colspan="11" class="text-center py-5">
                                        <div class="spinner-border text-danger me-2" role="status"></div>
                                        <span class="fw-bold text-muted">কম স্টক ডাটা লোড হচ্ছে...</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="table-light fw-bold">
                                <tr>
                                    <td colspan="6" class="text-end fw-bold">Total:</td>
                                    <td id="totalQuantity" class="text-center fw-bold">0</td>
                                    <td id="totalCostPrice" class="text-end fw-bold">0.00</td>
                                    <td id="totalCostQuantityPrice" class="text-end fw-bold">0.00</td>
                                    <td id="totalSellingPrice" class="text-end fw-bold">0.00</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- 6. Mobile & Tablet Responsive Box-Type Card List View (< 992px) -->
                    <div id="mobileCardList" class="row g-3 d-flex flex-wrap d-lg-none mb-3">
                        <div class="col-12 text-center py-4">
                            <div class="spinner-border text-danger me-2" role="status"></div>
                            <span class="fw-bold text-muted">ডাটা লোড হচ্ছে...</span>
                        </div>
                    </div>

                    <!-- 7. Smart Pagination and Display Info Footer -->
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between pt-3 mt-3 border-top gap-2">
                        <div class="text-muted small fw-medium" id="display-info">
                            Showing <strong>0</strong> to <strong>0</strong> of <strong>0</strong> entries
                        </div>
                        <div id="pagination" class="d-flex align-items-center gap-1 flex-wrap justify-content-center"></div>
                    </div>

                </div>
            </div>

        </div>
        
        <div class="copyright">
            <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; 2026 মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-success fw-bold text-decoration-none">CodeNext IT</a></footer>
        </div>

    </div>
</div>
<!-- Hero Main Content End -->

<style>
    /* 1. Header & Title Box matching product-list & invoice-list */
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

    /* 2. Standardized Form Inputs */
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
    .invoice-search-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.2) !important;
        outline: none !important;
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

    /* 3. Toolbar Controls */
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
        max-width: 240px;
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

    /* Card Out of Stock */
    .card-out-of-stock {
        background-color: #fef2f2 !important;
    }

    /* Mobile Card Action Buttons */
    .mobile-card-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding-top: 10px !important;
        margin-top: 0px !important;
        border-top: 1.5px solid #E5D5F7 !important;
    }
    .mobile-action-btn {
        flex: 1 1 0;
        height: 38px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13.5px;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        border: 1px solid transparent;
        text-decoration: none;
        gap: 6px;
    }
    .mobile-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
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
    .mobile-action-btn.action-btn-purchase {
        background: #F3ECFB;
        color: #8C56D4;
        border-color: #E5D5F7;
    }
    .mobile-action-btn.action-btn-purchase:hover {
        background: #8C56D4;
        color: #ffffff;
    }

    /* Badge Styles */
    .badge {
        display: inline-block;
        padding: 0.5em 1em;
        border-radius: 12px;
        font-size: 0.85em;
        font-weight: bold;
        text-align: center;
        color: #fff;
    }
    .badge.available {
        background-color: #793FC5;
    }
    .badge.out-of-stock {
        background-color: #dc3545;
    }
    .badge.warning-stock {
        background-color: #f59e0b;
        color: #ffffff;
    }
    .badge:hover {
        opacity: 0.85;
        cursor: default;
    }

    /* Product Mobile Card & Summary Strip */
    .invoice-mobile-card {
        border: 1.5px solid #E5D5F7 !important;
        border-radius: 14px !important;
        box-shadow: 0 2px 10px rgba(140, 86, 212, 0.08) !important;
        background-color: #ffffff;
        padding: 16px !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }
    .invoice-mobile-card:hover {
        box-shadow: 0 4px 16px rgba(140, 86, 212, 0.14) !important;
        border-color: #d1b7f3 !important;
    }

    .product-card-topbar {
        padding-bottom: 12px !important;
        margin-bottom: 14px !important;
        border-bottom: 1.5px solid #E5D5F7 !important;
    }
    body[light-mode="dark"] .product-card-topbar,
    body[data-layout-mode="dark"] .product-card-topbar,
    body.dark-mode .product-card-topbar {
        border-bottom: 1.5px solid #334155 !important;
    }

    .invoice-summary-strip {
        background: #FAF7FD !important;
        border: 1.5px solid #E5D5F7 !important;
        border-radius: 12px !important;
        padding: 10px !important;
        margin-top: 10px !important;
        margin-bottom: 12px !important;
    }
    .invoice-summary-strip .row {
        --bs-gutter-x: 10px !important;
        --bs-gutter-y: 10px !important;
        margin-right: -5px !important;
        margin-left: -5px !important;
    }
    .invoice-summary-strip .col-6 {
        padding-right: 5px !important;
        padding-left: 5px !important;
    }
    .invoice-price-box {
        padding: 8px 10px !important;
        background-color: #ffffff;
        border: 1px solid #E5D5F7 !important;
        border-radius: 8px !important;
        height: 100% !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
    }
    .invoice-price-box .summary-label {
        font-size: 11px !important;
        font-weight: 600 !important;
        color: #64748b;
        text-transform: uppercase;
        margin-bottom: 3px;
    }
    .invoice-price-box .summary-price {
        font-size: 14px !important;
        font-weight: 700 !important;
        white-space: nowrap !important;
        line-height: 1.25;
    }

    /* Modern Smart Pagination Button Styles */
    .custom-pagination-btn {
        min-width: 36px;
        height: 36px;
        padding: 0 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
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

    /* Universal Dark Mode Support */
    body[light-mode="dark"] .invoice-card-header,
    body[data-layout-mode="dark"] .invoice-card-header,
    body.dark-mode .invoice-card-header {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .invoice-title-icon-box,
    body[data-layout-mode="dark"] .invoice-title-icon-box,
    body.dark-mode .invoice-title-icon-box {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .invoice-main-heading,
    body[data-layout-mode="dark"] .invoice-main-heading,
    body.dark-mode .invoice-main-heading {
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .invoice-search-input,
    body[data-layout-mode="dark"] .invoice-search-input,
    body.dark-mode .invoice-search-input {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .toolbar-control-btn,
    body[data-layout-mode="dark"] .toolbar-control-btn,
    body.dark-mode .toolbar-control-btn {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .toolbar-control-btn:hover,
    body[data-layout-mode="dark"] .toolbar-control-btn:hover,
    body.dark-mode .toolbar-control-btn:hover {
        background: #334155 !important;
        color: #F3ECFB !important;
        border-color: #8C56D4 !important;
    }

    /* Desktop Table Dark Mode */
    body[light-mode="dark"] #printTable,
    body[data-layout-mode="dark"] #printTable,
    body.dark-mode #printTable,
    body[light-mode="dark"] .table,
    body[data-layout-mode="dark"] .table,
    body.dark-mode .table {
        --bs-table-bg: transparent !important;
        --bs-table-color: #f1f5f9 !important;
        --bs-table-border-color: #334155 !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] #printTable th,
    body[light-mode="dark"] #printTable td,
    body[data-layout-mode="dark"] #printTable th,
    body[data-layout-mode="dark"] #printTable td,
    body.dark-mode #printTable th,
    body.dark-mode #printTable td,
    body[light-mode="dark"] .table > :not(caption) > * > *,
    body[data-layout-mode="dark"] .table > :not(caption) > * > *,
    body.dark-mode .table > :not(caption) > * > * {
        border-color: #334155 !important;
        background-color: transparent;
        color: inherit;
    }
    body[light-mode="dark"] #printTable thead,
    body[light-mode="dark"] #printTable thead tr,
    body[light-mode="dark"] #printTable thead th,
    body[data-layout-mode="dark"] #printTable thead th,
    body.dark-mode #printTable thead th {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] #printTable tbody tr td,
    body[data-layout-mode="dark"] #printTable tbody tr td,
    body.dark-mode #printTable tbody tr td {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] #printTable tbody tr:hover td,
    body[data-layout-mode="dark"] #printTable tbody tr:hover td,
    body.dark-mode #printTable tbody tr:hover td {
        background-color: #273549 !important;
    }
    body[light-mode="dark"] #printTable tfoot,
    body[light-mode="dark"] #printTable tfoot tr,
    body[light-mode="dark"] #printTable tfoot tr td,
    body[data-layout-mode="dark"] #printTable tfoot tr td,
    body.dark-mode #printTable tfoot tr td,
    body[light-mode="dark"] .table-light,
    body[data-layout-mode="dark"] .table-light,
    body.dark-mode .table-light {
        --bs-table-bg: #0f172a !important;
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    /* Mobile & Tablet Card Dark Mode */
    body[light-mode="dark"] .invoice-mobile-card,
    body[data-layout-mode="dark"] .invoice-mobile-card,
    body[light-mode="dark"] .product-mobile-card,
    body[data-layout-mode="dark"] .product-mobile-card,
    body.dark-mode .invoice-mobile-card,
    body.dark-mode .product-mobile-card {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        border: 1px solid #334155 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .border,
    body[data-layout-mode="dark"] .invoice-mobile-card .border,
    body.dark-mode .invoice-mobile-card .border,
    body[light-mode="dark"] .invoice-mobile-card .border-bottom,
    body[data-layout-mode="dark"] .invoice-mobile-card .border-bottom,
    body.dark-mode .invoice-mobile-card .border-bottom,
    body[light-mode="dark"] .invoice-mobile-card .border-top,
    body[data-layout-mode="dark"] .invoice-mobile-card .border-top,
    body.dark-mode .invoice-mobile-card .border-top {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .product-card-thumb,
    body[data-layout-mode="dark"] .product-card-thumb,
    body.dark-mode .product-card-thumb {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .invoice-summary-grid,
    body[data-layout-mode="dark"] .invoice-summary-grid,
    body.dark-mode .invoice-summary-grid,
    body[light-mode="dark"] .invoice-summary-strip,
    body[data-layout-mode="dark"] .invoice-summary-strip,
    body.dark-mode .invoice-summary-strip {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        border: 1px solid #334155 !important;
    }
    body[light-mode="dark"] .invoice-price-box,
    body[data-layout-mode="dark"] .invoice-price-box,
    body.dark-mode .invoice-price-box,
    body[light-mode="dark"] #mobileCardList .bg-white,
    body[data-layout-mode="dark"] #mobileCardList .bg-white,
    body.dark-mode #mobileCardList .bg-white {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        border: 1px solid #334155 !important;
    }
    body[light-mode="dark"] .invoice-price-box .summary-price.text-dark,
    body[data-layout-mode="dark"] .invoice-price-box .summary-price.text-dark,
    body.dark-mode .invoice-price-box .summary-price.text-dark {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .invoice-price-box .summary-label,
    body[data-layout-mode="dark"] .invoice-price-box .summary-label,
    body.dark-mode .invoice-price-box .summary-label {
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .text-dark,
    body[data-layout-mode="dark"] .invoice-mobile-card .text-dark,
    body.dark-mode .invoice-mobile-card .text-dark {
        color: #F3ECFB !important;
    }

    /* Badges & Status in Dark Mode */
    .product-category-badge {
        font-size: 11px;
        background-color: #F3ECFB;
        color: #8C56D4;
        border: 1px solid #E5D5F7 !important;
    }
    body[light-mode="dark"] .product-category-badge,
    body[data-layout-mode="dark"] .product-category-badge,
    body.dark-mode .product-category-badge {
        background-color: rgba(140, 86, 212, 0.2) !important;
        color: #D2B7F1 !important;
        border-color: rgba(140, 86, 212, 0.4) !important;
    }

    .product-barcode-badge {
        background-color: #f8fafc;
        color: #15803d;
        border: 1px solid #86efac !important;
        font-family: monospace;
        font-size: 12px;
        font-weight: 600;
    }
    body[light-mode="dark"] .product-barcode-badge,
    body[data-layout-mode="dark"] .product-barcode-badge,
    body.dark-mode .product-barcode-badge {
        background-color: rgba(22, 163, 74, 0.15) !important;
        color: #4ade80 !important;
        border-color: rgba(74, 222, 128, 0.4) !important;
    }

    body[light-mode="dark"] .badge.bg-secondary-subtle,
    body[data-layout-mode="dark"] .badge.bg-secondary-subtle,
    body.dark-mode .badge.bg-secondary-subtle {
        background-color: #334155 !important;
        color: #cbd5e1 !important;
        border: 1px solid #475569 !important;
    }

    body[light-mode="dark"] .badge.available,
    body[data-layout-mode="dark"] .badge.available,
    body.dark-mode .badge.available {
        background-color: rgba(22, 163, 74, 0.2) !important;
        color: #4ade80 !important;
        border: 1px solid rgba(74, 222, 128, 0.4) !important;
    }
    body[light-mode="dark"] .badge.out-of-stock,
    body[data-layout-mode="dark"] .badge.out-of-stock,
    body.dark-mode .badge.out-of-stock {
        background-color: rgba(239, 68, 68, 0.2) !important;
        color: #f87171 !important;
        border: 1px solid rgba(248, 113, 113, 0.4) !important;
    }
    body[light-mode="dark"] .badge.warning-stock,
    body[data-layout-mode="dark"] .badge.warning-stock,
    body.dark-mode .badge.warning-stock {
        background-color: rgba(245, 158, 11, 0.2) !important;
        color: #fbbf24 !important;
        border: 1px solid rgba(251, 191, 36, 0.4) !important;
    }

    body[light-mode="dark"] .badge.bg-light,
    body[light-mode="dark"] .badge.bg-white,
    body[data-layout-mode="dark"] .badge.bg-light,
    body[data-layout-mode="dark"] .badge.bg-white,
    body.dark-mode .badge.bg-light,
    body.dark-mode .badge.bg-white {
        background-color: #0f172a !important;
        color: #f8fafc !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] #display-info .badge.bg-light,
    body[data-layout-mode="dark"] #display-info .badge.bg-light,
    body.dark-mode #display-info .badge.bg-light {
        background-color: #0f172a !important;
        color: #f8fafc !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #display-info .badge.bg-success-subtle,
    body[data-layout-mode="dark"] #display-info .badge.bg-success-subtle,
    body.dark-mode #display-info .badge.bg-success-subtle {
        background-color: rgba(22, 163, 74, 0.2) !important;
        color: #4ade80 !important;
        border-color: rgba(74, 222, 128, 0.4) !important;
    }

    body[light-mode="dark"] .custom-pagination-btn,
    body[data-layout-mode="dark"] .custom-pagination-btn {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .custom-pagination-btn.active,
    body[data-layout-mode="dark"] .custom-pagination-btn.active {
        background: linear-gradient(135deg, #8C56D4, #793FC5) !important;
        color: #ffffff !important;
        border-color: #8C56D4 !important;
    }
    body[light-mode="dark"] .custom-pagination-btn.disabled,
    body[data-layout-mode="dark"] .custom-pagination-btn.disabled {
        background-color: #0f172a !important;
        border-color: #1e293b !important;
        color: #475569 !important;
    }

    /* Dark Mode Out of Stock & Dropdown Styles */
    body[light-mode="dark"] .card-out-of-stock,
    body[data-layout-mode="dark"] .card-out-of-stock,
    body.dark-mode .card-out-of-stock {
        background-color: rgba(239, 68, 68, 0.12) !important;
        border-color: #ef4444 !important;
    }
    body[light-mode="dark"] .custom-dropdown-menu,
    body[data-layout-mode="dark"] .custom-dropdown-menu,
    body.dark-mode .custom-dropdown-menu {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.5) !important;
    }
    body[light-mode="dark"] .custom-dropdown-item,
    body[data-layout-mode="dark"] .custom-dropdown-item,
    body.dark-mode .custom-dropdown-item {
        color: #e2e8f0 !important;
    }
    body[light-mode="dark"] .custom-dropdown-item:hover,
    body[data-layout-mode="dark"] .custom-dropdown-item:hover,
    body.dark-mode .custom-dropdown-item:hover {
        background-color: #334155 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .custom-dropdown-item.active,
    body[data-layout-mode="dark"] .custom-dropdown-item.active,
    body.dark-mode .custom-dropdown-item.active {
        background: #8C56D4 !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .mobile-card-actions,
    body[data-layout-mode="dark"] .mobile-card-actions,
    body.dark-mode .mobile-card-actions {
        border-top-color: #334155 !important;
    }
    body[light-mode="dark"] .mobile-action-btn,
    body[data-layout-mode="dark"] .mobile-action-btn,
    body.dark-mode .mobile-action-btn {
        border-color: #334155 !important;
        background: #0f172a !important;
    }
    body[light-mode="dark"] .mobile-action-btn.action-btn-edit,
    body[data-layout-mode="dark"] .mobile-action-btn.action-btn-edit,
    body.dark-mode .mobile-action-btn.action-btn-edit {
        color: #38BDF8 !important;
        background: rgba(2, 132, 199, 0.15) !important;
        border-color: rgba(56, 189, 248, 0.3) !important;
    }
    body[light-mode="dark"] .mobile-action-btn.action-btn-purchase,
    body[data-layout-mode="dark"] .mobile-action-btn.action-btn-purchase,
    body.dark-mode .mobile-action-btn.action-btn-purchase {
        color: #D2B7F1 !important;
        background: rgba(140, 86, 212, 0.15) !important;
        border-color: rgba(140, 86, 212, 0.3) !important;
    }
</style>

<script>
    let rawLowStockData = [];
    let currentPage = 1;
    let pageSize = 15;

    $(document).ready(function () {
        getLowStockList();
        $("#searchInput").val("");
    });

    // --- Custom Dropdown Toggles ---
    function toggleCustomDropdown(menuId) {
        const menu = $("#" + menuId);
        const container = menu.closest(".custom-dropdown-wrap");
        const isShown = menu.hasClass("show");
        $(".custom-dropdown-menu").removeClass("show");
        $(".custom-dropdown-wrap").removeClass("open");
        if (!isShown) {
            menu.addClass("show");
            container.addClass("open");
        }
    }

    function selectEntriesOption(val, banglaVal) {
        $("#entries").val(val);
        $("#currentEntriesText").text(banglaVal);
        $("#entriesDropdownMenu .custom-dropdown-item").removeClass("active");
        $(`#entriesDropdownMenu [data-value="${val}"]`).addClass("active");
        $("#entriesDropdownMenu").removeClass("show");
        $("#entriesDropdownContainer").removeClass("open");
        pageSize = parseInt(val);
        currentPage = 1;
        renderPaginatedList();
    }

    function selectFilterOption(val, label) {
        $("#stockStatusFilter").val(val);
        $("#filterDropdownMenu .custom-dropdown-item").removeClass("active");
        $(`#filterDropdownMenu [data-value="${val}"]`).addClass("active");
        $("#filterDropdownMenu").removeClass("show");
        $("#filterDropdownContainer").removeClass("open");

        // Update toggle button text with count in brackets
        let count = 0;
        if (val === 'all') {
            count = rawLowStockData.length;
        } else if (val === 'zero') {
            count = rawLowStockData.filter(i => (parseFloat(i.quantity) || 0) <= 0).length;
        } else if (val === 'low') {
            count = rawLowStockData.filter(i => {
                let q = parseFloat(i.quantity) || 0;
                return q > 0 && q <= 10;
            }).length;
        }
        $("#currentFilterText").html(`${label} (<span id="toggleFilterCount">${engToBanglaNum(count)}</span>)`);

        currentPage = 1;
        renderPaginatedList();
    }

    $(document).on("click", function (e) {
        if (!$(e.target).closest(".custom-dropdown-wrap").length) {
            $(".custom-dropdown-menu").removeClass("show");
            $(".custom-dropdown-wrap").removeClass("open");
        }
    });

    // --- Search Field Handlers ---
    function clearSearchField() {
        $("#searchInput").val("").focus();
        $("#clearSearchBtn").addClass("d-none");
        currentPage = 1;
        renderPaginatedList();
    }

    $("#searchInput").on("keyup search input change", function () {
        if ($(this).val().trim() !== "") {
            $("#clearSearchBtn").removeClass("d-none");
        } else {
            $("#clearSearchBtn").addClass("d-none");
        }
        currentPage = 1;
        renderPaginatedList();
    });

    async function getLowStockList() {
        const tableList = $("#tableList");
        const mobileCardList = $("#mobileCardList");
        
        tableList.html(`
            <tr>
                <td colspan="11" class="text-center py-5">
                    <div class="spinner-border text-danger me-2" role="status"></div>
                    <span class="fw-bold text-muted">কম স্টক ডাটা লোড হচ্ছে...</span>
                </td>
            </tr>
        `);
        mobileCardList.html(`
            <div class="col-12 text-center py-4">
                <div class="spinner-border text-danger me-2" role="status"></div>
                <span class="fw-bold text-muted">ডাটা লোড হচ্ছে...</span>
            </div>
        `);

        try {
            const res = await axios.get('/admin-dashboard-low-stock-products-list');
            if (res.data && res.data.status === 'success') {
                rawLowStockData = res.data.data || [];
                updateCountsAndStats(rawLowStockData);
                pageSize = parseInt($("#entries").val()) || 15;
                currentPage = 1;
                renderPaginatedList();
            } else {
                tableList.html('<tr><td colspan="11" class="text-center py-4 text-danger fw-bold">⚠️ ডাটা পাওয়া যায়নি!</td></tr>');
                mobileCardList.html('<div class="col-12 text-center py-4 text-danger fw-bold bg-white rounded-3 border p-3">⚠️ ডাটা পাওয়া যায়নি!</div>');
            }
        } catch (e) {
            console.error('Fetch low stock error:', e);
            tableList.html('<tr><td colspan="11" class="text-center py-4 text-danger fw-bold">⚠️ সমস্যা দেখা দিয়েছে!</td></tr>');
            mobileCardList.html('<div class="col-12 text-center py-4 text-danger fw-bold bg-white rounded-3 border p-3">⚠️ সমস্যা দেখা দিয়েছে!</div>');
        }
    }

    function updateCountsAndStats(data) {
        let totalCount = data.length;
        let zeroCount = 0;
        let warningCount = 0;

        data.forEach(item => {
            const qty = parseFloat(item.quantity || 0);
            if (qty <= 0) {
                zeroCount++;
            } else {
                warningCount++;
            }
        });

        // Update Top Smart Metric Cards
        $("#summaryTotalLowStock").text(engToBanglaNum(totalCount));
        $("#summaryOutOfStock").text(engToBanglaNum(zeroCount));
        $("#summaryWarningStock").text(engToBanglaNum(warningCount));

        // Update Filter Dropdown Item counts (numbers in brackets only)
        $("#filterAllCount").text(engToBanglaNum(totalCount));
        $("#filterZeroCount").text(engToBanglaNum(zeroCount));
        $("#filterReorderCount").text(engToBanglaNum(warningCount));

        // Update active filter toggle count
        const currentFilter = $("#stockStatusFilter").val() || 'all';
        if (currentFilter === 'zero') {
            $("#toggleFilterCount").text(engToBanglaNum(zeroCount));
        } else if (currentFilter === 'low') {
            $("#toggleFilterCount").text(engToBanglaNum(warningCount));
        } else {
            $("#toggleFilterCount").text(engToBanglaNum(totalCount));
        }
    }

    function normalizeSearchStr(str) {
        if (str === null || str === undefined) return "";
        return String(str)
            .toLowerCase()
            .replace(/[\u200B-\u200D\uFEFF]/g, "")
            .replace(/\s+/g, " ")
            .trim();
    }

    function renderPaginatedList() {
        if (!rawLowStockData) return;

        let rawSearch = $("#searchInput").val() || "";
        let statusVal = $("#stockStatusFilter").val() || "all";

        let searchEng = typeof banglaToEngNum === 'function' ? banglaToEngNum(rawSearch) : rawSearch;
        let searchBn  = typeof engToBanglaNum === 'function' ? engToBanglaNum(rawSearch) : rawSearch;

        let searchWordsRaw = normalizeSearchStr(rawSearch).split(" ").filter(Boolean);
        let searchWordsEng = normalizeSearchStr(searchEng).split(" ").filter(Boolean);
        let searchWordsBn  = normalizeSearchStr(searchBn).split(" ").filter(Boolean);

        // 1. Filter Data
        let filtered = rawLowStockData.filter(function (item) {
            const qty = parseFloat(item.quantity || 0);

            let matchesStatus = true;
            if (statusVal === 'zero') {
                matchesStatus = (qty <= 0);
            } else if (statusVal === 'low') {
                matchesStatus = (qty > 0 && qty <= 10);
            }

            if (!matchesStatus) return false;
            if (searchWordsRaw.length === 0) return true;

            let productName = normalizeSearchStr(item.product_name || "");
            let categoryName = normalizeSearchStr(item.category_name || "");
            let brandName = normalizeSearchStr(item.brand_name || "");
            let unitName = normalizeSearchStr(item.unit_name || "");

            let rawCode = "";
            try {
                let parsed = typeof item.product_code === 'string' ? JSON.parse(item.product_code) : item.product_code;
                rawCode = Array.isArray(parsed) ? parsed.join(" ") : String(parsed || "");
            } catch(e) {
                rawCode = String(item.product_code || "");
            }
            let codeEng = normalizeSearchStr(typeof banglaToEngNum === 'function' ? banglaToEngNum(rawCode) : rawCode);
            let codeBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(rawCode) : rawCode);

            let qtyEng = String(item.quantity !== undefined && item.quantity !== null ? item.quantity : "");
            let qtyBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(qtyEng) : qtyEng);

            let costEng = String(item.price !== undefined && item.price !== null ? item.price : "");
            let costBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(costEng) : costEng);

            let sellEng = String(item.selling_price !== undefined && item.selling_price !== null ? item.selling_price : "");
            let sellBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(sellEng) : sellEng);

            let corpus = `${productName} ${categoryName} ${brandName} ${unitName} ${codeEng} ${codeBn} ${qtyEng} ${qtyBn} ${costEng} ${costBn} ${sellEng} ${sellBn}`;

            return searchWordsRaw.every(function (word, idx) {
                let wRaw = word;
                let wEng = searchWordsEng[idx] || wRaw;
                let wBn  = searchWordsBn[idx]  || wRaw;

                return corpus.includes(wRaw) || corpus.includes(wEng) || corpus.includes(wBn);
            });
        });

        // Calculate Totals for Filtered Items
        let totalQuantity = 0;
        let totalCostPrice = 0;
        let totalSellingPrice = 0;
        let totalCostQuantityPrice = 0;

        filtered.forEach(function (item) {
            let q = parseFloat(item.quantity) || 0;
            let c = parseFloat(item.price) || 0;
            let s = parseFloat(item.selling_price) || 0;

            totalQuantity += q;
            totalCostPrice += c;
            totalSellingPrice += s;
            totalCostQuantityPrice += (c * q);
        });

        $("#totalQuantity").text(engToBanglaNum(totalQuantity.toFixed(0)));
        $("#totalCostPrice").text(engToBanglaNum(totalCostPrice.toFixed(2)));
        $("#totalCostQuantityPrice").text(engToBanglaNum(totalCostQuantityPrice.toFixed(2)));
        $("#totalSellingPrice").text(engToBanglaNum(totalSellingPrice.toFixed(2)));

        // 2. Pagination Calculations
        let totalItems = filtered.length;
        let totalPages = Math.ceil(totalItems / pageSize) || 1;
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        let startIndex = (currentPage - 1) * pageSize;
        let endIndex = Math.min(startIndex + pageSize, totalItems);
        let pageItems = filtered.slice(startIndex, endIndex);

        let tableList = $("#tableList");
        let mobileCardList = $("#mobileCardList");

        tableList.empty();
        mobileCardList.empty();

        const defaultImg = "{{ asset('back-end/assets/img/product-img.png') }}";

        if (pageItems.length === 0) {
            tableList.html('<tr><td colspan="11" class="text-center text-danger p-4 fw-bold">❌ কোনো কম স্টক পণ্য পাওয়া যায়নি।</td></tr>');
            mobileCardList.html('<div class="col-12 p-4 text-center text-danger fw-bold bg-white rounded-3 border shadow-sm">❌ কোনো কম স্টক পণ্য পাওয়া যায়নি।</div>');
        } else {
            pageItems.forEach(function (item, idx) {
                let realIndex = startIndex + idx;
                let qty = parseFloat(item.quantity || 0);
                let isZeroOrNeg = qty <= 0;
                let stockStatusClass = isZeroOrNeg ? "out-of-stock" : "warning-stock";
                let stockStatusText = isZeroOrNeg ? "স্টক খালি!" : "স্টক কম";
                let categoryName = item.category_name || '-';
                let brandName = item.brand_name || 'General';
                let unitName = item.unit_name || 'টি';
                let imgPath = item.img_url ? item.img_url : defaultImg;
                let formattedCode = formatProductCode(item.product_code);

                // Desktop Row
                let row = `
                    <tr>
                        <td class="text-center fw-bold">${realIndex + 1}</td>
                        <td class="text-center">
                            <div id="action_btn_wrap" class="d-flex align-items-center justify-content-center gap-1">
                                <a data-id="${item['id']}" href="#" class="link edit-link btn btn-sm btn-outline-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#exampleModal" title="এডিট করুন" style="border-radius: 6px;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ url('admin-dashboard-Purchase') }}" class="btn btn-sm text-white px-2 py-1 shadow-sm" title="স্টক পারচেজ" style="border-radius: 6px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            <img style="width: 45px; height: 45px; object-fit: cover; border-radius: 6px; border: 1px solid #eee;" onerror="this.src='${defaultImg}'" alt="${item.product_name}" src="${imgPath}">
                        </td>
                        <td class="text-start">${formattedCode}</td>
                        <td class="text-start fw-bold">${item.product_name} ${unitName ? `<span class="text-muted small">(${unitName})</span>` : ''}</td>
                        <td class="text-start">
                            <div class="fw-semibold text-dark small">${categoryName}</div>
                            <span class="text-muted small" style="font-size: 11px;">ব্র্যান্ড: ${brandName}</span>
                        </td>
                        <td class="text-center fw-bold">${engToBanglaNum(qty)} ${unitName}</td>
                        <td class="text-end">৳ ${engToBanglaNum(parseFloat(item.price || 0).toFixed(2))}</td>
                        <td class="text-end fw-bold">৳ ${engToBanglaNum((parseFloat(item.price || 0) * qty).toFixed(2))}</td>
                        <td class="text-end text-success fw-bold">৳ ${engToBanglaNum(parseFloat(item.selling_price || 0).toFixed(2))}</td>
                        <td class="text-center">
                            <span class="badge ${stockStatusClass} px-2.5 py-1">
                                ${stockStatusText}
                            </span>
                        </td>
                    </tr>`;
                tableList.append(row);

                // Mobile & Tablet Responsive Box Card (2 per row on Tablet, 1 per row on Mobile)
                let mobileCard = `
                    <div class="col-12 col-md-6 mb-0">
                        <div class="invoice-mobile-card card border shadow-sm rounded-4 position-relative mb-0" style="height: auto !important;">
                            <!-- Top Bar: Serial + Category on left, Stock Status Badge on right with distinct bottom padding & margin -->
                            <div class="product-card-topbar d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <span class="badge bg-secondary-subtle text-secondary fw-bold px-2.5 py-1" style="font-size: 11.5px;">#${engToBanglaNum(realIndex + 1)}</span>
                                    <span class="badge product-category-badge fw-semibold px-2.5 py-1">
                                        <i class="fa-solid fa-folder me-1"></i>${categoryName}
                                    </span>
                                </div>
                                <div>
                                    <span class="badge ${stockStatusClass} px-2.5 py-1 fw-bold" style="font-size: 11.5px; border-radius: 12px;">
                                        ${stockStatusText}
                                    </span>
                                </div>
                            </div>

                            <!-- Product Info: Image + Name + Code -->
                            <div class="d-flex align-items-center mb-2.5">
                                <img src="${imgPath}" onerror="this.src='${defaultImg}'" alt="${item.product_name}" class="product-card-thumb me-3" style="width: 52px; height: 52px; object-fit: cover; border-radius: 10px; border: 1.5px solid #E5D5F7; flex-shrink: 0;" />
                                <div class="overflow-hidden flex-grow-1">
                                    <h6 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 15px;">${item.product_name} ${unitName ? `<span class="text-muted small fw-normal">(${unitName})</span>` : ''}</h6>
                                    <div class="d-flex align-items-center gap-1.5 flex-wrap">
                                        <span class="text-muted small" style="font-size: 11.5px;">কোড:</span>
                                        ${formattedCode}
                                    </div>
                                </div>
                            </div>

                            <!-- 2x2 Financial & Stock Summary Grid in soft purple strip with comfortable 10px box padding -->
                            <div class="invoice-summary-strip rounded-3 border">
                                <div class="row g-2.5 text-center">
                                    <div class="col-6">
                                        <div class="invoice-price-box rounded-2 border">
                                            <span class="summary-label text-muted">বর্তমান স্টক</span>
                                            <span class="summary-price ${isZeroOrNeg ? 'text-danger' : 'text-warning'}">${engToBanglaNum(qty)} ${unitName}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box rounded-2 border">
                                            <span class="summary-label text-danger">ক্রয়মূল্য</span>
                                            <span class="summary-price text-danger">৳ ${engToBanglaNum(parseFloat(item.price || 0).toFixed(2))}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box rounded-2 border">
                                            <span class="summary-label text-success">বিক্রয়মূল্য</span>
                                            <span class="summary-price text-success">৳ ${engToBanglaNum(parseFloat(item.selling_price || 0).toFixed(2))}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box rounded-2 border">
                                            <span class="summary-label" style="color: #8C56D4 !important;">ব্র্যান্ড</span>
                                            <span class="summary-price" style="color: #8C56D4 !important; font-size: 13px !important;">${brandName}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modern Action Buttons Strip below Financial Grid -->
                            <div class="mobile-card-actions pt-2.5 mt-2.5 border-top">
                                <button type="button" class="mobile-action-btn action-btn-edit edit-link" data-id="${item['id']}" data-bs-toggle="modal" data-bs-target="#exampleModal" title="এডিট করুন">
                                    <i class="fa-solid fa-pen-to-square"></i><span>এডিট</span>
                                </button>
                                <a href="{{ url('admin-dashboard-Purchase') }}" class="mobile-action-btn action-btn-purchase" title="পারচেজ করুন">
                                    <i class="fa-solid fa-cart-plus"></i><span>পারচেজ</span>
                                </a>
                            </div>
                        </div>
                    </div>`;
                mobileCardList.append(mobileCard);
            });
        }

        // 3. Update Display Info & Pagination UI
        let fromCount = totalItems > 0 ? startIndex + 1 : 0;
        let toCount = endIndex;
        $("#display-info").html(`Showing <span class="badge bg-light text-dark border px-2 py-1 mx-1 fw-bold fs-6">${fromCount} - ${toCount}</span> of <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 mx-1 fw-bold fs-6">${totalItems}</span> entries`);

        renderPaginationControls(totalPages);
    }

    // Delegated click listener for Edit Product button
    $(document).on('click', '.edit-link', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id') || $(this).data('id');
        if (!id) return;
        
        if (typeof openProductUpdateModal === 'function') {
            openProductUpdateModal(id);
        } else {
            const modalEl = document.getElementById('exampleModal') || document.getElementById('updateProductModal');
            if (modalEl) {
                $(modalEl).modal('show');
                if (typeof FillUpProductUpdateForm === 'function') {
                    FillUpProductUpdateForm(id);
                }
            }
        }
    });

    function renderPaginationControls(totalPages) {
        let pagContainer = $("#pagination");
        pagContainer.empty();

        if (totalPages <= 1) return;

        // Prev Button
        let prevDisabled = currentPage === 1 ? 'disabled' : '';
        let prevBtn = `<button type="button" class="custom-pagination-btn ${prevDisabled}" ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})">
            <i class="fa-solid fa-chevron-left me-1"></i> Prev
        </button>`;
        pagContainer.append(prevBtn);

        // Smart Page Numbers
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, currentPage + 2);

        if (startPage > 1) {
            pagContainer.append(`<button type="button" class="custom-pagination-btn" onclick="goToPage(1)">1</button>`);
            if (startPage > 2) {
                pagContainer.append(`<span class="px-1 text-muted fw-bold">...</span>`);
            }
        }

        for (let p = startPage; p <= endPage; p++) {
            let activeClass = (p === currentPage) ? 'active' : '';
            let pageBtn = `<button type="button" class="custom-pagination-btn ${activeClass}" onclick="goToPage(${p})">${p}</button>`;
            pagContainer.append(pageBtn);
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                pagContainer.append(`<span class="px-1 text-muted fw-bold">...</span>`);
            }
            pagContainer.append(`<button type="button" class="custom-pagination-btn" onclick="goToPage(${totalPages})">${totalPages}</button>`);
        }

        // Next Button
        let nextDisabled = currentPage === totalPages ? 'disabled' : '';
        let nextBtn = `<button type="button" class="custom-pagination-btn ${nextDisabled}" ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})">
            Next <i class="fa-solid fa-chevron-right ms-1"></i>
        </button>`;
        pagContainer.append(nextBtn);
    }

    function goToPage(page) {
        currentPage = page;
        renderPaginatedList();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function formatProductCode(productCode) {
        try {
            let parsed = typeof productCode === 'string' ? JSON.parse(productCode) : productCode;
            if (Array.isArray(parsed) && parsed.length > 0) {
                return parsed.map(code => `<span class="badge product-barcode-badge me-1">${code}</span>`).join('');
            } else if (parsed) {
                return `<span class="badge product-barcode-badge me-1">${parsed}</span>`;
            }
            return '<span class="text-muted small">N/A</span>';
        } catch (e) {
            return `<span class="badge product-barcode-badge me-1">${productCode || 'N/A'}</span>`;
        }
    }

    // --- PDF & Print Functionality ---
    function exportLowStockPDF() {
        printLowStockTable();
    }

    function printLowStockTable() {
        let tableClone = document.getElementById('printTable').cloneNode(true);
        // Remove Action column from printable version
        tableClone.querySelectorAll('th:nth-child(2), td:nth-child(2)').forEach(el => el.remove());
        
        let printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <html>
                <head>
                    <title>কম স্টক প্রোডাক্ট তালিকা - মেসার্স আনিস ষ্টোর</title>
                    <style>
                        body { font-family: 'Poppins', 'Segoe UI', Arial, sans-serif; padding: 25px; color: #1e293b; }
                        .header { text-align: center; margin-bottom: 25px; border-bottom: 2px solid #8C56D4; padding-bottom: 15px; }
                        .header h2 { margin: 0 0 5px 0; color: #8C56D4; font-size: 24px; }
                        .header p { margin: 0; color: #64748b; font-size: 13px; }
                        table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 12px; }
                        th, td { border: 1px solid #cbd5e1; padding: 8px 10px; text-align: left; }
                        th { background-color: #F3ECFB; color: #8C56D4; font-weight: 700; }
                        .text-center { text-align: center; }
                        .text-end { text-align: right; }
                        .badge { padding: 3px 6px; border-radius: 4px; font-size: 11px; font-weight: 600; display: inline-block; }
                        .out-of-stock { background: #fee2e2; color: #dc2626; }
                        .warning-stock { background: #fef3c7; color: #d97706; }
                        img { max-width: 35px; height: 35px; object-fit: cover; border-radius: 4px; }
                        .footer { margin-top: 30px; text-align: right; font-size: 11px; color: #94a3b8; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h2>মেসার্স আনিস ষ্টোর</h2>
                        <p>কম স্টক প্রোডাক্ট রিপোর্ট (Low Stock Products Alert Report)</p>
                        <p style="margin-top: 4px; font-size: 11px;">তারিখ: ${new Date().toLocaleDateString('bn-BD')}</p>
                    </div>
                    ${tableClone.outerHTML}
                    <div class="footer">
                        Generated by Anis Store Management System
                    </div>
                </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.focus();
        setTimeout(() => {
            printWindow.print();
            printWindow.close();
        }, 350);
    }

    // Global Modal Dismiss Scroll Unlock Safety Check
    $(document).on('hidden.bs.modal', '.modal', function () {
        setTimeout(() => {
            if (!$('.modal.show').length && !document.querySelector('.modal.show')) {
                $('body').removeClass('modal-open').css({ 'overflow': '', 'padding-right': '' });
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
                document.documentElement.style.overflow = '';
                document.documentElement.style.overflowY = '';
                $('.modal-backdrop').remove();
            }
        }, 120);
    });
</script>
