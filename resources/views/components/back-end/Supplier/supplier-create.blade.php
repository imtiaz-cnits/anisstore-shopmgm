<style>
    /* Scoped Fix for Supplier Create Modal Overlay & Mobile View Responsiveness */
    .newbrand,
    #supplierCreateModal,
    #myModal.newbrand {
        display: none;
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        z-index: 999999 !important;
        background: rgba(15, 23, 42, 0.65) !important;
        backdrop-filter: blur(8px) !important;
        -webkit-backdrop-filter: blur(8px) !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
        padding: 16px 12px !important;
        box-sizing: border-box !important;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.25s ease, visibility 0.25s ease;
    }

    .newbrand.show,
    .newbrand.show-modal,
    #supplierCreateModal.show,
    #supplierCreateModal.show-modal,
    #myModal.newbrand.show,
    #myModal.newbrand.show-modal {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    .newbrand-content,
    #supplierCreateModal .newbrand-content,
    #myModal .newbrand-content {
        position: relative !important;
        top: 0 !important;
        left: 0 !important;
        transform: none !important;
        -webkit-transform: none !important;
        margin: 20px auto !important;
        width: 100% !important;
        max-width: 580px !important;
        border-radius: 20px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
        background: #ffffff !important;
        padding: 20px !important;
        box-sizing: border-box !important;
    }

    #supplierCreateModal .form-control:focus,
    #supplierCreateModal input:focus,
    #supplierCreateModal select:focus {
        border-color: #16a34a !important;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.15) !important;
        background: #ffffff !important;
    }

    @media screen and (max-width: 768px) {
        .newbrand,
        #supplierCreateModal,
        #myModal.newbrand {
            padding: 10px 8px !important;
        }

        .newbrand-content,
        #supplierCreateModal .newbrand-content,
        #myModal .newbrand-content {
            margin: 10px auto 30px auto !important;
            padding: 16px 14px !important;
            border-radius: 18px !important;
        }

        #supplierCreateModal .actions-btn-group {
            display: flex !important;
            flex-direction: row !important;
            gap: 8px !important;
            width: 100% !important;
        }

        #supplierCreateModal .actions-btn-group button {
            flex: 1 !important;
            width: 50% !important;
            height: 44px !important;
            font-size: 13.5px !important;
        }
    }
</style>
</style>

<div class="newbrand" id="supplierCreateModal" style="display: none;">
    <div class="newbrand-content">
        <!-- Sleek Header with Close Icon -->
        <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
            <h5 class="fw-extrabold text-success m-0 d-flex align-items-center gap-2" style="font-size: 17px;">
                <i class="fa-solid fa-truck-field"></i>
                <span>নতুন সাপ্লায়ার তৈরি করুন (Add New Supplier)</span>
            </h5>
            <button type="button" onclick="closeSupplierModal()" class="btn-close-modal border-0 bg-light text-secondary rounded-circle d-flex align-items-center justify-content-center shadow-xs" style="width: 36px; height: 36px; cursor: pointer; transition: all 0.2s;" title="বন্ধ করুন">
                <i class="fa-solid fa-xmark fs-5"></i>
            </button>
        </div>

        <div id="popup-modal">
            <form onsubmit="return SupplierDataSave(event)" id="supplierCreateForm">
                <div class="row g-2">
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierName" class="fw-bold text-dark mb-1" style="font-size: 13px;">সাপ্লায়ার নাম (Supplier Name) <span class="text-danger">*</span></label>
                            <input type="text" placeholder="সাপ্লায়ারের নাম লিখুন..." id="supplierName" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #f8fafc;" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierMobile" class="fw-bold text-dark mb-1" style="font-size: 13px;">মোবাইল নম্বর (Supplier Mobile) <span class="text-danger">*</span></label>
                            <input type="tel" inputmode="tel" maxlength="15" placeholder="০১৭xxxxxxxx (মোবাইল নম্বর)" id="supplierMobile" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #f8fafc;" oninput="enforceBanglaNumberInput(this)" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierCompany" class="fw-bold text-dark mb-1" style="font-size: 13px;">কোম্পানির নাম (Company Name)</label>
                            <input type="text" placeholder="কোম্পানির নাম লিখুন..." id="supplierCompany" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #f8fafc;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierAddress" class="fw-bold text-dark mb-1" style="font-size: 13px;">ঠিকানা (Supplier Address)</label>
                            <input type="text" placeholder="সাপ্লায়ারের ঠিকানা লিখুন..." id="supplierAddress" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #f8fafc;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierEmail" class="fw-bold text-dark mb-1" style="font-size: 13px;">ইমেইল (Supplier Email)</label>
                            <input type="email" inputmode="email" placeholder="example@domain.com (ইমেইল)" id="supplierEmail" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #f8fafc;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierPurchasePayableAmount" class="fw-bold text-dark mb-1" style="font-size: 13px;">পূর্বের পাওনা (Payable Amount)</label>
                            <input type="text" inputmode="decimal" placeholder="৳ ০.০০ (পূর্বের পাওনা/বাকি)" id="supplierPurchasePayableAmount" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #f8fafc;" oninput="enforceBanglaNumberInput(this)" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-row mb-2">
                            <label for="supplierStatus" class="fw-bold text-dark mb-1" style="font-size: 13px;">স্ট্যাটাস (Status)</label>
                            <select class="form-select fw-bold" id="supplierStatus" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #f8fafc;">
                                <option value="Active" selected>সক্রিয় (Active)</option>
                                <option value="InActive">নিষ্ক্রিয় (Inactive)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Upload Photo -->
                    <div class="col-12 mb-2">
                        <div class="form-row mb-2">
                            <label class="fw-bold text-dark mb-1" style="font-size: 13px;">সাপ্লায়ার ছবি (Supplier Photo)</label>
                            <div class="d-flex align-items-center gap-3 p-2.5 border rounded-3 bg-light" style="width: 100%; border: 1.5px dashed #cbd5e1 !important;">
                                <div class="bg-white border rounded-3 d-flex align-items-center justify-content-center shadow-xs overflow-hidden position-relative" style="width: 64px; height: 56px; flex-shrink: 0;">
                                    <img id="supplierImgPreview" src="" class="d-none w-100 h-100 object-fit-cover" />
                                    <i id="supplierImgIcon" class="fa-regular fa-image fa-2x text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <input type="file" id="supplierImage" accept="image/*" class="form-control form-control-sm fw-bold" onchange="previewSupplierImage(this)" style="border-radius: 8px; border: 1px solid #cbd5e1;" />
                                    <p class="mb-0 text-muted mt-1" style="font-size: 11px;">PNG, JPEG or GIF (up to 1 MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-12 mt-2 pt-2 border-top">
                        <div class="actions d-flex align-items-center justify-content-end gap-2 actions-btn-group">
                            <button type="button" onclick="closeSupplierModal()" class="btn btn-outline-secondary px-4 py-2.5 fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px;">বাতিল (Cancel)</button>
                            <button type="button" onclick="SupplierDataSave(event)" class="btn-save btn btn-success px-4 py-2.5 fw-bold" style="height: 44px; margin: 0; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; border-radius: 10px; font-size: 14px; color: #ffffff;">সেভ করুন</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewSupplierImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById("supplierImgPreview");
                const icon = document.getElementById("supplierImgIcon");
                if (img && icon) {
                    img.src = e.target.result;
                    img.classList.remove("d-none");
                    icon.classList.add("d-none");
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    window.previewSupplierImage = previewSupplierImage;

    async function SupplierDataSave(event) {
        if (event) event.preventDefault();
        try {
            let ProductImageInput = document.getElementById('supplierImage')?.files[0];
            let supplierName = document.getElementById('supplierName')?.value?.trim() || '';
            let supplierCompany = document.getElementById('supplierCompany')?.value?.trim() || '';
            let supplierMobile = document.getElementById('supplierMobile')?.value?.trim() || '';
            let supplierAddress = document.getElementById('supplierAddress')?.value?.trim() || '';
            let supplierEmail = document.getElementById('supplierEmail')?.value?.trim() || '';
            let supplierStatus = document.getElementById('supplierStatus')?.value?.trim() || 'Active';
            
            let rawPayable = document.getElementById('supplierPurchasePayableAmount')?.value || '0';
            let PurchasePayableAmount = typeof parseBanglaFloat === 'function' ? parseBanglaFloat(rawPayable) : parseFloat(rawPayable) || 0;

            if (supplierName.length === 0) {
                errorToast("সাপ্লায়ার নাম আবশ্যিক (Supplier Name is required!)");
                return false;
            }
            if (supplierMobile.length === 0) {
                errorToast("মোবাইল নম্বর আবশ্যিক (Supplier Mobile is required!)");
                return false;
            }

            let formData = new FormData();
            formData.append('name', supplierName);
            formData.append('company', supplierCompany);
            formData.append('mobile', supplierMobile);
            formData.append('address', supplierAddress);
            formData.append('email', supplierEmail);
            formData.append('purchase_payable_amount', PurchasePayableAmount || 0);
            formData.append('status', supplierStatus || 'Active');
            if (ProductImageInput) {
                formData.append('img_url', ProductImageInput);
            }

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            let res = await axios.post("/api/create-supplier", formData, config);

            if (res.data['status'] === "success") {
                successToast(res.data['message']);

                // Reset form & image preview
                const suppForm = document.getElementById("supplierCreateForm") || document.querySelector('#supplierCreateModal form');
                if (suppForm) suppForm.reset();
                const imgPrev = document.getElementById("supplierImgPreview");
                const imgIcon = document.getElementById("supplierImgIcon");
                if (imgPrev) imgPrev.classList.add("d-none");
                if (imgIcon) imgIcon.classList.remove("d-none");

                // Close modal immediately
                closeSupplierModal();

                // Refresh supplier dropdown/list if available
                const newSupplier = res.data.supplier || res.data.data;
                const newSupplierId = newSupplier ? newSupplier.id : null;

                if (newSupplier && typeof allSuppliersData !== 'undefined' && Array.isArray(allSuppliersData)) {
                    const existingIdx = allSuppliersData.findIndex(s => s.id == newSupplier.id);
                    if (existingIdx !== -1) {
                        allSuppliersData[existingIdx] = newSupplier;
                    } else {
                        allSuppliersData.unshift(newSupplier);
                    }
                }

                if (typeof refreshSupplierList === 'function') {
                    await refreshSupplierList(newSupplierId);
                }

                if (typeof selectMobileSupplierItem === 'function' && newSupplierId) {
                    selectMobileSupplierItem(newSupplierId);
                }

                if (typeof selectSupplierItem === 'function' && newSupplier) {
                    selectSupplierItem(newSupplier);
                }

                if (typeof getList === 'function' && window.location.pathname.includes('supplier')) {
                    await getList();
                }
            } else {
                errorToast(res.data['message']);
            }
        } catch (e) {
            console.error("Supplier Save Error:", e);
            unauthorized(e.response ? e.response.status : 500);
        }
        return false;
    }

    function closeSupplierModal(modal) {
        if (!modal) modal = document.getElementById('supplierCreateModal') || document.getElementById('myModal');
        if (modal) {
            modal.classList.remove('show');
            modal.classList.remove('show-modal');
            modal.style.setProperty('display', 'none', 'important');
            modal.style.opacity = '0';
            modal.style.visibility = 'hidden';
            document.documentElement.style.overflowY = 'auto';
        }
        document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
    }
    window.closeSupplierModal = closeSupplierModal;
    window.closeModal = function(modal) {
        closeSupplierModal(modal);
    };

    function openSupplierCreateModal() {
        const modal = document.getElementById('supplierCreateModal') || document.getElementById('myModal');
        if (modal) {
            modal.style.setProperty('display', 'block', 'important');
            modal.style.opacity = '1';
            modal.style.visibility = 'visible';
            modal.classList.add('show');
            modal.classList.add('show-modal');
            const firstInput = document.getElementById('supplierName');
            if (firstInput) firstInput.focus();
        }
    }
    window.openSupplierCreateModal = openSupplierCreateModal;

    document.addEventListener("DOMContentLoaded", function() {
        const suppModal = document.getElementById('supplierCreateModal') || document.getElementById('myModal');
        if (suppModal) {
            if (suppModal.parentNode && suppModal.parentNode !== document.body) {
                document.body.appendChild(suppModal);
            }

            document.querySelectorAll('#supplierCreateModal .closes, #myModal .closes, .closes').forEach(btn => {
                btn.addEventListener('click', () => {
                    closeModal(suppModal);
                });
            });

            // Bind open buttons
            document.querySelectorAll('.create-supplier-btn, #createSupplierBtn, #openSupplierModalBtn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openSupplierCreateModal();
                });
            });

            // Close on backdrop click
            suppModal.addEventListener('click', function(e) {
                if (e.target === suppModal || e.target.classList.contains('page-content')) {
                    closeModal(suppModal);
                }
            });

            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && (suppModal.classList.contains('show') || suppModal.classList.contains('show-modal'))) {
                    closeModal(suppModal);
                }
            });
        }
    });

    // Prevent Bootstrap focus trap from stealing focus from nested supplier modal inputs
    document.addEventListener('focusin', function(e) {
        const suppModal = document.getElementById('supplierCreateModal') || document.getElementById('myModal');
        if (suppModal && (suppModal.classList.contains('show') || suppModal.classList.contains('show-modal'))) {
            if (suppModal.contains(e.target)) {
                e.stopImmediatePropagation();
            }
        }
    }, true);
</script>
