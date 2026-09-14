@extends('layouts.dashboard-sidenav')
@section('title', 'ড্যাশবোর্ড - মেসার্স আনিস ষ্টোর')
@section('content')

<!-- ApexCharts CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<style>
  /* Modern Custom Mobile & Responsive Styling - Exact Match to Reference UI */
  :root {
    --hishab-primary: #8C56D4;
    --hishab-primary-dark: #672EB0;
    --hishab-purple-gradient: linear-gradient(135deg, #672EB0 0%, #8C56D4 100%);
    --hishab-bg-card: #ffffff;
    --hishab-pill-bg: #f8fafc;
    --hishab-border-radius: 20px;
  }

  .border-white-20 {
    border-color: rgba(255, 255, 255, 0.22) !important;
  }

  /* Dashboard Filter Bar Styling */
  .filter-pills-wrapper {
    display: flex;
    align-items: center;
    gap: 8px;
    overflow-x: auto;
    scrollbar-width: none;
    -ms-overflow-style: none;
    padding-bottom: 2px;
    width: 100%;
  }
  .filter-pills-wrapper::-webkit-scrollbar {
    display: none;
  }

  .dashboard-filter-btn {
    background: #f1f5f9;
    color: #475569;
    border-radius: 20px;
    font-weight: 600;
    font-size: 13px;
    padding: 6px 16px;
    border: 1.5px solid #e2e8f0;
    transition: all 0.2s ease;
    white-space: nowrap;
    flex-shrink: 0;
  }

  .dashboard-filter-btn:hover {
    background: #e2e8f0;
    color: #1e293b;
  }

  .dashboard-filter-btn.active {
    background: #8C56D4;
    color: #ffffff;
    border-color: #8C56D4;
    box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25);
  }

  @media (max-width: 576px) {
    .hero-balance-card {
      padding: 16px 14px !important;
      border-radius: 20px !important;
    }
    .hero-balance-amount {
      font-size: 20px !important;
    }
    .subcard-val {
      font-size: 13px !important;
    }
    .subcard-label {
      font-size: 10px !important;
    }
    .custom-date-row {
      width: 100%;
    }
    .custom-date-input-wrap {
      flex: 1;
    }
    .custom-date-input-wrap input {
      width: 100% !important;
    }
  }

  /* Main Hero Balance Card ("হাতে আছে | ব্যাংকে আছে") */
  .hero-balance-card {
    background: var(--hishab-purple-gradient);
    border-radius: 24px;
    padding: 20px 22px;
    color: #ffffff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(140, 86, 212, 0.16);
    margin-bottom: 20px;
  }

  .hero-balance-card::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.08);
    pointer-events: none;
  }

  .hero-balance-label {
    font-size: 13px;
    font-weight: 600;
    opacity: 0.92;
    margin-bottom: 4px;
  }

  .hero-balance-amount {
    font-size: 24px;
    font-weight: 800;
    letter-spacing: -0.3px;
    margin-bottom: 0;
    line-height: 1.2;
  }

  .hero-subcards-row {
    background: #ffffff;
    border-radius: 16px;
    padding: 10px 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
  }

  .subcard-item {
    flex: 1;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 6px 8px;
    border-radius: 12px;
    background: #f8fafc;
  }

  .subcard-icon-down {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #dcfce7;
    color: #16a34a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    flex-shrink: 0;
  }

  .subcard-icon-up {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #fee2e2;
    color: #dc2626;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    flex-shrink: 0;
  }

  .subcard-label {
    font-size: 11px;
    color: #64748b;
    font-weight: 600;
    margin-bottom: 1px;
  }

  .subcard-val {
    font-size: 14px;
    font-weight: 800;
    color: #0f172a;
  }

  /* 2x2 Metric Grid Cards with Scooped Notch Icon Badges (Exact to Image 2) */
  .hishab-grid-card-overlap {
    background: #ffffff;
    border-radius: 20px;
    padding: 24px 14px 14px 14px;
    margin-top: 18px;
    position: relative;
    transition: all 0.25s ease;
    height: calc(100% - 18px);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
  }

  .card-due-border { border: 1.6px solid #ffa39e; }
  .card-payable-border { border: 1.6px solid #91caff; }
  .card-product-border { border: 1.6px solid #87e8de; }
  .card-party-border { border: 1.6px solid #ffe58f; }

  /* SVG Notch that creates the scooped dip under the circular icon */
  .card-notch-svg {
    position: absolute;
    top: -2px;
    left: 8px;
    width: 54px;
    height: 22px;
    z-index: 1;
    pointer-events: none;
  }
  .card-due-border .notch-curve { stroke: #ffa39e; }
  .card-payable-border .notch-curve { stroke: #91caff; }
  .card-product-border .notch-curve { stroke: #87e8de; }
  .card-party-border .notch-curve { stroke: #ffe58f; }
  .notch-mask { fill: #faf7fd; }

  .hishab-icon-overlap-badge {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    position: absolute;
    top: -18px;
    left: 16px;
    z-index: 2;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
    color: #ffffff !important;
  }

  .icon-due { background: linear-gradient(135deg, #ff7875 0%, #ff4d4f 100%) !important; }
  .icon-payable { background: linear-gradient(135deg, #69c0ff 0%, #1890ff 100%) !important; }
  .icon-product { background: linear-gradient(135deg, #5cdbd3 0%, #13c2c2 100%) !important; }
  .icon-party { background: linear-gradient(135deg, #ffd666 0%, #faad14 100%) !important; }

  .hishab-card-title {
    font-size: 13px;
    color: #64748b;
    font-weight: 600;
    margin-bottom: 4px;
  }

  .hishab-card-val {
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  /* List View Detailed Cards - Matching Image 2 soft square icons */
  .hishab-list-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 14px 18px;
    border: 1.5px solid #f1f5f9;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.2s ease;
    text-decoration: none !important;
  }

  .hishab-list-card:hover {
    background: #faf7fd;
    border-color: #E5D5F7;
    transform: translateX(3px);
  }

  .hishab-list-left {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .hishab-icon-badge {
    width: 44px;
    height: 44px;
    border-radius: 12px; /* Soft rounded square matching Image 2 */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
  }

  .icon-expense { background: #FFF1F0 !important; color: #FF4D4F !important; }
  .icon-stock { background: #E6F4FF !important; color: #1677FF !important; }
  .icon-valuation { background: #FFFBE6 !important; color: #FAAD14 !important; }

  .hishab-list-info .list-label {
    font-size: 13px;
    color: #64748b;
    font-weight: 600;
  }

  .hishab-list-info .list-val {
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
    margin-top: 2px;
  }

  .hishab-list-arrow {
    color: #8C56D4;
    font-size: 15px;
    transition: transform 0.2s ease;
  }

  .hishab-list-card:hover .hishab-list-arrow {
    transform: translateX(4px);
  }

  /* Sticky Bottom Action Navigation Bar with Curved Cutout Center (clip-path per Image 2) */
  .mobile-bottom-nav-wrapper {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1040;
    /* Soft shadow surrounding the entire clipped bar and circular scoop */
    filter: drop-shadow(0 -5px 16px rgba(140, 86, 212, 0.16)) drop-shadow(0 -2px 6px rgba(0, 0, 0, 0.05));
    pointer-events: none;
  }

  .mobile-bottom-nav-curved {
    position: relative;
    width: 100%;
    background: #ffffff;
    height: 74px;
    padding: 0 16px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    clip-path: url(#hishabBottomNavClip);
    -webkit-clip-path: url(#hishabBottomNavClip);
    pointer-events: auto;
  }

  .center-notch-spacer {
    width: 76px;
    height: 74px;
    flex-shrink: 0;
    pointer-events: none;
  }

  .btn-mobile-buy {
    background: linear-gradient(135deg, #a855f7 0%, #8C56D4 100%) !important;
    color: #ffffff !important;
    font-weight: 700;
    font-size: 15px;
    padding: 0 22px;
    border-radius: 28px;
    height: 44px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 3px 10px rgba(140, 86, 212, 0.25);
    text-decoration: none !important;
    border: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    min-width: 120px;
    justify-content: center;
  }
  .btn-mobile-buy:hover, .btn-mobile-buy:active {
    transform: scale(1.04);
    box-shadow: 0 4px 14px rgba(140, 86, 212, 0.35);
  }

  .btn-mobile-sell {
    background: linear-gradient(135deg, #38bdf8 0%, #2563eb 100%) !important;
    color: #ffffff !important;
    font-weight: 700;
    font-size: 15px;
    padding: 0 22px;
    border-radius: 28px;
    height: 44px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 3px 10px rgba(37, 99, 235, 0.25);
    text-decoration: none !important;
    border: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    min-width: 120px;
    justify-content: center;
  }
  .btn-mobile-sell:hover, .btn-mobile-sell:active {
    transform: scale(1.04);
    box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
  }

  .btn-mobile-plus-curved {
    position: absolute;
    left: 50%;
    top: -18px;
    transform: translateX(-50%);
    z-index: 1052;
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: #ffffff;
    border: 3.5px solid #d6bbfb;
    color: #8C56D4 !important;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    font-weight: 600;
    box-shadow: 0 5px 16px rgba(140, 86, 212, 0.28);
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    cursor: pointer;
    pointer-events: auto;
  }

  .btn-mobile-plus-curved:hover, .btn-mobile-plus-curved:active {
    transform: translateX(-50%) scale(1.08);
    border-color: #8C56D4;
    box-shadow: 0 8px 22px rgba(140, 86, 212, 0.38);
  }

  /* Desktop spacing adjustments */
  @media (min-width: 992px) {
    .mobile-bottom-nav-wrapper {
      position: static;
      filter: none;
      pointer-events: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 16px;
      margin-top: 15px;
    }
    .mobile-bottom-nav-curved {
      background: transparent;
      height: auto;
      padding: 0;
      clip-path: none !important;
      -webkit-clip-path: none !important;
      display: flex;
      justify-content: center;
      gap: 16px;
      width: auto;
    }
    .center-notch-spacer {
      display: none;
    }
    .btn-mobile-plus-curved {
      position: static;
      transform: none;
      width: 44px;
      height: 44px;
      font-size: 20px;
    }
    .btn-mobile-plus-curved:hover, .btn-mobile-plus-curved:active {
      transform: scale(1.08);
    }
  }

  @media (max-width: 991px) {
    .page-content {
      padding-bottom: 120px !important;
    }
  }

  /* Dashboard Table Card styling for Mobile & Tablet */
  .dashboard-table-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .dashboard-table-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(140, 86, 212, 0.12) !important;
  }

  /* Dark mode overrides */
  body[light-mode="dark"] .hishab-grid-card-overlap,
  body[light-mode="dark"] .hishab-list-card,
  body[data-layout-mode="dark"] .hishab-grid-card-overlap,
  body[data-layout-mode="dark"] .hishab-list-card {
    background: #1e293b !important;
    border-color: rgba(255, 255, 255, 0.08) !important;
  }

  body[light-mode="dark"] .notch-mask,
  body[data-layout-mode="dark"] .notch-mask {
    fill: #0f172a !important;
  }

  body[light-mode="dark"] .dashboard-table-card,
  body[data-layout-mode="dark"] .dashboard-table-card {
    background: #1e293b !important;
    border-color: #334155 !important;
  }

  body[light-mode="dark"] .hishab-card-val,
  body[light-mode="dark"] .hishab-list-info .list-val,
  body[data-layout-mode="dark"] .hishab-card-val,
  body[data-layout-mode="dark"] .hishab-list-info .list-val {
    color: #F3ECFB !important;
  }

  body[light-mode="dark"] .hero-subcards-row,
  body[data-layout-mode="dark"] .hero-subcards-row {
    background: #1e293b !important;
  }

  body[light-mode="dark"] .subcard-item,
  body[data-layout-mode="dark"] .subcard-item {
    background: #0f172a !important;
  }

  body[light-mode="dark"] .subcard-val,
  body[data-layout-mode="dark"] .subcard-val {
    color: #F3ECFB !important;
  }

  body[light-mode="dark"] .mobile-bottom-nav-curved,
  body[data-layout-mode="dark"] .mobile-bottom-nav-curved {
    background: #0f172a !important;
    border-top-color: #334155 !important;
  }

  body[light-mode="dark"] .btn-mobile-plus-curved,
  body[data-layout-mode="dark"] .btn-mobile-plus-curved {
    background: #1e293b !important;
    border-color: #672EB0 !important;
    color: #D2B7F1 !important;
  }
</style>

<!-- Main Dashboard Content Start -->
<div class="main-content">
  <div class="page-content">
    <div class="container-fluid px-0">

      <!-- DASHBOARD DATE FILTER BAR -->
      <div class="card border-0 shadow-sm rounded-4 mb-3" style="background: #ffffff;">
        <div class="card-body p-2 p-sm-3">
          <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center justify-content-between gap-2">
            
            <!-- Preset Filter Pills (Scrollable on Mobile) -->
            <div class="filter-pills-wrapper">
              <span class="fw-bold text-dark me-1 flex-shrink-0" style="font-size: 13px;">
                <i class="fa-solid fa-calendar-days text-success me-1"></i> ফিল্টার:
              </span>
              <button type="button" class="btn btn-sm dashboard-filter-btn active" id="btnFilterToday" onclick="setDashboardFilter('today')">আজ (Today)</button>
              <button type="button" class="btn btn-sm dashboard-filter-btn" id="btnFilter7days" onclick="setDashboardFilter('7days')">গত ৭ দিন</button>
              <button type="button" class="btn btn-sm dashboard-filter-btn" id="btnFilter30days" onclick="setDashboardFilter('30days')">গত ৩০ দিন</button>
              <button type="button" class="btn btn-sm dashboard-filter-btn" id="btnFilterCustom" onclick="setDashboardFilter('custom')">কাস্টম তারিখ</button>
            </div>

            <!-- Custom Date Inputs (Hidden by default, mobile responsive) -->
            <div id="customDateRangeBox" class="d-none flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2 custom-date-row mt-2 mt-md-0 ms-auto">
              <div class="d-flex align-items-center gap-1 custom-date-input-wrap">
                <span class="small text-muted fw-bold flex-shrink-0">শুরু:</span>
                <input type="date" id="dashStartDate" class="form-control form-control-sm rounded-3 shadow-none border" style="width: 140px;" value="{{ date('Y-m-d') }}">
              </div>
              <div class="d-flex align-items-center gap-1 custom-date-input-wrap">
                <span class="small text-muted fw-bold flex-shrink-0">শেষ:</span>
                <input type="date" id="dashEndDate" class="form-control form-control-sm rounded-3 shadow-none border" style="width: 140px;" value="{{ date('Y-m-d') }}">
              </div>
              <button type="button" class="btn btn-sm btn-success rounded-3 fw-bold px-3 py-1 flex-shrink-0" onclick="applyCustomDateFilter()">
                <i class="fa-solid fa-magnifying-glass me-1"></i> সার্চ
              </button>
            </div>

          </div>
        </div>
      </div>

      <!-- MAIN FINANCIAL METRICS SECTION -->
      <div id="adminOnlyFinancialSections">
        
        <!-- SECTION 1: SPLIT HERO CASH CARD ("হাতে আছে | ব্যাংকে আছে") -->
        <div class="hero-balance-card">
          <!-- Top Split Row: হাতে আছে | ব্যাংকে আছে -->
          <div class="d-flex align-items-center justify-content-between text-center pb-3 mb-3 border-bottom border-white-20">
            <div class="flex-fill pe-2 border-end border-white-20">
              <span class="hero-balance-label d-block mb-1">হাতে আছে</span>
              <div class="hero-balance-amount mb-0" id="hishabCashInHand">৳ ০.০০</div>
            </div>
            <div class="flex-fill ps-2">
              <div class="d-flex align-items-center justify-content-center gap-1">
                <span class="hero-balance-label mb-1">ব্যাংকে আছে</span>
                <i class="fa-regular fa-eye text-white-50 small" style="font-size: 11px;" title="ব্যালেন্স হাইড/শো"></i>
              </div>
              <div class="hero-balance-amount mb-0" id="hishabBankBalance">৳ ০.০০</div>
            </div>
          </div>

          <!-- Subcards: নগদ প্রাপ্তি & নগদ প্রদান -->
          <div class="hero-subcards-row">
            <div class="subcard-item">
              <div class="subcard-icon-down">↓</div>
              <div>
                <div class="subcard-label">নগদ প্রাপ্তি</div>
                <div class="subcard-val" id="hishabCashIn">৳ ০.০০</div>
              </div>
            </div>
            <div class="subcard-item">
              <div class="subcard-icon-up">↑</div>
              <div>
                <div class="subcard-label">নগদ প্রদান</div>
                <div class="subcard-val" id="hishabCashOut">৳ ০.০০</div>
              </div>
            </div>
          </div>
        </div>

        <!-- SVG Definitions for Curved Bottom Nav Clip-Path (Exact to Image 2) -->
        <svg width="0" height="0" class="position-absolute" style="pointer-events: none;">
          <defs>
            <clipPath id="hishabBottomNavClip" clipPathUnits="objectBoundingBox">
              <path d="M 0,0.22 
                       C 0,0.08 0.01,0 0.05,0 
                       L 0.36,0 
                       C 0.41,0 0.435,0.56 0.5,0.56 
                       C 0.565,0.56 0.59,0 0.64,0 
                       L 0.95,0 
                       C 0.99,0 1,0.08 1,0.22 
                       L 1,1 
                       L 0,1 Z" />
            </clipPath>
          </defs>
        </svg>

        <!-- SECTION 2: 2x2 PRIMARY METRICS GRID WITH SCOOPED NOTCH ICON BADGES (EXACT TO IMAGE 2) -->
        <div class="row g-3 mb-4 pt-2">
          <!-- Card 1: মোট পাওনা -->
          <div class="col-6 col-md-3">
            <a href="/admin-dashboard-customer-due-list" class="text-decoration-none">
              <div class="hishab-grid-card-overlap card-due-border">
                <svg class="card-notch-svg" viewBox="0 0 54 22" fill="none">
                  <path class="notch-mask" d="M 0,0 L 54,0 L 54,2 C 43,2 40,21 27,21 C 14,21 11,2 0,2 Z" />
                  <path class="notch-curve" d="M 0,2 C 11,2 14,21 27,21 C 40,21 43,2 54,2" stroke-width="1.8" />
                </svg>
                <div class="hishab-icon-overlap-badge icon-due shadow-sm">
                  <i class="fa-solid fa-receipt"></i>
                </div>
                <div class="hishab-card-title mt-2">
                  <span>মোট পাওনা <i class="fa-solid fa-circle-info text-muted" style="font-size: 11px;" title="কাস্টমারদের বকেয়া"></i></span>
                </div>
                <div class="hishab-card-val text-dark fs-6 mt-2">
                  <span id="hishabCustomerDue" class="fw-bold">৳ ০.০০</span>
                  <i class="fa-solid fa-arrow-right" style="color: #8C56D4; font-size: 15px;"></i>
                </div>
              </div>
            </a>
          </div>

          <!-- Card 2: মোট দেনা -->
          <div class="col-6 col-md-3">
            <a href="/supplier-due-page" class="text-decoration-none">
              <div class="hishab-grid-card-overlap card-payable-border">
                <svg class="card-notch-svg" viewBox="0 0 54 22" fill="none">
                  <path class="notch-mask" d="M 0,0 L 54,0 L 54,2 C 43,2 40,21 27,21 C 14,21 11,2 0,2 Z" />
                  <path class="notch-curve" d="M 0,2 C 11,2 14,21 27,21 C 40,21 43,2 54,2" stroke-width="1.8" />
                </svg>
                <div class="hishab-icon-overlap-badge icon-payable shadow-sm">
                  <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
                <div class="hishab-card-title mt-2">
                  <span>মোট দেনা <i class="fa-solid fa-circle-info text-muted" style="font-size: 11px;" title="সাপ্লায়ারদের দেনা"></i></span>
                </div>
                <div class="hishab-card-val text-dark fs-6 mt-2">
                  <span id="hishabSupplierPayable" class="fw-bold">৳ ০.০০</span>
                  <i class="fa-solid fa-arrow-right" style="color: #8C56D4; font-size: 15px;"></i>
                </div>
              </div>
            </a>
          </div>

          <!-- Card 3: পণ্য -->
          <div class="col-6 col-md-3">
            <a href="/admin-dashboard-product" class="text-decoration-none">
              <div class="hishab-grid-card-overlap card-product-border">
                <svg class="card-notch-svg" viewBox="0 0 54 22" fill="none">
                  <path class="notch-mask" d="M 0,0 L 54,0 L 54,2 C 43,2 40,21 27,21 C 14,21 11,2 0,2 Z" />
                  <path class="notch-curve" d="M 0,2 C 11,2 14,21 27,21 C 40,21 43,2 54,2" stroke-width="1.8" />
                </svg>
                <div class="hishab-icon-overlap-badge icon-product shadow-sm">
                  <i class="fa-solid fa-box-archive"></i>
                </div>
                <div class="hishab-card-title mt-2">
                  <span>পণ্য</span>
                </div>
                <div class="hishab-card-val text-dark fs-6 mt-2">
                  <span id="hishabTotalProducts" class="fw-bold">০</span>
                  <i class="fa-solid fa-arrow-right" style="color: #8C56D4; font-size: 15px;"></i>
                </div>
              </div>
            </a>
          </div>

          <!-- Card 4: পার্টি -->
          <div class="col-6 col-md-3">
            <a href="/admin-dashboard-customer" class="text-decoration-none">
              <div class="hishab-grid-card-overlap card-party-border">
                <svg class="card-notch-svg" viewBox="0 0 54 22" fill="none">
                  <path class="notch-mask" d="M 0,0 L 54,0 L 54,2 C 43,2 40,21 27,21 C 14,21 11,2 0,2 Z" />
                  <path class="notch-curve" d="M 0,2 C 11,2 14,21 27,21 C 40,21 43,2 54,2" stroke-width="1.8" />
                </svg>
                <div class="hishab-icon-overlap-badge icon-party shadow-sm">
                  <i class="fa-solid fa-users"></i>
                </div>
                <div class="hishab-card-title mt-2">
                  <span>পার্টি</span>
                </div>
                <div class="hishab-card-val text-dark fs-6 mt-2">
                  <span id="hishabTotalParties" class="fw-bold">০</span>
                  <i class="fa-solid fa-arrow-right" style="color: #8C56D4; font-size: 15px;"></i>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- SECTION 3: SECONDARY DETAILED LIST CARDS (IMAGE 2 EXACT) -->
        <div class="mb-4">
          <!-- List Item 1: মোট ব্যয়/খরচ -->
          <a href="/admin-dashboard-expence-list" class="hishab-list-card">
            <div class="hishab-list-left">
              <div class="hishab-icon-badge icon-expense mb-0">
                <i class="fa-solid fa-money-bill-transfer"></i>
              </div>
              <div class="hishab-list-info">
                <div class="list-label">মোট ব্যয়/খরচ</div>
                <div class="list-val text-dark" id="hishabTotalExpense">৳ ০.০০</div>
              </div>
            </div>
            <i class="fa-solid fa-chevron-right hishab-list-arrow"></i>
          </a>

          <!-- List Item 2: মোট স্টক -->
          <a href="/admin-dashboard-product" class="hishab-list-card">
            <div class="hishab-list-left">
              <div class="hishab-icon-badge icon-stock mb-0">
                <i class="fa-solid fa-cart-flatbed"></i>
              </div>
              <div class="hishab-list-info">
                <div class="list-label">মোট স্টক</div>
                <div class="list-val text-dark" id="hishabStockItems">০</div>
              </div>
            </div>
            <i class="fa-solid fa-chevron-right hishab-list-arrow"></i>
          </a>

          <!-- List Item 3: স্টক মূল্য -->
          <a href="/admin-dashboard-product" class="hishab-list-card">
            <div class="hishab-list-left">
              <div class="hishab-icon-badge icon-valuation mb-0">
                <i class="fa-solid fa-wallet"></i>
              </div>
              <div class="hishab-list-info">
                <div class="list-label">স্টক মূল্য</div>
                <div class="list-val text-dark" id="hishabStockValue">৳ ০.০০</div>
              </div>
            </div>
            <i class="fa-solid fa-chevron-right hishab-list-arrow"></i>
          </a>
        </div>

        <!-- HIDDEN BACKWARDS COMPATIBILITY METRIC HOLDERS -->
        <div class="d-none">
          <span id="todayNetProfit">৳ 0.00</span>
          <span id="todayTotalSales">৳ 0.00</span>
          <span id="todaySalesCountBadge">0 Invoices</span>
          <span id="todayCashCollection">৳ 0.00</span>
          <span id="todayExpense">৳ 0.00</span>
          <span id="monthlyNetProfit">৳ 0.00</span>
          <span id="monthlySales">৳ 0.00</span>
          <span id="monthlyCollection">৳ 0.00</span>
          <span id="monthlyPurchase">৳ 0.00</span>
          <span id="customerDue">৳ 0.00</span>
          <span id="supplierPayable">৳ 0.00</span>
          <span id="costStockValue">৳ 0.00</span>
          <span id="sellStockValue">৳ 0.00</span>
          <span id="productCountBadge">0 Items</span>
          <span id="lowStockBadge">0 Low Stock</span>
        </div>

        <!-- SECTION 4: GRAPHICAL ANALYTICS CHARTS -->
        <div class="row g-4 mb-4">
          <!-- Sales vs Net Profit Trend Chart -->
          <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
              <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <div>
                  <h5 class="fw-bold text-dark mb-0 fs-6">
                    <i class="fa-solid fa-chart-area text-success me-2"></i> বিক্রয় ও লাভের গ্রাফ (১৫ দিনের ট্রেন্ড)
                  </h5>
                  <small class="text-muted">দৈনিক বিক্রি ও নিট লাভের রিয়েল-টাইম ওভারভিউ</small>
                </div>
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 fw-bold rounded-pill">
                  Live
                </span>
              </div>
              <div class="card-body p-3">
                <div id="salesProfitChart" style="min-height: 320px;"></div>
              </div>
            </div>
          </div>

          <!-- Financial Distribution Donut Chart -->
          <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
              <div class="card-header bg-white py-3 border-0">
                <h5 class="fw-bold text-dark mb-0 fs-6">
                  <i class="fa-solid fa-chart-pie text-primary me-2"></i> আর্থিক হিসাবের অনুপাত
                </h5>
                <small class="text-muted">কালেকশন, বকেয়া পাওনা ও খরচের চিত্র</small>
              </div>
              <div class="card-body p-3 d-flex flex-column align-items-center justify-content-center">
                <div id="financialDonutChart" style="min-height: 300px; width: 100%;"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- SECTION 5: TABLES SECTION (Desktop Table >= 992px, Mobile & Tablet Box Cards < 992px) -->
        <div class="row g-4 mb-4">
          <!-- Low Stock Alerts Table -->
          <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
              <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">
                  <i class="fa-solid fa-triangle-exclamation text-danger me-2"></i> কম স্টক নোটিফিকেশন
                </h5>
                <a href="/admin-dashboard-product" class="btn btn-sm btn-outline-danger rounded-pill px-3">সকল স্টক</a>
              </div>
              <div class="card-body p-0">
                <!-- Desktop Table View (>= 992px) -->
                <div class="table-responsive d-none d-lg-block">
                  <table class="table align-middle table-hover mb-0" id="lowStockTable">
                    <thead class="bg-light">
                      <tr>
                        <th class="ps-4">প্রোডাক্টের নাম</th>
                        <th class="text-center">কোড</th>
                        <th class="text-center">স্টক</th>
                        <th class="text-end pe-4">অ্যাকশন</th>
                      </tr>
                    </thead>
                    <tbody id="lowStockTbody">
                      <tr><td colspan="4" class="text-center py-4 text-muted">স্টক লোড হচ্ছে...</td></tr>
                    </tbody>
                  </table>
                </div>

                <!-- Mobile & Tablet Responsive Box Cards (< 992px) - 1 per row on Mobile, 2 per row on Tab -->
                <div class="d-lg-none p-2 p-sm-3">
                  <div class="row g-2.5" id="lowStockMobileList">
                    <div class="col-12 text-center py-4 text-muted">স্টক লোড হচ্ছে...</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Recent Sales Table -->
          <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
              <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">
                  <i class="fa-solid fa-clock-rotate-left text-primary me-2"></i> সাম্প্রতিক বিক্রয় রসিদ
                </h5>
                <a href="/admin-dashboard-invoice" class="btn btn-sm btn-outline-primary rounded-pill px-3">সব ইনভয়েস</a>
              </div>
              <div class="card-body p-0">
                <!-- Desktop Table View (>= 992px) -->
                <div class="table-responsive d-none d-lg-block">
                  <table class="table align-middle table-hover mb-0" id="recentSalesTable">
                    <thead class="bg-light">
                      <tr>
                        <th class="ps-4">ইনভয়েস নং</th>
                        <th>কাস্টমার</th>
                        <th class="text-end">টাকা</th>
                        <th class="text-center pe-4">স্ট্যাটাস</th>
                      </tr>
                    </thead>
                    <tbody id="recentSalesTbody">
                      <tr><td colspan="4" class="text-center py-4 text-muted">সাম্প্রতিক বিক্রি লোড হচ্ছে...</td></tr>
                    </tbody>
                  </table>
                </div>

                <!-- Mobile & Tablet Responsive Box Cards (< 992px) - 1 per row on Mobile, 2 per row on Tab -->
                <div class="d-lg-none p-2 p-sm-3">
                  <div class="row g-2.5" id="recentSalesMobileList">
                    <div class="col-12 text-center py-4 text-muted">সাম্প্রতিক বিক্রি লোড হচ্ছে...</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- END MAIN FINANCIAL METRICS SECTION -->

      <!-- MOBILE BOTTOM FLOATING ACTION BAR WITH CENTER CURVED NOTCH (EXACT TO IMAGE 2) -->
      <div class="mobile-bottom-nav-wrapper">
        <div class="mobile-bottom-nav-curved">
          <a href="{{ url('admin-dashboard-Purchase') }}" class="btn-mobile-buy">
            <i class="fa-solid fa-hand-holding-dollar fs-5"></i>
            <span>কিনুন</span>
          </a>

          <!-- Center Notch Spacer to preserve flex spacing -->
          <div class="center-notch-spacer"></div>

          <a href="/admin-dashboard-pos" class="btn-mobile-sell">
            <i class="fa-solid fa-cash-register fs-5"></i>
            <span>বিক্রি করুন</span>
          </a>
        </div>

        <!-- Floating Elevated Center Plus Circle Button (Nested in Notch, 100% Unclipped) -->
        <button type="button" class="btn-mobile-plus-curved" data-bs-toggle="modal" data-bs-target="#quickActionModal" title="দ্রুত অ্যাকশন পপআপ">
          <i class="fa-solid fa-plus"></i>
        </button>
      </div>

      <!-- Footer copyright -->
      <div class="text-center text-muted py-3 border-top mt-4" style="font-size: 13px;">
        &copy; {{ date('Y') }} মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-success fw-bold text-decoration-none">CodeNext IT</a>
      </div>

    </div>
  </div>
</div>

<!-- QUICK ACTION BOTTOM SHEET MODAL POPUP -->
<style>
  /* Bottom Sheet Modal Styling */
  .modal.bottom-sheet .modal-dialog {
    position: fixed;
    margin: 0;
    width: 100%;
    max-width: 100%;
    bottom: 0;
    left: 0;
    right: 0;
  }

  .modal.bottom-sheet .modal-content {
    border-top-left-radius: 28px !important;
    border-top-right-radius: 28px !important;
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
    border: none;
    box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.25);
    padding: 16px 20px 32px 20px;
    max-height: 85vh;
    overflow-y: auto;
  }

  .quick-modal-handle {
    width: 44px;
    height: 5px;
    background: #cbd5e1;
    border-radius: 10px;
    margin: 0 auto 16px auto;
  }

  .quick-category-title {
    font-size: 14px;
    font-weight: 700;
    color: #6366f1;
    text-align: center;
    position: relative;
    margin: 18px 0 14px 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .quick-category-title::before,
  .quick-category-title::after {
    content: '';
    flex: 1;
    border-bottom: 1px dashed #cbd5e1;
    margin: 0 12px;
  }

  .quick-action-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none !important;
    color: #1e293b;
    padding: 10px 4px;
    border-radius: 14px;
    transition: all 0.2s ease;
  }

  .quick-action-item:hover {
    background: #f8fafc;
    transform: translateY(-2px);
  }

  .quick-action-icon-box {
    width: 54px;
    height: 54px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    margin-bottom: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  }

  .icon-sales-bg { background: #e0f2fe; color: #0284c7; }
  .icon-return-bg { background: #fee2e2; color: #dc2626; }
  .icon-collection-bg { background: #FAF7FD; color: #8C56D4; }

  .icon-buy-bg { background: #fef3c7; color: #d97706; }
  .icon-buy-return-bg { background: #F3ECFB; color: #793FC5; }
  .icon-payable-bg { background: #eff6ff; color: #2563eb; }

  .icon-order-bg { background: #e0e7ff; color: #4f46e5; }
  .icon-other-bg { background: #f3e8ff; color: #9333ea; }

  .quick-action-text {
    font-size: 13px;
    font-weight: 700;
    color: #334155;
    text-align: center;
  }
</style>

<div class="modal fade bottom-sheet" id="quickActionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="quick-modal-handle"></div>
      
      <!-- Category 1: বিক্রয় -->
      <div class="quick-category-title">বিক্রয়</div>
      <div class="row text-center g-3 mb-2">
        <div class="col-4">
          <a href="/admin-dashboard-pos" class="quick-action-item">
            <div class="quick-action-icon-box icon-sales-bg">
              <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <span class="quick-action-text">বিক্রয়</span>
          </a>
        </div>
        <div class="col-4">
          <a href="/admin-dashboard-return-list" class="quick-action-item">
            <div class="quick-action-icon-box icon-return-bg">
              <i class="fa-solid fa-arrow-rotate-left"></i>
            </div>
            <span class="quick-action-text">বিক্রি রিটার্ন</span>
          </a>
        </div>
        <div class="col-4">
          <a href="/customer-due-collection-page" class="quick-action-item">
            <div class="quick-action-icon-box icon-collection-bg">
              <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <span class="quick-action-text">বাকি আদায়</span>
          </a>
        </div>
      </div>

      <!-- Category 2: ক্রয় -->
      <div class="quick-category-title">ক্রয়</div>
      <div class="row text-center g-3 mb-2">
        <div class="col-4">
          <a href="/admin-dashboard-Purchase" class="quick-action-item">
            <div class="quick-action-icon-box icon-buy-bg">
              <i class="fa-solid fa-bag-shopping"></i>
            </div>
            <span class="quick-action-text">ক্রয়</span>
          </a>
        </div>
        <div class="col-4">
          <a href="/admin-dashboard-return-list" class="quick-action-item">
            <div class="quick-action-icon-box icon-buy-return-bg">
              <i class="fa-solid fa-truck-arrow-right"></i>
            </div>
            <span class="quick-action-text">ক্রয় রিটার্ন</span>
          </a>
        </div>
        <div class="col-4">
          <a href="/supplier-due-collection-page" class="quick-action-item">
            <div class="quick-action-icon-box icon-payable-bg">
              <i class="fa-solid fa-money-bill-wave"></i>
            </div>
            <span class="quick-action-text">বাকি পরিশোধ</span>
          </a>
        </div>
      </div>

      <!-- Category 3: অর্ডার -->
      <div class="quick-category-title">অর্ডার</div>
      <div class="row text-center g-3 mb-2">
        <div class="col-4">
          <a href="{{ url('admin-dashboard-invoice') }}" class="quick-action-item">
            <div class="quick-action-icon-box icon-order-bg">
              <i class="fa-solid fa-file-invoice"></i>
            </div>
            <span class="quick-action-text">বিক্রয় অর্ডার</span>
          </a>
        </div>
        <div class="col-4">
          <a href="{{ url('admin-dashboard-Purchase') }}" class="quick-action-item">
            <div class="quick-action-icon-box icon-order-bg">
              <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <span class="quick-action-text">ক্রয় অর্ডার</span>
          </a>
        </div>
      </div>

      <!-- Category 4: অন্যান্য -->
      <div class="quick-category-title">অন্যান্য</div>
      <div class="row text-center g-3">
        <div class="col-4">
          <a href="/admin-dashboard-expence-list" class="quick-action-item">
            <div class="quick-action-icon-box icon-return-bg">
              <i class="fa-solid fa-wallet"></i>
            </div>
            <span class="quick-action-text">ব্যয়/খরচ</span>
          </a>
        </div>
        <div class="col-4">
          <a href="/admin-dashboard-daily-ledger-report" class="quick-action-item">
            <div class="quick-action-icon-box icon-other-bg">
              <i class="fa-solid fa-calculator"></i>
            </div>
            <span class="quick-action-text">ক্যাশ মিলাই</span>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  let salesProfitChartInstance = null;
  let financialDonutChartInstance = null;
  let activeFilterType = 'today';

  document.addEventListener("DOMContentLoaded", async () => {
    loadDashboardData();
  });

  function setDashboardFilter(type) {
    activeFilterType = type;
    document.querySelectorAll('.dashboard-filter-btn').forEach(btn => btn.classList.remove('active'));
    
    const customBox = document.getElementById('customDateRangeBox');

    if (type === 'today') {
      document.getElementById('btnFilterToday')?.classList.add('active');
      if (customBox) { customBox.classList.add('d-none'); customBox.classList.remove('d-flex'); }
      loadDashboardData({ filter_type: 'today' });
    } else if (type === '7days') {
      document.getElementById('btnFilter7days')?.classList.add('active');
      if (customBox) { customBox.classList.add('d-none'); customBox.classList.remove('d-flex'); }
      loadDashboardData({ filter_type: '7days' });
    } else if (type === '30days') {
      document.getElementById('btnFilter30days')?.classList.add('active');
      if (customBox) { customBox.classList.add('d-none'); customBox.classList.remove('d-flex'); }
      loadDashboardData({ filter_type: '30days' });
    } else if (type === 'custom') {
      document.getElementById('btnFilterCustom')?.classList.add('active');
      if (customBox) { customBox.classList.remove('d-none'); customBox.classList.add('d-flex'); }
    }
  }

  function applyCustomDateFilter() {
    const startDate = document.getElementById('dashStartDate')?.value;
    const endDate = document.getElementById('dashEndDate')?.value;
    if (!startDate || !endDate) {
      if (typeof errorToast === "function") errorToast("দয়া করে শুরু ও শেষ তারিখ দিন!");
      return;
    }
    loadDashboardData({ filter_type: 'custom', start_date: startDate, end_date: endDate });
  }

  async function loadDashboardData(queryParams = {}) {
    try {
      if (typeof showLoader === "function") showLoader();

      const config = HeaderToken() || {};
      config.params = queryParams;

      const res = await axios.get("/api/dashboard-all-calculation", config);
      if (typeof hideLoader === "function") hideLoader();

      if (res.data && res.data.status === 'success') {
        const data = res.data;
        const today = data.today || {};
        const monthly = data.monthly || {};
        const financial = data.financial || {};
        const chart = data.chart || {};

        const userRole = (window.currentUserRole || localStorage.getItem('user_role') || '').toLowerCase();
        const isAdmin = (userRole === 'admin' || userRole === 'super_admin');

        if (document.getElementById('adminOnlyFinancialSections')) {
          document.getElementById('adminOnlyFinancialSections').style.display = isAdmin ? 'block' : 'none';
        }

        // --- 1. Populate HishabPati Main Cards ---
        const cashInHand = (financial.cash_in_hand !== undefined) ? financial.cash_in_hand : Math.max(0, (today.cash_collection || 0) - (today.expense || 0));
        document.getElementById('hishabCashInHand').innerText = formatBanglaAmount(cashInHand);
        if (document.getElementById('hishabBankBalance')) {
          document.getElementById('hishabBankBalance').innerText = formatBanglaAmount(financial.bank_balance || 0);
        }
        document.getElementById('hishabCashIn').innerText = formatBanglaAmount(today.cash_collection || 0);
        document.getElementById('hishabCashOut').innerText = formatBanglaAmount(today.cash_outflow || today.expense || 0);

        // --- 2. Populate 2x2 Metric Grid ---
        document.getElementById('hishabCustomerDue').innerText = formatBanglaAmount(financial.customer_due || 0);
        document.getElementById('hishabSupplierPayable').innerText = formatBanglaAmount(financial.supplier_payable || 0);
        document.getElementById('hishabTotalProducts').innerText = engToBanglaNum(financial.total_products || 0);
        
        const totalParties = financial.total_customers || 0;
        document.getElementById('hishabTotalParties').innerText = engToBanglaNum(totalParties);

        // --- 3. Populate Secondary Detailed List Cards ---
        document.getElementById('hishabTotalExpense').innerText = formatBanglaAmount(financial.total_expense || monthly.expense || today.expense || 0);
        document.getElementById('hishabStockItems').innerText = engToBanglaNum(financial.total_stock_qty || financial.total_products || 0);
        document.getElementById('hishabStockValue').innerText = formatBanglaAmount(financial.cost_stock_value || 0);

        // Populate Low Stock Badge Count in Header
        const notiBadge = document.getElementById('hishabNotiBadge');
        if (notiBadge) {
          if (financial.low_stock_count > 0) {
            notiBadge.innerText = engToBanglaNum(financial.low_stock_count);
            notiBadge.style.display = 'inline-block';
          } else {
            notiBadge.style.display = 'none';
          }
        }

        // --- 4. Backwards compatibility legacy bindings ---
        if (document.getElementById('todayNetProfit')) document.getElementById('todayNetProfit').innerText = '৳ ' + formatMoney(today.net_profit || 0);
        if (document.getElementById('todayTotalSales')) document.getElementById('todayTotalSales').innerText = '৳ ' + formatMoney(today.sales_amount || 0);
        if (document.getElementById('todayCashCollection')) document.getElementById('todayCashCollection').innerText = '৳ ' + formatMoney(today.cash_collection || 0);
        if (document.getElementById('todayExpense')) document.getElementById('todayExpense').innerText = '৳ ' + formatMoney(today.expense || 0);
        if (document.getElementById('customerDue')) document.getElementById('customerDue').innerText = '৳ ' + formatMoney(financial.customer_due || 0);
        if (document.getElementById('supplierPayable')) document.getElementById('supplierPayable').innerText = '৳ ' + formatMoney(financial.supplier_payable || 0);
        if (document.getElementById('costStockValue')) document.getElementById('costStockValue').innerText = '৳ ' + formatMoney(financial.cost_stock_value || 0);

        // --- 5. Render Interactive ApexCharts ---
        renderSalesProfitChart(chart.dates || [], chart.sales || [], chart.profits || []);
        renderFinancialDonutChart(
          parseFloat(monthly.cash_collection || 0),
          parseFloat(financial.customer_due || 0),
          parseFloat(monthly.expense || 0),
          parseFloat(monthly.net_profit || 0)
        );

        // --- 6. Low Stock Table & Mobile/Tablet Box Cards ---
        const lowStockTbody = document.getElementById('lowStockTbody');
        const lowStockMobileList = document.getElementById('lowStockMobileList');
        if (lowStockTbody || lowStockMobileList) {
          if (lowStockTbody) lowStockTbody.innerHTML = '';
          if (lowStockMobileList) lowStockMobileList.innerHTML = '';
          const lowStockList = data.low_stock_products || [];
          if (lowStockList.length === 0) {
            if (lowStockTbody) lowStockTbody.innerHTML = `<tr><td colspan="4" class="text-center py-4 text-success fw-bold"><i class="fa-solid fa-circle-check me-1"></i> সকল প্রোডাক্টের পর্যাপ্ত স্টক রয়েছে!</td></tr>`;
            if (lowStockMobileList) lowStockMobileList.innerHTML = `<div class="col-12 text-center py-4 text-success fw-bold"><i class="fa-solid fa-circle-check me-1"></i> সকল প্রোডাক্টের পর্যাপ্ত স্টক রয়েছে!</div>`;
          } else {
            lowStockList.forEach(item => {
              let code = item.product_code || 'N/A';
              if (Array.isArray(code)) code = code[0] || 'N/A';
              else if (typeof code === 'string' && code.startsWith('[')) {
                try { code = JSON.parse(code)[0]; } catch(e){}
              }

              // Desktop table row
              if (lowStockTbody) {
                const row = `
                  <tr>
                    <td class="ps-4 fw-bold text-dark">${item.product_name}</td>
                    <td class="text-center"><span class="badge bg-light text-dark border font-monospace">${code}</span></td>
                    <td class="text-center"><span class="badge bg-danger px-2 py-1 fw-bold">${engToBanglaNum(item.quantity)} ${item.unit || 'টি'}</span></td>
                    <td class="text-end pe-4">
                      <a href="/admin-dashboard-Purchase" class="btn btn-sm btn-outline-success rounded-pill px-2 py-1" title="ক্রয় করুন">
                        <i class="fa-solid fa-cart-plus me-1"></i> কিনুন
                      </a>
                    </td>
                  </tr>
                `;
                lowStockTbody.innerHTML += row;
              }

              // Mobile & Tablet Responsive Box Cards (1 per row on mobile col-12, 2 per row on tab col-md-6)
              if (lowStockMobileList) {
                const card = `
                  <div class="col-12 col-md-6 mb-2">
                    <div class="dashboard-table-card card border shadow-sm rounded-4 p-3 position-relative" style="border: 1.5px solid #FECACA !important; background: #ffffff;">
                      <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                        <div class="d-flex align-items-center gap-1.5 text-truncate pe-2">
                          <i class="fa-solid fa-box-open text-danger" style="font-size: 15px;"></i>
                          <h6 class="fw-bold text-dark mb-0 text-truncate" style="font-size: 14.5px;">${item.product_name}</h6>
                        </div>
                        <span class="badge bg-light text-dark border font-monospace" style="font-size: 11px;">${code}</span>
                      </div>
                      <div class="d-flex align-items-center justify-content-between pt-1">
                        <div>
                          <span class="d-block text-muted small fw-semibold" style="font-size: 11px;">বর্তমান স্টক</span>
                          <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 fw-bold" style="font-size: 13px;">
                            <i class="fa-solid fa-triangle-exclamation me-1"></i>${engToBanglaNum(item.quantity)} ${item.unit || 'টি'}
                          </span>
                        </div>
                        <a href="/admin-dashboard-Purchase" class="btn btn-sm btn-danger rounded-pill px-3 py-1.5 fw-bold shadow-sm" style="font-size: 12px;">
                          <i class="fa-solid fa-cart-plus me-1"></i> ক্রয় করুন
                        </a>
                      </div>
                    </div>
                  </div>
                `;
                lowStockMobileList.innerHTML += card;
              }
            });
          }
        }

        // --- 7. Recent Sales Table & Mobile/Tablet Box Cards ---
        const recentSalesTbody = document.getElementById('recentSalesTbody');
        const recentSalesMobileList = document.getElementById('recentSalesMobileList');
        if (recentSalesTbody || recentSalesMobileList) {
          if (recentSalesTbody) recentSalesTbody.innerHTML = '';
          if (recentSalesMobileList) recentSalesMobileList.innerHTML = '';
          const recentList = data.recent_invoices || [];
          if (recentList.length === 0) {
            if (recentSalesTbody) recentSalesTbody.innerHTML = `<tr><td colspan="4" class="text-center py-4 text-muted">কোনো সাম্প্রতিক বিক্রি পাওয়া যায়নি</td></tr>`;
            if (recentSalesMobileList) recentSalesMobileList.innerHTML = `<div class="col-12 text-center py-4 text-muted">কোনো সাম্প্রতিক বিক্রি পাওয়া যায়নি</div>`;
          } else {
            recentList.forEach(inv => {
              let statusBadge = inv.due_amount <= 0 ? '<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 fw-bold">পরিশোধিত</span>' :
                                (inv.paid_amount > 0 ? '<span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1 fw-bold">আংশিক</span>' : '<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 fw-bold">বকেয়া</span>');

              // Desktop table row
              if (recentSalesTbody) {
                const row = `
                  <tr>
                    <td class="ps-4"><a href="/invoice/${inv.id}" class="fw-bold text-success text-decoration-none">${inv.order_no}</a></td>
                    <td class="fw-semibold text-dark">${inv.customer_name}</td>
                    <td class="text-end fw-bold text-dark">${formatBanglaAmount(inv.grand_subtotal)}</td>
                    <td class="text-center pe-4">${statusBadge}</td>
                  </tr>
                `;
                recentSalesTbody.innerHTML += row;
              }

              // Mobile & Tablet Responsive Box Cards (1 per row on mobile col-12, 2 per row on tab col-md-6)
              if (recentSalesMobileList) {
                const card = `
                  <div class="col-12 col-md-6 mb-2">
                    <div class="dashboard-table-card card border shadow-sm rounded-4 p-3 position-relative" style="border: 1.5px solid #E5D5F7 !important; background: #ffffff; cursor: pointer;" onclick="window.location.href='/invoice/${inv.id}'">
                      <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
                        <span class="badge bg-light text-dark border fw-bold" style="font-size: 12px;">
                          <i class="fa-solid fa-file-invoice me-1 text-primary" style="color: #8C56D4 !important;"></i>${inv.order_no}
                        </span>
                        ${statusBadge}
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-1.5 text-truncate">
                          <i class="fa-solid fa-user-circle" style="color: #8C56D4; font-size: 14px;"></i>
                          <span class="fw-bold text-dark text-truncate" style="font-size: 14.5px;">${inv.customer_name || 'সাধারণ কাস্টমার'}</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                        <div>
                          <span class="d-block text-muted small fw-semibold" style="font-size: 11px;">মোট বিল</span>
                          <span class="fw-bold text-dark" style="font-size: 17.5px; font-weight: 800;">${formatBanglaAmount(inv.grand_subtotal)}</span>
                        </div>
                        <a href="/invoice/${inv.id}" class="btn btn-sm rounded-pill px-3 py-1 fw-bold" style="background: #F3ECFB; color: #8C56D4; font-size: 12px;" onclick="event.stopPropagation();">
                          রসিদ <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                `;
                recentSalesMobileList.innerHTML += card;
              }
            });
          }
        }

      } else {
        console.error("Dashboard calculation failed:", res.data);
      }

    } catch (e) {
      if (typeof hideLoader === "function") hideLoader();
      console.error("Error loading dashboard data:", e);
    }
  }

  // Render Area Trend Chart (Sales vs Profit)
  function renderSalesProfitChart(dates, sales, profits) {
    const userRole = (window.currentUserRole || '').toLowerCase();
    const isAdmin = (userRole === 'admin' || userRole === 'super_admin');

    let chartSeries = [{
      name: 'মোট বিক্রি (Total Sales)',
      data: sales
    }];
    let chartColors = ['#8C56D4'];

    if (isAdmin) {
      chartSeries.push({
        name: 'নিট লাভ (Net Profit)',
        data: profits
      });
      chartColors.push('#672EB0');
    }

    const options = {
      series: chartSeries,
      chart: {
        type: 'area',
        height: 320,
        toolbar: { show: false },
        fontFamily: 'Noto Sans Bengali, Poppins, sans-serif'
      },
      colors: chartColors,
      fill: {
        type: 'gradient',
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 0.45,
          opacityTo: 0.05,
          stops: [0, 90, 100]
        }
      },
      dataLabels: { enabled: false },
      stroke: {
        curve: 'smooth',
        width: 3
      },
      xaxis: {
        categories: dates,
        labels: {
          style: { colors: '#64748b', fontSize: '12px' }
        }
      },
      yaxis: {
        labels: {
          formatter: function (val) {
            return '৳ ' + engToBanglaNum(val.toLocaleString('en-IN'));
          },
          style: { colors: '#64748b', fontSize: '12px' }
        }
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return '৳ ' + engToBanglaNum(val.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
          }
        }
      },
      legend: {
        position: 'top',
        horizontalAlign: 'right',
        fontWeight: 600
      },
      grid: {
        borderColor: '#f1f5f9',
        strokeDashArray: 4
      }
    };

    if (salesProfitChartInstance) {
      salesProfitChartInstance.destroy();
    }
    salesProfitChartInstance = new ApexCharts(document.querySelector("#salesProfitChart"), options);
    salesProfitChartInstance.render();
  }

  // Render Financial Distribution Donut Chart
  function renderFinancialDonutChart(collections, dues, expenses, profit) {
    const userRole = (window.currentUserRole || '').toLowerCase();
    const isAdmin = (userRole === 'admin' || userRole === 'super_admin');

    let series = [collections, dues, expenses];
    let labels = ['মাসিক কালেকশন', 'কাস্টমার বকেয়া', 'মাসিক খরচ'];
    let colors = ['#7c3aed', '#ef4444', '#f59e0b'];

    if (isAdmin) {
      series.push(Math.max(0, profit));
      labels.push('নিট লাভ');
      colors.push('#16a34a');
    }

    const options = {
      series: series,
      labels: labels,
      chart: {
        type: 'donut',
        height: 300,
        fontFamily: 'Noto Sans Bengali, Poppins, sans-serif'
      },
      colors: colors,
      legend: {
        position: 'bottom',
        fontSize: '12px',
        fontWeight: 500
      },
      dataLabels: { enabled: false },
      plotOptions: {
        pie: {
          donut: {
            size: '70%',
            labels: {
              show: true,
              total: {
                show: true,
                label: 'মোট লেনদেন',
                formatter: function (w) {
                  const sum = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                  return '৳ ' + engToBanglaNum(sum.toLocaleString('en-IN'));
                }
              }
            }
          }
        }
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return '৳ ' + engToBanglaNum(val.toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
          }
        }
      }
    };

    if (financialDonutChartInstance) {
      financialDonutChartInstance.destroy();
    }
    financialDonutChartInstance = new ApexCharts(document.querySelector("#financialDonutChart"), options);
    financialDonutChartInstance.render();
  }

  function formatMoney(amount) {
    if (amount === null || isNaN(amount)) return "0.00";
    return parseFloat(amount).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
  }
</script>

@endsection