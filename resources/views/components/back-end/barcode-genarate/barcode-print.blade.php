@extends('layouts.dashboard-sidenav')
@section('title', 'বারকোড প্রিন্ট ও জেনারেটর')
@section('content')

<style>
  /* ========================================================
     BARCODE GENERATE DESIGN SYSTEM
     Brand: Royal Purple (#8C56D4) with Full Dark Mode Support
     ======================================================== */
  :root {
    --primary-purple: #8C56D4;
    --primary-purple-hover: #793FC5;
    --primary-purple-light: #FAF7FD;
    --primary-purple-border: #E5D5F7;
    --card-border: #E2E8F0;
    --text-dark: #1e293b;
    --text-muted: #64748b;
  }

  .barcode-app-container {
    padding: 10px !important;
    max-width: 900px;
    margin: 0 auto;
    min-height: calc(100vh - 120px);
    position: relative;
    box-sizing: border-box;
  }

  /* View Containers */
  .barcode-view {
    display: none;
    animation: fadeInView 0.2s ease-in-out;
  }
  .barcode-view.active-view {
    display: block;
  }
  @keyframes fadeInView {
    from { opacity: 0; transform: translateY(4px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* Universal Sticky Top Bar */
  .barcode-topbar {
    position: sticky !important;
    top: 52px !important;
    z-index: 1020 !important;
    background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);
    color: #ffffff;
    border-radius: 12px;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 4px 14px rgba(140, 86, 212, 0.25);
    margin-bottom: 12px;
  }
  .barcode-topbar-title {
    font-size: 16px;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .barcode-topbar-btn {
    background: rgba(255, 255, 255, 0.18);
    border: none;
    color: #ffffff;
    width: 34px;
    height: 34px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 15px;
    transition: all 0.2s ease;
  }
  .barcode-topbar-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    color: #ffffff;
    transform: scale(1.05);
  }

  /* Grid Layout for History, List, and Generator on Tablet & Desktop (2 per row) */
  #barcodeHistoryList,
  #barcodeItemsContainer,
  #generatorProductList {
    display: grid;
    grid-template-columns: 1fr;
    gap: 10px;
  }

  @media (min-width: 768px) {
    #barcodeHistoryList,
    #barcodeItemsContainer,
    #generatorProductList {
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
      gap: 10px !important;
    }
  }

  /* Cards & Items */
  .barcode-card {
    background: #ffffff;
    border: 1px solid var(--card-border);
    border-radius: 10px;
    padding: 12px 14px;
    margin-bottom: 0px !important;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
    transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease;
    cursor: pointer;
    height: 100%;
    box-sizing: border-box;
  }
  .barcode-card:hover {
    border-color: #d1b7f3;
    box-shadow: 0 4px 12px rgba(140, 86, 212, 0.1);
  }

  /* History Card Layout */
  .history-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    border-left: 4px solid var(--primary-purple);
  }
  .history-date-col {
    min-width: 68px;
    text-align: left;
    border-right: 1px solid #f1f5f9;
    padding-right: 8px;
  }
  .history-date-day {
    font-size: 13.5px;
    font-weight: 700;
    color: #6366f1;
    line-height: 1.2;
  }
  .history-date-time {
    font-size: 11px;
    color: #818cf8;
  }
  .history-content-col {
    flex: 1;
    min-width: 0;
  }
  .history-title {
    font-size: 14.5px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 2px;
  }
  .history-copies {
    font-size: 13px;
    font-weight: 600;
    color: #475569;
    margin-bottom: 2px;
  }
  .history-meta {
    font-size: 11px;
    color: var(--text-muted);
  }
  .history-action-btn {
    background: #F3ECFB;
    color: #8C56D4;
    border: 1px solid #E5D5F7;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.2s ease;
    flex-shrink: 0;
  }
  .history-action-btn:hover {
    background: #8C56D4;
    color: #ffffff;
  }

  /* Floating Action Button */
  .barcode-fab-btn {
    position: fixed;
    bottom: 24px;
    right: 24px;
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);
    color: #ffffff;
    border: none;
    box-shadow: 0 6px 18px rgba(140, 86, 212, 0.45);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
    z-index: 1050;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .barcode-fab-btn:hover {
    transform: scale(1.08) rotate(90deg);
    box-shadow: 0 8px 24px rgba(140, 86, 212, 0.6);
    color: #ffffff;
  }

  /* Barcode List View */
  .barcode-item-card {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
  }
  .barcode-svg-wrap {
    background: #ffffff;
    padding: 4px 6px;
    border-radius: 8px;
    border: 1px dashed #cbd5e1;
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    max-width: 170px;
    overflow: hidden;
  }
  .barcode-svg-wrap svg {
    max-width: 100%;
    height: 38px;
    display: block;
  }

  /* Quantity Pill Counter */
  .qty-counter-pill {
    background: #8C56D4;
    color: #ffffff;
    border-radius: 30px;
    display: inline-flex;
    align-items: center;
    padding: 2px 4px;
    gap: 4px;
    box-shadow: 0 2px 8px rgba(140, 86, 212, 0.25);
  }
  .qty-btn {
    background: transparent;
    border: none;
    color: #ffffff;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.15s ease;
  }
  .qty-btn:hover {
    background: rgba(255, 255, 255, 0.25);
  }
  .qty-input {
    width: 32px;
    height: 24px;
    border: none;
    background: #ffffff;
    color: #1e293b;
    border-radius: 50%;
    text-align: center;
    font-size: 13px;
    font-weight: 700;
    outline: none;
    padding: 0;
  }

  /* Bottom Fixed Action Bar */
  .barcode-bottom-bar {
    position: sticky;
    bottom: 10px;
    left: 0;
    right: 0;
    z-index: 1040;
    margin-top: 14px;
  }
  .btn-barcode-main {
    width: 100%;
    height: 46px;
    border-radius: 10px;
    background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);
    color: #ffffff;
    font-weight: 700;
    font-size: 15px;
    border: none;
    box-shadow: 0 4px 16px rgba(140, 86, 212, 0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .btn-barcode-main:hover {
    background: linear-gradient(135deg, #793FC5 0%, #672EB0 100%);
    transform: translateY(-1px);
    color: #ffffff;
  }

  /* Generator Top Preview Box */
  .generator-preview-box {
    background: #ffffff;
    border: 1px solid var(--card-border);
    border-radius: 12px;
    padding: 14px;
    margin-bottom: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    text-align: center;
  }
  .generator-search-box {
    position: relative;
    margin-bottom: 10px;
  }
  .generator-search-input {
    width: 100%;
    height: 42px;
    border-radius: 10px;
    border: 1px solid var(--card-border);
    background: #ffffff;
    color: var(--text-dark);
    padding: 8px 14px 8px 38px;
    font-size: 14px;
    outline: none;
    transition: all 0.2s ease;
  }
  .generator-search-input:focus {
    border-color: #8C56D4;
    box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15);
  }
  .generator-search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 14px;
  }

  /* Product Pick List */
  .product-pick-card {
    background: #ffffff;
    border: 1px solid var(--card-border);
    border-radius: 8px;
    padding: 10px 14px;
    margin-bottom: 0px !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    transition: all 0.15s ease;
    height: 100%;
    box-sizing: border-box;
  }
  .product-pick-card:hover, .product-pick-card.active-picked {
    border-color: #8C56D4;
    background: #FAF7FD;
  }
  .product-pick-name {
    font-size: 14px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 2px;
  }
  .product-pick-price {
    font-size: 12px;
    color: var(--text-muted);
  }
  .product-pick-code {
    font-size: 12px;
    font-weight: 700;
    color: #8C56D4;
    text-align: right;
  }

  /* Print Preview Sheet Styling */
  .print-sheet-wrapper {
    background: #f1f5f9;
    padding: 10px !important;
    border-radius: 12px;
    margin-bottom: 12px;
    display: flex;
    justify-content: center;
    overflow-x: auto;
  }
  .print-sheet-paper {
    background: #ffffff;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    min-height: 800px;
    padding: 10px !important;
    box-sizing: border-box;
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    gap: 8px;
  }
  .print-sticker-cell {
    width: calc(25% - 6px);
    min-width: 125px;
    min-height: 75px;
    border: 1px dashed #cbd5e1;
    border-radius: 4px;
    padding: 4px 4px;
    text-align: center;
    background: #ffffff;
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    page-break-inside: avoid !important;
    break-inside: avoid !important;
  }
  .print-sticker-cell .store-title {
    font-size: 9.5px;
    font-weight: bold;
    color: #000000;
    margin-bottom: 1px;
    line-height: 1.1;
    max-width: 100%;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  .print-sticker-cell svg {
    max-width: 100%;
    height: 34px;
    display: block;
  }
  .print-sticker-cell .price-tag {
    font-size: 10px;
    font-weight: 800;
    color: #000000;
    margin-top: 1px;
    line-height: 1;
  }

  /* Print Bottom Toolbar */
  .print-toolbar {
    background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%);
    border-radius: 12px;
    padding: 8px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    color: #ffffff;
    box-shadow: 0 4px 14px rgba(140, 86, 212, 0.35);
  }
  .print-toolbar-btn {
    background: transparent;
    border: none;
    color: #ffffff;
    font-size: 18px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 12px;
    border-radius: 8px;
    transition: background 0.15s ease;
  }
  .print-toolbar-btn:hover {
    background: rgba(255, 255, 255, 0.2);
  }
  .print-paper-select {
    background: rgba(255, 255, 255, 0.18);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
    border-radius: 8px;
    padding: 6px 10px;
    font-size: 13px;
    font-weight: 600;
    outline: none;
    cursor: pointer;
  }
  .print-paper-select option {
    background: #1e293b;
    color: #ffffff;
  }

  /* ========================================================
     DARK MODE OVERRIDES
     ======================================================== */
  body[light-mode="dark"] .barcode-card,
  body[data-layout-mode="dark"] .barcode-card,
  body.dark-mode .barcode-card,
  body[light-mode="dark"] .generator-preview-box,
  body[data-layout-mode="dark"] .generator-preview-box,
  body.dark-mode .generator-preview-box,
  body[light-mode="dark"] .product-pick-card,
  body[data-layout-mode="dark"] .product-pick-card,
  body.dark-mode .product-pick-card {
    background-color: #1e293b !important;
    border: 1px solid #334155 !important;
    color: #f8fafc !important;
  }

  body[light-mode="dark"] .product-pick-card:hover,
  body[data-layout-mode="dark"] .product-pick-card:hover,
  body.dark-mode .product-pick-card:hover,
  body[light-mode="dark"] .product-pick-card.active-picked,
  body[data-layout-mode="dark"] .product-pick-card.active-picked,
  body.dark-mode .product-pick-card.active-picked {
    background-color: #0f172a !important;
    border-color: #8C56D4 !important;
  }

  body[light-mode="dark"] .history-title,
  body[data-layout-mode="dark"] .history-title,
  body.dark-mode .history-title,
  body[light-mode="dark"] .product-pick-name,
  body[data-layout-mode="dark"] .product-pick-name,
  body.dark-mode .product-pick-name {
    color: #f8fafc !important;
  }

  body[light-mode="dark"] .history-copies,
  body[data-layout-mode="dark"] .history-copies,
  body.dark-mode .history-copies {
    color: #cbd5e1 !important;
  }

  body[light-mode="dark"] .history-date-col,
  body[data-layout-mode="dark"] .history-date-col,
  body.dark-mode .history-date-col {
    border-color: #334155 !important;
  }

  body[light-mode="dark"] .history-action-btn,
  body[data-layout-mode="dark"] .history-action-btn,
  body.dark-mode .history-action-btn {
    background: rgba(140, 86, 212, 0.18) !important;
    border-color: rgba(140, 86, 212, 0.35) !important;
    color: #D2B7F1 !important;
  }

  body[light-mode="dark"] .generator-search-input,
  body[data-layout-mode="dark"] .generator-search-input,
  body.dark-mode .generator-search-input {
    background: #0f172a !important;
    border: 1px solid #334155 !important;
    color: #f8fafc !important;
  }

  body[light-mode="dark"] .barcode-svg-wrap,
  body[data-layout-mode="dark"] .barcode-svg-wrap,
  body.dark-mode .barcode-svg-wrap {
    background: #ffffff !important;
    border-color: #475569 !important;
  }

  body[light-mode="dark"] .print-sheet-wrapper,
  body[data-layout-mode="dark"] .print-sheet-wrapper,
  body.dark-mode .print-sheet-wrapper {
    background: #0f172a !important;
  }

  /* Print Media Query */
  @media print {
    @page {
      size: A4 portrait;
      margin: 10px !important;
    }
    html, body {
      background: #ffffff !important;
      padding: 0 !important;
      margin: 0 !important;
      width: 100% !important;
    }
    body * {
      visibility: hidden !important;
    }
    #printSheetPaper, #printSheetPaper * {
      visibility: visible !important;
    }
    #printSheetPaper {
      position: absolute !important;
      left: 0 !important;
      top: 0 !important;
      width: 100% !important;
      max-width: 100% !important;
      min-height: auto !important;
      padding: 10px !important;
      margin: 0 !important;
      box-shadow: none !important;
      background: #ffffff !important;
      display: flex !important;
      flex-wrap: wrap !important;
      align-content: flex-start !important;
      gap: 8px !important;
      page-break-inside: auto !important;
    }
    .print-sticker-cell {
      page-break-inside: avoid !important;
      break-inside: avoid !important;
      display: inline-flex !important;
      flex-direction: column !important;
      align-items: center !important;
      justify-content: center !important;
      margin-bottom: 6px !important;
    }
    .barcode-topbar, .barcode-bottom-bar, .barcode-fab-btn, .print-toolbar, .footer, #page-topbar, .vertical-menu, .navbar-header, .copyright {
      display: none !important;
    }
  }
</style>

<div class="main-content">
  <div class="page-content" style="padding-top: 52px !important;">
    <div class="barcode-app-container">

      <!-- ========================================================
           VIEW 1: বারকোড হিস্টোরি (Barcode History View)
           ======================================================== -->
      <div id="barcodeHistoryView" class="barcode-view active-view">
        <div class="barcode-topbar">
          <div class="d-flex align-items-center gap-2">
            <a href="{{ url('/admin-dashboard') }}" class="barcode-topbar-btn" title="ড্যাশবোর্ডে ফিরুন">
              <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h5 class="barcode-topbar-title">বারকোড হিস্টোরি</h5>
          </div>
          <button type="button" class="barcode-topbar-btn" onclick="switchView('barcodeListView')" title="বারকোড লিস্টে যান">
            <i class="fa-solid fa-list-check"></i>
          </button>
        </div>

        <!-- History List Container -->
        <div id="barcodeHistoryList">
          <!-- Dynamic history cards inserted here -->
        </div>

        <!-- Floating Add Barcode Button -->
        <button type="button" class="barcode-fab-btn" onclick="openBarcodeGeneratorView()" title="নতুন বারকোড তৈরি করুন">
          <i class="fa-solid fa-plus"></i>
        </button>
      </div>


      <!-- ========================================================
           VIEW 2: বারকোড লিস্ট (Barcode List View)
           ======================================================== -->
      <div id="barcodeListView" class="barcode-view">
        <div class="barcode-topbar">
          <div class="d-flex align-items-center gap-2">
            <button type="button" class="barcode-topbar-btn" onclick="switchView('barcodeHistoryView')" title="পেছনে যান">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <h5 class="barcode-topbar-title">বারকোড লিস্ট</h5>
          </div>
          <div class="d-flex align-items-center gap-2">
            <button type="button" class="barcode-topbar-btn" onclick="openBarcodeGeneratorView()" title="আরও প্রোডাক্ট যুক্ত করুন">
              <i class="fa-solid fa-plus"></i>
            </button>
            <button type="button" class="barcode-topbar-btn" onclick="deleteSelectedListItems()" title="নির্বাচিত পণ্য মুছুন">
              <i class="fa-solid fa-trash-can"></i>
            </button>
          </div>
        </div>

        <!-- Select All Row -->
        <div class="d-flex align-items-center justify-content-between p-2 mb-2 bg-light rounded-3 border" id="selectAllWrap" style="font-size: 13.5px;">
          <label class="d-flex align-items-center gap-2 m-0 cursor-pointer fw-semibold text-dark">
            <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll(this)" style="width: 17px; height: 17px; accent-color: #8C56D4;" checked />
            <span>সব নির্বাচন করুন</span>
          </label>
          <span class="badge" style="background: #F3ECFB; color: #8C56D4; font-size: 12px;" id="selectedCountBadge">০ টি নির্বাচিত</span>
        </div>

        <!-- Items Container -->
        <div id="barcodeItemsContainer">
          <!-- List of items to print inserted here -->
        </div>

        <!-- Bottom Print Button -->
        <div class="barcode-bottom-bar">
          <button type="button" class="btn-barcode-main" onclick="openPrintPreview()">
            <i class="fa-solid fa-print"></i>
            <span>প্রিন্ট</span>
          </button>
        </div>
      </div>


      <!-- ========================================================
           VIEW 3: বারকোড জেনারেটর (Barcode Generator View)
           ======================================================== -->
      <div id="barcodeGeneratorView" class="barcode-view">
        <div class="barcode-topbar">
          <div class="d-flex align-items-center gap-2">
            <button type="button" class="barcode-topbar-btn" onclick="switchView('barcodeHistoryView')" title="পেছনে যান">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <h5 class="barcode-topbar-title">বারকোড জেনারেটর</h5>
          </div>
          <button type="button" class="barcode-topbar-btn" onclick="focusSearchInput()" title="খুঁজুন">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>

        <!-- Top Active Product Preview Box (When a product is clicked) -->
        <div id="activeProductPreviewBox" class="generator-preview-box" style="display: none;">
          <h6 id="activePreviewProductName" class="fw-bold text-dark mb-2" style="font-size: 15px;">-</h6>
          <div class="barcode-svg-wrap mx-auto mb-3" style="max-width: 220px;">
            <svg id="activePreviewBarcodeSvg"></svg>
            <div id="activePreviewCodeText" class="small fw-bold text-dark mt-1" style="font-size: 12px; font-family: monospace;">-</div>
          </div>
          
          <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <div class="qty-counter-pill">
              <button type="button" class="qty-btn" onclick="adjustActivePreviewQty(-1)">-</button>
              <input type="text" id="activePreviewQtyInput" class="qty-input" value="1" readonly />
              <button type="button" class="qty-btn" onclick="adjustActivePreviewQty(1)">+</button>
            </div>
          </div>

          <button type="button" class="btn-barcode-main py-2" style="height: 42px;" onclick="addActiveProductToBarcodeList()">
            <i class="fa-solid fa-check"></i>
            <span>বারকোডে যুক্ত করুন</span>
          </button>
        </div>

        <!-- Live Search Box -->
        <div class="generator-search-box">
          <i class="fa-solid fa-magnifying-glass generator-search-icon"></i>
          <input type="text" id="generatorProductSearch" class="generator-search-input" placeholder="প্রোডাক্ট নাম বা কোড দিয়ে খুঁজুন..." oninput="filterGeneratorProducts()" />
        </div>

        <!-- Product Picker List -->
        <div id="generatorProductList">
          <div class="text-center py-4 text-muted">
            <div class="spinner-border spinner-border-sm text-primary me-1"></div> প্রোডাক্ট লোড হচ্ছে...
          </div>
        </div>
      </div>


      <!-- ========================================================
           VIEW 4: বারকোড প্রিন্ট প্রিভিউ (Print Sheet Preview View)
           ======================================================== -->
      <div id="barcodePrintSheetView" class="barcode-view">
        <div class="barcode-topbar">
          <div class="d-flex align-items-center gap-2">
            <button type="button" class="barcode-topbar-btn" onclick="switchView('barcodeListView')" title="পেছনে যান">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            <h5 class="barcode-topbar-title">বারকোড প্রিন্ট শিট</h5>
          </div>
          <button type="button" class="barcode-topbar-btn" onclick="window.print()" title="প্রিন্ট করুন">
            <i class="fa-solid fa-print"></i>
          </button>
        </div>

        <!-- Printable Paper Canvas -->
        <div class="print-sheet-wrapper">
          <div id="printSheetPaper" class="print-sheet-paper">
            <!-- Dynamic repeated stickers generated here -->
          </div>
        </div>

        <!-- Bottom Print Toolbar matching Image 5 -->
        <div class="print-toolbar">
          <button type="button" class="print-toolbar-btn" onclick="window.print()" title="প্রিন্ট করুন">
            <i class="fa-solid fa-print"></i>
          </button>
          
          <button type="button" class="print-toolbar-btn" onclick="saveAndSharePrintBatch()" title="সংরক্ষণ করুন">
            <i class="fa-solid fa-share-nodes"></i>
          </button>

          <select id="printPaperFormatSelect" class="print-paper-select" onchange="changePrintPaperLayout()">
            <option value="A4" selected>A4 (জেনারেল প্রিন্টার)</option>
            <option value="40x30">40 × 30 mm (থার্মাল)</option>
            <option value="38x25">38 × 25 mm</option>
            <option value="50x30">50 × 30 mm</option>
          </select>
        </div>
      </div>

      <!-- Copyright Footer -->
      <div class="copyright mt-4">
        <footer class="footer text-center py-3 text-muted small border-top">&copy; 2026 মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-success fw-bold text-decoration-none">CodeNext IT</a></footer>
      </div>

    </div>
  </div>
</div>

<!-- JSBarcode CDN -->
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

<script>
  // State Management
  let allRawProducts = [];
  let currentBarcodeList = [];
  let barcodeHistory = [];
  let activeSelectedProduct = null;
  let activeSelectedQty = 1;

  const STORAGE_KEY_LIST = 'anisstore_barcode_active_list';
  const STORAGE_KEY_HISTORY = 'anisstore_barcode_history';

  $(document).ready(function() {
    loadStoredData();
    fetchProductListForGenerator();
    renderHistoryView();
  });

  // Unique Product Barcode Resolver (Always returns valid distinct alphanumeric code)
  function getProductBarcode(product) {
    if (!product) return '700001';
    let raw = product.product_code || product.code;
    let extracted = '';
    if (raw) {
      try {
        let parsed = typeof raw === 'string' ? JSON.parse(raw) : raw;
        if (Array.isArray(parsed) && parsed.length > 0 && parsed[0]) {
          extracted = String(parsed[0]);
        } else if (parsed && typeof parsed !== 'object') {
          extracted = String(parsed);
        }
      } catch (e) {
        extracted = String(raw);
      }
    }

    let clean = '';
    if (typeof banglaToEngNum === 'function') {
      clean = banglaToEngNum(extracted);
    } else {
      clean = extracted;
    }
    clean = String(clean).replace(/[^a-zA-Z0-9\-_]/g, '').trim();

    if (!clean || clean.toLowerCase() === 'null' || clean.toLowerCase() === 'undefined' || clean.toLowerCase() === 'na') {
      let pid = parseInt(product.id) || 1;
      clean = String(700000 + pid);
    }
    return clean;
  }

  // Safe Barcode Drawing helper
  function drawBarcode(element, code, width = 1.6, height = 36, displayValue = false, fontSize = 10) {
    if (!element) return;
    let targetCode = String(code || '700001').trim();
    try {
      JsBarcode(element, targetCode, {
        format: "CODE128",
        lineColor: "#000000",
        width: width,
        height: height,
        displayValue: displayValue,
        fontSize: fontSize,
        textMargin: 1,
        margin: 0
      });
    } catch (err) {
      console.warn('JsBarcode CODE128 failed on ' + targetCode + ', attempting numeric fallback:', err);
      try {
        let numOnly = targetCode.replace(/[^0-9]/g, '') || '700001';
        JsBarcode(element, numOnly, {
          format: "CODE128",
          lineColor: "#000000",
          width: width,
          height: height,
          displayValue: displayValue,
          margin: 0
        });
      } catch (e2) {
        console.error('All barcode render attempts failed:', e2);
      }
    }
  }

  // Load persistence from LocalStorage
  function loadStoredData() {
    try {
      const savedHistory = localStorage.getItem(STORAGE_KEY_HISTORY);
      if (savedHistory) {
        barcodeHistory = JSON.parse(savedHistory);
      } else {
        barcodeHistory = [
          {
            id: Date.now() - 100000,
            dateStr: '21 Sep',
            timeStr: '01:21 PM',
            timestamp: Date.now() - 100000,
            productName: 'ghf',
            totalCopies: 4,
            paperFormat: '40 × 30 mm · A4 · জেনারেল প্রিন্টার',
            items: [{ id: 1, name: 'ghf', code: '75676', price: '6000.00', qty: 4, selected: true }]
          }
        ];
        localStorage.setItem(STORAGE_KEY_HISTORY, JSON.stringify(barcodeHistory));
      }

      const savedList = localStorage.getItem(STORAGE_KEY_LIST);
      if (savedList) {
        currentBarcodeList = JSON.parse(savedList);
      }
    } catch(e) {
      console.error('Storage error:', e);
    }
  }

  function saveHistoryToStorage() {
    localStorage.setItem(STORAGE_KEY_HISTORY, JSON.stringify(barcodeHistory));
  }

  function saveListToStorage() {
    localStorage.setItem(STORAGE_KEY_LIST, JSON.stringify(currentBarcodeList));
  }

  // Switch SPA Views
  function switchView(viewId) {
    $(".barcode-view").removeClass("active-view");
    $("#" + viewId).addClass("active-view");
    window.scrollTo({ top: 0, behavior: 'smooth' });

    if (viewId === 'barcodeHistoryView') {
      renderHistoryView();
    } else if (viewId === 'barcodeListView') {
      renderBarcodeListView();
    }
  }

  // ========================================================
  // VIEW 1: HISTORY LOGIC
  // ========================================================
  function renderHistoryView() {
    const container = $("#barcodeHistoryList");
    container.empty();

    if (!barcodeHistory || barcodeHistory.length === 0) {
      container.html(`
        <div class="text-center py-5 text-muted bg-white rounded-4 border p-4" style="grid-column: 1 / -1;">
          <i class="fa-solid fa-barcode fs-1 text-secondary mb-2"></i>
          <h6 class="fw-bold">কোন হিস্টোরি পাওয়া যায়নি</h6>
          <p class="small mb-3">নতুন বারকোড তৈরি করতে নিচের '+' বাটনে চাপ দিন</p>
          <button class="btn btn-sm text-white px-3 py-2 rounded-3" style="background:#8C56D4;" onclick="openBarcodeGeneratorView()">
            <i class="fa-solid fa-plus me-1"></i> নতুন বারকোড তৈরি করুন
          </button>
        </div>
      `);
      return;
    }

    barcodeHistory.forEach((hist, index) => {
      let displayName = hist.productName || 'বারকোড ব্যাচ';
      if (hist.items && hist.items.length > 1 && !displayName.includes('+')) {
        displayName = `${hist.items[0].name} (+${hist.items.length - 1} টি পণ্য)`;
      }

      let card = `
        <div class="barcode-card history-card" onclick="openHistoryRecord(${index})">
          <div class="history-date-col">
            <div class="history-date-day">${hist.dateStr}</div>
            <div class="history-date-time">${hist.timeStr}</div>
          </div>
          <div class="history-content-col">
            <div class="history-title text-truncate">${displayName}</div>
            <div class="history-copies">${engToBanglaNum(hist.totalCopies)} কপি</div>
            <div class="history-meta text-truncate">${hist.paperFormat || '40 × 30 mm · A4 · জেনারেল প্রিন্টার'}</div>
          </div>
          <button type="button" class="history-action-btn" onclick="event.stopPropagation(); directPrintHistory(${index})" title="প্রিন্ট করুন">
            <i class="fa-solid fa-print"></i>
          </button>
        </div>
      `;
      container.append(card);
    });
  }

  function openHistoryRecord(index) {
    const hist = barcodeHistory[index];
    if (hist && hist.items) {
      currentBarcodeList = JSON.parse(JSON.stringify(hist.items));
      saveListToStorage();
      switchView('barcodeListView');
    }
  }

  function directPrintHistory(index) {
    const hist = barcodeHistory[index];
    if (hist && hist.items) {
      currentBarcodeList = JSON.parse(JSON.stringify(hist.items));
      saveListToStorage();
      openPrintPreview();
    }
  }

  function clearAllHistory() {
    if (confirm("আপনি কি সমস্ত বারকোড হিস্টোরি মুছে ফেলতে চান?")) {
      barcodeHistory = [];
      saveHistoryToStorage();
      renderHistoryView();
    }
  }

  function openBarcodeGeneratorView() {
    switchView('barcodeGeneratorView');
    $("#activeProductPreviewBox").hide();
    activeSelectedProduct = null;
  }

  // ========================================================
  // VIEW 2: PRODUCT PICKER & GENERATOR
  // ========================================================
  async function fetchProductListForGenerator() {
    try {
      const res = await axios.get('/api/product-list', typeof HeaderToken === 'function' ? HeaderToken() : {});
      if (res.data && res.data.status === 'success') {
        allRawProducts = res.data.ProductData || res.data.data || [];
        renderGeneratorProductList(allRawProducts);
      } else {
        $("#generatorProductList").html('<div class="text-center py-4 text-danger fw-bold">⚠️ প্রোডাক্ট লোড করা সম্ভব হয়নি!</div>');
      }
    } catch(e) {
      console.error('Fetch products for generator error:', e);
      $("#generatorProductList").html('<div class="text-center py-4 text-danger fw-bold">⚠️ সমস্যা দেখা দিয়েছে!</div>');
    }
  }

  function renderGeneratorProductList(products) {
    const container = $("#generatorProductList");
    container.empty();

    if (!products || products.length === 0) {
      container.html('<div class="text-center py-4 text-muted">কোন প্রোডাক্ট পাওয়া যায়নি</div>');
      return;
    }

    products.forEach(p => {
      let code = getProductBarcode(p);
      let price = parseFloat(p.selling_price || p.sell_price || p.price || 0).toFixed(2);
      
      let card = `
        <div class="product-pick-card" onclick="selectProductForBarcode(${p.id})">
          <div>
            <div class="product-pick-name">${p.product_name || '-'}</div>
            <div class="product-pick-price">বিক্রয় মূল্য: ৳ ${engToBanglaNum(price)}</div>
          </div>
          <div>
            <div class="text-muted small text-end" style="font-size: 11px;">কোড</div>
            <div class="product-pick-code">${code}</div>
          </div>
        </div>
      `;
      container.append(card);
    });
  }

  function filterGeneratorProducts() {
    const query = ($("#generatorProductSearch").val() || "").toLowerCase().trim();
    if (!query) {
      renderGeneratorProductList(allRawProducts);
      return;
    }

    const filtered = allRawProducts.filter(p => {
      let name = (p.product_name || "").toLowerCase();
      let code = String(getProductBarcode(p)).toLowerCase();
      return name.includes(query) || code.includes(query);
    });
    renderGeneratorProductList(filtered);
  }

  function focusSearchInput() {
    $("#generatorProductSearch").focus();
  }

  function selectProductForBarcode(id) {
    const product = allRawProducts.find(p => p.id == id);
    if (!product) return;

    activeSelectedProduct = product;
    activeSelectedQty = 1;

    let code = getProductBarcode(product);
    $("#activePreviewProductName").text(product.product_name || '-');
    $("#activePreviewCodeText").text(code);
    $("#activePreviewQtyInput").val(activeSelectedQty);

    $("#activeProductPreviewBox").slideDown(200);

    // Draw active barcode dynamically
    const svgEl = document.getElementById("activePreviewBarcodeSvg");
    if (svgEl) {
      drawBarcode(svgEl, code, 1.8, 48, false);
    }

    $('html, body').animate({
      scrollTop: $("#activeProductPreviewBox").offset().top - 70
    }, 200);
  }

  function adjustActivePreviewQty(delta) {
    activeSelectedQty = Math.max(1, activeSelectedQty + delta);
    $("#activePreviewQtyInput").val(activeSelectedQty);
  }

  function addActiveProductToBarcodeList() {
    if (!activeSelectedProduct) return;

    let code = getProductBarcode(activeSelectedProduct);
    let price = parseFloat(activeSelectedProduct.selling_price || activeSelectedProduct.sell_price || activeSelectedProduct.price || 0).toFixed(2);

    let existingIndex = currentBarcodeList.findIndex(item => item.id == activeSelectedProduct.id);
    if (existingIndex > -1) {
      let existingItem = currentBarcodeList.splice(existingIndex, 1)[0];
      existingItem.qty += activeSelectedQty;
      existingItem.selected = true;
      currentBarcodeList.unshift(existingItem);
    } else {
      currentBarcodeList.unshift({
        id: activeSelectedProduct.id,
        name: activeSelectedProduct.product_name,
        code: code,
        price: price,
        qty: activeSelectedQty,
        selected: true
      });
    }

    saveListToStorage();
    if (typeof successToast === 'function') {
      successToast("বারকোড তালিকায় যুক্ত হয়েছে!");
    }

    switchView('barcodeListView');
  }

  // ========================================================
  // VIEW 3: BARCODE LIST LOGIC
  // ========================================================
  function renderBarcodeListView() {
    const container = $("#barcodeItemsContainer");
    container.empty();

    if (!currentBarcodeList || currentBarcodeList.length === 0) {
      container.html(`
        <div class="text-center py-5 text-muted bg-white rounded-4 border p-4" style="grid-column: 1 / -1;">
          <i class="fa-solid fa-list-check fs-1 text-secondary mb-2"></i>
          <h6 class="fw-bold">তালিকায় কোন বারকোড নেই</h6>
          <p class="small mb-3">প্রোডাক্ট যোগ করতে নিচে চাপ দিন</p>
          <button class="btn btn-sm text-white px-3 py-2 rounded-3" style="background:#8C56D4;" onclick="openBarcodeGeneratorView()">
            <i class="fa-solid fa-plus me-1"></i> বারকোড যুক্ত করুন
          </button>
        </div>
      `);
      updateSelectedCountUI();
      return;
    }

    currentBarcodeList.forEach((item, index) => {
      let isChecked = item.selected !== false;
      let card = `
        <div class="barcode-card barcode-item-card">
          <!-- Checkbox -->
          <input type="checkbox" class="barcode-item-checkbox" data-index="${index}" onchange="toggleItemSelect(${index}, this.checked)" ${isChecked ? 'checked' : ''} style="width: 18px; height: 18px; accent-color: #8C56D4; cursor: pointer; flex-shrink: 0;" />
          
          <!-- Middle: Name & Barcode SVG -->
          <div class="flex-grow-1 min-w-0">
            <div class="fw-bold text-dark text-truncate mb-1" style="font-size: 14px;">${item.name}</div>
            <div class="barcode-svg-wrap">
              <svg id="listBarcodeSvg_${index}"></svg>
              <div class="small fw-bold text-dark mt-0.5" style="font-size: 11px; font-family: monospace;">${item.code}</div>
            </div>
          </div>

          <!-- Right: Quantity Counter -->
          <div class="text-end flex-shrink-0">
            <div class="text-muted small mb-1" style="font-size: 11px;">কপি</div>
            <div class="qty-counter-pill">
              <button type="button" class="qty-btn" onclick="adjustItemQty(${index}, -1)">-</button>
              <input type="text" class="qty-input" value="${item.qty}" readonly />
              <button type="button" class="qty-btn" onclick="adjustItemQty(${index}, 1)">+</button>
            </div>
          </div>
        </div>
      `;
      container.append(card);

      // Render Barcode SVG immediately for this card
      const svgEl = document.getElementById("listBarcodeSvg_" + index);
      if (svgEl) {
        drawBarcode(svgEl, item.code, 1.6, 38, false);
      }
    });

    updateSelectedCountUI();
  }

  function adjustItemQty(index, delta) {
    if (currentBarcodeList[index]) {
      currentBarcodeList[index].qty = Math.max(1, currentBarcodeList[index].qty + delta);
      saveListToStorage();
      renderBarcodeListView();
    }
  }

  function toggleItemSelect(index, isChecked) {
    if (currentBarcodeList[index]) {
      currentBarcodeList[index].selected = isChecked;
      saveListToStorage();
      updateSelectedCountUI();
    }
  }

  function toggleSelectAll(masterCheckbox) {
    const isChecked = masterCheckbox.checked;
    currentBarcodeList.forEach(item => item.selected = isChecked);
    saveListToStorage();
    renderBarcodeListView();
  }

  function updateSelectedCountUI() {
    let selectedCount = currentBarcodeList.filter(item => item.selected !== false).length;
    let total = currentBarcodeList.length;
    $("#selectedCountBadge").text(`${engToBanglaNum(selectedCount)} টি নির্বাচিত`);
    $("#selectAllCheckbox").prop('checked', total > 0 && selectedCount === total);
  }

  function deleteSelectedListItems() {
    let toKeep = currentBarcodeList.filter(item => item.selected === false);
    if (toKeep.length === currentBarcodeList.length) {
      alert("মুছে ফেলার জন্য অন্তত একটি পণ্য নির্বাচন করুন!");
      return;
    }

    if (confirm("আপনি কি নির্বাচিত পণ্যগুলো তালিকা থেকে মুছে ফেলতে চান?")) {
      currentBarcodeList = toKeep;
      saveListToStorage();
      renderBarcodeListView();
    }
  }

  // ========================================================
  // VIEW 4: PRINT PREVIEW & GENERATION LOGIC
  // ========================================================
  function openPrintPreview() {
    let selectedItems = currentBarcodeList.filter(item => item.selected !== false);
    if (selectedItems.length === 0) {
      alert("প্রিন্ট করার জন্য অন্তত একটি প্রোডাক্ট নির্বাচন করুন!");
      return;
    }

    switchView('barcodePrintSheetView');
    renderPrintSheet(selectedItems);
    recordPrintHistory(selectedItems);
  }

  function renderPrintSheet(items) {
    const paper = $("#printSheetPaper");
    paper.empty();

    let stickerIndex = 0;
    items.forEach(item => {
      let copies = parseInt(item.qty) || 1;
      for (let i = 0; i < copies; i++) {
        let stickerId = `printSvg_${stickerIndex}`;
        let sticker = `
          <div class="print-sticker-cell">
            <div class="store-title">${item.name}</div>
            <svg id="${stickerId}"></svg>
            <div class="price-tag">৳ ${engToBanglaNum(item.price)}</div>
          </div>
        `;
        paper.append(sticker);

        const svgEl = document.getElementById(stickerId);
        if (svgEl) {
          drawBarcode(svgEl, item.code, 1.4, 32, true, 9);
        }

        stickerIndex++;
      }
    });
  }

  function recordPrintHistory(selectedItems) {
    const now = new Date();
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const dateStr = `${now.getDate()} ${months[now.getMonth()]}`;
    
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    const timeStr = `${hours}:${minutes} ${ampm}`;

    let totalCopies = selectedItems.reduce((acc, curr) => acc + (parseInt(curr.qty) || 1), 0);
    let primaryName = selectedItems[0] ? selectedItems[0].name : 'বারকোড প্রিন্ট';
    if (selectedItems.length > 1) {
      primaryName += ` (+${selectedItems.length - 1} টি পণ্য)`;
    }

    let historyItem = {
      id: Date.now(),
      dateStr: dateStr,
      timeStr: timeStr,
      timestamp: Date.now(),
      productName: primaryName,
      totalCopies: totalCopies,
      paperFormat: '40 × 30 mm · A4 · জেনারেল প্রিন্টার',
      items: JSON.parse(JSON.stringify(selectedItems))
    };

    barcodeHistory.unshift(historyItem);
    if (barcodeHistory.length > 50) barcodeHistory.pop();
    saveHistoryToStorage();
  }

  function changePrintPaperLayout() {
    const format = $("#printPaperFormatSelect").val();
    const paper = $("#printSheetPaper");

    if (format === '40x30' || format === '38x25' || format === '50x30') {
      paper.css({ 'max-width': '280px', 'justify-content': 'center' });
      $(".print-sticker-cell").css({ 'width': '100%', 'margin-bottom': '8px' });
    } else {
      paper.css({ 'max-width': '600px', 'justify-content': 'flex-start' });
      $(".print-sticker-cell").css({ 'width': 'calc(25% - 6px)', 'margin-bottom': '0px' });
    }
  }

  function saveAndSharePrintBatch() {
    if (typeof successToast === 'function') {
      successToast("বারকোড ব্যাচ সংরক্ষিত হয়েছে!");
    } else {
      alert("বারকোড ব্যাচ সংরক্ষিত হয়েছে!");
    }
  }
</script>

@endsection
