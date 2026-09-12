<style>
    /* MOBILE EXCLUSIVE PURCHASE UI SYSTEM (Active on screens < 992px) */
    @media screen and (max-width: 991.98px) {
        .main-content .page-content {
            display: none !important;
        }
        
        .purchase-mobile-wrapper {
            display: block !important;
            background-color: #f6f7fb;
            min-height: 100vh;
            padding-bottom: 90px;
            font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;
        }
    }

    @media screen and (min-width: 992px) {
        .purchase-mobile-wrapper {
            display: none !important;
        }
    }

    /* 1. Mobile Top Green Header */
    .purchase-mobile-header {
        background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
        padding: 14px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: #ffffff;
        position: sticky;
        top: 0;
        z-index: 1020;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.25);
    }

    .purchase-mobile-back-btn {
        color: #ffffff;
        font-size: 18px;
        text-decoration: none;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
    }

    .purchase-mobile-title {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #ffffff;
    }

    /* 2. Sub-Header Info Bar */
    .purchase-mobile-subhead {
        background: #ffffff;
        padding: 10px 16px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 13px;
        color: #475569;
    }

    /* 3. Field Group Card (Supplier Selection) */
    .purchase-mobile-field-group {
        background: #ffffff;
        margin: 12px 14px;
        border-radius: 14px;
        padding: 12px 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
    }

    .field-group-label-purple {
        font-size: 12px;
        font-weight: 700;
        color: #15803d;
        display: block;
        margin-bottom: 6px;
    }

    /* 4. Added Products Cart Card */
    .purchase-mobile-cart-card {
        background: #ffffff;
        margin: 12px 14px;
        border-radius: 14px;
        padding: 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
    }

    .btn-add-item-mobile-purple {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        background: #f0fdf4;
        border: 1.5px dashed #86efac;
        color: #15803d;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-top: 10px;
    }

    /* 5. Financial Calculations Card */
    .purchase-mobile-calc-card {
        background: #ffffff;
        margin: 12px 14px;
        border-radius: 14px;
        padding: 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
    }

    .purchase-calc-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .purchase-calc-row:last-child {
        margin-bottom: 0;
    }

    .purchase-calc-label {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
    }

    .purchase-calc-input-wrap {
        display: flex;
        align-items: center;
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        padding: 4px 10px;
        width: 160px;
    }

    .purchase-calc-input {
        border: none;
        outline: none;
        background: transparent;
        width: 100%;
        text-align: right;
        font-size: 14px;
        font-weight: 600;
        color: #0f172a;
    }

    /* 6. Payment Card & Note Card */
    .purchase-mobile-payment-card,
    .purchase-mobile-note-image-card {
        background: #ffffff;
        margin: 12px 14px;
        border-radius: 14px;
        padding: 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
    }

    /* 7. Footer Bar (Sticky Save Button) */
    .purchase-mobile-footer-bar {
        position: sticky;
        bottom: 0;
        left: 0;
        right: 0;
        background: #ffffff;
        padding: 12px 14px;
        box-shadow: 0 -4px 14px rgba(0,0,0,0.12);
        z-index: 1030;
        border-top: 1.5px solid #cbd5e1;
        margin-top: 14px;
    }

    .btn-save-purchase-mobile {
        width: 100%;
        height: 50px;
        border-radius: 12px;
        background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
        border: none;
        color: #ffffff;
        font-size: 17px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(22, 163, 74, 0.35);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    #exampleModal .modal-dialog {
        max-width: 1080px !important;
        width: 95% !important;
        margin: 1.75rem auto;
    }

    #exampleModal .modal-content {
        border-radius: 20px !important;
        border: none !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35) !important;
        overflow: hidden;
        background: #ffffff;
    }

    #exampleModal .purchase-modal-header {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        padding: 18px 24px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    #exampleModal .purchase-modal-header h4 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #ffffff;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #exampleModal .purchase-modal-header .btn-close-custom {
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    #exampleModal .purchase-modal-header .btn-close-custom:hover {
        background: rgba(239, 68, 68, 0.8);
        transform: rotate(90deg);
    }

    #exampleModal .purchase-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 16px;
        margin-bottom: 20px;
    }

    #exampleModal .purchase-card-title {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    #exampleModal .search-barcode-box {
        background: #ffffff;
        border: 2px solid #0d9488;
        border-radius: 12px;
        padding: 4px;
        box-shadow: 0 4px 12px rgba(13, 148, 136, 0.1);
        transition: all 0.2s ease;
    }

    #exampleModal .search-barcode-box:focus-within {
        box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.25);
    }

    #exampleModal #productInputData {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        font-size: 15px;
        font-weight: 600;
        padding: 10px 16px;
        background: transparent;
    }

    #exampleModal #productDropdown {
        border-radius: 12px;
        border: 1px solid #cbd5e1;
        overflow: hidden;
        margin-top: 6px;
    }

    #exampleModal #productDropdown .list-group-item {
        cursor: pointer;
        transition: background-color 0.15s ease;
    }

    #exampleModal #productDropdown .list-group-item:hover {
        background-color: #f0fdf4;
    }

    #exampleModal .table-container {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
        margin: 10px 0 20px 0;
        background: #ffffff;
    }

    #exampleModal .responsive-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    #exampleModal .table-header {
        background: #0f172a;
        color: #ffffff;
    }

    #exampleModal .header-cell {
        padding: 12px 14px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #f8fafc;
        border: none;
    }

    #exampleModal .body-row {
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.2s ease;
    }

    #exampleModal .body-row:hover {
        background-color: #f8fafc;
    }

    #exampleModal .summary-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px;
    }

    #exampleModal .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px dashed #e2e8f0;
        font-size: 14px;
    }

    #exampleModal .summary-row:last-child {
        border-bottom: none;
    }

    #exampleModal .net-payable-badge {
        background: #0f172a;
        color: #ffffff;
        padding: 12px 16px;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 10px 0;
    }

    #exampleModal .btn-submit-purchase {
        background: linear-gradient(135deg, #0d9488 0%, #059669 100%);
        color: #ffffff;
        font-size: 16px;
        font-weight: 700;
        padding: 14px 28px;
        border-radius: 12px;
        border: none;
        width: 100%;
        box-shadow: 0 10px 20px -5px rgba(13, 148, 136, 0.4);
        transition: all 0.25s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
    }

    #exampleModal .btn-submit-purchase:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 25px -5px rgba(13, 148, 136, 0.5);
        background: linear-gradient(135deg, #0f766e 0%, #047857 100%);
    }

    .partial-payment-status {
        background-color: #fef3c7;
        color: #92400e;
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 12px;
    }

    .fully-paid-status {
        background-color: #dcfce7;
        color: #166534;
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 12px;
    }
</style>

<!-- Action Button Edit Modal Start -->
<section class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <!-- Sleek Header -->
            <div class="purchase-modal-header">
                <h4>
                    <i class="fa-solid fa-cart-flatbed text-teal me-1" style="color: #2dd4bf;"></i> Purchase Product (নতুন পণ্য ক্রয়)
                </h4>
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form onsubmit="return PurchaseDataSave(event)" id="purchaseCreateForm">
                <div class="p-4">
                    <!-- Top Info Cards: Supplier & Invoice Details -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-6">
                            <div class="purchase-card h-100 mb-0">
                                <div class="purchase-card-title">
                                    <i class="fa-solid fa-truck-field text-teal" style="color: #0d9488;"></i> Supplier Information (সাপ্লায়ার)
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="position-relative flex-grow-1" id="searchableSupplierWrapper">
                                        <input type="text" id="supplierSearchInput" class="form-control form-control-lg bg-white" placeholder="🔍 সাপ্লায়ার সিলেক্ট করুন *" autocomplete="off" style="font-size: 14px; border-radius: 10px;" />
                                        <input type="hidden" id="SupplierDataList" value="none">
                                        <div id="supplierDropdownList" class="dropdown-menu shadow-lg w-100 p-0 overflow-auto" style="max-height: 250px; display: none; position: absolute; z-index: 1050; top: 100%; left: 0;"></div>
                                    </div>
                                    <button type="button" class="btn text-white px-3 fw-bold text-nowrap d-flex align-items-center justify-content-center" onclick="openSupplierCreateModal()" style="border-radius: 10px; height: 48px; background-color: #0d9488;">
                                        <i class="fa-solid fa-plus me-1"></i> New
                                    </button>
                                </div>

                                <div id="supplierCreditNotice" class="mt-3 d-none">
                                    <div class="p-2 rounded-3 d-flex justify-content-between align-items-center" style="background-color: #e6fffa; border: 1.5px dashed #0d9488;">
                                        <span id="supplierCreditBadge" class="fw-bold text-dark" style="font-size: 13px;">
                                            <i class="fa-solid fa-gift me-1" style="color: #0d9488;"></i> ফেরত ব্যালেন্স আছে: <strong>৳ 0.00</strong>
                                        </span>
                                        <label class="d-flex align-items-center gap-2 mb-0 px-2 py-1 bg-white rounded border shadow-sm" style="cursor: pointer; border-color: #0d9488 !important;">
                                            <input type="checkbox" id="useReturnCreditCheckboxBanner" onchange="syncReturnCreditCheckbox(this.checked)" style="width: 18px; height: 18px; accent-color: #0d9488; cursor: pointer; margin: 0;">
                                            <span class="fw-bold small" style="color: #0d9488;">সমন্বয় করুন (Adjust)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="purchase-card h-100 mb-0">
                                <div class="purchase-card-title">
                                    <i class="fa-solid fa-file-invoice text-primary"></i> Invoice & Voucher Details
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Ref / Invoice No *</label>
                                        <input type="text" placeholder="Reference No *" id="ReferenceNo" class="form-control bg-white" style="border-radius: 8px; font-weight: 600;" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Purchase Date *</label>
                                        <input type="date" class="form-control bg-white" id="PurchaseDate" style="border-radius: 8px; font-weight: 600;" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Payable Balance</label>
                                        <input type="text" readonly placeholder="Payable Amount" id="PurchasePayableAmount" class="form-control bg-light fw-bold" style="border-radius: 8px; color: #0d9488;" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Attach Invoice Doc</label>
                                        <input type="file" id="AttachDocument" class="form-control bg-white" style="border-radius: 8px; font-size: 12px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Search & Scanner Box -->
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark fs-6 mb-1 d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-barcode me-1" style="color: #0d9488;"></i> Scan Barcode or Select Product *</span>
                            <span class="badge bg-success-subtle text-success small font-monospace"><i class="fa-solid fa-bolt me-1"></i> Auto-Cart Enabled</span>
                        </label>
                        <div class="search-barcode-box d-flex align-items-center gap-2">
                            <div class="flex-grow-1 position-relative">
                                <input type="text" id="productInputData" class="form-control" placeholder="⚡ বারকোড স্ক্যান করুন বা প্রোডাক্টের নাম/কোড টাইপ করুন (Auto-adds to list)..." autocomplete="off" />
                                <ul id="productDropdown" class="list-group position-absolute w-100 shadow-lg" style="z-index: 1050; max-height: 280px; overflow-y: auto;"></ul>
                            </div>
                            <button type="button" class="btn text-white fw-bold px-3 py-2 d-inline-flex align-items-center gap-2 text-nowrap" onclick="openPurchaseCameraScanner()" style="background-color: #0d9488; border-radius: 10px; height: 46px;">
                                <i class="fa-solid fa-camera fa-lg"></i> ক্যামেরা স্ক্যান
                            </button>
                        </div>
                    </div>

                    <!-- Cart Item Table -->
                    <div class="table-container">
                        <table class="responsive-table">
                            <thead class="table-header">
                                <tr class="header-row">
                                    <th class="header-cell">Product Name</th>
                                    <th class="header-cell">Barcodes</th>
                                    <th class="header-cell text-center" style="width: 140px;">Qty</th>
                                    <th class="header-cell" style="width: 140px;">Cost Price (৳)</th>
                                    <th class="header-cell text-end" style="width: 130px;">Sub Total</th>
                                    <th class="header-cell text-center" style="width: 60px;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-body" id="orderTableBody">
                                <!-- Dynamic Items -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Bottom Summary & Payment Details Card -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="purchase-card h-100 mb-0">
                                <div class="purchase-card-title">
                                    <i class="fa-solid fa-credit-card text-success"></i> Payment Method & Details
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Payment Method (Optional)</label>
                                        <select class="form-select bg-white" id="paymentMethod" style="border-radius: 8px;">
                                            <option value="" selected>পেমেন্ট মাধ্যম (ঐচ্ছিক)</option>
                                            <option value="Cash">💵 Cash</option>
                                            <option value="Bkash">📱 Bkash</option>
                                            <option value="Nagad">📱 Nagad</option>
                                            <option value="Bank">🏦 Bank Transfer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Paid Amount (৳)</label>
                                        <input type="number" step="any" class="form-control bg-white fw-bold" id="paidAmount" value="0" style="border-radius: 8px;" />
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="paymentDetails" class="form-control mt-1" style="display: none; border-radius: 8px;" placeholder="Enter transaction details..." />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="summary-box">
                                <div class="summary-row">
                                    <span class="text-muted fw-semibold">Total Quantity:</span>
                                    <span class="fw-bold text-dark fs-6" id="totalQuantity">0.00</span>
                                </div>
                                <div class="summary-row">
                                    <span class="text-muted fw-semibold">Grand Subtotal:</span>
                                    <span class="fw-bold text-dark fs-6">৳ <span id="totalSubTotal">0.00</span></span>
                                    <input type="hidden" id="grandSubtotal" value="0.00" />
                                </div>
                                <div class="summary-row" style="display: none;">
                                    <label style="cursor: pointer; display: inline-flex; align-items: center; gap: 8px; margin: 0;">
                                        <input type="checkbox" id="useReturnCreditCheckbox" onchange="syncReturnCreditCheckbox(this.checked)" style="width: 18px; height: 18px; accent-color: #0d9488; cursor: pointer;">
                                        <span class="fw-bold small" style="color: #0d9488;">Return Credit Adj</span>
                                    </label>
                                    <input type="number" step="0.01" min="0" class="form-control form-control-sm text-end fw-bold" id="returnAdjustmentAmount" value="0.00" disabled style="width: 110px; color: #0d9488;" oninput="calculateDuePayment()" />
                                </div>
                                <div class="net-payable-badge">
                                    <span class="fw-bold">Net Payable (প্রকৃত দেনা):</span>
                                    <span class="fw-bold fs-5" style="color: #2dd4bf;">৳ <span id="netPayableDisplay">0.00</span></span>
                                    <input type="hidden" id="netPayableAmount" value="0.00" />
                                </div>
                                <div class="summary-row">
                                    <span class="text-muted fw-semibold">Due Amount:</span>
                                    <span class="fw-bold text-danger fs-6">৳ <input type="text" id="dueAmount" value="0.00" readonly class="border-0 bg-transparent text-danger fw-bold text-end" style="width: 90px;" /></span>
                                </div>
                                <div class="summary-row border-0 pt-2">
                                    <span class="text-muted fw-semibold">Payment Status:</span>
                                    <span id="paymentStatusDisplay" class="partial-payment-status">Unpaid</span>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn-submit-purchase">
                                        <i class="fa-solid fa-circle-check fs-5 me-1"></i> Submit Purchase Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Camera Scanner Modal for Purchase -->
<div class="modal fade" id="purchaseCameraScanModal" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
            <div class="modal-header bg-dark text-white border-0 py-3">
                <h5 class="modal-title fs-6 fw-bold">
                    <i class="fa-solid fa-barcode text-success me-2"></i> প্রোডাক্ট বারকোড স্ক্যানার (Purchase)
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" onclick="stopPurchaseCameraScanner()"></button>
            </div>
            <div class="modal-body p-3 text-center bg-light">
                <div id="purchaseCameraScannerStatus" class="alert alert-info py-2 small mb-3">
                    <i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।
                </div>

                <div id="purchaseReader" style="width: 100%; min-height: 250px; background: #000; border-radius: 12px; overflow: hidden; margin: 0 auto;"></div>

                <div class="d-flex justify-content-between align-items-center mt-3 px-1">
                    <span id="purchaseLastScannedText" class="badge bg-dark text-wrap p-2" style="font-size: 13px;">স্ক্যান কৃত: -</span>
                    <button type="button" class="btn btn-outline-dark btn-sm rounded-pill" onclick="switchPurchaseCamera()">
                        <i class="fa-solid fa-camera-rotate me-1"></i> ক্যামেরা সুইচ
                    </button>
                </div>
            </div>
            <div class="modal-footer bg-light border-0 py-2">
                <button type="button" class="btn btn-secondary btn-sm w-100 rounded-pill" data-bs-dismiss="modal" onclick="stopPurchaseCameraScanner()">বন্ধ করুন (Close)</button>
            </div>
        </div>
    </div>
</div>

<!-- Purchase Item Line Modal (POS Parity Item Line Entry) -->
<div class="modal fade" id="purchaseItemLineModal" tabindex="-1" aria-hidden="true" style="z-index: 1070;">
    <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 420px;">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <!-- Teal/Emerald Header Bar -->
            <div class="d-flex align-items-center justify-content-between px-3 py-3" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); color: white;">
                <h5 class="fw-bold m-0 text-white d-flex align-items-center gap-2" style="font-size: 16px;">
                    <i class="fa-solid fa-cart-flatbed"></i>
                    <span>আইটেম ক্রয় লাইন</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" onclick="closePurchaseItemLineModal()" aria-label="Close"></button>
            </div>

            <div class="p-3 bg-white">
                <!-- Product Name -->
                <div class="mb-3 p-2 rounded-3 border" style="background: #f8fafc;">
                    <label class="form-label small text-muted mb-1 fw-bold">পণ্য নাম</label>
                    <div id="pItemNameDisplay" class="fw-extrabold text-dark fs-6"></div>
                    <input type="hidden" id="pItemProductId" />
                </div>

                <!-- Quantity (পরিমাণ) -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark mb-1">পরিমাণ (Qty) *</label>
                    <div class="input-group">
                        <button type="button" class="btn btn-outline-secondary fw-bold px-3" onclick="adjustPItemQty(-1)">-</button>
                        <input type="text" inputmode="decimal" id="pItemQty" value="১" oninput="enforceBanglaNumberInput(this); calculatePItemTotal()" class="form-control text-center fw-bold fs-5" style="border-color: #0d9488;" />
                        <button type="button" class="btn btn-outline-secondary fw-bold px-3" onclick="adjustPItemQty(1)">+</button>
                    </div>
                </div>

                <!-- Cost Price (ক্রয় মূল্য) -->
                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark mb-1">একক ক্রয় মূল্য (Cost Price ৳) *</label>
                    <div class="input-group">
                        <span class="input-group-text fw-bold bg-light" style="color: #0d9488;">৳</span>
                        <input type="text" inputmode="decimal" id="pItemCostPrice" value="০.০০" oninput="enforceBanglaNumberInput(this); calculatePItemTotal()" class="form-control fw-bold fs-5" style="border-color: #0d9488;" />
                    </div>
                </div>

                <!-- Sub-Total & Total Price Summary Card -->
                <div class="p-3 mb-3 rounded-3" style="background: #f0fdf4; border: 1px solid #bbf7d0;">
                    <div class="d-flex justify-content-between align-items-center pb-2 mb-2" style="border-bottom: 1px dashed #86efac;">
                        <span class="text-muted small fw-bold">সাব টোটাল হিসাব</span>
                        <span id="pItemBreakdownText" class="fw-bold text-dark small">১.০০ X ৳ ০.০০ = ৳ ০.০০</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-dark small">সর্বমোট ক্রয় মূল্য</span>
                        <span id="pItemTotalText" class="fw-extrabold text-success fs-5">৳ ০.০০</span>
                    </div>
                </div>

                <!-- Action Buttons: বাতিল & ঠিক আছে -->
                <div class="row g-2">
                    <div class="col-6">
                        <button type="button" onclick="closePurchaseItemLineModal()" class="btn btn-outline-secondary w-100 py-2 fw-bold" style="border-radius: 12px;">
                            বাতিল
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" onclick="confirmAddPurchaseItemLine()" class="btn text-white w-100 py-2 fw-bold" style="border-radius: 12px; background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); border: none;">
                            ঠিক আছে
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MOBILE EXCLUSIVE PURCHASE UI CONTAINER (Active on screens < 992px) -->
<div class="purchase-mobile-wrapper">
    <!-- 1. Mobile Top Green Header -->
    <div class="purchase-mobile-header">
        <a href="{{ url('admin-dashboard') }}" class="purchase-mobile-back-btn">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <h5 class="purchase-mobile-title">নতুন ক্রয়</h5>
        <button type="button" class="btn p-0 border-0 text-white d-flex align-items-center justify-content-center shadow-xs" onclick="openMobilePurchaseListModal()" style="width: 36px; height: 36px; border-radius: 50%; background: rgba(255, 255, 255, 0.2);" title="ক্রয় তালিকা">
            <i class="fa-solid fa-receipt fs-5"></i>
        </button>
    </div>

    <!-- 2. Mobile Sub-Header Info Bar (Dynamic Bill No & Date) -->
    <div class="purchase-mobile-subhead">
        <div class="d-flex justify-content-between align-items-center mb-0 gap-2">
            <div class="d-flex align-items-center gap-1">
                <span class="subhead-label text-nowrap fw-bold text-secondary" style="font-size: 13px;">বিল নম্বর :</span>
                <div class="d-flex align-items-center bg-light rounded-2 px-2 py-1 border" style="border-color: #cbd5e1 !important;">
                    <input type="text" id="mobilePurchaseInvoiceNoInput" class="form-control form-control-sm border-0 p-0 fw-extrabold text-success bg-transparent" style="width: 130px; font-size: 13px; outline: none; box-shadow: none;" placeholder="#PurID00001" value="#PurID00001" oninput="syncMobileBillNoToDesktop(this.value)" />
                    <button type="button" class="btn btn-link text-success p-0 ms-1 border-0 d-flex align-items-center" onclick="generateNewDynamicBillNo(true)" title="নতুন বিল নম্বর জেনারেট করুন">
                        <i class="fa-solid fa-rotate fs-6"></i>
                    </button>
                </div>
            </div>
            <div class="d-flex align-items-center gap-1">
                <span class="subhead-label text-nowrap fw-bold text-secondary" style="font-size: 13px;">তারিখ :</span>
                <div class="d-flex align-items-center bg-light rounded-2 px-1.5 py-1 border" style="border-color: #cbd5e1 !important;">
                    <input type="date" id="mobilePurchaseDate" class="form-control form-control-sm border-0 p-0 fw-bold text-dark bg-transparent" style="width: 110px; font-size: 12px; outline: none; box-shadow: none;" value="{{ date('Y-m-d') }}" onchange="syncMobileDateToDesktop(this.value)" />
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Supplier Field Group ("পার্টি যোগ করুন") -->
    <div class="purchase-mobile-field-group">
        <label class="field-group-label-purple">পার্টি যোগ করুন</label>
        <div class="d-flex align-items-center justify-content-between">
            <div class="flex-grow-1" id="mobileSupplierSelectBox" onclick="openMobileSupplierSearchModal()" style="cursor: pointer;">
                <span id="mobileSupplierNameDisplay" class="fw-bold text-muted" style="font-size: 15px;">সাপ্লায়ার সিলেক্ট করুন</span>
            </div>
            <button type="button" class="btn border-0 text-success p-1 ms-2" onclick="openMobileSupplierSearchModal()" style="color: #15803d;">
                <i class="fa-solid fa-circle-info fs-5"></i>
            </button>
        </div>
    </div>

    <!-- 3.5. Selected Supplier Info Details Card -->
    <div id="mobileSupplierDetailsCard" class="purchase-mobile-field-group d-none mb-3" style="background: #f0fdf4; border-color: #bbf7d0;">
        <div class="row g-2" style="font-size: 12px;">
            <div class="col-6">
                <span class="text-muted d-block">নাম</span>
                <a id="mobileSuppCardProfileLink" href="#" class="fw-bold text-success text-decoration-underline d-inline-flex align-items-center gap-1" title="সাপ্লায়ার প্রোফাইল দেখুন">
                    <span id="mobileSuppCardName" class="text-success"></span>
                    <i class="fa-solid fa-arrow-up-right-from-square text-muted" style="font-size: 10px;"></i>
                </a>
            </div>
            <div class="col-6">
                <span class="text-muted d-block">মোবাইল</span>
                <strong id="mobileSuppCardMobile" class="text-dark"></strong>
            </div>
            <div class="col-6">
                <span class="text-muted d-block">কোম্পানি</span>
                <strong id="mobileSuppCardCompany" class="text-dark"></strong>
            </div>
            <div class="col-6">
                <span class="text-muted d-block">পূর্বে দেয়</span>
                <strong id="mobileSuppCardPayable" class="text-danger">৳ 0.00</strong>
            </div>
        </div>
    </div>

    <!-- 3.6. Dedicated Supplier Invoice No Field Group -->
    <div class="purchase-mobile-field-group">
        <label class="field-group-label-purple d-flex align-items-center justify-content-between">
            <span>সাপ্লায়ার ইনভয়েস নম্বর (Supplier Invoice No)</span>
            <button type="button" class="btn btn-link text-success p-0 border-0 fw-bold small text-decoration-none" onclick="autoGenerateSupplierInvoiceNo()" style="font-size: 11px;">
                <i class="fa-solid fa-rotate me-1"></i>অটো জেনারেট
            </button>
        </label>
        <div>
            <input type="text" id="mobilePurchaseRefNo" class="form-control fw-bold" placeholder="সাপ্লায়ারের ইনভয়েস/মেমো নম্বর লিখুন (e.g. INV-1002)..." value="" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="syncMobileRefNoToDesktop(this.value)" />
        </div>
    </div>

    <!-- 4. Added Products Cart Card -->
    <div class="purchase-mobile-cart-card">
        <div id="mobilePurchaseCartItemsList">
            <div class="text-center py-4 text-muted" id="mobilePurchaseCartEmptyMsg">
                <i class="fa-solid fa-box-open fs-3 mb-2 text-secondary"></i>
                <p class="mb-0 small">এখনও কোনো আইটেম যোগ করা হয়নি</p>
            </div>
        </div>

        <!-- Add Item Button -->
        <button type="button" class="btn-add-item-mobile-purple" onclick="openMobilePurchaseProductSearchModal()">
            <i class="fa-solid fa-circle-plus me-1"></i> আইটেম যোগ করুন
        </button>
    </div>

    <!-- 5. Financial Calculations Summary Card -->
    <div class="purchase-mobile-calc-card">
        <div class="purchase-calc-row">
            <span class="purchase-calc-label">মোট মূল্য</span>
            <div class="purchase-calc-input-wrap">
                <span class="me-1">৳</span>
                <input type="text" readonly id="mobilePurchaseGrossTotal" value="০.০০" class="purchase-calc-input" />
            </div>
        </div>
        <div class="purchase-calc-row">
            <span class="purchase-calc-label">সর্বমোট মূল্য</span>
            <div class="purchase-calc-input-wrap">
                <span class="me-1">৳</span>
                <input type="text" readonly id="mobilePurchaseNetTotal" value="০.০০" class="purchase-calc-input fw-bold" />
            </div>
        </div>
        <div class="purchase-calc-row">
            <span class="purchase-calc-label">পরিশোধিত মূল্য</span>
            <div class="purchase-calc-input-wrap">
                <span class="me-1">৳</span>
                <input type="text" inputmode="decimal" id="mobilePurchasePaidInput" oninput="enforceBanglaNumberInput(this); syncMobilePurchaseCalcInputs()" placeholder="০.০০" class="purchase-calc-input" />
            </div>
        </div>
        <div class="purchase-calc-row">
            <span class="purchase-calc-label">বাকি</span>
            <div class="purchase-calc-input-wrap">
                <span class="me-1">৳</span>
                <input type="text" readonly id="mobilePurchaseDueInput" value="০.০০" class="purchase-calc-input text-danger fw-bold" />
            </div>
        </div>
    </div>

    <!-- 6. Payment Method Section -->
    <div class="purchase-mobile-payment-card">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <span class="fw-bold text-dark" style="font-size: 14px;">
                পেমেন্টের মাধ্যম <i class="fa-solid fa-circle-info text-muted ms-1" style="font-size: 13px;"></i>
            </span>
        </div>
        <div class="mb-2">
            <select id="mobilePurchasePaymentMethod" class="form-select fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1;">
                <option value="" selected>পেমেন্ট মাধ্যম (ঐচ্ছিক)</option>
                <option value="Cash">💵 Cash</option>
                <option value="Bkash">📱 Bkash</option>
                <option value="Nagad">📱 Nagad</option>
                <option value="Bank">🏦 Bank Transfer</option>
                <option value="Credit">💳 Credit / Due</option>
            </select>
        </div>
    </div>

    <!-- 7. Additional Note & Document Attachment Card -->
    <div class="purchase-mobile-note-image-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="form-check-label d-flex align-items-center gap-2 fw-bold text-dark cursor-pointer m-0" style="font-size: 14px;">
                <span>লেনদেনের মেসেজ পাঠান</span>
                <input type="checkbox" id="mobilePurchaseSendSms" class="form-check-input m-0" style="width: 18px; height: 18px; border-radius: 4px;" />
            </label>
        </div>

        <div class="row g-2">
            <div class="col-8">
                <textarea id="mobilePurchaseNote" maxlength="250" placeholder="বর্ণনা (০/২৫০)" class="form-control fw-bold" style="height: 85px; border-radius: 10px; font-size: 13px; border: 1.5px solid #cbd5e1; resize: none;"></textarea>
            </div>
            <div class="col-4">
                <div class="image-upload-box border rounded-3 p-1 d-flex flex-column align-items-center justify-content-center text-center cursor-pointer" onclick="triggerMobilePurchaseDocUpload()" style="height: 85px; background: #f0fdf4; border: 1.5px dashed #86efac !important;">
                    <input type="file" id="mobilePurchaseDocImage" accept="image/*" class="d-none" onchange="previewMobilePurchaseDocImage(this)" />
                    <div id="mobilePurImagePlaceholder">
                        <i class="fa-solid fa-circle-plus text-success fs-4 mb-1" style="color: #15803d;"></i>
                        <div class="small text-muted" style="font-size: 10px;">ছবি যুক্ত করুন</div>
                    </div>
                    <img id="mobilePurImagePreview" src="" alt="Preview" class="d-none w-100 h-100 object-fit-cover rounded-2" />
                </div>
            </div>
        </div>
    </div>

    <!-- 8. Sticky & Inline Save Button Bar -->
    <div class="purchase-mobile-footer-bar my-3">
        <button type="button" class="btn-save-purchase-mobile shadow-sm" onclick="confirmSaveMobilePurchase()">
            <i class="fa-solid fa-floppy-disk fs-5"></i> সেভ করুন (Save Purchase)
        </button>
    </div>
</div>

<!-- MOBILE PURCHASE MODAL 1: Product Search & Selection Modal -->
<div class="modal fade" id="mobilePurchaseProductSearchModal" tabindex="-1" aria-hidden="true" style="z-index: 1080;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="modal-title fw-bold text-dark">প্রোডাক্ট নির্বাচন করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="position-relative flex-grow-1">
                        <input type="text" id="mobilePurchaseProductSearchInput" class="form-control form-control-lg pe-5 m-0" placeholder="প্রোডাক্ট নাম বা বারকোড লিখে খুঁজুন..." oninput="filterMobilePurchaseProducts(this.value)" style="border-radius: 12px; font-size: 14px; height: 48px;" />
                        <button type="button" class="btn p-0 border-0 position-absolute end-0 top-50 translate-middle-y me-2 text-success" onclick="openMobilePurchaseCameraScanner()" style="width: 36px; height: 36px; border-radius: 8px; background: #f0fdf4;" title="ক্যামেরা বারকোড স্ক্যানার">
                            <i class="fa-solid fa-camera fs-5" style="color: #15803d;"></i>
                        </button>
                    </div>
                    <button type="button" class="btn btn-success fw-bold text-nowrap px-3 d-inline-flex align-items-center gap-1 shadow-xs" onclick="openProductCreateModalFromMobile()" style="height: 48px; border-radius: 12px; font-size: 13px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; color: #ffffff; white-space: nowrap;">
                        <i class="fa-solid fa-plus"></i> নতুন প্রোডাক্ট
                    </button>
                </div>
                <div id="mobilePurchaseProductResultsList" class="list-group list-group-flush">
                    <!-- Product items dynamically rendered -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MOBILE PURCHASE BARCODE CAMERA SCANNER MODAL -->
<div class="modal fade" id="mobilePurchaseBarcodeScannerModal" tabindex="-1" aria-hidden="true" style="z-index: 1095;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
            <div class="modal-header border-bottom py-3 px-4" style="background: #f0fdf4;">
                <h5 class="modal-title fw-extrabold text-success m-0" style="color: #15803d; font-size: 17px;">
                    <i class="fa-solid fa-camera me-2"></i> ক্যামেরা বারকোড স্ক্যানার
                </h5>
                <button type="button" class="btn-close" onclick="stopMobilePurchaseCameraScanner()"></button>
            </div>
            <div class="modal-body p-3 text-center">
                <div id="mobilePurCamScannerStatus" class="alert alert-info py-2 small mb-3">
                    <i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে...
                </div>
                <div id="mobilePurCameraReaderContainer" class="rounded-3 overflow-hidden border shadow-inner mb-3" style="width: 100%; min-height: 250px; background: #000;">
                    <div id="mobilePurCameraReader" style="width: 100%;"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center px-1">
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill fw-bold px-3" onclick="switchMobilePurCameraFacingMode()">
                        <i class="fa-solid fa-camera-rotate me-1"></i> ক্যামেরা ঘুরান
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm rounded-pill fw-bold px-3" onclick="stopMobilePurchaseCameraScanner()">
                        বন্ধ করুন
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MOBILE PURCHASE MODAL 2: Item Line Quantity & Cost Price Editing Modal ("নতুন আইটেম লাইন") -->
<div class="modal fade" id="mobilePurchaseItemLineModal" tabindex="-1" aria-hidden="true" style="z-index: 1090;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.25);">
            <div class="modal-header border-bottom py-3 px-4" style="background: #f0fdf4;">
                <h5 class="modal-title fw-extrabold text-success m-0" style="color: #15803d; font-size: 17px;">
                    <i class="fa-solid fa-boxes-packing me-1"></i> নতুন আইটেম লাইন
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" id="mobilePurItemLineProductId" />
                <div class="mb-3">
                    <label class="form-label text-muted small fw-bold mb-1">পণ্য/সার্ভিস</label>
                    <input type="text" id="mobilePurItemLineProductName" readonly class="form-control form-control-lg fw-bold bg-light" style="border-radius: 12px;" />
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold mb-1">পরিমাণ (Qty)</label>
                        <input type="text" inputmode="decimal" id="mobilePurItemLineQty" class="form-control form-control-lg fw-bold text-center" style="border-radius: 12px; border: 2px solid #86efac;" oninput="enforceBanglaNumberInput(this); calculateMobilePurchaseItemLineTotal()" />
                    </div>
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold mb-1">ক্রয় মূল্য (Cost Price)</label>
                        <input type="text" inputmode="decimal" id="mobilePurItemLinePrice" class="form-control form-control-lg fw-bold text-center" style="border-radius: 12px; border: 2px solid #86efac;" oninput="enforceBanglaNumberInput(this); calculateMobilePurchaseItemLineTotal()" />
                    </div>
                </div>
                <div class="p-3 bg-light rounded-3 text-center mb-4 border" style="border-color: #bbf7d0 !important; background: #f0fdf4;">
                    <div class="small text-muted mb-1" id="mobilePurItemLineBreakdown">১ X ৳ 0.00 = ৳ 0.00</div>
                    <div class="fs-4 fw-extrabold text-success" id="mobilePurItemLineTotalText" style="color: #15803d;">৳ 0.00</div>
                </div>
                <div class="row g-2">
                    <div class="col-6">
                        <button type="button" class="btn btn-outline-secondary w-100 py-2.5 fw-bold" style="border-radius: 12px;" data-bs-dismiss="modal">বাতিল</button>
                    </div>
                    <div class="col-6">
                        <button type="button" onclick="confirmAddMobilePurchaseItemLine()" class="btn text-white w-100 py-2.5 fw-bold" style="border-radius: 12px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none;">ঠিক আছে</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MOBILE PURCHASE MODAL 2.5: Purchase List Modal ("ক্রয় তালিকা") -->
<div class="modal fade" id="mobilePurchaseListModal" tabindex="-1" aria-hidden="true" style="z-index: 1085;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.25);">
            <div class="modal-header border-bottom py-3 px-4" style="background: #f0fdf4;">
                <h5 class="modal-title fw-extrabold text-success m-0" style="color: #15803d; font-size: 17px;">
                    <i class="fa-solid fa-receipt me-2"></i> ক্রয় তালিকা (Purchase List)
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 bg-light">
                <div class="mb-3">
                    <input type="text" id="mobilePurchaseListSearchInput" class="form-control form-control-lg fw-bold" placeholder="বিল নম্বর বা সাপ্লায়ার নাম লিখে খুঁজুন..." oninput="filterMobilePurchaseListModal(this.value)" style="border-radius: 12px; font-size: 14px; border: 1.5px solid #cbd5e1;" />
                </div>
                <div id="mobilePurchaseListCardsContainer">
                    <!-- Dynamic Purchase Cards Rendered Here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MOBILE PURCHASE MODAL 3: Supplier Search & Selection Modal -->
<div class="modal fade" id="mobileSupplierSearchModal" tabindex="-1" aria-hidden="true" style="z-index: 1080;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark">পার্টি / সাপ্লায়ার নির্বাচন করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <input type="text" id="mobileSupplierSearchInput" class="form-control form-control-lg flex-grow-1" placeholder="সাপ্লায়ার নাম বা মোবাইল লিখে খুঁজুন..." oninput="filterMobileSuppliers(this.value)" />
                    <button type="button" class="btn btn-success fw-bold text-nowrap py-2.5 px-3" style="border-radius: 12px; background: #16a34a; border: none;" onclick="openSupplierCreateModal(); hideMobileModal('mobileSupplierSearchModal');">
                        + নতুন সাপ্লায়ার
                    </button>
                </div>
                <div id="mobileSupplierResultsList" class="list-group list-group-flush">
                    <!-- Supplier items dynamically rendered -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const paidAmountInput = document.getElementById("paidAmount");
        const dueAmountInput = document.getElementById("dueAmount");
        const grandSubtotalInput = document.getElementById("grandSubtotal");
        const paymentStatusDisplay = document.getElementById("paymentStatusDisplay");

        window.syncReturnCreditCheckbox = function(isChecked) {
            const tableCb = document.getElementById("useReturnCreditCheckbox");
            const bannerCb = document.getElementById("useReturnCreditCheckboxBanner");
            if (tableCb) tableCb.checked = isChecked;
            if (bannerCb) bannerCb.checked = isChecked;

            toggleReturnCreditAdjustment();
        };

        window.toggleReturnCreditAdjustment = function() {
            const checkbox = document.getElementById("useReturnCreditCheckbox");
            const returnAdjInput = document.getElementById("returnAdjustmentAmount");
            const maxCredit = parseFloat(window.availableSupplierCredit || 0);

            if (checkbox && checkbox.checked) {
                returnAdjInput.disabled = false;
                returnAdjInput.style.backgroundColor = "#ffffff";
                returnAdjInput.setAttribute("max", maxCredit);
                returnAdjInput.value = maxCredit > 0 ? maxCredit.toFixed(2) : "0.00";
            } else {
                returnAdjInput.value = "0.00";
                returnAdjInput.disabled = true;
                returnAdjInput.style.backgroundColor = "#f1f5f9";
            }

            calculateDuePayment();
        };

        window.calculateDuePayment = function() {
            let grandSubtotal = parseBanglaFloat(grandSubtotalInput.value) || 0;
            let checkbox = document.getElementById("useReturnCreditCheckbox");
            let returnAdjInput = document.getElementById("returnAdjustmentAmount");
            let netPayableInput = document.getElementById("netPayableAmount");
            let netDisplay = document.getElementById("netPayableDisplay");
            
            let returnAdj = 0;
            if (checkbox && checkbox.checked) {
                let maxCredit = parseBanglaFloat(window.availableSupplierCredit || 0);
                returnAdj = parseBanglaFloat(returnAdjInput.value) || 0;

                if (returnAdj > maxCredit) {
                    returnAdj = maxCredit;
                    returnAdjInput.value = maxCredit.toFixed(2);
                }
                if (returnAdj > grandSubtotal) {
                    returnAdj = grandSubtotal;
                    returnAdjInput.value = grandSubtotal.toFixed(2);
                }
            } else {
                if (returnAdjInput) returnAdjInput.value = "0.00";
            }

            let netPayable = Math.max(0, grandSubtotal - returnAdj);
            if (netPayableInput) netPayableInput.value = netPayable.toFixed(2);
            if (netDisplay) netDisplay.textContent = netPayable.toFixed(2);

            let paidAmount = parseBanglaFloat(paidAmountInput.value) || 0;
            let dueAmount = Math.max(0, netPayable - paidAmount);

            dueAmountInput.value = dueAmount.toFixed(2);

            if (paidAmount === 0 && netPayable > 0) {
                paymentStatusDisplay.textContent = "Unpaid";
                paymentStatusDisplay.className = "partial-payment-status bg-danger text-white";
            } else if (paidAmount < netPayable) {
                paymentStatusDisplay.textContent = "Partial Paid";
                paymentStatusDisplay.className = "partial-payment-status";
            } else {
                paymentStatusDisplay.textContent = "Fully Paid";
                paymentStatusDisplay.className = "fully-paid-status";
            }
        };

        paidAmountInput.addEventListener("input", calculateDuePayment);
        calculateDuePayment();
    });
</script>

<script>
    let allSuppliersData = [];

    function openSupplierCreateModal() {
        const modal = document.getElementById('supplierCreateModal') || document.getElementById('myModal');
        if (modal) {
            if (modal.parentNode && modal.parentNode !== document.body) {
                document.body.appendChild(modal);
            }
            modal.style.setProperty('display', 'block', 'important');
            modal.style.opacity = '1';
            modal.style.visibility = 'visible';
            setTimeout(() => {
                modal.classList.add('show');
                modal.classList.add('show-modal');
                const firstInput = document.getElementById('supplierName');
                if (firstInput) firstInput.focus();
            }, 20);
        } else {
            errorToast("Supplier Create Modal not found!");
        }
    }

    async function refreshSupplierList(selectedSupplierId = null) {
        try {
            const res = await axios.get("/api/supplier-list", HeaderToken());
            allSuppliersData = res.data.SupplierData || [];

            renderSupplierDropdownItems(allSuppliersData);

            if (selectedMobileSupplier) {
                const refreshed = allSuppliersData.find(s => s.id == selectedMobileSupplier.id);
                if (refreshed && typeof selectMobileSupplierItem === 'function') {
                    selectMobileSupplierItem(refreshed.id);
                }
            } else if (selectedSupplierId) {
                const found = allSuppliersData.find(s => s.id == selectedSupplierId);
                if (found) {
                    if (typeof selectSupplierItem === 'function') {
                        selectSupplierItem(found);
                    }
                    if (typeof selectMobileSupplierItem === 'function') {
                        selectMobileSupplierItem(found.id);
                    }
                }
            } else {
                selectedMobileSupplier = null;
                const displayEl = document.getElementById("mobileSupplierNameDisplay");
                if (displayEl) {
                    displayEl.textContent = "সাপ্লায়ার সিলেক্ট করুন";
                    displayEl.className = "fw-bold text-muted";
                }
                const card = document.getElementById("mobileSupplierDetailsCard");
                if (card) card.classList.add("d-none");

                const suppInput = document.getElementById("supplierSearchInput");
                if (suppInput) suppInput.value = "";
                const suppVal = document.getElementById("SupplierDataList");
                if (suppVal) suppVal.value = "none";
            }
        } catch (error) {
            console.error("Error occurred while fetching Suppliers:", error);
        }
    }

    function renderSupplierDropdownItems(suppliers) {
        const listContainer = document.getElementById("supplierDropdownList");
        if (!listContainer) return;

        if (!suppliers || suppliers.length === 0) {
            listContainer.innerHTML = `<div class="p-2 text-muted text-center small">No suppliers found</div>`;
            return;
        }

        let html = suppliers.map(s => {
            const creditVal = parseFloat(s.return_credit_balance || 0);
            const creditLabel = creditVal > 0 ? `<span class="badge bg-teal ms-1" style="background:#0d9488;">🎁 ৳${creditVal.toFixed(2)}</span>` : '';
            const payable = parseFloat(s.purchase_payable_amount || 0);
            const payableLabel = payable > 0 ? `<span class="badge bg-danger ms-1">দেয়: ৳${payable.toFixed(2)}</span>` : '';

            return `
                <div class="dropdown-item px-3 py-2 border-bottom supplier-select-item"
                     data-id="${s.id}"
                     data-name="${s.name}"
                     data-payable="${payable}"
                     data-credit="${creditVal}"
                     style="cursor: pointer;">
                     <div class="fw-bold text-dark">${s.name} ${s.company ? `<small class="text-muted">(${s.company})</small>` : ''}</div>
                     <div class="small text-muted">${s.mobile || ''} ${payableLabel} ${creditLabel}</div>
                </div>
            `;
        }).join('');

        listContainer.innerHTML = html;

        listContainer.querySelectorAll('.supplier-select-item').forEach(item => {
            item.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const payable = this.getAttribute('data-payable');
                const credit = parseFloat(this.getAttribute('data-credit')) || 0;

                selectSupplierItem({ id, name, payable, credit });
                listContainer.style.display = 'none';
            });
        });
    }

    function selectSupplierItem(s) {
        document.getElementById("SupplierDataList").value = s.id;
        document.getElementById("supplierSearchInput").value = s.name;
        document.getElementById("PurchasePayableAmount").value = s.payable || 0;

        window.availableSupplierCredit = s.credit || 0;

        const creditNotice = document.getElementById("supplierCreditNotice");
        const creditBadge = document.getElementById("supplierCreditBadge");
        const returnAdjInput = document.getElementById("returnAdjustmentAmount");

        if (typeof syncReturnCreditCheckbox === 'function') {
            syncReturnCreditCheckbox(false);
        }

        if (s.credit > 0) {
            creditBadge.innerHTML = `<i class="fa-solid fa-gift me-1" style="color: #0d9488;"></i> ফেরত ব্যালেন্স আছে: <strong>৳ ${s.credit.toFixed(2)}</strong>`;
            creditNotice.classList.remove("d-none");
            returnAdjInput.setAttribute("max", s.credit);
        } else {
            creditNotice.classList.add("d-none");
            returnAdjInput.setAttribute("max", "0");
        }

        if (typeof calculateDuePayment === 'function') {
            calculateDuePayment();
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const suppInput = document.getElementById("supplierSearchInput");
        const suppList = document.getElementById("supplierDropdownList");

        if (suppInput && suppList) {
            suppInput.addEventListener("focus", function() {
                suppList.style.display = "block";
                renderSupplierDropdownItems(allSuppliersData);
            });

            suppInput.addEventListener("input", function() {
                const query = this.value.toLowerCase().trim();
                suppList.style.display = "block";

                const filtered = allSuppliersData.filter(s =>
                    (s.name && s.name.toLowerCase().includes(query)) ||
                    (s.mobile && s.mobile.toLowerCase().includes(query)) ||
                    (s.company && s.company.toLowerCase().includes(query))
                );

                renderSupplierDropdownItems(filtered);
            });

            document.addEventListener("click", function(e) {
                const wrapper = document.getElementById("searchableSupplierWrapper");
                if (wrapper && !wrapper.contains(e.target)) {
                    suppList.style.display = "none";
                }
            });
        }
    });

    refreshSupplierList();

    /* ========================================================
       Camera Scanner for Purchase Product Input
       ======================================================== */
    let purchaseHtml5QrCode = null;
    let purchaseFacingMode = "environment";
    let lastPurchaseScannedCode = "";
    let purchaseScanTimer = null;

    function openPurchaseCameraScanner() {
        const modalEl = new bootstrap.Modal(document.getElementById('purchaseCameraScanModal'));
        modalEl.show();
        setTimeout(() => {
            startPurchaseCameraScanner();
        }, 350);
    }

    function startPurchaseCameraScanner() {
        if (purchaseHtml5QrCode && purchaseHtml5QrCode.isScanning) {
            purchaseHtml5QrCode.stop().then(() => initPurchaseHtml5QrCode()).catch(() => initPurchaseHtml5QrCode());
        } else {
            initPurchaseHtml5QrCode();
        }
    }

    function initPurchaseHtml5QrCode() {
        const statusEl = document.getElementById("purchaseCameraScannerStatus");
        if (statusEl) {
            statusEl.className = "alert alert-info py-2 small mb-3";
            statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।';
        }

        if (!purchaseHtml5QrCode) {
            purchaseHtml5QrCode = new Html5Qrcode("purchaseReader");
        }

        const config = {
            fps: 15,
            qrbox: { width: 260, height: 160 },
            aspectRatio: 1.333334
        };

        purchaseHtml5QrCode.start(
            { facingMode: purchaseFacingMode },
            config,
            onPurchaseBarcodeDetectedSuccess,
            onPurchaseBarcodeDetectedError
        ).then(() => {
            if (statusEl) {
                statusEl.className = "alert alert-success py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-video me-1"></i> ক্যামেরা সক্রিয়! বারকোড স্ক্যান করলে সরাসরি পারচেজ টেবিলে যোগ হবে।';
            }
        }).catch(err => {
            console.error("Purchase Camera start error:", err);
            if (statusEl) {
                statusEl.className = "alert alert-danger py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> ক্যামেরা চালু করা যায়নি! ব্রাউজারের ক্যামেরা পারমিশন এলাউ করুন।';
            }
        });
    }

    function onPurchaseBarcodeDetectedSuccess(decodedText) {
        if (!decodedText || decodedText === lastPurchaseScannedCode) return;

        lastPurchaseScannedCode = decodedText;
        const lastTextEl = document.getElementById("purchaseLastScannedText");
        if (lastTextEl) lastTextEl.innerText = `স্ক্যান কৃত: ${decodedText}`;

        if (navigator.vibrate) navigator.vibrate(100);
        playScanBeepSound();

        const codeClean = decodedText.trim().toLowerCase();
        const matched = allProducts.find(p => isExactCodeMatch(p, codeClean));

        if (matched) {
            addProductToOrder(matched);
            successToast(`স্ক্যান করা হয়েছে: ${matched.product_name}`);
        } else {
            errorToast(`প্রোডাক্ট পাওয়া যায়নি: ${decodedText}`);
        }

        clearTimeout(purchaseScanTimer);
        purchaseScanTimer = setTimeout(() => {
            lastPurchaseScannedCode = "";
        }, 1200);
    }

    function onPurchaseBarcodeDetectedError(msg) {}

    function switchPurchaseCamera() {
        purchaseFacingMode = (purchaseFacingMode === "environment") ? "user" : "environment";
        startPurchaseCameraScanner();
    }

    function stopPurchaseCameraScanner() {
        if (purchaseHtml5QrCode && purchaseHtml5QrCode.isScanning) {
            purchaseHtml5QrCode.stop().then(() => {
                purchaseHtml5QrCode.clear();
            }).catch(() => {});
        }
    }

    function playScanBeepSound() {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.type = "sine";
            osc.frequency.setValueAtTime(880, ctx.currentTime);
            gain.gain.setValueAtTime(0.2, ctx.currentTime);
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.start();
            osc.stop(ctx.currentTime + 0.12);
        } catch (e) {}
    }
</script>

<script>
    function formatProductCode(productCode) {
        if (!productCode) return '';
        try {
            if (Array.isArray(JSON.parse(productCode))) {
                return JSON.parse(productCode).join(', ');
            }
        } catch (e) {
            return productCode;
        }
        return productCode;
    }
</script>

<script>
    const paymentMethodSelect = document.getElementById('paymentMethod');
    const paymentDetailsInput = document.getElementById('paymentDetails');

    paymentMethodSelect.addEventListener('change', function() {
        const selectedMethod = this.value;

        if (['Bkash', 'Nagad', 'Bank'].includes(selectedMethod)) {
            paymentDetailsInput.style.display = 'block';
            paymentDetailsInput.placeholder = `Enter ${selectedMethod} transaction details`;
        } else {
            paymentDetailsInput.style.display = 'none';
            paymentDetailsInput.value = '';
        }
    });

    let allProducts = [];

    async function ProductDataShow() {
        try {
            let res = await axios.get("/api/product-list", HeaderToken());
            allProducts = res.data.ProductData || [];
        } catch (error) {
            console.error("Error occurred while fetching products:", error);
        }
    }

    ProductDataShow();

    // Check if query matches exact code/barcode or exact name
    function isExactCodeMatch(product, query) {
        if (!product || !query) return false;
        const q = query.trim().toLowerCase();
        if (!q) return false;

        if (product.product_code) {
            let strCode = product.product_code.toString().toLowerCase();
            try {
                let parsed = JSON.parse(product.product_code);
                if (Array.isArray(parsed)) {
                    if (parsed.some(c => c.toString().trim().toLowerCase() === q)) return true;
                } else if (parsed.toString().trim().toLowerCase() === q) {
                    return true;
                }
            } catch (e) {
                if (strCode.trim() === q) return true;
            }
            if (strCode.trim() === q) return true;
        }

        if (product.product_name && product.product_name.trim().toLowerCase() === q) return true;

        return false;
    }

    // Auto-Add product when code is typed/scanned into input
    document.getElementById('productInputData').addEventListener('input', function() {
        const searchValue = this.value.trim().toLowerCase();
        const productDropdown = document.getElementById('productDropdown');

        if (!searchValue) {
            productDropdown.innerHTML = '';
            return;
        }

        // 1. Check for EXACT barcode/code match
        const exactMatch = allProducts.find(product => isExactCodeMatch(product, searchValue));
        if (exactMatch) {
            addProductToOrder(exactMatch);
            this.value = '';
            productDropdown.innerHTML = '';
            playScanBeepSound();
            successToast(`স্ক্যান করা হয়েছে: ${exactMatch.product_name}`);
            return;
        }

        // 2. Filter dropdown
        const filteredProducts = allProducts.filter(product => {
            const nameMatch = product.product_name && product.product_name.toLowerCase().includes(searchValue);
            const codeMatch = product.product_code && product.product_code.toString().toLowerCase().includes(searchValue);
            return nameMatch || codeMatch;
        });

        productDropdown.innerHTML = '';

        if (filteredProducts.length === 0) {
            productDropdown.innerHTML = '<li class="list-group-item text-muted text-center small py-2">কোনো প্রোডাক্ট পাওয়া যায়নি</li>';
            return;
        }

        filteredProducts.forEach(product => {
            const productItem = document.createElement('li');
            productItem.classList.add('list-group-item', 'list-group-item-action', 'd-flex', 'justify-content-between', 'align-items-center', 'py-2', 'px-3');
            
            const formattedCode = formatProductCode(product.product_code);
            productItem.innerHTML = `
                <div>
                    <strong class="text-dark">${product.product_name}</strong>
                    <div class="small text-muted">স্টক: ${product.quantity || 0} | কেনা মূল্য: ৳${parseFloat(product.cost_price || 0).toFixed(2)}</div>
                </div>
                <span class="badge bg-light text-dark border font-monospace">${formattedCode}</span>
            `;

            productItem.addEventListener('click', function() {
                addProductToOrder(product);
                productDropdown.innerHTML = '';
                document.getElementById('productInputData').value = '';
                document.getElementById('productInputData').focus();
            });

            productDropdown.appendChild(productItem);
        });
    });

    // Enter Keypress Handler for Barcode Guns
    document.getElementById('productInputData').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const searchValue = this.value.trim().toLowerCase();
            if (!searchValue) return;

            const exactMatch = allProducts.find(product => isExactCodeMatch(product, searchValue));
            const matched = exactMatch || allProducts.find(product => {
                const nameMatch = product.product_name && product.product_name.toLowerCase().includes(searchValue);
                const codeMatch = product.product_code && product.product_code.toString().toLowerCase().includes(searchValue);
                return nameMatch || codeMatch;
            });

            if (matched) {
                addProductToOrder(matched);
                this.value = '';
                document.getElementById('productDropdown').innerHTML = '';
                playScanBeepSound();
                successToast(`কার্টে যোগ হয়েছে: ${matched.product_name}`);
            } else {
                errorToast(`প্রোডাক্ট কোড বা নাম পাওয়া যায়নি: ${this.value}`);
            }
        }
    });

    let currentSelectedProductForPurchase = null;

    function addProductToOrder(product) {
        openPurchaseItemLineModal(product);
    }

    function openPurchaseItemLineModal(product) {
        if (!product) return;
        currentSelectedProductForPurchase = product;

        const modalEl = document.getElementById('purchaseItemLineModal');
        if (!modalEl) {
            console.error("purchaseItemLineModal element not found!");
            return;
        }

        if (modalEl.parentNode && modalEl.parentNode !== document.body) {
            document.body.appendChild(modalEl);
        }

        const orderTableBody = document.getElementById('orderTableBody');
        const existingRows = orderTableBody ? orderTableBody.querySelectorAll('tr.body-row') : [];
        let existingRow = null;

        existingRows.forEach(row => {
            const pIdCell = row.cells[1] || row.querySelector('.product-id-val');
            if (pIdCell && pIdCell.innerText.trim() == product.id) {
                existingRow = row;
            }
        });

        let defaultQty = 1;
        let defaultCost = parseFloat(product.cost_price || 0);

        if (existingRow) {
            const qtyInput = existingRow.querySelector('.quantity');
            const costInput = existingRow.querySelector('.cost-price');
            if (qtyInput) defaultQty = parseFloat(parseBanglaFloat(qtyInput.value)) || 1;
            if (costInput) defaultCost = parseFloat(parseBanglaFloat(costInput.value)) || defaultCost;
        }

        document.getElementById('pItemNameDisplay').innerText = product.product_name || 'N/A';
        document.getElementById('pItemProductId').value = product.id;
        document.getElementById('pItemQty').value = engToBanglaNum(defaultQty);
        document.getElementById('pItemCostPrice').value = engToBanglaNum(defaultCost.toFixed(2));

        calculatePItemTotal();

        modalEl.style.setProperty('z-index', '1095', 'important');
        modalEl.style.setProperty('display', 'block', 'important');
        modalEl.style.opacity = '1';
        modalEl.style.visibility = 'visible';
        modalEl.classList.add('show');

        let backdrop = document.getElementById('purchaseItemLineBackdrop');
        if (!backdrop) {
            backdrop = document.createElement('div');
            backdrop.id = 'purchaseItemLineBackdrop';
            backdrop.className = 'modal-backdrop fade show';
            backdrop.style.setProperty('z-index', '1090', 'important');
            backdrop.onclick = closePurchaseItemLineModal;
            document.body.appendChild(backdrop);
        }

        setTimeout(() => {
            const qtyField = document.getElementById('pItemQty');
            if (qtyField) {
                qtyField.focus();
                qtyField.select();
            }
        }, 200);
    }

    function closePurchaseItemLineModal() {
        const modalEl = document.getElementById('purchaseItemLineModal');
        if (modalEl) {
            modalEl.classList.remove('show');
            modalEl.style.display = 'none';
        }
        const backdrop = document.getElementById('purchaseItemLineBackdrop');
        if (backdrop && backdrop.parentNode) {
            backdrop.parentNode.removeChild(backdrop);
        }
    }

    function adjustPItemQty(delta) {
        const qtyInput = document.getElementById('pItemQty');
        let current = parseFloat(parseBanglaFloat(qtyInput.value)) || 0;
        current = Math.max(1, current + delta);
        qtyInput.value = engToBanglaNum(current);
        calculatePItemTotal();
    }

    function calculatePItemTotal() {
        const qtyVal = parseFloat(parseBanglaFloat(document.getElementById('pItemQty').value)) || 0;
        const costVal = parseFloat(parseBanglaFloat(document.getElementById('pItemCostPrice').value)) || 0;

        const total = qtyVal * costVal;

        const bglQty = engToBanglaNum(qtyVal);
        const bglCost = engToBanglaNum(costVal.toFixed(2));
        const bglTotal = engToBanglaNum(total.toFixed(2));

        document.getElementById('pItemBreakdownText').innerText = `${bglQty} X ৳ ${bglCost} = ৳ ${bglTotal}`;
        document.getElementById('pItemTotalText').innerText = `৳ ${bglTotal}`;
    }

    function confirmAddPurchaseItemLine() {
        if (!currentSelectedProductForPurchase) return;

        const qtyVal = parseFloat(parseBanglaFloat(document.getElementById('pItemQty').value)) || 1;
        const costVal = parseFloat(parseBanglaFloat(document.getElementById('pItemCostPrice').value)) || 0;

        addProductToOrderWithValues(currentSelectedProductForPurchase, qtyVal, costVal);

        closePurchaseItemLineModal();
    }

    function addProductToOrderWithValues(product, qty, cost) {
        const orderTableBody = document.getElementById('orderTableBody');
        const existingRows = orderTableBody.querySelectorAll('tr.body-row');
        let existingRow = null;

        existingRows.forEach(row => {
            const pIdCell = row.cells[1] || row.querySelector('.product-id-val');
            if (pIdCell && pIdCell.innerText.trim() == product.id) {
                existingRow = row;
            }
        });

        if (existingRow) {
            const qtyInput = existingRow.querySelector('.quantity');
            const costInput = existingRow.querySelector('.cost-price');

            if (qtyInput) qtyInput.value = qty;
            if (costInput) costInput.value = cost.toFixed(2);

            existingRow.style.transition = 'background-color 0.3s ease';
            existingRow.style.backgroundColor = '#dcfce7';
            setTimeout(() => {
                existingRow.style.backgroundColor = '';
            }, 600);

            updateRowSubtotal.call(qtyInput || costInput);
            successToast(`কার্ট আপডেট করা হয়েছে: ${product.product_name}`);
            return;
        }

        // Insert new row
        const newRow = orderTableBody.insertRow();
        newRow.className = 'body-row align-middle';

        newRow.innerHTML = `
            <td class="body-cell py-3 px-3" style="cursor: pointer;" onclick="openPurchaseItemLineModalByRow(this)" title="আইটেম এডিট করুন">
                <div class="fw-bold text-dark fs-6">${product.product_name}</div>
                <div class="small text-muted">ID: #${product.id}</div>
            </td>
            <td style="display: none;" class="product-id-val">${product.id}</td>
            <td class="body-cell py-3 px-2">
                <div class="mb-1">
                    <input type="text" id="UpdateProductCode" class="form-control form-control-sm bg-light text-dark fw-bold font-monospace" value="${formatProductCode(product.product_code)}" placeholder="Barcodes" readonly style="font-size: 12px;" />
                </div>
                <div class="input-group input-group-sm">
                    <input class="enter_barcode form-control" id="ProductBarCodeInput" type="text" placeholder="Add Barcode" style="font-size: 12px;" />
                    <button type="button" class="btn btn-outline-teal btn-sm" onclick="ADDProductBarCode(this)" style="background:#0d9488; color:#fff; font-size:11px;">+ Add</button>
                </div>
            </td>
            <td class="body-cell py-3 px-2 text-center" style="width: 140px;">
                <div class="d-inline-flex align-items-center justify-content-center border rounded-3 p-1 bg-white shadow-sm" style="white-space: nowrap;">
                    <button type="button" class="btn btn-sm btn-light border-0 fw-bold px-2 py-0" onclick="changeRowQty(this, -1)" style="font-size: 16px; width: 28px; height: 28px; line-height: 1; border-radius: 6px; color: #475569;">-</button>
                    <input type="number" value="${qty}" min="1" class="form-control form-control-sm text-center border-0 fw-bold quantity px-1" style="width: 45px; height: 28px; font-size: 14px; background: transparent; box-shadow: none;" />
                    <button type="button" class="btn btn-sm btn-light border-0 fw-bold px-2 py-0" onclick="changeRowQty(this, 1)" style="font-size: 16px; width: 28px; height: 28px; line-height: 1; border-radius: 6px; color: #475569;">+</button>
                </div>
            </td>
            <td class="body-cell py-3 px-2" style="width: 140px;">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-light">৳</span>
                    <input type="number" step="any" value="${cost ? cost.toFixed(2) : ''}" id="EnterCostPrice" class="form-control cost-price fw-bold" placeholder="Cost" />
                </div>
            </td>
            <td class="subtotal body-cell py-3 px-3 text-end fw-bold text-success fs-6" style="width: 130px;">
                ৳ ${(qty * cost).toFixed(2)}
            </td>
            <td class="body-cell py-3 px-2 text-center" style="width: 60px;">
                <button type="button" class="btn btn-sm btn-outline-primary border-0 me-1" onclick="openPurchaseItemLineModalByRow(this)" title="আইটেম এডিট করুন">
                    <i class="fa-solid fa-pen-to-square fs-6"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle" onclick="removeRow(this)" title="Remove item">
                    <i class="fa-solid fa-trash-can fs-6"></i>
                </button>
            </td>
        `;

        const qtyInput = newRow.querySelector('.quantity');
        const costInput = newRow.querySelector('.cost-price');

        if (qtyInput) qtyInput.addEventListener('input', updateRowSubtotal);
        if (costInput) costInput.addEventListener('input', updateRowSubtotal);

        updateRowSubtotal.call(qtyInput || costInput);
        successToast(`কার্টে যোগ হয়েছে: ${product.product_name}`);
    }

    function openPurchaseItemLineModalByRow(btnOrCell) {
        const row = btnOrCell.closest('tr');
        if (!row) return;
        const pIdCell = row.cells[1] || row.querySelector('.product-id-val');
        if (!pIdCell) return;
        const pId = pIdCell.innerText.trim();

        const product = allProducts.find(p => p.id == pId);
        if (product) {
            openPurchaseItemLineModal(product);
        }
    }

    function changeRowQty(btn, delta) {
        const row = btn.closest('tr');
        const qtyInput = row.querySelector('.quantity');
        let val = (parseInt(qtyInput.value) || 0) + delta;
        if (val < 1) val = 1;
        qtyInput.value = val;
        updateRowSubtotal.call(qtyInput);
    }

    function updateRowSubtotal() {
        const row = this.closest('tr');
        const quantity = parseBanglaFloat(row.querySelector('.quantity').value) || 0;
        const costPrice = parseBanglaFloat(row.querySelector('.cost-price').value) || 0;
        const subtotal = quantity * costPrice;

        row.querySelector('.subtotal').innerText = '৳ ' + subtotal.toFixed(2);
        updateTotals();
    }

    function updateTotals() {
        let totalQuantity = 0;
        let totalSubTotal = 0;

        const rows = document.querySelectorAll('#orderTableBody tr');
        rows.forEach(row => {
            const quantity = parseBanglaFloat(row.querySelector('.quantity').value) || 0;
            const costPrice = parseBanglaFloat(row.querySelector('.cost-price').value) || 0;
            const subtotal = quantity * costPrice;

            totalQuantity += quantity;
            totalSubTotal += subtotal;

            row.querySelector('.subtotal').innerText = '৳ ' + subtotal.toFixed(2);
        });

        document.getElementById('totalQuantity').innerText = totalQuantity.toFixed(2);
        document.getElementById('totalSubTotal').innerText = totalSubTotal.toFixed(2);

        const grandSubtotal = totalSubTotal;
        document.getElementById('grandSubtotal').value = grandSubtotal.toFixed(2);

        if (typeof window.calculateDuePayment === 'function') {
            window.calculateDuePayment();
        }
    }

    function removeRow(button) {
        const row = button.closest('tr');
        if (row && row.parentElement) {
            row.parentElement.removeChild(row);
            updateTotals();
        }
    }

    let UpdatebarcodeLists = {};

    function ADDProductBarCode(button) {
        const row = button.closest('tr');
        const productId = row.querySelector('.product-id-val').innerText.trim();
        const barcodeInput = row.querySelector('#ProductBarCodeInput');
        const UpdateProductCode = row.querySelector('#UpdateProductCode');

        const barcode = barcodeInput.value.trim();

        if (!barcode) {
            alert("Please enter a barcode!");
            return;
        }

        if (!UpdatebarcodeLists[productId]) {
            UpdatebarcodeLists[productId] = [];
        }

        const existingBarcodes = UpdateProductCode.value.split(', ').filter(code => code.trim());
        UpdatebarcodeLists[productId] = Array.from(new Set([...UpdatebarcodeLists[productId], ...existingBarcodes]));

        if (UpdatebarcodeLists[productId].includes(barcode)) {
            alert('This barcode is already added!');
            return;
        }

        UpdatebarcodeLists[productId].push(barcode);
        UpdateProductCode.value = UpdatebarcodeLists[productId].join(', ');
        barcodeInput.value = '';
    }

    const today = new Date().toISOString().split('T')[0];
    if (document.getElementById('PurchaseDate')) {
        document.getElementById('PurchaseDate').value = today;
    }

    async function PurchaseDataSave(event) {
        if (event) event.preventDefault();

        let products = [];
        const rows = document.querySelectorAll('#orderTableBody tr');

        rows.forEach(row => {
            const productId = row.querySelector('.product-id-val').innerText.trim();
            const quantity = parseInt(row.querySelector('.quantity').value) || 0;
            const costPrice = parseFloat(row.querySelector('.cost-price').value) || 0;
            const subtotalText = row.querySelector('.subtotal').innerText.replace(/[^\d.]/g, '');
            const subtotal = parseFloat(subtotalText) || (quantity * costPrice);
            const ProductCodes = UpdatebarcodeLists[productId] || [];

            if (quantity <= 0) {
                alert("Quantity must be greater than zero!");
                return;
            }

            products.push({
                product_id: productId,
                quantity: quantity,
                product_code: ProductCodes,
                cost_price: costPrice,
                subtotal: subtotal
            });
        });

        if (products.length === 0) {
            alert("At least one product must be added!");
            return;
        }

        let formData = new FormData();
        formData.append('supplier_id', document.getElementById('SupplierDataList').value);
        formData.append('purchase_payable_amount', document.getElementById('PurchasePayableAmount').value || 0);
        formData.append('date', document.getElementById('PurchaseDate').value);
        formData.append('purchase_due_collection_date', document.getElementById('PurchaseDate').value);
        formData.append('referance_no', document.getElementById('ReferenceNo').value);
        formData.append('payment_status', document.getElementById('paymentStatusDisplay').textContent.trim());
        formData.append('grand_subtotal', parseFloat(document.getElementById('grandSubtotal').value) || 0);
        formData.append('return_adjustment_amount', parseFloat(document.getElementById('returnAdjustmentAmount').value) || 0);
        formData.append('payment_method', document.getElementById('paymentMethod').value || 'Cash');
        formData.append('paid_amount', parseFloat(document.getElementById('paidAmount').value) || 0);
        formData.append('due_amount', parseFloat(document.getElementById('dueAmount').value) || 0);
        formData.append('transaction_id', document.getElementById('paymentDetails').value);
        formData.append('products', JSON.stringify(products));

        const imgInput = document.getElementById('AttachDocument');
        if (imgInput && imgInput.files[0]) {
            formData.append('img', imgInput.files[0]);
        }

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        try {
            let res = await axios.post("/api/create-purchases", formData, config);

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                const formEl = document.getElementById("purchaseCreateForm") || document.getElementById("signup");
                if (formEl) formEl.reset();
                const modal = document.getElementById('exampleModal');
                closeModal(modal);
                location.reload();
            } else {
                errorToast(res.data['message']);
            }
        } catch (e) {
            console.error("Purchase Save Error:", e);
            unauthorized(e.response?.status);
        }
    }

    function closeModal(modal) {
        if (!modal) modal = document.getElementById('exampleModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

    /* ==========================================================================
       MOBILE PURCHASE SYSTEM JAVASCRIPT LOGIC
       ========================================================================== */
    let mobilePurchaseCartItems = [];
    let selectedMobileSupplier = null;

    let nextPurSeqNo = 1;

    async function generateNewDynamicBillNo(showToast = false) {
        try {
            let res = await axios.get("/api/purchases-list", HeaderToken());
            if (res.data && res.data.status === "success" && Array.isArray(res.data.PurchasessData)) {
                let maxId = 0;
                res.data.PurchasessData.forEach(p => {
                    let pid = parseInt(p.id);
                    if (pid && pid > maxId) maxId = pid;
                });
                nextPurSeqNo = maxId + 1;
            }
        } catch (e) {
            console.log("Error fetching purchases list for bill number:", e);
        }

        const paddedNum = String(nextPurSeqNo).padStart(5, '0');
        const dynamicBillNo = `#PurID${paddedNum}`;

        const inputEl = document.getElementById("mobilePurchaseInvoiceNoInput");
        if (inputEl) {
            inputEl.value = dynamicBillNo;
        }

        const spanEl = document.getElementById("mobilePurchaseInvoiceNo");
        if (spanEl) {
            spanEl.textContent = dynamicBillNo;
        }

        const deskRef = document.getElementById("ReferenceNo");
        if (deskRef && (!deskRef.value || deskRef.value.startsWith('#PurID'))) {
            deskRef.value = dynamicBillNo;
        }

        if (showToast && typeof successToast === 'function') {
            successToast(`🔄 বিল নম্বর: ${dynamicBillNo}`);
        }
    }

    function autoGenerateSupplierInvoiceNo() {
        const paddedNum = String(nextPurSeqNo).padStart(5, '0');
        const dynamicBillNo = `#PurID${paddedNum}`;
        
        const refNoInput = document.getElementById("mobilePurchaseRefNo");
        if (refNoInput) {
            refNoInput.value = dynamicBillNo;
        }
        syncMobileRefNoToDesktop(dynamicBillNo);

        if (typeof successToast === 'function') {
            successToast(`🔄 ইনভয়েস নম্বর: ${dynamicBillNo}`);
        }
    }

    function syncMobileRefNoToDesktop(val) {
        const deskRef = document.getElementById("ReferenceNo");
        if (deskRef) deskRef.value = val;
    }

    function syncMobileBillNoToDesktop(val) {
        const deskRef = document.getElementById("ReferenceNo");
        if (deskRef && !document.getElementById("mobilePurchaseRefNo")?.value) {
            deskRef.value = val;
        }
    }

    function syncMobileDateToDesktop(val) {
        const deskDate = document.getElementById("PurchaseDate");
        if (deskDate) deskDate.value = val;
    }

    function initMobilePurchaseUI() {
        generateNewDynamicBillNo(false);
        renderMobilePurchaseCart();
        refreshSupplierList();
    }

    let allPurchasesListCache = [];

    async function fetchAndRenderMobilePurchaseList() {
        const container = document.getElementById("mobilePurchaseListCardsContainer");
        if (!container) return;

        container.innerHTML = `
            <div class="text-center py-4 text-muted">
                <div class="spinner-border text-success mb-2" role="status" style="width: 2rem; height: 2rem;"></div>
                <p class="mb-0 small fw-bold">ক্রয় তালিকা লোড হচ্ছে...</p>
            </div>
        `;

        try {
            let res = await axios.get("/api/purchases-list", HeaderToken());
            if (res.data && res.data.status === "success" && Array.isArray(res.data.PurchasessData)) {
                allPurchasesListCache = res.data.PurchasessData;
                renderMobilePurchaseListCards(allPurchasesListCache);
            } else {
                container.innerHTML = `<div class="p-4 text-center text-muted fw-bold">কোনো ক্রয় ডাটা পাওয়া যায়নি</div>`;
            }
        } catch (e) {
            console.error("Error fetching purchases list:", e);
            container.innerHTML = `<div class="p-4 text-center text-danger fw-bold">ক্রয় তালিকা লোড করতে সমস্যা হয়েছে!</div>`;
        }
    }

    function renderMobilePurchaseListCards(purchases) {
        const container = document.getElementById("mobilePurchaseListCardsContainer");
        if (!container) return;

        if (!purchases || purchases.length === 0) {
            container.innerHTML = `
                <div class="text-center py-4 text-muted bg-white rounded-3 p-4 border">
                    <i class="fa-solid fa-box-open fs-2 mb-2 text-secondary"></i>
                    <p class="mb-0 fw-bold">কোনো ক্রয় তথ্য পাওয়া যায়নি</p>
                </div>
            `;
            return;
        }

        let html = purchases.map(item => {
            const purId = item.purchase_id || ('#PurID' + String(item.id).padStart(5, '0'));
            const suppName = (item.supplier && typeof item.supplier === 'object') ? (item.supplier.name || item.supplier.supplier_name || 'N/A') : (item.supplier || 'N/A');
            const suppDbId = item.supplier_db_id || (item.supplier && typeof item.supplier === 'object' ? item.supplier.id : '') || item.supplier_id || '';
            const suppProfileUrl = suppDbId ? `/supplier/profile/${suppDbId}` : '#';

            let grandTotal = parseFloat(item.grand_subtotal || item.purchase_payable_amount || 0);
            if (grandTotal <= 0 && item.orderDetails && Array.isArray(item.orderDetails)) {
                grandTotal = item.orderDetails.reduce((acc, d) => acc + ((parseFloat(d.cost_price) || 0) * (parseFloat(d.quantity) || 0)), 0);
            }
            const paidAmount = parseFloat(item.paid_amount || 0);
            const dueAmount = Math.max(0, grandTotal - paidAmount);
            
            let statusBadge = `<span class="badge bg-danger-subtle text-danger px-2 py-1 fw-bold">Unpaid</span>`;
            if (paidAmount >= grandTotal && grandTotal > 0) {
                statusBadge = `<span class="badge bg-success-subtle text-success px-2 py-1 fw-bold">Fully Paid</span>`;
            } else if (paidAmount > 0) {
                statusBadge = `<span class="badge bg-warning-subtle text-warning px-2 py-1 fw-bold">Partial Paid</span>`;
            }

            return `
                <div class="card border-0 shadow-xs rounded-4 mb-3 p-3 bg-white" style="border: 1px solid #cbd5e1 !important;">
                    <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                        <div class="d-flex align-items-center gap-1">
                            <span class="badge bg-success text-white fw-bold px-2 py-1" style="font-size: 12px; border-radius: 8px;">
                                <i class="fa-solid fa-receipt me-1"></i>${purId}
                            </span>
                            <span class="text-muted small ms-1" style="font-size: 11px;">📅 ${item.date || ''}</span>
                        </div>
                        <div>${statusBadge}</div>
                    </div>

                    <div class="mb-2">
                        <a href="${suppProfileUrl}" class="fw-extrabold text-success text-decoration-none d-inline-flex align-items-center mb-1" style="font-size: 14.5px;" title="${suppName} এর প্রোফাইল দেখুন">
                            <i class="fa-solid fa-truck-field text-success me-1.5"></i>
                            <span class="text-decoration-underline">${suppName}</span>
                            <i class="fa-solid fa-arrow-up-right-from-square ms-1.5 text-muted" style="font-size: 10px;"></i>
                        </a>
                        <div class="text-muted small" style="font-size: 11px;">রেফারেন্স: ${item.referance_no || 'N/A'}</div>
                    </div>

                    <div class="bg-light p-2.5 rounded-3 mb-3 border" style="border-color: #bbf7d0 !important; background: #f0fdf4;">
                        <div class="row g-1 text-center" style="font-size: 12px;">
                            <div class="col-4 text-start">
                                <span class="text-muted d-block" style="font-size: 10px;">সর্বমোট</span>
                                <strong class="text-dark fw-bold">৳ ${grandTotal.toFixed(2)}</strong>
                            </div>
                            <div class="col-4 text-center">
                                <span class="text-muted d-block" style="font-size: 10px;">পরিশোধিত</span>
                                <strong class="text-success fw-bold">৳ ${paidAmount.toFixed(2)}</strong>
                            </div>
                            <div class="col-4 text-end">
                                <span class="text-muted d-block" style="font-size: 10px;">বাকি</span>
                                <strong class="text-danger fw-bold">৳ ${dueAmount.toFixed(2)}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 pt-1 border-top">
                        <a href="/purchase-invoice/${item.id}" class="btn btn-sm btn-outline-primary fw-bold px-3 py-1.5" style="border-radius: 8px; font-size: 12px;">
                            <i class="fa-solid fa-eye me-1"></i> ভিউ মেমো
                        </a>
                    </div>
                </div>
            `;
        }).join('');

        container.innerHTML = html;
    }

    function filterMobilePurchaseListModal(query) {
        const q = query.toLowerCase().trim();
        const filtered = allPurchasesListCache.filter(item => {
            const purId = (item.purchase_id || '').toLowerCase();
            const refNo = (item.referance_no || '').toLowerCase();
            const suppName = ((item.supplier && item.supplier.name) || item.supplier || '').toLowerCase();
            return purId.includes(q) || refNo.includes(q) || suppName.includes(q);
        });
        renderMobilePurchaseListCards(filtered);
    }

    function openMobilePurchaseListModal() {
        showMobileModal("mobilePurchaseListModal");
        fetchAndRenderMobilePurchaseList();
    }

    let mobilePurHtml5QrCode = null;
    let mobilePurCamFacingMode = "environment";
    let lastMobilePurScannedCode = "";

    function openMobilePurchaseCameraScanner() {
        showMobileModal("mobilePurchaseBarcodeScannerModal");
        startMobilePurchaseCameraScanner();
    }

    function startMobilePurchaseCameraScanner() {
        if (mobilePurHtml5QrCode && mobilePurHtml5QrCode.isScanning) {
            mobilePurHtml5QrCode.stop().then(() => initMobilePurHtml5QrCode()).catch(() => initMobilePurHtml5QrCode());
        } else {
            initMobilePurHtml5QrCode();
        }
    }

    function initMobilePurHtml5QrCode() {
        const statusEl = document.getElementById("mobilePurCamScannerStatus");
        if (statusEl) {
            statusEl.className = "alert alert-info py-2 small mb-3";
            statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।';
        }

        if (!window.Html5Qrcode) {
            if (statusEl) {
                statusEl.className = "alert alert-danger py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> বারকোড স্ক্যানার লাইব্রেরি পাওয়া যায়নি!';
            }
            return;
        }

        if (!mobilePurHtml5QrCode) {
            mobilePurHtml5QrCode = new Html5Qrcode("mobilePurCameraReader");
        }

        const config = { 
            fps: 15, 
            qrbox: { width: 260, height: 160 },
            aspectRatio: 1.333334
        };

        mobilePurHtml5QrCode.start(
            { facingMode: mobilePurCamFacingMode },
            config,
            onMobilePurBarcodeDetectedSuccess,
            onMobilePurBarcodeDetectedError
        ).then(() => {
            if (statusEl) {
                statusEl.className = "alert alert-success py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-video me-1"></i> ক্যামেরা সক্রিয়! বারকোড স্ক্যান করলে সরাসরি খুঁজবে।';
            }
        }).catch(err => {
            console.error("Mobile Pur Camera start error:", err);
            if (statusEl) {
                statusEl.className = "alert alert-danger py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> ক্যামেরা চালু করা যায়নি! ব্রাউজারের ক্যামেরা পারমিশন এলাউ (Allow) করুন।';
            }
        });
    }

    function onMobilePurBarcodeDetectedSuccess(decodedText) {
        if (!decodedText || decodedText === lastMobilePurScannedCode) return;
        lastMobilePurScannedCode = decodedText;

        if (typeof successToast === 'function') {
            successToast(`📷 স্ক্যানড বারকোড: ${decodedText}`);
        }

        stopMobilePurchaseCameraScanner();

        const inputEl = document.getElementById("mobilePurchaseProductSearchInput");
        if (inputEl) {
            inputEl.value = decodedText;
            filterMobilePurchaseProducts(decodedText);
        }

        setTimeout(() => { lastMobilePurScannedCode = ""; }, 2000);
    }

    function onMobilePurBarcodeDetectedError(error) {
        // Ignore per-frame decode failure
    }

    function switchMobilePurCameraFacingMode() {
        mobilePurCamFacingMode = (mobilePurCamFacingMode === "environment") ? "user" : "environment";
        startMobilePurchaseCameraScanner();
    }

    function stopMobilePurchaseCameraScanner() {
        if (mobilePurHtml5QrCode && mobilePurHtml5QrCode.isScanning) {
            mobilePurHtml5QrCode.stop().then(() => {
                mobilePurHtml5QrCode.clear();
                mobilePurHtml5QrCode = null;
                hideMobileModal("mobilePurchaseBarcodeScannerModal");
            }).catch(() => {
                mobilePurHtml5QrCode = null;
                hideMobileModal("mobilePurchaseBarcodeScannerModal");
            });
        } else {
            hideMobileModal("mobilePurchaseBarcodeScannerModal");
        }
    }

    function showMobileModal(modalId) {
        const modalEl = document.getElementById(modalId);
        if (modalEl) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                let modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.show();
            } else if (typeof $ !== 'undefined') {
                $('#' + modalId).modal('show');
            } else {
                modalEl.style.display = 'block';
                modalEl.classList.add('show');
            }
        }
    }

    function hideMobileModal(modalId) {
        const modalEl = document.getElementById(modalId);
        if (modalEl) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                let modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            } else if (typeof $ !== 'undefined') {
                $('#' + modalId).modal('hide');
            } else {
                modalEl.style.display = 'none';
                modalEl.classList.remove('show');
            }
        }
    }

    function buildMobileSupplierRowHtml(s) {
        const escapedName = (s.name || '').replace(/'/g, "\\'");
        const totalPayable = parseFloat(s.combined_due || s.purchase_payable_amount || 0);
        const payableFormatted = typeof engToBanglaNum === 'function' ? engToBanglaNum(totalPayable.toFixed(2)) : totalPayable.toFixed(2);
        const payableBadge = totalPayable > 0 
            ? `<span class="badge bg-danger mt-1">দেয়: ৳ ${payableFormatted}</span>` 
            : `<span class="badge bg-secondary mt-1">দেয়: ৳ ০০.০০</span>`;
        const mobileBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(s.mobile || '') : (s.mobile || '');

        return `
            <div class="list-group-item list-group-item-action p-3 d-flex justify-content-between align-items-center" onclick="selectMobileSupplierItem(${s.id})" style="cursor: pointer;">
                <div class="flex-grow-1 pe-2">
                    <strong class="text-dark d-block" style="font-size: 15px;">${s.name} ${s.company ? `<small class="text-muted">(${s.company})</small>` : ''}</strong>
                    <small class="text-muted d-block">${mobileBn} ${s.address ? `• ${s.address}` : ''}</small>
                    ${payableBadge}
                </div>
                <div class="d-flex align-items-center gap-1" onclick="event.stopPropagation();">
                    <button type="button" class="btn btn-sm btn-outline-primary border-0 rounded-circle d-flex align-items-center justify-content-center shadow-xs" onclick="editSupplierFromMobile(${s.id})" title="এডিট করুন" style="width: 36px; height: 36px;">
                        <i class="fa-solid fa-pen-to-square fs-6"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle d-flex align-items-center justify-content-center shadow-xs ms-1" onclick="deleteSupplierFromMobile(${s.id}, '${escapedName}')" title="ডিলিট করুন" style="width: 36px; height: 36px;">
                        <i class="fa-solid fa-trash-can fs-6"></i>
                    </button>
                </div>
            </div>
        `;
    }

    function openMobileSupplierSearchModal() {
        const list = document.getElementById("mobileSupplierResultsList");
        if (list) {
            let html = (allSuppliersData || []).map(buildMobileSupplierRowHtml).join('');
            list.innerHTML = html || `<div class="p-3 text-center text-muted">কোনো সাপ্লায়ার পাওয়া যায়নি</div>`;
        }
        showMobileModal("mobileSupplierSearchModal");
    }

    function filterMobileSuppliers(query) {
        const q = query.toLowerCase().trim();
        const filtered = (allSuppliersData || []).filter(s => 
            (s.name && s.name.toLowerCase().includes(q)) || 
            (s.mobile && s.mobile.includes(q)) || 
            (s.company && s.company.toLowerCase().includes(q))
        );
        const list = document.getElementById("mobileSupplierResultsList");
        if (list) {
            let html = filtered.map(buildMobileSupplierRowHtml).join('');
            list.innerHTML = html || `<div class="p-3 text-center text-muted">কোনো সাপ্লায়ার পাওয়া যায়নি</div>`;
        }
    }

    async function editSupplierFromMobile(supplierId) {
        const supplier = (allSuppliersData || []).find(s => s.id == supplierId);
        if (!supplier) return;

        let confirmEdit = false;
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                title: `<span class="fw-bold text-dark fs-5">সাপ্লায়ার এডিট করুন</span>`,
                html: `<div class="text-muted fs-6 mt-1">আপনি কি <strong style="color:#15803d;">"${supplier.name}"</strong> এর তথ্য সংশোধন করতে চান?</div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#15803d',
                cancelButtonColor: '#64748b',
                confirmButtonText: '<i class="fa-solid fa-pen-to-square me-1"></i> হ্যাঁ, এডিট করুন',
                cancelButtonText: 'বাতিল',
                reverseButtons: true
            });
            confirmEdit = result.isConfirmed;
        } else {
            confirmEdit = confirm(`আপনি কি "${supplier.name}" সাপ্লায়ারের তথ্য সংশোধন করতে চান?`);
        }

        if (!confirmEdit) return;

        hideMobileModal("mobileSupplierSearchModal");
        if (typeof openSupplierUpdateModal === 'function') {
            await openSupplierUpdateModal(supplier);
        } else {
            errorToast("Update Modal Component unavailable!");
        }
    }

    async function deleteSupplierFromMobile(supplierId, supplierName) {
        let confirmDelete = false;
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                title: `<span class="fw-bold text-dark fs-5">আপনি কি নিশ্চিত?</span>`,
                html: `<div class="text-muted fs-6 mt-1"><strong class="text-danger">"${supplierName}"</strong> সাপ্লায়ারটি ডিলিট করতে চান?</div>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: '<i class="fa-solid fa-trash-can me-1"></i> হ্যাঁ, ডিলিট করুন!',
                cancelButtonText: 'বাতিল',
                reverseButtons: true
            });
            confirmDelete = result.isConfirmed;
        } else {
            confirmDelete = confirm(`আপনি কি নিশ্চিতভাবে "${supplierName}" সাপ্লায়ারটি ডিলিট করতে চান?`);
        }

        if (!confirmDelete) return;

        try {
            let res = await axios.post("/api/delete-supplier", { id: supplierId.toString() }, HeaderToken());

            if (res.data['status'] === "success") {
                successToast(res.data['message'] || "🎉 সাপ্লায়ার ডিলিট হয়েছে!");

                // Remove from global array
                allSuppliersData = (allSuppliersData || []).filter(s => s.id != supplierId);

                // If currently selected supplier was deleted, clear selection
                if (selectedMobileSupplier && selectedMobileSupplier.id == supplierId) {
                    selectedMobileSupplier = null;
                    document.getElementById("mobileSupplierNameDisplay").textContent = "সাপ্লায়ার বা পার্টি সার্চ করুন...";
                    const card = document.getElementById("mobileSupplierDetailsCard");
                    if (card) card.classList.add("d-none");
                }

                // Refresh mobile supplier modal list
                openMobileSupplierSearchModal();
            } else {
                errorToast(res.data['message'] || "সাপ্লায়ার ডিলিট করা সম্ভব হয়নি!");
            }
        } catch (e) {
            console.error("Delete Supplier error:", e);
            errorToast("সাপ্লায়ার ডিলিট করতে সমস্যা হয়েছে!");
        }
    }

    function selectMobileSupplierItem(supplierId) {
        selectedMobileSupplier = (allSuppliersData || []).find(s => s.id == supplierId);
        if (selectedMobileSupplier) {
            const totalPayable = parseFloat(selectedMobileSupplier.combined_due || selectedMobileSupplier.purchase_payable_amount || 0);
            const payableFormatted = typeof engToBanglaNum === 'function' ? engToBanglaNum(totalPayable.toFixed(2)) : totalPayable.toFixed(2);
            const mobileBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(selectedMobileSupplier.mobile || '') : (selectedMobileSupplier.mobile || '');

            const displayEl = document.getElementById("mobileSupplierNameDisplay");
            if (displayEl) {
                displayEl.innerHTML = `<a href="/supplier/profile/${selectedMobileSupplier.id}" target="_blank" class="text-success text-decoration-none fw-extrabold" onclick="event.stopPropagation();" title="সাপ্লায়ার প্রোফাইল দেখুন">${selectedMobileSupplier.name} <i class="fa-solid fa-arrow-up-right-from-square small ms-1" style="font-size: 11px;"></i></a>`;
            }

            const card = document.getElementById("mobileSupplierDetailsCard");
            if (card) {
                card.classList.remove("d-none");
                const profileLink = document.getElementById("mobileSuppCardProfileLink");
                if (profileLink) {
                    profileLink.href = `/supplier/profile/${selectedMobileSupplier.id}`;
                    profileLink.textContent = selectedMobileSupplier.name;
                }
                document.getElementById("mobileSuppCardMobile").textContent = mobileBn || '-';
                document.getElementById("mobileSuppCardCompany").textContent = selectedMobileSupplier.company || '-';
                document.getElementById("mobileSuppCardPayable").textContent = '৳ ' + payableFormatted;
            }
        }
        hideMobileModal("mobileSupplierSearchModal");
    }

    function buildMobileProductRowHtml(p) {
        const escapedName = (p.product_name || '').replace(/'/g, "\\'");
        const costVal = parseFloat(p.cost_price || p.price || 0).toFixed(2);
        
        let unitVal = '';
        if (p.unit && typeof p.unit === 'object') {
            unitVal = p.unit.name || p.unit.unit_name || p.unit.unit_name_bn || '';
        } else if (p.unit_name) {
            unitVal = p.unit_name;
        } else if (p.unit) {
            unitVal = p.unit;
        }

        const rawStock = parseFloat(p.quantity || p.stock || 0);
        const stockBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(rawStock.toString()) : rawStock;
        const stockBadge = rawStock > 0 
            ? `<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 fw-bold" style="font-size: 11.5px;">📦 স্টক: ${stockBn} ${unitVal}</span>`
            : `<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 fw-bold" style="font-size: 11.5px;">⚠️ স্টক আউট (০ ${unitVal})</span>`;

        let codeVal = '';
        if (typeof p.product_code === 'string') {
            try {
                let parsed = JSON.parse(p.product_code);
                if (Array.isArray(parsed)) codeVal = parsed.join(', ');
                else codeVal = p.product_code;
            } catch(e) {
                codeVal = p.product_code;
            }
        } else if (Array.isArray(p.product_code)) {
            codeVal = p.product_code.join(', ');
        } else if (p.product_code) {
            codeVal = String(p.product_code);
        }
        const codeDisplay = codeVal ? `<span class="badge bg-light text-secondary border px-2 py-1 font-monospace" style="font-size: 11px;">#${codeVal}</span>` : '';

        return `
            <div class="list-group-item list-group-item-action p-3 d-flex justify-content-between align-items-center mb-1" onclick="openMobilePurchaseItemLineForm(${p.id})" style="cursor: pointer; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div class="flex-grow-1 pe-2">
                    <strong class="text-dark d-block mb-1" style="font-size: 15px;">${p.product_name}</strong>
                    <div class="d-flex align-items-center flex-wrap gap-1 mb-1">
                        ${stockBadge}
                        ${codeDisplay}
                    </div>
                    <span class="fw-bold text-success d-block" style="font-size: 13.5px; color: #15803d !important;">কেনা মূল্য: ৳ ${costVal}</span>
                </div>
                <div class="d-flex align-items-center gap-1" onclick="event.stopPropagation();">
                    <button type="button" class="btn btn-sm btn-outline-primary border-0 rounded-circle d-flex align-items-center justify-content-center shadow-xs" onclick="editProductFromMobile(${p.id})" title="এডিট করুন" style="width: 36px; height: 36px;">
                        <i class="fa-solid fa-pen-to-square fs-6"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle d-flex align-items-center justify-content-center shadow-xs ms-1" onclick="deleteProductFromMobile(${p.id}, '${escapedName}')" title="ডিলিট করুন" style="width: 36px; height: 36px;">
                        <i class="fa-solid fa-trash-can fs-6"></i>
                    </button>
                </div>
            </div>
        `;
    }

    function banglishToBangla(text) {
        if (!text) return '';
        let str = String(text).toLowerCase().trim();

        const wordMap = {
            'meri': 'মেরি', 'meril': 'মেরিল', 'lafz': 'লাফজ', 'lafs': 'লাফজ',
            'keya': 'কেয়া', 'kya': 'কেয়া', 'pran': 'প্রান', 'prann': 'প্রাণ',
            'radhuni': 'রাঁধুনী', 'raduni': 'রাঁধুনী', 'sunsilk': 'সানসিল্ক',
            'sansilk': 'সানসিল্ক', 'parachute': 'প্যারাসুট', 'parasut': 'প্যারাসুট',
            'olympic': 'অলিম্পিক', 'olimpic': 'অলিম্পিক', 'olimpik': 'অলিম্পিক',
            'soap': 'সাবান', 'saban': 'সাবান', 'shaban': 'সাবান',
            'oil': 'তেল', 'tel': 'তেল', 'wash': 'ওয়াশ', 'face': 'ফেস', 'fes': 'ফেস',
            'biscuit': 'বিস্কুট', 'biscut': 'বিস্কুট', 'shampoo': 'শ্যাম্পু', 'shampu': 'শ্যাম্পু'
        };

        if (wordMap[str]) return wordMap[str];

        const convertWord = (w) => {
            if (!w) return '';
            if (wordMap[w]) return wordMap[w];

            const patterns = [
                { en: 'kkh', bn: 'ক্ষ' }, { en: 'cch', bn: 'চ্ছ' }, { en: 'chh', bn: 'ছ' },
                { en: 'kh',  bn: 'খ' }, { en: 'gh',  bn: 'ঘ' }, { en: 'ng',  bn: 'ঙ' },
                { en: 'ch',  bn: 'চ' }, { en: 'jh',  bn: 'ঝ' }, { en: 'th',  bn: 'থ' },
                { en: 'dh',  bn: 'ধ' }, { en: 'ph',  bn: 'ফ' }, { en: 'bh',  bn: 'ভ' },
                { en: 'sh',  bn: 'শ' }, { en: 'k',   bn: 'ক' }, { en: 'g',   bn: 'গ' },
                { en: 'j',   bn: 'জ' }, { en: 't',   bn: 'ত' }, { en: 'd',   bn: 'দ' },
                { en: 'n',   bn: 'ন' }, { en: 'p',   bn: 'প' }, { en: 'f',   bn: 'ফ' },
                { en: 'b',   bn: 'ব' }, { en: 'm',   bn: 'ম' }, { en: 'z',   bn: 'জ' },
                { en: 'r',   bn: 'র' }, { en: 'l',   bn: 'ল' }, { en: 's',   bn: 'স' },
                { en: 'h',   bn: 'হ' }, { en: 'y',   bn: 'য়' }, { en: 'v',   bn: 'ভ' },
                { en: 'w',   bn: 'ও' }
            ];
            const vowelKars = [
                { en: 'ee', bn: 'ী' }, { en: 'oo', bn: 'ূ' }, { en: 'oi', bn: 'ৈ' },
                { en: 'ou', bn: 'ৌ' }, { en: 'a',  bn: 'া' }, { en: 'i',  bn: 'ি' },
                { en: 'u',  bn: 'ু' }, { en: 'e',  bn: 'ে' }, { en: 'o',  bn: '' }
            ];
            const indVowels = [
                { en: 'a', bn: 'আ' }, { en: 'i', bn: 'ই' }, { en: 'u', bn: 'উ' },
                { en: 'e', bn: 'এ' }, { en: 'o', bn: 'অ' }
            ];

            let res = '';
            let i = 0;
            while (i < w.length) {
                let matchedCons = false;
                for (let p of patterns) {
                    if (w.startsWith(p.en, i)) {
                        res += p.bn;
                        i += p.en.length;
                        matchedCons = true;
                        for (let v of vowelKars) {
                            if (w.startsWith(v.en, i)) {
                                res += v.bn;
                                i += v.en.length;
                                break;
                            }
                        }
                        break;
                    }
                }
                if (!matchedCons) {
                    let matchedVowel = false;
                    for (let v of indVowels) {
                        if (w.startsWith(v.en, i)) {
                            res += v.bn;
                            i += v.en.length;
                            matchedVowel = true;
                            break;
                        }
                    }
                    if (!matchedVowel) {
                        res += w[i];
                        i++;
                    }
                }
            }
            return res;
        };

        return str.split(/\s+/).map(convertWord).join(' ');
    }

    function openMobilePurchaseProductSearchModal() {
        const list = document.getElementById("mobilePurchaseProductResultsList");
        if (list) {
            let html = (allProducts || []).map(buildMobileProductRowHtml).join('');
            list.innerHTML = html || `<div class="p-3 text-center text-muted">কোনো প্রডাক্ট পাওয়া যায়নি</div>`;
        }
        showMobileModal("mobilePurchaseProductSearchModal");

        setTimeout(() => {
            const inputEl = document.getElementById("mobilePurchaseProductSearchInput");
            if (inputEl && !inputEl.dataset.imeBound) {
                inputEl.dataset.imeBound = "true";
                ['input', 'keyup', 'change', 'compositionupdate', 'compositionend'].forEach(evt => {
                    inputEl.addEventListener(evt, function() {
                        filterMobilePurchaseProducts(this.value);
                    });
                });
            }
        }, 200);
    }

    function getProductSearchableText(p) {
        if (!p) return '';
        let codes = [];
        if (p.product_code) {
            if (typeof p.product_code === 'string') {
                try {
                    let parsed = JSON.parse(p.product_code);
                    if (Array.isArray(parsed)) codes = parsed;
                    else codes = [p.product_code];
                } catch(e) {
                    codes = [p.product_code];
                }
            } else if (Array.isArray(p.product_code)) {
                codes = p.product_code;
            } else {
                codes = [String(p.product_code)];
            }
        }
        const codeStr = codes.join(' ');
        const nameStr = p.product_name || '';
        const categoryStr = (p.category && (p.category.name || p.category.category_name)) || '';
        const unitStr = (p.unit && (p.unit.name || p.unit.unit_name)) || p.unit_name || p.unit || '';
        
        return `${nameStr} ${codeStr} ${categoryStr} ${unitStr}`;
    }

    function filterMobilePurchaseProducts(query) {
        const rawQuery = (query || '').trim();
        const list = document.getElementById("mobilePurchaseProductResultsList");
        if (!list) return;

        if (!rawQuery) {
            let html = (allProducts || []).map(buildMobileProductRowHtml).join('');
            list.innerHTML = html || `<div class="p-3 text-center text-muted">কোনো প্রডাক্ট পাওয়া যায়নি</div>`;
            return;
        }

        const qRaw = rawQuery.toLowerCase();
        const qEn = (typeof banglaToEngNum === 'function' ? banglaToEngNum(rawQuery) : rawQuery).toLowerCase();
        const qBn = (typeof engToBanglaNum === 'function' ? engToBanglaNum(rawQuery) : rawQuery).toLowerCase();
        const qPhonetic = banglishToBangla(rawQuery).toLowerCase();

        const filtered = (allProducts || []).filter(p => {
            const fullText = getProductSearchableText(p).toLowerCase();
            return fullText.includes(qRaw) || 
                   fullText.includes(qEn) || 
                   fullText.includes(qBn) || 
                   (qPhonetic && fullText.includes(qPhonetic));
        });

        let html = filtered.map(buildMobileProductRowHtml).join('');
        list.innerHTML = html || `
            <div class="text-center py-4 text-muted">
                <i class="fa-solid fa-magnifying-glass fs-3 mb-2 text-secondary"></i>
                <p class="mb-0 fw-bold">"${rawQuery}" দিয়ে কোনো প্রডাক্ট পাওয়া যায়নি</p>
                <small class="text-muted">কোড নম্বর বা বাংলা/ইংরেজি নাম মেলাতে অন্য শব্দ চেষ্টা করুন</small>
            </div>
        `;
    }

    function openProductCreateModalFromMobile() {
        hideMobileModal("mobilePurchaseProductSearchModal");
        
        setTimeout(() => {
            if (typeof openPosAddProductModal === 'function') {
                openPosAddProductModal();
            } else if (typeof openProductCreateModal === 'function') {
                openProductCreateModal();
            } else {
                if (typeof resetProductForm === 'function') resetProductForm();

                const modalEl = document.getElementById('createProduct');
                if (modalEl) {
                    const parentMain = modalEl.closest('.main-content');
                    if (parentMain) parentMain.style.setProperty('display', 'block', 'important');

                    const parentPage = modalEl.closest('.page-content');
                    if (parentPage) parentPage.style.setProperty('display', 'block', 'important');

                    modalEl.style.setProperty('display', 'block', 'important');
                    modalEl.style.setProperty('z-index', '999999', 'important');
                    modalEl.style.setProperty('opacity', '1', 'important');
                    modalEl.style.setProperty('visibility', 'visible', 'important');
                    document.documentElement.style.overflowY = 'hidden';
                } else {
                    errorToast("Product Create Modal unavailable!");
                }
            }
        }, 150);
    }

    async function editProductFromMobile(productId) {
        const product = (allProducts || []).find(p => p.id == productId);
        if (!product) return;

        let confirmEdit = false;
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                title: `<span class="fw-bold text-dark fs-5">প্রোডাক্ট এডিট করুন</span>`,
                html: `<div class="text-muted fs-6 mt-1">আপনি কি <strong style="color:#15803d;">"${product.product_name}"</strong> এর তথ্য সংশোধন করতে চান?</div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#15803d',
                cancelButtonColor: '#64748b',
                confirmButtonText: '<i class="fa-solid fa-pen-to-square me-1"></i> হ্যাঁ, এডিট করুন',
                cancelButtonText: 'বাতিল',
                reverseButtons: true
            });
            confirmEdit = result.isConfirmed;
        } else {
            confirmEdit = confirm(`আপনি কি "${product.product_name}" প্রোডাক্টের তথ্য সংশোধন করতে চান?`);
        }

        if (!confirmEdit) return;

        hideMobileModal("mobilePurchaseProductSearchModal");
        if (typeof openProductUpdateModal === 'function') {
            await openProductUpdateModal(productId);
        } else {
            errorToast("Product Update Modal unavailable!");
        }
    }

    async function deleteProductFromMobile(productId, productName) {
        let confirmDelete = false;
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                title: `<span class="fw-bold text-dark fs-5">আপনি কি নিশ্চিত?</span>`,
                html: `<div class="text-muted fs-6 mt-1"><strong class="text-danger">"${productName}"</strong> প্রোডাক্টটি ডিলিট করতে চান?</div>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: '<i class="fa-solid fa-trash-can me-1"></i> হ্যাঁ, ডিলিট করুন!',
                cancelButtonText: 'বাতিল',
                reverseButtons: true
            });
            confirmDelete = result.isConfirmed;
        } else {
            confirmDelete = confirm(`আপনি কি নিশ্চিতভাবে "${productName}" প্রোডাক্টটি ডিলিট করতে চান?`);
        }

        if (!confirmDelete) return;

        try {
            let res = await axios.post("/api/delete-product", { id: productId.toString() }, HeaderToken());

            if (res.data['status'] === "success") {
                successToast(res.data['message'] || "🎉 প্রোডাক্ট সফলভাবে ডিলিট হয়েছে!");

                // Remove from global allProducts array
                allProducts = (allProducts || []).filter(p => p.id != productId);

                // Remove from cart if present
                removeMobilePurchaseCartItem(productId);

                // Refresh mobile product search list
                openMobilePurchaseProductSearchModal();
            } else {
                errorToast(res.data['message'] || "প্রোডাক্ট ডিলিট করা সম্ভব হয়নি!");
            }
        } catch (e) {
            console.error("Delete Product error:", e);
            errorToast("প্রোডাক্ট ডিলিট করতে সমস্যা হয়েছে!");
        }
    }

    function refreshMobilePurchaseProducts(newProduct) {
        if (newProduct) {
            if (typeof allProducts !== 'undefined' && Array.isArray(allProducts)) {
                const idx = allProducts.findIndex(p => p.id == newProduct.id);
                if (idx !== -1) {
                    allProducts[idx] = newProduct;
                } else {
                    allProducts.unshift(newProduct);
                }
            }
            openMobilePurchaseItemLineForm(newProduct);
        }
    }
    window.refreshMobilePurchaseProducts = refreshMobilePurchaseProducts;

    function openMobilePurchaseItemLineForm(productOrId) {
        hideMobileModal("mobilePurchaseProductSearchModal");

        let product = (typeof productOrId === 'object') ? productOrId : (allProducts || []).find(p => p.id == productOrId);
        
        if (!product) {
            const existing = mobilePurchaseCartItems.find(item => item.id == productOrId);
            if (existing) {
                product = {
                    id: existing.id,
                    product_name: existing.product_name,
                    cost_price: existing.cost_price,
                    selling_price: existing.selling_price
                };
            }
        }

        if (!product) {
            errorToast("প্রোডাক্ট তথ্য পাওয়া যায়নি!");
            return;
        }

        const existingCartItem = mobilePurchaseCartItems.find(item => item.id == product.id);

        document.getElementById("mobilePurItemLineProductId").value = product.id;
        document.getElementById("mobilePurItemLineProductName").value = product.product_name || product.name || '';

        const qtyVal = existingCartItem ? existingCartItem.quantity : 1;
        const priceVal = existingCartItem ? existingCartItem.cost_price : (parseFloat(product.cost_price || product.price || 0));

        document.getElementById("mobilePurItemLineQty").value = engToBanglaNum(qtyVal);
        document.getElementById("mobilePurItemLinePrice").value = engToBanglaNum(priceVal);

        calculateMobilePurchaseItemLineTotal();
        showMobileModal("mobilePurchaseItemLineModal");
    }

    function calculateMobilePurchaseItemLineTotal() {
        const qtyRaw = document.getElementById("mobilePurItemLineQty").value || '1';
        const priceRaw = document.getElementById("mobilePurItemLinePrice").value || '0';

        const qty = parseBanglaFloat(qtyRaw) || 1;
        const price = parseBanglaFloat(priceRaw) || 0;
        const total = qty * price;

        const breakdown = `${engToBanglaNum(qty)} X ${formatBanglaAmount(price)} = ${formatBanglaAmount(total)}`;
        document.getElementById("mobilePurItemLineBreakdown").textContent = breakdown;
        document.getElementById("mobilePurItemLineTotalText").textContent = formatBanglaAmount(total);
    }

    function confirmAddMobilePurchaseItemLine() {
        const productId = document.getElementById("mobilePurItemLineProductId")?.value;
        const qty = parseBanglaFloat(document.getElementById("mobilePurItemLineQty")?.value) || 1;
        const costPrice = parseBanglaFloat(document.getElementById("mobilePurItemLinePrice")?.value) || 0;

        let product = (allProducts || []).find(p => p.id == productId);
        if (!product) {
            const existing = mobilePurchaseCartItems.find(item => item.id == productId);
            if (existing) product = existing;
        }

        if (product) {
            const existingIndex = mobilePurchaseCartItems.findIndex(ci => ci.id == product.id);
            const subtotal = qty * costPrice;

            if (existingIndex !== -1) {
                mobilePurchaseCartItems[existingIndex].quantity = qty;
                mobilePurchaseCartItems[existingIndex].cost_price = costPrice;
                mobilePurchaseCartItems[existingIndex].subtotal = subtotal;
            } else {
                mobilePurchaseCartItems.push({
                    id: product.id,
                    product_name: product.product_name,
                    product_code: product.product_code || '',
                    cost_price: costPrice,
                    selling_price: parseFloat(product.selling_price || product.price || costPrice),
                    quantity: qty,
                    subtotal: subtotal
                });
            }

            renderMobilePurchaseCart();
        }

        hideMobileModal("mobilePurchaseItemLineModal");
    }

    function removeMobilePurchaseCartItem(productId) {
        mobilePurchaseCartItems = mobilePurchaseCartItems.filter(item => item.id != productId);
        renderMobilePurchaseCart();
    }

    function renderMobilePurchaseCart() {
        const container = document.getElementById("mobilePurchaseCartItemsList");
        if (!container) return;

        if (mobilePurchaseCartItems.length === 0) {
            container.innerHTML = `
                <div class="text-center py-4 text-muted" id="mobilePurchaseCartEmptyMsg">
                    <i class="fa-solid fa-box-open fs-3 mb-2 text-secondary"></i>
                    <p class="mb-0 small">এখনও কোনো আইটেম যোগ করা হয়নি</p>
                </div>
            `;
        } else {
            let html = mobilePurchaseCartItems.map(item => `
                <div class="p-3 mb-2 rounded-3 border bg-white cursor-pointer" onclick="openMobilePurchaseItemLineForm(${item.id})" style="border-color: #bbf7d0 !important;">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <strong class="text-dark" style="font-size: 15px;">${item.product_name}</strong>
                        <button type="button" class="btn btn-link text-danger p-0 border-0 ms-2" onclick="event.stopPropagation(); removeMobilePurchaseCartItem(${item.id});">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                    <div class="d-flex justify-content-between align-items-center text-muted small">
                        <span>মূল্য ${engToBanglaNum(item.quantity)} X ${formatBanglaAmount(item.cost_price)} = ${formatBanglaAmount(item.subtotal)}</span>
                        <strong class="fw-bold" style="color: #15803d;">সাব টোটাল: ${formatBanglaAmount(item.subtotal)}</strong>
                    </div>
                </div>
            `).join('');
            container.innerHTML = html;
        }

        syncMobilePurchaseCalcInputs();
    }

    function enforceBanglaNumberInput(inputEl, allowDecimal = true) {
        if (!inputEl) return;
        let val = inputEl.value || '';
        const enDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        const bnDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

        for (let i = 0; i < 10; i++) {
            val = val.split(enDigits[i]).join(bnDigits[i]);
        }

        if (allowDecimal) {
            val = val.replace(/[^০-৯.]/g, '');
            const parts = val.split('.');
            if (parts.length > 2) {
                val = parts[0] + '.' + parts.slice(1).join('');
            }
        } else {
            val = val.replace(/[^০-৯]/g, '');
        }

        inputEl.value = val;
    }

    function syncMobilePurchaseCalcInputs() {
        let grossTotal = mobilePurchaseCartItems.reduce((acc, item) => acc + (parseFloat(item.subtotal) || 0), 0);
        
        const grossEl = document.getElementById("mobilePurchaseGrossTotal");
        const netEl = document.getElementById("mobilePurchaseNetTotal");
        if (grossEl) grossEl.value = engToBanglaNum(grossTotal.toFixed(2));
        if (netEl) netEl.value = engToBanglaNum(grossTotal.toFixed(2));

        let paid = parseBanglaFloat(document.getElementById("mobilePurchasePaidInput")?.value) || 0;
        let due = Math.max(0, grossTotal - paid);

        const dueEl = document.getElementById("mobilePurchaseDueInput");
        if (dueEl) dueEl.value = engToBanglaNum(due.toFixed(2));
    }

    function triggerMobilePurchaseDocUpload() {
        const input = document.getElementById("mobilePurchaseDocImage");
        if (input) input.click();
    }

    function previewMobilePurchaseDocImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById("mobilePurImagePreview");
                const placeholder = document.getElementById("mobilePurImagePlaceholder");
                if (preview && placeholder) {
                    preview.src = e.target.result;
                    preview.classList.remove("d-none");
                    placeholder.classList.add("d-none");
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function confirmSaveMobilePurchase() {
        if (mobilePurchaseCartItems.length === 0) {
            errorToast("অন্তত একটি প্রডাক্ট যোগ করুন!");
            return;
        }

        if (!selectedMobileSupplier) {
            errorToast("অনুগ্রহ করে একজন সাপ্লায়ার সিলেক্ট করুন!");
            return;
        }

        const supplierId = selectedMobileSupplier.id;
        if (!supplierId) {
            errorToast("অনুগ্রহ করে সাপ্লায়ার নির্বাচন করুন!");
            return;
        }

        const grossTotal = mobilePurchaseCartItems.reduce((acc, item) => acc + (parseFloat(item.subtotal) || 0), 0);
        const paidAmount = parseBanglaFloat(document.getElementById("mobilePurchasePaidInput")?.value) || 0;
        const dueAmount = Math.max(0, grossTotal - paidAmount);
        const date = document.getElementById("mobilePurchaseDate")?.value || new Date().toISOString().split('T')[0];
        const refNo = document.getElementById("mobilePurchaseRefNo")?.value || document.getElementById("mobilePurchaseInvoiceNoInput")?.value || document.getElementById("mobilePurchaseInvoiceNo")?.textContent || document.getElementById("ReferenceNo")?.value || '';
        const paymentMethod = document.getElementById("mobilePurchasePaymentMethod")?.value || 'Cash';

        let productsPayload = mobilePurchaseCartItems.map(item => ({
            product_id: item.id,
            product_name: item.product_name,
            cost_price: item.cost_price,
            selling_price: item.selling_price,
            quantity: item.quantity,
            subtotal: item.subtotal
        }));

        let formData = new FormData();
        formData.append('supplier_id', supplierId);
        formData.append('purchase_payable_amount', selectedMobileSupplier ? (selectedMobileSupplier.purchase_payable_amount || 0) : 0);
        formData.append('date', date);
        formData.append('purchase_due_collection_date', date);
        formData.append('referance_no', refNo);
        formData.append('payment_status', paidAmount >= grossTotal ? 'Fully Paid' : (paidAmount > 0 ? 'Partial Paid' : 'Unpaid'));
        formData.append('grand_subtotal', grossTotal);
        formData.append('return_adjustment_amount', 0);
        formData.append('payment_method', paymentMethod);
        formData.append('paid_amount', paidAmount);
        formData.append('due_amount', dueAmount);
        formData.append('transaction_id', '');
        formData.append('products', JSON.stringify(productsPayload));

        const imgInput = document.getElementById('mobilePurchaseDocImage');
        if (imgInput && imgInput.files[0]) {
            formData.append('img', imgInput.files[0]);
        }

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        try {
            let res = await axios.post("/api/create-purchases", formData, config);

            if (res.data['status'] === "success") {
                successToast(res.data['message'] || "🎉 পারচেজ সফলভাবে সেভ হয়েছে!");
                mobilePurchaseCartItems = [];
                renderMobilePurchaseCart();
                setTimeout(() => {
                    location.reload();
                }, 600);
            } else {
                errorToast(res.data['message'] || "পারচেজ সেভ করা সম্ভব হয়নি!");
            }
        } catch (e) {
            console.error("Mobile Purchase Save Error:", e);
            errorToast("পারচেজ সেভ করতে সমস্যা হয়েছে!");
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (window.innerWidth < 992) {
            setTimeout(initMobilePurchaseUI, 500);
        }

        const urlParams = new URLSearchParams(window.location.search);
        if (window.innerWidth >= 992 && (urlParams.get('openModal') === 'true' || window.location.hash === '#openModal')) {
            setTimeout(function () {
                const modalEl = document.getElementById('exampleModal');
                if (modalEl) {
                    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                        let modal = bootstrap.Modal.getInstance(modalEl);
                        if (!modal) {
                            modal = new bootstrap.Modal(modalEl);
                        }
                        modal.show();
                    } else if (typeof $ !== 'undefined') {
                        $('#exampleModal').modal('show');
                    }
                }
            }, 300);
        }
    });
</script>
