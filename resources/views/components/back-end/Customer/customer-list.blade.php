<!-- Flatpickr CSS & JS per rules.md -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Hero Main Content Start -->
<div class="main-content">
    <div class="page-content" style="padding: 0px !important;">
        <!-- Table Start -->
        <div class="data-table border-0 shadow-none bg-transparent">
            <div class="card border-0 border-none shadow-none bg-transparent">
                <div class="card-body border-0 p-0">
                    <!-- 1. Header: Mobile/Tab: Title on left, Search & Filter icon buttons on right. Desktop: Icon + Title -->
                    <div class="invoice-card-header mb-3 pb-2 border-bottom d-flex align-items-center justify-content-between gap-2">
                        <div class="d-flex align-items-center gap-2 flex-grow-1 overflow-hidden">
                            <div class="invoice-title-icon-box rounded-3 d-none d-lg-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="fa-solid fa-users fs-5"></i>
                            </div>
                            <h4 class="invoice-main-heading m-0 p-0 fw-bold">কাস্টমার তালিকা</h4>
                        </div>

                        <!-- Mobile & Tab Action Buttons (Search & Filter) -->
                        <div class="d-flex align-items-center gap-2 d-lg-none flex-shrink-0">
                            <!-- Mobile Search Toggle Button -->
                            <button type="button" id="mobileSearchToggleBtn" class="mobile-header-icon-btn" onclick="toggleMobileSearchBar()" title="অনুসন্ধান">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>

                            <!-- Mobile Filter Dropdown -->
                            <div class="custom-dropdown-wrap position-relative" id="mobileFilterDropdownContainer">
                                <button type="button" class="mobile-header-icon-btn" id="mobileFilterDropdownToggle" onclick="toggleCustomDropdown('mobileFilterDropdownMenu')" title="ফিল্টার">
                                    <i class="fa-solid fa-filter"></i>
                                </button>
                                <div class="custom-dropdown-menu dropdown-menus end-0 shadow-lg" id="mobileFilterDropdownMenu" style="min-width: 175px;">
                                    <a href="#" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterOption('all', 'সব কাস্টমার', event)">সব কাস্টমার</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="Active" onclick="selectFilterOption('Active', 'সক্রিয় (Active)', event)">সক্রিয় (Active)</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="Inactive" onclick="selectFilterOption('Inactive', 'নিষ্ক্রিয় (Inactive)', event)">নিষ্ক্রিয় (Inactive)</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="due" onclick="selectFilterOption('due', 'বকেয়া রয়েছে', event)">বকেয়া রয়েছে</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Expandable Search Bar -->
                    <div id="mobileSearchWrap" class="mb-3 d-none position-relative">
                        <div class="d-flex align-items-center gap-2 mb-0">
                            <div class="position-relative flex-grow-1 mb-0">
                                <input type="text" id="mobileSearchInput" class="form-control invoice-search-input mb-0" placeholder="কাস্টমার খুঁজুন (নাম, মোবাইল, আইডি)..." autocomplete="off" />
                                <div id="mobileSearchDropdown" class="search-live-dropdown shadow-lg rounded-3 d-none position-absolute w-100 start-0"></div>
                            </div>
                            <button type="button" class="mobile-search-close-btn mb-0" onclick="closeMobileSearchBar()" title="বন্ধ করুন">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Desktop Search & Toolbar Section (>= 992px) -->
                    <div class="invoice-toolbar-section mb-3 d-none d-lg-flex flex-column gap-2">
                        <div class="d-flex align-items-center justify-content-between gap-3 w-100">
                            <!-- Left: Search Input Box -->
                            <div class="invoice-search-box-wrap position-relative flex-grow-1" style="max-width: 420px;">
                                <input type="text" id="searchInput" class="form-control invoice-search-input" placeholder="কাস্টমার খুঁজুন (নাম, মোবাইল, আইডি)..." autocomplete="off" />
                                <i class="fa-solid fa-magnifying-glass invoice-search-addon-icon"></i>
                                <div id="desktopSearchDropdown" class="search-live-dropdown shadow-lg rounded-3 d-none position-absolute w-100 start-0"></div>
                            </div>

                            <!-- Right: Entries & Filter Dropdowns -->
                            <div class="d-flex align-items-center gap-2">
                                <!-- Entries Dropdown -->
                                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                    <span class="fw-semibold text-slate-700 dark:text-slate-200 small" style="font-size: 13.5px; white-space: nowrap;">এন্ট্রি:</span>
                                    <div class="custom-dropdown-wrap position-relative" id="entriesDropdownContainer" style="width: auto !important;">
                                        <button type="button" class="toolbar-control-btn d-inline-flex align-items-center justify-content-between px-3 gap-2" id="entriesDropdownToggle" onclick="toggleCustomDropdown('entriesDropdownMenu')" style="width: auto !important; min-width: 80px;">
                                            <span id="currentEntriesText" class="fw-bold fs-7 fs-sm-6">৫০</span>
                                            <i class="fa-solid fa-chevron-down dropdown-arrow-icon"></i>
                                        </button>
                                        <input type="hidden" id="entries" value="50">
                                        <div class="custom-dropdown-menu" id="entriesDropdownMenu">
                                            <div class="custom-dropdown-item" data-value="10" onclick="selectEntriesOption(10, '১০')">১০ টি</div>
                                            <div class="custom-dropdown-item active" data-value="50" onclick="selectEntriesOption(50, '৫০')">৫০ টি</div>
                                            <div class="custom-dropdown-item" data-value="100" onclick="selectEntriesOption(100, '১০০')">১০০ টি</div>
                                            <div class="custom-dropdown-item" data-value="200" onclick="selectEntriesOption(200, '২০০')">২০০ টি</div>
                                            <div class="custom-dropdown-item" data-value="500" onclick="selectEntriesOption(500, '৫০০')">৫০০ টি</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Filter Dropdown -->
                                <div class="custom-dropdown-wrap position-relative" id="filterDropdownContainer" style="min-width: 170px;">
                                    <button type="button" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-between px-3" id="filterDropdownToggle" onclick="toggleCustomDropdown('filterDropdownMenu')">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-filter me-2" style="color: #8C56D4; font-size: 13px;"></i>
                                            <span id="currentFilterText" class="fw-bold fs-7 fs-sm-6 text-truncate">সব কাস্টমার</span>
                                        </div>
                                        <i class="fa-solid fa-chevron-down dropdown-arrow-icon ms-1"></i>
                                    </button>
                                    <div class="custom-dropdown-menu dropdown-menus end-0" id="filterDropdownMenu">
                                        <a href="#" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterOption('all', 'সব কাস্টমার', event)">সব কাস্টমার</a>
                                        <a href="#" class="custom-dropdown-item" data-filter="Active" onclick="selectFilterOption('Active', 'সক্রিয় (Active)', event)">সক্রিয় (Active)</a>
                                        <a href="#" class="custom-dropdown-item" data-filter="Inactive" onclick="selectFilterOption('Inactive', 'নিষ্ক্রিয় (Inactive)', event)">নিষ্ক্রিয় (Inactive)</a>
                                        <a href="#" class="custom-dropdown-item" data-filter="due" onclick="selectFilterOption('due', 'বকেয়া রয়েছে', event)">বকেয়া রয়েছে</a>
                                    </div>
                                </div>

                                <!-- Create Customer Button -->
                                <button type="button" class="invoice-search-submit-btn px-3 fw-bold d-inline-flex align-items-center justify-content-center gap-1.5 shadow-sm" onclick="openCustomerCreateModal()">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>নতুন কাস্টমার</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Top Summary Stats Strip (1 Row, 2 Columns, Vertical Divider, Purple Color) -->
                    <div class="invoice-top-summary-strip mb-3 p-2.5 px-3 bg-white dark:bg-slate-800" style="border-radius: 6px !important; border: none !important; box-shadow: 0 4px 18px rgba(140, 86, 212, 0.08), 0 1px 3px rgba(0, 0, 0, 0.04) !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Left: মোট কাস্টমার -->
                            <div class="d-flex flex-column text-start ps-1 flex-grow-1">
                                <span class="text-muted small fw-medium" style="font-size: 12px;">মোট কাস্টমার</span>
                                <span class="fw-bold" id="topSummaryTotalCount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">০</span>
                            </div>

                            <!-- Middle Vertical Divider Bar -->
                            <div class="summary-divider-bar" style="width: 1.5px; height: 32px; background-color: #E5D5F7; flex-shrink: 0; margin: 0 16px;"></div>

                            <!-- Right: মোট বকেয়া পাওনা -->
                            <div class="d-flex flex-column text-end pe-1 flex-grow-1">
                                <span class="text-muted small fw-medium" style="font-size: 12px;">মোট বকেয়া পাওনা</span>
                                <span class="fw-bold" id="topSummaryTotalAmount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">৳ ০.০০</span>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Table View (>= 992px) -->
                    <div class="table-responsive d-none d-lg-block">
                        <table id="printTable" class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 55px;">ক্রমিক</th>
                                    <th class="text-center" style="width: 130px;">অ্যাকশন</th>
                                    <th class="text-start" style="width: 130px;">কাস্টমার আইডি</th>
                                    <th class="text-center" style="width: 65px;">ছবি</th>
                                    <th class="text-start">নাম</th>
                                    <th class="text-start">মোবাইল নম্বর</th>
                                    <th class="text-end" style="width: 140px;">বকেয়া পাওনা</th>
                                    <th class="text-center" style="width: 100px;">স্ট্যাটাস</th>
                                </tr>
                            </thead>
                            <tbody id="tableList"></tbody>
                        </table>
                    </div>

                    <!-- Mobile & Tablet Responsive Card List View (< 992px) -->
                    <div id="mobileCardList" class="d-flex flex-wrap d-lg-none mb-3 align-items-start" style="gap: 8px !important;"></div>

                    <!-- Smart Pagination & Display Info Footer -->
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between pt-3 mt-3 border-top gap-2">
                        <div class="text-muted small fw-medium" id="display-info" style="font-size: 13px;">
                            মোট ০ টির মধ্যে ০ - ০ টি কাস্টমার প্রদর্শিত হচ্ছে
                        </div>
                        <div id="pagination" class="d-flex align-items-center gap-1.5 flex-wrap justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->

        <div class="copyright">
            <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; {{ date('Y') }} মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-primary fw-bold text-decoration-none" style="color: #8C56D4 !important;">CodeNext IT</a></footer>
        </div>

        <!-- Floating Add Customer FAB Button -->
        <button type="button" onclick="openCustomerCreateModal()" class="floating-add-invoice-btn" title="নতুন কাস্টমার যোগ করুন">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
</div>
<!-- Hero Main Content End -->

<!-- ================= PAYMENT MODAL (Customer Due Collection) ================= -->
<div class="modal fade" id="customerDuePaymentModal" aria-labelledby="customerDuePaymentModalLabel" aria-hidden="true" style="z-index: 107000;">
<div class="modal-dialog" style="width: 100%;">
        <div class="modal-content w-100 border-0 rounded-4 shadow-lg overflow-hidden p-0">
            <!-- Modal Header -->
            <div class="modal-header-purple p-3 px-4 d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; color: #ffffff !important;">
                <div class="d-flex align-items-center gap-2 text-start flex-grow-1" style="min-width: 0; text-align: left !important;">
                    <i class="fa-solid fa-hand-holding-dollar fs-5 flex-shrink-0"></i>
                    <h5 class="modal-title fw-bold m-0 text-white text-start" id="customerDuePaymentModalLabel" style="font-size: 16px; text-align: left !important; line-height: 1.3;">কাস্টমার বকেয়া আদায় (Due Collection)</h5>
                </div>
                <button type="button" class="btn-close-red flex-shrink-0 ms-2" data-bs-dismiss="modal" aria-label="Close" onclick="clClosePaymentModal()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Modal Form with Scrollable Body and Sticky Bottom Action Buttons -->
            <form id="clPaymentForm" onsubmit="clSavePaymentInfo(event)" class="d-flex flex-column w-100 flex-grow-1 overflow-hidden m-0 p-0">
                <input type="hidden" id="clUpdateID">

                <div class="modal-body p-3 p-md-4 flex-grow-1 overflow-y-auto">
                    <!-- Date & Dues Summary Card -->
                    <div class="modal-dues-summary-card p-3 mb-3 rounded-3 w-100">
                        <div class="mb-2.5">
                            <label for="clDueCollectionDate" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">আদায়ের তারিখ *</label>
                            <div class="position-relative w-100">
                                <input type="text" class="form-control invoice-search-input custom-flatpickr-input text-start w-100 ps-3 pe-5" id="clDueCollectionDate" placeholder="DD-MM-YYYY" readonly autocomplete="off" required style="font-size: 14px; font-weight: 500; width: 100% !important;">
                                <span class="position-absolute end-0 top-50 translate-middle-y me-3 text-muted" style="pointer-events: none;">
                                    <i class="fa-regular fa-calendar-days" style="color: #8C56D4;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                            <span class="text-muted small dues-label text-start">কাস্টমার পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-dark dues-val" id="clCustomerPreviousDue">৳ ০.০০</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                            <span class="text-muted small dues-label text-start">ইনভয়েস পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-dark dues-val" id="clOrderPreviousDue">৳ ০.০০</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1.5">
                            <span class="fw-bold text-slate-800 dues-total-label text-start">মোট পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-danger fs-6" id="clTotalPreviousDue" data-raw="0">৳ ০.০০</span>
                        </div>
                    </div>

                    <!-- Discount & Pay Amount -->
                    <div class="row g-2 mb-3 w-100 m-0">
                        <div class="col-6 ps-0 pe-1">
                            <label for="clDiscountAmount" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">ছাড় (Discount)</label>
                            <input type="number" inputmode="decimal" step="any" min="0" id="clDiscountAmount" class="form-control invoice-search-input text-start w-100 ps-3" oninput="clCalculateDuePayment()" placeholder="৳ ০.০০" style="width: 100% !important;">
                        </div>
                        <div class="col-6 ps-1 pe-0">
                            <label for="clPayAmount" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">আদায়কৃত টাকা *</label>
                            <input type="number" inputmode="decimal" step="any" min="0" id="clPayAmount" class="form-control invoice-search-input text-start fw-bold w-100 ps-3" oninput="clCalculateDuePayment()" placeholder="৳ ০.০০" required style="width: 100% !important;">
                        </div>
                    </div>

                    <!-- Calculation Status Box -->
                    <div class="modal-calc-status-box p-3 mb-3 rounded-3 d-flex align-items-center justify-content-between w-100">
                        <div class="text-start">
                            <span class="text-muted small d-block status-label text-start" style="font-size: 11px;">অবশিষ্ট বকেয়া:</span>
                            <span class="fw-bold text-danger fs-6" id="clFinalDueAmount">৳ ০.০০</span>
                        </div>
                        <div class="text-end">
                            <span class="text-muted small d-block status-label" style="font-size: 11px;">পেমেন্ট স্ট্যাটাস:</span>
                            <span class="badge bg-secondary px-2.5 py-1 fw-bold" id="clShowPaymentStatusDisplay" style="font-size: 11px; border-radius: 12px;">Pending</span>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3 w-100">
                        <label class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">পেমেন্ট মাধ্যম *</label>
                        <div class="d-flex flex-wrap gap-2">
                            <label class="cl-payment-chip active" onclick="clSelectPaymentChip('cash')">
                                <input type="radio" name="clPayment" id="clCash" value="cash" checked style="display: none;">
                                <i class="fa-solid fa-money-bill-wave me-1"></i> Cash
                            </label>
                            <label class="cl-payment-chip" onclick="clSelectPaymentChip('bkash')">
                                <input type="radio" name="clPayment" id="clBkash" value="bkash" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> bKash
                            </label>
                            <label class="cl-payment-chip" onclick="clSelectPaymentChip('nagad')">
                                <input type="radio" name="clPayment" id="clNagad" value="nagad" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> Nagad
                            </label>
                            <label class="cl-payment-chip" onclick="clSelectPaymentChip('rocket')">
                                <input type="radio" name="clPayment" id="clRocket" value="rocket" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> Rocket
                            </label>
                            <label class="cl-payment-chip" onclick="clSelectPaymentChip('bank')">
                                <input type="radio" name="clPayment" id="clBank" value="bank" style="display: none;">
                                <i class="fa-solid fa-building-columns me-1"></i> Bank
                            </label>
                            <label class="cl-payment-chip" onclick="clSelectPaymentChip('mastercard')">
                                <input type="radio" name="clPayment" id="clMastercard" value="mastercard" style="display: none;">
                                <i class="fa-solid fa-credit-card me-1"></i> Card
                            </label>
                        </div>
                    </div>

                    <!-- Transaction ID (non-cash) -->
                    <div class="mb-3 w-100" id="clTransactionIdWrapper" style="display: none;">
                        <label for="clTransactionInput" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">ট্রানজেকশন আইডি</label>
                        <input type="text" id="clTransactionInput" class="form-control invoice-search-input text-start w-100 ps-3" placeholder="ট্রানজেকশন আইডি লিখুন..." style="width: 100% !important;">
                    </div>
                </div>

                <!-- Sticky Bottom Action Buttons right above keyboard -->
                <div class="modal-sticky-footer p-3 border-top w-100">
                    <div class="d-flex align-items-center gap-2 w-100">
                        <button type="button" class="btn btn-cancel-red py-2 px-3 fw-bold flex-grow-1" data-bs-dismiss="modal" onclick="clClosePaymentModal()" style="height: 44px; border-radius: 10px; font-size: 14px;">
                            <i class="fa-solid fa-xmark me-1"></i> বাতিল
                        </button>
                        <button type="submit" id="clPaymentSubmitBtn" class="invoice-search-submit-btn flex-grow-1 py-2 px-3 fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px;">
                            <i class="fa-solid fa-check me-1"></i> আদায় নিশ্চিত করুন
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* 0. Card & Border Cleanup */
    .data-table,
    .data-table .card,
    .data-table .card.border-none,
    .data-table .card.border-0,
    .data-table .card-body {
        border: none !important;
        border-width: 0 !important;
        box-shadow: none !important;
        outline: none !important;
    }

    /* Customer Due Payment Modal - Full Bottom Sheet on ALL screens */
    #customerDuePaymentModal.modal {
        padding: 0 !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100% !important;
        height: 100% !important;
        height: 100dvh !important;
        display: none;
        overflow: hidden !important;
        background: rgba(15, 23, 42, 0.75) !important;
        backdrop-filter: blur(8px) !important;
        -webkit-backdrop-filter: blur(8px) !important;
        z-index: 107000 !important;
    }

    #customerDuePaymentModal.modal.show {
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-end !important;
        align-items: center !important;
    }

    #customerDuePaymentModal .modal-dialog {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        position: fixed !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        top: auto !important;
        min-height: auto !important;
        height: auto !important;
        transform: none !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-end !important;
    }

    #customerDuePaymentModal .modal-content {
        border-radius: 0 !important;
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
        width: 100% !important;
        max-width: 100% !important;
        max-height: 90vh !important;
        max-height: 90dvh !important;
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
        margin: 0 !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.35) !important;
        animation: slideUpCustomerDueModal 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    @keyframes slideUpCustomerDueModal {
        from { transform: translateY(100%); }
        to { transform: translateY(0); }
    }

    #customerDuePaymentModal .modal-body {
        flex: 1 1 auto !important;
        max-height: calc(90vh - 130px) !important;
        max-height: calc(90dvh - 130px) !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
        padding: 14px 16px !important;
    }

    #customerDuePaymentModal .modal-sticky-footer {
        flex: 0 0 auto !important;
        position: sticky !important;
        bottom: 0 !important;
        width: 100% !important;
        z-index: 100 !important;
        padding: 10px 16px !important;
        box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05) !important;
    }

    [data-bs-theme="dark"] #customerDuePaymentModal .modal-sticky-footer,
    body[light-mode="dark"] #customerDuePaymentModal .modal-sticky-footer,
    body.dark-mode #customerDuePaymentModal .modal-sticky-footer {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    @media (max-width: 991.98px) {
        .page-content {
            background-color: #ffffff !important;
            padding: 0 !important;
        }
        body[light-mode="dark"] .page-content,
        html[light-mode="dark"] .page-content {
            background-color: #0f172a !important;
        }
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
        font-size: 19px;
        letter-spacing: -0.2px;
        font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;
        border-left: 4px solid #8C56D4 !important;
        padding-left: 10px !important;
        line-height: 1.3 !important;
        display: block !important;
        word-break: break-word;
    }
    #mobileSearchWrap:not(.d-none) {
        margin-bottom: 14px !important;
    }
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
    body.dark-mode .search-live-dropdown {
        background: #1e293b !important;
        border-color: #334155 !important;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4) !important;
    }
    body[light-mode="dark"] .search-live-item,
    body[data-layout-mode="dark"] .search-live-item,
    body.dark-mode .search-live-item {
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] .search-live-item:hover,
    body[data-layout-mode="dark"] .search-live-item:hover,
    body.dark-mode .search-live-item:hover {
        background: #334155 !important;
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

    .invoice-search-submit-btn {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border: none !important;
        height: 42px !important;
        border-radius: 10px !important;
        font-size: 14px !important;
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
        min-width: 175px;
        width: max-content;
        max-width: 220px;
        background: #ffffff;
        border: 1px solid #E5D5F7;
        border-radius: 6px !important;
        box-shadow: 0 16px 48px rgba(0, 0, 0, 0.22), 0 4px 16px rgba(140, 86, 212, 0.18) !important;
        z-index: 1005 !important;
        overflow: hidden;
        padding: 5px;
    }
    .custom-dropdown-menu.end-0,
    #mobileFilterDropdownMenu {
        left: auto !important;
        right: 0 !important;
        z-index: 1005 !important;
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
        border-radius: 4px !important;
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

    /* Mobile Search Bar Close Button */
    .mobile-search-close-btn {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 6px !important;
        background-color: #ef4444 !important;
        border: 1.5px solid #dc2626 !important;
        color: #ffffff !important;
        font-size: 16px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease-in-out;
        outline: none !important;
        box-shadow: 0 2px 6px rgba(239, 68, 68, 0.25) !important;
    }
    .mobile-search-close-btn:hover {
        background-color: #dc2626 !important;
        transform: scale(1.05);
    }

    /* Mobile & Tablet Card Layout */
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
    .invoice-mobile-card {
        border: 1.5px solid #E5D5F7 !important;
        border-radius: 14px !important;
        box-shadow: 0 2px 10px rgba(140, 86, 212, 0.08) !important;
        background-color: #ffffff;
        padding: 14px !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }
    .invoice-mobile-card:hover {
        box-shadow: 0 4px 16px rgba(140, 86, 212, 0.14) !important;
        border-color: #d1b7f3 !important;
    }

    /* Action Buttons in Cards */
    .mobile-card-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 6px;
    }
    .mobile-action-btn {
        flex: 1 1 0;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12.5px;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        border: 1px solid transparent;
        text-decoration: none;
    }
    .mobile-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
    }
    .mobile-action-btn.action-btn-profile {
        background: #F3ECFB;
        color: #8C56D4;
        border-color: #E5D5F7;
    }
    .mobile-action-btn.action-btn-profile:hover {
        background: #8C56D4;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-return {
        background: #FEF9EC;
        color: #D97706;
        border-color: #FDE68A;
    }
    .mobile-action-btn.action-btn-return:hover {
        background: #D97706;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-due {
        background: #E0F7EC;
        color: #16a34a;
        border-color: #86efac;
    }
    .mobile-action-btn.action-btn-due:hover {
        background: #16a34a;
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

    /* Pagination */
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

    /* Payment Chip */
    .cl-payment-chip {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 8px;
        border: 1.5px solid #cbd5e1;
        background: #ffffff;
        color: #475569;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .cl-payment-chip:hover {
        border-color: #8C56D4;
        background: #FAF7FD;
        color: #8C56D4;
    }
    .cl-payment-chip.active {
        border-color: #8C56D4;
        background: #8C56D4;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.25);
    }

    .modal-dues-summary-card {
        background: #FAF7FD;
        border: 1px solid #E5D5F7;
    }
    .modal-calc-status-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }
    .btn-close-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border-radius: 50% !important;
        width: 30px !important;
        height: 30px !important;
        border: none !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
        cursor: pointer !important;
    }
    .btn-cancel-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border: none !important;
    }

    /* Dark Mode Universal Border & Color Harmonization */
    body[light-mode="dark"] .border,
    html[light-mode="dark"] .border,
    body[data-layout-mode="dark"] .border,
    html[data-layout-mode="dark"] .border,
    body.dark-mode .border,
    html.dark-mode .border,
    body.dark .border,
    html.dark .border,
    [data-bs-theme="dark"] .border,
    [data-theme="dark"] .border,
    body[light-mode="dark"] .border-bottom,
    html[light-mode="dark"] .border-bottom,
    body[data-layout-mode="dark"] .border-bottom,
    html[data-layout-mode="dark"] .border-bottom,
    body.dark-mode .border-bottom,
    html.dark-mode .border-bottom,
    body.dark .border-bottom,
    html.dark .border-bottom,
    [data-bs-theme="dark"] .border-bottom,
    [data-theme="dark"] .border-bottom,
    body[light-mode="dark"] .border-top,
    html[light-mode="dark"] .border-top,
    body[data-layout-mode="dark"] .border-top,
    html[data-layout-mode="dark"] .border-top,
    body.dark-mode .border-top,
    html.dark-mode .border-top,
    body.dark .border-top,
    html.dark .border-top,
    [data-bs-theme="dark"] .border-top,
    [data-theme="dark"] .border-top,
    body[light-mode="dark"] .border-start,
    html[light-mode="dark"] .border-start,
    body[data-layout-mode="dark"] .border-start,
    html[data-layout-mode="dark"] .border-start,
    body.dark-mode .border-start,
    html.dark-mode .border-start,
    [data-bs-theme="dark"] .border-start,
    [data-theme="dark"] .border-start,
    body[light-mode="dark"] .border-end,
    html[light-mode="dark"] .border-end,
    body[data-layout-mode="dark"] .border-end,
    html[data-layout-mode="dark"] .border-end,
    body.dark-mode .border-end,
    html.dark-mode .border-end,
    [data-bs-theme="dark"] .border-end,
    [data-theme="dark"] .border-end,
    body[light-mode="dark"] hr,
    body[data-layout-mode="dark"] hr,
    body.dark-mode hr,
    [data-bs-theme="dark"] hr {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .invoice-card-header,
    body[data-layout-mode="dark"] .invoice-card-header,
    body.dark-mode .invoice-card-header,
    [data-bs-theme="dark"] .invoice-card-header { border-color: #334155 !important; }
    body[light-mode="dark"] .invoice-main-heading,
    body[data-layout-mode="dark"] .invoice-main-heading,
    body.dark-mode .invoice-main-heading,
    [data-bs-theme="dark"] .invoice-main-heading { color: #f8fafc !important; }
    body[light-mode="dark"] .invoice-search-input,
    body[light-mode="dark"] .toolbar-control-btn,
    body[data-layout-mode="dark"] .invoice-search-input,
    body[data-layout-mode="dark"] .toolbar-control-btn,
    body.dark-mode .invoice-search-input,
    body.dark-mode .toolbar-control-btn,
    [data-bs-theme="dark"] .invoice-search-input,
    [data-bs-theme="dark"] .toolbar-control-btn {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .mobile-header-icon-btn,
    body[data-layout-mode="dark"] .mobile-header-icon-btn,
    body.dark-mode .mobile-header-icon-btn,
    [data-bs-theme="dark"] .mobile-header-icon-btn {
        background: #1e293b;
        border-color: #334155;
        color: #D2B7F1;
    }
    body[light-mode="dark"] .custom-dropdown-menu,
    body[data-layout-mode="dark"] .custom-dropdown-menu,
    body.dark-mode .custom-dropdown-menu,
    [data-bs-theme="dark"] .custom-dropdown-menu {
        background: #1e293b;
        border-color: #334155;
    }
    body[light-mode="dark"] .custom-dropdown-item,
    body[data-layout-mode="dark"] .custom-dropdown-item,
    body.dark-mode .custom-dropdown-item,
    [data-bs-theme="dark"] .custom-dropdown-item {
        color: #cbd5e1;
    }
    body[light-mode="dark"] .invoice-top-summary-strip,
    body[data-layout-mode="dark"] .invoice-top-summary-strip,
    body.dark-mode .invoice-top-summary-strip,
    [data-bs-theme="dark"] .invoice-top-summary-strip {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .invoice-mobile-card,
    body[data-layout-mode="dark"] .invoice-mobile-card,
    body.dark-mode .invoice-mobile-card,
    [data-bs-theme="dark"] .invoice-mobile-card {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .invoice-mobile-card h6,
    body[light-mode="dark"] .invoice-mobile-card .text-dark,
    body[data-layout-mode="dark"] .invoice-mobile-card h6,
    body[data-layout-mode="dark"] .invoice-mobile-card .text-dark,
    body.dark-mode .invoice-mobile-card h6,
    body.dark-mode .invoice-mobile-card .text-dark,
    [data-bs-theme="dark"] .invoice-mobile-card h6,
    [data-bs-theme="dark"] .invoice-mobile-card .text-dark {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #printTable thead th,
    body[data-layout-mode="dark"] #printTable thead th,
    body.dark-mode #printTable thead th,
    [data-bs-theme="dark"] #printTable thead th {
        background: #0f172a !important;
        color: #cbd5e1 !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #printTable tbody tr td,
    body[data-layout-mode="dark"] #printTable tbody tr td,
    body.dark-mode #printTable tbody tr td,
    [data-bs-theme="dark"] #printTable tbody tr td {
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .modal-content,
    body[data-layout-mode="dark"] .modal-content,
    body.dark-mode .modal-content,
    [data-bs-theme="dark"] .modal-content {
        background-color: #1e293b !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .modal-dues-summary-card,
    body[light-mode="dark"] .modal-calc-status-box,
    body[data-layout-mode="dark"] .modal-dues-summary-card,
    body[data-layout-mode="dark"] .modal-calc-status-box,
    body.dark-mode .modal-dues-summary-card,
    body.dark-mode .modal-calc-status-box,
    [data-bs-theme="dark"] .modal-dues-summary-card,
    [data-bs-theme="dark"] .modal-calc-status-box {
        background: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .modal-sticky-footer,
    body[data-layout-mode="dark"] .modal-sticky-footer,
    body.dark-mode .modal-sticky-footer,
    [data-bs-theme="dark"] .modal-sticky-footer {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .cl-payment-chip,
    body[data-layout-mode="dark"] .cl-payment-chip,
    body.dark-mode .cl-payment-chip,
    [data-bs-theme="dark"] .cl-payment-chip {
        background: #0f172a;
        border-color: #334155;
        color: #cbd5e1;
    }
    body[light-mode="dark"] .badge.bg-light,
    body[data-layout-mode="dark"] .badge.bg-light,
    body.dark-mode .badge.bg-light,
    [data-bs-theme="dark"] .badge.bg-light {
        background: #0f172a !important;
        color: #e2e8f0 !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .mobile-action-btn,
    body[data-layout-mode="dark"] .mobile-action-btn,
    body.dark-mode .mobile-action-btn,
    [data-bs-theme="dark"] .mobile-action-btn {
        border-color: #334155 !important;
    }
</style>

<script>
    let rawCustomerData = [];
    let currentPage = 1;
    let pageSize = 50;
    let currentFilter = 'all';

    $(document).ready(function () {
        getList();
        $("#searchInput, #mobileSearchInput").val("");

        // Flatpickr for Payment Modal
        if (typeof flatpickr !== 'undefined' && $('#clDueCollectionDate').length) {
            flatpickr('#clDueCollectionDate', {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                monthSelectorType: "static"
            });
        }

        $('#customerDuePaymentModal').on('shown.bs.modal', function () {
            const payInput = document.getElementById('clPayAmount');
            if (payInput) {
                payInput.focus();
                payInput.select();
            }
        });
    });

    // Close dropdowns on outside click
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.custom-dropdown-wrap')) {
            $('.custom-dropdown-menu').removeClass('show');
            $('.custom-dropdown-wrap').removeClass('open');
        }
        if (!e.target.closest('#mobileSearchWrap') && !e.target.closest('#mobileSearchToggleBtn') && !e.target.closest('.search-live-dropdown')) {
            $('#mobileSearchDropdown').addClass('d-none').empty();
        }
        if (!e.target.closest('.invoice-search-box-wrap') && !e.target.closest('.search-live-dropdown')) {
            $('#desktopSearchDropdown').addClass('d-none').empty();
        }
    });

    function toggleCustomDropdown(menuId) {
        let menu = $('#' + menuId);
        let wrap = menu.closest('.custom-dropdown-wrap');
        $('.custom-dropdown-menu').not(menu).removeClass('show');
        $('.custom-dropdown-wrap').not(wrap).removeClass('open');
        menu.toggleClass('show');
        wrap.toggleClass('open');
    }

    function toggleMobileSearchBar() {
        let wrap = $('#mobileSearchWrap');
        let btn = $('#mobileSearchToggleBtn');
        wrap.toggleClass('d-none');
        btn.toggleClass('active');
        if (!wrap.hasClass('d-none')) {
            $('#mobileSearchInput').focus();
        }
    }

    function closeMobileSearchBar() {
        $('#mobileSearchWrap').addClass('d-none');
        $('#mobileSearchToggleBtn').removeClass('active');
        $('#mobileSearchInput').val('');
        $('#searchInput').val('');
        $('#mobileSearchDropdown, #desktopSearchDropdown').addClass('d-none').empty();
        currentPage = 1;
        renderPaginatedList();
    }

    function selectEntriesOption(value, labelText) {
        $('#entries').val(value);
        $('#currentEntriesText').text(labelText);
        $('#entriesDropdownMenu .custom-dropdown-item').removeClass('active');
        $(`#entriesDropdownMenu .custom-dropdown-item[data-value="${value}"]`).addClass('active');
        $('#entriesDropdownMenu').removeClass('show');
        $('#entriesDropdownContainer').removeClass('open');
        pageSize = parseInt(value) || 50;
        currentPage = 1;
        renderPaginatedList();
    }

    function selectFilterOption(filterType, labelText, event) {
        if (event) event.preventDefault();
        currentFilter = filterType;
        $('#currentFilterText').text(labelText);
        $('.custom-dropdown-item[data-filter]').removeClass('active');
        $(`.custom-dropdown-item[data-filter="${filterType}"]`).addClass('active');
        $('#filterDropdownMenu, #mobileFilterDropdownMenu').removeClass('show');
        $('#filterDropdownContainer, #mobileFilterDropdownContainer').removeClass('open');
        currentPage = 1;
        renderPaginatedList();
    }

    function handleLiveSearch(term) {
        let cleanTerm = (term || '').toLowerCase().trim();
        renderLiveDropdown('mobileSearchDropdown', cleanTerm);
        renderLiveDropdown('desktopSearchDropdown', cleanTerm);
    }

    $("#searchInput, #mobileSearchInput").on("keyup search input", function () {
        let val = $(this).val();
        if ($(this).attr('id') === 'mobileSearchInput') {
            $("#searchInput").val(val);
        } else {
            $("#mobileSearchInput").val(val);
        }
        handleLiveSearch(val);
        currentPage = 1;
        renderPaginatedList();
    });

    function renderLiveDropdown(containerId, cleanTerm) {
        const dropdown = $('#' + containerId);
        if (!cleanTerm || cleanTerm.length === 0 || !rawCustomerData || rawCustomerData.length === 0) {
            dropdown.addClass('d-none').empty();
            return;
        }

        let matches = rawCustomerData.filter(item => {
            let customerId = (item.customer_id || "").toLowerCase();
            let name = (item.customer_name || "").toLowerCase();
            let mobile = (item.mobile || "").toLowerCase();

            return customerId.includes(cleanTerm) ||
                   name.includes(cleanTerm) ||
                   mobile.includes(cleanTerm);
        }).slice(0, 8);

        if (matches.length === 0) {
            dropdown.html('<div class="p-3 text-center text-muted small"><i class="fa-solid fa-circle-exclamation me-1"></i>কোনো কাস্টমার পাওয়া যায়নি</div>').removeClass('d-none');
            return;
        }

        let html = '';
        matches.forEach(item => {
            const img = item.img_url ? item.img_url : "{{ asset('back-end/assets/img/demo-img.jpeg') }}";
            const due = parseFloat(item.total_due) || 0;
            const dueDisplay = due > 0 ? `<span class="text-danger fw-bold" style="font-size: 11.5px;">৳ ${due.toFixed(2)}</span>` : '<span class="text-muted small" style="font-size: 11px;">পরিশোধিত</span>';
            const mobileText = item.mobile ? `<span class="text-muted small d-block text-truncate" style="font-size: 11px; max-width: 180px;"><i class="fa-solid fa-phone me-1"></i>${item.mobile}</span>` : '';
            const safeName = (item.customer_name || '').replace(/'/g, "\\'");

            html += `
                <div class="search-live-item" onclick="selectSearchDropdownItem('${safeName}')">
                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                        <img src="${img}" class="rounded-circle border flex-shrink-0" style="width: 32px; height: 32px; object-fit: cover;" onerror="this.src='{{ asset('back-end/assets/img/demo-img.jpeg') }}'">
                        <div class="overflow-hidden">
                            <span class="fw-bold text-dark d-block text-truncate" style="font-size: 13px;">${item.customer_name}</span>
                            ${mobileText}
                        </div>
                    </div>
                    <div class="text-end flex-shrink-0 ms-2">
                        <span class="badge bg-light text-dark border mb-1 d-inline-block" style="font-size: 10px;">${item.customer_id}</span>
                        <div>${dueDisplay}</div>
                    </div>
                </div>
            `;
        });

        dropdown.html(html).removeClass('d-none');
    }

    function selectSearchDropdownItem(name) {
        $('#searchInput').val(name);
        $('#mobileSearchInput').val(name);
        $('.search-live-dropdown').addClass('d-none').empty();
        currentPage = 1;
        renderPaginatedList();
    }

    async function getList() {
        try {
            showLoader();
            const res = await axios.get("/api/customer-list", HeaderToken());
            hideLoader();

            if (res.data.status === "success" && Array.isArray(res.data.CustomerData)) {
                rawCustomerData = res.data.CustomerData;
                renderPaginatedList();
            } else {
                console.error("Failed to fetch customers: No data found.");
            }
        } catch (error) {
            hideLoader();
            console.error("Error fetching customer list:", error);
            unauthorized(error.response ? error.response.status : 500);
        }
    }

    function renderPaginatedList() {
        if (!rawCustomerData) return;

        let searchTerm = ($("#searchInput").val() || "").toLowerCase().trim();

        // 1. Filter Customers
        let filtered = rawCustomerData.filter(function (item) {
            let customerId = (item.customer_id || "").toLowerCase();
            let name = (item.customer_name || "").toLowerCase();
            let mobile = (item.mobile || "").toLowerCase();
            let status = (item.status || "Active").toLowerCase();
            let totalDue = parseFloat(item.total_due) || 0;

            let matchesSearch = !searchTerm || customerId.includes(searchTerm) || name.includes(searchTerm) || mobile.includes(searchTerm);

            let matchesFilter = true;
            if (currentFilter === 'Active') {
                matchesFilter = (status === 'active');
            } else if (currentFilter === 'Inactive') {
                matchesFilter = (status !== 'active');
            } else if (currentFilter === 'due') {
                matchesFilter = (totalDue > 0);
            }

            return matchesSearch && matchesFilter;
        });

        // 2. Summary
        let totalDueSum = 0;
        filtered.forEach(item => {
            totalDueSum += (parseFloat(item.total_due) || 0);
        });
        $('#topSummaryTotalCount').text(filtered.length);
        $('#topSummaryTotalAmount').text(`৳ ${totalDueSum.toFixed(2)}`);

        // 3. Pagination Calculations
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
            tableList.html('<tr><td colspan="8" class="text-center text-danger p-4 fw-bold">❌ কোনো কাস্টমার পাওয়া যায়নি।</td></tr>');
            mobileCardList.html('<div class="col-12 p-4 text-center text-danger fw-bold bg-white rounded-3 border shadow-sm">❌ কোনো কাস্টমার পাওয়া যায়নি।</div>');
        } else {
            pageItems.forEach(function (item, idx) {
                let realIndex = startIndex + idx;
                const img_url = item.img_url ? item.img_url : "{{ asset('back-end/assets/img/demo-img.jpeg') }}";
                let totalDue = parseFloat(item.total_due) || 0;

                let statusBadgeClass = (item.status || 'Active') === 'Active' ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-danger-subtle text-danger border border-danger-subtle';

                // Desktop Row
                let row = `
                    <tr data-row="${realIndex + 1}">
                        <td class="text-center fw-bold">${realIndex + 1}</td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <a href="/customer/profile/${item.id}" class="btn btn-sm btn-outline-primary px-2 py-1" style="border-radius: 6px;" title="প্রোফাইল দেখুন">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <button type="button" onclick="openCustomerReturn('${item.id}', '${item.customer_id}', '${item.customer_name}')" class="btn btn-sm px-2 py-1 action-btn-return" style="border-radius: 6px; border: 1.5px solid #FDE68A; background: #FEF9EC; color: #D97706;" title="পণ্য ফেরত">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                                <button type="button" onclick="clOpenPaymentModal(${item.id})" class="btn btn-sm btn-outline-warning px-2 py-1" style="border-radius: 6px;" title="বকেয়া আদায়">
                                    <i class="fa-solid fa-money-bill-wave"></i>
                                </button>
                                <button type="button" onclick="openCustomerUpdateModal(${item.id})" class="edit-link btn btn-sm btn-outline-success px-2 py-1" style="border-radius: 6px;" title="এডিট করুন">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" data-id="${item.id}" class="custom-delete-modal-btn btn btn-sm btn-outline-danger px-2 py-1" style="border-radius: 6px;" data-bs-toggle="modal" data-bs-target="#confirmationModal" title="মুছে ফেলুন">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <a href="/customer/profile/${item.id}" class="fw-bold text-decoration-none" style="color: #8C56D4;">
                                <i class="fa-solid fa-user me-1"></i>${item.customer_id ?? 'N/A'}
                            </a>
                        </td>
                        <td class="text-center">
                            <img style="width: 42px; height: 42px; object-fit: cover;" class="rounded-circle border shadow-sm" alt="${item.customer_name}" src="${img_url}" onerror="this.src='{{ asset('back-end/assets/img/demo-img.jpeg') }}'">
                        </td>
                        <td>
                            <a href="/customer/profile/${item.id}" class="text-dark fw-bold text-decoration-none">${item.customer_name}</a>
                        </td>
                        <td class="fw-medium text-secondary">${item.mobile || '-'}</td>
                        <td class="text-end fw-bold ${totalDue > 0 ? 'text-danger' : 'text-dark'}">৳ ${totalDue.toFixed(2)}</td>
                        <td class="text-center">
                            <span class="badge ${statusBadgeClass} px-2 py-1 fw-bold" style="font-size: 11px; border-radius: 12px;">
                                ${item.status || 'Active'}
                            </span>
                        </td>
                    </tr>`;
                tableList.append(row);

                // Mobile & Tablet Card View (2-column on Tab >=768px, 1-col on Mobile)
                let mobileCard = `
                    <div class="col-12 col-md-6">
                        <a href="/customer/profile/${item.id}" class="text-decoration-none d-block h-100">
                        <div class="invoice-mobile-card d-flex flex-column justify-content-between h-100">
                            <div>
                                <!-- Card Header: ID & Status -->
                                <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                    <div class="d-flex align-items-center gap-1.5">
                                        <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 10px;">#${realIndex + 1}</span>
                                        <span class="badge bg-light text-dark border fw-bold" style="font-size: 11px;">
                                            <i class="fa-solid fa-user me-1" style="color: #8C56D4;"></i>${item.customer_id ?? 'N/A'}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="badge ${statusBadgeClass} px-2 py-1 fw-bold" style="font-size: 10px; border-radius: 12px;">
                                            ${item.status || 'Active'}
                                        </span>
                                    </div>
                                </div>

                                <!-- Card Body: Image+Name on Left | Due Amount on Right -->
                                <div class="d-flex align-items-center justify-content-between gap-2 mb-0">
                                    <div class="d-flex align-items-center gap-2 flex-shrink-1 overflow-hidden">
                                        <img src="${img_url}" class="rounded-circle border shadow-sm flex-shrink-0" style="width: 44px; height: 44px; object-fit: cover;" onerror="this.src='{{ asset('back-end/assets/img/demo-img.jpeg') }}'">
                                        <div class="overflow-hidden">
                                            <h6 class="fw-bold text-dark mb-0 text-truncate" style="font-size: 13.5px;">${item.customer_name}</h6>
                                            <span class="text-muted text-truncate d-block" style="font-size: 11px;">
                                                <i class="fa-solid fa-phone me-1"></i>${item.mobile || 'মোবাইল নেই'}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-end flex-shrink-0 ms-2">
                                        <div style="font-size: 10px; color: #64748b; white-space: nowrap;">বকেয়া পাওনা</div>
                                        <div class="fw-bold ${totalDue > 0 ? 'text-danger' : 'text-dark'}" style="font-size: 13.5px; white-space: nowrap;">৳ ${totalDue.toFixed(2)}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Icon-Only 5 Action Buttons (Profile, Return, Due, Edit, Delete) -->
                            <div class="mobile-card-actions pt-2 mt-2 border-top" onclick="event.stopPropagation(); event.preventDefault();">
                                <a href="/customer/profile/${item.id}" class="mobile-action-btn action-btn-profile flex-grow-1" onclick="event.stopPropagation();" title="প্রোফাইল">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <button type="button" class="mobile-action-btn action-btn-return flex-grow-1" onclick="event.stopPropagation(); openCustomerReturn('${item.id}', '${item.customer_id}', '${item.customer_name}');" title="পণ্য ফেরত">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-due flex-grow-1" onclick="event.stopPropagation(); clOpenPaymentModal(${item.id});" title="বকেয়া আদায়">
                                    <i class="fa-solid fa-money-bill-wave"></i>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-edit edit-link flex-grow-1" onclick="event.stopPropagation(); openCustomerUpdateModal(${item.id});" title="এডিট">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-delete custom-delete-modal-btn flex-grow-1" data-id="${item.id}" data-bs-toggle="modal" data-bs-target="#confirmationModal" title="মুছুন" onclick="event.stopPropagation();">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        </a>
                    </div>`;
                mobileCardList.append(mobileCard);
            });
        }

        // Delete button listener
        $('.custom-delete-modal-btn').off('click').on('click', function(e) {
            e.stopPropagation();
            let id = $(this).data('id');
            $("#deleteID").val(id);
            $("#confirmationModal").modal('show');
        });

        // 4. Update Display Info & Pagination UI
        let fromCount = totalItems > 0 ? startIndex + 1 : 0;
        let toCount = endIndex;
        $("#display-info").html(`মোট <span class="badge bg-purple-subtle text-primary border px-2 py-1 mx-1 fw-bold fs-6" style="color: #8C56D4 !important;">${totalItems}</span> টির মধ্যে <span class="badge bg-light text-dark border px-2 py-1 mx-1 fw-bold fs-6">${fromCount} - ${toCount}</span> টি কাস্টমার প্রদর্শিত হচ্ছে`);

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
            pagContainer.append(`<button type="button" class="custom-pagination-btn ${activeClass}" onclick="goToPage(${p})">${p}</button>`);
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
            পরবর্তী <i class="fa-solid fa-chevron-right ms-1"></i>
        </button>`;
        pagContainer.append(nextBtn);
    }

    function goToPage(page) {
        currentPage = page;
        renderPaginatedList();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function openCustomerCreateModal() {
        if ($('#customerCreateModal').length) {
            $('#customerCreateModal').addClass('show').fadeIn(200);
        } else if ($('#myModal').length) {
            $('#myModal').css('display', 'block');
        }
    }

    function openCustomerUpdateModal(id) {
        if (typeof FillUpCustomerUpdateForm === 'function') {
            FillUpCustomerUpdateForm(id);
            $('#customerUpdateModal').addClass('show').fadeIn(200);
        } else if (typeof FillUpUpdateForm === 'function') {
            FillUpUpdateForm(id);
            $('#exampleModal').modal('show');
        }
    }

    /* ================= CUSTOMER DUE COLLECTION MODAL LOGIC ================= */
    let clCurrentTotalDue = 0;

    async function clOpenPaymentModal(id) {
        try {
            showLoader();
            $('#clUpdateID').val(id);
            $('#clPaymentForm')[0].reset();
            clSelectPaymentChip('cash');

            let res = await axios.post("/api/customer-due-collection-details-by-id", {
                id: id.toString()
            }, HeaderToken());

            hideLoader();

            if (res.data.status === "success") {
                const data = res.data;
                let prevDue = parseFloat(data.previous_due) || 0;
                let orderDue = parseFloat(data.order_due) || 0;
                let totalDue = parseFloat(data.total_due) || (prevDue + orderDue);

                clCurrentTotalDue = totalDue;
                $('#clCustomerPreviousDue').text(`৳ ${prevDue.toFixed(2)}`);
                $('#clOrderPreviousDue').text(`৳ ${orderDue.toFixed(2)}`);
                $('#clTotalPreviousDue').text(`৳ ${totalDue.toFixed(2)}`).data('raw', totalDue);
                $('#clFinalDueAmount').text(`৳ ${totalDue.toFixed(2)}`);
                $('#clShowPaymentStatusDisplay').text('Pending').removeClass('bg-success bg-warning').addClass('bg-secondary');

                $('#customerDuePaymentModal').modal('show');
                setTimeout(function() {
                    const payInput = document.getElementById('clPayAmount');
                    if (payInput) {
                        payInput.focus();
                        payInput.select();
                    }
                }, 150);
            } else {
                errorToast(res.data.message || "কাস্টমার বকেয়া তথ্য পাওয়া যায়নি।");
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            errorToast("বকেয়া তথ্য লোড করতে সমস্যা হয়েছে।");
        }
    }

    function clClosePaymentModal() {
        $('#customerDuePaymentModal').modal('hide');
    }

    function clCalculateDuePayment() {
        let totalDue = parseFloat($('#clTotalPreviousDue').data('raw')) || 0;
        let discount = parseFloat($('#clDiscountAmount').val()) || 0;
        let payAmount = parseFloat($('#clPayAmount').val()) || 0;

        let totalDeduction = discount + payAmount;
        let remainingDue = Math.max(0, totalDue - totalDeduction);

        $('#clFinalDueAmount').text(`৳ ${remainingDue.toFixed(2)}`);

        let statusBadge = $('#clShowPaymentStatusDisplay');
        if (remainingDue === 0 && payAmount > 0) {
            statusBadge.text('Fully Paid').removeClass('bg-secondary bg-warning').addClass('bg-success');
        } else if (payAmount > 0 && remainingDue > 0) {
            statusBadge.text('Partial Paid').removeClass('bg-secondary bg-success').addClass('bg-warning');
        } else {
            statusBadge.text('Pending').removeClass('bg-success bg-warning').addClass('bg-secondary');
        }
    }

    function clSelectPaymentChip(method) {
        $('.cl-payment-chip').removeClass('active');
        $(`input[name="clPayment"][value="${method}"]`).closest('.cl-payment-chip').addClass('active');
        $(`input[name="clPayment"][value="${method}"]`).prop('checked', true);

        if (method === 'cash') {
            $('#clTransactionIdWrapper').slideUp(150);
            $('#clTransactionInput').val('');
        } else {
            $('#clTransactionIdWrapper').slideDown(150);
        }
    }

    async function clSavePaymentInfo(event) {
        event.preventDefault();
        try {
            let updateID = $('#clUpdateID').val();
            let payAmount = parseFloat($('#clPayAmount').val()) || 0;
            let discountAmount = parseFloat($('#clDiscountAmount').val()) || 0;
            let prevDue = parseFloat($('#clTotalPreviousDue').data('raw')) || 0;
            let dueAmount = Math.max(0, prevDue - (payAmount + discountAmount));
            let collectionDate = $('#clDueCollectionDate').val();
            let paymentStatus = $('#clShowPaymentStatusDisplay').text();
            let paymentMethod = $('input[name="clPayment"]:checked').val() || 'cash';
            let transactionId = $('#clTransactionInput').val();

            if (!payAmount && !discountAmount) {
                errorToast("অনুগ্রহ করে পরিশোধের পরিমাণ অথবা ছাড় লিখুন।");
                return;
            }

            let formData = new FormData();
            formData.append('id', updateID);
            formData.append('paid_amount', payAmount);
            formData.append('discount_amount', discountAmount);
            formData.append('due_amount', dueAmount);
            formData.append('previous_due_amount', prevDue);
            formData.append('due_collection_date', collectionDate);
            formData.append('payment_status', paymentStatus);
            formData.append('transaction_id', transactionId);
            formData.append('payment_method', paymentMethod);

            showLoader();
            let res = await axios.post("/api/customer-payment-details-update", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            });
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message || "বকেয়া সফলভাবে সংগ্রহ করা হয়েছে।");
                clClosePaymentModal();
                getList();
            } else {
                errorToast(res.data.message || "বকেয়া আপডেট ব্যর্থ হয়েছে।");
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            errorToast("বকেয়া সংগ্রহ সংরক্ষণ করতে সমস্যা হয়েছে।");
        }
    }

    // Open Sale Return Page for Customer
    async function openCustomerReturn(id, customerId, name) {
        showLoader();
        try {
            try { sessionStorage.setItem('return_back_url', window.location.href); } catch (e) {}
            let res = await axios.get(`/api/search-invoice-for-return?customer_id=${encodeURIComponent(id)}&order_no=${encodeURIComponent(customerId || name || '')}`, HeaderToken());
            hideLoader();
            if (res.data.status === 'success' && res.data.order && res.data.order.id) {
                window.location.href = `/return/${res.data.order.id}`;
            } else {
                errorToast(res.data.message || "এই কাস্টমারের কোনো বিক্রয় ইনভয়েস পাওয়া যায়নি।");
            }
        } catch (e) {
            hideLoader();
            errorToast("এই কাস্টমারের কোনো বিক্রয় ইনভয়েস পাওয়া যায়নি।");
        }
    }
</script>
