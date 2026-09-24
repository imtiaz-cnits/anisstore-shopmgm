<style>
    /* Scoped Fix for Customer Update Modal Overlay & Mobile View Responsiveness */
    #customerUpdateModal,
    #exampleModal {
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

    #customerUpdateModal.show,
    #customerUpdateModal.show-modal,
    #exampleModal.show,
    #exampleModal.show-modal {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    #customerUpdateModal .newbrand-content,
    #exampleModal .newbrand-content {
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

    #customerUpdateModal .modal-header-purple,
    #exampleModal .modal-header-purple {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 14px 18px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        color: #ffffff !important;
        border-bottom: 1px solid #E5D5F7 !important;
    }

    #customerUpdateModal .btn-close-red,
    #exampleModal .btn-close-red {
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
    #customerUpdateModal .btn-close-red:hover,
    #exampleModal .btn-close-red:hover {
        background: #dc2626 !important;
        transform: rotate(90deg) scale(1.05);
    }

    #customerUpdateModal .btn-cancel-red,
    #exampleModal .btn-cancel-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border: 1px solid #dc2626 !important;
        border-radius: 10px !important;
        font-weight: 700 !important;
        transition: all 0.2s ease !important;
    }
    #customerUpdateModal .btn-cancel-red:hover,
    #exampleModal .btn-cancel-red:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
    }

    #customerUpdateModal .form-control:focus,
    #customerUpdateModal input:focus,
    #customerUpdateModal textarea:focus,
    #exampleModal .form-control:focus,
    #exampleModal input:focus,
    #exampleModal textarea:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
        background: #ffffff !important;
    }

    body[light-mode="dark"] #customerUpdateModal .newbrand-content,
    html[light-mode="dark"] #customerUpdateModal .newbrand-content,
    body[light-mode="dark"] #exampleModal .newbrand-content {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    body[light-mode="dark"] #customerUpdateModal .form-control,
    body[light-mode="dark"] #exampleModal .form-control {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    body[light-mode="dark"] #customerUpdateModal label,
    body[light-mode="dark"] #exampleModal label {
        color: #e2e8f0 !important;
    }

    @media screen and (max-width: 991.98px) {
        #customerUpdateModal,
        #exampleModal {
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

        #customerUpdateModal .newbrand-content,
        #exampleModal .newbrand-content {
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
            animation: slideUpCustomerUpdateModal 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        @keyframes slideUpCustomerUpdateModal {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }

        #customerUpdateModal .modal-body-scroll,
        #exampleModal .modal-body-scroll {
            flex: 1 1 auto !important;
            max-height: calc(85vh - 130px) !important;
            max-height: calc(85dvh - 130px) !important;
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch;
            padding: 14px 16px 20px 16px !important;
        }

        #customerUpdateModal .modal-sticky-footer,
        #exampleModal .modal-sticky-footer {
            flex: 0 0 auto !important;
            position: sticky !important;
            bottom: 0 !important;
            background: #ffffff !important;
            z-index: 100 !important;
            border-top: 1px solid #e2e8f0 !important;
            padding: 10px 16px !important;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05) !important;
        }

        #customerUpdateModal .actions-btn-group,
        #exampleModal .actions-btn-group {
            display: flex !important;
            flex-direction: row !important;
            gap: 10px !important;
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        #customerUpdateModal .actions-btn-group button,
        #exampleModal .actions-btn-group button {
            flex: 1 !important;
            width: 50% !important;
            height: 46px !important;
            font-size: 14px !important;
        }
    }

    body[light-mode="dark"] #customerUpdateModal .modal-sticky-footer,
    body[light-mode="dark"] #exampleModal .modal-sticky-footer {
        background: #1e293b !important;
        border-color: #334155 !important;
    }
</style>

<div class="newbrand" id="customerUpdateModal">
    <div class="newbrand-content">
        <!-- Sleek Purple Header with Red Close Button -->
        <div class="modal-header-purple">
            <h5 class="fw-bold m-0 d-flex align-items-center gap-2 text-white" style="font-size: 16.5px;">
                <i class="fa-solid fa-user-pen"></i>
                <span>কাস্টমার তথ্য আপডেট করুন</span>
            </h5>
            <button type="button" onclick="closeCustomerUpdateModal()" class="btn-close-red" title="বন্ধ করুন">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form onsubmit="return Update(event)" id="customerUpdateForm" class="d-flex flex-column flex-grow-1 overflow-hidden m-0">
            <input type="hidden" id="updateID" />

            <div id="popup-modal" class="modal-body-scroll p-3 flex-grow-1">
                <div class="row g-2">
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdateCustomerName" class="fw-bold text-dark mb-1" style="font-size: 13px;">কাস্টমারের নাম <span class="text-danger">*</span></label>
                            <input type="text" placeholder="কাস্টমারের নাম লিখুন..." id="UpdateCustomerName" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdateCustomerNumber" class="fw-bold text-dark mb-1" style="font-size: 13px;">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <input type="tel" inputmode="tel" maxlength="15" placeholder="০১৭xxxxxxxx" id="UpdateCustomerNumber" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, false);}else{this.value=this.value.replace(/[^0-9+০-৯]/g,'');}" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdateCustomerEmail" class="fw-bold text-dark mb-1" style="font-size: 13px;">ইমেইল</label>
                            <input type="email" inputmode="email" placeholder="example@domain.com" id="UpdateCustomerEmail" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdateCustomerNid" class="fw-bold text-dark mb-1" style="font-size: 13px;">জাতীয় পরিচয়পত্র (NID)</label>
                            <input type="text" inputmode="numeric" placeholder="জাতীয় পরিচয়পত্র নম্বর..." id="UpdateCustomerNid" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, false);}else{this.value=this.value.replace(/[^0-9০-৯]/g,'');}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdateCustomerPreviousDueAmount" class="fw-bold text-dark mb-1" style="font-size: 13px;">পূর্বের বকেয়া / বাকি</label>
                            <input type="text" inputmode="decimal" placeholder="৳ ০.০০" id="UpdateCustomerPreviousDueAmount" class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, true);}else{this.value=this.value.replace(/[^0-9.০-৯]/g,'');}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-row mb-2">
                            <label for="UpdateMoreAddress" class="fw-bold text-dark mb-1" style="font-size: 13px;">বিস্তারিত ঠিকানা</label>
                            <textarea id="UpdateMoreAddress" rows="1" placeholder="কাস্টমারের ঠিকানা লিখুন..." class="form-control fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff; resize: none;"></textarea>
                        </div>
                    </div>

                    <!-- Upload Photo -->
                    <div class="col-12 mb-2">
                        <div class="form-row mb-2">
                            <label class="fw-bold text-dark mb-1" style="font-size: 13px;">কাস্টমার ছবি পরিবর্তন করুন</label>
                            <div class="d-flex align-items-center gap-3 p-2.5 border rounded-3 bg-light" style="width: 100%; border: 1.5px dashed #cbd5e1 !important;">
                                <div class="bg-white border rounded-3 d-flex align-items-center justify-content-center shadow-xs overflow-hidden position-relative" style="width: 64px; height: 56px; flex-shrink: 0;">
                                    <img id="customerUpdateImgPreview" src="" class="d-none w-100 h-100 object-fit-cover" />
                                    <i id="customerUpdateImgIcon" class="fa-regular fa-image fa-2x" style="color: #8C56D4 !important;"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <input type="file" id="UpdateCustomerImage" class="form-control form-control-sm" accept="image/*" onchange="previewCustomerUpdateImg(event)" style="border-radius: 8px;" />
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
                    <button type="button" onclick="closeCustomerUpdateModal()" class="btn btn-cancel-red shadow-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="fa-solid fa-xmark"></i>
                        <span>বাতিল</span>
                    </button>
                    <button type="submit" id="updateCustomerBtn" class="btn text-white fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border-radius: 10px; border: none;">
                        <i class="fa-solid fa-check"></i>
                        <span>আপডেট নিশ্চিত করুন</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function openCustomerUpdateModal(id) {
        FillUpCustomerUpdateForm(id);
        $('#customerUpdateModal').addClass('show').fadeIn(200);
        $('body').css('overflow', 'hidden');
        setTimeout(function() {
            const nameInput = document.getElementById('UpdateCustomerName');
            if (nameInput) {
                nameInput.focus();
                nameInput.select();
            }
        }, 150);
    }

    function closeCustomerUpdateModal() {
        $('#customerUpdateModal').removeClass('show').fadeOut(200);
        $('body').css('overflow', 'auto');
        $('#customerUpdateForm')[0].reset();
        $('#customerUpdateImgPreview').addClass('d-none').attr('src', '');
        $('#customerUpdateImgIcon').removeClass('d-none');
    }

    $(document).on('click', '#customerUpdateModal', function(e) {
        if ($(e.target).is('#customerUpdateModal')) {
            closeCustomerUpdateModal();
        }
    });

    function previewCustomerUpdateImg(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#customerUpdateImgPreview').attr('src', e.target.result).removeClass('d-none');
                $('#customerUpdateImgIcon').addClass('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function FillUpCustomerUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();

            let res = await axios.post("/api/customer-by-id", {
                id: id.toString()
            }, HeaderToken());

            hideLoader();

            let data = res.data.rows;
            if (data) {
                document.getElementById('UpdateCustomerName').value = data.customer_name || '';
                document.getElementById('UpdateMoreAddress').value = data.address_details || '';
                document.getElementById('UpdateCustomerNumber').value = data.mobile || '';
                document.getElementById('UpdateCustomerEmail').value = data.email || '';
                document.getElementById('UpdateCustomerNid').value = data.nid || '';
                document.getElementById('UpdateCustomerPreviousDueAmount').value = data.previous_due_amount || 0;

                if (data.img_url) {
                    $('#customerUpdateImgPreview').attr('src', data.img_url).removeClass('d-none');
                    $('#customerUpdateImgIcon').addClass('d-none');
                } else {
                    $('#customerUpdateImgPreview').addClass('d-none').attr('src', '');
                    $('#customerUpdateImgIcon').removeClass('d-none');
                }

                setTimeout(function() {
                    const nameInput = document.getElementById('UpdateCustomerName');
                    if (nameInput) {
                        nameInput.focus();
                        nameInput.select();
                    }
                }, 200);
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            unauthorized(e.response ? e.response.status : 500);
        }
    }

    // Alias for legacy support
    function FillUpUpdateForm(id) {
        openCustomerUpdateModal(id);
    }

    async function Update(event) {
        if (event) event.preventDefault();
        try {
            let CustomerName = $('#UpdateCustomerName').val().trim();
            let CustomerNumber = $('#UpdateCustomerNumber').val().trim();
            let updateID = $('#updateID').val();

            if (CustomerName.length === 0) {
                errorToast("কাস্টমারের নাম প্রদান করা আবশ্যক!");
                return false;
            }
            if (CustomerNumber.length === 0) {
                errorToast("কাস্টমারের মোবাইল নম্বর প্রদান করা আবশ্যক!");
                return false;
            }

            let CustomerEmail = $('#UpdateCustomerEmail').val().trim();
            let CustomerNid = $('#UpdateCustomerNid').val().trim();
            let CustomerPreviousDueAmount = $('#UpdateCustomerPreviousDueAmount').val().trim();
            let MoreAddress = $('#UpdateMoreAddress').val().trim();
            let CustomerImage = $('#UpdateCustomerImage')[0]?.files[0];

            let formData = new FormData();
            formData.append('customer_name', CustomerName);
            formData.append('mobile', CustomerNumber);
            formData.append('email', CustomerEmail);
            formData.append('nid', CustomerNid);
            formData.append('previous_due_amount', CustomerPreviousDueAmount || 0);
            formData.append('address_details', MoreAddress);
            formData.append('id', updateID);

            if (CustomerImage) {
                formData.append('img', CustomerImage);
            }

            showLoader();
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            let res = await axios.post("/api/update-customer", formData, config);
            hideLoader();

            if (res.data['status'] === "success") {
                successToast(res.data['message'] || "কাস্টমার তথ্য সফলভাবে আপডেট হয়েছে!");
                closeCustomerUpdateModal();
                if (typeof getList === 'function') {
                    getList();
                } else {
                    setTimeout(() => { location.reload(); }, 500);
                }
            } else {
                errorToast(res.data['message'] || "আপডেট ব্যর্থ হয়েছে।");
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            unauthorized(e.response ? e.response.status : 500);
        }
        return false;
    }
</script>
