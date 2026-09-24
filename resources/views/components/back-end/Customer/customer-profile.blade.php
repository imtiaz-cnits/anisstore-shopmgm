@extends('layouts.dashboard-sidenav')
@section('title', 'কাস্টমার প্রোফাইল')
@section('content')

<style>
    /* Brand Colors & Variables */
    :root {
        --cp-primary: #8C56D4;
        --cp-primary-hover: #793FC5;
        --cp-bg-light: #FAF7FD;
        --cp-border-light: #E5D5F7;
    }

    /* Page Content 10px Padding */
    .main-content .page-content,
    .page-content {
        padding: 10px !important;
    }

    /* Customer Profile Header Card */
    .customer-profile-header-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        overflow: hidden;
    }

    .customer-profile-avatar {
        width: 78px;
        height: 78px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #8C56D4;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.22);
    }

    /* Customer Net Due Box - 10px Padding */
    .customer-net-due-box {
        background: #FAF7FD;
        border: 1.5px solid #E5D5F7;
        border-radius: 12px;
        padding: 10px !important;
        transition: all 0.2s ease;
    }

    /* Metric Cards Grid: Desktop & Tab (>=768px) = 5 in 1 row, Mobile (<768px) = 2 per row with 5th card full width */
    .metric-cards-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 8px;
    }
    @media (max-width: 767.98px) {
        .metric-cards-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .metric-cards-grid > .card:nth-child(5),
        .metric-cards-grid > .card:last-child {
            grid-column: 1 / -1;
        }
    }

    .metric-card-box {
        border-radius: 10px !important;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 8px 10px !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .metric-card-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(140, 86, 212, 0.08) !important;
    }
    .metric-card-box p {
        font-size: 10.5px !important;
    }
    .metric-card-box h3 {
        font-size: 1.05rem !important;
    }
    .metric-card-box small {
        font-size: 9.5px !important;
    }

    /* Smart Pill Navigation for Tabs */
    .customer-profile-tabs {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        gap: 8px;
        padding-bottom: 2px;
        border-bottom: none !important;
    }
    .customer-profile-tabs::-webkit-scrollbar {
        display: none;
    }
    .customer-profile-tabs .nav-link {
        white-space: nowrap;
        border-radius: 10px !important;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid #E5D5F7 !important;
        background: #FAF7FD;
        color: #532391 !important;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .customer-profile-tabs .nav-link:hover {
        background: #F3ECFB;
        color: #8C56D4 !important;
        border-color: #8C56D4 !important;
    }
    .customer-profile-tabs .nav-link.active {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border-color: #793FC5 !important;
        box-shadow: 0 3px 10px rgba(140, 86, 212, 0.28);
        font-weight: 700;
    }

    /* Master Print Button */
    #masterPrintBtn {
        color: #8C56D4 !important;
        border: 1.5px solid #8C56D4 !important;
        background: transparent !important;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
    }
    #masterPrintBtn:hover,
    #masterPrintBtn:active,
    #masterPrintBtn:focus {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border-color: #793FC5 !important;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25) !important;
    }

    /* Desktop Table Styles */
    .customer-profile-table thead tr th {
        background: #f8fafc;
        color: #475569;
        font-weight: 700;
        font-size: 13px;
        border-bottom: 2px solid #e2e8f0;
        padding: 10px 12px;
        white-space: nowrap;
    }
    .customer-profile-table tbody tr td {
        padding: 10px 12px;
        font-size: 13px;
        border-color: #e2e8f0;
    }
    .customer-profile-table tbody tr:hover td {
        background-color: #FAF7FD !important;
    }

    /* Mobile & Tablet Card Layout (Tab = 2 per row, Mobile = 1 per row) */
    .profile-card-list-wrap {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 8px !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
        align-items: flex-start !important;
    }
    .profile-card-list-wrap > .col-12 {
        width: 100% !important;
        max-width: 100% !important;
        flex: 0 0 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    @media (min-width: 768px) and (max-width: 991.98px) {
        .profile-card-list-wrap > .col-md-6 {
            width: calc(50% - 4px) !important;
            max-width: calc(50% - 4px) !important;
            flex: 0 0 calc(50% - 4px) !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    }
    .invoice-mobile-card {
        border: 1.5px solid #E5D5F7 !important;
        border-radius: 12px !important;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.06) !important;
        background-color: #ffffff;
        padding: 12px !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }
    .invoice-mobile-card:hover {
        box-shadow: 0 4px 14px rgba(140, 86, 212, 0.12) !important;
        border-color: #d1b7f3 !important;
    }
    .mobile-card-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 6px;
    }
    .mobile-action-btn {
        flex: 1 1 0;
        height: 32px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        border: 1px solid transparent;
        text-decoration: none;
    }
    .mobile-action-btn.action-btn-view {
        background: #F3ECFB;
        color: #8C56D4;
        border-color: #E5D5F7;
    }
    .mobile-action-btn.action-btn-view:hover {
        background: #8C56D4;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-print {
        background: #FAF7FD;
        color: #532391;
        border-color: #E5D5F7;
    }
    .mobile-action-btn.action-btn-print:hover {
        background: #8C56D4;
        color: #ffffff;
    }

    /* Mobile Responsive Header */
    @media (max-width: 767.98px) {
        .customer-profile-avatar {
            width: 65px;
            height: 65px;
        }
        .customer-net-due-box {
            width: 100%;
            max-width: 100% !important;
            margin-top: 10px;
        }
        .customer-profile-tabs {
            gap: 6px;
        }
        .customer-profile-tabs .nav-link {
            border-radius: 8px !important;
            padding: 7px 12px !important;
            font-size: 12px !important;
        }
    }

    /* Modal Responsive & Slide-up Design - Full Bottom Sheet on ALL screens */
    #collectCustomerDueModal.modal {
        padding: 0 !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100% !important;
        height: 100% !important;
        height: 100dvh !important;
        display: none;
        overflow: hidden !important;
        background: rgba(15, 23, 42, 0.75) !important;
        backdrop-filter: blur(8px) !important;
        -webkit-backdrop-filter: blur(8px) !important;
        z-index: 107000 !important;
    }

    #collectCustomerDueModal.modal.show {
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-end !important;
        align-items: center !important;
    }

    #collectCustomerDueModal .modal-dialog {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        position: fixed !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        top: auto !important;
        min-height: auto !important;
        height: auto !important;
        transform: none !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: flex-end !important;
    }

    #collectCustomerDueModal .modal-content {
        border-radius: 0 !important;
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
        width: 100% !important;
        max-width: 100% !important;
        max-height: 90vh !important;
        max-height: 90dvh !important;
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
        margin: 0 !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.35) !important;
        animation: slideUpCustomerDueModalProf 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    @keyframes slideUpCustomerDueModalProf {
        from { transform: translateY(100%); }
        to { transform: translateY(0); }
    }

    #collectCustomerDueModal .modal-body {
        flex: 1 1 auto !important;
        max-height: calc(90vh - 130px) !important;
        max-height: calc(90dvh - 130px) !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
        padding: 14px 16px !important;
    }

    #collectCustomerDueModal .modal-sticky-footer {
        flex: 0 0 auto !important;
        position: sticky !important;
        bottom: 0 !important;
        width: 100% !important;
        z-index: 100 !important;
        padding: 10px 16px !important;
        box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05) !important;
        background: #ffffff;
        border-top: 1px solid #e2e8f0;
    }

    .modal-sticky-header {
        position: sticky;
        top: 0;
        z-index: 10;
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff;
        padding: 14px 18px;
    }

    /* Standard Form Inputs inside Modal */
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
    .invoice-search-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.2) !important;
        outline: none !important;
    }

    .invoice-search-submit-btn {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border: none !important;
        height: 44px !important;
        border-radius: 10px !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        letter-spacing: 0.3px;
        transition: all 0.2s ease-in-out !important;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.25) !important;
        cursor: pointer !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .invoice-search-submit-btn:hover {
        background: linear-gradient(135deg, #793FC5 0%, #672EB0 100%) !important;
        box-shadow: 0 4px 14px rgba(140, 86, 212, 0.4) !important;
        transform: translateY(-1px);
        color: #ffffff !important;
    }

    .btn-close-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border-radius: 50% !important;
        width: 30px !important;
        height: 30px !important;
        border: none !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
        cursor: pointer !important;
        padding: 0 !important;
    }
    .btn-cancel-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border: none !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    .btn-cancel-red:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
    }

    .cl-payment-chip {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 8px;
        border: 1.5px solid #cbd5e1;
        background: #ffffff;
        color: #475569;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        user-select: none;
    }
    .cl-payment-chip:hover {
        border-color: #8C56D4;
        background: #FAF7FD;
        color: #8C56D4;
    }
    .cl-payment-chip.active {
        border-color: #8C56D4 !important;
        background: #8C56D4 !important;
        color: #ffffff !important;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.25);
    }

    .modal-dues-summary-card {
        background-color: #FAF7FD;
        border: 1.5px solid #E5D5F7;
    }
    .modal-calc-status-box {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
    }

    /* Dark Mode Overrides for Modal */
    [data-bs-theme="dark"] #collectCustomerDueModal .modal-sticky-footer,
    body[light-mode="dark"] #collectCustomerDueModal .modal-sticky-footer,
    body.dark-mode #collectCustomerDueModal .modal-sticky-footer {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    [data-bs-theme="dark"] #collectCustomerDueModal .modal-dues-summary-card,
    body[light-mode="dark"] #collectCustomerDueModal .modal-dues-summary-card,
    body.dark-mode #collectCustomerDueModal .modal-dues-summary-card {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    [data-bs-theme="dark"] #collectCustomerDueModal .modal-calc-status-box,
    body[light-mode="dark"] #collectCustomerDueModal .modal-calc-status-box,
    body.dark-mode #collectCustomerDueModal .modal-calc-status-box {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    [data-bs-theme="dark"] .cl-payment-chip,
    body[light-mode="dark"] .cl-payment-chip,
    body.dark-mode .cl-payment-chip {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }
    [data-bs-theme="dark"] .cl-payment-chip.active,
    body[light-mode="dark"] .cl-payment-chip.active,
    body.dark-mode .cl-payment-chip.active {
        background-color: #8C56D4 !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
    }

    [data-bs-theme="dark"] .invoice-search-input,
    body[light-mode="dark"] .invoice-search-input,
    body.dark-mode .invoice-search-input {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    /* Complete Dark Mode Styling for Customer Profile */
    body[light-mode="dark"] .customer-profile-header-card,
    body[data-layout-mode="dark"] .customer-profile-header-card,
    body.dark-mode .customer-profile-header-card,
    [data-bs-theme="dark"] .customer-profile-header-card {
        background: #1e293b !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .customer-net-due-box,
    body[data-layout-mode="dark"] .customer-net-due-box,
    body.dark-mode .customer-net-due-box,
    [data-bs-theme="dark"] .customer-net-due-box {
        background: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .metric-card-box,
    body[data-layout-mode="dark"] .metric-card-box,
    body.dark-mode .metric-card-box,
    [data-bs-theme="dark"] .metric-card-box {
        background: #1e293b !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .customer-profile-tabs .nav-link,
    body[data-layout-mode="dark"] .customer-profile-tabs .nav-link,
    body.dark-mode .customer-profile-tabs .nav-link,
    [data-bs-theme="dark"] .customer-profile-tabs .nav-link {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .customer-profile-tabs .nav-link.active,
    body[data-layout-mode="dark"] .customer-profile-tabs .nav-link.active,
    body.dark-mode .customer-profile-tabs .nav-link.active,
    [data-bs-theme="dark"] .customer-profile-tabs .nav-link.active {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border-color: #8C56D4 !important;
    }

    body[light-mode="dark"] .card-header,
    body[data-layout-mode="dark"] .card-header,
    body.dark-mode .card-header,
    [data-bs-theme="dark"] .card-header {
        background: transparent !important;
        border-color: transparent !important;
    }

    body[light-mode="dark"] .customer-profile-table,
    body[data-layout-mode="dark"] .customer-profile-table,
    body.dark-mode .customer-profile-table,
    [data-bs-theme="dark"] .customer-profile-table {
        border-color: #334155 !important;
        color: #e2e8f0 !important;
    }

    body[light-mode="dark"] .customer-profile-table thead tr th,
    body[data-layout-mode="dark"] .customer-profile-table thead tr th,
    body.dark-mode .customer-profile-table thead tr th,
    [data-bs-theme="dark"] .customer-profile-table thead tr th {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .customer-profile-table tbody tr td,
    body[data-layout-mode="dark"] .customer-profile-table tbody tr td,
    body.dark-mode .customer-profile-table tbody tr td,
    [data-bs-theme="dark"] .customer-profile-table tbody tr td {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #e2e8f0 !important;
    }

    body[light-mode="dark"] .customer-profile-table tbody tr:hover td,
    body[data-layout-mode="dark"] .customer-profile-table tbody tr:hover td,
    body.dark-mode .customer-profile-table tbody tr:hover td,
    [data-bs-theme="dark"] .customer-profile-table tbody tr:hover td {
        background: #273549 !important;
    }

    body[light-mode="dark"] .customer-profile-table tfoot,
    body[data-layout-mode="dark"] .customer-profile-table tfoot,
    body.dark-mode .customer-profile-table tfoot,
    [data-bs-theme="dark"] .customer-profile-table tfoot,
    body[light-mode="dark"] .customer-profile-table tfoot td,
    body[data-layout-mode="dark"] .customer-profile-table tfoot td,
    body.dark-mode .customer-profile-table tfoot td,
    [data-bs-theme="dark"] .customer-profile-table tfoot td {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }

    body[light-mode="dark"] .invoice-mobile-card,
    body[data-layout-mode="dark"] .invoice-mobile-card,
    body.dark-mode .invoice-mobile-card,
    [data-bs-theme="dark"] .invoice-mobile-card {
        background-color: #1e293b !important;
        border: 1.5px solid #334155 !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25) !important;
    }

    body[light-mode="dark"] .invoice-mobile-card .text-dark,
    body[data-layout-mode="dark"] .invoice-mobile-card .text-dark,
    body.dark-mode .invoice-mobile-card .text-dark,
    [data-bs-theme="dark"] .invoice-mobile-card .text-dark {
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .invoice-mobile-card .text-muted,
    body[data-layout-mode="dark"] .invoice-mobile-card .text-muted,
    body.dark-mode .invoice-mobile-card .text-muted,
    [data-bs-theme="dark"] .invoice-mobile-card .text-muted {
        color: #94a3b8 !important;
    }

    body[light-mode="dark"] .invoice-mobile-card .border-bottom,
    body[data-layout-mode="dark"] .invoice-mobile-card .border-bottom,
    body.dark-mode .invoice-mobile-card .border-bottom,
    [data-bs-theme="dark"] .invoice-mobile-card .border-bottom,
    body[light-mode="dark"] .invoice-mobile-card .border-top,
    body[data-layout-mode="dark"] .invoice-mobile-card .border-top,
    body.dark-mode .invoice-mobile-card .border-top,
    [data-bs-theme="dark"] .invoice-mobile-card .border-top {
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .invoice-mobile-card .bg-light,
    body[data-layout-mode="dark"] .invoice-mobile-card .bg-light,
    body.dark-mode .invoice-mobile-card .bg-light,
    [data-bs-theme="dark"] .invoice-mobile-card .bg-light {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .mobile-action-btn.action-btn-view,
    body[data-layout-mode="dark"] .mobile-action-btn.action-btn-view,
    body.dark-mode .mobile-action-btn.action-btn-view,
    [data-bs-theme="dark"] .mobile-action-btn.action-btn-view {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #a78bfa !important;
    }

    body[light-mode="dark"] .mobile-action-btn.action-btn-view:hover,
    body[data-layout-mode="dark"] .mobile-action-btn.action-btn-view:hover,
    body.dark-mode .mobile-action-btn.action-btn-view:hover,
    [data-bs-theme="dark"] .mobile-action-btn.action-btn-view:hover {
        background: #8C56D4 !important;
        color: #ffffff !important;
    }

    body[light-mode="dark"] .mobile-action-btn.action-btn-print,
    body[data-layout-mode="dark"] .mobile-action-btn.action-btn-print,
    body.dark-mode .mobile-action-btn.action-btn-print,
    [data-bs-theme="dark"] .mobile-action-btn.action-btn-print {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .mobile-action-btn.action-btn-print:hover,
    body[data-layout-mode="dark"] .mobile-action-btn.action-btn-print:hover,
    body.dark-mode .mobile-action-btn.action-btn-print:hover,
    [data-bs-theme="dark"] .mobile-action-btn.action-btn-print:hover {
        background: #8C56D4 !important;
        color: #ffffff !important;
    }

    body[light-mode="dark"] .profile-card-list-wrap .bg-white,
    body[data-layout-mode="dark"] .profile-card-list-wrap .bg-white,
    body.dark-mode .profile-card-list-wrap .bg-white,
    [data-bs-theme="dark"] .profile-card-list-wrap .bg-white {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #94a3b8 !important;
    }

    /* Table Dark Mode Border Harmonization - Never White */
    body[light-mode="dark"] table,
    body[data-layout-mode="dark"] table,
    body.dark-mode table,
    html[light-mode="dark"] table,
    [data-bs-theme="dark"] table,
    body[light-mode="dark"] .table,
    body[data-layout-mode="dark"] .table,
    body.dark-mode .table,
    html[light-mode="dark"] .table,
    [data-bs-theme="dark"] .table,
    body[light-mode="dark"] .table-bordered,
    body[data-layout-mode="dark"] .table-bordered,
    body.dark-mode .table-bordered,
    html[light-mode="dark"] .table-bordered,
    [data-bs-theme="dark"] .table-bordered {
        --bs-table-bg: transparent !important;
        --bs-table-color: #f1f5f9 !important;
        --bs-table-border-color: #334155 !important;
        border-color: #334155 !important;
        color: #f1f5f9 !important;
    }
    body[light-mode="dark"] .table > :not(caption) > * > *,
    body[data-layout-mode="dark"] .table > :not(caption) > * > *,
    body.dark-mode .table > :not(caption) > * > *,
    html[light-mode="dark"] .table > :not(caption) > * > *,
    [data-bs-theme="dark"] .table > :not(caption) > * > *,
    body[light-mode="dark"] .table-bordered > :not(caption) > * > *,
    body[data-layout-mode="dark"] .table-bordered > :not(caption) > * > *,
    body.dark-mode .table-bordered > :not(caption) > * > *,
    html[light-mode="dark"] .table-bordered > :not(caption) > * > *,
    [data-bs-theme="dark"] .table-bordered > :not(caption) > * > *,
    body[light-mode="dark"] table th,
    body[light-mode="dark"] table td,
    body[data-layout-mode="dark"] table th,
    body[data-layout-mode="dark"] table td,
    body.dark-mode table th,
    body.dark-mode table td,
    html[light-mode="dark"] table th,
    html[light-mode="dark"] table td,
    [data-bs-theme="dark"] table th,
    [data-bs-theme="dark"] table td {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] table thead th,
    body[data-layout-mode="dark"] table thead th,
    body.dark-mode table thead th,
    html[light-mode="dark"] table thead th,
    [data-bs-theme="dark"] table thead th {
        background-color: #0f172a !important;
        color: #cbd5e1 !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] table tbody td,
    body[data-layout-mode="dark"] table tbody td,
    body.dark-mode table tbody td,
    html[light-mode="dark"] table tbody td,
    [data-bs-theme="dark"] table tbody td {
        background-color: #1e293b !important;
        color: #f1f5f9 !important;
        border-color: #334155 !important;
    }

    /* In-Tab Direct Printing Styles */
    @media screen {
        #customerPrintContainer {
            display: none !important;
        }
    }
    @media print {
        @page {
            size: auto;
            margin: 10px;
        }
        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        html, body {
            background: #ffffff !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        body > *:not(#customerPrintContainer) {
            display: none !important;
        }
        #customerPrintContainer {
            display: block !important;
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 10px !important;
            background: #ffffff !important;
            color: #1e293b !important;
            font-size: 11.5px !important;
            z-index: 99999999 !important;
        }
        #customerPrintContainer .store-brand-header {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            border-bottom: 2px solid #8C56D4 !important;
            padding-bottom: 8px !important;
            margin-bottom: 10px !important;
        }
        #customerPrintContainer .store-logo-box {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
        }
        #customerPrintContainer .store-logo-img {
            max-height: 48px !important;
            max-width: 140px !important;
            object-fit: contain !important;
        }
        #customerPrintContainer .store-title-text h1 {
            font-size: 20px !important;
            font-weight: 800 !important;
            color: #8C56D4 !important;
            margin: 0 0 2px 0 !important;
            text-transform: uppercase !important;
        }
        #customerPrintContainer .store-title-text p {
            margin: 0 !important;
            font-size: 11px !important;
            color: #64748b !important;
            line-height: 1.35 !important;
        }
        #customerPrintContainer .report-title-pill {
            text-align: right !important;
        }
        #customerPrintContainer .report-badge {
            display: inline-block !important;
            background: #FAF7FD !important;
            border: 1.5px solid #8C56D4 !important;
            color: #8C56D4 !important;
            padding: 4px 14px !important;
            border-radius: 20px !important;
            font-weight: 700 !important;
            font-size: 13px !important;
        }
        #customerPrintContainer .print-meta-time {
            font-size: 10px !important;
            color: #64748b !important;
            margin-top: 4px !important;
        }
        #customerPrintContainer .customer-info-grid {
            display: flex !important;
            justify-content: space-between !important;
            gap: 12px !important;
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px !important;
            padding: 9px 12px !important;
            margin-bottom: 10px !important;
            font-size: 11.5px !important;
        }
        #customerPrintContainer .customer-info-col {
            flex: 1 !important;
        }
        #customerPrintContainer .customer-info-col h3 {
            font-size: 12.5px !important;
            font-weight: 700 !important;
            color: #8C56D4 !important;
            margin: 0 0 4px 0 !important;
        }
        #customerPrintContainer .customer-info-col p {
            margin: 0 0 2px 0 !important;
            color: #334155 !important;
        }
        #customerPrintContainer .customer-info-col strong {
            color: #0f172a !important;
        }
        #customerPrintContainer .customer-stats-col {
            text-align: right !important;
        }
        #customerPrintContainer .customer-due-highlight {
            font-size: 13px !important;
            font-weight: 800 !important;
            color: #dc2626 !important;
        }
        #customerPrintContainer .print-data-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 6px !important;
            font-size: 11px !important;
            page-break-after: auto !important;
        }
        #customerPrintContainer .print-data-table thead {
            display: table-header-group !important;
        }
        #customerPrintContainer .print-data-table tr {
            page-break-inside: avoid !important;
            page-break-after: auto !important;
        }
        #customerPrintContainer .print-data-table th, 
        #customerPrintContainer .print-data-table td {
            border: 1px solid #cbd5e1 !important;
            padding: 5px 7px !important;
            vertical-align: middle !important;
        }
        #customerPrintContainer .print-data-table th {
            background-color: #f1f5f9 !important;
            color: #1e293b !important;
            font-weight: 700 !important;
            text-align: center !important;
            white-space: nowrap !important;
        }
        #customerPrintContainer .text-center { text-align: center !important; }
        #customerPrintContainer .text-end { text-align: right !important; }
        #customerPrintContainer .text-start { text-align: left !important; }
        #customerPrintContainer .fw-bold { font-weight: 700 !important; }
        #customerPrintContainer .print-footer {
            margin-top: 14px !important;
            padding-top: 6px !important;
            border-top: 1px dashed #cbd5e1 !important;
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            font-size: 9.5px !important;
            color: #64748b !important;
        }
    }

    /* Dark Mode Universal Border & Color Harmonization */
    body[light-mode="dark"] .border,
    html[light-mode="dark"] .border,
    body[data-layout-mode="dark"] .border,
    html[data-layout-mode="dark"] .border,
    body.dark-mode .border,
    html.dark-mode .border,
    body.dark .border,
    html.dark .border,
    [data-bs-theme="dark"] .border,
    [data-theme="dark"] .border,
    body[light-mode="dark"] .border-bottom,
    html[light-mode="dark"] .border-bottom,
    body[data-layout-mode="dark"] .border-bottom,
    html[data-layout-mode="dark"] .border-bottom,
    body.dark-mode .border-bottom,
    html.dark-mode .border-bottom,
    body.dark .border-bottom,
    html.dark .border-bottom,
    [data-bs-theme="dark"] .border-bottom,
    [data-theme="dark"] .border-bottom,
    body[light-mode="dark"] .border-top,
    html[light-mode="dark"] .border-top,
    body[data-layout-mode="dark"] .border-top,
    html[data-layout-mode="dark"] .border-top,
    body.dark-mode .border-top,
    html.dark-mode .border-top,
    body.dark .border-top,
    html.dark .border-top,
    [data-bs-theme="dark"] .border-top,
    [data-theme="dark"] .border-top,
    body[light-mode="dark"] .border-start,
    html[light-mode="dark"] .border-start,
    body[data-layout-mode="dark"] .border-start,
    html[data-layout-mode="dark"] .border-start,
    body.dark-mode .border-start,
    html.dark-mode .border-start,
    [data-bs-theme="dark"] .border-start,
    [data-theme="dark"] .border-start,
    body[light-mode="dark"] .border-end,
    html[light-mode="dark"] .border-end,
    body[data-layout-mode="dark"] .border-end,
    html[data-layout-mode="dark"] .border-end,
    body.dark-mode .border-end,
    html.dark-mode .border-end,
    [data-bs-theme="dark"] .border-end,
    [data-theme="dark"] .border-end,
    body[light-mode="dark"] .customer-profile-header-card,
    body[data-layout-mode="dark"] .customer-profile-header-card,
    body.dark-mode .customer-profile-header-card,
    [data-bs-theme="dark"] .customer-profile-header-card,
    html[light-mode="dark"] .customer-profile-header-card,
    body[light-mode="dark"] .customer-net-due-box,
    body[data-layout-mode="dark"] .customer-net-due-box,
    body.dark-mode .customer-net-due-box,
    [data-bs-theme="dark"] .customer-net-due-box,
    html[light-mode="dark"] .customer-net-due-box {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .customer-profile-header-card h4,
    body[data-layout-mode="dark"] .customer-profile-header-card h4,
    body.dark-mode .customer-profile-header-card h4,
    [data-bs-theme="dark"] .customer-profile-header-card h4,
    body[light-mode="dark"] .customer-profile-header-card .text-dark,
    body[data-layout-mode="dark"] .customer-profile-header-card .text-dark,
    body.dark-mode .customer-profile-header-card .text-dark,
    [data-bs-theme="dark"] .customer-profile-header-card .text-dark {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .nav-tabs-custom .nav-link:not(.active),
    body[data-layout-mode="dark"] .nav-tabs-custom .nav-link:not(.active),
    body.dark-mode .nav-tabs-custom .nav-link:not(.active),
    [data-bs-theme="dark"] .nav-tabs-custom .nav-link:not(.active) {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] #collectCustomerDueModal .modal-content,
    body[data-layout-mode="dark"] #collectCustomerDueModal .modal-content,
    body.dark-mode #collectCustomerDueModal .modal-content,
    [data-bs-theme="dark"] #collectCustomerDueModal .modal-content,
    body[light-mode="dark"] #collectCustomerDueModal .modal-body,
    body[data-layout-mode="dark"] #collectCustomerDueModal .modal-body,
    body.dark-mode #collectCustomerDueModal .modal-body,
    [data-bs-theme="dark"] #collectCustomerDueModal .modal-body {
        background-color: #1e293b !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #collectCustomerDueModal .modal-dues-summary-card,
    body[data-layout-mode="dark"] #collectCustomerDueModal .modal-dues-summary-card,
    body.dark-mode #collectCustomerDueModal .modal-dues-summary-card,
    [data-bs-theme="dark"] #collectCustomerDueModal .modal-dues-summary-card,
    body[light-mode="dark"] #collectCustomerDueModal .modal-calc-status-box,
    body[data-layout-mode="dark"] #collectCustomerDueModal .modal-calc-status-box,
    body.dark-mode #collectCustomerDueModal .modal-calc-status-box,
    [data-bs-theme="dark"] #collectCustomerDueModal .modal-calc-status-box {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] #collectCustomerDueModal .invoice-search-input,
    body[data-layout-mode="dark"] #collectCustomerDueModal .invoice-search-input,
    body.dark-mode #collectCustomerDueModal .invoice-search-input,
    [data-bs-theme="dark"] #collectCustomerDueModal .invoice-search-input {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #collectCustomerDueModal .cl-payment-chip,
    body[data-layout-mode="dark"] #collectCustomerDueModal .cl-payment-chip,
    body.dark-mode #collectCustomerDueModal .cl-payment-chip,
    [data-bs-theme="dark"] #collectCustomerDueModal .cl-payment-chip {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }
    body[light-mode="dark"] #collectCustomerDueModal .cl-payment-chip.active,
    body[data-layout-mode="dark"] #collectCustomerDueModal .cl-payment-chip.active,
    body.dark-mode #collectCustomerDueModal .cl-payment-chip.active,
    [data-bs-theme="dark"] #collectCustomerDueModal .cl-payment-chip.active {
        background: #8C56D4 !important;
        border-color: #8C56D4 !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .metric-card-box,
    body[data-layout-mode="dark"] .metric-card-box,
    body.dark-mode .metric-card-box,
    [data-bs-theme="dark"] .metric-card-box,
    body[light-mode="dark"] .invoice-mobile-card,
    body[data-layout-mode="dark"] .invoice-mobile-card,
    body.dark-mode .invoice-mobile-card,
    [data-bs-theme="dark"] .invoice-mobile-card,
    body[light-mode="dark"] .modal-sticky-footer,
    body[data-layout-mode="dark"] .modal-sticky-footer,
    body.dark-mode .modal-sticky-footer,
    [data-bs-theme="dark"] .modal-sticky-footer,
    body[light-mode="dark"] .badge.bg-light,
    body[data-layout-mode="dark"] .badge.bg-light,
    body.dark-mode .badge.bg-light,
    [data-bs-theme="dark"] .badge.bg-light,
    body[light-mode="dark"] .mobile-action-btn,
    body[data-layout-mode="dark"] .mobile-action-btn,
    body.dark-mode .mobile-action-btn,
    [data-bs-theme="dark"] .mobile-action-btn {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .modal-sticky-footer,
    body[data-layout-mode="dark"] .modal-sticky-footer,
    body.dark-mode .modal-sticky-footer,
    [data-bs-theme="dark"] .modal-sticky-footer {
        background: #1e293b !important;
    }
</style>

<div class="main-content">
    <div class="page-content" style="padding: 10px !important;">
        <!-- Breadcrumb Header -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
            <div class="customer-header-title-box">
                <h1 class="h5 mb-0 text-dark fw-bold" style="border-left: 4px solid #8C56D4; padding-left: 10px;">
                    <span>কাস্টমার প্রোফাইল</span>
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="/admin-dashboard-customer" class="btn text-white btn-sm rounded-pill px-3 py-1.5 fw-bold shadow-xs d-inline-flex align-items-center gap-2" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; font-size: 12.5px;">
                    <i class="fa-solid fa-arrow-left"></i> <span>ফিরে যান</span>
                </a>
            </div>
        </div>

        <div class="container-fluid px-0">
            <!-- Customer Information Banner Card -->
            <div class="customer-profile-header-card mb-3">
                <div style="height: 4px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;"></div>
                <div class="p-3">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                        <!-- Left: Profile Details -->
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <div class="flex-shrink-0">
                                <img id="customerImg" src="{{ asset('back-end/assets/img/demo-img.jpeg') }}" 
                                     alt="Customer Image" 
                                     class="customer-profile-avatar">
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                    <h2 id="customerName" class="h5 fw-extrabold mb-0 text-dark">লোড হচ্ছে...</h2>
                                    <span id="customerIdBadge" class="badge bg-light fw-bold px-2 py-1" style="font-size: 12px; color: #8C56D4; border: 1px solid #E5D5F7;">CUST-0000</span>
                                    <span id="customerStatusBadge" class="badge px-2 py-1 text-white" style="background: #8C56D4; font-size: 11.5px;">সক্রিয়</span>
                                </div>
                                <div class="d-flex flex-wrap gap-1.5 text-muted" style="font-size: 12px;">
                                    <span id="customerMobile" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-phone me-1" style="color: #8C56D4;"></i>N/A</span>
                                    <span id="customerEmail" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-envelope me-1 text-primary"></i>N/A</span>
                                    <span id="customerAddress" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-location-dot me-1 text-danger"></i>N/A</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Net Due Box (10px padding) -->
                        <div class="customer-net-due-box flex-shrink-0" style="min-width: 260px; max-width: 320px;">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="text-muted small text-uppercase fw-bold" style="font-size: 11px;">মোট পাওনা (NET DUE)</span>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-0.5 fw-bold" style="font-size: 10px;">বকেয়া ব্যালেন্স</span>
                            </div>
                            <h3 id="customerNetDue" class="h4 fw-extrabold text-danger mb-1" style="font-size: 1.25rem;">৳ ০০.০০</h3>
                            <small class="text-muted d-block mb-2" style="font-size: 10.5px;">কাস্টমারের নিকট সর্বমোট পাওনা বকেয়া</small>
                            <button class="btn fw-bold w-100 rounded-pill shadow-xs text-white d-inline-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#collectCustomerDueModal" onclick="setTimeout(function(){ document.getElementById('modalPaidAmount')?.focus(); }, 150);" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; font-size: 13px; padding: 8px 16px !important;">
                                <i class="fa-solid fa-hand-holding-dollar"></i> <span>বকেয়া আদায় করুন</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5 Metric Cards in 1 Row on Desktop & Tab, 2 per row on Mobile with 5th card taking full width -->
            <div class="metric-cards-grid">
                <!-- Card 1: Total Invoices -->
                <div class="card metric-card-box shadow-xs mb-0" style="border-left: 3.5px solid #8C56D4 !important;">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">মোট ইনভয়েস</p>
                    <h3 id="statTotalInvoices" class="fw-extrabold mb-0 text-dark">০</h3>
                    <small class="text-muted">বিক্রয় মেমো</small>
                </div>

                <!-- Card 2: Total Billed -->
                <div class="card metric-card-box shadow-xs mb-0" style="border-left: 3.5px solid #0284c7 !important;">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">সর্বমোট বিক্রয় (বিল)</p>
                    <h3 id="statTotalBilled" class="fw-extrabold mb-0" style="color: #0284c7;">৳ ০০.০০</h3>
                    <small class="text-muted">মোট বিল পরিমাণ</small>
                </div>

                <!-- Card 3: Total Paid -->
                <div class="card metric-card-box shadow-xs mb-0" style="border-left: 3.5px solid #10b981 !important;">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">আদায়কৃত টাকা</p>
                    <h3 id="statTotalPaid" class="fw-extrabold mb-0 text-success">৳ ০০.০০</h3>
                    <small class="text-muted">কমপ্লিট পেমেন্ট</small>
                </div>

                <!-- Card 4: Available Return Credit -->
                <div class="card metric-card-box shadow-xs mb-0" style="border-left: 3.5px solid #0d9488 !important;">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">ফেরত ক্রেডিট</p>
                    <h3 id="statTotalReturns" class="fw-extrabold mb-0" style="color: #0d9488;">৳ ০০.০০</h3>
                    <small id="statReturnSubtitle" class="text-muted">মোট রিটার্ন: ৳ ০০.০০</small>
                </div>

                <!-- Card 5: Net Due -->
                <div class="card metric-card-box shadow-xs mb-0" style="border-left: 3.5px solid #ef4444 !important;">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">অবশিষ্ট দেনা</p>
                    <h3 id="statTotalDue" class="fw-extrabold mb-0 text-danger">৳ ০০.০০</h3>
                    <small id="statDueSubtitle" class="text-muted">মোট পাওনা বকেয়া</small>
                </div>
            </div>

            <!-- Tabs & Tables Section -->
            <div class="border-0 shadow-none bg-transparent mt-3 mb-3">
                <div class="card-header bg-transparent border-0 p-0 pb-2 d-flex flex-wrap align-items-center justify-content-between gap-2">
                    <ul class="customer-profile-tabs nav nav-pills" id="customerProfileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="invoices-tab" data-bs-toggle="tab" data-bs-target="#invoices-content" type="button" role="tab">
                                <i class="fa-solid fa-receipt me-1"></i><span class="d-none d-sm-inline">বিক্রয় </span>ইনভয়েস (<span id="invoicesCount">০</span>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="returns-tab" data-bs-toggle="tab" data-bs-target="#returns-content" type="button" role="tab">
                                <i class="fa-solid fa-truck-ramp-box me-1"></i><span class="d-none d-sm-inline">বিক্রয় </span>ফেরত (<span id="returnsCount">০</span>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions-content" type="button" role="tab">
                                <i class="fa-solid fa-hand-holding-dollar me-1"></i><span class="d-none d-sm-inline">লেনদেনের </span>হিস্ট্রি (<span id="transactionsCount">০</span>)
                            </button>
                        </li>
                    </ul>

                    <!-- Master Print Button -->
                    <button type="button" id="masterPrintBtn" class="btn btn-outline-primary btn-sm fw-bold px-3 py-1.5 rounded-pill shadow-xs d-flex align-items-center gap-2" onclick="printCurrentTabTable()" style="color: #8C56D4; border-color: #8C56D4; font-size: 12.5px;" title="টেবিল প্রিন্ট করুন">
                        <i class="fa-solid fa-print"></i> <span>প্রিন্ট করুন</span>
                    </button>
                </div>

                <div class="card-body p-0">
                    <div class="tab-content" id="customerProfileTabContent">

                        <!-- Tab 1: Invoices -->
                        <div class="tab-pane fade show active" id="invoices-content" role="tabpanel">
                            <!-- Desktop Table View (>= 992px) -->
                            <div class="table-responsive d-none d-lg-block">
                                <table class="table table-bordered table-hover align-middle mb-0 customer-profile-table" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">ইনভয়েস নম্বর</th>
                                            <th class="text-center">তারিখ</th>
                                            <th class="text-end">সাবটোটাল</th>
                                            <th class="text-end">ছাড়</th>
                                            <th class="text-end">পরিশোধ</th>
                                            <th class="text-end">বকেয়া</th>
                                            <th class="text-center">স্ট্যাটাস</th>
                                            <th class="text-center" style="width: 140px;">অ্যাকশন</th>
                                        </tr>
                                    </thead>
                                    <tbody id="invoicesTableBody">
                                        <tr><td colspan="9" class="text-center py-4 text-muted">ইনভয়েস লোড হচ্ছে...</td></tr>
                                    </tbody>
                                    <tfoot id="invoicesTableFooter" class="table-light">
                                        <tr class="fw-bold border-top border-2">
                                            <td colspan="3" class="text-end fw-extrabold py-2 text-dark">সর্বমোট:</td>
                                            <td class="text-end fw-extrabold py-2 text-dark" id="foot_subtotal">৳ ০০.০০</td>
                                            <td class="text-end fw-extrabold py-2 text-danger" id="foot_discount">৳ ০০.০০</td>
                                            <td class="text-end fw-extrabold py-2 text-success" id="foot_paid">৳ ০০.০০</td>
                                            <td class="text-end fw-extrabold py-2 text-danger" id="foot_due">৳ ০০.০০</td>
                                            <td colspan="2"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Mobile & Tab Card View (< 992px) -->
                            <div id="invoicesCardList" class="profile-card-list-wrap d-lg-none">
                                <div class="col-12 text-center py-4 text-muted">ইনভয়েস লোড হচ্ছে...</div>
                            </div>
                        </div>

                        <!-- Tab 2: Sales Returns -->
                        <div class="tab-pane fade" id="returns-content" role="tabpanel">
                            <!-- Desktop Table View (>= 992px) -->
                            <div class="table-responsive d-none d-lg-block">
                                <table class="table table-bordered table-hover align-middle mb-0 customer-profile-table" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">ফেরতের তারিখ</th>
                                            <th class="text-center">ইনভয়েস রেফারেন্স</th>
                                            <th class="text-start">ফেরতকৃত পণ্য</th>
                                            <th class="text-center">পরিমাণ</th>
                                            <th class="text-end">ক্রেডিট মান</th>
                                        </tr>
                                    </thead>
                                    <tbody id="returnsTableBody">
                                        <tr><td colspan="6" class="text-center py-4 text-muted">বিক্রয় ফেরত রেকর্ড লোড হচ্ছে...</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile & Tab Card View (< 992px) -->
                            <div id="returnsCardList" class="profile-card-list-wrap d-lg-none">
                                <div class="col-12 text-center py-4 text-muted">বিক্রয় ফেরত রেকর্ড লোড হচ্ছে...</div>
                            </div>
                        </div>

                        <!-- Tab 3: Transactions -->
                        <div class="tab-pane fade" id="transactions-content" role="tabpanel">
                            <!-- Desktop Table View (>= 992px) -->
                            <div class="table-responsive d-none d-lg-block">
                                <table class="table table-bordered table-hover align-middle mb-0 customer-profile-table" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">তারিখ ও সময়</th>
                                            <th class="text-center">রেফারেন্স / নোট</th>
                                            <th class="text-end">পরিশোধিত টাকা</th>
                                            <th class="text-start">পেমেন্ট মেথড</th>
                                            <th class="text-center">স্ট্যাটাস</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transactionsTableBody">
                                        <tr><td colspan="6" class="text-center py-4 text-muted">লেনদেন রেকর্ড লোড হচ্ছে...</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile & Tab Card View (< 992px) -->
                            <div id="transactionsCardList" class="profile-card-list-wrap d-lg-none">
                                <div class="col-12 text-center py-4 text-muted">লেনদেন রেকর্ড লোড হচ্ছে...</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ================= PAYMENT MODAL (Customer Profile Due Collection) ================= -->
<div class="modal fade" id="collectCustomerDueModal" aria-labelledby="collectCustomerDueModalLabel" aria-hidden="true" style="z-index: 107000;">
    <div class="modal-dialog" style="width: 100%;">
        <div class="modal-content w-100 border-0 rounded-4 shadow-lg overflow-hidden p-0">
            <!-- Modal Header -->
            <div class="modal-header-purple p-3 px-4 d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; color: #ffffff !important;">
                <div class="d-flex align-items-center gap-2 text-start flex-grow-1" style="min-width: 0; text-align: left !important;">
                    <i class="fa-solid fa-hand-holding-dollar fs-5 flex-shrink-0"></i>
                    <h5 class="modal-title fw-bold m-0 text-white text-start" id="collectCustomerDueModalLabel" style="font-size: 16px; text-align: left !important; line-height: 1.3;">কাস্টমার বকেয়া আদায় (Due Collection)</h5>
                </div>
                <button type="button" class="btn-close-red flex-shrink-0 ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Modal Form with Scrollable Body and Sticky Bottom Action Buttons -->
            <form id="collectCustomerDueForm" onsubmit="submitCustomerDueCollection(event)" class="d-flex flex-column w-100 flex-grow-1 overflow-hidden m-0 p-0">
                <div class="modal-body p-3 p-md-4 flex-grow-1 overflow-y-auto">
                    <!-- Date & Dues Summary Card -->
                    <div class="modal-dues-summary-card p-3 mb-3 rounded-3 w-100">
                        <div class="mb-2.5">
                            <label for="modalCollectionDate" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">আদায়ের তারিখ *</label>
                            <div class="position-relative w-100">
                                <input type="text" class="form-control invoice-search-input custom-flatpickr-input text-start w-100 ps-3 pe-5" id="modalCollectionDate" placeholder="DD-MM-YYYY" readonly autocomplete="off" required style="font-size: 14px; font-weight: 500; width: 100% !important;">
                                <span class="position-absolute end-0 top-50 translate-middle-y me-3 text-muted" style="pointer-events: none;">
                                    <i class="fa-regular fa-calendar-days" style="color: #8C56D4;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                            <span class="text-muted small dues-label text-start">কাস্টমার পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-dark dues-val" id="modalCustomerPreviousDue">৳ ০.০০</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1 border-bottom">
                            <span class="text-muted small dues-label text-start">ইনভয়েস পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-dark dues-val" id="modalOrderPreviousDue">৳ ০.০০</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-1.5">
                            <span class="fw-bold text-slate-800 dues-total-label text-start">মোট পূর্বের বকেয়া:</span>
                            <span class="fw-bold text-danger fs-6" id="modalTotalPreviousDue" data-raw="0">৳ ০.০০</span>
                        </div>
                    </div>

                    <!-- Discount & Pay Amount -->
                    <div class="row g-2 mb-3 w-100 m-0">
                        <div class="col-6 ps-0 pe-1">
                            <label for="modalDiscountAmount" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">ছাড় (Discount)</label>
                            <input type="number" inputmode="decimal" step="any" min="0" id="modalDiscountAmount" class="form-control invoice-search-input text-start w-100 ps-3" oninput="calculateCustomerProfileDuePayment()" placeholder="৳ ০.০০" style="width: 100% !important;">
                        </div>
                        <div class="col-6 ps-1 pe-0">
                            <label for="modalPaidAmount" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">আদায়কৃত টাকা *</label>
                            <input type="number" inputmode="decimal" step="any" min="0" id="modalPaidAmount" class="form-control invoice-search-input text-start fw-bold w-100 ps-3" oninput="calculateCustomerProfileDuePayment()" placeholder="৳ ০.০০" required style="width: 100% !important;">
                        </div>
                    </div>

                    <!-- Calculation Status Box -->
                    <div class="modal-calc-status-box p-3 mb-3 rounded-3 d-flex align-items-center justify-content-between w-100">
                        <div class="text-start">
                            <span class="text-muted small d-block status-label text-start" style="font-size: 11px;">অবশিষ্ট বকেয়া:</span>
                            <span class="fw-bold text-danger fs-6" id="modalFinalDueAmount">৳ ০.০০</span>
                        </div>
                        <div class="text-end">
                            <span class="text-muted small d-block status-label" style="font-size: 11px;">পেমেন্ট স্ট্যাটাস:</span>
                            <span class="badge bg-secondary px-2.5 py-1 fw-bold" id="modalPaymentStatusDisplay" style="font-size: 11px; border-radius: 12px;">Pending</span>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3 w-100">
                        <label class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">পেমেন্ট মাধ্যম *</label>
                        <div class="d-flex flex-wrap gap-2">
                            <label class="cl-payment-chip active" onclick="customerProfileSelectPaymentChip('cash')">
                                <input type="radio" name="cpPayment" id="cpCash" value="cash" checked style="display: none;">
                                <i class="fa-solid fa-money-bill-wave me-1"></i> Cash
                            </label>
                            <label class="cl-payment-chip" onclick="customerProfileSelectPaymentChip('bkash')">
                                <input type="radio" name="cpPayment" id="cpBkash" value="bkash" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> bKash
                            </label>
                            <label class="cl-payment-chip" onclick="customerProfileSelectPaymentChip('nagad')">
                                <input type="radio" name="cpPayment" id="cpNagad" value="nagad" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> Nagad
                            </label>
                            <label class="cl-payment-chip" onclick="customerProfileSelectPaymentChip('rocket')">
                                <input type="radio" name="cpPayment" id="cpRocket" value="rocket" style="display: none;">
                                <i class="fa-solid fa-mobile-screen me-1"></i> Rocket
                            </label>
                            <label class="cl-payment-chip" onclick="customerProfileSelectPaymentChip('bank')">
                                <input type="radio" name="cpPayment" id="cpBank" value="bank" style="display: none;">
                                <i class="fa-solid fa-building-columns me-1"></i> Bank
                            </label>
                            <label class="cl-payment-chip" onclick="customerProfileSelectPaymentChip('mastercard')">
                                <input type="radio" name="cpPayment" id="cpMastercard" value="mastercard" style="display: none;">
                                <i class="fa-solid fa-credit-card me-1"></i> Card
                            </label>
                        </div>
                    </div>

                    <!-- Transaction ID (non-cash) -->
                    <div class="mb-3 w-100" id="modalTransactionIdWrapper" style="display: none;">
                        <label for="modalTransactionId" class="form-label mb-1.5 fw-semibold small text-start d-block" style="font-size: 12.5px;">ট্রানজেকশন আইডি</label>
                        <input type="text" id="modalTransactionId" class="form-control invoice-search-input text-start w-100 ps-3" placeholder="ট্রানজেকশন আইডি লিখুন..." style="width: 100% !important;">
                    </div>
                </div>

                <!-- Sticky Bottom Action Buttons right above keyboard -->
                <div class="modal-sticky-footer p-3 border-top w-100">
                    <div class="d-flex align-items-center gap-2 w-100">
                        <button type="button" class="btn btn-cancel-red py-2 px-3 fw-bold flex-grow-1" data-bs-dismiss="modal" style="height: 44px; border-radius: 10px; font-size: 14px;">
                            <i class="fa-solid fa-xmark me-1"></i> বাতিল
                        </button>
                        <button type="submit" id="btnSubmitCollection" class="invoice-search-submit-btn flex-grow-1 py-2 px-3 fw-bold" style="height: 44px; border-radius: 10px; font-size: 14px;">
                            <i class="fa-solid fa-check me-1"></i> আদায় নিশ্চিত করুন
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function engToBanglaNumProf(str) {
        if (str === null || str === undefined) return '';
        const engDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        const banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        let strVal = String(str);
        for (let i = 0; i < 10; i++) {
            strVal = strVal.split(engDigits[i]).join(banglaDigits[i]);
        }
        return strVal;
    }

    const pathParts = window.location.pathname.split('/');
    const customerProfileId = pathParts[pathParts.length - 1];

    window.customerPreviousDueVal = 0;
    window.customerInvoiceDueVal = 0;
    window.customerTotalDueVal = 0;

    document.addEventListener("DOMContentLoaded", () => {
        // Initialize Flatpickr for collection date
        if (typeof flatpickr !== 'undefined') {
            flatpickr('#modalCollectionDate', {
                dateFormat: "d-m-Y",
                defaultDate: new Date(),
                monthSelectorType: "static",
                disableMobile: true
            });
        }

        $('#collectCustomerDueModal').on('show.bs.modal', function () {
            prepareCustomerProfileDueModal();
        });

        $('#collectCustomerDueModal').on('shown.bs.modal', function () {
            const payInput = document.getElementById('modalPaidAmount');
            if (payInput) {
                payInput.focus();
                payInput.select();
            }
        });

        fetchCustomerProfile();
    });

    function prepareCustomerProfileDueModal() {
        let custPrev = window.customerPreviousDueVal || 0;
        let invPrev = window.customerInvoiceDueVal || 0;
        let totalPrev = window.customerTotalDueVal || 0;

        $('#modalCustomerPreviousDue').text(`৳ ${custPrev.toFixed(2)}`);
        $('#modalOrderPreviousDue').text(`৳ ${invPrev.toFixed(2)}`);
        $('#modalTotalPreviousDue').text(`৳ ${totalPrev.toFixed(2)}`).attr('data-raw', totalPrev);

        $('#modalDiscountAmount').val('');
        $('#modalPaidAmount').val('');
        $('#modalFinalDueAmount').text(`৳ ${totalPrev.toFixed(2)}`);
        $('#modalPaymentStatusDisplay').text('Pending').removeClass('bg-success bg-warning').addClass('bg-secondary');

        customerProfileSelectPaymentChip('cash');
    }

    function calculateCustomerProfileDuePayment() {
        let totalDue = parseFloat($('#modalTotalPreviousDue').attr('data-raw')) || 0;
        let discount = parseFloat($('#modalDiscountAmount').val()) || 0;
        let payAmount = parseFloat($('#modalPaidAmount').val()) || 0;

        let totalDeduction = discount + payAmount;
        let remainingDue = Math.max(0, totalDue - totalDeduction);

        $('#modalFinalDueAmount').text(`৳ ${remainingDue.toFixed(2)}`);

        let statusBadge = $('#modalPaymentStatusDisplay');
        if (remainingDue === 0 && payAmount > 0) {
            statusBadge.text('Fully Paid').removeClass('bg-secondary bg-warning').addClass('bg-success');
        } else if (payAmount > 0 && remainingDue > 0) {
            statusBadge.text('Partial Paid').removeClass('bg-secondary bg-success').addClass('bg-warning');
        } else {
            statusBadge.text('Pending').removeClass('bg-success bg-warning').addClass('bg-secondary');
        }
    }

    function customerProfileSelectPaymentChip(method) {
        $('.cl-payment-chip').removeClass('active');
        $(`input[name="cpPayment"][value="${method}"]`).closest('.cl-payment-chip').addClass('active');
        $(`input[name="cpPayment"][value="${method}"]`).prop('checked', true);

        if (method === 'cash') {
            $('#modalTransactionIdWrapper').slideUp(150);
            $('#modalTransactionId').val('');
        } else {
            $('#modalTransactionIdWrapper').slideDown(150);
        }
    }

    async function fetchCustomerProfile() {
        try {
            if(typeof showLoader === "function") showLoader();

            let res = await axios.get(`/api/customer-profile-data/${customerProfileId}`, HeaderToken());

            if(typeof hideLoader === "function") hideLoader();

            if (res.data.status === 'success') {
                let customer = res.data.customer;
                let summary = res.data.summary;
                let invoices = res.data.invoices || [];
                let returns = res.data.returns || [];
                let transactions = res.data.transactions || [];

                window.customerPreviousDueVal = parseFloat(customer.previous_due_amount || 0);
                window.customerInvoiceDueVal = invoices.reduce((sum, inv) => sum + parseFloat(inv.due_amount || 0), 0);
                window.customerTotalDueVal = Math.max(0, window.customerPreviousDueVal + window.customerInvoiceDueVal - parseFloat(summary.available_credit || 0));

                // Render Customer Header
                $('#customerName').text(customer.name || customer.customer_name || 'N/A');
                $('#customerIdBadge').text(customer.customer_id || 'CUST-0000');
                $('#customerMobile').html(`<i class="fa-solid fa-phone me-1" style="color: #8C56D4;"></i>${engToBanglaNumProf(customer.mobile || customer.phone || 'N/A')}`);
                $('#customerEmail').html(`<i class="fa-solid fa-envelope me-1 text-primary"></i>${customer.email || 'N/A'}`);
                $('#customerAddress').html(`<i class="fa-solid fa-location-dot me-1 text-danger"></i>${customer.address || 'N/A'}`);

                if (customer.img_url) {
                    $('#customerImg').attr('src', '/' + customer.img_url);
                }

                // Render Summary Metrics in Bangla
                $('#customerNetDue').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_due).toFixed(2))}`);
                $('#statTotalInvoices').text(engToBanglaNumProf(summary.total_invoices));
                $('#statTotalBilled').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_billed).toFixed(2))}`);
                $('#statTotalPaid').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_paid).toFixed(2))}`);
                $('#statTotalReturns').text(`৳ ${engToBanglaNumProf(parseFloat(summary.available_credit || 0).toFixed(2))}`);
                $('#statReturnSubtitle').text(`মোট রিটার্ন: ৳${engToBanglaNumProf(parseFloat(summary.total_returns || 0).toFixed(2))} | অ্যাডজাস্ট: ৳${engToBanglaNumProf(parseFloat(summary.total_returns_adjusted || 0).toFixed(2))}`);
                $('#statTotalDue').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_due).toFixed(2))}`);

                const openingDue = parseFloat(summary.opening_due || customer.previous_due_amount || 0);
                const invDue = parseFloat(summary.invoice_due || window.customerInvoiceDueVal || 0);
                $('#statDueSubtitle').text(`পূর্বের: ৳${engToBanglaNumProf(openingDue.toFixed(0))} | ইনভয়েস: ৳${engToBanglaNumProf(invDue.toFixed(0))}`);

                $('#invoicesCount').text(engToBanglaNumProf(invoices.length));
                $('#returnsCount').text(engToBanglaNumProf(returns.length));
                $('#transactionsCount').text(engToBanglaNumProf(transactions.length));

                // Pre-fill Modal Info
                $('#modalCustomerName').text(customer.name || customer.customer_name || 'N/A');
                $('#modalCustomerId').text(customer.customer_id || 'CUST-0000');

                prepareCustomerProfileDueModal();

                // 1. Render Invoices Table & Mobile Cards
                const invoicesTbody = $('#invoicesTableBody');
                const invoicesCardList = $('#invoicesCardList');
                invoicesTbody.empty();
                invoicesCardList.empty();

                let totalSubSum = 0;
                let totalDiscSum = 0;
                let totalPaidSum = 0;
                let totalDueSum = 0;

                if (invoices.length === 0) {
                    invoicesTbody.html('<tr><td colspan="9" class="text-center py-4 text-muted">কোনো ইনভয়েস ডাটা পাওয়া যায়নি</td></tr>');
                    invoicesCardList.html('<div class="col-12 text-center py-4 text-muted bg-white rounded-3 border">কোনো ইনভয়েস ডাটা পাওয়া যায়নি</div>');
                } else {
                    invoices.forEach((item, index) => {
                        const rawSub = parseFloat(item.sub_total || 0);
                        const rawDisc = parseFloat(item.discount_amount || 0);
                        const rawPaid = parseFloat(item.paid_amount || 0);
                        const rawDue = parseFloat(item.due_amount || 0);

                        totalSubSum += rawSub;
                        totalDiscSum += rawDisc;
                        totalPaidSum += rawPaid;
                        totalDueSum += rawDue;

                        let paidDisplayHtml = `৳ ${engToBanglaNumProf(rawPaid.toFixed(2))}`;
                        if (item.return_adjustment_amount && parseFloat(item.return_adjustment_amount) > 0) {
                            paidDisplayHtml += `<br><span class="badge border" style="font-size: 11px; color: #0d9488; background: #f0fdfa;">+৳${engToBanglaNumProf(parseFloat(item.return_adjustment_amount).toFixed(2))} অ্যাডজাস্ট</span>`;
                        }

                        let paymentStatusHtml = '';
                        let paymentStatusText = '';
                        if (rawDue === 0 && (rawPaid > 0 || (item.return_adjustment_amount && parseFloat(item.return_adjustment_amount) > 0))) {
                            paymentStatusText = 'পরিশোধিত';
                            paymentStatusHtml = '<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">পরিশোধিত</span>';
                        } else if (rawDue > 0 && rawPaid > 0) {
                            paymentStatusText = 'আংশিক পরিশোধ';
                            paymentStatusHtml = '<span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">আংশিক</span>';
                        } else if (rawDue > 0 && rawPaid === 0) {
                            paymentStatusText = 'বকেয়া';
                            paymentStatusHtml = '<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1">বকেয়া</span>';
                        } else {
                            paymentStatusText = 'অজ্ঞাত';
                            paymentStatusHtml = '<span class="badge bg-secondary-subtle text-secondary px-2 py-1">অজ্ঞাত</span>';
                        }

                        let dObj = new Date(item.invoice_date || item.created_at);
                        let formattedDate = !isNaN(dObj) ? `${dObj.getDate().toString().padStart(2, '0')}-${(dObj.getMonth()+1).toString().padStart(2, '0')}-${dObj.getFullYear()}` : 'N/A';

                        // Desktop Table Row
                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(index + 1)}</td>
                                <td class="text-center fw-bold" style="color: #8C56D4;"><a href="/invoice/${item.id}" style="color: #8C56D4; text-decoration: none;">${item.order_no}</a></td>
                                <td class="text-center">${engToBanglaNumProf(formattedDate)}</td>
                                <td class="text-end fw-bold">৳ ${engToBanglaNumProf(rawSub.toFixed(2))}</td>
                                <td class="text-end text-danger">৳ ${engToBanglaNumProf(rawDisc.toFixed(2))}</td>
                                <td class="text-end text-success fw-bold">${paidDisplayHtml}</td>
                                <td class="text-end ${rawDue > 0 ? 'text-danger' : 'text-muted'} fw-bold">৳ ${engToBanglaNumProf(rawDue.toFixed(2))}</td>
                                <td class="text-center">${paymentStatusHtml}</td>
                                <td class="text-center">
                                    <div class="d-inline-flex align-items-center gap-1.5">
                                        <a href="/invoice/${item.id}" onclick="sessionStorage.setItem('invoice_back_url', window.location.href);" class="btn btn-sm btn-outline-primary px-2 py-1 fw-bold d-inline-flex align-items-center gap-1" style="border-radius: 6px; font-size: 11.5px; border-color: #8C56D4; color: #8C56D4;" title="ভিউ ইনভয়েস">
                                            <i class="fa-solid fa-eye"></i><span>ভিউ</span>
                                        </a>
                                        <a href="/return/${item.id}" onclick="sessionStorage.setItem('return_back_url', window.location.href);" class="btn btn-sm px-2 py-1 fw-bold d-inline-flex align-items-center gap-1" style="border-radius: 6px; font-size: 11.5px; border: 1.5px solid #FDE68A; background: #FEF9EC; color: #D97706;" title="পণ্য ফেরত">
                                            <i class="fa-solid fa-rotate-left"></i><span>ফেরত</span>
                                        </a>
                                        <a href="/invoice/${item.id}" onclick="sessionStorage.setItem('invoice_back_url', window.location.href);" class="btn btn-sm btn-outline-secondary px-2 py-1 fw-bold d-inline-flex align-items-center gap-1" style="border-radius: 6px; font-size: 11.5px;" title="প্রিন্ট ইনভয়েস">
                                            <i class="fa-solid fa-print"></i><span>প্রিন্ট</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        `;
                        invoicesTbody.append(row);

                        // Mobile & Tab Box Card (Tab = 2 col, Mobile = 1 col)
                        const mobileCard = `
                            <div class="col-12 col-md-6">
                                <div class="invoice-mobile-card d-flex flex-column justify-content-between h-100" style="cursor: pointer;" onclick="if(!event.target.closest('button') && !event.target.closest('a')) { sessionStorage.setItem('invoice_back_url', window.location.href); window.location.href='/invoice/${item.id}'; }">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                            <div class="d-flex align-items-center gap-1.5">
                                                <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 10px;">#${index + 1}</span>
                                                <span class="badge bg-light fw-bold" style="color: #8C56D4; border: 1px solid #E5D5F7; font-size: 11px;">
                                                    <i class="fa-solid fa-receipt me-1"></i>${item.order_no}
                                                </span>
                                            </div>
                                            <div>
                                                ${paymentStatusHtml}
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-2 mb-1">
                                            <div class="overflow-hidden">
                                                <div class="fw-bold text-dark" style="font-size: 13px;">
                                                    <i class="fa-regular fa-calendar me-1 text-muted"></i>${engToBanglaNumProf(formattedDate)}
                                                </div>
                                                <small class="text-muted d-block" style="font-size: 11px;">
                                                    ছাড়: ৳ ${engToBanglaNumProf(rawDisc.toFixed(2))}
                                                </small>
                                            </div>
                                            <div class="text-end flex-shrink-0 ms-2">
                                                <div style="font-size: 10px; color: #64748b;">মোট: <strong class="text-dark">৳ ${engToBanglaNumProf(rawSub.toFixed(2))}</strong></div>
                                                <div class="fw-bold ${rawDue > 0 ? 'text-danger' : 'text-success'}" style="font-size: 13px;">
                                                    ${rawDue > 0 ? 'বাকি: ৳ ' + engToBanglaNumProf(rawDue.toFixed(2)) : 'পরিশোধিত'}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mobile-card-actions pt-2 mt-2 border-top">
                                        <a href="/invoice/${item.id}" onclick="sessionStorage.setItem('invoice_back_url', window.location.href);" class="mobile-action-btn action-btn-view flex-grow-1 text-decoration-none d-flex align-items-center justify-content-center gap-1" title="ইনভয়েস ভিউ">
                                            <i class="fa-solid fa-eye me-1"></i><span>ভিউ</span>
                                        </a>
                                        <a href="/return/${item.id}" onclick="sessionStorage.setItem('return_back_url', window.location.href);" class="mobile-action-btn action-btn-due flex-grow-1 text-decoration-none d-flex align-items-center justify-content-center gap-1" style="background: #FEF9EC; border: 1px solid #FDE68A; color: #D97706;" title="পণ্য ফেরত">
                                            <i class="fa-solid fa-rotate-left me-1"></i><span>ফেরত</span>
                                        </a>
                                        <a href="/invoice/${item.id}" onclick="sessionStorage.setItem('invoice_back_url', window.location.href);" class="mobile-action-btn action-btn-print flex-grow-1 text-decoration-none d-flex align-items-center justify-content-center gap-1" title="প্রিন্ট ইনভয়েস">
                                            <i class="fa-solid fa-print me-1"></i><span>প্রিন্ট</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;
                        invoicesCardList.append(mobileCard);
                    });
                }

                // Update Table Footer Totals
                if (document.getElementById('foot_subtotal')) document.getElementById('foot_subtotal').innerText = '৳ ' + engToBanglaNumProf(totalSubSum.toFixed(2));
                if (document.getElementById('foot_discount')) document.getElementById('foot_discount').innerText = '৳ ' + engToBanglaNumProf(totalDiscSum.toFixed(2));
                if (document.getElementById('foot_paid')) document.getElementById('foot_paid').innerText = '৳ ' + engToBanglaNumProf(totalPaidSum.toFixed(2));
                if (document.getElementById('foot_due')) document.getElementById('foot_due').innerText = '৳ ' + engToBanglaNumProf(totalDueSum.toFixed(2));

                // 2. Render Returns Table & Mobile Cards
                const returnsTbody = $('#returnsTableBody');
                const returnsCardList = $('#returnsCardList');
                returnsTbody.empty();
                returnsCardList.empty();

                if (returns.length === 0) {
                    returnsTbody.html('<tr><td colspan="6" class="text-center py-4 text-muted">কোনো বিক্রয় ফেরত ডাটা পাওয়া যায়নি</td></tr>');
                    returnsCardList.html('<div class="col-12 text-center py-4 text-muted bg-white rounded-3 border">কোনো বিক্রয় ফেরত ডাটা পাওয়া যায়নি</div>');
                } else {
                    returns.forEach((rItem, rIndex) => {
                        // Desktop Table Row
                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(rIndex + 1)}</td>
                                <td class="text-center fw-semibold text-dark">${engToBanglaNumProf(rItem.created_at_formatted || rItem.date)}</td>
                                <td class="text-center"><span class="badge border font-monospace" style="color: #0d9488; background: #f0fdfa;">${rItem.order_no}</span></td>
                                <td class="text-start fw-bold text-dark">${rItem.product_name}</td>
                                <td class="text-center"><span class="badge bg-light text-dark border px-2 py-1 fw-bold">${engToBanglaNumProf(rItem.quantity)} পিস</span></td>
                                <td class="text-end fw-bold" style="color: #0d9488;">৳ ${engToBanglaNumProf(parseFloat(rItem.amount).toFixed(2))}</td>
                            </tr>
                        `;
                        returnsTbody.append(row);

                        // Mobile / Tab Box Card
                        const rCard = `
                            <div class="col-12 col-md-6">
                                <div class="invoice-mobile-card d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                            <div class="d-flex align-items-center gap-1.5">
                                                <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 10px;">#${rIndex + 1}</span>
                                                <span class="badge border font-monospace" style="color: #0d9488; background: #f0fdfa; font-size: 11px;">
                                                    ${rItem.order_no}
                                                </span>
                                            </div>
                                            <div>
                                                <span class="badge bg-light text-dark border px-2 py-1 fw-bold" style="font-size: 10.5px;">
                                                    ${engToBanglaNumProf(rItem.quantity)} পিস
                                                </span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-2 mb-1">
                                            <div class="overflow-hidden">
                                                <h6 class="fw-bold text-dark mb-0 text-truncate" style="font-size: 13px;">${rItem.product_name}</h6>
                                                <small class="text-muted d-block" style="font-size: 11px;">
                                                    <i class="fa-regular fa-calendar me-1"></i>${engToBanglaNumProf(rItem.created_at_formatted || rItem.date)}
                                                </small>
                                            </div>
                                            <div class="text-end flex-shrink-0 ms-2">
                                                <div style="font-size: 10px; color: #0d9488;">ক্রেডিট মান</div>
                                                <div class="fw-bold" style="color: #0d9488; font-size: 13.5px;">৳ ${engToBanglaNumProf(parseFloat(rItem.amount).toFixed(2))}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        returnsCardList.append(rCard);
                    });
                }

                // 3. Render Transactions Table & Mobile Cards
                const transactionsTbody = $('#transactionsTableBody');
                const transactionsCardList = $('#transactionsCardList');
                transactionsTbody.empty();
                transactionsCardList.empty();

                if (transactions.length === 0) {
                    transactionsTbody.html('<tr><td colspan="6" class="text-center py-4 text-muted">কোনো লেনদেন রেকর্ড পাওয়া যায়নি</td></tr>');
                    transactionsCardList.html('<div class="col-12 text-center py-4 text-muted bg-white rounded-3 border">কোনো লেনদেন রেকর্ড পাওয়া যায়নি</div>');
                } else {
                    transactions.forEach((trx, index) => {
                        let formattedDate = new Intl.DateTimeFormat('en-US', { 
                            day: '2-digit', month: 'short', year: 'numeric', 
                            hour: 'numeric', minute: '2-digit', hour12: true 
                        }).format(new Date(trx.created_at));

                        // Desktop Table Row
                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(index + 1)}</td>
                                <td class="text-center">${engToBanglaNumProf(formattedDate)}</td>
                                <td class="text-center fw-bold" style="color: #8C56D4;">${trx.reference_no || trx.order_no || 'বকেয়া আদায়'}</td>
                                <td class="text-end text-success fw-bold">৳ ${engToBanglaNumProf(parseFloat(trx.paid_amount).toFixed(2))}</td>
                                <td class="text-start fw-semibold"><i class="fa-solid fa-wallet me-1 text-secondary"></i>${trx.payment_method || 'Cash'}</td>
                                <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">সফল</span></td>
                            </tr>
                        `;
                        transactionsTbody.append(row);

                        // Mobile / Tab Box Card
                        const tCard = `
                            <div class="col-12 col-md-6">
                                <div class="invoice-mobile-card d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                            <div class="d-flex align-items-center gap-1.5">
                                                <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 10px;">#${index + 1}</span>
                                                <span class="badge bg-light fw-bold" style="color: #8C56D4; border: 1px solid #E5D5F7; font-size: 11px;">
                                                    ${trx.reference_no || trx.order_no || 'বকেয়া আদায়'}
                                                </span>
                                            </div>
                                            <div>
                                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 fw-bold" style="font-size: 10.5px; border-radius: 12px;">
                                                    সফল
                                                </span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-2 mb-1">
                                            <div class="overflow-hidden">
                                                <div class="fw-bold text-dark" style="font-size: 13px;">
                                                    <i class="fa-solid fa-wallet me-1 text-secondary"></i>${trx.payment_method || 'Cash'}
                                                </div>
                                                <small class="text-muted d-block text-truncate" style="font-size: 11px;">
                                                    ${engToBanglaNumProf(formattedDate)}
                                                </small>
                                            </div>
                                            <div class="text-end flex-shrink-0 ms-2">
                                                <div style="font-size: 10px; color: #64748b;">পরিশোধিত টাকা</div>
                                                <div class="fw-bold text-success" style="font-size: 13.5px;">৳ ${engToBanglaNumProf(parseFloat(trx.paid_amount).toFixed(2))}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        transactionsCardList.append(tCard);
                    });
                }

            } else {
                alert("ত্রুটি: " + (res.data.message || "কাস্টমার ডাটা লোড করতে ব্যর্থ হয়েছে।"));
            }

        } catch (e) {
            if(typeof hideLoader === "function") hideLoader();
            console.error(e);
            alert("ত্রুটি: কাস্টমার প্রোফাইল লোড করা যায়নি।");
        }
    }

    // Print Entire Active Table in CURRENT TAB
    function printCurrentTabTable() {
        const activeTab = document.querySelector('#customerProfileTabs .nav-link.active');
        const tabTarget = activeTab?.getAttribute('data-bs-target');
        const tabPane = document.querySelector(tabTarget);
        if (!tabPane) return;

        const tableEl = tabPane.querySelector('table');
        if (!tableEl) return;

        let tabReportTitle = 'কাস্টমার বিবরণী';
        if (tabTarget === '#invoices-content') {
            tabReportTitle = 'কাস্টমার বিক্রয় ইনভয়েস বিবরণী';
        } else if (tabTarget === '#returns-content') {
            tabReportTitle = 'কাস্টমার বিক্রয় ফেরত বিবরণী';
        } else if (tabTarget === '#transactions-content') {
            tabReportTitle = 'কাস্টমার লেনদেন হিস্ট্রি বিবরণী';
        }

        const customerName = document.getElementById('customerName')?.innerText.trim() || 'N/A';
        const customerId = document.getElementById('customerIdBadge')?.innerText.trim() || '';
        const customerMobile = document.getElementById('customerMobile')?.innerText.trim() || 'N/A';
        const customerAddress = document.getElementById('customerAddress')?.innerText.trim() || 'ঠিকানা নেই';
        const netDue = document.getElementById('customerNetDue')?.innerText.trim() || '৳ ০.০০';
        const totalBilled = document.getElementById('statTotalBilled')?.innerText.trim() || '৳ ০.০০';
        const totalPaid = document.getElementById('statTotalPaid')?.innerText.trim() || '৳ ০.০০';
        const totalReturns = document.getElementById('statTotalReturns')?.innerText.trim() || '৳ ০.০০';

        // Create a clone of the desktop table
        const printTableClone = tableEl.cloneNode(true);
        printTableClone.removeAttribute('id');
        printTableClone.className = 'print-data-table';

        // Remove Action column if present
        if (tabTarget === '#invoices-content') {
            const headerRow = printTableClone.querySelector('thead tr');
            if (headerRow && headerRow.lastElementChild) {
                headerRow.removeChild(headerRow.lastElementChild);
            }
            const bodyRows = printTableClone.querySelectorAll('tbody tr');
            bodyRows.forEach(row => {
                if (row.children.length > 1 && row.lastElementChild) {
                    row.removeChild(row.lastElementChild);
                }
            });
        }

        // Clean up buttons
        const buttons = printTableClone.querySelectorAll('button, a.btn');
        buttons.forEach(b => b.remove());

        const logoSrc = "{{ asset('back-end/assets/img/anis-store-logo.png') }}";
        const printDateStr = new Date().toLocaleDateString('bn-BD', { day: '2-digit', month: '2-digit', year: 'numeric' });
        const printTimeStr = new Date().toLocaleTimeString('bn-BD', { hour: '2-digit', minute: '2-digit' });

        const printHtml = `
            <div class="print-page-wrapper">
                <!-- Header -->
                <div class="store-brand-header">
                    <div class="store-logo-box">
                        <img src="${logoSrc}" alt="Anis Store Logo" class="store-logo-img" onerror="this.style.display='none'">
                        <div class="store-title-text">
                            <h1>মেসার্স আনিস ষ্টোর</h1>
                            <p>দোকান নং: ১৮, লেভেল: ২, মেঘনা হাইটস, পাবনা</p>
                            <p>মোবাইল: ০১৭৭১২৯৯২১১, ০১৯১২২৪৮১০৪ | ইমেইল: exchangeworld0@gmail.com</p>
                        </div>
                    </div>
                    <div class="report-title-pill">
                        <div class="report-badge">${tabReportTitle}</div>
                        <div class="print-meta-time">তারিখ: ${printDateStr} | সময়: ${printTimeStr}</div>
                    </div>
                </div>

                <!-- Customer Meta Summary -->
                <div class="customer-info-grid">
                    <div class="customer-info-col">
                        <h3>কাস্টমার তথ্য:</h3>
                        <p><strong>নাম:</strong> ${customerName} (${customerId})</p>
                        <p><strong>মোবাইল:</strong> ${customerMobile} | <strong>ঠিকানা:</strong> ${customerAddress}</p>
                    </div>
                    <div class="customer-info-col customer-stats-col">
                        <p><strong>সর্বমোট বিল:</strong> ${totalBilled} | <strong>মোট পরিশোধ:</strong> ${totalPaid}</p>
                        <p><strong>ফেরত ক্রেডিট:</strong> ${totalReturns}</p>
                        <p><strong>অবশিষ্ট দেনা (Net Due):</strong> <span class="customer-due-highlight">${netDue}</span></p>
                    </div>
                </div>

                <!-- Table Data -->
                ${printTableClone.outerHTML}

                <!-- Footer -->
                <div class="print-footer">
                    <span>মুদ্রিত রিপোর্ট: মেসার্স আনিস ষ্টোর</span>
                    <span>Software By: CodeNext IT (www.codenextit.com)</span>
                </div>
            </div>
        `;

        let printBox = document.getElementById('customerPrintContainer');
        if (!printBox) {
            printBox = document.createElement('div');
            printBox.id = 'customerPrintContainer';
            document.body.appendChild(printBox);
        }
        printBox.innerHTML = printHtml;

        window.print();
    }

    async function submitCustomerDueCollection(event) {
        event.preventDefault();
        try {
            let payAmount = parseFloat($('#modalPaidAmount').val()) || 0;
            let discountAmount = parseFloat($('#modalDiscountAmount').val()) || 0;
            let prevDue = parseFloat($('#modalTotalPreviousDue').attr('data-raw')) || 0;
            let dueAmount = Math.max(0, prevDue - (payAmount + discountAmount));
            let collectionDate = $('#modalCollectionDate').val();
            let paymentStatus = $('#modalPaymentStatusDisplay').text();
            let paymentMethod = $('input[name="cpPayment"]:checked').val() || 'cash';
            let transactionId = $('#modalTransactionId').val() || '';

            if (!payAmount && !discountAmount) {
                if (typeof errorToast === 'function') errorToast("অনুগ্রহ করে পরিশোধের পরিমাণ অথবা ছাড় লিখুন।");
                else alert("অনুগ্রহ করে পরিশোধের পরিমাণ অথবা ছাড় লিখুন।");
                return;
            }

            let formData = new FormData();
            formData.append('id', customerProfileId);
            formData.append('paid_amount', payAmount);
            formData.append('discount_amount', discountAmount);
            formData.append('due_amount', dueAmount);
            formData.append('previous_due_amount', prevDue);
            formData.append('due_collection_date', collectionDate);
            formData.append('payment_status', paymentStatus);
            formData.append('transaction_id', transactionId);
            formData.append('payment_method', paymentMethod);

            if (typeof showLoader === "function") showLoader();
            let res = await axios.post("/api/customer-payment-details-update", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            });
            if (typeof hideLoader === "function") hideLoader();

            if (res.data.status === "success") {
                if (typeof successToast === 'function') {
                    successToast(res.data.message || "বকেয়া সফলভাবে সংগ্রহ করা হয়েছে।");
                } else {
                    alert(res.data.message || "বকেয়া সফলভাবে সংগ্রহ করা হয়েছে।");
                }
                const modalEl = document.getElementById('collectCustomerDueModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
                fetchCustomerProfile();
            } else {
                if (typeof errorToast === 'function') {
                    errorToast(res.data.message || "বকেয়া আপডেট ব্যর্থ হয়েছে।");
                } else {
                    alert(res.data.message || "বকেয়া আপডেট ব্যর্থ হয়েছে।");
                }
            }
        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error(e);
            if (typeof errorToast === 'function') {
                errorToast("বকেয়া সংগ্রহ সংরক্ষণ করতে সমস্যা হয়েছে।");
            } else {
                alert("বকেয়া সংগ্রহ সংরক্ষণ করতে সমস্যা হয়েছে।");
            }
        }
    }
</script>
@endsection