<!-- Flatpickr CSS & JS per rules.md -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    /* Ultra-Responsive Full-Width Bottom Sheet Styling for Create Expense Modal */
    .financemodal {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100vw !important;
        height: 100dvh !important;
        background: rgba(15, 23, 42, 0.65) !important;
        backdrop-filter: blur(4px);
        z-index: 99999 !important;
        display: none;
        align-items: flex-end !important;
        justify-content: center !important;
        padding: 0 !important;
        margin: 0 !important;
        overflow: hidden !important;
    }

    .expense-create-modal-content {
        background: #ffffff;
        width: 100vw !important;
        max-width: 100vw !important;
        min-width: 100vw !important;
        height: auto !important;
        max-height: 85dvh !important;
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
        display: flex;
        flex-direction: column;
        overflow: hidden !important;
        box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.3) !important;
        border: none !important;
        margin: 0 auto !important;
        animation: slideUpModal 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    @media (min-width: 992px) {
        .financemodal {
            align-items: center !important;
            padding: 20px !important;
        }
        .expense-create-modal-content {
            width: 100% !important;
            max-width: 760px !important;
            min-width: auto !important;
            border-radius: 20px !important;
            margin: auto !important;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35) !important;
        }
    }

    /* Fixed Sticky Header */
    .expense-create-modal-header {
        position: sticky;
        top: 0;
        z-index: 100;
        flex-shrink: 0;
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 12px 18px;
    }

    /* Fixed Sticky Footer */
    .expense-create-modal-footer {
        position: sticky;
        bottom: 0;
        z-index: 100;
        flex-shrink: 0;
        background: #ffffff !important;
        border-top: 1px solid #e2e8f0 !important;
        padding: 12px 18px !important;
    }

    /* Modal Body with Solid White Background & Only Inner Scrolling */
    .expense-create-modal-body,
    #popup-modal {
        flex: 1 1 auto;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
        padding: 14px 16px !important;
        background-color: #ffffff !important;
        max-height: calc(85dvh - 125px);
    }

    .expense-type-row {
        background: #ffffff !important;
        border: 1.5px solid #e2e8f0 !important;
        border-radius: 10px !important;
        padding: 10px 12px !important;
        transition: all 0.2s ease-in-out;
    }

    .expense-type-row:hover {
        border-color: #cbd5e1 !important;
    }

    .expense-type-row.selected-row {
        border-color: #8C56D4 !important;
        background: #FAF7FD !important;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.08) !important;
    }

    /* Sub-modals: Force override global all-modal.css .newbrand so they show correctly */
    #addBrandModal,
    #editBrandModal,
    #addStaffQuickModal,
    #typeDeleteConfirmationModal {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        background: rgba(15, 23, 42, 0.65) !important;
        backdrop-filter: blur(4px) !important;
        display: none !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 12px !important;
        z-index: 200000000 !important;
        opacity: 1 !important;
        visibility: visible !important;
        transition: none !important;
    }

    #addBrandModal.expense-sub-modal-open,
    #editBrandModal.expense-sub-modal-open,
    #addStaffQuickModal.expense-sub-modal-open,
    #typeDeleteConfirmationModal.expense-sub-modal-open {
        display: flex !important;
    }

    .newbrand-content {
        background: #ffffff !important;
        border-radius: 16px !important;
        padding: 0 !important;
        overflow: hidden !important;
        width: 95%;
        max-width: 580px;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.3);
    }

    /* Global Floating Staff Dropdown Menu (Appended to Body at Root Level) */
    #globalFloatingStaffMenu {
        position: fixed;
        display: none;
        z-index: 100000000 !important;
        background: #ffffff;
        border: 1.5px solid #8C56D4;
        border-radius: 10px;
        box-shadow: 0 15px 35px rgba(140, 86, 212, 0.22), 0 4px 12px rgba(0, 0, 0, 0.1);
        max-height: 260px;
        overflow: hidden;
    }
    .staff-option-item:hover {
        background: #F3ECFB !important;
    }

    /* Flatpickr Royal Purple Theme */
    .flatpickr-calendar {
        z-index: 99999999 !important;
        border-radius: 12px !important;
        border: 1px solid #E5D5F7 !important;
        box-shadow: 0 10px 25px rgba(140, 86, 212, 0.15) !important;
        font-family: inherit !important;
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange {
        background: #8C56D4 !important;
        border-color: #8C56D4 !important;
    }
    .flatpickr-months .flatpickr-month {
        background: #8C56D4 !important;
        color: #fff !important;
        fill: #fff !important;
    }
    .flatpickr-current-month .flatpickr-monthDropdown-months, .flatpickr-current-month input.cur-year {
        color: #fff !important;
        font-weight: 700;
    }
    .flatpickr-months .flatpickr-prev-month, .flatpickr-months .flatpickr-next-month {
        fill: #fff !important;
        color: #fff !important;
    }

    @keyframes slideUpModal {
        from {
            transform: translateY(100%);
            opacity: 0.85;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Date section default (light mode) */
    .expense-date-section {
        background-color: #FAF7FD;
        border: 1px solid #E5D5F7 !important;
        border-radius: 10px;
        padding: 12px;
    }
    .expense-quick-btn {
        background-color: #ffffff !important;
        color: #8C56D4 !important;
        border: 1.5px solid #8C56D4 !important;
        transition: all 0.2s ease-in-out;
    }
    .expense-quick-btn:hover {
        background-color: #F3ECFB !important;
        color: #793FC5 !important;
    }
    .expense-types-wrapper {
        background-color: #ffffff;
    }
    .staff-add-quick-btn {
        background-color: #FAF7FD !important;
        border: 1.5px solid #8C56D4 !important;
        color: #8C56D4 !important;
        transition: all 0.2s ease-in-out;
    }
    .staff-add-quick-btn:hover {
        background-color: #F3ECFB !important;
        color: #793FC5 !important;
    }

    /* ===== Dark Mode Support ===== */
    /* Main modal shell — override Bootstrap .modal-content white bg */
    body[light-mode="dark"] .expense-create-modal-content,
    body[data-layout-mode="dark"] .expense-create-modal-content,
    html[light-mode="dark"] .expense-create-modal-content,
    html[data-layout-mode="dark"] .expense-create-modal-content,
    body.dark-mode .expense-create-modal-content,
    html.dark .expense-create-modal-content,
    body[light-mode="dark"] .expense-create-modal-content.modal-content,
    body[data-layout-mode="dark"] .expense-create-modal-content.modal-content,
    html[light-mode="dark"] .expense-create-modal-content.modal-content,
    html[data-layout-mode="dark"] .expense-create-modal-content.modal-content,
    body.dark-mode .expense-create-modal-content.modal-content,
    html.dark .expense-create-modal-content.modal-content {
        background-color: #1e293b !important;
        color: #F3ECFB !important;
        border: 1px solid #334155 !important;
    }
    body[light-mode="dark"] .expense-create-modal-body,
    body[data-layout-mode="dark"] .expense-create-modal-body,
    html[light-mode="dark"] .expense-create-modal-body,
    html[data-layout-mode="dark"] .expense-create-modal-body,
    body.dark-mode .expense-create-modal-body,
    html.dark .expense-create-modal-body,
    body[light-mode="dark"] #popup-modal,
    body[data-layout-mode="dark"] #popup-modal,
    html[light-mode="dark"] #popup-modal,
    html[data-layout-mode="dark"] #popup-modal,
    body.dark-mode #popup-modal,
    html.dark #popup-modal {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .expense-create-modal-footer,
    body[data-layout-mode="dark"] .expense-create-modal-footer,
    html[light-mode="dark"] .expense-create-modal-footer,
    html[data-layout-mode="dark"] .expense-create-modal-footer,
    body.dark-mode .expense-create-modal-footer,
    html.dark .expense-create-modal-footer {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    /* Date section in dark mode */
    body[light-mode="dark"] .expense-date-section,
    body[data-layout-mode="dark"] .expense-date-section,
    html[light-mode="dark"] .expense-date-section,
    html[data-layout-mode="dark"] .expense-date-section,
    body.dark-mode .expense-date-section,
    html.dark .expense-date-section {
        background-color: #1a2540 !important;
        border-color: #334155 !important;
    }
    /* Quick action buttons in dark mode */
    body[light-mode="dark"] .expense-quick-btn,
    body[data-layout-mode="dark"] .expense-quick-btn,
    html[light-mode="dark"] .expense-quick-btn,
    html[data-layout-mode="dark"] .expense-quick-btn,
    body.dark-mode .expense-quick-btn,
    html.dark .expense-quick-btn {
        background-color: #0f172a !important;
        border-color: #8C56D4 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .expense-quick-btn:hover,
    body[data-layout-mode="dark"] .expense-quick-btn:hover,
    html[light-mode="dark"] .expense-quick-btn:hover,
    html[data-layout-mode="dark"] .expense-quick-btn:hover,
    body.dark-mode .expense-quick-btn:hover,
    html.dark .expense-quick-btn:hover {
        background-color: #260B4A !important;
        color: #F3ECFB !important;
    }
    /* Wrapper for expense types */
    body[light-mode="dark"] .expense-types-wrapper,
    body[data-layout-mode="dark"] .expense-types-wrapper,
    html[light-mode="dark"] .expense-types-wrapper,
    html[data-layout-mode="dark"] .expense-types-wrapper,
    body.dark-mode .expense-types-wrapper,
    html.dark .expense-types-wrapper {
        background-color: #0f172a !important;
    }
    /* Sub-modal content boxes */
    body[light-mode="dark"] .newbrand-content,
    body[data-layout-mode="dark"] .newbrand-content,
    html[light-mode="dark"] .newbrand-content,
    html[data-layout-mode="dark"] .newbrand-content,
    body.dark-mode .newbrand-content,
    html.dark .newbrand-content {
        background-color: #1e293b !important;
        color: #F3ECFB !important;
        border: 1px solid #334155 !important;
    }
    body[light-mode="dark"] .newbrand-content .p-4,
    body[light-mode="dark"] .newbrand-content form,
    body[data-layout-mode="dark"] .newbrand-content .p-4,
    body[data-layout-mode="dark"] .newbrand-content form,
    html[light-mode="dark"] .newbrand-content .p-4,
    html[light-mode="dark"] .newbrand-content form,
    html[data-layout-mode="dark"] .newbrand-content .p-4,
    html[data-layout-mode="dark"] .newbrand-content form,
    body.dark-mode .newbrand-content .p-4,
    body.dark-mode .newbrand-content form,
    html.dark .newbrand-content .p-4,
    html.dark .newbrand-content form {
        background-color: #1e293b !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] #globalFloatingStaffMenu,
    body[data-layout-mode="dark"] #globalFloatingStaffMenu,
    html[light-mode="dark"] #globalFloatingStaffMenu,
    html[data-layout-mode="dark"] #globalFloatingStaffMenu,
    body.dark-mode #globalFloatingStaffMenu,
    html.dark #globalFloatingStaffMenu {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }
    /* Expense type rows — fix border turning white */
    body[light-mode="dark"] .expense-type-row,
    body[data-layout-mode="dark"] .expense-type-row,
    html[light-mode="dark"] .expense-type-row,
    html[data-layout-mode="dark"] .expense-type-row,
    body.dark-mode .expense-type-row,
    html.dark .expense-type-row {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .expense-type-row.selected-row,
    body[data-layout-mode="dark"] .expense-type-row.selected-row,
    html[light-mode="dark"] .expense-type-row.selected-row,
    html[data-layout-mode="dark"] .expense-type-row.selected-row,
    body.dark-mode .expense-type-row.selected-row,
    html.dark .expense-type-row.selected-row {
        background-color: #2a203d !important;
        border-color: #8C56D4 !important;
    }
    body[light-mode="dark"] .staff-dropdown-btn,
    body[data-layout-mode="dark"] .staff-dropdown-btn,
    html[light-mode="dark"] .staff-dropdown-btn,
    html[data-layout-mode="dark"] .staff-dropdown-btn,
    body.dark-mode .staff-dropdown-btn,
    html.dark .staff-dropdown-btn {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .staff-add-quick-btn,
    body[data-layout-mode="dark"] .staff-add-quick-btn,
    html[light-mode="dark"] .staff-add-quick-btn,
    html[data-layout-mode="dark"] .staff-add-quick-btn,
    body.dark-mode .staff-add-quick-btn,
    html.dark .staff-add-quick-btn {
        background-color: #0f172a !important;
        border-color: #8C56D4 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .staff-add-quick-btn:hover,
    body[data-layout-mode="dark"] .staff-add-quick-btn:hover,
    html[light-mode="dark"] .staff-add-quick-btn:hover,
    html[data-layout-mode="dark"] .staff-add-quick-btn:hover,
    body.dark-mode .staff-add-quick-btn:hover,
    html.dark .staff-add-quick-btn:hover {
        background-color: #260B4A !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .staff-option-item:hover,
    body[data-layout-mode="dark"] .staff-option-item:hover,
    html[light-mode="dark"] .staff-option-item:hover,
    html[data-layout-mode="dark"] .staff-option-item:hover,
    body.dark-mode .staff-option-item:hover,
    html.dark .staff-option-item:hover {
        background: #334155 !important;
    }
    body[light-mode="dark"] .text-dark,
    body[data-layout-mode="dark"] .text-dark,
    html[light-mode="dark"] .text-dark,
    html[data-layout-mode="dark"] .text-dark,
    body.dark-mode .text-dark,
    html.dark .text-dark {
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .form-control,
    body[data-layout-mode="dark"] .form-control,
    html[light-mode="dark"] .form-control,
    html[data-layout-mode="dark"] .form-control,
    body.dark-mode .form-control,
    html.dark .form-control,
    body[light-mode="dark"] .form-select,
    body[data-layout-mode="dark"] .form-select,
    html[light-mode="dark"] .form-select,
    html[data-layout-mode="dark"] .form-select,
    body.dark-mode .form-select,
    html.dark .form-select {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }
    /* Small labels inside expense type rows */
    body[light-mode="dark"] .expense-type-row label,
    body[light-mode="dark"] .expense-type-row small,
    body[light-mode="dark"] .expense-type-row span,
    body[data-layout-mode="dark"] .expense-type-row label,
    body[data-layout-mode="dark"] .expense-type-row small,
    body[data-layout-mode="dark"] .expense-type-row span,
    html[light-mode="dark"] .expense-type-row label,
    html[light-mode="dark"] .expense-type-row small,
    html[light-mode="dark"] .expense-type-row span,
    html[data-layout-mode="dark"] .expense-type-row label,
    html[data-layout-mode="dark"] .expense-type-row small,
    html[data-layout-mode="dark"] .expense-type-row span,
    body.dark-mode .expense-type-row label,
    body.dark-mode .expense-type-row small,
    body.dark-mode .expense-type-row span,
    html.dark .expense-type-row label,
    html.dark .expense-type-row small,
    html.dark .expense-type-row span {
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .type-input-group.border-top,
    body[data-layout-mode="dark"] .type-input-group.border-top,
    html[light-mode="dark"] .type-input-group.border-top,
    html[data-layout-mode="dark"] .type-input-group.border-top,
    body.dark-mode .type-input-group.border-top,
    html.dark .type-input-group.border-top {
        border-top-color: #334155 !important;
    }
    /* Flatpickr dark */
    body[light-mode="dark"] .flatpickr-calendar,
    body[data-layout-mode="dark"] .flatpickr-calendar,
    html[light-mode="dark"] .flatpickr-calendar,
    html[data-layout-mode="dark"] .flatpickr-calendar,
    body.dark-mode .flatpickr-calendar,
    html.dark .flatpickr-calendar {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .flatpickr-day,
    body[data-layout-mode="dark"] .flatpickr-day,
    html[light-mode="dark"] .flatpickr-day,
    html[data-layout-mode="dark"] .flatpickr-day,
    body.dark-mode .flatpickr-day,
    html.dark .flatpickr-day {
        color: #f8fafc !important;
    }
    /* Sub-modal header strip — keep purple, not dark */
    body[light-mode="dark"] .newbrand-content .modal-header,
    body[light-mode="dark"] .newbrand-content [class*="header"],
    body[data-layout-mode="dark"] .newbrand-content .modal-header,
    body[data-layout-mode="dark"] .newbrand-content [class*="header"],
    html[light-mode="dark"] .newbrand-content .modal-header,
    html[light-mode="dark"] .newbrand-content [class*="header"],
    html[data-layout-mode="dark"] .newbrand-content .modal-header,
    html[data-layout-mode="dark"] .newbrand-content [class*="header"],
    body.dark-mode .newbrand-content .modal-header,
    body.dark-mode .newbrand-content [class*="header"],
    html.dark .newbrand-content .modal-header,
    html.dark .newbrand-content [class*="header"] {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
    }
    body[light-mode="dark"] .newbrand-content .modal-body,
    body[light-mode="dark"] .newbrand-content form,
    body[data-layout-mode="dark"] .newbrand-content .modal-body,
    body[data-layout-mode="dark"] .newbrand-content form,
    html[light-mode="dark"] .newbrand-content .modal-body,
    html[light-mode="dark"] .newbrand-content form,
    html[data-layout-mode="dark"] .newbrand-content .modal-body,
    html[data-layout-mode="dark"] .newbrand-content form,
    body.dark-mode .newbrand-content .modal-body,
    body.dark-mode .newbrand-content form,
    html.dark .newbrand-content .modal-body,
    html.dark .newbrand-content form {
        background-color: #1e293b !important;
    }
</style>

<!-- Create Expense Modal Container -->
<section id="createProduct" class="financemodal">
    <div class="modal-content expense-create-modal-content border-0 p-0">
        <!-- Sticky Header (Only Bangla) -->
        <div class="expense-create-modal-header text-white d-flex align-items-center justify-content-between">
            <h5 class="modal-title fw-bold mb-0 text-white fs-6 fs-md-5 d-flex align-items-center">
                <i class="fa-solid fa-file-circle-plus me-2"></i> নতুন খরচ এন্ট্রি
            </h5>
            <button type="button" class="btn btn-sm text-white border-0 rounded-circle d-flex align-items-center justify-content-center" onclick="closeExpenseModal()" title="বন্ধ করুন" style="background-color: #ef4444 !important; width: 32px; height: 32px; font-size: 15px; cursor: pointer; transition: all 0.2s ease;">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Scrollable Body with solid white background and auto-height -->
        <div id="popup-modal" class="expense-create-modal-body">
            <form id="expenseForm" onsubmit="return Save(event)">
                <!-- Top Date & Quick Action Buttons (Only Bangla) -->
                <div class="mb-3 expense-date-section" style="border: 1px solid #E5D5F7; border-radius: 10px; padding: 12px;">
                    <div class="row g-2 align-items-end">
                        <div class="col-12 col-md-5">
                            <label for="ExpenseDate" class="form-label fw-bold small text-dark mb-1">
                                <i class="fa-regular fa-calendar-days me-1" style="color: #8C56D4;"></i> তারিখ *
                            </label>
                            <div class="position-relative" style="cursor: pointer;" onclick="expenseDatePickerInstance && expenseDatePickerInstance.open()">
                                <input type="text" class="form-control fw-bold text-dark text-start" id="ExpenseDate" placeholder="DD-MM-YYYY" readonly required style="height: 42px; border-radius: 8px; font-size: 13.5px; cursor: pointer;" />
                                <i class="fa-regular fa-calendar-days position-absolute" style="right: 12px; top: 13px; cursor: pointer; color: #8C56D4 !important; font-size: 15px;"></i>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
                            <button type="button" class="btn fw-bold flex-fill d-flex align-items-center justify-content-center newbrand-open expense-quick-btn" onclick="openBrandModal()" style="height: 42px; border-radius: 8px; font-size: 13px; gap: 8px !important;">
                                <i class="fa-solid fa-folder-plus"></i> <span style="margin-left: 6px;">নতুন টাইপ</span>
                            </button>
                            <button type="button" class="btn fw-bold flex-fill d-flex align-items-center justify-content-center expense-quick-btn" onclick="openStaffQuickModal()" style="height: 42px; border-radius: 8px; font-size: 13px; gap: 8px !important;">
                                <i class="fa-solid fa-user-plus"></i> <span style="margin-left: 6px;">নতুন স্টাফ</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Multi-Expense Checkbox Selection List -->
                <div class="p-0 mb-3 expense-types-wrapper">
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between mb-2.5 border-bottom pb-2 gap-2">
                        <h6 class="fw-bold text-dark mb-0" style="font-size: 13.5px;">
                            <i class="fa-solid fa-list-check me-1" style="color: #8C56D4;"></i> খরচের খাত সিলেক্ট করুন ও টাকার পরিমাণ বসান:
                        </h6>
                        <small class="text-muted" style="font-size: 11px;"><i class="fa-solid fa-circle-info me-1" style="color: #8C56D4;"></i> বেতন এন্ট্রিতে স্টাফ সিলেক্ট আবশ্যক</small>
                    </div>

                    <div id="ExpenseTypesContainer" class="d-flex flex-column gap-2 mt-2" style="max-height: 380px; overflow-y: auto;">
                        <div class="text-center py-4 text-muted">
                            <i class="fa-solid fa-circle-notch fa-spin me-2"></i> এক্সপেন্স টাইপ লোড হচ্ছে...
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Sticky Footer with Side-by-Side 50% Full-Width Buttons -->
        <div class="expense-create-modal-footer">
            <div class="d-flex align-items-center gap-2 w-100">
                <button type="button" onclick="closeExpenseModal()" class="btn flex-fill fw-bold text-white shadow-sm" style="height: 44px; border-radius: 8px; background-color: #ef4444 !important; border: none; font-size: 14px;">
                    বাতিল
                </button>
                <button type="submit" form="expenseForm" class="btn flex-fill fw-extrabold shadow-sm text-white" style="height: 44px; border-radius: 8px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; font-size: 14px;">
                    <i class="fa-solid fa-check-circle me-1"></i> সংরক্ষণ করুন
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Create Expense Modal End -->

<!-- Add New Expense Type Modal Start (Only Bangla) -->
<div class="newbrand" id="addBrandModal">
    <div class="newbrand-content shadow-lg border-0">
        <div class="modal-header py-3 px-4 d-flex align-items-center justify-content-between text-white" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;">
            <h5 class="fw-bold mb-0 text-white d-flex align-items-center gap-2" style="font-size: 16px;">
                <i class="fa-solid fa-folder-plus"></i> <span>নতুন এক্সপেন্স টাইপ</span>
            </h5>
            <button type="button" class="btn btn-sm text-white border-0 rounded-circle d-flex align-items-center justify-content-center" onclick="closeBrandModal()" style="background-color: #ef4444 !important; width: 28px; height: 28px; font-size: 13px;">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-4">
            <form onsubmit="saveExpenseType(event)">
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1 d-block">টাইপের নাম *</label>
                        <input type="text" id="CreateExpenseTypeName" class="form-control" placeholder="যেমন: দোকান ভাড়া, বিদ্যুৎ বিল" required style="height: 42px; border-radius: 8px;" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1 d-block">স্ট্যাটাস *</label>
                        <select class="form-select" id="ExpenseSelectStatus" style="height: 42px; border-radius: 8px; border-color: #cbd5e1;">
                            <option value="Active" selected>Active (সক্রিয়)</option>
                            <option value="InActive">Inactive (নিষ্ক্রিয়)</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn px-4 py-2 text-white newbrand-close" onclick="closeBrandModal()" style="background-color: #ef4444 !important; border: none; border-radius: 8px; font-weight: 600; padding: 10px 24px !important;">বাতিল</button>
                    <button type="submit" class="btn px-4 py-2 fw-bold text-white" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; border-radius: 8px; padding: 10px 24px !important;">সেভ করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Expense Type Modal End -->

<!-- Edit Expense Type Modal Start (Only Bangla) -->
<div class="newbrand" id="editBrandModal">
    <div class="newbrand-content shadow-lg border-0">
        <div class="modal-header py-3 px-4 d-flex align-items-center justify-content-between text-white" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;">
            <h5 class="fw-bold mb-0 text-white d-flex align-items-center gap-2" style="font-size: 16px;">
                <i class="fa-solid fa-pen-to-square"></i> <span>এডিট এক্সপেন্স টাইপ</span>
            </h5>
            <button type="button" class="btn btn-sm text-white border-0 rounded-circle d-flex align-items-center justify-content-center" onclick="closeEditBrandModal()" style="background-color: #ef4444 !important; width: 28px; height: 28px; font-size: 13px;">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-4">
            <form onsubmit="updateExpenseTypeSubmit(event)">
                <input type="hidden" id="EditExpenseTypeId" />
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1 d-block">টাইপের নাম *</label>
                        <input type="text" id="EditExpenseTypeName" class="form-control fw-bold" placeholder="যেমন: দোকান ভাড়া, বিদ্যুৎ বিল" required style="height: 42px; border-radius: 8px;" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1 d-block">স্ট্যাটাস *</label>
                        <select class="form-select" id="EditExpenseTypeStatus" style="height: 42px; border-radius: 8px; border-color: #cbd5e1;">
                            <option value="Active" selected>Active (সক্রিয়)</option>
                            <option value="InActive">Inactive (নিষ্ক্রিয়)</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn px-4 py-2 text-white" onclick="closeEditBrandModal()" style="background-color: #ef4444 !important; border: none; border-radius: 8px; font-weight: 600; padding: 10px 24px !important;">বাতিল</button>
                    <button type="submit" class="btn px-4 py-2 fw-bold text-white" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; border-radius: 8px; padding: 10px 24px !important;">আপডেট করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Expense Type Modal End -->

<!-- Quick Add New Staff Modal Start (Only Bangla) -->
<div class="newbrand" id="addStaffQuickModal">
    <div class="newbrand-content shadow-lg border-0">
        <div class="modal-header py-3 px-4 d-flex align-items-center justify-content-between text-white" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;">
            <h5 class="fw-bold mb-0 text-white d-flex align-items-center gap-2" style="font-size: 16px;">
                <i class="fa-solid fa-user-plus"></i> <span>নতুন স্টাফ যুক্ত করুন</span>
            </h5>
            <button type="button" class="btn btn-sm text-white border-0 rounded-circle d-flex align-items-center justify-content-center" onclick="closeStaffQuickModal()" style="background-color: #ef4444 !important; width: 28px; height: 28px; font-size: 13px;">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="p-4">
            <form onsubmit="saveQuickStaff(event)">
                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1 d-block">স্টাফের পূর্ণ নাম *</label>
                        <input type="text" id="QuickStaffName" class="form-control" placeholder="যেমন: মোঃ রফিক আহমেদ" required style="height: 42px; border-radius: 8px;" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1 d-block">মোবাইল নম্বর *</label>
                        <input type="text" id="QuickStaffMobile" class="form-control" placeholder="017XXXXXXXX" required style="height: 42px; border-radius: 8px;" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1 d-block">ইমেইল (ঐচ্ছিক)</label>
                        <input type="email" id="QuickStaffEmail" class="form-control" placeholder="staff@anisstore.com" style="height: 42px; border-radius: 8px;" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-secondary mb-1 d-block">পদবী / রোল *</label>
                        <select class="form-select" id="QuickStaffRole" style="height: 42px; border-radius: 8px; border-color: #cbd5e1;">
                            <option value="staff" selected>Staff (কর্মচারী)</option>
                            <option value="cashier">Cashier (ক্যাশিয়ার)</option>
                            <option value="manager">Manager (ম্যানেজার)</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn px-4 py-2 text-white" onclick="closeStaffQuickModal()" style="background-color: #ef4444 !important; border: none; border-radius: 8px; font-weight: 600; padding: 10px 24px !important;">বাতিল</button>
                    <button type="submit" class="btn px-4 py-2 fw-bold text-white" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; border-radius: 8px; padding: 10px 24px !important;">সেভ স্টাফ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Quick Add New Staff Modal End -->

<!-- Custom Confirmation Modal for Expense Type Deletion (Replacing browser confirm alert) -->
<div class="newbrand" id="typeDeleteConfirmationModal" style="z-index: 10000005 !important;">
    <div class="newbrand-content shadow-lg border-0 text-center p-3" style="max-width: 420px; border-radius: 16px; padding: 16px !important;">
        <div class="pb-2">
            <div class="rounded-circle bg-danger-subtle text-danger d-inline-flex align-items-center justify-content-center mb-2" style="width: 40px; height: 36px;">
                <i class="fa-solid fa-triangle-exclamation fs-3"></i>
            </div>
            <h5 class="fw-bold text-dark mb-1">টাইপ মুছে ফেলবেন?</h5>
            <p class="text-secondary small mb-3">আপনি কি নিশ্চিত যে "<span id="deleteTypeNameSpan" class="fw-bold text-danger"></span>" খরচের টাইপটি মুছে ফেলতে চান?</p>
            <input type="hidden" id="deleteTypeID" />
        </div>
        <div class="d-flex justify-content-center gap-2">
            <button type="button" class="btn px-4 py-2 text-white" onclick="closeTypeDeleteModal()" style="background-color: #ef4444 !important; border: none; border-radius: 8px; font-weight: 600; padding: 9px 22px !important;">বাতিল</button>
            <button type="button" onclick="confirmDeleteExpenseType()" class="btn btn-outline-danger px-4 py-2 fw-bold" style="border-radius: 8px; padding: 9px 22px !important;">
                <i class="fa-solid fa-trash-can me-1"></i> হ্যাঁ, মুছে ফেলুন
            </button>
        </div>
    </div>
</div>

<!-- Global Floating Staff Dropdown (Root Level appended to body) -->
<div id="globalFloatingStaffMenu" class="p-2 shadow-lg">
    <div class="p-1 mb-1 position-relative">
        <input type="text" id="floatingStaffSearchInput" class="form-control form-control-sm ps-4" placeholder="স্টাফ খুঁজুন..." oninput="onFloatingStaffSearch(this.value)" style="border-radius: 6px; font-size: 12px; height: 34px;" autocomplete="off" />
        <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="left: 10px; top: 11px; font-size: 11px;"></i>
    </div>
    <div id="floatingStaffListContainer" style="max-height: 180px; overflow-y: auto;">
        <!-- Injected dynamically -->
    </div>
</div>

<script>
    let globalExpenseTypes = [];
    let globalStaffList = [];
    let expenseDatePickerInstance = null;
    let currentActiveStaffTypeId = null;

    document.addEventListener("DOMContentLoaded", function () {
        // Append all modals directly to document.body so they are 100% viewport-centered & on top
        const mainCreateModal = document.getElementById('createProduct');
        if (mainCreateModal && mainCreateModal.parentElement !== document.body) {
            document.body.appendChild(mainCreateModal);
        }
        const bModal = document.getElementById('addBrandModal');
        if (bModal && bModal.parentElement !== document.body) {
            document.body.appendChild(bModal);
        }
        const ebModal = document.getElementById('editBrandModal');
        if (ebModal && ebModal.parentElement !== document.body) {
            document.body.appendChild(ebModal);
        }
        const sModal = document.getElementById('addStaffQuickModal');
        if (sModal && sModal.parentElement !== document.body) {
            document.body.appendChild(sModal);
        }
        const tDelModal = document.getElementById('typeDeleteConfirmationModal');
        if (tDelModal && tDelModal.parentElement !== document.body) {
            document.body.appendChild(tDelModal);
        }
        const floatMenu = document.getElementById('globalFloatingStaffMenu');
        if (floatMenu && floatMenu.parentElement !== document.body) {
            document.body.appendChild(floatMenu);
        }

        initExpenseDatePicker();
        loadExpenseTypesAndStaff();

        // Close modals when clicked outside
        document.getElementById('createProduct')?.addEventListener('click', function(e) {
            if (e.target === this) closeExpenseModal();
        });
        document.getElementById('addBrandModal')?.addEventListener('click', function(e) {
            if (e.target === this) closeBrandModal();
        });
        document.getElementById('editBrandModal')?.addEventListener('click', function(e) {
            if (e.target === this) closeEditBrandModal();
        });
        document.getElementById('addStaffQuickModal')?.addEventListener('click', function(e) {
            if (e.target === this) closeStaffQuickModal();
        });
        document.getElementById('typeDeleteConfirmationModal')?.addEventListener('click', function(e) {
            if (e.target === this) closeTypeDeleteModal();
        });

        // Close floating staff dropdown when clicked outside
        document.addEventListener('click', function(e) {
            const menu = document.getElementById('globalFloatingStaffMenu');
            if (menu && menu.style.display === 'block') {
                if (!menu.contains(e.target) && !e.target.closest('.staff-dropdown-btn')) {
                    hideFloatingStaffMenu();
                }
            }
        });
    });

    function initExpenseDatePicker() {
        const input = document.getElementById('ExpenseDate');
        if (!input) return;

        if (typeof flatpickr !== 'undefined') {
            expenseDatePickerInstance = flatpickr(input, {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                monthSelectorType: "static",
                allowInput: false
            });
        } else {
            setTimeout(initExpenseDatePicker, 100);
        }
    }

    async function loadExpenseTypesAndStaff() {
        try {
            const [typesRes, staffRes] = await Promise.all([
                axios.get('/api/expense-type-list', HeaderToken()),
                axios.get('/api/staff-list', HeaderToken())
            ]);

            if (typesRes.data.status === 'success' || typesRes.data.ExpenseTypeData) {
                globalExpenseTypes = typesRes.data.ExpenseTypeData || [];
            }
            if (staffRes.data.status === 'success') {
                globalStaffList = staffRes.data.StaffData || [];
            }

            renderExpenseTypeCheckboxes();
        } catch (e) {
            console.error("Error loading expense types or staff:", e);
        }
    }

    function renderExpenseTypeCheckboxes() {
        const container = document.getElementById('ExpenseTypesContainer');
        if (!container) return;

        if (globalExpenseTypes.length === 0) {
            container.innerHTML = `<div class="text-muted py-3 text-center">কোনো এক্সপেন্স টাইপ পাওয়া যায়নি। উপরে "নতুন টাইপ" এ ক্লিক করুন।</div>`;
            return;
        }

        let html = '';
        globalExpenseTypes.forEach(type => {
            const isSalary = type.type_name.toLowerCase().includes('salary') || type.type_name.includes('বেতন') || type.type_name.toLowerCase().includes('staff');
            const safeName = (type.type_name || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
            
            html += `
                <div class="expense-type-row border rounded-3 p-2.5 transition-all mb-2" id="type-row-${type.id}">
                    <div class="d-flex align-items-center justify-content-between gap-2 pb-2">
                        <div class="form-check mb-0 d-flex align-items-center gap-2">
                            <input class="form-check-input type-checkbox flex-shrink-0" type="checkbox" value="${type.id}" id="chk-${type.id}" onchange="toggleTypeInputs(${type.id})" style="width: 22px; height: 22px; cursor: pointer;" />
                            <label class="form-check-label fw-bold text-dark mb-0 d-flex align-items-center flex-wrap gap-1" for="chk-${type.id}" style="cursor: pointer; font-size: 14px;">
                                <span>${type.type_name}</span>
                                ${isSalary ? '<span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-0.5 small fw-bold" style="font-size: 10px;">👨‍💼 স্টাফ বেতন</span>' : ''}
                            </label>
                        </div>

                        <!-- Box-type Action Buttons with proper gap -->
                        <div class="d-flex align-items-center flex-shrink-0" style="gap: 8px !important;">
                            <button type="button" class="btn btn-sm rounded-2 d-flex align-items-center justify-content-center p-0" onclick="openEditBrandModal(${type.id}, '${safeName}')" title="এডিট টাইপ" style="width: 32px; height: 32px; background: #E0F2FE; border: 1px solid #BAE6FD; color: #0284C7;">
                                <i class="fa-solid fa-pen-to-square" style="font-size: 12.5px;"></i>
                            </button>
                            <button type="button" class="btn btn-sm rounded-2 d-flex align-items-center justify-content-center p-0" onclick="openTypeDeleteModal(${type.id}, '${safeName}')" title="মুছে ফেলুন" style="width: 32px; height: 32px; background: #FEE2E2; border: 1px solid #FECACA; color: #DC2626;">
                                <i class="fa-solid fa-trash-can" style="font-size: 12.5px;"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Clean Form Inputs (Bangla Only) -->
                    <div class="type-input-group mt-2.5 d-none pt-2.5 border-top" id="input-group-${type.id}">
                        <div class="row g-2">
                            <!-- Amount -->
                            <div class="col-12 col-sm-6">
                                <label class="form-label small fw-bold text-secondary mb-1">টাকার পরিমাণ (৳) *</label>
                                <input type="number" step="any" inputmode="decimal" pattern="[0-9]*" class="form-control amount-input fw-bold text-dark" id="amount-${type.id}" placeholder="0.00" style="height: 42px; font-size: 15px; border-radius: 8px;" />
                            </div>

                            <!-- Modern Root-Floating Staff Dropdown with Gap from Add Button -->
                            <div class="col-12 col-sm-6">
                                <label class="form-label small fw-bold text-secondary mb-1">
                                    স্টাফ নির্বাচন ${isSalary ? '<span class="text-danger">*</span>' : '(ঐচ্ছিক)'}
                                </label>
                                <div class="d-flex align-items-center" style="gap: 8px !important;">
                                    <input type="hidden" class="staff-select" id="staff-${type.id}" value="" />
                                    <button type="button" class="form-control staff-dropdown-btn text-start d-flex align-items-center justify-content-between px-3 flex-grow-1" onclick="toggleStaffDropdown(${type.id}, this)" id="staff-trigger-${type.id}" style="height: 42px; border-radius: 8px; font-size: 13px; cursor: pointer;">
                                        <span class="text-truncate text-muted fw-bold" id="staff-display-${type.id}">-- স্টাফ নির্বাচন করুন --</span>
                                        <i class="fa-solid fa-chevron-down ms-1 text-muted" style="font-size: 11px;"></i>
                                    </button>
                                    <button class="btn staff-add-quick-btn p-0 d-flex align-items-center justify-content-center flex-shrink-0" type="button" onclick="openStaffQuickModal()" title="নতুন স্টাফ যুক্ত করুন" style="width: 42px; height: 42px; border-radius: 8px;">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Details Note Field -->
                            <div class="col-12">
                                <label class="form-label small fw-bold text-secondary mb-1">খরচের বিবরণ (ঐচ্ছিক)</label>
                                <input type="text" class="form-control details-input" id="details-${type.id}" placeholder="${isSalary ? 'মাসের বেতন / অগ্রিম প্রদান' : 'খরচের বিবরণ লিখুন...'}" style="height: 40px; font-size: 13px; border-radius: 8px;" />
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;
    }

    // Toggle Root Level Floating Staff Menu (Never gets clipped inside modal)
    function toggleStaffDropdown(typeId, triggerElement) {
        const menu = document.getElementById('globalFloatingStaffMenu');
        if (!menu) return;

        if (menu.style.display === 'block' && currentActiveStaffTypeId === typeId) {
            hideFloatingStaffMenu();
            return;
        }

        currentActiveStaffTypeId = typeId;
        const rect = triggerElement.getBoundingClientRect();
        
        menu.style.width = `${Math.max(rect.width, 240)}px`;
        menu.style.top = `${rect.bottom + 4}px`;
        menu.style.left = `${rect.left}px`;
        menu.style.display = 'block';

        renderFloatingStaffOptions(typeId, '');
        
        setTimeout(() => {
            const searchInp = document.getElementById('floatingStaffSearchInput');
            if (searchInp) {
                searchInp.value = '';
                searchInp.focus();
            }
        }, 80);
    }

    function hideFloatingStaffMenu() {
        const menu = document.getElementById('globalFloatingStaffMenu');
        if (menu) menu.style.display = 'none';
        currentActiveStaffTypeId = null;
    }

    function onFloatingStaffSearch(query) {
        if (currentActiveStaffTypeId) {
            renderFloatingStaffOptions(currentActiveStaffTypeId, query);
        }
    }

    function renderFloatingStaffOptions(typeId, searchFilter = '') {
        const listContainer = document.getElementById('floatingStaffListContainer');
        if (!listContainer) return;

        const filterVal = (searchFilter || '').toLowerCase().trim();
        const filtered = globalStaffList.filter(s => {
            const name = (s.name || '').toLowerCase();
            const mobile = (s.mobile || '').toLowerCase();
            return name.includes(filterVal) || mobile.includes(filterVal);
        });

        let html = '';
        if (filtered.length === 0) {
            html = `<div class="p-3 text-center text-muted small">কোনো স্টাফ পাওয়া যায়নি</div>`;
        } else {
            filtered.forEach(s => {
                const label = `${s.name} (${s.mobile || 'Staff'})`;
                const safeLabel = label.replace(/'/g, "\\'").replace(/"/g, '&quot;');
                html += `
                    <div class="staff-option-item p-2 rounded-2 cursor-pointer small text-dark d-flex align-items-center justify-content-between transition-all" onclick="selectStaffFromFloatingMenu(${typeId}, ${s.id}, '${safeLabel}')" style="cursor: pointer; font-size: 12.5px;">
                        <div>
                            <div class="fw-bold">${s.name}</div>
                            <small class="text-muted" style="font-size: 11px;"><i class="fa-solid fa-phone me-1"></i>${s.mobile || '-'}</small>
                        </div>
                        <span class="badge bg-primary-subtle text-primary border px-2 py-0.5" style="font-size: 10px;">${s.role || 'staff'}</span>
                    </div>
                `;
            });
        }

        listContainer.innerHTML = html;
    }

    function selectStaffFromFloatingMenu(typeId, staffId, staffName) {
        const hiddenInput = document.getElementById(`staff-${typeId}`);
        const displaySpan = document.getElementById(`staff-display-${typeId}`);

        if (hiddenInput) hiddenInput.value = staffId;
        if (displaySpan) {
            displaySpan.innerText = staffName;
            displaySpan.classList.add('text-dark');
            displaySpan.classList.remove('text-muted');
        }
        hideFloatingStaffMenu();
    }

    function toggleTypeInputs(typeId) {
        const chk = document.getElementById(`chk-${typeId}`);
        const group = document.getElementById(`input-group-${typeId}`);
        const row = document.getElementById(`type-row-${typeId}`);

        if (chk && chk.checked) {
            group.classList.remove('d-none');
            row.classList.add('selected-row');
            setTimeout(() => {
                document.getElementById(`amount-${typeId}`)?.focus();
            }, 100);
        } else {
            group.classList.add('d-none');
            row.classList.remove('selected-row');
        }
    }

    async function saveExpenseType(event) {
        event.preventDefault();
        try {
            const expenseTypeName = document.getElementById('CreateExpenseTypeName').value.trim();
            const expenseStatus = document.getElementById('ExpenseSelectStatus').value;

            if (!expenseTypeName) {
                errorToast("টাইপের নাম প্রদান করুন!");
                return;
            }

            const formData = new FormData();
            formData.append('type_name', expenseTypeName);
            formData.append('status', expenseStatus);

            const config = { headers: { 'Content-Type': 'multipart/form-data', ...HeaderToken().headers } };
            const res = await axios.post("/api/create-expense-type", formData, config);

            if (res.data.status === "success") {
                successToast(res.data.message || "নতুন টাইপ তৈরি হয়েছে!");
                document.getElementById('CreateExpenseTypeName').value = '';
                closeBrandModal();
                await loadExpenseTypesAndStaff();
            } else {
                errorToast(res.data.message);
            }
        } catch (e) {
            unauthorized(e.response?.status || 500);
        }
    }

    async function saveQuickStaff(event) {
        event.preventDefault();
        try {
            const name = document.getElementById('QuickStaffName').value.trim();
            const mobile = document.getElementById('QuickStaffMobile').value.trim();
            const email = document.getElementById('QuickStaffEmail').value.trim();
            const role = document.getElementById('QuickStaffRole').value;

            if (!name || !mobile) {
                errorToast("স্টাফের নাম এবং মোবাইল নম্বর আবশ্যক!");
                return;
            }

            const formData = new FormData();
            formData.append('name', name);
            formData.append('mobile', mobile);
            formData.append('email', email);
            formData.append('password', '123456');
            formData.append('role', role);
            formData.append('status', 'approved');

            const res = await axios.post('/create-user-admin', formData, HeaderToken());

            if (res.data.status === 'success') {
                successToast("নতুন স্টাফ সফলভাবে তৈরি হয়েছে!");
                document.getElementById('QuickStaffName').value = '';
                document.getElementById('QuickStaffMobile').value = '';
                document.getElementById('QuickStaffEmail').value = '';
                closeStaffQuickModal();
                await loadExpenseTypesAndStaff();
            } else {
                errorToast(res.data.message || "স্টাফ তৈরিতে ব্যর্থ হয়েছে!");
            }
        } catch (e) {
            console.error("Save quick staff error:", e);
            errorToast("ত্রুটি! স্টাফ সংরক্ষণ করা যায়নি।");
        }
    }

    async function Save(event) {
        event.preventDefault();

        const rawDate = document.getElementById('ExpenseDate').value.trim();
        if (!rawDate) {
            errorToast("তারিখ নির্বাচন করুন!");
            return;
        }

        // Format d-m-Y to Y-m-d
        let expenseDate = rawDate;
        if (rawDate.includes('-')) {
            const parts = rawDate.split('-');
            if (parts[0].length === 2 && parts[2].length === 4) {
                expenseDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
            }
        }

        const selectedTypes = [];
        const checkboxes = document.querySelectorAll('.type-checkbox:checked');

        if (checkboxes.length === 0) {
            errorToast("অনুগ্রহ করে অন্তত একটি খরচের খাত সিলেক্ট করুন!");
            return;
        }

        let hasError = false;
        checkboxes.forEach(chk => {
            const typeId = chk.value;
            const amountInput = document.getElementById(`amount-${typeId}`);
            const detailsInput = document.getElementById(`details-${typeId}`);
            const staffSelect = document.getElementById(`staff-${typeId}`);

            const amount = parseFloat(amountInput ? amountInput.value : 0);
            const details = detailsInput ? detailsInput.value.trim() : '';
            const staffId = staffSelect ? staffSelect.value : null;

            if (!amount || amount <= 0) {
                errorToast(`সিলেক্ট করা খাতের জন্য বৈধ টাকার পরিমাণ প্রদান করুন!`);
                hasError = true;
                return;
            }

            const typeObj = globalExpenseTypes.find(t => t.id == typeId);
            const isSalary = typeObj && (typeObj.type_name.toLowerCase().includes('salary') || typeObj.type_name.includes('বেতন') || typeObj.type_name.toLowerCase().includes('staff'));

            if (isSalary && !staffId) {
                errorToast(`"${typeObj ? typeObj.type_name : 'বেতন'}" খাতের জন্য স্টাফ সিলেক্ট করা আবশ্যক!`);
                hasError = true;
                return;
            }

            selectedTypes.push({
                expense_type_id: typeId,
                type_id: typeId,
                amount: amount,
                expense_amount: amount,
                details: details,
                expense_details: details,
                staff_id: staffId || null,
                date: expenseDate
            });
        });

        if (hasError) return;

        try {
            showLoader();
            const res = await axios.post('/api/create-expense', {
                date: expenseDate,
                items: selectedTypes,
                expenses: selectedTypes
            }, HeaderToken());
            hideLoader();

            if (res.data.status === 'success') {
                successToast(res.data.message || "এক্সপেন্স সফলভাবে সংরক্ষণ হয়েছে!");
                closeExpenseModal();
                if (typeof getExpenseList === 'function') {
                    await getExpenseList();
                } else {
                    setTimeout(() => location.reload(), 500);
                }
            } else {
                errorToast(res.data.message || "এক্সপেন্স সংরক্ষণ ব্যর্থ হয়েছে!");
            }
        } catch (e) {
            hideLoader();
            console.error("Save expense error:", e);
            errorToast(e.response?.data?.message || "একটি সমস্যা হয়েছে! পুনরায় চেষ্টা করুন।");
        }
    }

    function resetExpenseForm() {
        const form = document.getElementById('expenseForm');
        if (form) form.reset();

        if (expenseDatePickerInstance) {
            expenseDatePickerInstance.setDate(new Date());
        }

        document.querySelectorAll('.type-checkbox').forEach(chk => {
            chk.checked = false;
        });
        document.querySelectorAll('.type-input-group').forEach(grp => {
            grp.classList.add('d-none');
        });
        document.querySelectorAll('.expense-type-row').forEach(row => {
            row.classList.remove('selected-row');
        });
        document.querySelectorAll('.staff-select').forEach(s => {
            s.value = '';
        });
        document.querySelectorAll('[id^="staff-display-"]').forEach(d => {
            d.innerText = '-- স্টাফ নির্বাচন করুন --';
            d.classList.add('text-muted');
            d.classList.remove('text-dark');
        });
        hideFloatingStaffMenu();
    }

    function openEditBrandModal(id, name) {
        document.getElementById('EditExpenseTypeId').value = id;
        document.getElementById('EditExpenseTypeName').value = name;
        const modal = document.getElementById('editBrandModal');
        if (modal) {
            modal.classList.add('expense-sub-modal-open');
            modal.style.setProperty('display', 'flex', 'important');
        }
    }

    function closeEditBrandModal() {
        const modal = document.getElementById('editBrandModal');
        if (modal) {
            modal.classList.remove('expense-sub-modal-open');
            modal.style.setProperty('display', 'none', 'important');
        }
    }

    async function updateExpenseTypeSubmit(event) {
        event.preventDefault();
        try {
            const id = document.getElementById('EditExpenseTypeId').value;
            const type_name = document.getElementById('EditExpenseTypeName').value.trim();
            const status = document.getElementById('EditExpenseTypeStatus').value;

            if (!type_name) {
                if (typeof errorToast === "function") errorToast("টাইপের নাম প্রদান করুন!");
                return;
            }

            if (typeof showLoader === "function") showLoader();
            const res = await axios.post('/api/update-expense-type', { id: id, type_name: type_name, status: status }, HeaderToken());
            if (typeof hideLoader === "function") hideLoader();

            if (res.data.status === 'success') {
                if (typeof successToast === "function") successToast("এক্সপেন্স টাইপ আপডেট হয়েছে!");
                closeEditBrandModal();
                await loadExpenseTypesAndStaff();
                if (typeof getExpenseList === "function") getExpenseList();
            } else {
                if (typeof errorToast === "function") errorToast(res.data.message || "টাইপ আপডেট ব্যর্থ হয়েছে!");
            }
        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error("Update Expense Type Error:", e);
        }
    }

    // Custom Confirmation Modal for Expense Type Deletion (No browser alert)
    function openTypeDeleteModal(id, name) {
        document.getElementById('deleteTypeID').value = id;
        document.getElementById('deleteTypeNameSpan').innerText = name;
        const modal = document.getElementById('typeDeleteConfirmationModal');
        if (modal) {
            modal.classList.add('expense-sub-modal-open');
            modal.style.setProperty('display', 'flex', 'important');
        }
    }

    function closeTypeDeleteModal() {
        const modal = document.getElementById('typeDeleteConfirmationModal');
        if (modal) {
            modal.classList.remove('expense-sub-modal-open');
            modal.style.setProperty('display', 'none', 'important');
        }
    }

    async function confirmDeleteExpenseType() {
        const id = document.getElementById('deleteTypeID').value;
        if (!id) return;

        try {
            closeTypeDeleteModal();
            if (typeof showLoader === "function") showLoader();
            const res = await axios.post('/api/delete-expense-type', { id: id }, HeaderToken());
            if (typeof hideLoader === "function") hideLoader();

            if (res.data.status === 'success') {
                if (typeof successToast === "function") successToast("এক্সপেন্স টাইপ মুছে ফেলা হয়েছে!");
                await loadExpenseTypesAndStaff();
                if (typeof getExpenseList === "function") getExpenseList();
            } else {
                if (typeof errorToast === "function") errorToast(res.data.message || "টাইপ মুছে ফেলা ব্যর্থ হয়েছে!");
            }
        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error("Delete Expense Type Error:", e);
        }
    }

    function openBrandModal() {
        const modal = document.getElementById('addBrandModal');
        if (modal) {
            modal.classList.add('expense-sub-modal-open');
            modal.style.setProperty('display', 'flex', 'important');
        }
    }

    function closeBrandModal() {
        const modal = document.getElementById('addBrandModal');
        if (modal) {
            modal.classList.remove('expense-sub-modal-open');
            modal.style.setProperty('display', 'none', 'important');
        }
    }

    function openStaffQuickModal() {
        const modal = document.getElementById('addStaffQuickModal');
        if (modal) {
            modal.classList.add('expense-sub-modal-open');
            modal.style.setProperty('display', 'flex', 'important');
        }
    }

    function closeStaffQuickModal() {
        const modal = document.getElementById('addStaffQuickModal');
        if (modal) {
            modal.classList.remove('expense-sub-modal-open');
            modal.style.setProperty('display', 'none', 'important');
        }
    }

    function openExpenseModal() {
        const modalSection = document.getElementById('createProduct');
        if (modalSection) {
            modalSection.style.display = 'flex';
            modalSection.style.opacity = '1';
        }

        // Lock background scroll completely (Zero Window Scroll per rules.md line 64)
        document.body.style.overflow = 'hidden';
        document.documentElement.style.overflow = 'hidden';

        // Auto-check first type if none checked
        const firstCheckbox = document.querySelector('.type-checkbox');
        if (firstCheckbox && !document.querySelector('.type-checkbox:checked')) {
            firstCheckbox.checked = true;
            toggleTypeInputs(firstCheckbox.value);
        }

        // Auto-focus amount input to trigger virtual keyboard immediately
        setTimeout(() => {
            const firstAmountInput = document.querySelector('.type-input-group:not(.d-none) .amount-input');
            if (firstAmountInput) {
                firstAmountInput.focus();
            }
        }, 250);
    }

    function closeExpenseModal() {
        resetExpenseForm();
        const modalSection = document.getElementById('createProduct');
        if (modalSection) {
            modalSection.style.display = 'none';
            modalSection.style.opacity = '0';
        }

        // Restore background scroll
        document.body.style.overflow = '';
        document.documentElement.style.overflow = '';
    }

    document.querySelector('.newbrand-open')?.addEventListener('click', openBrandModal);
    document.querySelector('.newbrand-close')?.addEventListener('click', closeBrandModal);
</script>
