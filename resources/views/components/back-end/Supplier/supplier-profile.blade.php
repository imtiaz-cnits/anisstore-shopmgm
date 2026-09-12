<style>
    /* Supplier Profile Custom Mobile Responsive Styling */
    .supplier-profile-header-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #cbd5e1;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .supplier-profile-avatar {
        width: 85px;
        height: 85px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #16a34a;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.25);
    }

    .supplier-info-badge {
        font-size: 12px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 20px;
    }

    .supplier-net-due-box {
        background: linear-gradient(135deg, #fef2f2 0%, #ffe4e6 100%);
        border: 1.5px solid #fecdd3;
        border-radius: 14px;
        padding: 16px;
    }

    /* Mobile Pill Navigation for Tabs */
    .supplier-profile-tabs {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        gap: 8px;
        padding-bottom: 8px;
        border-bottom: none !important;
    }
    .supplier-profile-tabs::-webkit-scrollbar {
        display: none;
    }
    .supplier-profile-tabs .nav-link {
        white-space: nowrap;
        border-radius: 12px !important;
        padding: 10px 16px;
        font-size: 13.5px;
        font-weight: 700;
        border: 1px solid #cbd5e1 !important;
        background: #f8fafc;
        color: #475569 !important;
        transition: all 0.2s ease;
    }
    .supplier-profile-tabs .nav-link.active {
        background: linear-gradient(135deg, #15803d 0%, #16a34a 100%) !important;
        color: #ffffff !important;
        border-color: #15803d !important;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
    }

    .metric-card-box {
        border-radius: 14px !important;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .metric-card-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.06) !important;
    }

    @media (max-width: 768px) {
        .supplier-profile-avatar {
            width: 70px;
            height: 70px;
        }
        .supplier-header-title-box h1 {
            font-size: 18px !important;
        }
        .metric-card-box {
            padding: 12px !important;
        }
        .metric-card-box h3 {
            font-size: 1.1rem !important;
        }
    }
</style>

<div class="main-content">
    <div class="page-content">
        <!-- Breadcrumb Header -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
            <div class="supplier-header-title-box">
                <h1 class="h4 mb-0 text-dark fw-extrabold d-flex align-items-center gap-2">
                    <i class="fa-solid fa-truck-field text-success"></i>
                    <span>সাপ্লায়ার প্রোফাইল</span>
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="/admin-dashboard-supplier" class="btn btn-outline-secondary btn-sm rounded-pill px-3 py-1.5 fw-bold" style="font-size: 12.5px;">
                    <i class="fa-solid fa-arrow-left me-1"></i> ফিরে যান
                </a>
                <button class="btn btn-success btn-sm rounded-pill px-3 py-1.5 fw-bold shadow-xs" data-bs-toggle="modal" data-bs-target="#paySupplierDueModal" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; font-size: 12.5px;">
                    <i class="fa-solid fa-hand-holding-dollar me-1"></i> বকেয়া পরিশোধ
                </button>
            </div>
        </div>

        <div class="container-fluid px-0">
            <!-- Supplier Information Banner Card -->
            <div class="supplier-profile-header-card mb-4">
                <div class="bg-success py-1.5" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%) !important;"></div>
                <div class="p-3 p-md-4">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-7 d-flex align-items-start align-items-sm-center gap-3">
                            <div class="flex-shrink-0">
                                <img id="supplierImg" src="{{ asset('back-end/assets/img/demo-img.jpeg') }}" 
                                     alt="Supplier Image" 
                                     class="supplier-profile-avatar">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                    <h2 id="supplierName" class="h5 fw-extrabold mb-0 text-dark">লোড হচ্ছে...</h2>
                                    <span id="supplierIdBadge" class="badge bg-light text-success border border-success fw-bold px-2 py-1" style="font-size: 12px;">SUP-0000</span>
                                    <span id="supplierStatusBadge" class="badge bg-success px-2 py-1" style="font-size: 11.5px;">Active</span>
                                </div>
                                <p id="supplierCompany" class="text-muted mb-2 fw-semibold" style="font-size: 13.5px;">
                                    <i class="fa-solid fa-building me-1 text-secondary"></i>কোম্পানি: N/A
                                </p>
                                <div class="d-flex flex-wrap gap-2 text-muted" style="font-size: 12.5px;">
                                    <span id="supplierMobile" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-phone me-1 text-success"></i>N/A</span>
                                    <span id="supplierEmail" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-envelope me-1 text-primary"></i>N/A</span>
                                    <span id="supplierAddress" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-location-dot me-1 text-danger"></i>N/A</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 text-lg-end mt-3 mt-lg-0 border-top border-top-lg-0 border-start-lg pt-3 pt-lg-0 ps-lg-4">
                            <div class="supplier-net-due-box text-start text-lg-start d-inline-block w-100" style="max-width: 340px;">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="text-muted small text-uppercase fw-bold">মোট দেনা (Net Due)</span>
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-0.5 fw-bold" style="font-size: 11px;">Payable Balance</span>
                                </div>
                                <h3 id="supplierNetDue" class="h3 fw-extrabold text-danger mb-1">৳ ০০.০০</h3>
                                <small class="text-muted d-block mb-3" style="font-size: 11.5px;">সাপ্লায়ারের নিকট সর্বমোট পাওনা বকেয়া</small>
                                <button class="btn btn-success fw-bold w-100 rounded-pill shadow-xs py-2" data-bs-toggle="modal" data-bs-target="#paySupplierDueModal" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; font-size: 13.5px;">
                                    <i class="fa-solid fa-hand-holding-dollar me-1.5"></i> বকেয়া পরিশোধ করুন
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5 Metric Cards Grid -->
            <div class="row g-2 g-md-3 mb-4">
                <div class="col-6 col-lg-2">
                    <div class="card metric-card-box shadow-xs h-100 p-3" style="border-left: 4px solid #0284c7 !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted mb-1 small fw-bold text-uppercase" style="font-size: 11px;">মোট ইনভয়েস</p>
                                <h3 id="statTotalPurchases" class="fw-extrabold mb-0 text-dark">০</h3>
                                <small class="text-muted" style="font-size: 10px;">ক্রয় মেমো</small>
                            </div>
                            <div class="rounded-circle bg-info-subtle p-2 text-info d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="fa-solid fa-cart-shopping fs-6"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-2.5">
                    <div class="card metric-card-box shadow-xs h-100 p-3" style="border-left: 4px solid #16a34a !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted mb-1 small fw-bold text-uppercase" style="font-size: 11px;">সর্বমোট ক্রয় (Billed)</p>
                                <h3 id="statTotalBilled" class="fw-extrabold mb-0 text-success" style="font-size: 1.15rem;">৳ ০০.০০</h3>
                                <small class="text-muted" style="font-size: 10px;">মোট বিল পরিমাণ</small>
                            </div>
                            <div class="rounded-circle bg-success-subtle p-2 text-success d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="fa-solid fa-money-bill-wave fs-6"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-2.5">
                    <div class="card metric-card-box shadow-xs h-100 p-3" style="border-left: 4px solid #059669 !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted mb-1 small fw-bold text-uppercase" style="font-size: 11px;">পরিশোধিত টাকা (Paid)</p>
                                <h3 id="statTotalPaid" class="fw-extrabold mb-0 text-emerald" style="color: #059669; font-size: 1.15rem;">৳ ০০.০০</h3>
                                <small class="text-muted" style="font-size: 10px;">কমপ্লিট পেমেন্ট</small>
                            </div>
                            <div class="rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background-color: #d1fae5; color: #059669;">
                                <i class="fa-solid fa-circle-check fs-6"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Available Return Credit Card -->
                <div class="col-6 col-lg-2.5">
                    <div class="card metric-card-box shadow-xs h-100 p-3" style="border-left: 4px solid #0d9488 !important; background: #f0fdfa;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted mb-1 small fw-bold text-uppercase" style="font-size: 11px;">ফেরত ক্রেডিট (Credit)</p>
                                <h3 id="statTotalReturns" class="fw-extrabold mb-0" style="color: #0d9488; font-size: 1.15rem;">৳ ০০.০০</h3>
                                <small id="statReturnSubtitle" class="text-muted" style="font-size: 10px;">মোট রিটার্ন: ৳ ০০.০০</small>
                            </div>
                            <div class="rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background-color: #ccfbf1; color: #0d9488;">
                                <i class="fa-solid fa-truck-ramp-box fs-6"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-2.5">
                    <div class="card metric-card-box shadow-xs h-100 p-3" style="border-left: 4px solid #dc2626 !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-muted mb-1 small fw-bold text-uppercase" style="font-size: 11px;">অবশিষ্ট দেনা (Net Due)</p>
                                <h3 id="statTotalDue" class="fw-extrabold mb-0 text-danger" style="font-size: 1.15rem;">৳ ০০.০০</h3>
                                <small class="text-muted" style="font-size: 10px;">মোট পাওনা বকেয়া</small>
                            </div>
                            <div class="rounded-circle bg-danger-subtle p-2 text-danger d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="fa-solid fa-circle-exclamation fs-6"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs Section -->
            <div class="card border-0 shadow-xs overflow-hidden" style="border-radius: 16px; border: 1px solid #cbd5e1;">
                <div class="card-header bg-white border-bottom p-3">
                    <ul class="supplier-profile-tabs nav nav-pills" id="supplierProfileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="purchases-tab" data-bs-toggle="tab" data-bs-target="#purchases-content" type="button" role="tab">
                                <i class="fa-solid fa-receipt me-1.5"></i>ক্রয় ইনভয়েস (<span id="purchasesCount">০</span>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="returns-tab" data-bs-toggle="tab" data-bs-target="#returns-content" type="button" role="tab">
                                <i class="fa-solid fa-truck-ramp-box me-1.5" style="color: #0d9488;"></i>ক্রয় ফেরত / ক্রেডিট (<span id="returnsCount">০</span>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions-content" type="button" role="tab">
                                <i class="fa-solid fa-hand-holding-dollar me-1.5"></i>লেনদেনের হিস্ট্রি (<span id="transactionsCount">০</span>)
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-3 p-md-4">
                    <div class="tab-content" id="supplierProfileTabContent">

                        <!-- Tab 1: Purchases -->
                        <div class="tab-pane fade show active" id="purchases-content" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle mb-0" style="font-size: 13.5px;">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">ক্রয় আইডেন্টিটি</th>
                                            <th class="text-center">তারিখ</th>
                                            <th class="text-start">বারকোডসমূহ</th>
                                            <th class="text-start">রেফারেন্স</th>
                                            <th class="text-end">সর্বমোট মূল্য</th>
                                            <th class="text-end">পরিশোধিত</th>
                                            <th class="text-end">বাকি টাকা</th>
                                            <th class="text-center">স্ট্যাটাস</th>
                                            <th class="text-center" style="width: 100px;">অ্যাকশন</th>
                                        </tr>
                                    </thead>
                                    <tbody id="purchasesTableBody">
                                        <tr><td colspan="10" class="text-center py-4 text-muted">ক্রয় ইনভয়েস লোড হচ্ছে...</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tab 2: Purchase Returns -->
                        <div class="tab-pane fade" id="returns-content" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle mb-0" style="font-size: 13.5px;">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">ফেরতের তারিখ</th>
                                            <th class="text-center">পারচেজ নম্বর</th>
                                            <th class="text-start">ফেরতকৃত পণ্য</th>
                                            <th class="text-center">পরিমাণ</th>
                                            <th class="text-end">ক্রেডিট মান</th>
                                        </tr>
                                    </thead>
                                    <tbody id="returnsTableBody">
                                        <tr><td colspan="6" class="text-center py-4 text-muted">ক্রয় ফেরত রেকর্ড লোড হচ্ছে...</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tab 3: Transactions -->
                        <div class="tab-pane fade" id="transactions-content" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle mb-0" style="font-size: 13.5px;">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">তারিখ ও সময়</th>
                                            <th class="text-center">ইনভয়েস / রেফারেন্স</th>
                                            <th class="text-end">পরিশোধিত টাকা</th>
                                            <th class="text-end">ডিসকাউন্ট</th>
                                            <th class="text-start">পেমেন্ট মেথড</th>
                                            <th class="text-start">ট্রানজেকশন আইডি / নোট</th>
                                            <th class="text-center">স্ট্যাটাস</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transactionsTableBody">
                                        <tr><td colspan="8" class="text-center py-4 text-muted">লেনদেন রেকর্ড লোড হচ্ছে...</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Pay Supplier Due Modal -->
<div class="modal fade" id="paySupplierDueModal" tabindex="-1" aria-labelledby="paySupplierDueModalLabel" aria-hidden="true" style="z-index: 1085;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header text-white py-3 px-4" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%) !important;">
                <h5 class="modal-title fw-bold" id="paySupplierDueModalLabel" style="font-size: 16px;">
                    <i class="fa-solid fa-hand-holding-dollar me-2"></i>সাপ্লাইয়ারের বকেয়া পরিশোধ (Pay Due)
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="paySupplierDueForm" onsubmit="submitSupplierPayment(event)">
                <div class="modal-body p-4">
                    <!-- Supplier Quick Info Box -->
                    <div class="bg-light p-3 rounded-3 mb-3 border">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="fw-bold text-dark fs-6" id="modalSupplierName">Supplier Name</span>
                            <span class="badge bg-secondary" id="modalSupplierId">ID</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">পরিশোধের সর্বমোট বকেয়া:</span>
                            <span class="fw-bold text-danger fs-6" id="modalSupplierTotalDue">৳ ০০.০০</span>
                        </div>
                    </div>

                    <!-- Payment Target Selector -->
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block text-dark small">পরিশোধের খাত (Payment Target) <span class="text-danger">*</span></label>
                        <div class="btn-group w-100" role="group" id="supplierCollectionTypeGroup">
                            <input type="radio" class="btn-check" name="supplier_collection_type" id="stype_all" value="all" checked onchange="onSupplierCollectionTypeChange()">
                            <label class="btn btn-outline-success fw-bold py-2" for="stype_all" title="আগের ও পারচেজের উভয় বকেয়া পরিশোধ" style="font-size: 12.5px;">
                                <i class="fa-solid fa-layer-group me-1"></i> উভয় বকেয়া
                            </label>

                            <input type="radio" class="btn-check" name="supplier_collection_type" id="stype_previous" value="previous" onchange="onSupplierCollectionTypeChange()">
                            <label class="btn btn-outline-primary fw-bold py-2" for="stype_previous" title="শুধুমাত্র পুরানো বকেয়া পরিশোধ" style="font-size: 12.5px;">
                                <i class="fa-solid fa-clock-rotate-left me-1"></i> আগের বকেয়া
                            </label>

                            <input type="radio" class="btn-check" name="supplier_collection_type" id="stype_purchase" value="purchase" onchange="onSupplierCollectionTypeChange()">
                            <label class="btn btn-outline-warning text-dark fw-bold py-2" for="stype_purchase" title="শুধুমাত্র পারচেজ ইনভয়েসের বকেয়া পরিশোধ" style="font-size: 12.5px;">
                                <i class="fa-solid fa-cart-shopping me-1"></i> পারচেজ বকেয়া
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="supplierModalPaidAmount" class="form-label fw-bold text-dark small">পরিশোধের পরিমাণ (৳) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-white fw-bold">৳</span>
                            <input type="number" step="0.01" class="form-control fw-bold fs-5 text-success" id="supplierModalPaidAmount" placeholder="0.00" required style="border-radius: 0 10px 10px 0;">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="supplierModalPaymentMethod" class="form-label fw-bold text-dark small">পেমেন্ট মেথড</label>
                            <select class="form-select fw-semibold" id="supplierModalPaymentMethod" style="border-radius: 10px;">
                                <option value="Cash" selected>💵 Cash (নগদ)</option>
                                <option value="Bank">🏦 Bank Transfer</option>
                                <option value="bKash">📱 bKash</option>
                                <option value="Nagad">📱 Nagad</option>
                                <option value="Rocket">📱 Rocket</option>
                                <option value="Cheque">📄 Cheque</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="supplierModalCollectionDate" class="form-label fw-bold text-dark small">পরিশোধের তারিখ</label>
                            <input type="date" class="form-control fw-semibold" id="supplierModalCollectionDate" style="border-radius: 10px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="supplierModalNote" class="form-label fw-bold text-dark small">নোট / রেফারেন্স</label>
                        <input type="text" class="form-control" id="supplierModalNote" placeholder="পেমেন্ট সম্পর্কিত কোনো তথ্য লিখুন" style="border-radius: 10px;">
                    </div>
                </div>
                <div class="modal-footer bg-light py-3 px-4 border-top">
                    <button type="button" class="btn btn-secondary fw-bold rounded-pill px-4" data-bs-dismiss="modal">বাতিল</button>
                    <button type="submit" class="btn btn-success fw-bold rounded-pill px-4 shadow-xs" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none;">
                        <i class="fa-solid fa-check me-1"></i> পেমেন্ট জমা দিন
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function engToBanglaNumProf(str) {
        if (str === null || str === undefined) return '';
        const engDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        const banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        let strVal = String(str);
        for (let i = 0; i < 10; i++) {
            strVal = strVal.split(engDigits[i]).join(banglaDigits[i]);
        }
        return strVal;
    }

    const pathParts = window.location.pathname.split('/');
    const supplierProfileId = pathParts[pathParts.length - 1];

    document.addEventListener("DOMContentLoaded", () => {
        loadSupplierProfileData();
    });

    function onSupplierCollectionTypeChange() {
        const selectedType = document.querySelector('input[name="supplier_collection_type"]:checked')?.value || 'all';
        const modalTotalDue = document.getElementById('modalSupplierTotalDue');
        const inputAmount = document.getElementById('supplierModalPaidAmount');

        let targetMax = 0;
        let targetText = '';

        if (selectedType === 'previous') {
            targetMax = window.supplierPreviousDueVal;
            targetText = `৳ ${engToBanglaNumProf(targetMax.toFixed(2))} (শুধুমাত্র আগের বকেয়া)`;
        } else if (selectedType === 'purchase') {
            targetMax = window.supplierPurchaseDueVal;
            targetText = `৳ ${engToBanglaNumProf(targetMax.toFixed(2))} (শুধুমাত্র পারচেজ বকেয়া)`;
        } else {
            targetMax = window.supplierTotalDueVal;
            targetText = `৳ ${engToBanglaNumProf(targetMax.toFixed(2))} (আগের: ৳${engToBanglaNumProf(window.supplierPreviousDueVal.toFixed(2))} | পারচেজ: ৳${engToBanglaNumProf(window.supplierPurchaseDueVal.toFixed(2))})`;
        }

        modalTotalDue.innerText = targetText;
        inputAmount.value = targetMax > 0 ? targetMax.toFixed(2) : '';
    }

    async function loadSupplierProfileData() {
        try {
            const res = await axios.get(`/api/supplier-profile-data/${supplierProfileId}`, HeaderToken());
            if (res.data.status === 'success') {
                const supplier = res.data.supplier;
                const summary = res.data.summary;
                const purchases = res.data.purchases || [];
                const returns = res.data.returns || [];
                const transactions = res.data.transactions || [];

                window.supplierDbId = supplier.id;
                window.supplierPreviousDueVal = parseFloat(supplier.purchase_payable_amount || 0);
                window.supplierPurchaseDueVal = purchases.reduce((sum, p) => sum + parseFloat(p.due_amount || 0), 0);
                window.supplierReturnsVal = parseFloat(summary.total_returns || 0);
                window.supplierTotalDueVal = Math.max(0, window.supplierPreviousDueVal + window.supplierPurchaseDueVal - window.supplierReturnsVal);

                // Render Supplier Header
                $('#supplierName').text(supplier.name || 'N/A');
                $('#supplierIdBadge').text(supplier.supplier_id || 'SUP-0000');

                $('#supplierCompany').html(`<i class="fa-solid fa-building me-1 text-secondary"></i>কোম্পানি: ${supplier.company || 'N/A'}`);
                $('#supplierMobile').html(`<i class="fa-solid fa-phone me-1 text-success"></i>${engToBanglaNumProf(supplier.mobile || 'N/A')}`);
                $('#supplierEmail').html(`<i class="fa-solid fa-envelope me-1 text-primary"></i>${supplier.email || 'N/A'}`);
                $('#supplierAddress').html(`<i class="fa-solid fa-location-dot me-1 text-danger"></i>${supplier.address || 'N/A'}`);
                
                if (supplier.img_url) {
                    $('#supplierImg').attr('src', '/' + supplier.img_url);
                }

                // Render Summary Metrics in Bangla
                $('#supplierNetDue').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_due).toFixed(2))}`);
                $('#statTotalPurchases').text(engToBanglaNumProf(summary.total_purchases));
                $('#statTotalBilled').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_amount).toFixed(2))}`);
                $('#statTotalPaid').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_paid).toFixed(2))}`);
                $('#statTotalReturns').text(`৳ ${engToBanglaNumProf(parseFloat(summary.available_credit || 0).toFixed(2))}`);
                $('#statReturnSubtitle').text(`মোট রিটার্ন: ৳${engToBanglaNumProf(parseFloat(summary.total_returns || 0).toFixed(2))} | অ্যাডজাস্ট: ৳${engToBanglaNumProf(parseFloat(summary.total_returns_adjusted || 0).toFixed(2))}`);
                $('#statTotalDue').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_due).toFixed(2))}`);

                $('#purchasesCount').text(engToBanglaNumProf(purchases.length));
                $('#returnsCount').text(engToBanglaNumProf(returns.length));
                $('#transactionsCount').text(engToBanglaNumProf(transactions.length));

                // Pre-fill Modal Info
                $('#modalSupplierName').text(supplier.name || 'N/A');
                $('#modalSupplierId').text(supplier.supplier_id || 'SUP-0000');
                $('#supplierModalCollectionDate').val(new Date().toISOString().split('T')[0]);

                onSupplierCollectionTypeChange();

                // Render Purchases Table
                const purchasesTbody = $('#purchasesTableBody');
                purchasesTbody.empty();
                if (purchases.length === 0) {
                    purchasesTbody.html('<tr><td colspan="10" class="text-center py-4 text-muted">কোনো ক্রয় ইনভয়েস ডাটা পাওয়া যায়নি</td></tr>');
                } else {
                    purchases.forEach((item, index) => {
                        const statusBadge = item.payment_status === 'Fully Paid' ? 'bg-success' :
                                            item.payment_status === 'Partial Paid' ? 'bg-warning text-dark' : 'bg-danger';

                        let barcodesHtml = '<span class="text-muted small">N/A</span>';
                        if (item.barcodes && Array.isArray(item.barcodes) && item.barcodes.length > 0) {
                            barcodesHtml = item.barcodes.map(c => `<span class="badge bg-light text-success border border-success me-1" style="font-family: monospace;">${c}</span>`).join('');
                        }

                        let paidDisplayHtml = `৳ ${engToBanglaNumProf(parseFloat(item.paid_amount).toFixed(2))}`;
                        if (item.return_adjustment_amount && parseFloat(item.return_adjustment_amount) > 0) {
                            paidDisplayHtml += `<br><span class="badge bg-teal-subtle text-teal border" style="font-size: 11px; color: #0d9488;">+৳${engToBanglaNumProf(parseFloat(item.return_adjustment_amount).toFixed(2))} Adj</span>`;
                        }

                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(index + 1)}</td>
                                <td class="text-center fw-bold text-success">${item.purchase_id}</td>
                                <td class="text-center">${engToBanglaNumProf(item.date)}</td>
                                <td class="text-start">${barcodesHtml}</td>
                                <td class="text-start">${item.referance_no}</td>
                                <td class="text-end fw-bold">৳ ${engToBanglaNumProf(parseFloat(item.grand_subtotal).toFixed(2))}</td>
                                <td class="text-end text-success fw-bold">${paidDisplayHtml}</td>
                                <td class="text-end ${item.due_amount > 0 ? 'text-danger' : 'text-muted'} fw-bold">৳ ${engToBanglaNumProf(parseFloat(item.due_amount).toFixed(2))}</td>
                                <td class="text-center"><span class="badge ${statusBadge} px-2 py-1">${item.payment_status}</span></td>
                                <td class="text-center">
                                    <a href="/purchase-invoice/${item.id}" class="btn btn-sm btn-outline-primary px-2 py-1 fw-bold" style="border-radius: 8px;" title="ভিউ ইনভয়েস">
                                        <i class="fa-solid fa-eye me-1"></i> ভিউ
                                    </a>
                                </td>
                            </tr>
                        `;
                        purchasesTbody.append(row);
                    });
                }

                // Render Returns Table
                const returnsTbody = $('#returnsTableBody');
                returnsTbody.empty();
                if (returns.length === 0) {
                    returnsTbody.html('<tr><td colspan="6" class="text-center py-4 text-muted">কোনো পারচেজ রিটার্ন ডাটা পাওয়া যায়নি</td></tr>');
                } else {
                    returns.forEach((rItem, rIndex) => {
                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(rIndex + 1)}</td>
                                <td class="text-center fw-semibold text-dark">${engToBanglaNumProf(rItem.created_at_formatted || rItem.date)}</td>
                                <td class="text-center"><span class="badge bg-teal-subtle text-teal border font-monospace">${rItem.purchase_no}</span></td>
                                <td class="text-start fw-bold text-dark">${rItem.product_name}</td>
                                <td class="text-center"><span class="badge bg-light text-dark border px-2 py-1 fw-bold">${engToBanglaNumProf(rItem.quantity)} Pcs</span></td>
                                <td class="text-end fw-bold text-teal" style="color: #0d9488;">৳ ${engToBanglaNumProf(parseFloat(rItem.amount).toFixed(2))}</td>
                            </tr>
                        `;
                        returnsTbody.append(row);
                    });
                }

                // Render Transactions Table
                const transactionsTbody = $('#transactionsTableBody');
                transactionsTbody.empty();
                if (transactions.length === 0) {
                    transactionsTbody.html('<tr><td colspan="8" class="text-center py-4 text-muted">কোনো লেনদেন রেকর্ড পাওয়া যায়নি</td></tr>');
                } else {
                    transactions.forEach((trx, index) => {
                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(index + 1)}</td>
                                <td class="text-center">${engToBanglaNumProf(trx.created_at_formatted)}</td>
                                <td class="text-center fw-bold text-primary">${trx.purchase_id}</td>
                                <td class="text-end text-success fw-bold">৳ ${engToBanglaNumProf(parseFloat(trx.paid_amount).toFixed(2))}</td>
                                <td class="text-end text-muted">৳ ${engToBanglaNumProf(parseFloat(trx.discount_amount || 0).toFixed(2))}</td>
                                <td class="text-start fw-semibold"><i class="fa-solid fa-wallet me-1 text-secondary"></i>${trx.payment_method || 'Cash'}</td>
                                <td class="text-start text-muted">${trx.transaction_id || 'N/A'}</td>
                                <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">${trx.payment_status || 'Success'}</span></td>
                            </tr>
                        `;
                        transactionsTbody.append(row);
                    });
                }

            } else {
                alert("Error: " + (res.data.message || "Failed to load supplier profile data."));
            }
        } catch (err) {
            console.error(err);
            alert("Error: " + (err.response?.data?.message || err.message || "Error loading supplier profile."));
        }
    }

    async function submitSupplierPayment(event) {
        event.preventDefault();

        const collectionType = document.querySelector('input[name="supplier_collection_type"]:checked')?.value || 'all';
        const paidAmount = parseFloat(document.getElementById('supplierModalPaidAmount').value) || 0;
        const paymentMethod = document.getElementById('supplierModalPaymentMethod').value;
        const collectionDate = document.getElementById('supplierModalCollectionDate').value;
        const note = document.getElementById('supplierModalNote').value;

        if (paidAmount <= 0) {
            alert("অনুগ্রহ করে 0 টাকার বেশি পরিশোধের সঠিক পরিমাণ লিখুন।");
            return;
        }

        try {
            if (typeof showLoader === 'function') showLoader();

            const payload = {
                supplier_id: window.supplierDbId,
                collection_type: collectionType,
                paid_amount: paidAmount,
                payment_method: paymentMethod,
                payment_date: collectionDate,
                note: note
            };

            const res = await axios.post('/supplier-payment-details-update', payload, HeaderToken());
            if (typeof hideLoader === 'function') hideLoader();

            if (res.data && res.data.status === 'success') {
                if (typeof successToast === 'function') {
                    successToast(res.data.message || "🎉 সাপ্লায়ার পেমেন্ট সফলভাবে জমা হয়েছে!");
                } else {
                    alert(res.data.message || "🎉 সাপ্লায়ার পেমেন্ট সফলভাবে জমা হয়েছে!");
                }

                const modalEl = document.getElementById('paySupplierDueModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();

                loadSupplierProfileData();
            } else {
                alert(res.data?.message || "পেমেন্ট জমা করতে সমস্যা হয়েছে!");
            }
        } catch (err) {
            if (typeof hideLoader === 'function') hideLoader();
            console.error(err);
            alert("Error: " + (err.response?.data?.message || err.message || "Payment request failed."));
        }
    }
</script>
