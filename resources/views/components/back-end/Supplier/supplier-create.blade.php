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
        z-index: 107000 !important;
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
        padding: 0 !important;
        overflow: hidden !important;
        box-sizing: border-box !important;
    }

    #supplierCreateModal .modal-header-purple {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 14px 18px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        color: #ffffff !important;
        border-bottom: 1px solid #E5D5F7 !important;
    }

    #supplierCreateModal .btn-close-red {
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
        transition: all 0.2s ease !important;
    }
    #supplierCreateModal .btn-close-red:hover {
        background: #dc2626 !important;
        transform: rotate(90deg) scale(1.05);
    }

    #supplierCreateModal .btn-cancel-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border: 1px solid #dc2626 !important;
        border-radius: 10px !important;
        font-weight: 700 !important;
        transition: all 0.2s ease !important;
    }
    #supplierCreateModal .btn-cancel-red:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
    }

    #supplierCreateModal .form-control:focus,
    #supplierCreateModal input:focus,
    #supplierCreateModal select:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
        background: #ffffff !important;
    }

    body[light-mode="dark"] #supplierCreateModal .newbrand-content,
    html[light-mode="dark"] #supplierCreateModal .newbrand-content,
    body[data-layout-mode="dark"] #supplierCreateModal .newbrand-content,
    .dark-mode #supplierCreateModal .newbrand-content {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    body[light-mode="dark"] #supplierCreateModal .form-control,
    html[light-mode="dark"] #supplierCreateModal .form-control,
    body[data-layout-mode="dark"] #supplierCreateModal .form-control,
    .dark-mode #supplierCreateModal .form-control,
    body[light-mode="dark"] #supplierCreateModal select,
    html[light-mode="dark"] #supplierCreateModal select,
    body[data-layout-mode="dark"] #supplierCreateModal select,
    .dark-mode #supplierCreateModal select {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    body[light-mode="dark"] #supplierCreateModal label,
    html[light-mode="dark"] #supplierCreateModal label,
    body[data-layout-mode="dark"] #supplierCreateModal label,
    .dark-mode #supplierCreateModal label {
        color: #e2e8f0 !important;
    }

    @media screen and (max-width: 991.98px) {
        .newbrand,
        #supplierCreateModal,
        #myModal.newbrand {
            padding: 0 !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100% !important;
            height: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: flex-end !important;
            align-items: center !important;
            overflow: hidden !important;
        }

        .newbrand-content,
        #supplierCreateModal .newbrand-content,
        #myModal .newbrand-content {
            position: fixed !important;
            top: auto !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            max-height: 85vh !important;
            max-height: 85dvh !important;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-top-left-radius: 24px !important;
            border-top-right-radius: 24px !important;
            box-shadow: 0 -12px 40px rgba(0, 0, 0, 0.35) !important;
            display: flex !important;
            flex-direction: column !important;
            overflow: hidden !important;
            animation: slideUpSupplierModal 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        @keyframes slideUpSupplierModal {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }

        #supplierCreateModal .modal-body-scroll {
            flex: 1 1 auto !important;
            max-height: calc(85vh - 130px) !important;
            max-height: calc(85dvh - 130px) !important;
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch;
            padding: 14px 16px 20px 16px !important;
        }

        #supplierCreateModal .modal-sticky-footer {
            flex: 0 0 auto !important;
            position: sticky !important;
            bottom: 0 !important;
            background: #ffffff !important;
            z-index: 100 !important;
            border-top: 1px solid #e2e8f0 !important;
            padding: 10px 16px !important;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05) !important;
        }

        #supplierCreateModal .actions-btn-group {
            display: flex !important;
            flex-direction: row !important;
            gap: 10px !important;
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        #supplierCreateModal .actions-btn-group button {
            flex: 1 !important;
            width: 50% !important;
            height: 46px !important;
            font-size: 14px !important;
        }
    }

    body[light-mode="dark"] #supplierCreateModal .modal-sticky-footer,
    html[light-mode="dark"] #supplierCreateModal .modal-sticky-footer,
    body[data-layout-mode="dark"] #supplierCreateModal .modal-sticky-footer,
    .dark-mode #supplierCreateModal .modal-sticky-footer {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
</style>

<div class="newbrand" id="supplierCreateModal" style="display: none;">
    <div class="newbrand-content">
        <!-- Sleek Purple Header with Red Close Button -->
        <div class="modal-header-purple">
            <h5 class="fw-bold m-0 d-flex align-items-center gap-2 text-white" style="font-size: 16.5px;">
                <i class="fa-solid fa-truck-field"></i>
                <span>নতুন সাপ্লায়ার যোগ করুন</span>
            </h5>
            <button type="button" onclick="closeSupplierModal()" class="btn-close-red" title="বন্ধ করুন">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form onsubmit="return SupplierDataSave(event)" id="supplierCreateForm" class="d-flex flex-column flex-grow-1 overflow-hidden m-0">
            <div id="popup-modal" class="modal-body-scroll p-3 flex-grow-1">
                <div class="row g-2">
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierName" class="fw-bold text-dark mb-1" style="font-size: 13px;">সাপ্লায়ারের নাম <span class="text-danger">*</span></label>
                            <input type="text" placeholder="সাপ্লায়ারের নাম লিখুন..." id="supplierName" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierMobile" class="fw-bold text-dark mb-1" style="font-size: 13px;">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <input type="tel" inputmode="tel" pattern="[0-9]*" maxlength="15" placeholder="০১৭xxxxxxxx" id="supplierMobile" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="enforceBanglaNumberInput(this)" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierCompany" class="fw-bold text-dark mb-1" style="font-size: 13px;">কোম্পানির নাম</label>
                            <input type="text" placeholder="কোম্পানির নাম লিখুন..." id="supplierCompany" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierAddress" class="fw-bold text-dark mb-1" style="font-size: 13px;">ঠিকানা</label>
                            <input type="text" placeholder="সাপ্লায়ারের ঠিকানা লিখুন..." id="supplierAddress" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierEmail" class="fw-bold text-dark mb-1" style="font-size: 13px;">ইমেইল</label>
                            <input type="email" inputmode="email" placeholder="example@domain.com" id="supplierEmail" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="supplierPurchasePayableAmount" class="fw-bold text-dark mb-1" style="font-size: 13px;">পূর্বের দেনা / বাকি</label>
                            <input type="text" inputmode="decimal" pattern="[0-9]*" placeholder="৳ ০.০০" id="supplierPurchasePayableAmount" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="enforceBanglaNumberInput(this)" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-row mb-2">
                            <label for="supplierStatus" class="fw-bold text-dark mb-1" style="font-size: 13px;">স্ট্যাটাস</label>
                            <select class="form-select fw-bold" id="supplierStatus" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;">
                                <option value="Active" selected>সক্রিয়</option>
                                <option value="InActive">নিষ্ক্রিয়</option>
                            </select>
                        </div>
                    </div>

                    <!-- Upload Photo -->
                    <div class="col-12 mb-2">
                        <div class="form-row mb-2">
                            <label class="fw-bold text-dark mb-1" style="font-size: 13px;">সাপ্লায়ার ছবি</label>
                            <div class="d-flex align-items-center gap-3 p-2.5 border rounded-3 bg-light" style="width: 100%; border: 1.5px dashed #cbd5e1 !important;">
                                <div class="bg-white border rounded-3 d-flex align-items-center justify-content-center shadow-xs overflow-hidden position-relative" style="width: 64px; height: 56px; flex-shrink: 0;">
                                    <img id="supplierImgPreview" src="" class="d-none w-100 h-100 object-fit-cover" />
                                    <i id="supplierImgIcon" class="fa-regular fa-image fa-2x" style="color: #8C56D4 !important;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <input type="file" id="supplierImage" accept="image/*" class="form-control form-control-sm fw-bold" onchange="previewSupplierImage(this)" style="border-radius: 8px; border: 1px solid #cbd5e1;" />
                                    <p class="mb-0 text-muted mt-1" style="font-size: 11px;">PNG, JPEG অথবা GIF (সর্বোচ্চ ১ MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Bottom Action Buttons right above keyboard -->
            <div class="modal-sticky-footer p-3 border-top">
                <div class="actions d-flex align-items-center justify-content-end gap-2 actions-btn-group">
                    <button type="button" onclick="closeSupplierModal()" class="btn btn-cancel-red px-4 py-2.5 fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px;">বাতিল</button>
                    <button type="submit" class="btn-save btn btn-primary px-4 py-2.5 fw-bold" style="height: 44px; margin: 0; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; border-radius: 10px; font-size: 14px; color: #ffffff;">সেভ করুন</button>
                </div>
            </div>
        </form>
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
        const firstInput = document.getElementById('supplierName');
        if (firstInput) {
            try { firstInput.focus(); } catch(_) {}
        }
        if (modal) {
            modal.style.setProperty('display', 'block', 'important');
            modal.style.opacity = '1';
            modal.style.visibility = 'visible';
            modal.classList.add('show');
            modal.classList.add('show-modal');
            if (firstInput) {
                firstInput.focus();
                firstInput.click();
            }
            setTimeout(() => {
                if (firstInput) {
                    firstInput.focus();
                    firstInput.click();
                }
            }, 50);
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
