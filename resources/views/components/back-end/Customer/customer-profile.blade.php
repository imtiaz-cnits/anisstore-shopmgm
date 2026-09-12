@extends('layout.dashboard-sidenav')
@section('title', 'Customer Profile')
@section('content')

<style>
    /* Custom Styling for Smart Look & Mobile Responsiveness */
    .summary-card { border: none; border-radius: 14px; transition: transform 0.2s ease; }
    .summary-card:hover { transform: translateY(-3px); }
    .card-title-small { font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; opacity: 0.95; white-space: nowrap; }
    
    .amount-text { 
        font-size: clamp(1.05rem, 2.5vw, 1.3rem); 
        font-weight: 800; 
        line-height: 1.2; 
        margin: 0; 
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .currency-symbol { 
        font-size: 0.9rem; 
        font-weight: 600; 
        margin-right: 2px; 
    }
    
    .table-custom th { font-weight: 600; color: #555; border-bottom: 2px solid #eee; }
    .badge-soft-info { background-color: #e0f3ff; color: #007bff; border: 1px solid #b3d7ff; }

    /* Touch-friendly Horizontal Scroll Tabs for Mobile */
    .profile-nav-tabs {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        white-space: nowrap;
        scrollbar-width: none;
        -ms-overflow-style: none;
        padding-bottom: 2px;
    }
    .profile-nav-tabs::-webkit-scrollbar {
        display: none;
    }
    .profile-nav-tabs .nav-link {
        white-space: nowrap;
        flex-shrink: 0;
    }

    /* Compact Responsive Table Styling for Mobile */
    .table-responsive {
        border-radius: 10px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table-compact-mobile {
        font-size: 13px;
        white-space: nowrap;
    }

    @media (max-width: 576px) {
        .page-content {
            padding-left: 8px !important;
            padding-right: 8px !important;
        }
        .summary-card {
            border-radius: 12px;
        }
        .card-body.p-4 {
            padding: 12px 10px !important;
        }
        .table-compact-mobile {
            font-size: 11.5px !important;
        }
        .table-compact-mobile th, 
        .table-compact-mobile td {
            padding: 7px 6px !important;
        }
        .table-compact-mobile .badge {
            font-size: 9.5px !important;
            padding: 3px 6px !important;
        }
        .table-compact-mobile .btn-sm {
            padding: 2px 6px !important;
            font-size: 10px !important;
        }
        #collectionTypeGroup {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        #collectionTypeGroup .btn {
            border-radius: 10px !important;
            width: 100%;
        }
    }
</style>

<div class="main-content">
    <div class="page-content">
        <!-- Compact Ultra-Responsive Customer Profile Header -->
        <div class="card border-0 shadow-sm mb-3" style="border-radius: 12px; background: #ffffff;">
            <div class="card-body p-2 p-sm-3">
                <!-- Customer Details & Compact Action Buttons -->
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pb-2 mb-2 border-bottom">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="bg-primary text-white fw-bold rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px; font-size: 15px;">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <h5 id="c_name" class="fw-bold text-dark mb-0 fs-6">Loading...</h5>
                                <span id="c_id" class="badge bg-secondary-subtle text-secondary border px-2 py-0.5" style="font-size: 10.5px;">CUST-0000</span>
                                <span id="c_opening_due" class="badge bg-warning text-dark px-2 py-0.5" style="font-size: 10.5px;">Opening Due: ৳0.00</span>
                            </div>
                            <div class="text-muted d-flex align-items-center gap-3 flex-wrap mt-0.5" style="font-size: 11px;">
                                <span><i class="fa-solid fa-phone me-1 text-primary"></i><span id="c_phone">...</span></span>
                                <span><i class="fa-solid fa-location-dot me-1 text-danger"></i><span id="c_address">...</span></span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex align-items-center gap-2 ms-auto flex-wrap">
                        <button class="btn btn-sm btn-success fw-bold rounded-pill px-3 py-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#collectCustomerDueModal" style="font-size: 12px;">
                            <i class="fa-solid fa-hand-holding-dollar me-1"></i> Collect Due (বকেয়া আদায়)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary fw-bold px-3 py-1 rounded-pill shadow-sm no-print" onclick="window.print()" style="font-size: 12px;">
                            <i class="fa-solid fa-print me-1"></i> প্রিন্ট রিপোর্ট
                        </button>
                        <a href="javascript:history.back()" class="btn btn-sm btn-outline-secondary fw-bold px-2.5 py-1 rounded-pill shadow-sm" style="font-size: 12px;">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                </div>

                <!-- 5 Metric Cards in 1 Horizontal Line Grid -->
                <div class="row g-2 align-items-center">
                    <div class="col-6 col-sm-4 col-md">
                        <div class="card bg-info text-white text-center shadow-sm border-0 py-2 px-1 rounded-3">
                            <span class="card-title-small" style="font-size: 9.5px; opacity: 0.95;">INVOICES</span>
                            <h5 id="s_invoices" class="fw-bold mb-0 text-white" style="font-size: 15px;">0</h5>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="card text-white text-center shadow-sm border-0 py-2 px-1 rounded-3" style="background-color: #5a5eb9;">
                            <span class="card-title-small" style="font-size: 9.5px; opacity: 0.95;">TOTAL BILLED</span>
                            <h5 id="s_billed" class="fw-bold mb-0 text-white" style="font-size: 14px;">৳0.00</h5>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="card bg-success text-white text-center shadow-sm border-0 py-2 px-1 rounded-3">
                            <span class="card-title-small" style="font-size: 9.5px; opacity: 0.95;">TOTAL PAID</span>
                            <h5 id="s_paid" class="fw-bold mb-0 text-white" style="font-size: 14px;">৳0.00</h5>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md">
                        <div class="card text-white text-center shadow-sm border-0 py-2 px-1 rounded-3" style="background-color: #0d9488;">
                            <span class="card-title-small" style="font-size: 9.5px; opacity: 0.95;">RETURN CREDIT</span>
                            <h5 id="s_returns" class="fw-bold mb-0 text-white" style="font-size: 14px;">৳0.00</h5>
                            <small id="s_return_sub" style="font-size: 8.5px; opacity: 0.9;" class="d-block">Total: ৳0 | Adj: ৳0</small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md">
                        <div class="card bg-danger text-white text-center shadow-sm border-0 py-2 px-1 rounded-3">
                            <span class="card-title-small" style="font-size: 9.5px; opacity: 0.95;">NET CURRENT DUE</span>
                            <h5 id="s_due" class="fw-extrabold mb-0 text-white" style="font-size: 15px;">৳0.00</h5>
                            <small id="s_due_sub" style="font-size: 8.5px; opacity: 0.9;" class="d-block">Prev: ৳0 | Inv: ৳0</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scrollable Mobile Tabs Section -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 14px;">
            <div class="card-header bg-white border-0 pt-3 px-3 px-sm-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <ul class="nav nav-tabs card-header-tabs border-bottom-0 profile-nav-tabs" id="customerProfileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold text-primary" id="invoices-tab" data-bs-toggle="tab" data-bs-target="#invoices-content" type="button" role="tab">
                            <i class="fa-solid fa-file-invoice me-2"></i>Invoice History (<span id="invoicesTabCount">0</span>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold" id="returns-tab" data-bs-toggle="tab" data-bs-target="#returns-content" type="button" role="tab" style="color: #0d9488;">
                            <i class="fa-solid fa-arrow-rotate-left me-2"></i>Sales Returns / Credit (<span id="returnsTabCount">0</span>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold text-success" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions-content" type="button" role="tab">
                            <i class="fa-solid fa-money-bill-transfer me-2"></i>Payment & Transaction (<span id="transactionsTabCount">0</span>)
                        </button>
                    </li>
                </ul>
                <button type="button" class="btn btn-outline-primary btn-sm fw-bold px-3 py-1.5 rounded-pill shadow-sm no-print" onclick="window.print()" title="কাস্টমার স্টেটমেন্ট প্রিন্ট করুন">
                    <i class="fa-solid fa-print me-1"></i> প্রিন্ট রিপোর্ট
                </button>
            </div>
            <div class="card-body p-4">
                <div class="tab-content" id="customerProfileTabContent">

                    <!-- Tab 1: Invoices -->
                    <div class="tab-pane fade show active" id="invoices-content" role="tabpanel">
                        <div class="table-responsive">
                            <table id="customerInvoiceTable" class="table table-bordered table-hover align-middle mb-0 table-compact-mobile">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center py-2" style="width: 40px;">SL</th>
                                        <th class="py-2">Invoice No</th>
                                        <th class="py-2">Date</th>
                                        <th class="text-end py-2">Subtotal</th>
                                        <th class="text-end py-2">Discount</th>
                                        <th class="text-end py-2">Paid</th>
                                        <th class="text-end py-2">Due</th>
                                        <th class="text-center py-2">Status</th>
                                        <th class="text-center py-2" style="width: 70px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td colspan="9" class="text-center py-4 text-muted">Loading invoices...</td></tr>
                                </tbody>
                                <tfoot id="customerInvoiceTableFooter" class="table-light">
                                    <tr class="table-secondary fw-bold border-top border-2">
                                        <td colspan="3" class="text-end fw-extrabold py-2 text-dark">সর্বমোট (Total):</td>
                                        <td class="text-end fw-extrabold py-2 text-dark" id="foot_subtotal">৳0.00</td>
                                        <td class="text-end fw-extrabold py-2 text-danger" id="foot_discount">৳0.00</td>
                                        <td class="text-end fw-extrabold py-2 text-success" id="foot_paid">৳0.00</td>
                                        <td class="text-end fw-extrabold py-2 text-danger" id="foot_due">৳0.00</td>
                                        <td colspan="2"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Tab 2: Sales Returns -->
                    <div class="tab-pane fade" id="returns-content" role="tabpanel">
                        <div class="table-responsive">
                            <table id="customerReturnsTable" class="table table-bordered table-hover align-middle mb-0 table-compact-mobile">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center py-2" style="width: 40px;">SL</th>
                                        <th class="text-center py-2">Return Date</th>
                                        <th class="text-center py-2">Invoice Ref</th>
                                        <th class="text-start py-2">Returned Product Name</th>
                                        <th class="text-center py-2">Qty</th>
                                        <th class="text-end py-2">Refund / Credit Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td colspan="6" class="text-center py-4 text-muted">Loading return records...</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tab 3: Transactions -->
                    <div class="tab-pane fade" id="transactions-content" role="tabpanel">
                        <div class="table-responsive">
                            <table id="transactionTable" class="table table-bordered table-hover align-middle mb-0 table-compact-mobile">
                                <thead class="table-light">
                                    <tr>
                                        <th class="py-2">Date & Time</th>
                                        <th class="py-2">Reference / Note</th>
                                        <th class="py-2">Payment Method</th>
                                        <th class="text-end py-2">Paid Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td colspan="4" class="text-center py-4 text-muted">Loading transactions...</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Collect Customer Due Modal -->
<div class="modal fade" id="collectCustomerDueModal" tabindex="-1" aria-labelledby="collectCustomerDueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header bg-success text-white py-3" style="border-top-left-radius: 16px; border-top-right-radius: 16px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%) !important;">
                <h5 class="modal-title fw-bold" id="collectCustomerDueModalLabel">
                    <i class="fa-solid fa-hand-holding-dollar me-2"></i>Collect Customer Due (বকেয়া আদায়)
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="collectCustomerDueForm" onsubmit="submitCustomerDueCollection(event)">
                <div class="modal-body p-4">
                    <!-- Customer Info Card inside Modal -->
                    <div class="bg-light p-3 rounded-3 mb-3 border">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="fw-bold text-dark" id="modalCustomerName">Customer Name</span>
                            <span class="badge bg-secondary" id="modalCustomerId">ID</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">Target Outstanding Due:</span>
                            <span class="fw-bold text-danger fs-6" id="modalTotalDue">৳ 0.00</span>
                        </div>
                    </div>

                    <!-- Due Collection Target Selection -->
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block text-dark">Collection Target (আদায়ের খাত) <span class="text-danger">*</span></label>
                        <div class="btn-group w-100" role="group" id="collectionTypeGroup">
                            <input type="radio" class="btn-check" name="collection_type" id="ctype_all" value="all" checked onchange="onCollectionTypeChange()">
                            <label class="btn btn-outline-success fw-bold py-2" for="ctype_all" title="আগের ও ইনভয়েসের উভয় বকেয়া কালেকশন">
                                <i class="fa-solid fa-layer-group me-1"></i> উভয় বকেয়া
                            </label>

                            <input type="radio" class="btn-check" name="collection_type" id="ctype_previous" value="previous" onchange="onCollectionTypeChange()">
                            <label class="btn btn-outline-primary fw-bold py-2" for="ctype_previous" title="শুধুমাত্র পুরানো বকেয়া কালেকশন">
                                <i class="fa-solid fa-clock-rotate-left me-1"></i> আগের বকেয়া
                            </label>

                            <input type="radio" class="btn-check" name="collection_type" id="ctype_invoice" value="invoice" onchange="onCollectionTypeChange()">
                            <label class="btn btn-outline-warning text-dark fw-bold py-2" for="ctype_invoice" title="শুধুমাত্র মেমো/ইনভয়েসের বকেয়া কালেকশন">
                                <i class="fa-solid fa-file-invoice-dollar me-1"></i> ইনভয়েস বকেয়া
                            </label>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="mb-3">
                        <label for="modalPaidAmount" class="form-label fw-bold text-dark">Collected Amount (আদায়ের পরিমাণ ৳) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-white fw-bold">৳</span>
                            <input type="number" step="0.01" class="form-control fw-bold fs-5 text-success" id="modalPaidAmount" placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="modalDiscountAmount" class="form-label fw-bold text-dark">Discount / Waiver (ছাড় ৳)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white fw-bold">৳</span>
                            <input type="number" step="0.01" class="form-control" id="modalDiscountAmount" value="0.00">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="modalPaymentMethod" class="form-label fw-bold text-dark">Payment Method</label>
                            <select class="form-select fw-semibold" id="modalPaymentMethod">
                                <option value="Cash" selected>Cash (নগদ)</option>
                                <option value="bKash">bKash</option>
                                <option value="Nagad">Nagad</option>
                                <option value="Rocket">Rocket</option>
                                <option value="Bank">Bank Transfer</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="modalCollectionDate" class="form-label fw-bold text-dark">Collection Date</label>
                            <input type="date" class="form-control fw-semibold" id="modalCollectionDate">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="modalTransactionId" class="form-label fw-bold text-dark">Transaction ID / Note</label>
                        <input type="text" class="form-control" id="modalTransactionId" placeholder="e.g. TrxID / Receipt No">
                    </div>
                </div>
                <div class="modal-footer bg-light py-3" style="border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;">
                    <button type="button" class="btn btn-secondary fw-bold rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="btnSubmitCollection" class="btn btn-success fw-bold rounded-pill px-5 shadow-sm" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none;">
                        <i class="fa-solid fa-check me-1"></i> Submit Collection
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const customerId = "{{ $id }}";

    window.previousDueVal = 0;
    window.invoiceDueVal = 0;
    window.totalDueVal = 0;

    document.addEventListener("DOMContentLoaded", () => {
        fetchCustomerProfile();
    });

    function onCollectionTypeChange() {
        const selectedType = document.querySelector('input[name="collection_type"]:checked')?.value || 'all';
        const inputAmount = document.getElementById('modalPaidAmount');
        const modalTotalDue = document.getElementById('modalTotalDue');

        let targetMax = 0;
        let targetText = '';

        if (selectedType === 'previous') {
            targetMax = window.previousDueVal;
            targetText = `৳ ${targetMax.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2})} (শুধুমাত্র আগের বকেয়া)`;
        } else if (selectedType === 'invoice') {
            targetMax = window.invoiceDueVal;
            targetText = `৳ ${targetMax.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2})} (শুধুমাত্র ইনভয়েস বকেয়া)`;
        } else {
            targetMax = window.totalDueVal;
            targetText = `৳ ${targetMax.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2})} (আগের: ৳${window.previousDueVal.toFixed(2)} | ইনভয়েস: ৳${window.invoiceDueVal.toFixed(2)})`;
        }

        modalTotalDue.innerText = targetText;
        inputAmount.value = targetMax > 0 ? targetMax.toFixed(2) : '';
    }

    async function fetchCustomerProfile() {
        try {
            if(typeof showLoader === "function") showLoader();

            let res = await axios.get(`/api/customer-profile-data/${customerId}`, HeaderToken());

            if(typeof hideLoader === "function") hideLoader();

            if (res.data.status === 'success') {
                let customer = res.data.customer;
                let summary = res.data.summary;
                let invoices = res.data.invoices || [];
                let returns = res.data.returns || [];
                let transactions = res.data.transactions || [];

                // Track due breakdown
                window.previousDueVal = parseFloat(customer.previous_due_amount || 0);
                window.invoiceDueVal = invoices.reduce((sum, inv) => sum + parseFloat(inv.due_amount || 0), 0);
                window.totalDueVal = Math.max(0, window.previousDueVal + window.invoiceDueVal - parseFloat(summary.available_credit || 0));

                // Set Customer Info
                document.getElementById('c_name').innerText = customer.name || customer.customer_name || 'N/A';
                document.getElementById('c_id').innerText = customer.customer_id || 'N/A';
                document.getElementById('c_phone').innerText = customer.mobile || customer.phone || 'N/A';
                document.getElementById('c_address').innerText = customer.address || 'N/A';
                
                const openingDue = parseFloat(summary.opening_due || customer.previous_due_amount || 0);
                const invDue = parseFloat(summary.invoice_due || window.invoiceDueVal || 0);
                document.getElementById('c_opening_due').innerText = `৳${openingDue.toFixed(2)}`;

                // Set Summary
                document.getElementById('s_invoices').innerText = summary.total_invoices;
                document.getElementById('s_billed').innerText = '৳' + parseFloat(summary.total_billed).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('s_paid').innerText = '৳' + parseFloat(summary.total_paid).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('s_returns').innerText = '৳' + parseFloat(summary.available_credit || 0).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('s_return_sub').innerText = `Total: ৳${parseFloat(summary.total_returns || 0).toFixed(2)} | Adj: ৳${parseFloat(summary.total_returns_adjusted || 0).toFixed(2)}`;
                document.getElementById('s_due').innerText = '৳' + parseFloat(summary.total_due).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                
                const dueSubEl = document.getElementById('s_due_sub');
                if (dueSubEl) {
                    dueSubEl.innerText = `Prev: ৳${openingDue.toFixed(0)} | Inv: ৳${invDue.toFixed(0)}`;
                }

                document.getElementById('invoicesTabCount').innerText = invoices.length;
                document.getElementById('returnsTabCount').innerText = returns.length;
                document.getElementById('transactionsTabCount').innerText = transactions.length;

                // Pre-fill Modal Info
                document.getElementById('modalCustomerName').innerText = customer.name || customer.customer_name || 'N/A';
                document.getElementById('modalCustomerId').innerText = customer.customer_id || 'N/A';
                document.getElementById('modalCollectionDate').value = new Date().toISOString().split('T')[0];

                onCollectionTypeChange();

                // Set Invoices Table
                let invoiceTableList = $("#customerInvoiceTable tbody");
                invoiceTableList.empty();

                let totalSubSum = 0;
                let totalDiscSum = 0;
                let totalPaidSum = 0;
                let totalDueSum = 0;

                if (invoices.length === 0) {
                    invoiceTableList.append(`<tr><td colspan="9" class="text-center text-muted py-4">No invoices found.</td></tr>`);
                } else {
                    invoices.forEach(function(item, index) {
                        const rawSub = parseFloat(item.sub_total || 0);
                        const rawDisc = parseFloat(item.discount_amount || 0);
                        const rawPaid = parseFloat(item.paid_amount || 0);
                        const rawDue = parseFloat(item.due_amount || 0);

                        totalSubSum += rawSub;
                        totalDiscSum += rawDisc;
                        totalPaidSum += rawPaid;
                        totalDueSum += rawDue;

                        const subTotal = item.sub_total ? rawSub.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '0.00';
                        const discount = item.discount_amount && rawDisc > 0 ? rawDisc.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '0.00';
                        const due = item.due_amount ? rawDue.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '0.00';
                        const paid = rawPaid;
                        const dueRaw = rawDue;
                        
                        let paidDisplayHtml = `৳${paid.toFixed(2)}`;
                        if (item.return_adjustment_amount && parseFloat(item.return_adjustment_amount) > 0) {
                            paidDisplayHtml += `<br><span class="badge bg-teal-subtle text-teal border" style="font-size: 11px; color: #0d9488;">+৳${parseFloat(item.return_adjustment_amount).toFixed(2)} Adj</span>`;
                        }

                        let paymentStatus = '';
                        if (dueRaw === 0 && (paid > 0 || (item.return_adjustment_amount && parseFloat(item.return_adjustment_amount) > 0))) {
                            paymentStatus = '<span class="badge bg-success px-3 py-1 rounded-pill">Fully Paid</span>';
                        } else if (dueRaw > 0 && paid > 0) {
                            paymentStatus = '<span class="badge bg-warning text-dark px-3 py-1 rounded-pill">Partial Paid</span>';
                        } else if (dueRaw > 0 && paid === 0) {
                            paymentStatus = '<span class="badge bg-danger px-3 py-1 rounded-pill">Unpaid</span>';
                        } else {
                            paymentStatus = '<span class="badge bg-secondary px-3 py-1 rounded-pill">Unknown</span>';
                        }

                        let dObj = new Date(item.invoice_date || item.created_at);
                        let formattedDate = !isNaN(dObj) ? `${dObj.getDate().toString().padStart(2, '0')} ${dObj.toLocaleString('en-US', { month: 'short' })} ${dObj.getFullYear()}` : 'N/A';

                        let row = `
                            <tr>
                                <td class="text-center fw-bold text-muted">${index + 1}</td>
                                <td><a href="/invoice/${item.id}" class="fw-bold text-primary" style="text-decoration: none;">${item.order_no}</a></td>
                                <td>${formattedDate}</td>
                                <td class="text-end fw-semibold text-dark">৳${subTotal}</td>
                                <td class="text-end fw-semibold text-danger">৳${discount}</td>
                                <td class="text-end fw-semibold text-success">${paidDisplayHtml}</td>
                                <td class="text-end fw-semibold ${dueRaw > 0 ? 'text-danger' : 'text-muted'}">৳${due}</td>
                                <td class="text-center">${paymentStatus}</td>
                                <td class="text-center">
                                    <a href="/invoice/${item.id}" class="btn btn-sm btn-outline-primary px-2 py-1" title="View Invoice">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        `;
                        invoiceTableList.append(row);
                    });
                }

                // Update Table Footer Totals
                if (document.getElementById('foot_subtotal')) document.getElementById('foot_subtotal').innerText = '৳' + totalSubSum.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                if (document.getElementById('foot_discount')) document.getElementById('foot_discount').innerText = '৳' + totalDiscSum.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                if (document.getElementById('foot_paid')) document.getElementById('foot_paid').innerText = '৳' + totalPaidSum.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                if (document.getElementById('foot_due')) document.getElementById('foot_due').innerText = '৳' + totalDueSum.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});

                // Set Sales Returns Table
                let returnsTableList = $("#customerReturnsTable tbody");
                returnsTableList.empty();
                if (returns.length === 0) {
                    returnsTableList.append(`<tr><td colspan="6" class="text-center text-muted py-4">No sales return records found.</td></tr>`);
                } else {
                    returns.forEach(function(rItem, rIndex) {
                        let row = `
                            <tr>
                                <td class="text-center fw-bold">${rIndex + 1}</td>
                                <td class="text-center fw-semibold text-dark">${rItem.created_at_formatted || rItem.date}</td>
                                <td class="text-center"><span class="badge bg-light text-primary border font-monospace">${rItem.order_no}</span></td>
                                <td class="text-start fw-bold text-dark">${rItem.product_name}</td>
                                <td class="text-center"><span class="badge bg-light text-dark border px-2 py-1 fw-bold">${rItem.quantity} pcs</span></td>
                                <td class="text-end fw-bold text-teal" style="color: #0d9488;">৳${parseFloat(rItem.amount).toFixed(2)}</td>
                            </tr>
                        `;
                        returnsTableList.append(row);
                    });
                }

                // Set Transactions Table
                let trxTableList = $("#transactionTable tbody");
                trxTableList.empty();

                if (!transactions || transactions.length === 0) {
                    trxTableList.append(`<tr><td colspan="4" class="text-center text-muted py-4">No payment history found.</td></tr>`);
                } else {
                    transactions.forEach(function(item) {
                        const amount = item.paid_amount ? parseFloat(item.paid_amount).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '0.00';
                        const payMethod = item.payment_method || 'Cash';
                        
                        let formattedDate = new Intl.DateTimeFormat('en-US', { 
                            day: '2-digit', month: 'short', year: 'numeric', 
                            hour: 'numeric', minute: '2-digit', hour12: true 
                        }).format(new Date(item.created_at));

                        let row = `
                            <tr>
                                <td>
                                    <div class="fw-semibold text-dark" style="font-size: 0.9rem;">${formattedDate.split(',')[0]}</div>
                                    <small class="text-muted">${formattedDate.split(',')[1]}</small>
                                </td>
                                <td><span class="badge badge-soft-info" style="font-size: 12px;">${item.reference_no || item.order_no || 'Due Collection'}</span></td>
                                <td><span class="text-muted"><i class="fa-solid fa-wallet me-1"></i>${payMethod}</span></td>
                                <td class="text-end fw-bold text-success">৳${amount}</td>
                            </tr>
                        `;
                        trxTableList.append(row);
                    });
                }

            } else {
                alert("Error: " + res.data.message);
            }

        } catch (e) {
            if(typeof hideLoader === "function") hideLoader();
            console.error(e);
            alert("Something went wrong while fetching customer profile.");
        }
    }

    async function submitCustomerDueCollection(event) {
        event.preventDefault();

        const collectionType = document.querySelector('input[name="collection_type"]:checked')?.value || 'all';
        const paidAmount = parseFloat(document.getElementById('modalPaidAmount').value) || 0;
        const discountAmount = parseFloat(document.getElementById('modalDiscountAmount').value) || 0;
        const paymentMethod = document.getElementById('modalPaymentMethod').value;
        const collectionDate = document.getElementById('modalCollectionDate').value;
        const transactionId = document.getElementById('modalTransactionId').value;
        const btn = document.getElementById('btnSubmitCollection');

        if (paidAmount <= 0) {
            alert("Please enter a valid collected amount!");
            return;
        }

        try {
            if (typeof showLoader === "function") showLoader();
            btn.disabled = true;

            const payload = {
                id: customerId,
                customer_id: customerId,
                collection_type: collectionType,
                paid_amount: paidAmount,
                discount_amount: discountAmount,
                payment_method: paymentMethod,
                collection_date: collectionDate,
                due_collection_date: collectionDate,
                transaction_id: transactionId
            };

            let res = await axios.post('/api/customer-due-collection', payload, HeaderToken());

            if (typeof hideLoader === "function") hideLoader();
            btn.disabled = false;

            if (res.data.status === 'success') {
                if (typeof successToast === 'function') {
                    successToast(res.data.message || "Customer due collection recorded successfully!");
                } else {
                    alert(res.data.message || "Customer due collection recorded successfully!");
                }

                const modalEl = document.getElementById('collectCustomerDueModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();

                fetchCustomerProfile();
            } else {
                alert(res.data.message || "Failed to record due collection.");
            }
        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            btn.disabled = false;
            console.error(e);
            alert("Error: " + (e.response?.data?.message || e.message || "Failed to submit due collection."));
        }
    }
</script>
@endsection