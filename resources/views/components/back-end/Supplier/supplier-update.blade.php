<style>
    #supplierUpdateModal {
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
        padding: 15px !important;
        box-sizing: border-box !important;
    }

    #supplierUpdateModal .newbrand-content {
        background: #ffffff !important;
        margin: 20px auto !important;
        max-width: 580px !important;
        width: 100% !important;
        border-radius: 20px !important;
        padding: 0 !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
        position: relative !important;
        top: 0 !important;
        transform: none !important;
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
        overflow: hidden !important;
    }

    #supplierUpdateModal .modal-header-purple {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 14px 18px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        color: #ffffff !important;
        border-bottom: 1px solid #E5D5F7 !important;
    }

    #supplierUpdateModal .btn-close-red {
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
    #supplierUpdateModal .btn-close-red:hover {
        background: #dc2626 !important;
        transform: rotate(90deg) scale(1.05);
    }

    #supplierUpdateModal .btn-cancel-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border: 1px solid #dc2626 !important;
        border-radius: 10px !important;
        font-weight: 700 !important;
        transition: all 0.2s ease !important;
    }
    #supplierUpdateModal .btn-cancel-red:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
    }

    #supplierUpdateModal .form-control:focus,
    #supplierUpdateModal input:focus,
    #supplierUpdateModal select:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
        background: #ffffff !important;
    }

    .dark-mode #supplierUpdateModal .newbrand-content {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    .dark-mode #supplierUpdateModal .form-control,
    .dark-mode #supplierUpdateModal select {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    .dark-mode #supplierUpdateModal label {
        color: #e2e8f0 !important;
    }

    @media screen and (max-width: 991.98px) {
        #supplierUpdateModal {
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

        #supplierUpdateModal .newbrand-content {
            position: fixed !important;
            top: auto !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            padding: 0 !important;
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

        #supplierUpdateModal .modal-body-scroll {
            flex: 1 1 auto !important;
            max-height: calc(85vh - 60px) !important;
            max-height: calc(85dvh - 60px) !important;
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch;
            padding: 14px 16px 20px 16px !important;
        }

        #supplierUpdateModal .actions-btn-group {
            display: flex !important;
            flex-direction: row !important;
            gap: 10px !important;
            width: 100% !important;
            padding-top: 10px !important;
            padding-bottom: 6px !important;
        }

        #supplierUpdateModal .actions-btn-group button {
            flex: 1 !important;
            width: 50% !important;
            height: 46px !important;
            font-size: 14px !important;
        }
    }
</style>

<div class="newbrand" id="supplierUpdateModal" style="display: none;">
    <div class="newbrand-content">
        <!-- Sleek Purple Header with Red Close Button -->
        <div class="modal-header-purple">
            <h5 class="fw-bold m-0 d-flex align-items-center gap-2 text-white" style="font-size: 16.5px;">
                <i class="fa-solid fa-pen-to-square"></i>
                <span>সাপ্লায়ার এডিট করুন</span>
            </h5>
            <button type="button" onclick="closeSupplierUpdateModal()" class="btn-close-red" title="বন্ধ করুন">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div id="popup-modal" class="modal-body-scroll p-3">
            <form onsubmit="return SupplierDataUpdate(event)" id="supplierUpdateForm">
                <input class="d-none" id="updateID">

                <div class="row g-2">
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdatesupplierName" class="fw-bold text-dark mb-1" style="font-size: 13px;">সাপ্লায়ারের নাম <span class="text-danger">*</span></label>
                            <input type="text" placeholder="সাপ্লায়ারের নাম লিখুন..." id="UpdatesupplierName" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdatesupplierMobile" class="fw-bold text-dark mb-1" style="font-size: 13px;">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <input type="tel" inputmode="tel" pattern="[0-9]*" maxlength="15" placeholder="০১৭xxxxxxxx" id="UpdatesupplierMobile" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="enforceBanglaNumberInput(this)" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdatesupplierCompany" class="fw-bold text-dark mb-1" style="font-size: 13px;">কোম্পানির নাম</label>
                            <input type="text" placeholder="কোম্পানির নাম লিখুন..." id="UpdatesupplierCompany" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdatesupplierAddress" class="fw-bold text-dark mb-1" style="font-size: 13px;">ঠিকানা</label>
                            <input type="text" placeholder="সাপ্লায়ারের ঠিকানা লিখুন..." id="UpdatesupplierAddress" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdatesupplierEmail" class="fw-bold text-dark mb-1" style="font-size: 13px;">ইমেইল</label>
                            <input type="email" inputmode="email" placeholder="example@domain.com" id="UpdatesupplierEmail" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdatePurchasePayableAmount" class="fw-bold text-dark mb-1" style="font-size: 13px;">পূর্বের দেনা / বাকি</label>
                            <input type="text" inputmode="decimal" pattern="[0-9]*" placeholder="৳ ০.০০" id="UpdatePurchasePayableAmount" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="enforceBanglaNumberInput(this)" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-row mb-2">
                            <label for="UpdateSelectStatus" class="fw-bold text-dark mb-1" style="font-size: 13px;">স্ট্যাটাস</label>
                            <select class="form-select fw-bold" id="UpdateSelectStatus" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;">
                                <option value="Active">সক্রিয়</option>
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
                                    <img id="UpdatesupplierImgPreview" src="" class="d-none w-100 h-100 object-fit-cover" />
                                    <i id="UpdatesupplierImgIcon" class="fa-regular fa-image fa-2x" style="color: #8C56D4 !important;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <input type="file" id="UpdatesupplierImage" accept="image/*" class="form-control form-control-sm fw-bold" onchange="previewUpdateSupplierImage(this)" style="border-radius: 8px; border: 1px solid #cbd5e1;" />
                                    <p class="mb-0 text-muted mt-1" style="font-size: 11px;">PNG, JPEG অথবা GIF (সর্বোচ্চ ১ MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-12 mt-2 pt-2 border-top">
                        <div class="actions d-flex align-items-center justify-content-end gap-2 actions-btn-group">
                            <button type="button" onclick="closeSupplierUpdateModal()" class="btn btn-cancel-red px-4 py-2.5 fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px;">বাতিল</button>
                            <button type="button" onclick="SupplierDataUpdate(event)" class="btn-save btn btn-primary px-4 py-2.5 fw-bold" style="height: 44px; margin: 0; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; border-radius: 10px; font-size: 14px; color: #ffffff;">আপডেট করুন</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewUpdateSupplierImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById("UpdatesupplierImgPreview");
                const icon = document.getElementById("UpdatesupplierImgIcon");
                if (img && icon) {
                    img.src = e.target.result;
                    img.classList.remove("d-none");
                    icon.classList.add("d-none");
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    window.previewUpdateSupplierImage = previewUpdateSupplierImage;

    function closeSupplierUpdateModal() {
        const modal = document.getElementById('supplierUpdateModal');
        if (modal) {
            modal.classList.remove('show');
            modal.style.setProperty('display', 'none', 'important');
            modal.style.opacity = '0';
            modal.style.visibility = 'hidden';
            document.documentElement.style.overflowY = 'auto';
        }
    }
    window.closeSupplierUpdateModal = closeSupplierUpdateModal;

    async function FillUpSupplierUpdateForm(idOrSupplier) {
        try {
            let supplier = null;

            if (typeof idOrSupplier === 'object' && idOrSupplier !== null) {
                supplier = idOrSupplier;
            } else if (idOrSupplier) {
                let supplierIdStr = idOrSupplier.toString();
                document.getElementById('updateID').value = supplierIdStr;

                // 1. Search in global allSuppliersData array if available
                if (typeof allSuppliersData !== 'undefined' && Array.isArray(allSuppliersData)) {
                    supplier = allSuppliersData.find(s => s.id == supplierIdStr);
                }

                // 2. If not found in memory array, fetch from backend API
                if (!supplier) {
                    let res = await axios.post("/api/supplier-by-id", { id: supplierIdStr }, HeaderToken());
                    if (res.data && res.data.rows) {
                        supplier = res.data.rows;
                    }
                }
            }

            if (supplier) {
                document.getElementById('updateID').value = supplier.id || '';
                document.getElementById('UpdatesupplierName').value = supplier.name || supplier.supplier_name || '';
                document.getElementById('UpdatesupplierCompany').value = supplier.company || '';
                document.getElementById('UpdatesupplierMobile').value = supplier.mobile || supplier.phone || '';
                document.getElementById('UpdatesupplierAddress').value = supplier.address || '';
                document.getElementById('UpdatesupplierEmail').value = supplier.email || '';

                let payableVal = supplier.purchase_payable_amount !== undefined ? supplier.purchase_payable_amount : (supplier.payable || 0);
                document.getElementById('UpdatePurchasePayableAmount').value = payableVal;

                if (document.getElementById('UpdateSelectStatus')) {
                    document.getElementById('UpdateSelectStatus').value = supplier.status || 'Active';
                }

                const imgPreview = document.getElementById("UpdatesupplierImgPreview");
                const imgIcon = document.getElementById("UpdatesupplierImgIcon");
                if (supplier.img_url) {
                    if (imgPreview && imgIcon) {
                        imgPreview.src = supplier.img_url.startsWith('/') ? supplier.img_url : ("/" + supplier.img_url);
                        imgPreview.classList.remove("d-none");
                        imgIcon.classList.add("d-none");
                    }
                } else {
                    if (imgPreview && imgIcon) {
                        imgPreview.classList.add("d-none");
                        imgIcon.classList.remove("d-none");
                    }
                }
            }
        } catch (e) {
            console.error("FillUpSupplierUpdateForm error:", e);
        }
    }
    window.FillUpSupplierUpdateForm = FillUpSupplierUpdateForm;
    window.FillUpUpdateForm = FillUpSupplierUpdateForm; // Aliased for legacy calls

    async function openSupplierUpdateModal(supplierDataOrId) {
        const modal = document.getElementById('supplierUpdateModal');
        const inputEl = document.getElementById('UpdatesupplierName');
        if (inputEl) {
            try { inputEl.focus(); } catch(_) {}
        }
        if (modal) {
            modal.style.setProperty('display', 'block', 'important');
            modal.style.opacity = '1';
            modal.style.visibility = 'visible';
            modal.classList.add('show');
            modal.classList.add('show-modal');
            document.documentElement.style.overflowY = 'hidden';

            if (supplierDataOrId) {
                await FillUpSupplierUpdateForm(supplierDataOrId);
            }
            if (inputEl) {
                inputEl.focus();
                inputEl.click();
            }
            setTimeout(() => {
                if (inputEl) {
                    inputEl.focus();
                    inputEl.click();
                }
            }, 50);
        }
    }
    window.openSupplierUpdateModal = openSupplierUpdateModal;

    async function SupplierDataUpdate(event) {
        if (event) event.preventDefault();
        try {
            let supplierId = document.getElementById('updateID')?.value;
            let supplierName = document.getElementById('UpdatesupplierName')?.value?.trim() || '';
            let supplierCompany = document.getElementById('UpdatesupplierCompany')?.value?.trim() || '';
            let supplierMobile = document.getElementById('UpdatesupplierMobile')?.value?.trim() || '';
            let supplierAddress = document.getElementById('UpdatesupplierAddress')?.value?.trim() || '';
            let supplierEmail = document.getElementById('UpdatesupplierEmail')?.value?.trim() || '';
            let supplierStatus = document.getElementById('UpdateSelectStatus')?.value || 'Active';

            let rawPayable = document.getElementById('UpdatePurchasePayableAmount')?.value || '0';
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
            formData.append('id', supplierId);
            formData.append('name', supplierName);
            formData.append('company', supplierCompany);
            formData.append('mobile', supplierMobile);
            formData.append('address', supplierAddress);
            formData.append('email', supplierEmail);
            formData.append('purchase_payable_amount', PurchasePayableAmount || 0);
            formData.append('status', supplierStatus || 'Active');

            let imgInput = document.getElementById('UpdatesupplierImage')?.files[0];
            if (imgInput) {
                formData.append('img', imgInput);
            }

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            let res = await axios.post("/api/update-supplier", formData, config);

            if (res.data.status === "success") {
                successToast(res.data.message || "🎉 সাপ্লায়ার তথ্য সফলভাবে আপডেট হয়েছে!");

                closeSupplierUpdateModal();

                // Update supplier in global dataset
                if (typeof allSuppliersData !== 'undefined' && Array.isArray(allSuppliersData)) {
                    let idx = allSuppliersData.findIndex(s => s.id == supplierId);
                    if (idx !== -1) {
                        allSuppliersData[idx].name = supplierName;
                        allSuppliersData[idx].company = supplierCompany;
                        allSuppliersData[idx].mobile = supplierMobile;
                        allSuppliersData[idx].address = supplierAddress;
                        allSuppliersData[idx].email = supplierEmail;
                        allSuppliersData[idx].purchase_payable_amount = PurchasePayableAmount;
                        allSuppliersData[idx].status = supplierStatus;
                    }
                }

                if (typeof refreshSupplierList === 'function') {
                    await refreshSupplierList(supplierId);
                }

                if (typeof selectMobileSupplierItem === 'function') {
                    selectMobileSupplierItem(supplierId);
                }

                if (typeof getList === 'function' && window.location.pathname.includes('supplier')) {
                    await getList();
                }
            } else {
                errorToast(res.data.message || "আপডেট করা সম্ভব হয়নি!");
            }
        } catch (e) {
            console.error("Supplier Update Error:", e);
            errorToast("সাপ্লায়ার আপডেট করতে সমস্যা হয়েছে!");
        }
        return false;
    }
    window.SupplierDataUpdate = SupplierDataUpdate;
</script>
