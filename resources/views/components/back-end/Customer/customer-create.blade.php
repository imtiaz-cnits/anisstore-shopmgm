<style>
    /* Scoped Fix for Customer Create Modal Overlay & Mobile View Responsiveness */
    .newbrand,
    #customerCreateModal,
    #myModal {
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
    #customerCreateModal.show,
    #customerCreateModal.show-modal,
    #myModal.show,
    #myModal.show-modal {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    .newbrand-content,
    #customerCreateModal .newbrand-content,
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

    #customerCreateModal .modal-header-purple,
    #myModal .modal-header-purple {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 14px 18px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        color: #ffffff !important;
        border-bottom: 1px solid #E5D5F7 !important;
    }

    #customerCreateModal .btn-close-red,
    #myModal .btn-close-red {
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
    #customerCreateModal .btn-close-red:hover,
    #myModal .btn-close-red:hover {
        background: #dc2626 !important;
        transform: rotate(90deg) scale(1.05);
    }

    #customerCreateModal .btn-cancel-red,
    #myModal .btn-cancel-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border: 1px solid #dc2626 !important;
        border-radius: 10px !important;
        font-weight: 700 !important;
        transition: all 0.2s ease !important;
    }
    #customerCreateModal .btn-cancel-red:hover,
    #myModal .btn-cancel-red:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
    }

    #customerCreateModal .form-control:focus,
    #customerCreateModal input:focus,
    #customerCreateModal textarea:focus,
    #myModal .form-control:focus,
    #myModal input:focus,
    #myModal textarea:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
        background: #ffffff !important;
    }

    body[light-mode="dark"] #customerCreateModal .newbrand-content,
    html[light-mode="dark"] #customerCreateModal .newbrand-content,
    body[light-mode="dark"] #myModal .newbrand-content {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    body[light-mode="dark"] #customerCreateModal .form-control,
    body[light-mode="dark"] #myModal .form-control {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    body[light-mode="dark"] #customerCreateModal label,
    body[light-mode="dark"] #myModal label {
        color: #e2e8f0 !important;
    }

    @media screen and (max-width: 991.98px) {
        .newbrand,
        #customerCreateModal,
        #myModal {
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
        #customerCreateModal .newbrand-content,
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
            animation: slideUpCustomerModal 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        @keyframes slideUpCustomerModal {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }

        #customerCreateModal .modal-body-scroll,
        #myModal .modal-body-scroll {
            flex: 1 1 auto !important;
            max-height: calc(85vh - 130px) !important;
            max-height: calc(85dvh - 130px) !important;
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch;
            padding: 14px 16px 20px 16px !important;
        }

        #customerCreateModal .modal-sticky-footer,
        #myModal .modal-sticky-footer {
            flex: 0 0 auto !important;
            position: sticky !important;
            bottom: 0 !important;
            background: #ffffff !important;
            z-index: 100 !important;
            border-top: 1px solid #e2e8f0 !important;
            padding: 10px 16px !important;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05) !important;
        }

        #customerCreateModal .actions-btn-group,
        #myModal .actions-btn-group {
            display: flex !important;
            flex-direction: row !important;
            gap: 10px !important;
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        #customerCreateModal .actions-btn-group button,
        #myModal .actions-btn-group button {
            flex: 1 !important;
            width: 50% !important;
            height: 46px !important;
            font-size: 14px !important;
        }
    }

    body[light-mode="dark"] #customerCreateModal .modal-sticky-footer,
    body[light-mode="dark"] #myModal .modal-sticky-footer {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
</style>

<div class="newbrand" id="customerCreateModal">
    <div class="newbrand-content">
        <!-- Sleek Purple Header with Red Close Button -->
        <div class="modal-header-purple">
            <h5 class="fw-bold m-0 d-flex align-items-center gap-2 text-white" style="font-size: 16.5px;">
                <i class="fa-solid fa-user-plus"></i>
                <span>নতুন কাস্টমার যোগ করুন</span>
            </h5>
            <button type="button" onclick="closeCustomerCreateModal()" class="btn-close-red" title="বন্ধ করুন">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form onsubmit="return CustomerDataSave(event)" id="customerCreateForm" class="d-flex flex-column flex-grow-1 overflow-hidden m-0">
            <div id="popup-modal" class="modal-body-scroll p-3 flex-grow-1">
                <div class="row g-2">
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="CustomerName" class="fw-bold text-dark mb-1" style="font-size: 13px;">কাস্টমারের নাম <span class="text-danger">*</span></label>
                            <input type="text" placeholder="কাস্টমারের নাম লিখুন..." id="CustomerName" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="CustomerMobile" class="fw-bold text-dark mb-1" style="font-size: 13px;">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <input type="tel" inputmode="tel" maxlength="15" placeholder="০১৭xxxxxxxx" id="CustomerMobile" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, false);}else{this.value=this.value.replace(/[^0-9+০-৯]/g,'');}" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="CustomerEmail" class="fw-bold text-dark mb-1" style="font-size: 13px;">ইমেইল</label>
                            <input type="email" inputmode="email" placeholder="example@domain.com" id="CustomerEmail" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="CustomerNIDNumber" class="fw-bold text-dark mb-1" style="font-size: 13px;">জাতীয় পরিচয়পত্র (NID)</label>
                            <input type="text" inputmode="numeric" placeholder="জাতীয় পরিচয়পত্র নম্বর..." id="CustomerNIDNumber" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, false);}else{this.value=this.value.replace(/[^0-9০-৯]/g,'');}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="PreviousDueAmount" class="fw-bold text-dark mb-1" style="font-size: 13px;">পূর্বের বকেয়া / বাকি</label>
                            <input type="text" inputmode="decimal" placeholder="৳ ০.০০" id="PreviousDueAmount" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, true);}else{this.value=this.value.replace(/[^0-9.০-৯]/g,'');}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="more_address_details" class="fw-bold text-dark mb-1" style="font-size: 13px;">বিস্তারিত ঠিকানা</label>
                            <textarea id="more_address_details" rows="1" placeholder="কাস্টমারের ঠিকানা লিখুন..." class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff; resize: none;"></textarea>
                        </div>
                    </div>

                    <!-- Upload Photo -->
                    <div class="col-12 mb-2">
                        <div class="form-row mb-2">
                            <label class="fw-bold text-dark mb-1" style="font-size: 13px;">কাস্টমার ছবি</label>
                            <div class="d-flex align-items-center gap-3 p-2.5 border rounded-3 bg-light" style="width: 100%; border: 1.5px dashed #cbd5e1 !important;">
                                <div class="bg-white border rounded-3 d-flex align-items-center justify-content-center shadow-xs overflow-hidden position-relative" style="width: 64px; height: 56px; flex-shrink: 0;">
                                    <img id="customerImgPreview" src="" class="d-none w-100 h-100 object-fit-cover" />
                                    <i id="customerImgIcon" class="fa-regular fa-image fa-2x" style="color: #8C56D4 !important;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <input type="file" id="ProductImage" class="form-control form-control-sm" accept="image/*" onchange="previewCustomerCreateImg(event)" style="border-radius: 8px;" />
                                    <small class="text-muted d-block mt-1" style="font-size: 11px;">PNG, JPG বা JPEG (সর্বোচ্চ ২ MB)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Bottom Footer with Equal Side-by-Side Action Buttons -->
            <div class="modal-sticky-footer">
                <div class="actions-btn-group">
                    <button type="button" onclick="closeCustomerCreateModal()" class="btn btn-cancel-red shadow-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="fa-solid fa-xmark"></i>
                        <span>বাতিল</span>
                    </button>
                    <button type="submit" id="saveCustomerBtn" class="btn text-white fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border-radius: 10px; border: none;">
                        <i class="fa-solid fa-check"></i>
                        <span>সেভ করুন</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function openCustomerCreateModal() {
        $('#customerCreateModal').addClass('show').fadeIn(200);
        $('body').css('overflow', 'hidden');
        setTimeout(function() {
            const nameInput = document.getElementById('CustomerName');
            if (nameInput) {
                nameInput.focus();
                nameInput.select();
            }
        }, 150);
    }

    function closeCustomerCreateModal() {
        $('#customerCreateModal').removeClass('show').fadeOut(200);
        $('body').css('overflow', 'auto');
        $('#customerCreateForm')[0].reset();
        $('#customerImgPreview').addClass('d-none').attr('src', '');
        $('#customerImgIcon').removeClass('d-none');
    }

    // Support legacy buttons/triggers
    $(document).on('click', '#openModalBtns, .create-invoice', function() {
        openCustomerCreateModal();
    });

    $(document).on('click', '#customerCreateModal', function(e) {
        if ($(e.target).is('#customerCreateModal')) {
            closeCustomerCreateModal();
        }
    });

    function previewCustomerCreateImg(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#customerImgPreview').attr('src', e.target.result).removeClass('d-none');
                $('#customerImgIcon').addClass('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function CustomerDataSave(event) {
        if (event) event.preventDefault();
        try {
            let CustomerName = document.getElementById('CustomerName').value.trim();
            let CustomerMobile = document.getElementById('CustomerMobile').value.trim();
            let CustomerEmail = document.getElementById('CustomerEmail').value.trim();
            let CustomerNIDNumber = document.getElementById('CustomerNIDNumber').value.trim();
            let PreviousDueAmount = document.getElementById('PreviousDueAmount').value.trim();
            let more_address_details = document.getElementById('more_address_details').value.trim();
            let ProductImageInput = document.getElementById('ProductImage')?.files[0];

            if (CustomerName.length === 0) {
                errorToast("কাস্টমারের নাম প্রদান করা আবশ্যক!");
                return false;
            }
            if (CustomerMobile.length === 0) {
                errorToast("কাস্টমারের মোবাইল নম্বর প্রদান করা আবশ্যক!");
                return false;
            }

            let formData = new FormData();
            formData.append('customer_name', CustomerName);
            formData.append('mobile', CustomerMobile);
            formData.append('email', CustomerEmail);
            formData.append('nid', CustomerNIDNumber);
            formData.append('previous_due_amount', PreviousDueAmount || 0);
            formData.append('address_details', more_address_details);
            if (ProductImageInput) {
                formData.append('img', ProductImageInput);
            }

            showLoader();
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            let res = await axios.post("/api/create-customer", formData, config);
            hideLoader();

            if (res.data['status'] === "success") {
                successToast(res.data['message'] || "কাস্টমার সফলভাবে যুক্ত হয়েছে!");
                closeCustomerCreateModal();
                if (typeof getList === 'function') {
                    getList();
                } else {
                    setTimeout(() => { location.reload(); }, 500);
                }
            } else {
                errorToast(res.data['message'] || "কাস্টমার যোগ করতে সমস্যা হয়েছে।");
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            unauthorized(e.response ? e.response.status : 500);
        }
        return false;
    }
</script>
