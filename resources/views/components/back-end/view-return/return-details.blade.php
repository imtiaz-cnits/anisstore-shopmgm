@extends('layouts.dashboard-sidenav')
@section('title', 'Product Return Page')
@section('content')

    <!-- Scoped Styles for Modern Return Invoice -->
    <style>
        .return-page-header {
            max-width: 98%;
            margin: 0 10px 10px 10px;
            position: sticky !important;
            top: 60px !important;
            z-index: 1040 !important;
            background: #ffffff !important;
            padding: 10px 16px !important;
            border-radius: 12px !important;
            border: 1px solid #e2e8f0 !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05) !important;
            transition: all 0.2s ease;
        }
        .invoice-container {
           max-width: 98%;
            margin: 0 10px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        }
        .invoice-container .billing-section {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            gap: 16px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .invoice-container .billing-section .wrapper {
            flex: 1 1 240px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .invoice-container .billing-to {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 14px;
            width: 100%;
        }
        .invoice-container .invoice-wrapper {
            width: 100%;
        }
        .invoice-container .invoice-wrapper table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-container .invoice-wrapper td {
            border: 1px solid #e2e8f0;
            padding: 6px 10px;
            font-size: 13px;
            text-align: left !important;
        }
        .invoice-container .invoice-wrapper .number,
        .invoice-container .invoice-wrapper .date {
            background: #f1f5f9;
            font-weight: 600;
            text-align: left !important;
            width: 42%;
        }
        .invoice-container .logo-wrapper {
            flex: 1 1 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10px;
        }
        .invoice-container .logo-wrapper h2 {
            font-size: 20px;
            font-weight: 800;
            color: #8C56D4;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .invoice-container .logo-wrapper img {
            max-height: 55px !important;
            max-width: 170px !important;
            width: auto !important;
            height: auto !important;
            object-fit: contain !important;
            margin: 6px 0 !important;
        }
        .invoice-container .shop-details {
            flex: 1 1 240px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 14px;
            padding: 12px 14px;
            text-align: right;
        }
        .return-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px !important;
            font-size: 14px;
            font-weight: 600;
            color: #475569 !important;
            background: #ffffff !important;
            border: 1.5px solid #cbd5e1 !important;
            border-radius: 10px !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
            text-decoration: none !important;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }
        .return-back-btn:hover {
            color: #8C56D4 !important;
            background: #FAF7FD !important;
            border-color: #8C56D4 !important;
            transform: translateX(-2px);
            box-shadow: 0 4px 12px rgba(140, 86, 212, 0.18);
        }
        .return-back-btn:active {
            transform: translateX(0);
        }
        .return-submit-btn {
            background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 10px 24px !important;
            font-size: 14px !important;
            font-weight: 700 !important;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 3px 10px rgba(140, 86, 212, 0.3) !important;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none !important;
            white-space: nowrap;
        }
        .return-submit-btn:hover {
            background: linear-gradient(135deg, #793FC5 0%, #6830a8 100%) !important;
            transform: translateY(-1px);
            box-shadow: 0 5px 14px rgba(140, 86, 212, 0.45) !important;
            color: #ffffff !important;
        }
        .return-submit-btn:active {
            transform: translateY(0);
        }
        .return-invoice-list-btn {
            color: #793FC5 !important;
            background: transparent !important;
            border: 1.5px solid #E5D5F7 !important;
            border-radius: 8px !important;
            padding: 8px 14px !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            cursor: pointer !important;
            text-decoration: none !important;
            transition: all 0.2s ease-in-out;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .return-invoice-list-btn:hover {
            background: #FAF5FF !important;
            border-color: #8C56D4 !important;
            color: #8C56D4 !important;
        }
        .invoice-container .return-quantity {
            width: 70px;
            height: 34px;
            text-align: center;
            border-radius: 6px;
            border: 1.5px solid #cbd5e1;
            font-weight: 700;
            color: #1e293b;
        }
        .invoice-container .return-quantity:focus {
            border-color: #8C56D4;
            outline: none;
            box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15);
        }
        .invoice-container .return-checkbox {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #8C56D4;
        }
        .invoice-container .invoice_table_list {
            min-width: 600px;
            border: 1px solid #e2e8f0;
            width: 100%;
        }
        .invoice-container .invoice_table_list th {
            background-color: #f1f5f9;
            color: #334155;
            font-weight: 700;
            font-size: 13.5px;
            padding: 8px 10px !important;
            border: 1px solid #cbd5e1;
        }
        .invoice-container .invoice_table_list td {
            padding: 8px 10px !important;
            font-size: 13.5px;
            border: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        /* Mobile specific responsiveness */
        @media (max-width: 768px) {
            .page-content {
                padding: 82px 10px 24px 10px !important;
                overflow-x: clip !important;
            }
             .return-page-header {
            max-width: 98%;
            margin: 0 10px 10px 10px;
            position: sticky !important;
            top: 60px !important;
            z-index: 1040 !important;
            background: #ffffff !important;
            padding: 10px 16px !important;
            border-radius: 12px !important;
            border: 1px solid #e2e8f0 !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05) !important;
            transition: all 0.2s ease;
        }
            .return-page-header .d-flex {
                width: auto !important;
                justify-content: flex-end !important;
                flex-wrap: nowrap !important;
                gap: 6px !important;
            }
            .return-page-header .return-back-btn {
                padding: 8px 12px !important;
                font-size: 13px !important;
                white-space: nowrap !important;
                flex-shrink: 0 !important;
            }
            .return-page-header .return-submit-btn {
                padding: 8px 14px !important;
                font-size: 13px !important;
                white-space: nowrap !important;
                flex-shrink: 0 !important;
            }
             .invoice-container {
    max-width: 98%;
    margin: 0 10px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 10px;
    margin-top: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
}
            .invoice-container .billing-section {
                flex-direction: column;
                gap: 12px;
            }
            .invoice-container .billing-section .wrapper,
            .invoice-container .shop-details {
                width: 100%;
                flex: 1 1 100%;
            }
            .invoice-container .shop-details {
                text-align: left;
                align-items: flex-start;
            }
            .invoice-container .shop-details .contact {
                justify-content: flex-start;
            }
            .invoice-container .logo-wrapper {
                display: none !important;
            }
            .invoice-container .invoice_table_list {
                width: 100% !important;
                min-width: 100% !important;
                max-width: 100% !important;
                table-layout: fixed !important;
                margin: 0 !important;
            }
            .invoice-container .invoice_table_list th,
            .invoice-container .invoice_table_list td {
                padding: 6px 2px !important;
                font-size: 11.5px !important;
                word-break: break-word !important;
            }
            .invoice-container .invoice_table_list th:nth-child(1),
            .invoice-container .invoice_table_list td:nth-child(1) {
                width: 10% !important;
                text-align: center;
            }
            .invoice-container .invoice_table_list th:nth-child(2),
            .invoice-container .invoice_table_list td:nth-child(2) {
                width: 36% !important;
                text-align: left;
                padding-left: 4px !important;
            }
            .invoice-container .invoice_table_list th:nth-child(3),
            .invoice-container .invoice_table_list td:nth-child(3) {
                width: 12% !important;
                text-align: center;
            }
            .invoice-container .invoice_table_list th:nth-child(4),
            .invoice-container .invoice_table_list td:nth-child(4) {
                width: 18% !important;
                text-align: center;
                font-size: 11px !important;
            }
            .invoice-container .invoice_table_list th:nth-child(5),
            .invoice-container .invoice_table_list td:nth-child(5) {
                width: 14% !important;
                text-align: center;
            }
            .invoice-container .invoice_table_list th:nth-child(6),
            .invoice-container .invoice_table_list td:nth-child(6) {
                width: 10% !important;
                text-align: center;
            }
            .invoice-container .return-quantity {
                width: 100% !important;
                max-width: 40px !important;
                height: 28px !important;
                font-size: 12px !important;
                padding: 2px !important;
                margin: 0 auto;
                display: block;
            }
            .invoice-container .return-checkbox {
                width: 17px !important;
                height: 17px !important;
                margin: 0 auto;
                display: block;
            }
        }

        /* Mobile Calculation Summary Card Styling */
        .mobile-invoice-summary-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        /* Terms & Conditions Footer Message */
        .invoice-container .footer-message {
            border: 1px solid #e2e8f0 !important;
            border-radius: 10px !important;
            padding: 14px 16px !important;
            margin-top: 18px !important;
            background: #f8fafc !important;
        }

        /* ================= DARK MODE STYLES ================= */
        body[light-mode="dark"] .return-page-header,
        html[light-mode="dark"] .return-page-header,
        body.dark-mode .return-page-header,
        body[data-layout-mode="dark"] .return-page-header {
            background: #1e293b !important;
            border-color: #334155 !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.35) !important;
        }

        body[light-mode="dark"] .return-back-btn,
        html[light-mode="dark"] .return-back-btn,
        body.dark-mode .return-back-btn,
        body[data-layout-mode="dark"] .return-back-btn {
            background: #334155 !important;
            color: #f8fafc !important;
            border-color: #475569 !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25) !important;
        }
        body[light-mode="dark"] .return-back-btn:hover,
        html[light-mode="dark"] .return-back-btn:hover,
        body.dark-mode .return-back-btn:hover,
        body[data-layout-mode="dark"] .return-back-btn:hover {
            background: #475569 !important;
            color: #c084fc !important;
            border-color: #c084fc !important;
        }

        body[light-mode="dark"] .return-invoice-list-btn,
        html[light-mode="dark"] .return-invoice-list-btn,
        body.dark-mode .return-invoice-list-btn,
        body[data-layout-mode="dark"] .return-invoice-list-btn {
            background: rgba(140, 86, 212, 0.15) !important;
            color: #c084fc !important;
            border-color: #7c3aed !important;
        }
        body[light-mode="dark"] .return-invoice-list-btn:hover,
        html[light-mode="dark"] .return-invoice-list-btn:hover,
        body.dark-mode .return-invoice-list-btn:hover,
        body[data-layout-mode="dark"] .return-invoice-list-btn:hover {
            background: #7c3aed !important;
            color: #ffffff !important;
            border-color: #7c3aed !important;
        }

        body[light-mode="dark"] .invoice-container,
        html[light-mode="dark"] .invoice-container,
        body.dark-mode .invoice-container,
        body[data-layout-mode="dark"] .invoice-container {
            background: #1e293b !important;
            border-color: #334155 !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.35) !important;
            color: #f8fafc !important;
        }

        body[light-mode="dark"] .invoice-container .billing-to,
        html[light-mode="dark"] .invoice-container .billing-to,
        body.dark-mode .invoice-container .billing-to,
        body[data-layout-mode="dark"] .invoice-container .billing-to,
        body[light-mode="dark"] .invoice-container .shop-details,
        html[light-mode="dark"] .invoice-container .shop-details,
        body.dark-mode .invoice-container .shop-details,
        body[data-layout-mode="dark"] .invoice-container .shop-details {
            background: #0f172a !important;
            border-color: #334155 !important;
            color: #f8fafc !important;
        }

        body[light-mode="dark"] .invoice-container .billing-to h3,
        html[light-mode="dark"] .invoice-container .billing-to h3,
        body.dark-mode .invoice-container .billing-to h3,
        body[data-layout-mode="dark"] .invoice-container .billing-to h3,
        body[light-mode="dark"] .invoice-container .shop-details h3,
        html[light-mode="dark"] .invoice-container .shop-details h3,
        body.dark-mode .invoice-container .shop-details h3,
        body[data-layout-mode="dark"] .invoice-container .shop-details h3 {
            color: #c084fc !important;
        }

        body[light-mode="dark"] .invoice-container .billing-to p,
        html[light-mode="dark"] .invoice-container .billing-to p,
        body.dark-mode .invoice-container .billing-to p,
        body[data-layout-mode="dark"] .invoice-container .billing-to p,
        body[light-mode="dark"] .invoice-container .shop-details p,
        html[light-mode="dark"] .invoice-container .shop-details p,
        body.dark-mode .invoice-container .shop-details p,
        body[data-layout-mode="dark"] .invoice-container .shop-details p {
            color: #cbd5e1 !important;
        }

        body[light-mode="dark"] .invoice-container .billing-to strong,
        html[light-mode="dark"] .invoice-container .billing-to strong,
        body.dark-mode .invoice-container .billing-to strong,
        body[data-layout-mode="dark"] .invoice-container .billing-to strong,
        body[light-mode="dark"] .invoice-container .shop-details strong,
        html[light-mode="dark"] .invoice-container .shop-details strong,
        body.dark-mode .invoice-container .shop-details strong,
        body[data-layout-mode="dark"] .invoice-container .shop-details strong,
        body[light-mode="dark"] .invoice-container .text-dark,
        html[light-mode="dark"] .invoice-container .text-dark,
        body.dark-mode .invoice-container .text-dark,
        body[data-layout-mode="dark"] .invoice-container .text-dark {
            color: #f8fafc !important;
        }

        body[light-mode="dark"] .invoice-container .text-muted,
        html[light-mode="dark"] .invoice-container .text-muted,
        body.dark-mode .invoice-container .text-muted,
        body[data-layout-mode="dark"] .invoice-container .text-muted {
            color: #94a3b8 !important;
        }

        body[light-mode="dark"] .invoice-container .invoice-wrapper td,
        html[light-mode="dark"] .invoice-container .invoice-wrapper td,
        body.dark-mode .invoice-container .invoice-wrapper td,
        body[data-layout-mode="dark"] .invoice-container .invoice-wrapper td {
            background: #1e293b !important;
            border-color: #334155 !important;
            color: #f8fafc !important;
        }

        body[light-mode="dark"] .invoice-container .invoice-wrapper .number,
        html[light-mode="dark"] .invoice-container .invoice-wrapper .number,
        body.dark-mode .invoice-container .invoice-wrapper .number,
        body[data-layout-mode="dark"] .invoice-container .invoice-wrapper .number,
        body[light-mode="dark"] .invoice-container .invoice-wrapper .date,
        html[light-mode="dark"] .invoice-container .invoice-wrapper .date,
        body.dark-mode .invoice-container .invoice-wrapper .date,
        body[data-layout-mode="dark"] .invoice-container .invoice-wrapper .date {
            background: #0f172a !important;
            color: #cbd5e1 !important;
        }

        body[light-mode="dark"] .invoice-container .logo-wrapper h2,
        html[light-mode="dark"] .invoice-container .logo-wrapper h2,
        body.dark-mode .invoice-container .logo-wrapper h2,
        body[data-layout-mode="dark"] .invoice-container .logo-wrapper h2 {
            color: #c084fc !important;
        }

        body[light-mode="dark"] .invoice-container .invoice_table_list,
        html[light-mode="dark"] .invoice-container .invoice_table_list,
        body.dark-mode .invoice-container .invoice_table_list,
        body[data-layout-mode="dark"] .invoice-container .invoice_table_list {
            border-color: #334155 !important;
        }

        body[light-mode="dark"] .invoice-container .invoice_table_list th,
        html[light-mode="dark"] .invoice-container .invoice_table_list th,
        body.dark-mode .invoice-container .invoice_table_list th,
        body[data-layout-mode="dark"] .invoice-container .invoice_table_list th {
            background-color: #0f172a !important;
            color: #e2e8f0 !important;
            border-color: #334155 !important;
        }

        body[light-mode="dark"] .invoice-container .invoice_table_list td,
        html[light-mode="dark"] .invoice-container .invoice_table_list td,
        body.dark-mode .invoice-container .invoice_table_list td,
        body[data-layout-mode="dark"] .invoice-container .invoice_table_list td {
            background-color: #1e293b !important;
            color: #f8fafc !important;
            border-color: #334155 !important;
        }

        body[light-mode="dark"] .invoice-container .invoice_table_list .amount_text,
        html[light-mode="dark"] .invoice-container .invoice_table_list .amount_text,
        body.dark-mode .invoice-container .invoice_table_list .amount_text,
        body[data-layout-mode="dark"] .invoice-container .invoice_table_list .amount_text,
        body[light-mode="dark"] .invoice-container .invoice_table_list .amount,
        html[light-mode="dark"] .invoice-container .invoice_table_list .amount,
        body.dark-mode .invoice-container .invoice_table_list .amount,
        body[data-layout-mode="dark"] .invoice-container .invoice_table_list .amount {
            background-color: #0f172a !important;
            color: #f8fafc !important;
        }

        body[light-mode="dark"] .invoice-container .return-quantity,
        html[light-mode="dark"] .invoice-container .return-quantity,
        body.dark-mode .invoice-container .return-quantity,
        body[data-layout-mode="dark"] .invoice-container .return-quantity {
            background: #0f172a !important;
            color: #f8fafc !important;
            border-color: #475569 !important;
        }

        body[light-mode="dark"] .invoice-container .return-quantity:focus,
        html[light-mode="dark"] .invoice-container .return-quantity:focus,
        body.dark-mode .invoice-container .return-quantity:focus,
        body[data-layout-mode="dark"] .invoice-container .return-quantity:focus {
            border-color: #8C56D4 !important;
            box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.3) !important;
        }

        body[light-mode="dark"] .mobile-invoice-summary-card,
        html[light-mode="dark"] .mobile-invoice-summary-card,
        body.dark-mode .mobile-invoice-summary-card,
        body[data-layout-mode="dark"] .mobile-invoice-summary-card {
            background: #1e293b !important;
            border-color: #334155 !important;
        }
        body[light-mode="dark"] .mobile-invoice-summary-card .border-bottom,
        html[light-mode="dark"] .mobile-invoice-summary-card .border-bottom,
        body.dark-mode .mobile-invoice-summary-card .border-bottom,
        body[data-layout-mode="dark"] .mobile-invoice-summary-card .border-bottom {
            border-color: #334155 !important;
        }
        body[light-mode="dark"] .mobile-invoice-summary-card .text-dark,
        html[light-mode="dark"] .mobile-invoice-summary-card .text-dark,
        body.dark-mode .mobile-invoice-summary-card .text-dark,
        body[data-layout-mode="dark"] .mobile-invoice-summary-card .text-dark {
            color: #f8fafc !important;
        }
        body[light-mode="dark"] .mobile-invoice-summary-card .bg-total-box,
        html[light-mode="dark"] .mobile-invoice-summary-card .bg-total-box,
        body.dark-mode .mobile-invoice-summary-card .bg-total-box,
        body[data-layout-mode="dark"] .mobile-invoice-summary-card .bg-total-box {
            background: rgba(239, 68, 68, 0.15) !important;
            border-color: rgba(239, 68, 68, 0.35) !important;
        }

        body[light-mode="dark"] .invoice-container .footer-message,
        html[light-mode="dark"] .invoice-container .footer-message,
        body.dark-mode .invoice-container .footer-message,
        body[data-layout-mode="dark"] .invoice-container .footer-message {
            background: #1e293b !important;
            border-color: #334155 !important;
        }
        body[light-mode="dark"] .invoice-container .footer-message p,
        html[light-mode="dark"] .invoice-container .footer-message p,
        body.dark-mode .invoice-container .footer-message p,
        body[data-layout-mode="dark"] .invoice-container .footer-message p {
            color: #94a3b8 !important;
        }
        body[light-mode="dark"] .invoice-container .footer-message strong,
        html[light-mode="dark"] .invoice-container .footer-message strong,
        body.dark-mode .invoice-container .footer-message strong,
        body[data-layout-mode="dark"] .invoice-container .footer-message strong {
            color: #f8fafc !important;
        }
    </style>

    <!-- Hero Main Content Start -->
    <div class="main-content">
        <div class="page-content">
            <!-- Top Header & Back Button -->
            <div class="return-page-header d-flex align-items-center justify-content-between flex-nowrap gap-2">
                <button type="button" onclick="handleReturnPageBack()" class="return-back-btn" title="তালিকায় ফিরে যান">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>ফিরে যান</span>
                </button>
                <div class="d-flex align-items-center gap-2 flex-nowrap">
                    <a href="/admin-dashboard-return-list" class="return-invoice-list-btn d-none d-sm-inline-flex" title="পণ্য ফেরত ইনভয়েস তালিকায় যান">
                        <i class="fa-solid fa-rotate-left"></i>
                        <span>পণ্য ফেরত ইনভয়েস</span>
                    </a>
                    <button type="button" class="return-submit-btn" onclick="ReturnProductSave(event)">
                        <i class="fa-solid fa-rotate-left"></i>
                        <span>ফেরত নিশ্চিত করুন</span>
                    </button>
                </div>
            </div>

            <div class="invoice-container">
                <div class="billing-section">
                    <div class="wrapper">
                        <div class="billing-to">
                            <h3 class="fw-bold mb-1" style="font-size: 14px; color: #8C56D4;">কাস্টমার তথ্য (Billed to)</h3>
                            <p class="mb-1"><strong id="CustomerName" style="font-size: 14px;">{{ $invoice->customer->customer_name ?? 'N/A' }}</strong></p>
                            <p id="CustomerAddress" class="text-muted mb-1">{{ $invoice->customer->address_details ?? 'ঠিকানা নেই' }}</p>
                            <p class="text-muted mb-0">মোবাইল: <span id="CustomerMobile" class="fw-semibold text-dark">{{ $invoice->customer->mobile ?? 'N/A' }}</span></p>
                        </div>

                        <div class="invoice-wrapper">
                            <table>
                                <tr>
                                    <td class="number">ইনভয়েস নং:</td>
                                    <td id="order_no" class="fw-bold text-dark">{{ $invoice->order_no }}</td>
                                </tr>
                                <tr>
                                    <td class="date">ইনভয়েস তারিখ:</td>
                                    <td id="invoice_date">{{ \Carbon\Carbon::parse($invoice->created_at)->format('d-m-Y') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="logo-wrapper">
                        <h2>পণ্য ফেরত</h2>
                        <img src="{{ asset('back-end/assets/img/anis-store-logo.png') }}" alt="Anis Store Logo" />
                        <div class="button mt-2">
                            <button class="return-submit-btn" onclick="ReturnProductSave(event)">
                                <i class="fa-solid fa-rotate-left"></i>
                                <span>ফেরত নিশ্চিত করুন</span>
                            </button>
                        </div>
                    </div>

                    <strong style="display: none" id="OrderID">{{ $invoice->id ?? 'N/A' }}</strong>
                    <strong style="display: none" id="CustomerID">{{ $invoice->customer->id ?? 'N/A' }}</strong>

                    <div class="shop-details">
                        <h3 class="fw-bold mb-1" style="font-size: 14px; color: #8C56D4;">দোকান বিবরণ (Shop Info)</h3>
                        <p class="fw-bold text-dark mb-1">মেসার্স আনিস ষ্টোর</p>
                        <div class="contact mb-1" style="display: flex; gap: 4px">
                            <p class="text-muted mb-0">মোবাইল: <span class="text-dark fw-medium">01771299211, 01912248104</span></p>
                        </div>
                        <p class="text-muted mb-1">দোকান নং: <span>১৮, লেভেল: ২</span></p>
                        <p class="text-muted mb-1">মেঘনা হাইটস, পাবনা</p>
                        <p class="text-muted mb-0">exchangeworld0@gmail.com</p>
                    </div>
                </div>

                <!-- Table Section with Responsive Wrapper -->
                <div class="table-responsive">
                    <table class="invoice_table_list">
                        <thead>
                            <tr>
                                <th>ক্র.নং</th>
                                <th class="text-start">পণ্যের নাম</th>
                                <th>পরিমাণ</th>
                                <th>মূল্য</th>
                                <th>ফেরত পরিমাণ</th>
                                <th>ফেরত</th>
                            </tr>
                        </thead>
                        <tbody id="order_details">
                            @if ($invoice->details && $invoice->details->isNotEmpty())
                                @foreach ($invoice->details as $key => $orderDetail)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-start fw-semibold">{{ $orderDetail->product->product_name ?? 'N/A' }}</td>
                                        <td>{{ $orderDetail->quantity ?? 'N/A' }}</td>
                                        <td id="SellingAmount" class="fw-bold">৳{{ $orderDetail->selling_price }}</td>
                                        <td>
                                            <input type="number" class="return-quantity" name="return_quantity[]"
                                                min="1" max="{{ $orderDetail->quantity }}" value="1"
                                                data-product-id="{{ $orderDetail->product_id }}"
                                                data-order-detail-id="{{ $orderDetail->id }}">
                                        </td>
                                        <td>
                                            <span class="checkbox">
                                                <input type="checkbox" class="return-checkbox" name="return_product[]"
                                                    value="{{ $orderDetail->id }}">
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center p-3 text-danger fw-bold">ফেরত দেওয়ার মতো কোনো পণ্য নেই।</td>
                                </tr>
                            @endif

                            <!-- Desktop Only Summary Rows -->
                            <tr class="summary-row d-none d-md-table-row">
                                <td colspan="3" rowspan="6" id="payment_status" class="full-paid align-middle text-center">
                                    @if ($invoice->due_amount <= 0)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fs-6">Fully Paid</span>
                                    @elseif($invoice->paid_amount > 0)
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-2 fs-6">Partial Paid</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 fs-6">Unpaid</span>
                                    @endif
                                </td>
                                <td colspan="2" class="amount_text fw-semibold"><span>মোট (Sub Total):</span></td>
                                <td class="amount fw-bold text-dark"><span id="sub_total">৳{{ number_format($invoice->sub_total, 2) }}</span></td>
                            </tr>
                            <tr class="summary-row d-none d-md-table-row">
                                <td colspan="2" class="amount_text">ছাড় (Discount):</td>
                                <td class="amount text-muted" id="paidamount">৳ {{ number_format($invoice->discount_amount, 2) }}</td>
                            </tr>
                            <tr class="summary-row d-none d-md-table-row">
                                <td colspan="2" class="amount_text text-success fw-semibold"><span>পরিশোধ (Paid):</span></td>
                                <td class="amount text-success fw-bold"><span id="paidamount">৳ {{ number_format($invoice->paid_amount, 2) }}</span></td>
                            </tr>
                            <tr class="summary-row d-none d-md-table-row">
                                <td colspan="2" class="amount_text text-danger fw-semibold"><span>বর্তমান বকেয়া (Due):</span></td>
                                <td class="amount text-danger fw-bold"><span>৳{{ number_format($invoice->due_amount, 2) }}</span></td>
                            </tr>
                            <tr class="summary-row d-none d-md-table-row">
                                <td colspan="2" class="amount_text">পূর্বের বকেয়া (Previous Due):</td>
                                <td id="previous_due_amount" class="amount text-muted">৳ {{ number_format($invoice->previous_due_amount ?? 0, 2) }}</td>
                            </tr>
                            <tr class="summary-row d-none d-md-table-row">
                                <td colspan="2" class="amount_text fw-bold">সর্বমোট বকেয়া (Total Due):</td>
                                <td id="total_due_amount" class="amount fw-bold text-danger">৳ {{ number_format(($invoice->previous_due_amount ?? 0) + ($invoice->due_amount ?? 0), 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Dedicated Mobile Calculation Summary Card (Clean Modern Card, No Table Cramping) -->
                <div class="mobile-invoice-summary-card d-block d-md-none mt-3 p-3 rounded-3 border">
                    <!-- Status Badge -->
                    <div class="text-center mb-3 pb-2 border-bottom">
                        @if ($invoice->due_amount <= 0)
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1.5 fs-6 fw-bold">
                                <i class="fa-solid fa-circle-check me-1"></i> Fully Paid
                            </span>
                        @elseif($invoice->paid_amount > 0)
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-1.5 fs-6 fw-bold">
                                <i class="fa-solid fa-clock me-1"></i> Partial Paid
                            </span>
                        @else
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-1.5 fs-6 fw-bold">
                                <i class="fa-solid fa-circle-exclamation me-1"></i> Unpaid
                            </span>
                        @endif
                    </div>

                    <!-- Financial Key-Value Rows -->
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-muted fw-semibold" style="font-size: 13px;">মোট বিল (Sub Total):</span>
                        <span class="fw-bold text-dark" style="font-size: 14px;">৳{{ number_format($invoice->sub_total, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-muted fw-semibold" style="font-size: 13px;">ছাড় (Discount):</span>
                        <span class="fw-bold text-muted" style="font-size: 14px;">৳ {{ number_format($invoice->discount_amount, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-success fw-bold" style="font-size: 13px;">পরিশোধ (Paid):</span>
                        <span class="fw-bold text-success" style="font-size: 14px;">৳ {{ number_format($invoice->paid_amount, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-danger fw-bold" style="font-size: 13px;">বর্তমান বকেয়া (Due):</span>
                        <span class="fw-bold text-danger" style="font-size: 14px;">৳{{ number_format($invoice->due_amount, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="text-muted fw-semibold" style="font-size: 13px;">পূর্বের বকেয়া (Previous Due):</span>
                        <span class="fw-semibold text-secondary" style="font-size: 14px;">৳ {{ number_format($invoice->previous_due_amount ?? 0, 2) }}</span>
                    </div>

                    <!-- Total Due Highlight Box -->
                    <div class="d-flex justify-content-between align-items-center mt-3 rounded-2 bg-total-box" style="background: #fef2f2; border: 1.5px dashed #fca5a5; padding: 14px 16px !important;">
                        <span class="fw-bold text-danger" style="font-size: 13.5px;">সর্বমোট বকেয়া (Total Due):</span>
                        <span class="fw-bold text-danger" style="font-size: 15px;">৳ {{ number_format(($invoice->previous_due_amount ?? 0) + ($invoice->due_amount ?? 0), 2) }}</span>
                    </div>
                </div>

                <!-- Footer Message -->
                <div class="footer-message">
                    <p>
                        <strong style="border-bottom: 1px solid gray; font-size: 12px; font-weight: 800;">TERMS AND
                            CONDITIONS</strong>
                    </p>
                    <p class="google-text">
                        Goods once sold cannot be returned. Any exchange will result in a
                        minimum 20% deduction from the sale amount.
                    </p>
                    <p class="google-text">
                        3 Days Replacement Guaranty Without DISPLAY, CAMERA & SOFTWARE. No Service Warranty Available.
                    </p>
                    <p>
                        Developed By CodeNext IT - www.codenextit.com (+08801788428280)
                    </p>
                </div>
            </div>
            <div class="copyright">
                <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; 2026 মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-success fw-bold text-decoration-none">CodeNext IT</a></footer>
            </div>
        </div>
    </div>
    <!-- Hero Main Content End -->

    <script>
        function handleReturnPageBack() {
            if (document.referrer && document.referrer.includes(window.location.host) && document.referrer !== window.location.href) {
                window.location.href = document.referrer;
            } else if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = '/admin-dashboard-invoice';
            }
        }

        async function ReturnProductSave(event) {
            event.preventDefault();

            try {
                const selectedProducts = document.querySelectorAll('.return-checkbox:checked');
                if (selectedProducts.length === 0) {
                    alert('Please select at least one product to return.');
                    return;
                }

                const OrderID = document.getElementById('OrderID').innerText.trim();
                const invoice_date = document.getElementById('invoice_date').innerText.trim();
                const CustomerID = document.getElementById('CustomerID').innerText.trim();

                let returnData = [];

                selectedProducts.forEach(checkbox => {
                    let row = checkbox.closest('tr');
                    let quantityInput = row.querySelector('.return-quantity');

                    let orderDetailId = checkbox.value;
                    let productId = quantityInput.dataset.productId;
                    let returnQty = parseInt(quantityInput.value);


                    returnData.push({
                        order_detail_id: orderDetailId,
                        product_id: productId,
                        quantity: returnQty
                    });
                });

                if (returnData.length === 0) {
                    alert('No valid product returns were selected.');
                    return;
                }

                let payload = {
                    order_id: OrderID,
                    date: invoice_date,
                    customer_id: CustomerID,
                    products: returnData
                };

                const config = {
                    headers: {
                        'Content-Type': 'application/json',
                        ...HeaderToken().headers
                    }
                };

                showLoader(); // Show loading indicator
                const res = await axios.post("/api/create-return-product", payload, config);
                hideLoader(); // Hide loading indicator

                if (res.data.status === "success") {
                    successToast(res.data.message);
                    setTimeout(() => {
                        window.location.href = '/admin-dashboard-return-list';
                    }, 1000);
                } else {
                    errorToast(res.data.message);
                }
            } catch (e) {
                hideLoader();
                if (e.response && e.response.status) {
                    unauthorized(e.response.status);
                } else {
                    errorToast('An error occurred while processing your request.');
                }
            }
        }
    </script>
@endsection

