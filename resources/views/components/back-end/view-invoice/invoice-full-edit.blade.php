<style>
    .modal-backdrop {
        z-index: 2000 !important;
    }
    #invoiceFullEditModal {
        z-index: 2010 !important;
    }
    #invoiceFullEditModal.modal {
        overflow: hidden !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    #invoiceFullEditModal .modal-dialog {
        max-width: 900px;
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
    #invoiceFullEditModal .modal-content {
        pointer-events: auto;
        border-radius: 16px;
        border: none;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        height: auto !important;
        max-height: calc(100dvh - 20px) !important;
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
        background: #ffffff;
        width: 100% !important;
    }
    #invoiceFullEditModal form#fullEditInvoiceForm {
        display: flex;
        flex-direction: column;
        flex: 1 1 auto;
        overflow: hidden;
        min-height: 0;
        height: auto;
        max-height: 100%;
        margin: 0;
    }
    #invoiceFullEditModal .modal-header {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        flex-shrink: 0;
        padding: 14px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    }
    #invoiceFullEditModal .modal-title {
        color: #ffffff !important;
        font-size: 16px;
        font-weight: 700;
    }
    #invoiceFullEditModal .btn-close-custom {
        background: transparent;
        border: none;
        color: #ffffff;
        font-size: 18px;
        cursor: pointer;
        opacity: 0.85;
        transition: opacity 0.2s;
    }
    #invoiceFullEditModal .btn-close-custom:hover {
        opacity: 1;
    }
    #invoiceFullEditModal .modal-body {
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch !important;
        flex: 1 1 auto;
        min-height: 0;
        padding: 16px 20px;
        background: #ffffff;
    }
    #invoiceFullEditModal .modal-footer {
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

    /* Mobile & Tablet Modal Geometry: Always Centered with 10px Gap; Topbar Gap when Keyboard Opens */
    @media (max-width: 991.98px) {
        #invoiceFullEditModal .modal-dialog {
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
        #invoiceFullEditModal .modal-content {
            height: auto !important;
            max-height: calc(100dvh - 20px) !important;
            border-radius: 16px !important;
        }

        /* Keyboard open state: pushes modal down by topbar height (72px) */
        #invoiceFullEditModal.keyboard-open .modal-dialog {
            align-items: flex-start !important;
            margin-top: 72px !important;
            margin-bottom: 10px !important;
            min-height: calc(100dvh - 82px) !important;
            max-height: calc(100dvh - 82px) !important;
        }
        #invoiceFullEditModal.keyboard-open .modal-content {
            max-height: calc(100dvh - 82px) !important;
        }
    }

    @media (max-width: 576px) {
        #invoiceFullEditModal .modal-footer {
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            gap: 10px !important;
            padding: 12px 16px !important;
        }
        #invoiceFullEditModal .modal-footer .btn {
            flex: 1 1 50% !important;
            padding: 10px 12px !important;
            font-size: 13px !important;
            white-space: nowrap !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
    }

    /* Mobile Box-Type Card Styles for Product Items */
    .full-edit-mobile-item-box {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        transition: border-color 0.2s ease;
    }
    .full-edit-mobile-item-box:hover {
        border-color: #cbd5e1;
    }

    #invoiceFullEditModal .form-control,
    #invoiceFullEditModal .form-select {
        height: 40px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        font-size: 13.5px;
        padding: 6px 12px;
    }
    #invoiceFullEditModal .qty-input {
        width: 60px;
        text-align: center;
        font-weight: 700;
    }
    #invoiceFullEditModal .table-items th {
        background-color: #f8fafc;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        color: #64748b;
        padding: 8px 10px;
    }
    #invoiceFullEditModal .table-items td {
        padding: 8px 10px;
        vertical-align: middle;
    }
    #fullEditProductSearchResults .dropdown-item {
        padding: 10px 14px;
        cursor: pointer;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.15s ease;
    }
    #fullEditProductSearchResults .dropdown-item:hover {
        background-color: #FAF7FD;
    }

    /* Dark Mode styles */
    body[light-mode="dark"] #invoiceFullEditModal .modal-content,
    html[light-mode="dark"] #invoiceFullEditModal .modal-content {
        background-color: #1e293b !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #invoiceFullEditModal .modal-body,
    html[light-mode="dark"] #invoiceFullEditModal .modal-body,
    body[light-mode="dark"] #invoiceFullEditModal .modal-footer,
    html[light-mode="dark"] #invoiceFullEditModal .modal-footer {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #invoiceFullEditModal .bg-light,
    html[light-mode="dark"] #invoiceFullEditModal .bg-light {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #invoiceFullEditModal input.form-control,
    html[light-mode="dark"] #invoiceFullEditModal input.form-control,
    body[light-mode="dark"] #invoiceFullEditModal select.form-select,
    html[light-mode="dark"] #invoiceFullEditModal select.form-select,
    body[light-mode="dark"] #invoiceFullEditModal textarea.form-control,
    html[light-mode="dark"] #invoiceFullEditModal textarea.form-control {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #invoiceFullEditModal .table-items th {
        background-color: #0f172a !important;
        color: #94a3b8 !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #invoiceFullEditModal .table-items td {
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
</style>

<!-- Full Invoice & Product Item Edit Modal Start -->
<div class="modal fade" id="invoiceFullEditModal" tabindex="-1" aria-labelledby="invoiceFullEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Sticky Purple Header -->
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center gap-2" id="invoiceFullEditModalLabel">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>ইনভয়েস ও পণ্য এডিট করুন (Edit Invoice & Products)</span>
                </h5>
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Form wrapping scrollable body and flush bottom footer -->
            <form id="fullEditInvoiceForm" onsubmit="return SaveFullInvoiceEdit(event)">
                <!-- Scrollable Body: Only this scrolls when virtual keyboard opens -->
                <div class="modal-body">
                    <input type="hidden" id="fullEditInvoiceID">

                    <!-- Top Order Info -->
                    <div class="row g-2 mb-3 bg-light p-3 rounded-3 border">
                        <div class="col-12 col-sm-4">
                            <label class="form-label small fw-bold text-secondary mb-1">ইনভয়েস নম্বর</label>
                            <input type="text" class="form-control bg-white fw-bold text-dark" id="fullEditOrderNo" readonly />
                        </div>
                        <div class="col-12 col-sm-4">
                            <label class="form-label small fw-bold text-secondary mb-1">ইনভয়েস তারিখ *</label>
                            <div class="position-relative">
                                <input type="text" class="form-control bg-white text-start" id="fullEditInvoiceDate" placeholder="DD-MM-YYYY" readonly autocomplete="off" required />
                                <span class="position-absolute end-0 top-50 translate-middle-y me-2 text-muted" style="cursor: pointer; pointer-events: none;">
                                    <i class="fa-regular fa-calendar-days"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label class="form-label small fw-bold text-secondary mb-1">কাস্টমার *</label>
                            <select class="form-select bg-white" id="fullEditCustomerSelect">
                                <option value="">কাস্টমার সিলেক্ট করুন</option>
                            </select>
                        </div>
                    </div>

                    <!-- Add New Product Search Bar & Camera Scanner -->
                    <div class="card border-0 bg-light p-2 mb-3 rounded-3" style="border: 1px dashed #cbd5e1 !important;">
                        <div class="d-flex align-items-center gap-2">
                            <div class="flex-grow-1 position-relative">
                                <input type="text" id="fullEditSearchInput" class="form-control bg-white" placeholder="🔍 বারকোড স্ক্যান করুন অথবা কোড/নাম লিখুন..." autocomplete="off" style="height: 42px; font-size: 13.5px; border-radius: 8px;" />
                                
                                <!-- Dynamic Autocomplete Results Dropdown -->
                                <div id="fullEditProductSearchResults" class="dropdown-menu shadow-lg w-100 p-0 overflow-auto" style="max-height: 280px; display: none; position: absolute; z-index: 1070; top: 100%; left: 0; border-radius: 10px;"></div>
                            </div>

                            <button type="button" class="btn text-white fw-bold px-3 d-flex align-items-center gap-2 text-nowrap" onclick="openFullEditCameraScannerModal()" style="height: 42px; border-radius: 8px; background-color: #059669; border: none;">
                                <i class="fa-solid fa-camera"></i>
                                <span class="d-none d-sm-inline">ক্যামেরা স্ক্যান</span>
                            </button>
                        </div>
                    </div>

                    <!-- Products Table (Desktop & Tablet >= 768px) -->
                    <div class="table-responsive mb-3 border rounded-3 overflow-hidden d-none d-md-block">
                        <table class="table table-hover align-middle mb-0 table-items" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="ps-3 py-2" style="width: 40px;">#</th>
                                    <th class="py-2">পণ্যের বিবরণ</th>
                                    <th class="py-2 text-center" style="width: 120px;">দর (৳)</th>
                                    <th class="py-2 text-center" style="width: 140px;">পরিমাণ</th>
                                    <th class="py-2 text-end" style="width: 120px;">মোট (৳)</th>
                                    <th class="pe-3 py-2 text-center" style="width: 50px;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody id="fullEditItemsTableBody">
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="fa-solid fa-circle-notch fa-spin me-2"></i> প্রোডাক্ট ডাটা লোড হচ্ছে...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Products Box Type Card List (Mobile < 768px: Full View with Zero Cut-off) -->
                    <div class="d-block d-md-none mb-3" id="fullEditMobileItemsList">
                        <div class="text-center py-4 text-muted small bg-light rounded-3 border">
                            <i class="fa-solid fa-circle-notch fa-spin me-2"></i> প্রোডাক্ট ডাটা লোড হচ্ছে...
                        </div>
                    </div>

                    <!-- Financial Summary & Note -->
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-md-6">
                            <label class="form-label small fw-bold text-secondary mb-1">ইনভয়েস নোট</label>
                            <textarea class="form-control" id="fullEditOrderNote" rows="3" placeholder="ইনভয়েসের মন্তব্য বা নোট লিখুন..." style="height: auto;"></textarea>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="bg-light p-3 rounded-3 border">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="fw-bold text-secondary small">মোট বিল (Sub-Total):</span>
                                    <span class="fw-bold fs-6 text-dark" id="fullEditSubTotalDisplay">৳ 0.00</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="fw-bold text-secondary small">ছাড় (Discount ৳):</span>
                                    <div style="width: 130px;">
                                        <input type="number" step="any" inputmode="decimal" class="form-control text-end fw-bold py-1" id="fullEditDiscount" oninput="recalculateFullEditFinancials()" value="0" style="height: 34px;" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="fw-bold text-secondary small">পরিশোধ (Paid ৳):</span>
                                    <div style="width: 130px;">
                                        <input type="number" step="any" inputmode="decimal" class="form-control text-end fw-bold text-success py-1" id="fullEditPaid" oninput="recalculateFullEditFinancials()" value="0" style="height: 34px;" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                                    <span class="fw-bold text-danger small">বকেয়া (Due ৳):</span>
                                    <span class="fw-bold fs-6 text-danger" id="fullEditDueDisplay">৳ 0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flush Footer Actions: 0 gap around, bottom/left/right flush -->
                <div class="modal-footer d-flex align-items-center justify-content-end gap-2">
                    <button type="button" class="btn px-4 py-2 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="border-radius: 8px; background-color: #ef4444 !important; border: none; padding: 10px 22px !important;">
                        <i class="fa-solid fa-xmark me-1"></i> বাতিল
                    </button>
                    <button type="submit" class="btn px-4 py-2 fw-bold text-white shadow-sm" style="border-radius: 8px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; padding: 10px 22px !important;">
                        <i class="fa-solid fa-check me-1"></i> ইনভয়েস আপডেট করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Full Invoice Edit Modal End -->

<!-- Camera Scanner Modal Start -->
<div class="modal fade" id="fullEditCameraScannerModal" tabindex="-1" aria-hidden="true" style="z-index: 1085 !important;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 text-center">
            <div class="modal-header border-0 pb-1">
                <h5 class="modal-title fw-bold text-success d-flex align-items-center gap-2">
                    <i class="fa-solid fa-camera"></i>
                    <span>ক্যামেরা বারকোড স্ক্যানার</span>
                </h5>
                <button type="button" class="btn-close" onclick="closeFullEditCameraScannerModal()"></button>
            </div>
            <div class="modal-body py-2">
                <div id="fullEditCameraReader" style="width: 100%; min-height: 250px; background: #000; border-radius: 12px; overflow: hidden;"></div>
                <div class="text-muted small mt-2">ক্যামেরার সামনে পণ্যের বারকোড বা কিউআর কোডটি ধরুন</div>
            </div>
        </div>
    </div>
</div>
<!-- Camera Scanner Modal End -->

<script>
    let fullEditItems = [];
    let allAvailableProducts = [];
    let fullEditHtml5QrCode = null;
    let fullEditDatePicker = null;

    $(document).ready(function() {
        $('#invoiceFullEditModal').appendTo("body");
        $('#fullEditCameraScannerModal').appendTo("body");

        // Initialize Flatpickr for Full Edit Modal
        initFullEditDatePicker();

        // Setup modal keyboard detection for mobile topbar gap
        setupModalKeyboardDetection('#invoiceFullEditModal');

        $('#invoiceFullEditModal').on('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (button) {
                const id = $(button).attr('data-id') || $(button).data('id') || $(button).closest('[data-id]').attr('data-id');
                if (id) {
                    FillUpFullInvoiceEditForm(id);
                }
            }
        });

        // Search Input Keyup Listener for Live Search & Barcode Scan
        $("#fullEditSearchInput").on("keyup input", function(e) {
            let term = $(this).val().trim();
            if (e.key === "Enter" || e.keyCode === 13) {
                e.preventDefault();
                processFullEditBarcodeSearch(term);
                return false;
            }
            filterFullEditProductDropdown(term);
        });

        // Hide search dropdown on click outside
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#fullEditSearchInput, #fullEditProductSearchResults").length) {
                $("#fullEditProductSearchResults").hide();
            }
        });
    });

    function initFullEditDatePicker() {
        if (typeof flatpickr !== 'undefined') {
            fullEditDatePicker = flatpickr("#fullEditInvoiceDate", {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                allowInput: true,
                monthSelectorType: "static"
            });
        } else {
            setTimeout(initFullEditDatePicker, 100);
        }
    }

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

    async function LoadAllProductsForInvoiceEdit() {
        try {
            let res = await axios.get("/api/product-list", HeaderToken());
            if (res.data.status === "success" || res.data.ProductData || res.data.data) {
                allAvailableProducts = res.data.ProductData || res.data.data || res.data.rows || [];
            }
        } catch (e) {
            console.error("Error loading products:", e);
        }
    }

    async function LoadInvoiceCustomerDropdown() {
        try {
            let res = await axios.get("/api/customer-list", HeaderToken());
            let select = $('#fullEditCustomerSelect');
            select.find('option:not(:first)').remove();
            if (res.data.status === 'success' && res.data.CustomerData) {
                res.data.CustomerData.forEach(cust => {
                    select.append(`<option value="${cust.id}">${cust.customer_name} (${cust.mobile || ''})</option>`);
                });
            }
        } catch (e) {
            console.error("Error loading customers:", e);
        }
    }

    function filterFullEditProductDropdown(term) {
        let dropdown = $("#fullEditProductSearchResults");
        dropdown.empty();

        if (!term || term.length < 1) {
            dropdown.hide();
            return;
        }

        let searchTerm = term.toLowerCase();
        let matches = allAvailableProducts.filter(p => {
            let name = (p.product_name || '').toLowerCase();
            let code = (Array.isArray(p.product_code) ? p.product_code.join(' ') : (p.product_code || '')).toLowerCase();
            return name.includes(searchTerm) || code.includes(searchTerm);
        }).slice(0, 10);

        if (matches.length === 0) {
            dropdown.html(`<div class="p-3 text-center text-muted small">❌ কোনো প্রোডাক্ট পাওয়া যায়নি</div>`).show();
            return;
        }

        matches.forEach(prod => {
            let codeStr = Array.isArray(prod.product_code) ? prod.product_code.join(', ') : (prod.product_code || '');
            let itemHtml = `
                <div class="dropdown-item d-flex align-items-center justify-content-between" onclick="selectProductFromFullEditDropdown(${prod.id})">
                    <div>
                        <div class="fw-bold text-dark" style="font-size: 13px;">${prod.product_name}</div>
                        ${codeStr ? `<span class="badge bg-light text-primary border" style="font-size: 10px;">${codeStr}</span>` : ''}
                    </div>
                    <div class="text-end">
                        <div class="fw-bold text-success" style="font-size: 13px;">৳ ${parseFloat(prod.sell_price || 0).toFixed(2)}</div>
                        <small class="text-muted" style="font-size: 10px;">স্টক: ${prod.quantity || 0}</small>
                    </div>
                </div>
            `;
            dropdown.append(itemHtml);
        });

        dropdown.show();
    }

    function selectProductFromFullEditDropdown(productId) {
        let prod = allAvailableProducts.find(p => p.id == productId);
        if (prod) {
            addProductToFullEditItemsList(prod);
        }
        $("#fullEditSearchInput").val("");
        $("#fullEditProductSearchResults").hide();
    }

    function processFullEditBarcodeSearch(term) {
        if (!term) return;
        let searchTerm = term.toLowerCase();

        let exactMatch = allAvailableProducts.find(p => {
            let codes = Array.isArray(p.product_code) ? p.product_code : [(p.product_code || '')];
            return codes.some(c => c.toString().toLowerCase() === searchTerm);
        });

        if (exactMatch) {
            addProductToFullEditItemsList(exactMatch);
            $("#fullEditSearchInput").val("");
            $("#fullEditProductSearchResults").hide();
            return;
        }

        let matches = allAvailableProducts.filter(p => {
            let name = (p.product_name || '').toLowerCase();
            let code = (Array.isArray(p.product_code) ? p.product_code.join(' ') : (p.product_code || '')).toLowerCase();
            return name.includes(searchTerm) || code.includes(searchTerm);
        });

        if (matches.length === 1) {
            addProductToFullEditItemsList(matches[0]);
            $("#fullEditSearchInput").val("");
            $("#fullEditProductSearchResults").hide();
        } else if (matches.length > 1) {
            filterFullEditProductDropdown(term);
        } else {
            errorToast("প্রোডাক্ট পাওয়া যায়নি!");
        }
    }

    function addProductToFullEditItemsList(prod) {
        let code = (Array.isArray(prod.product_code) ? prod.product_code[0] : prod.product_code) || '';
        let existingIndex = fullEditItems.findIndex(i => i.product_id == prod.id);

        if (existingIndex !== -1) {
            fullEditItems[existingIndex].quantity += 1;
        } else {
            fullEditItems.push({
                product_id: prod.id,
                product_name: prod.product_name,
                product_code: code,
                cost_price: parseFloat(prod.cost_price) || 0,
                selling_price: parseFloat(prod.sell_price) || 0,
                quantity: 1,
            });
        }

        successToast(`"${prod.product_name}" যুক্ত করা হয়েছে!`);
        renderFullEditItemsTable();
    }

    function openFullEditCameraScannerModal() {
        $("#fullEditCameraScannerModal").modal('show');
        setTimeout(() => {
            startFullEditCameraScanner();
        }, 400);
    }

    function closeFullEditCameraScannerModal() {
        stopFullEditCameraScanner();
        $("#fullEditCameraScannerModal").modal('hide');
    }

    function startFullEditCameraScanner() {
        if (!window.Html5Qrcode) {
            errorToast("ক্যামেরা স্ক্যানার লাইব্রেরি পাওয়া যায়নি।");
            return;
        }

        if (fullEditHtml5QrCode) {
            stopFullEditCameraScanner();
        }

        fullEditHtml5QrCode = new Html5Qrcode("fullEditCameraReader");
        fullEditHtml5QrCode.start(
            { facingMode: "environment" },
            {
                fps: 10,
                qrbox: { width: 250, height: 150 }
            },
            (decodedText, decodedResult) => {
                processFullEditBarcodeSearch(decodedText);
                closeFullEditCameraScannerModal();
            },
            (errorMessage) => {
                // Ignore frame errors
            }
        ).catch(err => {
            console.error("Camera access error:", err);
            errorToast("ক্যামেরা ওপেন করা সম্ভব হয়নি! পারমিশন দিন।");
        });
    }

    function stopFullEditCameraScanner() {
        if (fullEditHtml5QrCode) {
            fullEditHtml5QrCode.stop().then(() => {
                fullEditHtml5QrCode.clear();
                fullEditHtml5QrCode = null;
            }).catch(err => {
                fullEditHtml5QrCode = null;
            });
        }
    }

    async function FillUpFullInvoiceEditForm(id) {
        try {
            document.getElementById('fullEditInvoiceID').value = id;
            await Promise.all([LoadInvoiceCustomerDropdown(), LoadAllProductsForInvoiceEdit()]);

            showLoader();
            let res = await axios.post("/api/invoice-full-details-by-id", {
                id: id.toString()
            }, HeaderToken());
            hideLoader();

            if (res.data.status === "success") {
                const data = res.data.rows;

                document.getElementById('fullEditOrderNo').value = data.order_no || '';
                
                // Set date in d-m-Y format
                let rawDate = data.invoice_date || '';
                if (fullEditDatePicker && rawDate) {
                    let d = new Date(rawDate);
                    if (!isNaN(d.getTime())) {
                        fullEditDatePicker.setDate(d);
                    } else {
                        document.getElementById('fullEditInvoiceDate').value = rawDate;
                    }
                }

                document.getElementById('fullEditDiscount').value = data.discount_amount || 0;
                document.getElementById('fullEditPaid').value = data.paid_amount || 0;
                document.getElementById('fullEditOrderNote').value = data.order_note || '';

                if (document.getElementById('fullEditCustomerSelect') && data.customer_id) {
                    document.getElementById('fullEditCustomerSelect').value = data.customer_id;
                }

                fullEditItems = (data.details || []).map(item => ({
                    product_id: item.product_id,
                    product_name: item.product_name,
                    product_code: item.product_code,
                    cost_price: parseFloat(item.cost_price) || 0,
                    selling_price: parseFloat(item.selling_price) || 0,
                    quantity: parseFloat(item.quantity) || 1,
                }));

                renderFullEditItemsTable();
            }
        } catch (e) {
            hideLoader();
            console.error("Error fetching invoice details:", e);
            unauthorized(e.response ? e.response.status : 500);
        }
    }

    function renderFullEditItemsTable() {
        let tbody = $("#fullEditItemsTableBody");
        let mobileList = $("#fullEditMobileItemsList");
        tbody.empty();
        mobileList.empty();

        if (!fullEditItems || fullEditItems.length === 0) {
            tbody.append(`
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        <i class="fa-solid fa-inbox me-2 opacity-50"></i> কোনো প্রোডাক্ট আইটেম নেই।
                    </td>
                </tr>
            `);
            mobileList.append(`
                <div class="p-3 text-center text-muted small bg-light rounded-3 border">
                    <i class="fa-solid fa-inbox me-1 opacity-50"></i> কোনো প্রোডাক্ট আইটেম নেই।
                </div>
            `);
            recalculateFullEditFinancials();
            return;
        }

        fullEditItems.forEach((item, index) => {
            let itemSubtotal = item.selling_price * item.quantity;

            // Desktop Table Row (>= 768px)
            let row = `
                <tr>
                    <td class="ps-3 fw-bold text-secondary">${index + 1}</td>
                    <td>
                        <div class="fw-bold text-dark" style="font-size: 13.5px;">${item.product_name}</div>
                        ${item.product_code ? `<span class="badge bg-light text-primary border" style="font-size: 10px;">${item.product_code}</span>` : ''}
                    </td>
                    <td class="text-center">
                        <input type="number" step="any" inputmode="decimal" class="form-control text-center py-1 fw-bold" value="${item.selling_price}" onchange="updateFullEditItemPrice(${index}, this.value)" style="height: 32px; font-size: 12.5px;" />
                    </td>
                    <td class="text-center">
                        <div class="d-inline-flex align-items-center gap-1">
                            <button type="button" class="btn btn-sm btn-outline-secondary px-2 py-0" onclick="changeFullEditQty(${index}, -1)">-</button>
                            <input type="number" step="any" inputmode="numeric" class="form-control qty-input py-1" value="${item.quantity}" onchange="updateFullEditItemQty(${index}, this.value)" style="height: 32px; font-size: 12.5px;" />
                            <button type="button" class="btn btn-sm btn-outline-secondary px-2 py-0" onclick="changeFullEditQty(${index}, 1)">+</button>
                        </div>
                    </td>
                    <td class="text-end fw-bold text-dark" style="font-size: 14px;">৳ ${itemSubtotal.toFixed(2)}</td>
                    <td class="pe-3 text-center">
                        <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle" onclick="removeFullEditItem(${index})" title="মুছে ফেলুন">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            tbody.append(row);

            // Mobile Box-Type Card (< 768px: Full View with Zero Cut-off)
            let box = `
                <div class="card p-3 mb-2 rounded-3 border bg-white shadow-sm full-edit-mobile-item-box">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-purple-subtle text-purple border rounded-circle" style="width: 22px; height: 22px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px;">${index + 1}</span>
                            <div>
                                <span class="fw-bold text-dark d-block" style="font-size: 13.5px;">${item.product_name}</span>
                                ${item.product_code ? `<span class="badge bg-light text-primary border" style="font-size: 9.5px;">${item.product_code}</span>` : ''}
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle p-1" onclick="removeFullEditItem(${index})" title="মুছে ফেলুন">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    <div class="d-flex justify-content-between align-items-center gap-2 pt-2 border-top border-light-subtle flex-wrap">
                        <div class="d-flex align-items-center gap-1" style="flex: 1 1 95px;">
                            <span class="small text-muted fw-semibold" style="font-size: 11px;">দর:</span>
                            <input type="number" step="any" inputmode="decimal" class="form-control text-center py-1 fw-bold" value="${item.selling_price}" onchange="updateFullEditItemPrice(${index}, this.value)" style="height: 32px; font-size: 12.5px; width: 100%; border-radius: 6px;" />
                        </div>
                        <div class="d-inline-flex align-items-center gap-1">
                            <button type="button" class="btn btn-sm btn-outline-secondary px-2 py-0" onclick="changeFullEditQty(${index}, -1)" style="height: 32px; min-width: 28px;">-</button>
                            <input type="number" step="any" inputmode="numeric" class="form-control qty-input py-1 text-center" value="${item.quantity}" onchange="updateFullEditItemQty(${index}, this.value)" style="height: 32px; width: 44px; font-size: 12.5px; border-radius: 6px;" />
                            <button type="button" class="btn btn-sm btn-outline-secondary px-2 py-0" onclick="changeFullEditQty(${index}, 1)" style="height: 32px; min-width: 28px;">+</button>
                        </div>
                        <div class="text-end" style="min-width: 75px;">
                            <span class="small text-muted d-block" style="font-size: 10px;">মোট</span>
                            <span class="fw-bold text-dark" style="font-size: 13.5px;">৳ ${itemSubtotal.toFixed(2)}</span>
                        </div>
                    </div>
                </div>
            `;
            mobileList.append(box);
        });

        recalculateFullEditFinancials();
    }

    function changeFullEditQty(index, delta) {
        if (fullEditItems[index]) {
            let newQty = fullEditItems[index].quantity + delta;
            if (newQty <= 0) {
                removeFullEditItem(index);
            } else {
                fullEditItems[index].quantity = newQty;
                renderFullEditItemsTable();
            }
        }
    }

    function updateFullEditItemQty(index, val) {
        let qty = parseFloat(val) || 0;
        if (qty <= 0) {
            removeFullEditItem(index);
        } else if (fullEditItems[index]) {
            fullEditItems[index].quantity = qty;
            renderFullEditItemsTable();
        }
    }

    function updateFullEditItemPrice(index, val) {
        let price = parseFloat(val) || 0;
        if (fullEditItems[index]) {
            fullEditItems[index].selling_price = price;
            renderFullEditItemsTable();
        }
    }

    function removeFullEditItem(index) {
        fullEditItems.splice(index, 1);
        renderFullEditItemsTable();
    }

    function recalculateFullEditFinancials() {
        let subtotal = 0;
        fullEditItems.forEach(item => {
            subtotal += (item.selling_price * item.quantity);
        });

        const discount = parseFloat(document.getElementById('fullEditDiscount')?.value || 0) || 0;
        const paid = parseFloat(document.getElementById('fullEditPaid')?.value || 0) || 0;
        const due = Math.max(0, subtotal - discount - paid);

        document.getElementById('fullEditSubTotalDisplay').textContent = `৳ ${subtotal.toFixed(2)}`;
        document.getElementById('fullEditDueDisplay').textContent = `৳ ${due.toFixed(2)}`;
    }

    async function SaveFullInvoiceEdit(event) {
        if (event) event.preventDefault();

        try {
            const id = document.getElementById('fullEditInvoiceID').value;
            let subtotal = 0;
            fullEditItems.forEach(item => {
                subtotal += (item.selling_price * item.quantity);
            });

            const discountAmount = parseFloat(document.getElementById('fullEditDiscount').value) || 0;
            const paidAmount = parseFloat(document.getElementById('fullEditPaid').value) || 0;
            
            // Format date to Y-m-d for backend
            let rawDate = document.getElementById('fullEditInvoiceDate').value;
            let invoiceDate = rawDate;
            if (rawDate && rawDate.includes('-')) {
                const parts = rawDate.split('-');
                if (parts.length === 3 && parts[0].length === 2) {
                    invoiceDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
                }
            }

            const customerId = document.getElementById('fullEditCustomerSelect').value;
            const orderNote = document.getElementById('fullEditOrderNote').value;

            if (fullEditItems.length === 0) {
                errorToast("দয়া করে কমপক্ষে একটি পণ্য তালিকায় রাখুন।");
                return false;
            }

            let formData = new FormData();
            formData.append('id', id);
            formData.append('sub_total', subtotal);
            formData.append('discount_amount', discountAmount);
            formData.append('paid_amount', paidAmount);
            formData.append('invoice_date', invoiceDate);
            formData.append('customer_id', customerId);
            formData.append('order_note', orderNote);
            formData.append('items', JSON.stringify(fullEditItems));

            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            let res = await axios.post("/api/update-invoice-details", formData, config);
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message || "ইনভয়েস সফলভাবে আপডেট করা হয়েছে।");
                $("#invoiceFullEditModal").modal('hide');
                if (typeof fetchInvoiceReport === 'function') {
                    await fetchInvoiceReport();
                } else if (typeof getList === 'function') {
                    await getList();
                } else {
                    setTimeout(() => location.reload(), 500);
                }
            } else {
                errorToast(res.data.message || "ইনভয়েস আপডেট ব্যর্থ হয়েছে।");
            }
        } catch (e) {
            hideLoader();
            console.error("Save error:", e);
            errorToast("ইনভয়েস ও প্রোডাক্ট আইটেম আপডেট করতে সমস্যা হয়েছে।");
        }
        return false;
    }
</script>
