    <!-- Hero Main Content Start -->
    <div class="main-content">
        <div class="page-content">
            <!-- Table Start -->
            <div class="data-table">
                <div class="card border-0 overflow-hidden mb-3">
                    <div class="card-body p-3 p-lg-4">
                        <!-- 1. Header: Left Title with 4px border, Right Search & Filter Dropdown (No Date Menu) -->
                        <div class="invoice-card-header mb-3 pb-2 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="invoice-title-icon-box rounded-3 d-none d-lg-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-boxes-stacked fs-5"></i>
                                </div>
                                <h4 class="invoice-main-heading m-0 p-0 fw-bold">প্রোডাক্ট তালিকা</h4>
                            </div>

                            <!-- Right Header Controls: Search, Filter, + New Product -->
                            <div class="d-flex align-items-center gap-2">
                                <!-- Desktop Search Input (>= 992px) -->
                                <div class="position-relative d-none d-lg-block" style="width: 240px;">
                                    <input type="text" id="desktopSearchInput" class="form-control invoice-search-input" style="height: 38px !important; min-height: 38px !important; font-size: 13px !important; padding-right: 32px !important;" placeholder="পণ্য খুঁজুন..." autocomplete="off" />
                                    <i class="fa-solid fa-magnifying-glass position-absolute end-0 top-50 translate-middle-y me-2.5 text-muted" style="pointer-events: none; font-size: 13px;"></i>
                                </div>

                                <!-- Mobile Search Toggle Button (< 992px) -->
                                <button type="button" id="mobileSearchToggleBtn" class="mobile-header-icon-btn d-lg-none" onclick="toggleMobileSearchBar()" title="অনুসন্ধান">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>

                                <!-- Filter Dropdown (No Date Menu) -->
                                <div class="custom-dropdown-wrap position-relative" id="productFilterDropdownContainer">
                                    <button type="button" class="mobile-header-icon-btn d-lg-none" id="mobileFilterDropdownToggle" onclick="toggleCustomDropdown('productFilterMenu')" title="ফিল্টার">
                                        <i class="fa-solid fa-filter"></i>
                                    </button>
                                    <button type="button" class="toolbar-control-btn d-none d-lg-inline-flex align-items-center justify-content-between px-3 gap-2" id="desktopFilterDropdownToggle" onclick="toggleCustomDropdown('productFilterMenu')" style="height: 38px !important; min-height: 38px !important; font-size: 13px !important;">
                                        <i class="fa-solid fa-filter" style="color: #8C56D4;"></i>
                                        <span id="currentFilterText">সকল প্রোডাক্ট</span>
                                        <i class="fa-solid fa-chevron-down dropdown-arrow-icon"></i>
                                    </button>
                                    <input type="hidden" id="productStatusFilter" value="all">
                                    <div class="custom-dropdown-menu shadow-lg" id="productFilterMenu" style="min-width: 175px; right: 0; left: auto;">
                                        <div class="custom-dropdown-item active" data-value="all" onclick="selectProductFilter('all', 'সকল প্রোডাক্ট')">সকল প্রোডাক্ট</div>
                                        <div class="custom-dropdown-item" data-value="available" onclick="selectProductFilter('available', 'স্টকে আছে')">স্টকে আছে</div>
                                        <div class="custom-dropdown-item" data-value="out_of_stock" onclick="selectProductFilter('out_of_stock', 'স্টক শেষ')">স্টক শেষ</div>
                                        <div class="custom-dropdown-item" data-value="low_stock" onclick="selectProductFilter('low_stock', 'কম স্টক (১-১০)')">কম স্টক (১-১০)</div>
                                    </div>
                                </div>

                                <!-- Add Product Button (Desktop) -->
                                <button type="button" class="btn text-white fw-bold d-none d-lg-inline-flex align-items-center justify-content-center px-3 gap-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#createProduct" onclick="openPosAddProductModal()" style="height: 38px; border-radius: 8px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); font-size: 13px; border: none; cursor: pointer;">
                                    <i class="fa-solid fa-plus me-1"></i> নতুন প্রোডাক্ট
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Expandable Search Bar -->
                        <div id="mobileSearchWrap" class="mb-3 d-none position-relative">
                            <div class="d-flex align-items-center gap-2 mb-0">
                                <div class="position-relative flex-grow-1 mb-0">
                                    <input type="text" id="mobileSearchInput" class="form-control invoice-search-input mb-0" placeholder="পণ্য খুঁজুন..." autocomplete="off" />
                                </div>
                                <button type="button" class="mobile-search-close-btn mb-0" onclick="closeMobileSearchBar()" title="বন্ধ করুন">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Top Summary Strip matching Image: "মোট : ১" -->
                        <div class="d-flex align-items-center justify-content-between mb-3 px-1">
                            <span class="fw-semibold text-slate-700 dark:text-slate-200" style="font-size: 14.5px;">
                                মোট : <strong id="summaryTotalCount" class="text-dark dark:text-white fw-bold">০</strong>
                            </span>
                        </div>

                        <!-- Desktop Table View (>= 992px) -->
                        <div class="table-responsive d-none d-lg-block">
                            <table id="printTable" class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">Serial No</th>
                                        <th class="text-center" style="width: 100px;">Action</th>
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
                        <div id="mobileCardList" class="d-flex flex-wrap d-lg-none mb-3 align-items-start" style="gap: 8px !important;"></div>

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

            <!-- Product Details View Modal -->
            <div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true" style="z-index: 10600;">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
                    <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                        <div class="modal-header border-bottom py-2.5 px-3 d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); color: #ffffff;">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-boxes-stacked fs-6"></i>
                                <h6 class="modal-title fw-bold m-0 text-white" id="productDetailsModalLabel" style="font-size: 15px;">প্রোডাক্টের বিস্তারিত তথ্য</h6>
                            </div>
                            <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close" style="font-size: 11px;"></button>
                        </div>
                        <div class="modal-body p-3">
                            <!-- Top Product Card: Image + Title + Badges -->
                            <div class="d-flex align-items-center gap-3 p-2.5 rounded-3 mb-3" style="background: #FAF7FD; border: 1px solid #E5D5F7;">
                                <img id="detailProductImg" src="" alt="Product" class="rounded-3 border" style="width: 64px; height: 64px; object-fit: cover; flex-shrink: 0;" />
                                <div class="flex-grow-1 min-w-0">
                                    <h6 id="detailProductName" class="fw-bold text-dark mb-1 text-truncate" style="font-size: 16px;">-</h6>
                                    <div class="d-flex align-items-center gap-1.5 flex-wrap">
                                        <span id="detailProductCode" class="badge bg-white text-secondary border fw-semibold px-2 py-0.5" style="font-size: 11px;">-</span>
                                        <span id="detailStockBadge" class="badge px-2 py-0.5 fw-bold" style="font-size: 11px;">-</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Info Grid: Category, SubCategory, Brand, Unit -->
                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <div class="p-2 rounded-2 border bg-light">
                                        <span class="text-muted d-block small" style="font-size: 11px;">ক্যাটাগরি</span>
                                        <span id="detailCategory" class="fw-bold text-dark" style="font-size: 13px;">-</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 rounded-2 border bg-light">
                                        <span class="text-muted d-block small" style="font-size: 11px;">সাব-ক্যাটাগরি</span>
                                        <span id="detailSubCategory" class="fw-bold text-dark" style="font-size: 13px;">-</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 rounded-2 border bg-light">
                                        <span class="text-muted d-block small" style="font-size: 11px;">ব্র্যান্ড</span>
                                        <span id="detailBrand" class="fw-bold text-dark" style="font-size: 13px;">-</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 rounded-2 border bg-light">
                                        <span class="text-muted d-block small" style="font-size: 11px;">ইউনিট</span>
                                        <span id="detailUnit" class="fw-bold text-dark" style="font-size: 13px;">-</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 2x2 Financial Summary Box -->
                            <div class="p-2.5 rounded-3 mb-2" style="background: #FAF7FD; border: 1px solid #E5D5F7;">
                                <div class="row g-2 text-center">
                                    <div class="col-6">
                                        <div class="p-2 rounded-2 bg-white border">
                                            <span class="text-muted d-block small" style="font-size: 11px;">বর্তমান স্টক</span>
                                            <span id="detailQuantity" class="fw-bold text-dark" style="font-size: 15px;">০</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 rounded-2 bg-white border">
                                            <span class="text-danger d-block small" style="font-size: 11px;">একক ক্রয়মূল্য</span>
                                            <span id="detailCostPrice" class="fw-bold text-danger" style="font-size: 15px;">৳ ০.০০</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 rounded-2 bg-white border">
                                            <span class="text-success d-block small" style="font-size: 11px;">একক বিক্রয়মূল্য</span>
                                            <span id="detailSellPrice" class="fw-bold text-success" style="font-size: 15px;">৳ ০.০০</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 rounded-2 bg-white border">
                                            <span class="d-block small" style="font-size: 11px; color: #8C56D4;">মোট ক্রয়মূল্য</span>
                                            <span id="detailTotalCost" class="fw-bold" style="font-size: 15px; color: #8C56D4;">৳ ০.০০</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top py-2 px-3 d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-secondary px-3 py-1.5 fw-semibold" data-bs-dismiss="modal" style="font-size: 13px; border-radius: 6px;">বন্ধ করুন</button>
                            <button type="button" id="detailQuickEditBtn" class="btn text-white px-3 py-1.5 fw-semibold" style="font-size: 13px; border-radius: 6px; background: #8C56D4;">
                                <i class="fa-solid fa-pen-to-square me-1"></i> এডিট করুন
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; 2026 মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-success fw-bold text-decoration-none">CodeNext IT</a></footer>
            </div>

            <!-- Floating Add Product FAB Button -->
            <button type="button" class="floating-add-invoice-btn" data-bs-toggle="modal" data-bs-target="#createProduct" onclick="openPosAddProductModal()" title="নতুন প্রোডাক্ট তৈরি করুন">
                <i class="fa-solid fa-plus"></i>
            </button>

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
            border-left: 4px solid #8C56D4 !important;
            padding-left: 10px !important;
            line-height: 1.2 !important;
            display: inline-flex;
            align-items: center;
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
        .mobile-header-icon-btn:active,
        .mobile-header-icon-btn.active {
            background: #F3ECFB;
            border-color: #8C56D4;
            color: #793FC5;
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(140, 86, 212, 0.2);
        }
        .mobile-search-close-btn {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: #FEE2E2;
            border: 1.5px solid #FECACA;
            color: #EF4444;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.2s ease-in-out;
        }
        .mobile-search-close-btn:hover {
            background: #EF4444;
            color: #ffffff;
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

        /* Floating Action Button (FAB) for Creating Product */
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
            transition: transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.25s ease, background 0.25s ease;
            border: 2px solid rgba(255, 255, 255, 0.25);
            cursor: pointer;
        }
        .floating-add-invoice-btn:hover {
            transform: scale(1.1) translateY(-3px);
            box-shadow: 0 10px 28px rgba(140, 86, 212, 0.55), 0 4px 10px rgba(0, 0, 0, 0.15) !important;
            color: #ffffff !important;
            background: linear-gradient(135deg, #9962e0 0%, #8C56D4 100%) !important;
        }
        .floating-add-invoice-btn:active {
            transform: scale(0.95);
            box-shadow: 0 3px 10px rgba(140, 86, 212, 0.35) !important;
        }

        /* Badge Styles */
        .badge {
            display: inline-block;
            padding: 0.45em 0.8em;
            border-radius: 6px;
            font-size: 0.82em;
            font-weight: bold;
            text-align: center;
            color: #fff;
        }
        .badge.available {
            background-color: #8C56D4;
        }
        .badge.out-of-stock {
            background-color: #dc3545;
        }

        /* Product Mobile Card Grid & Styling matching User Uploaded Image */
        #mobileCardList {
            display: flex !important;
            flex-wrap: wrap !important;
            gap: 8px !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
            align-items: flex-start !important;
        }
        #mobileCardList > .col-12 {
            width: 100% !important;
            max-width: 100% !important;
            flex: 0 0 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        @media (min-width: 768px) and (max-width: 991.98px) {
            #mobileCardList > .col-md-6 {
                width: calc(50% - 4px) !important;
                max-width: calc(50% - 4px) !important;
                flex: 0 0 calc(50% - 4px) !important;
                padding: 0 !important;
                margin: 0 !important;
            }
        }
        .product-user-card {
            border: 1px solid #E2E8F0 !important;
            border-radius: 6px !important;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04) !important;
            background-color: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease !important;
        }
        .product-user-card:hover {
            box-shadow: 0 4px 12px rgba(140, 86, 212, 0.12) !important;
            border-color: #d1b7f3 !important;
        }

        @media (max-width: 991.98px) {
            .page-content {
                background: #ffffff !important;
                padding-left: 0px !important;
                padding-right: 0px !important;
                padding-bottom: 0px !important;
            }
            .data-table .card {
                border: 0 !important;
                border-color: transparent !important;
                box-shadow: none !important;
            }
            .data-table .card-body {
                padding: 10px !important;
            }
            .invoice-card-header {
                border-bottom: none !important;
                padding-bottom: 0 !important;
                margin-bottom: 8px !important;
            }
            .invoice-main-heading {
                font-size: 18px !important;
            }
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
        body[light-mode="dark"] .mobile-header-icon-btn,
        body[data-layout-mode="dark"] .mobile-header-icon-btn,
        body.dark-mode .mobile-header-icon-btn {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #D2B7F1 !important;
        }
        body[light-mode="dark"] .mobile-header-icon-btn:hover,
        body[data-layout-mode="dark"] .mobile-header-icon-btn:hover,
        body.dark-mode .mobile-header-icon-btn:hover {
            background: #334155 !important;
            border-color: #8C56D4 !important;
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
        body[light-mode="dark"] .product-user-card,
        body[data-layout-mode="dark"] .product-user-card,
        body.dark-mode .product-user-card {
            background-color: #1e293b !important;
            border-color: #334155 !important;
            border: 1px solid #334155 !important;
            color: #F3ECFB !important;
        }
        body[light-mode="dark"] .product-user-card .text-dark,
        body[data-layout-mode="dark"] .product-user-card .text-dark,
        body.dark-mode .product-user-card .text-dark {
            color: #F3ECFB !important;
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
    </style>

    <script>
        let rawProductData = [];
        let currentPage = 1;
        let pageSize = 15;

        $(document).ready(function () {
            getProductList();
            $("#mobileSearchInput, #desktopSearchInput").val("");
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

        function selectProductFilter(val, label) {
            $("#productStatusFilter").val(val);
            $("#currentFilterText").text(label);
            $("#productFilterMenu .custom-dropdown-item").removeClass("active");
            $(`#productFilterMenu [data-value="${val}"]`).addClass("active");
            $("#productFilterMenu").removeClass("show");
            $("#productFilterDropdownContainer").removeClass("open");
            currentPage = 1;
            renderPaginatedList();
        }

        $(document).on("click", function (e) {
            if (!$(e.target).closest(".custom-dropdown-wrap").length) {
                $(".custom-dropdown-menu").removeClass("show");
                $(".custom-dropdown-wrap").removeClass("open");
            }
        });

        // --- Mobile Search Bar Handlers ---
        function toggleMobileSearchBar() {
            const wrap = $("#mobileSearchWrap");
            if (wrap.hasClass("d-none")) {
                wrap.removeClass("d-none");
                $("#mobileSearchInput").focus();
                $("#mobileSearchToggleBtn").addClass("active");
            } else {
                closeMobileSearchBar();
            }
        }

        function closeMobileSearchBar() {
            $("#mobileSearchWrap").addClass("d-none");
            $("#mobileSearchInput").val("");
            $("#desktopSearchInput").val("");
            $("#mobileSearchToggleBtn").removeClass("active");
            currentPage = 1;
            renderPaginatedList();
        }

        $("#mobileSearchInput, #desktopSearchInput").on("keyup search input change", function () {
            let val = $(this).val();
            $("#mobileSearchInput").val(val);
            $("#desktopSearchInput").val(val);
            currentPage = 1;
            renderPaginatedList();
        });

        async function getProductList() {
            const tableList = $("#tableList");
            const mobileCardList = $("#mobileCardList");
            tableList.html('<tr><td colspan="11" class="text-center py-5"><div class="spinner-border text-primary me-2" role="status"></div><span class="fw-bold text-muted">পণ্য লোড হচ্ছে...</span></td></tr>');
            mobileCardList.html('<div class="col-12 text-center py-4"><div class="spinner-border text-primary me-2" role="status"></div><span class="fw-bold text-muted">ডাটা লোড হচ্ছে...</span></div>');

            try {
                const res = await axios.get('/admin-dashboard-product-list');
                if (res.data && res.data.status === 'success') {
                    rawProductData = res.data.data || [];
                    currentPage = 1;
                    renderPaginatedList();
                } else {
                    tableList.html('<tr><td colspan="11" class="text-center py-4 text-danger fw-bold">⚠️ ডাটা পাওয়া যায়নি!</td></tr>');
                    mobileCardList.html('<div class="col-12 text-center py-4 text-danger fw-bold bg-white rounded-3 border p-3">⚠️ ডাটা পাওয়া যায়নি!</div>');
                }
            } catch (e) {
                console.error('Fetch products error:', e);
                tableList.html('<tr><td colspan="11" class="text-center py-4 text-danger fw-bold">⚠️ সমস্যা দেখা দিয়েছে!</td></tr>');
                mobileCardList.html('<div class="col-12 text-center py-4 text-danger fw-bold bg-white rounded-3 border p-3">⚠️ সমস্যা দেখা দিয়েছে!</div>');
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
            if (!rawProductData) return;

            let rawSearch = $("#mobileSearchInput").val() || $("#desktopSearchInput").val() || "";
            let statusVal = $("#productStatusFilter").val() || "all";

            let searchEng = typeof banglaToEngNum === 'function' ? banglaToEngNum(rawSearch) : rawSearch;
            let searchBn  = typeof engToBanglaNum === 'function' ? engToBanglaNum(rawSearch) : rawSearch;

            let searchWordsRaw = normalizeSearchStr(rawSearch).split(" ").filter(Boolean);
            let searchWordsEng = normalizeSearchStr(searchEng).split(" ").filter(Boolean);
            let searchWordsBn  = normalizeSearchStr(searchBn).split(" ").filter(Boolean);

            // 1. Filter Data
            let filtered = rawProductData.filter(function (item) {
                const qty = parseInt(item.quantity) || 0;

                // Status Filter
                let matchesStatus = true;
                if (statusVal === 'available') {
                    matchesStatus = (qty > 0);
                } else if (statusVal === 'out_of_stock') {
                    matchesStatus = (qty <= 0);
                } else if (statusVal === 'low_stock') {
                    matchesStatus = (qty > 0 && qty <= 10);
                }

                if (!matchesStatus) return false;
                if (searchWordsRaw.length === 0) return true;

                let productName = normalizeSearchStr(item.product_name || "");
                let categoryName = item.category ? normalizeSearchStr(item.category.category_name || "") : "";
                let brandName = item.brand ? normalizeSearchStr(item.brand.name || "") : "";
                let unitName = item.unit ? normalizeSearchStr(item.unit.unit_name || "") : "";

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

                let costEng = String(item.cost_price !== undefined && item.cost_price !== null ? item.cost_price : "");
                let costBn  = normalizeSearchStr(typeof engToBanglaNum === 'function' ? engToBanglaNum(costEng) : costEng);

                let sellEng = String(item.sell_price !== undefined && item.sell_price !== null ? item.sell_price : "");
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
                let q = parseInt(item.quantity) || 0;
                let c = parseFloat(item.cost_price) || 0;
                let s = parseFloat(item.sell_price) || 0;

                totalQuantity += q;
                totalCostPrice += c;
                totalSellingPrice += s;
                totalCostQuantityPrice += (c * q);
            });

            $("#totalQuantity").text(engToBanglaNum(totalQuantity.toFixed(0)));
            $("#totalCostPrice").text(engToBanglaNum(totalCostPrice.toFixed(2)));
            $("#totalCostQuantityPrice").text(engToBanglaNum(totalCostQuantityPrice.toFixed(2)));
            $("#totalSellingPrice").text(engToBanglaNum(totalSellingPrice.toFixed(2)));

            // Update Top Summary Count matching Image ("মোট : ১")
            $("#summaryTotalCount").text(engToBanglaNum(filtered.length));

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
                mobileCardList.html('<div class="col-12 p-4 text-center text-danger fw-bold bg-white rounded-3 border shadow-sm">❌ কোনো পণ্য পাওয়া যায়নি।</div>');
            } else {
                pageItems.forEach(function (item, idx) {
                    let realIndex = startIndex + idx;
                    const defaultImg = "{{ asset('back-end/assets/img/product-img.svg') }}";
                    const img_url = item.img_url ? item.img_url : defaultImg;
                    let qty = parseInt(item.quantity) || 0;
                    let stockStatusClass = qty > 0 ? "available" : "out-of-stock";
                    let stockStatusText = qty > 0 ? "Available" : "Out of Stock";
                    let categoryName = item.category ? item.category.category_name : '-';
                    let unitName = item.unit ? item.unit.unit_name : '';
                    let formattedCode = formatProductCode(item.product_code);

                    // Desktop Table Row
                    let row = `
                        <tr>
                            <td class="text-center fw-bold">${realIndex + 1}</td>
                            <td class="text-center">
                                <div id="action_btn_wrap" class="d-flex align-items-center justify-content-center gap-1">
                                    <button type="button" class="btn btn-sm btn-outline-primary px-2 py-1" onclick="openProductDetailsModal(${item['id']})" title="প্রোডাক্ট বিস্তারিত" style="border-radius: 6px; border-color: #8C56D4; color: #8C56D4;">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <a data-id="${item['id']}" href="#" class="link edit-link btn btn-sm btn-outline-info px-2 py-1" data-bs-toggle="modal" data-bs-target="#exampleModal" title="এডিট করুন" style="border-radius: 6px;">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" data-id="${item['id']}" class="link custom-delete-modal-btn btn btn-sm btn-outline-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#confirmationModal" title="মুছে ফেলুন" style="border-radius: 6px;">
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

                    // Mobile & Tablet Card Layout matching User's Uploaded Image
                    let mobileCard = `
                        <div class="col-12 col-md-6 align-self-start mb-0">
                            <div class="product-user-card card border shadow-sm p-3 position-relative mb-0 bg-white" style="border-color: #E2E8F0 !important; border-radius: 6px !important;">
                                <div class="d-flex align-items-center justify-content-between gap-3">
                                    <!-- Left: Circular Product Image -->
                                    <img src="${img_url}" onerror="this.src='${defaultImg}'" alt="${item.product_name}" class="product-circle-img" style="width: 50px; height: 50px; border-radius: 50% !important; object-fit: cover; border: 1.5px solid #E5D5F7; flex-shrink: 0;" />
                                    
                                    <!-- Middle: Product Name & 2-Col Stats -->
                                    <div class="flex-grow-1 min-w-0">
                                        <h6 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 15px;">${item.product_name}</h6>
                                        <div class="d-flex align-items-center justify-content-between gap-2">
                                            <div>
                                                <span class="text-muted d-block" style="font-size: 11.5px;">বিক্রয় মূল্য</span>
                                                <span class="fw-bold text-dark" style="font-size: 13.5px;">৳ ${engToBanglaNum(parseFloat(item.sell_price || 0).toFixed(2))}</span>
                                            </div>
                                            <div class="text-end">
                                                <span class="text-muted d-block" style="font-size: 11.5px;">মোট স্টক</span>
                                                <span class="fw-bold ${qty <= 0 ? 'text-danger' : 'text-success'}" style="font-size: 13.5px;">${engToBanglaNum(qty)}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Column: 3-Dots at Top, Eye View at Bottom -->
                                    <div class="d-flex flex-column align-items-center justify-content-between flex-shrink-0" style="min-height: 50px;">
                                        <!-- 3-Dots Menu -->
                                        <div class="dropdown position-relative">
                                            <button type="button" class="btn p-0 border-0 text-muted shadow-none" data-bs-toggle="dropdown" aria-expanded="false" style="line-height: 1;" title="মেনু">
                                                <i class="fa-solid fa-ellipsis-vertical fs-5 text-secondary"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border py-1" style="min-width: 140px; border-radius: 8px; z-index: 1050;">
                                                <li>
                                                    <button type="button" class="dropdown-item d-flex align-items-center gap-2 py-1.5 px-3" onclick="openProductDetailsModal(${item['id']})" style="font-size: 13px;">
                                                        <i class="fa-solid fa-eye" style="color: #8C56D4; width: 16px;"></i>
                                                        <span>বিস্তারিত</span>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item d-flex align-items-center gap-2 py-1.5 px-3 edit-link" data-id="${item['id']}" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 13px;">
                                                        <i class="fa-solid fa-pen-to-square text-primary" style="width: 16px;"></i>
                                                        <span>এডিট</span>
                                                    </button>
                                                </li>
                                                <li><hr class="dropdown-divider my-1"></li>
                                                <li>
                                                    <button type="button" class="dropdown-item d-flex align-items-center gap-2 py-1.5 px-3 text-danger custom-delete-modal-btn" data-id="${item['id']}" data-bs-toggle="modal" data-bs-target="#confirmationModal" style="font-size: 13px;">
                                                        <i class="fa-solid fa-trash text-danger" style="width: 16px;"></i>
                                                        <span>ডিলিট</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Quick View Eye Button -->
                                        <button type="button" class="btn p-0 border-0 shadow-none mt-auto" onclick="openProductDetailsModal(${item['id']})" title="বিস্তারিত দেখুন" style="color: #8C56D4; line-height: 1;">
                                            <i class="fa-regular fa-eye fs-6"></i>
                                        </button>
                                    </div>
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

        // Product Details Modal Open Handler
        function openProductDetailsModal(id) {
            let product = rawProductData.find(item => item.id == id);
            if (!product) return;

            const defaultImg = "{{ asset('back-end/assets/img/product-img.svg') }}";
            const img_url = product.img_url ? product.img_url : defaultImg;
            let formattedCode = formatProductCode(product.product_code);
            let categoryName = product.category ? product.category.category_name : '-';
            let subCategoryName = product.sub_category ? product.sub_category.sub_category_name : '-';
            let brandName = product.brand ? product.brand.name : 'General';
            let unitName = product.unit ? product.unit.unit_name : 'টি';
            let qty = parseFloat(product.quantity || 0);
            let cost = parseFloat(product.cost_price || 0);
            let sell = parseFloat(product.sell_price || 0);
            let totalCost = cost * qty;

            $("#detailProductImg").attr("src", img_url);
            $("#detailProductName").text(product.product_name || '-');
            $("#detailProductCode").html("কোড: " + formattedCode);
            
            let isAvailable = qty > 0;
            $("#detailStockBadge")
                .removeClass("bg-success bg-danger bg-warning text-success text-danger text-warning bg-success-subtle bg-danger-subtle")
                .addClass(isAvailable ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger")
                .text(isAvailable ? "Available" : "Out of Stock");

            $("#detailCategory").text(categoryName);
            $("#detailSubCategory").text(subCategoryName);
            $("#detailBrand").text(brandName);
            $("#detailUnit").text(unitName);

            $("#detailQuantity").text(engToBanglaNum(qty) + " " + unitName);
            $("#detailCostPrice").text("৳ " + engToBanglaNum(cost.toFixed(2)));
            $("#detailSellPrice").text("৳ " + engToBanglaNum(sell.toFixed(2)));
            $("#detailTotalCost").text("৳ " + engToBanglaNum(totalCost.toFixed(2)));

            $("#detailQuickEditBtn").off("click").on("click", function() {
                $("#productDetailsModal").modal("hide");
                setTimeout(() => {
                    const modalEl = document.getElementById('exampleModal') || document.getElementById('updateProductModal');
                    if (modalEl) {
                        $(modalEl).modal('show');
                        if (typeof FillUpProductUpdateForm === 'function') {
                            FillUpProductUpdateForm(id);
                        }
                    }
                }, 300);
            });

            $("#productDetailsModal").modal("show");
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
