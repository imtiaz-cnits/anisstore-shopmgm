<!-- Flatpickr CSS & JS per rules.md -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    /* ========================================================
       PURCHASE PAGE DESIGN SYSTEM (Matching POS Page & rules.md)
       Brand: Royal Purple (#8C56D4 / #793FC5 / #F3ECFB / #E5D5F7)
       ======================================================== */

    /* Flatpickr Royal Purple Theme - Light & Dark */
    .flatpickr-calendar {
        font-family: var(--primary-font, 'Noto Sans Bengali', 'Poppins', sans-serif) !important;
        border-radius: 14px !important;
        box-shadow: 0 12px 30px rgba(140, 86, 212, 0.25) !important;
        border: 1px solid #E5D5F7 !important;
        background: #ffffff !important;
        z-index: 105099 !important;
    }
    .flatpickr-calendar .flatpickr-months {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        border-top-left-radius: 13px !important;
        border-top-right-radius: 13px !important;
        padding: 6px 0 !important;
    }
    .flatpickr-calendar .flatpickr-month {
        color: #ffffff !important;
        fill: #ffffff !important;
    }
    .flatpickr-current-month {
        color: #ffffff !important;
    }
    .flatpickr-current-month .cur-month {
        font-weight: 700 !important;
        color: #ffffff !important;
    }
    .flatpickr-current-month .flatpickr-monthDropdown-months,
    .flatpickr-current-month input.cur-year {
        color: #ffffff !important;
        font-weight: 700 !important;
    }
    .flatpickr-calendar .flatpickr-prev-month,
    .flatpickr-calendar .flatpickr-next-month {
        color: #ffffff !important;
        fill: #ffffff !important;
        padding: 6px 10px !important;
    }
    .flatpickr-calendar .flatpickr-prev-month svg,
    .flatpickr-calendar .flatpickr-next-month svg {
        fill: #ffffff !important;
        width: 14px !important;
        height: 14px !important;
    }
    .flatpickr-calendar .flatpickr-prev-month:hover svg,
    .flatpickr-calendar .flatpickr-next-month:hover svg {
        fill: #F3ECFB !important;
    }
    .flatpickr-calendar .flatpickr-weekdays {
        background: #F3ECFB !important;
        border-bottom: 1px solid #E5D5F7 !important;
    }
    .flatpickr-calendar span.flatpickr-weekday {
        color: #8C56D4 !important;
        font-weight: 700 !important;
    }
    .flatpickr-calendar .flatpickr-day {
        border-radius: 8px !important;
        color: #1e293b !important;
        font-weight: 500 !important;
    }
    .flatpickr-calendar .flatpickr-day:hover {
        background: #F3ECFB !important;
        color: #8C56D4 !important;
        border-color: #8C56D4 !important;
    }
    .flatpickr-calendar .flatpickr-day.selected,
    .flatpickr-calendar .flatpickr-day.selected:hover {
        background: #8C56D4 !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
        font-weight: 700 !important;
    }
    .flatpickr-calendar .flatpickr-day.today {
        border-color: #8C56D4 !important;
        color: #8C56D4 !important;
    }

    /* Flatpickr Dark Mode Theme */
    body[light-mode="dark"] .flatpickr-calendar,
    body[data-layout-mode="dark"] .flatpickr-calendar,
    body.dark-mode .flatpickr-calendar,
    html[light-mode="dark"] .flatpickr-calendar {
        background: #1e293b !important;
        border: 1px solid #334155 !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6) !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-innerContainer,
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-rDays,
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-days,
    body[light-mode="dark"] .flatpickr-calendar .dayContainer,
    html[light-mode="dark"] .flatpickr-calendar .dayContainer {
        background: #1e293b !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-weekdays,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-weekdays {
        background: #0f172a !important;
        border-bottom: 1px solid #334155 !important;
    }
    body[light-mode="dark"] .flatpickr-calendar span.flatpickr-weekday,
    html[light-mode="dark"] .flatpickr-calendar span.flatpickr-weekday {
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day:hover,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day:hover {
        background: #334155 !important;
        color: #ffffff !important;
        border-color: #8C56D4 !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.selected,
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.selected:hover,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day.selected {
        background: #8C56D4 !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.today,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day.today {
        border-color: #8C56D4 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.flatpickr-disabled,
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.prevMonthDay,
    body[light-mode="dark"] .flatpickr-calendar .flatpickr-day.nextMonthDay,
    html[light-mode="dark"] .flatpickr-calendar .flatpickr-day.flatpickr-disabled {
        color: #475569 !important;
    }

    :root {
        --primary-font: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
    }

    body, html, button, input, select, textarea {
        font-family: 'Noto Sans Bengali', 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
    }

    /* MOBILE & TABLET EXCLUSIVE PURCHASE UI SYSTEM (Active on screens < 992px) */
    @media screen and (max-width: 991.98px) {
        .main-content .bredcam,
        .main-content .data-table {
            display: none !important;
        }
        .main-content .page-content {
            padding: 0 !important;
            margin: 0 !important;
        }
        
        .purchase-mobile-wrapper {
            display: block !important;
            background-color: #ffffff;
            min-height: 100vh;
            padding-bottom: 115px;
            font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            box-sizing: border-box !important;
            position: relative !important;
        }
    }

    @media screen and (min-width: 992px) {
        .purchase-mobile-wrapper {
            display: none !important;
        }
    }

    /* 1. Mobile Top Purple Header (Sticky Fixed) */
    .purchase-mobile-header {
        background: #8C56D4;
        color: #ffffff;
        padding: 8px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: sticky !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        z-index: 1040;
        box-shadow: 0 2px 10px rgba(140, 86, 212, 0.25);
        height: 52px;
        box-sizing: border-box;
    }

    .purchase-mobile-back-btn {
        color: #ffffff !important;
        font-size: 18px;
        text-decoration: none;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s ease;
    }
    .purchase-mobile-back-btn:hover {
        transform: scale(1.1);
    }

    .purchase-mobile-title {
        font-size: 17px;
        font-weight: 700;
        margin: 0;
        color: #ffffff !important;
        white-space: nowrap;
    }

    /* Mobile Header Theme Toggle Button */
    .purchase-mobile-dark-btn {
        background: rgba(255, 255, 255, 0.22) !important;
        border: 1px solid rgba(255, 255, 255, 0.4) !important;
        border-radius: 20px !important;
        width: 30px !important;
        height: 30px !important;
        min-width: 30px !important;
        min-height: 30px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        color: #ffffff !important;
        padding: 0 !important;
        transition: all 0.2s ease !important;
    }
    .purchase-mobile-dark-btn:hover {
        background: rgba(255, 255, 255, 0.35) !important;
    }
    .purchase-mobile-dark-btn .icon-moon {
        display: inline-block !important;
        font-size: 13.5px !important;
        color: #ffffff !important;
    }
    .purchase-mobile-dark-btn .icon-sun {
        display: none !important;
        font-size: 13.5px !important;
        color: #fde047 !important;
    }

    body[light-mode="dark"] .purchase-mobile-dark-btn .icon-moon,
    html[light-mode="dark"] .purchase-mobile-dark-btn .icon-moon {
        display: none !important;
    }
    body[light-mode="dark"] .purchase-mobile-dark-btn .icon-sun,
    html[light-mode="dark"] .purchase-mobile-dark-btn .icon-sun {
        display: inline-block !important;
    }

    /* 2. Sub-Header Info Bar (Bill No & Date) - With Clear Gap & 2-Column Responsive Layout */
    .purchase-mobile-subhead {
        background: #ffffff;
        padding: 34px 16px 12px 16px;
        margin-top: 4px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 12.5px;
        color: #64748b;
    }

    .subhead-val {
        color: #1e293b;
        font-weight: 600;
    }

    /* 3. Field Group Card (Supplier Selection Box) */
    .purchase-mobile-field-group {
        background: #ffffff;
        border: 1px solid #cbd5e1 !important;
        border-radius: 10px !important;
        padding: 11px 14px;
        margin: 12px 16px 10px 16px !important;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .purchase-mobile-field-group:hover {
        border-color: #8C56D4 !important;
    }

    .field-group-label-purple {
        font-size: 12px;
        font-weight: 700;
        color: #8C56D4;
        display: block;
        margin-bottom: 4px;
    }

    /* 4. Cart Section & Banner Button ("+ আইটেম যোগ করুন") */
    .purchase-mobile-item-section {
        margin: 0 16px 14px 16px !important;
    }

    .btn-add-item-banner {
        background: #F3ECFB !important;
        color: #8C56D4 !important;
        border: none !important;
        border-radius: 10px !important;
        width: 100%;
        padding: 11px 14px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .btn-add-item-banner:hover {
        background: #EDE4F9 !important;
        color: #793FC5 !important;
    }

    /* Mobile Cart Item Row */
    .mobile-cart-item-row {
        background: #FAF7FD;
        border: 1px solid #E5D5F7;
        border-radius: 10px;
        padding: 10px 12px;
        margin-top: 8px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .mobile-cart-item-row .item-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #1e293b;
    }
    .mobile-cart-item-row .item-sub {
        font-size: 12px;
        color: #64748b;
    }
    .mobile-cart-item-row .item-del-btn {
        border: none;
        background: transparent;
        color: #ef4444;
        font-size: 16px;
        padding: 4px;
        cursor: pointer;
    }

    /* 5. Pricing / Financial Calculations Card (4 Rows matching POS page) */
    .purchase-mobile-calc-card {
        background: #FAF7FD !important;
        border: 1px solid #E5D5F7 !important;
        border-radius: 12px !important;
        margin: 0 16px 14px 16px;
        padding: 10px 12px !important;
        box-shadow: 0 1px 4px rgba(140, 86, 212, 0.04);
    }

    .calc-table-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        position: relative;
    }
    .calc-table-row:last-child {
        margin-bottom: 0;
    }

    .calc-row-title {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        width: 120px;
        flex-shrink: 0;
    }

    .calc-row-sym {
        font-size: 15px;
        font-weight: 600;
        color: #475569;
        width: 24px;
        text-align: center;
        flex-shrink: 0;
    }

    .calc-input-wrapper {
        flex: 1;
        position: relative;
        max-width: 220px;
        margin-left: auto;
    }

    .calc-box-input {
        width: 100%;
        height: 38px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        padding: 0 12px;
        font-size: 15px;
        font-weight: 600;
        color: #0f172a;
        outline: none;
        background: #ffffff;
        text-align: left;
        transition: border-color 0.2s ease;
    }
    .calc-box-input:focus {
        border-color: #8C56D4;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15);
    }

    /* 6. Payment Method Section (POS-Matched Dynamic Dropdown with Add Options) */
    .purchase-mobile-payment-section {
        margin: 0 16px 14px 16px;
    }

    .payment-section-header {
        font-size: 14px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
    }

    .purchase-mobile-payment-card-box {
        background: #ffffff;
        border: 1.5px solid #E5D5F7;
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 12px;
        box-shadow: 0 2px 6px rgba(140, 86, 212, 0.04);
        transition: all 0.2s ease;
    }
    .purchase-mobile-payment-card-box:focus-within {
        border-color: #8C56D4;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.12);
    }

    .payment-top-select-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .payment-method-custom-btn {
        border: 1.5px solid #E5D5F7 !important;
        border-radius: 10px !important;
        background: #ffffff !important;
        height: 42px !important;
        padding: 0 12px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        width: 100% !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        outline: none !important;
    }
    .payment-method-custom-btn:hover,
    .payment-method-custom-btn:focus,
    .payment-method-custom-btn:active,
    .payment-method-custom-btn.show,
    .payment-method-custom-btn[aria-expanded="true"],
    .dropdown.show > .payment-method-custom-btn {
        border: 1.5px solid #8C56D4 !important;
        background: #ffffff !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.18) !important;
        outline: none !important;
    }

    .dropdown-category-header {
        background: #F3ECFB !important;
        border: 1px solid #E5D5F7 !important;
        border-radius: 8px !important;
        padding: 6px 10px !important;
        margin: 6px 4px 4px 4px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
    }

    .dropdown-category-title {
        font-size: 12px !important;
        font-weight: 700 !important;
        color: #8C56D4 !important;
        letter-spacing: 0.3px !important;
        display: flex !important;
        align-items: center !important;
        gap: 6px !important;
    }

    .btn-add-payment-opt {
        border: none !important;
        background: #8C56D4 !important;
        color: #ffffff !important;
        width: 22px !important;
        height: 22px !important;
        border-radius: 6px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 11px !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        padding: 0 !important;
    }
    .btn-add-payment-opt:hover {
        background: #793FC5 !important;
        transform: scale(1.15) !important;
        color: #ffffff !important;
    }

    .payment-bottom-amount-row {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .payment-amount-input-box {
        display: flex;
        align-items: center;
        border: 1.5px solid #E5D5F7;
        border-radius: 10px;
        overflow: hidden;
        flex: 1;
        height: 42px;
        background: #ffffff;
        transition: border-color 0.2s ease;
    }
    .payment-amount-input-box:focus-within {
        border-color: #8C56D4;
    }
    .payment-amount-input-box .currency-tag {
        background: #F3ECFB;
        color: #8C56D4;
        font-size: 16px;
        font-weight: 700;
        padding: 0 14px;
        height: 100%;
        display: flex;
        align-items: center;
        border-right: 1.5px solid #E5D5F7;
        flex-shrink: 0;
    }
    .payment-amount-input-box input {
        border: none;
        outline: none;
        width: 100%;
        padding: 0 12px;
        font-size: 15px;
        font-weight: 600;
        color: #0f172a;
        background: transparent;
    }

    .payment-extra-fields-wrap {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px dashed #E5D5F7;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .payment-extra-input-row {
        position: relative;
    }

    .extra-icon-addon {
        background: #F3ECFB !important;
        border: 1.5px solid #E5D5F7 !important;
        border-right: none !important;
        color: #8C56D4 !important;
        font-size: 13px !important;
        border-top-left-radius: 8px !important;
        border-bottom-left-radius: 8px !important;
        padding: 0 10px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .payment-extra-input {
        border: 1.5px solid #E5D5F7 !important;
        border-left: none !important;
        border-top-right-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        height: 38px !important;
        font-size: 13px !important;
        color: #1e293b !important;
        background: #ffffff !important;
        box-shadow: none !important;
        outline: none !important;
        width: 100%;
        padding: 0 10px;
    }
    .payment-extra-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: none !important;
    }

    /* 7. Additional Note & Document Attachment Card */
    .purchase-mobile-note-section {
        margin: 0 16px 14px 16px;
    }

    .pos-dashed-upload-box {
        border: 1.5px dashed #D2B7F1;
        border-radius: 14px;
        background: #FAF7FD;
        padding: 16px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .pos-dashed-upload-box:hover {
        background: #F3ECFB;
        border-color: #8C56D4;
    }

    /* 8. Sticky Footer Save Button Bar */
    .purchase-mobile-footer-bar {
        position: fixed !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        background: #ffffff;
        padding: 10px 16px;
        box-shadow: 0 -4px 16px rgba(0, 0, 0, 0.1);
        z-index: 1030;
        border-top: 1.5px solid #E5D5F7;
    }

    .btn-save-purchase-mobile {
        width: 100%;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        border: none;
        color: #ffffff;
        font-size: 16.5px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(140, 86, 212, 0.35);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: transform 0.15s ease;
    }
    .btn-save-purchase-mobile:hover {
        background: linear-gradient(135deg, #793FC5 0%, #672EB0 100%) !important;
        transform: translateY(-1px);
    }

    /* ========================================================
       MODAL STANDARDIZATION & Z-INDEX HIERARCHY
       Level 1 (Base): Bottom-sheet Search Modals (z-index: 105050)
       Level 2: Item Line / Form Edit Modals (z-index: 106000)
       Level 3: Full Create / Update Modals (z-index: 107000)
       Level 4 (Top): SweetAlert2 Popups (z-index: 200000)
       ======================================================== */
    .modal {
        z-index: 105050 !important;
    }
    .modal-backdrop.show {
        z-index: 105040 !important;
    }

    /* SweetAlert2 Highest Priority (Above All Modals) */
    .swal2-container {
        z-index: 200000 !important;
    }

    /* Create & Update Modals Above Search Bottom Sheet */
    #supplierCreateModal,
    #myModal.newbrand,
    #supplierUpdateModal,
    #createProduct,
    #updateProductModal,
    #modalAddBank,
    #modalAddMobileBanking {
        z-index: 107000 !important;
    }

    /* Red Cancel Buttons */
    .btn-cancel-red,
    .pos-modal-btn-cancel {
        background: #ef4444 !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 10px !important;
        font-weight: 700 !important;
        transition: all 0.2s ease !important;
    }
    .btn-cancel-red:hover,
    .pos-modal-btn-cancel:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
    }

    /* Red Close Buttons */
    .btn-close-red {
        background-color: #ef4444 !important;
        color: #ffffff !important;
        border-radius: 50% !important;
        width: 30px !important;
        height: 30px !important;
        border: none !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 15px !important;
        cursor: pointer !important;
        opacity: 1 !important;
        transition: all 0.2s ease !important;
    }
    .btn-close-red:hover {
        background-color: #dc2626 !important;
        transform: rotate(90deg) scale(1.05);
    }

    /* Bottom Sheet Modals (Customer & Product Search Sheets) - 100% Attached to Bottom with NO GAP */
    .bottom-sheet.modal,
    .modal.bottom-sheet {
        z-index: 105050 !important;
        padding: 0 !important;
    }
    
    .bottom-sheet .modal-dialog,
    .modal.bottom-sheet .modal-dialog,
    .modal-dialog-bottom-sheet {
        position: fixed !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        margin: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        max-height: 85vh !important;
        max-height: 85dvh !important;
        height: auto !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-end !important;
        transform: translateY(100%);
        transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    .bottom-sheet.show .modal-dialog,
    .modal.bottom-sheet.show .modal-dialog,
    .modal.show .modal-dialog-bottom-sheet {
        transform: translateY(0) !important;
        bottom: 0 !important;
        margin-bottom: 0 !important;
    }

    .bottom-sheet .modal-content,
    .modal.bottom-sheet .modal-content,
    .modal-dialog-bottom-sheet .modal-content {
        border-top-left-radius: 24px !important;
        border-top-right-radius: 24px !important;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
        border: none !important;
        box-shadow: 0 -12px 40px rgba(0, 0, 0, 0.3) !important;
        background: #ffffff;
        max-height: 85vh !important;
        max-height: 85dvh !important;
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
        width: 100% !important;
        margin-bottom: 0 !important;
    }

    .modal-content {
        border-radius: 18px;
        border: 1px solid #E5D5F7;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
        background: #ffffff;
        overflow: hidden;
    }

    /* Purple Gradient Modal Header */
    .modal-header-sticky-purple {
        position: sticky !important;
        top: 0 !important;
        z-index: 20 !important;
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        border-bottom: 1px solid #E5D5F7 !important;
        padding: 12px 18px !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: #ffffff !important;
    }
    .modal-header-sticky-purple .modal-title {
        color: #ffffff !important;
        font-weight: 700;
        font-size: 16.5px;
    }

    /* Sticky Search Toolbar inside Modals */
    .modal-search-bar-sticky {
        position: sticky !important;
        top: 0 !important;
        z-index: 15 !important;
        background: #ffffff;
        padding: 12px 16px;
        border-bottom: 1px solid #f1f5f9;
    }

    /* Product & Supplier Search Cards inside Modals */
    .modal-list-card {
        border: 1px solid #E5D5F7 !important;
        border-radius: 12px !important;
        padding: 12px 14px;
        background: #ffffff;
        margin-bottom: 8px;
        transition: all 0.18s ease;
        cursor: pointer;
    }
    .modal-list-card:hover {
        background: #FAF7FD !important;
        border-color: #8C56D4 !important;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(140, 86, 212, 0.1);
    }

    /* Empty Cart Card Styling */
    .purchase-cart-empty-box {
        background: #FAF7FD;
        border: 1.5px dashed #E5D5F7;
        border-radius: 12px;
        text-align: center;
        padding: 24px 16px;
        margin-bottom: 10px;
        transition: all 0.2s ease;
    }

    /* Supplier Details Card Styling */
    .mobile-supplier-details-card {
        background: #FAF7FD;
        border-color: #E5D5F7 !important;
    }

    /* Desktop Modal (#exampleModal) Styles */
    #exampleModal .purchase-modal-header {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 16px 22px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    #exampleModal .purchase-modal-header h4 {
        margin: 0;
        color: #ffffff;
        font-weight: 700;
        font-size: 18px;
    }
    #exampleModal .purchase-card {
        background: #ffffff;
        border: 1px solid #E5D5F7;
        border-radius: 14px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.05);
    }
    #exampleModal .purchase-card-title {
        font-size: 15px;
        font-weight: 700;
        color: #8C56D4;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    #exampleModal .search-barcode-box {
        background: #ffffff;
        border: 1.5px solid #8C56D4;
        border-radius: 12px;
        padding: 4px;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.1);
    }
    #exampleModal .btn-submit-purchase {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff;
        font-size: 16px;
        font-weight: 700;
        padding: 14px 28px;
        border-radius: 12px;
        border: none;
        width: 100%;
        box-shadow: 0 10px 20px -5px rgba(140, 86, 212, 0.4);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s ease;
    }
    #exampleModal .btn-submit-purchase:hover {
        background: linear-gradient(135deg, #793FC5 0%, #672EB0 100%) !important;
        transform: translateY(-2px);
    }

    /* Custom Form Modals (Bank & Mobile Banking) */
    .pos-custom-form-modal {
        border-radius: 16px !important;
        border: 1px solid #E5D5F7 !important;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.28) !important;
        background: #ffffff !important;
    }
    .pos-outlined-field {
        position: relative;
        margin-bottom: 18px;
    }
    .pos-outlined-field label {
        position: absolute;
        top: -8.5px;
        left: 12px;
        background: #ffffff;
        padding: 0 6px;
        font-size: 11.5px;
        color: #64748b;
        font-weight: 600;
        z-index: 2;
        pointer-events: none;
        line-height: 1;
        border-radius: 2px;
        font-family: 'Noto Sans Bengali', sans-serif;
    }
    .pos-outlined-input {
        width: 100%;
        height: 48px;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        padding: 0 14px;
        font-size: 14.5px;
        font-weight: 600;
        color: #0f172a;
        background: #ffffff;
        outline: none;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }
    .pos-outlined-input:focus {
        border-color: #8C56D4;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15);
    }
    .pos-modal-btn-submit {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        padding: 8px 24px !important;
        border-radius: 10px !important;
        font-size: 14px !important;
    }

    /* ========================================================
       UNIVERSAL DARK MODE OVERRIDES (Strictly rules.md)
       ======================================================== */
    body[light-mode="dark"],
    body[data-layout-mode="dark"],
    body.dark-mode {
        background-color: #121212 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .purchase-mobile-wrapper,
    body[data-layout-mode="dark"] .purchase-mobile-wrapper,
    body.dark-mode .purchase-mobile-wrapper {
        background-color: #121212 !important;
    }

    body[light-mode="dark"] .purchase-mobile-subhead,
    body[data-layout-mode="dark"] .purchase-mobile-subhead,
    body.dark-mode .purchase-mobile-subhead {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .purchase-mobile-subhead .bg-light,
    body[data-layout-mode="dark"] .purchase-mobile-subhead .bg-light,
    body.dark-mode .purchase-mobile-subhead .bg-light {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .subhead-val,
    body[data-layout-mode="dark"] .subhead-val,
    body.dark-mode .subhead-val {
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .purchase-mobile-field-group,
    body[data-layout-mode="dark"] .purchase-mobile-field-group,
    body.dark-mode .purchase-mobile-field-group {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .mobile-supplier-details-card,
    body[data-layout-mode="dark"] .mobile-supplier-details-card,
    body.dark-mode .mobile-supplier-details-card {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .mobile-supplier-details-card strong.text-dark {
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .purchase-cart-empty-box,
    body[data-layout-mode="dark"] .purchase-cart-empty-box,
    body.dark-mode .purchase-cart-empty-box {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #94a3b8 !important;
    }

    body[light-mode="dark"] .purchase-mobile-calc-card,
    body[data-layout-mode="dark"] .purchase-mobile-calc-card,
    body.dark-mode .purchase-mobile-calc-card {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .calc-row-title,
    body[data-layout-mode="dark"] .calc-row-title,
    body.dark-mode .calc-row-title {
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .calc-row-sym,
    body[data-layout-mode="dark"] .calc-row-sym,
    body.dark-mode .calc-row-sym {
        color: #94a3b8 !important;
    }

    body[light-mode="dark"] .calc-box-input,
    body[data-layout-mode="dark"] .calc-box-input,
    body.dark-mode .calc-box-input {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .purchase-mobile-payment-section .payment-section-header {
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .purchase-mobile-payment-card-box,
    body[data-layout-mode="dark"] .purchase-mobile-payment-card-box,
    body.dark-mode .purchase-mobile-payment-card-box {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .payment-method-custom-btn,
    body[data-layout-mode="dark"] .payment-method-custom-btn,
    body.dark-mode .payment-method-custom-btn {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .payment-method-custom-btn .text-dark {
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .dropdown-menu {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .dropdown-item {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .dropdown-item .text-dark {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .dropdown-item:hover,
    body[light-mode="dark"] .dropdown-item.active {
        background-color: #0f172a !important;
    }
    body[light-mode="dark"] .dropdown-category-header {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .payment-amount-input-box,
    body[data-layout-mode="dark"] .payment-amount-input-box,
    body.dark-mode .payment-amount-input-box {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .payment-amount-input-box .currency-tag,
    body[data-layout-mode="dark"] .payment-amount-input-box .currency-tag,
    body.dark-mode .payment-amount-input-box .currency-tag {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #D2B7F1 !important;
    }

    body[light-mode="dark"] .payment-amount-input-box input,
    body[data-layout-mode="dark"] .payment-amount-input-box input,
    body.dark-mode .payment-amount-input-box input {
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .payment-extra-fields-wrap {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .extra-icon-addon {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .payment-extra-input {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .mobile-cart-item-row,
    body[data-layout-mode="dark"] .mobile-cart-item-row,
    body.dark-mode .mobile-cart-item-row {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .mobile-cart-item-row .item-title,
    body[data-layout-mode="dark"] .mobile-cart-item-row .item-title,
    body.dark-mode .mobile-cart-item-row .item-title {
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .btn-add-item-banner,
    body[data-layout-mode="dark"] .btn-add-item-banner,
    body.dark-mode .btn-add-item-banner {
        background: rgba(140, 86, 212, 0.2) !important;
        border: 1px dashed #8C56D4 !important;
        color: #D2B7F1 !important;
    }

    body[light-mode="dark"] .purchase-mobile-note-section label span {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #mobilePurchaseNote {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .purchase-mobile-footer-bar,
    body[data-layout-mode="dark"] .purchase-mobile-footer-bar,
    body.dark-mode .purchase-mobile-footer-bar {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .modal-content,
    body[data-layout-mode="dark"] .modal-content,
    body.dark-mode .modal-content {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .modal-header-sticky-purple,
    body[data-layout-mode="dark"] .modal-header-sticky-purple,
    body.dark-mode .modal-header-sticky-purple {
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .modal-search-bar-sticky,
    body[data-layout-mode="dark"] .modal-search-bar-sticky,
    body.dark-mode .modal-search-bar-sticky {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .modal-list-card,
    body[data-layout-mode="dark"] .modal-list-card,
    body.dark-mode .modal-list-card {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .modal-list-card strong.text-dark {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .modal-list-card:hover,
    body[data-layout-mode="dark"] .modal-list-card:hover,
    body.dark-mode .modal-list-card:hover {
        background-color: #273549 !important;
        border-color: #8C56D4 !important;
    }

    body[light-mode="dark"] .pos-dashed-upload-box,
    body[data-layout-mode="dark"] .pos-dashed-upload-box,
    body.dark-mode .pos-dashed-upload-box {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .form-control,
    body[data-layout-mode="dark"] .form-control,
    body.dark-mode .form-control,
    body[light-mode="dark"] .form-select,
    body[data-layout-mode="dark"] .form-select,
    body.dark-mode .form-select {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .pos-outlined-field label {
        background-color: #1e293b !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .pos-outlined-input {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .pos-custom-form-modal {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .pos-custom-form-modal .bg-white {
        background-color: #1e293b !important;
    }

    body[light-mode="dark"] #mobilePurchaseItemLineModal .bg-white {
        background-color: #1e293b !important;
    }
    body[light-mode="dark"] #mobilePurchaseItemLineModal .border {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #mobilePurchaseItemLineModal div[style*="background: #FAF7FD"],
    body[light-mode="dark"] #mobilePurchaseItemLineModal div[style*="background:#FAF7FD"] {
        background-color: #0f172a !important;
    }
    body[light-mode="dark"] #mobilePurchaseItemLineModal #mobilePurItemLineProductName {
        color: #f8fafc !important;
    }
</style>

<!-- DESKTOP PURCHASE MODAL (#exampleModal) -->
<section class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <!-- Sleek Purple Header -->
            <div class="purchase-modal-header">
                <h4>
                    <i class="fa-solid fa-cart-flatbed me-1" style="color: #ffffff;"></i> নতুন পণ্য ক্রয়
                </h4>
                <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form onsubmit="return PurchaseDataSave(event)" id="purchaseCreateForm">
                <div class="p-4">
                    <!-- Top Info Cards: Supplier & Invoice Details -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-6">
                            <div class="purchase-card h-100 mb-0">
                                <div class="purchase-card-title">
                                    <i class="fa-solid fa-truck-field" style="color: #8C56D4;"></i> Supplier Information (সাপ্লায়ার)
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="position-relative flex-grow-1" id="searchableSupplierWrapper">
                                        <input type="text" id="supplierSearchInput" class="form-control form-control-lg bg-white" placeholder="🔍 সাপ্লায়ার সিলেক্ট করুন *" autocomplete="off" style="font-size: 14px; border-radius: 10px; border-color: #cbd5e1;" />
                                        <input type="hidden" id="SupplierDataList" value="none">
                                        <div id="supplierDropdownList" class="dropdown-menu shadow-lg w-100 p-0 overflow-auto" style="max-height: 250px; display: none; position: absolute; z-index: 1050; top: 100%; left: 0;"></div>
                                    </div>
                                    <button type="button" class="btn text-white px-3 fw-bold text-nowrap d-flex align-items-center justify-content-center" onclick="openSupplierCreateModal()" style="border-radius: 10px; height: 48px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;">
                                        <i class="fa-solid fa-plus me-1"></i> New
                                    </button>
                                </div>

                                <div id="supplierCreditNotice" class="mt-3 d-none">
                                    <div class="p-2 rounded-3 d-flex justify-content-between align-items-center" style="background-color: #FAF7FD; border: 1.5px dashed #8C56D4;">
                                        <span id="supplierCreditBadge" class="fw-bold text-dark" style="font-size: 13px;">
                                            <i class="fa-solid fa-gift me-1" style="color: #8C56D4;"></i> ফেরত ব্যালেন্স আছে: <strong>৳ 0.00</strong>
                                        </span>
                                        <label class="d-flex align-items-center gap-2 mb-0 px-2 py-1 bg-white rounded border shadow-sm" style="cursor: pointer; border-color: #8C56D4 !important;">
                                            <input type="checkbox" id="useReturnCreditCheckboxBanner" onchange="syncReturnCreditCheckbox(this.checked)" style="width: 18px; height: 18px; accent-color: #8C56D4; cursor: pointer; margin: 0;">
                                            <span class="fw-bold small" style="color: #8C56D4;">সমন্বয় করুন (Adjust)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="purchase-card h-100 mb-0">
                                <div class="purchase-card-title">
                                    <i class="fa-solid fa-file-invoice" style="color: #8C56D4;"></i> Invoice & Voucher Details
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Ref / Invoice No *</label>
                                        <input type="text" placeholder="Reference No *" id="ReferenceNo" class="form-control bg-white" style="border-radius: 8px; font-weight: 600;" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Purchase Date *</label>
                                        <input type="date" class="form-control bg-white" id="PurchaseDate" style="border-radius: 8px; font-weight: 600;" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Payable Balance</label>
                                        <input type="text" readonly placeholder="Payable Amount" id="PurchasePayableAmount" class="form-control bg-light fw-bold" style="border-radius: 8px; color: #8C56D4;" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Attach Invoice Doc</label>
                                        <input type="file" id="AttachDocument" class="form-control bg-white" style="border-radius: 8px; font-size: 12px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Search & Scanner Box -->
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark fs-6 mb-1 d-flex justify-content-between align-items-center">
                            <span><i class="fa-solid fa-barcode me-1" style="color: #8C56D4;"></i> Scan Barcode or Select Product *</span>
                            <span class="badge bg-purple-subtle text-purple small font-monospace" style="background: #F3ECFB; color: #8C56D4;"><i class="fa-solid fa-bolt me-1"></i> Auto-Cart Enabled</span>
                        </label>
                        <div class="search-barcode-box d-flex align-items-center gap-2">
                            <div class="flex-grow-1 position-relative">
                                <input type="text" id="productInputData" class="form-control" placeholder="⚡ বারকোড স্ক্যান করুন বা প্রোডাক্টের নাম/কোড টাইপ করুন (Auto-adds to list)..." autocomplete="off" />
                                <ul id="productDropdown" class="list-group position-absolute w-100 shadow-lg" style="z-index: 1050; max-height: 280px; overflow-y: auto;"></ul>
                            </div>
                            <button type="button" class="btn text-white fw-bold px-3 py-2 d-inline-flex align-items-center gap-2 text-nowrap" onclick="openPurchaseCameraScanner()" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border-radius: 10px; height: 46px; border: none;">
                                <i class="fa-solid fa-camera fa-lg"></i> ক্যামেরা স্ক্যান
                            </button>
                        </div>
                    </div>

                    <!-- Cart Item Table -->
                    <div class="table-responsive rounded-3 border mb-3">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Barcodes</th>
                                    <th class="text-center" style="width: 140px;">Qty</th>
                                    <th style="width: 140px;">Cost Price (৳)</th>
                                    <th class="text-end" style="width: 130px;">Sub Total</th>
                                    <th class="text-center" style="width: 70px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="orderTableBody">
                                <!-- Dynamic Items -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Bottom Summary & Payment Details Card -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="purchase-card h-100 mb-0">
                                <div class="purchase-card-title">
                                    <i class="fa-solid fa-credit-card text-primary"></i> Payment Method & Details
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Payment Method (Optional)</label>
                                        <select class="form-select bg-white" id="paymentMethod" style="border-radius: 8px;">
                                            <option value="" selected>পেমেন্ট মাধ্যম (ঐচ্ছিক)</option>
                                            <option value="Cash">💵 Cash</option>
                                            <option value="Bkash">📱 Bkash</option>
                                            <option value="Nagad">📱 Nagad</option>
                                            <option value="Bank">🏦 Bank Transfer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted mb-1">Paid Amount (৳)</label>
                                        <input type="number" step="any" class="form-control bg-white fw-bold" id="paidAmount" value="0" style="border-radius: 8px;" />
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="paymentDetails" class="form-control mt-1" style="display: none; border-radius: 8px;" placeholder="Enter transaction details..." />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="purchase-card h-100 mb-0">
                                <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                                    <span class="text-muted fw-semibold">Total Quantity:</span>
                                    <span class="fw-bold text-dark fs-6" id="totalQuantity">0.00</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                                    <span class="text-muted fw-semibold">Grand Subtotal:</span>
                                    <span class="fw-bold text-dark fs-6">৳ <span id="totalSubTotal">0.00</span></span>
                                    <input type="hidden" id="grandSubtotal" value="0.00" />
                                </div>
                                <div class="d-none">
                                    <input type="checkbox" id="useReturnCreditCheckbox" onchange="syncReturnCreditCheckbox(this.checked)">
                                    <input type="number" step="0.01" id="returnAdjustmentAmount" value="0.00" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center p-2 rounded-2 my-2 text-white" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);">
                                    <span class="fw-bold">Net Payable (প্রকৃত দেনা):</span>
                                    <span class="fw-bold fs-5 text-white">৳ <span id="netPayableDisplay">0.00</span></span>
                                    <input type="hidden" id="netPayableAmount" value="0.00" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                                    <span class="text-muted fw-semibold">Due Amount:</span>
                                    <span class="fw-bold text-danger fs-6">৳ <input type="text" id="dueAmount" value="0.00" readonly class="border-0 bg-transparent text-danger fw-bold text-end" style="width: 90px;" /></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-2">
                                    <span class="text-muted fw-semibold">Payment Status:</span>
                                    <span id="paymentStatusDisplay" class="badge bg-secondary">Unpaid</span>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn-submit-purchase">
                                        <i class="fa-solid fa-circle-check fs-5 me-1"></i> Submit Purchase Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- MOBILE & TABLET EXCLUSIVE PURCHASE UI CONTAINER (< 992px) -->
<div class="purchase-mobile-wrapper">
    <!-- 1. Mobile Top Purple Header (Sticky Fixed) -->
    <div class="purchase-mobile-header">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ url('admin-dashboard') }}" class="purchase-mobile-back-btn" title="ড্যাশবোর্ডে ফিরে যান">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h5 class="purchase-mobile-title">নতুন ক্রয়</h5>
        </div>
        <div class="d-flex align-items-center gap-2">
            <!-- Theme Toggle Button (Moon / Sun) -->
            <button type="button" class="purchase-mobile-dark-btn" aria-label="Toggle Light/Dark Mode"
                onclick="toggle_light_mode()" title="লাইট/ডার্ক থিম পরিবর্তন">
                <i class="fa-regular fa-moon icon-moon"></i>
                <i class="fa-regular fa-sun icon-sun"></i>
            </button>
            <button type="button" class="btn p-0 border-0 text-white d-flex align-items-center justify-content-center shadow-xs" onclick="openMobilePurchaseListModal()" style="width: 32px; height: 32px; border-radius: 50%; background: rgba(255, 255, 255, 0.25);" title="ক্রয় তালিকা">
                <i class="fa-solid fa-receipt fs-6"></i>
            </button>
        </div>
    </div>

    <!-- 2. Sub-Header Info Bar (Bill No & Date with Distinct Labels & Topbar Gap) -->
    <div class="purchase-mobile-subhead">
        <div class="row g-2 align-items-center">
            <div class="col-6">
                <label class="subhead-label d-block fw-bold text-muted mb-1" style="font-size: 12px;">বিল নম্বর</label>
                <div class="d-flex align-items-center bg-light rounded-3 px-2 py-1 border" style="border-color: #cbd5e1 !important; height: 40px;">
                    <input type="text" id="mobilePurchaseInvoiceNoInput" class="form-control form-control-sm border-0 p-0 fw-extrabold bg-transparent" style="width: 100%; font-size: 13.5px; outline: none; box-shadow: none; color: #8C56D4;" placeholder="#PurID00001" value="#PurID00001" oninput="syncMobileBillNoToDesktop(this.value)" />
                    <button type="button" class="btn btn-link p-0 ms-1 border-0 d-flex align-items-center" onclick="generateNewDynamicBillNo(true)" title="নতুন বিল নম্বর জেনারেট করুন" style="color: #8C56D4;">
                        <i class="fa-solid fa-rotate fs-6"></i>
                    </button>
                </div>
            </div>
            <div class="col-6">
                <label class="subhead-label d-block fw-bold text-muted mb-1" style="font-size: 12px;">তারিখ</label>
                <div class="d-flex align-items-center bg-light rounded-3 px-2 py-1 border cursor-pointer" style="border-color: #cbd5e1 !important; height: 40px;" onclick="openPurchaseDatePicker(event)">
                    <input type="text" id="mobilePurchaseDate" class="form-control form-control-sm border-0 p-0 fw-bold text-dark bg-transparent cursor-pointer" style="width: 100%; font-size: 13px; outline: none; box-shadow: none;" value="{{ date('d-m-Y') }}" placeholder="তারিখ নির্বাচন করুন" readonly />
                    <span class="calendar-btn-icon ms-1" style="color: #8C56D4; cursor: pointer; font-size: 14px;">
                        <i class="fa-regular fa-calendar-days"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Supplier Selection Box ("পার্টি যোগ করুন") -->
    <div class="purchase-mobile-field-group" onclick="openMobileSupplierSearchModal()">
        <label class="field-group-label-purple">পার্টি যোগ করুন</label>
        <div class="d-flex align-items-center justify-content-between">
            <div class="flex-grow-1" id="mobileSupplierSelectBox">
                <span id="mobileSupplierNameDisplay" class="fw-bold text-muted" style="font-size: 14.5px;">সাপ্লায়ার সিলেক্ট করুন</span>
            </div>
            <button type="button" class="btn border-0 p-1 ms-2" style="color: #8C56D4;">
                <i class="fa-solid fa-circle-info fs-5"></i>
            </button>
        </div>
    </div>

    <!-- 3.5. Selected Supplier Details Card -->
    <div id="mobileSupplierDetailsCard" class="purchase-mobile-field-group mobile-supplier-details-card d-none mb-3">
        <div class="row g-2" style="font-size: 12px;">
            <div class="col-6">
                <span class="text-muted d-block">নাম</span>
                <a id="mobileSuppCardProfileLink" href="#" class="fw-bold text-decoration-underline d-inline-flex align-items-center gap-1" style="color: #8C56D4;" title="সাপ্লায়ার প্রোফাইল দেখুন">
                    <span id="mobileSuppCardName"></span>
                    <i class="fa-solid fa-arrow-up-right-from-square text-muted" style="font-size: 10px;"></i>
                </a>
            </div>
            <div class="col-6">
                <span class="text-muted d-block">মোবাইল</span>
                <strong id="mobileSuppCardMobile" class="text-dark"></strong>
            </div>
            <div class="col-6">
                <span class="text-muted d-block">কোম্পানি</span>
                <strong id="mobileSuppCardCompany" class="text-dark"></strong>
            </div>
            <div class="col-6">
                <span class="text-muted d-block">পূর্বে দেয়</span>
                <strong id="mobileSuppCardPayable" class="text-danger">৳ ০.০০</strong>
            </div>
        </div>
    </div>

    <!-- 3.6. Supplier Invoice Number Field -->
    <div class="purchase-mobile-field-group">
        <label class="field-group-label-purple d-flex align-items-center justify-content-between">
            <span>সাপ্লায়ার ইনভয়েস নম্বর</span>
            <button type="button" class="btn btn-link p-0 border-0 fw-bold small text-decoration-none" onclick="autoGenerateSupplierInvoiceNo()" style="font-size: 11px; color: #8C56D4;">
                <i class="fa-solid fa-rotate me-1"></i>অটো জেনারেট
            </button>
        </label>
        <div>
            <input type="text" id="mobilePurchaseRefNo" class="form-control fw-bold" placeholder="সাপ্লায়ারের ইনভয়েস বা মেমো নম্বর লিখুন..." value="" style="height: 42px; border-radius: 10px; font-size: 14px; border: 1.5px solid #cbd5e1; background: #ffffff;" oninput="syncMobileRefNoToDesktop(this.value)" />
        </div>
    </div>

    <!-- 4. Added Products Cart Card & Banner Add Item Button -->
    <div class="purchase-mobile-item-section">
        <!-- Banner Add Item Button matching POS -->
        <button type="button" class="btn-add-item-banner mb-2" onclick="openMobilePurchaseProductSearchModal()">
            <i class="fa-solid fa-circle-plus"></i>
            <span>আইটেম যোগ করুন (না দিলেও হবে)</span>
        </button>

        <div id="mobilePurchaseCartItemsList">
            <div class="purchase-cart-empty-box" id="mobilePurchaseCartEmptyMsg">
                <i class="fa-solid fa-box-open fs-3 mb-2" style="color: #8C56D4;"></i>
                <p class="mb-0 small fw-semibold">এখনও কোনো আইটেম যোগ করা হয়নি</p>
            </div>
        </div>
    </div>

    <!-- 5. Financial Calculations Summary Card (4 Rows matching POS) -->
    <div class="purchase-mobile-calc-card">
        <div class="calc-table-row">
            <span class="calc-row-title">মোট মূল্য</span>
            <span class="calc-row-sym">৳</span>
            <div class="calc-input-wrapper">
                <input type="text" readonly id="mobilePurchaseGrossTotal" value="০.০০" class="calc-box-input" />
            </div>
        </div>
        <div class="calc-table-row">
            <span class="calc-row-title">সর্বমোট মূল্য</span>
            <span class="calc-row-sym">৳</span>
            <div class="calc-input-wrapper">
                <input type="text" readonly id="mobilePurchaseNetTotal" value="০.০০" class="calc-box-input fw-bold" />
            </div>
        </div>
        <div class="calc-table-row">
            <span class="calc-row-title">পরিশোধিত মূল্য</span>
            <span class="calc-row-sym">৳</span>
            <div class="calc-input-wrapper">
                <input type="text" inputmode="decimal" pattern="[0-9]*" id="mobilePurchasePaidInput" oninput="enforceBanglaNumberInput(this); syncMobilePurchaseCalcInputs()" placeholder="০.০০" class="calc-box-input" />
            </div>
        </div>
        <div class="calc-table-row">
            <span class="calc-row-title">বাকি</span>
            <span class="calc-row-sym">৳</span>
            <div class="calc-input-wrapper">
                <input type="text" readonly id="mobilePurchaseDueInput" value="০.০০" class="calc-box-input text-danger fw-bold" />
            </div>
        </div>
    </div>

    <!-- 6. Payment Method Section (POS-Matched Dynamic Dropdown with Add Options) -->
    <div class="purchase-mobile-payment-section">
        <div class="payment-section-header">
            <span>পেমেন্টের মাধ্যম</span>
            <i class="fa-solid fa-circle-info text-muted ms-1" style="font-size: 13px;"></i>
        </div>
        <div id="mobilePaymentRowsContainer">
            <!-- Dynamically populated payment row matching POS design -->
        </div>
    </div>

    <!-- 7. Note & Document Attachment Card -->
    <div class="purchase-mobile-note-section">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <label class="d-flex align-items-center gap-2 fw-bold text-dark cursor-pointer m-0" style="font-size: 14px;">
                <span>লেনদেনের মেসেজ পাঠান</span>
                <input type="checkbox" id="mobilePurchaseSendSms" class="form-check-input m-0" style="width: 18px; height: 18px; border-radius: 4px; accent-color: #8C56D4;" />
            </label>
        </div>

        <div class="row g-2">
            <div class="col-8">
                <textarea id="mobilePurchaseNote" maxlength="250" placeholder="বর্ণনা (০/২৫০)" class="form-control fw-bold" style="height: 85px; border-radius: 10px; font-size: 13px; border: 1.5px solid #cbd5e1; resize: none;"></textarea>
            </div>
            <div class="col-4">
                <div class="pos-dashed-upload-box d-flex flex-column align-items-center justify-content-center" onclick="triggerMobilePurchaseDocUpload()" style="height: 85px; padding: 6px;">
                    <input type="file" id="mobilePurchaseDocImage" accept="image/*" class="d-none" onchange="previewMobilePurchaseDocImage(this)" />
                    <div id="mobilePurImagePlaceholder">
                        <i class="fa-solid fa-circle-plus fs-4 mb-1" style="color: #8C56D4;"></i>
                        <div class="small text-muted" style="font-size: 10px;">ছবি যুক্ত করুন</div>
                    </div>
                    <img id="mobilePurImagePreview" src="" alt="Preview" class="d-none w-100 h-100 object-fit-cover rounded-2" />
                </div>
            </div>
        </div>
    </div>

    <!-- 8. Fixed/Sticky Bottom Save Button Bar -->
    <div class="purchase-mobile-footer-bar">
        <button type="button" class="btn-save-purchase-mobile" onclick="confirmSaveMobilePurchase()">
            <i class="fa-solid fa-floppy-disk fs-5"></i>
            <span>সেভ করুন</span>
        </button>
    </div>
</div>

<!-- ========================================================
     MODALS: PRODUCT SEARCH, SUPPLIER SEARCH, ITEM LINE, LIST, BANK & MOBILE BANKING
     ======================================================== -->

<!-- 1. Product Search Modal (Bottom-Sheet Slide Up on Mobile) -->
<div class="modal fade bottom-sheet" id="mobilePurchaseProductSearchModal" tabindex="-1" aria-hidden="true" style="z-index: 105050;">
    <div class="modal-dialog modal-dialog-bottom-sheet modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header-sticky-purple">
                <h5 class="modal-title m-0">প্রোডাক্ট নির্বাচন করুন</h5>
                <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <!-- Sticky Search Bar -->
            <div class="modal-search-bar-sticky">
                <div class="d-flex align-items-center gap-2">
                    <div class="position-relative flex-grow-1">
                        <input type="text" id="mobilePurchaseProductSearchInput" class="form-control form-control-lg pe-5 m-0" placeholder="প্রোডাক্ট নাম বা বারকোড লিখে খুঁজুন..." oninput="filterMobilePurchaseProducts(this.value)" style="border-radius: 12px; font-size: 14px; height: 46px; border: 1.5px solid #cbd5e1;" autocomplete="off" />
                        <button type="button" class="btn p-0 border-0 position-absolute end-0 top-50 translate-middle-y me-2 d-flex align-items-center justify-content-center" onclick="openMobilePurchaseCameraScanner()" style="width: 34px; height: 34px; border-radius: 8px; background: #F3ECFB; color: #8C56D4;" title="ক্যামেরা বারকোড স্ক্যানার">
                            <i class="fa-solid fa-camera fs-5"></i>
                        </button>
                    </div>
                    <button type="button" class="btn text-white fw-bold text-nowrap px-3 d-inline-flex align-items-center gap-1 shadow-xs" onclick="openProductCreateModalFromMobile()" style="height: 46px; border-radius: 12px; font-size: 13px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;">
                        <i class="fa-solid fa-plus"></i> নতুন প্রোডাক্ট
                    </button>
                </div>
            </div>
            <div class="modal-body p-3" style="flex: 1; overflow-y: auto;">
                <div id="mobilePurchaseProductResultsList">
                    <!-- Product items dynamically rendered -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 2. Supplier Search Modal (Bottom-Sheet Slide Up on Mobile) -->
<div class="modal fade bottom-sheet" id="mobileSupplierSearchModal" tabindex="-1" aria-hidden="true" style="z-index: 105050;">
    <div class="modal-dialog modal-dialog-bottom-sheet modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header-sticky-purple">
                <h5 class="modal-title m-0">পার্টি বা সাপ্লায়ার নির্বাচন করুন</h5>
                <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <!-- Sticky Search Bar -->
            <div class="modal-search-bar-sticky">
                <div class="d-flex align-items-center gap-2">
                    <input type="text" id="mobileSupplierSearchInput" class="form-control form-control-lg flex-grow-1 m-0" placeholder="সাপ্লায়ার নাম বা মোবাইল লিখে খুঁজুন..." oninput="filterMobileSuppliers(this.value)" style="border-radius: 12px; font-size: 14px; height: 46px; border: 1.5px solid #cbd5e1;" autocomplete="off" />
                    <button type="button" class="btn text-white fw-bold text-nowrap px-3 d-inline-flex align-items-center gap-1" style="height: 46px; border-radius: 12px; font-size: 13px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;" onclick="openSupplierCreateModal(); hideMobileModal('mobileSupplierSearchModal');">
                        <i class="fa-solid fa-plus"></i> নতুন সাপ্লায়ার
                    </button>
                </div>
            </div>
            <div class="modal-body p-3" style="flex: 1; overflow-y: auto;">
                <div id="mobileSupplierResultsList">
                    <!-- Supplier items dynamically rendered -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3. Mobile Item Line Edit Modal -->
<div class="modal fade" id="mobilePurchaseItemLineModal" tabindex="-1" aria-hidden="true" style="z-index: 105060;">
    <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 420px;">
        <div class="modal-content">
            <div class="modal-header-sticky-purple">
                <h5 class="modal-title m-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-cart-flatbed"></i>
                    <span>আইটেম ক্রয় লাইন</span>
                </h5>
                <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="p-3 pb-3 bg-white">
                <input type="hidden" id="mobilePurItemLineProductId" />
                <div class="mb-3 p-2 rounded-3 border" style="background: #FAF7FD; border-color: #E5D5F7 !important;">
                    <label class="form-label small text-muted mb-1 fw-bold">পণ্য নাম</label>
                    <input type="text" id="mobilePurItemLineProductName" readonly class="form-control form-control-lg fw-bold bg-transparent border-0 p-0 text-dark" style="font-size: 15px;" />
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold mb-1">পরিমাণ *</label>
                        <input type="text" inputmode="decimal" pattern="[0-9]*" id="mobilePurItemLineQty" class="form-control form-control-lg fw-bold text-center" style="border-radius: 12px; border: 1.5px solid #8C56D4;" oninput="enforceBanglaNumberInput(this); calculateMobilePurchaseItemLineTotal()" />
                    </div>
                    <div class="col-6">
                        <label class="form-label text-muted small fw-bold mb-1">ক্রয় মূল্য (৳) *</label>
                        <input type="text" inputmode="decimal" pattern="[0-9]*" id="mobilePurItemLinePrice" class="form-control form-control-lg fw-bold text-center" style="border-radius: 12px; border: 1.5px solid #8C56D4;" oninput="enforceBanglaNumberInput(this); calculateMobilePurchaseItemLineTotal()" />
                    </div>
                </div>

                <div class="p-3 rounded-3 text-center mb-2 border" style="background: #FAF7FD; border-color: #E5D5F7 !important;">
                    <div class="small text-muted mb-1" id="mobilePurItemLineBreakdown">১ X ৳ ০.০০ = ৳ ০.০০</div>
                    <div class="fs-4 fw-extrabold" id="mobilePurItemLineTotalText" style="color: #8C56D4;">৳ ০.০০</div>
                </div>

                <!-- Action buttons with generous top & bottom padding -->
                <div class="row g-2 pt-2 pb-2">
                    <div class="col-6">
                        <button type="button" class="btn btn-cancel-red w-100 fw-bold d-flex align-items-center justify-content-center" style="border-radius: 12px; height: 46px; font-size: 15px;" data-bs-dismiss="modal">বাতিল</button>
                    </div>
                    <div class="col-6">
                        <button type="button" onclick="confirmAddMobilePurchaseItemLine()" class="btn text-white w-100 fw-bold d-flex align-items-center justify-content-center" style="border-radius: 12px; height: 46px; font-size: 15px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;">ঠিক আছে</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 4. Purchase List Modal ("ক্রয় তালিকা") -->
<div class="modal fade bottom-sheet" id="mobilePurchaseListModal" tabindex="-1" aria-hidden="true" style="z-index: 105050;">
    <div class="modal-dialog modal-dialog-bottom-sheet modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header-sticky-purple">
                <h5 class="modal-title m-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-receipt"></i>
                    <span>ক্রয় তালিকা</span>
                </h5>
                <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <!-- Sticky Search Bar -->
            <div class="modal-search-bar-sticky">
                <input type="text" id="mobilePurchaseListSearchInput" class="form-control form-control-lg fw-bold m-0" placeholder="বিল নম্বর বা সাপ্লায়ার নাম লিখে খুঁজুন..." oninput="filterMobilePurchaseListModal(this.value)" style="border-radius: 12px; font-size: 14px; border: 1.5px solid #cbd5e1;" />
            </div>
            <div class="modal-body p-3 bg-light" style="flex: 1; overflow-y: auto;">
                <div id="mobilePurchaseListCardsContainer">
                    <!-- Dynamic Purchase Cards Rendered Here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: মোবাইল ব্যাংকিং যোগ করুন -->
<div class="modal fade pos-root-modal" id="modalAddMobileBanking" tabindex="-1" aria-hidden="true" style="z-index: 105090;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pos-custom-form-modal p-0 overflow-hidden" style="border-radius: 16px;">
            <div class="modal-header-sticky-purple">
                <h5 class="modal-title m-0 fw-bold text-white d-flex align-items-center gap-2" style="font-size: 16px;">
                    <i class="fa-solid fa-mobile-screen"></i>
                    <span>মোবাইল ব্যাংকিং যোগ করুন</span>
                </h5>
                <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="pos-outlined-field mb-3">
                    <label class="fw-bold">মোবাইল ব্যাংকিং এর নাম</label>
                    <input type="text" id="mobileBankingModalName" class="pos-outlined-input fw-bold" placeholder="যেমন: bKash, Nagad, Rocket..." autocomplete="off" />
                </div>
                
                <div class="d-flex justify-content-end align-items-center gap-2 mt-4 pt-1">
                    <button type="button" class="btn btn-cancel-red px-4 py-2 fw-bold" data-bs-dismiss="modal" style="height: 42px; border-radius: 10px;">বাতিল</button>
                    <button type="button" class="btn text-white px-4 py-2 fw-bold shadow-sm" style="height: 42px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;" onclick="submitAddMobileBankingModal()">যোগ করুন</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: নতুন ব্যাংক অ্যাকাউন্ট যোগ করুন -->
<div class="modal fade pos-root-modal" id="modalAddBank" tabindex="-1" aria-hidden="true" style="z-index: 105090;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pos-custom-form-modal p-0 overflow-hidden" style="border-radius: 16px;">
            <div class="modal-header-sticky-purple">
                <h5 class="modal-title m-0 fw-bold text-white d-flex align-items-center gap-2" style="font-size: 16px;">
                    <i class="fa-solid fa-building-columns"></i>
                    <span>নতুন ব্যাংক অ্যাকাউন্ট</span>
                </h5>
                <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="pos-outlined-field mb-3">
                    <label class="fw-bold">ব্যাংকের নাম *</label>
                    <input type="text" id="bankModalName" class="pos-outlined-input fw-bold" placeholder="যেমন: Islami Bank, DBBL..." autocomplete="off" />
                </div>
                
                <div class="pos-outlined-field mb-3">
                    <label class="fw-bold">অ্যাকাউন্টের নাম</label>
                    <input type="text" id="bankModalAccName" class="pos-outlined-input fw-bold" placeholder="অ্যাকাউন্ট হোল্ডার নাম..." autocomplete="off" />
                </div>
                
                <div class="pos-outlined-field mb-3">
                    <label class="fw-bold">অ্যাকাউন্ট নম্বর</label>
                    <input type="text" id="bankModalAccNo" class="pos-outlined-input fw-bold" placeholder="অ্যাকাউন্ট নম্বর লিখুন..." autocomplete="off" />
                </div>
                
                <div class="pos-outlined-field mb-2">
                    <label class="fw-bold">প্রারম্ভিক ব্যালেন্স (৳)</label>
                    <input type="text" id="bankModalBalance" class="pos-outlined-input fw-bold" value="০" inputmode="decimal" pattern="[0-9]*" oninput="enforceBanglaNumberInput(this)" autocomplete="off" />
                </div>
                
                <div class="d-flex justify-content-end align-items-center gap-2 mt-4 pt-1">
                    <button type="button" class="btn btn-cancel-red px-4 py-2 fw-bold" data-bs-dismiss="modal" style="height: 42px; border-radius: 10px;">বাতিল</button>
                    <button type="button" class="btn text-white px-4 py-2 fw-bold shadow-sm" style="height: 42px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;" onclick="submitAddBankModal()">যোগ করুন</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 5. Camera Scanner Modal for Purchase -->
<div class="modal fade" id="mobilePurchaseBarcodeScannerModal" tabindex="-1" aria-hidden="true" style="z-index: 105060;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header-sticky-purple">
                <h5 class="modal-title m-0">
                    <i class="fa-solid fa-camera me-2"></i> ক্যামেরা বারকোড স্ক্যানার
                </h5>
                <button type="button" class="btn-close-red" onclick="stopMobilePurchaseCameraScanner()" title="বন্ধ করুন">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body p-3 text-center">
                <div id="mobilePurCamScannerStatus" class="alert alert-info py-2 small mb-3">
                    <i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে...
                </div>
                <div id="mobilePurCameraReaderContainer" class="rounded-3 overflow-hidden border shadow-inner mb-3" style="width: 100%; min-height: 250px; background: #000;">
                    <div id="mobilePurCameraReader" style="width: 100%;"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center px-1">
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill fw-bold px-3" onclick="switchMobilePurCameraFacingMode()">
                        <i class="fa-solid fa-camera-rotate me-1"></i> ক্যামেরা ঘুরান
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm rounded-pill fw-bold px-3" onclick="stopMobilePurchaseCameraScanner()">
                        বন্ধ করুন
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Camera Scanner Modal for Desktop -->
<div class="modal fade" id="purchaseCameraScanModal" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
            <div class="modal-header border-0 py-3" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); color: #fff;">
                <h5 class="modal-title fs-6 fw-bold text-white m-0">
                    <i class="fa-solid fa-barcode me-2"></i> প্রোডাক্ট বারকোড স্ক্যানার (Purchase)
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" onclick="stopPurchaseCameraScanner()"></button>
            </div>
            <div class="modal-body p-3 text-center bg-light">
                <div id="purchaseCameraScannerStatus" class="alert alert-info py-2 small mb-3">
                    <i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।
                </div>

                <div id="purchaseReader" style="width: 100%; min-height: 250px; background: #000; border-radius: 12px; overflow: hidden; margin: 0 auto;"></div>

                <div class="d-flex justify-content-between align-items-center mt-3 px-1">
                    <span id="purchaseLastScannedText" class="badge bg-dark text-wrap p-2" style="font-size: 13px;">স্ক্যান কৃত: -</span>
                    <button type="button" class="btn btn-outline-dark btn-sm rounded-pill" onclick="switchPurchaseCamera()">
                        <i class="fa-solid fa-camera-rotate me-1"></i> ক্যামেরা সুইচ
                    </button>
                </div>
            </div>
            <div class="modal-footer bg-light border-0 py-2">
                <button type="button" class="btn btn-secondary btn-sm w-100 rounded-pill" data-bs-dismiss="modal" onclick="stopPurchaseCameraScanner()">বন্ধ করুন (Close)</button>
            </div>
        </div>
    </div>
</div>

<!-- Desktop Item Line Modal -->
<div class="modal fade" id="purchaseItemLineModal" tabindex="-1" aria-hidden="true" style="z-index: 1070;">
    <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 420px;">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <div class="d-flex align-items-center justify-content-between px-3 py-3" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); color: white;">
                <h5 class="fw-bold m-0 text-white d-flex align-items-center gap-2" style="font-size: 16px;">
                    <i class="fa-solid fa-cart-flatbed"></i>
                    <span>আইটেম ক্রয় লাইন</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" onclick="closePurchaseItemLineModal()" aria-label="Close"></button>
            </div>

            <div class="p-3 bg-white">
                <div class="mb-3 p-2 rounded-3 border" style="background: #FAF7FD; border-color: #E5D5F7 !important;">
                    <label class="form-label small text-muted mb-1 fw-bold">পণ্য নাম</label>
                    <div id="pItemNameDisplay" class="fw-extrabold text-dark fs-6"></div>
                    <input type="hidden" id="pItemProductId" />
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark mb-1">পরিমাণ (Qty) *</label>
                    <div class="input-group">
                        <button type="button" class="btn btn-outline-secondary fw-bold px-3" onclick="adjustPItemQty(-1)">-</button>
                        <input type="text" inputmode="decimal" id="pItemQty" value="১" oninput="enforceBanglaNumberInput(this); calculatePItemTotal()" class="form-control text-center fw-bold fs-5" style="border-color: #8C56D4;" />
                        <button type="button" class="btn btn-outline-secondary fw-bold px-3" onclick="adjustPItemQty(1)">+</button>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-dark mb-1">একক ক্রয় মূল্য (Cost Price ৳) *</label>
                    <div class="input-group">
                        <span class="input-group-text fw-bold bg-light" style="color: #8C56D4;">৳</span>
                        <input type="text" inputmode="decimal" id="pItemCostPrice" value="০.০০" oninput="enforceBanglaNumberInput(this); calculatePItemTotal()" class="form-control fw-bold fs-5" style="border-color: #8C56D4;" />
                    </div>
                </div>

                <div class="p-3 mb-3 rounded-3" style="background: #FAF7FD; border: 1px solid #E5D5F7;">
                    <div class="d-flex justify-content-between align-items-center pb-2 mb-2" style="border-bottom: 1px dashed #D2B7F1;">
                        <span class="text-muted small fw-bold">সাব টোটাল হিসাব</span>
                        <span id="pItemBreakdownText" class="fw-bold text-dark small">১.০০ X ৳ ০.০০ = ৳ ০.০০</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-dark small">সর্বমোট ক্রয় মূল্য</span>
                        <span id="pItemTotalText" class="fw-extrabold fs-5" style="color: #8C56D4;">৳ ০.০০</span>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-6">
                        <button type="button" onclick="closePurchaseItemLineModal()" class="btn btn-outline-secondary w-100 py-2 fw-bold" style="border-radius: 12px;">
                            বাতিল
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" onclick="confirmAddPurchaseItemLine()" class="btn text-white w-100 py-2 fw-bold" style="border-radius: 12px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;">
                            ঠিক আছে
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const paidAmountInput = document.getElementById("paidAmount");
        const dueAmountInput = document.getElementById("dueAmount");
        const grandSubtotalInput = document.getElementById("grandSubtotal");
        const paymentStatusDisplay = document.getElementById("paymentStatusDisplay");

        window.syncReturnCreditCheckbox = function(isChecked) {
            const tableCb = document.getElementById("useReturnCreditCheckbox");
            const bannerCb = document.getElementById("useReturnCreditCheckboxBanner");
            if (tableCb) tableCb.checked = isChecked;
            if (bannerCb) bannerCb.checked = isChecked;

            toggleReturnCreditAdjustment();
        };

        window.toggleReturnCreditAdjustment = function() {
            const checkbox = document.getElementById("useReturnCreditCheckbox");
            const returnAdjInput = document.getElementById("returnAdjustmentAmount");
            const maxCredit = parseFloat(window.availableSupplierCredit || 0);

            if (checkbox && checkbox.checked) {
                returnAdjInput.disabled = false;
                returnAdjInput.style.backgroundColor = "#ffffff";
                returnAdjInput.setAttribute("max", maxCredit);
                returnAdjInput.value = maxCredit > 0 ? maxCredit.toFixed(2) : "0.00";
            } else {
                returnAdjInput.value = "0.00";
                returnAdjInput.disabled = true;
                returnAdjInput.style.backgroundColor = "#f1f5f9";
            }

            calculateDuePayment();
        };

        window.calculateDuePayment = function() {
            let grandSubtotal = parseBanglaFloat(grandSubtotalInput.value) || 0;
            let checkbox = document.getElementById("useReturnCreditCheckbox");
            let returnAdjInput = document.getElementById("returnAdjustmentAmount");
            let netPayableInput = document.getElementById("netPayableAmount");
            let netDisplay = document.getElementById("netPayableDisplay");
            
            let returnAdj = 0;
            if (checkbox && checkbox.checked) {
                let maxCredit = parseBanglaFloat(window.availableSupplierCredit || 0);
                returnAdj = parseBanglaFloat(returnAdjInput.value) || 0;

                if (returnAdj > maxCredit) {
                    returnAdj = maxCredit;
                    returnAdjInput.value = maxCredit.toFixed(2);
                }
                if (returnAdj > grandSubtotal) {
                    returnAdj = grandSubtotal;
                    returnAdjInput.value = grandSubtotal.toFixed(2);
                }
            } else {
                if (returnAdjInput) returnAdjInput.value = "0.00";
            }

            let netPayable = Math.max(0, grandSubtotal - returnAdj);
            if (netPayableInput) netPayableInput.value = netPayable.toFixed(2);
            if (netDisplay) netDisplay.textContent = netPayable.toFixed(2);

            let paidAmount = parseBanglaFloat(paidAmountInput.value) || 0;
            let dueAmount = Math.max(0, netPayable - paidAmount);

            dueAmountInput.value = dueAmount.toFixed(2);

            if (paidAmount === 0 && netPayable > 0) {
                paymentStatusDisplay.textContent = "Unpaid";
                paymentStatusDisplay.className = "badge bg-danger text-white";
            } else if (paidAmount < netPayable) {
                paymentStatusDisplay.textContent = "Partial Paid";
                paymentStatusDisplay.className = "badge bg-warning text-dark";
            } else {
                paymentStatusDisplay.textContent = "Fully Paid";
                paymentStatusDisplay.className = "badge bg-success text-white";
            }
        };

        paidAmountInput.addEventListener("input", calculateDuePayment);
        calculateDuePayment();
    });
</script>

<script>
    let allSuppliersData = [];

    function openSupplierCreateModal() {
        const modal = document.getElementById('supplierCreateModal') || document.getElementById('myModal');
        const firstInput = document.getElementById('supplierName');
        if (firstInput) {
            try { firstInput.focus(); } catch(_) {}
        }
        if (modal) {
            if (modal.parentNode && modal.parentNode !== document.body) {
                document.body.appendChild(modal);
            }
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
        } else {
            errorToast("Supplier Create Modal not found!");
        }
    }

    async function refreshSupplierList(selectedSupplierId = null) {
        try {
            const res = await axios.get("/api/supplier-list", HeaderToken());
            allSuppliersData = res.data.SupplierData || [];

            renderSupplierDropdownItems(allSuppliersData);

            if (selectedMobileSupplier) {
                const refreshed = allSuppliersData.find(s => s.id == selectedMobileSupplier.id);
                if (refreshed && typeof selectMobileSupplierItem === 'function') {
                    selectMobileSupplierItem(refreshed.id);
                }
            } else if (selectedSupplierId) {
                const found = allSuppliersData.find(s => s.id == selectedSupplierId);
                if (found) {
                    if (typeof selectSupplierItem === 'function') {
                        selectSupplierItem(found);
                    }
                    if (typeof selectMobileSupplierItem === 'function') {
                        selectMobileSupplierItem(found.id);
                    }
                }
            } else {
                selectedMobileSupplier = null;
                const displayEl = document.getElementById("mobileSupplierNameDisplay");
                if (displayEl) {
                    displayEl.textContent = "সাপ্লায়ার সিলেক্ট করুন";
                    displayEl.className = "fw-bold text-muted";
                }
                const card = document.getElementById("mobileSupplierDetailsCard");
                if (card) card.classList.add("d-none");

                const suppInput = document.getElementById("supplierSearchInput");
                if (suppInput) suppInput.value = "";
                const suppVal = document.getElementById("SupplierDataList");
                if (suppVal) suppVal.value = "none";
            }
        } catch (error) {
            console.error("Error occurred while fetching Suppliers:", error);
        }
    }

    function renderSupplierDropdownItems(suppliers) {
        const listContainer = document.getElementById("supplierDropdownList");
        if (!listContainer) return;

        if (!suppliers || suppliers.length === 0) {
            listContainer.innerHTML = `<div class="p-2 text-muted text-center small">No suppliers found</div>`;
            return;
        }

        let html = suppliers.map(s => {
            const creditVal = parseFloat(s.return_credit_balance || 0);
            const creditLabel = creditVal > 0 ? `<span class="badge ms-1" style="background:#8C56D4; color:#fff;">🎁 ৳${creditVal.toFixed(2)}</span>` : '';
            const payable = parseFloat(s.purchase_payable_amount || 0);
            const payableLabel = payable > 0 ? `<span class="badge bg-danger ms-1">দেয়: ৳${payable.toFixed(2)}</span>` : '';

            return `
                <div class="dropdown-item px-3 py-2 border-bottom supplier-select-item"
                     data-id="${s.id}"
                     data-name="${s.name}"
                     data-payable="${payable}"
                     data-credit="${creditVal}"
                     style="cursor: pointer;">
                     <div class="fw-bold text-dark">${s.name} ${s.company ? `<small class="text-muted">(${s.company})</small>` : ''}</div>
                     <div class="small text-muted">${s.mobile || ''} ${payableLabel} ${creditLabel}</div>
                </div>
            `;
        }).join('');

        listContainer.innerHTML = html;

        listContainer.querySelectorAll('.supplier-select-item').forEach(item => {
            item.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const payable = this.getAttribute('data-payable');
                const credit = parseFloat(this.getAttribute('data-credit')) || 0;

                selectSupplierItem({ id, name, payable, credit });
                listContainer.style.display = 'none';
            });
        });
    }

    function selectSupplierItem(s) {
        document.getElementById("SupplierDataList").value = s.id;
        document.getElementById("supplierSearchInput").value = s.name;
        document.getElementById("PurchasePayableAmount").value = s.payable || 0;

        window.availableSupplierCredit = s.credit || 0;

        const creditNotice = document.getElementById("supplierCreditNotice");
        const creditBadge = document.getElementById("supplierCreditBadge");
        const returnAdjInput = document.getElementById("returnAdjustmentAmount");

        if (typeof syncReturnCreditCheckbox === 'function') {
            syncReturnCreditCheckbox(false);
        }

        if (s.credit > 0) {
            creditBadge.innerHTML = `<i class="fa-solid fa-gift me-1" style="color: #8C56D4;"></i> ফেরত ব্যালেন্স আছে: <strong>৳ ${s.credit.toFixed(2)}</strong>`;
            creditNotice.classList.remove("d-none");
            returnAdjInput.setAttribute("max", s.credit);
        } else {
            creditNotice.classList.add("d-none");
            returnAdjInput.setAttribute("max", "0");
        }

        if (typeof calculateDuePayment === 'function') {
            calculateDuePayment();
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const suppInput = document.getElementById("supplierSearchInput");
        const suppList = document.getElementById("supplierDropdownList");

        if (suppInput && suppList) {
            suppInput.addEventListener("focus", function() {
                suppList.style.display = "block";
                renderSupplierDropdownItems(allSuppliersData);
            });

            suppInput.addEventListener("input", function() {
                const query = this.value.toLowerCase().trim();
                suppList.style.display = "block";

                const filtered = allSuppliersData.filter(s =>
                    (s.name && s.name.toLowerCase().includes(query)) ||
                    (s.mobile && s.mobile.toLowerCase().includes(query)) ||
                    (s.company && s.company.toLowerCase().includes(query))
                );

                renderSupplierDropdownItems(filtered);
            });

            document.addEventListener("click", function(e) {
                const wrapper = document.getElementById("searchableSupplierWrapper");
                if (wrapper && !wrapper.contains(e.target)) {
                    suppList.style.display = "none";
                }
            });
        }
    });

    refreshSupplierList();

    /* ========================================================
       Camera Scanner for Purchase Product Input
       ======================================================== */
    let purchaseHtml5QrCode = null;
    let purchaseFacingMode = "environment";
    let lastPurchaseScannedCode = "";
    let purchaseScanTimer = null;

    function openPurchaseCameraScanner() {
        const modalEl = new bootstrap.Modal(document.getElementById('purchaseCameraScanModal'));
        modalEl.show();
        setTimeout(() => {
            startPurchaseCameraScanner();
        }, 350);
    }

    function startPurchaseCameraScanner() {
        if (purchaseHtml5QrCode && purchaseHtml5QrCode.isScanning) {
            purchaseHtml5QrCode.stop().then(() => initPurchaseHtml5QrCode()).catch(() => initPurchaseHtml5QrCode());
        } else {
            initPurchaseHtml5QrCode();
        }
    }

    function initPurchaseHtml5QrCode() {
        const statusEl = document.getElementById("purchaseCameraScannerStatus");
        if (statusEl) {
            statusEl.className = "alert alert-info py-2 small mb-3";
            statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।';
        }

        if (!purchaseHtml5QrCode) {
            purchaseHtml5QrCode = new Html5Qrcode("purchaseReader");
        }

        const config = {
            fps: 15,
            qrbox: { width: 260, height: 160 },
            aspectRatio: 1.333334
        };

        purchaseHtml5QrCode.start(
            { facingMode: purchaseFacingMode },
            config,
            onPurchaseBarcodeDetectedSuccess,
            onPurchaseBarcodeDetectedError
        ).then(() => {
            if (statusEl) {
                statusEl.className = "alert alert-success py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-video me-1"></i> ক্যামেরা সক্রিয়! বারকোড স্ক্যান করলে সরাসরি পারচেজ টেবিলে যোগ হবে।';
            }
        }).catch(err => {
            console.error("Purchase Camera start error:", err);
            if (statusEl) {
                statusEl.className = "alert alert-danger py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> ক্যামেরা চালু করা যায়নি! ব্রাউজারের ক্যামেরা পারমিশন এলাউ করুন।';
            }
        });
    }

    function onPurchaseBarcodeDetectedSuccess(decodedText) {
        if (!decodedText || decodedText === lastPurchaseScannedCode) return;

        lastPurchaseScannedCode = decodedText;
        const lastTextEl = document.getElementById("purchaseLastScannedText");
        if (lastTextEl) lastTextEl.innerText = `স্ক্যান কৃত: ${decodedText}`;

        if (navigator.vibrate) navigator.vibrate(100);
        playScanBeepSound();

        const codeClean = decodedText.trim().toLowerCase();
        const matched = allProducts.find(p => isExactCodeMatch(p, codeClean));

        if (matched) {
            addProductToOrder(matched);
            successToast(`স্ক্যান করা হয়েছে: ${matched.product_name}`);
        } else {
            errorToast(`প্রোডাক্ট পাওয়া যায়নি: ${decodedText}`);
        }

        clearTimeout(purchaseScanTimer);
        purchaseScanTimer = setTimeout(() => {
            lastPurchaseScannedCode = "";
        }, 1200);
    }

    function onPurchaseBarcodeDetectedError(msg) {}

    function switchPurchaseCamera() {
        purchaseFacingMode = (purchaseFacingMode === "environment") ? "user" : "environment";
        startPurchaseCameraScanner();
    }

    function stopPurchaseCameraScanner() {
        if (purchaseHtml5QrCode && purchaseHtml5QrCode.isScanning) {
            purchaseHtml5QrCode.stop().then(() => {
                purchaseHtml5QrCode.clear();
            }).catch(() => {});
        }
    }

    function playScanBeepSound() {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.type = "sine";
            osc.frequency.setValueAtTime(880, ctx.currentTime);
            gain.gain.setValueAtTime(0.2, ctx.currentTime);
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.start();
            osc.stop(ctx.currentTime + 0.12);
        } catch (e) {}
    }
</script>

<script>
    function formatProductCode(productCode) {
        if (!productCode) return '';
        try {
            if (Array.isArray(JSON.parse(productCode))) {
                return JSON.parse(productCode).join(', ');
            }
        } catch (e) {
            return productCode;
        }
        return productCode;
    }
</script>

<script>
    const paymentMethodSelect = document.getElementById('paymentMethod');
    const paymentDetailsInput = document.getElementById('paymentDetails');

    if (paymentMethodSelect) {
        paymentMethodSelect.addEventListener('change', function() {
            const selectedMethod = this.value;

            if (['Bkash', 'Nagad', 'Bank'].includes(selectedMethod)) {
                paymentDetailsInput.style.display = 'block';
                paymentDetailsInput.placeholder = `Enter ${selectedMethod} transaction details`;
            } else {
                paymentDetailsInput.style.display = 'none';
                paymentDetailsInput.value = '';
            }
        });
    }

    let allProducts = [];

    async function ProductDataShow() {
        try {
            let res = await axios.get("/api/product-list", HeaderToken());
            allProducts = res.data.ProductData || [];
        } catch (error) {
            console.error("Error occurred while fetching products:", error);
        }
    }

    ProductDataShow();

    // Check if query matches exact code/barcode or exact name
    function isExactCodeMatch(product, query) {
        if (!product || !query) return false;
        const q = query.trim().toLowerCase();
        if (!q) return false;

        if (product.product_code) {
            let strCode = product.product_code.toString().toLowerCase();
            try {
                let parsed = JSON.parse(product.product_code);
                if (Array.isArray(parsed)) {
                    if (parsed.some(c => c.toString().trim().toLowerCase() === q)) return true;
                } else if (parsed.toString().trim().toLowerCase() === q) {
                    return true;
                }
            } catch (e) {
                if (strCode.trim() === q) return true;
            }
            if (strCode.trim() === q) return true;
        }

        if (product.product_name && product.product_name.trim().toLowerCase() === q) return true;

        return false;
    }

    // Auto-Add product when code is typed/scanned into input
    const pInput = document.getElementById('productInputData');
    if (pInput) {
        pInput.addEventListener('input', function() {
            const searchValue = this.value.trim().toLowerCase();
            const productDropdown = document.getElementById('productDropdown');

            if (!searchValue) {
                productDropdown.innerHTML = '';
                return;
            }

            // 1. Check for EXACT barcode/code match
            const exactMatch = allProducts.find(product => isExactCodeMatch(product, searchValue));
            if (exactMatch) {
                addProductToOrder(exactMatch);
                this.value = '';
                productDropdown.innerHTML = '';
                playScanBeepSound();
                successToast(`স্ক্যান করা হয়েছে: ${exactMatch.product_name}`);
                return;
            }

            // 2. Filter dropdown
            const filteredProducts = allProducts.filter(product => {
                const nameMatch = product.product_name && product.product_name.toLowerCase().includes(searchValue);
                const codeMatch = product.product_code && product.product_code.toString().toLowerCase().includes(searchValue);
                return nameMatch || codeMatch;
            });

            productDropdown.innerHTML = '';

            if (filteredProducts.length === 0) {
                productDropdown.innerHTML = '<li class="list-group-item text-muted text-center small py-2">কোনো প্রোডাক্ট পাওয়া যায়নি</li>';
                return;
            }

            filteredProducts.forEach(product => {
                const productItem = document.createElement('li');
                productItem.classList.add('list-group-item', 'list-group-item-action', 'd-flex', 'justify-content-between', 'align-items-center', 'py-2', 'px-3');
                
                const formattedCode = formatProductCode(product.product_code);
                productItem.innerHTML = `
                    <div>
                        <strong class="text-dark">${product.product_name}</strong>
                        <div class="small text-muted">স্টক: ${product.quantity || 0} | কেনা মূল্য: ৳${parseFloat(product.cost_price || 0).toFixed(2)}</div>
                    </div>
                    <span class="badge bg-light text-dark border font-monospace">${formattedCode}</span>
                `;

                productItem.addEventListener('click', function() {
                    addProductToOrder(product);
                    productDropdown.innerHTML = '';
                    document.getElementById('productInputData').value = '';
                    document.getElementById('productInputData').focus();
                });

                productDropdown.appendChild(productItem);
            });
        });

        // Enter Keypress Handler for Barcode Guns
        pInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const searchValue = this.value.trim().toLowerCase();
                if (!searchValue) return;

                const exactMatch = allProducts.find(product => isExactCodeMatch(product, searchValue));
                const matched = exactMatch || allProducts.find(product => {
                    const nameMatch = product.product_name && product.product_name.toLowerCase().includes(searchValue);
                    const codeMatch = product.product_code && product.product_code.toString().toLowerCase().includes(searchValue);
                    return nameMatch || codeMatch;
                });

                if (matched) {
                    addProductToOrder(matched);
                    this.value = '';
                    document.getElementById('productDropdown').innerHTML = '';
                    playScanBeepSound();
                    successToast(`কার্টে যোগ হয়েছে: ${matched.product_name}`);
                } else {
                    errorToast(`প্রোডাক্ট কোড বা নাম পাওয়া যায়নি: ${this.value}`);
                }
            }
        });
    }

    let currentSelectedProductForPurchase = null;

    function addProductToOrder(product) {
        openPurchaseItemLineModal(product);
    }

    function openPurchaseItemLineModal(product) {
        if (!product) return;
        currentSelectedProductForPurchase = product;

        const modalEl = document.getElementById('purchaseItemLineModal');
        if (!modalEl) {
            console.error("purchaseItemLineModal element not found!");
            return;
        }

        if (modalEl.parentNode && modalEl.parentNode !== document.body) {
            document.body.appendChild(modalEl);
        }

        const orderTableBody = document.getElementById('orderTableBody');
        const existingRows = orderTableBody ? orderTableBody.querySelectorAll('tr.body-row') : [];
        let existingRow = null;

        existingRows.forEach(row => {
            const pIdCell = row.cells[1] || row.querySelector('.product-id-val');
            if (pIdCell && pIdCell.innerText.trim() == product.id) {
                existingRow = row;
            }
        });

        let defaultQty = 1;
        let defaultCost = parseFloat(product.cost_price || 0);

        if (existingRow) {
            const qtyInput = existingRow.querySelector('.quantity');
            const costInput = existingRow.querySelector('.cost-price');
            if (qtyInput) defaultQty = parseFloat(parseBanglaFloat(qtyInput.value)) || 1;
            if (costInput) defaultCost = parseFloat(parseBanglaFloat(costInput.value)) || defaultCost;
        }

        document.getElementById('pItemNameDisplay').innerText = product.product_name || 'N/A';
        document.getElementById('pItemProductId').value = product.id;
        document.getElementById('pItemQty').value = engToBanglaNum(defaultQty);
        document.getElementById('pItemCostPrice').value = engToBanglaNum(defaultCost.toFixed(2));

        calculatePItemTotal();

        modalEl.style.setProperty('z-index', '1095', 'important');
        modalEl.style.setProperty('display', 'block', 'important');
        modalEl.style.opacity = '1';
        modalEl.style.visibility = 'visible';
        modalEl.classList.add('show');

        let backdrop = document.getElementById('purchaseItemLineBackdrop');
        if (!backdrop) {
            backdrop = document.createElement('div');
            backdrop.id = 'purchaseItemLineBackdrop';
            backdrop.className = 'modal-backdrop fade show';
            backdrop.style.setProperty('z-index', '1090', 'important');
            backdrop.onclick = closePurchaseItemLineModal;
            document.body.appendChild(backdrop);
        }

        setTimeout(() => {
            const qtyField = document.getElementById('pItemQty');
            if (qtyField) {
                qtyField.focus();
                qtyField.select();
            }
        }, 200);
    }

    function closePurchaseItemLineModal() {
        const modalEl = document.getElementById('purchaseItemLineModal');
        if (modalEl) {
            modalEl.classList.remove('show');
            modalEl.style.display = 'none';
        }
        const backdrop = document.getElementById('purchaseItemLineBackdrop');
        if (backdrop && backdrop.parentNode) {
            backdrop.parentNode.removeChild(backdrop);
        }
    }

    function adjustPItemQty(delta) {
        const qtyInput = document.getElementById('pItemQty');
        let current = parseFloat(parseBanglaFloat(qtyInput.value)) || 0;
        current = Math.max(1, current + delta);
        qtyInput.value = engToBanglaNum(current);
        calculatePItemTotal();
    }

    function calculatePItemTotal() {
        const qtyVal = parseFloat(parseBanglaFloat(document.getElementById('pItemQty').value)) || 0;
        const costVal = parseFloat(parseBanglaFloat(document.getElementById('pItemCostPrice').value)) || 0;

        const total = qtyVal * costVal;

        const bglQty = engToBanglaNum(qtyVal);
        const bglCost = engToBanglaNum(costVal.toFixed(2));
        const bglTotal = engToBanglaNum(total.toFixed(2));

        document.getElementById('pItemBreakdownText').innerText = `${bglQty} X ৳ ${bglCost} = ৳ ${bglTotal}`;
        document.getElementById('pItemTotalText').innerText = `৳ ${bglTotal}`;
    }

    function confirmAddPurchaseItemLine() {
        if (!currentSelectedProductForPurchase) return;

        const qtyVal = parseFloat(parseBanglaFloat(document.getElementById('pItemQty').value)) || 1;
        const costVal = parseFloat(parseBanglaFloat(document.getElementById('pItemCostPrice').value)) || 0;

        addProductToOrderWithValues(currentSelectedProductForPurchase, qtyVal, costVal);

        closePurchaseItemLineModal();
    }

    function addProductToOrderWithValues(product, qty, cost) {
        const orderTableBody = document.getElementById('orderTableBody');
        const existingRows = orderTableBody.querySelectorAll('tr.body-row');
        let existingRow = null;

        existingRows.forEach(row => {
            const pIdCell = row.cells[1] || row.querySelector('.product-id-val');
            if (pIdCell && pIdCell.innerText.trim() == product.id) {
                existingRow = row;
            }
        });

        if (existingRow) {
            const qtyInput = existingRow.querySelector('.quantity');
            const costInput = existingRow.querySelector('.cost-price');

            if (qtyInput) qtyInput.value = qty;
            if (costInput) costInput.value = cost.toFixed(2);

            existingRow.style.transition = 'background-color 0.3s ease';
            existingRow.style.backgroundColor = '#F3ECFB';
            setTimeout(() => {
                existingRow.style.backgroundColor = '';
            }, 600);

            updateRowSubtotal.call(qtyInput || costInput);
            successToast(`কার্ট আপডেট করা হয়েছে: ${product.product_name}`);
            return;
        }

        // Insert new row
        const newRow = orderTableBody.insertRow();
        newRow.className = 'body-row align-middle';

        newRow.innerHTML = `
            <td class="body-cell py-3 px-3" style="cursor: pointer;" onclick="openPurchaseItemLineModalByRow(this)" title="আইটেম এডিট করুন">
                <div class="fw-bold text-dark fs-6">${product.product_name}</div>
                <div class="small text-muted">ID: #${product.id}</div>
            </td>
            <td style="display: none;" class="product-id-val">${product.id}</td>
            <td class="body-cell py-3 px-2">
                <div class="mb-1">
                    <input type="text" id="UpdateProductCode" class="form-control form-control-sm bg-light text-dark fw-bold font-monospace" value="${formatProductCode(product.product_code)}" placeholder="Barcodes" readonly style="font-size: 12px;" />
                </div>
                <div class="input-group input-group-sm">
                    <input class="enter_barcode form-control" id="ProductBarCodeInput" type="text" placeholder="Add Barcode" style="font-size: 12px;" />
                    <button type="button" class="btn text-white btn-sm" onclick="ADDProductBarCode(this)" style="background:#8C56D4; font-size:11px;">+ Add</button>
                </div>
            </td>
            <td class="body-cell py-3 px-2 text-center" style="width: 140px;">
                <div class="d-inline-flex align-items-center justify-content-center border rounded-3 p-1 bg-white shadow-sm" style="white-space: nowrap;">
                    <button type="button" class="btn btn-sm btn-light border-0 fw-bold px-2 py-0" onclick="changeRowQty(this, -1)" style="font-size: 16px; width: 28px; height: 28px; line-height: 1; border-radius: 6px; color: #475569;">-</button>
                    <input type="number" value="${qty}" min="1" class="form-control form-control-sm text-center border-0 fw-bold quantity px-1" style="width: 45px; height: 28px; font-size: 14px; background: transparent; box-shadow: none;" />
                    <button type="button" class="btn btn-sm btn-light border-0 fw-bold px-2 py-0" onclick="changeRowQty(this, 1)" style="font-size: 16px; width: 28px; height: 28px; line-height: 1; border-radius: 6px; color: #475569;">+</button>
                </div>
            </td>
            <td class="body-cell py-3 px-2" style="width: 140px;">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-light">৳</span>
                    <input type="number" step="any" value="${cost ? cost.toFixed(2) : ''}" id="EnterCostPrice" class="form-control cost-price fw-bold" placeholder="Cost" />
                </div>
            </td>
            <td class="subtotal body-cell py-3 px-3 text-end fw-bold fs-6" style="width: 130px; color: #8C56D4;">
                ৳ ${(qty * cost).toFixed(2)}
            </td>
            <td class="body-cell py-3 px-2 text-center" style="width: 70px;">
                <button type="button" class="btn btn-sm btn-outline-primary border-0 me-1" onclick="openPurchaseItemLineModalByRow(this)" title="আইটেম এডিট করুন">
                    <i class="fa-solid fa-pen-to-square fs-6"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle" onclick="removeRow(this)" title="Remove item">
                    <i class="fa-solid fa-trash-can fs-6"></i>
                </button>
            </td>
        `;

        const qtyInput = newRow.querySelector('.quantity');
        const costInput = newRow.querySelector('.cost-price');

        if (qtyInput) qtyInput.addEventListener('input', updateRowSubtotal);
        if (costInput) costInput.addEventListener('input', updateRowSubtotal);

        updateRowSubtotal.call(qtyInput || costInput);
        successToast(`কার্টে যোগ হয়েছে: ${product.product_name}`);
    }

    function openPurchaseItemLineModalByRow(btnOrCell) {
        const row = btnOrCell.closest('tr');
        if (!row) return;
        const pIdCell = row.cells[1] || row.querySelector('.product-id-val');
        if (!pIdCell) return;
        const pId = pIdCell.innerText.trim();

        const product = allProducts.find(p => p.id == pId);
        if (product) {
            openPurchaseItemLineModal(product);
        }
    }

    function changeRowQty(btn, delta) {
        const row = btn.closest('tr');
        const qtyInput = row.querySelector('.quantity');
        let val = (parseInt(qtyInput.value) || 0) + delta;
        if (val < 1) val = 1;
        qtyInput.value = val;
        updateRowSubtotal.call(qtyInput);
    }

    function updateRowSubtotal() {
        const row = this.closest('tr');
        const quantity = parseBanglaFloat(row.querySelector('.quantity').value) || 0;
        const costPrice = parseBanglaFloat(row.querySelector('.cost-price').value) || 0;
        const subtotal = quantity * costPrice;

        row.querySelector('.subtotal').innerText = '৳ ' + subtotal.toFixed(2);
        updateTotals();
    }

    function updateTotals() {
        let totalQuantity = 0;
        let totalSubTotal = 0;

        const rows = document.querySelectorAll('#orderTableBody tr');
        rows.forEach(row => {
            const quantity = parseBanglaFloat(row.querySelector('.quantity').value) || 0;
            const costPrice = parseBanglaFloat(row.querySelector('.cost-price').value) || 0;
            const subtotal = quantity * costPrice;

            totalQuantity += quantity;
            totalSubTotal += subtotal;

            row.querySelector('.subtotal').innerText = '৳ ' + subtotal.toFixed(2);
        });

        document.getElementById('totalQuantity').innerText = totalQuantity.toFixed(2);
        document.getElementById('totalSubTotal').innerText = totalSubTotal.toFixed(2);

        const grandSubtotal = totalSubTotal;
        document.getElementById('grandSubtotal').value = grandSubtotal.toFixed(2);

        if (typeof window.calculateDuePayment === 'function') {
            window.calculateDuePayment();
        }
    }

    function removeRow(button) {
        const row = button.closest('tr');
        if (row && row.parentElement) {
            row.parentElement.removeChild(row);
            updateTotals();
        }
    }

    let UpdatebarcodeLists = {};

    function ADDProductBarCode(button) {
        const row = button.closest('tr');
        const productId = row.querySelector('.product-id-val').innerText.trim();
        const barcodeInput = row.querySelector('#ProductBarCodeInput');
        const UpdateProductCode = row.querySelector('#UpdateProductCode');

        const barcode = barcodeInput.value.trim();

        if (!barcode) {
            alert("Please enter a barcode!");
            return;
        }

        if (!UpdatebarcodeLists[productId]) {
            UpdatebarcodeLists[productId] = [];
        }

        const existingBarcodes = UpdateProductCode.value.split(', ').filter(code => code.trim());
        UpdatebarcodeLists[productId] = Array.from(new Set([...UpdatebarcodeLists[productId], ...existingBarcodes]));

        if (UpdatebarcodeLists[productId].includes(barcode)) {
            alert('This barcode is already added!');
            return;
        }

        UpdatebarcodeLists[productId].push(barcode);
        UpdateProductCode.value = UpdatebarcodeLists[productId].join(', ');
        barcodeInput.value = '';
    }

    const today = new Date().toISOString().split('T')[0];
    if (document.getElementById('PurchaseDate')) {
        document.getElementById('PurchaseDate').value = today;
    }

    async function PurchaseDataSave(event) {
        if (event) event.preventDefault();

        let products = [];
        const rows = document.querySelectorAll('#orderTableBody tr');

        rows.forEach(row => {
            const productId = row.querySelector('.product-id-val').innerText.trim();
            const quantity = parseInt(row.querySelector('.quantity').value) || 0;
            const costPrice = parseFloat(row.querySelector('.cost-price').value) || 0;
            const subtotalText = row.querySelector('.subtotal').innerText.replace(/[^\d.]/g, '');
            const subtotal = parseFloat(subtotalText) || (quantity * costPrice);
            const ProductCodes = UpdatebarcodeLists[productId] || [];

            if (quantity <= 0) {
                alert("Quantity must be greater than zero!");
                return;
            }

            products.push({
                product_id: productId,
                quantity: quantity,
                product_code: ProductCodes,
                cost_price: costPrice,
                subtotal: subtotal
            });
        });

        if (products.length === 0) {
            alert("At least one product must be added!");
            return;
        }

        let formData = new FormData();
        formData.append('supplier_id', document.getElementById('SupplierDataList').value);
        formData.append('purchase_payable_amount', document.getElementById('PurchasePayableAmount').value || 0);
        formData.append('date', document.getElementById('PurchaseDate').value);
        formData.append('purchase_due_collection_date', document.getElementById('PurchaseDate').value);
        formData.append('referance_no', document.getElementById('ReferenceNo').value);
        formData.append('payment_status', document.getElementById('paymentStatusDisplay').textContent.trim());
        formData.append('grand_subtotal', parseFloat(document.getElementById('grandSubtotal').value) || 0);
        formData.append('return_adjustment_amount', parseFloat(document.getElementById('returnAdjustmentAmount').value) || 0);
        formData.append('payment_method', document.getElementById('paymentMethod').value || 'Cash');
        formData.append('paid_amount', parseFloat(document.getElementById('paidAmount').value) || 0);
        formData.append('due_amount', parseFloat(document.getElementById('dueAmount').value) || 0);
        formData.append('transaction_id', document.getElementById('paymentDetails').value);
        formData.append('products', JSON.stringify(products));

        const imgInput = document.getElementById('AttachDocument');
        if (imgInput && imgInput.files[0]) {
            formData.append('img', imgInput.files[0]);
        }

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        try {
            let res = await axios.post("/api/create-purchases", formData, config);

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                const formEl = document.getElementById("purchaseCreateForm") || document.getElementById("signup");
                if (formEl) formEl.reset();
                const modal = document.getElementById('exampleModal');
                closeModal(modal);
                location.reload();
            } else {
                errorToast(res.data['message']);
            }
        } catch (e) {
            console.error("Purchase Save Error:", e);
            unauthorized(e.response?.status);
        }
    }

    function closeModal(modal) {
        if (!modal) modal = document.getElementById('exampleModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

    /* ==========================================================================
       MOBILE PURCHASE SYSTEM JAVASCRIPT LOGIC
       ========================================================================== */
    let mobilePurchaseCartItems = [];
    let selectedMobileSupplier = null;
    let nextPurSeqNo = 1;
    let mobilePurHtml5QrCode = null;
    let mobilePurCamFacingMode = "environment";
    let lastMobilePurScannedCode = "";
    let purchaseFlatpickrInstance = null;
    let allPurchasesListCache = [];

    let mobilePaymentRows = [
        { id: 1, type: 'Cash', amount: '', trxId: '', phone: '' }
    ];

    let mobileBankingMethods = [
        { key: 'Bkash', name: 'bKash', icon: 'fa-solid fa-mobile-screen', color: '#ec4899', bg: '#fdf2f8' },
        { key: 'Nagad', name: 'Nagad', icon: 'fa-solid fa-wallet', color: '#f97316', bg: '#fff7ed' },
        { key: 'Rocket', name: 'Rocket', icon: 'fa-solid fa-rocket', color: '#8b5cf6', bg: '#f5f3ff' },
        { key: 'Upay', name: 'Upay', icon: 'fa-solid fa-money-bill-transfer', color: '#06b6d4', bg: '#ecfeff' }
    ];

    let bankMethods = [
        { key: 'Bank', name: 'Bank', icon: 'fa-solid fa-building-columns', color: '#2563eb', bg: '#eff6ff' },
        { key: 'Card', name: 'Card', icon: 'fa-solid fa-credit-card', color: '#0d9488', bg: '#f0fdfa' }
    ];

    async function generateNewDynamicBillNo(showToast = false) {
        try {
            let res = await axios.get("/api/purchases-list", HeaderToken());
            if (res.data && res.data.status === "success" && Array.isArray(res.data.PurchasessData)) {
                let maxId = 0;
                res.data.PurchasessData.forEach(p => {
                    let pid = parseInt(p.id);
                    if (pid && pid > maxId) maxId = pid;
                });
                nextPurSeqNo = maxId + 1;
            }
        } catch (e) {
            console.log("Error fetching purchases list for bill number:", e);
        }

        const paddedNum = String(nextPurSeqNo).padStart(5, '0');
        const dynamicBillNo = `#PurID${paddedNum}`;

        const inputEl = document.getElementById("mobilePurchaseInvoiceNoInput");
        if (inputEl) {
            inputEl.value = dynamicBillNo;
        }

        const deskRef = document.getElementById("ReferenceNo");
        if (deskRef && (!deskRef.value || deskRef.value.startsWith('#PurID'))) {
            deskRef.value = dynamicBillNo;
        }

        if (showToast && typeof successToast === 'function') {
            successToast(`🔄 বিল নম্বর: ${dynamicBillNo}`);
        }
    }

    function autoGenerateSupplierInvoiceNo() {
        const paddedNum = String(nextPurSeqNo).padStart(5, '0');
        const dynamicBillNo = `#PurID${paddedNum}`;
        
        const refNoInput = document.getElementById("mobilePurchaseRefNo");
        if (refNoInput) {
            refNoInput.value = dynamicBillNo;
        }
        syncMobileRefNoToDesktop(dynamicBillNo);

        if (typeof successToast === 'function') {
            successToast(`🔄 ইনভয়েস নম্বর: ${dynamicBillNo}`);
        }
    }

    function syncMobileRefNoToDesktop(val) {
        const deskRef = document.getElementById("ReferenceNo");
        if (deskRef) deskRef.value = val;
    }

    function syncMobileBillNoToDesktop(val) {
        const deskRef = document.getElementById("ReferenceNo");
        if (deskRef && !document.getElementById("mobilePurchaseRefNo")?.value) {
            deskRef.value = val;
        }
    }

    function openPurchaseDatePicker(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        const dateInput = document.getElementById("mobilePurchaseDate");
        if (!dateInput) return;

        if (!purchaseFlatpickrInstance && typeof flatpickr !== 'undefined') {
            purchaseFlatpickrInstance = flatpickr(dateInput, {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                monthSelectorType: "static",
                onChange: function(selectedDates, dateStr) {
                    const parts = dateStr.split('-');
                    if (parts.length === 3) {
                        const isoDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
                        const deskDate = document.getElementById("PurchaseDate");
                        if (deskDate) deskDate.value = isoDate;
                    }
                }
            });
        }

        if (purchaseFlatpickrInstance) {
            purchaseFlatpickrInstance.open();
        }
    }

    function initMobilePurchaseUI() {
        generateNewDynamicBillNo(false);
        renderMobilePurchaseCart();
        renderMobilePaymentRows();
        refreshSupplierList();

        // Initialize Flatpickr for mobile purchase datepicker
        const dateInput = document.getElementById("mobilePurchaseDate");
        if (dateInput && typeof flatpickr !== 'undefined') {
            purchaseFlatpickrInstance = flatpickr(dateInput, {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                disableMobile: true,
                monthSelectorType: "static",
                onChange: function(selectedDates, dateStr) {
                    const parts = dateStr.split('-');
                    if (parts.length === 3) {
                        const isoDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
                        const deskDate = document.getElementById("PurchaseDate");
                        if (deskDate) deskDate.value = isoDate;
                    }
                }
            });
        }
    }

    async function fetchAndRenderMobilePurchaseList() {
        const container = document.getElementById("mobilePurchaseListCardsContainer");
        if (!container) return;

        container.innerHTML = `
            <div class="text-center py-4 text-muted">
                <div class="spinner-border text-purple mb-2" role="status" style="width: 2rem; height: 2rem; color: #8C56D4;"></div>
                <p class="mb-0 small fw-bold">ক্রয় তালিকা লোড হচ্ছে...</p>
            </div>
        `;

        try {
            let res = await axios.get("/api/purchases-list", HeaderToken());
            if (res.data && res.data.status === "success" && Array.isArray(res.data.PurchasessData)) {
                allPurchasesListCache = res.data.PurchasessData;
                renderMobilePurchaseListCards(allPurchasesListCache);
            } else {
                container.innerHTML = `<div class="p-4 text-center text-muted fw-bold">কোনো ক্রয় তথ্য পাওয়া যায়নি</div>`;
            }
        } catch (e) {
            console.error("Error fetching purchases list:", e);
            container.innerHTML = `<div class="p-4 text-center text-danger fw-bold">ক্রয় তালিকা লোড করতে সমস্যা হয়েছে!</div>`;
        }
    }

    function renderMobilePurchaseListCards(purchases) {
        const container = document.getElementById("mobilePurchaseListCardsContainer");
        if (!container) return;

        if (!purchases || purchases.length === 0) {
            container.innerHTML = `
                <div class="text-center py-4 text-muted bg-white rounded-3 p-4 border">
                    <i class="fa-solid fa-box-open fs-2 mb-2 text-secondary"></i>
                    <p class="mb-0 fw-bold">কোনো ক্রয় তথ্য পাওয়া যায়নি</p>
                </div>
            `;
            return;
        }

        let html = purchases.map(item => {
            const purId = item.purchase_id || ('#PurID' + String(item.id).padStart(5, '0'));
            const suppName = (item.supplier && typeof item.supplier === 'object') ? (item.supplier.name || item.supplier.supplier_name || 'N/A') : (item.supplier || 'N/A');
            const suppDbId = item.supplier_db_id || (item.supplier && typeof item.supplier === 'object' ? item.supplier.id : '') || item.supplier_id || '';
            const suppProfileUrl = suppDbId ? `/supplier/profile/${suppDbId}` : '#';

            let grandTotal = parseFloat(item.grand_subtotal || item.purchase_payable_amount || 0);
            if (grandTotal <= 0 && item.orderDetails && Array.isArray(item.orderDetails)) {
                grandTotal = item.orderDetails.reduce((acc, d) => acc + ((parseFloat(d.cost_price) || 0) * (parseFloat(d.quantity) || 0)), 0);
            }
            const paidAmount = parseFloat(item.paid_amount || 0);
            const dueAmount = Math.max(0, grandTotal - paidAmount);
            
            let statusBadge = `<span class="badge bg-danger text-white px-2 py-1 fw-bold">বাকি</span>`;
            if (paidAmount >= grandTotal && grandTotal > 0) {
                statusBadge = `<span class="badge bg-success text-white px-2 py-1 fw-bold">পরিশোধিত</span>`;
            } else if (paidAmount > 0) {
                statusBadge = `<span class="badge bg-warning text-dark px-2 py-1 fw-bold">আংশিক</span>`;
            }

            return `
                <div class="modal-list-card card border-0 shadow-xs rounded-4 mb-3 p-3 bg-white">
                    <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                        <div class="d-flex align-items-center gap-1">
                            <span class="badge text-white fw-bold px-2 py-1" style="font-size: 12px; border-radius: 8px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);">
                                <i class="fa-solid fa-receipt me-1"></i>${purId}
                            </span>
                            <span class="text-muted small ms-1" style="font-size: 11px;">📅 ${item.date || ''}</span>
                        </div>
                        <div>${statusBadge}</div>
                    </div>

                    <div class="mb-2">
                        <a href="${suppProfileUrl}" class="fw-extrabold text-decoration-none d-inline-flex align-items-center mb-1" style="font-size: 14.5px; color: #8C56D4;" title="${suppName} এর প্রোফাইল দেখুন">
                            <i class="fa-solid fa-truck-field me-1.5" style="color: #8C56D4;"></i>
                            <span class="text-decoration-underline">${suppName}</span>
                            <i class="fa-solid fa-arrow-up-right-from-square ms-1.5 text-muted" style="font-size: 10px;"></i>
                        </a>
                        <div class="text-muted small" style="font-size: 11px;">রেফারেন্স: ${item.referance_no || 'N/A'}</div>
                    </div>

                    <div class="p-2.5 rounded-3 mb-2 border" style="border-color: #E5D5F7 !important; background: #FAF7FD;">
                        <div class="row g-1 text-center" style="font-size: 12px;">
                            <div class="col-4 text-start">
                                <span class="text-muted d-block" style="font-size: 10px;">সর্বমোট</span>
                                <strong class="text-dark fw-bold">৳ ${grandTotal.toFixed(2)}</strong>
                            </div>
                            <div class="col-4 text-center">
                                <span class="text-muted d-block" style="font-size: 10px;">পরিশোধিত</span>
                                <strong class="fw-bold" style="color: #8C56D4;">৳ ${paidAmount.toFixed(2)}</strong>
                            </div>
                            <div class="col-4 text-end">
                                <span class="text-muted d-block" style="font-size: 10px;">বাকি</span>
                                <strong class="text-danger fw-bold">৳ ${dueAmount.toFixed(2)}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 pt-1 border-top">
                        <a href="/purchase-invoice/${item.id}" class="btn btn-sm btn-outline-primary fw-bold px-3 py-1.5" style="border-radius: 8px; font-size: 12px;">
                            <i class="fa-solid fa-eye me-1"></i> ভিউ মেমো
                        </a>
                    </div>
                </div>
            `;
        }).join('');

        container.innerHTML = html;
    }

    function filterMobilePurchaseListModal(query) {
        const q = query.toLowerCase().trim();
        const filtered = allPurchasesListCache.filter(item => {
            const purId = (item.purchase_id || '').toLowerCase();
            const refNo = (item.referance_no || '').toLowerCase();
            const suppName = ((item.supplier && item.supplier.name) || item.supplier || '').toLowerCase();
            return purId.includes(q) || refNo.includes(q) || suppName.includes(q);
        });
        renderMobilePurchaseListCards(filtered);
    }

    function openMobilePurchaseListModal() {
        showMobileModal("mobilePurchaseListModal");
        fetchAndRenderMobilePurchaseList();
    }

    function openMobilePurchaseCameraScanner() {
        showMobileModal("mobilePurchaseBarcodeScannerModal");
        startMobilePurchaseCameraScanner();
    }

    function startMobilePurchaseCameraScanner() {
        if (mobilePurHtml5QrCode && mobilePurHtml5QrCode.isScanning) {
            mobilePurHtml5QrCode.stop().then(() => initMobilePurHtml5QrCode()).catch(() => initMobilePurHtml5QrCode());
        } else {
            initMobilePurHtml5QrCode();
        }
    }

    function initMobilePurHtml5QrCode() {
        const statusEl = document.getElementById("mobilePurCamScannerStatus");
        if (statusEl) {
            statusEl.className = "alert alert-info py-2 small mb-3";
            statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।';
        }

        if (!window.Html5Qrcode) {
            if (statusEl) {
                statusEl.className = "alert alert-danger py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> বারকোড স্ক্যানার লাইব্রেরি পাওয়া যায়নি!';
            }
            return;
        }

        if (!mobilePurHtml5QrCode) {
            mobilePurHtml5QrCode = new Html5Qrcode("mobilePurCameraReader");
        }

        const config = { 
            fps: 15, 
            qrbox: { width: 260, height: 160 },
            aspectRatio: 1.333334
        };

        mobilePurHtml5QrCode.start(
            { facingMode: mobilePurCamFacingMode },
            config,
            onMobilePurBarcodeDetectedSuccess,
            onMobilePurBarcodeDetectedError
        ).then(() => {
            if (statusEl) {
                statusEl.className = "alert alert-success py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-video me-1"></i> ক্যামেরা সক্রিয়! বারকোড স্ক্যান করলে সরাসরি খুঁজবে।';
            }
        }).catch(err => {
            console.error("Mobile Pur Camera start error:", err);
            if (statusEl) {
                statusEl.className = "alert alert-danger py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> ক্যামেরা চালু করা যায়নি! ব্রাউজারের ক্যামেরা পারমিশন এলাউ (Allow) করুন।';
            }
        });
    }

    function onMobilePurBarcodeDetectedSuccess(decodedText) {
        if (!decodedText || decodedText === lastMobilePurScannedCode) return;
        lastMobilePurScannedCode = decodedText;

        if (typeof successToast === 'function') {
            successToast(`📷 স্ক্যানড বারকোড: ${decodedText}`);
        }

        stopMobilePurchaseCameraScanner();

        const inputEl = document.getElementById("mobilePurchaseProductSearchInput");
        if (inputEl) {
            inputEl.value = decodedText;
            filterMobilePurchaseProducts(decodedText);
        }

        setTimeout(() => { lastMobilePurScannedCode = ""; }, 2000);
    }

    function onMobilePurBarcodeDetectedError(error) {}

    function switchMobilePurCameraFacingMode() {
        mobilePurCamFacingMode = (mobilePurCamFacingMode === "environment") ? "user" : "environment";
        startMobilePurchaseCameraScanner();
    }

    function stopMobilePurchaseCameraScanner() {
        if (mobilePurHtml5QrCode && mobilePurHtml5QrCode.isScanning) {
            mobilePurHtml5QrCode.stop().then(() => {
                mobilePurHtml5QrCode.clear();
                mobilePurHtml5QrCode = null;
                hideMobileModal("mobilePurchaseBarcodeScannerModal");
            }).catch(() => {
                mobilePurHtml5QrCode = null;
                hideMobileModal("mobilePurchaseBarcodeScannerModal");
            });
        } else {
            hideMobileModal("mobilePurchaseBarcodeScannerModal");
        }
    }

    function showMobileModal(modalId) {
        const modalEl = document.getElementById(modalId);
        if (modalEl) {
            if (modalEl.parentElement !== document.body) {
                document.body.appendChild(modalEl);
            }
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.show();
            } else if (typeof $ !== 'undefined') {
                $('#' + modalId).modal('show');
            } else {
                modalEl.style.display = 'block';
                modalEl.classList.add('show');
            }
        }
    }

    function hideMobileModal(modalId) {
        const modalEl = document.getElementById(modalId);
        if (modalEl) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                let modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            } else if (typeof $ !== 'undefined') {
                $('#' + modalId).modal('hide');
            } else {
                modalEl.style.display = 'none';
                modalEl.classList.remove('show');
            }
        }
    }

    function buildMobileSupplierRowHtml(s) {
        const escapedName = (s.name || '').replace(/'/g, "\\'");
        const totalPayable = parseFloat(s.combined_due || s.purchase_payable_amount || 0);
        const payableFormatted = typeof engToBanglaNum === 'function' ? engToBanglaNum(totalPayable.toFixed(2)) : totalPayable.toFixed(2);
        const payableBadge = totalPayable > 0 
            ? `<span class="badge bg-danger mt-1">দেয়: ৳ ${payableFormatted}</span>` 
            : `<span class="badge bg-secondary mt-1">দেয়: ৳ ০০.০০</span>`;
        const mobileBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(s.mobile || '') : (s.mobile || '');

        return `
            <div class="modal-list-card d-flex justify-content-between align-items-center" onclick="selectMobileSupplierItem(${s.id})">
                <div class="flex-grow-1 pe-2">
                    <strong class="text-dark d-block" style="font-size: 15px;">${s.name} ${s.company ? `<small class="text-muted">(${s.company})</small>` : ''}</strong>
                    <small class="text-muted d-block">${mobileBn} ${s.address ? `• ${s.address}` : ''}</small>
                    ${payableBadge}
                </div>
                <div class="d-flex align-items-center gap-1" onclick="event.stopPropagation();">
                    <button type="button" class="btn btn-sm btn-outline-primary border-0 rounded-circle d-flex align-items-center justify-content-center shadow-xs" onclick="editSupplierFromMobile(${s.id})" title="এডিট করুন" style="width: 36px; height: 36px;">
                        <i class="fa-solid fa-pen-to-square fs-6"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle d-flex align-items-center justify-content-center shadow-xs ms-1" onclick="deleteSupplierFromMobile(${s.id}, '${escapedName}')" title="ডিলিট করুন" style="width: 36px; height: 36px;">
                        <i class="fa-solid fa-trash-can fs-6"></i>
                    </button>
                </div>
            </div>
        `;
    }

    function openMobileSupplierSearchModal() {
        const list = document.getElementById("mobileSupplierResultsList");
        if (list) {
            let html = (allSuppliersData || []).map(buildMobileSupplierRowHtml).join('');
            list.innerHTML = html || `<div class="p-3 text-center text-muted">কোনো সাপ্লায়ার পাওয়া যায়নি</div>`;
        }
        showMobileModal("mobileSupplierSearchModal");

        const inputEl = document.getElementById("mobileSupplierSearchInput");
        if (inputEl) {
            try { inputEl.focus(); inputEl.click(); } catch(_) {}
        }
        const modalEl = document.getElementById("mobileSupplierSearchModal");
        if (modalEl) {
            modalEl.addEventListener('shown.bs.modal', function() {
                if (inputEl) { inputEl.focus(); inputEl.click(); }
            }, { once: true });
        }
        setTimeout(() => {
            if (inputEl) {
                inputEl.focus();
                inputEl.click();
            }
        }, 150);
    }

    function filterMobileSuppliers(query) {
        const q = query.toLowerCase().trim();
        const filtered = (allSuppliersData || []).filter(s => 
            (s.name && s.name.toLowerCase().includes(q)) || 
            (s.mobile && s.mobile.includes(q)) || 
            (s.company && s.company.toLowerCase().includes(q))
        );
        const list = document.getElementById("mobileSupplierResultsList");
        if (list) {
            let html = filtered.map(buildMobileSupplierRowHtml).join('');
            list.innerHTML = html || `<div class="p-3 text-center text-muted">কোনো সাপ্লায়ার পাওয়া যায়নি</div>`;
        }
    }

    async function editSupplierFromMobile(supplierId) {
        const supplier = (allSuppliersData || []).find(s => s.id == supplierId);
        if (!supplier) return;

        let confirmEdit = false;
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                title: `<span class="fw-bold text-dark fs-5">সাপ্লায়ার এডিট করুন</span>`,
                html: `<div class="text-muted fs-6 mt-1">আপনি কি <strong style="color:#8C56D4;">"${supplier.name}"</strong> এর তথ্য সংশোধন করতে চান?</div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#8C56D4',
                cancelButtonColor: '#ef4444',
                confirmButtonText: '<i class="fa-solid fa-pen-to-square me-1"></i> হ্যাঁ, এডিট করুন',
                cancelButtonText: 'বাতিল',
                reverseButtons: true
            });
            confirmEdit = result.isConfirmed;
        } else {
            confirmEdit = confirm(`আপনি কি "${supplier.name}" সাপ্লায়ারের তথ্য সংশোধন করতে চান?`);
        }

        if (!confirmEdit) return;

        hideMobileModal("mobileSupplierSearchModal");
        if (typeof openSupplierUpdateModal === 'function') {
            await openSupplierUpdateModal(supplier);
        } else {
            errorToast("সাপ্লায়ার আপডেট মডাল পাওয়া যায়নি!");
        }
    }

    async function deleteSupplierFromMobile(supplierId, supplierName) {
        let confirmDelete = false;
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                title: `<span class="fw-bold text-dark fs-5">আপনি কি নিশ্চিত?</span>`,
                html: `<div class="text-muted fs-6 mt-1"><strong class="text-danger">"${supplierName}"</strong> সাপ্লায়ারটি ডিলিট করতে চান?</div>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: '<i class="fa-solid fa-trash-can me-1"></i> হ্যাঁ, ডিলিট করুন!',
                cancelButtonText: 'বাতিল',
                reverseButtons: true
            });
            confirmDelete = result.isConfirmed;
        } else {
            confirmDelete = confirm(`আপনি কি নিশ্চিতভাবে "${supplierName}" সাপ্লায়ারটি ডিলিট করতে চান?`);
        }

        if (!confirmDelete) return;

        try {
            let res = await axios.post("/api/delete-supplier", { id: supplierId.toString() }, HeaderToken());

            if (res.data['status'] === "success") {
                successToast(res.data['message'] || "🎉 সাপ্লায়ার ডিলিট হয়েছে!");

                allSuppliersData = (allSuppliersData || []).filter(s => s.id != supplierId);

                if (selectedMobileSupplier && selectedMobileSupplier.id == supplierId) {
                    selectedMobileSupplier = null;
                    const displayEl = document.getElementById("mobileSupplierNameDisplay");
                    if (displayEl) displayEl.textContent = "সাপ্লায়ার সিলেক্ট করুন";
                    const card = document.getElementById("mobileSupplierDetailsCard");
                    if (card) card.classList.add("d-none");
                }

                openMobileSupplierSearchModal();
            } else {
                errorToast(res.data['message'] || "সাপ্লায়ার ডিলিট করা সম্ভব হয়নি!");
            }
        } catch (e) {
            console.error("Delete Supplier error:", e);
            errorToast("সাপ্লায়ার ডিলিট করতে সমস্যা হয়েছে!");
        }
    }

    function selectMobileSupplierItem(supplierId) {
        selectedMobileSupplier = (allSuppliersData || []).find(s => s.id == supplierId);
        if (selectedMobileSupplier) {
            const totalPayable = parseFloat(selectedMobileSupplier.combined_due || selectedMobileSupplier.purchase_payable_amount || 0);
            const payableFormatted = typeof engToBanglaNum === 'function' ? engToBanglaNum(totalPayable.toFixed(2)) : totalPayable.toFixed(2);
            const mobileBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(selectedMobileSupplier.mobile || '') : (selectedMobileSupplier.mobile || '');

            const displayEl = document.getElementById("mobileSupplierNameDisplay");
            if (displayEl) {
                displayEl.innerHTML = `<a href="/supplier/profile/${selectedMobileSupplier.id}" target="_blank" class="text-decoration-none fw-extrabold" style="color:#8C56D4;" onclick="event.stopPropagation();" title="সাপ্লায়ার প্রোফাইল দেখুন">${selectedMobileSupplier.name} <i class="fa-solid fa-arrow-up-right-from-square small ms-1" style="font-size: 11px;"></i></a>`;
            }

            const card = document.getElementById("mobileSupplierDetailsCard");
            if (card) {
                card.classList.remove("d-none");
                const profileLink = document.getElementById("mobileSuppCardProfileLink");
                if (profileLink) {
                    profileLink.href = `/supplier/profile/${selectedMobileSupplier.id}`;
                    profileLink.textContent = selectedMobileSupplier.name;
                }
                document.getElementById("mobileSuppCardMobile").textContent = mobileBn || '-';
                document.getElementById("mobileSuppCardCompany").textContent = selectedMobileSupplier.company || '-';
                document.getElementById("mobileSuppCardPayable").textContent = '৳ ' + payableFormatted;
            }
        }
        hideMobileModal("mobileSupplierSearchModal");
    }

    function removeSelectedMobileSupplier() {
        selectedMobileSupplier = null;
        const displayEl = document.getElementById("mobileSupplierNameDisplay");
        if (displayEl) displayEl.textContent = "সাপ্লায়ার সিলেক্ট করুন";
        const card = document.getElementById("mobileSupplierDetailsCard");
        if (card) card.classList.add("d-none");
    }

    function buildMobileProductRowHtml(p) {
        const escapedName = (p.product_name || '').replace(/'/g, "\\'");
        const costVal = parseFloat(p.cost_price || p.price || 0).toFixed(2);
        
        let unitVal = '';
        if (p.unit && typeof p.unit === 'object') {
            unitVal = p.unit.name || p.unit.unit_name || p.unit.unit_name_bn || '';
        } else if (p.unit_name) {
            unitVal = p.unit_name;
        } else if (p.unit) {
            unitVal = p.unit;
        }

        const rawStock = parseFloat(p.quantity || p.stock || 0);
        const stockBadge = rawStock > 0 
            ? `<span class="badge bg-success-subtle text-success border border-success-subtle" style="font-size: 11px;">স্টক: ${engToBanglaNum(rawStock)} ${unitVal}</span>` 
            : `<span class="badge bg-danger-subtle text-danger border border-danger-subtle" style="font-size: 11px;">স্টক নেই</span>`;

        return `
            <div class="modal-list-card d-flex justify-content-between align-items-center" onclick="openMobilePurchaseItemLineForm(${p.id})">
                <div class="flex-grow-1 pe-2">
                    <strong class="text-dark d-block mb-1" style="font-size: 14.5px;">${p.product_name}</strong>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="badge" style="background: #F3ECFB; color: #8C56D4; font-size: 11px;">ক্রয়: ৳ ${engToBanglaNum(costVal)}</span>
                        ${stockBadge}
                        ${p.product_code ? `<span class="text-muted" style="font-size: 11px;">কোড: ${p.product_code}</span>` : ''}
                    </div>
                </div>
                <div class="d-flex align-items-center gap-1" onclick="event.stopPropagation();">
                    <button type="button" class="btn btn-sm btn-outline-primary border-0 rounded-circle d-flex align-items-center justify-content-center shadow-xs" onclick="editProductFromMobile(${p.id})" title="এডিট করুন" style="width: 36px; height: 36px;">
                        <i class="fa-solid fa-pen-to-square fs-6"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-circle d-flex align-items-center justify-content-center shadow-xs ms-1" onclick="deleteProductFromMobile(${p.id}, '${escapedName}')" title="ডিলিট করুন" style="width: 36px; height: 36px;">
                        <i class="fa-solid fa-trash-can fs-6"></i>
                    </button>
                </div>
            </div>
        `;
    }

    function banglishToBangla(text) {
        if (!text) return '';
        let str = String(text).toLowerCase().trim();

        const wordMap = {
            'meri': 'মেরি', 'meril': 'মেরিল', 'lafz': 'লাফজ', 'lafs': 'লাফজ',
            'keya': 'কেয়া', 'kya': 'কেয়া', 'pran': 'প্রান', 'prann': 'প্রাণ',
            'radhuni': 'রাঁধুনী', 'raduni': 'রাঁধুনী', 'sunsilk': 'সানসিল্ক',
            'sansilk': 'সানসিল্ক', 'parachute': 'প্যারাসুট', 'parasut': 'প্যারাসুট',
            'olympic': 'অলিম্পিক', 'olimpic': 'অলিম্পিক', 'olimpik': 'অলিম্পিক',
            'soap': 'সাবান', 'saban': 'সাবান', 'shaban': 'সাবান',
            'oil': 'তেল', 'tel': 'তেল', 'wash': 'ওয়াশ', 'face': 'ফেস', 'fes': 'ফেস',
            'biscuit': 'বিস্কুট', 'biscut': 'বিস্কুট', 'shampoo': 'শ্যাম্পু', 'shampu': 'শ্যাম্পু'
        };

        if (wordMap[str]) return wordMap[str];

        const convertWord = (w) => {
            if (!w) return '';
            if (wordMap[w]) return wordMap[w];

            const patterns = [
                { en: 'kkh', bn: 'ক্ষ' }, { en: 'cch', bn: 'চ্ছ' }, { en: 'chh', bn: 'ছ' },
                { en: 'kh',  bn: 'খ' }, { en: 'gh',  bn: 'ঘ' }, { en: 'ng',  bn: 'ঙ' },
                { en: 'ch',  bn: 'চ' }, { en: 'jh',  bn: 'ঝ' }, { en: 'th',  bn: 'থ' },
                { en: 'dh',  bn: 'ধ' }, { en: 'ph',  bn: 'ফ' }, { en: 'bh',  bn: 'ভ' },
                { en: 'sh',  bn: 'শ' }, { en: 'k',   bn: 'ক' }, { en: 'g',   bn: 'গ' },
                { en: 'j',   bn: 'জ' }, { en: 't',   bn: 'ত' }, { en: 'd',   bn: 'দ' },
                { en: 'n',   bn: 'ন' }, { en: 'p',   bn: 'প' }, { en: 'f',   bn: 'ফ' },
                { en: 'b',   bn: 'ব' }, { en: 'm',   bn: 'ম' }, { en: 'z',   bn: 'জ' },
                { en: 'r',   bn: 'র' }, { en: 'l',   bn: 'ল' }, { en: 's',   bn: 'স' },
                { en: 'h',   bn: 'হ' }, { en: 'y',   bn: 'য়' }, { en: 'v',   bn: 'ভ' },
                { en: 'w',   bn: 'ও' }
            ];
            const vowelKars = [
                { en: 'ee', bn: 'ী' }, { en: 'oo', bn: 'ূ' }, { en: 'oi', bn: 'ৈ' },
                { en: 'ou', bn: 'ৌ' }, { en: 'a',  bn: 'া' }, { en: 'i',  bn: 'ি' },
                { en: 'u',  bn: 'ু' }, { en: 'e',  bn: 'ে' }, { en: 'o',  bn: '' }
            ];
            const indVowels = [
                { en: 'a', bn: 'আ' }, { en: 'i', bn: 'ই' }, { en: 'u', bn: 'উ' },
                { en: 'e', bn: 'এ' }, { en: 'o', bn: 'অ' }
            ];

            let res = '';
            let i = 0;
            while (i < w.length) {
                let matchedCons = false;
                for (let p of patterns) {
                    if (w.startsWith(p.en, i)) {
                        res += p.bn;
                        i += p.en.length;
                        matchedCons = true;
                        for (let v of vowelKars) {
                            if (w.startsWith(v.en, i)) {
                                res += v.bn;
                                i += v.en.length;
                                break;
                            }
                        }
                        break;
                    }
                }
                if (!matchedCons) {
                    let matchedVowel = false;
                    for (let v of indVowels) {
                        if (w.startsWith(v.en, i)) {
                            res += v.bn;
                            i += v.en.length;
                            matchedVowel = true;
                            break;
                        }
                    }
                    if (!matchedVowel) {
                        res += w[i];
                        i++;
                    }
                }
            }
            return res;
        };

        return str.split(/\s+/).map(convertWord).join(' ');
    }

    async function openMobilePurchaseProductSearchModal() {
        if (!allProducts || allProducts.length === 0) {
            await ProductDataShow();
        }
        const list = document.getElementById("mobilePurchaseProductResultsList");
        if (list) {
            let html = (allProducts || []).map(buildMobileProductRowHtml).join('');
            list.innerHTML = html || `<div class="p-3 text-center text-muted">কোনো প্রডাক্ট পাওয়া যায়নি</div>`;
        }
        showMobileModal("mobilePurchaseProductSearchModal");

        const inputEl = document.getElementById("mobilePurchaseProductSearchInput");
        if (inputEl) {
            try { inputEl.focus(); inputEl.click(); } catch(_) {}
        }
        const modalEl = document.getElementById("mobilePurchaseProductSearchModal");
        if (modalEl) {
            modalEl.addEventListener('shown.bs.modal', function() {
                if (inputEl) { inputEl.focus(); inputEl.click(); }
            }, { once: true });
        }

        setTimeout(() => {
            if (inputEl) {
                inputEl.focus();
                inputEl.click();
                if (!inputEl.dataset.imeBound) {
                    inputEl.dataset.imeBound = "true";
                    ['input', 'keyup', 'change', 'compositionupdate', 'compositionend'].forEach(evt => {
                        inputEl.addEventListener(evt, function() {
                            filterMobilePurchaseProducts(this.value);
                        });
                    });
                }
            }
        }, 150);
    }

    function filterMobilePurchaseProducts(query) {
        const rawQuery = (query || '').trim();
        const q = rawQuery.toLowerCase();
        
        if (!q) {
            const list = document.getElementById("mobilePurchaseProductResultsList");
            if (list) {
                list.innerHTML = (allProducts || []).map(buildMobileProductRowHtml).join('');
            }
            return;
        }

        const exactMatches = [];
        const partialMatches = [];

        (allProducts || []).forEach(p => {
            if (isExactCodeMatch(p, rawQuery)) {
                exactMatches.push(p);
            } else {
                const name = (p.product_name || '').toLowerCase();
                const code = (p.product_code ? p.product_code.toString() : '').toLowerCase();
                if (name.includes(q) || code.includes(q)) {
                    partialMatches.push(p);
                }
            }
        });

        const filtered = [...exactMatches, ...partialMatches];
        const list = document.getElementById("mobilePurchaseProductResultsList");
        if (!list) return;

        if (filtered.length > 0) {
            list.innerHTML = filtered.map(buildMobileProductRowHtml).join('');
            return;
        }

        list.innerHTML = `
            <div class="text-center py-4 text-muted bg-white rounded-3 p-4 border">
                <i class="fa-solid fa-magnifying-glass fs-2 mb-2 text-secondary"></i>
                <p class="mb-0 fw-bold">"${rawQuery}" দিয়ে কোনো প্রডাক্ট পাওয়া যায়নি</p>
                <small class="text-muted">কোড নম্বর বা বাংলা/ইংরেজি নাম মেলাতে অন্য শব্দ চেষ্টা করুন</small>
            </div>
        `;
    }

    function openProductCreateModalFromMobile() {
        hideMobileModal("mobilePurchaseProductSearchModal");
        
        setTimeout(() => {
            if (typeof openPosAddProductModal === 'function') {
                openPosAddProductModal();
            } else if (typeof openProductCreateModal === 'function') {
                openProductCreateModal();
            } else {
                if (typeof resetProductForm === 'function') resetProductForm();

                const modalEl = document.getElementById('createProduct');
                if (modalEl) {
                    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                        bootstrap.Modal.getOrCreateInstance(modalEl).show();
                    } else if (typeof $ !== 'undefined') {
                        $(modalEl).modal('show');
                    }
                } else {
                    errorToast("প্রোডাক্ট ক্রিয়েট মডাল পাওয়া যায়নি!");
                }
            }
        }, 150);
    }

    async function editProductFromMobile(productId) {
        const product = (allProducts || []).find(p => p.id == productId);
        if (!product) return;

        let confirmEdit = false;
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                title: `<span class="fw-bold text-dark fs-5">প্রোডাক্ট এডিট করুন</span>`,
                html: `<div class="text-muted fs-6 mt-1">আপনি কি <strong style="color:#8C56D4;">"${product.product_name}"</strong> এর তথ্য সংশোধন করতে চান?</div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#8C56D4',
                cancelButtonColor: '#ef4444',
                confirmButtonText: '<i class="fa-solid fa-pen-to-square me-1"></i> হ্যাঁ, এডিট করুন',
                cancelButtonText: 'বাতিল',
                reverseButtons: true
            });
            confirmEdit = result.isConfirmed;
        } else {
            confirmEdit = confirm(`আপনি কি "${product.product_name}" প্রোডাক্টের তথ্য সংশোধন করতে চান?`);
        }

        if (!confirmEdit) return;

        hideMobileModal("mobilePurchaseProductSearchModal");
        if (typeof openProductUpdateModal === 'function') {
            await openProductUpdateModal(productId);
        } else if (typeof FillUpUpdateForm === 'function') {
            await FillUpUpdateForm(productId);
            const modalEl = document.getElementById('updateProductModal') || document.getElementById('exampleModal');
            if (modalEl) {
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    bootstrap.Modal.getOrCreateInstance(modalEl).show();
                } else if (typeof $ !== 'undefined') {
                    $(modalEl).modal('show');
                }
            }
        } else {
            errorToast("প্রোডাক্ট আপডেট মডাল পাওয়া যায়নি!");
        }
    }

    async function deleteProductFromMobile(productId, productName) {
        let confirmDelete = false;
        if (typeof Swal !== 'undefined') {
            const result = await Swal.fire({
                title: `<span class="fw-bold text-dark fs-5">আপনি কি নিশ্চিত?</span>`,
                html: `<div class="text-muted fs-6 mt-1"><strong class="text-danger">"${productName}"</strong> প্রোডাক্টটি ডিলিট করতে চান?</div>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: '<i class="fa-solid fa-trash-can me-1"></i> হ্যাঁ, ডিলিট করুন!',
                cancelButtonText: 'বাতিল',
                reverseButtons: true
            });
            confirmDelete = result.isConfirmed;
        } else {
            confirmDelete = confirm(`আপনি কি নিশ্চিতভাবে "${productName}" প্রোডাক্টটি ডিলিট করতে চান?`);
        }

        if (!confirmDelete) return;

        try {
            let res = await axios.post("/api/delete-product", { id: productId.toString() }, HeaderToken());

            if (res.data['status'] === "success") {
                successToast(res.data['message'] || "🎉 প্রোডাক্ট সফলভাবে ডিলিট হয়েছে!");

                allProducts = (allProducts || []).filter(p => p.id != productId);
                removeMobilePurchaseCartItem(productId);
                openMobilePurchaseProductSearchModal();
            } else {
                errorToast(res.data['message'] || "প্রোডাক্ট ডিলিট করা সম্ভব হয়নি!");
            }
        } catch (e) {
            console.error("Delete Product error:", e);
            errorToast("প্রোডাক্ট ডিলিট করতে সমস্যা হয়েছে!");
        }
    }

    function refreshMobilePurchaseProducts(newProduct) {
        if (newProduct) {
            if (typeof allProducts !== 'undefined' && Array.isArray(allProducts)) {
                const idx = allProducts.findIndex(p => p.id == newProduct.id);
                if (idx !== -1) {
                    allProducts[idx] = newProduct;
                } else {
                    allProducts.unshift(newProduct);
                }
            }
            openMobilePurchaseItemLineForm(newProduct);
        }
    }
    window.refreshMobilePurchaseProducts = refreshMobilePurchaseProducts;

    function openMobilePurchaseItemLineForm(productOrId) {
        hideMobileModal("mobilePurchaseProductSearchModal");

        let product = (typeof productOrId === 'object') ? productOrId : (allProducts || []).find(p => p.id == productOrId);
        
        if (!product) {
            const existing = mobilePurchaseCartItems.find(item => item.id == productOrId);
            if (existing) {
                product = {
                    id: existing.id,
                    product_name: existing.product_name,
                    cost_price: existing.cost_price,
                    selling_price: existing.selling_price
                };
            }
        }

        if (!product) {
            errorToast("প্রোডাক্ট তথ্য পাওয়া যায়নি!");
            return;
        }

        const existingCartItem = mobilePurchaseCartItems.find(item => item.id == product.id);

        document.getElementById("mobilePurItemLineProductId").value = product.id;
        document.getElementById("mobilePurItemLineProductName").value = product.product_name || product.name || '';

        const qtyVal = existingCartItem ? existingCartItem.quantity : 1;
        const priceVal = existingCartItem ? existingCartItem.cost_price : (parseFloat(product.cost_price || product.price || 0));

        document.getElementById("mobilePurItemLineQty").value = engToBanglaNum(qtyVal);
        document.getElementById("mobilePurItemLinePrice").value = engToBanglaNum(priceVal);

        calculateMobilePurchaseItemLineTotal();
        showMobileModal("mobilePurchaseItemLineModal");

        const qtyEl = document.getElementById("mobilePurItemLineQty");
        if (qtyEl) {
            try { qtyEl.focus(); qtyEl.select(); } catch(_) {}
        }
        const lineModalEl = document.getElementById("mobilePurchaseItemLineModal");
        if (lineModalEl) {
            lineModalEl.addEventListener('shown.bs.modal', function() {
                if (qtyEl) { qtyEl.focus(); qtyEl.select(); }
            }, { once: true });
        }
        setTimeout(() => {
            if (qtyEl) {
                qtyEl.focus();
                qtyEl.select();
            }
        }, 150);
    }

    function calculateMobilePurchaseItemLineTotal() {
        const qtyRaw = document.getElementById("mobilePurItemLineQty").value || '1';
        const priceRaw = document.getElementById("mobilePurItemLinePrice").value || '0';

        const qty = parseBanglaFloat(qtyRaw) || 1;
        const price = parseBanglaFloat(priceRaw) || 0;
        const total = qty * price;

        const breakdown = `${engToBanglaNum(qty)} X ${formatBanglaAmount(price)} = ${formatBanglaAmount(total)}`;
        document.getElementById("mobilePurItemLineBreakdown").textContent = breakdown;
        document.getElementById("mobilePurItemLineTotalText").textContent = formatBanglaAmount(total);
    }

    function confirmAddMobilePurchaseItemLine() {
        const productId = document.getElementById("mobilePurItemLineProductId")?.value;
        const qty = parseBanglaFloat(document.getElementById("mobilePurItemLineQty")?.value) || 1;
        const costPrice = parseBanglaFloat(document.getElementById("mobilePurItemLinePrice")?.value) || 0;

        let product = (allProducts || []).find(p => p.id == productId);
        if (!product) {
            const existing = mobilePurchaseCartItems.find(item => item.id == productId);
            if (existing) product = existing;
        }

        if (product) {
            const existingIndex = mobilePurchaseCartItems.findIndex(ci => ci.id == product.id);
            const subtotal = qty * costPrice;

            if (existingIndex !== -1) {
                mobilePurchaseCartItems[existingIndex].quantity = qty;
                mobilePurchaseCartItems[existingIndex].cost_price = costPrice;
                mobilePurchaseCartItems[existingIndex].subtotal = subtotal;
            } else {
                mobilePurchaseCartItems.push({
                    id: product.id,
                    product_name: product.product_name,
                    product_code: product.product_code || '',
                    cost_price: costPrice,
                    selling_price: parseFloat(product.selling_price || product.price || costPrice),
                    quantity: qty,
                    subtotal: subtotal
                });
            }

            renderMobilePurchaseCart();
        }

        hideMobileModal("mobilePurchaseItemLineModal");
    }

    function removeMobilePurchaseCartItem(productId) {
        mobilePurchaseCartItems = mobilePurchaseCartItems.filter(item => item.id != productId);
        renderMobilePurchaseCart();
    }

    function renderMobilePurchaseCart() {
        const container = document.getElementById("mobilePurchaseCartItemsList");
        if (!container) return;

        if (mobilePurchaseCartItems.length === 0) {
            container.innerHTML = `
                <div class="purchase-cart-empty-box" id="mobilePurchaseCartEmptyMsg">
                    <i class="fa-solid fa-box-open fs-3 mb-2" style="color: #8C56D4;"></i>
                    <p class="mb-0 small fw-semibold">এখনও কোনো আইটেম যোগ করা হয়নি</p>
                </div>
            `;
        } else {
            let html = mobilePurchaseCartItems.map(item => `
                <div class="mobile-cart-item-row cursor-pointer" onclick="openMobilePurchaseItemLineForm(${item.id})">
                    <div class="flex-grow-1 pe-2">
                        <div class="item-title mb-1">${item.product_name}</div>
                        <div class="item-sub">
                            <span>মূল্য ${engToBanglaNum(item.quantity)} X ${formatBanglaAmount(item.cost_price)} = ${formatBanglaAmount(item.subtotal)}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <strong class="fw-bold" style="color: #8C56D4; font-size: 14px;">${formatBanglaAmount(item.subtotal)}</strong>
                        <button type="button" class="item-del-btn" onclick="event.stopPropagation(); removeMobilePurchaseCartItem(${item.id});" title="আইটেম মুছুন">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            `).join('');
            container.innerHTML = html;
        }

        syncMobilePurchaseCalcInputs();
    }

    function enforceBanglaNumberInput(inputEl, allowDecimal = true) {
        if (!inputEl) return;
        let val = inputEl.value || '';
        const enDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        const bnDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

        for (let i = 0; i < 10; i++) {
            val = val.split(enDigits[i]).join(bnDigits[i]);
        }

        if (allowDecimal) {
            val = val.replace(/[^০-৯.]/g, '');
            const parts = val.split('.');
            if (parts.length > 2) {
                val = parts[0] + '.' + parts.slice(1).join('');
            }
        } else {
            val = val.replace(/[^০-৯]/g, '');
        }

        inputEl.value = val;
    }

    function syncMobilePurchaseCalcInputs() {
        let grossTotal = mobilePurchaseCartItems.reduce((acc, item) => acc + (parseFloat(item.subtotal) || 0), 0);
        
        const grossEl = document.getElementById("mobilePurchaseGrossTotal");
        const netEl = document.getElementById("mobilePurchaseNetTotal");
        if (grossEl) grossEl.value = engToBanglaNum(grossTotal.toFixed(2));
        if (netEl) netEl.value = engToBanglaNum(grossTotal.toFixed(2));

        let paid = parseBanglaFloat(document.getElementById("mobilePurchasePaidInput")?.value) || 0;
        let due = Math.max(0, grossTotal - paid);

        const dueEl = document.getElementById("mobilePurchaseDueInput");
        if (dueEl) dueEl.value = engToBanglaNum(due.toFixed(2));
    }

    function getPaymentMethodInfo(key) {
        if (key === 'Cash') return { name: 'Cash', icon: 'fa-solid fa-money-bill-wave', color: '#16a34a', bg: '#f0fdf4' };
        let found = mobileBankingMethods.find(m => m.key === key);
        if (found) return found;
        found = bankMethods.find(b => b.key === key);
        if (found) return found;
        return { name: key, icon: 'fa-solid fa-credit-card', color: '#8C56D4', bg: '#F3ECFB' };
    }

    function renderMobilePaymentRows() {
        const container = document.getElementById("mobilePaymentRowsContainer");
        if (!container) return;

        const cashMethod = { name: 'Cash', icon: 'fa-solid fa-money-bill-wave', color: '#16a34a', bg: '#f0fdf4' };

        let html = mobilePaymentRows.map((row, index) => {
            const info = getPaymentMethodInfo(row.type);
            const isCash = row.type === 'Cash';
            const showAddBtn = index === mobilePaymentRows.length - 1;
            const canDelete = mobilePaymentRows.length > 1;

            return `
            <div class="purchase-mobile-payment-card-box" id="payRow_${row.id}">
                <div class="payment-top-select-row">
                    <div class="dropdown flex-grow-1">
                        <button type="button" class="payment-method-custom-btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownBtn_${row.id}">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge p-1 rounded-2 d-inline-flex align-items-center justify-content-center" style="background: ${info.bg}; color: ${info.color}; font-size: 14px; width: 28px; height: 28px;">
                                    <i class="${info.icon}"></i>
                                </span>
                                <span class="fw-bold text-dark" style="font-size: 14px;">${info.name}</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-muted small"></i>
                        </button>

                        <ul class="dropdown-menu shadow-lg border-0 w-100 p-2" style="border-radius: 12px; z-index: 1060; max-height: 380px; overflow-y: auto;">
                            <!-- Cash Section -->
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-2 ${row.type === 'Cash' ? 'active bg-light' : ''}" href="#" onclick="selectMobilePaymentType(${row.id}, 'Cash', event)">
                                    <span class="badge p-1 rounded-2 d-inline-flex align-items-center justify-content-center" style="background: ${cashMethod.bg}; color: ${cashMethod.color}; font-size: 14px; width: 26px; height: 26px;">
                                        <i class="${cashMethod.icon}"></i>
                                    </span>
                                    <span class="fw-bold text-dark">${cashMethod.name}</span>
                                </a>
                            </li>

                            <li><hr class="dropdown-divider my-1" style="border-color: #E5D5F7;"></li>

                            <!-- Mobile Banking Section -->
                            <li class="dropdown-category-header">
                                <span class="dropdown-category-title">
                                    <i class="fa-solid fa-mobile-screen"></i>মোবাইল ব্যাংকিং
                                </span>
                                <button type="button" class="btn-add-payment-opt" onclick="promptAddMobileBanking(event)" title="নতুন মোবাইল ব্যাংকিং যোগ করুন">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </li>
                            ${mobileBankingMethods.map(opt => `
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-2 ${row.type === opt.key ? 'active bg-light' : ''}" href="#" onclick="selectMobilePaymentType(${row.id}, '${opt.key}', event)">
                                    <span class="badge p-1 rounded-2 d-inline-flex align-items-center justify-content-center" style="background: ${opt.bg}; color: ${opt.color}; font-size: 14px; width: 26px; height: 26px;">
                                        <i class="${opt.icon}"></i>
                                    </span>
                                    <span class="fw-bold text-dark">${opt.name}</span>
                                </a>
                            </li>
                            `).join('')}

                            <li><hr class="dropdown-divider my-1" style="border-color: #E5D5F7;"></li>

                            <!-- Bank & Card Section -->
                            <li class="dropdown-category-header">
                                <span class="dropdown-category-title">
                                    <i class="fa-solid fa-building-columns"></i>ব্যাংকসমূহ
                                </span>
                                <button type="button" class="btn-add-payment-opt" onclick="promptAddBank(event)" title="নতুন ব্যাংক যোগ করুন">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </li>
                            ${bankMethods.map(opt => `
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-2 ${row.type === opt.key ? 'active bg-light' : ''}" href="#" onclick="selectMobilePaymentType(${row.id}, '${opt.key}', event)">
                                    <span class="badge p-1 rounded-2 d-inline-flex align-items-center justify-content-center" style="background: ${opt.bg}; color: ${opt.color}; font-size: 14px; width: 26px; height: 26px;">
                                        <i class="${opt.icon}"></i>
                                    </span>
                                    <span class="fw-bold text-dark">${opt.name}</span>
                                </a>
                            </li>
                            `).join('')}
                        </ul>
                    </div>

                    ${canDelete ? `
                        <button type="button" class="btn btn-link text-danger p-0 ms-1 border-0" onclick="deleteMobilePaymentRow(${row.id})" title="রিমুভ">
                            <i class="fa-regular fa-trash-can fs-5"></i>
                        </button>
                    ` : ''}
                </div>

                <div class="payment-bottom-amount-row">
                    <div class="payment-amount-input-box">
                        <span class="currency-tag">৳</span>
                        <input type="text" inputmode="decimal" pattern="[0-9]*" placeholder="০.০০" value="${row.amount}" oninput="enforceBanglaNumberInput(this); updateMobilePaymentAmount(${row.id}, this.value)" />
                    </div>
                    ${showAddBtn ? `
                        <button type="button" class="btn text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 shadow-xs" onclick="addMobilePaymentRow()" style="width: 42px; height: 42px; background: #8C56D4;" title="পেমেন্টের নতুন লাইন যোগ করুন">
                            <i class="fa-solid fa-plus fs-6"></i>
                        </button>
                    ` : ''}
                </div>

                ${!isCash ? `
                <div class="payment-extra-fields-wrap">
                    <div class="payment-extra-input-row">
                        <div class="input-group">
                            <span class="input-group-text extra-icon-addon">
                                <i class="fa-solid fa-receipt"></i>
                            </span>
                            <input type="text" class="form-control payment-extra-input" placeholder="লেনদেন আইডি লিখুন" value="${row.trxId || ''}" oninput="updateMobilePaymentTrxId(${row.id}, this.value)" />
                        </div>
                    </div>
                    <div class="payment-extra-input-row">
                        <div class="input-group">
                            <span class="input-group-text extra-icon-addon">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            <input type="tel" inputmode="tel" pattern="[0-9]*" class="form-control payment-extra-input" placeholder="লেনদেনের ফোন নম্বর" value="${row.phone || ''}" oninput="enforceBanglaNumberInput(this, false); updateMobilePaymentPhone(${row.id}, this.value)" />
                        </div>
                    </div>
                </div>
                ` : ''}
            </div>
            `;
        }).join('');

        container.innerHTML = html;
    }

    function selectMobilePaymentType(rowId, type, e) {
        if (e) e.preventDefault();
        const row = mobilePaymentRows.find(r => r.id === rowId);
        if (row) {
            row.type = type;
            renderMobilePaymentRows();
        }
    }

    function addMobilePaymentRow() {
        const nextId = Date.now();
        mobilePaymentRows.push({ id: nextId, type: 'Cash', amount: '', trxId: '', phone: '' });
        renderMobilePaymentRows();
    }

    function deleteMobilePaymentRow(rowId) {
        mobilePaymentRows = mobilePaymentRows.filter(r => r.id !== rowId);
        renderMobilePaymentRows();
        calculateMobilePaymentTotalPaid();
    }

    function updateMobilePaymentAmount(rowId, val) {
        const row = mobilePaymentRows.find(r => r.id === rowId);
        if (row) {
            row.amount = val;
            calculateMobilePaymentTotalPaid();
        }
    }

    function updateMobilePaymentTrxId(rowId, val) {
        const row = mobilePaymentRows.find(r => r.id === rowId);
        if (row) row.trxId = val;
    }

    function updateMobilePaymentPhone(rowId, val) {
        const row = mobilePaymentRows.find(r => r.id === rowId);
        if (row) row.phone = val;
    }

    function calculateMobilePaymentTotalPaid() {
        let totalPaid = mobilePaymentRows.reduce((acc, r) => acc + (parseFloat(parseBanglaFloat(r.amount)) || 0), 0);
        const paidInput = document.getElementById("mobilePurchasePaidInput");
        if (paidInput) {
            paidInput.value = totalPaid > 0 ? engToBanglaNum(totalPaid.toFixed(2)) : '';
            syncMobilePurchaseCalcInputs();
        }
    }

    function promptAddMobileBanking(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        
        const input = document.getElementById('mobileBankingModalName');
        if (input) input.value = '';
        const modalEl = document.getElementById('modalAddMobileBanking');
        if (modalEl) {
            const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
            bsModal.show();
            setTimeout(() => { if (input) input.focus(); }, 150);
        }
    }

    function submitAddMobileBankingModal() {
        const input = document.getElementById('mobileBankingModalName');
        const val = input ? input.value.trim() : '';
        if (!val) {
            errorToast("অনুগ্রহ করে মোবাইল ব্যাংকিং এর নাম লিখুন");
            input?.focus();
            return;
        }

        const key = val.replace(/\s+/g, '');
        const exists = mobileBankingMethods.some(m => m.key.toLowerCase() === key.toLowerCase() || m.name.toLowerCase() === val.toLowerCase());
        if (!exists) {
            mobileBankingMethods.push({
                key: key,
                name: val,
                icon: 'fa-solid fa-mobile-screen',
                color: '#8C56D4',
                bg: '#F3ECFB'
            });
        }

        const modalEl = document.getElementById('modalAddMobileBanking');
        if (modalEl) {
            const bsModal = bootstrap.Modal.getInstance(modalEl);
            if (bsModal) bsModal.hide();
        }

        successToast(`"${val}" মোবাইল ব্যাংকিং সফলভাবে যোগ করা হয়েছে`);
        renderMobilePaymentRows();
    }

    function promptAddBank(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        
        const nameInput = document.getElementById('bankModalName');
        const accInput = document.getElementById('bankModalAccName') || document.getElementById('bankModalAccount');
        const noInput = document.getElementById('bankModalAccNo');
        const balInput = document.getElementById('bankModalBalance');
        if (nameInput) nameInput.value = '';
        if (accInput) accInput.value = '';
        if (noInput) noInput.value = '';
        if (balInput) balInput.value = '০';

        const modalEl = document.getElementById('modalAddBank');
        if (modalEl) {
            const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
            bsModal.show();
            setTimeout(() => { if (nameInput) nameInput.focus(); }, 150);
        }
    }

    function submitAddBankModal() {
        const nameInput = document.getElementById('bankModalName');
        const val = nameInput ? nameInput.value.trim() : '';
        if (!val) {
            errorToast("অনুগ্রহ করে ব্যাংকের নাম লিখুন");
            nameInput?.focus();
            return;
        }

        const key = val.replace(/\s+/g, '');
        const exists = bankMethods.some(m => m.key.toLowerCase() === key.toLowerCase() || m.name.toLowerCase() === val.toLowerCase());
        if (!exists) {
            bankMethods.push({
                key: key,
                name: val,
                icon: 'fa-solid fa-building-columns',
                color: '#2563eb',
                bg: '#eff6ff'
            });
        }

        const modalEl = document.getElementById('modalAddBank');
        if (modalEl) {
            const bsModal = bootstrap.Modal.getInstance(modalEl);
            if (bsModal) bsModal.hide();
        }

        successToast(`"${val}" ব্যাংক সফলভাবে যোগ করা হয়েছে`);
        renderMobilePaymentRows();
    }

    function triggerMobilePurchaseDocUpload() {
        const input = document.getElementById("mobilePurchaseDocImage");
        if (input) input.click();
    }

    function previewMobilePurchaseDocImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById("mobilePurImagePreview");
                const placeholder = document.getElementById("mobilePurImagePlaceholder");
                if (preview && placeholder) {
                    preview.src = e.target.result;
                    preview.classList.remove("d-none");
                    placeholder.classList.add("d-none");
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function confirmSaveMobilePurchase() {
        if (mobilePurchaseCartItems.length === 0) {
            errorToast("অন্তত একটি প্রডাক্ট যোগ করুন!");
            return;
        }

        if (!selectedMobileSupplier) {
            errorToast("অনুগ্রহ করে একজন সাপ্লায়ার সিলেক্ট করুন!");
            return;
        }

        const supplierId = selectedMobileSupplier.id;
        if (!supplierId) {
            errorToast("অনুগ্রহ করে সাপ্লায়ার নির্বাচন করুন!");
            return;
        }

        const grossTotal = mobilePurchaseCartItems.reduce((acc, item) => acc + (parseFloat(item.subtotal) || 0), 0);
        const paidAmount = parseBanglaFloat(document.getElementById("mobilePurchasePaidInput")?.value) || 0;
        const dueAmount = Math.max(0, grossTotal - paidAmount);
        
        // Parse date from DD-MM-YYYY to YYYY-MM-DD
        let rawDate = document.getElementById("mobilePurchaseDate")?.value || '';
        let date = new Date().toISOString().split('T')[0];
        if (rawDate) {
            const parts = rawDate.split('-');
            if (parts.length === 3 && parts[0].length === 2) {
                date = `${parts[2]}-${parts[1]}-${parts[0]}`;
            } else {
                date = rawDate;
            }
        }

        const refNo = document.getElementById("mobilePurchaseRefNo")?.value || document.getElementById("mobilePurchaseInvoiceNoInput")?.value || document.getElementById("ReferenceNo")?.value || '';
        const primaryPayment = mobilePaymentRows.length > 0 ? mobilePaymentRows[0] : { type: 'Cash', trxId: '' };
        const paymentMethod = primaryPayment.type || 'Cash';
        const transactionId = primaryPayment.trxId || '';

        let productsPayload = mobilePurchaseCartItems.map(item => ({
            product_id: item.id,
            product_name: item.product_name,
            cost_price: item.cost_price,
            selling_price: item.selling_price,
            quantity: item.quantity,
            subtotal: item.subtotal
        }));

        let formData = new FormData();
        formData.append('supplier_id', supplierId);
        formData.append('purchase_payable_amount', selectedMobileSupplier ? (selectedMobileSupplier.purchase_payable_amount || 0) : 0);
        formData.append('date', date);
        formData.append('purchase_due_collection_date', date);
        formData.append('referance_no', refNo);
        formData.append('payment_status', paidAmount >= grossTotal ? 'Fully Paid' : (paidAmount > 0 ? 'Partial Paid' : 'Unpaid'));
        formData.append('grand_subtotal', grossTotal);
        formData.append('return_adjustment_amount', 0);
        formData.append('payment_method', paymentMethod);
        formData.append('paid_amount', paidAmount);
        formData.append('due_amount', dueAmount);
        formData.append('transaction_id', transactionId);
        formData.append('products', JSON.stringify(productsPayload));

        const imgInput = document.getElementById("mobilePurchaseDocImage");
        if (imgInput && imgInput.files[0]) {
            formData.append('img', imgInput.files[0]);
        }

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        try {
            let res = await axios.post("/api/create-purchases", formData, config);

            if (res.data['status'] === "success") {
                successToast(res.data['message'] || "🎉 পারচেজ সফলভাবে সেভ হয়েছে!");
                mobilePurchaseCartItems = [];
                renderMobilePurchaseCart();
                setTimeout(() => {
                    location.reload();
                }, 600);
            } else {
                errorToast(res.data['message'] || "পারচেজ সেভ করা সম্ভব হয়নি!");
            }
        } catch (e) {
            console.error("Mobile Purchase Save Error:", e);
            errorToast("পারচেজ সেভ করতে সমস্যা হয়েছে!");
        }
    }

    // Attach all interactive functions explicitly to window for inline onclick execution
    window.openMobileSupplierSearchModal = openMobileSupplierSearchModal;
    window.openMobilePurchaseProductSearchModal = openMobilePurchaseProductSearchModal;
    window.openPurchaseDatePicker = openPurchaseDatePicker;
    window.openMobilePurchaseItemLineForm = openMobilePurchaseItemLineForm;
    window.confirmAddMobilePurchaseItemLine = confirmAddMobilePurchaseItemLine;
    window.confirmSaveMobilePurchase = confirmSaveMobilePurchase;
    window.removeMobilePurchaseCartItem = removeMobilePurchaseCartItem;
    window.selectMobileSupplierItem = selectMobileSupplierItem;
    window.removeSelectedMobileSupplier = removeSelectedMobileSupplier;
    window.filterMobileSuppliers = filterMobileSuppliers;
    window.filterMobilePurchaseProducts = filterMobilePurchaseProducts;
    window.editSupplierFromMobile = editSupplierFromMobile;
    window.deleteSupplierFromMobile = deleteSupplierFromMobile;
    window.editProductFromMobile = editProductFromMobile;
    window.deleteProductFromMobile = deleteProductFromMobile;
    window.showMobileModal = showMobileModal;
    window.hideMobileModal = hideMobileModal;
    window.generateNewDynamicBillNo = generateNewDynamicBillNo;
    window.autoGenerateSupplierInvoiceNo = autoGenerateSupplierInvoiceNo;
    window.syncMobileRefNoToDesktop = syncMobileRefNoToDesktop;
    window.syncMobileBillNoToDesktop = syncMobileBillNoToDesktop;
    window.openMobilePurchaseListModal = openMobilePurchaseListModal;
    window.filterMobilePurchaseListModal = filterMobilePurchaseListModal;
    window.calculateMobilePurchaseItemLineTotal = calculateMobilePurchaseItemLineTotal;
    window.enforceBanglaNumberInput = enforceBanglaNumberInput;
    window.syncMobilePurchaseCalcInputs = syncMobilePurchaseCalcInputs;
    window.selectMobilePaymentType = selectMobilePaymentType;
    window.addMobilePaymentRow = addMobilePaymentRow;
    window.deleteMobilePaymentRow = deleteMobilePaymentRow;
    window.updateMobilePaymentAmount = updateMobilePaymentAmount;
    window.updateMobilePaymentTrxId = updateMobilePaymentTrxId;
    window.updateMobilePaymentPhone = updateMobilePaymentPhone;
    window.promptAddMobileBanking = promptAddMobileBanking;
    window.submitAddMobileBankingModal = submitAddMobileBankingModal;
    window.promptAddBank = promptAddBank;
    window.submitAddBankModal = submitAddBankModal;
    window.triggerMobilePurchaseDocUpload = triggerMobilePurchaseDocUpload;
    window.previewMobilePurchaseDocImage = previewMobilePurchaseDocImage;
    window.openMobilePurchaseCameraScanner = openMobilePurchaseCameraScanner;
    window.stopMobilePurchaseCameraScanner = stopMobilePurchaseCameraScanner;
    window.switchMobilePurCameraFacingMode = switchMobilePurCameraFacingMode;

    document.addEventListener('DOMContentLoaded', function () {
        if (window.innerWidth < 992) {
            setTimeout(initMobilePurchaseUI, 300);
        }

        const urlParams = new URLSearchParams(window.location.search);
        if (window.innerWidth >= 992 && (urlParams.get('openModal') === 'true' || window.location.hash === '#openModal')) {
            setTimeout(function () {
                const modalEl = document.getElementById('exampleModal');
                if (modalEl) {
                    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                        let modal = bootstrap.Modal.getInstance(modalEl);
                        if (!modal) {
                            modal = new bootstrap.Modal(modalEl);
                        }
                        modal.show();
                    } else if (typeof $ !== 'undefined') {
                        $('#exampleModal').modal('show');
                    }
                }
            }, 300);
        }
    });
</script>
