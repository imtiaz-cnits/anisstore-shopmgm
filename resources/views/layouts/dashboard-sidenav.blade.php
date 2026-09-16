<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>@yield('title') - মেসার্স আনিস ষ্টোর</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- App favicon -->
  <link rel="icon" type="image/png" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />
  <link rel="shortcut icon" type="image/png" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />
  <link rel="apple-touch-icon" href="{{ asset('back-end/assets/img/anis-store-icon.png') }}" />

  <!-- Google Fonts: Noto Sans Bengali & Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Bootstrap Css -->
  <link href="{{ asset('back-end/assets/css/vendor/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

  <!-- Tailwind CSS v4 -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Select2 CSS & JS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- HTML5 QR & Barcode Scanner Library -->
  <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

  <!-- SweetAlert2 Library -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Vanilla Datepicker -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css" />

  <!-- Project CSS -->
  <link href="{{ asset('back-end/assets/css/navbar-sidebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('back-end/assets/css/user-profile.css') }}" rel="stylesheet" />
  <link href="{{ asset('back-end/assets/css/all-modal.css') }}" rel="stylesheet" />
  <link href="{{ asset('back-end/assets/css/style.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('back-end/assets/css/dark-mode.css') }}" />
  <link rel="stylesheet" href="{{ asset('back-end/assets/css/table-funtion.css') }}" />

  <link href="{{ asset('back-end/assets/css/vendor/toastify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('back-end/assets/css/progress.css') }}" rel="stylesheet" />
  <link href="{{ asset('back-end/assets/css/vendor/animate.min.css') }}" rel="stylesheet" />

  <script src="{{ asset('back-end/assets/js/vendor/toastify-js.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/vendor/axios.min.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/config.js') }}"></script>

  <style>
    :root {
      --primary-font: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
    }
    body, html, button, input, select, textarea {
      font-family: 'Noto Sans Bengali', 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
    }

    /* Vibrant Colorful Royal Purple Mesh Gradient Theme for Sidebar (#8C56D4) */
    .vertical-menu {
      width: 250px !important;
      background: linear-gradient(165deg, #260B4A 0%, #3E1870 35%, #672EB0 70%, #8C56D4 100%) !important;
      border-right: 1px solid rgba(255, 255, 255, 0.12) !important;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.05) !important;
      display: flex !important;
      flex-direction: column !important;
      height: 100vh !important;
      overflow: hidden !important;
      z-index: 1099 !important;
      transition: width 0.22s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* Neutralize old page-content::after overlay completely */
    .page-content::after,
    body.sidebar-enable .page-content::after {
      display: none !important;
      content: none !important;
      width: 0 !important;
      height: 0 !important;
      opacity: 0 !important;
      visibility: hidden !important;
    }

    /* Dedicated Fullscreen Mobile Backdrop Overlay (strictly covers bottom floating nav 1040 and page content below topbar) */
    .sidebar-backdrop-overlay {
      display: none;
    }

    @media (max-width: 991.98px) {
      .sidebar-backdrop-overlay {
        display: block !important;
        position: fixed !important;
        top: 72px !important; /* Starts below the topbar so topbar has NO overlay */
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100vw !important;
        height: calc(100vh - 72px) !important;
        height: calc(100dvh - 72px) !important;
        background: rgba(15, 23, 42, 0.55) !important;
        backdrop-filter: blur(3px) !important;
        -webkit-backdrop-filter: blur(3px) !important;
        z-index: 1080 !important; /* Higher than floating bottom bar (1040/1060), below vertical-menu (1085) */
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none !important;
        transition: opacity 0.28s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.28s cubic-bezier(0.16, 1, 0.3, 1) !important;
      }

      body.sidebar-enable .sidebar-backdrop-overlay {
        opacity: 1 !important;
        visibility: visible !important;
        pointer-events: auto !important;
      }

      /* Keep topbar strictly above overlay so topbar remains 100% clear with NO dark overlay */
      #page-topbar,
      .isvertical-topbar {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 72px !important;
        z-index: 1090 !important; /* Above overlay (1080) */
      }

      /* Global Modal Backdrop & Dialog (Ensures modal overlay covers topbar and all elements on mobile/desktop) */
      .modal-backdrop {
        z-index: 2000 !important;
      }
      .modal {
        z-index: 2010 !important;
      }

      /* Mobile Offcanvas Sidebar: Synchronized slide-in transition with backdrop overlay */
      .vertical-menu {
        position: fixed !important;
        top: 72px !important;
        bottom: 0 !important;
        left: 0 !important;
        width: 260px !important;
        height: calc(100vh - 72px) !important;
        height: calc(100dvh - 72px) !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
        z-index: 1085 !important;
        overflow: hidden !important;
        transform: translate3d(-100%, 0, 0) !important;
        opacity: 0 !important;
        visibility: hidden !important;
        transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.28s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.28s cubic-bezier(0.16, 1, 0.3, 1) !important;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.06) !important;
      }

      body.sidebar-enable .vertical-menu {
        transform: translate3d(0, 0, 0) !important;
        opacity: 1 !important;
        visibility: visible !important;
      }

      .vertical-menu .navbar-brand-box {
        flex-shrink: 0 !important;
        height: 60px !important;
      }

      .vertical-menu #sidebar-slider-wrapper {
        flex: 1 1 0% !important;
        min-height: 0 !important;
        height: 100% !important;
        max-height: none !important;
        position: relative !important;
        overflow: hidden !important;
        width: 100% !important;
      }

      .vertical-menu #sidebar-main-panel,
      .vertical-menu .sidebar-submenu-panel {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100% !important;
        height: 100% !important;
        overflow-y: auto !important;
        overflow-x: hidden !important;
        -webkit-overflow-scrolling: touch !important;
        box-sizing: border-box !important;
      }

      /* Fixed bottom logout button with even, balanced bottom spacing on mobile */
      .vertical-menu .sidebar-bottom-logout {
        flex-shrink: 0 !important;
        position: sticky !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        width: 100% !important;
        height: auto !important;
        background: rgba(38, 11, 74, 0.98) !important;
        border-top: 1px solid rgba(229, 213, 247, 0.18) !important;
        box-shadow: 0 -1px 4px rgba(0, 0, 0, 0.04) !important;
        z-index: 30 !important;
        margin: 0 !important;
        padding: 12px 12px 12px 12px !important; /* Exact same gap top, bottom, left, right */
      }

      .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn {
        margin: 0 !important;
        width: 100% !important;
        padding: 9px 12px !important;
      }

      .rightbar-overlay,
      .sidebar-overlay {
        z-index: 1075 !important;
      }
    }

    /* Desktop Main Content & Topbar offset for 250px sidebar with smooth transition */
    @media (min-width: 992px) {
      .main-content {
        margin-left: 250px !important;
        transition: margin-left 0.22s cubic-bezier(0.4, 0, 0.2, 1) !important;
      }
      .isvertical-topbar,
      #page-topbar {
        left: 250px !important;
        transition: left 0.22s cubic-bezier(0.4, 0, 0.2, 1) !important;
      }
      body[data-sidebar-size="sm"] .main-content {
        margin-left: 64px !important;
      }
      body[data-sidebar-size="sm"] .isvertical-topbar,
      body[data-sidebar-size="sm"] #page-topbar {
        left: 64px !important;
      }
      /* Ensure desktop sidebar-enable doesn't shrink menu without data-sidebar-size=sm */
      body.sidebar-enable .vertical-menu {
        width: 250px !important;
      }
      body[data-sidebar-size="sm"].sidebar-enable .vertical-menu,
      body[data-sidebar-size="sm"] .vertical-menu {
        width: 64px !important;
      }
    }

    /* Compact Left/Right gap for sidebar items in desktop mode */
    .vertical-menu .sidebar-panel-scroll {
      padding-left: 7px !important;
      padding-right: 7px !important;
    }

    /* ========================================================
       Sidebar Menu Item Links & Buttons Color & Font Reset
       Strictly fixes browser/bootstrap visited purple/blue color
       ======================================================== */
    .vertical-menu .sidebar-item {
      margin: 5px 0 !important;
      padding: 0 4px !important;
      list-style: none !important;
      position: relative !important;
    }

    .vertical-menu .sidebar-link,
    .vertical-menu a.sidebar-link,
    .vertical-menu a.sidebar-link:link,
    .vertical-menu a.sidebar-link:visited,
    .vertical-menu a.sidebar-link:active,
    .vertical-menu a.sidebar-link:focus,
    .vertical-menu .sidebar-drilldown-trigger,
    .vertical-menu button.sidebar-drilldown-trigger,
    .vertical-menu .sidebar-submenu-panel a,
    .vertical-menu .sidebar-submenu-panel a:link,
    .vertical-menu .sidebar-submenu-panel a:visited,
    .vertical-menu .sidebar-flyout-link,
    .vertical-menu .sidebar-flyout-link:link,
    .vertical-menu .sidebar-flyout-link:visited {
      display: flex !important;
      align-items: center !important;
      justify-content: flex-start !important;
      color: #F3ECFB !important;
      text-decoration: none !important;
      padding: 9px 12px !important;
      gap: 10px !important;
      border: 1.5px solid transparent !important;
      border-radius: 12px !important;
      box-sizing: border-box !important;
      font-family: inherit !important;
      font-weight: 500 !important;
      width: 100% !important;
      min-height: 42px !important;
      overflow: hidden !important;
      transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    .vertical-menu .sidebar-drilldown-trigger,
    .vertical-menu button.sidebar-drilldown-trigger {
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
      width: 100% !important;
    }

    .vertical-menu .sidebar-drilldown-trigger > div {
      display: flex !important;
      align-items: center !important;
      gap: 10px !important;
      margin: 0 !important;
      padding: 0 !important;
      border: 0 !important;
      min-width: 0 !important;
      flex: 1 1 auto !important;
    }

    .vertical-menu .sidebar-arrow {
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      width: 22px !important;
      height: 22px !important;
      min-width: 22px !important;
      flex-shrink: 0 !important;
      border-radius: 6px !important;
      background: rgba(255, 255, 255, 0.12) !important;
      margin-left: auto !important;
    }

    .vertical-menu .sidebar-arrow i {
      font-size: 10px !important;
      color: rgba(255, 255, 255, 0.8) !important;
    }

    .vertical-menu .sidebar-label {
      display: inline-block !important;
      font-size: 13.5px !important;
      font-weight: 500 !important;
      letter-spacing: 0.2px !important;
      color: #F3ECFB !important;
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
    }

    .vertical-menu .sidebar-link .sidebar-label,
    .vertical-menu a.sidebar-link .sidebar-label,
    .vertical-menu a.sidebar-link:link .sidebar-label,
    .vertical-menu a.sidebar-link:visited .sidebar-label,
    .vertical-menu .sidebar-drilldown-trigger .sidebar-label,
    .vertical-menu .sidebar-submenu-panel a span,
    .vertical-menu .sidebar-submenu-panel a:visited span,
    .vertical-menu .sidebar-flyout-link span,
    .vertical-menu .sidebar-flyout-link:visited span {
      color: #F3ECFB !important;
    }

    .vertical-menu .sidebar-link > i,
    .vertical-menu a.sidebar-link > i,
    .vertical-menu a.sidebar-link:link > i,
    .vertical-menu a.sidebar-link:visited > i,
    .vertical-menu a.sidebar-link i,
    .vertical-menu a.sidebar-link:visited i,
    .vertical-menu .sidebar-drilldown-trigger > div > i {
      width: 24px !important;
      min-width: 24px !important;
      max-width: 24px !important;
      text-align: center !important;
      color: #D2B7F1 !important;
      flex-shrink: 0 !important;
      transition: all 0.2s ease !important;
    }

    .vertical-menu .sidebar-submenu-panel a i,
    .vertical-menu .sidebar-submenu-panel a:visited i,
    .vertical-menu .sidebar-flyout-link i,
    .vertical-menu .sidebar-flyout-link:visited i {
      width: 20px !important;
      min-width: 20px !important;
      max-width: 20px !important;
      text-align: center !important;
      color: #D2B7F1 !important;
    }

    /* Drilldown Trigger Button Reset */
    .vertical-menu button,
    .vertical-menu button.sidebar-drilldown-trigger {
      background: transparent !important;
      background-color: transparent !important;
      outline: none !important;
      box-shadow: none !important;
      -webkit-appearance: none !important;
      appearance: none !important;
      cursor: pointer !important;
      border-radius: 12px !important;
    }

    /* Hover State */
    .vertical-menu a.sidebar-link:hover,
    .vertical-menu button.sidebar-drilldown-trigger:hover,
    .vertical-menu .sidebar-submenu-panel a:hover,
    .vertical-menu .sidebar-flyout-link:hover {
      background: rgba(255, 255, 255, 0.15) !important;
      background-color: rgba(255, 255, 255, 0.15) !important;
      border: 1.5px solid rgba(255, 255, 255, 0.15) !important;
      border-radius: 12px !important;
      color: #ffffff !important;
    }

    .vertical-menu a.sidebar-link:hover .sidebar-label,
    .vertical-menu button.sidebar-drilldown-trigger:hover .sidebar-label,
    .vertical-menu .sidebar-submenu-panel a:hover span,
    .vertical-menu .sidebar-flyout-link:hover span {
      color: #ffffff !important;
    }

    .vertical-menu a.sidebar-link:hover i,
    .vertical-menu button.sidebar-drilldown-trigger:hover i,
    .vertical-menu .sidebar-submenu-panel a:hover i {
      color: #ffffff !important;
      transform: scale(1.12);
    }

    /* Active State Gradient Styling (#8C56D4 Purple Palette) */
    .vertical-menu .active-gradient,
    .vertical-menu a.sidebar-link.active-gradient,
    .vertical-menu a.sidebar-link.active-gradient:visited,
    .vertical-menu .active-parent,
    .vertical-menu button.sidebar-drilldown-trigger.active-parent {
      background: linear-gradient(135deg, #8C56D4 0%, #672EB0 100%) !important;
      background-color: #793FC5 !important;
      color: #ffffff !important;
      font-weight: 600 !important;
      border: 1.5px solid #B48BE8 !important;
      border-radius: 12px !important;
      box-shadow: 0 3px 10px rgba(140, 86, 212, 0.3) !important;
      width: 100% !important;
      display: flex !important;
      align-items: center !important;
    }

    .vertical-menu .active-gradient .sidebar-label,
    .vertical-menu a.sidebar-link.active-gradient .sidebar-label,
    .vertical-menu .active-parent .sidebar-label,
    .vertical-menu button.sidebar-drilldown-trigger.active-parent .sidebar-label {
      color: #ffffff !important;
    }

    .vertical-menu .active-gradient i,
    .vertical-menu a.sidebar-link.active-gradient i,
    .vertical-menu .active-parent i,
    .vertical-menu button.sidebar-drilldown-trigger.active-parent i {
      color: #ffffff !important;
      filter: drop-shadow(0 0 4px rgba(255, 255, 255, 0.6)) !important;
    }

    .vertical-menu .active-submenu-link,
    .vertical-menu .active-submenu-link:visited {
      background: linear-gradient(135deg, #8C56D4 0%, #672EB0 100%) !important;
      color: #ffffff !important;
      font-weight: 600 !important;
      border: 1.5px solid #B48BE8 !important;
      border-radius: 12px !important;
      box-shadow: 0 3px 10px rgba(140, 86, 212, 0.3) !important;
    }
    .vertical-menu .active-submenu-link span,
    .vertical-menu .active-submenu-link i {
      color: #ffffff !important;
    }

    body:not([data-sidebar-size="sm"]) .sidebar-back-wrapper {
      display: block !important;
      width: 100% !important;
      margin-bottom: 8px !important;
      padding: 0 !important;
      background: transparent !important;
    }

    body:not([data-sidebar-size="sm"]) .vertical-menu .sidebar-submenu-panel .sidebar-back-btn,
    body:not([data-sidebar-size="sm"]) .vertical-menu .sidebar-submenu-panel button.sidebar-back-btn,
    .vertical-menu button.sidebar-back-btn,
    .vertical-menu .sidebar-back-btn {
      width: 100% !important;
      min-width: 100% !important;
      max-width: 100% !important;
      height: auto !important;
      min-height: 42px !important;
      border: 1.5px solid #B48BE8 !important;
      background: linear-gradient(135deg, #8C56D4 0%, #672EB0 100%) !important;
      background-color: #8C56D4 !important;
      color: #ffffff !important;
      cursor: pointer !important;
      outline: none !important;
      gap: 10px !important;
      padding: 9px 14px !important;
      border-radius: 12px !important;
      box-sizing: border-box !important;
      box-shadow: 0 2px 8px rgba(140, 86, 212, 0.35) !important;
      transition: all 0.2s ease !important;
      display: flex !important;
      align-items: center !important;
      justify-content: flex-start !important;
    }

    body:not([data-sidebar-size="sm"]) .vertical-menu button.sidebar-back-btn:hover,
    body:not([data-sidebar-size="sm"]) .vertical-menu .sidebar-back-btn:hover,
    .vertical-menu button.sidebar-back-btn:hover,
    .vertical-menu .sidebar-back-btn:hover {
      background: linear-gradient(135deg, #793FC5 0%, #532391 100%) !important;
      background-color: #793FC5 !important;
      border-color: #FAF7FD !important;
      color: #ffffff !important;
      box-shadow: 0 4px 12px rgba(140, 86, 212, 0.5) !important;
      transform: translateY(-1px);
    }

    body:not([data-sidebar-size="sm"]) .vertical-menu button.sidebar-back-btn i,
    body:not([data-sidebar-size="sm"]) .vertical-menu .sidebar-back-btn i,
    .vertical-menu button.sidebar-back-btn i,
    .vertical-menu .sidebar-back-btn i {
      display: inline-block !important;
      width: 18px !important;
      height: auto !important;
      line-height: normal !important;
      text-align: center !important;
      font-size: 13px !important;
      margin: 0 !important;
      color: #ffffff !important;
    }

    body:not([data-sidebar-size="sm"]) .vertical-menu button.sidebar-back-btn span,
    body:not([data-sidebar-size="sm"]) .vertical-menu .sidebar-back-btn span,
    .vertical-menu button.sidebar-back-btn span,
    .vertical-menu .sidebar-back-btn span {
      display: inline-block !important;
      color: #ffffff !important;
      font-weight: 600 !important;
      font-size: 13.5px !important;
      opacity: 1 !important;
      visibility: visible !important;
      width: auto !important;
      height: auto !important;
      margin: 0 !important;
    }

    .vertical-menu .navbar-brand-box {
      padding: 0 10px !important;
    }

    .vertical-menu .sidebar-bottom-logout {
      padding: 8px 9px !important;
    }

    .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn {
      padding: 7.5px 9px !important;
    }

    /* Prevent Duplicate Logo on Topbar on Desktop */
    #page-topbar .navbar-brand-box {
      display: none !important;
    }

    @media (min-width: 992px) {
      #page-topbar .vertical-menu-btn {
        margin-left: 1rem !important;
      }
    }

    /* Hide any collapse button on sidebar itself */
    .vertical-menu .vertical-menu-btn,
    .vertical-menu .vertical-menu-btn2 {
      display: none !important;
    }

    /* Stylish Modern Vertical Menu Toggle Button on Topbar (#8C56D4) */
    #page-topbar .vertical-menu-btn {
      width: 38px !important;
      height: 38px !important;
      border-radius: 10px !important;
      background: #F3ECFB !important;
      border: 1px solid #F3ECFB !important;
      color: #8C56D4 !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      padding: 0 !important;
      box-shadow: 0 1px 3px rgba(140, 86, 212, 0.08) !important;
      transition: all 0.22s ease-in-out !important;
    }

    #page-topbar .vertical-menu-btn i {
      font-size: 17px !important;
      color: #8C56D4 !important;
      transition: all 0.22s ease-in-out !important;
    }

    #page-topbar .vertical-menu-btn:hover {
      background: #F3ECFB !important;
      border-color: #D2B7F1 !important;
      transform: scale(1.05);
    }

    #page-topbar .vertical-menu-btn:hover i {
      color: #672EB0 !important;
    }

    body[light-mode="dark"] #page-topbar .vertical-menu-btn {
      background: #1e293b !important;
      border-color: #334155 !important;
      color: #B48BE8 !important;
      box-shadow: none !important;
    }

    body[light-mode="dark"] #page-topbar .vertical-menu-btn i {
      color: #B48BE8 !important;
    }

    body[light-mode="dark"] #page-topbar .vertical-menu-btn:hover {
      background: #334155 !important;
    }

    /* Dynamic Topbar Back Button */
    #page-topbar .topbar-back-btn {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      gap: 6px !important;
      height: 30px !important;
      padding: 0 12px !important;
      margin-left: 8px !important;
      border-radius: 8px !important;
      background: #F3ECFB !important;
      border: 1px solid #F3ECFB !important;
      color: #8C56D4 !important;
      font-size: 12.5px !important;
      font-weight: 600 !important;
      text-decoration: none !important;
      box-shadow: 0 1px 3px rgba(140, 86, 212, 0.08) !important;
      transition: all 0.22s ease-in-out !important;
      white-space: nowrap !important;
      cursor: pointer !important;
    }
    #page-topbar .topbar-back-btn i {
      font-size: 11px !important;
      color: #8C56D4 !important;
    }
    #page-topbar .topbar-back-btn:hover {
      background: #F3ECFB !important;
      border-color: #D2B7F1 !important;
      color: #672EB0 !important;
      transform: scale(1.03) !important;
      box-shadow: 0 2px 6px rgba(140, 86, 212, 0.15) !important;
    }
    #page-topbar .topbar-back-btn:hover i {
      color: #672EB0 !important;
    }
    body[light-mode="dark"] #page-topbar .topbar-back-btn {
      background: #1e293b !important;
      border-color: #334155 !important;
      color: #B48BE8 !important;
    }
    body[light-mode="dark"] #page-topbar .topbar-back-btn i {
      color: #B48BE8 !important;
    }
    body[light-mode="dark"] #page-topbar .topbar-back-btn:hover {
      background: #334155 !important;
      color: #D2B7F1 !important;
    }

    /* Stylish Modern Home Button on Topbar */
    #page-topbar .topbar-home-btn {
      width: 38px !important;
      height: 38px !important;
      border-radius: 10px !important;
      background: #F3ECFB !important;
      border: 1px solid #F3ECFB !important;
      color: #8C56D4 !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      padding: 0 !important;
      box-shadow: 0 1px 3px rgba(140, 86, 212, 0.08) !important;
      transition: all 0.22s ease-in-out !important;
      text-decoration: none !important;
      cursor: pointer !important;
    }

    #page-topbar .topbar-home-btn i {
      font-size: 16px !important;
      color: #8C56D4 !important;
      transition: all 0.22s ease-in-out !important;
    }

    #page-topbar .topbar-home-btn:hover {
      background: #F3ECFB !important;
      border-color: #D2B7F1 !important;
      color: #672EB0 !important;
      transform: scale(1.05);
    }

    #page-topbar .topbar-home-btn:hover i {
      color: #672EB0 !important;
    }

    body[light-mode="dark"] #page-topbar .topbar-home-btn {
      background: #1e293b !important;
      border-color: #334155 !important;
      color: #B48BE8 !important;
      box-shadow: none !important;
    }

    body[light-mode="dark"] #page-topbar .topbar-home-btn i {
      color: #B48BE8 !important;
    }

    body[light-mode="dark"] #page-topbar .topbar-home-btn:hover {
      background: #334155 !important;
    }

    /* Sidebar Logo Header */
    .vertical-menu .navbar-brand-box {
      position: relative !important;
      top: auto !important;
      left: auto !important;
      right: auto !important;
      width: 100% !important;
      background: rgba(38, 11, 74, 0.98) !important;
      border-bottom: 1px solid rgba(229, 213, 247, 0.12) !important;
      height: 72px !important;
      display: flex !important;
      align-items: center !important;
      padding: 0 14px !important;
      box-shadow: none !important;
      flex-shrink: 0 !important;
    }

    /* Expanded Sidebar Logo Rules */
    .vertical-menu .navbar-brand-box .logo-sm,
    .vertical-menu .navbar-brand-box .logo-sm2 {
      display: none !important;
    }

    .vertical-menu .navbar-brand-box .logo-lg {
      display: flex !important;
      align-items: center !important;
    }

    /* Collapsed Sidebar Logo Rules */
    body[data-sidebar-size="sm"] .vertical-menu .navbar-brand-box {
      width: 70px !important;
      padding: 0 !important;
      justify-content: center !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .navbar-brand-box .logo-lg {
      display: none !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .navbar-brand-box .logo-sm {
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      margin: 0 auto !important;
    }

    /* Modern Sliding Drilldown Sidebar Styles */
    .vertical-menu #sidebar-slider-wrapper {
      flex: 1 1 auto !important;
      height: calc(100vh - 138px) !important;
      max-height: calc(100vh - 138px) !important;
      width: 100% !important;
      position: relative !important;
      overflow: hidden !important;
    }

    body:not([data-sidebar-size="sm"]) .vertical-menu #sidebar-main-panel,
    body:not([data-sidebar-size="sm"]) .vertical-menu .sidebar-submenu-panel {
      position: absolute !important;
      top: 0 !important;
      left: 0 !important;
      right: 0 !important;
      bottom: 0 !important;
      width: 100% !important;
      height: 100% !important;
      overflow-y: auto !important;
      overflow-x: hidden !important;
      -webkit-overflow-scrolling: touch !important;
      box-sizing: border-box !important;
      transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.2s ease, visibility 0.28s !important;
    }

    .vertical-menu .sidebar-panel-scroll {
      scrollbar-width: thin !important;
      scrollbar-color: rgba(255, 255, 255, 0.2) transparent !important;
    }

    .vertical-menu .sidebar-panel-scroll::-webkit-scrollbar {
      width: 4px !important;
    }

    .vertical-menu .sidebar-panel-scroll::-webkit-scrollbar-track {
      background: transparent !important;
    }

    .vertical-menu .sidebar-panel-scroll::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.25) !important;
      border-radius: 4px !important;
    }

    .vertical-menu .sidebar-panel-scroll::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.45) !important;
    }

    /* Strict Transitions & Visibility for sliding panels */
    #sidebar-main-panel.translate-x-0 {
      transform: translateX(0) !important;
      opacity: 1 !important;
      visibility: visible !important;
      pointer-events: auto !important;
      z-index: 10 !important;
    }
    #sidebar-main-panel.-translate-x-full {
      transform: translateX(-100%) !important;
      opacity: 0 !important;
      visibility: hidden !important;
      pointer-events: none !important;
      z-index: 1 !important;
    }
    .sidebar-submenu-panel.translate-x-full {
      transform: translateX(100%) !important;
      opacity: 0 !important;
      visibility: hidden !important;
      pointer-events: none !important;
      z-index: 1 !important;
    }
    .sidebar-submenu-panel.translate-x-0 {
      transform: translateX(0) !important;
      opacity: 1 !important;
      visibility: visible !important;
      pointer-events: auto !important;
      z-index: 20 !important;
    }

    /* Default (Expanded) rules for flyouts and tooltips */
    body:not([data-sidebar-size="sm"]) .sidebar-flyout,
    body:not([data-sidebar-size="sm"]) .sidebar-mini-tooltip {
      display: none !important;
      opacity: 0 !important;
      visibility: hidden !important;
      pointer-events: none !important;
    }

    /* Collapsed Sidebar (sm) Rules - Desktop Vertical Scroll Support */
    body[data-sidebar-size="sm"] .vertical-menu {
      width: 64px !important;
      height: 100vh !important;
      display: flex !important;
      flex-direction: column !important;
      overflow: hidden !important;
      z-index: 1099 !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu #sidebar-slider-wrapper {
      flex: 1 1 0 !important;
      min-height: 0 !important;
      height: calc(100vh - 72px - 56px) !important;
      max-height: calc(100vh - 72px - 56px) !important;
      overflow-y: auto !important;
      overflow-x: hidden !important;
      scrollbar-width: none !important;
      -ms-overflow-style: none !important;
    }
    body[data-sidebar-size="sm"] .vertical-menu #sidebar-slider-wrapper::-webkit-scrollbar {
      display: none !important;
      width: 0 !important;
      height: 0 !important;
    }

    body[data-sidebar-size="sm"] #sidebar-main-panel,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel {
      width: 64px !important;
      height: auto !important;
      min-height: 100% !important;
      overflow-y: visible !important;
      overflow-x: hidden !important;
      position: relative !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      padding-top: 6px !important;
      padding-bottom: 12px !important;
    }

    body[data-sidebar-size="sm"] .sidebar-panel-scroll {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .navbar-brand-box {
      width: 64px !important;
      height: 72px !important;
      flex-shrink: 0 !important;
      padding: 0 !important;
      justify-content: center !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .navbar-brand-box .logo-sm img {
      width: 32px !important;
      height: 32px !important;
    }

    /* Sm mode: Main panel visible only when active */
    body[data-sidebar-size="sm"] #sidebar-main-panel.translate-x-0 {
      display: block !important;
      transform: none !important;
      translate: 0 0 !important;
      --tw-translate-x: 0px !important;
      left: 0 !important;
      right: 0 !important;
      pointer-events: auto !important;
      width: 64px !important;
      opacity: 1 !important;
      visibility: visible !important;
    }

    body[data-sidebar-size="sm"] #sidebar-main-panel.-translate-x-full {
      display: none !important;
      transform: none !important;
      pointer-events: none !important;
      opacity: 0 !important;
      visibility: hidden !important;
      width: 0 !important;
      height: 0 !important;
    }

    /* Sm mode: Active submenu panel stays open and shows its menu items with perfect vertical & horizontal alignment */
    body[data-sidebar-size="sm"] .sidebar-submenu-panel.translate-x-0 {
      display: flex !important;
      flex-direction: column !important;
      align-items: center !important;
      justify-content: flex-start !important;
      transform: none !important;
      translate: 0 0 !important;
      --tw-translate-x: 0px !important;
      left: 0 !important;
      right: 0 !important;
      pointer-events: auto !important;
      width: 64px !important;
      max-width: 64px !important;
      opacity: 1 !important;
      visibility: visible !important;
      padding: 8px 0 16px 0 !important;
      box-sizing: border-box !important;
      overflow-x: hidden !important;
    }

    body[data-sidebar-size="sm"] .sidebar-submenu-panel.translate-x-full {
      display: none !important;
      transform: none !important;
      pointer-events: none !important;
      opacity: 0 !important;
      visibility: hidden !important;
      width: 0 !important;
      height: 0 !important;
    }

    /* Sm mode submenu back button & items */
    body[data-sidebar-size="sm"] .sidebar-back-wrapper {
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
      width: 100% !important;
      margin: 0 0 10px 0 !important;
      padding: 0 !important;
      background: transparent !important;
      background-color: transparent !important;
    }

    body[data-sidebar-size="sm"] .sidebar-submenu-panel .sidebar-back-btn,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel button.sidebar-back-btn {
      width: 36px !important;
      height: 36px !important;
      min-width: 36px !important;
      max-width: 36px !important;
      min-height: 36px !important;
      max-height: 36px !important;
      padding: 0 !important;
      margin: 0 auto !important;
      border-radius: 8px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      box-sizing: border-box !important;
      background: linear-gradient(135deg, #8C56D4 0%, #672EB0 100%) !important;
      background-color: #8C56D4 !important;
      border: 1.5px solid #B48BE8 !important;
      color: #ffffff !important;
      box-shadow: 0 2px 8px rgba(140, 86, 212, 0.45) !important;
      transition: all 0.2s ease !important;
    }

    body[data-sidebar-size="sm"] .sidebar-submenu-panel .sidebar-back-btn:hover,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel button.sidebar-back-btn:hover {
      background: linear-gradient(135deg, #793FC5 0%, #532391 100%) !important;
      background-color: #793FC5 !important;
      border-color: #FAF7FD !important;
      color: #ffffff !important;
      box-shadow: 0 4px 12px rgba(140, 86, 212, 0.5) !important;
      transform: scale(1.05);
    }

    body[data-sidebar-size="sm"] .sidebar-submenu-panel .sidebar-back-btn i,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel button.sidebar-back-btn i {
      margin: 0 auto !important;
      padding: 0 !important;
      width: 36px !important;
      height: 36px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      line-height: 1 !important;
      text-align: center !important;
      font-size: 14px !important;
      vertical-align: middle !important;
      color: #ffffff !important;
    }

    body[data-sidebar-size="sm"] .sidebar-submenu-panel ul {
      display: flex !important;
      flex-direction: column !important;
      align-items: center !important;
      justify-content: flex-start !important;
      width: 100% !important;
      padding: 0 !important;
      margin: 0 !important;
      gap: 6px !important;
      list-style: none !important;
    }

    body[data-sidebar-size="sm"] .sidebar-submenu-panel li {
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
      width: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
    }

    /* Sm mode submenu links & buttons: absolute geometric center override */
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:link,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:visited,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:hover,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:active,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:focus,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:link,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:visited,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:hover,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:active,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:focus {
      width: 36px !important;
      height: 36px !important;
      min-width: 36px !important;
      max-width: 36px !important;
      min-height: 36px !important;
      max-height: 36px !important;
      padding: 0 !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      padding-top: 0 !important;
      padding-bottom: 0 !important;
      margin: 0 auto !important;
      border-radius: 8px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      box-sizing: border-box !important;
      border: 1.5px solid transparent !important;
      color: #FAF7FD !important;
      gap: 0 !important;
      text-align: center !important;
      position: relative !important;
      overflow: hidden !important;
      transition: all 0.2s ease !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:hover,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:hover {
      background: rgba(255, 255, 255, 0.15) !important;
      border-color: rgba(255, 255, 255, 0.25) !important;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
      color: #ffffff !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a.active-submenu-link,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a.active-submenu-link {
      background: linear-gradient(135deg, #8C56D4 0%, #672EB0 100%) !important;
      border: 1.5px solid #B48BE8 !important;
      box-shadow: 0 2px 10px rgba(140, 86, 212, 0.45) !important;
      color: #ffffff !important;
    }

    /* Submenu Icons: dead-center inside the 36px box, zero offset */
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a i,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:link i,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:visited i,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:hover i,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:active i,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a i,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:link i,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:visited i,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:hover i,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:active i {
      margin: 0 auto !important;
      margin-left: auto !important;
      margin-right: auto !important;
      padding: 0 !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
      width: 36px !important;
      height: 36px !important;
      min-width: 36px !important;
      max-width: 36px !important;
      min-height: 36px !important;
      max-height: 36px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      text-align: center !important;
      font-size: 14.5px !important;
      line-height: 1 !important;
      vertical-align: middle !important;
      color: #D2B7F1 !important;
      box-sizing: border-box !important;
      float: none !important;
      position: static !important;
      transform: none !important;
      transition: all 0.2s ease !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a.active-submenu-link i,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a.active-submenu-link i,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-submenu-panel a:hover i,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a:hover i {
      color: #ffffff !important;
      transform: scale(1.1) !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout {
      flex-shrink: 0 !important;
      height: 56px !important;
      width: 64px !important;
      background: rgba(38, 11, 74, 0.98) !important;
      border-top: 1px solid rgba(229, 213, 247, 0.18) !important;
      z-index: 30 !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      padding: 0 !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn {
      width: 36px !important;
      height: 36px !important;
      padding: 0 !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      border-radius: 8px !important;
      background: rgba(255, 255, 255, 0.08) !important;
      border: 1.5px solid rgba(229, 213, 247, 0.22) !important;
      color: #F3ECFB !important;
      transition: all 0.2s ease !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn:hover {
      background: linear-gradient(135deg, #8C56D4 0%, #672EB0 100%) !important;
      border-color: #B48BE8 !important;
      box-shadow: 0 3px 10px rgba(140, 86, 212, 0.4) !important;
      color: #ffffff !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn i.icon {
      font-size: 14px !important;
      width: 36px !important;
      height: 36px !important;
      line-height: 36px !important;
      margin: 0 auto !important;
      color: #D2B7F1 !important;
      transition: all 0.2s ease !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn:hover i.icon {
      color: #ffffff !important;
      transform: scale(1.12);
    }

    /* Strictly hide all labels, text, flyouts and arrows in collapsed mode so ONLY icons show */
    body[data-sidebar-size="sm"] .sidebar-label,
    body[data-sidebar-size="sm"] .sidebar-arrow,
    body[data-sidebar-size="sm"] .sidebar-drilldown-trigger span.sidebar-arrow,
    body[data-sidebar-size="sm"] .sidebar-drilldown-trigger span,
    body[data-sidebar-size="sm"] .sidebar-drilldown-trigger > div > span,
    body[data-sidebar-size="sm"] .sidebar-link span,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel .sidebar-back-btn span,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel a span,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-flyout,
    body[data-sidebar-size="sm"] .sidebar-flyout,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-flyout *,
    body[data-sidebar-size="sm"] .sidebar-flyout *,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-logout-btn .text {
      display: none !important;
      opacity: 0 !important;
      visibility: hidden !important;
      width: 0 !important;
      height: 0 !important;
      padding: 0 !important;
      margin: 0 !important;
      pointer-events: none !important;
      overflow: hidden !important;
    }

    /* Sleek compact 36px x 36px menu icon boxes in sm mode */
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-item {
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
      width: 100% !important;
      margin: 4px 0 !important;
      padding: 0 !important;
    }

    body[data-sidebar-size="sm"] .sidebar-link,
    body[data-sidebar-size="sm"] a.sidebar-link,
    body[data-sidebar-size="sm"] .sidebar-drilldown-trigger,
    body[data-sidebar-size="sm"] button.sidebar-drilldown-trigger,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-link,
    body[data-sidebar-size="sm"] .vertical-menu a.sidebar-link,
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-drilldown-trigger,
    body[data-sidebar-size="sm"] .vertical-menu button.sidebar-drilldown-trigger {
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      padding: 0 !important;
      width: 36px !important;
      height: 36px !important;
      min-width: 36px !important;
      min-height: 36px !important;
      max-width: 36px !important;
      max-height: 36px !important;
      margin: 0 auto !important;
      border-radius: 8px !important;
      border: 1.5px solid transparent !important;
      box-sizing: border-box !important;
    }

    body[data-sidebar-size="sm"] .sidebar-link i,
    body[data-sidebar-size="sm"] .sidebar-drilldown-trigger i {
      margin: 0 auto !important;
      padding: 0 !important;
      width: 36px !important;
      height: 36px !important;
      min-width: 36px !important;
      max-width: 36px !important;
      min-height: 36px !important;
      max-height: 36px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      line-height: 1 !important;
      text-align: center !important;
      font-size: 14.5px !important;
      vertical-align: middle !important;
    }

    body[data-sidebar-size="sm"] .sidebar-drilldown-trigger > div {
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      width: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      gap: 0 !important;
    }

    /* Sleek compact active state in sm mode */
    body[data-sidebar-size="sm"] .vertical-menu .active-gradient,
    body[data-sidebar-size="sm"] .vertical-menu a.sidebar-link.active-gradient,
    body[data-sidebar-size="sm"] .vertical-menu .active-parent,
    body[data-sidebar-size="sm"] .vertical-menu button.sidebar-drilldown-trigger.active-parent {
      width: 36px !important;
      height: 36px !important;
      min-width: 36px !important;
      max-width: 36px !important;
      margin: 0 auto !important;
      padding: 0 !important;
      border-radius: 8px !important;
      border: 1.5px solid #B48BE8 !important;
      box-shadow: 0 2px 10px rgba(140, 86, 212, 0.45) !important;
    }

    /* Sleek compact hover state in sm mode */
    body[data-sidebar-size="sm"] .vertical-menu a.sidebar-link:hover,
    body[data-sidebar-size="sm"] .vertical-menu button.sidebar-drilldown-trigger:hover,
    body[data-sidebar-size="sm"] .sidebar-link:hover,
    body[data-sidebar-size="sm"] a.sidebar-link:hover,
    body[data-sidebar-size="sm"] .sidebar-drilldown-trigger:hover,
    body[data-sidebar-size="sm"] button.sidebar-drilldown-trigger:hover {
      width: 36px !important;
      height: 36px !important;
      min-width: 36px !important;
      min-height: 36px !important;
      max-width: 36px !important;
      max-height: 36px !important;
      margin: 0 auto !important;
      padding: 0 !important;
      border-radius: 8px !important;
      background: rgba(255, 255, 255, 0.15) !important;
      border: 1.5px solid rgba(255, 255, 255, 0.25) !important;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
    }

    /* Single-Item Mini Tooltip */
    .vertical-menu .sidebar-mini-tooltip {
      display: none !important;
      opacity: 0 !important;
      visibility: hidden !important;
      pointer-events: none !important;
      position: absolute !important;
      left: 100% !important;
      top: 50% !important;
      margin-left: 12px !important;
      transform: translateY(-50%) translateX(-6px) scale(0.95) !important;
      transition: opacity 0.15s ease, transform 0.15s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.15s !important;
      padding: 6px 14px !important;
      background: linear-gradient(135deg, #260B4A 0%, #3E1870 55%, #180530 100%) !important;
      color: #F3ECFB !important;
      font-family: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
      font-size: 12.5px !important;
      font-weight: 600 !important;
      letter-spacing: 0.3px !important;
      border-radius: 9px !important;
      border: 1px solid rgba(180, 139, 232, 0.45) !important;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.65), 0 0 15px rgba(140, 86, 212, 0.25) !important;
      white-space: nowrap !important;
      z-index: 99999 !important;
      backdrop-filter: blur(12px) !important;
      -webkit-backdrop-filter: blur(12px) !important;
    }

    .vertical-menu .sidebar-mini-tooltip::before {
      content: '' !important;
      position: absolute !important;
      left: -5px !important;
      top: 50% !important;
      transform: translateY(-50%) rotate(45deg) !important;
      width: 9px !important;
      height: 9px !important;
      background: #260B4A !important;
      border-left: 1px solid rgba(180, 139, 232, 0.45) !important;
      border-bottom: 1px solid rgba(180, 139, 232, 0.45) !important;
    }

    /* Single-Item Mini Tooltip (Fixed position so it's not clipped by overflow) */
    .vertical-menu .sidebar-mini-tooltip {
      display: none !important;
      opacity: 0 !important;
      visibility: hidden !important;
      pointer-events: none !important;
      position: absolute !important;
      left: 100% !important;
      top: 50% !important;
      margin-left: 12px !important;
      transform: translateY(-50%) translateX(-6px) scale(0.95) !important;
      transition: opacity 0.15s ease, transform 0.15s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.15s !important;
      padding: 6px 14px !important;
      background: linear-gradient(135deg, #260B4A 0%, #3E1870 55%, #180530 100%) !important;
      color: #F3ECFB !important;
      font-family: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
      font-size: 12.5px !important;
      font-weight: 600 !important;
      letter-spacing: 0.3px !important;
      border-radius: 9px !important;
      border: 1px solid rgba(180, 139, 232, 0.45) !important;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.65), 0 0 15px rgba(140, 86, 212, 0.25) !important;
      white-space: nowrap !important;
      z-index: 999999 !important;
      backdrop-filter: blur(12px) !important;
      -webkit-backdrop-filter: blur(12px) !important;
    }

    .vertical-menu .sidebar-mini-tooltip::before {
      content: '' !important;
      position: absolute !important;
      left: -5px !important;
      top: 50% !important;
      transform: translateY(-50%) rotate(45deg) !important;
      width: 9px !important;
      height: 9px !important;
      background: #260B4A !important;
      border-left: 1px solid rgba(180, 139, 232, 0.45) !important;
      border-bottom: 1px solid rgba(180, 139, 232, 0.45) !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-mini-tooltip {
      position: fixed !important;
      left: 68px !important;
      margin-left: 0 !important;
    }

    body[data-sidebar-size="sm"] .sidebar-item:not(.has-submenu):hover .sidebar-mini-tooltip,
    body[data-sidebar-size="sm"] .sidebar-bottom-logout:hover .sidebar-mini-tooltip,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel li:hover .sidebar-mini-tooltip,
    body[data-sidebar-size="sm"] .sidebar-submenu-panel .sidebar-back-wrapper:hover .sidebar-mini-tooltip {
      display: flex !important;
      align-items: center !important;
      opacity: 1 !important;
      visibility: visible !important;
      transform: translateY(-50%) translateX(0) scale(1) !important;
    }

    /* Modern Dropdown Flyout Popover (Fixed Position & Portal Styling) */
    .collapsed-flyout-portal {
      display: none;
      position: fixed !important;
      left: 64px !important;
      margin-left: 0 !important;
      opacity: 0;
      visibility: hidden;
      pointer-events: none;
      transform: translateX(4px) scale(0.98);
      transition: opacity 0.14s ease, transform 0.14s ease, visibility 0.14s !important;
      z-index: 9999999 !important;
      
      background: linear-gradient(165deg, rgba(38, 11, 74, 0.98) 0%, rgba(62, 24, 112, 0.98) 45%, rgba(24, 5, 48, 0.99) 100%) !important;
      backdrop-filter: blur(20px) !important;
      -webkit-backdrop-filter: blur(20px) !important;
      border: 1px solid rgba(180, 139, 232, 0.35) !important;
      border-radius: 12px !important;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.14) !important;
      padding: 10px !important;
      width: 240px !important;
      max-height: none !important;
      height: auto !important;
      overflow: visible !important;
      overflow-y: visible !important;
      scrollbar-width: none !important;
      -ms-overflow-style: none !important;
    }

    .collapsed-flyout-portal::-webkit-scrollbar {
      display: none !important;
      width: 0 !important;
      height: 0 !important;
    }

    .collapsed-flyout-portal.portal-visible {
      display: block !important;
      opacity: 1 !important;
      visibility: visible !important;
      pointer-events: auto !important;
      transform: translateX(0) scale(1) !important;
    }

    .collapsed-flyout-portal::before {
      content: '' !important;
      position: absolute !important;
      top: -12px !important;
      bottom: -12px !important;
      left: -25px !important;
      width: 30px !important;
      background: transparent !important;
      pointer-events: auto !important;
    }

    .collapsed-flyout-portal::after {
      content: '' !important;
      position: absolute !important;
      left: -6px !important;
      top: 18px !important;
      width: 10px !important;
      height: 10px !important;
      background: #260B4A !important;
      border-left: 1px solid rgba(180, 139, 232, 0.35) !important;
      border-bottom: 1px solid rgba(180, 139, 232, 0.35) !important;
      transform: rotate(45deg) !important;
      pointer-events: none !important;
    }

    /* Flyout arrow positioning when opening upwards */
    .collapsed-flyout-portal.flyout-upwards::after {
      top: auto !important;
      bottom: 18px !important;
    }

    /* Portal Tooltip Styling */
    .collapsed-tooltip-portal {
      display: none;
      position: fixed !important;
      left: 64px !important;
      z-index: 9999999 !important;
      transform: translateY(-50%) translateX(-4px) scale(0.96);
      transition: opacity 0.14s ease, transform 0.14s cubic-bezier(0.16, 1, 0.3, 1);
      padding: 6px 14px !important;
      background: linear-gradient(135deg, #260B4A 0%, #3E1870 55%, #180530 100%) !important;
      color: #F3ECFB !important;
      font-family: 'Noto Sans Bengali', 'Poppins', sans-serif !important;
      font-size: 12.5px !important;
      font-weight: 600 !important;
      letter-spacing: 0.3px !important;
      border-radius: 9px !important;
      border: 1px solid rgba(180, 139, 232, 0.45) !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.12) !important;
      white-space: nowrap !important;
      backdrop-filter: blur(12px) !important;
      -webkit-backdrop-filter: blur(12px) !important;
      opacity: 0;
      pointer-events: none;
    }

    .collapsed-tooltip-portal.portal-visible {
      display: flex !important;
      align-items: center !important;
      opacity: 1 !important;
      transform: translateY(-50%) translateX(0) scale(1) !important;
    }

    .collapsed-tooltip-portal::before {
      content: '' !important;
      position: absolute !important;
      left: -5px !important;
      top: 50% !important;
      transform: translateY(-50%) rotate(45deg) !important;
      width: 9px !important;
      height: 9px !important;
      background: #260B4A !important;
      border-left: 1px solid rgba(180, 139, 232, 0.45) !important;
      border-bottom: 1px solid rgba(180, 139, 232, 0.45) !important;
    }

    body[data-sidebar-size="sm"] .has-submenu:hover .sidebar-flyout,
    body[data-sidebar-size="sm"] .has-submenu.flyout-open .sidebar-flyout,
    body[data-sidebar-size="sm"] .has-submenu .sidebar-flyout:hover,
    body[data-sidebar-size="sm"] .has-submenu .sidebar-flyout.flyout-pinned {
      opacity: 1 !important;
      visibility: visible !important;
      pointer-events: auto !important;
      transform: translateX(0) scale(1) !important;
    }

    body[data-sidebar-size="sm"] .has-submenu .sidebar-flyout ul {
      display: flex !important;
      flex-direction: column !important;
      gap: 3px !important;
      padding: 4px 0 0 0 !important;
      margin: 0 !important;
    }

    /* Flyout Header & Menu Title - Pure Crisp White Text on Hover */
    .sidebar-flyout-header,
    .collapsed-flyout-portal .sidebar-flyout-header,
    #collapsed-flyout-portal .sidebar-flyout-header {
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
      padding: 6px 10px 8px 10px !important;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
      margin-bottom: 6px !important;
      width: 100% !important;
      box-sizing: border-box !important;
    }

    .sidebar-flyout-header,
    .sidebar-flyout-header *,
    .sidebar-flyout-header span,
    .collapsed-flyout-portal .sidebar-flyout-header,
    .collapsed-flyout-portal .sidebar-flyout-header *,
    .collapsed-flyout-portal .sidebar-flyout-header span,
    #collapsed-flyout-portal .sidebar-flyout-header,
    #collapsed-flyout-portal .sidebar-flyout-header *,
    #collapsed-flyout-portal .sidebar-flyout-header span {
      color: #ffffff !important;
      -webkit-text-fill-color: #ffffff !important;
    }

    .sidebar-flyout-header span,
    .collapsed-flyout-portal .sidebar-flyout-header span,
    #collapsed-flyout-portal .sidebar-flyout-header span {
      color: #ffffff !important;
      font-weight: 700 !important;
      letter-spacing: 0.3px !important;
    }

    .sidebar-flyout-header span.w-1\.5,
    .collapsed-flyout-portal .sidebar-flyout-header span.w-1\.5,
    #collapsed-flyout-portal .sidebar-flyout-header span.w-1\.5 {
      background-color: #ffffff !important;
      box-shadow: 0 0 6px #ffffff !important;
      width: 6px !important;
      height: 6px !important;
      border-radius: 9999px !important;
      display: inline-block !important;
      flex-shrink: 0 !important;
    }

    /* Flyout Links - styled identically to sidebar menu with smooth hover and active */
    .collapsed-flyout-portal .sidebar-flyout-link,
    .collapsed-flyout-portal a.sidebar-flyout-link,
    .vertical-menu .sidebar-flyout-link,
    .vertical-menu a.sidebar-flyout-link,
    .vertical-menu a.sidebar-flyout-link:link,
    .vertical-menu a.sidebar-flyout-link:visited {
      display: flex !important;
      align-items: center !important;
      gap: 10px !important;
      padding: 8.5px 12px !important;
      border-radius: 8px !important;
      color: #F3ECFB !important;
      text-decoration: none !important;
      border: 1px solid transparent !important;
      border-left: 3px solid transparent !important;
      transition: all 0.18s ease-in-out !important;
      width: 100% !important;
      box-sizing: border-box !important;
      font-size: 13px !important;
      font-weight: 500 !important;
    }

    .collapsed-flyout-portal .sidebar-flyout-link i,
    .collapsed-flyout-portal a.sidebar-flyout-link i,
    .vertical-menu .sidebar-flyout-link i,
    .vertical-menu a.sidebar-flyout-link i {
      width: 20px !important;
      min-width: 20px !important;
      max-width: 20px !important;
      font-size: 13px !important;
      text-align: center !important;
      color: #D2B7F1 !important;
      transition: transform 0.18s ease-in-out, color 0.18s ease-in-out !important;
    }

    .collapsed-flyout-portal .sidebar-flyout-link span,
    .collapsed-flyout-portal a.sidebar-flyout-link span,
    .vertical-menu .sidebar-flyout-link span,
    .vertical-menu a.sidebar-flyout-link span {
      font-size: 13px !important;
      font-weight: 500 !important;
      color: #F3ECFB !important;
      white-space: nowrap !important;
      letter-spacing: 0.2px !important;
    }

    /* Hover effect in dropdown: smooth background & icon pop */
    .collapsed-flyout-portal a.sidebar-flyout-link:hover,
    .collapsed-flyout-portal .sidebar-flyout-link:hover,
    .vertical-menu a.sidebar-flyout-link:hover,
    .vertical-menu .sidebar-flyout-link:hover {
      background: rgba(255, 255, 255, 0.15) !important;
      border-color: rgba(255, 255, 255, 0.1) !important;
      color: #ffffff !important;
      transform: translateX(3px) !important;
    }
    .collapsed-flyout-portal a.sidebar-flyout-link:hover span,
    .collapsed-flyout-portal .sidebar-flyout-link:hover span,
    .vertical-menu a.sidebar-flyout-link:hover span,
    .vertical-menu .sidebar-flyout-link:hover span {
      color: #ffffff !important;
    }
    .collapsed-flyout-portal a.sidebar-flyout-link:hover i,
    .collapsed-flyout-portal .sidebar-flyout-link:hover i,
    .vertical-menu a.sidebar-flyout-link:hover i,
    .vertical-menu .sidebar-flyout-link:hover i {
      color: #ffffff !important;
      transform: scale(1.15) !important;
    }

    /* Active state in dropdown: royal purple gradient matching main menu */
    .collapsed-flyout-portal .sidebar-flyout-link.active-flyout-link,
    .collapsed-flyout-portal a.sidebar-flyout-link.active-flyout-link,
    .vertical-menu .sidebar-flyout-link.active-flyout-link,
    .vertical-menu a.sidebar-flyout-link.active-flyout-link {
      background: linear-gradient(135deg, #8C56D4 0%, #672EB0 100%) !important;
      color: #ffffff !important;
      font-weight: 600 !important;
      border-left: 3px solid #B48BE8 !important;
      box-shadow: 0 2px 8px rgba(140, 86, 212, 0.3) !important;
    }
    .collapsed-flyout-portal .sidebar-flyout-link.active-flyout-link span,
    .collapsed-flyout-portal a.sidebar-flyout-link.active-flyout-link span,
    .vertical-menu .sidebar-flyout-link.active-flyout-link span,
    .vertical-menu a.sidebar-flyout-link.active-flyout-link span {
      color: #ffffff !important;
      font-weight: 600 !important;
    }
    .vertical-menu .sidebar-flyout-link.active-flyout-link i,
    .vertical-menu a.sidebar-flyout-link.active-flyout-link i {
      color: #ffffff !important;
      filter: drop-shadow(0 0 3px rgba(255, 255, 255, 0.5));
    }

    /* Fixed Bottom Logout Section (Desktop) */
    @media (min-width: 992px) {
      .vertical-menu .sidebar-bottom-logout {
        flex-shrink: 0 !important;
        margin-top: auto !important;
        padding: 10px 12px !important;
        border-top: 1px solid rgba(255, 255, 255, 0.12) !important;
        background: rgba(38, 11, 74, 0.98) !important;
        box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.05) !important;
      }
    }

    /* Global Soft Box Shadow Overrides - Clean & Subtle Modern Look */
    .card,
    .shadow,
    .shadow-sm,
    .shadow-lg,
    .hishab-grid-card-overlap,
    .hishab-list-card,
    .hero-subcards-row,
    .table-responsive,
    .modal-content {
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04), 0 1px 2px rgba(0, 0, 0, 0.02) !important;
    }

    .hero-balance-card {
      box-shadow: 0 4px 14px rgba(140, 86, 212, 0.16) !important;
    }

    .mobile-bottom-nav-curved {
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.04) !important;
    }

    .btn-mobile-buy,
    .btn-mobile-sell,
    .btn-mobile-plus-curved {
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12) !important;
    }

    .btn-mobile-buy:hover,
    .btn-mobile-sell:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.16) !important;
    }

    .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn {
      display: flex !important;
      align-items: center !important;
      gap: 10px !important;
      color: #F3ECFB !important;
      font-weight: 600 !important;
      font-size: 14px !important;
      padding: 9px 12px !important;
      border-radius: 12px !important;
      text-decoration: none !important;
      background: rgba(255, 255, 255, 0.08) !important;
      border: 1.5px solid rgba(229, 213, 247, 0.22) !important;
      transition: all 0.22s ease-in-out !important;
    }

    .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn:hover {
      background: linear-gradient(135deg, #8C56D4 0%, #672EB0 100%) !important;
      color: #ffffff !important;
      border-color: #B48BE8 !important;
      transform: translateY(-1px);
      box-shadow: 0 4px 14px rgba(140, 86, 212, 0.4) !important;
    }

    .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn i.icon {
      color: #D2B7F1 !important;
      font-size: 16px !important;
      width: 24px !important;
      text-align: center !important;
      transition: all 0.22s ease-in-out !important;
    }

    .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn:hover i.icon {
      color: #ffffff !important;
      transform: scale(1.15);
    }

    /* Logout button in sm mode (compact 36px x 36px) */
    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout {
      padding: 6px 0 !important;
      width: 100% !important;
      display: flex !important;
      justify-content: center !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn {
      justify-content: center !important;
      padding: 0 !important;
      margin: 0 auto !important;
      width: 36px !important;
      height: 36px !important;
      min-width: 36px !important;
      min-height: 36px !important;
      border-radius: 8px !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn i.icon {
      font-size: 14px !important;
      width: 36px !important;
      height: 36px !important;
      line-height: 36px !important;
      margin: 0 auto !important;
    }

    body[data-sidebar-size="sm"] .vertical-menu .sidebar-bottom-logout .sidebar-logout-btn .text {
      display: none !important;
    }

    /* Topbar Home Button & Action Buttons (30px x 30px, Radius: 8px) */
    .topbar-home-btn,
    .pos-theme-toggle-btn,
    .pos-fullscreen-btn,
    .pos-noti-btn {
      width: 30px !important;
      height: 30px !important;
      min-width: 30px !important;
      min-height: 30px !important;
      border-radius: 8px !important;
      background: #F3ECFB !important;
      border: 1px solid #cbd5e1 !important;
      color: #334155 !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      padding: 0 !important;
      cursor: pointer !important;
      transition: all 0.2s ease !important;
      position: relative !important;
      box-shadow: none !important;
      text-decoration: none !important;
    }
    .topbar-home-btn:hover,
    .pos-theme-toggle-btn:hover,
    .pos-fullscreen-btn:hover,
    .pos-noti-btn:hover {
      background: #F3ECFB !important;
      color: #8C56D4 !important;
    }
    .topbar-home-btn i {
      font-size: 13.5px !important;
      color: #8C56D4 !important;
      transition: transform 0.2s ease !important;
    }
    .topbar-home-btn:hover i {
      transform: scale(1.12) !important;
      color: #793FC5 !important;
    }

    /* Theme Toggle Moon / Sun Icon Switching */
    .pos-theme-toggle-btn .icon-moon {
      display: inline-block !important;
      font-size: 13px !important;
      color: #334155 !important;
      transition: transform 0.2s ease !important;
    }
    .pos-theme-toggle-btn .icon-sun {
      display: none !important;
      font-size: 13px !important;
      color: #eab308 !important;
      transition: transform 0.2s ease !important;
    }

    body[light-mode="dark"] .pos-theme-toggle-btn .icon-moon,
    body[data-layout-mode="dark"] .pos-theme-toggle-btn .icon-moon,
    html[light-mode="dark"] .pos-theme-toggle-btn .icon-moon,
    body.dark-mode .pos-theme-toggle-btn .icon-moon {
      display: none !important;
    }
    body[light-mode="dark"] .pos-theme-toggle-btn .icon-sun,
    body[data-layout-mode="dark"] .pos-theme-toggle-btn .icon-sun,
    html[light-mode="dark"] .pos-theme-toggle-btn .icon-sun,
    body.dark-mode .pos-theme-toggle-btn .icon-sun {
      display: inline-block !important;
    }

    /* Fullscreen enter / leave icons */
    .pos-fullscreen-btn svg {
      width: 13px !important;
      height: 13px !important;
      display: block !important;
      stroke: currentColor !important;
    }
    .pos-fullscreen-btn .icon-fullscreen-enter {
      display: inline-block !important;
    }
    .pos-fullscreen-btn .icon-fullscreen-leave {
      display: none !important;
    }
    .pos-fullscreen-btn.on .icon-fullscreen-enter {
      display: none !important;
    }
    .pos-fullscreen-btn.on .icon-fullscreen-leave {
      display: inline-block !important;
    }

    /* Notification Bell Icon */
    .pos-noti-btn i {
      font-size: 13px !important;
      color: #334155 !important;
    }

    #noti-count-badge {
      position: absolute !important;
      top: -4px !important;
      right: -4px !important;
      font-size: 9px !important;
      font-weight: 700 !important;
      padding: 1.5px 4.5px !important;
      border-radius: 999px !important;
      background-color: #ef4444 !important;
      color: #ffffff !important;
      border: 1.5px solid #ffffff !important;
      line-height: 1 !important;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2) !important;
    }

    /* Modern Notification Dropdown */
    .page-header-notifications-dropdown-v {
      width: 340px !important;
      max-width: 94vw !important;
      border-radius: 12px !important;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.12), 0 8px 10px -6px rgba(0, 0, 0, 0.04) !important;
      border: 1px solid #e2e8f0 !important;
      background: #ffffff !important;
      overflow: hidden !important;
      padding: 0 !important;
    }
    @media (max-width: 991.98px) {
      .navbar-header .dropdown .dropdown-menu.page-header-notifications-dropdown-v,
      .navbar-header .dropdown .page-header-notifications-dropdown-v,
      .page-header-notifications-dropdown-v {
        position: fixed !important;
        top: 72px !important;
        left: 12px !important;
        right: 12px !important;
        width: calc(100vw - 24px) !important;
        max-width: calc(100vw - 24px) !important;
        margin: 0 auto !important;
        transform: none !important;
        -webkit-transform: none !important;
        translate: none !important;
        z-index: 1100 !important;
        border-radius: 0 0 12px 12px !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.22) !important;
      }
    }
    @media (min-width: 992px) {
      .page-header-notifications-dropdown-v {
        position: absolute !important;
        top: 100% !important;
        right: 0 !important;
        left: auto !important;
        margin-top: 8px !important;
        transform: none !important;
      }
    }

    .stock-noti-header {
      padding: 8px 12px !important;
      background: #F3ECFB !important;
      border-bottom: 1px solid #e2e8f0 !important;
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
    }
    .stock-noti-header .noti-title-wrap {
      display: flex !important;
      align-items: center !important;
      gap: 8px !important;
    }
    .stock-noti-header .noti-icon-badge {
      width: 24px !important;
      height: 24px !important;
      border-radius: 6px !important;
      background: #fee2e2 !important;
      color: #ef4444 !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      font-size: 11px !important;
    }
    .stock-noti-header .noti-title {
      font-size: 12.5px !important;
      font-weight: 700 !important;
      color: #0f172a !important;
      line-height: 1.2 !important;
      margin: 0 !important;
    }
    .stock-noti-header .noti-subtitle {
      font-size: 10.5px !important;
      color: #64748b !important;
      margin: 0 !important;
      line-height: 1.2 !important;
    }
    .stock-noti-header .noti-view-all-btn {
      font-size: 11px !important;
      font-weight: 600 !important;
      padding: 3px 8px !important;
      border-radius: 6px !important;
      background: #fef2f2 !important;
      color: #dc2626 !important;
      border: 1px solid #fecaca !important;
      text-decoration: none !important;
      display: inline-flex !important;
      align-items: center !important;
      gap: 4px !important;
      transition: all 0.15s ease !important;
    }
    .stock-noti-header .noti-view-all-btn:hover {
      background: #fee2e2 !important;
      color: #b91c1c !important;
    }

    #notification-items-list {
      max-height: 280px !important;
      overflow-y: auto !important;
      padding: 0 !important;
    }

    .stock-noti-item {
      display: flex !important;
      align-items: center !important;
      gap: 9px !important;
      padding: 7px 12px !important;
      border-bottom: 1px solid #F3ECFB !important;
      text-decoration: none !important;
      transition: background-color 0.15s ease !important;
    }
    .stock-noti-item:hover {
      background-color: #F3ECFB !important;
    }
    .stock-noti-item .item-icon-box {
      width: 26px !important;
      height: 26px !important;
      border-radius: 6px !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      font-size: 11px !important;
      flex-shrink: 0 !important;
    }
    .stock-noti-item .item-body {
      flex: 1 1 auto !important;
      min-width: 0 !important;
    }
    .stock-noti-item .item-row-top {
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
      margin-bottom: 1px !important;
    }
    .stock-noti-item .item-name {
      font-size: 12px !important;
      font-weight: 600 !important;
      color: #1e293b !important;
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
      max-width: 170px !important;
    }
    .stock-noti-item .item-badge {
      font-size: 9.5px !important;
      font-weight: 700 !important;
      padding: 1px 5px !important;
      border-radius: 4px !important;
      line-height: 1.2 !important;
    }
    .stock-noti-item .item-badge-danger {
      background-color: #fee2e2 !important;
      color: #dc2626 !important;
      border: 1px solid #fecaca !important;
    }
    .stock-noti-item .item-badge-warning {
      background-color: #fef3c7 !important;
      color: #d97706 !important;
      border: 1px solid #fde68a !important;
    }
    .stock-noti-item .item-row-bottom {
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
    }
    .stock-noti-item .item-code {
      font-size: 10.5px !important;
      color: #64748b !important;
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow: ellipsis !important;
      max-width: 140px !important;
      display: inline-flex !important;
      align-items: center !important;
      gap: 3px !important;
    }
    .stock-noti-item .item-stock {
      font-size: 11px !important;
      font-weight: 600 !important;
      white-space: nowrap !important;
    }

    .stock-noti-footer {
      padding: 6px 12px !important;
      background: #F3ECFB !important;
      border-top: 1px solid #e2e8f0 !important;
      text-align: center !important;
    }
    .stock-noti-footer a {
      font-size: 11px !important;
      font-weight: 600 !important;
      color: #dc2626 !important;
      text-decoration: none !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      gap: 5px !important;
    }
    .stock-noti-footer a:hover {
      color: #b91c1c !important;
      text-decoration: underline !important;
    }

    /* Explicit Light Mode Base & Background Overrides */
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) {
      background-color: #ffffff !important;
      color: #1e293b !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .main-content,
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .page-content {
      background-color: #ffffff !important;
      background: #ffffff !important;
    }

    /* Mobile and Tablet: Keep top padding for topbar height, remove left, right and bottom padding */
    @media (max-width: 991.98px) {
      .page-content,
      .main-content .page-content,
      body .page-content,
      body .main-content .page-content,
      div.page-content {
        padding: 70px 0px 0px 0px !important;
      }
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) #page-topbar,
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .isvertical-topbar {
      background-color: #ffffff !important;
      background: #ffffff !important;
      border-bottom: 1px solid #e2e8f0 !important;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) !important;
    }

    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .card,
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .shadow-sm:not(.sidebar-back-btn):not(.vertical-menu *),
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .hishab-grid-card-overlap,
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .hishab-list-card,
    body:not([light-mode="dark"]):not([data-layout-mode="dark"]):not(.dark-mode) .hero-subcards-row {
      background-color: #ffffff !important;
      border: 1px solid #e2e8f0 !important;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04), 0 1px 2px rgba(0, 0, 0, 0.02) !important;
    }

    /* Soften all prominent shadows in dashboard */
    .hero-balance-card {
      box-shadow: 0 6px 18px rgba(22, 163, 74, 0.18) !important;
    }
    .mobile-bottom-nav-curved {
      box-shadow: 0 -3px 12px rgba(0, 0, 0, 0.05) !important;
    }

    /* Dark Mode Styling Overrides */
    body[light-mode="dark"],
    body[data-layout-mode="dark"],
    body.dark-mode {
      background-color: #0f172a !important;
      color: #F3ECFB !important;
    }

    body[light-mode="dark"] .main-content,
    body[data-layout-mode="dark"] .main-content,
    body[light-mode="dark"] .page-content,
    body[data-layout-mode="dark"] .page-content {
      background-color: #0f172a !important;
    }

    /* Dark Mode Topbar Background (#0b0f19) */
    body[light-mode="dark"] #page-topbar,
    body[data-layout-mode="dark"] #page-topbar,
    html.dark #page-topbar,
    body.dark-mode #page-topbar,
    body[light-mode="dark"] .isvertical-topbar,
    body[data-layout-mode="dark"] .isvertical-topbar,
    html.dark .isvertical-topbar,
    body.dark-mode .isvertical-topbar,
    body[light-mode="dark"] .navbar-header,
    body[data-layout-mode="dark"] .navbar-header,
    html.dark .navbar-header,
    body.dark-mode .navbar-header {
      background-color: #0b0f19 !important;
      background: #0b0f19 !important;
      border-bottom: 1px solid #1e293b !important;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) !important;
    }

    body[light-mode="dark"] .card,
    body[data-layout-mode="dark"] .card,
    body[light-mode="dark"] .card-body,
    body[data-layout-mode="dark"] .card-body {
      background: #1e293b !important;
      border-color: rgba(255, 255, 255, 0.08) !important;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
    }

    body[light-mode="dark"] .card-header,
    body[data-layout-mode="dark"] .card-header,
    body[light-mode="dark"] .bg-white,
    body[data-layout-mode="dark"] .bg-white {
      background-color: #1e293b !important;
      color: #F3ECFB !important;
      border-bottom-color: rgba(255, 255, 255, 0.08) !important;
    }

    body[light-mode="dark"] .topbar-home-btn,
    body[data-layout-mode="dark"] .topbar-home-btn,
    html[light-mode="dark"] .topbar-home-btn,
    body.dark-mode .topbar-home-btn,
    body[light-mode="dark"] .pos-theme-toggle-btn,
    body[data-layout-mode="dark"] .pos-theme-toggle-btn,
    html[light-mode="dark"] .pos-theme-toggle-btn,
    body.dark-mode .pos-theme-toggle-btn,
    body[light-mode="dark"] .pos-fullscreen-btn,
    body[data-layout-mode="dark"] .pos-fullscreen-btn,
    html[light-mode="dark"] .pos-fullscreen-btn,
    body.dark-mode .pos-fullscreen-btn,
    body[light-mode="dark"] .pos-noti-btn,
    body[data-layout-mode="dark"] .pos-noti-btn,
    html[light-mode="dark"] .pos-noti-btn,
    body.dark-mode .pos-noti-btn {
      background: #1e293b !important;
      border-color: #334155 !important;
      color: #cbd5e1 !important;
    }
    body[light-mode="dark"] .topbar-home-btn:hover,
    body[data-layout-mode="dark"] .topbar-home-btn:hover,
    html[light-mode="dark"] .topbar-home-btn:hover,
    body.dark-mode .topbar-home-btn:hover,
    body[light-mode="dark"] .pos-theme-toggle-btn:hover,
    body[data-layout-mode="dark"] .pos-theme-toggle-btn:hover,
    html[light-mode="dark"] .pos-theme-toggle-btn:hover,
    body.dark-mode .pos-theme-toggle-btn:hover,
    body[light-mode="dark"] .pos-fullscreen-btn:hover,
    body[data-layout-mode="dark"] .pos-fullscreen-btn:hover,
    html[light-mode="dark"] .pos-fullscreen-btn:hover,
    body.dark-mode .pos-fullscreen-btn:hover,
    body[light-mode="dark"] .pos-noti-btn:hover,
    body[data-layout-mode="dark"] .pos-noti-btn:hover,
    html[light-mode="dark"] .pos-noti-btn:hover,
    body.dark-mode .pos-noti-btn:hover {
      background: #334155 !important;
      color: #34d399 !important;
    }
    body[light-mode="dark"] .topbar-home-btn i,
    body[data-layout-mode="dark"] .topbar-home-btn i,
    html[light-mode="dark"] .topbar-home-btn i,
    body.dark-mode .topbar-home-btn i {
      color: #34d399 !important;
    }
    body[light-mode="dark"] .pos-noti-btn i,
    body[data-layout-mode="dark"] .pos-noti-btn i,
    html[light-mode="dark"] .pos-noti-btn i,
    body.dark-mode .pos-noti-btn i {
      color: #cbd5e1 !important;
    }
    body[light-mode="dark"] #noti-count-badge,
    body[data-layout-mode="dark"] #noti-count-badge,
    html[light-mode="dark"] #noti-count-badge,
    body.dark-mode #noti-count-badge {
      border-color: #1e293b !important;
    }

    body[light-mode="dark"] .page-header-notifications-dropdown-v,
    body[data-layout-mode="dark"] .page-header-notifications-dropdown-v,
    html[light-mode="dark"] .page-header-notifications-dropdown-v,
    body.dark-mode .page-header-notifications-dropdown-v {
      background: #1e293b !important;
      border-color: #334155 !important;
    }
    body[light-mode="dark"] .stock-noti-header,
    body[data-layout-mode="dark"] .stock-noti-header,
    html[light-mode="dark"] .stock-noti-header,
    body.dark-mode .stock-noti-header {
      background: #0f172a !important;
      border-bottom-color: #334155 !important;
    }
    body[light-mode="dark"] .stock-noti-header .noti-title,
    body[data-layout-mode="dark"] .stock-noti-header .noti-title,
    html[light-mode="dark"] .stock-noti-header .noti-title,
    body.dark-mode .stock-noti-header .noti-title {
      color: #F3ECFB !important;
    }
    body[light-mode="dark"] .stock-noti-header .noti-subtitle,
    body[data-layout-mode="dark"] .stock-noti-header .noti-subtitle,
    html[light-mode="dark"] .stock-noti-header .noti-subtitle,
    body.dark-mode .stock-noti-header .noti-subtitle {
      color: #94a3b8 !important;
    }
    body[light-mode="dark"] .stock-noti-item,
    body[data-layout-mode="dark"] .stock-noti-item,
    html[light-mode="dark"] .stock-noti-item,
    body.dark-mode .stock-noti-item {
      background: #1e293b !important;
      border-bottom-color: #334155 !important;
    }
    body[light-mode="dark"] .stock-noti-item:hover,
    body[data-layout-mode="dark"] .stock-noti-item:hover,
    html[light-mode="dark"] .stock-noti-item:hover,
    body.dark-mode .stock-noti-item:hover {
      background: #334155 !important;
    }
    body[light-mode="dark"] .stock-noti-item .item-name,
    body[data-layout-mode="dark"] .stock-noti-item .item-name,
    html[light-mode="dark"] .stock-noti-item .item-name,
    body.dark-mode .stock-noti-item .item-name {
      color: #F3ECFB !important;
    }
    body[light-mode="dark"] .stock-noti-item .item-code,
    body[data-layout-mode="dark"] .stock-noti-item .item-code,
    html[light-mode="dark"] .stock-noti-item .item-code,
    body.dark-mode .stock-noti-item .item-code {
      color: #94a3b8 !important;
    }
    body[light-mode="dark"] .stock-noti-footer,
    body[data-layout-mode="dark"] .stock-noti-footer,
    html[light-mode="dark"] .stock-noti-footer,
    body.dark-mode .stock-noti-footer {
      background: #0f172a !important;
      border-top-color: #334155 !important;
    }

    body[light-mode="dark"] .table,
    body[data-layout-mode="dark"] .table {
      color: #F3ECFB !important;
      background-color: #1e293b !important;
    }
    body[light-mode="dark"] .table th,
    body[light-mode="dark"] .table td,
    body[data-layout-mode="dark"] .table th,
    body[data-layout-mode="dark"] .table td,
    body[light-mode="dark"] .table thead.bg-light th,
    body[data-layout-mode="dark"] .table thead.bg-light th {
      background-color: #0f172a !important;
      color: #F3ECFB !important;
      border-color: rgba(255, 255, 255, 0.08) !important;
    }
  </style>
</head>

<body data-sidebar="dark" data-sidebar-size="lg">
  <script>
    (function() {
      try {
        if (window.innerWidth >= 992) {
          var savedSize = localStorage.getItem('sidebar-size');
          if (savedSize === 'sm') {
            document.body.setAttribute('data-sidebar-size', 'sm');
          }
        }
      } catch(e) {}
    })();
  </script>

  <!-- Dedicated Fullscreen Mobile Backdrop Overlay (strictly covers bottom floating nav 1040) -->
  <div class="sidebar-backdrop-overlay" onclick="document.body.classList.remove('sidebar-enable');"></div>

  <div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
      <div class="indeterminate"></div>
    </div>
  </div>

  <!-- Navbar Start -->
  <nav id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
      <div class="d-flex align-items-center">
        <button type="button" class="btn header-item waves-effect vertical-menu-btn d-inline-flex align-items-center justify-content-center ms-3"
          title="Sidebar Toggle" aria-label="Toggle Sidebar">
          <i class="fa-solid fa-bars-staggered"></i>
        </button>

        {{-- Professional Home Button next to Toggle --}}
        <a href="{{ url('admin-dashboard') }}" class="topbar-home-btn ms-2"
          title="হোম ড্যাশবোর্ড" aria-label="হোম ড্যাশবোর্ড">
          <i class="fa-solid fa-house"></i>
        </a>

        {{-- Dynamic Back Button: Shown when child page defines @section('topbar_back_button') --}}
        @hasSection('topbar_back_button')
          @yield('topbar_back_button')
        @endif
      </div>

      <div class="d-flex align-items-center gap-2">
        <!-- Light / Dark Theme Toggle Button -->
        <button type="button" class="pos-theme-toggle-btn" aria-label="Toggle Light/Dark Mode"
            onclick="toggle_light_mode()" title="Toggle Light/Dark Theme">
            <i class="fa-regular fa-moon icon-moon"></i>
            <i class="fa-regular fa-sun icon-sun"></i>
        </button>

        <!-- Fullscreen Button -->
        <div class="fullscreen d-flex align-items-center">
          <button type="button" class="js-toggle-fullscreen-btn pos-fullscreen-btn" aria-label="Enter fullscreen mode" title="Fullscreen Mode">
            <svg class="icon-fullscreen-enter" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/>
            </svg>
            <svg class="icon-fullscreen-leave" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 14h6v6M20 10h-6V4M14 10l7-7M3 21l7-7"/>
            </svg>
          </button>
        </div>

        <!-- Notification Dropdown -->
        <div class="dropdown d-inline-block position-relative">
          <button type="button" class="pos-noti-btn position-relative"
            id="page-header-notifications-dropdown-v" data-bs-toggle="dropdown" data-bs-display="static" aria-haspopup="true"
            aria-expanded="false" title="কম স্টক নোটিফিকেশন">
            <i class="fa-regular fa-bell"></i>
            <span id="noti-count-badge" class="badge rounded-pill bg-danger" style="display: none;">0</span>
          </button>
          <div class="dropdown-menu dropdown-menu-end p-0 page-header-notifications-dropdown-v shadow-lg border-0"
            aria-labelledby="page-header-notifications-dropdown-v">
            <div class="stock-noti-header">
              <div class="noti-title-wrap">
                <div class="noti-icon-badge">
                  <i class="fa-solid fa-bell"></i>
                </div>
                <div>
                  <h6 class="noti-title">স্টক নোটিফিকেশন</h6>
                  <p class="noti-subtitle">১০ এর নিচে থাকা স্টক</p>
                </div>
              </div>
              <a href="/admin-dashboard-low-stock-list" class="noti-view-all-btn">
                <span>সকল দেখুন</span> <i class="fa-solid fa-arrow-right" style="font-size: 8.5px;"></i>
              </a>
            </div>
            <div id="notification-items-list">
              <!-- Dynamic Low Stock Product Notifications Populated via JS -->
              <div class="text-center py-4 px-3">
                <div class="spinner-border spinner-border-sm text-danger me-2" role="status"></div>
                <span class="small text-muted">নোটিফিকেশন লোড হচ্ছে...</span>
              </div>
            </div>
            <div class="stock-noti-footer">
              <a href="/admin-dashboard-low-stock-list">
                <i class="fa-solid fa-boxes-stacked"></i> সম্পূর্ণ কম স্টক প্রোডাক্ট তালিকা দেখুন <i class="fa-solid fa-arrow-right" style="font-size: 9px;"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- User Profile Dropdown -->
        <div class="dropdown d-inline-block">
          <button type="button" class="btn header-item user text-start d-flex align-items-center"
            id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <img class="rounded-circle header-profile-user"
              id="UserProfileImg" src="{{ asset('back-end/assets/img/profile-img.png') }}" onerror="this.src='{{ asset('back-end/assets/img/profile-img.png') }}'" alt="Header Avatar" style="width: 36px; height: 36px; object-fit: cover;" />
          </button>
          <div class="dropdown-menu dropdown-menu-end pt-0 profile-dropdown">
            <div class="p-3 border-bottom">
              <h6 class="mb-0" id="AuthorizePersonProfileName"></h6>
              <a href="#" class="mb-0 font-size-11 text-muted" id="EmailShow">
              </a>
            </div>
            <a class="dropdown-item" href="{{url('admin-dashboard-user-profile')}}"><i
                class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i>
              <span class="align-middle">প্রোফাইল</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" onclick="userlogout(event)"><i
                class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i>
              <span class="align-middle">লগ আউট</span></a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Right Sidebar setting Start -->
  <div class="right-bar">
    <div data-simplebar class="h-100">
      <div class="rightbar-title d-flex align-items-center bg-dark p-3">
        <h5 class="m-0 me-2 text-white">থিম কাস্টমাইজেশন</h5>

        <a href="javascript:void(0);" class="right-bar-toggle-close ms-auto">
          <i class="mdi mdi-close noti-icon"></i>
        </a>
      </div>
      <!-- Settings -->
      <hr class="m-0" />

      <div class="p-4">
        <h6 class="mt-4 mb-3">লেআউট মোড</h6>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light"
            value="light" />
          <label class="form-check-label" for="layout-mode-light">লাইট</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark"
            value="dark" />
          <label class="form-check-label" for="layout-mode-dark">ডার্ক</label>
        </div>

        <h6 class="mt-4 mb-3">টপবার ধরন</h6>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light"
            value="light" onchange="document.body.setAttribute('data-topbar', 'light')" />
          <label class="form-check-label" for="topbar-color-light">লাইট</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark"
            value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')" />
          <label class="form-check-label" for="topbar-color-dark">ডার্ক</label>
        </div>

        <div id="sidebar-setting">
          <h6 class="mt-4 mb-3 sidebar-setting">সাইডবার সাইজ</h6>

          <div class="form-check sidebar-setting mt-2">
            <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
              value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')" />
            <label class="form-check-label" for="sidebar-size-default">ডিফল্ট</label>
          </div>
          <div class="form-check sidebar-setting mt-2">
            <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small"
              value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')" />
            <label class="form-check-label" for="sidebar-size-small">ছোট (আইকন ভিউ)</label>
          </div>

          <h6 class="mt-4 mb-3 sidebar-setting">সাইডবার কালার</h6>

          <div class="form-check sidebar-setting mt-2">
            <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light"
              value="light" onchange="document.body.setAttribute('data-sidebar', 'light')" />
            <label class="form-check-label" for="sidebar-color-light">লাইট</label>
          </div>
          <div class="form-check sidebar-setting mt-2">
            <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark"
              value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')" />
            <label class="form-check-label" for="sidebar-color-dark">ডার্ক</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Right Sidebar bar overlay-->
  <div class="rightbar-overlay"></div>
  <!-- Navbar End -->

  <!-- Left Sidebar Start -->
  <div class="vertical-menu">
    <!-- Synchronous Instant Permission CSS Filter (0ms Flash Fix) -->
    <script>
      (function() {
        try {
          var role = (localStorage.getItem('user_role') || '').toLowerCase();
          var perms = null;
          try {
            perms = JSON.parse(localStorage.getItem('user_permissions') || 'null');
          } catch (e) {}

          if (role && role !== 'admin' && role !== 'super_admin') {
            var effective = {
              pos: true,
              product: false,
              purchase: false,
              customer: false,
              expense: false,
              report: false,
              user: false
            };
            if (perms && typeof perms === 'object') {
              effective.pos = !!perms.pos;
              effective.product = !!perms.product;
              effective.purchase = !!perms.purchase;
              effective.customer = !!perms.customer;
              effective.expense = !!perms.expense;
              effective.report = !!perms.report;
              effective.user = !!perms.user;
            } else {
              if (role === 'manager') {
                effective = { pos: true, product: true, purchase: true, customer: true, expense: true, report: true, user: false };
              } else if (role === 'cashier') {
                effective = { pos: true, product: false, purchase: false, customer: false, expense: false, report: false, user: false };
              } else if (role === 'accountant') {
                effective = { pos: false, product: false, purchase: false, customer: true, expense: true, report: true, user: false };
              }
            }

            var css = '';
            for (var k in effective) {
              if (effective[k] === false) {
                css += '[data-perm="' + k + '"] { display: none !important; }\n';
              }
            }
            if (css) {
              var style = document.createElement('style');
              style.id = 'instant-perm-style';
              style.innerHTML = css;
              document.head.appendChild(style);
            }
          }
        } catch (e) {
          console.error('Instant perm filter error:', e);
        }
      })();
    </script>

    <!-- LOGO Box -->
    <div class="navbar-brand-box">
      <a href="{{url('admin-dashboard')}}" class="logo logo-dark d-flex align-items-center text-decoration-none">
        <!-- Collapsed Sidebar Icon (Small Mode) -->
        <span class="logo-sm">
          <img src="{{ asset('back-end/assets/img/anis-store-icon.png') }}" alt="Anis Store Icon" width="36" height="36" style="border-radius: 8px; object-fit: contain;" />
        </span>

        <!-- Expanded Sidebar Icon (Large Mode) -->
        <span class="logo-lg d-flex align-items-center gap-2">
          <img src="{{ asset('back-end/assets/img/anis-store-icon.png') }}" alt="Anis Store Icon" style="width: 36px; height: 36px; border-radius: 8px; object-fit: contain;" />
          <span class="fw-bold text-white fs-5" style="font-family: 'Poppins', sans-serif; font-size: 16px !important; letter-spacing: 0.3px;">
            আনিস ষ্টোর <span class="badge text-white px-2 py-1 ms-1" style="font-size: 10px; border-radius: 6px; font-weight: 600; background-color: #8C56D4 !important;">POS</span>
          </span>
        </span>
      </a>
    </div>
    <!-- Logo Box End -->

    @php
      $activeParent = null;
      if (request()->is('admin-dashboard-product*') || request()->is('admin-dashboard-barcode-genarate*') || request()->is('admin-dashboard-low-stock-list*')) {
          $activeParent = 'product';
      } elseif (request()->is('admin-dashboard-supplier*') || request()->is('supplier-due-page*') || request()->is('supplier-due-collection-page*')) {
          $activeParent = 'supplier';
      } elseif (request()->is('admin-dashboard-customer*') || request()->is('admin-dashboard-customer-due-list*') || request()->is('customer-due-collection-page*')) {
          $activeParent = 'customer';
      } elseif (request()->is('admin-dashboard-*-report*') || request()->is('admin-dashboard-daily-*') || request()->is('admin-dashboard-personal-*') || request()->is('admin-dashboard-income-*') || request()->is('admin-dashboard-sales-report*')) {
          $activeParent = 'report';
      } elseif (request()->is('admin-dashboard-user-role*') || request()->is('admin-dashboard-user-profile*')) {
          $activeParent = 'setting';
      }
    @endphp

    <!--- Redesigned Sliding Drilldown Wrapper -->
    <div id="sidebar-slider-wrapper" class="relative flex-1 w-full overflow-hidden">
      
      <!-- Panel 1: Main Menu Panel -->
      <div id="sidebar-main-panel" class="sidebar-panel-scroll absolute inset-0 w-full h-full overflow-y-auto overflow-x-hidden transition-transform duration-300 ease-in-out py-2 px-3 {{ $activeParent ? '-translate-x-full pointer-events-none' : 'translate-x-0' }}">
        <ul class="space-y-1">
          
          <!-- 1. ড্যাশবোর্ড -->
          <li class="sidebar-item relative group">
            <a href="{{ url('admin-dashboard') }}" class="sidebar-link w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 transition-all duration-200 {{ request()->is('admin-dashboard') ? 'active-gradient' : '' }}" style="color: {{ request()->is('admin-dashboard') ? '#ffffff' : '#f1f5f9' }} !important; text-decoration: none !important;">
              <i class="fa-solid fa-gauge text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110" style="color: {{ request()->is('admin-dashboard') ? '#ffffff' : '#D2B7F1' }} !important;"></i>
              <span class="sidebar-label text-[13.5px] font-medium tracking-wide" style="color: {{ request()->is('admin-dashboard') ? '#ffffff' : '#f1f5f9' }} !important;">ড্যাশবোর্ড</span>
            </a>
            <div class="sidebar-mini-tooltip">ড্যাশবোর্ড</div>
          </li>

          <!-- 2. পস -->
          <li class="sidebar-item relative group" data-perm="pos">
            <a href="{{ url('admin-dashboard-pos') }}" class="sidebar-link w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 transition-all duration-200 {{ request()->is('admin-dashboard-pos') ? 'active-gradient' : '' }}" style="color: {{ request()->is('admin-dashboard-pos') ? '#ffffff' : '#f1f5f9' }} !important; text-decoration: none !important;">
              <i class="fa-solid fa-cash-register text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110" style="color: {{ request()->is('admin-dashboard-pos') ? '#ffffff' : '#D2B7F1' }} !important;"></i>
              <span class="sidebar-label text-[13.5px] font-medium tracking-wide" style="color: {{ request()->is('admin-dashboard-pos') ? '#ffffff' : '#f1f5f9' }} !important;">পস</span>
            </a>
            <div class="sidebar-mini-tooltip">পস</div>
          </li>

          <!-- 3. ইনভয়েস তালিকা -->
          <li class="sidebar-item relative group" data-perm="pos">
            <a href="{{ url('admin-dashboard-invoice') }}" class="sidebar-link w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 transition-all duration-200 {{ request()->is('admin-dashboard-invoice') ? 'active-gradient' : '' }}" style="color: {{ request()->is('admin-dashboard-invoice') ? '#ffffff' : '#f1f5f9' }} !important; text-decoration: none !important;">
              <i class="fa-solid fa-file-invoice-dollar text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110" style="color: {{ request()->is('admin-dashboard-invoice') ? '#ffffff' : '#D2B7F1' }} !important;"></i>
              <span class="sidebar-label text-[13.5px] font-medium tracking-wide" style="color: {{ request()->is('admin-dashboard-invoice') ? '#ffffff' : '#f1f5f9' }} !important;">ইনভয়েস তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">ইনভয়েস তালিকা</div>
          </li>

          <!-- 4. প্রোডাক্ট (Has Submenu) -->
          <li class="sidebar-item has-submenu relative group" data-menu-id="product" data-perm="product">
            <button type="button" class="sidebar-drilldown-trigger w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 bg-transparent outline-none transition-all duration-200 text-start {{ $activeParent === 'product' ? 'active-parent' : '' }}" style="background-color: transparent;" data-target="submenu-panel-product">
              <div class="flex items-center gap-2 min-w-0">
                <i class="fa-solid fa-boxes-stacked text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110"></i>
                <span class="sidebar-label text-[13.5px] font-medium tracking-wide truncate">প্রোডাক্ট</span>
              </div>
              <span class="sidebar-arrow shrink-0 w-5 h-5 rounded-md bg-white/10 flex items-center justify-center text-white/70 group-hover:text-white group-hover:bg-white/20 transition-all">
                <i class="fa-solid fa-chevron-right text-[9px]"></i>
              </span>
            </button>
            <!-- Collapsed Flyout Popover -->
            <div class="sidebar-flyout">
              <div class="sidebar-flyout-header flex items-center justify-between px-3 py-2 border-b border-purple-400/25 mb-1.5" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;">
                <span class="text-[11px] font-bold tracking-wider text-white uppercase flex items-center gap-1.5" style="color: #ffffff !important;">
                  <span class="w-1.5 h-1.5 rounded-full bg-white shadow-[0_0_6px_#ffffff]" style="background-color: #ffffff !important; box-shadow: 0 0 6px #ffffff !important;"></span>
                  প্রোডাক্ট
                </span>
                <span class="text-[10px] font-medium text-white/90" style="color: rgba(255, 255, 255, 0.9) !important;">মেনু</span>
              </div>
              <ul class="py-0.5 px-1 space-y-0.5">
                <li><a href="{{ url('admin-dashboard-product') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-product') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-list-ul text-[10px] text-purple-200/80 w-4 text-center"></i><span>প্রোডাক্ট তালিকা</span></a></li>
                <li><a href="{{ url('admin-dashboard-low-stock-list') }}" class="sidebar-flyout-link text-red-300 hover:text-red-100 hover:bg-red-500/20 font-semibold"><i class="fa-solid fa-triangle-exclamation text-[10px] text-red-400 w-4 text-center"></i><span>কম স্টক তালিকা</span></a></li>
                <li><a href="{{ url('admin-dashboard-barcode-genarate') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-barcode-genarate') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-barcode text-[10px] text-purple-200/80 w-4 text-center"></i><span>বারকোড প্রিন্ট</span></a></li>
              </ul>
            </div>
          </li>

          <!-- 5. সাপ্লায়ার (Has Submenu) -->
          <li class="sidebar-item has-submenu relative group" data-menu-id="supplier" data-perm="purchase">
            <button type="button" class="sidebar-drilldown-trigger w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 bg-transparent outline-none transition-all duration-200 text-start {{ $activeParent === 'supplier' ? 'active-parent' : '' }}" style="background-color: transparent;" data-target="submenu-panel-supplier">
              <div class="flex items-center gap-2 min-w-0">
                <i class="fa-solid fa-truck text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110"></i>
                <span class="sidebar-label text-[13.5px] font-medium tracking-wide truncate">সাপ্লায়ার</span>
              </div>
              <span class="sidebar-arrow shrink-0 w-5 h-5 rounded-md bg-white/10 flex items-center justify-center text-white/70 group-hover:text-white group-hover:bg-white/20 transition-all">
                <i class="fa-solid fa-chevron-right text-[9px]"></i>
              </span>
            </button>
            <!-- Collapsed Flyout Popover -->
            <div class="sidebar-flyout">
              <div class="sidebar-flyout-header flex items-center justify-between px-3 py-2 border-b border-purple-400/25 mb-1.5" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;">
                <span class="text-[11px] font-bold tracking-wider text-white uppercase flex items-center gap-1.5" style="color: #ffffff !important;">
                  <span class="w-1.5 h-1.5 rounded-full bg-white shadow-[0_0_6px_#ffffff]" style="background-color: #ffffff !important; box-shadow: 0 0 6px #ffffff !important;"></span>
                  সাপ্লায়ার
                </span>
                <span class="text-[10px] font-medium text-white/90" style="color: rgba(255, 255, 255, 0.9) !important;">মেনু</span>
              </div>
              <ul class="py-0.5 px-1 space-y-0.5">
                <li><a href="{{ url('admin-dashboard-supplier') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-supplier') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-truck text-[10px] text-purple-200/80 w-4 text-center"></i><span>সাপ্লায়ার তালিকা</span></a></li>
                <li><a href="{{ url('supplier-due-page') }}" class="sidebar-flyout-link {{ request()->is('supplier-due-page') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-receipt text-[10px] text-purple-200/80 w-4 text-center"></i><span>সাপ্লায়ার বকেয়া তালিকা</span></a></li>
                <li><a href="{{ url('supplier-due-collection-page') }}" class="sidebar-flyout-link {{ request()->is('supplier-due-collection-page') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-money-bill-wave text-[10px] text-purple-200/80 w-4 text-center"></i><span>বকেয়া পরিশোধ তালিকা</span></a></li>
              </ul>
            </div>
          </li>

          <!-- 6. ক্রয় (পারচেজ) (Single Menu) -->
          <li class="sidebar-item relative group" data-perm="purchase">
            <a href="{{ url('admin-dashboard-Purchase') }}" class="sidebar-link w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 transition-all duration-200 {{ request()->is('admin-dashboard-Purchase*') ? 'active-gradient' : '' }}" style="color: {{ request()->is('admin-dashboard-Purchase*') ? '#ffffff' : '#f1f5f9' }} !important; text-decoration: none !important;">
              <i class="fa-solid fa-cart-shopping text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110" style="color: {{ request()->is('admin-dashboard-Purchase*') ? '#ffffff' : '#D2B7F1' }} !important;"></i>
              <span class="sidebar-label text-[13.5px] font-medium tracking-wide" style="color: {{ request()->is('admin-dashboard-Purchase*') ? '#ffffff' : '#f1f5f9' }} !important;">ক্রয় (পারচেজ)</span>
            </a>
            <div class="sidebar-mini-tooltip">ক্রয় (পারচেজ)</div>
          </li>

          <!-- 7. কাস্টমার (Has Submenu) -->
          <li class="sidebar-item has-submenu relative group" data-menu-id="customer" data-perm="customer">
            <button type="button" class="sidebar-drilldown-trigger w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 bg-transparent outline-none transition-all duration-200 text-start {{ $activeParent === 'customer' ? 'active-parent' : '' }}" style="background-color: transparent;" data-target="submenu-panel-customer">
              <div class="flex items-center gap-2 min-w-0">
                <i class="fa-solid fa-users text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110"></i>
                <span class="sidebar-label text-[13.5px] font-medium tracking-wide truncate">কাস্টমার</span>
              </div>
              <span class="sidebar-arrow shrink-0 w-5 h-5 rounded-md bg-white/10 flex items-center justify-center text-white/70 group-hover:text-white group-hover:bg-white/20 transition-all">
                <i class="fa-solid fa-chevron-right text-[9px]"></i>
              </span>
            </button>
            <!-- Collapsed Flyout Popover -->
            <div class="sidebar-flyout">
              <div class="sidebar-flyout-header flex items-center justify-between px-3 py-2 border-b border-purple-400/25 mb-1.5" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;">
                <span class="text-[11px] font-bold tracking-wider text-white uppercase flex items-center gap-1.5" style="color: #ffffff !important;">
                  <span class="w-1.5 h-1.5 rounded-full bg-white shadow-[0_0_6px_#ffffff]" style="background-color: #ffffff !important; box-shadow: 0 0 6px #ffffff !important;"></span>
                  কাস্টমার
                </span>
                <span class="text-[10px] font-medium text-white/90" style="color: rgba(255, 255, 255, 0.9) !important;">মেনু</span>
              </div>
              <ul class="py-0.5 px-1 space-y-0.5">
                <li><a href="{{ url('admin-dashboard-customer') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-customer') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-address-book text-[10px] text-purple-200/80 w-4 text-center"></i><span>কাস্টমার তালিকা</span></a></li>
                <li><a href="{{ url('admin-dashboard-customer-due-list') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-customer-due-list') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-file-invoice-dollar text-[10px] text-purple-200/80 w-4 text-center"></i><span>কাস্টমার বকেয়া তালিকা</span></a></li>
                <li><a href="{{ url('customer-due-collection-page') }}" class="sidebar-flyout-link {{ request()->is('customer-due-collection-page') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-hand-holding-dollar text-[10px] text-purple-200/80 w-4 text-center"></i><span>বকেয়া আদায় তালিকা</span></a></li>
              </ul>
            </div>
          </li>

          <!-- 8. খরচ -->
          <li class="sidebar-item relative group" data-perm="expense">
            <a href="{{ url('admin-dashboard-expence-list') }}" class="sidebar-link w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 transition-all duration-200 {{ request()->is('admin-dashboard-expence*') ? 'active-gradient' : '' }}" style="color: {{ request()->is('admin-dashboard-expence*') ? '#ffffff' : '#f1f5f9' }} !important; text-decoration: none !important;">
              <i class="fa-solid fa-wallet text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110" style="color: {{ request()->is('admin-dashboard-expence*') ? '#ffffff' : '#D2B7F1' }} !important;"></i>
              <span class="sidebar-label text-[13.5px] font-medium tracking-wide" style="color: {{ request()->is('admin-dashboard-expence*') ? '#ffffff' : '#f1f5f9' }} !important;">খরচ</span>
            </a>
            <div class="sidebar-mini-tooltip">খরচ</div>
          </li>

          <!-- 9. রিটার্ন -->
          <li class="sidebar-item relative group" data-perm="pos">
            <a href="{{ url('admin-dashboard-return-list') }}" class="sidebar-link w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 transition-all duration-200 {{ request()->is('admin-dashboard-return*') ? 'active-gradient' : '' }}" style="color: {{ request()->is('admin-dashboard-return*') ? '#ffffff' : '#f1f5f9' }} !important; text-decoration: none !important;">
              <i class="fa-solid fa-arrow-rotate-left text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110" style="color: {{ request()->is('admin-dashboard-return*') ? '#ffffff' : '#D2B7F1' }} !important;"></i>
              <span class="sidebar-label text-[13.5px] font-medium tracking-wide" style="color: {{ request()->is('admin-dashboard-return*') ? '#ffffff' : '#f1f5f9' }} !important;">রিটার্ন</span>
            </a>
            <div class="sidebar-mini-tooltip">রিটার্ন</div>
          </li>

          <!-- 10. প্রারম্ভিক ব্যালেন্স (Single Menu) -->
          <li class="sidebar-item relative group" data-perm="expense">
            <a href="{{ url('admin-dashboard-opening-balance') }}" class="sidebar-link w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 transition-all duration-200 {{ request()->is('admin-dashboard-opening-balance*') ? 'active-gradient' : '' }}" style="color: {{ request()->is('admin-dashboard-opening-balance*') ? '#ffffff' : '#f1f5f9' }} !important; text-decoration: none !important;">
              <i class="fa-solid fa-scale-balanced text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110" style="color: {{ request()->is('admin-dashboard-opening-balance*') ? '#ffffff' : '#D2B7F1' }} !important;"></i>
              <span class="sidebar-label text-[13.5px] font-medium tracking-wide" style="color: {{ request()->is('admin-dashboard-opening-balance*') ? '#ffffff' : '#f1f5f9' }} !important;">প্রারম্ভিক ব্যালেন্স</span>
            </a>
            <div class="sidebar-mini-tooltip">প্রারম্ভিক ব্যালেন্স</div>
          </li>

          <!-- 11. রিপোর্ট (Has Submenu) -->
          <li class="sidebar-item has-submenu relative group" data-menu-id="report" data-perm="report">
            <button type="button" class="sidebar-drilldown-trigger w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 bg-transparent outline-none transition-all duration-200 text-start {{ $activeParent === 'report' ? 'active-parent' : '' }}" style="background-color: transparent;" data-target="submenu-panel-report">
              <div class="flex items-center gap-2 min-w-0">
                <i class="fa-solid fa-chart-pie text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110"></i>
                <span class="sidebar-label text-[13.5px] font-medium tracking-wide truncate">রিপোর্ট</span>
              </div>
              <span class="sidebar-arrow shrink-0 w-5 h-5 rounded-md bg-white/10 flex items-center justify-center text-white/70 group-hover:text-white group-hover:bg-white/20 transition-all">
                <i class="fa-solid fa-chevron-right text-[9px]"></i>
              </span>
            </button>
            <!-- Collapsed Flyout Popover -->
            <div class="sidebar-flyout !w-64">
              <div class="sidebar-flyout-header flex items-center justify-between px-3 py-2 border-b border-purple-400/25 mb-1.5" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;">
                <span class="text-[11px] font-bold tracking-wider text-white uppercase flex items-center gap-1.5" style="color: #ffffff !important;">
                  <span class="w-1.5 h-1.5 rounded-full bg-white shadow-[0_0_6px_#ffffff]" style="background-color: #ffffff !important; box-shadow: 0 0 6px #ffffff !important;"></span>
                  রিপোর্ট
                </span>
                <span class="text-[10px] font-medium text-white/90" style="color: rgba(255, 255, 255, 0.9) !important;">মেনু</span>
              </div>
              <ul class="py-0.5 px-1 space-y-0.5">
                <li><a href="{{ url('admin-dashboard-daily-ledger-report') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-daily-ledger-report') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-book-bookmark text-[10px] text-purple-200/80 w-4 text-center"></i><span>দৈনিক আয়-ব্যয় লেজার</span></a></li>
                <li><a href="{{ url('admin-dashboard-sales-report') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-sales-report') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-chart-line text-[10px] text-purple-200/80 w-4 text-center"></i><span>বিক্রয় রিপোর্ট</span></a></li>
                <li><a href="{{ url('admin-dashboard-income-expense-report') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-income-expense-report') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-chart-column text-[10px] text-purple-200/80 w-4 text-center"></i><span>আয় ও ব্যয় রিপোর্ট</span></a></li>
                <li><a href="{{ url('admin-dashboard-daily-receipt-payment-report') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-daily-receipt-payment-report') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-file-waveform text-[10px] text-purple-200/80 w-4 text-center"></i><span>দৈনিক জমা ও খরচ রিপোর্ট</span></a></li>
                <li><a href="{{ url('admin-dashboard-personal-transaction-report') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-personal-transaction-report') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-user-tag text-[10px] text-purple-200/80 w-4 text-center"></i><span>ব্যক্তিগত লেনদেন রিপোর্ট</span></a></li>
              </ul>
            </div>
          </li>

          <!-- 12. সেটিং (Has Submenu) -->
          <li class="sidebar-item has-submenu relative group" data-menu-id="setting" data-perm="user">
            <button type="button" class="sidebar-drilldown-trigger w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-slate-100 hover:text-white hover:bg-white/15 bg-transparent outline-none transition-all duration-200 text-start {{ $activeParent === 'setting' ? 'active-parent' : '' }}" style="background-color: transparent;" data-target="submenu-panel-setting">
              <div class="flex items-center gap-2 min-w-0">
                <i class="fa-solid fa-gear text-purple-200 group-hover:text-white text-[15px] w-6 text-center shrink-0 transition-transform group-hover:scale-110"></i>
                <span class="sidebar-label text-[13.5px] font-medium tracking-wide truncate">সেটিং</span>
              </div>
              <span class="sidebar-arrow shrink-0 w-5 h-5 rounded-md bg-white/10 flex items-center justify-center text-white/70 group-hover:text-white group-hover:bg-white/20 transition-all">
                <i class="fa-solid fa-chevron-right text-[9px]"></i>
              </span>
            </button>
            <!-- Collapsed Flyout Popover -->
            <div class="sidebar-flyout">
              <div class="sidebar-flyout-header flex items-center justify-between px-3 py-2 border-b border-purple-400/25 mb-1.5" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;">
                <span class="text-[11px] font-bold tracking-wider text-white uppercase flex items-center gap-1.5" style="color: #ffffff !important;">
                  <span class="w-1.5 h-1.5 rounded-full bg-white shadow-[0_0_6px_#ffffff]" style="background-color: #ffffff !important; box-shadow: 0 0 6px #ffffff !important;"></span>
                  সেটিং
                </span>
                <span class="text-[10px] font-medium text-white/90" style="color: rgba(255, 255, 255, 0.9) !important;">মেনু</span>
              </div>
              <ul class="py-0.5 px-1 space-y-0.5">
                <li><a href="{{ url('admin-dashboard-user-role') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-user-role*') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-user-shield text-[10px] text-purple-200/80 w-4 text-center"></i><span>রোল ও ইউজার</span></a></li>
                <li><a href="{{ url('admin-dashboard-user-profile') }}" class="sidebar-flyout-link {{ request()->is('admin-dashboard-user-profile*') ? 'active-flyout-link' : '' }}"><i class="fa-solid fa-id-badge text-[10px] text-purple-200/80 w-4 text-center"></i><span>প্রোফাইল</span></a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div>

      <!-- Panel 2: Product Submenu Panel -->
      <div id="submenu-panel-product" class="sidebar-submenu-panel sidebar-panel-scroll absolute inset-0 w-full h-full overflow-y-auto overflow-x-hidden transition-transform duration-300 ease-in-out py-2 px-3 {{ $activeParent === 'product' ? 'translate-x-0 pointer-events-auto' : 'translate-x-full pointer-events-none' }}" data-parent-id="product">
        <div class="sidebar-back-wrapper relative group mb-2">
          <button type="button" class="sidebar-back-btn w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-white font-semibold text-sm transition-all duration-200" data-target="main">
            <i class="fa-solid fa-chevron-left text-xs text-purple-200"></i>
            <span class="truncate">প্রোডাক্ট</span>
          </button>
          <div class="sidebar-mini-tooltip">মূল মেনু</div>
        </div>
        <ul class="space-y-1">
          <li class="relative group">
            <a href="{{ url('admin-dashboard-product') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-product') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-list-ul text-xs text-purple-200/80 w-4 text-center"></i>
              <span>প্রোডাক্ট তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">প্রোডাক্ট তালিকা</div>
          </li>
          <li class="relative group">
            <a href="{{ url('admin-dashboard-low-stock-list') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-red-200 hover:text-white hover:bg-red-600/30 font-bold transition-all duration-150 {{ request()->is('admin-dashboard-low-stock-list') ? 'bg-red-600 text-white' : '' }}">
              <i class="fa-solid fa-triangle-exclamation text-xs text-red-300 w-4 text-center"></i>
              <span>কম স্টক তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">কম স্টক তালিকা</div>
          </li>
          <li class="relative group">
            <a href="{{ url('admin-dashboard-barcode-genarate') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-barcode-genarate') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-barcode text-xs text-purple-200/80 w-4 text-center"></i>
              <span>বারকোড প্রিন্ট</span>
            </a>
            <div class="sidebar-mini-tooltip">বারকোড প্রিন্ট</div>
          </li>
        </ul>
      </div>

      <!-- Panel 3: Supplier Submenu Panel -->
      <div id="submenu-panel-supplier" class="sidebar-submenu-panel sidebar-panel-scroll absolute inset-0 w-full h-full overflow-y-auto overflow-x-hidden transition-transform duration-300 ease-in-out py-2 px-3 {{ $activeParent === 'supplier' ? 'translate-x-0 pointer-events-auto' : 'translate-x-full pointer-events-none' }}" data-parent-id="supplier">
        <div class="sidebar-back-wrapper relative group mb-2">
          <button type="button" class="sidebar-back-btn w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-white font-semibold text-sm transition-all duration-200" data-target="main">
            <i class="fa-solid fa-chevron-left text-xs text-purple-200"></i>
            <span class="truncate">সাপ্লায়ার</span>
          </button>
          <div class="sidebar-mini-tooltip">মূল মেনু</div>
        </div>
        <ul class="space-y-1">
          <li class="relative group">
            <a href="{{ url('admin-dashboard-supplier') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-supplier') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-truck text-xs text-purple-200/80 w-4 text-center"></i>
              <span>সাপ্লায়ার তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">সাপ্লায়ার তালিকা</div>
          </li>
          <li class="relative group">
            <a href="{{ url('supplier-due-page') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('supplier-due-page') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-receipt text-xs text-purple-200/80 w-4 text-center"></i>
              <span>সাপ্লায়ার বকেয়া তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">সাপ্লায়ার বকেয়া তালিকা</div>
          </li>
          <li class="relative group">
            <a href="{{ url('supplier-due-collection-page') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('supplier-due-collection-page') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-money-bill-wave text-xs text-purple-200/80 w-4 text-center"></i>
              <span>বকেয়া পরিশোধ তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">বকেয়া পরিশোধ তালিকা</div>
          </li>
        </ul>
      </div>



      <!-- Panel 5: Customer Submenu Panel -->
      <div id="submenu-panel-customer" class="sidebar-submenu-panel sidebar-panel-scroll absolute inset-0 w-full h-full overflow-y-auto overflow-x-hidden transition-transform duration-300 ease-in-out py-2 px-3 {{ $activeParent === 'customer' ? 'translate-x-0 pointer-events-auto' : 'translate-x-full pointer-events-none' }}" data-parent-id="customer">
        <div class="sidebar-back-wrapper relative group mb-2">
          <button type="button" class="sidebar-back-btn w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-white font-semibold text-sm transition-all duration-200" data-target="main">
            <i class="fa-solid fa-chevron-left text-xs text-purple-200"></i>
            <span class="truncate">কাস্টমার</span>
          </button>
          <div class="sidebar-mini-tooltip">মূল মেনু</div>
        </div>
        <ul class="space-y-1">
          <li class="relative group">
            <a href="{{ url('admin-dashboard-customer') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-customer') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-address-book text-xs text-purple-200/80 w-4 text-center"></i>
              <span>কাস্টমার তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">কাস্টমার তালিকা</div>
          </li>
          <li class="relative group">
            <a href="{{ url('admin-dashboard-customer-due-list') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-customer-due-list') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-file-invoice-dollar text-xs text-purple-200/80 w-4 text-center"></i>
              <span>কাস্টমার বকেয়া তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">কাস্টমার বকেয়া তালিকা</div>
          </li>
          <li class="relative group">
            <a href="{{ url('customer-due-collection-page') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('customer-due-collection-page') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-hand-holding-dollar text-xs text-purple-200/80 w-4 text-center"></i>
              <span>বকেয়া আদায় তালিকা</span>
            </a>
            <div class="sidebar-mini-tooltip">বকেয়া আদায় তালিকা</div>
          </li>
        </ul>
      </div>

      <!-- Panel 7: Report Submenu Panel -->
      <div id="submenu-panel-report" class="sidebar-submenu-panel sidebar-panel-scroll absolute inset-0 w-full h-full overflow-y-auto overflow-x-hidden transition-transform duration-300 ease-in-out py-2 px-3 {{ $activeParent === 'report' ? 'translate-x-0 pointer-events-auto' : 'translate-x-full pointer-events-none' }}" data-parent-id="report">
        <div class="sidebar-back-wrapper relative group mb-2">
          <button type="button" class="sidebar-back-btn w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-white font-semibold text-sm transition-all duration-200" data-target="main">
            <i class="fa-solid fa-chevron-left text-xs text-purple-200"></i>
            <span class="truncate">রিপোর্ট</span>
          </button>
          <div class="sidebar-mini-tooltip">মূল মেনু</div>
        </div>
        <ul class="space-y-1">
          <li class="relative group">
            <a href="{{ url('admin-dashboard-daily-ledger-report') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-daily-ledger-report') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-book-bookmark text-xs text-purple-200/80 w-4 text-center"></i>
              <span>দৈনিক আয়-ব্যয় লেজার</span>
            </a>
            <div class="sidebar-mini-tooltip">দৈনিক আয়-ব্যয় লেজার</div>
          </li>
          <li class="relative group">
            <a href="{{ url('admin-dashboard-sales-report') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-sales-report') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-chart-line text-xs text-purple-200/80 w-4 text-center"></i>
              <span>বিক্রয় রিপোর্ট</span>
            </a>
            <div class="sidebar-mini-tooltip">বিক্রয় রিপোর্ট</div>
          </li>
          <li class="relative group">
            <a href="{{ url('admin-dashboard-income-expense-report') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-income-expense-report') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-chart-column text-xs text-purple-200/80 w-4 text-center"></i>
              <span>আয় ও ব্যয় রিপোর্ট</span>
            </a>
            <div class="sidebar-mini-tooltip">আয় ও ব্যয় রিপোর্ট</div>
          </li>
          <li class="relative group">
            <a href="{{ url('admin-dashboard-daily-receipt-payment-report') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-daily-receipt-payment-report') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-file-waveform text-xs text-purple-200/80 w-4 text-center"></i>
              <span>দৈনিক জমা ও খরচ রিপোর্ট</span>
            </a>
            <div class="sidebar-mini-tooltip">দৈনিক জমা ও খরচ রিপোর্ট</div>
          </li>
          <li class="relative group">
            <a href="{{ url('admin-dashboard-personal-transaction-report') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-personal-transaction-report') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-user-tag text-xs text-purple-200/80 w-4 text-center"></i>
              <span>ব্যক্তিগত লেনদেন রিপোর্ট</span>
            </a>
            <div class="sidebar-mini-tooltip">ব্যক্তিগত লেনদেন রিপোর্ট</div>
          </li>
        </ul>
      </div>

      <!-- Panel 8: Setting Submenu Panel (Formerly Role & User) -->
      <div id="submenu-panel-setting" class="sidebar-submenu-panel sidebar-panel-scroll absolute inset-0 w-full h-full overflow-y-auto overflow-x-hidden transition-transform duration-300 ease-in-out py-2 px-3 {{ $activeParent === 'setting' ? 'translate-x-0 pointer-events-auto' : 'translate-x-full pointer-events-none' }}" data-parent-id="setting">
        <div class="sidebar-back-wrapper relative group mb-2">
          <button type="button" class="sidebar-back-btn w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-white font-semibold text-sm transition-all duration-200" data-target="main">
            <i class="fa-solid fa-chevron-left text-xs text-purple-200"></i>
            <span class="truncate">সেটিং</span>
          </button>
          <div class="sidebar-mini-tooltip">মূল মেনু</div>
        </div>
        <ul class="space-y-1">
          <li class="relative group" data-perm="user">
            <a href="{{ url('admin-dashboard-user-role') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-user-role*') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-user-shield text-xs text-purple-200/80 w-4 text-center"></i>
              <span>রোল ও ইউজার</span>
            </a>
            <div class="sidebar-mini-tooltip">রোল ও ইউজার</div>
          </li>
          <li class="relative group">
            <a href="{{ url('admin-dashboard-user-profile') }}" class="flex w-full items-center gap-2.5 px-3 py-2.5 rounded-xl text-[13px] text-slate-200 hover:text-white hover:bg-white/10 transition-all duration-150 {{ request()->is('admin-dashboard-user-profile*') ? 'active-submenu-link' : '' }}">
              <i class="fa-solid fa-id-badge text-xs text-purple-200/80 w-4 text-center"></i>
              <span>প্রোফাইল</span>
            </a>
            <div class="sidebar-mini-tooltip">প্রোফাইল</div>
          </li>
        </ul>
      </div>

    </div>

    <!-- Fixed Bottom Logout Button -->
    <div class="sidebar-bottom-logout relative group">
      <a href="#" onclick="userlogout(event)" class="sidebar-logout-btn">
        <i class="fa-solid fa-right-from-bracket icon"></i>
        <span class="text">লগ আউট</span>
      </a>
      <div class="sidebar-mini-tooltip">লগ আউট</div>
    </div>
  </div>
  <!-- Left Sidebar End -->

  @yield('content')

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const preloader = document.getElementById("preloader");
      const content = document.getElementById("content");

      setTimeout(() => {
        if (preloader) {
          preloader.style.opacity = "0";
          preloader.style.visibility = "hidden";
        }
        if (content) {
          content.style.display = "block";
          setTimeout(() => {
            content.style.opacity = "1";
          }, 100);
        }
      }, 100);
    });
  </script>

  <!-- Modern Sliding Drilldown & Collapsed Popover Sidebar Controller -->
  <script>
    (function() {
      // Open Submenu Drilldown Panel
      window.openSubmenuPanel = function(panelId) {
        if (document.body.getAttribute('data-sidebar-size') === 'sm') {
          return;
        }

        const mainPanel = document.getElementById('sidebar-main-panel');
        const targetPanel = document.getElementById(panelId);
        if (!mainPanel || !targetPanel) return;

        document.querySelectorAll('.sidebar-submenu-panel').forEach(function(p) {
          if (p !== targetPanel) {
            p.classList.remove('translate-x-0', 'pointer-events-auto');
            p.classList.add('translate-x-full', 'pointer-events-none');
          }
        });

        mainPanel.classList.remove('translate-x-0');
        mainPanel.classList.add('-translate-x-full', 'pointer-events-none');

        targetPanel.scrollTop = 0;
        targetPanel.classList.remove('translate-x-full', 'pointer-events-none');
        targetPanel.classList.add('translate-x-0', 'pointer-events-auto');
      };

      // Close Submenu Panel and Return to Main Menu
      window.closeSubmenuPanel = function() {
        const mainPanel = document.getElementById('sidebar-main-panel');
        if (!mainPanel) return;

        document.querySelectorAll('.sidebar-submenu-panel').forEach(function(p) {
          p.classList.remove('translate-x-0', 'pointer-events-auto');
          p.classList.add('translate-x-full', 'pointer-events-none');
        });

        mainPanel.scrollTop = 0;
        mainPanel.classList.remove('-translate-x-full', 'pointer-events-none');
        mainPanel.classList.add('translate-x-0', 'pointer-events-auto');
      };

      function initSidebarInteractions() {
        // Bind drilldown trigger buttons
        document.querySelectorAll('.sidebar-drilldown-trigger').forEach(function(btn) {
          btn.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-target');

            // If sidebar is collapsed (sm): toggle pin on the flyout for touch/click
            if (document.body.getAttribute('data-sidebar-size') === 'sm') {
              const parent = this.closest('.has-submenu');
              if (parent) {
                const flyout = parent.querySelector('.sidebar-flyout');
                if (flyout) {
                  const isPinned = flyout.classList.contains('flyout-pinned');
                  document.querySelectorAll('.sidebar-flyout').forEach(function(f) {
                    f.classList.remove('flyout-pinned');
                  });
                  document.querySelectorAll('.has-submenu').forEach(function(p) {
                    p.classList.remove('flyout-open');
                  });
                  if (!isPinned) {
                    flyout.classList.add('flyout-pinned');
                    parent.classList.add('flyout-open');
                  }
                }
              }
              return;
            }

            if (targetId) {
              openSubmenuPanel(targetId);
            }
          });
        });

        // Bind back buttons
        document.querySelectorAll('.sidebar-back-btn').forEach(function(btn) {
          btn.addEventListener('click', function(e) {
            e.preventDefault();
            closeSubmenuPanel();
          });
        });

        // Dismiss pinned and open flyouts on outside click
        document.addEventListener('click', function(e) {
          if (!e.target.closest('.has-submenu') && !e.target.closest('#collapsed-flyout-portal')) {
            hideFlyoutPortal();
            document.querySelectorAll('.sidebar-flyout.flyout-pinned').forEach(function(f) {
              f.classList.remove('flyout-pinned');
            });
            document.querySelectorAll('.has-submenu.flyout-open').forEach(function(p) {
              p.classList.remove('flyout-open');
            });
          }
        });

        // Debounced hover & smart vertical positioning for flyouts in sm mode (Portal Driven)
        let activeFlyoutTimer = null;
        let activeTooltipTimer = null;
        const flyoutPortal = document.getElementById('collapsed-flyout-portal');
        const tooltipPortal = document.getElementById('collapsed-tooltip-portal');

        function hideFlyoutPortal() {
          if (flyoutPortal) {
            flyoutPortal.classList.remove('portal-visible');
            flyoutPortal.style.display = 'none';
            flyoutPortal.style.opacity = '0';
            flyoutPortal.style.visibility = 'hidden';
            flyoutPortal.style.pointerEvents = 'none';
          }
        }

        function hideTooltipPortal() {
          if (tooltipPortal) {
            tooltipPortal.classList.remove('portal-visible');
            tooltipPortal.style.display = 'none';
            tooltipPortal.style.opacity = '0';
          }
        }

        if (flyoutPortal) {
          flyoutPortal.addEventListener('mouseenter', function() {
            if (activeFlyoutTimer) clearTimeout(activeFlyoutTimer);
          });
          flyoutPortal.addEventListener('mouseleave', function() {
            activeFlyoutTimer = setTimeout(hideFlyoutPortal, 200);
          });
        }

        // Global Event Delegation for reliable hover on collapsed sidebar items
        document.addEventListener('mouseover', function(e) {
          if (window.innerWidth < 992) return;
          if (document.body.getAttribute('data-sidebar-size') !== 'sm') return;

          // 1. If inside the flyout portal itself, keep it open!
          if (e.target.closest('#collapsed-flyout-portal')) {
            if (activeFlyoutTimer) clearTimeout(activeFlyoutTimer);
            return;
          }

          // 2. Check if hovering a menu item with submenu
          const submenuItem = e.target.closest('.has-submenu');
          if (submenuItem && submenuItem.closest('.vertical-menu')) {
            if (activeFlyoutTimer) clearTimeout(activeFlyoutTimer);
            if (activeTooltipTimer) clearTimeout(activeTooltipTimer);
            hideTooltipPortal();

            const flyout = submenuItem.querySelector('.sidebar-flyout');
            if (!flyout || !flyoutPortal) return;

            flyoutPortal.innerHTML = flyout.innerHTML;
            flyoutPortal.style.display = 'block';

            const rect = submenuItem.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            const flyoutHeight = flyoutPortal.offsetHeight || 220;
            const spaceBelow = windowHeight - rect.top;

            let calculatedTop;
            if (spaceBelow < flyoutHeight + 15) {
              calculatedTop = Math.max(10, rect.bottom - flyoutHeight);
              flyoutPortal.classList.add('flyout-upwards');
            } else {
              calculatedTop = Math.max(10, Math.min(rect.top - 2, windowHeight - flyoutHeight - 10));
              flyoutPortal.classList.remove('flyout-upwards');
            }

            flyoutPortal.style.top = calculatedTop + 'px';
            flyoutPortal.style.left = '64px';
            flyoutPortal.style.opacity = '1';
            flyoutPortal.style.visibility = 'visible';
            flyoutPortal.style.pointerEvents = 'auto';
            flyoutPortal.classList.add('portal-visible');
            return;
          }

          // 3. Check if hovering a single menu item (tooltip)
          const singleItem = e.target.closest('.sidebar-item:not(.has-submenu), .sidebar-bottom-logout, .sidebar-back-wrapper, .sidebar-submenu-panel li');
          if (singleItem && singleItem.closest('.vertical-menu')) {
            hideFlyoutPortal();
            const tooltip = singleItem.querySelector('.sidebar-mini-tooltip');
            if (!tooltip || !tooltipPortal) return;

            tooltipPortal.textContent = tooltip.textContent.trim();
            const rect = singleItem.getBoundingClientRect();
            tooltipPortal.style.top = (rect.top + rect.height / 2) + 'px';
            tooltipPortal.style.left = '64px';
            tooltipPortal.style.display = 'flex';
            tooltipPortal.style.opacity = '1';
            tooltipPortal.classList.add('portal-visible');
            return;
          }

          // 4. Outside sidebar and outside portal: close smoothly
          if (!e.target.closest('.vertical-menu')) {
            if (!activeFlyoutTimer) {
              activeFlyoutTimer = setTimeout(hideFlyoutPortal, 200);
            }
            hideTooltipPortal();
          }
        });

        // Dismiss flyouts and tooltips on vertical-menu scroll
        const sliderWrapper = document.getElementById('sidebar-slider-wrapper');
        if (sliderWrapper) {
          sliderWrapper.addEventListener('scroll', function() {
            if (document.body.getAttribute('data-sidebar-size') === 'sm') {
              hideFlyoutPortal();
              hideTooltipPortal();
            }
          }, { passive: true });
        }

        // Observer for body data-sidebar-size changes
        const observer = new MutationObserver(function(mutations) {
          mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'data-sidebar-size') {
              const currentSize = document.body.getAttribute('data-sidebar-size');
              if (currentSize === 'sm') {
                // Do not reset drilldown submenu when collapsing sidebar
                document.querySelectorAll('.sidebar-flyout.flyout-pinned').forEach(function(f) {
                  f.classList.remove('flyout-pinned');
                });
                document.querySelectorAll('.has-submenu.flyout-open').forEach(function(p) {
                  p.classList.remove('flyout-open');
                });
                hideFlyoutPortal();
                hideTooltipPortal();
              } else {
                hideFlyoutPortal();
                hideTooltipPortal();
              }
            }
          });
        });
        observer.observe(document.body, { attributes: true });
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSidebarInteractions);
      } else {
        initSidebarInteractions();
      }
    })();
  </script>

  <script>
    async function userlogout(event) {
      event.preventDefault();

      try {
        let res = await axios.get("/naxus-pos-logout", HeaderToken());
        localStorage.clear();
        sessionStorage.clear();
        window.location.href = "/admin-login-page";
      } catch (e) {
        console.error("Logout error:", e);
        errorToast(e.response?.data?.message || "Something went wrong");
      }
    }
  </script>

  <!-- Smart Role & Toggle Permission Control Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      applyUserRolePermissions();

      async function applyUserRolePermissions() {
        try {
          const response = await axios.get("/user-profile", HeaderToken());
          const user = response.data;

          window.currentUserRole = (user.role || '').toLowerCase();
          window.currentUserPermissions = user.permissions || null;

          localStorage.setItem('user_role', window.currentUserRole);
          if (user.permissions) {
            localStorage.setItem('user_permissions', JSON.stringify(user.permissions));
          }

          if (document.getElementById('UserProfileImg') && user.img_url) {
            document.getElementById('UserProfileImg').src = user.img_url;
          }
          if (document.getElementById('AuthorizePersonProfileName')) {
            document.getElementById('AuthorizePersonProfileName').innerText = user.name || "No Name";
          }
          if (document.getElementById('EmailShow')) {
            document.getElementById('EmailShow').innerText = user.email || "No Email";
          }

          const isAdmin = (window.currentUserRole === 'admin' || window.currentUserRole === 'super_admin');
          if (document.getElementById('adminOnlyFinancialSections')) {
            document.getElementById('adminOnlyFinancialSections').style.display = isAdmin ? 'block' : 'none';
          }

          if (isAdmin) {
            document.querySelectorAll('[data-perm]').forEach(el => el.style.display = '');
            return;
          }

          let perms = window.currentUserPermissions;
          let role = window.currentUserRole;

          let effective = {
            pos: true,
            product: false,
            purchase: false,
            customer: false,
            expense: false,
            report: false,
            user: false
          };

          if (perms && typeof perms === 'object') {
            effective.pos = !!perms.pos;
            effective.product = !!perms.product;
            effective.purchase = !!perms.purchase;
            effective.customer = !!perms.customer;
            effective.expense = !!perms.expense;
            effective.report = !!perms.report;
            effective.user = !!perms.user;
          } else {
            if (role === 'manager') {
              effective = { pos: true, product: true, purchase: true, customer: true, expense: true, report: true, user: false };
            } else if (role === 'cashier') {
              effective = { pos: true, product: false, purchase: false, customer: false, expense: false, report: false, user: false };
            } else if (role === 'accountant') {
              effective = { pos: false, product: false, purchase: false, customer: true, expense: true, report: true, user: false };
            }
          }

          document.querySelectorAll('[data-perm]').forEach(el => {
            const key = el.getAttribute('data-perm');
            if (key && effective.hasOwnProperty(key)) {
              if (effective[key] === true) {
                el.style.display = '';
              } else {
                el.style.display = 'none';
              }
            }
          });

          const path = window.location.pathname;
          if (path.includes('admin-dashboard-user-role') && !effective.user) {
            window.location.href = effective.pos ? '/admin-dashboard-pos' : '/admin-dashboard';
          } else if (path.includes('admin-dashboard-product') && !effective.product) {
            window.location.href = effective.pos ? '/admin-dashboard-pos' : '/admin-dashboard';
          } else if ((path.includes('admin-dashboard-Purchase') || path.includes('admin-dashboard-supplier')) && !effective.purchase) {
            window.location.href = effective.pos ? '/admin-dashboard-pos' : '/admin-dashboard';
          }

        } catch (error) {
          console.error('Error applying user permissions:', error);
          if (error.response && error.response.status === 401) {
            unauthorized(401);
          }
        }
      }
    });
  </script>

  {{-- DatePicker Start --}}
  <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker.min.js"></script>
  <script src="{{ asset('back-end/assets/js/datepicker.js') }}" type="text/javascript"></script>
  {{-- DatePicker end --}}

  <!-- Popper.js for tooltips and popovers in Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <!-- XLSX.js for reading and writing Excel files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <!-- jsPDF for generating PDF documents -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <!-- jsPDF-AutoTable for adding tables to PDFs created with jsPDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.26/jspdf.plugin.autotable.min.js"></script>

  <!-- JAVASCRIPT -->
  <script src="{{ asset('back-end/assets/js/vendor/fontawesome.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/vendor/simplebar.min.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/full-screen-toggle.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/all-modals.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/table-funtion.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/app.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/style.js') }}"></script>

  <!-- Global Bangla Digit Conversion Utilities -->
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
        const eng = banglaToEngNum(val);
        const num = parseFloat(eng);
        return isNaN(num) ? defaultVal : num;
    }

    function parseBanglaInt(val, defaultVal = 0) {
        if (val === null || val === undefined || val === '') return defaultVal;
        const eng = banglaToEngNum(val);
        const num = parseInt(eng, 10);
        return isNaN(num) ? defaultVal : num;
    }

    // Universal Auto-Convert English Digits -> Bangla Digits & Strict Field Validation
    document.addEventListener('input', function(e) {
        const el = e.target;
        if (!el || (el.tagName !== 'INPUT' && el.tagName !== 'TEXTAREA')) return;

        const inputType = el.getAttribute('type');
        const inputMode = el.getAttribute('inputmode');
        const elId = (el.id || '').toLowerCase();
        const elClass = (el.className || '').toLowerCase();

        const isExcluded = (inputType === 'date' || inputType === 'time' || inputType === 'datetime-local' || inputType === 'password' || inputType === 'file' || inputType === 'checkbox' || inputType === 'radio' || elClass.includes('custom-flatpickr-input') || elClass.includes('flatpickr') || elId.includes('startdate') || elId.includes('enddate') || elId.includes('duecollectiondate'));
        if (isExcluded) return;

        let val = el.value;
        if (!val) return;

        const isNumericOnly = (inputMode === 'numeric' || inputMode === 'decimal' || inputType === 'number' || 
                               elClass.includes('calc-input') || elClass.includes('number-only') ||
                               elId.includes('qty') || elId.includes('price') || elId.includes('paid') || 
                               elId.includes('due') || ((elId.includes('mobile') || elId.includes('phone')) && !elId.includes('date')) || 
                               elId.includes('amount') || elId.includes('charge') || elId.includes('discount') || 
                               elId.includes('nid') || elId.includes('previousdue'));

        if (inputType === 'number') {
            let cleanVal = val.replace(/[^0-9\.]/g, '');
            if (cleanVal !== val) {
                el.value = cleanVal;
            }
            return;
        }

        let converted = engToBanglaNum(val);

        if (isNumericOnly) {
            const allowDecimal = !elId.includes('mobile') && !elId.includes('phone') && !elId.includes('nid');
            if (allowDecimal) {
                converted = converted.replace(/[^0-9.০-৯]/g, '');
                const parts = converted.split('.');
                if (parts.length > 2) {
                    converted = parts[0] + '.' + parts.slice(1).join('');
                }
            } else {
                converted = converted.replace(/[^0-9+০-৯]/g, '');
            }
        }

        if (converted !== val) {
            let start = null, end = null;
            try { start = el.selectionStart; end = el.selectionEnd; } catch(err) {}
            el.value = converted;
            if (start !== null && end !== null && (inputType === 'text' || inputType === 'search' || !inputType)) {
                try { el.setSelectionRange(start, end); } catch(err) {}
            }
            el.dispatchEvent(new Event('change', { bubbles: true }));
        }
    }, true);
  </script>

  <!-- Dynamic Low Stock Notification & Music Chime Script -->
  <script>
    let lastLowStockCount = 0;

    // Pleasant 4-note ascending chime sound using Web Audio API
    function playStockNotificationChime() {
      try {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        if (!AudioContext) return;
        const ctx = new AudioContext();
        if (ctx.state === 'suspended') {
          ctx.resume();
        }

        const playNote = (freq, startTime, duration) => {
          const osc = ctx.createOscillator();
          const gain = ctx.createGain();
          osc.type = 'sine';
          osc.frequency.setValueAtTime(freq, startTime);
          gain.gain.setValueAtTime(0.18, startTime);
          gain.gain.exponentialRampToValueAtTime(0.001, startTime + duration);
          osc.connect(gain);
          gain.connect(ctx.destination);
          osc.start(startTime);
          osc.stop(startTime + duration);
        };

        const now = ctx.currentTime;
        playNote(523.25, now, 0.18);
        playNote(659.25, now + 0.12, 0.18);
        playNote(783.99, now + 0.24, 0.18);
        playNote(1046.50, now + 0.36, 0.35);
      } catch (e) {
        console.log('Audio chime error:', e);
      }
    }

    async function loadLowStockNotifications(playSound = false) {
      try {
        const res = await axios.get('/admin-dashboard-low-stock-notifications');
        if (res.data && res.data.status === 'success') {
          const products = res.data.data || [];
          const count = res.data.count || 0;

          const badge = document.getElementById('noti-count-badge');
          const listContainer = document.getElementById('notification-items-list');

          if (badge) {
            if (count > 0) {
              badge.innerText = count;
              badge.style.display = 'inline-block';
            } else {
              badge.style.display = 'none';
            }
          }

          if (playSound && count > 0 && count > lastLowStockCount) {
            playStockNotificationChime();
          }

          if (listContainer) {
            if (count === 0) {
              listContainer.innerHTML = `
                <div class="text-center py-4 px-3">
                  <div class="rounded-circle bg-success-subtle text-success d-inline-flex p-3 mb-2">
                    <i class="fa-solid fa-circle-check fs-3"></i>
                  </div>
                  <h6 class="fw-bold text-success mb-1">সকল প্রোডাক্টের পর্যাপ্ত স্টক রয়েছে!</h6>
                  <p class="small text-muted mb-0">কোনো প্রোডাক্টের স্টক ১০ এর নিচে নেই</p>
                </div>
              `;
            } else {
              let html = '';
              products.forEach(p => {
                let codeDisplay = "N/A";
                if (p.product_code) {
                  try {
                    const parsed = JSON.parse(p.product_code);
                    if (Array.isArray(parsed)) {
                      codeDisplay = parsed.filter(Boolean).join(", ") || "N/A";
                    } else {
                      codeDisplay = String(parsed).replace(/[\[\]"']/g, '').trim() || "N/A";
                    }
                  } catch (e) {
                    codeDisplay = String(p.product_code).replace(/[\[\]"']/g, '').trim() || "N/A";
                  }
                }
                const isOutOfStock = (Number(p.quantity) <= 0);
                const unitText = p.unit_name ? p.unit_name : 'পিস';

                html += `
                  <a href="/admin-dashboard-low-stock-list" class="stock-noti-item">
                    <div class="item-icon-box" style="background: ${isOutOfStock ? '#fef2f2' : '#fffbeb'}; border: 1px solid ${isOutOfStock ? '#fecaca' : '#fef3c7'}; color: ${isOutOfStock ? '#dc2626' : '#d97706'};">
                      <i class="${isOutOfStock ? 'fa-solid fa-triangle-exclamation' : 'fa-solid fa-boxes-stacked'}"></i>
                    </div>
                    <div class="item-body">
                      <div class="item-row-top">
                        <span class="item-name" title="${p.product_name}">${p.product_name}</span>
                        <span class="item-badge ${isOutOfStock ? 'item-badge-danger' : 'item-badge-warning'}">
                          ${isOutOfStock ? 'স্টক শেষ!' : 'কম স্টক!'}
                        </span>
                      </div>
                      <div class="item-row-bottom">
                        <span class="item-code" title="${codeDisplay}">
                          <i class="fa-solid fa-barcode text-muted"></i> ${codeDisplay}
                        </span>
                        <span class="item-stock" style="color: ${isOutOfStock ? '#dc2626' : '#ea580c'};">
                          স্টক: <strong>${p.quantity}</strong> ${unitText}
                        </span>
                      </div>
                    </div>
                  </a>
                `;
              });
              listContainer.innerHTML = html;
            }
          }

          lastLowStockCount = count;
        }
      } catch (err) {
        console.log('Low stock notification fetch error:', err);
      }
    }

    // Modern Light / Dark Mode Toggle Function with Icon Switching
    function toggle_light_mode() {
      const body = document.body;
      const html = document.documentElement;
      const currentMode = body.getAttribute("light-mode") || localStorage.getItem("lightMode") || "light";
      const newMode = (currentMode === "dark") ? "light" : "dark";

      localStorage.setItem("lightMode", newMode);
      localStorage.setItem("layout-mode", newMode);

      body.setAttribute("light-mode", newMode);
      body.setAttribute("data-layout-mode", newMode);
      html.setAttribute("light-mode", newMode);

      const radioLight = document.getElementById("layout-mode-light");
      const radioDark = document.getElementById("layout-mode-dark");
      if (radioLight && radioDark) {
        if (newMode === "dark") {
          radioDark.checked = true;
        } else {
          radioLight.checked = true;
        }
      }
    }

    // Apply saved theme immediately
    (function() {
      const saved = localStorage.getItem("lightMode") || localStorage.getItem("layout-mode") || "light";
      if (saved === "dark") {
        document.body.setAttribute("light-mode", "dark");
        document.body.setAttribute("data-layout-mode", "dark");
        document.documentElement.setAttribute("light-mode", "dark");
      } else {
        document.body.setAttribute("light-mode", "light");
        document.body.setAttribute("data-layout-mode", "light");
        document.documentElement.setAttribute("light-mode", "light");
      }
    })();

    document.addEventListener("DOMContentLoaded", function() {
      loadLowStockNotifications(false);

      const bellBtn = document.getElementById('page-header-notifications-dropdown-v');
      if (bellBtn) {
        bellBtn.addEventListener('click', function() {
          loadLowStockNotifications(false);
        });
      }

      setInterval(() => {
        loadLowStockNotifications(false);
      }, 60000);
    });
  </script>

  <!-- Collapsed Sidebar Floating Flyout & Tooltip Portals (Direct children of body - immune to all container clipping) -->
  <div id="collapsed-flyout-portal" class="collapsed-flyout-portal"></div>
  <div id="collapsed-tooltip-portal" class="collapsed-tooltip-portal"></div>
</body>

</html>