@extends('layouts.dashboard-sidenav')
@section('title', 'বিক্রয় রিপোর্ট তালিকা - মেসার্স আনিস ষ্টোর')
@section('content')

<!-- Flatpickr CSS & JS per rules.md -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- html2pdf.js for Bengali Unicode PDF Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #printableArea, #printableArea * {
            visibility: visible;
        }
        #printableArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .no-print {
            display: none !important;
        }
    }

    /* 1. Header & Title */
    .invoice-card-header {
        border-color: #f1f5f9;
        overflow: visible !important;
    }
    .invoice-title-icon-box {
        width: 42px;
        height: 42px;
        background: #F3ECFB;
        color: #8C56D4;
        border: 1px solid #E5D5F7;
        flex-shrink: 0;
    }
    .invoice-main-heading {
        color: #1e293b;
        font-size: 20px;
        letter-spacing: -0.2px;
        font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;
        border-left: 4px solid #8C56D4 !important;
        padding-left: 10px !important;
        line-height: 1.2 !important;
        display: inline-flex;
        align-items: center;
    }

    /* 2. Standardized Form Inputs & Datepicker */
    .custom-flatpickr-input,
    .invoice-search-input {
        height: 42px !important;
        min-height: 42px !important;
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 10px !important;
        padding: 8px 14px !important;
        font-size: 14px !important;
        color: #1e293b !important;
        background: #ffffff !important;
        transition: all 0.2s ease-in-out !important;
        font-family: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
        box-shadow: none !important;
    }

    .custom-date-input-wrap .custom-flatpickr-input {
        padding-right: 38px !important;
        cursor: pointer !important;
    }

    .custom-flatpickr-input:focus,
    .invoice-search-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.2) !important;
        outline: none !important;
    }

    .calendar-addon-btn {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #8C56D4;
        cursor: pointer;
        font-size: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: auto;
        transition: transform 0.2s ease;
    }
    .calendar-addon-btn:hover {
        transform: translateY(-50%) scale(1.15);
    }

    .invoice-search-addon-icon {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 15px;
        pointer-events: none;
    }

    .invoice-search-submit-btn {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border: none !important;
        height: 42px !important;
        border-radius: 10px !important;
        font-size: 15px !important;
        font-weight: 700 !important;
        letter-spacing: 0.3px;
        transition: all 0.2s ease-in-out !important;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.25) !important;
        cursor: pointer !important;
    }
    .invoice-search-submit-btn:hover {
        background: linear-gradient(135deg, #793FC5 0%, #672EB0 100%) !important;
        box-shadow: 0 4px 14px rgba(140, 86, 212, 0.4) !important;
        transform: translateY(-1px);
        color: #ffffff !important;
    }

    /* Mobile Header Icon Buttons */
    .mobile-header-icon-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #ffffff;
        border: 1.5px solid #cbd5e1;
        color: #8C56D4;
        font-size: 14.5px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease-in-out;
        outline: none !important;
        box-shadow: 0 1px 3px rgba(140, 86, 212, 0.08);
    }
    .mobile-header-icon-btn:hover,
    .mobile-header-icon-btn:active {
        background: #F3ECFB;
        border-color: #8C56D4;
        color: #793FC5;
        transform: translateY(-1px);
    }

    .mobile-search-close-btn {
        width: 38px;
        height: 38px;
        border-radius: 6px;
        background: #ef4444;
        color: #ffffff;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.2s ease;
    }
    .mobile-search-close-btn:hover {
        background: #dc2626;
    }

    .toolbar-control-btn {
        height: 42px !important;
        min-height: 42px !important;
        background: #ffffff !important;
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 10px !important;
        color: #1e293b !important;
        font-size: 13.5px !important;
        font-weight: 600 !important;
        cursor: pointer !important;
        transition: all 0.2s ease-in-out !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04) !important;
        outline: none !important;
    }
    .toolbar-control-btn:hover {
        border-color: #8C56D4 !important;
        background: #FAF7FD !important;
        color: #8C56D4 !important;
        transform: translateY(-1px);
    }
    .dropdown-arrow-icon {
        font-size: 11px;
        color: #94a3b8;
        transition: transform 0.2s ease;
    }
    .custom-dropdown-wrap.open .dropdown-arrow-icon {
        transform: rotate(180deg);
        color: #8C56D4;
    }

    /* Container Overflow fix for Dropdown clipping */
    .data-table,
    .data-table .card,
    .data-table .card-body,
    .page-content {
        overflow: visible !important;
    }
    .custom-dropdown-wrap {
        position: relative !important;
    }

    /* Custom Dropdown Menu */
    .custom-dropdown-menu {
        position: absolute;
        top: calc(100% + 6px);
        right: 0 !important;
        left: auto !important;
        background: #ffffff;
        border: 1.5px solid #E5D5F7;
        border-radius: 12px;
        padding: 6px;
        box-shadow: 0 10px 25px -5px rgba(140, 86, 212, 0.25);
        z-index: 10500 !important;
        display: none;
        min-width: 175px;
    }
    .custom-dropdown-wrap.open .custom-dropdown-menu {
        display: block;
    }
    .custom-dropdown-item {
        padding: 8px 14px;
        font-size: 13.5px;
        color: #334155;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.15s ease;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }
    .custom-dropdown-item:hover {
        background: #F3ECFB;
        color: #8C56D4;
    }
    .custom-dropdown-item.active {
        background: #8C56D4;
        color: #ffffff !important;
    }
    .custom-dropdown-divider {
        height: 1px;
        background-color: #E2E8F0;
        margin: 4px 0;
    }

    /* Search Live Dropdown */
    .search-live-dropdown {
        top: 100%;
        left: 0;
        right: 0;
        background: #ffffff;
        border: 1.5px solid #E5D5F7;
        border-radius: 10px;
        max-height: 280px;
        overflow-y: auto;
        z-index: 10600 !important;
        margin-top: 4px;
    }
    .search-live-item {
        padding: 9px 12px;
        border-bottom: 1px solid #f1f5f9;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: background 0.15s ease;
    }
    .search-live-item:hover {
        background: #FAF7FD;
    }
    .search-live-item:last-child {
        border-bottom: none;
    }

    /* Summary Strip */
    .invoice-top-summary-strip {
        border-radius: 6px !important;
        border: 1px solid #f1f5f9 !important;
        box-shadow: 0 4px 18px rgba(140, 86, 212, 0.08), 0 1px 3px rgba(0, 0, 0, 0.04) !important;
    }

    /* Mobile & Tablet Card Grid: Tab = 2 cards (col-md-6), Mobile = 1 card (col-12) */
    #mobileCardList {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 8px !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
        align-items: flex-start !important;
    }
    .card-content-wrap {
        min-width: 0 !important;
        flex: 1 1 0% !important;
        overflow: hidden !important;
    }
    .card-title-row {
        min-width: 0 !important;
        width: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 6px !important;
    }
    .card-title-text {
        min-width: 0 !important;
        flex: 1 1 auto !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        display: block !important;
    }
    .card-badge-pill {
        flex-shrink: 0 !important;
        max-width: 110px !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
    }

    #mobileCardList {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 8px !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
        align-items: flex-start !important;
        padding: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        overflow: hidden !important;
    }
    #mobileCardList > .col-12 {
        width: 100% !important;
        max-width: 100% !important;
        flex: 0 0 100% !important;
        padding: 0 !important;
        margin: 0 !important;
        min-width: 0 !important;
        box-sizing: border-box !important;
    }
    @media (min-width: 768px) and (max-width: 991.98px) {
        #mobileCardList > .col-md-6 {
            width: calc(50% - 4px) !important;
            max-width: calc(50% - 4px) !important;
            flex: 0 0 calc(50% - 4px) !important;
            padding: 0 !important;
            margin: 0 !important;
            min-width: 0 !important;
            box-sizing: border-box !important;
        }
    }

    /* Mobile Cards (< 992px) with 10px padding & no cramped text */
    .invoice-mobile-card {
        border: 1px solid #E2E8F0 !important;
        border-radius: 6px !important;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04) !important;
        background: #ffffff;
        padding: 10px !important;
        transition: all 0.2s ease;
        min-width: 0 !important;
        width: 100% !important;
        box-sizing: border-box !important;
        overflow: hidden !important;
    }
    .invoice-mobile-card:hover {
        border-color: #8C56D4 !important;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.12) !important;
    }

    /* Card Date Divider: 12px gap, vertical bar */
    .card-date-divider {
        border-right: 1px solid #e2e8f0;
        padding-right: 12px !important;
        margin-right: 12px !important;
        min-width: 56px;
        flex-shrink: 0;
    }
    body[light-mode="dark"] .card-date-divider,
    html[light-mode="dark"] .card-date-divider,
    body.dark-mode .card-date-divider,
    body[data-layout-mode="dark"] .card-date-divider,
    [data-bs-theme="dark"] .card-date-divider {
        border-color: #334155 !important;
    }

    /* 1-Row Box Type Action Buttons: Full Width, 2 Equal Columns */
    .mobile-card-actions {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding-top: 8px !important;
        margin-top: 8px !important;
        border-top: 1px solid #f1f5f9 !important;
        width: 100% !important;
    }
    .mobile-action-btn {
        flex: 1 1 0 !important;
        width: 100% !important;
        height: 32px !important;
        border-radius: 6px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 6px !important;
        font-size: 12.5px !important;
        font-weight: 600 !important;
        transition: all 0.2s ease-in-out !important;
        cursor: pointer !important;
        border: 1px solid transparent !important;
        text-decoration: none !important;
    }
    .mobile-action-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }
    .mobile-action-btn.action-btn-print {
        background: #F3ECFB !important;
        color: #8C56D4 !important;
        border-color: #E5D5F7 !important;
    }
    .mobile-action-btn.action-btn-print:hover {
        background: #8C56D4 !important;
        color: #ffffff !important;
    }
    .mobile-action-btn.action-btn-view {
        background: #E0F2FE !important;
        color: #0284C7 !important;
        border-color: #BAE6FD !important;
    }
    .mobile-action-btn.action-btn-view:hover {
        background: #0284C7 !important;
        color: #ffffff !important;
    }

    /* Modal Top Amount Box */
    .modal-top-amount-box {
        background: #FAF7FD;
        border: 1.5px solid #E5D5F7;
        border-radius: 12px;
        transition: all 0.2s ease;
    }
    body[light-mode="dark"] .modal-top-amount-box,
    html[light-mode="dark"] .modal-top-amount-box,
    body.dark-mode .modal-top-amount-box,
    body[data-layout-mode="dark"] .modal-top-amount-box,
    [data-bs-theme="dark"] .modal-top-amount-box {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] .modal-top-amount-box h3,
    body.dark-mode .modal-top-amount-box h3 {
        color: #D2B7F1 !important;
    }

    /* Modal Layout: 10px Gap Around Screen, All 4 Corners Rounded (16px), Sticky Header & Footer */
    #customDateRangeModal .modal-dialog,
    #salesDetailsModal .modal-dialog {
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }
    @media (max-width: 991.98px) {
        #customDateRangeModal,
        #salesDetailsModal {
            padding: 10px !important;
            z-index: 105050 !important;
        }
        #customDateRangeModal .modal-dialog,
        #salesDetailsModal .modal-dialog {
            position: fixed !important;
            bottom: 10px !important;
            left: 10px !important;
            right: 10px !important;
            margin: 0 auto !important;
            width: calc(100% - 20px) !important;
            max-width: calc(100% - 20px) !important;
            transform: translateY(0) !important;
        }
        #customDateRangeModal .modal-content,
        #salesDetailsModal .modal-content {
            border-radius: 16px !important;
            max-height: calc(90dvh - 20px) !important;
            display: flex !important;
            flex-direction: column !important;
            overflow: hidden !important;
            width: 100% !important;
        }
        #salesDetailsBody {
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch;
            max-height: calc(90dvh - 140px) !important;
        }
    }

    .modal-header-purple {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 14px 18px !important;
        color: #ffffff !important;
        position: sticky !important;
        top: 0 !important;
        z-index: 10 !important;
    }
    .btn-close-red {
        background: #ef4444 !important;
        background-image: none !important;
        color: #ffffff !important;
        border-radius: 50% !important;
        width: 30px !important;
        height: 30px !important;
        border: none !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 13px !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        flex-shrink: 0 !important;
        opacity: 1 !important;
    }
    .btn-close-red:hover {
        background: #dc2626 !important;
        background-image: none !important;
        transform: rotate(90deg) scale(1.05);
    }
    .modal-sticky-footer {
        position: sticky !important;
        bottom: 0 !important;
        z-index: 10 !important;
        background: #ffffff !important;
        border-top: 1px solid #e2e8f0 !important;
        padding: 12px 16px !important;
    }

    /* Flatpickr Customization */
    .flatpickr-calendar {
        font-family: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 30px rgba(140, 86, 212, 0.2) !important;
        border: 1px solid #E5D5F7 !important;
        z-index: 106000 !important;
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange {
        background: #8C56D4 !important;
        border-color: #8C56D4 !important;
    }

    /* Dark Mode Overrides - matching Product List */
    body[light-mode="dark"] .data-table > .card,
    html[light-mode="dark"] .data-table > .card,
    body[data-layout-mode="dark"] .data-table > .card,
    body.dark-mode .data-table > .card,
    [data-bs-theme="dark"] .data-table > .card {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    body[light-mode="dark"] .invoice-card-header,
    html[light-mode="dark"] .invoice-card-header,
    body.dark-mode .invoice-card-header {
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .invoice-title-icon-box,
    html[light-mode="dark"] .invoice-title-icon-box,
    body.dark-mode .invoice-title-icon-box {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #D2B7F1 !important;
    }

    body[light-mode="dark"] .invoice-main-heading,
    html[light-mode="dark"] .invoice-main-heading,
    body.dark-mode .invoice-main-heading {
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .custom-flatpickr-input,
    html[light-mode="dark"] .custom-flatpickr-input,
    body[light-mode="dark"] .invoice-search-input,
    html[light-mode="dark"] .invoice-search-input,
    body[light-mode="dark"] .toolbar-control-btn,
    html[light-mode="dark"] .toolbar-control-btn,
    body[light-mode="dark"] .mobile-header-icon-btn,
    html[light-mode="dark"] .mobile-header-icon-btn,
    body.dark-mode .mobile-header-icon-btn,
    body.dark-mode .toolbar-control-btn {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .mobile-header-icon-btn:hover,
    body.dark-mode .mobile-header-icon-btn:hover {
        background: #334155 !important;
        border-color: #8C56D4 !important;
    }

    body[light-mode="dark"] .custom-dropdown-menu,
    html[light-mode="dark"] .custom-dropdown-menu,
    body[light-mode="dark"] .search-live-dropdown,
    html[light-mode="dark"] .search-live-dropdown,
    body.dark-mode .custom-dropdown-menu,
    body.dark-mode .search-live-dropdown {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.5) !important;
    }

    body[light-mode="dark"] .custom-dropdown-item,
    html[light-mode="dark"] .custom-dropdown-item,
    body.dark-mode .custom-dropdown-item {
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .custom-dropdown-item:hover,
    html[light-mode="dark"] .custom-dropdown-item:hover,
    body.dark-mode .custom-dropdown-item:hover {
        background: #334155 !important;
        color: #D2B7F1 !important;
    }
    body[light-mode="dark"] .custom-dropdown-divider,
    body.dark-mode .custom-dropdown-divider {
        background-color: #334155 !important;
    }

    body[light-mode="dark"] .search-live-item,
    html[light-mode="dark"] .search-live-item,
    body.dark-mode .search-live-item {
        border-bottom-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .search-live-item:hover,
    html[light-mode="dark"] .search-live-item:hover,
    body.dark-mode .search-live-item:hover {
        background: #334155 !important;
    }

    /* Dark Mode Banner Cards & Top Summary Strip - NO WHITE BG */
    body[light-mode="dark"] .invoice-top-summary-strip,
    html[light-mode="dark"] .invoice-top-summary-strip,
    body[data-layout-mode="dark"] .invoice-top-summary-strip,
    body.dark-mode .invoice-top-summary-strip,
    [data-bs-theme="dark"] .invoice-top-summary-strip {
        background: #1e293b !important;
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
        box-shadow: none !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] .summary-divider-bar,
    body.dark-mode .summary-divider-bar {
        background-color: #334155 !important;
    }

    /* Dark Mode Mobile Cards */
    body[light-mode="dark"] .invoice-mobile-card,
    html[light-mode="dark"] .invoice-mobile-card,
    body[data-layout-mode="dark"] .invoice-mobile-card,
    body.dark-mode .invoice-mobile-card,
    [data-bs-theme="dark"] .invoice-mobile-card {
        background: #1e293b !important;
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
        box-shadow: none !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .text-dark,
    body.dark-mode .invoice-mobile-card .text-dark {
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .text-muted,
    body.dark-mode .invoice-mobile-card .text-muted,
    body[light-mode="dark"] .invoice-mobile-card .text-secondary,
    body.dark-mode .invoice-mobile-card .text-secondary {
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] .invoice-mobile-card .border-end,
    body.dark-mode .invoice-mobile-card .border-end,
    body[light-mode="dark"] .invoice-mobile-card .border-top,
    body.dark-mode .invoice-mobile-card .border-top {
        border-color: #334155 !important;
    }

    /* Dark Mode Action Buttons */
    body[light-mode="dark"] .mobile-card-actions,
    body.dark-mode .mobile-card-actions {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .mobile-action-btn.action-btn-print,
    body.dark-mode .mobile-action-btn.action-btn-print {
        background: #2e1065 !important;
        color: #D2B7F1 !important;
        border-color: #581c87 !important;
    }
    body[light-mode="dark"] .mobile-action-btn.action-btn-print:hover,
    body.dark-mode .mobile-action-btn.action-btn-print:hover {
        background: #8C56D4 !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .mobile-action-btn.action-btn-view,
    body.dark-mode .mobile-action-btn.action-btn-view {
        background: #082f49 !important;
        color: #7dd3fc !important;
        border-color: #0369a1 !important;
    }
    body[light-mode="dark"] .mobile-action-btn.action-btn-view:hover,
    body.dark-mode .mobile-action-btn.action-btn-view:hover {
        background: #0284c7 !important;
        color: #ffffff !important;
    }

    /* Dark Mode Modals */
    body[light-mode="dark"] .modal-content,
    html[light-mode="dark"] .modal-content,
    body.dark-mode .modal-content,
    body[data-layout-mode="dark"] .modal-content {
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
        color: #f8fafc !important;
    }
    /* Protect purple header gradient in dark mode */
    body[light-mode="dark"] .modal-header-purple,
    html[light-mode="dark"] .modal-header-purple,
    body.dark-mode .modal-header-purple,
    body[data-layout-mode="dark"] .modal-header-purple,
    [data-bs-theme="dark"] .modal-header-purple {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .modal-sticky-footer,
    html[light-mode="dark"] .modal-sticky-footer,
    body.dark-mode .modal-sticky-footer {
        background-color: #1e293b !important;
        border-top: 1px solid #334155 !important;
    }
    .min-w-0 {
        min-width: 0 !important;
    }
    .detail-info-item,
    .detail-item-info {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 12px 16px !important;
        border-radius: 8px !important;
        min-height: 46px;
    }
    body[light-mode="dark"] .detail-info-item,
    body.dark-mode .detail-info-item,
    body[data-layout-mode="dark"] .detail-info-item,
    [data-bs-theme="dark"] .detail-info-item,
    body[light-mode="dark"] .detail-item-info,
    body.dark-mode .detail-item-info,
    body[data-layout-mode="dark"] .detail-item-info,
    [data-bs-theme="dark"] .detail-item-info {
        background: #0f172a !important;
        border: 1px solid #334155 !important;
        color: #f1f5f9 !important;
    }

    /* Dark Mode Borders & Dividers */
    body[light-mode="dark"] .border,
    html[light-mode="dark"] .border,
    body.dark-mode .border,
    body[data-layout-mode="dark"] .border,
    [data-bs-theme="dark"] .border,
    body[light-mode="dark"] .card,
    html[light-mode="dark"] .card,
    body.dark-mode .card,
    body[data-layout-mode="dark"] .card,
    [data-bs-theme="dark"] .card,
    body[light-mode="dark"] .border-top,
    html[light-mode="dark"] .border-top,
    body.dark-mode .border-top,
    body[data-layout-mode="dark"] .border-top,
    [data-bs-theme="dark"] .border-top,
    body[light-mode="dark"] .border-bottom,
    html[light-mode="dark"] .border-bottom,
    body.dark-mode .border-bottom,
    body[data-layout-mode="dark"] .border-bottom,
    [data-bs-theme="dark"] .border-bottom,
    body[light-mode="dark"] .border-end,
    html[light-mode="dark"] .border-end,
    body.dark-mode .border-end,
    body[data-layout-mode="dark"] .border-end,
    [data-bs-theme="dark"] .border-end,
    body[light-mode="dark"] .border-start,
    html[light-mode="dark"] .border-start,
    body.dark-mode .border-start,
    body[data-layout-mode="dark"] .border-start,
    [data-bs-theme="dark"] .border-start,
    body[light-mode="dark"] .table-bordered,
    html[light-mode="dark"] .table-bordered,
    body.dark-mode .table-bordered,
    body[data-layout-mode="dark"] .table-bordered,
    [data-bs-theme="dark"] .table-bordered,
    body[light-mode="dark"] footer.footer,
    html[light-mode="dark"] footer.footer,
    body.dark-mode footer.footer,
    body[data-layout-mode="dark"] footer.footer,
    [data-bs-theme="dark"] footer.footer {
        border-color: #334155 !important;
        --bs-border-color: #334155 !important;
    }
    body[light-mode="dark"] #display-info,
    body.dark-mode #display-info {
        color: #94a3b8 !important;
    }

    body[light-mode="dark"] #printTable,
    html[light-mode="dark"] #printTable,
    body.dark-mode #printTable,
    body[data-layout-mode="dark"] #printTable,
    [data-bs-theme="dark"] #printTable,
    body[light-mode="dark"] #printTable th,
    html[light-mode="dark"] #printTable th,
    body.dark-mode #printTable th,
    body[data-layout-mode="dark"] #printTable th,
    [data-bs-theme="dark"] #printTable th,
    body[light-mode="dark"] #printTable td,
    html[light-mode="dark"] #printTable td,
    body.dark-mode #printTable td,
    body[data-layout-mode="dark"] #printTable td,
    [data-bs-theme="dark"] #printTable td {
        border-color: #334155 !important;
        --bs-table-border-color: #334155 !important;
        --bs-table-bg: #1e293b !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] #printTable thead,
    html[light-mode="dark"] #printTable thead,
    body.dark-mode #printTable thead,
    body[data-layout-mode="dark"] #printTable thead,
    [data-bs-theme="dark"] #printTable thead,
    body[light-mode="dark"] #printTable thead th,
    html[light-mode="dark"] #printTable thead th,
    body.dark-mode #printTable thead th,
    body[data-layout-mode="dark"] #printTable thead th,
    [data-bs-theme="dark"] #printTable thead th,
    body[light-mode="dark"] #printTable tfoot,
    html[light-mode="dark"] #printTable tfoot,
    body.dark-mode #printTable tfoot,
    body[data-layout-mode="dark"] #printTable tfoot,
    [data-bs-theme="dark"] #printTable tfoot,
    body[light-mode="dark"] #printTable tfoot td,
    html[light-mode="dark"] #printTable tfoot td,
    body.dark-mode #printTable tfoot td,
    body[data-layout-mode="dark"] #printTable tfoot td,
    [data-bs-theme="dark"] #printTable tfoot td {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
        --bs-table-bg: #0f172a !important;
        --bs-table-border-color: #334155 !important;
    }
    body[light-mode="dark"] #printTable tbody tr:hover,
    body.dark-mode #printTable tbody tr:hover {
        background-color: rgba(140, 86, 212, 0.08) !important;
        --bs-table-hover-bg: rgba(140, 86, 212, 0.08) !important;
    }

    body[light-mode="dark"] .flatpickr-calendar,
    html[light-mode="dark"] .flatpickr-calendar {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .flatpickr-day,
    html[light-mode="dark"] .flatpickr-day {
        color: #f8fafc !important;
    }

    @media (max-width: 991.98px) {
        .page-content {
            background-color: #ffffff !important;
        }
        body[light-mode="dark"] .page-content,
        html[light-mode="dark"] .page-content,
        body.dark-mode .page-content {
            background-color: #0f172a !important;
        }
        .data-table .card {
            border: 0 !important;
            border-color: transparent !important;
            box-shadow: none !important;
        }
        .data-table .card-body {
            padding: 8px !important;
            border-radius: 0 !important;
        }
    }
</style>

<div class="main-content">
    <div class="page-content" style="padding: 0px !important;">
        <div class="data-table">
            <div class="card border-0">
                <div class="card-body p-3 p-lg-4">

                    <!-- 1. Header: Mobile/Tab (Title left, Search & Filter icons right) | Desktop (Icon box + Title) -->
                    <div class="invoice-card-header mb-3 pb-2 border-bottom d-flex align-items-center justify-content-between no-print">
                        <div class="d-flex align-items-center gap-3">
                            <div class="invoice-title-icon-box rounded-3 d-none d-lg-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-chart-line fs-5"></i>
                            </div>
                            <div>
                                <h4 class="invoice-main-heading m-0 p-0 fw-bold">বিক্রয় রিপোর্ট তালিকা</h4>
                            </div>
                        </div>

                        <!-- Mobile & Tab Action Buttons (Search, Print, Filter) -->
                        <div class="d-flex align-items-center gap-2 d-lg-none">
                            <button type="button" id="mobileSearchToggleBtn" class="mobile-header-icon-btn" onclick="toggleMobileSearchBar()" title="অনুসন্ধান">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>

                            <button type="button" id="mobileTablePrintBtn" class="mobile-header-icon-btn" onclick="printFullReportTable()" title="সম্পূর্ণ রিপোর্ট প্রিন্ট">
                                <i class="fa-solid fa-print"></i>
                            </button>

                            <div class="custom-dropdown-wrap position-relative" id="mobileFilterDropdownContainer">
                                <button type="button" class="mobile-header-icon-btn" id="mobileFilterDropdownToggle" onclick="toggleCustomDropdown('mobileFilterDropdownMenu')" title="ফিল্টার">
                                    <i class="fa-solid fa-filter"></i>
                                </button>
                                <div class="custom-dropdown-menu end-0 shadow-lg" id="mobileFilterDropdownMenu" style="min-width: 175px;">
                                    <a href="#" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterOption('all', 'সব সময়', event)">সব সময়</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="today" onclick="selectFilterOption('today', 'আজকের', event)">আজকের</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="yesterday" onclick="selectFilterOption('yesterday', 'গতকাল', event)">গতকাল</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="7" onclick="selectFilterOption('7', 'গত ৭ দিন', event)">গত ৭ দিন</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="30" onclick="selectFilterOption('30', 'গত ৩০ দিন', event)">গত ৩০ দিন</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="365" onclick="selectFilterOption('365', 'গত বছর', event)">গত বছর</a>
                                    <div class="custom-dropdown-divider"></div>
                                    <a href="#" class="custom-dropdown-item d-flex align-items-center justify-content-center fw-bold" onclick="openCustomDateModal(event)" style="color: #8C56D4 !important;">
                                        <i class="fa-regular fa-calendar-days me-2"></i>
                                        <span>তারিখ</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Expandable Search Bar -->
                    <div id="mobileSearchWrap" class="mb-3 d-none position-relative no-print">
                        <div class="d-flex align-items-center gap-2 mb-0">
                            <div class="position-relative flex-grow-1 mb-0">
                                <input type="text" id="mobileSearchInput" class="form-control invoice-search-input mb-0" placeholder="ইনভয়েস বা অর্ডার নং খুঁজুন..." autocomplete="off" />
                                <div id="mobileSearchDropdown" class="search-live-dropdown shadow-lg rounded-3 d-none position-absolute w-100 start-0"></div>
                            </div>
                            <button type="button" class="mobile-search-close-btn mb-0" onclick="closeMobileSearchBar()" title="বন্ধ করুন">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Date Section (Desktop only >= 992px) -->
                    <div class="invoice-date-section mb-3 d-none d-lg-block no-print">
                        <div class="invoice-date-grid mb-2.5" style="display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 10px !important;">
                            <div class="date-field-col" style="min-width: 0;">
                                <label for="startDate" class="form-label mb-1 fw-semibold text-slate-700" style="font-size: 13px;">শুরুর তারিখ *</label>
                                <div class="custom-date-input-wrap position-relative">
                                    <input type="text" id="startDate" name="startDate" class="custom-flatpickr-input form-control w-100 text-start" placeholder="DD/MM/YYYY" readonly autocomplete="off" />
                                    <span class="calendar-addon-btn" onclick="openDatePicker('startDate')">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="date-field-col" style="min-width: 0;">
                                <label for="endDate" class="form-label mb-1 fw-semibold text-slate-700" style="font-size: 13px;">শেষের তারিখ *</label>
                                <div class="custom-date-input-wrap position-relative">
                                    <input type="text" id="endDate" name="endDate" class="custom-flatpickr-input form-control w-100 text-start" placeholder="DD/MM/YYYY" readonly autocomplete="off" />
                                    <span class="calendar-addon-btn" onclick="openDatePicker('endDate')">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <button type="button" class="invoice-search-submit-btn w-100 fw-bold d-flex align-items-center justify-content-center gap-2" onclick="fetchSalesReport()">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span>অনুসন্ধান করুন</span>
                        </button>
                    </div>

                    <!-- Desktop Search Box -->
                    <div class="invoice-search-box-wrap mb-3 position-relative d-none d-lg-block no-print">
                        <input type="text" id="searchInput" class="form-control invoice-search-input" placeholder="ইনভয়েস বা অর্ডার নং খুঁজুন..." autocomplete="off" />
                        <i class="fa-solid fa-magnifying-glass invoice-search-addon-icon"></i>
                        <div id="desktopSearchDropdown" class="search-live-dropdown shadow-lg rounded-3 d-none position-absolute w-100 start-0"></div>
                    </div>

                    <!-- 3. Toolbar Section (Desktop only >= 992px) -->
                    <div class="invoice-toolbar-section mb-3 d-none d-lg-flex flex-column gap-3 no-print">
                        <div class="toolbar-row-1 d-flex align-items-center justify-content-between gap-2 w-100 mb-1">
                            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                <span class="fw-semibold text-slate-700 small" style="font-size: 13.5px; white-space: nowrap;">এন্ট্রি:</span>
                                <div class="custom-dropdown-wrap position-relative" id="entriesDropdownContainer" style="width: auto !important;">
                                    <button type="button" class="toolbar-control-btn d-inline-flex align-items-center justify-content-between px-3 gap-2" id="entriesDropdownToggle" onclick="toggleCustomDropdown('entriesDropdownMenu')" style="width: auto !important; min-width: 80px;">
                                        <span id="currentEntriesText" class="fw-bold">১৫</span>
                                        <i class="fa-solid fa-chevron-down dropdown-arrow-icon"></i>
                                    </button>
                                    <input type="hidden" id="entries" value="15">
                                    <div class="custom-dropdown-menu" id="entriesDropdownMenu">
                                        <div class="custom-dropdown-item" onclick="selectEntriesOption(5, '৫')">৫ টি</div>
                                        <div class="custom-dropdown-item" onclick="selectEntriesOption(10, '১০')">১০ টি</div>
                                        <div class="custom-dropdown-item active" onclick="selectEntriesOption(15, '১৫')">১৫ টি</div>
                                        <div class="custom-dropdown-item" onclick="selectEntriesOption(25, '২৫')">২৫ টি</div>
                                        <div class="custom-dropdown-item" onclick="selectEntriesOption(50, '৫০')">৫০ টি</div>
                                        <div class="custom-dropdown-item" onclick="selectEntriesOption(100, '১০০')">১০০ টি</div>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-dropdown-wrap position-relative flex-grow-1" id="filterDropdownContainer" style="max-width: 220px;">
                                <button type="button" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-between px-3" id="filterDropdownToggle" onclick="toggleCustomDropdown('filterDropdownMenu')">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-filter me-2" style="color: #8C56D4; font-size: 13px;"></i>
                                        <span id="currentFilterText" class="fw-bold fs-7 text-truncate">ফিল্টার</span>
                                    </div>
                                    <i class="fa-solid fa-chevron-down dropdown-arrow-icon ms-1"></i>
                                </button>
                                <div class="custom-dropdown-menu end-0" id="filterDropdownMenu">
                                    <a href="#" class="custom-dropdown-item active" data-filter="all" onclick="selectFilterOption('all', 'সব সময়', event)">সব সময়</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="today" onclick="selectFilterOption('today', 'আজকের', event)">আজকের</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="yesterday" onclick="selectFilterOption('yesterday', 'গতকাল', event)">গতকাল</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="7" onclick="selectFilterOption('7', 'গত ৭ দিন', event)">গত ৭ দিন</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="30" onclick="selectFilterOption('30', 'গত ৩০ দিন', event)">গত ৩০ দিন</a>
                                    <a href="#" class="custom-dropdown-item" data-filter="365" onclick="selectFilterOption('365', 'গত বছর', event)">গত বছর</a>
                                    <div class="custom-dropdown-divider"></div>
                                    <a href="#" class="custom-dropdown-item d-flex align-items-center justify-content-center fw-bold" onclick="openCustomDateModal(event)" style="color: #8C56D4 !important;">
                                        <i class="fa-regular fa-calendar-days me-2"></i>
                                        <span>তারিখ</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="toolbar-row-2 w-100" style="display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 10px !important;">
                            <button type="button" id="pdfBtn" onclick="exportSalesPDF()" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-center px-3" title="PDF ডাউনলোড করুন">
                                <i class="fa-solid fa-file-pdf text-danger me-2" style="font-size: 15px;"></i>
                                <span class="fw-bold fs-7">PDF</span>
                            </button>
                            <button type="button" id="printBtn" onclick="printFullReportTable()" class="toolbar-control-btn w-100 d-flex align-items-center justify-content-center px-3" title="প্রিন্ট করুন">
                                <i class="fa-solid fa-print me-2" style="color: #8C56D4; font-size: 15px;"></i>
                                <span class="fw-bold fs-7">প্রিন্ট</span>
                            </button>
                        </div>
                    </div>

                    <!-- Top Dynamic Summary Strip (1 Row, 6px radius) -->
                    <div class="invoice-top-summary-strip mb-3 p-2.5 px-3 bg-white" style="border-radius: 6px !important; border: none !important; box-shadow: 0 4px 18px rgba(140, 86, 212, 0.08), 0 1px 3px rgba(0, 0, 0, 0.04) !important;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-column text-start ps-1 flex-grow-1">
                                <span class="text-muted small fw-medium" style="font-size: 12px;">মোট ইনভয়েস</span>
                                <span class="fw-bold" id="topSummaryTotalCount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">০ টি</span>
                            </div>
                            <div class="summary-divider-bar" style="width: 1.5px; height: 32px; background-color: #E5D5F7; flex-shrink: 0; margin: 0 16px;"></div>
                            <div class="d-flex flex-column text-end pe-1 flex-grow-1">
                                <span class="text-muted small fw-medium" style="font-size: 12px;">মোট বিক্রয় মূল্য</span>
                                <span class="fw-bold" id="topSummaryTotalAmount" style="font-size: 15.5px; color: #8C56D4; font-family: 'Noto Sans Bengali', 'Poppins', sans-serif;">৳ ০.০০</span>
                            </div>
                        </div>
                    </div>

                    <!-- PRINTABLE CONTAINER START -->
                    <div id="printableArea">
                        <!-- Table View (Desktop screens >= 992px) -->
                        <div class="table-responsive d-none d-lg-block mb-3">
                            <table id="printTable" class="table table-bordered table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 55px;">ক্রমিক</th>
                                        <th class="text-start" style="width: 140px;">ইনভয়েস নং</th>
                                        <th class="text-end" style="width: 130px;">ক্রয় খরচ</th>
                                        <th class="text-end" style="width: 140px;">বিক্রয় মূল্য</th>
                                        <th class="text-end" style="width: 130px;">পরিশোধিত</th>
                                        <th class="text-end" style="width: 130px;">বকেয়া</th>
                                        <th class="text-end" style="width: 120px;">ফেরত</th>
                                        <th class="text-center" style="width: 110px;">অ্যাকশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td colspan="8" class="text-center py-4 text-muted">ডাটা লোড হচ্ছে...</td></tr>
                                </tbody>
                                <tfoot class="table-light fw-bold border-top">
                                    <tr id="totalCounts">
                                        <td colspan="2" class="text-end ps-4">সর্বমোট:</td>
                                        <td class="text-end" id="sumCost">৳ ০.০০</td>
                                        <td class="text-end" id="sumSales">৳ ০.০০</td>
                                        <td class="text-end text-success" id="sumPaid">৳ ০.০০</td>
                                        <td class="text-end text-danger" id="sumDue">৳ ০.০০</td>
                                        <td class="text-end" id="sumReturn">৳ ০.০০</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Mobile & Tablet Responsive Card List View (< 992px) -->
                        <div id="mobileCardList" class="d-flex flex-wrap d-lg-none mb-3 align-items-start no-print" style="gap: 8px !important;"></div>
                    </div>
                    <!-- PRINTABLE CONTAINER END -->

                    <!-- Smart Pagination & Display Info Footer -->
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between pt-3 mt-3 border-top gap-2 no-print">
                        <div class="text-muted small fw-medium" id="display-info" style="font-size: 13px;">
                            মোট ০ টির মধ্যে ০ - ০ টি ইনভয়েস প্রদর্শিত হচ্ছে
                        </div>
                        <div id="pagination" class="d-flex align-items-center gap-1.5 flex-wrap justify-content-center"></div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Custom Date Range Filter Modal (Bottom slide-up on mobile/tab) -->
        <div class="modal fade" id="customDateRangeModal" tabindex="-1" aria-labelledby="customDateRangeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 440px;">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-purple d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-regular fa-calendar-days fs-6"></i>
                            <h6 class="modal-title fw-bold m-0" id="customDateRangeModalLabel" style="font-size: 15px;">তারিখ অনুযায়ী ফিল্টার</h6>
                        </div>
                        <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" onclick="closeCustomDateModal()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body p-3">
                        <form id="mobileCustomDateForm" onsubmit="applyMobileCustomDateFilter(event)">
                            <div class="row g-2">
                                <div class="col-12 col-md-6 mb-2.5">
                                    <label for="mobileStartDate" class="form-label mb-1 fw-semibold text-slate-700" style="font-size: 13px;">শুরুর তারিখ *</label>
                                    <div class="custom-date-input-wrap position-relative">
                                        <input type="text" id="mobileStartDate" name="mobileStartDate" class="custom-flatpickr-input form-control w-100 text-start" placeholder="DD/MM/YYYY" readonly autocomplete="off" />
                                        <span class="calendar-addon-btn" onclick="openMobileDatePicker('mobileStartDate')">
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="mobileEndDate" class="form-label mb-1 fw-semibold text-slate-700" style="font-size: 13px;">শেষের তারিখ *</label>
                                    <div class="custom-date-input-wrap position-relative">
                                        <input type="text" id="mobileEndDate" name="mobileEndDate" class="custom-flatpickr-input form-control w-100 text-start" placeholder="DD/MM/YYYY" readonly autocomplete="off" />
                                        <span class="calendar-addon-btn" onclick="openMobileDatePicker('mobileEndDate')">
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-sticky-footer d-flex align-items-center gap-2 px-0 pt-3 pb-0">
                                <button type="button" class="btn btn-outline-danger fw-bold d-flex align-items-center justify-content-center gap-1.5 px-3" style="height: 42px; border-radius: 10px; font-size: 14px; min-width: 90px;" onclick="resetDateFilter()" title="রিসেট করুন">
                                    <span>রিসেট</span>
                                </button>
                                <button type="submit" class="invoice-search-submit-btn flex-grow-1 fw-bold d-flex align-items-center justify-content-center gap-2" style="height: 42px;">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <span>অনুসন্ধান করুন</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Order Details Modal (Sticky header & footer, scrollable body) -->
        <div class="modal fade" id="salesDetailsModal" tabindex="-1" aria-labelledby="salesDetailsModalLabel" aria-hidden="true" style="z-index: 10600;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 480px;">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header-purple d-flex align-items-center justify-content-between flex-shrink-0">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-solid fa-file-invoice-dollar fs-6 text-white"></i>
                            <h6 class="modal-title fw-bold m-0 text-white" id="salesDetailsModalLabel" style="font-size: 15px;">বিক্রয় ইনভয়েসের বিস্তারিত তথ্য</h6>
                        </div>
                        <button type="button" class="btn-close-red" data-bs-dismiss="modal" aria-label="Close" title="বন্ধ করুন">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body p-3 overflow-y-auto" style="max-height: calc(85vh - 120px);" id="salesDetailsBody">
                        <!-- Filled dynamically -->
                    </div>
                    <div class="modal-sticky-footer d-flex align-items-center justify-content-between gap-2 flex-shrink-0">
                        <button type="button" class="btn btn-outline-danger fw-bold px-3 py-2" data-bs-dismiss="modal" style="height: 38px; border-radius: 6px; font-size: 13px;">
                            <i class="fa-solid fa-xmark me-1"></i> বন্ধ করুন
                        </button>
                        <button type="button" id="salesDetailModalPrintBtn" class="btn text-white fw-bold px-3 py-2 d-inline-flex align-items-center gap-1.5" style="height: 38px; border-radius: 6px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); font-size: 13px; border: none;">
                            <i class="fa-solid fa-print"></i> স্লিপ প্রিন্ট করুন
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright no-print">
            <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; {{ date('Y') }} মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="fw-bold text-decoration-none" style="color: #8C56D4 !important;">CodeNext IT</a></footer>
        </div>
    </div>
</div>

<script>
    // Bengali Numeral Helper
    function engToBanglaNum(input) {
        if (input === null || input === undefined) return '';
        const bnDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return input.toString().replace(/[0-9]/g, w => bnDigits[+w]);
    }

    function banglaToEngNum(input) {
        if (!input) return '';
        const bnDigits = {'০':'0', '১':'1', '২':'2', '৩':'3', '৪':'4', '৫':'5', '৬':'6', '৭':'7', '৮':'8', '৯':'9'};
        return input.toString().replace(/[০-৯]/g, w => bnDigits[w]);
    }

    function formatMoneyBn(amount) {
        if (amount === null || isNaN(amount)) return "০.০০";
        let formatted = parseFloat(amount).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        return engToBanglaNum(formatted);
    }

    // State Variables
    let rawSalesData = [];
    let filteredSalesData = [];
    let currentPage = 1;
    let itemsPerPage = 15;
    let activeFilter = 'all';

    let startDatePicker = null;
    let endDatePicker = null;
    let mobileStartDatePicker = null;
    let mobileEndDatePicker = null;

    document.addEventListener("DOMContentLoaded", () => {
        initFlatpickrCalendars();
        setupDropdownHandlers();
        setupSearchListeners();

        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        const defaultDateStr = `${dd}-${mm}-${yyyy}`;

        if (startDatePicker) startDatePicker.setDate(defaultDateStr, false);
        if (endDatePicker) endDatePicker.setDate(defaultDateStr, false);
        if (mobileStartDatePicker) mobileStartDatePicker.setDate(defaultDateStr, false);
        if (mobileEndDatePicker) mobileEndDatePicker.setDate(defaultDateStr, false);

        fetchSalesReport();
    });

    function initFlatpickrCalendars() {
        const flatpickrConfig = {
            dateFormat: "d-m-Y",
            allowInput: false,
            disableMobile: true,
            monthSelectorType: "static",
            prevArrow: '<i class="fa-solid fa-chevron-left" style="color:#8C56D4;"></i>',
            nextArrow: '<i class="fa-solid fa-chevron-right" style="color:#8C56D4;"></i>',
        };

        startDatePicker = flatpickr("#startDate", flatpickrConfig);
        endDatePicker = flatpickr("#endDate", flatpickrConfig);
        mobileStartDatePicker = flatpickr("#mobileStartDate", flatpickrConfig);
        mobileEndDatePicker = flatpickr("#mobileEndDate", flatpickrConfig);
    }

    function openDatePicker(id) {
        if (id === 'startDate' && startDatePicker) startDatePicker.open();
        if (id === 'endDate' && endDatePicker) endDatePicker.open();
    }
    function openMobileDatePicker(id) {
        if (id === 'mobileStartDate' && mobileStartDatePicker) mobileStartDatePicker.open();
        if (id === 'mobileEndDate' && mobileEndDatePicker) mobileEndDatePicker.open();
    }

    function toggleCustomDropdown(menuId) {
        const wrap = $("#" + menuId).closest(".custom-dropdown-wrap");
        const isOpen = wrap.hasClass("open");
        $(".custom-dropdown-wrap").removeClass("open");
        if (!isOpen) wrap.addClass("open");
    }

    function setupDropdownHandlers() {
        $(document).on("click", function (e) {
            if (!$(e.target).closest(".custom-dropdown-wrap").length) {
                $(".custom-dropdown-wrap").removeClass("open");
            }
            if (!$(e.target).closest("#mobileSearchWrap, #mobileSearchToggleBtn, .invoice-search-box-wrap").length) {
                $(".search-live-dropdown").addClass("d-none").empty();
            }
        });
    }

    function toggleMobileSearchBar() {
        const wrap = $("#mobileSearchWrap");
        if (wrap.hasClass("d-none")) {
            wrap.removeClass("d-none");
            $("#mobileSearchInput").focus();
        } else {
            closeMobileSearchBar();
        }
    }

    function closeMobileSearchBar() {
        $("#mobileSearchWrap").addClass("d-none");
        $("#mobileSearchInput").val("");
        $("#mobileSearchDropdown").addClass("d-none").empty();
        applyClientFilter("");
    }

    function selectEntriesOption(val, label) {
        itemsPerPage = parseInt(val);
        $("#currentEntriesText").text(label);
        $("#entries").val(val);
        $("#entriesDropdownMenu .custom-dropdown-item").removeClass("active");
        $(`#entriesDropdownMenu .custom-dropdown-item:contains('${label}')`).addClass("active");
        $(".custom-dropdown-wrap").removeClass("open");
        currentPage = 1;
        renderPaginatedView();
    }

    function selectFilterOption(type, label, e) {
        if (e) e.preventDefault();
        activeFilter = type;
        $("#currentFilterText").text(label);
        $(".custom-dropdown-wrap").removeClass("open");

        $(".custom-dropdown-menu a[data-filter]").removeClass("active");
        $(`.custom-dropdown-menu a[data-filter='${type}']`).addClass("active");

        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        const todayStr = `${dd}-${mm}-${yyyy}`;

        if (type === 'all') {
            const firstOfYear = `01-01-${yyyy}`;
            setDates(firstOfYear, todayStr);
        } else if (type === 'today') {
            setDates(todayStr, todayStr);
        } else if (type === 'yesterday') {
            const yest = new Date(today);
            yest.setDate(today.getDate() - 1);
            const yDd = String(yest.getDate()).padStart(2, '0');
            const yMm = String(yest.getMonth() + 1).padStart(2, '0');
            const yStr = `${yDd}-${yMm}-${yest.getFullYear()}`;
            setDates(yStr, yStr);
        } else if (type === '7') {
            const d7 = new Date(today);
            d7.setDate(today.getDate() - 6);
            const d7Str = `${String(d7.getDate()).padStart(2, '0')}-${String(d7.getMonth() + 1).padStart(2, '0')}-${d7.getFullYear()}`;
            setDates(d7Str, todayStr);
        } else if (type === '30') {
            const d30 = new Date(today);
            d30.setDate(today.getDate() - 29);
            const d30Str = `${String(d30.getDate()).padStart(2, '0')}-${String(d30.getMonth() + 1).padStart(2, '0')}-${d30.getFullYear()}`;
            setDates(d30Str, todayStr);
        } else if (type === '365') {
            const d365 = new Date(today);
            d365.setDate(today.getDate() - 364);
            const d365Str = `${String(d365.getDate()).padStart(2, '0')}-${String(d365.getMonth() + 1).padStart(2, '0')}-${d365.getFullYear()}`;
            setDates(d365Str, todayStr);
        }
        fetchSalesReport();
    }

    function setDates(startStr, endStr) {
        if (startDatePicker) startDatePicker.setDate(startStr, false);
        if (endDatePicker) endDatePicker.setDate(endStr, false);
        if (mobileStartDatePicker) mobileStartDatePicker.setDate(startStr, false);
        if (mobileEndDatePicker) mobileEndDatePicker.setDate(endStr, false);
    }

    function openCustomDateModal(e) {
        if (e) e.preventDefault();
        $(".custom-dropdown-wrap").removeClass("open");
        const modal = new bootstrap.Modal(document.getElementById('customDateRangeModal'));
        modal.show();
    }

    function closeCustomDateModal() {
        const modalEl = document.getElementById('customDateRangeModal');
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
    }

    function resetDateFilter() {
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        const todayStr = `${dd}-${mm}-${yyyy}`;
        setDates(todayStr, todayStr);
        closeCustomDateModal();
        selectFilterOption('today', 'আজকের');
    }

    function applyMobileCustomDateFilter(e) {
        e.preventDefault();
        const sVal = $("#mobileStartDate").val();
        const eVal = $("#mobileEndDate").val();
        if (startDatePicker) startDatePicker.setDate(sVal, false);
        if (endDatePicker) endDatePicker.setDate(eVal, false);
        closeCustomDateModal();
        $("#currentFilterText").text("তারিখ");
        fetchSalesReport();
    }

    function toApiDate(dmyStr) {
        if (!dmyStr) return '';
        const parts = dmyStr.split('-');
        if (parts.length === 3) return `${parts[2]}-${parts[1]}-${parts[0]}`;
        return dmyStr;
    }

    function setupSearchListeners() {
        $("#searchInput, #mobileSearchInput").on("keyup search input focus", function () {
            let val = $(this).val();
            $("#searchInput").val(val);
            $("#mobileSearchInput").val(val);
            handleLiveSearch(val);
            applyClientFilter(val);
        });
    }

    function handleLiveSearch(term) {
        let clean = (term || "").toLowerCase().trim();
        renderLiveDropdown("desktopSearchDropdown", clean);
        renderLiveDropdown("mobileSearchDropdown", clean);
    }

    function renderLiveDropdown(containerId, clean) {
        const dropdown = $("#" + containerId);
        if (!clean || clean.length === 0 || !rawSalesData || rawSalesData.length === 0) {
            dropdown.addClass("d-none").empty();
            return;
        }

        let matches = rawSalesData.filter(item => {
            let ord = String(item.order_no || "").toLowerCase();
            return ord.includes(clean);
        }).slice(0, 8);

        if (matches.length === 0) {
            dropdown.html('<div class="p-3 text-center text-muted small">কোনো ইনভয়েস পাওয়া যায়নি</div>').removeClass("d-none");
            return;
        }

        let html = '';
        matches.forEach(item => {
            const safeSearch = (item.order_no || '').replace(/'/g, "\\'");
            html += `
                <div class="search-live-item" onclick="selectSearchItem('${safeSearch}')">
                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 30px; height: 30px; background: #F3ECFB; color: #8C56D4; font-size: 12px;">
                            <i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div class="overflow-hidden">
                            <span class="fw-bold text-dark d-block text-truncate" style="font-size: 13px;">ইনভয়েস #${item.order_no || ''}</span>
                        </div>
                    </div>
                    <div class="text-end flex-shrink-0 ms-2">
                        <div class="fw-bold text-dark" style="font-size: 12.5px;">৳ ${formatMoneyBn(item.selling_price || 0)}</div>
                    </div>
                </div>
            `;
        });
        dropdown.html(html).removeClass("d-none");
    }

    function selectSearchItem(val) {
        $("#searchInput").val(val);
        $("#mobileSearchInput").val(val);
        $(".search-live-dropdown").addClass("d-none").empty();
        applyClientFilter(val);
    }

    function applyClientFilter(term) {
        let clean = (term || "").toLowerCase().trim();
        if (!clean) {
            filteredSalesData = [...rawSalesData];
        } else {
            filteredSalesData = rawSalesData.filter(item => {
                let ord = String(item.order_no || "").toLowerCase();
                return ord.includes(clean);
            });
        }
        currentPage = 1;
        renderPaginatedView();
    }

    async function fetchSalesReport() {
        const sVal = $("#startDate").val();
        const eVal = $("#endDate").val();

        const startDate = toApiDate(sVal);
        const endDate = toApiDate(eVal);

        if (!startDate || !endDate) {
            alert("অনুগ্রহ করে শুরুর ও শেষের তারিখ নির্বাচন করুন।");
            return;
        }

        try {
            if (typeof showLoader === "function") showLoader();
            const res = await axios.get("/api/sales-report-list", {
                ...HeaderToken(),
                params: {
                    start_date: startDate,
                    end_date: endDate
                }
            });
            if (typeof hideLoader === "function") hideLoader();

            if (res.data && res.data.SalesReportData) {
                rawSalesData = res.data.SalesReportData;
                filteredSalesData = [...rawSalesData];

                let costAmountTotal = 0;
                let SellingPriceTotal = 0;
                let paidAmountTotal = 0;
                let dueAmountTotal = 0;
                let ReturnAmountTotal = 0;

                rawSalesData.forEach(item => {
                    costAmountTotal += parseFloat(item['total_cost']) || 0;
                    SellingPriceTotal += parseFloat(item['selling_price']) || 0;
                    paidAmountTotal += parseFloat(item['paid_amount']) || 0;
                    dueAmountTotal += parseFloat(item['due_amount']) || 0;
                    ReturnAmountTotal += parseFloat(item['return_amount']) || 0;
                });

                $("#topSummaryTotalCount").text(engToBanglaNum(rawSalesData.length) + ' টি');
                $("#topSummaryTotalAmount").text('৳ ' + formatMoneyBn(SellingPriceTotal));

                $("#sumCost").text('৳ ' + formatMoneyBn(costAmountTotal));
                $("#sumSales").text('৳ ' + formatMoneyBn(SellingPriceTotal));
                $("#sumPaid").text('৳ ' + formatMoneyBn(paidAmountTotal));
                $("#sumDue").text('৳ ' + formatMoneyBn(dueAmountTotal));
                $("#sumReturn").text('৳ ' + formatMoneyBn(ReturnAmountTotal));

                currentPage = 1;
                renderPaginatedView();
            } else {
                alert('বিক্রয় রিপোর্ট লোড ব্যর্থ হয়েছে');
            }
        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error('Error fetching sales report:', e);
            if (e.response && typeof unauthorized === "function") {
                unauthorized(e.response.status);
            }
        }
    }

    function renderPaginatedView() {
        const totalItems = filteredSalesData.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage) || 1;
        if (currentPage > totalPages) currentPage = totalPages;

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);
        const pageItems = filteredSalesData.slice(startIndex, endIndex);

        const tbody = $("#printTable tbody");
        tbody.empty();

        const mobileContainer = $("#mobileCardList");
        mobileContainer.empty();

        if (pageItems.length === 0) {
            tbody.html('<tr><td colspan="8" class="text-center py-4 text-muted fw-bold">কোনো ইনভয়েস রেকর্ড পাওয়া যায়নি</td></tr>');
            mobileContainer.html('<div class="col-12 p-4 text-center text-muted fw-bold invoice-mobile-card shadow-sm" style="border-radius: 6px !important;">কোনো ইনভয়েস রেকর্ড পাওয়া যায়নি</div>');
        } else {
            pageItems.forEach((item, idx) => {
                const realIndex = startIndex + idx;
                const selling = parseFloat(item.selling_price) || 0;
                const paid = parseFloat(item.paid_amount) || 0;
                const due = parseFloat(item.due_amount) || 0;
                const cost = parseFloat(item.total_cost) || 0;
                const returned = parseFloat(item.return_amount) || 0;

                let paymentStatus = 'পরিশোধ';
                let statusBadgeClass = 'bg-success-subtle text-success border border-success-subtle';
                if (due > 0 && paid > 0) {
                    paymentStatus = 'আংশিক';
                    statusBadgeClass = 'bg-warning-subtle text-warning border border-warning-subtle';
                } else if (due > 0 && paid === 0) {
                    paymentStatus = 'বকেয়া';
                    statusBadgeClass = 'bg-danger-subtle text-danger border border-danger-subtle';
                }

                // Desktop Row
                const row = `
                    <tr>
                        <td class="text-center fw-semibold text-muted">${engToBanglaNum(realIndex + 1)}</td>
                        <td class="fw-bold text-dark">
                            <span class="badge bg-light text-dark border font-monospace fs-7">#${item.order_no}</span>
                        </td>
                        <td class="text-end fw-semibold">৳ ${formatMoneyBn(cost)}</td>
                        <td class="text-end fw-bold text-dark">৳ ${formatMoneyBn(selling)}</td>
                        <td class="text-end fw-bold text-success">৳ ${formatMoneyBn(paid)}</td>
                        <td class="text-end fw-bold text-danger">৳ ${formatMoneyBn(due)}</td>
                        <td class="text-end fw-semibold text-muted">৳ ${formatMoneyBn(returned)}</td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <a href="${item.id ? '/invoice/' + item.id : 'javascript:void(0)'}" class="btn btn-sm btn-outline-primary p-1 px-2" style="border-radius: 6px; font-size: 11px;" title="ইনভয়েস দেখুন">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-secondary p-1 px-2" style="border-radius: 6px; font-size: 11px;" onclick="window.print()" title="প্রিন্ট করুন">
                                    <i class="fa-solid fa-print"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
                tbody.append(row);

                // Mobile & Tablet Card
                const cardDate = formatCardDate(item.created_at || item.date);

                const mobileCard = `
                    <div class="col-12 col-md-6 align-self-start mb-0">
                        <div class="invoice-mobile-card card shadow-sm position-relative mb-0">
                            <div class="d-flex align-items-stretch">
                                <!-- Left Date Column: Day on Top, Month Name Below (No Year/Day text) -->
                                <div class="d-flex flex-column justify-content-center align-items-center text-center card-date-divider">
                                    <span class="fw-bold" style="color: #8C56D4; font-size: 16px; line-height: 1.1;">${cardDate.day}</span>
                                    <span class="text-muted small mt-0.5" style="font-size: 11px; font-weight: 600;">${cardDate.month}</span>
                                </div>

                                <!-- Right Content Area -->
                                <div class="card-content-wrap d-flex flex-column justify-content-between">
                                    <!-- Line 1: Order No + Badge -->
                                    <div class="card-title-row mb-0.5">
                                        <div class="fw-bold text-dark card-title-text" style="font-size: 14px;">
                                            ইনভয়েস #${item.order_no}
                                        </div>
                                        <div class="card-badge-pill">
                                            <span class="badge ${statusBadgeClass} px-2 py-0.5 fw-bold" style="font-size: 11px; border-radius: 6px;">
                                                ${paymentStatus}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Line 2: Cost & Return -->
                                    <div class="d-flex align-items-center justify-content-between gap-1 mb-1" style="font-size: 11.5px; color: #64748b;">
                                        <div class="text-truncate">
                                            <span>ক্রয় খরচ: ৳ ${formatMoneyBn(cost)}</span>
                                        </div>
                                        ${returned > 0 ? `<div class="text-end text-muted flex-shrink-0" style="font-size: 11px;">ফেরত: ৳ ${formatMoneyBn(returned)}</div>` : ''}
                                    </div>

                                    <!-- Line 3: Selling Price & Due -->
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div class="fw-bold text-dark text-truncate" style="font-size: 14px;">
                                            বিক্রয়: ৳ ${formatMoneyBn(selling)}
                                        </div>
                                        <div class="d-flex align-items-center flex-shrink-0">
                                            ${due > 0 ? `<span class="text-danger fw-semibold" style="font-size: 12px;">বকেয়া: ৳ ${formatMoneyBn(due)}</span>` : `<span class="text-success fw-semibold" style="font-size: 12px;">পরিশোধ: ৳ ${formatMoneyBn(paid)}</span>`}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile Card Actions: 1-Row Full Width (Print & View) -->
                            <div class="mobile-card-actions" onclick="event.stopPropagation();">
                                <button type="button" class="mobile-action-btn action-btn-print" onclick="printSingleRecord(${realIndex})" title="ইনভয়েস প্রিন্ট করুন">
                                    <i class="fa-solid fa-print"></i> <span>প্রিন্ট</span>
                                </button>
                                <button type="button" class="mobile-action-btn action-btn-view" onclick="openRecordDetailsModal(${realIndex})" title="বিস্তারিত দেখুন">
                                    <i class="fa-solid fa-eye"></i> <span>বিস্তারিত</span>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                mobileContainer.append(mobileCard);
            });
        }

        const fromCount = totalItems > 0 ? startIndex + 1 : 0;
        const toCount = endIndex;
        $("#display-info").html(`মোট <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 mx-1 fw-bold fs-6">${engToBanglaNum(totalItems)}</span> টির মধ্যে <span class="badge bg-light text-dark border px-2 py-1 mx-1 fw-bold fs-6">${engToBanglaNum(fromCount)} - ${engToBanglaNum(toCount)}</span> টি ইনভয়েস প্রদর্শিত হচ্ছে`);

        renderPaginationControls(totalPages);
    }

    function renderPaginationControls(totalPages) {
        const pagContainer = $("#pagination");
        pagContainer.empty();
        if (totalPages <= 1) return;

        let prevBtn = `<button type="button" class="btn btn-sm btn-outline-secondary ${currentPage === 1 ? 'disabled' : ''}" onclick="goToPage(${currentPage - 1})"><i class="fa-solid fa-chevron-left"></i></button>`;
        pagContainer.append(prevBtn);

        let startP = Math.max(1, currentPage - 2);
        let endP = Math.min(totalPages, currentPage + 2);

        for (let p = startP; p <= endP; p++) {
            let activeClass = p === currentPage ? 'btn-primary' : 'btn-outline-secondary';
            let style = p === currentPage ? 'background-color: #8C56D4 !important; border-color: #8C56D4 !important; color:#fff;' : '';
            pagContainer.append(`<button type="button" class="btn btn-sm ${activeClass}" style="${style}" onclick="goToPage(${p})">${engToBanglaNum(p)}</button>`);
        }

        let nextBtn = `<button type="button" class="btn btn-sm btn-outline-secondary ${currentPage === totalPages ? 'disabled' : ''}" onclick="goToPage(${currentPage + 1})"><i class="fa-solid fa-chevron-right"></i></button>`;
        pagContainer.append(nextBtn);
    }

    function goToPage(p) {
        currentPage = p;
        renderPaginatedView();
    }

    function exportSalesPDF() {
        const element = document.getElementById('printableArea');
        const opt = {
            margin: 10,
            filename: 'sales-report.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        };
        html2pdf().set(opt).from(element).save();
    }

    // Format Card Date: Day on Top, Month Name Below (No Year/Day text)
    function formatCardDate(dateStr) {
        if (!dateStr) return { day: '-', month: '-' };
        const bnMonths = ["জানু", "ফেব্রু", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টে", "অক্টো", "নভে", "ডিসে"];
        let clean = String(dateStr).trim();
        let parts = clean.split(/[\s,T]+/);
        let datePart = parts[0];

        let day = '';
        let month = '';

        if (datePart.includes('-') || datePart.includes('/')) {
            let sub = datePart.split(/[-/]/);
            if (sub[0].length === 4) {
                // YYYY-MM-DD
                day = engToBanglaNum(parseInt(sub[2], 10));
                let mIdx = parseInt(sub[1], 10) - 1;
                month = bnMonths[mIdx] || sub[1];
            } else {
                // DD-MM-YYYY
                day = engToBanglaNum(parseInt(sub[0], 10));
                let mIdx = parseInt(sub[1], 10) - 1;
                month = bnMonths[mIdx] || sub[1];
            }
        } else {
            day = engToBanglaNum(datePart);
            if (parts.length > 1) {
                month = parts[1];
            }
        }
        return { day: day || '-', month: month || '-' };
    }

    // Helper to get current Date and Time formatted in Bengali
    function getBnDateTimeNow() {
        const now = new Date();
        const d = engToBanglaNum(String(now.getDate()).padStart(2, '0'));
        const m = engToBanglaNum(String(now.getMonth() + 1).padStart(2, '0'));
        const y = engToBanglaNum(now.getFullYear());
        let hours = now.getHours();
        const minutes = engToBanglaNum(String(now.getMinutes()).padStart(2, '0'));
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12;
        const h = engToBanglaNum(String(hours).padStart(2, '0'));
        return {
            date: `${d}/${m}/${y}`,
            time: `${h}:${minutes} ${ampm}`
        };
    }

    // Print Single Record (Sales Slip - Borderless, Full-width, 10px Page Margin per Image 4)
    function printSingleRecord(index) {
        const item = filteredSalesData[index];
        if (!item) return;

        const cost = parseFloat(item['total_cost']) || 0;
        const selling = parseFloat(item['selling_price']) || 0;
        const paid = parseFloat(item['paid_amount']) || 0;
        const due = parseFloat(item['due_amount']) || 0;
        const returned = parseFloat(item['return_amount']) || 0;

        let paymentStatus = 'পরিশোধ';
        if (due > 0 && paid > 0) paymentStatus = 'আংশিক পরিশোধ';
        else if (due > 0 && paid === 0) paymentStatus = 'বকেয়া';

        const printWindow = window.open('', '_blank', 'width=700,height=800');
        printWindow.document.write(`
            <!DOCTYPE html>
            <html lang="bn">
            <head>
                <title>বিক্রয় ইনভয়েস - #${item.order_no || ''}</title>
                <meta charset="utf-8">
                <style>
                    @page {
                        size: auto;
                        margin: 10px !important;
                    }
                    * {
                        box-sizing: border-box;
                    }
                    body {
                        font-family: 'Noto Sans Bengali', 'Segoe UI', Arial, sans-serif;
                        padding: 10px !important;
                        margin: 0 !important;
                        color: #1e293b;
                        background: #ffffff;
                        width: 100% !important;
                        -webkit-print-color-adjust: exact !important;
                        print-color-adjust: exact !important;
                    }
                    .slip-box {
                        border: none !important;
                        padding: 0 !important;
                        max-width: 100% !important;
                        width: 100% !important;
                        margin: 0 auto;
                    }
                    .slip-header {
                        text-align: center;
                        border-bottom: 2px solid #8C56D4;
                        padding-bottom: 12px;
                        margin-bottom: 15px;
                    }
                    .slip-title {
                        font-size: 22px;
                        font-weight: bold;
                        color: #8C56D4;
                        margin: 0;
                    }
                    .slip-subtitle {
                        font-size: 13px;
                        color: #64748b;
                        margin: 4px 0 0;
                    }
                    .slip-row {
                        display: flex;
                        justify-content: space-between;
                        padding: 8px 0;
                        border-bottom: 1px solid #f1f5f9;
                        font-size: 13.5px;
                    }
                    .slip-label {
                        color: #64748b;
                        font-weight: 500;
                    }
                    .slip-val {
                        font-weight: bold;
                        color: #0f172a;
                        text-align: right;
                    }
                    .amount-box {
                        background: #FAF7FD;
                        border: 1.5px solid #E5D5F7;
                        color: #8C56D4;
                        text-align: center;
                        padding: 12px;
                        border-radius: 8px;
                        margin: 15px 0;
                        font-size: 20px;
                        font-weight: bold;
                    }
                    .signature-row {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 45px;
                        padding-top: 10px;
                        font-size: 12px;
                    }
                    .sig-line {
                        border-top: 1px solid #94a3b8;
                        width: 130px;
                        text-align: center;
                        padding-top: 5px;
                    }
                </style>
            </head>
            <body>
                <div class="slip-box">
                    <div class="slip-header">
                        <h3 class="slip-title">মেসার্স আনিস ষ্টোর</h3>
                        <div class="slip-subtitle">বিক্রয় ইনভয়েস মেমো</div>
                    </div>
                    <div class="slip-row">
                        <span class="slip-label">ইনভয়েস নং:</span>
                        <span class="slip-val">#${item.order_no || '-'}</span>
                    </div>
                    <div class="slip-row">
                        <span class="slip-label">তারিখ:</span>
                        <span class="slip-val">${item.created_at || item.date || '-'}</span>
                    </div>
                    <div class="slip-row">
                        <span class="slip-label">পরিশোধ স্ট্যাটাস:</span>
                        <span class="slip-val">${paymentStatus}</span>
                    </div>
                    <div class="slip-row">
                        <span class="slip-label">ক্রয় খরচ:</span>
                        <span class="slip-val">৳ ${formatMoneyBn(cost)}</span>
                    </div>
                    <div class="amount-box">
                        মোট বিক্রয়: ৳ ${formatMoneyBn(selling)}
                    </div>
                    <div class="slip-row">
                        <span class="slip-label">পরিশোধিত টাকা:</span>
                        <span class="slip-val text-success">৳ ${formatMoneyBn(paid)}</span>
                    </div>
                    <div class="slip-row">
                        <span class="slip-label">বকেয়া টাকা:</span>
                        <span class="slip-val text-danger">৳ ${formatMoneyBn(due)}</span>
                    </div>
                    ${returned > 0 ? `
                    <div class="slip-row">
                        <span class="slip-label">পণ্য ফেরত:</span>
                        <span class="slip-val">৳ ${formatMoneyBn(returned)}</span>
                    </div>` : ''}
                    <div class="signature-row">
                        <div class="sig-line">ক্রেতার স্বাক্ষর</div>
                        <div class="sig-line">বিক্রেতার স্বাক্ষর</div>
                    </div>
                </div>
                <script>
                    window.onload = function() { window.print(); setTimeout(function() { window.close(); }, 500); };
                <\/script>
            </body>
            </html>
        `);
        printWindow.document.close();
    }

    // Open Record Details Modal (Dark mode compatible per Image 5)
    function openRecordDetailsModal(index) {
        const item = filteredSalesData[index];
        if (!item) return;

        const cost = parseFloat(item['total_cost']) || 0;
        const selling = parseFloat(item['selling_price']) || 0;
        const paid = parseFloat(item['paid_amount']) || 0;
        const due = parseFloat(item['due_amount']) || 0;
        const returned = parseFloat(item['return_amount']) || 0;

        let paymentStatus = 'পরিশোধ';
        let badgeColor = 'text-success bg-success-subtle border-success-subtle';
        if (due > 0 && paid > 0) {
            paymentStatus = 'আংশিক পরিশোধ';
            badgeColor = 'text-warning bg-warning-subtle border-warning-subtle';
        } else if (due > 0 && paid === 0) {
            paymentStatus = 'সম্পূর্ণ বকেয়া';
            badgeColor = 'text-danger bg-danger-subtle border-danger-subtle';
        }

        let html = `
            <div class="modal-top-amount-box text-center p-3 mb-3">
                <span class="badge ${badgeColor} border px-2.5 py-1 fw-bold mb-1" style="font-size: 12px; border-radius: 6px;">${paymentStatus}</span>
                <h3 class="fw-bold m-0" style="color: #8C56D4; font-size: 22px;">
                    বিক্রয়: ৳ ${formatMoneyBn(selling)}
                </h3>
            </div>

            <div class="d-flex flex-column gap-2">
                <div class="detail-info-item detail-item-info p-2.5 rounded-3 d-flex justify-content-between align-items-center">
                    <span class="detail-info-label small">ইনভয়েস নং</span>
                    <span class="detail-info-val fw-bold font-monospace">#${item.order_no || '-'}</span>
                </div>
                <div class="detail-info-item detail-item-info p-2.5 rounded-3 d-flex justify-content-between align-items-center">
                    <span class="detail-info-label small">তারিখ ও সময়</span>
                    <span class="detail-info-val fw-bold">${item.created_at || item.date || '-'}</span>
                </div>
                <div class="detail-info-item detail-item-info p-2.5 rounded-3 d-flex justify-content-between align-items-center">
                    <span class="detail-info-label small">মোট ক্রয়মূল্য (খরচ)</span>
                    <span class="detail-info-val fw-bold">৳ ${formatMoneyBn(cost)}</span>
                </div>
                <div class="detail-info-item detail-item-info p-2.5 rounded-3 d-flex justify-content-between align-items-center">
                    <span class="detail-info-label small">পরিশোধিত টাকা</span>
                    <span class="detail-info-val fw-bold text-success">৳ ${formatMoneyBn(paid)}</span>
                </div>
                <div class="detail-info-item detail-item-info p-2.5 rounded-3 d-flex justify-content-between align-items-center">
                    <span class="detail-info-label small">বকেয়া টাকা</span>
                    <span class="detail-info-val fw-bold text-danger">৳ ${formatMoneyBn(due)}</span>
                </div>
                ${returned > 0 ? `
                <div class="detail-info-item detail-item-info p-2.5 rounded-3 d-flex justify-content-between align-items-center">
                    <span class="detail-info-label small">পণ্য ফেরত মূল্য</span>
                    <span class="detail-info-val fw-bold text-muted">৳ ${formatMoneyBn(returned)}</span>
                </div>` : ''}
            </div>
        `;

        $("#salesDetailsBody").html(html);
        $("#salesDetailModalPrintBtn").attr("onclick", `printSingleRecord(${index})`);

        const modal = new bootstrap.Modal(document.getElementById('salesDetailsModal'));
        modal.show();
    }

    // Print Full Report Table (Matching Image 2: Multi-page thead, 10px page margin, full dataset)
    function printFullReportTable() {
        const now = getBnDateTimeNow();
        const sVal = $("#startDate").val() || '';
        const eVal = $("#endDate").val() || '';
        const periodText = sVal === eVal ? sVal : (sVal && eVal ? `${sVal} থেকে ${eVal}` : 'সব সময়');
        
        let costAmountTotal = 0;
        let SellingPriceTotal = 0;
        let paidAmountTotal = 0;
        let dueAmountTotal = 0;
        let ReturnAmountTotal = 0;

        let rowsHtml = '';
        if (filteredSalesData.length === 0) {
            rowsHtml = `<tr><td colspan="7" style="text-align: center; padding: 20px; color: #64748b;">কোনো ইনভয়েস রেকর্ড পাওয়া যায়নি</td></tr>`;
        } else {
            filteredSalesData.forEach((item, idx) => {
                const cost = parseFloat(item['total_cost']) || 0;
                const selling = parseFloat(item['selling_price']) || 0;
                const paid = parseFloat(item['paid_amount']) || 0;
                const due = parseFloat(item['due_amount']) || 0;
                const returned = parseFloat(item['return_amount']) || 0;

                costAmountTotal += cost;
                SellingPriceTotal += selling;
                paidAmountTotal += paid;
                dueAmountTotal += due;
                ReturnAmountTotal += returned;

                rowsHtml += `
                    <tr>
                        <td style="text-align: center;">${engToBanglaNum(idx + 1)}</td>
                        <td style="font-family: monospace;">#${item.order_no || '-'}</td>
                        <td style="text-align: right;">৳ ${formatMoneyBn(cost)}</td>
                        <td style="text-align: right; font-weight: 600;">৳ ${formatMoneyBn(selling)}</td>
                        <td style="text-align: right; color: #16a34a; font-weight: 600;">৳ ${formatMoneyBn(paid)}</td>
                        <td style="text-align: right; color: #dc2626; font-weight: 600;">৳ ${formatMoneyBn(due)}</td>
                        <td style="text-align: right; color: #64748b;">৳ ${formatMoneyBn(returned)}</td>
                    </tr>
                `;
            });
        }

        const printWindow = window.open('', '_blank', 'width=1100,height=850');
        if (!printWindow) {
            window.print();
            return;
        }
        printWindow.document.write(`
            <!DOCTYPE html>
            <html lang="bn">
            <head>
                <title>বিক্রয় রিপোর্ট তালিকা - মেসার্স আনিস ষ্টোর</title>
                <meta charset="utf-8">
                <style>
                    @page {
                        size: auto;
                        margin: 10px !important;
                    }
                    * {
                        box-sizing: border-box;
                    }
                    body {
                        font-family: 'Noto Sans Bengali', 'Segoe UI', Arial, sans-serif;
                        padding: 10px;
                        margin: 0;
                        color: #0f172a;
                        background: #ffffff;
                        -webkit-print-color-adjust: exact !important;
                        print-color-adjust: exact !important;
                    }
                    .header-wrap {
                        display: flex;
                        justify-content: space-between;
                        align-items: flex-start;
                        margin-bottom: 8px;
                    }
                    .company-title {
                        font-size: 22px;
                        font-weight: 800;
                        color: #8C56D4;
                        margin: 0 0 2px 0;
                    }
                    .company-sub {
                        font-size: 12px;
                        color: #475569;
                        margin: 0 0 2px 0;
                    }
                    .company-contact {
                        font-size: 11px;
                        color: #64748b;
                        margin: 0;
                    }
                    .report-pill-badge {
                        display: inline-block;
                        border: 2px solid #8C56D4;
                        border-radius: 20px;
                        padding: 4px 18px;
                        color: #8C56D4;
                        font-weight: 700;
                        font-size: 13.5px;
                        text-align: center;
                    }
                    .print-time-meta {
                        font-size: 11px;
                        color: #64748b;
                        margin-top: 5px;
                        text-align: right;
                    }
                    .divider-bar {
                        height: 3px;
                        background: #8C56D4;
                        margin: 8px 0 12px 0;
                    }
                    .summary-box {
                        background: #f8fafc;
                        border: 1.5px solid #e2e8f0;
                        border-radius: 8px;
                        padding: 8px 14px;
                        margin-bottom: 12px;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        font-size: 12px;
                    }
                    .summary-box-left {
                        line-height: 1.6;
                    }
                    .summary-box-right {
                        text-align: right;
                        line-height: 1.6;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 12px;
                    }
                    thead {
                        display: table-header-group !important;
                    }
                    tfoot {
                        display: table-footer-group !important;
                    }
                    tr {
                        page-break-inside: avoid !important;
                    }
                    th {
                        background-color: #f1f5f9 !important;
                        color: #1e293b;
                        border: 1px solid #cbd5e1;
                        padding: 6px 8px;
                        font-size: 11.5px;
                        font-weight: 700;
                    }
                    td {
                        border: 1px solid #e2e8f0;
                        padding: 5px 8px;
                        font-size: 11.5px;
                        vertical-align: middle;
                    }
                    tfoot td {
                        background-color: #f8fafc !important;
                        border: 1px solid #cbd5e1;
                        font-weight: bold;
                        padding: 6px 8px;
                        font-size: 12px;
                    }
                    .footer-note {
                        display: flex;
                        justify-content: space-between;
                        border-top: 1px dashed #cbd5e1;
                        padding-top: 6px;
                        margin-top: 10px;
                        font-size: 10.5px;
                        color: #64748b;
                    }
                </style>
            </head>
            <body>
                <div class="header-wrap">
                    <div>
                        <h2 class="company-title">মেসার্স আনিস ষ্টোর</h2>
                        <p class="company-sub">দোকান নং: ১৮, লেভেল: ২, মেঘনা হাইটস, পাবনা</p>
                        <p class="company-contact">মোবাইল: ০১৭৭১-২৬৯২১১, ০১৬১২-৭৪৮২০৪ | ইমেইল: exchangeworld0@gmail.com</p>
                    </div>
                    <div>
                        <div class="report-pill-badge">বিক্রয় রিপোর্ট তালিকা</div>
                        <div class="print-time-meta">তারিখ: ${now.date} | সময়: ${now.time}</div>
                    </div>
                </div>

                <div class="divider-bar"></div>

                <div class="summary-box">
                    <div class="summary-box-left">
                        <div><strong>সময়কাল:</strong> ${periodText}</div>
                        <div><strong>মোট ইনভয়েস সংখ্যা:</strong> ${engToBanglaNum(filteredSalesData.length)} টি</div>
                    </div>
                    <div class="summary-box-right">
                        <div><strong>মোট বিক্রয় মূল্য:</strong> <span style="color:#8C56D4; font-weight:700;">৳ ${formatMoneyBn(SellingPriceTotal)}</span> | <strong>মোট ক্রয় খরচ:</strong> ৳ ${formatMoneyBn(costAmountTotal)}</div>
                        <div><strong>পরিশোধিত:</strong> <span style="color:#16a34a; font-weight:700;">৳ ${formatMoneyBn(paidAmountTotal)}</span> | <strong>বকেয়া:</strong> <span style="color:#dc2626; font-weight:700;">৳ ${formatMoneyBn(dueAmountTotal)}</span></div>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 45px; text-align: center;">ক্রমিক</th>
                            <th style="width: 140px; text-align: left;">ইনভয়েস নং</th>
                            <th style="width: 130px; text-align: right;">ক্রয় খরচ</th>
                            <th style="width: 140px; text-align: right;">বিক্রয় মূল্য</th>
                            <th style="width: 130px; text-align: right;">পরিশোধিত</th>
                            <th style="width: 130px; text-align: right;">বকেয়া</th>
                            <th style="width: 120px; text-align: right;">পণ্য ফেরত</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${rowsHtml}
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" style="text-align: right; padding-right: 12px; font-weight: bold;">সর্বমোট:</td>
                            <td style="text-align: right; font-weight: bold;">৳ ${formatMoneyBn(costAmountTotal)}</td>
                            <td style="text-align: right; color: #8C56D4; font-weight: bold;">৳ ${formatMoneyBn(SellingPriceTotal)}</td>
                            <td style="text-align: right; color: #16a34a; font-weight: bold;">৳ ${formatMoneyBn(paidAmountTotal)}</td>
                            <td style="text-align: right; color: #dc2626; font-weight: bold;">৳ ${formatMoneyBn(dueAmountTotal)}</td>
                            <td style="text-align: right; font-weight: bold;">৳ ${formatMoneyBn(ReturnAmountTotal)}</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="footer-note">
                    <span>মুদ্রিত রিপোর্ট: মেসার্স আনিস ষ্টোর</span>
                    <span>Software By: CodeNext IT (www.codenextit.com)</span>
                </div>

                <script>
                    window.onload = function() {
                        window.print();
                        setTimeout(function() { window.close(); }, 600);
                    };
                <\/script>
            </body>
            </html>
        `);
        printWindow.document.close();
    }
</script>

@endsection
