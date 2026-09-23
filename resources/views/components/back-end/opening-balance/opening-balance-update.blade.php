<!-- Flatpickr CSS & JS per rules.md (Fallback if not already loaded) -->
@once
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endonce

<style>
    /* Ultra-Responsive Modal Styling for Opening Balance Update */
    #updateOpeningBalanceModal {
        z-index: 105080 !important;
    }

    #updateOpeningBalanceModal.modal {
        position: fixed !important;
        inset: 0 !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        overflow-x: hidden !important;
        overflow-y: auto !important;
        padding: 0 !important;
        margin: 0 !important;
        outline: 0 !important;
        background: rgba(15, 23, 42, 0.65) !important;
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
    }

    #updateOpeningBalanceModal .modal-dialog {
        position: relative !important;
        width: 100% !important;
        max-width: 540px !important;
        margin: 1.75rem auto !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    #updateOpeningBalanceModal .modal-content {
        background-color: #ffffff !important;
        border-radius: 18px !important;
        border: 1px solid rgba(226, 232, 240, 0.9) !important;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3) !important;
        overflow: hidden !important;
        width: 100% !important;
        display: flex !important;
        flex-direction: column !important;
    }

    /* Fixed Sticky Header */
    #updateOpeningBalanceModal .modal-header-purple {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 14px 18px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        color: #ffffff !important;
        border-bottom: 1px solid #E5D5F7 !important;
        flex-shrink: 0;
    }

    #updateOpeningBalanceModal .btn-close-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border-radius: 50% !important;
        width: 32px !important;
        height: 32px !important;
        border: none !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
    }

    #updateOpeningBalanceModal .btn-close-red:hover {
        background: #dc2626 !important;
        transform: rotate(90deg) scale(1.05);
    }

    /* Fixed Sticky Footer */
    #updateOpeningBalanceModal .modal-footer-custom {
        position: sticky;
        bottom: 0;
        z-index: 10;
        background: #ffffff !important;
        border-top: 1px solid #e2e8f0 !important;
        padding: 12px 18px !important;
        flex-shrink: 0;
    }

    /* Scoped Input Wrapper */
    #updateOpeningBalanceModal .ob-input-box {
        position: relative !important;
        width: 100% !important;
        display: flex !important;
        align-items: center !important;
    }

    #updateOpeningBalanceModal .ob-input-box-icon {
        position: absolute !important;
        left: 14px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        font-size: 15px !important;
        color: #8C56D4 !important;
        pointer-events: none !important;
        z-index: 5 !important;
    }

    #updateOpeningBalanceModal .ob-input-box-currency {
        position: absolute !important;
        left: 14px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        font-size: 16px !important;
        font-weight: 700 !important;
        color: #8C56D4 !important;
        pointer-events: none !important;
        z-index: 5 !important;
    }

    #updateOpeningBalanceModal .ob-modal-input {
        height: 44px !important;
        width: 100% !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding-left: 42px !important;
        padding-right: 14px !important;
        font-size: 14px !important;
        background-color: #ffffff !important;
        color: #1e293b !important;
        transition: all 0.2s ease !important;
        box-shadow: none !important;
    }

    #updateOpeningBalanceModal .ob-modal-input:focus,
    #updateOpeningBalanceModal .ob-modal-textarea:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
        background: #ffffff !important;
        outline: none !important;
    }

    #updateOpeningBalanceModal .ob-modal-textarea {
        width: 100% !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 10px 14px !important;
        font-size: 14px !important;
        background-color: #ffffff !important;
        color: #1e293b !important;
        transition: all 0.2s ease !important;
    }

    /* Flatpickr input generated altInput */
    #updateOpeningBalanceModal .ob-input-box input.flatpickr-input {
        height: 44px !important;
        width: 100% !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding-left: 42px !important;
        padding-right: 14px !important;
        font-size: 14px !important;
        background-color: #ffffff !important;
        color: #1e293b !important;
        display: block !important;
    }

    /* Mobile & Tablet Bottom Sheet (< 992px) */
    @media (max-width: 991.98px) {
        #updateOpeningBalanceModal {
            padding: 0 !important;
        }

        #updateOpeningBalanceModal .modal-dialog {
            margin: 0 !important;
            margin-top: auto !important;
            width: 100% !important;
            max-width: 100% !important;
            min-height: 100% !important;
            display: flex !important;
            align-items: flex-end !important;
        }

        #updateOpeningBalanceModal .modal-content {
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            width: 100% !important;
            max-height: 90vh !important;
            max-height: 90dvh !important;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.25) !important;
            animation: slideUpUpdateModal 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        #updateOpeningBalanceModal .modal-body {
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch !important;
        }
    }

    @keyframes slideUpUpdateModal {
        from { transform: translateY(100%); }
        to { transform: translateY(0); }
    }

    /* Universal Dark Mode Rules per rules.md */
    body[light-mode="dark"] #updateOpeningBalanceModal .modal-content,
    body[data-layout-mode="dark"] #updateOpeningBalanceModal .modal-content,
    body.dark-mode #updateOpeningBalanceModal .modal-content,
    html[light-mode="dark"] #updateOpeningBalanceModal .modal-content,
    html[data-layout-mode="dark"] #updateOpeningBalanceModal .modal-content,
    html.dark #updateOpeningBalanceModal .modal-content {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] #updateOpeningBalanceModal .modal-body,
    body[data-layout-mode="dark"] #updateOpeningBalanceModal .modal-body,
    body.dark-mode #updateOpeningBalanceModal .modal-body {
        background-color: #1e293b !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] #updateOpeningBalanceModal .modal-footer-custom,
    body[data-layout-mode="dark"] #updateOpeningBalanceModal .modal-footer-custom,
    body.dark-mode #updateOpeningBalanceModal .modal-footer-custom {
        background-color: #1e293b !important;
        border-top-color: #334155 !important;
    }

    body[light-mode="dark"] #updateOpeningBalanceModal .ob-modal-input,
    body[data-layout-mode="dark"] #updateOpeningBalanceModal .ob-modal-input,
    body.dark-mode #updateOpeningBalanceModal .ob-modal-input,
    body[light-mode="dark"] #updateOpeningBalanceModal .ob-modal-textarea,
    body[data-layout-mode="dark"] #updateOpeningBalanceModal .ob-modal-textarea,
    body.dark-mode #updateOpeningBalanceModal .ob-modal-textarea,
    body[light-mode="dark"] #updateOpeningBalanceModal .ob-input-box input.flatpickr-input,
    body[data-layout-mode="dark"] #updateOpeningBalanceModal .ob-input-box input.flatpickr-input,
    body.dark-mode #updateOpeningBalanceModal .ob-input-box input.flatpickr-input {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] #updateOpeningBalanceModal label,
    body[data-layout-mode="dark"] #updateOpeningBalanceModal label,
    body.dark-mode #updateOpeningBalanceModal label {
        color: #e2e8f0 !important;
    }
</style>

<div class="modal fade" id="updateOpeningBalanceModal" tabindex="-1" aria-labelledby="updateOpeningBalanceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Header -->
            <div class="modal-header-purple">
                <div class="d-flex align-items-center gap-2">
                    <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-25 rounded-circle" style="width: 32px; height: 32px;">
                        <i class="fa-solid fa-pen-to-square text-white fs-6"></i>
                    </div>
                    <h5 class="m-0 fw-bold text-white fs-6" id="updateOpeningBalanceModalLabel">প্রারম্ভিক ব্যালেন্স সম্পাদনা</h5>
                </div>
                <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Body -->
            <form id="updateOpeningBalanceForm" onsubmit="return handleUpdateOpeningBalance(event)">
                <div class="modal-body p-3 p-md-4">
                    <input type="hidden" id="updateOpeningBalanceId" />

                    <!-- 2 Inputs in 1 Row: তারিখ ও পরিমাণ -->
                    <div class="row g-2 mb-3">
                        <!-- তারিখ (Flatpickr) -->
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">তারিখ <span class="text-danger">*</span></label>
                            <div class="ob-input-box">
                                <i class="fa-solid fa-calendar-days ob-input-box-icon"></i>
                                <input type="text" id="updateObDate" class="ob-modal-input" placeholder="DD-MM-YYYY" readonly required />
                            </div>
                        </div>

                        <!-- পরিমাণ -->
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">ব্যালেন্স পরিমাণ <span class="text-danger">*</span></label>
                            <div class="ob-input-box">
                                <span class="ob-input-box-currency">৳</span>
                                <input type="number" step="any" inputmode="decimal" pattern="[0-9]*" id="updateObAmount" class="ob-modal-input fw-bold" placeholder="০.০০" required />
                            </div>
                        </div>
                    </div>

                    <!-- নোট (বিবরণ) -->
                    <div class="mb-2">
                        <label class="form-label fw-bold small text-muted mb-1">নোট বা বিবরণ (ঐচ্ছিক)</label>
                        <textarea id="updateObNote" class="ob-modal-textarea" rows="3" placeholder="প্রারম্ভিক ব্যালেন্স সংক্রান্ত কোনো মন্তব্য বা নোট লিখুন..."></textarea>
                    </div>
                </div>

                <!-- Footer (Side-by-side action buttons per rules.md) -->
                <div class="modal-footer-custom d-flex align-items-center gap-2">
                    <button type="button" class="btn flex-grow-1 py-2 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="height: 44px; border-radius: 10px; background-color: #ef4444 !important; border: none;">
                        <i class="fa-solid fa-xmark me-1"></i> বাতিল
                    </button>
                    <button type="submit" class="btn flex-grow-1 py-2 fw-bold text-white shadow-sm" style="height: 44px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25);">
                        <i class="fa-solid fa-check me-1"></i> আপডেট করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let updateFlatpickrInstance = null;

    document.addEventListener('DOMContentLoaded', function() {
        const modalEl = document.getElementById('updateOpeningBalanceModal');
        if (modalEl && modalEl.parentElement !== document.body) {
            document.body.appendChild(modalEl);
        }

        // Initialize Flatpickr for update datepicker per rules.md 51-57 with high z-index & appendTo body
        if (typeof flatpickr !== 'undefined') {
            updateFlatpickrInstance = flatpickr("#updateObDate", {
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                monthSelectorType: "static",
                static: false,
                appendTo: document.body
            });
        }

        // Mobile & Tablet auto-focus input on modal open to trigger keyboard
        if (modalEl) {
            modalEl.addEventListener('shown.bs.modal', function() {
                setTimeout(() => {
                    const amountInput = document.getElementById('updateObAmount');
                    if (amountInput) {
                        amountInput.focus();
                    }
                }, 150);
            });
        }
    });

    // Populate and open edit modal
    async function openEditOpeningBalanceModal(id) {
        try {
            if (!id) return;
            showLoader();

            let res = await axios.post(
                "/api/opening-balance-by-id",
                { id: id },
                typeof HeaderToken === 'function' ? HeaderToken() : {}
            );

            hideLoader();

            if (res.data && res.data.status === "success" && res.data.data) {
                const item = res.data.data;
                document.getElementById('updateOpeningBalanceId').value = item.id;
                document.getElementById('updateObAmount').value = item.amount || '';
                document.getElementById('updateObNote').value = item.note || '';

                if (updateFlatpickrInstance && item.date) {
                    updateFlatpickrInstance.setDate(item.date);
                } else {
                    document.getElementById('updateObDate').value = item.date || '';
                }

                $("#updateOpeningBalanceModal").modal('show');
            } else {
                if (typeof errorToast === 'function') {
                    errorToast(res.data ? res.data.message : "ডাটা লোড করতে ব্যর্থ হয়েছে।");
                }
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            if (typeof errorToast === 'function') {
                errorToast("একটি সমস্যা দেখা দিয়েছে।");
            }
        }
    }

    // Submit Update
    async function handleUpdateOpeningBalance(event) {
        event.preventDefault();

        const id = document.getElementById('updateOpeningBalanceId').value;
        const date = document.getElementById('updateObDate').value;
        const amount = document.getElementById('updateObAmount').value;
        const note = document.getElementById('updateObNote').value.trim();

        if (!id) {
            if (typeof errorToast === 'function') errorToast("আইডি পাওয়া যায়নি!");
            return false;
        }
        if (!date) {
            if (typeof errorToast === 'function') errorToast("তারিখ আবশ্যক!");
            return false;
        }
        if (!amount || parseFloat(amount) < 0) {
            if (typeof errorToast === 'function') errorToast("সঠিক ব্যালেন্স পরিমাণ লিখুন!");
            return false;
        }

        try {
            showLoader();

            let res = await axios.post(
                "/api/update-opening-balance",
                {
                    id: id,
                    date: date,
                    amount: amount,
                    note: note
                },
                typeof HeaderToken === 'function' ? HeaderToken() : {}
            );

            hideLoader();

            if (res.data && res.data.status === "success") {
                if (typeof successToast === 'function') {
                    successToast("প্রারম্ভিক ব্যালেন্স সফলভাবে আপডেট করা হয়েছে!");
                }
                $("#updateOpeningBalanceModal").modal('hide');

                if (typeof getList === 'function') {
                    await getList();
                } else {
                    location.reload();
                }
            } else {
                if (typeof errorToast === 'function') {
                    errorToast(res.data ? res.data.message : "আপডেট করতে ব্যর্থ হয়েছে!");
                }
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            if (typeof errorToast === 'function') {
                errorToast("সার্ভার ত্রুটি! পুনরায় চেষ্টা করুন।");
            }
        }

        return false;
    }
</script>
