    <!-- Hero Main Content Start -->
    <div class="main-content">
        <div class="page-content">
            <!-- Table Start -->
            <div class="data-table">
                <!-- 1. Title: Icon + Title with clean gap matching invoice-list -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                    <div class="card-body p-3 p-sm-4">
                        <div class="invoice-card-header mb-3 pb-2 border-bottom d-flex align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <div class="invoice-title-icon-box rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-boxes-stacked fs-5"></i>
                                </div>
                                <h4 class="invoice-main-heading m-0 p-0 fw-bold">প্রোডাক্ট তালিকা</h4>
                            </div>
                        </div>

                        <!-- Smart Product Metric Summary Cards Bar (2 per row on Mobile & Tablet, 5 per row on Desktop) -->
                        <div class="row g-2 mb-3">
                            <div class="col-6 col-md-6 col-lg">
                                <div class="card border-0 shadow-sm rounded-3 py-2 px-3 bg-white border-start border-4 border-primary h-100" style="border-left-color: #8C56D4 !important;">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted d-block small fw-bold" style="font-size: 10px; text-transform: uppercase;">মোট প্রোডাক্ট</span>
                                            <h4 id="summaryTotalProducts" class="fw-extrabold mb-0" style="font-size: 17px; color: #8C56D4;">0</h4>
                                        </div>
                                        <div class="rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background: #F3ECFB; color: #8C56D4;">
                                            <i class="fa-solid fa-boxes-stacked fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg">
                                <div class="card border-0 shadow-sm rounded-3 py-2 px-3 bg-white border-start border-4 border-info h-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted d-block small fw-bold" style="font-size: 10px; text-transform: uppercase;">মোট স্টক পরিমাণ</span>
                                            <h4 id="summaryTotalQuantity" class="fw-extrabold text-info mb-0" style="font-size: 17px;">0 Pcs</h4>
                                        </div>
                                        <div class="bg-info-subtle text-info rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                            <i class="fa-solid fa-cubes fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg">
                                <div class="card border-0 shadow-sm rounded-3 py-2 px-3 card-out-of-stock border-start border-4 border-danger h-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-danger d-block small fw-extrabold" style="font-size: 10px; text-transform: uppercase;">স্টক আউট (<span id="summaryOutOfStockBracket">০</span>)</span>
                                            <h4 id="summaryOutOfStock" class="fw-extrabold text-danger mb-0" style="font-size: 17px;">0</h4>
                                        </div>
                                        <div class="rounded-circle p-2 d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px; background: linear-gradient(135deg, #ef4444 0%, #f43f5e 100%); color: #ffffff;">
                                            <i class="fa-solid fa-triangle-exclamation fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg">
                                <div class="card border-0 shadow-sm rounded-3 py-2 px-3 bg-white border-start border-4 border-warning h-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted d-block small fw-bold" style="font-size: 10px; text-transform: uppercase;">স্টক ক্রয়মূল্য</span>
                                            <h4 id="summaryTotalCostValue" class="fw-extrabold text-warning mb-0" style="font-size: 16px;">৳ 0.00</h4>
                                        </div>
                                        <div class="bg-warning-subtle text-warning rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                            <i class="fa-solid fa-wallet fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card border-0 shadow-sm rounded-3 py-2 px-3 bg-white border-start border-4 border-success h-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted d-block small fw-bold" style="font-size: 10px; text-transform: uppercase;">স্টক বিক্রয়মূল্য</span>
                                            <h4 id="summaryTotalSellingValue" class="fw-extrabold text-success mb-0" style="font-size: 16px;">৳ 0.00</h4>
                                        </div>
                                        <div class="bg-success-subtle text-success rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                            <i class="fa-solid fa-chart-line fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Prominent Search Input Bar -->
                        <div class="invoice-search-box-wrap mb-3 position-relative">
                            <input type="text" id="searchInput" class="form-control invoice-search-input"
                                placeholder="যেকোনো পণ্য, কোড, দাম বা ব্র্যান্ড টাইপ করে খুঁজুন..." onfocus="this.select()" autocomplete="off" />
                            <i class="fa-solid fa-magnifying-glass invoice-search-addon-icon"></i>
                            <button type="button" id="clearSearchBtn" class="btn p-0 border-0 position-absolute end-0 top-50 translate-middle-y me-3 text-muted d-none" style="z-index: 5;" onclick="clearSearchField()" title="Clear Search">
                                <i class="fa-solid fa-circle-xmark fs-5 text-secondary"></i>
                            </button>
                        </div>

                        <!-- 3. Toolbar Section: Row 1 (Entry & Add Product), Row 2 (PDF, Print) -->
                        <div class="invoice-toolbar-section mb-3 d-flex flex-column gap-3">
                            <!-- Row 1: Entry & Add Product (1 Row, 2 Columns with gap below) -->
                            <div class="toolbar-row-1 d-flex align-items-center justify-content-between gap-2 w-100 mb-2">
                                <!-- Left: "এন্ট্রি:" text + Custom Entry dropdown -->
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

                                <!-- Right: + Add Product Button -->
                                <button id="openModalBtns" type="button" class="btn text-white fw-bold d-inline-flex align-items-center justify-content-center px-3 gap-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#createProduct" onclick="openPosAddProductModal()" style="height: 42px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); font-size: 13.5px; border: none; cursor: pointer;">
                                    <i class="fa-solid fa-plus fs-6 me-1"></i> নতুন প্রোডাক্ট
                                </button>
                            </div>

                            <!-- Row 2: Action Buttons (PDF, Print in 2 columns) -->
                            <div class="toolbar-row-2 w-100" style="display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 10px !important;">
                                <button type="button" id="pdfBtn" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-center px-3 gap-2" title="PDF ডাউনলোড করুন">
                                    <i class="fa-solid fa-file-pdf text-danger" style="font-size: 15px;"></i>
                                    <span class="fw-bold fs-7 fs-sm-6">PDF</span>
                                </button>
                                <button type="button" id="printBtn" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-center px-3 gap-2" title="প্রিন্ট করুন">
                                    <i class="fa-solid fa-print" style="color: #8C56D4; font-size: 15px;"></i>
                                    <span class="fw-bold fs-7 fs-sm-6">প্রিন্ট</span>
                                </button>
                                <button type="button" id="copyBtn" class="d-none"></button>
                                <button type="button" id="csvBtn" class="d-none"></button>
                                <button type="button" id="xlsxBtn" class="d-none"></button>
                            </div>
                        </div>

                        <!-- Table -->
                        {{-- <div class="table-wrapper">
                            <table id="printTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Serial No:</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableList">
                                </tbody>
                            </table>
                        </div> --}}

                        <div class="table-responsive d-none d-lg-block">
                            <table id="printTable" class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">Serial No</th>
                                        <th class="text-center" style="width: 90px;">Action</th>
                                        <th class="text-center" style="width: 70px;">Image</th>
                                        <th class="text-start" style="width: 140px;">Barcode</th>
                                        <th class="text-start">Name</th>
                                        <th class="text-start">Category</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-end">Cost Price</th>
                                        <th class="text-end">Total Cost Price</th>
                                        <th class="text-end">Selling Price</th>
                                        <th class="text-center" style="width: 95px;">Stock</th>
                                    </tr>
                                </thead>
                                <tbody id="tableList"></tbody>
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

                        <!-- Mobile & Tablet Responsive Card List View (< 992px) -->
                        <div id="mobileCardList" class="row g-3 d-flex flex-wrap d-lg-none mb-3"></div>

                        <!-- Smart Pagination and Display Info Footer -->
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
        <!-- Table End -->
    </div>
    </div>
    <!-- Hero Main Content End -->

    <style>
        /* 1. Header & Title Box matching invoice-list */
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
        .mobile-action-btn.action-btn-delete {
            background: #FEE2E2;
            color: #DC2626;
            border-color: #FECACA;
        }
        .mobile-action-btn.action-btn-delete:hover {
            background: #DC2626;
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

        /* Desktop Table Dark Mode (Fixes white borders & white backgrounds) */
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

        /* Status & Badges in Dark Mode (No White Backgrounds) */
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

        /* Dark Mode Card Out of Stock & Dropdown Styles */
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
        body[light-mode="dark"] .mobile-action-btn.action-btn-delete,
        body[data-layout-mode="dark"] .mobile-action-btn.action-btn-delete,
        body.dark-mode .mobile-action-btn.action-btn-delete {
            color: #F87171 !important;
            background: rgba(220, 38, 38, 0.15) !important;
            border-color: rgba(248, 113, 113, 0.3) !important;
        }
    </style>


    <script>
    let currentPage = 1;
    let pageSize = 15;

    $(document).ready(function () {
        getList();
        loadFilterCategories();
        $("#searchInput").val("");
    });

    // --- Custom Entry Dropdown Logic ---
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

    $(document).on("click", function (e) {
        if (!$(e.target).closest(".custom-dropdown-wrap").length) {
            $(".custom-dropdown-menu").removeClass("show");
            $(".custom-dropdown-wrap").removeClass("open");
        }
    });

    // --- Event Listeners ---
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

    $("#filterCategory").on("change", function () {
        currentPage = 1;
        renderPaginatedList();
    });

    $("#entries").on("change", function () {
        pageSize = parseInt($(this).val()) || 50;
        currentPage = 1;
        renderPaginatedList();
    });

    async function getList() {
        try {
            showLoader();
            let res = await axios.get("/api/product-list", HeaderToken());
            hideLoader();

            if (res.data.status !== 'success') {
                console.error('Error fetching product data:', res.data.message);
                return;
            }

            window.allProductsList = res.data.ProductData || [];
            pageSize = parseInt($("#entries").val()) || 50;
            currentPage = 1;
            renderPaginatedList();

        } catch (e) {
            hideLoader();
            console.error('Error fetching product data:', e.message || e);
            unauthorized(e.response ? e.response.status : 500);
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
        if (!window.allProductsList) return;

        let rawSearch = $("#searchInput").val() || "";
        let selectedCatId = $("#filterCategory").length ? $("#filterCategory").val() : "";
        let selectedCatText = $("#filterCategory").length ? normalizeSearchStr($("#filterCategory option:selected").text()) : "";

        let searchEng = typeof banglaToEngNum === 'function' ? banglaToEngNum(rawSearch) : rawSearch;
        let searchBn  = typeof engToBanglaNum === 'function' ? engToBanglaNum(rawSearch) : rawSearch;

        let searchWordsRaw = normalizeSearchStr(rawSearch).split(" ").filter(Boolean);
        let searchWordsEng = normalizeSearchStr(searchEng).split(" ").filter(Boolean);
        let searchWordsBn  = normalizeSearchStr(searchBn).split(" ").filter(Boolean);

        // 1. Filter products
        let filtered = window.allProductsList.filter(function (item) {
            let matchCat = !selectedCatId || selectedCatText === "all categories" || (item.category && String(item.category.id) === String(selectedCatId));
            if (!matchCat) return false;

            if (searchWordsRaw.length === 0) return true;

            let productName = normalizeSearchStr(item.product_name || "");
            let categoryName = normalizeSearchStr(item.category ? item.category.category_name : "");
            let subCategoryName = normalizeSearchStr(item.sub_category ? item.sub_category.sub_category_name : "");
            let brandName = normalizeSearchStr(item.brand ? item.brand.name : "");
            let unitName = normalizeSearchStr(item.unit ? item.unit.unit_name : "");

            let rawCode = "";
            try {
                let parsed = typeof item.product_code === 'string' ? JSON.parse(item.product_code) : item.product_code;
                rawCode = Array.isArray(parsed) ? parsed.join(" ") : String(parsed);
            } catch(e) {
                rawCode = String(item.product_code || "");
            }
            let codeEng = normalizeSearchStr(typeof banglaToEngNum === 'function' ? banglaToEngNum(rawCode) : rawCode);
            let codeBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(rawCode) : rawCode);

            let qtyEng = String(item.quantity !== undefined && item.quantity !== null ? item.quantity : "");
            let qtyBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(qtyEng) : qtyEng);

            let costEng = String(item.cost_price !== undefined && item.cost_price !== null ? item.cost_price : "");
            let costBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(costEng) : costEng);

            let sellEng = String(item.sell_price !== undefined && item.sell_price !== null ? item.sell_price : "");
            let sellBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(sellEng) : sellEng);

            let corpus = `${productName} ${categoryName} ${subCategoryName} ${brandName} ${unitName} ${codeEng} ${codeBn} ${qtyEng} ${qtyBn} ${costEng} ${costBn} ${sellEng} ${sellBn}`;

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
        let totalSellingQuantityPrice = 0;
        let outOfStockCount = 0;

        filtered.forEach(function (item) {
            let q = parseInt(item.quantity) || 0;
            let c = parseFloat(item.cost_price) || 0;
            let s = parseFloat(item.sell_price) || 0;

            if (q <= 0) {
                outOfStockCount++;
            }

            totalQuantity += q;
            totalCostPrice += c;
            totalSellingPrice += s;
            totalCostQuantityPrice += (c * q);
            totalSellingQuantityPrice += (s * q);
        });

        $("#totalQuantity").text(engToBanglaNum(totalQuantity.toFixed(0)));
        $("#totalCostPrice").text(engToBanglaNum(totalCostPrice.toFixed(2)));
        $("#totalCostQuantityPrice").text(engToBanglaNum(totalCostQuantityPrice.toFixed(2)));
        $("#totalSellingPrice").text(engToBanglaNum(totalSellingPrice.toFixed(2)));

        // Update Top Smart Summary Cards
        if ($("#summaryTotalProducts").length) $("#summaryTotalProducts").text(engToBanglaNum(filtered.length));
        if ($("#summaryTotalQuantity").length) $("#summaryTotalQuantity").text(engToBanglaNum(totalQuantity) + " Pcs");
        if ($("#summaryOutOfStock").length) $("#summaryOutOfStock").text(engToBanglaNum(outOfStockCount));
        if ($("#summaryOutOfStockBracket").length) $("#summaryOutOfStockBracket").text(engToBanglaNum(outOfStockCount));
        if ($("#summaryTotalCostValue").length) $("#summaryTotalCostValue").text("৳ " + engToBanglaNum(totalCostQuantityPrice.toFixed(2)));
        if ($("#summaryTotalSellingValue").length) $("#summaryTotalSellingValue").text("৳ " + engToBanglaNum(totalSellingQuantityPrice.toFixed(2)));

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

        if (pageItems.length === 0) {
            tableList.html('<tr><td colspan="11" class="text-center text-danger p-4 fw-bold">❌ কোনো পণ্য পাওয়া যায়নি।</td></tr>');
            mobileCardList.html('<div class="p-4 text-center text-danger fw-bold bg-white rounded-3 border shadow-sm">❌ কোনো পণ্য পাওয়া যায়নি।</div>');
        } else {
            pageItems.forEach(function (item, idx) {
                let realIndex = startIndex + idx;
                const img_url = item.img_url ? item.img_url : "{{ asset('back-end/assets/img/product-img.svg') }}";
                let stockStatusClass = item.quantity > 0 ? "available" : "out-of-stock";
                let stockStatusText = item.quantity > 0 ? "Available" : "Out of Stock";
                let categoryName = item.category ? item.category.category_name : '-';
                let unitName = item.unit ? item.unit.unit_name : '';
                let formattedCode = formatProductCode(item.product_code);

                // Desktop Row
                let row = `
                    <tr>
                        <td class="text-center fw-bold">${realIndex + 1}</td>
                        <td class="text-center">
                            <div id="action_btn_wrap" class="d-flex align-items-center justify-content-center gap-1">
                                <a data-id="${item['id']}" href="#" class="link edit-link btn btn-sm btn-outline-success px-2 py-1" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" data-id="${item['id']}" class="link custom-delete-modal-btn btn btn-sm btn-outline-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#confirmationModal" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            <img style="width: 45px; height: 45px; object-fit: cover; border-radius: 6px; border: 1px solid #eee;" alt="${item.product_name}" src="${img_url}">
                        </td>
                        <td class="text-start">${formattedCode}</td>
                        <td class="text-start fw-bold">${item.product_name} ${unitName ? `<span class="text-muted small">(${unitName})</span>` : ''}</td>
                        <td class="text-start">${categoryName}</td>
                        <td class="text-center fw-bold">${engToBanglaNum(item.quantity)}${unitName ? ' ' + unitName : ''}</td>
                        <td class="text-end">৳ ${engToBanglaNum(parseFloat(item.cost_price).toFixed(2))}</td>
                        <td class="text-end fw-bold">৳ ${engToBanglaNum((parseFloat(item.cost_price) * parseInt(item.quantity)).toFixed(2))}</td>
                        <td class="text-end">৳ ${engToBanglaNum(parseFloat(item.sell_price).toFixed(2))}</td>
                        <td class="text-center">
                            <span class="badge ${stockStatusClass}">
                                ${stockStatusText}
                            </span>
                        </td>
                    </tr>`;
                tableList.append(row);

                // Mobile & Tablet Card
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
                                <img src="${img_url}" alt="${item.product_name}" class="product-card-thumb me-3" style="width: 52px; height: 52px; object-fit: cover; border-radius: 10px; border: 1.5px solid #E5D5F7; flex-shrink: 0;" />
                                <div class="overflow-hidden flex-grow-1">
                                    <h6 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 15px;">${item.product_name} ${unitName ? `<span class="text-muted small fw-normal">(${unitName})</span>` : ''}</h6>
                                    <div class="d-flex align-items-center gap-1.5 flex-wrap">
                                        <span class="text-muted small" style="font-size: 11.5px;">কোড:</span>
                                        ${formattedCode}
                                    </div>
                                </div>
                            </div>

                            <!-- 2x2 Financial Summary Grid in soft purple strip with comfortable box padding -->
                            <div class="invoice-summary-strip rounded-3 border">
                                <div class="row g-2.5 text-center">
                                    <div class="col-6">
                                        <div class="invoice-price-box rounded-2 border">
                                            <span class="summary-label text-muted">পরিমাণ</span>
                                            <span class="summary-price text-dark">${engToBanglaNum(item.quantity)}${unitName ? ' ' + unitName : ''}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box rounded-2 border">
                                            <span class="summary-label text-danger">ক্রয়মূল্য</span>
                                            <span class="summary-price text-danger">৳ ${engToBanglaNum(parseFloat(item.cost_price).toFixed(2))}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box rounded-2 border">
                                            <span class="summary-label text-success">বিক্রয়মূল্য</span>
                                            <span class="summary-price text-success">৳ ${engToBanglaNum(parseFloat(item.sell_price).toFixed(2))}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="invoice-price-box rounded-2 border">
                                            <span class="summary-label" style="color: #8C56D4 !important;">মোট ক্রয়</span>
                                            <span class="summary-price" style="color: #8C56D4 !important;">৳ ${engToBanglaNum((parseFloat(item.cost_price) * parseInt(item.quantity)).toFixed(2))}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modern Action Buttons Strip below Financial Grid -->
                            <div class="mobile-card-actions pt-2.5 mt-2.5 border-top">
                                <button type="button" class="mobile-action-btn action-btn-edit edit-link" data-id="${item['id']}" data-bs-toggle="modal" data-bs-target="#exampleModal" title="এডিট করুন">
                                    <i class="fa-solid fa-pen-to-square"></i><span>এডিট</span>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-delete custom-delete-modal-btn" data-id="${item['id']}" data-bs-toggle="modal" data-bs-target="#confirmationModal" title="মুছে ফেলুন">
                                    <i class="fa-solid fa-trash"></i><span>ডিলিট</span>
                                </button>
                            </div>
                        </div>
                    </div>`;
                mobileCardList.append(mobileCard);
            });
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

    // Delegated click listener for Delete Product button
    $(document).on('click', '.custom-delete-modal-btn', function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id') || $(this).data('id');
        if (id) {
            $("#deleteID").val(id);
            $("#confirmationModal").modal('show');
        }
    });

        // 3. Update Display Info & Pagination UI
        let fromCount = totalItems > 0 ? startIndex + 1 : 0;
        let toCount = endIndex;
        $("#display-info").html(`Showing <span class="badge bg-light text-dark border px-2 py-1 mx-1 fw-bold fs-6">${fromCount} - ${toCount}</span> of <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 mx-1 fw-bold fs-6">${totalItems}</span> entries`);

        renderPaginationControls(totalPages);
    }

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

    async function loadFilterCategories() {
        try {
            let res = await axios.get("/api/category-list", HeaderToken());
            if (res.data.status === "success") {
                let options = '<option value="">All Categories</option>';
                res.data.CategoryData.forEach(cat => {
                    options += `<option value="${cat.id}">${cat.category_name}</option>`;
                });
                $("#filterCategory").html(options);
            }
        } catch (e) { console.error("Filter category loading failed", e); }
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
