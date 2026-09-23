<!-- Sales & Purchase Return Processing Modal -->
<div class="modal fade" id="processReturnModal" tabindex="-1" aria-labelledby="processReturnModalLabel" aria-hidden="true" style="z-index: 107000;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            
            <!-- Sticky Purple Modal Header -->
            <div id="modalHeaderBox" class="modal-header py-3 px-3 px-sm-4" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; color: #ffffff !important; position: sticky; top: 0; z-index: 20; border-bottom: 1px solid rgba(255, 255, 255, 0.2);">
                <h5 class="modal-title fw-bold text-white fs-5 d-flex align-items-center gap-2 mb-0" id="processReturnModalLabel">
                    <i id="modalHeaderIcon" class="fa-solid fa-arrow-rotate-left"></i> <span id="modalHeaderTitle">রিটার্ন প্রসেসিং</span>
                </h5>
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Scrollable Modal Body -->
            <div class="modal-body p-3 p-sm-4" style="overflow-y: auto; max-height: calc(85vh - 125px); max-height: calc(85dvh - 125px); -webkit-overflow-scrolling: touch;">
                
                <!-- In-Modal Mode Toggle Switcher (Sales vs Purchase) -->
                <div class="d-flex align-items-center justify-content-center gap-2 mb-3">
                    <button type="button" id="modalModeSalesBtn" onclick="switchModalReturnMode('sales')" class="return-mode-pill-btn active d-inline-flex align-items-center py-2 px-3 fw-bold" style="border-radius: 8px; font-size: 12.5px; gap: 8px !important;">
                        <i class="fa-solid fa-cart-shopping me-1"></i>
                        <span>বিক্রি রিটার্ন</span>
                    </button>
                    <button type="button" id="modalModePurchaseBtn" onclick="switchModalReturnMode('purchase')" class="return-mode-pill-btn d-inline-flex align-items-center py-2 px-3 fw-bold" style="border-radius: 8px; font-size: 12.5px; gap: 8px !important;">
                        <i class="fa-solid fa-truck-ramp-box me-1"></i>
                        <span>ক্রয় রিটার্ন</span>
                    </button>
                </div>

                <!-- Search Bar inside Modal -->
                <div class="card border p-3 mb-3 return-inner-card" style="border-radius: 12px; background-color: #FAF7FD; border-color: #E5D5F7 !important;">
                    <label id="modalSearchLabel" class="form-label fw-bold text-dark small mb-1.5 d-flex align-items-center gap-1">
                        <i class="fa-solid fa-magnifying-glass" style="color: #8C56D4;"></i>
                        <span>ইনভয়েস বা অর্ডার নম্বর দিয়ে খুঁজুন</span>
                    </label>
                    <div class="d-flex align-items-stretch w-100 flex-nowrap" style="border: 1.5px solid #cbd5e1; border-radius: 10px; overflow: hidden; background: #ffffff;">
                        <span class="d-flex align-items-center justify-content-center bg-light text-muted px-3" style="border-right: 1px solid #cbd5e1; flex-shrink: 0; min-width: 44px;">
                            <i id="modalSearchIcon" class="fa-solid fa-receipt" style="color: #8C56D4; font-size: 15px;"></i>
                        </span>
                        <input type="text" id="modalInvoiceSearchInput" class="form-control border-0 shadow-none px-3 fw-bold dark-input" placeholder="যেমন: #InvID00001 অথবা ১" onkeydown="if(event.key==='Enter') searchInvoiceInModal()" style="height: 42px; font-size: 13.5px; border-radius: 0 !important; flex: 1 1 auto; width: 1% !important; min-width: 0 !important;" />
                        <button type="button" id="modalSearchBtn" onclick="searchInvoiceInModal()" class="btn btn-primary fw-bold px-3 px-sm-4 text-nowrap d-inline-flex align-items-center justify-content-center flex-shrink-0" style="border-radius: 0 !important; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; height: 42px; font-size: 13.5px; white-space: nowrap; gap: 6px !important;">
                            <i class="fa-solid fa-magnifying-glass me-1"></i> <span>খুঁজুন</span>
                        </button>
                    </div>
                </div>

                <!-- Invoice / Purchase Details Summary Card (Initially Hidden) -->
                <div id="invoiceSummaryCard" class="d-none mb-3 p-3 rounded-3 return-summary-card" style="background: #F3ECFB; border: 1.5px solid #E5D5F7;">
                    <div class="row g-2 text-dark">
                        <div class="col-6 mb-1">
                            <span id="summaryNoLabel" class="text-muted small fw-semibold d-block" style="font-size: 11px;">ইনভয়েস / মেমো নং:</span>
                            <h6 id="modalOrderNo" class="fw-bold mb-0" style="color: #8C56D4; font-size: 14px;">#InvID00001</h6>
                        </div>
                        <div class="col-6 mb-1 text-end">
                            <span class="text-muted small fw-semibold d-block" style="font-size: 11px;"><span id="summaryDateLabel">তারিখ</span>: <strong id="modalInvoiceDate" class="text-dark">01 Aug 2026</strong></span>
                            <span class="text-muted small fw-semibold d-block" style="font-size: 11px;">মোট: <strong id="modalSubTotal" class="text-dark">৳ ০.০০</strong></span>
                        </div>
                        <div class="col-6">
                            <span id="summaryPartyLabel" class="text-muted small fw-semibold d-block" style="font-size: 11px;">কাস্টমার / পার্টি:</span>
                            <span id="modalCustomerName" class="fw-bold d-block text-truncate" style="font-size: 13px;">-</span>
                        </div>
                        <div class="col-6 text-end">
                            <span class="text-muted small fw-semibold d-block" style="font-size: 11px;">
                                পরিশোধ: <strong id="modalPaidAmount" class="text-success">৳ ০.০০</strong> | বকেয়া: <strong id="modalDueAmount" class="text-danger">৳ ০.০০</strong>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Return Products Table (Initially Hidden) -->
                <div id="returnItemsContainer" class="d-none">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-1" style="font-size: 13.5px;">
                            <i class="fa-solid fa-square-check" style="color: #8C56D4;"></i>
                            <span>রিটার্নকৃত আইটেম নির্বাচন করুন:</span>
                        </h6>
                        <span class="badge bg-light text-dark border fw-medium" style="font-size: 10px;">টিক দিয়ে সংখ্যা লিখুন</span>
                    </div>

                    <div class="table-responsive rounded-3 border return-table-wrapper mb-3" style="max-height: 260px; overflow-y: auto;">
                        <table class="table align-middle table-hover mb-0" style="font-size: 12.5px;">
                            <thead class="bg-light text-muted small text-uppercase" style="position: sticky; top: 0; z-index: 5;">
                                <tr>
                                    <th class="text-center" style="width: 44px;">
                                        <input type="checkbox" id="selectAllReturnItems" class="form-check-input cursor-pointer" onchange="toggleSelectAllReturnItems(this)" title="সবগুলো নির্বাচন করুন" />
                                    </th>
                                    <th>পণ্য</th>
                                    <th class="text-center" style="width: 75px;">কেনা/বেচা</th>
                                    <th class="text-end" style="width: 85px;">দর</th>
                                    <th class="text-center" style="width: 95px;">ফেরত সংখ্যা</th>
                                    <th class="text-end pe-3" style="width: 100px;">রিফান্ড মোট</th>
                                </tr>
                            </thead>
                            <tbody id="returnItemsTbody">
                                <!-- Populated dynamically -->
                            </tbody>
                            <tfoot class="bg-light fw-bold" style="position: sticky; bottom: 0; z-index: 5;">
                                <tr>
                                    <td colspan="5" class="text-end text-muted small text-uppercase">মোট রিফান্ড পরিমাণ:</td>
                                    <td id="totalRefundText" class="text-end pe-3 fw-extrabold" style="color: #8C56D4; font-size: 14px;">৳ ০.০০</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- 2 Inputs in 1 Row: Return Date & Return Note (Strictly 2 per row as requested) -->
                    <div class="row g-2 mt-1">
                        <div class="col-6">
                            <label class="form-label fw-bold text-dark small mb-1" style="font-size: 11.5px;">
                                <i class="fa-regular fa-calendar-check me-1" style="color: #8C56D4;"></i>রিটার্ন তারিখ
                            </label>
                            <input type="text" id="modalReturnDate" class="form-control dark-input fw-semibold" placeholder="DD-MM-YYYY" style="height: 40px; font-size: 12.5px; width: 100% !important; border-radius: 8px;" />
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold text-dark small mb-1" style="font-size: 11.5px;">
                                <i class="fa-solid fa-pen-to-square me-1" style="color: #8C56D4;"></i>রিটার্ন কারণ / নোট
                            </label>
                            <input type="text" id="modalReturnNote" class="form-control dark-input fw-semibold" placeholder="কারণ লিখুন (ঐচ্ছিক)" style="height: 40px; font-size: 12.5px; width: 100% !important; border-radius: 8px;" />
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sticky Modal Footer (1 Row, Side-by-Side Buttons) -->
            <div class="modal-footer py-2.5 px-3 px-sm-4 border-top" style="position: sticky; bottom: 0; z-index: 20; background: #ffffff; display: flex !important; flex-direction: row !important; flex-wrap: nowrap !important; gap: 10px !important; width: 100% !important;">
                <button type="button" class="btn btn-cancel-custom flex-grow-1 py-2 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="height: 42px; border-radius: 8px; background-color: #ef4444 !important; border: none; font-size: 13.5px;">
                    <i class="fa-solid fa-xmark me-1"></i> বাতিল
                </button>
                <button type="button" id="submitReturnBtn" onclick="submitReturnForm()" class="btn btn-submit-custom flex-grow-1 py-2 fw-bold text-white shadow-sm d-none" style="height: 42px; border-radius: 8px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; font-size: 13.5px;">
                    <i class="fa-solid fa-check me-1"></i> প্রসেস রিটার্ন
                </button>
            </div>

        </div>
    </div>
</div>

<style>
    /* Close Button */
    .btn-close-custom {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .btn-close-custom:hover {
        background: #ef4444;
        transform: rotate(90deg);
        color: #ffffff;
    }

    /* Fixed input widths inside items */
    .return-qty-input {
        width: 72px !important;
        max-width: 100% !important;
        height: 32px !important;
        padding: 2px 4px !important;
        border-radius: 6px !important;
        text-align: center;
    }

    /* Mobile & Tablet Bottom Sheet Modal (< 992px) with virtual keyboard support */
    @media (max-width: 991.98px) {
        #processReturnModal {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        #processReturnModal .modal-dialog {
            margin: 0 !important;
            margin-top: auto !important;
            width: 100% !important;
            max-width: 100% !important;
            min-height: 100% !important;
            display: flex !important;
            align-items: flex-end !important;
        }

        #processReturnModal .modal-content {
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            width: 100% !important;
            max-height: 90vh !important;
            max-height: 90dvh !important;
            display: flex !important;
            flex-direction: column !important;
            overflow: hidden !important;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.25) !important;
        }

        #processReturnModal .modal-body {
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch !important;
        }
    }

    /* ===== Universal Dark Mode Rules (rules.md strictly - NO white bg/borders) ===== */
    body[light-mode="dark"] #processReturnModal .modal-content,
    body[data-layout-mode="dark"] #processReturnModal .modal-content,
    html[light-mode="dark"] #processReturnModal .modal-content,
    html[data-layout-mode="dark"] #processReturnModal .modal-content,
    body.dark-mode #processReturnModal .modal-content,
    html.dark #processReturnModal .modal-content {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] #processReturnModal .modal-body,
    body[data-layout-mode="dark"] #processReturnModal .modal-body,
    html[light-mode="dark"] #processReturnModal .modal-body,
    html[data-layout-mode="dark"] #processReturnModal .modal-body,
    body.dark-mode #processReturnModal .modal-body,
    html.dark #processReturnModal .modal-body {
        background-color: #1e293b !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] #processReturnModal .modal-footer,
    body[data-layout-mode="dark"] #processReturnModal .modal-footer,
    html[light-mode="dark"] #processReturnModal .modal-footer,
    html[data-layout-mode="dark"] #processReturnModal .modal-footer,
    body.dark-mode #processReturnModal .modal-footer,
    html.dark #processReturnModal .modal-footer {
        background-color: #1e293b !important;
        border-top-color: #334155 !important;
    }

    body[light-mode="dark"] #processReturnModal .return-inner-card,
    body[data-layout-mode="dark"] #processReturnModal .return-inner-card,
    html[light-mode="dark"] #processReturnModal .return-inner-card,
    html[data-layout-mode="dark"] #processReturnModal .return-inner-card,
    body.dark-mode #processReturnModal .return-inner-card,
    html.dark #processReturnModal .return-inner-card {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] #processReturnModal .return-summary-card,
    body[data-layout-mode="dark"] #processReturnModal .return-summary-card,
    html[light-mode="dark"] #processReturnModal .return-summary-card,
    html[data-layout-mode="dark"] #processReturnModal .return-summary-card,
    body.dark-mode #processReturnModal .return-summary-card,
    html.dark #processReturnModal .return-summary-card {
        background-color: #260B4A !important;
        border-color: #8C56D4 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] #processReturnModal .return-summary-card strong,
    body[light-mode="dark"] #processReturnModal .return-summary-card span,
    body[data-layout-mode="dark"] #processReturnModal .return-summary-card strong,
    body[data-layout-mode="dark"] #processReturnModal .return-summary-card span {
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] #processReturnModal .dark-input,
    body[data-layout-mode="dark"] #processReturnModal .dark-input,
    html[light-mode="dark"] #processReturnModal .dark-input,
    html[data-layout-mode="dark"] #processReturnModal .dark-input,
    body.dark-mode #processReturnModal .dark-input,
    html.dark #processReturnModal .dark-input,
    body[light-mode="dark"] #processReturnModal .form-control,
    body[data-layout-mode="dark"] #processReturnModal .form-control,
    html[light-mode="dark"] #processReturnModal .form-control,
    html[data-layout-mode="dark"] #processReturnModal .form-control,
    body.dark-mode #processReturnModal .form-control,
    html.dark #processReturnModal .form-control {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] #processReturnModal .return-table-wrapper,
    body[data-layout-mode="dark"] #processReturnModal .return-table-wrapper,
    html[light-mode="dark"] #processReturnModal .return-table-wrapper,
    html[data-layout-mode="dark"] #processReturnModal .return-table-wrapper,
    body.dark-mode #processReturnModal .return-table-wrapper,
    html.dark #processReturnModal .return-table-wrapper {
        border-color: #334155 !important;
    }

    body[light-mode="dark"] #processReturnModal .table,
    body[data-layout-mode="dark"] #processReturnModal .table,
    html[light-mode="dark"] #processReturnModal .table,
    html[data-layout-mode="dark"] #processReturnModal .table,
    body.dark-mode #processReturnModal .table,
    html.dark #processReturnModal .table {
        color: #F3ECFB !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #processReturnModal .table th,
    body[light-mode="dark"] #processReturnModal .table thead,
    body[data-layout-mode="dark"] #processReturnModal .table th,
    body[data-layout-mode="dark"] #processReturnModal .table thead,
    body.dark-mode #processReturnModal .table th,
    body.dark-mode #processReturnModal .table thead {
        background-color: #0f172a !important;
        color: #94a3b8 !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #processReturnModal .table td,
    body[data-layout-mode="dark"] #processReturnModal .table td,
    body.dark-mode #processReturnModal .table td {
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] #processReturnModal .table tfoot,
    body[data-layout-mode="dark"] #processReturnModal .table tfoot,
    body.dark-mode #processReturnModal .table tfoot {
        background-color: #0f172a !important;
        color: #F3ECFB !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] #processReturnModal .text-dark,
    body[data-layout-mode="dark"] #processReturnModal .text-dark,
    body.dark-mode #processReturnModal .text-dark,
    html.dark #processReturnModal .text-dark {
        color: #F3ECFB !important;
    }
</style>

<script>
    let currentReturnMode = 'sales'; // 'sales' or 'purchase'
    let currentReturnOrderData = null;
    let modalReturnDatePicker = null;

    document.addEventListener("DOMContentLoaded", () => {
        // Initialize Flatpickr on Return Date per rules.md
        if (typeof flatpickr !== 'undefined') {
            modalReturnDatePicker = flatpickr("#modalReturnDate", {
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                monthSelectorType: "static"
            });
        }

        // Mobile & Tablet auto-focus input on modal open to trigger keyboard
        const modalEl = document.getElementById('processReturnModal');
        if (modalEl) {
            modalEl.addEventListener('shown.bs.modal', function () {
                setTimeout(() => {
                    const input = document.getElementById('modalInvoiceSearchInput');
                    if (input) {
                        input.focus();
                        if (input.setSelectionRange) {
                            const len = input.value.length;
                            input.setSelectionRange(len, len);
                        }
                    }
                }, 150);
            });
        }
    });

    function switchModalReturnMode(mode, doSearch = false) {
        currentReturnMode = mode;
        const salesBtn = document.getElementById('modalModeSalesBtn');
        const purchaseBtn = document.getElementById('modalModePurchaseBtn');
        const headerTitle = document.getElementById('modalHeaderTitle');
        const headerIcon = document.getElementById('modalHeaderIcon');
        const searchLabel = document.getElementById('modalSearchLabel');
        const searchIcon = document.getElementById('modalSearchIcon');
        const searchInput = document.getElementById('modalInvoiceSearchInput');

        if (mode === 'purchase') {
            salesBtn?.classList.remove('active');
            purchaseBtn?.classList.add('active');
            if (headerTitle) headerTitle.innerText = 'ক্রয় রিটার্ন প্রসেসিং';
            if (headerIcon) headerIcon.className = 'fa-solid fa-truck-ramp-box';
            if (searchLabel) searchLabel.innerHTML = '<i class="fa-solid fa-magnifying-glass" style="color: #8C56D4;"></i> <span>পারচেজ মেমো বা ভাউচার নম্বর দিয়ে খুঁজুন</span>';
            if (searchIcon) searchIcon.className = 'fa-solid fa-file-invoice';
            if (searchInput) searchInput.placeholder = 'যেমন: #PurID00001 অথবা ১';
            document.getElementById('summaryNoLabel').innerText = 'পারচেজ নং:';
            document.getElementById('summaryPartyLabel').innerText = 'সাপ্লায়ার নাম:';
            document.getElementById('summaryDateLabel').innerText = 'ক্রয় তারিখ';
        } else {
            salesBtn?.classList.add('active');
            purchaseBtn?.classList.remove('active');
            if (headerTitle) headerTitle.innerText = 'বিক্রি রিটার্ন প্রসেসিং';
            if (headerIcon) headerIcon.className = 'fa-solid fa-arrow-rotate-left';
            if (searchLabel) searchLabel.innerHTML = '<i class="fa-solid fa-magnifying-glass" style="color: #8C56D4;"></i> <span>ইনভয়েস বা অর্ডার নম্বর দিয়ে খুঁজুন</span>';
            if (searchIcon) searchIcon.className = 'fa-solid fa-receipt';
            if (searchInput) searchInput.placeholder = 'যেমন: #InvID00001 অথবা ১';
            document.getElementById('summaryNoLabel').innerText = 'ইনভয়েস / অর্ডার নং:';
            document.getElementById('summaryPartyLabel').innerText = 'কাস্টমার নাম:';
            document.getElementById('summaryDateLabel').innerText = 'বিক্রি তারিখ';
        }

        if (doSearch && searchInput && searchInput.value.trim()) {
            searchInvoiceInModal();
        }
    }

    function openReturnModal(orderNo = '', mode = 'sales') {
        switchModalReturnMode(mode, false);
        currentReturnOrderData = null;

        document.getElementById('modalInvoiceSearchInput').value = orderNo;
        document.getElementById('invoiceSummaryCard').classList.add('d-none');
        document.getElementById('returnItemsContainer').classList.add('d-none');
        document.getElementById('submitReturnBtn').classList.add('d-none');
        document.getElementById('returnItemsTbody').innerHTML = '';
        if (document.getElementById('selectAllReturnItems')) {
            document.getElementById('selectAllReturnItems').checked = false;
        }

        const today = new Date().toISOString().split("T")[0];
        if (modalReturnDatePicker) {
            modalReturnDatePicker.setDate(today, true);
        } else {
            document.getElementById('modalReturnDate').value = today;
        }

        const modalEl = document.getElementById('processReturnModal');
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.show();

        if (orderNo) {
            searchInvoiceInModal();
        }
    }

    async function searchInvoiceInModal() {
        const inputEl = document.getElementById('modalInvoiceSearchInput');
        const queryNo = (inputEl ? inputEl.value : '').trim();
        if (!queryNo) {
            alert(currentReturnMode === 'purchase' ? 'পারচেজ মেমো নম্বর লিখুন' : 'ইনভয়েস নম্বর লিখুন');
            return;
        }

        // Auto-detect mode by prefix: Pur/pur/#Pur -> Purchase, Inv/inv/#Inv -> Sales
        if (/^#?pur/i.test(queryNo)) {
            if (currentReturnMode !== 'purchase') {
                switchModalReturnMode('purchase', false);
            }
        } else if (/^#?inv/i.test(queryNo)) {
            if (currentReturnMode !== 'sales') {
                switchModalReturnMode('sales', false);
            }
        }

        try {
            if (typeof showLoader === "function") showLoader();

            let targetUrl = currentReturnMode === 'purchase'
                ? `/api/search-purchase-for-return?purchase_no=${encodeURIComponent(queryNo)}`
                : `/api/search-invoice-for-return?order_no=${encodeURIComponent(queryNo)}`;

            let res = await axios.get(targetUrl, HeaderToken());

            // If not found in primary mode, automatically fallback and try the alternative mode before alerting
            if (!res.data || res.data.status !== 'success') {
                const altMode = currentReturnMode === 'purchase' ? 'sales' : 'purchase';
                const altUrl = altMode === 'purchase'
                    ? `/api/search-purchase-for-return?purchase_no=${encodeURIComponent(queryNo)}`
                    : `/api/search-invoice-for-return?order_no=${encodeURIComponent(queryNo)}`;

                try {
                    const altRes = await axios.get(altUrl, HeaderToken());
                    if (altRes.data && altRes.data.status === 'success') {
                        res = altRes;
                        switchModalReturnMode(altMode, false);
                    }
                } catch(err) {
                    // Alternative search caught
                }
            }

            if (typeof hideLoader === "function") hideLoader();

            if (res.data && res.data.status === 'success') {
                if (currentReturnMode === 'purchase') {
                    const purchase = res.data.purchase;
                    currentReturnOrderData = purchase;

                    document.getElementById('modalOrderNo').innerText = purchase.purchase_no;
                    document.getElementById('modalCustomerName').innerText = `${purchase.supplier_name || 'N/A'} (${purchase.supplier_mobile || '-'})`;
                    document.getElementById('modalInvoiceDate').innerText = purchase.purchase_date || '-';
                    document.getElementById('modalSubTotal').innerText = '৳ ' + formatMoney(purchase.grand_subtotal);
                    document.getElementById('modalPaidAmount').innerText = '৳ ' + formatMoney(purchase.paid_amount);
                    document.getElementById('modalDueAmount').innerText = '৳ ' + formatMoney(purchase.due_amount);

                    renderReturnItems(purchase.items);
                } else {
                    const order = res.data.order;
                    currentReturnOrderData = order;

                    document.getElementById('modalOrderNo').innerText = order.order_no;
                    document.getElementById('modalCustomerName').innerText = `${order.customer_name || 'N/A'} (${order.customer_mobile || '-'})`;
                    document.getElementById('modalInvoiceDate').innerText = order.invoice_date || '-';
                    document.getElementById('modalSubTotal').innerText = '৳ ' + formatMoney(order.sub_total);
                    document.getElementById('modalPaidAmount').innerText = '৳ ' + formatMoney(order.paid_amount);
                    document.getElementById('modalDueAmount').innerText = '৳ ' + formatMoney(order.due_amount);

                    renderReturnItems(order.items);
                }

                document.getElementById('invoiceSummaryCard').classList.remove('d-none');
                document.getElementById('returnItemsContainer').classList.remove('d-none');
                document.getElementById('submitReturnBtn').classList.remove('d-none');
            } else {
                alert(currentReturnMode === 'purchase' ? `পারচেজ মেমো পাওয়া যায়নি: ${queryNo}` : `ইনভয়েস পাওয়া যায়নি: ${queryNo}`);
            }
        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error('Invoice Search Error:', e);
            alert(currentReturnMode === 'purchase' ? `পারচেজ মেমো পাওয়া যায়নি: ${queryNo}` : `ইনভয়েস পাওয়া যায়নি: ${queryNo}`);
        }
    }

    function renderReturnItems(items) {
        const tbody = document.getElementById('returnItemsTbody');
        tbody.innerHTML = '';

        if (!items || items.length === 0) {
            tbody.innerHTML = `<tr><td colspan="6" class="text-center py-3 text-muted">কোনো পণ্য পাওয়া যায়নি</td></tr>`;
            return;
        }

        items.forEach((item, idx) => {
            const detailId = currentReturnMode === 'purchase' ? item.purchase_order_detail_id : item.order_detail_id;
            const row = `
                <tr data-detail-id="${detailId}" data-product-id="${item.product_id}" data-unit-price="${item.unit_price}">
                    <td class="text-center">
                        <input type="checkbox" class="form-check-input cursor-pointer item-select-checkbox" onchange="onItemCheckboxChange(this)" />
                    </td>
                    <td>
                        <div class="fw-bold text-dark text-truncate" style="max-width: 170px;">${item.product_name}</div>
                        <span class="badge bg-light text-dark border font-monospace" style="font-size: 9.5px;">${item.product_code || '-'}</span>
                    </td>
                    <td class="text-center fw-bold">${item.quantity} pcs</td>
                    <td class="text-end fw-semibold">৳ ${formatMoney(item.unit_price)}</td>
                    <td class="text-center">
                        <input type="number" class="form-control form-control-sm text-center fw-bold return-qty-input dark-input mx-auto" 
                               min="1" max="${item.quantity}" value="0" disabled
                               oninput="onQtyInputChange(this)" onblur="onQtyInputBlur(this)" inputmode="numeric" pattern="[0-9]*" />
                    </td>
                    <td class="text-end pe-3 fw-bold refund-item-total" style="color: #8C56D4;">৳ 0.00</td>
                </tr>
            `;
            tbody.innerHTML += row;
        });

        recalculateTotalRefund();
    }

    function onItemCheckboxChange(chk) {
        const tr = chk.closest('tr');
        const qtyInput = tr.querySelector('.return-qty-input');
        const maxQty = parseInt(qtyInput.getAttribute('max')) || 1;

        if (chk.checked) {
            tr.classList.add('table-primary');
            qtyInput.disabled = false;
            let val = parseInt(qtyInput.value) || 0;
            if (val <= 0) {
                qtyInput.value = 1;
            } else if (val > maxQty) {
                qtyInput.value = maxQty;
            }
            setTimeout(() => {
                qtyInput.focus();
                qtyInput.select();
            }, 50);
        } else {
            tr.classList.remove('table-primary');
            qtyInput.value = 0;
            qtyInput.disabled = true;
        }
        recalculateTotalRefund();
    }

    function onQtyInputChange(input) {
        const tr = input.closest('tr');
        const chk = tr.querySelector('.item-select-checkbox');
        const maxQty = parseInt(input.getAttribute('max')) || 1;

        if (input.value !== '') {
            let val = parseInt(input.value);
            if (isNaN(val)) val = 0;

            if (val > maxQty) {
                input.value = maxQty;
            }
            
            if (val > 0 && !chk.checked) {
                chk.checked = true;
                tr.classList.add('table-primary');
                input.disabled = false;
            }
        }

        recalculateTotalRefund();
    }

    function onQtyInputBlur(input) {
        const tr = input.closest('tr');
        const chk = tr.querySelector('.item-select-checkbox');
        const maxQty = parseInt(input.getAttribute('max')) || 1;

        let val = parseInt(input.value);
        if (isNaN(val) || val <= 0) {
            if (chk.checked) {
                input.value = 1;
            } else {
                input.value = 0;
            }
        } else if (val > maxQty) {
            input.value = maxQty;
        }
        recalculateTotalRefund();
    }

    function toggleSelectAllReturnItems(headerChk) {
        const checkboxes = document.querySelectorAll('.item-select-checkbox');
        checkboxes.forEach(chk => {
            chk.checked = headerChk.checked;
            onItemCheckboxChange(chk);
        });
    }

    function recalculateTotalRefund() {
        let grandTotalRefund = 0;
        const rows = document.querySelectorAll('#returnItemsTbody tr');

        rows.forEach(row => {
            const chk = row.querySelector('.item-select-checkbox');
            const unitPrice = parseFloat(row.getAttribute('data-unit-price')) || 0;
            const qtyInput = row.querySelector('.return-qty-input');
            const itemTotalTd = row.querySelector('.refund-item-total');

            let qty = 0;
            if (chk && chk.checked) {
                qty = parseInt(qtyInput.value) || 0;
                const maxQty = parseInt(qtyInput.getAttribute('max')) || 0;
                if (qty > maxQty) qty = maxQty;
            }

            const itemRefund = qty * unitPrice;
            itemTotalTd.innerText = '৳ ' + formatMoney(itemRefund);
            grandTotalRefund += itemRefund;
        });

        document.getElementById('totalRefundText').innerText = '৳ ' + formatMoney(grandTotalRefund);
    }

    async function submitReturnForm() {
        if (!currentReturnOrderData) {
            alert('কোনো রেকর্ড লোড করা হয়নি');
            return;
        }

        const returnDate = document.getElementById('modalReturnDate').value;
        if (!returnDate) {
            alert('দয়া করে রিটার্ন তারিখ নির্বাচন করুন');
            return;
        }

        const returnedProducts = [];
        const rows = document.querySelectorAll('#returnItemsTbody tr');

        rows.forEach(row => {
            const chk = row.querySelector('.item-select-checkbox');
            if (chk && chk.checked) {
                const detailId = row.getAttribute('data-detail-id');
                const productId = row.getAttribute('data-product-id');
                const qtyInput = row.querySelector('.return-qty-input');
                const qty = parseInt(qtyInput.value) || 0;

                if (qty > 0) {
                    if (currentReturnMode === 'purchase') {
                        returnedProducts.push({
                            purchase_order_detail_id: detailId,
                            product_id: productId,
                            quantity: qty
                        });
                    } else {
                        returnedProducts.push({
                            order_detail_id: detailId,
                            product_id: productId,
                            quantity: qty
                        });
                    }
                }
            }
        });

        if (returnedProducts.length === 0) {
            alert('কমপক্ষে একটি পণ্য নির্বাচন করুন এবং রিটার্ন সংখ্যা লিখুন।');
            return;
        }

        let payload = {};
        let apiUrl = '';

        if (currentReturnMode === 'purchase') {
            apiUrl = '/api/create-purchase-return';
            payload = {
                purchase_id: currentReturnOrderData.id,
                supplier_id: currentReturnOrderData.supplier_id,
                date: returnDate,
                products: returnedProducts
            };
        } else {
            apiUrl = '/api/create-return-product';
            payload = {
                order_id: currentReturnOrderData.id,
                customer_id: currentReturnOrderData.customer_id,
                date: returnDate,
                products: returnedProducts
            };
        }

        try {
            if (typeof showLoader === "function") showLoader();
            const res = await axios.post(apiUrl, payload, HeaderToken());
            if (typeof hideLoader === "function") hideLoader();

            if (res.data && res.data.status === 'success') {
                if (typeof successToast === "function") successToast(res.data.message || 'রিটার্ন সফলভাবে সম্পন্ন হয়েছে');
                else alert('রিটার্ন সফলভাবে সম্পন্ন হয়েছে');

                const modalEl = document.getElementById('processReturnModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();

                if (typeof fetchActiveReturnList === "function") fetchActiveReturnList();
            } else {
                alert(res.data.message || 'রিটার্ন প্রসেস করতে ব্যর্থ হয়েছে');
            }

        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error('Return Submit Error:', e);
            alert(e.response?.data?.message || 'রিটার্ন প্রসেস করতে সমস্যা হয়েছে');
        }
    }
</script>
