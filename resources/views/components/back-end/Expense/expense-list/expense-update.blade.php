<style>
    #exampleModal {
        z-index: 107000 !important;
    }
    .modal-backdrop {
        z-index: 106500 !important;
    }

    #exampleModal .modal-dialog {
        max-width: 620px;
        margin: 1.75rem auto;
        transition: transform 0.25s ease-out;
    }

    /* Mobile & Tablet Full-Width Bottom Sheet Slide-Up */
    @media (max-width: 991.98px) {
        #exampleModal.modal {
            padding: 0 !important;
            overflow: hidden !important;
        }
        #exampleModal .modal-dialog,
        #exampleModal .modal-dialog.modal-dialog-centered {
            position: fixed !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            top: auto !important;
            width: 100vw !important;
            max-width: 100vw !important;
            min-width: 100vw !important;
            margin: 0 !important;
            transform: none !important;
            min-height: auto !important;
            display: block !important;
        }
        #exampleModal .modal-content {
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            width: 100% !important;
            max-height: 85dvh !important;
            margin: 0 !important;
            animation: slideUpUpdateModal 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
    }

    #exampleModal .modal-content {
        border-radius: 16px;
        border: none;
        overflow: hidden;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
    }
    #exampleModal .form-control,
    #exampleModal .form-select {
        height: 42px;
        border-radius: 8px;
        border: 1.5px solid #cbd5e1;
        font-size: 13.5px;
        padding: 8px 12px;
    }
    #exampleModal .form-control:focus,
    #exampleModal .form-select:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
    }

    /* Searchable Custom Type Dropdown */
    #updateTypeDropdownMenu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 10005;
        background: #ffffff;
        border: 1.5px solid #8C56D4;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(140, 86, 212, 0.2);
        max-height: 220px;
        overflow-y: auto;
    }
    .update-type-option-item:hover {
        background: #F3ECFB !important;
        color: #8C56D4 !important;
    }

    @keyframes slideUpUpdateModal {
        from {
            transform: translateY(100%);
            opacity: 0.85;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    body[light-mode="dark"] #exampleModal .modal-content {
        background-color: #1e293b !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] #exampleModal .form-control,
    body[light-mode="dark"] #exampleModal .form-select,
    body[light-mode="dark"] #updateTypeDropdownBtn {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] #updateTypeDropdownMenu {
        background-color: #1e293b !important;
        border-color: #8C56D4 !important;
    }
    body[light-mode="dark"] .update-type-option-item:hover {
        background-color: #334155 !important;
    }
</style>

<!-- Action Button Edit Modal Start -->
<section class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 107000 !important;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <!-- Modal Header (Purple Gradient, White Text, Red Close Button) -->
            <div class="modal-header text-white py-3 px-3 px-md-4 d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border-bottom: none;">
                <h5 class="modal-title fw-bold text-white d-flex align-items-center gap-2 mb-0" style="font-size: 16px;">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>খরচের তথ্য আপডেট</span>
                </h5>
                <button type="button" class="btn btn-sm text-white border-0 rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close" style="background-color: #ef4444 !important; width: 30px; height: 30px; font-size: 14px;">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Modal Body (Pure Bangla Labels, 2 Inputs Per Row) -->
            <div class="modal-body p-3 p-md-4">
                <form onsubmit="return Update(event)">
                    <input type="hidden" id="updateID">

                    <div class="row g-3">
                        <!-- 1. Searchable Filter Dropdown for Expense Type -->
                        <div class="col-12 col-md-6 position-relative">
                            <label class="form-label small fw-bold text-secondary mb-1 d-block">খরচের খাত / টাইপ *</label>
                            <input type="hidden" id="UpdateExpenseTypeInfoID" required />
                            <div class="position-relative">
                                <button type="button" class="form-control text-start d-flex align-items-center justify-content-between px-3 bg-white" id="updateTypeDropdownBtn" onclick="toggleUpdateTypeDropdown()" style="height: 42px; border-radius: 8px; font-size: 13.5px; border: 1.5px solid #cbd5e1; cursor: pointer;">
                                    <span class="text-truncate fw-bold text-dark" id="updateTypeDisplay">টাইপ নির্বাচন করুন</span>
                                    <i class="fa-solid fa-chevron-down text-muted" style="font-size: 12px;"></i>
                                </button>
                                
                                <div id="updateTypeDropdownMenu" class="p-2 shadow-lg">
                                    <div class="p-1 mb-1 position-relative">
                                        <input type="text" id="updateTypeSearchInput" class="form-control form-control-sm ps-4" placeholder="🔍 টাইপ খুঁজুন..." oninput="filterUpdateTypeOptions(this.value)" style="border-radius: 6px; font-size: 12px; height: 34px;" autocomplete="off" />
                                        <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="left: 10px; top: 11px; font-size: 11px;"></i>
                                    </div>
                                    <div id="updateTypeListContainer" style="max-height: 160px; overflow-y: auto;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Amount Input -->
                        <div class="col-12 col-md-6">
                            <label class="form-label small fw-bold text-secondary mb-1 d-block">টাকার পরিমাণ (৳) *</label>
                            <input type="number" step="any" inputmode="decimal" class="form-control fw-bold text-danger" placeholder="0.00" id="UpdateExpenseAmount" required style="height: 42px; border-radius: 8px;" />
                        </div>

                        <!-- 3. Date Picker -->
                        <div class="col-12 col-md-6">
                            <label class="form-label small fw-bold text-secondary mb-1 d-block">তারিখ *</label>
                            <div class="position-relative" style="cursor: pointer;" onclick="updateDatePicker && updateDatePicker.open()">
                                <input type="text" class="form-control fw-bold text-dark text-start" id="UpdateExpenseDate" placeholder="DD-MM-YYYY" readonly required style="height: 42px; border-radius: 8px; font-size: 13.5px; cursor: pointer;" />
                                <i class="fa-regular fa-calendar-days position-absolute" style="right: 12px; top: 13px; cursor: pointer; color: #8C56D4 !important;"></i>
                            </div>
                        </div>

                        <!-- 4. Details -->
                        <div class="col-12 col-md-6">
                            <label class="form-label small fw-bold text-secondary mb-1 d-block">খরচের বিবরণ (ঐচ্ছিক)</label>
                            <input type="text" class="form-control" placeholder="খরচের বিবরণ লিখুন..." id="UpdateExpenseDetails" style="height: 42px; border-radius: 8px;" />
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="d-flex align-items-center justify-content-end gap-2 mt-4 pt-3 border-top">
                        <button type="button" class="btn px-4 py-2 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="border-radius: 8px; background-color: #ef4444 !important; border: none; padding: 10px 24px !important;">বাতিল</button>
                        <button type="submit" class="btn px-4 py-2 fw-bold text-white shadow-sm" style="border-radius: 8px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; padding: 10px 24px !important;">
                            <i class="fa-solid fa-check me-1"></i> আপডেট করুন
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Action Button Edit Modal End -->

<script>
    let updateDatePicker = null;
    let editExpenseTypeList = [];

    $(document).ready(function() {
        $('#exampleModal').appendTo("body");
        ExpenseTypeDataShow();
        initUpdateDatePicker();

        $('#exampleModal').on('show.bs.modal', function (event) {
            // Lock window scroll
            document.body.style.overflow = 'hidden';

            const button = event.relatedTarget;
            if (button) {
                const id = $(button).attr('data-id') || $(button).data('id') || $(button).closest('[data-id]').attr('data-id');
                if (id) {
                    FillUpUpdateForm(id);
                }
            }
        });

        $('#exampleModal').on('shown.bs.modal', function () {
            // Auto-focus amount to open virtual keyboard immediately on mobile/tablet
            setTimeout(() => {
                const amountInput = document.getElementById('UpdateExpenseAmount');
                if (amountInput) {
                    amountInput.focus();
                    amountInput.select();
                }
            }, 100);
        });

        $('#exampleModal').on('hidden.bs.modal', function () {
            // Restore window scroll
            document.body.style.overflow = '';
            document.getElementById('updateTypeDropdownMenu').style.display = 'none';
        });

        // Close dropdown when clicked outside
        document.addEventListener('click', function(e) {
            const menu = document.getElementById('updateTypeDropdownMenu');
            const btn = document.getElementById('updateTypeDropdownBtn');
            if (menu && btn && !menu.contains(e.target) && !btn.contains(e.target)) {
                menu.style.display = 'none';
            }
        });
    });

    function toggleUpdateTypeDropdown() {
        const menu = document.getElementById('updateTypeDropdownMenu');
        if (!menu) return;
        const isHidden = menu.style.display === 'none' || !menu.style.display;
        menu.style.display = isHidden ? 'block' : 'none';
        if (isHidden) {
            renderUpdateTypeOptions('');
            setTimeout(() => {
                document.getElementById('updateTypeSearchInput')?.focus();
            }, 100);
        }
    }

    function filterUpdateTypeOptions(val) {
        renderUpdateTypeOptions(val);
    }

    function renderUpdateTypeOptions(query = '') {
        const container = document.getElementById('updateTypeListContainer');
        if (!container) return;

        const q = (query || '').toLowerCase().trim();
        const filtered = editExpenseTypeList.filter(t => (t.type_name || '').toLowerCase().includes(q));

        if (filtered.length === 0) {
            container.innerHTML = `<div class="p-2 text-center text-muted small">কোনো টাইপ পাওয়া যায়নি</div>`;
            return;
        }

        let html = '';
        filtered.forEach(t => {
            const safeName = (t.type_name || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
            html += `
                <div class="update-type-option-item p-2 rounded-2 cursor-pointer small text-dark d-flex align-items-center justify-content-between transition-all" onclick="selectUpdateType(${t.id}, '${safeName}')" style="cursor: pointer; font-size: 13px;">
                    <span class="fw-bold">${t.type_name}</span>
                    <span class="badge bg-secondary-subtle text-secondary" style="font-size: 10px;">খাত</span>
                </div>
            `;
        });
        container.innerHTML = html;
    }

    function selectUpdateType(id, name) {
        document.getElementById('UpdateExpenseTypeInfoID').value = id;
        document.getElementById('updateTypeDisplay').innerText = name;
        document.getElementById('updateTypeDropdownMenu').style.display = 'none';
    }

    function initUpdateDatePicker() {
        const input = document.getElementById('UpdateExpenseDate');
        if (!input) return;

        if (typeof flatpickr !== 'undefined') {
            updateDatePicker = flatpickr(input, {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                monthSelectorType: "static"
            });
        } else {
            setTimeout(initUpdateDatePicker, 100);
        }
    }

    async function ExpenseTypeDataShow() {
        try {
            let res = await axios.get("/api/expense-type-list", HeaderToken());
            if (res.data.ExpenseTypeData) {
                editExpenseTypeList = res.data.ExpenseTypeData || [];
            }
        } catch (error) {
            console.error("Error fetching expense types:", error);
        }
    }

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;

            let res = await axios.post("/api/expense-by-id", {
                id: id.toString()
            }, HeaderToken());

            let data = res.data.rows;
            if (data) {
                const typeId = data.expense_type_id || '';
                document.getElementById('UpdateExpenseTypeInfoID').value = typeId;

                const matchedType = editExpenseTypeList.find(t => t.id == typeId);
                document.getElementById('updateTypeDisplay').innerText = matchedType ? matchedType.type_name : 'টাইপ নির্বাচন করুন';

                document.getElementById('UpdateExpenseAmount').value = data.expense_amount || 0;
                document.getElementById('UpdateExpenseDetails').value = data.expense_details || '';

                if (data.date) {
                    if (updateDatePicker) {
                        updateDatePicker.setDate(new Date(data.date));
                    } else {
                        document.getElementById('UpdateExpenseDate').value = data.date;
                    }
                }
            }
        } catch (e) {
            console.error(e);
            unauthorized(e.response ? e.response.status : 500);
        }
    }

    async function Update(event) {
        if (event) event.preventDefault();
        try {
            let typeId = document.getElementById('UpdateExpenseTypeInfoID').value;
            if (!typeId) {
                errorToast("খরচের খাত / টাইপ নির্বাচন করুন!");
                return false;
            }

            let rawDate = document.getElementById('UpdateExpenseDate').value.trim();
            let finalDate = rawDate;
            if (rawDate.includes('-')) {
                let parts = rawDate.split('-');
                if (parts[0].length === 2 && parts[2].length === 4) {
                    finalDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
                }
            }

            let formData = new FormData();
            formData.append('expense_type_id', typeId);
            formData.append('expense_amount', $('#UpdateExpenseAmount').val());
            formData.append('date', finalDate);
            formData.append('expense_details', $('#UpdateExpenseDetails').val());
            formData.append('id', $('#updateID').val());

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            let res = await axios.post("/api/update-expense", formData, config);
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message || "খরচ সফলভাবে আপডেট হয়েছে!");
                $("#exampleModal").modal('hide');
                if (typeof getExpenseList === 'function') {
                    await getExpenseList();
                } else {
                    setTimeout(() => location.reload(), 500);
                }
            } else {
                errorToast(res.data.message);
            }
        } catch (e) {
            hideLoader();
            console.error("Error:", e.response);
            errorToast("খরচ আপডেট করতে সমস্যা হয়েছে।");
        }
        return false;
    }
</script>
