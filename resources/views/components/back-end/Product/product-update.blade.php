<style>
    /* Scoped Fix for Product Edit Modal Overlay & Responsive Layout */
    #updateProductModal .modal-dialog,
    #exampleModal .modal-dialog {
        margin: auto !important;
        width: calc(100% - 40px) !important;
        max-width: 860px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        min-height: calc(100dvh - 60px) !important;
    }

    #updateProductModal.modal,
    #updateProductModal {
        z-index: 107000 !important;
    }

    #updateProductModal .modal-content,
    #exampleModal .modal-content {
        width: 100% !important;
        max-height: calc(100dvh - 60px) !important;
        border-radius: 16px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
        background: #ffffff !important;
        padding: 0 !important;
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
        box-sizing: border-box !important;
    }

    #updateProductModal .modal-header,
    #exampleModal .modal-header {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        padding: 14px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        flex-shrink: 0;
    }

    #updateProductModal .btn-close-custom,
    #exampleModal .btn-close-custom {
        background: #ef4444 !important;
        border: none;
        color: #ffffff;
        font-size: 16px;
        cursor: pointer;
        opacity: 1;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
    }
    #updateProductModal .btn-close-custom:hover,
    #exampleModal .btn-close-custom:hover {
        background: #dc2626 !important;
        transform: rotate(90deg) scale(1.05);
    }

    #updateProductModal .modal-body,
    #exampleModal .modal-body {
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
        flex: 1 1 auto;
        min-height: 0;
        padding: 20px;
        background: #ffffff;
    }

    #updateProductModal .form-control,
    #updateProductModal .form-select,
    #exampleModal .form-control,
    #exampleModal .form-select {
        height: 42px !important;
        border-radius: 10px !important;
        font-size: 14px !important;
        border: 1.5px solid #cbd5e1 !important;
        background: #ffffff !important;
        color: #1e293b !important;
        transition: all 0.2s ease-in-out !important;
    }
    #updateProductModal .form-control:focus,
    #updateProductModal .form-select:focus,
    #exampleModal .form-control:focus,
    #exampleModal .form-select:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.2) !important;
        background: #ffffff !important;
        outline: none !important;
    }

    /* Sticky Footer - Edge-to-Edge with Modal, Zero Outer Gap, Buttons 1 Row Side-by-Side */
    #updateProductModal .update-modal-footer,
    #exampleModal .update-modal-footer {
        position: sticky;
        bottom: 0;
        background: #ffffff;
        border-top: 1px solid #e2e8f0;
        padding: 12px 20px !important;
        margin: 0 !important;
        width: 100% !important;
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 12px !important;
        flex-shrink: 0;
        z-index: 10;
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
        box-sizing: border-box !important;
    }

    #updateProductModal .update-modal-footer .btn,
    #exampleModal .update-modal-footer .btn {
        flex: 1 1 50% !important;
        width: 50% !important;
        min-width: 0 !important;
        height: 44px !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        border-radius: 10px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 6px !important;
        margin: 0 !important;
        white-space: nowrap !important;
    }

    #updateProductModal .update-modal-footer .btn-cancel,
    #exampleModal .update-modal-footer .btn-cancel {
        background-color: #ef4444 !important;
        border: none !important;
        color: #ffffff !important;
    }
    #updateProductModal .update-modal-footer .btn-cancel:hover,
    #exampleModal .update-modal-footer .btn-cancel:hover {
        background-color: #dc2626 !important;
    }

    #updateProductModal .update-modal-footer .btn-save,
    #exampleModal .update-modal-footer .btn-save,
    #updateProductModal .update-modal-footer .btn-update,
    #exampleModal .update-modal-footer .btn-update {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        border: none !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25) !important;
    }
    #updateProductModal .update-modal-footer .btn-save:hover,
    #exampleModal .update-modal-footer .btn-save:hover,
    #updateProductModal .update-modal-footer .btn-update:hover,
    #exampleModal .update-modal-footer .btn-update:hover {
        opacity: 0.95;
    }

    #updateProductModal .form-field-group,
    #exampleModal .form-field-group {
        display: flex !important;
        flex-direction: column !important;
        width: 100% !important;
    }

    /* Mobile View (< 768px): Symmetrical 16px margin at Top & Bottom */
    @media screen and (max-width: 767.98px) {
        #updateProductModal.modal,
        #updateProductModal,
        #exampleModal.modal,
        #exampleModal {
            padding: 16px 12px !important;
            box-sizing: border-box !important;
        }
        #updateProductModal.modal .modal-dialog,
        #updateProductModal .modal-dialog,
        #exampleModal.modal .modal-dialog,
        #exampleModal .modal-dialog {
            width: 100% !important;
            max-width: 100% !important;
            margin: 16px auto !important;
            margin-top: 16px !important;
            margin-bottom: 16px !important;
            min-height: auto !important;
            align-items: flex-start !important;
        }
        #updateProductModal.modal .modal-dialog::before,
        #updateProductModal .modal-dialog::before,
        #exampleModal.modal .modal-dialog::before,
        #exampleModal .modal-dialog::before {
            display: none !important;
            height: 0 !important;
            content: none !important;
        }
        #updateProductModal.modal .modal-content,
        #updateProductModal .modal-content,
        #exampleModal.modal .modal-content,
        #exampleModal .modal-content {
            max-height: calc(100dvh - 32px) !important;
            border-radius: 16px !important;
        }

        /* Keyboard Open State */
        #updateProductModal.modal.keyboard-open,
        #updateProductModal.keyboard-open,
        #exampleModal.modal.keyboard-open,
        #exampleModal.keyboard-open {
            padding-top: 72px !important;
            padding-bottom: 16px !important;
        }
        #updateProductModal.keyboard-open .modal-dialog,
        #exampleModal.keyboard-open .modal-dialog {
            margin-top: 0 !important;
            margin-bottom: 16px !important;
            align-items: flex-start !important;
            min-height: calc(100dvh - 88px) !important;
        }
        #updateProductModal.keyboard-open .modal-content,
        #exampleModal.keyboard-open .modal-content {
            max-height: calc(100dvh - 88px) !important;
        }

        #updateProductModal .update-modal-footer,
        #exampleModal .update-modal-footer {
            padding: 12px 16px !important;
            gap: 10px !important;
        }
    }

    /* Dark Mode Support */
    body[light-mode="dark"] #updateProductModal .modal-content,
    body[data-layout-mode="dark"] #updateProductModal .modal-content,
    body.dark-mode #updateProductModal .modal-content,
    body[light-mode="dark"] #exampleModal .modal-content,
    body[data-layout-mode="dark"] #exampleModal .modal-content,
    body.dark-mode #exampleModal .modal-content {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #updateProductModal .modal-body,
    body[data-layout-mode="dark"] #updateProductModal .modal-body,
    body.dark-mode #updateProductModal .modal-body,
    body[light-mode="dark"] #exampleModal .modal-body,
    body[data-layout-mode="dark"] #exampleModal .modal-body,
    body.dark-mode #exampleModal .modal-body {
        background-color: #1e293b !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #updateProductModal .update-modal-footer,
    body[data-layout-mode="dark"] #updateProductModal .update-modal-footer,
    body.dark-mode #updateProductModal .update-modal-footer,
    body[light-mode="dark"] #exampleModal .update-modal-footer,
    body[data-layout-mode="dark"] #exampleModal .update-modal-footer,
    body.dark-mode #exampleModal .update-modal-footer {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #updateProductModal .form-control,
    body[data-layout-mode="dark"] #updateProductModal .form-control,
    body.dark-mode #updateProductModal .form-control,
    body[light-mode="dark"] #updateProductModal .form-select,
    body[data-layout-mode="dark"] #updateProductModal .form-select,
    body.dark-mode #updateProductModal .form-select,
    body[light-mode="dark"] #exampleModal .form-control,
    body[data-layout-mode="dark"] #exampleModal .form-control,
    body.dark-mode #exampleModal .form-control,
    body[light-mode="dark"] #exampleModal .form-select,
    body[data-layout-mode="dark"] #exampleModal .form-select,
    body.dark-mode #exampleModal .form-select {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #updateProductModal label,
    body[data-layout-mode="dark"] #updateProductModal label,
    body.dark-mode #updateProductModal label,
    body[light-mode="dark"] #exampleModal label,
    body[data-layout-mode="dark"] #exampleModal label,
    body.dark-mode #exampleModal label {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #updateProductModal .upload-profile,
    body[data-layout-mode="dark"] #updateProductModal .upload-profile,
    body.dark-mode #updateProductModal .upload-profile,
    body[light-mode="dark"] #exampleModal .upload-profile,
    body[data-layout-mode="dark"] #exampleModal .upload-profile,
    body.dark-mode #exampleModal .upload-profile {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #updateProductModal #updateProductImgPreviewBox,
    body[data-layout-mode="dark"] #updateProductModal #updateProductImgPreviewBox,
    body.dark-mode #updateProductModal #updateProductImgPreviewBox,
    body[light-mode="dark"] #exampleModal #updateProductImgPreviewBox,
    body[data-layout-mode="dark"] #exampleModal #updateProductImgPreviewBox,
    body.dark-mode #exampleModal #updateProductImgPreviewBox {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
</style>

<!-- Action Button Edit Modal Start -->
<section class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Sleek Purple Header with Close Icon -->
            <div class="modal-header d-flex align-items-center justify-content-between">
                <h5 class="modal-title fw-bold text-white d-flex align-items-center gap-2 m-0" id="updateProductModalLabel" style="font-size: 16px;">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>প্রোডাক্ট এডিট করুন</span>
                </h5>
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form id="updateProductForm" onsubmit="Update(event)" style="display: flex; flex-direction: column; flex: 1 1 auto; min-height: 0; margin: 0;">
                <input type="hidden" id="updateID">

                <!-- Hidden Selects -->
                <div class="d-none">
                    <select id="UpdateProductBrand"><option value="">Select Brand</option></select>
                    <select id="UpdateProductCategory"><option value="">Select Category</option></select>
                    <select id="UpdateProductStatus"><option value="Active" selected>Active</option><option value="InActive">Inactive</option></select>
                </div>

                <div class="modal-body">
                    <!-- Clean 2-Column Fields -->
                    <div class="row g-3">
                        <!-- Col 1: পণ্য নাম -->
                        <div class="col-md-6 col-12">
                            <div class="form-field-group">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <label for="UpdateProductName" class="fw-bold text-dark m-0" style="font-size: 13.5px;">পণ্য নাম <span class="text-danger">*</span></label>
                                    <button type="button" id="translateUpdateBtn" onclick="translateUpdateProductName()" class="btn btn-sm text-white d-inline-flex align-items-center gap-1 shadow-xs" style="background-color: #15803d; font-size: 11.5px; font-weight: 600; padding: 3px 8px; border-radius: 6px; border: none; cursor: pointer;">
                                        <i class="fa-solid fa-language"></i>
                                        <span>বাংলায় রূপান্তর</span>
                                    </button>
                                </div>
                                <input type="text" id="UpdateProductName" class="form-control fw-bold" placeholder="পণ্যের নাম লিখুন..." required />
                            </div>
                        </div>

                        <!-- Col 2: বারকোড ও স্ক্যান -->
                        <div class="col-md-6 col-12">
                            <div class="form-field-group">
                                <label for="ProductBarCodeInput" class="fw-bold text-dark mb-1" style="font-size: 13.5px;">বারকোড</label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="text" id="ProductBarCodeInput" class="form-control fw-bold" placeholder="বারকোড লিখুন বা স্ক্যান করুন..." />
                                    <button type="button" class="btn btn-primary fw-bold text-nowrap d-flex align-items-center gap-1 px-3 shadow-xs" onclick="openProductUpdateCameraScanner()" style="height: 42px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; font-size: 13px; color: #ffffff;">
                                        <i class="fa-solid fa-camera"></i>
                                        <span>স্ক্যান</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Col 3: পরিমাণ -->
                        <div class="col-md-6 col-12">
                            <div class="form-field-group">
                                <label for="UpdateProductQuantity" class="fw-bold text-dark mb-1" style="font-size: 13.5px;">পরিমাণ</label>
                                <input type="text" inputmode="decimal" id="UpdateProductQuantity" class="form-control fw-bold" placeholder="০" />
                            </div>
                        </div>

                        <!-- Col 4: ক্রয় মূল্য -->
                        <div class="col-md-6 col-12">
                            <div class="form-field-group">
                                <label for="UpdateProductCostPrice" class="fw-bold text-dark mb-1" style="font-size: 13.5px;">ক্রয় মূল্য</label>
                                <input type="text" inputmode="decimal" id="UpdateProductCostPrice" class="form-control fw-bold" placeholder="০.০০" />
                            </div>
                        </div>

                        <!-- Col 5: বিক্রয় মূল্য -->
                        <div class="col-md-6 col-12">
                            <div class="form-field-group">
                                <label for="UpdateProductSellingPrice" class="fw-bold text-dark mb-1" style="font-size: 13.5px;">বিক্রয় মূল্য</label>
                                <input type="text" inputmode="decimal" id="UpdateProductSellingPrice" class="form-control fw-bold" placeholder="০.০০" />
                            </div>
                        </div>

                        <!-- Col 6: প্রোডাক্ট ছবি (Live Preview in left box + purple upload button) -->
                        <div class="col-md-6 col-12">
                            <div class="form-field-group">
                                <label class="fw-bold text-dark mb-1" style="font-size: 13.5px;">প্রোডাক্ট ছবি</label>
                                <div class="upload-profile p-2.5 border rounded-3 bg-light d-flex align-items-center gap-3">
                                    <div id="updateProductImgPreviewBox" class="img-box bg-white border rounded-3 d-flex align-items-center justify-content-center overflow-hidden flex-shrink-0 shadow-xs" style="width: 65px; height: 56px;">
                                        <img id="UpdateShowImage" src="{{ asset('back-end/assets/img/product-img.svg') }}" class="img-box-preview" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <div class="position-relative flex-grow-1">
                                        <label for="UpdateProductImage" class="d-flex align-items-center justify-content-center gap-2 w-100 m-0 py-2 px-3 rounded-2 fw-semibold shadow-xs" style="cursor: pointer; background: #F3ECFB; color: #8C56D4; border: 1.5px dashed #8C56D4; font-size: 13px;">
                                            <i class="fa-solid fa-cloud-arrow-up fs-6" style="color: #8C56D4;"></i>
                                            <span id="updateProductUploadText">ছবি পরিবর্তন করুন</span>
                                        </label>
                                        <input type="file" id="UpdateProductImage" class="d-none" accept="image/*" />
                                        <p class="mb-0 mt-1 small text-muted text-center" style="font-size: 11px;">PNG, JPEG বা GIF (সর্বোচ্চ ১ MB)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sticky Footer Actions: Edge-to-Edge, Red Cancel & Purple Update side-by-side in 1 row -->
                <div class="modal-footer update-modal-footer">
                    <button type="button" class="btn btn-cancel shadow-sm" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i> <span>বাতিল</span>
                    </button>
                    <button type="submit" class="btn btn-save shadow-sm">
                        <i class="fa-solid fa-check"></i> <span>আপডেট করুন</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Action Button Edit Modal End -->

<script>
    let isFormLoading = false;

    if (typeof window.setupModalKeyboardDetection !== 'function') {
        window.setupModalKeyboardDetection = function(modalId) {
            const $modal = $(modalId);
            $modal.off('focus', 'input, textarea, select').on('focus', 'input, textarea, select', function() {
                if (window.innerWidth <= 991.98) {
                    $modal.addClass('keyboard-open');
                }
            });
            $modal.off('blur', 'input, textarea, select').on('blur', 'input, textarea, select', function() {
                setTimeout(() => {
                    if (!$modal.find('input:focus, textarea:focus, select:focus').length) {
                        $modal.removeClass('keyboard-open');
                    }
                }, 150);
            });
            if (window.visualViewport) {
                window.visualViewport.addEventListener('resize', () => {
                    if (window.innerWidth <= 991.98 && $modal.is(':visible')) {
                        const isKeyboard = window.visualViewport.height < window.innerHeight * 0.75;
                        if (isKeyboard) {
                            $modal.addClass('keyboard-open');
                        } else if (!$modal.find('input:focus, textarea:focus, select:focus').length) {
                            $modal.removeClass('keyboard-open');
                        }
                    }
                });
            }
        };
    }

    $(document).ready(function() {
        // Image preview listener
        $('#UpdateProductImage').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#UpdateShowImage').attr('src', e.target.result);
                    $('#updateProductUploadText').text(file.name.length > 15 ? file.name.substring(0, 15) + '...' : file.name);
                };
                reader.readAsDataURL(file);
            } else {
                $('#updateProductUploadText').text('ছবি পরিবর্তন করুন');
            }
        });

        // Modal hidden listener to reset form
        $('#exampleModal, #updateProductModal').on('hidden.bs.modal', function () {
            $('#updateProductForm')[0].reset();
            $('#updateID').val('');
            $('#UpdateShowImage').attr('src', "{{ asset('back-end/assets/img/product-img.svg') }}");
            $('#updateProductUploadText').text('ছবি পরিবর্তন করুন');
            $('#exampleModal, #updateProductModal').removeClass('keyboard-open');
        });

        // Modal show listener
        $('#exampleModal, #updateProductModal').on('show.bs.modal', function (event) {
            setupModalKeyboardDetection('#exampleModal');
            setupModalKeyboardDetection('#updateProductModal');
            const button = event.relatedTarget;
            if (button) {
                const id = $(button).attr('data-id') || $(button).data('id') || $(button).closest('[data-id]').attr('data-id');
                if (id) {
                    FillUpProductUpdateForm(id);
                }
            }
        });
    });

    // Helper functions to load dropdown options
    async function ProductCategoryShow() {
        try {
            const res = await axios.get("/api/category-list", HeaderToken());
            if (res.status === 200 && res.data.CategoryData) {
                const optionsHtml = res.data.CategoryData.map(Category =>
                    `<option value="${Category.id}">${Category.category_name}</option>`
                ).join('');
                $('#UpdateProductCategory').html(`<option value="">Select Category</option>` + optionsHtml);
            }
        } catch (error) {
            console.error("Category Load Error:", error);
        }
    }

    async function ProductBrandShow() {
        try {
            const res = await axios.get("/api/brand-list", HeaderToken());
            if (res.status === 200 && res.data.BrandData) {
                const optionsHtml = res.data.BrandData.map(Brand =>
                    `<option value="${Brand.id}">${Brand.name}</option>`
                ).join('');
                $('#UpdateProductBrand').html(`<option value="">Select Brand</option>` + optionsHtml);
            }
        } catch (error) {
            console.error("Brand Load Error:", error);
        }
    }

    async function translateUpdateProductName() {
        const nameInput = document.getElementById('UpdateProductName');
        const text = nameInput ? nameInput.value.trim() : '';

        if (!text) {
            errorToast("অনুগ্রহ করে প্রথমে প্রোডাক্টের নাম লিখুন!");
            return;
        }

        const translateBtn = document.getElementById('translateUpdateBtn');
        const originalContent = translateBtn ? translateBtn.innerHTML : '';
        if (translateBtn) {
            translateBtn.disabled = true;
            translateBtn.innerHTML = `<span>অনুবাদ হচ্ছে...</span>`;
        }

        try {
            const url = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=bn&dt=t&q=${encodeURIComponent(text)}`;
            const res = await axios.get(url);

            if (res.data && res.data[0] && Array.isArray(res.data[0])) {
                const translatedText = res.data[0].map(item => item[0]).filter(Boolean).join('');
                if (translatedText) {
                    nameInput.value = translatedText;
                    successToast("বাংলায় রূপান্তর সফল হয়েছে!");
                } else {
                    errorToast("অনুবাদ ব্যর্থ হয়েছে। আবার চেষ্টা করুন।");
                }
            } else {
                errorToast("অনুবাদ ব্যর্থ হয়েছে।");
            }
        } catch (err) {
            console.error("Translation error:", err);
            errorToast("অনুবাদ করতে সমস্যা হয়েছে। ইন্টারনেট সংযোগ পরীক্ষা করুন।");
        } finally {
            if (translateBtn) {
                translateBtn.disabled = false;
                translateBtn.innerHTML = originalContent;
            }
        }
    }

    // Main Edit Form Population Function
    async function FillUpProductUpdateForm(id) {
        if (!id || isFormLoading) return;
        isFormLoading = true;

        try {
            document.getElementById('updateID').value = id;

            // Load dropdowns first if needed
            if (typeof ProductBrandShow === 'function' && typeof ProductCategoryShow === 'function') {
                await Promise.all([ProductBrandShow(), ProductCategoryShow()]);
            }

            // Find data in window cache or call API
            let data = null;
            if (window.allProductsList && Array.isArray(window.allProductsList)) {
                data = window.allProductsList.find(p => String(p.id) === String(id));
            }
            if (!data && typeof allProducts !== 'undefined' && Array.isArray(allProducts)) {
                data = allProducts.find(p => String(p.id) === String(id));
            }

            if (!data) {
                if (typeof showLoader === 'function') showLoader();
                let res = await axios.post("/api/product-by-id", { id: String(id) }, HeaderToken());
                if (typeof hideLoader === 'function') hideLoader();
                data = res.data.rows || res.data.product || res.data;
            }

            if (!data) {
                isFormLoading = false;
                return errorToast("Product data not found!");
            }

            // Fill form fields with Bangla numbers
            $('#UpdateProductName').val(data.product_name || '');
            
            let qtyVal = (data.quantity !== undefined && data.quantity !== null) ? engToBanglaNum(data.quantity) : '';
            let costVal = (data.cost_price !== undefined && data.cost_price !== null) ? engToBanglaNum(parseFloat(data.cost_price).toString()) : '';
            let sellVal = (data.sell_price !== undefined && data.sell_price !== null) ? engToBanglaNum(parseFloat(data.sell_price).toString()) : '';

            $('#UpdateProductQuantity').val(qtyVal);
            $('#UpdateProductCostPrice').val(costVal);
            $('#UpdateProductSellingPrice').val(sellVal);
            $('#UpdateProductStatus').val(data.status || 'Active');

            // Image preview
            const defaultImg = "{{ asset('back-end/assets/img/product-img.svg') }}";
            let imgUrl = defaultImg;
            if (data.img_url) {
                imgUrl = data.img_url.startsWith('http') ? data.img_url : '/' + data.img_url.replace(/^\/+/, '');
            }
            $('#UpdateShowImage').attr('src', imgUrl);

            // Barcode value directly into input with Bangla numbers
            let barcodeVal = '';
            if (typeof data.product_code === 'string') {
                try {
                    let parsed = JSON.parse(data.product_code);
                    if (Array.isArray(parsed)) {
                        barcodeVal = parsed.map(b => engToBanglaNum(b)).join(', ');
                    } else if (parsed) {
                        barcodeVal = engToBanglaNum(parsed);
                    }
                } catch (e) {
                    barcodeVal = engToBanglaNum(data.product_code);
                }
            } else if (Array.isArray(data.product_code)) {
                barcodeVal = data.product_code.map(b => engToBanglaNum(b)).join(', ');
            } else if (data.product_code) {
                barcodeVal = engToBanglaNum(data.product_code);
            }
            $('#ProductBarCodeInput').val(barcodeVal);

            // Select Brand & Category
            if (data.brand_id) {
                $('#UpdateProductBrand').val(String(data.brand_id));
            }
            if (data.category_id) {
                $('#UpdateProductCategory').val(String(data.category_id));
            }

        } catch (e) {
            if (typeof hideLoader === 'function') hideLoader();
            console.error("FillUpProductUpdateForm Error:", e);
            errorToast("Error loading product data!");
        } finally {
            isFormLoading = false;
        }
    }
    window.FillUpProductUpdateForm = FillUpProductUpdateForm;
    window.FillUpUpdateForm = FillUpProductUpdateForm;

    async function openProductUpdateModal(productId) {
        const modalEl = document.getElementById('updateProductModal') || document.getElementById('exampleModal');
        if (modalEl) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                let modalObj = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modalObj.show();
            } else if (typeof $ !== 'undefined') {
                $(modalEl).modal('show');
            } else {
                modalEl.style.display = 'block';
            }
            await FillUpProductUpdateForm(productId);
        }
    }
    window.openProductUpdateModal = openProductUpdateModal;

    // Submit Update
    async function Update(e) {
        if(e) e.preventDefault();
        try {
            const id = $('#updateID').val();
            if (!id) return errorToast("Product ID missing!");

            const categoryId = $('#UpdateProductCategory').val();
            const brandId = $('#UpdateProductBrand').val();
            const status = $('#UpdateProductStatus').val() || 'Active';

            const productName = $('#UpdateProductName').val().trim();
            if(!productName) return errorToast("Product Name is required!");

            const rawQty = $('#UpdateProductQuantity').val();
            const quantity = (rawQty !== "" && rawQty !== null && typeof parseBanglaFloat === 'function') ? parseBanglaFloat(rawQty, 0) : (parseFloat(rawQty) || 0);

            const rawCost = $('#UpdateProductCostPrice').val();
            const costPrice = (rawCost !== "" && rawCost !== null && typeof parseBanglaFloat === 'function') ? parseBanglaFloat(rawCost, 0) : (parseFloat(rawCost) || 0);

            const rawSell = $('#UpdateProductSellingPrice').val();
            const sellPrice = (rawSell !== "" && rawSell !== null && typeof parseBanglaFloat === 'function') ? parseBanglaFloat(rawSell, 0) : (parseFloat(rawSell) || 0);

            // Barcode input value directly
            const rawBarcode = $('#ProductBarCodeInput').val().trim();
            const barcodeArr = rawBarcode ? rawBarcode.split(',').map(s => s.trim()).filter(Boolean) : [];

            let formData = new FormData();
            formData.append('id', id);
            formData.append('product_name', productName);
            formData.append('quantity', quantity);
            formData.append('cost_price', costPrice);
            formData.append('sell_price', sellPrice);
            formData.append('status', status);
            formData.append('product_code', JSON.stringify(barcodeArr));

            if (brandId && brandId !== "none") formData.append('brand_id', brandId);
            if (categoryId && categoryId !== "none") formData.append('category_id', categoryId);

            const imageInput = document.getElementById('UpdateProductImage');
            if (imageInput && imageInput.files && imageInput.files[0]) {
                formData.append('img_url', imageInput.files[0]);
            }

            const config = { headers: { 'content-type': 'multipart/form-data', ...HeaderToken().headers } };

            if (typeof showLoader === 'function') showLoader();
            let res = await axios.post("/api/update-product", formData, config);
            if (typeof hideLoader === 'function') hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message || "🎉 প্রোডাক্ট আপডেট করা হয়েছে!");

                if (typeof $ !== 'undefined') {
                    $('#updateProductModal').modal('hide');
                    $('#exampleModal').modal('hide');
                }
                const modalEl = document.getElementById('updateProductModal');
                if (modalEl) modalEl.style.display = 'none';

                if (typeof refreshMobilePurchaseProducts === 'function') {
                    const updatedProd = res.data.product || {
                        id: id,
                        product_name: productName,
                        quantity: quantity,
                        cost_price: costPrice,
                        sell_price: sellPrice,
                        status: status,
                        product_code: JSON.stringify(barcodeArr)
                    };
                    refreshMobilePurchaseProducts(updatedProd);
                }

                if (typeof getList === 'function' && window.location.pathname.includes('product')) {
                    await getList();
                }
            } else {
                errorToast(res.data.message || "Update failed");
            }
        } catch (e) {
            if (typeof hideLoader === 'function') hideLoader();
            console.error("Update Error:", e);
            errorToast(e.response && e.response.data && e.response.data.message ? e.response.data.message : "Something went wrong!");
        }
    }
</script>

<!-- Update Product Camera Barcode Scanner Modal -->
<div class="modal fade" id="productUpdateCameraScanModal" tabindex="-1" aria-labelledby="productUpdateCameraScanModalLabel" aria-hidden="true" data-bs-backdrop="static" style="z-index: 999999 !important;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 18px; overflow: hidden;">
            <div class="modal-header text-white py-3" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);">
                <h5 class="modal-title fw-bold" id="productUpdateCameraScanModalLabel">
                    <i class="fa-solid fa-camera me-2"></i> বারকোড ক্যামেরা স্ক্যানার (Edit)
                </h5>
                <button type="button" class="btn-close btn-close-white" onclick="stopProductUpdateCameraScanner()"></button>
            </div>
            <div class="modal-body p-3 text-center">
                <div id="productUpdateCameraScannerStatus" class="alert alert-info py-2 small mb-3" style="border-radius: 10px;">
                    <i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে রাখুন।
                </div>

                <!-- Reader Viewport -->
                <div id="product-update-reader" style="width: 100%; min-height: 270px; background: #000; border-radius: 14px; overflow: hidden;" class="shadow-sm"></div>

                <div class="d-flex align-items-center justify-content-between mt-3 px-1">
                    <span id="productUpdateLastScannedText" class="badge bg-success fs-6 py-2 px-3" style="border-radius: 10px;">স্ক্যান কৃত কোড: -</span>
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="switchProductUpdateCamera()">
                        <i class="fa-solid fa-rotate me-1"></i> ক্যামেরা পাল্টান
                    </button>
                </div>
            </div>
            <div class="modal-footer bg-light py-2 justify-content-between">
                <small class="text-muted"><i class="fa-solid fa-bolt text-warning me-1"></i> বারকোড স্ক্যান করলেই ইনপুটে বসে যাবে</small>
                <button type="button" class="btn btn-secondary px-4 fw-bold rounded-pill" onclick="stopProductUpdateCameraScanner()">বন্ধ করুন</button>
            </div>
        </div>
    </div>
</div>

<script>
    let productUpdateHtml5QrCode = null;
    let productUpdateFacingMode = "environment";
    let productUpdateLastCode = "";

    function openProductUpdateCameraScanner() {
        const modalEl = document.getElementById('productUpdateCameraScanModal');
        const modalObj = new bootstrap.Modal(modalEl);
        modalObj.show();
        setTimeout(() => {
            modalEl.style.zIndex = "999999";
            const backdrops = document.querySelectorAll('.modal-backdrop');
            if (backdrops.length > 0) {
                backdrops[backdrops.length - 1].style.zIndex = "999990";
            }
            startProductUpdateCameraScanner();
        }, 300);
    }

    function startProductUpdateCameraScanner() {
        if (productUpdateHtml5QrCode && productUpdateHtml5QrCode.isScanning) {
            productUpdateHtml5QrCode.stop().then(() => initProductUpdateHtml5QrCode()).catch(() => initProductUpdateHtml5QrCode());
        } else {
            initProductUpdateHtml5QrCode();
        }
    }

    function initProductUpdateHtml5QrCode() {
        const statusEl = document.getElementById("productUpdateCameraScannerStatus");
        if (statusEl) {
            statusEl.className = "alert alert-info py-2 small mb-3";
            statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা চালু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।';
        }

        if (!productUpdateHtml5QrCode) {
            productUpdateHtml5QrCode = new Html5Qrcode("product-update-reader");
        }

        const config = { fps: 15, qrbox: { width: 260, height: 160 }, aspectRatio: 1.333334 };

        productUpdateHtml5QrCode.start(
            { facingMode: productUpdateFacingMode },
            config,
            onProductUpdateBarcodeDetected,
            onProductUpdateBarcodeError
        ).then(() => {
            if (statusEl) {
                statusEl.className = "alert alert-success py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-video me-1"></i> ক্যামেরা সক্রিয়! বারকোড স্ক্যান করলে সরাসরি ইনপুটে যুক্ত হবে।';
            }
        }).catch(err => {
            console.error("Camera start error:", err);
            if (statusEl) {
                statusEl.className = "alert alert-danger py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> ক্যামেরা চালু করা যায়নি! ব্রাউজারের ক্যামেরা পারমিশন এলাউ (Allow) করুন।';
            }
        });
    }

    function onProductUpdateBarcodeDetected(decodedText) {
        if (!decodedText || decodedText === productUpdateLastCode) return;

        productUpdateLastCode = decodedText;
        const lastTextEl = document.getElementById("productUpdateLastScannedText");
        if (lastTextEl) lastTextEl.innerText = `স্ক্যান কৃত: ${decodedText}`;

        if (navigator.vibrate) navigator.vibrate(100);

        // Fill barcode into ProductBarCodeInput
        const input = document.getElementById("ProductBarCodeInput");
        if (input) {
            input.value = decodedText;
        }

        stopProductUpdateCameraScanner();
    }

    function onProductUpdateBarcodeError(msg) {}

    function switchProductUpdateCamera() {
        productUpdateFacingMode = (productUpdateFacingMode === "environment") ? "user" : "environment";
        startProductUpdateCameraScanner();
    }

    function stopProductUpdateCameraScanner() {
        if (productUpdateHtml5QrCode && productUpdateHtml5QrCode.isScanning) {
            productUpdateHtml5QrCode.stop().then(() => {
                productUpdateHtml5QrCode.clear();
                hideProductUpdateCameraModal();
            }).catch(() => {
                hideProductUpdateCameraModal();
            });
        } else {
            hideProductUpdateCameraModal();
        }
    }

    function hideProductUpdateCameraModal() {
        const modalEl = document.getElementById('productUpdateCameraScanModal');
        const instance = bootstrap.Modal.getInstance(modalEl);
        if (instance) instance.hide();
    }

    // Restore body scroll whenever product update modal is closed
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof $ !== 'undefined') {
            $('#exampleModal').on('hidden.bs.modal', function () {
                if (typeof cleanUpProductModalScrollLock === 'function') {
                    cleanUpProductModalScrollLock();
                } else {
                    setTimeout(() => {
                        if (!$('.modal.show').length && !document.querySelector('.modal.show')) {
                            $('body').removeClass('modal-open').css({ 'overflow': '', 'padding-right': '' });
                            document.body.classList.remove('modal-open');
                            document.body.style.overflow = '';
                            document.body.style.paddingRight = '';
                            $('.modal-backdrop').remove();
                        }
                    }, 120);
                }
            });
        }
        const exampleModalEl = document.getElementById('exampleModal');
        if (exampleModalEl) {
            exampleModalEl.addEventListener('hidden.bs.modal', function () {
                if (typeof cleanUpProductModalScrollLock === 'function') {
                    cleanUpProductModalScrollLock();
                } else {
                    setTimeout(() => {
                        if (!$('.modal.show').length && !document.querySelector('.modal.show')) {
                            $('body').removeClass('modal-open').css({ 'overflow': '', 'padding-right': '' });
                            document.body.classList.remove('modal-open');
                            document.body.style.overflow = '';
                            document.body.style.paddingRight = '';
                            $('.modal-backdrop').remove();
                        }
                    }, 120);
                }
            });
        }
    });
</script>