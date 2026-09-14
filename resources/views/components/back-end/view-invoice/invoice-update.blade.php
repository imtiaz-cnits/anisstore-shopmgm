<style>
    .modal-backdrop {
        z-index: 2000 !important;
    }
    #exampleModal {
        z-index: 2010 !important;
    }
    #exampleModal.modal {
        overflow: hidden !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    #exampleModal .modal-dialog {
        max-width: 650px;
        width: calc(100% - 20px) !important;
        margin: 10px auto !important;
        height: auto !important;
        min-height: calc(100dvh - 20px) !important;
        max-height: calc(100dvh - 20px) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
        pointer-events: none;
    }
    #exampleModal .modal-content {
        pointer-events: auto;
        border-radius: 16px;
        border: none;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        height: auto !important;
        max-height: calc(100dvh - 20px) !important;
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
        background: #ffffff;
        width: 100% !important;
    }
    #exampleModal form#paymentForm {
        display: flex;
        flex-direction: column;
        flex: 1 1 auto;
        overflow: hidden;
        min-height: 0;
        height: auto;
        max-height: 100%;
        margin: 0;
    }
    #exampleModal .modal-header {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        flex-shrink: 0;
        padding: 14px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    }
    #exampleModal .modal-title {
        color: #ffffff !important;
        font-size: 16px;
        font-weight: 700;
    }
    #exampleModal .btn-close-custom {
        background: transparent;
        border: none;
        color: #ffffff;
        font-size: 18px;
        cursor: pointer;
        opacity: 0.85;
        transition: opacity 0.2s;
    }
    #exampleModal .btn-close-custom:hover {
        opacity: 1;
    }
    #exampleModal .modal-body {
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch !important;
        flex: 1 1 auto;
        min-height: 0;
        padding: 16px 20px;
        background: #ffffff;
    }
    #exampleModal .modal-footer {
        flex-shrink: 0;
        margin: 0 !important;
        width: 100% !important;
        border-radius: 0 0 16px 16px !important;
        background: #ffffff;
        border-top: 1px solid #e2e8f0;
        padding: 12px 20px;
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: flex-end !important;
        gap: 12px !important;
        flex-wrap: nowrap !important;
    }

    #exampleModal .form-control {
        width: 100% !important;
        max-width: 100% !important;
        height: 42px !important;
        font-size: 14px !important;
        text-align: left !important;
        border-radius: 8px !important;
        box-sizing: border-box !important;
    }
    #exampleModal .form-label {
        text-align: left !important;
        display: block !important;
        width: 100% !important;
    }

    /* Mobile & Tablet Modal Geometry: Always Centered with 10px Gap; Topbar Gap when Keyboard Opens */
    @media (max-width: 991.98px) {
        #exampleModal .modal-dialog {
            margin: 10px auto !important;
            width: calc(100% - 20px) !important;
            max-width: calc(100% - 20px) !important;
            height: auto !important;
            min-height: calc(100dvh - 20px) !important;
            max-height: calc(100dvh - 20px) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.25s ease-out;
        }
        #exampleModal .modal-content {
            height: auto !important;
            max-height: calc(100dvh - 20px) !important;
            border-radius: 16px !important;
        }

        /* Keyboard open state: pushes modal down by topbar height (72px) */
        #exampleModal.keyboard-open .modal-dialog {
            align-items: flex-start !important;
            margin-top: 72px !important;
            margin-bottom: 10px !important;
            min-height: calc(100dvh - 82px) !important;
            max-height: calc(100dvh - 82px) !important;
        }
        #exampleModal.keyboard-open .modal-content {
            max-height: calc(100dvh - 82px) !important;
        }
    }

    @media (max-width: 576px) {
        #exampleModal .modal-footer {
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            gap: 10px !important;
            padding: 12px 16px !important;
        }
        #exampleModal .modal-footer .btn {
            flex: 1 1 50% !important;
            padding: 10px 12px !important;
            font-size: 13px !important;
            white-space: nowrap !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
    }

    #exampleModal .payment-method-card {
        cursor: pointer;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 8px 12px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        background: #fff;
    }
    #exampleModal .payment-method-card:hover {
        border-color: #8C56D4;
        background: #FAF7FD;
    }
    #exampleModal .payment-method-card.active {
        border-color: #8C56D4 !important;
        background: #F3ECFB !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.2);
    }
    #exampleModal .payment-method-card img {
        width: 26px;
        height: 26px;
        object-fit: contain;
    }

    .fully-paid-status { color: #16a34a; font-weight: bold; }
    .partial-payment-status { color: #d97706; font-weight: bold; }
    .unpaid-status { color: #dc2626; font-weight: bold; }

    /* Dark Mode styles for Modal */
    body[light-mode="dark"] #exampleModal .modal-content,
    html[light-mode="dark"] #exampleModal .modal-content {
        background-color: #1e293b !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #exampleModal .modal-body,
    html[light-mode="dark"] #exampleModal .modal-body,
    body[light-mode="dark"] #exampleModal .modal-footer,
    html[light-mode="dark"] #exampleModal .modal-footer {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #exampleModal .payment-method-card,
    html[light-mode="dark"] #exampleModal .payment-method-card {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #exampleModal .payment-method-card.active,
    html[light-mode="dark"] #exampleModal .payment-method-card.active {
        background: #312e81 !important;
        border-color: #8C56D4 !important;
    }
    body[light-mode="dark"] #exampleModal .summary-box-custom,
    html[light-mode="dark"] #exampleModal .summary-box-custom {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #exampleModal input.form-control,
    html[light-mode="dark"] #exampleModal input.form-control {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
</style>

<!-- Action Button Edit Modal Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Sticky Purple Header -->
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center gap-2" id="exampleModalLabel">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <span>বকেয়া সংগ্রহ ও পরিশোধ আপডেট</span>
                </h5>
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Form wrapping scrollable body and flush bottom footer -->
            <form id="paymentForm" onsubmit="SavePaymentInfo(event)">
                <!-- Scrollable Body: Only this scrolls when virtual keyboard opens -->
                <div class="modal-body">
                    <input type="hidden" id="updateID">

                    <!-- Summary Info Box -->
                    <div class="summary-box-custom p-3 rounded-3 mb-3 border bg-light">
                        <div class="row g-2 text-center" style="font-size: 13px;">
                            <div class="col-4 border-end">
                                <span class="text-muted d-block small fw-semibold">ইনভয়েস সাবটোটাল</span>
                                <span class="fw-bold fs-6 text-dark" id="ShowSubTotalAmmount">৳ 0.00</span>
                            </div>
                            <div class="col-4 border-end">
                                <span class="text-muted d-block small fw-semibold">পূর্বের পরিশোধ</span>
                                <span class="fw-bold fs-6 text-success" id="paidAmount">৳ 0.00</span>
                            </div>
                            <div class="col-4">
                                <span class="text-muted d-block small fw-semibold">অবশিষ্ট বকেয়া</span>
                                <span class="fw-bold fs-6 text-danger" id="ShowtotalDuePayable">৳ 0.00</span>
                                <span id="CustomerDueAmount" class="d-none">0</span>
                            </div>
                        </div>
                    </div>

                    <!-- Input Fields -->
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label small fw-bold text-secondary mb-1">পরিশোধের তারিখ *</label>
                            <div class="position-relative w-100">
                                <input type="text" class="form-control text-start ps-3 pe-4" id="DueCollectionDate" placeholder="DD-MM-YYYY" readonly autocomplete="off" required style="height: 42px; border-radius: 8px; width: 100%;" />
                                <span class="position-absolute end-0 top-50 translate-middle-y me-3 text-muted" style="cursor: pointer; pointer-events: none;">
                                    <i class="fa-regular fa-calendar-days"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label small fw-bold text-secondary mb-1">জমা টাকার পরিমাণ (৳) *</label>
                            <input type="number" step="any" inputmode="decimal" class="form-control fw-bold text-success text-start ps-3" id="UpdateDueAmountclear" oninput="calculateDuePayment()" placeholder="টাকার পরিমাণ লিখুন" required style="height: 42px; border-radius: 8px; width: 100%;" />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label small fw-bold text-secondary mb-1">অতিরিক্ত ছাড় (৳)</label>
                            <input type="number" step="any" inputmode="decimal" class="form-control fw-bold text-muted text-start ps-3" value="0" id="UpdateDiscountAmountclear" oninput="calculateDuePayment()" placeholder="ছাড়ের পরিমাণ লিখুন" style="height: 42px; border-radius: 8px; width: 100%;" />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label small fw-bold text-secondary mb-1">পেমেন্ট স্ট্যাটাস</label>
                            <div class="form-control bg-light d-flex align-items-center fw-bold text-start px-3" style="height: 42px; border-radius: 8px; width: 100%;">
                                <span id="ShowpaymentStatusDisplay">Pending</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Selection -->
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary mb-2">পেমেন্ট মাধ্যম সিলেক্ট করুন *</label>
                        <input type="hidden" id="selectedPaymentMethod" value="cash">

                        <div class="row g-2">
                            <div class="col-4 col-sm-4">
                                <div class="payment-method-card active" onclick="selectPaymentMethod('cash', this)">
                                    <img src="{{ asset('back-end/assets/img/payment-cash.png') }}" alt="Cash" onerror="this.style.display='none'">
                                    <span class="fw-bold small">Cash</span>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="payment-method-card" onclick="selectPaymentMethod('bkash', this)">
                                    <img src="{{ asset('back-end/assets/img/payment-bkash.png') }}" alt="bKash" onerror="this.style.display='none'">
                                    <span class="fw-bold small">bKash</span>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="payment-method-card" onclick="selectPaymentMethod('nagad', this)">
                                    <img src="{{ asset('back-end/assets/img/payment-nagad.png') }}" alt="Nagad" onerror="this.style.display='none'">
                                    <span class="fw-bold small">Nagad</span>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="payment-method-card" onclick="selectPaymentMethod('rocket', this)">
                                    <img src="{{ asset('back-end/assets/img/payment-rocket.png') }}" alt="Rocket" onerror="this.style.display='none'">
                                    <span class="fw-bold small">Rocket</span>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="payment-method-card" onclick="selectPaymentMethod('bank', this)">
                                    <img src="{{ asset('back-end/assets/img/payment-bank.png') }}" alt="Bank" onerror="this.style.display='none'">
                                    <span class="fw-bold small">Bank</span>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="payment-method-card" onclick="selectPaymentMethod('card', this)">
                                    <img src="{{ asset('back-end/assets/img/payment-card.png') }}" alt="Card" onerror="this.style.display='none'">
                                    <span class="fw-bold small">Card</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction ID input (for digital methods) -->
                    <div class="mb-3" id="transactionInputWrapper" style="display: none;">
                        <label class="form-label small fw-bold text-secondary mb-1">ট্রানজ্যাকশন আইডি (Transaction ID)</label>
                        <input type="text" class="form-control" id="transactionInput" placeholder="ট্রানজ্যাকশন আইডি লিখুন" style="height: 42px; border-radius: 8px; width: 100%;" />
                    </div>
                </div>

                <!-- Flush Footer Actions: side-by-side buttons exactly like edit modal -->
                <div class="modal-footer d-flex align-items-center justify-content-end gap-2">
                    <button type="button" class="btn px-4 py-2 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="border-radius: 8px; background-color: #ef4444 !important; border: none; padding: 10px 22px !important;">
                        <i class="fa-solid fa-xmark me-1"></i> বাতিল
                    </button>
                    <button type="submit" class="btn px-4 py-2 fw-bold text-white shadow-sm" style="border-radius: 8px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; padding: 10px 22px !important;">
                        <i class="fa-solid fa-check me-1"></i> পেমেন্ট সংরক্ষণ করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Action Button Edit Modal End -->

<script>
    let dueCollectionDatePicker = null;

    $(document).ready(function() {
        $('#exampleModal').appendTo("body");

        // Initialize Flatpickr for Due Collection Date in d-m-Y format
        initDueDatePicker();

        // Keyboard detection for mobile topbar gap
        setupModalKeyboardDetection('#exampleModal');

        $('#exampleModal').on('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (button) {
                const id = $(button).attr('data-id') || $(button).data('id') || $(button).closest('[data-id]').attr('data-id');
                if (id) {
                    FillUpUpdateForm(id);
                }
            }
        });
    });

    function setupModalKeyboardDetection(modalId) {
        const $modal = $(modalId);
        $modal.on('focus', 'input, textarea, select', function() {
            if (window.innerWidth <= 991.98) {
                $modal.addClass('keyboard-open');
            }
        });
        $modal.on('blur', 'input, textarea, select', function() {
            setTimeout(() => {
                if (!$modal.find('input:focus, textarea:focus, select:focus').length) {
                    $modal.removeClass('keyboard-open');
                }
            }, 150);
        });
        if (window.visualViewport) {
            window.visualViewport.addEventListener('resize', () => {
                if (window.innerWidth <= 991.98 && $modal.hasClass('show')) {
                    const isKeyboard = window.visualViewport.height < window.innerHeight * 0.75;
                    if (isKeyboard) {
                        $modal.addClass('keyboard-open');
                    } else if (!$modal.find('input:focus, textarea:focus, select:focus').length) {
                        $modal.removeClass('keyboard-open');
                    }
                }
            });
        }
        $modal.on('hidden.bs.modal', function() {
            $modal.removeClass('keyboard-open');
        });
    }

    function initDueDatePicker() {
        if (typeof flatpickr !== 'undefined') {
            dueCollectionDatePicker = flatpickr("#DueCollectionDate", {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                allowInput: true,
                monthSelectorType: "static"
            });
        } else {
            setTimeout(initDueDatePicker, 100);
        }
    }

    function selectPaymentMethod(method, element) {
        document.querySelectorAll('#exampleModal .payment-method-card').forEach(el => el.classList.remove('active'));
        if (element) element.classList.add('active');
        document.getElementById('selectedPaymentMethod').value = method;

        const transWrapper = document.getElementById('transactionInputWrapper');
        if (method === 'cash') {
            if (transWrapper) transWrapper.style.display = 'none';
        } else {
            if (transWrapper) transWrapper.style.display = 'block';
            document.getElementById('transactionInput').placeholder = `${method.toUpperCase()} ট্রানজ্যাকশন আইডি লিখুন`;
        }
    }

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;

            let res = await axios.post("/api/invoice-payment-details-by-id", {
                id: id.toString()
            }, HeaderToken());

            if (res.data.status === "success") {
                const data = res.data.rows;

                const subTotal = parseFloat(data.sub_total) || 0;
                const paidAmount = parseFloat(data.paid_amount) || 0;
                const dueAmount = parseFloat(data.due_amount) || 0;

                document.getElementById('ShowSubTotalAmmount').textContent = `৳ ${subTotal.toFixed(2)}`;
                document.getElementById('paidAmount').textContent = `৳ ${paidAmount.toFixed(2)}`;
                document.getElementById('ShowtotalDuePayable').textContent = `৳ ${dueAmount.toFixed(2)}`;
                document.getElementById('CustomerDueAmount').textContent = dueAmount.toString();
                document.getElementById('UpdateDueAmountclear').value = dueAmount > 0 ? dueAmount : 0;
                document.getElementById('UpdateDiscountAmountclear').value = 0;

                // Reset date to today
                if (dueCollectionDatePicker) {
                    dueCollectionDatePicker.setDate(new Date());
                }

                calculateDuePayment();
            } else {
                console.error("Failed to fetch invoice details:", res.data.message);
            }
        } catch (e) {
            console.error("Error:", e);
            unauthorized(e.response ? e.response.status : 500);
        }
    }

    function calculateDuePayment() {
        const initialDue = parseFloat(document.getElementById('CustomerDueAmount')?.textContent || 0) || 0;
        const payAmount = parseFloat(document.getElementById('UpdateDueAmountclear')?.value || 0) || 0;
        const discountAmount = parseFloat(document.getElementById('UpdateDiscountAmountclear')?.value || 0) || 0;

        const newRemainingDue = Math.max(0, initialDue - (payAmount + discountAmount));

        document.getElementById('ShowtotalDuePayable').textContent = `৳ ${newRemainingDue.toFixed(2)}`;

        const statusDisplay = document.getElementById('ShowpaymentStatusDisplay');
        if (statusDisplay) {
            statusDisplay.classList.remove("fully-paid-status", "partial-payment-status", "unpaid-status");

            if (newRemainingDue === 0) {
                statusDisplay.textContent = "পরিশোধিত (Fully Paid)";
                statusDisplay.classList.add("fully-paid-status");
            } else if (payAmount > 0) {
                statusDisplay.textContent = "আংশিক পরিশোধ (Partial Paid)";
                statusDisplay.classList.add("partial-payment-status");
            } else {
                statusDisplay.textContent = "বকেয়া (Unpaid)";
                statusDisplay.classList.add("unpaid-status");
            }
        }
    }

    async function SavePaymentInfo(event) {
        if (event) event.preventDefault();

        try {
            const payAmount = parseFloat(document.getElementById('UpdateDueAmountclear').value) || 0;
            const discountAmount = parseFloat(document.getElementById('UpdateDiscountAmountclear').value) || 0;
            const duePayableStr = document.getElementById('ShowtotalDuePayable').innerText.replace(/[^\d.-]/g, '');
            const finalDue = parseFloat(duePayableStr) || 0;
            const paymentStatus = document.getElementById('ShowpaymentStatusDisplay').innerText.trim();
            
            // Format collection date to Y-m-d for backend Carbon
            let rawDate = document.getElementById('DueCollectionDate').value;
            let collectionDate = rawDate;
            if (rawDate && rawDate.includes('-')) {
                const parts = rawDate.split('-');
                if (parts.length === 3 && parts[0].length === 2) {
                    collectionDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
                }
            }

            const updateID = document.getElementById('updateID').value;
            const paymentMethod = document.getElementById('selectedPaymentMethod').value || 'cash';
            const transactionId = document.getElementById('transactionInput')?.value || null;

            if (payAmount < 0) {
                errorToast('দয়া করে সঠিক জমার পরিমাণ লিখুন।');
                return false;
            }

            let formData = new FormData();
            formData.append('paid_amount', payAmount);
            formData.append('discount_amount', discountAmount);
            formData.append('due_amount', finalDue);
            formData.append('payment_status', paymentStatus);
            formData.append('due_collection_date', collectionDate);
            formData.append('transaction_id', transactionId);
            formData.append('id', updateID);
            formData.append('payment_method', paymentMethod);

            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            let res = await axios.post("/api/invoice-payment-details-update", formData, config);
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message || "পেমেন্ট সফলভাবে সংরক্ষিত হয়েছে।");
                $("#exampleModal").modal('hide');
                if (typeof fetchInvoiceReport === 'function') {
                    await fetchInvoiceReport();
                } else if (typeof getList === 'function') {
                    await getList();
                } else {
                    setTimeout(() => location.reload(), 500);
                }
            } else {
                errorToast(res.data.message || "পেমেন্ট সংরক্ষণ ব্যর্থ হয়েছে।");
            }

        } catch (e) {
            hideLoader();
            console.error("Save error:", e);
            errorToast("পেমেন্ট তথ্য আপডেট করতে সমস্যা হয়েছে।");
        }
        return false;
    }
</script>