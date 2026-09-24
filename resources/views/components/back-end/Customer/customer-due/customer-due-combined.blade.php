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
                    <!-- 1. Header: Left Title, Right Tab Switcher + Search & Filter on Mobile -->
                    <div class="invoice-card-header mb-3 pb-2 border-bottom d-flex align-items-start justify-content-between gap-2">
                        <div class="d-flex align-items-center gap-3 flex-grow-1" style="min-width: 0;">
                            <div class="invoice-title-icon-box rounded-3 d-none d-lg-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="fa-solid fa-file-invoice-dollar fs-5"></i>
                            </div>
                            <h4 class="invoice-main-heading m-0 p-0 fw-bold" style="word-break: break-word; min-width: 0;">কাস্টমার বকেয়া ও কালেকশন</h4>
                        </div>

                        <!-- Mobile Action Buttons (Search & Filter) -->
                        <div class="d-flex align-items-center gap-2 d-lg-none flex-shrink-0" style="padding-top: 4px;">
                            <button type="button" id="mobileSearchToggleBtn" class="mobile-header-icon-btn" onclick="toggleMobileSearchBar()" title="অনুসন্ধান">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>

                            <div class="custom-dropdown-wrap position-relative" id="mobileFilterDropdownContainer">
                                <button type="button" class="mobile-header-icon-btn" id="mobileFilterDropdownToggle" onclick="toggleCustomDropdown('mobileFilterDropdownMenu')" title="ফিল্টার">
                                    <i class="fa-solid fa-filter"></i>
                                </button>
                                <div class="custom-dropdown-menu dropdown-menus end-0 shadow-lg" id="mobileFilterDropdownMenu" style="min-width: 175px;">
                                    <a href="#" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterOption('all', 'সব তালিকা', event)">সব তালিকা</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="hasDue" onclick="selectFilterOption('hasDue', 'বকেয়া রয়েছে', event)">বকেয়া রয়েছে</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="Active" onclick="selectFilterOption('Active', 'সক্রিয় (Active)', event)">সক্রিয় (Active)</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Switcher Navigation Strip -->
                    <div class="supplier-tab-nav-wrap mb-3 p-1.5 bg-light dark:bg-slate-900 rounded-3 d-flex align-items-center gap-2" style="background: #FAF7FD; border: 1.5px solid #E5D5F7;">
                        <button type="button" id="tabDueListBtn" class="supplier-tab-btn flex-grow-1 active" onclick="switchCustomerTab('dueList')">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                            <span class="d-none d-sm-inline" style="margin-left: 8px;">কাস্টমার বকেয়া তালিকা</span>
                            <span class="badge px-2 py-0.5" id="dueListCountBadge" style="background: rgba(140, 86, 212, 0.15); color: #8C56D4; font-size: 11px; margin-left: 6px;">০</span>
                        </button>
                        <button type="button" id="tabCollectionListBtn" class="supplier-tab-btn flex-grow-1" onclick="switchCustomerTab('collectionList')">
                            <i class="fa-solid fa-receipt"></i>
                            <span class="d-none d-sm-inline" style="margin-left: 8px;">বকেয়া পরিশোধ / কালেকশন তালিকা</span>
                            <span class="badge px-2 py-0.5" id="collectionListCountBadge" style="background: rgba(140, 86, 212, 0.15); color: #8C56D4; font-size: 11px; margin-left: 6px;">০</span>
                        </button>
                    </div>

                    <!-- Mobile Expandable Search Bar -->
                    <div id="mobileSearchWrap" class="mb-3 d-none position-relative">
                        <div class="d-flex align-items-center gap-2 mb-0">
                            <div class="position-relative flex-grow-1 mb-0">
                                <input type="text" id="mobileSearchInput" class="form-control invoice-search-input mb-0" placeholder="অনুসন্ধান করুন..." autocomplete="off" />
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
                                <input type="text" id="searchInput" class="form-control invoice-search-input" placeholder="অনুসন্ধান করুন (নাম, মোবাইল, আইডি)..." autocomplete="off" />
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
                                            <span id="currentFilterText" class="fw-bold fs-7 fs-sm-6 text-truncate">সব তালিকা</span>
                                        </div>
                                        <i class="fa-solid fa-chevron-down dropdown-arrow-icon ms-1"></i>
                                    </button>
                                    <div class="custom-dropdown-menu dropdown-menus end-0" id="filterDropdownMenu">
                                        <a href="#" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterOption('all', 'সব তালিকা', event)">সব তালিকা</a>
                                        <a href="#" class="custom-dropdown-item" data-filter="hasDue" onclick="selectFilterOption('hasDue', 'বকেয়া রয়েছে', event)">বকেয়া রয়েছে</a>
                                        <a href="#" class="custom-dropdown-item" data-filter="Active" onclick="selectFilterOption('Active', 'সক্রিয় (Active)', event)">সক্রিয় (Active)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Summary Stats Strip (1 Row, 2 Columns, Vertical Divider, Purple Color) -->
                    <div class="invoice-top-summary-strip mb-3 p-2.5 px-3 bg-white dark:bg-slate-800" style="border-radius: 6px !important; border: none !important; box-shadow: 0 4px 18px rgba(140, 86, 212, 0.08), 0 1px 3px rgba(0, 0, 0, 0.04) !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Left: মোট সংখ্যা -->
                            <div class="d-flex flex-column text-start ps-1 flex-grow-1">
                                <span class="text-muted small fw-medium" id="topSummaryLabelLeft" style="font-size: 12px;">মোট বকেয়া কাস্টমার</span>
                                <span class="fw-bold" id="topSummaryTotalCount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">০</span>
                            </div>

                            <!-- Middle Vertical Divider Bar -->
                            <div class="summary-divider-bar" style="width: 1.5px; height: 32px; background-color: #E5D5F7; flex-shrink: 0; margin: 0 16px;"></div>

                            <!-- Right: মোট পরিমাণ -->
                            <div class="d-flex flex-column text-end pe-1 flex-grow-1">
                                <span class="text-muted small fw-medium" id="topSummaryLabelRight" style="font-size: 12px;">মোট বকেয়া পাওনা</span>
                                <span class="fw-bold" id="topSummaryTotalAmount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">৳ ০.০০</span>
                            </div>
                        </div>
                    </div>

                    <!-- ================= TAB 1: CUSTOMER DUE LIST ================= -->
                    <div id="tabContentDueList" class="supplier-tab-pane">
                        <!-- Desktop Table View (>= 992px) -->
                        <div class="table-responsive d-none d-lg-block">
                            <table id="dueTable" class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 55px;">ক্রমিক</th>
                                        <th class="text-center" style="width: 100px;">অ্যাকশন</th>
                                        <th class="text-start" style="width: 130px;">কাস্টমার আইডি</th>
                                        <th class="text-center" style="width: 65px;">ছবি</th>
                                        <th class="text-start">নাম</th>
                                        <th class="text-start">মোবাইল নম্বর</th>
                                        <th class="text-end" style="width: 130px;">পূর্বের বকেয়া</th>
                                        <th class="text-end" style="width: 130px;">ইনভয়েস বকেয়া</th>
                                        <th class="text-end" style="width: 130px;">মোট বকেয়া</th>
                                        <th class="text-center" style="width: 95px;">স্ট্যাটাস</th>
                                    </tr>
                                </thead>
                                <tbody id="dueTableList"></tbody>
                            </table>
                        </div>

                        <!-- Mobile & Tablet Card List View (< 992px) -->
                        <div id="dueMobileCardList" class="d-flex flex-wrap d-lg-none mb-3 align-items-start" style="gap: 8px !important;"></div>
                    </div>

                    <!-- ================= TAB 2: DUE COLLECTION LIST ================= -->
                    <div id="tabContentCollectionList" class="supplier-tab-pane d-none">
                        <!-- Desktop Table View (>= 992px) -->
                        <div class="table-responsive d-none d-lg-block">
                            <table id="collectionTable" class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 55px;">ক্রমিক</th>
                                        <th class="text-start" style="width: 110px;">তারিখ</th>
                                        <th class="text-start" style="width: 130px;">কাস্টমার আইডি</th>
                                        <th class="text-start">কাস্টমার নাম</th>
                                        <th class="text-end" style="width: 130px;">পূর্বের বকেয়া</th>
                                        <th class="text-end" style="width: 130px;">আদায়কৃত অর্থ</th>
                                        <th class="text-end" style="width: 130px;">বর্তমান বকেয়া</th>
                                        <th class="text-center" style="width: 110px;">স্ট্যাটাস</th>
                                    </tr>
                                </thead>
                                <tbody id="collectionTableList"></tbody>
                            </table>
                        </div>

                        <!-- Mobile & Tablet Card List View (< 992px) -->
                        <div id="collectionMobileCardList" class="d-flex flex-wrap d-lg-none mb-3 align-items-start" style="gap: 8px !important;"></div>
                    </div>

                    <!-- Smart Pagination & Display Info Footer -->
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between pt-3 mt-3 border-top gap-2">
                        <div class="text-muted small fw-medium" id="display-info" style="font-size: 13px;">
                            মোট ০ টির মধ্যে ০ - ০ টি তথ্য প্রদর্শিত হচ্ছে
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
    </div>
</div>
<!-- Hero Main Content End -->

<!-- ================= MODERN PAYMENT COLLECTION MODAL ================= -->
<div class="modal fade" id="editModal" aria-labelledby="editModalLabel" aria-hidden="true" style="z-index: 107000;">
    <div class="modal-dialog" style="width: 100%;">
        <div class="modal-content w-100 border-0 rounded-4 shadow-lg overflow-hidden p-0">
            <!-- Modal Header -->
            <div class="modal-header-purple p-3 px-4 d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; color: #ffffff !important;">
                <div class="d-flex align-items-center gap-2 text-start flex-grow-1" style="min-width: 0; text-align: left !important;">
                    <i class="fa-solid fa-hand-holding-dollar fs-5 flex-shrink-0"></i>
                    <h5 class="modal-title fw-bold m-0 text-white text-start" id="editModalLabel" style="font-size: 16px; text-align: left !important; line-height: 1.3;">কাস্টমার বকেয়া আদায় (Due Collection)</h5>
                </div>
                <button type="button" class="btn-close-red flex-shrink-0 ms-2" data-bs-dismiss="modal" aria-label="Close" onclick="closePaymentModal()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Modal Form with Scrollable Body and Sticky Bottom Action Buttons -->
            <form id="paymentForm" onsubmit="SavePaymentInfo(event)" class="d-flex flex-column w-100 flex-grow-1 overflow-hidden m-0 p-0">
                <input type="hidden" id="updateID">

                <div class="modal-body p-3 p-md-4 flex-grow-1 overflow-y-auto">
                    <!-- Date & Dues Summary Card -->
                    <div class="modal-dues-summary-card p-3 mb-3 rounded-3 w-100">
                        <div class="mb-2.5">
                            <label for="DueCollectionDate" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">আদায়ের তারিখ *</label>
                            <div class="position-relative w-100">
                                <input type="text" class="form-control invoice-search-input custom-flatpickr-input text-start w-100 ps-3 pe-5" id="DueCollectionDate" placeholder="DD-MM-YYYY" readonly autocomplete="off" required style="font-size: 14px; font-weight: 500; width: 100% !important;">
                                <span class="position-absolute end-0 top-50 translate-middle-y me-3 text-muted" style="pointer-events: none;">
                                    <i class="fa-regular fa-calendar-days" style="color: #8C56D4;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                            <span class="text-muted small dues-label text-start">কাস্টমার পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-dark dues-val" id="CustomerPreviousDue">৳ ০.০০</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                            <span class="text-muted small dues-label text-start">ইনভয়েস পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-dark dues-val" id="OrderPreviousDue">৳ ০.০০</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1.5">
                            <span class="fw-bold text-slate-800 dues-total-label text-start">মোট পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-danger fs-6" id="TotalPreviousDue" data-raw="0">৳ ০.০০</span>
                        </div>
                    </div>

                    <!-- Discount & Pay Amount Inputs -->
                    <div class="row g-2 mb-3 w-100 m-0">
                        <div class="col-6 ps-0 pe-1">
                            <label for="DiscountAmount" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">ছাড় (Discount)</label>
                            <input type="number" inputmode="decimal" step="any" min="0" id="DiscountAmount" class="form-control invoice-search-input text-start w-100 ps-3" oninput="calculateDuePayment()" placeholder="৳ ০.০০" style="width: 100% !important;">
                        </div>
                        <div class="col-6 ps-1 pe-0">
                            <label for="PayAmount" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">আদায়কৃত টাকা *</label>
                            <input type="number" inputmode="decimal" step="any" min="0" id="PayAmount" class="form-control invoice-search-input text-start fw-bold w-100 ps-3" oninput="calculateDuePayment()" placeholder="৳ ০.০০" required style="width: 100% !important;">
                        </div>
                    </div>

                    <!-- Calculation Status Box -->
                    <div class="modal-calc-status-box p-2.5 px-3 mb-3 rounded-3 d-flex align-items-center justify-content-between w-100">
                        <div class="text-start">
                            <span class="text-muted small d-block status-label text-start" style="font-size: 11px;">অবশিষ্ট বকেয়া:</span>
                            <span class="fw-bold text-danger fs-6" id="FinalDueAmount">৳ ০.০০</span>
                        </div>
                        <div class="text-end">
                            <span class="text-muted small d-block status-label" style="font-size: 11px;">পেমেন্ট স্ট্যাটাস:</span>
                            <span class="badge bg-secondary px-2.5 py-1 fw-bold" id="ShowpaymentStatusDisplay" style="font-size: 11px; border-radius: 12px;">Pending</span>
                        </div>
                    </div>

                    <!-- Payment Method Select -->
                    <div class="mb-3 w-100">
                        <label class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">পেমেন্ট মাধ্যম *</label>
                        <div class="payment-method-grid d-flex flex-wrap gap-2">
                            <label class="payment-chip-btn active" onclick="selectPaymentChip('cash')">
                                <input type="radio" name="payment" id="cash" value="cash" checked style="display: none;">
                                <i class="fa-solid fa-money-bill-wave me-1"></i> Cash
                            </label>
                            <label class="payment-chip-btn" onclick="selectPaymentChip('bkash')">
                                <input type="radio" name="payment" id="bkash" value="bkash" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> bKash
                            </label>
                            <label class="payment-chip-btn" onclick="selectPaymentChip('nagad')">
                                <input type="radio" name="payment" id="nagad" value="nagad" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> Nagad
                            </label>
                            <label class="payment-chip-btn" onclick="selectPaymentChip('rocket')">
                                <input type="radio" name="payment" id="rocket" value="rocket" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> Rocket
                            </label>
                            <label class="payment-chip-btn" onclick="selectPaymentChip('bank')">
                                <input type="radio" name="payment" id="bank" value="bank" style="display: none;">
                                <i class="fa-solid fa-building-columns me-1"></i> Bank
                            </label>
                            <label class="payment-chip-btn" onclick="selectPaymentChip('mastercard')">
                                <input type="radio" name="payment" id="mastercard" value="mastercard" style="display: none;">
                                <i class="fa-solid fa-credit-card me-1"></i> Card
                            </label>
                        </div>
                    </div>

                    <!-- Transaction ID Field (Shown for non-cash) -->
                    <div class="mb-3 w-100" id="transactionIdWrapper" style="display: none;">
                        <label for="transactionInput" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">ট্রানজেকশন আইডি</label>
                        <input type="text" id="transactionInput" class="form-control invoice-search-input text-start w-100 ps-3" placeholder="ট্রানজেকশন আইডি লিখুন..." style="width: 100% !important;">
                    </div>
                </div>

                <!-- Sticky Bottom Action Buttons right above keyboard -->
                <div class="modal-sticky-footer p-3 border-top w-100">
                    <div class="d-flex align-items-center gap-2 w-100">
                        <button type="button" class="btn btn-cancel-red py-2 px-3 fw-bold flex-grow-1" data-bs-dismiss="modal" onclick="closePaymentModal()" style="height: 44px; border-radius: 10px; font-size: 14px;">
                            <i class="fa-solid fa-xmark me-1"></i> বাতিল
                        </button>
                        <button type="submit" id="paymentSubmitBtn" class="invoice-search-submit-btn flex-grow-1 py-2 px-3 fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px;">
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
    #editModal.modal {
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

    #editModal.modal.show {
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-end !important;
        align-items: center !important;
    }

    #editModal .modal-dialog {
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

    #editModal .modal-content {
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
        animation: slideUpCustomerDueCombinedModal 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    @keyframes slideUpCustomerDueCombinedModal {
        from { transform: translateY(100%); }
        to { transform: translateY(0); }
    }

    #editModal .modal-body {
        flex: 1 1 auto !important;
        max-height: calc(90vh - 130px) !important;
        max-height: calc(90dvh - 130px) !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
        padding: 14px 16px !important;
    }

    #editModal .modal-sticky-footer {
        flex: 0 0 auto !important;
        position: sticky !important;
        bottom: 0 !important;
        width: 100% !important;
        z-index: 100 !important;
        padding: 10px 16px !important;
        box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05) !important;
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

    /* 1. Header & Title */
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
        line-height: 1.3 !important;
        display: flex;
        align-items: center;
        word-break: break-word;
        flex-wrap: wrap;
    }

    /* Tab Switcher Styling */
    .supplier-tab-btn {
        border: none;
        background: transparent;
        color: #64748b;
        font-weight: 700;
        font-size: 13.5px;
        padding: 9px 16px;
        border-radius: 8px;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .supplier-tab-btn:hover {
        color: #8C56D4;
        background: rgba(140, 86, 212, 0.08);
    }
    .supplier-tab-btn.active {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.3) !important;
    }
    .supplier-tab-btn.active .badge {
        background: rgba(255, 255, 255, 0.25) !important;
        color: #ffffff !important;
    }

    /* Standardized Form Inputs */
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
    #dueMobileCardList,
    #collectionMobileCardList {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 8px !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
        align-items: flex-start !important;
    }
    #dueMobileCardList > .col-12,
    #collectionMobileCardList > .col-12 {
        width: 100% !important;
        max-width: 100% !important;
        flex: 0 0 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    @media (min-width: 768px) and (max-width: 991.98px) {
        #dueMobileCardList > .col-md-6,
        #collectionMobileCardList > .col-md-6 {
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

    /* Financial Summary Strip in Cards */
    .invoice-summary-strip {
        background: #FAF7FD !important;
        border: 1px solid #E5D5F7 !important;
    }

    /* Action Buttons */
    .mobile-action-btn.action-btn-pay {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border: none !important;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.25) !important;
        height: 38px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .mobile-action-btn.action-btn-pay:hover {
        background: linear-gradient(135deg, #793FC5 0%, #672EB0 100%) !important;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.35) !important;
        transform: translateY(-1px);
    }

    /* Modern Payment Modal Chips */
    .payment-chip-btn {
        padding: 7px 14px;
        border-radius: 10px;
        border: 1.5px solid #cbd5e1;
        background: #ffffff;
        color: #334155;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        user-select: none;
    }
    .payment-chip-btn:hover {
        border-color: #8C56D4;
        background: #FAF7FD;
        color: #8C56D4;
    }
    .payment-chip-btn.active {
        background: #8C56D4 !important;
        color: #ffffff !important;
        border-color: #8C56D4 !important;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.28) !important;
    }
    .modal-dues-summary-card {
        background: #FAF7FD;
        border: 1.5px solid #E5D5F7;
    }
    .modal-calc-status-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }
    .btn-close-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border-radius: 50% !important;
        width: 32px !important;
        height: 32px !important;
        border: none !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 15px !important;
        cursor: pointer !important;
    }
    .btn-cancel-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border: 1px solid #dc2626 !important;
        border-radius: 10px !important;
        font-weight: 700 !important;
    }
    .btn-cancel-red:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
    }

    /* Search Live Dropdown */
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

    /* Dark Mode Universal Border & Color Harmonization */
    body[light-mode="dark"] .search-live-dropdown,
    body[data-layout-mode="dark"] .search-live-dropdown,
    body.dark-mode .search-live-dropdown,
    [data-bs-theme="dark"] .search-live-dropdown {
        background: #1e293b !important;
        border-color: #334155 !important;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4) !important;
    }
    body[light-mode="dark"] .search-live-item,
    body[data-layout-mode="dark"] .search-live-item,
    body.dark-mode .search-live-item,
    [data-bs-theme="dark"] .search-live-item {
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] .search-live-item:hover,
    body[data-layout-mode="dark"] .search-live-item:hover,
    body.dark-mode .search-live-item:hover,
    [data-bs-theme="dark"] .search-live-item:hover {
        background: #334155 !important;
    }
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
    body[light-mode="dark"] .invoice-card-header,
    body[data-layout-mode="dark"] .invoice-card-header,
    body.dark-mode .invoice-card-header,
    [data-bs-theme="dark"] .invoice-card-header { border-color: #334155; }
    body[light-mode="dark"] .invoice-main-heading,
    body[data-layout-mode="dark"] .invoice-main-heading,
    body.dark-mode .invoice-main-heading,
    [data-bs-theme="dark"] .invoice-main-heading { color: #f8fafc !important; }
    body[light-mode="dark"] .supplier-tab-nav-wrap,
    body[data-layout-mode="dark"] .supplier-tab-nav-wrap,
    body.dark-mode .supplier-tab-nav-wrap,
    [data-bs-theme="dark"] .supplier-tab-nav-wrap {
        background: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .supplier-tab-btn,
    body[data-layout-mode="dark"] .supplier-tab-btn,
    body.dark-mode .supplier-tab-btn,
    [data-bs-theme="dark"] .supplier-tab-btn {
        color: #94a3b8;
    }
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
    /* Table Dark Mode Border Harmonization - Never White */
    body[light-mode="dark"] table,
    body[data-layout-mode="dark"] table,
    body.dark-mode table,
    html[light-mode="dark"] table,
    [data-bs-theme="dark"] table,
    body[light-mode="dark"] .table,
    body[data-layout-mode="dark"] .table,
    body.dark-mode .table,
    html[light-mode="dark"] .table,
    [data-bs-theme="dark"] .table,
    body[light-mode="dark"] .table-bordered,
    body[data-layout-mode="dark"] .table-bordered,
    body.dark-mode .table-bordered,
    html[light-mode="dark"] .table-bordered,
    [data-bs-theme="dark"] .table-bordered {
        --bs-table-bg: transparent !important;
        --bs-table-color: #f1f5f9 !important;
        --bs-table-border-color: #334155 !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] table > :not(caption) > * > *,
    body[data-layout-mode="dark"] table > :not(caption) > * > *,
    body.dark-mode table > :not(caption) > * > *,
    html[light-mode="dark"] table > :not(caption) > * > *,
    [data-bs-theme="dark"] table > :not(caption) > * > *,
    body[light-mode="dark"] table th,
    body[light-mode="dark"] table td,
    body[data-layout-mode="dark"] table th,
    body[data-layout-mode="dark"] table td,
    body.dark-mode table th,
    body.dark-mode table td,
    html[light-mode="dark"] table th,
    html[light-mode="dark"] table td,
    [data-bs-theme="dark"] table th,
    [data-bs-theme="dark"] table td {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #dueTable thead th,
    body[light-mode="dark"] #collectionTable thead th,
    body[data-layout-mode="dark"] #dueTable thead th,
    body[data-layout-mode="dark"] #collectionTable thead th,
    body.dark-mode #dueTable thead th,
    body.dark-mode #collectionTable thead th,
    [data-bs-theme="dark"] #dueTable thead th,
    [data-bs-theme="dark"] #collectionTable thead th {
        background: #0f172a !important;
        color: #cbd5e1 !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #dueTable tbody tr td,
    body[light-mode="dark"] #collectionTable tbody tr td,
    body[data-layout-mode="dark"] #dueTable tbody tr td,
    body[data-layout-mode="dark"] #collectionTable tbody tr td,
    body.dark-mode #dueTable tbody tr td,
    body.dark-mode #collectionTable tbody tr td,
    [data-bs-theme="dark"] #dueTable tbody tr td,
    [data-bs-theme="dark"] #collectionTable tbody tr td {
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .border,
    html[light-mode="dark"] .border,
    body[data-layout-mode="dark"] .border,
    html[data-layout-mode="dark"] .border,
    body.dark-mode .border,
    html.dark-mode .border,
    [data-bs-theme="dark"] .border,
    body[light-mode="dark"] .border-bottom,
    html[light-mode="dark"] .border-bottom,
    body[data-layout-mode="dark"] .border-bottom,
    html[data-layout-mode="dark"] .border-bottom,
    body.dark-mode .border-bottom,
    html.dark-mode .border-bottom,
    [data-bs-theme="dark"] .border-bottom,
    body[light-mode="dark"] .border-top,
    html[light-mode="dark"] .border-top,
    body[data-layout-mode="dark"] .border-top,
    html[data-layout-mode="dark"] .border-top,
    body.dark-mode .border-top,
    html.dark-mode .border-top,
    [data-bs-theme="dark"] .border-top,
    body[light-mode="dark"] hr,
    body[data-layout-mode="dark"] hr,
    body.dark-mode hr,
    [data-bs-theme="dark"] hr {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .modal-content,
    body[data-layout-mode="dark"] .modal-content,
    body.dark-mode .modal-content,
    [data-bs-theme="dark"] .modal-content,
    body[light-mode="dark"] .modal-body,
    body[data-layout-mode="dark"] .modal-body,
    body.dark-mode .modal-body,
    [data-bs-theme="dark"] .modal-body,
    body[light-mode="dark"] #editModal .modal-content,
    body[data-layout-mode="dark"] #editModal .modal-content,
    body.dark-mode #editModal .modal-content,
    [data-bs-theme="dark"] #editModal .modal-content,
    body[light-mode="dark"] #editModal .modal-body,
    body[data-layout-mode="dark"] #editModal .modal-body,
    body.dark-mode #editModal .modal-body,
    [data-bs-theme="dark"] #editModal .modal-body,
    body[light-mode="dark"] #editModal .modal-sticky-footer,
    body[data-layout-mode="dark"] #editModal .modal-sticky-footer,
    body.dark-mode #editModal .modal-sticky-footer,
    [data-bs-theme="dark"] #editModal .modal-sticky-footer {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .modal-dues-summary-card,
    body[light-mode="dark"] .modal-calc-status-box,
    body[data-layout-mode="dark"] .modal-dues-summary-card,
    body[data-layout-mode="dark"] .modal-calc-status-box,
    body.dark-mode .modal-dues-summary-card,
    body.dark-mode .modal-calc-status-box,
    [data-bs-theme="dark"] .modal-dues-summary-card,
    [data-bs-theme="dark"] .modal-calc-status-box,
    body[light-mode="dark"] #editModal .modal-dues-summary-card,
    body[data-layout-mode="dark"] #editModal .modal-dues-summary-card,
    body.dark-mode #editModal .modal-dues-summary-card,
    [data-bs-theme="dark"] #editModal .modal-dues-summary-card,
    body[light-mode="dark"] #editModal .modal-calc-status-box,
    body[data-layout-mode="dark"] #editModal .modal-calc-status-box,
    body.dark-mode #editModal .modal-calc-status-box,
    [data-bs-theme="dark"] #editModal .modal-calc-status-box {
        background: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #editModal .dues-val,
    body[data-layout-mode="dark"] #editModal .dues-val,
    body.dark-mode #editModal .dues-val,
    [data-bs-theme="dark"] #editModal .dues-val,
    body[light-mode="dark"] #editModal .dues-total-label,
    body[data-layout-mode="dark"] #editModal .dues-total-label,
    body.dark-mode #editModal .dues-total-label,
    [data-bs-theme="dark"] #editModal .dues-total-label,
    body[light-mode="dark"] #editModal .form-label,
    body[data-layout-mode="dark"] #editModal .form-label,
    body.dark-mode #editModal .form-label,
    [data-bs-theme="dark"] #editModal .form-label {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #editModal .invoice-search-input,
    body[data-layout-mode="dark"] #editModal .invoice-search-input,
    body.dark-mode #editModal .invoice-search-input,
    [data-bs-theme="dark"] #editModal .invoice-search-input {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .payment-chip-btn,
    body[data-layout-mode="dark"] .payment-chip-btn,
    body.dark-mode .payment-chip-btn,
    [data-bs-theme="dark"] .payment-chip-btn,
    body[light-mode="dark"] #editModal .cl-payment-chip,
    body[data-layout-mode="dark"] #editModal .cl-payment-chip,
    body.dark-mode #editModal .cl-payment-chip,
    [data-bs-theme="dark"] #editModal .cl-payment-chip,
    body[light-mode="dark"] #editModal .payment-chip-btn,
    body[data-layout-mode="dark"] #editModal .payment-chip-btn,
    body.dark-mode #editModal .payment-chip-btn,
    [data-bs-theme="dark"] #editModal .payment-chip-btn {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .payment-chip-btn.active,
    body[data-layout-mode="dark"] .payment-chip-btn.active,
    body.dark-mode .payment-chip-btn.active,
    [data-bs-theme="dark"] .payment-chip-btn.active,
    body[light-mode="dark"] #editModal .cl-payment-chip.active,
    body[data-layout-mode="dark"] #editModal .cl-payment-chip.active,
    body.dark-mode #editModal .cl-payment-chip.active,
    [data-bs-theme="dark"] #editModal .cl-payment-chip.active,
    body[light-mode="dark"] #editModal .payment-chip-btn.active,
    body[data-layout-mode="dark"] #editModal .payment-chip-btn.active,
    body.dark-mode #editModal .payment-chip-btn.active,
    [data-bs-theme="dark"] #editModal .payment-chip-btn.active {
        background: #8C56D4 !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .invoice-summary-strip,
    body[data-layout-mode="dark"] .invoice-summary-strip,
    body.dark-mode .invoice-summary-strip,
    [data-bs-theme="dark"] .invoice-summary-strip {
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
    let rawDueData = [];
    let rawCollectionData = [];
    let activeTab = 'dueList'; // 'dueList' or 'collectionList'
    let currentPage = 1;
    let pageSize = 50;
    let currentFilter = 'all';

    $(document).ready(function () {
        fetchBothLists();
        $("#searchInput, #mobileSearchInput").val("");

        // Initialize flatpickr for payment modal
        if (typeof flatpickr !== 'undefined' && $('#DueCollectionDate').length) {
            flatpickr('#DueCollectionDate', {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                monthSelectorType: "static"
            });
        }

        $('#editModal').on('shown.bs.modal', function () {
            const payInput = document.getElementById('PayAmount');
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
        renderCurrentActiveTab();
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
        renderCurrentActiveTab();
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
        renderCurrentActiveTab();
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
        renderCurrentActiveTab();
    });

    function renderLiveDropdown(containerId, cleanTerm) {
        const dropdown = $('#' + containerId);
        if (!cleanTerm || cleanTerm.length === 0) {
            dropdown.addClass('d-none').empty();
            return;
        }

        if (activeTab === 'dueList') {
            if (!rawDueData || rawDueData.length === 0) {
                dropdown.addClass('d-none').empty();
                return;
            }

            let matches = rawDueData.filter(item => {
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
                const grandDue = (parseFloat(item.customer_previous_due) || 0) + (parseFloat(item.order_previous_due) || 0);
                const dueDisplay = grandDue > 0 ? `<span class="text-danger fw-bold" style="font-size: 11.5px;">৳ ${grandDue.toFixed(2)}</span>` : '<span class="text-muted small" style="font-size: 11px;">পরিশোধিত</span>';
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
        } else {
            // Collection List
            if (!rawCollectionData || rawCollectionData.length === 0) {
                dropdown.addClass('d-none').empty();
                return;
            }

            let matches = rawCollectionData.filter(item => {
                let customerName = (item.customer ? item.customer.customer_name : (item.customer_name || '')).toLowerCase();
                let customerId = (item.customer ? (item.customer.customer_id || '') : (item.customer_id || '')).toLowerCase();
                let date = (item.due_collection_date || '').toLowerCase();
                let txId = (item.transaction_id || '').toLowerCase();

                return customerName.includes(cleanTerm) ||
                       customerId.includes(cleanTerm) ||
                       date.includes(cleanTerm) ||
                       txId.includes(cleanTerm);
            }).slice(0, 8);

            if (matches.length === 0) {
                dropdown.html('<div class="p-3 text-center text-muted small"><i class="fa-solid fa-circle-exclamation me-1"></i>কোনো কালেকশন তথ্য পাওয়া যায়নি</div>').removeClass('d-none');
                return;
            }

            let html = '';
            matches.forEach(item => {
                let cName = item.customer ? item.customer.customer_name : (item.customer_name || 'N/A');
                let cId = item.customer ? (item.customer.customer_id || 'ID N/A') : (item.customer_id || 'ID N/A');
                let paid = parseFloat(item.paid_amount) || 0;
                let safeName = cName.replace(/'/g, "\\'");

                html += `
                    <div class="search-live-item" onclick="selectSearchDropdownItem('${safeName}')">
                        <div class="overflow-hidden">
                            <span class="fw-bold text-dark d-block text-truncate" style="font-size: 13px;">${cName}</span>
                            <span class="text-muted small" style="font-size: 11px;"><i class="fa-regular fa-calendar me-1"></i>${item.due_collection_date || ''}</span>
                        </div>
                        <div class="text-end flex-shrink-0 ms-2">
                            <span class="badge bg-light text-dark border mb-1 d-inline-block" style="font-size: 10px;">${cId}</span>
                            <div class="text-success fw-bold" style="font-size: 11.5px;">৳ ${paid.toFixed(2)}</div>
                        </div>
                    </div>
                `;
            });

            dropdown.html(html).removeClass('d-none');
        }
    }

    function selectSearchDropdownItem(name) {
        $('#searchInput').val(name);
        $('#mobileSearchInput').val(name);
        $('.search-live-dropdown').addClass('d-none').empty();
        currentPage = 1;
        renderCurrentActiveTab();
    }

    function switchCustomerTab(tabName) {
        activeTab = tabName;
        currentPage = 1;

        if (tabName === 'dueList') {
            $('#tabDueListBtn').addClass('active');
            $('#tabCollectionListBtn').removeClass('active');
            $('#tabContentDueList').removeClass('d-none');
            $('#tabContentCollectionList').addClass('d-none');
            $('#topSummaryLabelLeft').text('মোট বকেয়া কাস্টমার');
            $('#topSummaryLabelRight').text('মোট বকেয়া পাওনা');
        } else {
            $('#tabCollectionListBtn').addClass('active');
            $('#tabDueListBtn').removeClass('active');
            $('#tabContentCollectionList').removeClass('d-none');
            $('#tabContentDueList').addClass('d-none');
            $('#topSummaryLabelLeft').text('মোট কালেকশন/পরিশোধ');
            $('#topSummaryLabelRight').text('মোট আদায়কৃত টাকা');
        }

        renderCurrentActiveTab();
    }

    async function fetchBothLists() {
        try {
            showLoader();

            let [resDue, resCol] = await Promise.all([
                axios.get("/api/customer-due-list", HeaderToken()),
                axios.get("/api/admin-dashboard-customer-due-collection", HeaderToken())
            ]);

            hideLoader();

            if (resDue.data.status === "success" && Array.isArray(resDue.data.CustomerData)) {
                rawDueData = resDue.data.CustomerData;
                $('#dueListCountBadge').text(rawDueData.length);
            }

            if (resCol.data.status === "success" && Array.isArray(resCol.data.CustomerDueCollectionData)) {
                rawCollectionData = resCol.data.CustomerDueCollectionData;
                $('#collectionListCountBadge').text(rawCollectionData.length);
            }

            renderCurrentActiveTab();
        } catch (error) {
            hideLoader();
            console.error("Error fetching data:", error);
            unauthorized(error.response ? error.response.status : 500);
        }
    }

    function renderCurrentActiveTab() {
        if (activeTab === 'dueList') {
            renderDueList();
        } else {
            renderCollectionList();
        }
    }

    /* ================= 1. RENDER CUSTOMER DUE LIST ================= */
    function renderDueList() {
        let searchTerm = ($("#searchInput").val() || "").toLowerCase().trim();

        let filtered = rawDueData.filter(function (item) {
            let customerId = (item.customer_id || "").toLowerCase();
            let name = (item.customer_name || "").toLowerCase();
            let mobile = (item.mobile || "").toLowerCase();
            let status = (item.status || "Active").toLowerCase();
            let grandDue = (parseFloat(item.total_due_amount) || 0);

            let matchesSearch = !searchTerm || customerId.includes(searchTerm) || name.includes(searchTerm) || mobile.includes(searchTerm);

            let matchesFilter = true;
            if (currentFilter === 'hasDue') {
                matchesFilter = (grandDue > 0);
            } else if (currentFilter === 'Active') {
                matchesFilter = (status === 'active');
            }

            return matchesSearch && matchesFilter;
        });

        // Totals
        let totalDueSum = 0;
        filtered.forEach(item => {
            totalDueSum += (parseFloat(item.total_due_amount) || 0);
        });

        $('#topSummaryTotalCount').text(filtered.length);
        $('#topSummaryTotalAmount').text(`৳ ${totalDueSum.toFixed(2)}`);

        // Pagination
        let totalItems = filtered.length;
        let totalPages = Math.ceil(totalItems / pageSize) || 1;
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        let startIndex = (currentPage - 1) * pageSize;
        let endIndex = Math.min(startIndex + pageSize, totalItems);
        let pageItems = filtered.slice(startIndex, endIndex);

        let tableList = $("#dueTableList");
        let mobileCardList = $("#dueMobileCardList");
        tableList.empty();
        mobileCardList.empty();

        if (pageItems.length === 0) {
            tableList.html('<tr><td colspan="10" class="text-center text-danger p-4 fw-bold">❌ কোনো বকেয়া তথ্য পাওয়া যায়নি।</td></tr>');
            mobileCardList.html('<div class="col-12 p-4 text-center text-danger fw-bold bg-white rounded-3 border shadow-sm">❌ কোনো বকেয়া তথ্য পাওয়া যায়নি।</div>');
        } else {
            pageItems.forEach(function (item, idx) {
                let realIndex = startIndex + idx;
                const img_url = item['img_url'] ? item['img_url'] : "{{ asset('back-end/assets/img/demo-img.jpeg') }}";
                let prevDue = parseFloat(item['previous_due_amount']) || 0;
                let invoiceDue = parseFloat(item['order_due_amount']) || 0;
                let grandDue = parseFloat(item['total_due_amount']) || (prevDue + invoiceDue);

                let statusBadgeClass = (item['status'] || 'Active') === 'Active' ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-danger-subtle text-danger border border-danger-subtle';

                // Desktop Row
                let row = `
                    <tr data-row="${realIndex + 1}">
                        <td class="text-center fw-bold">${realIndex + 1}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm px-2.5 py-1 fw-bold text-white shadow-sm" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border-radius: 6px; font-size: 11.5px;" onclick="openPaymentModal(${item['id']})" title="বকেয়া আদায় করুন">
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                            </button>
                        </td>
                        <td>
                            <a href="/customer/profile/${item['id']}" class="fw-bold text-decoration-none" style="color: #8C56D4;">
                                <i class="fa-solid fa-user me-1"></i>${item['customer_id'] ?? 'N/A'}
                            </a>
                        </td>
                        <td class="text-center">
                            <img style="width: 42px; height: 42px; object-fit: cover;" class="rounded-circle border shadow-sm" alt="${item['customer_name']}" src="${img_url}" onerror="this.src='{{ asset('back-end/assets/img/demo-img.jpeg') }}'">
                        </td>
                        <td>
                            <a href="/customer/profile/${item['id']}" class="text-dark fw-bold text-decoration-none">${item['customer_name']}</a>
                        </td>
                        <td class="fw-medium text-secondary">${item['mobile'] || '-'}</td>
                        <td class="text-end fw-semibold text-secondary">৳ ${prevDue.toFixed(2)}</td>
                        <td class="text-end fw-semibold text-secondary">৳ ${invoiceDue.toFixed(2)}</td>
                        <td class="text-end fw-bold ${grandDue > 0 ? 'text-danger' : 'text-dark'}">৳ ${grandDue.toFixed(2)}</td>
                        <td class="text-center">
                            <span class="badge ${statusBadgeClass} px-2 py-1 fw-bold" style="font-size: 11px; border-radius: 12px;">
                                ${item['status'] || 'Active'}
                            </span>
                        </td>
                    </tr>`;
                tableList.append(row);

                // Mobile & Tablet Card View (2 per row on Tab >=768px, 1 on Mobile)
                let mobileCard = `
                    <div class="col-12 col-md-6">
                        <div class="invoice-mobile-card d-flex flex-column justify-content-between h-100">
                            <!-- Clickable Card Body Linking to Profile -->
                            <a href="/customer/profile/${item['id']}" class="text-decoration-none d-block flex-grow-1">
                                <div>
                                    <!-- Header -->
                                    <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                        <div class="d-flex align-items-center gap-1.5">
                                            <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 10px;">#${realIndex + 1}</span>
                                            <span class="badge bg-light text-dark border fw-bold" style="font-size: 11px;">
                                                <i class="fa-solid fa-user me-1" style="color: #8C56D4;"></i>${item['customer_id'] ?? 'N/A'}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="badge ${statusBadgeClass} px-2 py-1 fw-bold" style="font-size: 10px; border-radius: 12px;">
                                                ${item['status'] || 'Active'}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Body: Profile Left | Due Amounts Right -->
                                    <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                                        <div class="d-flex align-items-center gap-2 flex-shrink-1 overflow-hidden">
                                            <img src="${img_url}" class="rounded-circle border shadow-sm flex-shrink-0" style="width: 44px; height: 44px; object-fit: cover;" onerror="this.src='{{ asset('back-end/assets/img/demo-img.jpeg') }}'">
                                            <div class="overflow-hidden">
                                                <h6 class="fw-bold text-dark mb-0 text-truncate" style="font-size: 13.5px;">${item['customer_name']}</h6>
                                                <span class="text-muted text-truncate d-block" style="font-size: 11px;">
                                                    <i class="fa-solid fa-phone me-1"></i>${item['mobile'] || 'মোবাইল নেই'}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-1 invoice-summary-strip rounded-3 p-1.5 px-2" style="min-width: 130px;">
                                            <div class="d-flex align-items-center justify-content-between gap-2 pb-0.5 border-bottom">
                                                <span style="font-size: 9.5px; color: #64748b; white-space: nowrap;">পূর্বের বকেয়া:</span>
                                                <span class="fw-semibold text-secondary" style="font-size: 10.5px; white-space: nowrap;">৳ ${prevDue.toFixed(2)}</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between gap-2 py-0.5 border-bottom">
                                                <span style="font-size: 9.5px; color: #64748b; white-space: nowrap;">ইনভয়েস বকেয়া:</span>
                                                <span class="fw-semibold text-secondary" style="font-size: 10.5px; white-space: nowrap;">৳ ${invoiceDue.toFixed(2)}</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between gap-2 pt-0.5">
                                                <span style="font-size: 10px; color: #1e293b; font-weight: 700; white-space: nowrap;">মোট বকেয়া:</span>
                                                <span class="fw-bold ${grandDue > 0 ? 'text-danger' : 'text-dark'}" style="font-size: 11px; white-space: nowrap;">৳ ${grandDue.toFixed(2)}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- 1-Row Box Action Button -->
                            <div class="mobile-card-actions pt-2 mt-1 border-top">
                                <button type="button" class="mobile-action-btn action-btn-pay flex-grow-1" onclick="openPaymentModal(${item['id']});" title="বকেয়া আদায় করুন">
                                    <i class="fa-solid fa-hand-holding-dollar"></i><span style="font-size: 12px; font-weight: 700; margin-left: 8px;">বকেয়া আদায়</span>
                                </button>
                            </div>
                        </div>
                    </div>`;
                mobileCardList.append(mobileCard);
            });
        }

        // Display Info
        let fromCount = totalItems > 0 ? startIndex + 1 : 0;
        let toCount = endIndex;
        $("#display-info").html(`মোট <span class="badge bg-purple-subtle text-primary border px-2 py-1 mx-1 fw-bold fs-6" style="color: #8C56D4 !important;">${totalItems}</span> টির মধ্যে <span class="badge bg-light text-dark border px-2 py-1 mx-1 fw-bold fs-6">${fromCount} - ${toCount}</span> টি বকেয়া তথ্য প্রদর্শিত হচ্ছে`);

        renderPaginationControls(totalPages);
    }

    /* ================= 2. RENDER CUSTOMER DUE COLLECTION LIST ================= */
    function renderCollectionList() {
        let searchTerm = ($("#searchInput").val() || "").toLowerCase().trim();

        let filtered = rawCollectionData.filter(function (item) {
            let customerName = item.customer ? (item.customer.customer_name || "") : "";
            let customerId = item.customer ? (item.customer.customer_id || "") : (item.customer_id || "");
            let paymentStatus = (item.payment_status || "").toLowerCase();
            let date = item.due_collection_date || item.created_at || "";

            let matchesSearch = !searchTerm || customerName.toLowerCase().includes(searchTerm) || customerId.toLowerCase().includes(searchTerm) || date.toLowerCase().includes(searchTerm);

            let matchesFilter = true;
            if (currentFilter === 'hasDue') {
                matchesFilter = (parseFloat(item.due_amount) > 0);
            }

            return matchesSearch && matchesFilter;
        });

        // Totals
        let totalPaidSum = 0;
        filtered.forEach(item => {
            totalPaidSum += (parseFloat(item.paid_amount) || 0);
        });

        $('#topSummaryTotalCount').text(filtered.length);
        $('#topSummaryTotalAmount').text(`৳ ${totalPaidSum.toFixed(2)}`);

        // Pagination
        let totalItems = filtered.length;
        let totalPages = Math.ceil(totalItems / pageSize) || 1;
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;

        let startIndex = (currentPage - 1) * pageSize;
        let endIndex = Math.min(startIndex + pageSize, totalItems);
        let pageItems = filtered.slice(startIndex, endIndex);

        let tableList = $("#collectionTableList");
        let mobileCardList = $("#collectionMobileCardList");
        tableList.empty();
        mobileCardList.empty();

        if (pageItems.length === 0) {
            tableList.html('<tr><td colspan="8" class="text-center text-danger p-4 fw-bold">❌ কোনো কালেকশন তথ্য পাওয়া যায়নি।</td></tr>');
            mobileCardList.html('<div class="col-12 p-4 text-center text-danger fw-bold bg-white rounded-3 border shadow-sm">❌ কোনো কালেকশন তথ্য পাওয়া যায়নি।</div>');
        } else {
            pageItems.forEach(function (item, idx) {
                let realIndex = startIndex + idx;
                let prevDue = parseFloat(item.previous_due_amount) || 0;
                let paidAmount = parseFloat(item.paid_amount) || 0;
                let dueAmount = parseFloat(item.due_amount) || 0;

                let customerName = item.customer ? item.customer.customer_name : 'N/A';
                let customerID = item.customer ? item.customer.customer_id : (item.customer_id || 'N/A');
                let customerDbId = item.customer ? item.customer.id : item.customer_id;

                let statusBadgeClass = (dueAmount === 0 && paidAmount > 0) ? 'bg-success-subtle text-success border border-success-subtle' :
                                      (dueAmount > 0 && paidAmount > 0) ? 'bg-warning-subtle text-warning border border-warning-subtle' :
                                      'bg-danger-subtle text-danger border border-danger-subtle';
                let statusText = (dueAmount === 0 && paidAmount > 0) ? 'Fully Paid' : (dueAmount > 0 && paidAmount > 0) ? 'Partial Paid' : 'Unpaid';

                let dateFormatted = item.due_collection_date || item.created_at ? (item.due_collection_date || item.created_at.substring(0, 10)) : '-';

                // Desktop Row
                let row = `
                    <tr data-row="${realIndex + 1}">
                        <td class="text-center fw-bold">${realIndex + 1}</td>
                        <td class="text-start">${dateFormatted}</td>
                        <td class="text-start">
                            <a href="/customer/profile/${customerDbId}" class="fw-bold text-decoration-none" style="color: #8C56D4;">
                                <i class="fa-solid fa-user me-1"></i>${customerID}
                            </a>
                        </td>
                        <td class="text-start">
                            <a href="/customer/profile/${customerDbId}" class="text-dark fw-bold text-decoration-none">${customerName}</a>
                        </td>
                        <td class="text-end fw-semibold text-secondary">৳ ${prevDue.toFixed(2)}</td>
                        <td class="text-end fw-bold text-success">৳ ${paidAmount.toFixed(2)}</td>
                        <td class="text-end fw-bold ${dueAmount > 0 ? 'text-danger' : 'text-dark'}">৳ ${dueAmount.toFixed(2)}</td>
                        <td class="text-center">
                            <span class="badge ${statusBadgeClass} px-2 py-1 fw-bold" style="font-size: 11px; border-radius: 12px;">
                                ${statusText}
                            </span>
                        </td>
                    </tr>`;
                tableList.append(row);

                // Mobile & Tablet Card View (2 per row on Tab >=768px, 1 on Mobile)
                let mobileCard = `
                    <div class="col-12 col-md-6">
                        <a href="/customer/profile/${customerDbId}" class="text-decoration-none d-block h-100">
                        <div class="invoice-mobile-card d-flex flex-column justify-content-between h-100">
                            <div>
                                <!-- Header -->
                                <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                    <div class="d-flex align-items-center gap-1.5">
                                        <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 10px;">#${realIndex + 1}</span>
                                        <span class="badge bg-light text-dark border fw-bold" style="font-size: 11px;">
                                            <i class="fa-solid fa-user me-1" style="color: #8C56D4;"></i>${customerID}
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1 text-muted small" style="font-size: 11px;">
                                        <i class="fa-regular fa-calendar-days" style="color: #8C56D4;"></i>
                                        <span>${dateFormatted}</span>
                                    </div>
                                </div>

                                <!-- Body -->
                                <div class="mb-2">
                                    <h6 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 14px;">${customerName}</h6>
                                </div>

                                <!-- Financial Grid -->
                                <div class="invoice-summary-strip rounded-3 p-2 mb-1">
                                    <div class="d-flex align-items-center justify-content-between pb-1 border-bottom">
                                        <span style="font-size: 11px; color: #64748b;">পূর্বের বকেয়া:</span>
                                        <span class="fw-semibold text-secondary" style="font-size: 12px;">৳ ${prevDue.toFixed(2)}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                                        <span style="font-size: 11px; color: #16a34a; font-weight: 700;">আদায়কৃত অর্থ:</span>
                                        <span class="fw-bold text-success" style="font-size: 12.5px;">৳ ${paidAmount.toFixed(2)}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-1">
                                        <span style="font-size: 11px; color: #1e293b; font-weight: 700;">বর্তমান বকেয়া:</span>
                                        <span class="fw-bold ${dueAmount > 0 ? 'text-danger' : 'text-dark'}" style="font-size: 12.5px;">৳ ${dueAmount.toFixed(2)}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Status -->
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top mt-1">
                                <span class="text-muted small" style="font-size: 11px;">পেমেন্ট স্ট্যাটাস:</span>
                                <span class="badge ${statusBadgeClass} px-2 py-1 fw-bold" style="font-size: 10px; border-radius: 12px;">
                                    ${statusText}
                                </span>
                            </div>
                        </div>
                        </a>
                    </div>`;
                mobileCardList.append(mobileCard);
            });
        }

        // Display Info
        let fromCount = totalItems > 0 ? startIndex + 1 : 0;
        let toCount = endIndex;
        $("#display-info").html(`মোট <span class="badge bg-purple-subtle text-primary border px-2 py-1 mx-1 fw-bold fs-6" style="color: #8C56D4 !important;">${totalItems}</span> টির মধ্যে <span class="badge bg-light text-dark border px-2 py-1 mx-1 fw-bold fs-6">${fromCount} - ${toCount}</span> টি কালেকশন তথ্য প্রদর্শিত হচ্ছে`);

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
        renderCurrentActiveTab();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    /* ================= PAYMENT MODAL LOGIC ================= */
    let currentTotalDue = 0;

    async function openPaymentModal(id) {
        try {
            showLoader();
            $('#updateID').val(id);
            $('#paymentForm')[0].reset();
            selectPaymentChip('cash');

            let res = await axios.post("/api/customer-due-collection-details-by-id", {
                id: id.toString()
            }, HeaderToken());

            hideLoader();

            if (res.data.status === "success") {
                const data = res.data;
                let prevDue = parseFloat(data.previous_due) || 0;
                let orderDue = parseFloat(data.order_due) || 0;
                let totalDue = parseFloat(data.total_due) || (prevDue + orderDue);

                currentTotalDue = totalDue;
                $('#CustomerPreviousDue').text(`৳ ${prevDue.toFixed(2)}`);
                $('#OrderPreviousDue').text(`৳ ${orderDue.toFixed(2)}`);
                $('#TotalPreviousDue').text(`৳ ${totalDue.toFixed(2)}`).data('raw', totalDue);
                $('#FinalDueAmount').text(`৳ ${totalDue.toFixed(2)}`);
                $('#ShowpaymentStatusDisplay').text('Pending').removeClass('bg-success bg-warning').addClass('bg-secondary');

                $('#editModal').modal('show');
                setTimeout(function() {
                    const payInput = document.getElementById('PayAmount');
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

    function closePaymentModal() {
        $('#editModal').modal('hide');
    }

    function calculateDuePayment() {
        let totalDue = parseFloat($('#TotalPreviousDue').data('raw')) || 0;
        let discount = parseFloat($('#DiscountAmount').val()) || 0;
        let payAmount = parseFloat($('#PayAmount').val()) || 0;

        let totalDeduction = discount + payAmount;
        let remainingDue = Math.max(0, totalDue - totalDeduction);

        $('#FinalDueAmount').text(`৳ ${remainingDue.toFixed(2)}`);

        let statusBadge = $('#ShowpaymentStatusDisplay');
        if (remainingDue === 0 && payAmount > 0) {
            statusBadge.text('Fully Paid').removeClass('bg-secondary bg-warning').addClass('bg-success');
        } else if (payAmount > 0 && remainingDue > 0) {
            statusBadge.text('Partial Paid').removeClass('bg-secondary bg-success').addClass('bg-warning');
        } else {
            statusBadge.text('Pending').removeClass('bg-success bg-warning').addClass('bg-secondary');
        }
    }

    function selectPaymentChip(method) {
        $('.payment-chip-btn').removeClass('active');
        $(`input[name="payment"][value="${method}"]`).closest('.payment-chip-btn').addClass('active');
        $(`input[name="payment"][value="${method}"]`).prop('checked', true);

        if (method === 'cash') {
            $('#transactionIdWrapper').slideUp(150);
            $('#transactionInput').val('');
        } else {
            $('#transactionIdWrapper').slideDown(150);
        }
    }

    async function SavePaymentInfo(event) {
        event.preventDefault();
        try {
            let updateID = $('#updateID').val();
            let payAmount = parseFloat($('#PayAmount').val()) || 0;
            let discountAmount = parseFloat($('#DiscountAmount').val()) || 0;
            let prevDue = parseFloat($('#TotalPreviousDue').data('raw')) || 0;
            let dueAmount = Math.max(0, prevDue - (payAmount + discountAmount));
            let collectionDate = $('#DueCollectionDate').val();
            let paymentStatus = $('#ShowpaymentStatusDisplay').text();
            let paymentMethod = $('input[name="payment"]:checked').val() || 'cash';
            let transactionId = $('#transactionInput').val();

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
                closePaymentModal();
                fetchBothLists();
            } else {
                errorToast(res.data.message || "বকেয়া আপডেট ব্যর্থ হয়েছে।");
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            errorToast("বকেয়া সংগ্রহ সংরক্ষণ করতে সমস্যা হয়েছে।");
        }
    }
</script>
