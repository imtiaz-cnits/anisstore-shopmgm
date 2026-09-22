<style>
    /* Brand Colors & Variables */
    :root {
        --sp-primary: #8C56D4;
        --sp-primary-hover: #793FC5;
        --sp-bg-light: #FAF7FD;
        --sp-border-light: #E5D5F7;
    }

    /* Page Content 10px Padding */
    .main-content .page-content,
    .page-content {
        padding: 10px !important;
    }

    /* Supplier Profile Header Card */
    .supplier-profile-header-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        overflow: hidden;
    }

    .supplier-profile-avatar {
        width: 78px;
        height: 78px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #8C56D4;
        box-shadow: 0 4px 12px rgba(140, 86, 212, 0.22);
    }

    .supplier-info-badge {
        font-size: 12px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 20px;
    }

    /* Supplier Net Due Box - 10px Padding */
    .supplier-net-due-box {
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
    .supplier-profile-tabs {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        gap: 8px;
        padding-bottom: 2px;
        border-bottom: none !important;
    }
    .supplier-profile-tabs::-webkit-scrollbar {
        display: none;
    }
    .supplier-profile-tabs .nav-link {
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
    .supplier-profile-tabs .nav-link:hover {
        background: #F3ECFB;
        color: #8C56D4 !important;
        border-color: #8C56D4 !important;
    }
    .supplier-profile-tabs .nav-link.active {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border-color: #793FC5 !important;
        box-shadow: 0 3px 10px rgba(140, 86, 212, 0.28);
        font-weight: 700;
    }

    /* Master Print Button: Primary Purple on Hover & Text White */
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

    /* In-Tab Direct Printing Styles */
    @media screen {
        #supplierPrintContainer {
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
        body > *:not(#supplierPrintContainer) {
            display: none !important;
        }
        #supplierPrintContainer {
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
        #supplierPrintContainer .store-brand-header {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            border-bottom: 2px solid #8C56D4 !important;
            padding-bottom: 8px !important;
            margin-bottom: 10px !important;
        }
        #supplierPrintContainer .store-logo-box {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
        }
        #supplierPrintContainer .store-logo-img {
            max-height: 48px !important;
            max-width: 140px !important;
            object-fit: contain !important;
        }
        #supplierPrintContainer .store-title-text h1 {
            font-size: 20px !important;
            font-weight: 800 !important;
            color: #8C56D4 !important;
            margin: 0 0 2px 0 !important;
            text-transform: uppercase !important;
        }
        #supplierPrintContainer .store-title-text p {
            margin: 0 !important;
            font-size: 11px !important;
            color: #64748b !important;
            line-height: 1.35 !important;
        }
        #supplierPrintContainer .report-title-pill {
            text-align: right !important;
        }
        #supplierPrintContainer .report-badge {
            display: inline-block !important;
            background: #FAF7FD !important;
            border: 1.5px solid #8C56D4 !important;
            color: #8C56D4 !important;
            padding: 4px 14px !important;
            border-radius: 20px !important;
            font-weight: 700 !important;
            font-size: 13px !important;
        }
        #supplierPrintContainer .print-meta-time {
            font-size: 10px !important;
            color: #64748b !important;
            margin-top: 4px !important;
        }
        #supplierPrintContainer .supplier-info-grid {
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
        #supplierPrintContainer .supplier-info-col {
            flex: 1 !important;
        }
        #supplierPrintContainer .supplier-info-col h3 {
            font-size: 12.5px !important;
            font-weight: 700 !important;
            color: #8C56D4 !important;
            margin: 0 0 4px 0 !important;
        }
        #supplierPrintContainer .supplier-info-col p {
            margin: 0 0 2px 0 !important;
            color: #334155 !important;
        }
        #supplierPrintContainer .supplier-info-col strong {
            color: #0f172a !important;
        }
        #supplierPrintContainer .supplier-stats-col {
            text-align: right !important;
        }
        #supplierPrintContainer .supplier-due-highlight {
            font-size: 13px !important;
            font-weight: 800 !important;
            color: #dc2626 !important;
        }
        #supplierPrintContainer .print-data-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 6px !important;
            font-size: 11px !important;
            page-break-after: auto !important;
        }
        #supplierPrintContainer .print-data-table thead {
            display: table-header-group !important; /* Repeats table header across pages */
        }
        #supplierPrintContainer .print-data-table tr {
            page-break-inside: avoid !important;
            page-break-after: auto !important;
        }
        #supplierPrintContainer .print-data-table th, 
        #supplierPrintContainer .print-data-table td {
            border: 1px solid #cbd5e1 !important;
            padding: 5px 7px !important;
            vertical-align: middle !important;
        }
        #supplierPrintContainer .print-data-table th {
            background-color: #f1f5f9 !important;
            color: #1e293b !important;
            font-weight: 700 !important;
            text-align: center !important;
            white-space: nowrap !important;
        }
        #supplierPrintContainer .text-center { text-align: center !important; }
        #supplierPrintContainer .text-end { text-align: right !important; }
        #supplierPrintContainer .text-start { text-align: left !important; }
        #supplierPrintContainer .fw-bold { font-weight: 700 !important; }
        #supplierPrintContainer .badge {
            display: inline-block !important;
            padding: 2px 6px !important;
            font-size: 9.5px !important;
            font-weight: 700 !important;
            border-radius: 4px !important;
            border: 1px solid #cbd5e1 !important;
        }
        #supplierPrintContainer .bg-success-subtle, #supplierPrintContainer .text-success { color: #16a34a !important; }
        #supplierPrintContainer .bg-warning-subtle, #supplierPrintContainer .text-warning { color: #d97706 !important; }
        #supplierPrintContainer .bg-danger-subtle, #supplierPrintContainer .text-danger { color: #dc2626 !important; }
        #supplierPrintContainer .print-footer {
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

    /* Table Section Card Customizations (Zero border, zero shadow, zero padding) */
    .supplier-profile-main-card {
        border: none !important;
        box-shadow: none !important;
        background: transparent !important;
    }
    .supplier-profile-main-card .card-header {
        padding: 0 0 10px 0 !important;
        border-bottom: none !important;
        background: transparent !important;
    }
    .supplier-profile-main-card .card-body {
        padding: 0 !important;
    }

    /* Desktop Table Styles */
    .supplier-profile-table thead tr th {
        background: #f8fafc;
        color: #475569;
        font-weight: 700;
        font-size: 13px;
        border-bottom: 2px solid #e2e8f0;
        padding: 10px 12px;
        white-space: nowrap;
    }
    .supplier-profile-table tbody tr td {
        padding: 10px 12px;
        font-size: 13px;
        border-color: #e2e8f0;
    }
    .supplier-profile-table tbody tr:hover td {
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
        height: 30px;
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
    .mobile-action-btn.action-btn-profile {
        background: #F3ECFB;
        color: #8C56D4;
        border-color: #E5D5F7;
    }
    .mobile-action-btn.action-btn-profile:hover {
        background: #8C56D4;
        color: #ffffff;
    }
    .mobile-action-btn.action-btn-due {
        background: #FAF7FD;
        color: #532391;
        border-color: #E5D5F7;
    }
    .mobile-action-btn.action-btn-due:hover {
        background: #8C56D4;
        color: #ffffff;
    }

    /* Mobile Responsive Header */
    @media (max-width: 767.98px) {
        .supplier-profile-avatar {
            width: 65px;
            height: 65px;
        }
        .supplier-net-due-box {
            width: 100%;
            max-width: 100% !important;
            margin-top: 10px;
        }
        .supplier-profile-tabs {
            gap: 6px;
        }
        .supplier-profile-tabs .nav-link {
            border-radius: 8px !important;
            padding: 7px 12px !important;
            font-size: 12px !important;
        }
    }

    /* Dark Mode Support */
    body[light-mode="dark"] .supplier-profile-header-card,
    body[data-layout-mode="dark"] .supplier-profile-header-card,
    body.dark-mode .supplier-profile-header-card,
    [data-bs-theme="dark"] .supplier-profile-header-card {
        background: #1e293b !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .supplier-net-due-box,
    body[data-layout-mode="dark"] .supplier-net-due-box,
    body.dark-mode .supplier-net-due-box,
    [data-bs-theme="dark"] .supplier-net-due-box {
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

    body[light-mode="dark"] .supplier-profile-tabs .nav-link,
    body[data-layout-mode="dark"] .supplier-profile-tabs .nav-link,
    body.dark-mode .supplier-profile-tabs .nav-link,
    [data-bs-theme="dark"] .supplier-profile-tabs .nav-link {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .supplier-profile-tabs .nav-link.active,
    body[data-layout-mode="dark"] .supplier-profile-tabs .nav-link.active,
    body.dark-mode .supplier-profile-tabs .nav-link.active,
    [data-bs-theme="dark"] .supplier-profile-tabs .nav-link.active {
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

    body[light-mode="dark"] .supplier-profile-table,
    body[data-layout-mode="dark"] .supplier-profile-table,
    body.dark-mode .supplier-profile-table,
    [data-bs-theme="dark"] .supplier-profile-table {
        border-color: #334155 !important;
        color: #e2e8f0 !important;
    }

    body[light-mode="dark"] .supplier-profile-table thead tr th,
    body[data-layout-mode="dark"] .supplier-profile-table thead tr th,
    body.dark-mode .supplier-profile-table thead tr th,
    [data-bs-theme="dark"] .supplier-profile-table thead tr th {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .supplier-profile-table tbody tr td,
    body[data-layout-mode="dark"] .supplier-profile-table tbody tr td,
    body.dark-mode .supplier-profile-table tbody tr td,
    [data-bs-theme="dark"] .supplier-profile-table tbody tr td {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #e2e8f0 !important;
    }

    body[light-mode="dark"] .supplier-profile-table tbody tr:hover td,
    body[data-layout-mode="dark"] .supplier-profile-table tbody tr:hover td,
    body.dark-mode .supplier-profile-table tbody tr:hover td,
    [data-bs-theme="dark"] .supplier-profile-table tbody tr:hover td {
        background: #273549 !important;
    }

    body[light-mode="dark"] .invoice-mobile-card,
    body[data-layout-mode="dark"] .invoice-mobile-card,
    body.dark-mode .invoice-mobile-card,
    [data-bs-theme="dark"] .invoice-mobile-card {
        background-color: #1e293b !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .mobile-action-btn.action-btn-profile,
    body[data-layout-mode="dark"] .mobile-action-btn.action-btn-profile,
    body.dark-mode .mobile-action-btn.action-btn-profile,
    [data-bs-theme="dark"] .mobile-action-btn.action-btn-profile {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .mobile-action-btn.action-btn-due,
    body[data-layout-mode="dark"] .mobile-action-btn.action-btn-due,
    body.dark-mode .mobile-action-btn.action-btn-due,
    [data-bs-theme="dark"] .mobile-action-btn.action-btn-due {
        background: #0f172a !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .modal-content,
    body[data-layout-mode="dark"] .modal-content,
    body.dark-mode .modal-content,
    [data-bs-theme="dark"] .modal-content {
        background: #1e293b !important;
        border-color: #334155 !important;
        color: #e2e8f0 !important;
    }

    body[light-mode="dark"] .modal-footer,
    body[data-layout-mode="dark"] .modal-footer,
    body.dark-mode .modal-footer,
    [data-bs-theme="dark"] .modal-footer {
        background: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .modal-body .bg-light,
    body[data-layout-mode="dark"] .modal-body .bg-light,
    body.dark-mode .modal-body .bg-light,
    [data-bs-theme="dark"] .modal-body .bg-light {
        background: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .modal-body .text-dark,
    body[data-layout-mode="dark"] .modal-body .text-dark,
    body.dark-mode .modal-body .text-dark,
    [data-bs-theme="dark"] .modal-body .text-dark {
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .form-control,
    body[light-mode="dark"] .form-select,
    body[data-layout-mode="dark"] .form-control,
    body[data-layout-mode="dark"] .form-select,
    body.dark-mode .form-control,
    body.dark-mode .form-select {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
</style>

<div class="main-content">
    <div class="page-content" style="padding: 10px !important;">
        <!-- Breadcrumb Header -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
            <div class="supplier-header-title-box">
                <h1 class="h5 mb-0 text-dark fw-bold" style="border-left: 4px solid #8C56D4; padding-left: 10px;">
                    <span>সাপ্লায়ার প্রোফাইল</span>
                </h1>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="/admin-dashboard-supplier" class="btn text-white btn-sm rounded-pill px-3 py-1.5 fw-bold shadow-xs d-inline-flex align-items-center gap-2" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; font-size: 12.5px;">
                    <i class="fa-solid fa-arrow-left"></i> <span>ফিরে যান</span>
                </a>
            </div>
        </div>

        <div class="container-fluid px-0">
            <!-- Supplier Information Banner Card -->
            <div class="supplier-profile-header-card mb-3">
                <div style="height: 4px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;"></div>
                <div class="p-3">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                        <!-- Left: Profile Details -->
                        <div class="d-flex align-items-center gap-3 flex-grow-1">
                            <div class="flex-shrink-0">
                                <img id="supplierImg" src="{{ asset('back-end/assets/img/demo-img.jpeg') }}" 
                                     alt="Supplier Image" 
                                     class="supplier-profile-avatar">
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                    <h2 id="supplierName" class="h5 fw-extrabold mb-0 text-dark">লোড হচ্ছে...</h2>
                                    <span id="supplierIdBadge" class="badge bg-light fw-bold px-2 py-1" style="font-size: 12px; color: #8C56D4; border: 1px solid #E5D5F7;">SUP-0000</span>
                                    <span id="supplierStatusBadge" class="badge px-2 py-1 text-white" style="background: #8C56D4; font-size: 11.5px;">Active</span>
                                </div>
                                <p id="supplierCompany" class="text-muted mb-1 fw-semibold" style="font-size: 13px;">
                                    <i class="fa-solid fa-building me-1 text-secondary"></i>কোম্পানি: N/A
                                </p>
                                <div class="d-flex flex-wrap gap-1.5 text-muted" style="font-size: 12px;">
                                    <span id="supplierMobile" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-phone me-1" style="color: #8C56D4;"></i>N/A</span>
                                    <span id="supplierEmail" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-envelope me-1 text-primary"></i>N/A</span>
                                    <span id="supplierAddress" class="badge bg-light text-dark border px-2 py-1"><i class="fa-solid fa-location-dot me-1 text-danger"></i>N/A</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Net Due Box (10px padding, placed on right on desktop/tab, below on mobile) -->
                        <div class="supplier-net-due-box flex-shrink-0" style="min-width: 260px; max-width: 320px;">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="text-muted small text-uppercase fw-bold" style="font-size: 11px;">মোট দেনা (Net Due)</span>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-0.5 fw-bold" style="font-size: 10px;">Payable Balance</span>
                            </div>
                            <h3 id="supplierNetDue" class="h4 fw-extrabold text-danger mb-1" style="font-size: 1.25rem;">৳ ০০.০০</h3>
                            <small class="text-muted d-block mb-2" style="font-size: 10.5px;">সাপ্লায়ারের নিকট সর্বমোট পাওনা বকেয়া</small>
                            <button class="btn fw-bold w-100 rounded-pill shadow-xs text-white d-inline-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#paySupplierDueModal" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none; font-size: 13px; padding: 8px 16px !important;">
                                <i class="fa-solid fa-hand-holding-dollar"></i> <span>বকেয়া পরিশোধ করুন</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5 Metric Cards in 1 Row on Desktop & Tab, 2 per row on Mobile with 5th card taking full width (No margin bottom) -->
            <div class="metric-cards-grid">
                <!-- Card 1: Total Purchases -->
                <div class="card metric-card-box shadow-xs mb-0" style="border-left: 3.5px solid #8C56D4 !important;">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">মোট ইনভয়েস</p>
                    <h3 id="statTotalPurchases" class="fw-extrabold mb-0 text-dark">০</h3>
                    <small class="text-muted">ক্রয় মেমো</small>
                </div>

                <!-- Card 2: Total Billed -->
                <div class="card metric-card-box shadow-xs mb-0" style="border-left: 3.5px solid #0284c7 !important;">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">সর্বমোট ক্রয় (বিল)</p>
                    <h3 id="statTotalBilled" class="fw-extrabold mb-0" style="color: #0284c7;">৳ ০০.০০</h3>
                    <small class="text-muted">মোট বিল পরিমাণ</small>
                </div>

                <!-- Card 3: Total Paid -->
                <div class="card metric-card-box shadow-xs mb-0" style="border-left: 3.5px solid #10b981 !important;">
                    <p class="text-muted mb-1 small fw-bold text-uppercase">পরিশোধিত টাকা</p>
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
                    <small class="text-muted">মোট পাওনা বকেয়া</small>
                </div>
            </div>

            <!-- Tabs & Tables Section (Zero Main Card Border, Shadow & Padding) -->
            <div class="border-0 shadow-none bg-transparent supplier-profile-main-card mt-3 mb-3">
                <div class="card-header bg-transparent border-0 p-0 pb-2 d-flex flex-wrap align-items-center justify-content-between gap-2">
                    <ul class="supplier-profile-tabs nav nav-pills" id="supplierProfileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="purchases-tab" data-bs-toggle="tab" data-bs-target="#purchases-content" type="button" role="tab">
                                <i class="fa-solid fa-receipt me-1"></i><span class="d-none d-sm-inline">ক্রয় </span>ইনভয়েস (<span id="purchasesCount">০</span>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="returns-tab" data-bs-toggle="tab" data-bs-target="#returns-content" type="button" role="tab">
                                <i class="fa-solid fa-truck-ramp-box me-1"></i><span class="d-none d-sm-inline">ক্রয় </span>ফেরত (<span id="returnsCount">০</span>)
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
                    <div class="tab-content" id="supplierProfileTabContent">

                        <!-- Tab 1: Purchases -->
                        <div class="tab-pane fade show active" id="purchases-content" role="tabpanel">
                            <!-- Desktop Table View (>= 992px) -->
                            <div class="table-responsive d-none d-lg-block">
                                <table class="table table-bordered table-hover align-middle mb-0 supplier-profile-table" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">ক্রয় আইডেন্টিটি</th>
                                            <th class="text-center">তারিখ</th>
                                            <th class="text-start">বারকোডসমূহ</th>
                                            <th class="text-start">রেফারেন্স</th>
                                            <th class="text-end">সর্বমোট মূল্য</th>
                                            <th class="text-end">পরিশোধিত</th>
                                            <th class="text-end">বাকি টাকা</th>
                                            <th class="text-center">স্ট্যাটাস</th>
                                            <th class="text-center" style="width: 140px;">অ্যাকশন</th>
                                        </tr>
                                    </thead>
                                    <tbody id="purchasesTableBody">
                                        <tr><td colspan="10" class="text-center py-4 text-muted">ক্রয় ইনভয়েস লোড হচ্ছে...</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile & Tab Card View (< 992px) -->
                            <div id="purchasesCardList" class="profile-card-list-wrap d-lg-none">
                                <div class="col-12 text-center py-4 text-muted">ক্রয় ইনভয়েস লোড হচ্ছে...</div>
                            </div>
                        </div>

                        <!-- Tab 2: Purchase Returns -->
                        <div class="tab-pane fade" id="returns-content" role="tabpanel">
                            <!-- Desktop Table View (>= 992px) -->
                            <div class="table-responsive d-none d-lg-block">
                                <table class="table table-bordered table-hover align-middle mb-0 supplier-profile-table" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">ফেরতের তারিখ</th>
                                            <th class="text-center">পারচেজ নম্বর</th>
                                            <th class="text-start">ফেরতকৃত পণ্য</th>
                                            <th class="text-center">পরিমাণ</th>
                                            <th class="text-end">ক্রেডিট মান</th>
                                        </tr>
                                    </thead>
                                    <tbody id="returnsTableBody">
                                        <tr><td colspan="6" class="text-center py-4 text-muted">ক্রয় ফেরত রেকর্ড লোড হচ্ছে...</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile & Tab Card View (< 992px) -->
                            <div id="returnsCardList" class="profile-card-list-wrap d-lg-none">
                                <div class="col-12 text-center py-4 text-muted">ক্রয় ফেরত রেকর্ড লোড হচ্ছে...</div>
                            </div>
                        </div>

                        <!-- Tab 3: Transactions -->
                        <div class="tab-pane fade" id="transactions-content" role="tabpanel">
                            <!-- Desktop Table View (>= 992px) -->
                            <div class="table-responsive d-none d-lg-block">
                                <table class="table table-bordered table-hover align-middle mb-0 supplier-profile-table" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">ক্রম</th>
                                            <th class="text-center">তারিখ ও সময়</th>
                                            <th class="text-center">ইনভয়েস / রেফারেন্স</th>
                                            <th class="text-end">পরিশোধিত টাকা</th>
                                            <th class="text-end">ডিসকাউন্ট</th>
                                            <th class="text-start">পেমেন্ট মেথড</th>
                                            <th class="text-start">ট্রানজেকশন আইডি / নোট</th>
                                            <th class="text-center">স্ট্যাটাস</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transactionsTableBody">
                                        <tr><td colspan="8" class="text-center py-4 text-muted">লেনদেন রেকর্ড লোড হচ্ছে...</td></tr>
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

<!-- Pay Supplier Due Modal -->
<div class="modal fade" id="paySupplierDueModal" tabindex="-1" aria-labelledby="paySupplierDueModalLabel" aria-hidden="true" style="z-index: 1085;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
            <div class="modal-header text-white py-3 px-4" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;">
                <h5 class="modal-title fw-bold" id="paySupplierDueModalLabel" style="font-size: 15px;">
                    <i class="fa-solid fa-hand-holding-dollar me-2"></i>সাপ্লাইয়ারের বকেয়া পরিশোধ (Pay Due)
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="paySupplierDueForm" onsubmit="submitSupplierPayment(event)">
                <div class="modal-body p-4">
                    <!-- Supplier Quick Info Box -->
                    <div class="bg-light p-3 rounded-3 mb-3 border">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="fw-bold text-dark fs-6" id="modalSupplierName">Supplier Name</span>
                            <span class="badge" style="background: #8C56D4; color: #fff;" id="modalSupplierId">ID</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">পরিশোধের সর্বমোট বকেয়া:</span>
                            <span class="fw-bold text-danger fs-6" id="modalSupplierTotalDue">৳ ০০.০০</span>
                        </div>
                    </div>

                    <!-- Payment Target Selector -->
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block text-dark small">পরিশোধের খাত (Payment Target) <span class="text-danger">*</span></label>
                        <div class="btn-group w-100" role="group" id="supplierCollectionTypeGroup">
                            <input type="radio" class="btn-check" name="supplier_collection_type" id="stype_all" value="all" checked onchange="onSupplierCollectionTypeChange()">
                            <label class="btn btn-outline-primary fw-bold py-2" for="stype_all" title="আগের ও পারচেজের উভয় বকেয়া পরিশোধ" style="font-size: 12px; border-color: #8C56D4; color: #8C56D4;">
                                <i class="fa-solid fa-layer-group me-1"></i> উভয় বকেয়া
                            </label>

                            <input type="radio" class="btn-check" name="supplier_collection_type" id="stype_previous" value="previous" onchange="onSupplierCollectionTypeChange()">
                            <label class="btn btn-outline-primary fw-bold py-2" for="stype_previous" title="শুধুমাত্র পুরানো বকেয়া পরিশোধ" style="font-size: 12px; border-color: #8C56D4; color: #8C56D4;">
                                <i class="fa-solid fa-clock-rotate-left me-1"></i> আগের বকেয়া
                            </label>

                            <input type="radio" class="btn-check" name="supplier_collection_type" id="stype_purchase" value="purchase" onchange="onSupplierCollectionTypeChange()">
                            <label class="btn btn-outline-primary fw-bold py-2" for="stype_purchase" title="শুধুমাত্র পারচেজ ইনভয়েসের বকেয়া পরিশোধ" style="font-size: 12px; border-color: #8C56D4; color: #8C56D4;">
                                <i class="fa-solid fa-cart-shopping me-1"></i> পারচেজ বকেয়া
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="supplierModalPaidAmount" class="form-label fw-bold text-dark small">পরিশোধের পরিমাণ (৳) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text fw-bold" style="color: #8C56D4;">৳</span>
                            <input type="number" step="0.01" class="form-control fw-bold fs-5 text-primary" id="supplierModalPaidAmount" placeholder="0.00" required style="border-radius: 0 10px 10px 0; color: #8C56D4 !important;">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="supplierModalPaymentMethod" class="form-label fw-bold text-dark small">পেমেন্ট মেথড</label>
                            <select class="form-select fw-semibold" id="supplierModalPaymentMethod" style="border-radius: 10px;">
                                <option value="Cash" selected>💵 Cash (নগদ)</option>
                                <option value="Bank">🏦 Bank Transfer</option>
                                <option value="bKash">📱 bKash</option>
                                <option value="Nagad">📱 Nagad</option>
                                <option value="Rocket">📱 Rocket</option>
                                <option value="Cheque">📄 Cheque</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="supplierModalCollectionDate" class="form-label fw-bold text-dark small">পরিশোধের তারিখ</label>
                            <input type="date" class="form-control fw-semibold" id="supplierModalCollectionDate" style="border-radius: 10px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="supplierModalNote" class="form-label fw-bold text-dark small">নোট / রেফারেন্স</label>
                        <input type="text" class="form-control" id="supplierModalNote" placeholder="পেমেন্ট সম্পর্কিত কোনো তথ্য লিখুন" style="border-radius: 10px;">
                    </div>
                </div>
                <div class="modal-footer bg-light py-3 px-4 border-top">
                    <button type="button" class="btn btn-secondary fw-bold rounded-pill px-4" data-bs-dismiss="modal">বাতিল</button>
                    <button type="submit" class="btn fw-bold rounded-pill px-4 shadow-xs text-white" style="background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%); border: none;">
                        <i class="fa-solid fa-check me-1"></i> পেমেন্ট জমা দিন
                    </button>
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
    const supplierProfileId = pathParts[pathParts.length - 1];

    document.addEventListener("DOMContentLoaded", () => {
        loadSupplierProfileData();
    });

    function onSupplierCollectionTypeChange() {
        const selectedType = document.querySelector('input[name="supplier_collection_type"]:checked')?.value || 'all';
        const modalTotalDue = document.getElementById('modalSupplierTotalDue');
        const inputAmount = document.getElementById('supplierModalPaidAmount');

        let targetMax = 0;
        let targetText = '';

        if (selectedType === 'previous') {
            targetMax = window.supplierPreviousDueVal;
            targetText = `৳ ${engToBanglaNumProf(targetMax.toFixed(2))} (শুধুমাত্র আগের বকেয়া)`;
        } else if (selectedType === 'purchase') {
            targetMax = window.supplierPurchaseDueVal;
            targetText = `৳ ${engToBanglaNumProf(targetMax.toFixed(2))} (শুধুমাত্র পারচেজ বকেয়া)`;
        } else {
            targetMax = window.supplierTotalDueVal;
            targetText = `৳ ${engToBanglaNumProf(targetMax.toFixed(2))} (আগের: ৳${engToBanglaNumProf(window.supplierPreviousDueVal.toFixed(2))} | পারচেজ: ৳${engToBanglaNumProf(window.supplierPurchaseDueVal.toFixed(2))})`;
        }

        modalTotalDue.innerText = targetText;
        inputAmount.value = targetMax > 0 ? targetMax.toFixed(2) : '';
    }

    async function loadSupplierProfileData() {
        try {
            const res = await axios.get(`/api/supplier-profile-data/${supplierProfileId}`, HeaderToken());
            if (res.data.status === 'success') {
                const supplier = res.data.supplier;
                const summary = res.data.summary;
                const purchases = res.data.purchases || [];
                const returns = res.data.returns || [];
                const transactions = res.data.transactions || [];

                window.supplierDbId = supplier.id;
                window.supplierPreviousDueVal = parseFloat(supplier.purchase_payable_amount || 0);
                window.supplierPurchaseDueVal = purchases.reduce((sum, p) => sum + parseFloat(p.due_amount || 0), 0);
                window.supplierReturnsVal = parseFloat(summary.total_returns || 0);
                window.supplierTotalDueVal = Math.max(0, window.supplierPreviousDueVal + window.supplierPurchaseDueVal - window.supplierReturnsVal);

                // Render Supplier Header
                $('#supplierName').text(supplier.name || 'N/A');
                $('#supplierIdBadge').text(supplier.supplier_id || 'SUP-0000');

                $('#supplierCompany').html(`<i class="fa-solid fa-building me-1 text-secondary"></i>কোম্পানি: ${supplier.company || 'N/A'}`);
                $('#supplierMobile').html(`<i class="fa-solid fa-phone me-1" style="color: #8C56D4;"></i>${engToBanglaNumProf(supplier.mobile || 'N/A')}`);
                $('#supplierEmail').html(`<i class="fa-solid fa-envelope me-1 text-primary"></i>${supplier.email || 'N/A'}`);
                $('#supplierAddress').html(`<i class="fa-solid fa-location-dot me-1 text-danger"></i>${supplier.address || 'N/A'}`);
                
                if (supplier.img_url) {
                    $('#supplierImg').attr('src', '/' + supplier.img_url);
                }

                // Render Summary Metrics in Bangla
                $('#supplierNetDue').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_due).toFixed(2))}`);
                $('#statTotalPurchases').text(engToBanglaNumProf(summary.total_purchases));
                $('#statTotalBilled').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_amount).toFixed(2))}`);
                $('#statTotalPaid').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_paid).toFixed(2))}`);
                $('#statTotalReturns').text(`৳ ${engToBanglaNumProf(parseFloat(summary.available_credit || 0).toFixed(2))}`);
                $('#statReturnSubtitle').text(`মোট রিটার্ন: ৳${engToBanglaNumProf(parseFloat(summary.total_returns || 0).toFixed(2))} | অ্যাডজাস্ট: ৳${engToBanglaNumProf(parseFloat(summary.total_returns_adjusted || 0).toFixed(2))}`);
                $('#statTotalDue').text(`৳ ${engToBanglaNumProf(parseFloat(summary.total_due).toFixed(2))}`);

                $('#purchasesCount').text(engToBanglaNumProf(purchases.length));
                $('#returnsCount').text(engToBanglaNumProf(returns.length));
                $('#transactionsCount').text(engToBanglaNumProf(transactions.length));

                // Pre-fill Modal Info
                $('#modalSupplierName').text(supplier.name || 'N/A');
                $('#modalSupplierId').text(supplier.supplier_id || 'SUP-0000');
                $('#supplierModalCollectionDate').val(new Date().toISOString().split('T')[0]);

                onSupplierCollectionTypeChange();

                // 1. Render Purchases Table & Mobile Cards
                const purchasesTbody = $('#purchasesTableBody');
                const purchasesCardList = $('#purchasesCardList');
                purchasesTbody.empty();
                purchasesCardList.empty();

                if (purchases.length === 0) {
                    purchasesTbody.html('<tr><td colspan="10" class="text-center py-4 text-muted">কোনো ক্রয় ইনভয়েস ডাটা পাওয়া যায়নি</td></tr>');
                    purchasesCardList.html('<div class="col-12 text-center py-4 text-muted bg-white rounded-3 border">কোনো ক্রয় ইনভয়েস ডাটা পাওয়া যায়নি</div>');
                } else {
                    purchases.forEach((item, index) => {
                        const statusBadge = item.payment_status === 'Fully Paid' ? 'bg-success-subtle text-success border border-success-subtle' :
                                            item.payment_status === 'Partial Paid' ? 'bg-warning-subtle text-warning border border-warning-subtle' : 'bg-danger-subtle text-danger border border-danger-subtle';

                        let barcodesHtml = '';
                        if (item.barcodes && Array.isArray(item.barcodes) && item.barcodes.length > 0) {
                            barcodesHtml = item.barcodes.map(c => `<span class="badge bg-light text-dark border me-1" style="font-family: monospace; font-size: 10px;">${c}</span>`).join('');
                        }

                        let paidDisplayHtml = `৳ ${engToBanglaNumProf(parseFloat(item.paid_amount).toFixed(2))}`;
                        if (item.return_adjustment_amount && parseFloat(item.return_adjustment_amount) > 0) {
                            paidDisplayHtml += `<br><span class="badge border" style="font-size: 11px; color: #0d9488; background: #f0fdfa;">+৳${engToBanglaNumProf(parseFloat(item.return_adjustment_amount).toFixed(2))} Adj</span>`;
                        }

                        // Desktop Table Row
                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(index + 1)}</td>
                                <td class="text-center fw-bold" style="color: #8C56D4;">${item.purchase_id}</td>
                                <td class="text-center">${engToBanglaNumProf(item.date)}</td>
                                <td class="text-start">${barcodesHtml || '<span class="text-muted small">N/A</span>'}</td>
                                <td class="text-start">${item.referance_no || '-'}</td>
                                <td class="text-end fw-bold">৳ ${engToBanglaNumProf(parseFloat(item.grand_subtotal).toFixed(2))}</td>
                                <td class="text-end fw-bold text-success">${paidDisplayHtml}</td>
                                <td class="text-end ${item.due_amount > 0 ? 'text-danger' : 'text-muted'} fw-bold">৳ ${engToBanglaNumProf(parseFloat(item.due_amount).toFixed(2))}</td>
                                <td class="text-center"><span class="badge ${statusBadge} px-2 py-1">${item.payment_status}</span></td>
                                <td class="text-center">
                                    <div class="d-inline-flex align-items-center gap-1.5">
                                        <a href="/purchase-invoice/${item.id}" class="btn btn-sm btn-outline-primary px-2 py-1 fw-bold d-inline-flex align-items-center gap-1.5" style="border-radius: 6px; font-size: 11.5px; border-color: #8C56D4; color: #8C56D4;" title="ভিউ ইনভয়েস">
                                            <i class="fa-solid fa-eye"></i><span>ভিউ</span>
                                        </a>
                                        <a href="/purchase-return/${item.id}" class="btn btn-sm px-2 py-1 fw-bold d-inline-flex align-items-center gap-1.5" style="border-radius: 6px; font-size: 11.5px; border: 1.5px solid #FDE68A; background: #FEF9EC; color: #D97706;" title="পণ্য ফেরত">
                                            <i class="fa-solid fa-rotate-left"></i><span>ফেরত</span>
                                        </a>
                                        <button type="button" onclick="printSinglePurchase(${item.id})" class="btn btn-sm btn-outline-secondary px-2 py-1 fw-bold d-inline-flex align-items-center gap-1.5" style="border-radius: 6px; font-size: 11.5px;" title="প্রিন্ট ইনভয়েস">
                                            <i class="fa-solid fa-print"></i><span>প্রিন্ট</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `;
                        purchasesTbody.append(row);

                        // Mobile / Tab Box Card (Tab = 2 col, Mobile = 1 col)
                        const mobileCard = `
                            <div class="col-12 col-md-6">
                                <div class="invoice-mobile-card d-flex flex-column justify-content-between h-100" style="cursor: pointer;" onclick="if(!event.target.closest('button') && !event.target.closest('a')) { window.location.href='/purchase-invoice/${item.id}'; }">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                                            <div class="d-flex align-items-center gap-1.5">
                                                <span class="badge bg-secondary-subtle text-secondary fw-bold" style="font-size: 10px;">#${index + 1}</span>
                                                <span class="badge bg-light fw-bold" style="color: #8C56D4; border: 1px solid #E5D5F7; font-size: 11px;">
                                                    <i class="fa-solid fa-receipt me-1"></i>${item.purchase_id}
                                                </span>
                                            </div>
                                            <div>
                                                <span class="badge ${statusBadge} px-2 py-1 fw-bold" style="font-size: 10.5px; border-radius: 12px;">
                                                    ${item.payment_status}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-2 mb-1">
                                            <div class="overflow-hidden">
                                                <div class="fw-bold text-dark" style="font-size: 13px;">
                                                    <i class="fa-regular fa-calendar me-1 text-muted"></i>${engToBanglaNumProf(item.date)}
                                                </div>
                                                <small class="text-muted text-truncate d-block" style="font-size: 11px;">
                                                    রেফারেন্স: ${item.referance_no || 'N/A'}
                                                </small>
                                                ${barcodesHtml ? `<div class="mt-1">${barcodesHtml}</div>` : ''}
                                            </div>
                                            <div class="text-end flex-shrink-0 ms-2">
                                                <div style="font-size: 10px; color: #64748b;">মোট: <strong class="text-dark">৳ ${engToBanglaNumProf(parseFloat(item.grand_subtotal).toFixed(2))}</strong></div>
                                                <div class="fw-bold ${item.due_amount > 0 ? 'text-danger' : 'text-success'}" style="font-size: 13px;">
                                                    ${item.due_amount > 0 ? 'বাকি: ৳ ' + engToBanglaNumProf(parseFloat(item.due_amount).toFixed(2)) : 'পরিশোধিত'}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mobile-card-actions pt-2 mt-2 border-top">
                                        <a href="/purchase-invoice/${item.id}" class="mobile-action-btn action-btn-profile flex-grow-1 text-decoration-none d-flex align-items-center justify-content-center gap-2" title="ইনভয়েস ভিউ">
                                            <i class="fa-solid fa-eye me-1"></i><span>ভিউ</span>
                                        </a>
                                        <a href="/purchase-return/${item.id}" class="mobile-action-btn action-btn-due flex-grow-1 text-decoration-none d-flex align-items-center justify-content-center gap-2" style="background: #FEF9EC; border-color: #FDE68A; color: #D97706;" title="পণ্য ফেরত">
                                            <i class="fa-solid fa-rotate-left me-1"></i><span>ফেরত</span>
                                        </a>
                                        <button type="button" onclick="event.stopPropagation(); printSinglePurchase(${item.id})" class="mobile-action-btn action-btn-due flex-grow-1 d-flex align-items-center justify-content-center gap-2" title="প্রিন্ট ইনভয়েস">
                                            <i class="fa-solid fa-print me-1"></i><span>প্রিন্ট</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        purchasesCardList.append(mobileCard);
                    });
                }

                // 2. Render Returns Table & Mobile Cards
                const returnsTbody = $('#returnsTableBody');
                const returnsCardList = $('#returnsCardList');
                returnsTbody.empty();
                returnsCardList.empty();

                if (returns.length === 0) {
                    returnsTbody.html('<tr><td colspan="6" class="text-center py-4 text-muted">কোনো পারচেজ রিটার্ন ডাটা পাওয়া যায়নি</td></tr>');
                    returnsCardList.html('<div class="col-12 text-center py-4 text-muted bg-white rounded-3 border">কোনো পারচেজ রিটার্ন ডাটা পাওয়া যায়নি</div>');
                } else {
                    returns.forEach((rItem, rIndex) => {
                        // Desktop Table Row
                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(rIndex + 1)}</td>
                                <td class="text-center fw-semibold text-dark">${engToBanglaNumProf(rItem.created_at_formatted || rItem.date)}</td>
                                <td class="text-center"><span class="badge border font-monospace" style="color: #0d9488; background: #f0fdfa;">${rItem.purchase_no}</span></td>
                                <td class="text-start fw-bold text-dark">${rItem.product_name}</td>
                                <td class="text-center"><span class="badge bg-light text-dark border px-2 py-1 fw-bold">${engToBanglaNumProf(rItem.quantity)} Pcs</span></td>
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
                                                    ${rItem.purchase_no}
                                                </span>
                                            </div>
                                            <div>
                                                <span class="badge bg-light text-dark border px-2 py-1 fw-bold" style="font-size: 10.5px;">
                                                    ${engToBanglaNumProf(rItem.quantity)} Pcs
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
                    transactionsTbody.html('<tr><td colspan="8" class="text-center py-4 text-muted">কোনো লেনদেন রেকর্ড পাওয়া যায়নি</td></tr>');
                    transactionsCardList.html('<div class="col-12 text-center py-4 text-muted bg-white rounded-3 border">কোনো লেনদেন রেকর্ড পাওয়া যায়নি</div>');
                } else {
                    transactions.forEach((trx, index) => {
                        // Desktop Table Row
                        const row = `
                            <tr>
                                <td class="text-center fw-bold">${engToBanglaNumProf(index + 1)}</td>
                                <td class="text-center">${engToBanglaNumProf(trx.created_at_formatted)}</td>
                                <td class="text-center fw-bold" style="color: #8C56D4;">${trx.purchase_id}</td>
                                <td class="text-end text-success fw-bold">৳ ${engToBanglaNumProf(parseFloat(trx.paid_amount).toFixed(2))}</td>
                                <td class="text-end text-muted">৳ ${engToBanglaNumProf(parseFloat(trx.discount_amount || 0).toFixed(2))}</td>
                                <td class="text-start fw-semibold"><i class="fa-solid fa-wallet me-1 text-secondary"></i>${trx.payment_method || 'Cash'}</td>
                                <td class="text-start text-muted">${trx.transaction_id || 'N/A'}</td>
                                <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">${trx.payment_status || 'Success'}</span></td>
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
                                                    ${trx.purchase_id || 'Direct Payment'}
                                                </span>
                                            </div>
                                            <div>
                                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 fw-bold" style="font-size: 10.5px; border-radius: 12px;">
                                                    ${trx.payment_status || 'Success'}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between gap-2 mb-1">
                                            <div class="overflow-hidden">
                                                <div class="fw-bold text-dark" style="font-size: 13px;">
                                                    <i class="fa-solid fa-wallet me-1 text-secondary"></i>${trx.payment_method || 'Cash'}
                                                </div>
                                                <small class="text-muted d-block text-truncate" style="font-size: 11px;">
                                                    ${trx.transaction_id || trx.created_at_formatted}
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
                alert("ত্রুটি: " + (res.data.message || "সাপ্লায়ার ডাটা লোড করতে ব্যর্থ হয়েছে।"));
            }
        } catch (err) {
            console.error(err);
            alert("ত্রুটি: " + (err.response?.data?.message || err.message || "সাপ্লায়ার প্রোফাইল লোড করা যায়নি।"));
        }
    }

    // Print Single Purchase Invoice
    function printSinglePurchase(id) {
        const printUrl = `/purchase-invoice/${id}`;
        const printWin = window.open(printUrl, '_blank');
        if (printWin) {
            printWin.focus();
        }
    }

    // Print Entire Active Table in CURRENT TAB with Anis Store Header & Supplier Details
    function printCurrentTabTable() {
        const activeTab = document.querySelector('#supplierProfileTabs .nav-link.active');
        const tabTarget = activeTab?.getAttribute('data-bs-target');
        const tabPane = document.querySelector(tabTarget);
        if (!tabPane) return;

        const tableEl = tabPane.querySelector('table');
        if (!tableEl) return;

        let tabReportTitle = 'সাপ্লায়ার বিবরণী';
        if (tabTarget === '#purchases-content') {
            tabReportTitle = 'সাপ্লায়ার ক্রয় ইনভয়েস বিবরণী';
        } else if (tabTarget === '#returns-content') {
            tabReportTitle = 'সাপ্লায়ার ক্রয় ফেরত বিবরণী';
        } else if (tabTarget === '#transactions-content') {
            tabReportTitle = 'সাপ্লায়ার লেনদেন হিস্ট্রি বিবরণী';
        }

        const supplierName = document.getElementById('supplierName')?.innerText.trim() || 'N/A';
        const supplierId = document.getElementById('supplierIdBadge')?.innerText.trim() || '';
        const supplierCompany = document.getElementById('supplierCompany')?.innerText.replace(/কোম্পানি:\s*/i, '').trim() || 'N/A';
        const supplierMobile = document.getElementById('supplierMobile')?.innerText.trim() || 'N/A';
        const supplierAddress = document.getElementById('supplierAddress')?.innerText.trim() || 'ঠিকানা নেই';
        const netDue = document.getElementById('supplierNetDue')?.innerText.trim() || '৳ ০.০০';
        const totalBilled = document.getElementById('statTotalBilled')?.innerText.trim() || '৳ ০.০০';
        const totalPaid = document.getElementById('statTotalPaid')?.innerText.trim() || '৳ ০.০০';
        const totalReturns = document.getElementById('statTotalReturns')?.innerText.trim() || '৳ ০.০০';

        // Create a clone of the desktop table
        const printTableClone = tableEl.cloneNode(true);
        printTableClone.removeAttribute('id');
        printTableClone.className = 'print-data-table';

        // Remove Action column (last column) if in purchases table
        if (tabTarget === '#purchases-content') {
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

        // Clean up buttons and unwanted interactive elements
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
                        <div class="print-meta-time">তারিখ: ${printDateStr} | সময়: ${printTimeStr}</div>
                    </div>
                </div>

                <!-- Supplier Meta Summary -->
                <div class="supplier-info-grid">
                    <div class="supplier-info-col">
                        <h3>সাপ্লায়ার তথ্য:</h3>
                        <p><strong>নাম:</strong> ${supplierName} (${supplierId})</p>
                        <p><strong>কোম্পানি:</strong> ${supplierCompany}</p>
                        <p><strong>মোবাইল:</strong> ${supplierMobile} | <strong>ঠিকানা:</strong> ${supplierAddress}</p>
                    </div>
                    <div class="supplier-info-col supplier-stats-col">
                        <p><strong>সর্বমোট বিল:</strong> ${totalBilled} | <strong>মোট পরিশোধ:</strong> ${totalPaid}</p>
                        <p><strong>ফেরত ক্রেডিট:</strong> ${totalReturns}</p>
                        <p><strong>অবশিষ্ট দেনা (Net Due):</strong> <span class="supplier-due-highlight">${netDue}</span></p>
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

        let printBox = document.getElementById('supplierPrintContainer');
        if (!printBox) {
            printBox = document.createElement('div');
            printBox.id = 'supplierPrintContainer';
            document.body.appendChild(printBox);
        }
        printBox.innerHTML = printHtml;

        // Trigger native print in CURRENT TAB directly (mobile/tablet/desktop supported)
        window.print();
    }

    async function submitSupplierPayment(event) {
        event.preventDefault();

        const collectionType = document.querySelector('input[name="supplier_collection_type"]:checked')?.value || 'all';
        const paidAmount = parseFloat(document.getElementById('supplierModalPaidAmount').value) || 0;
        const paymentMethod = document.getElementById('supplierModalPaymentMethod').value;
        const collectionDate = document.getElementById('supplierModalCollectionDate').value;
        const note = document.getElementById('supplierModalNote').value;

        if (paidAmount <= 0) {
            alert("অনুগ্রহ করে 0 টাকার বেশি পরিশোধের সঠিক পরিমাণ লিখুন।");
            return;
        }

        try {
            if (typeof showLoader === 'function') showLoader();

            const payload = {
                supplier_id: window.supplierDbId,
                collection_type: collectionType,
                paid_amount: paidAmount,
                payment_method: paymentMethod,
                payment_date: collectionDate,
                note: note
            };

            const res = await axios.post('/supplier-payment-details-update', payload, HeaderToken());
            if (typeof hideLoader === 'function') hideLoader();

            if (res.data && res.data.status === 'success') {
                if (typeof successToast === 'function') {
                    successToast(res.data.message || "🎉 সাপ্লায়ার পেমেন্ট সফলভাবে জমা হয়েছে!");
                } else {
                    alert(res.data.message || "🎉 সাপ্লায়ার পেমেন্ট সফলভাবে জমা হয়েছে!");
                }

                const modalEl = document.getElementById('paySupplierDueModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();

                loadSupplierProfileData();
            } else {
                alert(res.data?.message || "পেমেন্ট জমা করতে সমস্যা হয়েছে!");
            }
        } catch (err) {
            if (typeof hideLoader === 'function') hideLoader();
            console.error(err);
            alert("ত্রুটি: " + (err.response?.data?.message || err.message || "পেমেন্ট রিকোয়েস্ট সফল হয়নি।"));
        }
    }
</script>
