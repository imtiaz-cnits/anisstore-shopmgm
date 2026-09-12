<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Pos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('back-end/assets/icons/nexus-pos-logo.svg') }}" type="image/x-icon" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('back-end/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('back-end/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- CSS Link-->
    <link href="{{ asset('back-end/assets/css/pos.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back-end/assets/css/all-modal.css.css') }}" rel="stylesheet" />


    <link href="{{ asset('back-end/assets/css/toastify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-end/assets/css/progress.css') }}" rel="stylesheet" />
    <link href="{{ asset('back-end/assets/css/animate.min.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('back-end/assets/js/toastify-js.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/config.js') }}"></script>


    {{-- Customer Css Start  --}}


    <style>
        :root {
            --primary-font: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
        }
        body, html, button, input, select, textarea {
            font-family: 'Noto Sans Bengali', 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        }

        .financemodal .modal-content {
            /* margin: 100px 0px 100px 0px; */
            border-radius: 10px;
            width: 60%;
        }

        @media screen and (max-width: 992px) {
            .financemodal .modal-content {
                width: 90%;
                /* margin: 400px 0px 100px 0px; */


            }
        }

        .financemodal .modal-content .col-lg-6,
        .financemodal .modal-content .col-lg-4 {
            padding: 0 6px !important;
        }

        .newbrand .upload-profile .item,
        .newcategory .upload-profile .item {
            width: 100%;
            display: flex !important;
            gap: 10px;
            margin-bottom: 15px;
        }

        .newbrand .upload-profile .item .img-box,
        .newcategory .upload-profile .item .img-box {
            width: 84px;
            height: 70px;
            border-radius: 6px;
            background: #f2f2f2;
            display: flex !important;
            justify-content: center;
            align-items: center;
        }

        .newbrand .profile-wrapper,
        .newcategory .profile-wrapper {
            width: 100%;
        }

        .newbrand .parent,
        .newcategory .parent {
            width: 100%;
            height: 100%;
            display: inline-flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .newbrand .profile-wrapper p,
        .newcategory .profile-wrapper p {
            margin: 8px 0px 0px 0px;
            font-size: 14px;
            color: #aaaaaa;
        }

        .newbrand .custom-file-input-wrapper,
        .newcategory .custom-file-input-wrapper {
            font-family: var(--primary-font);
            position: relative;
            width: 100%;
            height: 46px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            color: #666;
            background: #ededed;
            cursor: pointer;
        }

        .newbrand .custom-file-input,
        .newcategory .custom-file-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            z-index: 2;
            cursor: pointer;
        }

        .newbrand .custom-file-input-wrapper input[type="file"],
        .newcategory .custom-file-input-wrapper input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            z-index: -2;
            cursor: pointer;
        }

        .newbrand .custom-file-input-wrapper::before,
        .newcategory .custom-file-input-wrapper::before {
            content: "";
            position: absolute;
            margin: 0px 118px 0px auto;
            width: 20px;
            height: 20px;
            background-image: url("../icons/upload-photo-icon.svg");
            background-size: cover;
            background-position: center;
        }

        .newbrand .custom-file-input-wrapper::after,
        .newcategory .custom-file-input-wrapper::after {
            content: "Upload Photo";
            margin-right: -20px !important;
        }

        .newbrand .upload p,
        .newcategory .upload p {
            font-size: 12px;
            color: #777;
        }
    </style>

    {{-- Customer Css end  --}}

    {{-- Pos Css start --}}
    <style>
        /* CSS for low stock and out of stock products */
        .low-stock {
            background-color: #ffcccc;
            /* Light red background for low stock */
        }

        .out-of-stock {
            background-color: #f8d7da;
            /* Light red background for out-of-stock */
            color: #721c24;
            /* Dark red text for out-of-stock */
        }

        .out-of-stock span {
            color: #721c24;
            font-weight: bold;
        }

        .form-label {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .form-control {
            height: 40px;
            font-size: 1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            border-color: #007bff;
        }

        /* Custom styles for flatpickr (datepicker) */
        .flatpickr-calendar {
            border-radius: 10px;
            border: 1px solid #008aee;
        }

        .flatpickr-calendar .flatpickr-day {
            background-color: #fff;
            border-radius: 50%;
            color: #333;
        }

        .flatpickr-calendar .flatpickr-day:hover {
            background-color: #008aee;
            color: #fff;
        }

        .flatpickr-calendar .flatpickr-day.selected {
            background-color: #008aee;
            color: #fff;
        }

        .flatpickr-calendar .flatpickr-month {
            background-color: #008aee;
            color: white;
        }

        .flatpickr-calendar .flatpickr-weekday {
            color: #008aee;
        }

        .flatpickr-calendar .flatpickr-arrow {
            color: #008aee;
        }

        .search-wraper {
            width: 100%;
            display: flex;
            align-items: end;
            gap: 10px;
            margin-top: 10px;
        }

        .search-wraper .wrap {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .search-wraper #openModalBtns {
            display: block;
            height: 33px;
            white-space: nowrap;
            padding: 0px 16px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            margin: 0;
            background: var(--text-color2);
            color: var(--white);
            border: 1px solid var(--text-color2);
            transition: 0.4s;
        }


        .search-wraper input {
            /* width: 100% !important; */
            padding: 6px;
            font-size: 12px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            outline: none;
            color: var(--gray);
        }

        .search-wraper label {
            width: 100%;
            color: var(--text-color);
        }

        .search-wraper input:focus {
            border-color: var(--stroke);
            color: var(--text-color);
        }


        /* select - 2 start css  */


        .select-box-dropdown {
            position: relative;
            width: 100%;
        }

        .select-box-dropdown select {
            display: none;
        }

        .select-dropdown-selected {
            padding: 6px;
            font-size: 12px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            outline: none;
            color: var(--gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .select-dropdown-selected .icon {
            transition: transform 0.3s;
        }

        .select-dropdown-items {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            width: 100%;
            padding: 10px;
            z-index: 1000;
            display: none;
            max-height: 200px;
            overflow-y: auto;
            top: 100%;
        }

        .select-dropdown-items::-webkit-scrollbar {
            width: 8px;
            background-color: #e6e3e3e5;
            cursor: pointer;
        }

        .select-dropdown-items::-webkit-scrollbar-thumb {
            background: #008aee;
            ;
            width: 8px;
            border-radius: 5px;
            border-color: none !important;
        }

        .select-dropdown-items #CustomerSelectData .dropdown-item {
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .select-dropdown-items #CustomerSelectData .dropdown-item:hover {
            background: #008aee;
            color: white;
        }

        .select-search-box {
            padding: 8px 12px;
            width: 100%;
            box-sizing: border-box;
            border-bottom: 1px solid #ccc;
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 1;
            display: none;
            /* Initially hide the search input */
        }

        .show {
            display: block;
        }

        /* Rotate the icon when the dropdown is open */
        .select-dropdown-items.show+.select-dropdown-selected .icon {
            transform: rotate(180deg);
        }

        .select-dropdown-selected .icon {
            top: 0px !important;
        }

        /* select - 2 end  */
        .card-wrapper .product-price h1 {
            opacity: 0;
            visibility: hidden;
            transition: 0.4s;
            margin-left: -20px;
        }

        #product-card .card-wrapper {
            overflow: hidden;
        }

        #product-card .card-wrapper:hover .product-price h1 {
            opacity: 1;
            visibility: visible;
            margin-left: 0px;
        }

        /* ১. প্রোডাক্ট লিস্টে Cost Price লুকানো, হোভারে দেখা */
            .product-price h1:nth-of-type(2) {
                opacity: 0;
                transition: opacity 0.3s;
                color: red;
                font-size: 14px;
            }

            .card-wrapper:hover .product-price h1:nth-of-type(2) {
                opacity: 1;
            }

            /* ২. কার্টে Cost Price ইনপুট হোভারে লাল দেখা */
            td input[oninput*="updateCostPrice"] {
                color: transparent !important;
                background: none;
                border: none;
                width: 80px;
                text-align: center;
            }

            /* Scoped High-Priority CSS for Hold Invoices Modal */
            #holdInvoicesModal .modal-dialog {
                max-width: 820px !important;
                width: 95% !important;
                margin: 1.75rem auto !important;
            }

            #holdInvoicesModal .modal-content {
                border-radius: 18px !important;
                border: none !important;
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25) !important;
                background: #ffffff !important;
                overflow: hidden !important;
                width: 100% !important;
            }

            #holdInvoicesModal .hold-invoices-table {
                width: 100% !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                margin: 0 !important;
            }

            #holdInvoicesModal .hold-invoices-table th,
            #holdInvoicesModal .hold-invoices-table td {
                padding: 12px 14px !important;
                vertical-align: middle !important;
                border-bottom: 1px solid #e2e8f0 !important;
                font-family: var(--primary-font) !important;
                box-sizing: border-box !important;
                white-space: nowrap !important;
                overflow: hidden !important;
                text-overflow: ellipsis !important;
            }

            #holdInvoicesModal .hold-invoices-table th {
                background-color: #f8fafc !important;
                color: #475569 !important;
                font-weight: 700 !important;
                font-size: 13px !important;
                text-transform: uppercase !important;
            }

            #holdInvoicesModal .hold-invoices-table tr:hover td {
                background-color: #f8fafc !important;
            }
            body[light-mode="dark"] .store-brand-header {
                background-color: #1e293b !important;
                border-color: #334155 !important;
            }
            @media (max-width: 576px) {
                #navbar .nav-wrapper {
                    padding-left: 4px !important;
                    padding-right: 4px !important;
                }
                .store-brand-header {
                    padding: 2px 6px !important;
                    max-width: 55% !important;
                }
                .store-brand-header h5 {
                    font-size: 11px !important;
                }
                .store-brand-header img {
                    height: 20px !important;
                }
            }

        /* Mobile POS Page Responsive Styling - Exact Parity with Reference Screenshot */
        @media (max-width: 991px) {
            #pos-main {
                display: none !important;
            }
            html, body {
                background: #f8fafc !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
                min-width: 100% !important;
                max-width: 100% !important;
                overflow-x: hidden !important;
            }
            .pos-mobile-wrapper {
                display: block !important;
                background: #f8fafc !important;
                min-height: 100vh !important;
                width: 100% !important;
                min-width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                padding: 0 0 90px 0 !important;
                box-sizing: border-box !important;
            }
        }

        @media (min-width: 992px) {
            .pos-mobile-wrapper {
                display: none !important;
            }
            #pos-main {
                display: block !important;
            }
            #posProductsCol, #posCartCol {
                display: block !important;
            }
        }

        /* Mobile Top Purple Header */
        .pos-mobile-header {
            background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
            color: #ffffff;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1040;
            box-shadow: 0 4px 15px rgba(22, 163, 74, 0.25);
        }

        .pos-mobile-back-btn {
            color: #ffffff !important;
            font-size: 18px;
            text-decoration: none;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pos-mobile-title {
            font-size: 17px;
            font-weight: 800;
            margin: 0;
        }

        .pos-mobile-type-toggle {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2px;
            display: flex;
            align-items: center;
        }

        .pos-mobile-type-toggle .type-btn {
            border: none;
            background: transparent;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 16px;
            transition: all 0.2s ease;
        }

        .pos-mobile-type-toggle .type-btn.active {
            background: #ffffff;
            color: #15803d;
            font-weight: 800;
        }

        /* Sub-header Date & Invoice Bar */
        .pos-mobile-subhead {
            background: #ffffff;
            padding: 10px 16px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 12px;
            color: #475569;
        }

        .pos-mobile-subhead .subhead-label {
            font-weight: 600;
        }

        /* Outlined Legend Field Box */
        .pos-mobile-field-group {
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 14px;
            padding: 12px 14px;
            margin: 12px 14px;
            position: relative;
        }

        .pos-mobile-field-group .field-group-label {
            position: absolute;
            top: -10px;
            left: 14px;
            background: #ffffff;
            padding: 0 6px;
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
        }

        .btn-info-icon {
            border: none;
            background: transparent;
            color: #94a3b8;
            font-size: 16px;
            padding: 0;
        }

        /* Mobile Selected Customer Info Details Card */
        .pos-mobile-customer-details-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 12px 14px;
            margin: 0 14px 12px 14px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .info-badge-box {
            display: flex;
            align-items: center;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            background: #ffffff;
            height: 34px;
        }

        .info-badge-label {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            padding: 0 8px;
            height: 100%;
            display: flex;
            align-items: center;
            border-right: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .info-badge-val {
            font-size: 12px;
            font-weight: 700;
            color: #0f172a;
            padding: 0 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .info-badge-box.due-box {
            border-color: #fecaca;
            background: #fff5f5;
        }

        .info-badge-label.due-label {
            background: #fee2e2;
            color: #dc2626;
            border-right-color: #fecaca;
        }

        /* Added Products Mobile Card List */
        .pos-mobile-cart-card {
            background: #ffffff;
            margin: 0 14px 12px 14px;
            border-radius: 16px;
            padding: 14px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
        }

        .mobile-cart-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 10px;
        }

        .mobile-cart-item-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .mobile-cart-item-name {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
        }

        .btn-remove-item {
            border: none;
            background: transparent;
            color: #ef4444;
            font-size: 16px;
        }

        .mobile-cart-item-price-calc {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .mobile-cart-item-subtotal {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px dashed #cbd5e1;
            padding-top: 6px;
            margin-top: 6px;
        }

        .mobile-cart-summary {
            background: #f1f5f9;
            border-radius: 12px;
            padding: 10px 14px;
            margin-top: 12px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-add-item-mobile {
            background: #dcfce7;
            color: #15803d;
            border: none;
            border-radius: 12px;
            padding: 12px;
            width: 100%;
            font-weight: 700;
            font-size: 13px;
            margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Financial Summary Panel */
        .pos-mobile-calc-card {
            background: #ffffff;
            margin: 0 14px 12px 14px;
            border-radius: 16px;
            padding: 14px;
            border: 1px solid #e2e8f0;
        }

        .calc-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .calc-row:last-child {
            margin-bottom: 0;
        }

        .calc-label {
            font-size: 14px;
            font-weight: 700;
            color: #475569;
        }

        .calc-input-wrap {
            display: flex;
            align-items: center;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 4px 10px;
            background: #ffffff;
            width: 150px;
        }

        .currency-sym {
            font-size: 14px;
            font-weight: 700;
            color: #64748b;
            margin-right: 6px;
        }

        .calc-input {
            border: none;
            outline: none;
            width: 100%;
            text-align: right;
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            background: transparent;
        }

        /* Payment Method Section - Exact Reference Parity */
        .pos-mobile-payment-card {
            background: #ffffff;
            margin: 0 14px 14px 14px;
            border-radius: 16px;
            padding: 14px;
            border: 1px solid #e2e8f0;
        }

        .payment-card-title {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
        }

        .pos-mobile-payment-card-box {
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 14px;
            padding: 12px;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease;
        }

        .payment-select-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 10px;
        }

        .payment-method-select {
            appearance: none;
            -webkit-appearance: none;
            background: #ffffff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%3c6366f1' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") no-repeat right 12px center/12px 12px;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            padding: 8px 36px 8px 12px;
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            width: 100%;
            height: 42px;
            outline: none;
        }

        .payment-method-select:focus {
            border-color: #16a34a;
        }

        .btn-delete-payment-line {
            border: none;
            background: transparent;
            color: #fca5a5;
            font-size: 18px;
            padding: 4px;
            line-height: 1;
            transition: color 0.2s ease;
        }

        .btn-delete-payment-line:hover {
            color: #ef4444;
        }

        .payment-amount-input-wrap {
            display: flex;
            align-items: center;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            overflow: hidden;
            background: #ffffff;
            height: 42px;
        }

        .payment-amount-input-wrap .currency-prefix {
            background: #f1f5f9;
            color: #475569;
            font-size: 15px;
            font-weight: 700;
            padding: 0 14px;
            height: 100%;
            display: flex;
            align-items: center;
            border-right: 1.5px solid #cbd5e1;
            flex-shrink: 0;
        }

        .payment-amount-input-wrap input {
            border: none;
            outline: none;
            width: 100%;
            padding: 0 12px;
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            background: transparent;
        }

        .payment-extra-input {
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 13px;
            color: #334155;
            width: 100%;
            height: 40px;
            margin-top: 8px;
            background: #ffffff;
            outline: none;
        }

        .payment-extra-input::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        .btn-add-payment-line {
            border: none;
            background: transparent;
            color: #16a34a;
            font-size: 22px;
            font-weight: 700;
            padding: 0 14px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-shrink: 0;
            border-left: 1px solid #e2e8f0;
        }

        .btn-add-payment-line:hover {
            background: #dcfce7;
        }

        /* Mobile Note & Image Upload Card Styling - Exact Reference Parity */
        .pos-mobile-note-image-card {
            background: #ffffff;
            margin: 0 14px 14px 14px;
            border-radius: 16px;
            padding: 14px;
            border: 1px solid #e2e8f0;
        }

        .note-textarea-wrap {
            border: 1.5px solid #cbd5e1;
            border-radius: 14px;
            padding: 10px;
            background: #ffffff;
            height: 100px;
        }

        .note-textarea {
            border: none;
            outline: none;
            width: 100%;
            height: 100%;
            resize: none;
            font-size: 13px;
            color: #334155;
            background: transparent;
        }

        .note-textarea::placeholder {
            color: #94a3b8;
            font-size: 13px;
        }

        .image-upload-box {
            border: 1.5px solid #cbd5e1;
            border-radius: 14px;
            height: 100px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: border-color 0.2s ease;
        }

        .image-upload-box:hover {
            border-color: #16a34a;
        }

        .upload-icon-circle {
            color: #16a34a;
            font-size: 20px;
        }

        .placeholder-landscape-svg {
            width: 46px;
            height: 38px;
        }

        /* Fixed Sticky Save Button */
        .pos-mobile-sticky-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #ffffff;
            padding: 12px 16px 16px 16px;
            box-shadow: 0 -6px 25px rgba(0, 0, 0, 0.1);
            z-index: 1050;
        }

        .btn-mobile-save-invoice {
            background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
            color: #ffffff;
            border: none;
            border-radius: 14px;
            padding: 14px;
            width: 100%;
            font-weight: 800;
            font-size: 17px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(22, 163, 74, 0.35);
        }
    </style>

    <!-- Google Fonts: Noto Sans Bengali & Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- HTML5 QR & Barcode Scanner Library -->
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
</head>

<body>
    <!-- MOBILE EXCLUSIVE POS UI CONTAINER (Active on screens < 992px) -->
    <div class="pos-mobile-wrapper">
        <!-- 1. Mobile Top Purple Header -->
        <div class="pos-mobile-header">
            <a href="{{ url('admin-dashboard') }}" class="pos-mobile-back-btn">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <h5 class="pos-mobile-title">নতুন বিক্রয়</h5>
        </div>

        <!-- 2. Mobile Sub-Header Info Bar -->
        <div class="pos-mobile-subhead">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="subhead-label">ইনভয়েস নম্বর : <span id="mobileInvoiceNo"></span></span>
                <span class="subhead-label">ইনভয়েস তারিখ : <span id="mobileInvoiceDate">{{ date('d/m/Y') }}</span> 📅</span>
            </div>
            <div class="text-end fw-bold text-dark" style="font-size: 13px;">
                মোট : <span id="mobileHeaderTotal" class="text-primary fw-extrabold">৳ ০.০০</span>
            </div>
        </div>

        <!-- 3. Customer Field Group ("কাস্টমার যোগ করুন") -->
        <div class="pos-mobile-field-group">
            <label class="field-group-label">কাস্টমার যোগ করুন</label>
            <div class="d-flex align-items-center justify-content-between">
                <div class="flex-grow-1" id="mobileCustomerSelectBox" onclick="openMobileCustomerSearchModal()" style="cursor: pointer;">
                    <div id="mobileCustomerNameDisplay" class="fw-bold text-dark" style="font-size: 15px;">কাস্টমার সিলেক্ট করুন</div>
                    <div id="mobileCustomerSubDisplay" class="small text-muted mt-1 d-none" style="font-size: 12px; line-height: 1.3;"></div>
                </div>
                <button type="button" class="btn-info-icon ms-2" onclick="openMobileCustomerSearchModal()">
                    <i class="fa-solid fa-circle-info"></i>
                </button>
            </div>
        </div>

        <input type="hidden" id="mobileCustomerDate" value="{{ date('Y-m-d') }}" />

        <!-- 4. Added Products Mobile Card List -->
        <div class="pos-mobile-cart-card">
            <div id="mobileCartItemsList">
                <!-- Dynamically populated mobile cart items -->
                <div class="text-center py-4 text-muted" id="mobileCartEmptyMsg">
                    <i class="fa-solid fa-cart-shopping fs-3 mb-2 text-secondary"></i>
                    <p class="mb-0 small">এখনও কোনো আইটেম যোগ করা হয়নি</p>
                </div>
            </div>

            <!-- Mobile Cart Summary Row -->
            <div class="mobile-cart-summary">
                <div class="d-flex justify-content-between align-items-center">
                    <span>মোট পরিমাণ <strong id="mobileTotalQty">০</strong></span>
                    <span>মোট মূল্য <strong id="mobileTotalPrice" class="text-primary">৳ ০.০০</strong></span>
                </div>
            </div>

            <!-- Item Add Button -->
            <button type="button" class="btn-add-item-mobile" onclick="openMobileProductSearchModal()">
                <i class="fa-solid fa-circle-plus text-primary me-1"></i> আইটেম যোগ করুন
            </button>
        </div>

        <!-- 5. Financial Calculations Summary Panel -->
        <div class="pos-mobile-calc-card">
            <div class="calc-row">
                <span class="calc-label">মোট মূল্য</span>
                <div class="calc-input-wrap">
                    <span class="currency-sym">৳</span>
                    <input type="text" readonly id="mobileGrossTotal" value="0.00" class="calc-input" />
                </div>
            </div>
            <div class="calc-row">
                <span class="calc-label">ডিসকাউন্ট</span>
                <div class="calc-input-wrap">
                    <span class="currency-sym">৳</span>
                    <input type="text" inputmode="decimal" id="mobileDiscountInput" oninput="enforceBanglaNumberInput(this); syncMobileCalcInputs()" placeholder="" class="calc-input" />
                </div>
            </div>
            <div class="calc-row">
                <span class="calc-label">ডেলিভারি চার্জ</span>
                <div class="calc-input-wrap">
                    <span class="currency-sym">৳</span>
                    <input type="text" inputmode="decimal" id="mobileDeliveryCharge" oninput="enforceBanglaNumberInput(this); syncMobileCalcInputs()" placeholder="" class="calc-input" />
                </div>
            </div>
            <div class="calc-row">
                <span class="calc-label">সর্বমোট মূল্য</span>
                <div class="calc-input-wrap">
                    <span class="currency-sym">৳</span>
                    <input type="text" readonly id="mobileNetTotal" value="0.00" class="calc-input fw-bold" />
                </div>
            </div>
            <div class="calc-row">
                <span class="calc-label">পেলাম</span>
                <div class="calc-input-wrap">
                    <span class="currency-sym">৳</span>
                    <input type="text" inputmode="decimal" id="mobilePaidInput" oninput="enforceBanglaNumberInput(this); syncMobileCalcInputs()" placeholder="" class="calc-input" />
                </div>
            </div>
            <div class="calc-row">
                <span class="calc-label">বাকি</span>
                <div class="calc-input-wrap">
                    <span class="currency-sym">৳</span>
                    <input type="text" readonly id="mobileDueInput" value="0.00" class="calc-input text-danger fw-bold" />
                </div>
            </div>
        </div>

        <!-- 6. Payment Method Section (Exact Parity with Reference Screenshot) -->
        <div class="pos-mobile-payment-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="payment-card-title">
                    পেমেন্টের মাধ্যম <i class="fa-solid fa-circle-info text-muted ms-1" style="font-size: 13px;" title="পেমেন্টের একাধিক মাধ্যম নির্বাচন করতে পারেন"></i>
                </span>
            </div>

            <!-- Dynamic Payment Rows Container -->
            <div id="mobilePaymentRowsContainer">
                <!-- Dynamically rendered payment cards -->
            </div>
        </div>

        <!-- 6.5. Additional Note & Document Image Upload Section (Exact Parity with Highlighted Screenshot) -->
        <div class="pos-mobile-note-image-card">
            <!-- Send Due SMS Checkbox Row -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-check-label d-flex align-items-center gap-2 fw-bold text-dark cursor-pointer m-0" style="font-size: 14px;">
                    <span>বাকির মেসেজ পাঠান</span>
                    <input type="checkbox" id="chkSendCreditSms" class="form-check-input m-0" style="width: 18px; height: 18px; border-radius: 4px;" />
                </label>
            </div>

            <!-- Note Textarea & Image Upload Dual Box Row -->
            <div class="row g-2">
                <!-- Left Box: Description (0/250) Textarea -->
                <div class="col-8">
                    <div class="note-textarea-wrap">
                        <textarea id="mobileOrderNote" maxlength="250" placeholder="বর্ণনা (০/২৫০)" class="note-textarea" oninput="updateMobileNoteCharCount(this); syncMobileNoteToDesktop(this.value)"></textarea>
                    </div>
                </div>

                <!-- Right Box: Image Upload Box with '+' Preview Icon -->
                <div class="col-4">
                    <div class="image-upload-box" onclick="triggerMobileDocumentUpload()">
                        <input type="file" id="mobileDocumentImage" accept="image/*" class="d-none" onchange="previewMobileDocumentImage(this)" />
                        <div id="mobileImagePlaceholder" class="d-flex flex-column align-items-center justify-content-center text-center h-100">
                            <div class="upload-icon-circle mb-1">
                                <i class="fa-solid fa-circle-plus"></i>
                            </div>
                            <svg class="placeholder-landscape-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3Z" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="8.5" cy="8.5" r="1.5" fill="#cbd5e1"/>
                                <path d="M21 15L16 10L5 21" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <img id="mobileImagePreview" src="" alt="Preview" class="d-none w-100 h-100 object-fit-cover rounded-3" />
                    </div>
                </div>
            </div>
        </div>

        <!-- 7. Fixed Sticky Bottom Action Button -->
        <div class="pos-mobile-sticky-footer">
            <button type="button" onclick="SavePaymentInfo(event)" class="btn-mobile-save-invoice">
                সেভ করুন
            </button>
        </div>
    </div>

    <!-- Mobile Customer Search & Listing Bottom Sheet Modal (Exact Screenshot Parity) -->
    <div class="modal fade bottom-sheet" id="mobileCustomerSearchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content border-0 p-3" style="border-top-left-radius: 28px; border-top-right-radius: 28px; box-shadow: 0 -10px 40px rgba(0,0,0,0.2);">
                <div class="quick-modal-handle"></div>

                <!-- Top Search Input with Embedded Plus Icon -->
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="position-relative flex-grow-1 d-flex align-items-center bg-light rounded-pill px-3 py-1" style="border: 1px solid #e2e8f0; height: 48px;">
                        <i class="fa-solid fa-magnifying-glass text-muted me-2 fs-5"></i>
                        <input type="text" id="mobileCustomerSearchInput" oninput="filterMobileCustomers(this.value)" class="border-0 bg-transparent flex-grow-1 outline-none fw-bold" placeholder="কাস্টমার খুঁজুন..." style="font-size: 15px; color: #1e293b;" />
                    </div>
                    <button type="button" class="btn btn-light rounded-circle shadow-xs d-flex align-items-center justify-content-center flex-shrink-0" onclick="openCreateCustomerModalFromMobile()" style="width: 48px; height: 48px; border: 1px solid #e2e8f0; color: #16a34a; background: #ffffff;">
                        <i class="fa-solid fa-plus fs-4"></i>
                    </button>
                </div>

                <!-- Customer List Container -->
                <div id="mobileCustomerModalList" style="max-height: 380px; overflow-y: auto;">
                    <!-- Dynamically populated customer list -->
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Product Search Bottom Sheet Modal (Exact Screenshot Parity with Add Button Fix) -->
    <div class="modal fade bottom-sheet" id="mobileProductSearchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content border-0 p-3" style="border-top-left-radius: 28px; border-top-right-radius: 28px; box-shadow: 0 -10px 40px rgba(0,0,0,0.2);">
                <div class="quick-modal-handle"></div>

                <!-- Modal Title & Add Product Header Button -->
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <h6 class="fw-extrabold text-dark m-0 d-flex align-items-center gap-2" style="font-size: 15px;">
                        <i class="fa-solid fa-boxes-stacked text-success"></i>
                        <span>প্রোডাক্ট সিলেক্ট করুন</span>
                    </h6>
                    <button type="button" class="btn btn-sm btn-success rounded-pill px-3 py-1.5 fw-bold shadow-xs d-flex align-items-center gap-1" onclick="openCreateProductModalFromMobile()" style="font-size: 12px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none;">
                        <i class="fa-solid fa-plus"></i>
                        <span>নতুন প্রোডাক্ট</span>
                    </button>
                </div>

                <!-- Top Search Input with Embedded Barcode & Plus Icons -->
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="position-relative flex-grow-1 d-flex align-items-center bg-light rounded-pill px-3 py-1" style="border: 1px solid #cbd5e1; height: 42px; min-width: 0;">
                        <i class="fa-solid fa-magnifying-glass text-muted me-2 fs-6 flex-shrink-0"></i>
                        <input type="text" id="mobileModalSearchInput" oninput="filterMobileProducts(this.value)" class="border-0 bg-transparent flex-grow-1 outline-none fw-bold p-0" placeholder="সার্চ করুন..." style="font-size: 14px; color: #1e293b; min-width: 0;" />
                    </div>
                    <button type="button" class="btn btn-light rounded-circle shadow-xs d-flex align-items-center justify-content-center flex-shrink-0 p-0" onclick="openCameraScanner()" style="width: 38px; height: 38px; border: 1px solid #cbd5e1; color: #16a34a; background: #ffffff;" title="বারকোড স্ক্যানার">
                        <i class="fa-solid fa-qrcode fs-6"></i>
                    </button>
                    <button type="button" class="btn btn-success rounded-circle shadow-sm d-flex align-items-center justify-content-center flex-shrink-0 p-0" onclick="openCreateProductModalFromMobile()" style="width: 38px; height: 38px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none; color: #ffffff;" title="নতুন প্রোডাক্ট তৈরি করুন">
                        <i class="fa-solid fa-plus fs-5"></i>
                    </button>
                </div>

                <!-- Product List Container -->
                <div id="mobileProductsGrid" style="max-height: 380px; overflow-y: auto;">
                    <!-- Dynamically populated product items -->
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile "নতুন আইটেম লাইন" Form Bottom Sheet Modal (100% User Screenshot Replica) -->
    <div class="modal fade bottom-sheet" id="mobileItemLineModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content border-0 p-0" style="border-top-left-radius: 28px; border-top-right-radius: 28px; box-shadow: 0 -10px 40px rgba(0,0,0,0.25); overflow: hidden;">
                <!-- Green Header Bar -->
                <div class="d-flex align-items-center justify-content-between px-3 py-3" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); color: white;">
                    <button type="button" class="border-0 bg-transparent text-white p-0 fs-5" data-bs-dismiss="modal">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <h5 class="fw-bold m-0 text-white" style="font-size: 17px;">নতুন আইটেম লাইন</h5>
                    <div style="width: 24px;"></div>
                </div>

                <div class="p-3 bg-white">
                    <!-- Outlined Field 1: পণ্য/সার্ভিস নাম -->
                    <div class="pos-mobile-field-group mb-3">
                        <label class="field-group-label">পণ্য/সার্ভিস নাম</label>
                        <input type="text" id="itemLineProductName" readonly class="form-control border-0 bg-transparent fw-bold text-dark p-0" style="font-size: 15px;" />
                        <input type="hidden" id="itemLineProductId" />
                    </div>

                    <!-- Outlined Field 2: পরিমাণ -->
                    <div class="pos-mobile-field-group mb-3">
                        <label class="field-group-label">পরিমাণ</label>
                        <input type="text" inputmode="decimal" id="itemLineQty" value="১" oninput="enforceBanglaNumberInput(this); calculateItemLineTotal()" class="form-control border-0 bg-transparent fw-bold text-dark p-0" style="font-size: 16px;" />
                    </div>

                    <!-- Outlined Field 3: মূল্য -->
                    <div class="pos-mobile-field-group mb-3">
                        <label class="field-group-label">মূল্য</label>
                        <input type="text" inputmode="decimal" id="itemLinePrice" value="০.০০" oninput="enforceBanglaNumberInput(this); calculateItemLineTotal()" class="form-control border-0 bg-transparent fw-bold text-dark p-0" style="font-size: 16px;" />
                    </div>

                    <!-- Sub-Total & Total Price Summary Card -->
                    <div class="p-3 mb-4 rounded-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div class="d-flex justify-content-between align-items-center pb-2 mb-2" style="border-bottom: 1px dashed #cbd5e1;">
                            <span class="text-muted" style="font-size: 13px;">সাব টোটাল</span>
                            <span id="itemLineBreakdownText" class="fw-bold text-dark" style="font-size: 13px;">১.০০ X ৳ ২২০.০০ = ৳ ২২০.০০</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-dark" style="font-size: 14px;">মোট মূল্য</span>
                            <span id="itemLineTotalText" class="fw-extrabold text-dark" style="font-size: 15px;">৳ ২২০.০০</span>
                        </div>
                    </div>

                    <!-- Action Buttons: বাতিল & ঠিক আছে -->
                    <div class="row g-2">
                        <div class="col-6">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-outline-success w-100 py-2.5 fw-bold" style="border-radius: 12px; border: 1.5px solid #16a34a; color: #15803d; font-size: 15px; background: #ffffff;">
                                বাতিল
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" onclick="confirmAddItemLineToCart()" class="btn btn-success w-100 py-2.5 fw-bold" style="border-radius: 12px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; color: #ffffff; font-size: 15px;">
                                ঠিক আছে
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="pos-main">
        <!-- 1. Top Navigation Bar (Ultra-Compact Header) -->
        <nav id="navbar" class="mb-2">
            <div class="nav-wrapper py-1 px-2 px-md-3 d-flex align-items-center justify-content-between gap-1 gap-md-2" style="min-height: 42px; border-radius: 12px; flex-wrap: nowrap;">
                <div class="nav_back_btn p-0 d-flex align-items-center flex-shrink-0">
                    <a href="{{ url('admin-dashboard') }}" class="btn btn-sm btn-outline-success fw-bold d-inline-flex align-items-center gap-1 py-1 px-2 shadow-sm" style="border-radius: 20px; font-size: 11px; background: #f0fdf4; border-color: #bbf7d0; height: 30px;">
                        <i class="fa-solid fa-arrow-left text-success" style="font-size: 11px;"></i>
                        <span class="nav_back_text text-success m-0 p-0 fw-bold d-none d-sm-inline" style="font-size: 11px;">Back to Dashboard</span>
                        <span class="nav_back_text text-success m-0 p-0 fw-bold d-inline d-sm-none" style="font-size: 11px;">Back</span>
                    </a>
                </div>

                <a href="{{ url('admin-dashboard') }}" class="store-brand-header d-flex align-items-center gap-1 gap-md-2 px-2 px-md-3 py-1 bg-white border border-success-subtle rounded-pill shadow-sm overflow-hidden text-decoration-none">
                    <img src="{{ asset('back-end/assets/img/anis-store-logo.png') }}" alt="AS Logo" style="height: 24px; width: auto; object-fit: contain; flex-shrink: 0;" />
                    <h5 class="fw-extrabold text-success m-0 p-0 d-flex align-items-center gap-1 text-truncate" style="font-size: 13px; font-family: 'Noto Sans Bengali', sans-serif; font-weight: 800;">
                        <span class="text-truncate">মেসার্স আনিস ষ্টোর</span>
                        <span class="badge bg-success text-white fw-bold px-1.5 py-0.5 d-none d-md-inline" style="font-size: 9px; border-radius: 8px; font-family: 'Poppins', sans-serif;">POS</span>
                    </h5>
                </a>

                <div class="profile d-flex align-items-center gap-1 gap-md-2 flex-shrink-0">
                    <button class="light-mode-button" aria-label="Toggle Light Mode"
                        onclick="toggle_light_mode()" style="height: 24px; width: 38px;">
                        <span style="height: 18px; width: 36px; top: 3px;"></span>
                        <span style="height: 14px; width: 14px; top: 5px;"></span>
                    </button>

                    <div class="fullscreen">
                        <button class="js-toggle-fullscreen-btn toggle-fullscreen-btn"
                            aria-label="Enter fullscreen mode" hidden>
                            <svg width="22" height="22" class="toggle-fullscreen-svg" viewBox="0 0 30 30"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g class="icon-fullscreen-enter">
                                    <path
                                        d="M2 7.5H0V3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.31607 2.20435 0 3 0H7.5V2H2V7.5Z"
                                        fill="#192045" />
                                    <path
                                        d="M30 7.5H28V2H22.5V0H27C27.7956 0 28.5587 0.31607 29.1213 0.87868C29.6839 1.44129 30 2.20435 30 3V7.5Z"
                                        fill="#192045" />
                                    <path
                                        d="M7.5 30H3C2.20435 30 1.44129 29.6839 0.87868 29.1213C0.31607 28.5587 0 27.7956 0 27V22.5H2V28H7.5V30Z"
                                        fill="#192045" />
                                    <path
                                        d="M27 30H22.5V28H28V22.5H30V27C30 27.7956 29.6839 28.5587 29.1213 29.1213C28.5587 29.6839 27.7956 30 27 30Z"
                                        fill="#192045" />
                                </g>
                            </svg>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user p-0 border-0 d-flex align-items-center justify-content-center"
                            id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                id="UserProfileImg" src="{{ asset('back-end/assets/img/profile-img.png') }}"
                                onerror="this.src='{{ asset('back-end/assets/img/profile-img.png') }}'" alt="Header Avatar"
                                style="width: 36px; height: 36px; object-fit: cover;" />
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0 profile-dropdown shadow-lg border-0" style="width: 220px; border-radius: 10px;">
                            <div class="p-3 border-bottom">
                                <h6 class="mb-0 fw-bold" id="AuthorizePersonProfileName"></h6>
                                <a href="#" class="mb-0 font-size-11 text-muted d-block text-truncate" id="EmailShow">
                                </a>
                            </div>
                            <a class="dropdown-item" href="{{ url('admin-dashboard-user-profile') }}"><i
                                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i>
                                <span class="align-middle">Profile</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#" onclick="userlogout(event)"><i
                                    class="mdi mdi-logout text-danger font-size-16 align-middle me-2"></i>
                                <span class="align-middle">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- 2. Compact Sleek Logo Navbar Header (Point of Sale Bar) -->
        <div class="d-flex align-items-center justify-content-between p-2 mb-2 bg-white border border-success-subtle shadow-sm" style="border-radius: 12px; border-left: 4px solid #16a34a !important;">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('back-end/assets/img/anis-store-logo.png') }}" alt="Anis Store Logo" style="max-height: 38px; width: auto; object-fit: contain;" />
            </div>
            <div class="text-end">
                <span class="badge bg-success-subtle text-success border border-success fw-bold px-3 py-1" style="font-size: 12px; border-radius: 20px;">
                    <i class="fa-solid fa-store me-1"></i> Point of Sale
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 pos-products-col" id="posProductsCol">
                <!-- Barcode Search & Camera Scan for Product List View -->
                <div class="mb-2 p-2 bg-white border shadow-sm" style="border-radius: 12px; border-color: #e2e8f0 !important;">
                    <div class="searchbar d-flex align-items-center gap-2 w-100">
                        <div class="flex-grow-1 mb-0 position-relative d-flex align-items-center">
                            <input type="text" id="productCodeSearch"
                                placeholder="🔍 বারকোড স্ক্যান করুন অথবা কোড/নাম লিখুন..."
                                oninput="searchByProductCode(this.value, 'productCodeSearch')"
                                onkeydown="handleBarcodeEnterKey(event, this.value)"
                                onfocus="this.select()"
                                class="form-control posSearchInput m-0" autofocus autocomplete="off" style="border-radius: 10px; height: 42px; font-size: 13px;" />
                            <a href="#" class="search-icon" onclick="triggerBarcodeSearchManual(event, 'productCodeSearch')">
                                <svg width="23" height="24" viewBox="0 0 27 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2967 16.9811H18.0695L17.6449 16.5566C19.1578 14.8045 20.0686 12.5274 20.0686 10.0343C20.0686 4.49228 15.5763 0 10.0343 0C4.49228 0 0 4.49228 0 10.0343C0 15.5763 4.49228 20.0686 10.0343 20.0686C12.5274 20.0686 14.8045 19.1578 16.5566 17.6527L16.9811 18.0772V19.2967L24.6998 27L27 24.6998L19.2967 16.9811ZM10.0343 16.9811C6.19811 16.9811 3.08748 13.8705 3.08748 10.0343C3.08748 6.19811 6.19811 3.08748 10.0343 3.08748C13.8705 3.08748 16.9811 6.19811 16.9811 10.0343C16.9811 13.8705 13.8705 16.9811 10.0343 16.9811Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <div id="productCodeSearchSuggestions" class="pos-search-suggestions position-absolute start-0 end-0 bg-white border shadow-lg rounded-3 d-none" style="top: 100%; margin-top: 6px; z-index: 1050; max-height: 320px; overflow-y: auto;"></div>
                        </div>
                        <button type="button" class="btn btn-primary fw-bold text-nowrap d-inline-flex align-items-center justify-content-center gap-2 shadow-sm px-3 m-0" onclick="openCameraScanner()" style="border-radius: 10px; height: 42px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; flex-shrink: 0;">
                            <i class="fa-solid fa-camera fs-6"></i>
                            <span class="d-none d-sm-inline">ক্যামেরা স্ক্যান</span>
                        </button>
                        <button type="button" class="btn btn-success fw-bold text-nowrap d-inline-flex align-items-center justify-content-center gap-2 shadow-sm px-3 m-0" onclick="openPosAddProductModal()" style="border-radius: 10px; height: 42px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; flex-shrink: 0;">
                            <i class="fa-solid fa-plus fs-6"></i>
                            <span class="d-none d-sm-inline">নতুন প্রোডাক্ট</span>
                        </button>
                    </div>
                </div>

                <!-- Categories Start -->
                <div class="catagories-search-wrapper mb-2">
                    <div class="headding">
                        <h1>Brand</h1>
                        <p>Select From Below Brand</p>
                    </div>
                </div>
                <!-- Categories End -->

                <!-- Pos Product Slider Start -->
                <section id="product-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper" id="ProductCategoryData">

                            <!-- Add more slides as needed -->
                        </div>
                    </div>

                    <div class="swiper-button-next">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                </section>
                <!-- Pos Product Slider End -->

                <!-- Pos Product Card Start -->
                <section id="product-card">
                    <div class="row" id="ProductCategoryWishDataItem">
                    </div>
                </section>
                <!-- Pos Product Card End -->
            </div>
            <!-- Pos Categories End -->

            <!-- Pos Order List Start -->
            <div class="col-lg-6 pos-cart-col" id="posCartCol">

                <div id="customerReturnCreditNotice" class="alert alert-info border-info d-none mb-3 py-2 px-3 align-items-center justify-content-between shadow-sm" style="border-radius: 10px; background: #e0f2fe; color: #0369a1;">
                    <div>
                        <i class="fa-solid fa-gift me-2 text-info fs-5"></i>
                        <span class="fw-bold">ফেরত ক্রেডিট ব্যালেন্স: ৳ <span id="posReturnCreditVal">0.00</span></span>
                        <span class="ms-2 text-muted small">(এই কাস্টমারের পূর্বের পণ্য ফেরতের ক্রেডিট আছে)</span>
                    </div>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" id="chkUseReturnCredit" onchange="togglePosReturnCreditAdjustment()">
                        <label class="form-check-input-label fw-bold text-dark small" for="chkUseReturnCredit">সমন্বয় করুন (Adjust)</label>
                    </div>
                </div>

                <!-- Ultra-Compact Customer & Invoice Info Header -->
                <div class="p-2 border bg-white shadow-sm mb-2" style="border-radius: 12px; border-color: #e2e8f0 !important;">
                    <div class="row g-2 align-items-center">
                        <!-- Col 1: Customer Search Dropdown & Create Customer -->
                        <div class="col-md-7 col-12">
                            <div class="d-flex align-items-center gap-2">
                                <div class="select-box-dropdown flex-grow-1">
                                    <div class="select-dropdown-selected py-1 px-2 border rounded-2" style="font-size: 12px; height: 32px; background: #f8fafc; cursor: pointer;">
                                        <span class="text-truncate">কাস্টমার সিলেক্ট করুন</span>
                                        <span class="icon ms-1"><i class="fas fa-angle-down"></i></span>
                                    </div>
                                    <div class="select-dropdown-items">
                                        <input type="text" class="select-search-box" placeholder="Search customer..." style="display: none;">
                                        <div id="CustomerSelectData"></div>
                                    </div>
                                </div>
                                <button id="openPosCustomerModalBtn" onclick="openPosCustomerModal()" type="button" class="btn btn-sm btn-success text-nowrap fw-bold px-3" style="height: 32px; font-size: 12px; border-radius: 8px;">
                                    + New
                                </button>
                            </div>
                        </div>

                        <!-- Col 2: Invoice Date -->
                        <div class="col-md-5 col-12">
                            <div class="d-flex align-items-center gap-1">
                                <span class="text-muted small text-nowrap fw-bold" style="font-size: 11px;">তারিখ:</span>
                                <input type="date" id="CustomerDate" class="form-control form-control-sm py-0 px-2 fw-bold" style="height: 32px; font-size: 12px; border-radius: 8px; background: #f8fafc;" />
                            </div>
                        </div>
                    </div>

                    <!-- Inline Compact Row: Customer Info Fields -->
                    <div class="row g-1 mt-1 pt-1 border-top align-items-center">
                        <div class="col-md-4 col-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light py-0 px-2 text-muted fw-bold" style="font-size: 10px;">নাম</span>
                                <input type="text" id="CustomerName" readonly class="form-control py-0 px-2 fw-bold text-dark" placeholder="কাস্টমার নাম" style="font-size: 11px; height: 26px; background: #f8fafc;" />
                                <input type="hidden" id="CustomerID" value="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light py-0 px-2 text-muted fw-bold" style="font-size: 10px;">মোবাইল</span>
                                <input type="text" id="CustomerMobileNumber" readonly class="form-control py-0 px-2 fw-bold text-dark" placeholder="মোবাইল" style="font-size: 11px; height: 26px; background: #f8fafc;" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light py-0 px-2 text-muted fw-bold" style="font-size: 10px;">ঠিকানা</span>
                                <input type="text" id="CustomerAddress" readonly class="form-control py-0 px-2 text-dark" placeholder="ঠিকানা" style="font-size: 11px; height: 26px; background: #f8fafc;" />
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-danger-subtle text-danger py-0 px-1 fw-bold" style="font-size: 10px;">বকেয়া</span>
                                <input type="text" id="totalPreviousDueAmount" readonly value="0" class="form-control py-0 px-1 fw-bold text-danger text-center" style="font-size: 11px; height: 26px; background: #fff5f5;" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Camera Scan & Barcode Search Bar (Only shown on Mobile/Tablet view < 992px) -->
                <div class="d-block d-lg-none mb-2 p-2 bg-white border shadow-sm" style="border-radius: 12px; border-color: #e2e8f0 !important;">
                    <div class="searchbar d-flex align-items-center gap-2 w-100">
                        <div class="flex-grow-1 mb-0 position-relative d-flex align-items-center">
                            <input type="text" id="productCodeSearchCart"
                                placeholder="🔍 বারকোড স্ক্যান করুন অথবা কোড/নাম লিখুন..."
                                oninput="searchByProductCode(this.value, 'productCodeSearchCart')"
                                onkeydown="handleBarcodeEnterKey(event, this.value)"
                                class="form-control posSearchInput m-0" autocomplete="off" style="border-radius: 10px; height: 42px; font-size: 13px;" />
                            <a href="#" class="search-icon" onclick="triggerBarcodeSearchManual(event, 'productCodeSearchCart')">
                                <svg width="23" height="24" viewBox="0 0 27 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2967 16.9811H18.0695L17.6449 16.5566C19.1578 14.8045 20.0686 12.5274 20.0686 10.0343C20.0686 4.49228 15.5763 0 10.0343 0C4.49228 0 0 4.49228 0 10.0343C0 15.5763 4.49228 20.0686 10.0343 20.0686C12.5274 20.0686 14.8045 19.1578 16.5566 17.6527L16.9811 18.0772V19.2967L24.6998 27L27 24.6998L19.2967 16.9811ZM10.0343 16.9811C6.19811 16.9811 3.08748 13.8705 3.08748 10.0343C3.08748 6.19811 6.19811 3.08748 10.0343 3.08748C13.8705 3.08748 16.9811 6.19811 16.9811 10.0343C16.9811 13.8705 13.8705 16.9811 10.0343 16.9811Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <div id="productCodeSearchCartSuggestions" class="pos-search-suggestions position-absolute start-0 end-0 bg-white border shadow-lg rounded-3 d-none" style="top: 100%; margin-top: 6px; z-index: 1050; max-height: 320px; overflow-y: auto;"></div>
                        </div>
                        <button type="button" class="btn btn-primary fw-bold text-nowrap d-inline-flex align-items-center justify-content-center gap-2 shadow-sm px-3 m-0" onclick="openCameraScanner()" style="border-radius: 10px; height: 42px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; flex-shrink: 0;">
                            <i class="fa-solid fa-camera fs-6"></i>
                            <span class="d-none d-sm-inline">ক্যামেরা স্ক্যান</span>
                        </button>
                        <button type="button" class="btn btn-success fw-bold text-nowrap d-inline-flex align-items-center justify-content-center gap-2 shadow-sm px-3 m-0" onclick="openPosAddProductModal()" style="border-radius: 10px; height: 42px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; flex-shrink: 0;">
                            <i class="fa-solid fa-plus fs-6"></i>
                            <span class="d-none d-sm-inline">নতুন প্রোডাক্ট</span>
                        </button>
                    </div>
                </div>

                <!-- Order list table Start -->
                <div class="table-wrapper" style="overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 10px;">
                    <div class="table">
                        <table style="min-width: 580px; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="min-width: 120px; padding: 8px 10px;">পণ্য</th>
                                    <th style="min-width: 110px; padding: 8px 5px; text-align: center;">পরিমাণ</th>
                                    <th style="display: none">মোট কেনা</th>
                                    <th style="min-width: 90px; padding: 8px 5px; text-align: center;">ক্রয়মূল্য</th>
                                    <th style="min-width: 80px; padding: 8px 5px; text-align: center;">বিক্রয়মূল্য</th>
                                    <th style="min-width: 70px; padding: 8px 5px; text-align: center;">সাব টোটাল</th>
                                    <th style="min-width: 50px; padding: 8px 5px; text-align: center;">অ্যাকশন</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    

                    <div id="payment">
<div class="row mt-3">
    <div class="col-lg-6">
                        <div class="payments">
                            <div class="heading">
                                <h2>Payment Method</h2>
                            </div>
                            <form action="#">
                                <input type="radio" name="payment" id="cash" />
                                <input type="radio" name="payment" id="bkash" />
                                <input type="radio" name="payment" id="nagad" />
                                <input type="radio" name="payment" id="rocket" />
                                <input type="radio" name="payment" id="bank" />
                                <input type="radio" name="payment" id="mastercard" />

                                <div class="category-wrapper">
                                    <div class="category">
                                        <label for="cash" class="cashMethod">
                                            <input type="radio" name="payment" id="cash" />
                                            <div class="imgName">
                                                <div class="imgContainer cash">
                                                    <img src="{{ asset('back-end/assets/img/payment-cash.png') }}"
                                                        alt="" />
                                                </div>
                                                <h1>Cash</h1>
                                            </div>
                                            <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                        </label>

                                        <label for="bkash" class="bkashMethod">
                                            <div class="imgName">
                                                <div class="imgContainer bkash">
                                                    <img src="{{ asset('back-end/assets/img/payment-bkash.png') }}"
                                                        alt="" />
                                                </div>
                                                <h1>bKash</h1>
                                            </div>
                                            <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                        </label>

                                        <label for="nagad" class="nagadMethod">
                                            <div class="imgName">
                                                <div class="imgContainer nagad">
                                                    <img src="{{ asset('back-end/assets/img/payment-nagad.png') }}"
                                                        alt="" />
                                                </div>
                                                <h1>Nagad</h1>
                                            </div>
                                            <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                        </label>

                                        <label for="rocket" class="rocketMethod">
                                            <div class="imgName">
                                                <div class="imgContainer rocket">
                                                    <img src="{{ asset('back-end/assets/img/payment-rocket.png') }}"
                                                        alt="" />
                                                </div>
                                                <h1>Rocket</h1>
                                            </div>
                                            <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                        </label>

                                        <label for="bank" class="bankMethod">
                                            <div class="imgName">
                                                <div class="imgContainer bank">
                                                    <img src="{{ asset('back-end/assets/img/payment-bank.png') }}"
                                                        alt="" />
                                                </div>
                                                <h1>Bank</h1>
                                            </div>
                                            <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                        </label>

                                        <label for="mastercard" class="mastercardMethod">
                                            <div class="imgName">
                                                <div class="imgContainer mastercard">
                                                    <img src="{{ asset('back-end/assets/img/payment-card.png') }}"
                                                        alt="" />
                                                </div>
                                                <h1>Card</h1>
                                            </div>
                                            <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="transaction mb-2 mt-2">
                            <input type="text" id="transactionInput" placeholder="ট্রানজেকশন আইডি লিখুন" />
                     </div>
                      <div class="transaction">
                            <input type="text" id="orderNote" placeholder="নোট বা বিবরণ লিখুন" />
                     </div>
                    </div>
                </div>
    <div class="col-lg-6">
        <form id="orderForm">
                        <div class="totals">
                            <div class="subtotal" style="display: none;">
                                <span>মোট খরচ</span>
                                <span id="totalCost">৳</span>
                            </div>
                            <div class="subtotal">
                                <span>সাব-টোটাল</span>
                                <span style="color: #007bff; font-size:18px;" id="subTotal">৳ ০.০০</span>
                            </div>

                            <div class="subtotal mt-2">
                                <span>ডিসকাউন্ট পরিমাণ</span>
                                <input type="text" inputmode="decimal" id="discountAmountInput" oninput="enforceBanglaNumberInput(this); calculateDuePayment()">
                            </div>
                            <div class="subtotal mt-2" id="posReturnAdjRow" style="display: none;">
                                <span class="d-flex align-items-center">
                                    <input type="checkbox" id="chkPosReturnAdjRow" onchange="togglePosReturnCreditAdjustment()" class="me-1">
                                    <span style="color: #0d9488; font-weight: bold; font-size: 13px;">ফেরত বকেয়া সমন্বয়</span>
                                </span>
                                <input type="text" inputmode="decimal" id="posReturnAdjustmentInput" value="০" disabled oninput="enforceBanglaNumberInput(this); calculateDuePayment()" style="border-color: #0d9488; color: #0d9488; font-weight: bold;">
                            </div>
                            <div class="subtotal mt-2">
                                <span>পরিশোধিত টাকা</span>
                                <input type="text" inputmode="decimal" id="paidAmountInput" oninput="enforceBanglaNumberInput(this); calculateDuePayment()">
                            </div>
                            <div class="total">
                                <span>বকেয়া টাকা</span>
                                <span style="color:red; font-size:18px;" id="totalDuePayable">৳ ০.০০</span>
                            </div>
                            <div class="total">
                                <span>অবস্থা</span>
                                <span id="paymentStatusDisplay" class="partial-payment-status">বাকী</span>
                            </div>
                        </div>
                    </form>
        
                    </div>
                    
    
                </div>
                        

                        
                <!-- Trending POS Bottom Action Bar -->
                <div class="pos-bottom-trending-bar mt-3 p-3 bg-white border border-success-subtle shadow-sm" style="border-radius: 14px; background: #ffffff;">
                    <div class="row g-2 align-items-center">
                        <!-- Box 1: Hold Invoice Button & Held Counter -->
                        <div class="col-md-4 col-6">
                            <button type="button" onclick="holdCurrentInvoice()" class="btn btn-warning w-100 py-2 d-flex align-items-center justify-content-center gap-2 fw-bold text-dark shadow-sm" style="border-radius: 10px; background: #f59e0b; border: none; font-size: 14px;">
                                <i class="fa-solid fa-pause-circle fs-5"></i>
                                <span>হোল্ড ইনভয়েস</span>
                            </button>
                            <button type="button" onclick="openHoldInvoicesModal()" class="btn btn-sm btn-outline-warning w-100 mt-1 d-flex align-items-center justify-content-center gap-1 fw-bold text-dark" style="border-radius: 8px; font-size: 12px;">
                                <i class="fa-solid fa-folder-open"></i>
                                <span>হোল্ড তালিকা</span>
                                <span id="heldInvoicesBadge" class="badge bg-danger rounded-pill ms-1">0</span>
                            </button>
                        </div>

                        <!-- Box 2: Big Sub-Total / Net Payable Card -->
                        <div class="col-md-4 col-6">
                            <div class="p-2 text-center border border-success-subtle bg-success-subtle rounded-3 shadow-xs" style="border-radius: 10px; background-color: #f0fdf4 !important; border-color: #bbf7d0 !important;">
                                <span class="text-muted d-block small fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.5px;">মোট বিল (Sub-Total)</span>
                                <span id="bigSubTotalDisplay" class="fw-bolder text-success" style="font-size: 22px; line-height: 1.2;">৳ 0.00</span>
                            </div>
                        </div>

                        <!-- Box 3: Pay / Submit Order Button -->
                        <div class="col-md-4 col-12">
                            <button type="submit" onclick="SavePaymentInfo(event)" class="btn btn-success w-100 py-3 fw-bold text-white shadow" style="border-radius: 10px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; font-size: 15px; letter-spacing: 0.5px;">
                                <i class="fa-solid fa-paper-plane me-1"></i> সাবমিট অর্ডার
                            </button>
                        </div>
                </div>
            </div>
        </div>

        <!-- Mobile/Tablet Floating App Dock Bar (Shown on screens < 992px) -->
        <div class="d-block d-lg-none position-fixed bottom-0 start-50 translate-middle-x w-100 p-2" style="z-index: 1060; max-width: 540px;">
            <div class="p-2 bg-dark text-white rounded-4 shadow-lg border border-secondary d-flex align-items-center justify-content-between" style="backdrop-filter: blur(14px); background: rgba(15, 23, 42, 0.95) !important;">
                <div class="d-flex align-items-center gap-2 ps-2">
                    <div class="position-relative">
                        <i class="fa-solid fa-cart-shopping fs-4 text-success"></i>
                        <span id="mobileCartBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">0</span>
                    </div>
                    <div>
                        <span class="d-block text-muted" style="font-size: 10px; line-height: 1;">মোট আইটেম</span>
                        <span id="mobileCartTotal" class="fw-bold text-success" style="font-size: 15px;">৳ 0.00</span>
                    </div>
                </div>
                <button type="button" onclick="switchMobilePosTab('cart')" class="btn btn-success fw-bold px-3 py-2 text-nowrap d-flex align-items-center gap-1" style="border-radius: 12px; font-size: 13px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none;">
                    <span>কার্ট দেখুন</span>
                    <i class="fa-solid fa-chevron-right small"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Held Invoices Modal -->
    <div class="modal fade" id="holdInvoicesModal" tabindex="-1" aria-labelledby="holdInvoicesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden; background: #f8fafc;">
                <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #fef3c7 0%, #fffbe6 100%); border-bottom: 2px solid #fde047;">
                    <h5 class="modal-title fw-bold text-dark m-0 d-flex align-items-center gap-2" id="holdInvoicesModalLabel">
                        <i class="fa-solid fa-pause-circle text-warning fs-3"></i>
                        <span>হোল্ডকৃত ইনভয়েস তালিকা (Hold Invoices)</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3" style="max-height: 480px; overflow-y: auto;">
                    <div id="heldInvoicesCardList">
                        <!-- Dynamically loaded modern cards -->
                    </div>
                </div>
                <div class="modal-footer bg-white py-2 px-3 justify-content-between border-top">
                    <span class="text-muted small"><i class="fa-solid fa-circle-info me-1 text-info"></i> যেকোনো সময় 'লোড করুন' চেপে ড্রাফট ইনভয়েসটি স্ক্রিনে লোড করতে পারবেন।</span>
                    <button type="button" class="btn btn-secondary px-4 fw-bold shadow-sm" data-bs-dismiss="modal" style="border-radius: 10px;">বন্ধ করুন</button>
                </div>
            </div>
        </div>
    </div>



    {{-- Customer Create Model Start  --}}

    <div class="main-content" id="posCustomerModalWrapper">
        <div class="page-content">
            <!-- Create Customer Modal Start -->
            <section id="createCustomerPosModal" class="financemodal">
                <div class="modal-content">
                    <a class="close-btn closes" onclick="closePosCustomerModal()">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    <h2 class="heading">Add New Customer</h2>
                    <div id="popup-modal">
                        <form id="signup" onsubmit="event.preventDefault();">
                            <input type="hidden" value="0" id="PaidAmount" />
                            <input type="hidden" id="DueAmount" />
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <input type="text" placeholder="Enter Customer Name *"
                                            id="NewCustomerName" required />
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <input type="tel" inputmode="tel" placeholder="Enter Customer Number *"
                                            id="NewCustomerMobile" required oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, false);}else{this.value=this.value.replace(/[^0-9+০-৯]/g,'');}" />
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <input type="email" placeholder="Enter Customer Email"
                                            id="CustomerEmail" />
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <input type="text" inputmode="numeric" placeholder="Enter Nid Number"
                                            id="CustomerNIDNumber" oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, false);}else{this.value=this.value.replace(/[^0-9০-৯]/g,'');}" />
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <input type="text" inputmode="decimal" placeholder="Enter Previous Due Amount"
                                            id="PreviousDueAmount" oninput="if(typeof enforceBanglaNumberInput==='function'){enforceBanglaNumberInput(this, true);}else{this.value=this.value.replace(/[^0-9.০-৯]/g,'');}" />
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <textarea name="address_details" id="more_address_details" cols="30" rows="3"
                                            placeholder="Enter Address Details"></textarea>
                                    </div>

                                </div>

                                <!-- Upload Photo moved to bottom -->
                                <div class="col-lg-12">
                                    <div class="mb-2">
                                        <div class="upload-profile">
                                            <div class="item">
                                                <div class="img-box">
                                                    <i class="fa-regular fa-image fa-2x text-secondary"></i>
                                                </div>

                                                <div class="profile-wrapper">
                                                    <label class="custom-file-input-wrapper">
                                                        <input type="file" class="custom-file-input"
                                                            id="ProductImage" aria-label="Upload Photo" />
                                                    </label>
                                                    <p>PNG, JPEG or GIF (up to 1 MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="actions">
                                    <button onclick="CustomerDataSave(event)" class="btn-save">Submit</button>
                                </div>
                            </div>
                        </form>

                        <!-- Add Product modal to Add New Brand Modal Start -->
                        <div class="newbrand" id="addBrandModal">
                            <div class="newbrand-content">
                                <h2>Add New Location</h2>
                                <form>

                                    <div class="form-group">
                                        <input type="text" placeholder="Location Name *" id="LocationName"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <div class="dropdown-wrapper">
                                            <select class="status-select" id="SelectStatus">
                                                <option selected>Select Location status</option>
                                                <option value="Active">Active</option>
                                                <option value="InActive">Inactive</option>
                                            </select>
                                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <button type="button" class="cancel-btn newbrand-close">
                                            Cancel
                                        </button>
                                        <button onclick="LocationSave(event)" class="save-btn">Save
                                            Location</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Add Product modal to New Brand Modal End -->
                    </div>
                </div>
            </section>
            <!-- Create Product Modal End -->
        </div>


    </div>

    {{-- Customer Create Model End  --}}

    <script>
        // Save brand function
        async function LocationSave(event) {
            event.preventDefault();

            try {
                const LocationName = document.getElementById('LocationName').value;
                const SelectStatus = document.getElementById('SelectStatus').value;

                // Validation
                if (!LocationName) {
                    errorToast("Location Name is required!");
                    return;
                }
                if (!SelectStatus) {
                    errorToast("Select Status is required!");
                    return;
                }

                // Prepare form data
                const formData = new FormData();
                formData.append('name', LocationName);
                formData.append('status', SelectStatus);

                const config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        ...HeaderToken().headers,
                    },
                };

                // API call to save brand
                const res = await axios.post("/api/create-location", formData, config);

                if (res.data.status === "success") {
                    successToast(res.data.message);

                    // Clear the form and close the modal
                    document.getElementById('LocationName').value = '';
                    closeBrandModal();

                    // Refresh the dropdown and select the newly created brand
                    await refreshCustomerList(res.data.newLocationId);
                } else {
                    errorToast(res.data.message);
                }
            } catch (e) {
                unauthorized(e.response?.status || 500);
            }
        }

        // Refresh location list and optionally select the newly added location
        async function refreshCustomerList(selectedLocationId = null) {
            try {
                const res = await axios.get("/api/location-list", HeaderToken());
                const Location = res.data.LocationData;

                const optionsHtmlLocation = Location.map(location =>
                    `<option value="${location.id}" ${selectedLocationId == location.id ? 'selected' : ''}>${location.name}</option>`
                ).join('');

                const custLocEl = document.getElementById("CustomerLocation");
                if (custLocEl) {
                    custLocEl.innerHTML = `<option value="none" selected>Select Location</option>` + optionsHtmlLocation;
                }
            } catch (error) {
                console.error("Error occurred while fetching location:", error);
            }
        }

        // Modal handling (open/close)
        function closeBrandModal() {
            const modal = document.getElementById('addBrandModal');
            if (modal) modal.style.display = 'none';
        }

        function openBrandModal() {
            const modal = document.getElementById('addBrandModal');
            if (modal) modal.style.display = 'block';
        }

        // Trigger modal open/close
        const newBrandOpenBtn = document.querySelector('.newbrand-open');
        if (newBrandOpenBtn) newBrandOpenBtn.addEventListener('click', openBrandModal);
        
        const newBrandCloseBtns = document.querySelectorAll('.newbrand-close');
        if (newBrandCloseBtns) {
            newBrandCloseBtns.forEach(btn => btn.addEventListener('click', closeBrandModal));
        }

        // Initial brand list fetch
        refreshCustomerList();
    </script>


    <script>
        DistrictTypeData();
        async function DistrictTypeData() {
            try {
                let res = await axios.get("/api/district-list", HeaderToken());
                let optionsHtml = res.data.DistrictData.map(District =>
                    `<option value="${District.id}">${District.district_name}</option>`).join('');
                const distEl = $("#DistrictSelectData");
                if (distEl.length) distEl.html(`<option value="none" selected>Select District</option>` + optionsHtml);
            } catch (error) {
                console.error("Error fetching districts:", error);
            }
        }
    </script>

    <script>
        function updateMobileCustomerDisplay(name, mobile, address, due) {
            const formattedDue = typeof formatBanglaAmount === 'function' ? formatBanglaAmount(due) : (due ? `৳ ${due}` : '৳ 0.00');
            const engMob = (mobile && mobile !== '-' && mobile !== '0000000000') ? mobile : '';
            const bnMob = engMob ? (typeof engToBanglaNum === 'function' ? engToBanglaNum(engMob) : engMob) : '';
            const addrStr = (address && address !== '-') ? address : '';

            if (document.getElementById("mobileCustomerNameDisplay")) {
                document.getElementById("mobileCustomerNameDisplay").textContent = name || 'কাস্টমার সিলেক্ট করুন';
            }
            if (document.getElementById("mobileCustomerNameVal")) {
                document.getElementById("mobileCustomerNameVal").textContent = name || '-';
            }
            if (document.getElementById("mobileCustomerMobileVal")) {
                document.getElementById("mobileCustomerMobileVal").textContent = bnMob || mobile || '-';
            }
            if (document.getElementById("mobileCustomerAddressVal")) {
                document.getElementById("mobileCustomerAddressVal").textContent = addrStr || '-';
            }
            if (document.getElementById("mobileCustomerDueVal")) {
                document.getElementById("mobileCustomerDueVal").textContent = formattedDue;
            }

            // Update sub info line in main select box
            const subBox = document.getElementById("mobileCustomerSubDisplay");
            if (subBox) {
                if (name && name !== 'কাস্টমার সিলেক্ট করুন') {
                    let infoParts = [];
                    if (bnMob || mobile) infoParts.push(`<i class="fa-solid fa-phone me-1 text-primary"></i>${bnMob || mobile}`);
                    if (addrStr) infoParts.push(`<i class="fa-solid fa-location-dot me-1 text-secondary"></i>${addrStr}`);
                    infoParts.push(`<i class="fa-solid fa-wallet me-1 text-danger"></i>পূর্বের বকেয়া: <span class="text-danger fw-bold">${formattedDue}</span>`);
                    subBox.innerHTML = infoParts.join(' &nbsp;|&nbsp; ');
                    subBox.classList.remove("d-none");
                } else {
                    subBox.classList.add("d-none");
                }
            }

            const mobileDetailsCard = document.getElementById("mobileCustomerDetailsCard");
            if (mobileDetailsCard) {
                mobileDetailsCard.classList.remove("d-none");
            }
        }

        function selectCustomer(cust) {
            if (!cust) return;
            const customerId = cust.id;
            const customerName = cust.customer_name || 'Walk in Customer';
            const customerMobile = cust.mobile || '-';
            const customerAddress = cust.address_details || '-';
            const activeDue = parseFloat(cust.previous_due_amount !== undefined ? cust.previous_due_amount : (cust.total_due || 0)) || 0;
            const returnCreditBalance = parseFloat(cust.return_credit_balance || 0);

            // Update selected dropdown text
            const dropdownSelected = document.querySelector(".select-box-dropdown .select-dropdown-selected");
            if (dropdownSelected && dropdownSelected.querySelector("span")) {
                dropdownSelected.querySelector("span").textContent = `${cust.customer_id || customerId} - ${customerName}`;
            }

            // Populate form fields
            if (document.getElementById("CustomerName")) document.getElementById("CustomerName").value = customerName;
            if (document.getElementById("CustomerID")) document.getElementById("CustomerID").value = customerId;
            if (document.getElementById("CustomerMobileNumber")) document.getElementById("CustomerMobileNumber").value = (customerMobile !== '-' && customerMobile ? customerMobile : '0000000000');
            if (document.getElementById("CustomerAddress")) document.getElementById("CustomerAddress").value = customerAddress;
            if (document.getElementById("totalPreviousDueAmount")) document.getElementById("totalPreviousDueAmount").value = activeDue;

            // Populate mobile fields & unhide mobile customer details card
            updateMobileCustomerDisplay(customerName, customerMobile, customerAddress, activeDue);

            // Handle return credit notice
            const noticeBanner = document.getElementById("customerReturnCreditNotice");
            const returnCreditValEl = document.getElementById("posReturnCreditVal");
            const chkTop = document.getElementById("chkUseReturnCredit");
            if (noticeBanner && returnCreditValEl) {
                if (returnCreditBalance > 0) {
                    returnCreditValEl.textContent = formatBanglaAmount(returnCreditBalance);
                    noticeBanner.classList.remove("d-none");
                    if (chkTop) chkTop.checked = true;
                } else {
                    noticeBanner.classList.add("d-none");
                    if (chkTop) chkTop.checked = false;
                }
                if (typeof togglePosReturnCreditAdjustment === 'function') togglePosReturnCreditAdjustment();
            }
        }

        function matchCustomerSearch(c, rawQuery) {
            if (!rawQuery || !rawQuery.trim()) return true;
            const q = rawQuery.trim().toLowerCase();
            const qBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(q).toLowerCase() : q;
            const qEn = typeof banglaToEngNum === 'function' ? banglaToEngNum(q).toLowerCase() : q;

            const name = (c.customer_name || c.name || '').toLowerCase();
            const mobile = (c.mobile || '').toLowerCase();
            const mobileBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(mobile).toLowerCase() : mobile;
            const mobileEn = typeof banglaToEngNum === 'function' ? banglaToEngNum(mobile).toLowerCase() : mobile;
            const code = (c.customer_id || '').toString().toLowerCase();
            const codeBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(code).toLowerCase() : code;
            const codeEn = typeof banglaToEngNum === 'function' ? banglaToEngNum(code).toLowerCase() : code;
            const address = (c.address_details || c.address || '').toLowerCase();
            const nid = (c.nid || '').toString().toLowerCase();

            return name.includes(q) || name.includes(qBn) || name.includes(qEn) ||
                   mobile.includes(q) || mobile.includes(qEn) || mobile.includes(qBn) || mobileBn.includes(q) || mobileEn.includes(q) ||
                   code.includes(q) || code.includes(qEn) || code.includes(qBn) || codeBn.includes(q) || codeEn.includes(q) ||
                   address.includes(q) || address.includes(qBn) || address.includes(qEn) ||
                   nid.includes(q) || nid.includes(qEn) || nid.includes(qBn);
        }

        async function CustomerTypeData() {
            try {
                const res = await axios.get("/api/customer-list", HeaderToken());
                window.allCustomersList = res.data.CustomerData || [];
                const customerOptions = res.data.CustomerData.map((customer) => {
                    const activeDue = customer.total_due !== undefined ? customer.total_due : customer.previous_due_amount;
                    const safeName = (customer.customer_name || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
                    return `
                    <div class="dropdown-item d-flex align-items-center justify-content-between py-2 px-3 border-bottom"
                        data-id="${customer.id}"
                        data-name="${customer.customer_name}"
                        data-mobile="${customer.mobile || ''}"
                        data-address_details="${customer.address_details || ''}"
                        data-previous_due_amount="${activeDue}"
                        data-return_credit_balance="${customer.return_credit_balance || 0}">
                        <div>
                            <span class="fw-bold">${customer.customer_id} - ${customer.customer_name}</span>
                            <small class="text-muted ms-2">${customer.mobile ? engToBanglaNum(customer.mobile) : ''}</small>
                            ${activeDue > 0 ? `<span class="badge bg-danger ms-1">বকেয়া: ৳${engToBanglaNum(activeDue)}</span>` : ''}
                            ${customer.return_credit_balance > 0 ? `<span class="badge bg-teal ms-1" style="background:#0d9488;">🎁 ৳${engToBanglaNum(customer.return_credit_balance)} Credit</span>` : ''}
                        </div>
                        <div class="d-flex align-items-center gap-1.5 ms-2" onclick="event.stopPropagation();">
                            <button type="button" class="btn btn-xs btn-outline-primary px-2 py-0.5 rounded shadow-xs" onclick="editCustomerFromPosModal(${customer.id})" title="কাস্টমার এডিট"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-xs btn-outline-danger px-2 py-0.5 rounded shadow-xs" onclick="deleteCustomerFromPosModal(${customer.id}, '${safeName}')" title="কাস্টমার মুছে ফেলুন"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>`;
                }).join('');
                const custDataEl = document.getElementById("CustomerSelectData");
                if (custDataEl) custDataEl.innerHTML = customerOptions;
            } catch (error) {
                console.error("Error fetching Customer:", error);
            }
        }

        CustomerTypeData();
    </script>


    {{-- Customer Create JS Code Start  --}}

    <script>
        async function editCustomerFromPosModal(customerId) {
            try {
                if (typeof showLoader === 'function') showLoader();
                const res = await axios.post("/api/customer-by-id", { id: customerId.toString() }, HeaderToken());
                if (typeof hideLoader === 'function') hideLoader();

                if (res.data && res.data.status === 'success' && res.data.rows) {
                    const cust = res.data.rows;
                    window.editingCustomerId = cust.id;

                    if (document.getElementById("NewCustomerName")) document.getElementById("NewCustomerName").value = cust.customer_name || '';
                    if (document.getElementById("NewCustomerMobile")) document.getElementById("NewCustomerMobile").value = cust.mobile || '';
                    if (document.getElementById("CustomerEmail")) document.getElementById("CustomerEmail").value = cust.email || '';
                    if (document.getElementById("CustomerNIDNumber")) document.getElementById("CustomerNIDNumber").value = cust.nid || '';
                    if (document.getElementById("PreviousDueAmount")) document.getElementById("PreviousDueAmount").value = cust.previous_due_amount || '0';
                    if (document.getElementById("more_address_details")) document.getElementById("more_address_details").value = cust.address_details || '';

                    const modalHeading = document.querySelector("#createCustomerPosModal .heading");
                    if (modalHeading) modalHeading.textContent = "Edit Customer (কাস্টমার এডিট করুন)";
                    
                    const btnSave = document.querySelector("#createCustomerPosModal .btn-save");
                    if (btnSave) btnSave.textContent = "Update Customer (সেভ করুন)";

                    hideMobileModal("mobileCustomerSearchModal");
                    openPosCustomerModal();
                } else {
                    errorToast(res.data?.message || "কাস্টমার তথ্য পাওয়া যায়নি!");
                }
            } catch(err) {
                if (typeof hideLoader === 'function') hideLoader();
                console.error("Edit customer error:", err);
                errorToast("কাস্টমার তথ্য লোড করতে ব্যর্থ হয়েছে!");
            }
        }

        function deleteCustomerFromPosModal(customerId, customerName) {
            Swal.fire({
                title: 'কাস্টমার মুছে ফেলতে চান?',
                text: `আপনি কি "${customerName}" কাস্টমারটি স্থায়ীভাবে মুছে ফেলার বিষয়ে নিশ্চিত?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'হ্যাঁ, মুছে ফেলুন',
                cancelButtonText: 'বাতিল'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        if (typeof showLoader === 'function') showLoader();
                        const res = await axios.post("/api/delete-customer", { id: customerId.toString() }, HeaderToken());
                        if (typeof hideLoader === 'function') hideLoader();

                        if (res.data && res.data.status === 'success') {
                            if (typeof successToast === 'function') successToast("🗑️ কাস্টমার মুছে ফেলা হয়েছে!");
                            else alert("🗑️ কাস্টমার মুছে ফেলা হয়েছে!");

                            await CustomerTypeData();
                            populateMobileCustomerModalList(document.getElementById("mobileCustomerSearchInput")?.value || '');
                        } else {
                            errorToast(res.data?.message || "কাস্টমার মুছে ফেলা সম্ভব হয়নি!");
                        }
                    } catch(err) {
                        if (typeof hideLoader === 'function') hideLoader();
                        console.error("Delete customer error:", err);
                        errorToast("কাস্টমার মুছে ফেলতে সমস্যা হয়েছে!");
                    }
                }
            });
        }

        async function CustomerDataSave(event) {
            if (event) event.preventDefault();
            try {
                let ProductImageInput = document.getElementById('ProductImage')?.files[0];
                let NewCustomerName = document.getElementById('NewCustomerName')?.value?.trim() || '';
                let more_address_details = document.getElementById('more_address_details')?.value?.trim() || '';
                let NewCustomerMobile = document.getElementById('NewCustomerMobile')?.value?.trim() || '';
                let CustomerEmail = document.getElementById('CustomerEmail')?.value?.trim() || '';
                let CustomerNIDNumber = document.getElementById('CustomerNIDNumber')?.value?.trim() || '';
                let PreviousDueRaw = document.getElementById('PreviousDueAmount')?.value || '0';
                let PreviousDueAmount = parseBanglaFloat(PreviousDueRaw) || 0;

                if (NewCustomerName.length === 0) {
                    errorToast("Customer Name is required!");
                    return false;
                }
                if (NewCustomerMobile.length === 0) {
                    errorToast("Customer Mobile is required!");
                    return false;
                }

                let formData = new FormData();
                formData.append('customer_name', NewCustomerName);
                formData.append('mobile', NewCustomerMobile);
                formData.append('email', CustomerEmail);
                formData.append('nid', CustomerNIDNumber);
                formData.append('previous_due_amount', PreviousDueAmount || 0);
                formData.append('address_details', more_address_details);
                if (ProductImageInput) {
                    formData.append('img', ProductImageInput);
                }

                let endpoint = "/api/create-customer";
                if (window.editingCustomerId) {
                    endpoint = "/api/update-customer";
                    formData.append('id', window.editingCustomerId);
                }

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                };

                let res = await axios.post(endpoint, formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    
                    const signupForm = document.getElementById("signup");
                    if (signupForm) signupForm.reset();

                    window.editingCustomerId = null;
                    const modalHeading = document.querySelector("#createCustomerPosModal .heading");
                    if (modalHeading) modalHeading.textContent = "Add New Customer";
                    const btnSave = document.querySelector("#createCustomerPosModal .btn-save");
                    if (btnSave) btnSave.textContent = "Submit";

                    // Close modal
                    if (typeof closePosCustomerModal === 'function') closePosCustomerModal();
                    const modal = document.getElementById('createCustomerPosModal') || document.getElementById('createProduct') || document.getElementById('myModal');
                    if (modal) {
                        modal.style.display = 'none';
                        if (typeof closeModal === 'function') closeModal(modal);
                    }

                    // Refresh customer list in POS
                    await CustomerTypeData();
                    populateMobileCustomerModalList(document.getElementById("mobileCustomerSearchInput")?.value || '');

                    // Auto-select the created/updated customer in POS
                    if (res.data.customer) {
                        const cust = res.data.customer;
                        selectCustomerFromMobileModal(cust.id);
                    }
                } else {
                    errorToast(res.data['message']);
                }
            } catch (e) {
                console.error(e);
                errorToast(window.editingCustomerId ? "Customer update failed!" : "Customer create failed!");
            }
            return false;
        }

        function closeModal(modal) {
            modal.style.display = 'none';
        }
    </script>

    <!-- Link Swiper's JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script>
        async function userlogout(event) {
            event.preventDefault(); // Prevent the default link behavior

            try {
                // Make sure HeaderToken() returns a valid authorization header
                let res = await axios.get("/naxus-pos-logout", HeaderToken());

                // Clear localStorage and sessionStorage
                localStorage.clear();
                sessionStorage.clear();

                // Redirect the user to the login page after successful logout
                window.location.href = "/admin-login-page";
            } catch (e) {
                // Handle error and show error message using errorToast
                console.error("Logout error:", e);
                errorToast(e.response ? e.response.data.message : "Something went wrong");
            }
        }
    </script>

    <script>
        // Function to set today's date as the default and keep it unchanged
        // Get today's date in the format YYYY-MM-DD
        const today = new Date().toISOString().split('T')[0];

        // Set the value of the date input to today's date
        const custDateEl = document.getElementById('CustomerDate');
        if (custDateEl) custDateEl.value = today;
    </script>

    {{-- <script>
    // Disable right-click
    document.addEventListener('contextmenu', function (e) {
      e.preventDefault();
    });

    // Disable F12 and Ctrl+Shift+I (Developer Tools)
    document.addEventListener('keydown', function (e) {
      if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
        e.preventDefault();
      }
    });
  </script> --}}

    <!-- JAVASCRIPT -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('back-end/assets/js/fontawesome.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/pos-product-slider.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/orderlist-table-qty.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/full-screen-toggle.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/pos-payment-methode-click.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/all-modals.js') }}"></script>
    <script src="{{ asset('back-end/assets/js/app.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous"></script>
    <script src="{{ asset('back-end/assets/js/style.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Include jQuery from a CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .partial-payment-status {
            color: orange;
        }

        .fully-paid-status {
            color: green;
        }

        .unpaid-status {
            color: red;
        }
    </style>


    <script>
        async function getPosUserProfile() {
            try {
                const response = await axios.get("/user-profile", HeaderToken());
                const user = response.data;

                if (document.getElementById('UserProfileImg') && user.img_url) {
                    document.getElementById('UserProfileImg').src = user.img_url;
                }
                if (document.getElementById('AuthorizePersonProfileName')) {
                    document.getElementById('AuthorizePersonProfileName').innerText = user.name || "No Name";
                }
                if (document.getElementById('EmailShow')) {
                    document.getElementById('EmailShow').innerText = user.email || "No Email";
                }
            } catch (e) {
                console.error("Failed to load user profile in POS:", e);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            try {
                getPosUserProfile();
            } catch (err) {
                console.error("getPosUserProfile error:", err);
            }

            const dropdown = document.querySelector(".select-box-dropdown");
            if (dropdown) {
                const dropdownSelected = dropdown.querySelector(".select-dropdown-selected");
                const dropdownItems = dropdown.querySelector(".select-dropdown-items");
                const searchBox = dropdown.querySelector(".select-search-box");
                const customerSelectData = document.getElementById("CustomerSelectData");
                const icon = dropdown.querySelector(".icon i");

                const customerNameField = document.getElementById("CustomerName");
                const customerIDField = document.getElementById("CustomerID"); // Hidden field
                const customerMobileField = document.getElementById("CustomerMobileNumber");
                const customerAddressField = document.getElementById("CustomerAddress");
                const customerPreviousDueField = document.getElementById("totalPreviousDueAmount"); // New field for previous due amount

                // Toggle dropdown visibility
                if (dropdownSelected && dropdownItems) {
                    dropdownSelected.addEventListener("click", function(e) {
                        e.stopPropagation();
                        dropdownItems.classList.toggle("show");
                        if (searchBox) searchBox.style.display = dropdownItems.classList.contains("show") ? "block" : "none";

                        // Rotate icon
                        if (icon) {
                            icon.classList.toggle("fa-angle-up");
                            icon.classList.toggle("fa-angle-down");
                        }
                    });
                }

                // Close dropdown if clicked outside
                document.addEventListener("click", function(e) {
                    if (dropdown && !dropdown.contains(e.target)) {
                        if (dropdownItems) dropdownItems.classList.remove("show");
                        if (searchBox) searchBox.style.display = "none";
                        if (icon) {
                            icon.classList.remove("fa-angle-up");
                            icon.classList.add("fa-angle-down");
                        }
                    }
                });

                // Filter dropdown items based on search input
                if (searchBox && customerSelectData) {
                    searchBox.addEventListener("input", function() {
                        const filter = searchBox.value.toLowerCase();
                        const items = customerSelectData.querySelectorAll(".dropdown-item");

                        items.forEach(function(item) {
                            const text = item.textContent.toLowerCase();
                            item.style.display = text.includes(filter) ? "block" : "none";
                        });
                    });
                }

                // Handle dropdown item selection
                if (customerSelectData) {
                    customerSelectData.addEventListener("click", function(e) {
                        const selectedItem = e.target.closest(".dropdown-item");
                        if (selectedItem) {
                            const customerId = selectedItem.getAttribute("data-id");
                            const customerName = selectedItem.getAttribute("data-name");
                            const customerMobile = selectedItem.getAttribute("data-mobile");
                            const customerAddress = selectedItem.getAttribute("data-address_details");
                            const customerPreviousDue = selectedItem.getAttribute("data-previous_due_amount");
                            const returnCreditBalance = parseFloat(selectedItem.getAttribute("data-return_credit_balance") || 0);

                            // Update selected display
                            if (dropdownSelected && dropdownSelected.querySelector("span")) {
                                dropdownSelected.querySelector("span").textContent = `${customerId} - ${customerName}`;
                            }

                            // Populate fields with selected customer data
                            if (customerNameField) customerNameField.value = customerName;
                            if (customerIDField) customerIDField.value = customerId;
                            if (customerMobileField) customerMobileField.value = customerMobile;
                            if (customerAddressField) customerAddressField.value = customerAddress;
                            if (customerPreviousDueField) customerPreviousDueField.value = customerPreviousDue || 0;

                            updateMobileCustomerDisplay(customerName, customerMobile, customerAddress, customerPreviousDue || 0);

                            // Handle Return Credit Notice & Controls
                            const noticeBanner = document.getElementById("customerReturnCreditNotice");
                            const returnCreditValEl = document.getElementById("posReturnCreditVal");
                            const chkTop = document.getElementById("chkUseReturnCredit");
                            const chkRow = document.getElementById("chkPosReturnAdjRow");
                            const rowContainer = document.getElementById("posReturnAdjRow");
                            const adjInput = document.getElementById("posReturnAdjustmentInput");

                            if (returnCreditBalance > 0) {
                                if (returnCreditValEl) returnCreditValEl.textContent = returnCreditBalance.toFixed(2);
                                if (noticeBanner) {
                                    noticeBanner.classList.remove("d-none");
                                    noticeBanner.classList.add("d-flex");
                                }
                                if (rowContainer) rowContainer.style.display = "flex";
                                
                                if (chkTop) chkTop.checked = false;
                                if (chkRow) chkRow.checked = false;
                                if (adjInput) {
                                    adjInput.disabled = true;
                                    adjInput.value = returnCreditBalance.toFixed(2);
                                }
                            } else {
                                if (noticeBanner) {
                                    noticeBanner.classList.remove("d-flex");
                                    noticeBanner.classList.add("d-none");
                                }
                                if (rowContainer) rowContainer.style.display = "none";
                                if (chkTop) chkTop.checked = false;
                                if (chkRow) chkRow.checked = false;
                                if (adjInput) {
                                    adjInput.disabled = true;
                                    adjInput.value = "0.00";
                                }
                            }

                            calculateDuePayment();

                            // Close dropdown
                            if (dropdownItems) dropdownItems.classList.remove("show");
                            if (searchBox) searchBox.style.display = "none";
                            if (icon) {
                                icon.classList.remove("fa-angle-up");
                                icon.classList.add("fa-angle-down");
                            }
                        }
                    });
                }
            }
        });
    </script>



    <script>
        function banglaToEngNum(str) {
            if (str === null || str === undefined) return '';
            str = String(str);
            const bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            const en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            for (let i = 0; i < 10; i++) {
                str = str.split(bn[i]).join(en[i]);
            }
            return str;
        }

        function engToBanglaNum(str) {
            if (str === null || str === undefined) return '';
            str = String(str);
            const en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            const bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            for (let i = 0; i < 10; i++) {
                str = str.split(en[i]).join(bn[i]);
            }
            return str;
        }

        function formatBanglaAmount(val, showCurrencySymbol = true) {
            const num = parseBanglaFloat(val);
            const formattedEng = num.toFixed(2);
            const formattedBn = engToBanglaNum(formattedEng);
            return showCurrencySymbol ? ('৳ ' + formattedBn) : formattedBn;
        }

        function parseBanglaFloat(val, defaultVal = 0) {
            if (val === null || val === undefined || val === '') return defaultVal;
            let eng = banglaToEngNum(String(val));
            eng = eng.replace(/,/g, '').replace(/[^0-9.-]/g, '');
            const num = parseFloat(eng);
            return isNaN(num) ? defaultVal : num;
        }

        function parseBanglaInt(val, defaultVal = 0) {
            if (val === null || val === undefined || val === '') return defaultVal;
            let eng = banglaToEngNum(String(val));
            eng = eng.replace(/,/g, '').replace(/[^0-9-]/g, '');
            const num = parseInt(eng, 10);
            return isNaN(num) ? defaultVal : num;
        }

        // Universal auto-convert typed English digits to Bangla digits in text/number inputs on POS page
        document.addEventListener('input', function(e) {
            if (e.target && (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA')) {
                const inputType = e.target.getAttribute('type');
                if (inputType !== 'date' && inputType !== 'time' && inputType !== 'datetime-local' && inputType !== 'password' && inputType !== 'file') {
                    const val = e.target.value;
                    if (val && /[0-9]/.test(val)) {
                        const start = e.target.selectionStart;
                        const end = e.target.selectionEnd;
                        const converted = engToBanglaNum(val);
                        if (converted !== val) {
                            e.target.value = converted;
                            if (start !== null && end !== null && (inputType === 'text' || inputType === 'search' || !inputType)) {
                                try { e.target.setSelectionRange(start, end); } catch(err) {}
                            }
                            e.target.dispatchEvent(new Event('change', { bubbles: true }));
                        }
                    }
                }
            }
        }, true);

        let allProducts = [];
        let cartItems = [];
        async function ProductBrandData() {
            try {
                const res = await axios.get("/api/product-brand-data-show", HeaderToken());
                const categoryDataEl = $("#ProductCategoryData");
                if (categoryDataEl.length) {
                    categoryDataEl.empty();

                    // Add "All Brands" Option
                    const allBrand = `
                <div class="swiper-slide" data-id="0" onclick="loadProductsByBrand(0)">
                    <a href="#">
                        <div class="slider-item">
                            <div class="product-img">
                                <img src="{{ asset('back-end/assets/img/slider-product-img1.png') }}" alt="All" />
                            </div>
                            <div class="shadow"></div>
                        </div>
                    </a>
                    <div class="title"><h1>All Brands</h1></div>
                </div>
            `;

                    categoryDataEl.append(allBrand);

                    if (res.data && res.data['GetBrandData']) {
                        res.data['GetBrandData'].forEach((brand) => {
                            const brandImage = brand.logo ? brand.logo :
                                "{{ asset('back-end/assets/img/brand-defult-img.svg') }}";

                            const brandCard = `
                        <div class="swiper-slide" data-id="${brand.id}" onclick="loadProductsByBrand(${brand.id})">
                            <a href="#">
                                <div class="slider-item">
                                    <div class="product-img">
                                        <img src="${brandImage}" alt="${brand.name}" />
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </a>
                            <div class="title">
                                <h1>${brand.name}</h1>
                            </div>
                        </div>
                    `;
                            categoryDataEl.append(brandCard);
                        });
                    }
                }

                loadProductsByBrand(0); // Load All Products Initially
            } catch (error) {
                console.error("Error loading product brands:", error);
                loadProductsByBrand(0); // Fallback: Load All Products
            }
        }


        window.onload = function() {
            document.getElementById("productCodeSearch").focus();
        };



        // Load Products By Brand
        async function loadProductsByBrand(brandId) {
            try {
                const res = await axios.get("/api/brand-wish-product-data-show", {
                    ...HeaderToken(),
                    params: {
                        brand_id: brandId
                    },
                });

                allProducts = res.data['ProductFrontData'] || [];
                renderProducts(allProducts);
                populateMobileProductsGrid();
            } catch (error) {
                console.error("Error loading products:", error);
            }
        }

        function renderProducts(products, limit = 25) {
            $("#ProductCategoryWishDataItem").empty();
            if (!products || !products.length) {
                $("#ProductCategoryWishDataItem").html('<div class="col-12 text-center text-muted p-4 fw-bold">❌ কোনো পণ্য পাওয়া যায়নি।</div>');
                return;
            }

            const displayedProducts = products.slice(0, limit);
            displayedProducts.forEach((product) => {
                // Check if product image exists, else use default image
                const productImage = product.img_url ? product.img_url :
                    "{{ asset('back-end/assets/img/product-img.svg') }}";

                const isOutOfStock = (product.quantity <= 0);
                const stockBadgeClass = isOutOfStock ? 'out-of-stock' : '';

                const productCard = `
            <div class="col-xl-3 col-md-4 col-6 d-flex align-items-stretch">
                <a href="javascript:void(0)" class="card-wrapper" onclick="addProductToCart(${product.id})">
                    <div class="product-price ${stockBadgeClass} d-flex align-items-center justify-content-between">
                       <div class="d-flex flex-column">
                         <h1 class="fw-bold text-success m-0" style="font-size:13px;">${formatBanglaAmount(product.sell_price)}</h1>
                         <h1 class="cost-price-hidden small text-danger m-0" style="font-size:10px;">কেনা: ${formatBanglaAmount(product.cost_price)}</h1>
                       </div>
                       <span class="badge ${isOutOfStock ? 'bg-danger-subtle text-danger border-danger' : 'bg-success-subtle text-success border-success'} fw-bold" style="font-size: 11px; border-radius: 12px; padding: 3px 8px;">
                           ${engToBanglaNum(product.quantity)} Pcs
                       </span>
                    </div>
                    <div class="product">
                        <img src="${productImage}" alt="${product.product_name}" loading="lazy" />
                    </div>
                    <div class="drescription">
                        <h1 class="product-id">${formatProductCode(product.product_code)}</h1>
                        <h2 class="name">${product.product_name}</h2>
                    </div>
                </a>
            </div>
        `;
                $("#ProductCategoryWishDataItem").append(productCard);
            });

            if (products.length > limit) {
                const remaining = products.length - limit;
                const loadMoreBtn = `
                    <div class="col-12 text-center my-3" id="loadMoreProductsContainer">
                        <button type="button" class="btn btn-outline-success fw-bold px-4 py-2 shadow-sm" onclick="renderProducts(allProducts, ${limit + 25})" style="border-radius: 20px; font-size: 13px;">
                            <i class="fa-solid fa-plus-circle me-1"></i> আরও ২৫টি পণ্য দেখুন (বাকি ${remaining}টি)
                        </button>
                    </div>
                `;
                $("#ProductCategoryWishDataItem").append(loadMoreBtn);
            }
        }
  // Web Audio API Beep Sound Generator
function playScanBeepSound() {
    try {
        const AudioCtx = window.AudioContext || window.webkitAudioContext;
        if (!AudioCtx) return;
        const ctx = new AudioCtx();
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        osc.type = "sine";
        osc.frequency.setValueAtTime(1200, ctx.currentTime); // High pitch beep
        gain.gain.setValueAtTime(0.18, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.00001, ctx.currentTime + 0.1);
        osc.connect(gain);
        gain.connect(ctx.destination);
        osc.start();
        osc.stop(ctx.currentTime + 0.1);
    } catch(e) {}
}

// Barcode Matcher Helper (Handles JSON array strings or plain code)
function isExactBarcodeMatch(product, searchVal) {
    if (!product || !product.product_code || !searchVal) return false;
    const cleanSearch = banglaToEngNum(String(searchVal)).trim().toLowerCase();
    let codes = [];
    try {
        const parsed = JSON.parse(product.product_code);
        codes = Array.isArray(parsed) ? parsed : [product.product_code];
    } catch(e) {
        codes = [product.product_code];
    }
    return codes.some(c => banglaToEngNum(String(c)).trim().toLowerCase() === cleanSearch);
}

// Reset Search Input & Refocus
function resetAndFocusSearchBox() {
    const input1 = document.getElementById("productCodeSearch");
    const input2 = document.getElementById("productCodeSearchCart");
    if (input1) input1.value = "";
    if (input2) input2.value = "";
    const active = input1 && document.activeElement === input1 ? input1 : (input2 || input1);
    if (active) active.focus();
    renderProducts(allProducts);
}

// Add Product to Cart with Auto-Increment & Barcode Scan Support (Allows 0-Stock Selling)
function addProductToCart(productId, isFromBarcodeScan = false) {
    const product = allProducts.find((p) => p.id === productId);

    if (!product) {
        Swal.fire({ icon: 'error', title: 'পণ্য পাওয়া যায়নি', text: 'প্রোডাক্টটি সিস্টেমে খুঁজে পাওয়া যায়নি।', confirmButtonColor: '#15803d' });
        if (isFromBarcodeScan) resetAndFocusSearchBox();
        return;
    }

    const existingIndex = cartItems.findIndex((item) => item.id === productId);

    if (existingIndex !== -1) {
        // Product already in cart -> Auto increment quantity!
        const cartItem = cartItems[existingIndex];
        cartItem.quantity++;
        const quantityInput = document.getElementById(`quantity-${existingIndex}`);
        if (quantityInput) quantityInput.value = cartItem.quantity;
        updateTotal();
        playScanBeepSound();
        if (typeof successToast === 'function') {
            successToast(`✅ "${product.product_name}" এর পরিমাণ বাড়িয়ে ${cartItem.quantity} Pcs করা হয়েছে।`);
        }
    } else {
        // Add new product to cart
        cartItems.push({
            id: product.id,
            product_name: product.product_name,
            cost_price: product.cost_price,
            sell_price: product.sell_price,
            price: product.price || 0,
            quantity: 1,
            sellingPrice: product.sell_price,
        });

        renderCart();
        playScanBeepSound();
        if (typeof successToast === 'function') {
            successToast(`🛒 "${product.product_name}" কার্টে যুক্ত করা হয়েছে।`);
        }
    }

    if (isFromBarcodeScan) {
        resetAndFocusSearchBox();
    }
}

// Search by Product Code or Product Name & Instant Barcode Scan Auto-Add
function searchByProductCode(searchValue, activeInputId = 'productCodeSearch') {
    const rawVal = searchValue.trim().toLowerCase();
    const engVal = banglaToEngNum(rawVal);

    if (!rawVal) {
        $(".pos-search-suggestions").addClass("d-none").empty();
        renderProducts(allProducts);
        return;
    }

    // Check 1: Instant Exact Barcode Match for Scanners
    const exactMatch = allProducts.find((p) => isExactBarcodeMatch(p, engVal) || isExactBarcodeMatch(p, rawVal));
    if (exactMatch) {
        $(".pos-search-suggestions").addClass("d-none").empty();
        addProductToCart(exactMatch.id, true);
        return;
    }

    // Check 2: Filter matching products by code substring, product name, or category name
    const matchingProducts = allProducts.filter((product) => {
        let codesStr = "";
        try {
            const parsed = JSON.parse(product.product_code);
            codesStr = Array.isArray(parsed) ? parsed.join(" ") : String(product.product_code);
        } catch(e) {
            codesStr = String(product.product_code);
        }

        const engCodesStr = banglaToEngNum(codesStr);
        const categoryName = product.category ? (product.category.category_name || product.category.name || "") : "";

        return (
            codesStr.toLowerCase().includes(rawVal) ||
            engCodesStr.toLowerCase().includes(engVal) ||
            product.product_name.toLowerCase().includes(rawVal) ||
            categoryName.toLowerCase().includes(rawVal)
        );
    });

    renderProducts(matchingProducts);
    renderSearchSuggestions(matchingProducts, activeInputId);
}

// Render Live Autocomplete Search Suggestions Dropdown
function renderSearchSuggestions(matchingProducts, activeInputId) {
    $(".pos-search-suggestions").addClass("d-none").empty();

    if (!activeInputId || !matchingProducts || matchingProducts.length === 0) {
        return;
    }

    const suggestionsBoxId = activeInputId + "Suggestions";
    const suggestionsBox = $("#" + suggestionsBoxId);

    if (!suggestionsBox.length) return;

    let itemsHtml = `<div class="list-group list-group-flush border-0">`;
    const topMatches = matchingProducts.slice(0, 8);

    topMatches.forEach((product) => {
        const productImage = product.img_url ? product.img_url : "{{ asset('back-end/assets/img/product-img.svg') }}";
        const isOutOfStock = (product.quantity <= 0);
        const codeText = formatProductCode(product.product_code);
        const categoryName = product.category ? (product.category.category_name || product.category.name || "") : "";
        const categoryBadge = categoryName ? `<span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold" style="font-size: 10px; border-radius: 6px; padding: 2px 5px;"><i class="fa-solid fa-folder me-1"></i>${categoryName}</span>` : "";

        itemsHtml += `
            <a href="javascript:void(0)" 
               class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-2 border-bottom hover-bg-light"
               onclick="selectProductFromSuggestion(${product.id})">
                <div class="d-flex align-items-center gap-2 overflow-hidden me-2">
                    <img src="${productImage}" alt="${product.product_name}" style="width: 38px; height: 38px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0; flex-shrink: 0;" />
                    <div class="text-truncate">
                        <div class="d-flex align-items-center gap-1 flex-wrap">
                            <span class="fw-bold text-dark text-truncate" style="font-size: 13px;">${product.product_name}</span>
                            ${categoryBadge}
                        </div>
                        <div class="text-muted small text-truncate" style="font-size: 11px;">কোড: <span class="fw-semibold text-secondary">${codeText}</span></div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 flex-shrink-0 text-end">
                    <span class="badge ${isOutOfStock ? 'bg-danger-subtle text-danger border-danger' : 'bg-success-subtle text-success border-success'} border fw-bold" style="font-size: 10px; border-radius: 12px; padding: 3px 6px;">
                        ${product.quantity} Pcs
                    </span>
                    <span class="fw-bold text-success" style="font-size: 13px; min-width: 55px;">৳ ${product.sell_price}</span>
                    <button type="button" class="btn btn-sm btn-success fw-bold py-1 px-2 shadow-sm" style="font-size: 11px; border-radius: 6px;" onclick="event.stopPropagation(); selectProductFromSuggestion(${product.id});">
                        + যোগ
                    </button>
                </div>
            </a>
        `;
    });

    if (matchingProducts.length > 8) {
        itemsHtml += `
            <div class="p-2 text-center text-muted small bg-light fw-bold" style="font-size: 11px;">
                💡 মোট ${matchingProducts.length} টি পণ্য পাওয়া গেছে
            </div>
        `;
    }

    itemsHtml += `</div>`;
    suggestionsBox.html(itemsHtml).removeClass("d-none");
}

function selectProductFromSuggestion(productId) {
    addProductToCart(productId);
    $(".pos-search-suggestions").addClass("d-none").empty();
    resetAndFocusSearchBox();
}

// Close suggestion dropdown when clicking outside
$(document).on("click", function(e) {
    if (!$(e.target).closest(".searchbar").length) {
        $(".pos-search-suggestions").addClass("d-none");
    }
});

$(document).on("focus", ".posSearchInput", function() {
    if (this.value.trim()) {
        searchByProductCode(this.value, this.id);
    }
});

// Handle Barcode Scanner Gun Enter Key Event
function handleBarcodeEnterKey(event, searchValue) {
    if (event.key === "Enter" || event.keyCode === 13) {
        event.preventDefault();
        const cleanValue = searchValue.trim();
        if (!cleanValue) return;

        // Check exact match
        const exactMatch = allProducts.find((p) => isExactBarcodeMatch(p, cleanValue));
        if (exactMatch) {
            addProductToCart(exactMatch.id, true);
            return;
        }

        // Check single filter match
        const matchingProducts = allProducts.filter((p) => {
            let codesStr = "";
            try {
                const parsed = JSON.parse(p.product_code);
                codesStr = Array.isArray(parsed) ? parsed.join(" ") : String(p.product_code);
            } catch(e) {
                codesStr = String(p.product_code);
            }
            return (
                codesStr.toLowerCase().includes(cleanValue.toLowerCase()) ||
                p.product_name.toLowerCase().includes(cleanValue.toLowerCase())
            );
        });

        if (matchingProducts.length === 1) {
            addProductToCart(matchingProducts[0].id, true);
        } else if (matchingProducts.length === 0) {
            Swal.fire({ icon: 'error', title: 'পণ্য পাওয়া যায়নি', text: `"${cleanValue}" কোডের কোনো প্রোডাক্ট খুঁজে পাওয়া যায়নি।`, confirmButtonColor: '#15803d' });
            resetAndFocusSearchBox();
        }
    }
}

function triggerBarcodeSearchManual(event, inputId = 'productCodeSearch') {
    if (event) event.preventDefault();
    const input = document.getElementById(inputId) || document.getElementById("productCodeSearch") || document.getElementById("productCodeSearchCart");
    const val = input?.value || "";
    handleBarcodeEnterKey({ key: "Enter", preventDefault: () => {} }, val);
}



        // Helper function to format Product Code (if it's a JSON array)
        function formatProductCode(productCode) {
            try {
                // If it's a valid JSON array string
                if (Array.isArray(JSON.parse(productCode))) {
                    return JSON.parse(productCode).join(', ');
                }
            } catch (e) {
                // If not an array, just return the code as it is
                return productCode;
            }
            return productCode;
        }


        function formatProductCode(productCode) {
            try {
                // If it's a valid JSON array string
                if (Array.isArray(JSON.parse(productCode))) {
                    return JSON.parse(productCode).join(', ');
                }
            } catch (e) {
                // If not an array, just return the code as it is
                return productCode;
            }
            return productCode;
        }




        let subTotal = 0; // This will be calculated based on the cart items
        let paidAmount = 0; // This will be the amount paid by the user

        // Function to render the cart and update subTotal
        function renderCart() {
            const tableBody = document.querySelector("table tbody");
            tableBody.innerHTML = ""; // Clear Table Before Re-Rendering
            let totalCost = 0;
            subTotal = 0; // Reset Sub Total
            // <span class="quantity">${item.quantity}</span>
            cartItems.forEach((item, index) => {
                const row = `
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="display:none" id="ProductSellPrice">
                        ${item.cost_price}
                    </td>
                    <td style="padding: 6px 8px; vertical-align: middle;">
                      <div class="product">
                        <h6 style="font-size:11px; margin: 0; word-break: break-word; font-weight: 700;">${item.product_name}</h6>
                      </div>
                    </td>
                    <td style="padding: 6px 4px; vertical-align: middle; text-align: center;">
                        <div class="quantity-controls" style="display: inline-flex; align-items: center; justify-content: space-between; border: 1px solid #cbd5e1; border-radius: 6px; background: #f8fafc; padding: 2px; width: 95px; height: 30px; position: relative; z-index: 10;">
                            <button type="button" onclick="decreaseQuantity(${index})" style="width: 26px; height: 26px; min-width: 26px; border-radius: 4px; border: none; background: #ffffff; color: #0f172a; font-weight: 800; font-size: 14px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 2px rgba(0,0,0,0.1); margin: 0; padding: 0;">-</button>
                            <input
                                type="text"
                                inputmode="numeric" 
                                style="width: 36px; background: transparent; border: none; text-align: center; font-weight: 700; font-size: 12px; color: #0f172a; padding: 0; outline: none; margin: 0;"
                                value="${engToBanglaNum(item.quantity)}"
                                class="quantity"
                                id="quantity-${index}"
                                oninput="updateQuantity(${index}, this)"
                            />
                            <button type="button" onclick="increaseQuantity(${index})" style="width: 26px; height: 26px; min-width: 26px; border-radius: 4px; border: none; background: #ffffff; color: #0f172a; font-weight: 800; font-size: 14px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 2px rgba(0,0,0,0.1); margin: 0; padding: 0;">+</button>
                        </div>
                    </td>
                    <td style="padding: 6px 4px; vertical-align: middle; text-align: center;">
                        <div class="cost-price-wrapper" style="position: relative; z-index: 1; display: inline-block;">
                            <span class="cost-price-placeholder badge bg-light text-muted border px-2 py-1" style="font-size: 10px; cursor: pointer;">🔒 ***</span>
                            <input
                                class="price cost-price-input"
                                type="text"
                                inputmode="numeric"
                                value="${engToBanglaNum(item.cost_price)}"
                                id="cost_price-${item.id}"
                                oninput="updateCostPrice(${item.id}, this)"
                                style="color: #dc2626 !important; font-weight: 800 !important; max-width: 75px; height: 28px; font-size: 12px;"
                            />
                        </div>
                    </td>
                    <td style="padding: 6px 4px; vertical-align: middle; text-align: center;">
                        <input
                        class="price"
                        type="text"
                        inputmode="numeric"
                        value="${engToBanglaNum(item.sellingPrice)}"
                        id="sellingPrice-${item.id}"
                        oninput="updateSellingPrice(${item.id}, this)"
                        style="max-width: 75px; height: 28px; font-size: 12px; border-radius: 6px;"
                    />
                    </td>
                   <td id="total-${item.id}" style="padding: 6px 4px; vertical-align: middle; text-align: center; font-weight: 700; font-size: 12px; color: #0f172a;"> ${engToBanglaNum((item.sellingPrice * item.quantity).toFixed(2))}</td>
                    <td>
                      <button onclick="removeProduct(${item.id})" class="action-btn">
                        <svg
                          width="36"
                          height="36"
                          viewBox="0 0 44 44"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect
                            y="0.00012207"
                            width="44"
                            height="44"
                            rx="4"
                            fill="#FFD5D5"
                          />
                          <path
                            d="M29.4643 37.0001H14.5358C13.2262 37.0001 12.3096 35.9335 12.3096 34.7335V14.7335H31.6905V34.6001C31.6905 35.9335 30.6429 37.0001 29.4643 37.0001Z"
                            stroke="#FF0000"
                            stroke-width="2"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M33 13.9335V11.5335C33 10.6001 32.2143 9.80012 31.2976 9.80012H26.4524L25.9286 7.80012C25.6667 7.26679 25.2738 7.00012 24.619 7.00012H19.381C18.8571 7.00012 18.3333 7.26679 18.0714 7.80012L17.5476 9.66679H12.7024C11.7857 9.66679 11 10.4668 11 11.4001V13.9335C11 14.3335 11.3929 14.7335 11.7857 14.7335H32.2143C32.7381 14.7335 33 14.3335 33 13.9335Z"
                            stroke="#FF0000"
                            stroke-width="2"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M17.8096 19.5334V32.2001"
                            stroke="#FF0000"
                            stroke-width="2"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M22 19.5334V32.2001"
                            stroke="#FF0000"
                            stroke-width="2"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M26.1904 19.5334V32.2001"
                            stroke="#FF0000"
                            stroke-width="2"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </button>
                    </td>
                  </tr>
        `;
                tableBody.insertAdjacentHTML("beforeend", row);
                // totalCost += item.price * item.quantity;
                // subTotal += item.sellingPrice; // Add sellingPrice to subTotal



                // Calculate total cost using quantity and price
                totalCost += item.price * item.quantity;

                // Calculate subTotal using sellingPrice and quantity
                subTotal += item.sellingPrice * item.quantity; // Adjusted this part to account for quantity



            });

            document.getElementById("totalCost").innerText = formatBanglaAmount(totalCost);
            document.getElementById("subTotal").innerText = formatBanglaAmount(subTotal);

            // Sync Mobile & Tablet View Elements
            renderMobileCart();

            if (document.getElementById("mobileTabBadge")) document.getElementById("mobileTabBadge").innerText = engToBanglaNum(cartItems.length);
            if (document.getElementById("mobileCartBadge")) document.getElementById("mobileCartBadge").innerText = engToBanglaNum(cartItems.length);
            if (document.getElementById("mobileCartTotal")) document.getElementById("mobileCartTotal").innerText = formatBanglaAmount(subTotal);

            calculateDuePayment(); // Update Due Amount and Status after rendering cart
        }

        // Mobile/Tablet POS Tab Switcher Function
        function switchMobilePosTab(tabName) {
            const productsCol = document.querySelector("#pos-main > div.row > div:first-child");
            const cartCol = document.querySelector("#pos-main > div.row > div:last-child");
            const tabProdBtn = document.getElementById("tab-products-btn");
            const tabCartBtn = document.getElementById("tab-cart-btn");

            if (tabName === 'products') {
                if (productsCol) productsCol.style.display = "block";
                if (cartCol && window.innerWidth < 992) cartCol.style.display = "none";
                if (tabProdBtn) tabProdBtn.classList.add("active");
                if (tabCartBtn) tabCartBtn.classList.remove("active");
            } else {
                if (productsCol && window.innerWidth < 992) productsCol.style.display = "none";
                if (cartCol) {
                    cartCol.style.display = "block";
                    cartCol.scrollIntoView({ behavior: 'smooth' });
                }
                if (tabCartBtn) tabCartBtn.classList.add("active");
                if (tabProdBtn) tabProdBtn.classList.remove("active");
            }
        }

//         // Function to increase quantity
//         function increaseQuantity(index) {
//             const item = cartItems[index];
//             const product = allProducts.find(p => p.id === item.id); // Find the original product data

//             // Check if the product exists and the quantity does not exceed available stock
//             if (product.quantity > item.quantity) {
//                 cartItems[index].quantity++;
//                 renderCart(); // Re-render cart to reflect updated quantity
//             } else {
//                 alert(`You cannot add more than ${product.quantity} items of "${product.product_name}".`);
//                 sendErrorSms(`Attempted to add more than ${product.quantity} items of "${product.product_name}".`);
//             }
//         }

//         // Function to decrease quantity
// function decreaseQuantity(index) {
//     let quantityElement = document.querySelectorAll('.quantity')[index];

//     if (cartItems[index].quantity > 1) {
//         cartItems[index].quantity--;
//         quantityElement.textContent = cartItems[index].quantity; // Update UI directly
//     } else {
//         alert("Quantity cannot be less than 1");
//     }
// }

function decreaseQuantity(index) {
    if (cartItems[index].quantity > 1) {
        cartItems[index].quantity--;
        
        const quantityInput = document.getElementById(`quantity-${index}`);
        if (quantityInput) {
            quantityInput.value = engToBanglaNum(cartItems[index].quantity);
        }
        
        updateTotal(); 
    } else {
        Swal.fire({ icon: 'info', title: 'সর্বনিম্ন পরিমাণ', text: 'কুয়ান্টিটি ১ এর কম হওয়া সম্ভব নয়। পণ্য বাদ দিতে ডিলিট বাটনে চাপুন।', confirmButtonColor: '#15803d' });
    }
}

function increaseQuantity(index) {
    cartItems[index].quantity++;
    const quantityInput = document.getElementById(`quantity-${index}`);
    if (quantityInput) {
        quantityInput.value = engToBanglaNum(cartItems[index].quantity);
    }
    updateTotal();
}

function updateQuantity(index, input) {
    let newQuantity = parseBanglaFloat(input.value); 

    if (isNaN(newQuantity) || newQuantity <= 0) {
        return; 
    }

    cartItems[index].quantity = newQuantity;
    updateTotal(); 
}

// Function to update total and subtotal
function updateTotal() {
    let currentSubTotal = 0;

    cartItems.forEach(item => {
        let rowTotal = item.sellingPrice * item.quantity;
        currentSubTotal += rowTotal;

        const rowTotalCell = document.getElementById(`total-${item.id}`);
        if (rowTotalCell) {
            rowTotalCell.textContent = engToBanglaNum(rowTotal.toFixed(2)); 
        }
    });

    const subTotalEl = document.getElementById("subTotal");
    if (subTotalEl) subTotalEl.textContent = formatBanglaAmount(currentSubTotal);
    if (document.getElementById("mobileCartTotal")) document.getElementById("mobileCartTotal").innerText = formatBanglaAmount(currentSubTotal);
    calculateDuePayment();
}

        // Update Selling Price
        // function updateSellingPrice(productId, inputField) {
        //     const item = cartItems.find((item) => item.id === productId);
        //     if (item) {
        //         item.sellingPrice = parseFloat(inputField.value) || 0;

        //         // Save the currently focused input's ID
        //         const focusedInputId = inputField.id;

        //         // Re-render the cart
        //         renderCart();

        //         // Restore focus and caret position
        //         const restoredInput = document.getElementById(focusedInputId);
        //         if (restoredInput) {
        //             restoredInput.focus();

        //             // Move caret to the end of the input value
        //             const value = restoredInput.value;
        //             restoredInput.value = ""; // Temporarily clear value
        //             restoredInput.value = value; // Reset to original value
        //         }
        //     }
        // }

        // Update Selling Price
function updateSellingPrice(productId, inputField) {
    const item = cartItems.find((item) => item.id === productId);
    if (item) {
        item.sellingPrice = parseBanglaFloat(inputField.value) || 0;
        updateTotal(); 
    }
}


        // Remove Product
        function removeProduct(productId) {
            cartItems = cartItems.filter((item) => item.id !== productId);
            renderCart();
        }

function togglePosReturnCreditAdjustment() {
    const chkTop = document.getElementById("chkUseReturnCredit");
    const chkRow = document.getElementById("chkPosReturnAdjRow");
    const adjInput = document.getElementById("posReturnAdjustmentInput");

    const isChecked = (chkTop && chkTop.checked) || (chkRow && chkRow.checked);
    if (chkTop) chkTop.checked = isChecked;
    if (chkRow) chkRow.checked = isChecked;

    if (adjInput) adjInput.disabled = !isChecked;
    calculateDuePayment();
}

function calculateDuePayment() {
    // Get values dynamically with safety checks
    const subTotalEl = document.getElementById("subTotal");
    const subTotal = subTotalEl ? (parseBanglaFloat(subTotalEl.textContent.replace("৳", "").trim()) || 0) : 0;
    
    const discInputEl = document.getElementById("discountAmountInput");
    const discountAmount = discInputEl ? (parseBanglaFloat(discInputEl.value) || 0) : 0;
    
    const paidInputEl = document.getElementById("paidAmountInput");
    const paidAmount = paidInputEl ? (parseBanglaFloat(paidInputEl.value) || 0) : 0;

    const chkTop = document.getElementById("chkUseReturnCredit");
    const chkRow = document.getElementById("chkPosReturnAdjRow");
    const adjInput = document.getElementById("posReturnAdjustmentInput");
    
    const isReturnAdjActive = (chkTop && chkTop.checked) || (chkRow && chkRow.checked);
    const returnAdjAmount = isReturnAdjActive ? (parseBanglaFloat(adjInput?.value) || 0) : 0;

    // Ensure discount is not greater than subTotal
    if (discountAmount > subTotal && subTotal > 0) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({ icon: 'warning', title: 'ছাড় সীমাবদ্ধতা', text: 'ডিসকাউন্ট সাবটোটালের চেয়ে বেশি হতে পারবে না!', confirmButtonColor: '#15803d' });
        }
        if (discInputEl) discInputEl.value = subTotal;
        return;
    }

    // Calculate total after applying discount and return adjustment
    const netPayable = Math.max(0, subTotal - discountAmount - returnAdjAmount);
    const dueAmount = Math.max(0, netPayable - paidAmount);

    // Update the Due Amount Display
    const duePayableEl = document.getElementById("totalDuePayable");
    if (duePayableEl) duePayableEl.textContent = formatBanglaAmount(dueAmount);

    // Sync Mobile Inputs
    if (document.getElementById("mobileGrossTotal")) document.getElementById("mobileGrossTotal").value = engToBanglaNum(subTotal.toFixed(2));
    if (document.getElementById("mobileNetTotal")) document.getElementById("mobileNetTotal").value = engToBanglaNum(netPayable.toFixed(2));
    if (document.getElementById("mobileDueInput")) document.getElementById("mobileDueInput").value = engToBanglaNum(dueAmount.toFixed(2));
    if (document.getElementById("mobileHeaderTotal")) document.getElementById("mobileHeaderTotal").innerText = formatBanglaAmount(netPayable);

    // Update Big Sub-Total Display Card
    const bigSubTotalDisplay = document.getElementById("bigSubTotalDisplay");
    if (bigSubTotalDisplay) {
        bigSubTotalDisplay.textContent = formatBanglaAmount(netPayable);
    }

    // Update the Status Display
    const paymentStatusDisplay = document.getElementById("paymentStatusDisplay");
    const effectivePaid = paidAmount + returnAdjAmount;
    const totalTarget = subTotal - discountAmount;

    if (paymentStatusDisplay) {
        if (effectivePaid >= totalTarget && totalTarget > 0) {
            paymentStatusDisplay.textContent = "নগদ";
            paymentStatusDisplay.classList.remove("partial-payment-status");
            paymentStatusDisplay.classList.add("fully-paid-status");
        } else if (effectivePaid > 0) {
            paymentStatusDisplay.textContent = "বাকী";
            paymentStatusDisplay.classList.add("partial-payment-status");
            paymentStatusDisplay.classList.remove("fully-paid-status");
        } else {
            paymentStatusDisplay.textContent = "বাকী";
            paymentStatusDisplay.classList.remove("partial-payment-status", "fully-paid-status");
        }
    }
}

// Render Mobile Cart List items matching screenshot
function renderMobileCart() {
    const container = document.getElementById("mobileCartItemsList");
    if (!container) return;

    if (!cartItems || cartItems.length === 0) {
        container.innerHTML = `
            <div class="text-center py-4 text-muted" id="mobileCartEmptyMsg">
                <i class="fa-solid fa-cart-shopping fs-3 mb-2 text-secondary"></i>
                <p class="mb-0 small">এখনও কোনো আইটেম যোগ করা হয়নি</p>
            </div>
        `;
        if (document.getElementById("mobileTotalQty")) document.getElementById("mobileTotalQty").innerText = "০";
        if (document.getElementById("mobileTotalPrice")) document.getElementById("mobileTotalPrice").innerText = "৳ ০.০০";
        if (document.getElementById("mobileTotalProfit")) document.getElementById("mobileTotalProfit").innerText = "৳ ০.০০";
        if (document.getElementById("mobileGrossTotal")) document.getElementById("mobileGrossTotal").value = engToBanglaNum("0.00");
        if (document.getElementById("mobileHeaderTotal")) document.getElementById("mobileHeaderTotal").innerText = "৳ ০.০০";
        return;
    }

    container.innerHTML = "";
    let totalQty = 0;
    let totalProfit = 0;

    cartItems.forEach((item, index) => {
        totalQty += item.quantity;
        const profit = ((item.sellingPrice || 0) - (item.cost_price || 0)) * item.quantity;
        if (profit > 0) totalProfit += profit;

        const rowHtml = `
            <div class="mobile-cart-item" style="cursor: pointer;" onclick="openMobileItemLineForm(${item.id})">
                <div class="mobile-cart-item-header">
                    <span class="mobile-cart-item-name">${item.product_name}</span>
                    <button type="button" class="btn-remove-item" onclick="event.stopPropagation(); removeProduct(${item.id});" title="বাদ দিন">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </div>
                <div class="mobile-cart-item-price-calc">
                    <span>মূল্য</span>
                    <span>${engToBanglaNum(item.quantity)} X ${formatBanglaAmount(item.sellingPrice)} = ${formatBanglaAmount(item.sellingPrice * item.quantity)}</span>
                </div>
                <div class="mobile-cart-item-subtotal">
                    <span>সাব টোটাল</span>
                    <span class="fw-bold">${formatBanglaAmount(item.sellingPrice * item.quantity)}</span>
                </div>
            </div>
        `;
        container.insertAdjacentHTML("beforeend", rowHtml);
    });

    if (document.getElementById("mobileTotalQty")) document.getElementById("mobileTotalQty").innerText = engToBanglaNum(totalQty);
    if (document.getElementById("mobileTotalPrice")) document.getElementById("mobileTotalPrice").innerText = formatBanglaAmount(subTotal);
    if (document.getElementById("mobileTotalProfit")) document.getElementById("mobileTotalProfit").innerText = formatBanglaAmount(totalProfit);
    if (document.getElementById("mobileGrossTotal")) document.getElementById("mobileGrossTotal").value = engToBanglaNum(subTotal.toFixed(2));
    if (document.getElementById("mobileHeaderTotal")) document.getElementById("mobileHeaderTotal").innerText = formatBanglaAmount(subTotal);
}

function showMobileModal(modalId) {
    const modalEl = document.getElementById(modalId);
    if (!modalEl) {
        console.error("Modal element not found:", modalId);
        return;
    }
    
    try {
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
            bsModal.show();
        } else if (typeof $ !== 'undefined' && $.fn && $.fn.modal) {
            $(`#${modalId}`).modal('show');
        } else {
            modalEl.classList.add('show');
            modalEl.style.display = 'block';
            document.body.classList.add('modal-open');
        }
    } catch(e) {
        console.warn("showMobileModal fallback:", e);
        if (typeof $ !== 'undefined' && $.fn && $.fn.modal) {
            $(`#${modalId}`).modal('show');
        } else {
            modalEl.classList.add('show');
            modalEl.style.display = 'block';
            document.body.classList.add('modal-open');
        }
    }
}

function hideMobileModal(modalId) {
    const modalEl = document.getElementById(modalId);
    if (!modalEl) return;

    try {
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            const bsModal = bootstrap.Modal.getInstance(modalEl) || bootstrap.Modal.getOrCreateInstance(modalEl);
            if (bsModal) bsModal.hide();
        } else if (typeof $ !== 'undefined' && $.fn && $.fn.modal) {
            $(`#${modalId}`).modal('hide');
        } else {
            modalEl.classList.remove('show');
            modalEl.style.display = 'none';
            document.body.classList.remove('modal-open');
        }
    } catch(e) {
        if (typeof $ !== 'undefined' && $.fn && $.fn.modal) {
            $(`#${modalId}`).modal('hide');
        } else {
            modalEl.classList.remove('show');
            modalEl.style.display = 'none';
            document.body.classList.remove('modal-open');
        }
    }

    setTimeout(() => {
        const remainingShow = document.querySelectorAll('.modal.show');
        if (remainingShow.length === 0) {
            document.body.classList.remove('modal-open');
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
            const backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach(b => b.remove());
        }
    }, 250);
}

function openMobileProductSearchModal() {
    populateMobileProductsGrid();
    showMobileModal("mobileProductSearchModal");
}

function matchProductSearch(p, rawQuery) {
    if (!rawQuery || !rawQuery.trim()) return true;
    const q = rawQuery.trim().toLowerCase();
    const qBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(q).toLowerCase() : q;
    const qEn = typeof banglaToEngNum === 'function' ? banglaToEngNum(q).toLowerCase() : q;

    const name = (p.product_name || p.name || '').toLowerCase();

    let codesStr = "";
    if (p.product_code) {
        try {
            const parsed = JSON.parse(p.product_code);
            codesStr = Array.isArray(parsed) ? parsed.join(" ") : String(p.product_code);
        } catch(e) {
            codesStr = String(p.product_code);
        }
    }
    const codesLower = codesStr.toLowerCase();
    const codesBn = typeof engToBanglaNum === 'function' ? engToBanglaNum(codesLower) : codesLower;
    const codesEn = typeof banglaToEngNum === 'function' ? banglaToEngNum(codesLower) : codesLower;

    return name.includes(q) || name.includes(qBn) || name.includes(qEn) ||
           codesLower.includes(q) || codesLower.includes(qEn) || codesLower.includes(qBn) || codesBn.includes(q) || codesEn.includes(q);
}

function populateMobileProductsGrid(filterText = '') {
    const grid = document.getElementById("mobileProductsGrid");
    if (!grid) return;
    grid.innerHTML = "";

    const filtered = (allProducts || []).filter(p => matchProductSearch(p, filterText));

    if (filtered.length === 0) {
        grid.innerHTML = `<div class="text-center py-4 text-muted">কোনো প্রোডাক্ট পাওয়া যায়নি</div>`;
        return;
    }

    filtered.forEach(p => {
        const itemPrice = p.sell_price || p.unit_price || p.price || 0;
        const itemStock = p.quantity !== undefined ? p.quantity : (p.stock || 0);
        const codeDisplay = formatProductCode(p.product_code);
        const safeName = (p.product_name || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');

        const itemHtml = `
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom rounded-3 mb-1 bg-white shadow-xs" style="cursor: pointer; transition: background 0.2s ease;" onclick="openMobileItemLineForm(${p.id})">
                <div class="flex-grow-1 pe-2">
                    <h6 class="fw-bold mb-1 text-dark" style="font-size: 14.5px;">${p.product_name}</h6>
                    <div class="d-flex flex-wrap align-items-center gap-1.5 mb-1">
                        ${codeDisplay ? `<span class="badge bg-light text-success border border-success font-monospace" style="font-size: 11px;">কোড: ${codeDisplay}</span>` : ''}
                        <span class="badge bg-light text-secondary border" style="font-size: 11px;">বিক্রয়: ${formatBanglaAmount(itemPrice)}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    <div class="text-end me-1">
                        <small class="text-muted d-block" style="font-size: 10px;">স্টক</small>
                        <span class="badge ${itemStock > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'} fw-bold px-2 py-1" style="font-size: 11.5px; border-radius: 8px;">${engToBanglaNum(itemStock)}</span>
                    </div>
                    <!-- Product Action Buttons: Edit & Delete -->
                    <button type="button" class="btn btn-sm btn-outline-primary rounded-circle p-0 d-inline-flex align-items-center justify-content-center shadow-xs" style="width: 32px; height: 32px;" onclick="event.stopPropagation(); editProductFromPosModal(${p.id})" title="প্রোডাক্ট এডিট">
                        <i class="fa-solid fa-pen-to-square" style="font-size: 13px;"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger rounded-circle p-0 d-inline-flex align-items-center justify-content-center shadow-xs" style="width: 32px; height: 32px;" onclick="event.stopPropagation(); deleteProductFromPosModal(${p.id}, '${safeName}')" title="প্রোডাক্ট মুছে ফেলুন">
                        <i class="fa-solid fa-trash-can" style="font-size: 13px;"></i>
                    </button>
                </div>
            </div>
        `;
        grid.insertAdjacentHTML("beforeend", itemHtml);
    });
}

async function editProductFromPosModal(productId) {
    try {
        if (typeof showLoader === 'function') showLoader();
        const res = await axios.post("/api/product-by-id", { id: productId.toString() }, HeaderToken());
        if (typeof hideLoader === 'function') hideLoader();

        if (res.data && res.data.status === 'success' && res.data.data) {
            const p = res.data.data;
            window.editingPosProductId = p.id;

            if (document.getElementById("ProductName")) document.getElementById("ProductName").value = p.product_name || '';
            if (document.getElementById("ProductQuantity")) document.getElementById("ProductQuantity").value = engToBanglaNum(p.quantity || 0);
            if (document.getElementById("ProductCostPrice")) document.getElementById("ProductCostPrice").value = engToBanglaNum(p.cost_price || 0);
            if (document.getElementById("ProductSellingPrice")) document.getElementById("ProductSellingPrice").value = engToBanglaNum(p.sell_price || 0);
            
            // Set Product Code/Barcodes
            if (p.product_code) {
                try {
                    const parsed = JSON.parse(p.product_code);
                    if (Array.isArray(parsed)) {
                        barcodeList = [...parsed];
                    } else {
                        barcodeList = [String(p.product_code)];
                    }
                } catch(e) {
                    barcodeList = [String(p.product_code)];
                }
                if (typeof renderBarcodes === 'function') renderBarcodes();
            }

            const modalHeading = document.querySelector("#createProduct h5 span");
            if (modalHeading) modalHeading.textContent = "Edit Product (প্রোডাক্ট এডিট করুন)";

            hideMobileModal("mobileProductSearchModal");
            openPosAddProductModal();
        } else {
            errorToast(res.data?.message || "প্রোডাক্ট তথ্য পাওয়া যায়নি!");
        }
    } catch(err) {
        if (typeof hideLoader === 'function') hideLoader();
        console.error("Edit product error:", err);
        errorToast("প্রোডাক্ট তথ্য লোড করতে ব্যর্থ হয়েছে!");
    }
}

function deleteProductFromPosModal(productId, productName) {
    Swal.fire({
        title: 'প্রোডাক্ট মুছে ফেলতে চান?',
        text: `আপনি কি "${productName}" প্রোডাক্টটি স্থায়ীভাবে মুছে ফেলার বিষয়ে নিশ্চিত?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'হ্যাঁ, মুছে ফেলুন',
        cancelButtonText: 'বাতিল'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                if (typeof showLoader === 'function') showLoader();
                const res = await axios.post("/api/delete-product", { id: productId.toString() }, HeaderToken());
                if (typeof hideLoader === 'function') hideLoader();

                if (res.data && res.data.status === 'success') {
                    if (typeof successToast === 'function') successToast("🗑️ প্রোডাক্ট মুছে ফেলা হয়েছে!");
                    else alert("🗑️ প্রোডাক্ট মুছে ফেলা হয়েছে!");

                    if (typeof loadProductsByBrand === 'function') await loadProductsByBrand(0);
                    populateMobileProductsGrid(document.getElementById("mobileProductSearchInput")?.value || '');
                } else {
                    errorToast(res.data?.message || "প্রোডাক্ট মুছে ফেলা সম্ভব হয়নি!");
                }
            } catch(err) {
                if (typeof hideLoader === 'function') hideLoader();
                console.error("Delete product error:", err);
                errorToast("প্রোডাক্ট মুছে ফেলতে সমস্যা হয়েছে!");
            }
        }
    });
}

function enforceBanglaNumberInput(inputEl, allowDecimal = true) {
    if (!inputEl) return;
    let val = inputEl.value;
    if (!val) return;

    // Convert English digits to Bangla digits
    const engDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    const bngDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    
    for (let i = 0; i < 10; i++) {
        val = val.replaceAll(engDigits[i], bngDigits[i]);
    }

    // Strict validation: Allow only Bangla digits and optional decimal point
    if (allowDecimal) {
        val = val.replace(/[^০-৯\.]/g, '');
        const parts = val.split('.');
        if (parts.length > 2) {
            val = parts[0] + '.' + parts.slice(1).join('');
        }
    } else {
        val = val.replace(/[^০-৯]/g, '');
    }

    inputEl.value = val;
}

function enforceTextInput(inputEl) {
    if (!inputEl) return;
}

function openMobileItemLineForm(productOrId) {
    let product = null;
    if (typeof productOrId === 'object' && productOrId !== null) {
        product = productOrId;
    } else {
        product = (allProducts || []).find(p => p.id == productOrId);
    }

    if (!product && window.lastCreatedProduct && window.lastCreatedProduct.id == productOrId) {
        product = window.lastCreatedProduct;
    }

    const targetId = product ? product.id : productOrId;
    const existingCartItem = (cartItems || []).find(ci => ci.id == targetId);

    if (!product && existingCartItem) {
        product = {
            id: existingCartItem.id,
            product_name: existingCartItem.product_name,
            sell_price: existingCartItem.sellingPrice || existingCartItem.sell_price,
            cost_price: existingCartItem.cost_price,
            price: existingCartItem.price
        };
    }

    if (!product) {
        console.error("Product not found for:", productOrId);
        return;
    }

    if (allProducts && !allProducts.some(p => p.id == product.id)) {
        allProducts.push(product);
    }

    hideMobileModal("mobileProductSearchModal");

    const nameInput = document.getElementById("itemLineProductName");
    const idInput = document.getElementById("itemLineProductId");
    const qtyInput = document.getElementById("itemLineQty");
    const priceInput = document.getElementById("itemLinePrice");

    if (nameInput) nameInput.value = product.product_name || product.name || '';
    if (idInput) idInput.value = product.id;

    if (existingCartItem) {
        if (qtyInput) qtyInput.value = engToBanglaNum(existingCartItem.quantity);
        if (priceInput) priceInput.value = engToBanglaNum((existingCartItem.sellingPrice || 0).toFixed(2));
    } else {
        if (qtyInput) qtyInput.value = engToBanglaNum("1");
        const unitPrice = parseFloat(product.sell_price || product.unit_price || product.price || 0);
        if (priceInput) priceInput.value = engToBanglaNum(unitPrice.toFixed(2));
    }
    
    calculateItemLineTotal();

    setTimeout(() => {
        showMobileModal("mobileItemLineModal");
    }, 150);
}

function calculateItemLineTotal() {
    const qty = parseBanglaFloat(document.getElementById("itemLineQty")?.value) || 0;
    const price = parseBanglaFloat(document.getElementById("itemLinePrice")?.value) || 0;
    const total = qty * price;

    if (document.getElementById("itemLineBreakdownText")) {
        document.getElementById("itemLineBreakdownText").textContent = `${engToBanglaNum(qty.toFixed(2))} X ${formatBanglaAmount(price)} = ${formatBanglaAmount(total)}`;
    }
    if (document.getElementById("itemLineTotalText")) {
        document.getElementById("itemLineTotalText").textContent = formatBanglaAmount(total);
    }
}

function confirmAddItemLineToCart() {
    const productId = document.getElementById("itemLineProductId")?.value;
    const qty = parseBanglaFloat(document.getElementById("itemLineQty")?.value) || 1;
    const price = parseBanglaFloat(document.getElementById("itemLinePrice")?.value) || 0;

    let product = (allProducts || []).find(p => p.id == productId);
    if (!product) {
        const existingCartItem = (cartItems || []).find(ci => ci.id == productId);
        if (existingCartItem) {
            product = {
                id: existingCartItem.id,
                product_name: existingCartItem.product_name,
                sell_price: existingCartItem.sellingPrice,
                cost_price: existingCartItem.cost_price,
                price: existingCartItem.price
            };
        }
    }

    if (product) {
        addProductToCartCustom(product, qty, price);
    }

    hideMobileModal("mobileItemLineModal");
}

function openCreateProductModalFromMobile() {
    hideMobileModal("mobileProductSearchModal");
    openPosAddProductModal();
}

function addProductToCartCustom(product, customQty = 1, customPrice = null) {
    const existingIndex = cartItems.findIndex((item) => item.id == product.id);
    const selPrice = customPrice !== null ? customPrice : (product.sell_price || product.unit_price || product.price || 0);
    const qty = customQty > 0 ? customQty : 1;

    if (existingIndex !== -1) {
        const cartItem = cartItems[existingIndex];
        cartItem.quantity = qty;
        if (customPrice !== null) cartItem.sellingPrice = customPrice;
        renderCart();
        if (typeof successToast === 'function') {
            successToast(`✏️ "${product.product_name || product.name}" আপডেট করা হয়েছে।`);
        }
    } else {
        cartItems.push({
            id: product.id,
            product_name: product.product_name || product.name,
            cost_price: product.cost_price || 0,
            sell_price: selPrice,
            price: product.price || 0,
            quantity: qty,
            sellingPrice: selPrice,
        });
        renderCart();
        playScanBeepSound();
        if (typeof successToast === 'function') {
            successToast(`🛒 "${product.product_name || product.name}" (${engToBanglaNum(qty)} Pcs) কার্টে যুক্ত করা হয়েছে।`);
        }
    }
}

function filterMobileProducts(val) {
    populateMobileProductsGrid(val);
}

function openMobileCustomerSearchModal() {
    populateMobileCustomerModalList();
    showMobileModal("mobileCustomerSearchModal");
}

function populateMobileCustomerModalList(filterText = '') {
    const list = document.getElementById("mobileCustomerModalList");
    if (!list) return;
    list.innerHTML = "";

    const customers = window.allCustomersList || [];
    const filtered = customers.filter(c => matchCustomerSearch(c, filterText));

    if (filtered.length === 0) {
        list.innerHTML = `<div class="text-center py-4 text-muted">কোনো কাস্টমার পাওয়া যায়নি</div>`;
        return;
    }

    filtered.forEach(c => {
        const activeDue = parseBanglaFloat(c.total_due !== undefined ? c.total_due : c.previous_due_amount || 0);
        const safeName = (c.customer_name || '').replace(/'/g, "\\'").replace(/"/g, '&quot;');
        const itemHtml = `
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom rounded-3 mb-1 bg-white position-relative shadow-xs" style="cursor: pointer; transition: background 0.2s ease;" onclick="selectCustomerFromMobileModal(${c.id})">
                <div class="flex-grow-1 pe-2">
                    <div class="d-flex align-items-center gap-1.5 mb-1">
                        <h6 class="fw-bold mb-0 text-dark" style="font-size: 14.5px;">${c.customer_name}</h6>
                        <span class="badge bg-light text-secondary border" style="font-size: 10.5px;">${c.customer_id || 'CUST'}</span>
                    </div>
                    <small class="text-muted d-block" style="font-size: 11.5px;">
                        <i class="fa-solid fa-phone me-1 text-success"></i>${c.mobile ? engToBanglaNum(c.mobile) : 'N/A'}
                        ${c.address_details ? ` · <i class="fa-solid fa-location-dot me-0.5 text-danger"></i>${c.address_details}` : ''}
                    </small>
                </div>
                <div class="d-flex align-items-center gap-2 flex-shrink-0">
                    <div class="text-end me-1">
                        <span class="fw-bold ${activeDue > 0 ? 'text-danger' : 'text-success'}" style="font-size: 13.5px;">৳ ${engToBanglaNum(activeDue.toFixed(2))}</span>
                        <small class="d-block text-muted" style="font-size: 10px;">${activeDue > 0 ? 'বকেয়া' : 'পরিশোধিত'}</small>
                    </div>
                    <!-- Action Buttons: Edit & Delete -->
                    <button type="button" class="btn btn-sm btn-outline-primary rounded-circle p-0 d-inline-flex align-items-center justify-content-center shadow-xs" style="width: 32px; height: 32px;" onclick="event.stopPropagation(); editCustomerFromPosModal(${c.id})" title="কাস্টমার এডিট">
                        <i class="fa-solid fa-pen-to-square" style="font-size: 13px;"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger rounded-circle p-0 d-inline-flex align-items-center justify-content-center shadow-xs" style="width: 32px; height: 32px;" onclick="event.stopPropagation(); deleteCustomerFromPosModal(${c.id}, '${safeName}')" title="কাস্টমার মুছে ফেলুন">
                        <i class="fa-solid fa-trash-can" style="font-size: 13px;"></i>
                    </button>
                </div>
            </div>
        `;
        list.insertAdjacentHTML("beforeend", itemHtml);
    });
}

function filterMobileCustomers(val) {
    populateMobileCustomerModalList(val);
}

function selectCustomerFromMobileModal(customerId) {
    const itemEl = document.querySelector(`#CustomerSelectData .dropdown-item[data-id="${customerId}"]`);
    if (itemEl) {
        itemEl.click();
    } else {
        const cust = (window.allCustomersList || []).find(c => c.id == customerId);
        if (cust) {
            const name = cust.customer_name || 'Walk in Customer';
            const mobile = cust.mobile || '-';
            const address = cust.address_details || '-';
            const due = parseBanglaFloat(cust.previous_due_amount || cust.total_due || 0);

            if (document.getElementById("CustomerName")) document.getElementById("CustomerName").value = name;
            if (document.getElementById("CustomerID")) document.getElementById("CustomerID").value = cust.id;
            if (document.getElementById("CustomerMobileNumber")) document.getElementById("CustomerMobileNumber").value = cust.mobile || '';
            if (document.getElementById("CustomerAddress")) document.getElementById("CustomerAddress").value = cust.address_details || '';
            if (document.getElementById("totalPreviousDueAmount")) document.getElementById("totalPreviousDueAmount").value = cust.previous_due_amount || 0;

            updateMobileCustomerDisplay(name, mobile, address, due);
        }
    }

    hideMobileModal("mobileCustomerSearchModal");
}

function openCreateCustomerModalFromMobile() {
    hideMobileModal("mobileCustomerSearchModal");
    openPosCustomerModal();
}

function addProductToCartById(productId) {
    const product = allProducts.find(p => p.id === productId);
    if (product) {
        addToCart(product);
        const modalEl = document.getElementById("mobileProductSearchModal");
        if (modalEl) {
            const bsModal = bootstrap.Modal.getInstance(modalEl);
            if (bsModal) bsModal.hide();
        }
    }
}

function togglePosSaleType(type) {
    const btnCash = document.getElementById("btnTypeCash");
    const btnCredit = document.getElementById("btnTypeCredit");
    if (type === 'cash') {
        if (btnCash) btnCash.classList.add("active");
        if (btnCredit) btnCredit.classList.remove("active");
    } else {
        if (btnCredit) btnCredit.classList.add("active");
        if (btnCash) btnCash.classList.remove("active");
    }
}

function syncMobileCalcInputs() {
    const discount = parseBanglaFloat(document.getElementById("mobileDiscountInput")?.value) || 0;
    const delivery = parseBanglaFloat(document.getElementById("mobileDeliveryCharge")?.value) || 0;
    const paid = parseBanglaFloat(document.getElementById("mobilePaidInput")?.value) || 0;

    const discountInput = document.getElementById("discountAmountInput");
    if (discountInput) {
        discountInput.value = discount;
    }

    const paidInput = document.getElementById("paidAmountInput");
    if (paidInput) {
        paidInput.value = paid;
    }
    calculateDuePayment();
}

function syncMobileDateToDesktop(val) {
    const desktopDate = document.getElementById("CustomerDate");
    if (desktopDate) {
        desktopDate.value = val;
    }
}

// Hold Invoices Manager System
function updateHeldInvoicesBadge() {
    try {
        const heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
        const badge = document.getElementById('heldInvoicesBadge');
        if (badge) badge.textContent = heldList.length;
    } catch(e) {}
}

function holdCurrentInvoice() {
    if (!cartItems || cartItems.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'কার্ট খালি',
            text: 'হোল্ড করার মতো কোনো পণ্য কার্টে যুক্ত নেই।',
            confirmButtonColor: '#15803d'
        });
        return;
    }

    const name = document.getElementById('CustomerName')?.value.trim() || 'সাধারণ কাস্টমার';
    const mobile = document.getElementById('CustomerMobileNumber')?.value.trim() || '';
    const address = document.getElementById('CustomerAddress')?.value.trim() || '';
    const prevDue = document.getElementById('totalPreviousDueAmount')?.value.trim() || '0';
    const invDate = document.getElementById('CustomerDate')?.value || '';
    const customerId = document.getElementById('CustomerID')?.value || '1';
    const discount = document.getElementById('discountAmountInput')?.value || '';
    const paid = document.getElementById('paidAmountInput')?.value || '';
    const note = document.getElementById('orderNote')?.value || '';
    const subTotalVal = parseFloat(document.getElementById('subTotal')?.textContent.replace('৳','')) || 0;

    const holdId = 'HOLD-' + Math.floor(1000 + Math.random() * 9000);
    const now = new Date();
    const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + ', ' + now.toLocaleDateString();

    const holdData = {
        id: holdId,
        customer_id: customerId,
        customer_name: name,
        customer_mobile: mobile,
        customer_address: address,
        previous_due: prevDue,
        invoice_date: invDate,
        cartItems: JSON.parse(JSON.stringify(cartItems)),
        discount: discount,
        paid: paid,
        order_note: note,
        subTotal: subTotalVal,
        total_items: cartItems.reduce((acc, i) => acc + (i.quantity || 1), 0),
        time: timeStr
    };

    let heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
    heldList.push(holdData);
    localStorage.setItem('pos_held_invoices', JSON.stringify(heldList));

    // Reset current POS cart
    cartItems = [];
    renderCart();
    if (document.getElementById('discountAmountInput')) document.getElementById('discountAmountInput').value = '';
    if (document.getElementById('paidAmountInput')) document.getElementById('paidAmountInput').value = '';
    if (document.getElementById('orderNote')) document.getElementById('orderNote').value = '';

    updateHeldInvoicesBadge();

    Swal.fire({
        icon: 'success',
        title: 'ইনভয়েস হোল্ড করা হয়েছে!',
        text: `রেফারেন্স: #${holdId} (${name})`,
        timer: 1500,
        showConfirmButton: false
    });
}

function openHoldInvoicesModal() {
    const heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
    const container = document.getElementById('heldInvoicesCardList');
    if (!container) return;

    container.innerHTML = '';

    if (heldList.length === 0) {
        container.innerHTML = `
            <div class="text-center text-muted py-5 fw-bold bg-white rounded-3 border">
                <i class="fa-solid fa-inbox fs-1 d-block mb-2 text-warning"></i>
                <span>কোনো হোল্ডকৃত ইনভয়েস পাওয়া যায়নি।</span>
            </div>`;
    } else {
        heldList.forEach((item) => {
            const card = document.createElement('div');
            card.className = "card mb-3 border-0 shadow-sm";
            card.style.cssText = "border-radius: 14px; background: #ffffff; border: 1px solid #e2e8f0 !important;";
            card.innerHTML = `
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <!-- Ref & Customer Info -->
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge px-2 py-2 fw-bold" style="background: #fef08a; color: #854d0e; border: 1px solid #fde047; font-size: 13px; font-family: monospace; border-radius: 8px;">
                                ${item.id}
                            </span>
                            <div>
                                <h6 class="m-0 fw-bold text-dark" style="font-size: 15px;">${item.customer_name}</h6>
                                <span class="text-muted small"><i class="fa-solid fa-phone me-1 text-success"></i>${item.customer_mobile || 'N/A'}</span>
                            </div>
                        </div>

                        <!-- Date & Items Badge -->
                        <div class="d-flex align-items-center gap-3">
                            <span class="text-muted small"><i class="fa-regular fa-clock me-1 text-warning"></i>${item.time}</span>
                            <span class="badge px-3 py-2 fw-bold" style="background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; font-size: 12px; border-radius: 20px;">
                                ${item.total_items} Pcs
                            </span>
                        </div>

                        <!-- Amount & Action Buttons -->
                        <div class="d-flex align-items-center gap-3 ms-auto ms-sm-0">
                            <span class="fw-bolder text-success ms-2" style="font-size: 18px;">৳ ${item.subTotal.toFixed(2)}</span>
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-success px-3 py-2 fw-bold d-flex align-items-center gap-1 shadow-sm" onclick="restoreHeldInvoice('${item.id}')" style="border-radius: 10px; font-size: 13px;">
                                    <i class="fa-solid fa-play"></i> লোড করুন
                                </button>
                                <button type="button" class="btn btn-outline-danger px-3 py-2 shadow-xs" onclick="deleteHeldInvoice('${item.id}')" style="border-radius: 10px;" title="মুছে ফেলুন">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(card);
        });
    }

    const modalEl = document.getElementById('holdInvoicesModal');
    if (modalEl) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modal.show();
        } else {
            $(modalEl).modal('show');
        }
    }
}

function restoreHeldInvoice(holdId) {
    let heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
    const item = heldList.find(i => i.id === holdId);
    if (!item) return;

    if (cartItems.length > 0) {
        Swal.fire({
            title: 'বর্তমান কার্ট প্রতিস্থাপন করবেন?',
            text: 'কার্টে থাকা বর্তমান পণ্যগুলো মুছে হোল্ডকৃত ইনভয়েসটি লোড হবে।',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#15803d',
            cancelButtonColor: '#d33',
            confirmButtonText: 'হ্যাঁ, লোড করুন',
            cancelButtonText: 'বাতিল'
        }).then((result) => {
            if (result.isConfirmed) {
                applyRestoreHeldInvoice(item, holdId);
            }
        });
    } else {
        applyRestoreHeldInvoice(item, holdId);
    }
}

function applyRestoreHeldInvoice(item, holdId) {
    cartItems = JSON.parse(JSON.stringify(item.cartItems || []));
    renderCart();

    if (document.getElementById('CustomerName')) document.getElementById('CustomerName').value = item.customer_name || '';
    if (document.getElementById('CustomerMobileNumber')) document.getElementById('CustomerMobileNumber').value = item.customer_mobile || '';
    if (document.getElementById('CustomerAddress')) document.getElementById('CustomerAddress').value = item.customer_address || '';
    if (document.getElementById('totalPreviousDueAmount')) document.getElementById('totalPreviousDueAmount').value = item.previous_due || 0;
    if (document.getElementById('CustomerID')) document.getElementById('CustomerID').value = item.customer_id || '1';
    if (document.getElementById('discountAmountInput')) document.getElementById('discountAmountInput').value = item.discount || '';
    if (document.getElementById('paidAmountInput')) document.getElementById('paidAmountInput').value = item.paid || '';
    if (document.getElementById('orderNote')) document.getElementById('orderNote').value = item.order_note || '';

    deleteHeldInvoice(holdId, false);

    const modalEl = document.getElementById('holdInvoicesModal');
    if (modalEl) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            const modal = bootstrap.Modal.getInstance(modalEl);
            if (modal) modal.hide();
        } else {
            $(modalEl).modal('hide');
        }
    }

    calculateDuePayment();

    if (typeof successToast === 'function') {
        successToast(`▶️ ইনভয়েস #${holdId} লোড করা হয়েছে।`);
    }
}

function deleteHeldInvoice(holdId, showNotice = true) {
    let heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
    heldList = heldList.filter(i => i.id !== holdId);
    localStorage.setItem('pos_held_invoices', JSON.stringify(heldList));
    updateHeldInvoicesBadge();

    if (showNotice) {
        openHoldInvoicesModal();
        if (typeof successToast === 'function') {
            successToast(`🗑️ ইনভয়েস #${holdId} মুছে ফেলা হয়েছে।`);
        }
    }
}

// Call function when discount or paid amount changes
const discInputEl = document.getElementById("discountAmountInput");
if (discInputEl) discInputEl.addEventListener("input", calculateDuePayment);

const paidInputEl = document.getElementById("paidAmountInput");
if (paidInputEl) paidInputEl.addEventListener("input", calculateDuePayment);

// Initialize the values on page load
try { calculateDuePayment(); } catch(e) { console.error("calculateDuePayment init error:", e); }
try { updateHeldInvoicesBadge(); } catch(e) { console.error("updateHeldInvoicesBadge init error:", e); }
try { ProductBrandData(); } catch(e) { console.error("ProductBrandData init error:", e); }
    </script>


    <script>
        async function SavePaymentInfo(event) {
            if (event) event.preventDefault(); // Prevent form submission

            try {
                // Fetch customer input values
                const name = document.getElementById('CustomerName')?.value.trim();
                const mobile = document.getElementById('CustomerMobileNumber')?.value.trim();
                const address = document.getElementById('CustomerAddress')?.value.trim();
                const totalPreviousDueAmount = parseBanglaFloat(document.getElementById('totalPreviousDueAmount')?.value) || 0;
                const Invoicedate = document.getElementById('CustomerDate')?.value;
                let CustomerID = document.getElementById('CustomerID').value;
                const desktopPaidRaw = document.getElementById('paidAmountInput')?.value;
                const mobilePaidRaw = document.getElementById('mobilePaidInput')?.value;
                const discountAmount = parseBanglaFloat(document.getElementById('discountAmountInput')?.value) || 0;
                const totalCost = parseBanglaFloat(document.getElementById('totalCost')?.textContent) || 0;
                const subTotal = parseBanglaFloat(document.getElementById('subTotal')?.textContent) || 0;

                const chkTop = document.getElementById("chkUseReturnCredit");
                const chkRow = document.getElementById("chkPosReturnAdjRow");
                const isReturnAdjActive = (chkTop && chkTop.checked) || (chkRow && chkRow.checked);
                const returnAdjustmentAmount = isReturnAdjActive ? (parseBanglaFloat(document.getElementById('posReturnAdjustmentInput')?.value) || 0) : 0;

                const netPayable = Math.max(0, subTotal - discountAmount - returnAdjustmentAmount);

                let rawPaidVal = (desktopPaidRaw && desktopPaidRaw.trim() !== '') ? desktopPaidRaw : mobilePaidRaw;
                let paidAmount = parseBanglaFloat(rawPaidVal);
                let paymentMethod = document.querySelector('input[name="payment"]:checked')?.id || 'cash';
                const transactionId = document.getElementById('transaction_id')?.value || document.getElementById('posTransactionId')?.value || '';
                const orderNote = document.getElementById('order_note')?.value || document.getElementById('posOrderNote')?.value || '';

                // Smart fallback: If payment method is not 'due' and paidAmount was left blank/0, default to full cash payment
                if ((rawPaidVal === undefined || rawPaidVal === null || rawPaidVal.trim() === '' || paidAmount === 0) && paymentMethod !== 'due') {
                    paidAmount = netPayable;
                    if (!paymentMethod || paymentMethod === 'undefined') paymentMethod = 'cash';
                } else if (paidAmount === 0 && (!paymentMethod || paymentMethod === 'undefined')) {
                    paymentMethod = 'due';
                }

                const dueAmount = Math.max(0, netPayable - paidAmount);
                const paymentStatusDisplay = (paidAmount >= netPayable && netPayable > 0) ? "নগদ" : (paidAmount > 0 ? "আংশিক" : "বাকী");
                // Validate required fields
                if (!name) {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'কাস্টমার নির্বাচন করুন',
                        text: 'অর্ডার তৈরি করতে কাস্টমার সিলেক্ট করুন অথবা নতুন কাস্টমার এন্ট্রি করুন।',
                        confirmButtonColor: '#15803d'
                    });
                }
                if (cartItems.length === 0) {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'কার্ট খালি!',
                        text: 'অর্ডার তৈরি করতে অন্তত একটি পণ্য কার্টে যুক্ত করুন।',
                        confirmButtonColor: '#15803d'
                    });
                }

                // Collect product details from the cart
                const products = cartItems.map((item) => {
                    const sellingPriceInput = document.getElementById(`sellingPrice-${item.id}`);
                    const sellingPrice = sellingPriceInput ? parseBanglaFloat(sellingPriceInput.value) : (parseBanglaFloat(item.sellingPrice) || 0);

                    return {
                        product_id: item.id,
                        quantity: parseBanglaFloat(item.quantity) || 1,
                        price: parseBanglaFloat(item.cost_price) || 0,
                        selling_price: sellingPrice,
                    };
                });

                // Prepare the FormData object
                const formData = new FormData();
                formData.append('order_no', document.getElementById('mobileInvoiceNo')?.innerText?.trim() || '');
                formData.append('customer_name', name);
                formData.append('mobile', mobile || '0000000000');
                formData.append('address_details', address);
                formData.append('customer_id', CustomerID);
                formData.append('sub_total', subTotal);
                formData.append('return_adjustment_amount', returnAdjustmentAmount);
                formData.append('invoice_date', Invoicedate);
                formData.append('paid_amount', paidAmount);
                formData.append('discount_amount', discountAmount);
                formData.append('due_amount', dueAmount);
                formData.append('previous_due_amount', totalPreviousDueAmount);
                formData.append('transaction_id', transactionId);
                formData.append('order_note', orderNote);
                formData.append('payment_method', paymentMethod);
                formData.append('payment_status', paymentStatusDisplay);
                formData.append('products', JSON.stringify(products));

                // Send data to the server
                const res = await axios.post('/api/create-order', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        ...HeaderToken()?.headers,
                    },
                });

                // Handle response
                if (res.data.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'অর্ডার সফলভাবে সম্পন্ন হয়েছে!',
                        text: 'ইনভয়েস প্রিন্ট পেজে নিয়ে যাওয়া হচ্ছে...',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = '/invoice-print';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'অর্ডার ব্যর্থ হয়েছে',
                        text: res.data.message || 'অর্ডার প্রসেস করার সময় সমস্যা দেখা দিয়েছে।',
                        confirmButtonColor: '#15803d'
                    });
                }
            } catch (error) {
                console.error("Error in creating order:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'ত্রুটি',
                    text: error.response?.data?.message || error.message || 'অর্ডার প্রসেস করার সময় সমস্যা দেখা দিয়েছে। আবার চেষ্টা করুন।',
                    confirmButtonColor: '#15803d'
                });
            }
        }
    </script>

    <!-- Mobile Camera Barcode Scanner Modal -->
    <div class="modal fade" id="cameraScanModal" tabindex="-1" aria-labelledby="cameraScanModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 18px; overflow: hidden;">
                <div class="modal-header text-white py-3" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);">
                    <h5 class="modal-title fw-bold" id="cameraScanModalLabel">
                        <i class="fa-solid fa-camera me-2"></i> মোবাইল ক্যামেরা বারকোড স্ক্যানার
                    </h5>
                    <button type="button" class="btn-close btn-close-white" onclick="stopCameraScanner()"></button>
                </div>
                <div class="modal-body p-3 text-center">
                    <div id="cameraScannerStatus" class="alert alert-info py-2 small mb-3" style="border-radius: 10px;">
                        <i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে রাখুন।
                    </div>

                    <!-- Reader Viewport -->
                    <div id="reader" style="width: 100%; min-height: 280px; background: #000; border-radius: 14px; overflow: hidden;" class="shadow-sm"></div>

                    <div class="d-flex align-items-center justify-content-between mt-3 px-1">
                        <span id="lastScannedText" class="badge bg-success fs-6 py-2 px-3" style="border-radius: 10px;">স্ক্যান কৃত কোড: -</span>
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="switchCamera()">
                            <i class="fa-solid fa-rotate me-1"></i> ক্যামেরা পাল্টান
                        </button>
                    </div>
                </div>
                <div class="modal-footer bg-light py-2 justify-content-between">
                    <small class="text-muted"><i class="fa-solid fa-bolt text-warning me-1"></i> বারকোড স্ক্যান হলেই অটোমেটিক কার্টে যুক্ত হবে</small>
                    <button type="button" class="btn btn-secondary px-4 fw-bold rounded-pill" onclick="stopCameraScanner()">বন্ধ করুন</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Camera Barcode Scanner Logic -->
    <script>
        let html5QrCode = null;
        let currentFacingMode = "environment"; // Rear camera default
        let lastScannedCode = "";
        let scanCoolDownTimer = null;

        function openCameraScanner() {
            const modalEl = new bootstrap.Modal(document.getElementById('cameraScanModal'));
            modalEl.show();
            setTimeout(() => {
                startCameraScanner();
            }, 350);
        }

        function startCameraScanner() {
            if (html5QrCode && html5QrCode.isScanning) {
                html5QrCode.stop().then(() => initHtml5QrCode()).catch(() => initHtml5QrCode());
            } else {
                initHtml5QrCode();
            }
        }

        function initHtml5QrCode() {
            const statusEl = document.getElementById("cameraScannerStatus");
            if (statusEl) {
                statusEl.className = "alert alert-info py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।';
            }

            if (!html5QrCode) {
                html5QrCode = new Html5Qrcode("reader");
            }

            const config = { 
                fps: 15, 
                qrbox: { width: 260, height: 160 },
                aspectRatio: 1.333334
            };

            html5QrCode.start(
                { facingMode: currentFacingMode },
                config,
                onBarcodeDetectedSuccess,
                onBarcodeDetectedError
            ).then(() => {
                if (statusEl) {
                    statusEl.className = "alert alert-success py-2 small mb-3";
                    statusEl.innerHTML = '<i class="fa-solid fa-video me-1"></i> ক্যামেরা সক্রিয়! বারকোড স্ক্যান করলে সরাসরি কার্টে যোগ হবে।';
                }
            }).catch(err => {
                console.error("Camera start error:", err);
                if (statusEl) {
                    statusEl.className = "alert alert-danger py-2 small mb-3";
                    statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> ক্যামেরা চালু করা যায়নি! ব্রাউজারের ক্যামেরা পারমিশন এলাউ (Allow) করুন।';
                }
            });
        }

        function onBarcodeDetectedSuccess(decodedText, decodedResult) {
            if (!decodedText || decodedText === lastScannedCode) return;

            lastScannedCode = decodedText;
            const lastTextEl = document.getElementById("lastScannedText");
            if (lastTextEl) lastTextEl.innerText = `স্ক্যান কৃত: ${decodedText}`;

            // Play beep sound & vibration
            if (navigator.vibrate) navigator.vibrate(100);
            playScanBeep();

            const cleanValue = decodedText.trim();
            
            // Search product in allProducts
            let matchedProduct = (allProducts || []).find((p) => isExactBarcodeMatch(p, cleanValue));

            if (!matchedProduct) {
                const engVal = banglaToEngNum(cleanValue).toLowerCase();
                const rawVal = cleanValue.toLowerCase();
                const matchingProducts = (allProducts || []).filter((product) => {
                    let codesStr = "";
                    try {
                        const parsed = JSON.parse(product.product_code);
                        codesStr = Array.isArray(parsed) ? parsed.join(" ") : String(product.product_code);
                    } catch(e) {
                        codesStr = String(product.product_code);
                    }
                    const engCodesStr = banglaToEngNum(codesStr);
                    return (
                        codesStr.toLowerCase().includes(rawVal) ||
                        engCodesStr.toLowerCase().includes(engVal) ||
                        (product.product_name || "").toLowerCase().includes(rawVal)
                    );
                });
                if (matchingProducts.length === 1) {
                    matchedProduct = matchingProducts[0];
                }
            }

            if (matchedProduct) {
                if (window.innerWidth < 992) {
                    // Mobile View: Stop camera scanner, hide search modal, and open "নতুন আইটেম লাইন" modal
                    stopCameraScanner();
                    hideMobileModal("mobileProductSearchModal");
                    setTimeout(() => {
                        openMobileItemLineForm(matchedProduct);
                    }, 250);
                } else {
                    // Desktop View: Fill search input and trigger direct add to cart
                    const searchInput = document.getElementById("productCodeSearch");
                    if (searchInput) {
                        searchInput.value = decodedText;
                        handleBarcodeEnterKey({ key: "Enter", preventDefault: () => {} }, decodedText);
                    }
                }
            } else {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'পণ্য পাওয়া যায়নি',
                        text: `"${cleanValue}" বারকোডের কোনো প্রোডাক্ট সিস্টেমে পাওয়া যায়নি!`,
                        confirmButtonColor: '#15803d',
                        timer: 2000
                    });
                } else if (typeof errorToast === 'function') {
                    errorToast(`❌ "${cleanValue}" বারকোডের কোনো প্রোডাক্ট পাওয়া যায়নি!`);
                }
            }

            // Continuous scanning cooldown (1.2 seconds)
            clearTimeout(scanCoolDownTimer);
            scanCoolDownTimer = setTimeout(() => {
                lastScannedCode = "";
            }, 1200);
        }

        function onBarcodeDetectedError(errorMessage) {
            // Quiet detection attempts
        }

        function switchCamera() {
            currentFacingMode = (currentFacingMode === "environment") ? "user" : "environment";
            startCameraScanner();
        }

        function stopCameraScanner() {
            if (html5QrCode && html5QrCode.isScanning) {
                html5QrCode.stop().then(() => {
                    html5QrCode.clear();
                    hideCameraModal();
                }).catch(() => {
                    hideCameraModal();
                });
            } else {
                hideCameraModal();
            }
        }

        function hideCameraModal() {
            const modalEl = document.getElementById('cameraScanModal');
            const instance = bootstrap.Modal.getInstance(modalEl);
            if (instance) instance.hide();
        }

        function playScanBeep() {
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.type = "sine";
                osc.frequency.value = 1200;
                gain.gain.value = 0.15;
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.start();
                osc.stop(ctx.currentTime + 0.1);
            } catch(e) {}
        }
        function openPosCustomerModal() {
            const modal = document.getElementById('createCustomerPosModal');
            if (modal) {
                modal.style.display = 'block';
                document.documentElement.style.overflowY = 'hidden';
            }
        }

        function closePosCustomerModal() {
            const modal = document.getElementById('createCustomerPosModal');
            if (modal) {
                modal.style.display = 'none';
                document.documentElement.style.overflowY = 'auto';
            }
        }

        function openPosAddProductModal() {
            if (typeof resetProductForm === 'function') resetProductForm();
            const modal = document.getElementById('createProduct');
            if (modal) {
                modal.style.display = 'block';
                document.documentElement.style.overflowY = 'hidden';
            } else {
                console.error("createProduct modal not found!");
            }
        }

        function closePosAddProductModal() {
            const modal = document.getElementById('createProduct');
            if (modal) {
                modal.style.display = 'none';
                document.documentElement.style.overflowY = 'auto';
            }
            if (typeof resetProductForm === 'function') resetProductForm();
        }

        window.addEventListener('click', function(event) {
            const customerModal = document.getElementById('createCustomerPosModal');
            if (customerModal && event.target === customerModal) {
                closePosCustomerModal();
            }
            const productModal = document.getElementById('createProduct');
            if (productModal && event.target === productModal) {
                closePosAddProductModal();
            }
        });

        async function refreshPosProductsAndAddToCart(newProduct) {
            if (!newProduct) return;
            window.lastCreatedProduct = newProduct;

            // Ensure newProduct is in allProducts synchronously BEFORE network call
            if (allProducts) {
                const idx = allProducts.findIndex(p => p.id == newProduct.id);
                if (idx !== -1) {
                    allProducts[idx] = newProduct;
                } else {
                    allProducts.push(newProduct);
                }
            } else {
                allProducts = [newProduct];
            }

            renderProducts(allProducts);
            if (document.getElementById("mobileProductsGrid")) {
                populateMobileProductsGrid();
            }

            // Close Add Product Modal completely
            closePosAddProductModal();

            // Open "নতুন আইটেম লাইন" Form Popup passing the object directly!
            setTimeout(() => {
                openMobileItemLineForm(newProduct);
            }, 150);

            if (typeof successToast === 'function') {
                successToast(`🎉 "${newProduct.product_name}" নতুন প্রোডাক্ট হিসেবে এন্ট্রি হয়েছে। পরিমাণ ও মূল্য নির্ধারণ করুন।`);
            }

            // Async background refresh
            try {
                const res = await axios.get('/api/product-brand-data-show', HeaderToken());
                if (res.data && Array.isArray(res.data['ProductFrontData'])) {
                    allProducts = res.data['ProductFrontData'];
                    if (!allProducts.some(p => p.id == newProduct.id)) {
                        allProducts.push(newProduct);
                    }
                    renderProducts(allProducts);
                    if (document.getElementById("mobileProductsGrid")) {
                        populateMobileProductsGrid();
                    }
                }
            } catch(e) {}
        }
    </script>

    <!-- Mobile Multi-Payment Method System (Exact Parity with Reference Screenshot) -->
    <script>
        const mobilePaymentInfo = {
            'bKash':  { name: 'bKash',  icon: 'fa-solid fa-mobile-screen-button', color: '#e2136e', bg: '#fdf2f8' },
            'Cash':   { name: 'Cash',   icon: 'fa-solid fa-money-bill-wave', color: '#16a34a', bg: '#f0fdf4' },
            'Nagad':  { name: 'Nagad',  icon: 'fa-solid fa-wallet', color: '#ea580c', bg: '#fff7ed' },
            'Rocket': { name: 'Rocket', icon: 'fa-solid fa-rocket', color: '#7c3aed', bg: '#f5f3ff' },
            'Bank':   { name: 'Bank',   icon: 'fa-solid fa-building-columns', color: '#2563eb', bg: '#eff6ff' },
            'Card':   { name: 'Card',   icon: 'fa-solid fa-credit-card', color: '#4f46e5', bg: '#e0e7ff' }
        };

        let mobilePaymentRows = [
            { id: 1, type: 'Cash', amount: '', trxId: '', phone: '' }
        ];

        function renderMobilePaymentRows() {
            const container = document.getElementById('mobilePaymentRowsContainer');
            if (!container) return;

            let html = '';
            mobilePaymentRows.forEach((row, index) => {
                const info = mobilePaymentInfo[row.type] || mobilePaymentInfo['Cash'];
                const isCash = (row.type === 'Cash');
                const showAddBtn = (index === mobilePaymentRows.length - 1);
                const canDelete = (mobilePaymentRows.length > 1);

                html += `
                <div class="pos-mobile-payment-card-box" data-id="${row.id}">
                    <div class="payment-select-group">
                        <div class="dropdown flex-grow-1 position-relative">
                            <button type="button" class="btn border d-flex align-items-center justify-content-between w-100 px-3 py-2 bg-white rounded-3 shadow-xs dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="height: 42px; border-color: #cbd5e1 !important;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge p-1.5 rounded-2 d-inline-flex align-items-center justify-content-center" style="background: ${info.bg}; color: ${info.color}; font-size: 14px; width: 26px; height: 26px;">
                                        <i class="${info.icon}"></i>
                                    </span>
                                    <span class="fw-bold text-dark" style="font-size: 14px;">${info.name}</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-muted small"></i>
                            </button>

                            <ul class="dropdown-menu shadow-lg border-0 w-100 p-1" style="border-radius: 12px; z-index: 1060;">
                                ${Object.keys(mobilePaymentInfo).map(key => {
                                    const opt = mobilePaymentInfo[key];
                                    const isActive = (row.type === key);
                                    return `
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2 rounded-2 ${isActive ? 'active bg-light' : ''}" href="#" onclick="selectMobilePaymentType(${row.id}, '${key}', event)">
                                            <span class="badge p-1.5 rounded-2 d-inline-flex align-items-center justify-content-center" style="background: ${opt.bg}; color: ${opt.color}; font-size: 14px; width: 26px; height: 26px;">
                                                <i class="${opt.icon}"></i>
                                            </span>
                                            <span class="fw-bold text-dark">${opt.name}</span>
                                        </a>
                                    </li>
                                    `;
                                }).join('')}
                            </ul>
                        </div>

                        ${canDelete ? `
                            <button type="button" class="btn-delete-payment-line" onclick="deleteMobilePaymentRow(${row.id})" title="রিমুভ">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        ` : ''}
                    </div>

                    <div class="payment-amount-input-wrap">
                        <span class="currency-prefix">৳</span>
                        <input type="text" inputmode="decimal" placeholder="0" value="${row.amount}" oninput="enforceBanglaNumberInput(this); updateMobilePaymentAmount(${row.id}, this.value)" />
                        ${showAddBtn ? `
                            <button type="button" class="btn-add-payment-line" onclick="addMobilePaymentRow()" title="পেমেন্টের নতুন লাইন যোগ করুন">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        ` : ''}
                    </div>

                    ${!isCash ? `
                        <input type="text" class="payment-extra-input" placeholder="লেনদেন আইডি" value="${row.trxId || ''}" oninput="updateMobilePaymentTrxId(${row.id}, this.value)" />
                        <input type="text" class="payment-extra-input" placeholder="লেনদেনের ফোন নম্বর" value="${row.phone || ''}" oninput="updateMobilePaymentPhone(${row.id}, this.value)" />
                    ` : ''}
                </div>
                `;
            });

            container.innerHTML = html;
            calculateMobilePaymentTotals();
        }

        function selectMobilePaymentType(id, type, event) {
            if (event) event.preventDefault();
            const row = mobilePaymentRows.find(r => r.id == id);
            if (row) {
                row.type = type;
                renderMobilePaymentRows();
            }
        }

        function addMobilePaymentRow() {
            mobilePaymentRows.push({
                id: Date.now(),
                type: 'Cash',
                amount: '',
                trxId: '',
                phone: ''
            });
            renderMobilePaymentRows();
        }

        function deleteMobilePaymentRow(id) {
            if (mobilePaymentRows.length <= 1) return;
            mobilePaymentRows = mobilePaymentRows.filter(r => r.id != id);
            renderMobilePaymentRows();
        }

        function updateMobilePaymentType(id, type) {
            const row = mobilePaymentRows.find(r => r.id == id);
            if (row) {
                row.type = type;
                renderMobilePaymentRows();
            }
        }

        function updateMobilePaymentAmount(id, val) {
            const row = mobilePaymentRows.find(r => r.id == id);
            if (row) {
                row.amount = val;
                calculateMobilePaymentTotals();
            }
        }

        function updateMobilePaymentTrxId(id, val) {
            const row = mobilePaymentRows.find(r => r.id == id);
            if (row) {
                row.trxId = val;
            }
        }

        function updateMobilePaymentPhone(id, val) {
            const row = mobilePaymentRows.find(r => r.id == id);
            if (row) {
                row.phone = val;
            }
        }

        function calculateMobilePaymentTotals() {
            let totalPaid = 0;
            mobilePaymentRows.forEach(row => {
                const amt = parseBanglaFloat(row.amount) || 0;
                totalPaid += amt;
            });

            // Update display total text
            const displayEl = document.getElementById('mobilePaymentTotalDisplay');
            if (displayEl) {
                displayEl.textContent = `৳ ${formatBanglaNumber(totalPaid.toFixed(2))}`;
            }

            // Sync to desktop paidAmountInput for invoice submission
            const desktopPaidEl = document.getElementById('paidAmountInput');
            if (desktopPaidEl) {
                desktopPaidEl.value = totalPaid;
            }

            const mobilePaidEl = document.getElementById('mobilePaidInput');
            if (mobilePaidEl) {
                mobilePaidEl.value = formatBanglaNumber(totalPaid.toFixed(2));
            }
        }

        function triggerMobileDocumentUpload() {
            const input = document.getElementById('mobileDocumentImage');
            if (input) input.click();
        }

        function previewMobileDocumentImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('mobileImagePreview');
                    const placeholder = document.getElementById('mobileImagePlaceholder');
                    if (preview && placeholder) {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none');
                        placeholder.classList.add('d-none');
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function updateMobileNoteCharCount(textarea) {
            const len = textarea.value.length;
            const bngLen = engToBanglaNum(len);
            textarea.placeholder = `বর্ণনা (${bngLen}/২৫০)`;
        }

        function syncMobileNoteToDesktop(val) {
            const desktopNote = document.getElementById('orderNote');
            if (desktopNote) {
                desktopNote.value = val;
            }
        }

        async function generateDynamicInvoiceNo() {
            try {
                const res = await axios.get("/api/next-invoice-no", HeaderToken());
                if (res.data.status === "success" && res.data.order_no) {
                    const el = document.getElementById("mobileInvoiceNo");
                    if (el) el.innerText = res.data.order_no;
                    return res.data.order_no;
                }
            } catch (e) {
                console.error("Failed to fetch next invoice number:", e);
            }

            const timestamp = Date.now().toString().slice(-5);
            const fallbackInv = '#InvID' + timestamp;
            const el = document.getElementById("mobileInvoiceNo");
            if (el) el.innerText = fallbackInv;
            return fallbackInv;
        }

        document.addEventListener('DOMContentLoaded', function() {
            generateDynamicInvoiceNo();
            renderMobilePaymentRows();
        });
    </script>

    @include('components.back-end.Product.product-create')
</body>

</html>
