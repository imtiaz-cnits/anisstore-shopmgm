<style>
    /* ===== User Role & Permission Styling per rules.md (#8C56D4 Royal Purple) ===== */
    :root {
        --ur-primary: #8C56D4;
        --ur-primary-hover: #793FC5;
        --ur-primary-light: #FAF7FD;
        --ur-border-subtle: #E5D5F7;
    }

    /* Header Icons */
    .ur-header-icon-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1.5px solid #cbd5e1;
        background: #ffffff;
        color: #8C56D4;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 14.5px;
        box-shadow: 0 1px 3px rgba(140, 86, 212, 0.08);
    }
    .ur-header-icon-btn:hover {
        background: #FAF7FD;
        border-color: #8C56D4;
        color: #793FC5;
        transform: translateY(-1px);
    }

    /* Expandable Search Input */
    .ur-search-input {
        height: 42px !important;
        width: 100% !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding-left: 14px !important;
        padding-right: 14px !important;
        font-size: 13.5px !important;
        background-color: #ffffff !important;
        color: #1e293b !important;
        transition: all 0.2s ease !important;
    }
    .ur-search-input:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
        outline: none !important;
    }

    .ur-search-close-btn {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #ef4444;
        color: #ffffff;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        flex-shrink: 0;
        transition: all 0.2s ease;
    }
    .ur-search-close-btn:hover {
        background: #dc2626;
    }

    /* Metric Cards with rounded corners per rules.md */
    .ur-metric-card {
        border-radius: 16px !important;
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05) !important;
        color: #ffffff !important;
        transition: all 0.2s ease;
    }
    .ur-metric-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .ur-metric-icon-box {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    /* Modal Form Inputs */
    .ur-modal-input,
    .ur-modal-select {
        height: 44px !important;
        width: 100% !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 8px 14px !important;
        font-size: 14px !important;
        background-color: #ffffff !important;
        color: #1e293b !important;
        transition: all 0.2s ease !important;
    }
    .ur-modal-input:focus,
    .ur-modal-select:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
        background: #ffffff !important;
        outline: none !important;
    }

    /* Action Buttons in Table & Cards */
    .ur-action-btn {
        height: 34px;
        padding: 0 12px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        border: 1px solid transparent;
        text-decoration: none;
        gap: 6px;
    }
    .ur-action-edit {
        background: #F3ECFB;
        color: #8C56D4;
        border-color: #E5D5F7;
    }
    .ur-action-edit:hover {
        background: #8C56D4;
        color: #ffffff;
    }
    .ur-action-delete {
        background: #FEE2E2;
        color: #DC2626;
        border-color: #FECACA;
    }
    .ur-action-delete:hover {
        background: #DC2626;
        color: #ffffff;
    }

    /* Table Container Styling */
    .ur-table-container {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #E2E8F0;
        overflow: hidden;
    }
    .ur-table-container thead th {
        background-color: #f8fafc;
        color: #475569;
        font-size: 12.5px;
        font-weight: 600;
        border-bottom: 1.5px solid #e2e8f0;
    }
    .ur-table-container tbody tr:hover {
        background-color: #FAF7FD;
    }

    /* Mobile & Tablet Box Cards (< 992px) */
    .ur-card-item {
        background: #ffffff;
        border: 1px solid #E2E8F0 !important;
        border-radius: 14px !important;
        padding: 14px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
        transition: all 0.2s ease;
    }
    .ur-card-item:hover {
        border-color: #D2B7F1 !important;
        box-shadow: 0 6px 16px rgba(140, 86, 212, 0.1) !important;
    }

    @media (max-width: 767.98px) {
        .ur-card-col {
            width: 100% !important;
            flex: 0 0 100% !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991.98px) {
        .ur-card-col {
            width: calc(50% - 5px) !important;
            flex: 0 0 calc(50% - 5px) !important;
        }
    }

    /* Form Switch Toggle Styling per rules.md */
    .form-check-input:checked {
        background-color: #8C56D4 !important;
        border-color: #8C56D4 !important;
    }
    .ur-toggle-card {
        background: #ffffff;
        border: 1px solid #E2E8F0;
        border-radius: 10px;
        padding: 10px 14px;
        transition: all 0.2s ease;
    }
    .ur-toggle-card:hover {
        border-color: #D2B7F1;
        background: #FAF7FD;
    }

    /* Floating Action Button (FAB per rules.md 7.6) */
    .ur-floating-btn {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 999;
        width: 52px;
        height: 52px;
        border-radius: 50% !important;
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 20px rgba(140, 86, 212, 0.4);
        border: none;
        cursor: pointer;
        font-size: 20px;
        transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .ur-floating-btn:hover {
        transform: scale(1.08) translateY(-3px);
        box-shadow: 0 10px 24px rgba(140, 86, 212, 0.5);
        color: #ffffff;
    }

    /* Modals: Sticky Header, Sticky Footer & Auto-Scroll Body on Mobile/Tablet (< 992px) */
    .ur-modal .modal-content {
        border-radius: 18px !important;
        border: 1px solid rgba(226, 232, 240, 0.9) !important;
        overflow: hidden !important;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3) !important;
        display: flex !important;
        flex-direction: column !important;
    }

    .ur-modal-header-purple {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        padding: 14px 18px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        color: #ffffff !important;
        border-bottom: 1px solid #E5D5F7 !important;
        position: sticky !important;
        top: 0 !important;
        z-index: 30 !important;
        flex-shrink: 0 !important;
    }

    .ur-btn-close-red {
        background: #ef4444 !important;
        color: #ffffff !important;
        border-radius: 50% !important;
        width: 32px !important;
        height: 32px !important;
        border: none !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
    }
    .ur-btn-close-red:hover {
        background: #dc2626 !important;
        transform: rotate(90deg) scale(1.05);
    }

    .ur-modal form {
        display: flex !important;
        flex-direction: column !important;
        flex: 1 1 auto !important;
        min-height: 0 !important;
        overflow: hidden !important;
        margin: 0 !important;
    }

    .ur-modal .modal-body {
        flex: 1 1 auto !important;
        min-height: 0 !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch !important;
    }

    .ur-modal .modal-footer {
        position: sticky !important;
        bottom: 0 !important;
        z-index: 30 !important;
        flex-shrink: 0 !important;
        background: #ffffff !important;
        border-top: 1px solid #e2e8f0 !important;
    }

    @media (max-width: 991.98px) {
        .page-content {
            background-color: #ffffff !important;
            padding: 10px !important;
        }
        .ur-modal {
            padding: 0 !important;
        }
        .ur-modal .modal-dialog {
            margin: 0 !important;
            margin-top: auto !important;
            width: 100% !important;
            max-width: 100% !important;
            height: 100% !important;
            height: 100dvh !important;
            display: flex !important;
            align-items: flex-end !important;
            justify-content: flex-end !important;
        }
        .ur-modal .modal-content {
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            width: 100% !important;
            max-height: 85vh !important;
            max-height: 85dvh !important;
            height: auto !important;
            display: flex !important;
            flex-direction: column !important;
            overflow: hidden !important;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.25) !important;
            animation: slideUpUrModal 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }
        .ur-modal form {
            display: flex !important;
            flex-direction: column !important;
            flex: 1 1 auto !important;
            min-height: 0 !important;
            overflow: hidden !important;
        }
        .ur-modal .modal-body {
            flex: 1 1 auto !important;
            min-height: 0 !important;
            overflow-y: auto !important;
            -webkit-overflow-scrolling: touch !important;
        }
        .ur-modal .modal-footer {
            position: sticky !important;
            bottom: 0 !important;
            z-index: 35 !important;
            flex-shrink: 0 !important;
            box-shadow: 0 -4px 14px rgba(0, 0, 0, 0.08) !important;
        }
    }

    @keyframes slideUpUrModal {
        from { transform: translateY(100%); }
        to { transform: translateY(0); }
    }

    /* ===== Universal Dark Mode Rules per rules.md ===== */
    body[light-mode="dark"] .page-content,
    body[data-layout-mode="dark"] .page-content,
    html[light-mode="dark"] .page-content,
    html[data-layout-mode="dark"] .page-content,
    body.dark-mode .page-content {
        background-color: #0f172a !important;
    }

    body[light-mode="dark"] .ur-header-icon-btn,
    body[data-layout-mode="dark"] .ur-header-icon-btn,
    body.dark-mode .ur-header-icon-btn {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #D2B7F1 !important;
    }

    body[light-mode="dark"] .ur-metric-card,
    body[data-layout-mode="dark"] .ur-metric-card,
    body.dark-mode .ur-metric-card {
        background: #1e293b !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .ur-table-container,
    body[data-layout-mode="dark"] .ur-table-container,
    body.dark-mode .ur-table-container,
    html[light-mode="dark"] .ur-table-container,
    html[data-layout-mode="dark"] .ur-table-container,
    body[light-mode="dark"] .ur-card-item,
    body[data-layout-mode="dark"] .ur-card-item,
    body.dark-mode .ur-card-item,
    html[light-mode="dark"] .ur-card-item,
    html[data-layout-mode="dark"] .ur-card-item {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .ur-table-container thead th,
    body[data-layout-mode="dark"] .ur-table-container thead th,
    body.dark-mode .ur-table-container thead th {
        background-color: #0f172a !important;
        color: #cbd5e1 !important;
        border-bottom-color: #334155 !important;
    }
    body[light-mode="dark"] .ur-table-container tbody tr,
    body[data-layout-mode="dark"] .ur-table-container tbody tr,
    body.dark-mode .ur-table-container tbody tr {
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .ur-table-container tbody tr:hover,
    body[data-layout-mode="dark"] .ur-table-container tbody tr:hover,
    body.dark-mode .ur-table-container tbody tr:hover {
        background-color: rgba(140, 86, 212, 0.08) !important;
    }

    body[light-mode="dark"] .ur-card-item:hover,
    body[data-layout-mode="dark"] .ur-card-item:hover,
    body.dark-mode .ur-card-item:hover {
        border-color: #8C56D4 !important;
    }

    body[light-mode="dark"] .ur-modal .modal-content,
    body[data-layout-mode="dark"] .ur-modal .modal-content,
    body.dark-mode .ur-modal .modal-content,
    html[light-mode="dark"] .ur-modal .modal-content,
    html[data-layout-mode="dark"] .ur-modal .modal-content {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .ur-modal .modal-body,
    body[data-layout-mode="dark"] .ur-modal .modal-body,
    body.dark-mode .ur-modal .modal-body {
        background-color: #1e293b !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .ur-modal .modal-footer,
    body[data-layout-mode="dark"] .ur-modal .modal-footer,
    body.dark-mode .ur-modal .modal-footer {
        background-color: #1e293b !important;
        border-top-color: #334155 !important;
    }

    body[light-mode="dark"] .ur-search-input,
    body[data-layout-mode="dark"] .ur-search-input,
    body.dark-mode .ur-search-input,
    body[light-mode="dark"] .ur-modal-input,
    body[data-layout-mode="dark"] .ur-modal-input,
    body.dark-mode .ur-modal-input,
    body[light-mode="dark"] .ur-modal-select,
    body[data-layout-mode="dark"] .ur-modal-select,
    body.dark-mode .ur-modal-select {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .ur-toggle-card,
    body[data-layout-mode="dark"] .ur-toggle-card,
    body.dark-mode .ur-toggle-card {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .ur-toggle-card:hover,
    body[data-layout-mode="dark"] .ur-toggle-card:hover,
    body.dark-mode .ur-toggle-card:hover {
        border-color: #8C56D4 !important;
    }

    body[light-mode="dark"] .ur-guideline-card,
    body[data-layout-mode="dark"] .ur-guideline-card,
    body.dark-mode .ur-guideline-card {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] .ur-guideline-card .card-header,
    body[data-layout-mode="dark"] .ur-guideline-card .card-header,
    body.dark-mode .ur-guideline-card .card-header {
        background-color: #1e293b !important;
        border-bottom-color: #334155 !important;
    }
    body[light-mode="dark"] .ur-guideline-box,
    body[data-layout-mode="dark"] .ur-guideline-box,
    body.dark-mode .ur-guideline-box {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }

    body[light-mode="dark"] .ur-action-edit,
    body[data-layout-mode="dark"] .ur-action-edit,
    body.dark-mode .ur-action-edit {
        background: #260B4A !important;
        color: #D2B7F1 !important;
        border-color: #532391 !important;
    }
    body[light-mode="dark"] .ur-action-edit:hover,
    body[data-layout-mode="dark"] .ur-action-edit:hover,
    body.dark-mode .ur-action-edit:hover {
        background: #8C56D4 !important;
        color: #ffffff !important;
    }
    body[light-mode="dark"] .ur-action-delete,
    body[data-layout-mode="dark"] .ur-action-delete,
    body.dark-mode .ur-action-delete {
        background: rgba(239, 68, 68, 0.18) !important;
        color: #f87171 !important;
        border-color: rgba(239, 68, 68, 0.3) !important;
    }
    body[light-mode="dark"] .ur-action-delete:hover,
    body[data-layout-mode="dark"] .ur-action-delete:hover,
    body.dark-mode .ur-action-delete:hover {
        background: #DC2626 !important;
        color: #ffffff !important;
    }

    body[light-mode="dark"] .text-dark,
    body[data-layout-mode="dark"] .text-dark,
    body.dark-mode .text-dark,
    html[light-mode="dark"] .text-dark,
    html[data-layout-mode="dark"] .text-dark {
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .border,
    body[data-layout-mode="dark"] .border,
    body.dark-mode .border,
    body[light-mode="dark"] .border-bottom,
    body[data-layout-mode="dark"] .border-bottom,
    body.dark-mode .border-bottom,
    body[light-mode="dark"] .border-top,
    body[data-layout-mode="dark"] .border-top,
    body.dark-mode .border-top {
        border-color: #334155 !important;
    }
</style>

<div class="main-content">
    <div class="page-content" style="padding: 10px !important;">
        <div class="container-fluid px-0">

            <!-- Page Header (Search Toggle Icon on right per user request) -->
            <div class="d-flex align-items-center justify-content-between gap-2 mb-3 pb-2 border-bottom">
                <div class="d-flex align-items-center gap-2 flex-grow-1 overflow-hidden">
                    <span style="display: inline-block; width: 4.5px; height: 26px; background: #8C56D4; border-radius: 2px; margin-right: 6px; flex-shrink: 0;"></span>
                    <div class="rounded-3 d-none d-lg-flex align-items-center justify-content-center flex-shrink-0" style="width: 38px; height: 38px; background: #F3ECFB; color: #8C56D4;">
                        <i class="fa-solid fa-user-shield fs-6"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0 text-dark d-flex align-items-center gap-1.5" style="font-size: 19px; line-height: 1.3;">
                            <span>ইউজার রোল ও পারমিশন ম্যানেজমেন্ট</span>
                        </h4>
                    </div>
                </div>

                <!-- Right: Search toggle icon button -->
                <div class="flex-shrink-0">
                    <button type="button" id="searchToggleBtn" class="ur-header-icon-btn" onclick="toggleSearchBar()" title="ইউজার অনুসন্ধান">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>

            <!-- Expandable Search Bar below header (Opens smoothly on search icon click) -->
            <div id="searchWrap" class="mb-3 d-none position-relative">
                <div class="d-flex align-items-center gap-2 mb-0">
                    <div class="position-relative flex-grow-1 mb-0">
                        <input type="text" id="userSearchInput" class="ur-search-input mb-0" placeholder="🔍 ইউজার খুঁজুন (নাম, মোবাইল, ইমেইল, রোল)..." autocomplete="off" />
                    </div>
                    <button type="button" class="ur-search-close-btn mb-0" onclick="closeSearchBar()" title="বন্ধ করুন">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <!-- 4 Metrics Summary Cards (Tablet & Desktop: 4 in 1 row; Mobile: 2 per row) -->
            <div class="row g-2 g-md-3 mb-4">
                <!-- Card 1: মোট সিস্টেম ইউজার -->
                <div class="col-6 col-md-3">
                    <div class="card ur-metric-card h-100 p-3" style="background: linear-gradient(135deg, #672EB0 0%, #8C56D4 100%);">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-white-50 small fw-bold text-uppercase d-block text-truncate" style="font-size: 11px;">মোট ইউজার</span>
                                <h3 class="fw-bold text-white mb-0 mt-1" id="totalUserCount" style="font-size: 22px;">0</h3>
                            </div>
                            <div class="ur-metric-icon-box">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: অ্যাডমিন / সুপার অ্যাডমিন -->
                <div class="col-6 col-md-3">
                    <div class="card ur-metric-card h-100 p-3" style="background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-white-50 small fw-bold text-uppercase d-block text-truncate" style="font-size: 11px;">অ্যাডমিন</span>
                                <h3 class="fw-bold text-white mb-0 mt-1" id="adminCount" style="font-size: 22px;">0</h3>
                            </div>
                            <div class="ur-metric-icon-box">
                                <i class="fa-solid fa-crown"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: ক্যাশিয়ার / পস অপারেটর -->
                <div class="col-6 col-md-3">
                    <div class="card ur-metric-card h-100 p-3" style="background: linear-gradient(135deg, #c2410c 0%, #ea580c 100%);">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-white-50 small fw-bold text-uppercase d-block text-truncate" style="font-size: 11px;">ক্যাশিয়ার</span>
                                <h3 class="fw-bold text-white mb-0 mt-1" id="cashierCount" style="font-size: 22px;">0</h3>
                            </div>
                            <div class="ur-metric-icon-box">
                                <i class="fa-solid fa-cash-register"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: এক্যাউন্টেন্ট / ম্যানেজার -->
                <div class="col-6 col-md-3">
                    <div class="card ur-metric-card h-100 p-3" style="background: linear-gradient(135deg, #0f766e 0%, #0d9488 100%);">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-white-50 small fw-bold text-uppercase d-block text-truncate" style="font-size: 11px;">একাউন্টেন্ট</span>
                                <h3 class="fw-bold text-white mb-0 mt-1" id="managerCount" style="font-size: 22px;">0</h3>
                            </div>
                            <div class="ur-metric-icon-box">
                                <i class="fa-solid fa-calculator"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User List Header -->
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-user-group" style="color: #8C56D4;"></i>
                    <span>সিস্টেম ইউজার ও পারমিশন তালিকা</span>
                </h5>
            </div>

            <!-- Desktop Table View (>= 992px) -->
            <div class="table-responsive d-none d-lg-block ur-table-container shadow-sm mb-4">
                <table class="table table-hover align-middle mb-0" id="userTable">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3">ইউজার তথ্য</th>
                            <th class="py-3">মোবাইল নম্বর</th>
                            <th class="py-3">রোল (Role)</th>
                            <th class="py-3">সক্রিয় টগল পারমিশন</th>
                            <th class="py-3">স্ট্যাটাস</th>
                            <th class="text-end pe-4 py-3" style="width: 150px;">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="spinner-border spinner-border-sm me-2" style="color: #8C56D4;" role="status"></div>
                                <span class="text-muted">ইউজার তালিকা লোড হচ্ছে...</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Mobile & Tablet Box-Type Card Layout (< 992px per rules.md 8.3) -->
            <div id="userMobileCardList" class="d-flex flex-wrap d-lg-none mb-4" style="gap: 10px !important;">
                <div class="col-12 text-center py-4 text-muted w-100 ur-card-item rounded-3">
                    <div class="spinner-border spinner-border-sm me-2" style="color: #8C56D4;" role="status"></div>
                    <span>ইউজার তালিকা লোড হচ্ছে...</span>
                </div>
            </div>

            <!-- Role Permission Matrix Info Box -->
            <div class="card ur-guideline-card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2 fs-6">
                        <i class="fa-solid fa-sliders" style="color: #8C56D4;"></i>
                        <span>মডিউল পারমিশন টগল গাইডলাইন (Live Module Access)</span>
                    </h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="p-3 rounded-3 border h-100 ur-guideline-box">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge bg-danger text-white px-2 py-1"><i class="fa-solid fa-crown me-1"></i> Admin / Super Admin</span>
                                </div>
                                <p class="small text-muted mb-0">সব মডিউল টগল অন 🟢 (POS, Product, Purchase, Customer, Expense, Reports & Users)।</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 rounded-3 border h-100 ur-guideline-box">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge bg-primary text-white px-2 py-1"><i class="fa-solid fa-user-gear me-1"></i> Store Manager</span>
                                </div>
                                <p class="small text-muted mb-0">পস, প্রোডাক্ট, পারচেজ, কাস্টমার, সাপ্লায়ার ও রিপোর্ট টগল অন 🟢। ইউজার ফাইল অফ 🔴।</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 rounded-3 border h-100 ur-guideline-box">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge text-white px-2 py-1" style="background: #ea580c;"><i class="fa-solid fa-cash-register me-1"></i> Cashier / POS</span>
                                </div>
                                <p class="small text-muted mb-0">শুধুমাত্র পস বিলিং (POS) ও সেলস রিটার্ন টগল অন 🟢। ব্যাকঅফিস মডিউল অফ 🔴।</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 rounded-3 border h-100 ur-guideline-box">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge text-white px-2 py-1" style="background-color: #8C56D4;"><i class="fa-solid fa-calculator me-1"></i> Accountant</span>
                                </div>
                                <p class="small text-muted mb-0">কাস্টমার/সাপ্লায়ার ডিউ, ডেইলি ইনকাম-এক্সপেন্স লেজার ও রিপোর্ট টগল অন 🟢।</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Floating Add User Action Button (FAB per rules.md 7.6) -->
<button type="button" data-bs-toggle="modal" data-bs-target="#createUserModal" onclick="resetCreateForm()" class="ur-floating-btn" title="নতুন ইউজার যুক্ত করুন">
    <i class="fa-solid fa-plus"></i>
</button>

<!-- Modal: Create New User (Bottom Sheet on Mobile with Auto-Focus Keyboard) -->
<div class="modal fade ur-modal" id="createUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="ur-modal-header-purple">
                <div class="d-flex align-items-center gap-2">
                    <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-25 rounded-circle" style="width: 32px; height: 32px;">
                        <i class="fa-solid fa-user-plus text-white fs-6"></i>
                    </div>
                    <h5 class="modal-title fw-bold text-white fs-6 mb-0">নতুন ইউজার তৈরি ও পারমিশন টগল</h5>
                </div>
                <button type="button" class="ur-btn-close-red" data-bs-dismiss="modal" aria-label="Close" id="createUserModalCloseBtn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form id="createUserForm">
                <div class="modal-body p-3 p-md-4">
                    <div class="row g-2 mb-2">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">ইউজারের নাম <span class="text-danger">*</span></label>
                            <input type="text" id="new_name" class="ur-modal-input" placeholder="ইউজারের নাম লিখুন" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <input type="text" id="new_mobile" inputmode="numeric" pattern="[0-9]*" class="ur-modal-input" placeholder="017XXXXXXXX" required>
                        </div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">ইমেইল এড্রেস (ঐচ্ছিক)</label>
                            <input type="email" id="new_email" class="ur-modal-input" placeholder="user@domain.com">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">পাসওয়ার্ড <span class="text-danger">*</span></label>
                            <input type="password" id="new_password" class="ur-modal-input" placeholder="নূন্যতম ৪ অক্ষর" required>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">সিস্টেম রোল (Role) <span class="text-danger">*</span></label>
                            <select id="new_role" class="ur-modal-select" onchange="applyRolePresets('new', this.value)" required>
                                <option value="admin">👑 Admin / Super Admin</option>
                                <option value="manager">👨‍💼 Store Manager</option>
                                <option value="cashier" selected>🛒 Cashier / POS Operator</option>
                                <option value="accountant">📊 Accountant / Bookkeeper</option>
                                <option value="users">👤 General User</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">একাউন্ট স্ট্যাটাস <span class="text-danger">*</span></label>
                            <select id="new_status" class="ur-modal-select" required>
                                <option value="approved" selected>Approved (সক্রিয়)</option>
                                <option value="pending">Pending (অপেক্ষমান)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Modern Module Toggle Permission Section -->
                    <div class="border rounded-4 p-3 ur-guideline-box">
                        <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2" style="font-size: 13.5px;">
                            <i class="fa-solid fa-toggle-on" style="color: #8C56D4;"></i>
                            <span>মডিউল এক্সেস পারমিশন টগল (ON / OFF)</span>
                        </h6>
                        <div class="row g-2" id="new_permission_toggles">
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="new_perm_pos">
                                        <i class="fa-solid fa-cash-register text-success me-2"></i> POS Billing & Sales
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="new_perm_pos" checked>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="new_perm_product">
                                        <i class="fa-solid fa-boxes-stacked text-primary me-2"></i> Product & Inventory
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="new_perm_product">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="new_perm_purchase">
                                        <i class="fa-solid fa-truck text-warning me-2"></i> Purchase & Supplier
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="new_perm_purchase">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="new_perm_customer">
                                        <i class="fa-solid fa-users text-info me-2"></i> Customer & Dues
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="new_perm_customer">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="new_perm_expense">
                                        <i class="fa-solid fa-wallet text-danger me-2"></i> Financial Ledger
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="new_perm_expense">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="new_perm_report">
                                        <i class="fa-solid fa-chart-pie text-secondary me-2"></i> Reports & Analytics
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="new_perm_report">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-3 bg-light d-flex align-items-center gap-2">
                    <button type="button" class="btn flex-grow-1 py-2 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="height: 44px; border-radius: 10px; background-color: #ef4444 !important; border: none;">
                        <i class="fa-solid fa-xmark me-1"></i> বাতিল
                    </button>
                    <button type="submit" class="btn flex-grow-1 py-2 fw-bold text-white shadow-sm" id="createUserSaveBtn" style="height: 44px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25);">
                        <i class="fa-solid fa-check me-1"></i> ইউজার সেভ করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Edit User Role & Toggle Permissions (Bottom Sheet with Auto-Focus Keyboard) -->
<div class="modal fade ur-modal" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="ur-modal-header-purple">
                <div class="d-flex align-items-center gap-2">
                    <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-25 rounded-circle" style="width: 32px; height: 32px;">
                        <i class="fa-solid fa-user-gear text-white fs-6"></i>
                    </div>
                    <h5 class="modal-title fw-bold text-white fs-6 mb-0">ইউজার রোল ও টগল পারমিশন সম্পাদনা</h5>
                </div>
                <button type="button" class="ur-btn-close-red" data-bs-dismiss="modal" aria-label="Close" id="editUserModalCloseBtn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form id="editUserForm">
                <input type="hidden" id="edit_user_id">
                <div class="modal-body p-3 p-md-4">
                    <div class="row g-2 mb-2">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">ইউজারের নাম <span class="text-danger">*</span></label>
                            <input type="text" id="edit_name" class="ur-modal-input" placeholder="ইউজারের নাম" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">মোবাইল নম্বর <span class="text-danger">*</span></label>
                            <input type="text" id="edit_mobile" inputmode="numeric" pattern="[0-9]*" class="ur-modal-input" placeholder="017XXXXXXXX" required>
                        </div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">ইমেইল এড্রেস (ঐচ্ছিক)</label>
                            <input type="email" id="edit_email" class="ur-modal-input" placeholder="user@domain.com">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">নতুন পাসওয়ার্ড (ঐচ্ছিক)</label>
                            <input type="password" id="edit_password" class="ur-modal-input" placeholder="পরিবর্তন না করতে চাইলে ফাঁকা রাখুন">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">সিস্টেম রোল (Role) <span class="text-danger">*</span></label>
                            <select id="edit_role" class="ur-modal-select" onchange="applyRolePresets('edit', this.value)" required>
                                <option value="admin">👑 Admin / Super Admin</option>
                                <option value="manager">👨‍💼 Store Manager</option>
                                <option value="cashier">🛒 Cashier / POS Operator</option>
                                <option value="accountant">📊 Accountant / Bookkeeper</option>
                                <option value="users">👤 General User</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold small text-muted mb-1">স্ট্যাটাস (Status) <span class="text-danger">*</span></label>
                            <select id="edit_status" class="ur-modal-select" required>
                                <option value="approved">Approved (সক্রিয়)</option>
                                <option value="pending">Pending (অপেক্ষমান)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Modern Edit Module Toggle Permission Section -->
                    <div class="border rounded-4 p-3 ur-guideline-box">
                        <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2" style="font-size: 13.5px;">
                            <i class="fa-solid fa-sliders" style="color: #8C56D4;"></i>
                            <span>মডিউল এক্সেস পারমিশন টগল (ON / OFF)</span>
                        </h6>
                        <div class="row g-2">
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="edit_perm_pos">
                                        <i class="fa-solid fa-cash-register text-success me-2"></i> POS Billing & Sales
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="edit_perm_pos">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="edit_perm_product">
                                        <i class="fa-solid fa-boxes-stacked text-primary me-2"></i> Product & Inventory
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="edit_perm_product">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="edit_perm_purchase">
                                        <i class="fa-solid fa-truck text-warning me-2"></i> Purchase & Supplier
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="edit_perm_purchase">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="edit_perm_customer">
                                        <i class="fa-solid fa-users text-info me-2"></i> Customer & Dues
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="edit_perm_customer">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="edit_perm_expense">
                                        <i class="fa-solid fa-wallet text-danger me-2"></i> Financial Ledger
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="edit_perm_expense">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-check form-switch ur-toggle-card d-flex align-items-center justify-content-between m-0">
                                    <label class="form-check-label fw-bold text-dark mb-0 cursor-pointer small" for="edit_perm_report">
                                        <i class="fa-solid fa-chart-pie text-secondary me-2"></i> Reports & Analytics
                                    </label>
                                    <input class="form-check-input fs-5 m-0" type="checkbox" id="edit_perm_report">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-3 bg-light d-flex align-items-center gap-2">
                    <button type="button" class="btn flex-grow-1 py-2 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="height: 44px; border-radius: 10px; background-color: #ef4444 !important; border: none;">
                        <i class="fa-solid fa-xmark me-1"></i> বাতিল
                    </button>
                    <button type="submit" class="btn flex-grow-1 py-2 fw-bold text-white shadow-sm" id="editUserSaveBtn" style="height: 44px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25);">
                        <i class="fa-solid fa-arrows-rotate me-1"></i> আপডেট করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let allUsersData = [];

    // Search Toggle Functions
    function toggleSearchBar() {
        const wrap = document.getElementById('searchWrap');
        if (wrap) {
            wrap.classList.toggle('d-none');
            if (!wrap.classList.contains('d-none')) {
                const input = document.getElementById('userSearchInput');
                if (input) input.focus();
            }
        }
    }

    function closeSearchBar() {
        const wrap = document.getElementById('searchWrap');
        const input = document.getElementById('userSearchInput');
        if (input) {
            input.value = '';
            input.dispatchEvent(new Event('input'));
        }
        if (wrap) wrap.classList.add('d-none');
    }

    // Apply Default Preset Toggles based on Role
    function applyRolePresets(prefix, role) {
        const setToggles = (pos, prod, pur, cust, exp, rep) => {
            document.getElementById(`${prefix}_perm_pos`).checked = pos;
            document.getElementById(`${prefix}_perm_product`).checked = prod;
            document.getElementById(`${prefix}_perm_purchase`).checked = pur;
            document.getElementById(`${prefix}_perm_customer`).checked = cust;
            document.getElementById(`${prefix}_perm_expense`).checked = exp;
            document.getElementById(`${prefix}_perm_report`).checked = rep;
        };

        switch(role) {
            case 'admin':
            case 'super_admin':
                setToggles(true, true, true, true, true, true);
                break;
            case 'manager':
                setToggles(true, true, true, true, true, true);
                break;
            case 'cashier':
                setToggles(true, false, false, false, false, false);
                break;
            case 'accountant':
                setToggles(false, false, false, true, true, true);
                break;
            default:
                setToggles(true, false, false, false, false, false);
        }
    }

    function resetCreateForm() {
        document.getElementById('createUserForm').reset();
        document.getElementById('new_role').value = 'cashier';
        applyRolePresets('new', 'cashier');
    }

    function collectToggles(prefix) {
        return {
            pos: document.getElementById(`${prefix}_perm_pos`).checked,
            product: document.getElementById(`${prefix}_perm_product`).checked,
            purchase: document.getElementById(`${prefix}_perm_purchase`).checked,
            customer: document.getElementById(`${prefix}_perm_customer`).checked,
            expense: document.getElementById(`${prefix}_perm_expense`).checked,
            report: document.getElementById(`${prefix}_perm_report`).checked
        };
    }

    function setTogglesFromData(prefix, perms, role) {
        if (perms && typeof perms === 'object') {
            document.getElementById(`${prefix}_perm_pos`).checked = !!perms.pos;
            document.getElementById(`${prefix}_perm_product`).checked = !!perms.product;
            document.getElementById(`${prefix}_perm_purchase`).checked = !!perms.purchase;
            document.getElementById(`${prefix}_perm_customer`).checked = !!perms.customer;
            document.getElementById(`${prefix}_perm_expense`).checked = !!perms.expense;
            document.getElementById(`${prefix}_perm_report`).checked = !!perms.report;
        } else {
            applyRolePresets(prefix, role);
        }
    }

    // Number to Bengali digits helper
    function toBengaliNumber(num) {
        if (num === null || num === undefined) return '';
        const banglaDigits = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
        return num.toString().replace(/[0-9]/g, function(d) {
            return banglaDigits[d] || d;
        });
    }

    // Load users list from API
    async function loadAllUsers() {
        try {
            const res = await axios.get('/get-all-users');
            if (res.data && res.data.status === 'success') {
                allUsersData = res.data.data || [];
                renderUserTable(allUsersData);
                updateUserMetrics(allUsersData);
            }
        } catch (e) {
            console.error('Error loading users:', e);
            document.getElementById('userTableBody').innerHTML = `
                <tr>
                    <td colspan="6" class="text-center text-danger py-4">
                        <i class="fa-solid fa-triangle-exclamation me-1"></i> ইউজার ডাটা লোড করতে ব্যর্থ হয়েছে।
                    </td>
                </tr>
            `;
        }
    }

    function updateUserMetrics(users) {
        document.getElementById('totalUserCount').innerText = toBengaliNumber(users.length);
        
        let admins = users.filter(u => u.role === 'admin' || u.role === 'super_admin').length;
        let cashiers = users.filter(u => u.role === 'cashier').length;
        let managers = users.filter(u => u.role === 'manager' || u.role === 'accountant').length;

        document.getElementById('adminCount').innerText = toBengaliNumber(admins);
        document.getElementById('cashierCount').innerText = toBengaliNumber(cashiers);
        document.getElementById('managerCount').innerText = toBengaliNumber(managers);
    }

    function getRoleBadge(role) {
        switch(role) {
            case 'admin':
            case 'super_admin':
                return `<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2.5 py-1 rounded-pill fw-bold"><i class="fa-solid fa-crown me-1"></i> Super Admin</span>`;
            case 'manager':
                return `<span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-pill fw-bold"><i class="fa-solid fa-user-gear me-1"></i> Manager</span>`;
            case 'cashier':
                return `<span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-pill fw-bold"><i class="fa-solid fa-cash-register me-1"></i> Cashier</span>`;
            case 'accountant':
                return `<span class="badge px-2.5 py-1 rounded-pill fw-bold" style="background: #F3ECFB; color: #8C56D4; border: 1px solid #E5D5F7;"><i class="fa-solid fa-calculator me-1"></i> Accountant</span>`;
            default:
                return `<span class="badge bg-secondary-subtle text-secondary px-2.5 py-1 rounded-pill fw-bold"><i class="fa-solid fa-user me-1"></i> ${role}</span>`;
        }
    }

    function renderPermissionPills(perms, role) {
        if (!perms) {
            if (role === 'admin' || role === 'super_admin' || role === 'manager') {
                return `<span class="badge bg-success text-white px-2 py-1 me-1 mb-1">🟢 All Modules</span>`;
            }
            if (role === 'cashier') {
                return `<span class="badge bg-success text-white px-2 py-1 me-1 mb-1">🟢 POS Only</span>`;
            }
            return `<span class="badge bg-info text-white px-2 py-1 me-1 mb-1">🟢 Accounts Only</span>`;
        }

        let html = '';
        if (perms.pos) html += `<span class="badge bg-success text-white px-2 py-1 me-1 mb-1">POS</span>`;
        if (perms.product) html += `<span class="badge bg-primary text-white px-2 py-1 me-1 mb-1">Product</span>`;
        if (perms.purchase) html += `<span class="badge bg-warning text-dark px-2 py-1 me-1 mb-1">Purchase</span>`;
        if (perms.customer) html += `<span class="badge bg-info text-white px-2 py-1 me-1 mb-1">Customer</span>`;
        if (perms.expense) html += `<span class="badge bg-danger text-white px-2 py-1 me-1 mb-1">Financials</span>`;
        if (perms.report) html += `<span class="badge bg-secondary text-white px-2 py-1 me-1 mb-1">Reports</span>`;

        return html || `<span class="badge bg-light text-muted px-2 py-1">No Active Toggles</span>`;
    }

    function renderUserTable(users) {
        const tbody = document.getElementById('userTableBody');
        const cardList = document.getElementById('userMobileCardList');

        if (users.length === 0) {
            if (tbody) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-users-slash fs-2 mb-2 d-block text-secondary"></i>
                            কোনো ইউজার পাওয়া যায়নি।
                        </td>
                    </tr>
                `;
            }
            if (cardList) {
                cardList.innerHTML = `
                    <div class="col-12 text-center py-5 text-muted w-100 ur-card-item rounded-3">
                        <i class="fa-solid fa-users-slash fs-2 mb-2 d-block text-secondary"></i>
                        কোনো ইউজার পাওয়া যায়নি।
                    </div>
                `;
            }
            return;
        }

        let tableHtml = '';
        let cardHtml = '';

        users.forEach(u => {
            let statusBadge = u.status === 'approved' 
                ? `<span class="badge bg-success text-white px-2 py-1" style="font-size: 11px;">APPROVED</span>` 
                : `<span class="badge bg-warning text-dark px-2 py-1" style="font-size: 11px;">PENDING</span>`;

            // Desktop Table Row
            tableHtml += `
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center gap-2.5">
                            <img src="${u.img_url}" class="rounded-circle border" style="width: 42px; height: 42px; object-fit: cover; border-color: #E5D5F7 !important;" alt="${u.name}" onerror="this.src='/assets/img/default-avatar.png'">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 14px;">${u.name}</h6>
                                <span class="small text-muted" style="font-size: 12px;">${u.email}</span>
                            </div>
                        </div>
                    </td>
                    <td class="fw-semibold text-dark">${toBengaliNumber(u.mobile)}</td>
                    <td>${getRoleBadge(u.role)}</td>
                    <td>${renderPermissionPills(u.permissions, u.role)}</td>
                    <td>${statusBadge}</td>
                    <td class="text-end pe-4">
                        <div class="d-inline-flex align-items-center" style="gap: 8px !important;">
                            <button type="button" class="ur-action-btn ur-action-edit" title="সম্পাদনা" onclick="openEditModal(${u.id})">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span>এডিট</span>
                            </button>
                            <button type="button" class="ur-action-btn ur-action-delete" title="মুছে ফেলুন" onclick="deleteUser(${u.id}, '${u.name.replace(/'/g, "\\'")}')">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;

            // Mobile & Tablet Box Card (< 992px)
            cardHtml += `
                <div class="ur-card-col">
                    <div class="ur-card-item">
                        <!-- Top Row: Avatar, Name & Role Badge -->
                        <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                            <div class="d-flex align-items-center gap-2 overflow-hidden">
                                <img src="${u.img_url}" class="rounded-circle border flex-shrink-0" style="width: 40px; height: 40px; object-fit: cover; border-color: #E5D5F7 !important;" alt="${u.name}" onerror="this.src='/assets/img/default-avatar.png'">
                                <div class="overflow-hidden">
                                    <h6 class="fw-bold mb-0 text-dark text-truncate" style="font-size: 14px;">${u.name}</h6>
                                    <span class="small text-muted text-truncate d-block" style="font-size: 11.5px;">${u.email}</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ms-1">
                                ${getRoleBadge(u.role)}
                            </div>
                        </div>

                        <!-- Middle Row: Mobile & Status -->
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="small fw-semibold text-muted d-flex align-items-center gap-1">
                                <i class="fa-solid fa-phone" style="color: #8C56D4; font-size: 12px;"></i>
                                <span class="text-dark">${toBengaliNumber(u.mobile)}</span>
                            </span>
                            <div>${statusBadge}</div>
                        </div>

                        <!-- Permissions Pills -->
                        <div class="mb-3 pt-1 border-top">
                            <span class="d-block small text-muted mb-1" style="font-size: 11px;">অনুমোদিত মডিউলসমূহ:</span>
                            <div class="d-flex flex-wrap">${renderPermissionPills(u.permissions, u.role)}</div>
                        </div>

                        <!-- Bottom Action Strip with 8px Gap -->
                        <div class="d-flex align-items-center pt-2 border-top" style="gap: 8px !important;">
                            <button type="button" class="ur-action-btn ur-action-edit flex-grow-1" onclick="openEditModal(${u.id})">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span>সম্পাদনা</span>
                            </button>
                            <button type="button" class="ur-action-btn ur-action-delete flex-grow-1" onclick="deleteUser(${u.id}, '${u.name.replace(/'/g, "\\'")}')">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>মুছে ফেলুন</span>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });

        if (tbody) tbody.innerHTML = tableHtml;
        if (cardList) cardList.innerHTML = cardHtml;
    }

    // Filter Users in real-time
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('userSearchInput');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                let q = this.value.toLowerCase().trim();
                let filtered = allUsersData.filter(u => 
                    (u.name || '').toLowerCase().includes(q) || 
                    (u.mobile || '').toLowerCase().includes(q) || 
                    (u.email || '').toLowerCase().includes(q) || 
                    (u.role || '').toLowerCase().includes(q)
                );
                renderUserTable(filtered);
            });
        }
    });

    // Create User Form Submit
    document.getElementById('createUserForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        let saveBtn = document.getElementById('createUserSaveBtn');
        saveBtn.disabled = true;
        saveBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-1"></span> সেভ হচ্ছে...`;

        let payload = {
            name: document.getElementById('new_name').value,
            mobile: document.getElementById('new_mobile').value,
            email: document.getElementById('new_email').value,
            password: document.getElementById('new_password').value,
            role: document.getElementById('new_role').value,
            status: document.getElementById('new_status').value,
            permissions: collectToggles('new')
        };

        try {
            const res = await axios.post('/create-user-admin', payload);
            if (res.data && res.data.status === 'success') {
                Swal.fire('সফল!', res.data.message, 'success');
                document.getElementById('createUserModalCloseBtn').click();
                resetCreateForm();
                loadAllUsers();
            } else {
                Swal.fire('এরর!', res.data.message || 'ইউজার তৈরি করা সম্ভব হয়নি।', 'error');
            }
        } catch (err) {
            let msg = err.response?.data?.message || 'সমস্যা হয়েছে, তথ্য চেক করে পুনরায় চেষ্টা করুন।';
            Swal.fire('এরর!', msg, 'error');
        } finally {
            saveBtn.disabled = false;
            saveBtn.innerHTML = `<i class="fa-solid fa-check me-1"></i> ইউজার সেভ করুন`;
        }
    });

    // Open Edit Modal
    function openEditModal(id) {
        let u = allUsersData.find(x => x.id == id);
        if (!u) return;

        document.getElementById('edit_user_id').value = u.id;
        document.getElementById('edit_name').value = u.name;
        document.getElementById('edit_mobile').value = u.mobile;
        document.getElementById('edit_email').value = u.email && u.email !== 'N/A' ? u.email : '';
        document.getElementById('edit_role').value = u.role;
        document.getElementById('edit_status').value = u.status;
        document.getElementById('edit_password').value = '';

        setTogglesFromData('edit', u.permissions, u.role);

        const modalEl = document.getElementById('editUserModal');
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }

    // Edit User Form Submit
    document.getElementById('editUserForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        let saveBtn = document.getElementById('editUserSaveBtn');
        saveBtn.disabled = true;
        saveBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-1"></span> আপডেট হচ্ছে...`;

        let payload = {
            id: document.getElementById('edit_user_id').value,
            name: document.getElementById('edit_name').value,
            mobile: document.getElementById('edit_mobile').value,
            email: document.getElementById('edit_email').value,
            role: document.getElementById('edit_role').value,
            status: document.getElementById('edit_status').value,
            password: document.getElementById('edit_password').value,
            permissions: collectToggles('edit')
        };

        try {
            const res = await axios.post('/update-user-role-status', payload);
            if (res.data && res.data.status === 'success') {
                Swal.fire('আপডেট হয়েছে!', res.data.message, 'success');
                document.getElementById('editUserModalCloseBtn').click();
                loadAllUsers();
            } else {
                Swal.fire('এরর!', res.data.message || 'আপডেট করতে ব্যর্থ হয়েছে।', 'error');
            }
        } catch (err) {
            let msg = err.response?.data?.message || 'সমস্যা হয়েছে, পুনরায় চেষ্টা করুন।';
            Swal.fire('এরর!', msg, 'error');
        } finally {
            saveBtn.disabled = false;
            saveBtn.innerHTML = `<i class="fa-solid fa-arrows-rotate me-1"></i> আপডেট করুন`;
        }
    });

    // Delete User
    function deleteUser(id, name) {
        Swal.fire({
            title: 'আপনি কি নিশ্চিত?',
            text: `"${name}" ইউজারকে সিস্টেম থেকে মুছে ফেলা হবে!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'হ্যাঁ, ডিলিট করুন!',
            cancelButtonText: 'বাতিল'
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    const res = await axios.post('/delete-user-admin', { id: id });
                    if (res.data && res.data.status === 'success') {
                        Swal.fire('ডিলিট হয়েছে!', res.data.message, 'success');
                        loadAllUsers();
                    } else {
                        Swal.fire('এরর!', res.data.message || 'ডিলিট সম্ভব হয়নি।', 'error');
                    }
                } catch (err) {
                    Swal.fire('এরর!', err.response?.data?.message || 'সমস্যা হয়েছে।', 'error');
                }
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        loadAllUsers();
        applyRolePresets('new', 'cashier');

        // Mobile & Tablet Auto-Focus Keyboard on Modal Open
        const createModal = document.getElementById('createUserModal');
        if (createModal) {
            createModal.addEventListener('shown.bs.modal', function () {
                adjustModalForKeyboard();
                setTimeout(() => {
                    const input = document.getElementById('new_name');
                    if (input) input.focus();
                }, 150);
            });
        }

        const editModal = document.getElementById('editUserModal');
        if (editModal) {
            editModal.addEventListener('shown.bs.modal', function () {
                adjustModalForKeyboard();
                setTimeout(() => {
                    const input = document.getElementById('edit_name');
                    if (input) input.focus();
                }, 150);
            });
        }

        // Ensure virtual keyboard doesn't push footer buttons offscreen
        function adjustModalForKeyboard() {
            if (window.innerWidth >= 992) return; // desktop: no adjustment needed
            const openModalContent = document.querySelectorAll('.ur-modal.show .modal-content');
            if (!openModalContent.length) return;

            if (window.visualViewport) {
                const vvH = window.visualViewport.height;
                // Give a small safety margin (10px) so the bottom of the modal doesn't clip
                const safeH = vvH - 10;
                openModalContent.forEach(m => {
                    m.style.maxHeight = Math.min(safeH * 0.95, safeH) + 'px';
                });
            }
        }

        function resetModalHeight(modalEl) {
            const modalContent = modalEl.querySelector('.modal-content');
            if (modalContent) modalContent.style.maxHeight = '';
        }

        if (window.visualViewport) {
            window.visualViewport.addEventListener('resize', adjustModalForKeyboard);
            window.visualViewport.addEventListener('scroll', adjustModalForKeyboard);
        }

        document.querySelectorAll('.ur-modal').forEach(modalEl => {
            modalEl.addEventListener('hidden.bs.modal', function () {
                resetModalHeight(this);
            });
            modalEl.addEventListener('hide.bs.modal', function () {
                resetModalHeight(this);
            });
        });
    });
</script>
