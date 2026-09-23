@extends('layouts.dashboard-sidenav')
@section('title','প্রোফাইল ও নিরাপত্তা সেটিংস - মেসার্স আনিস ষ্টোর')
@section('content')

<style>
    /* ===== User Profile Page Styling per rules.md (#8C56D4 Royal Purple) ===== */
    :root {
        --prof-primary: #8C56D4;
        --prof-primary-hover: #793FC5;
        --prof-primary-light: #FAF7FD;
        --prof-border-subtle: #E5D5F7;
    }

    /* Fixed Input Box to prevent global .input-group corruption */
    .prof-input-wrap {
        position: relative !important;
        width: 100% !important;
        display: flex !important;
        align-items: center !important;
    }

    .prof-input-icon {
        position: absolute !important;
        left: 14px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        font-size: 15px !important;
        color: #8C56D4 !important;
        pointer-events: none !important;
        z-index: 5 !important;
    }

    .prof-input-eye {
        position: absolute !important;
        right: 14px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        font-size: 15px !important;
        color: #64748b !important;
        cursor: pointer !important;
        z-index: 5 !important;
        background: transparent !important;
        border: none !important;
        padding: 0 !important;
    }
    .prof-input-eye:hover {
        color: #8C56D4 !important;
    }

    .prof-form-control {
        height: 44px !important;
        width: 100% !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding-left: 42px !important;
        padding-right: 42px !important;
        font-size: 14px !important;
        background-color: #ffffff !important;
        color: #1e293b !important;
        transition: all 0.2s ease !important;
        box-shadow: none !important;
    }

    .prof-form-control:focus {
        border-color: #8C56D4 !important;
        box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.15) !important;
        background: #ffffff !important;
        outline: none !important;
    }

    .prof-form-control:disabled {
        background-color: #f1f5f9 !important;
        cursor: not-allowed !important;
        opacity: 0.85 !important;
    }

    /* Top Horizontal Banner Card */
    .prof-banner-card {
        border-radius: 16px !important;
        background: #ffffff !important;
        border: 1px solid #E2E8F0 !important;
        box-shadow: 0 4px 18px rgba(140, 86, 212, 0.08) !important;
        height: auto !important;
        min-height: unset !important;
        max-height: none !important;
        padding: 20px 24px !important;
        /* Override Bootstrap .card flex-column stretch */
        flex: none !important;
        align-self: flex-start !important;
    }

    .prof-banner-card .card-body {
        height: auto !important;
        min-height: unset !important;
    }

    @media (max-width: 991.98px) {
        .prof-banner-card {
            padding: 14px 16px !important;
            margin-bottom: 14px !important;
        }
    }

    /* Dashboard button mobile padding fix */
    @media (max-width: 575.98px) {
        .prof-dashboard-btn {
            padding: 7px 12px !important;
            font-size: 12px !important;
        }
    }

    /* Section Cards */
    .prof-section-card {
        border-radius: 16px !important;
        background: #ffffff !important;
        border: 1px solid #E2E8F0 !important;
        box-shadow: 0 4px 18px rgba(140, 86, 212, 0.06) !important;
    }

    /* Avatar Upload Button */
    .prof-avatar-btn {
        position: absolute !important;
        bottom: -2px !important;
        right: -2px !important;
        width: 28px !important;
        height: 28px !important;
        border-radius: 50% !important;
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        box-shadow: 0 2px 8px rgba(140, 86, 212, 0.4) !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        border: 2px solid #ffffff !important;
        font-size: 11px !important;
    }
    .prof-avatar-btn:hover {
        transform: scale(1.1);
    }

    /* Info Icons & Meta Cards in Banner */
    .prof-meta-card {
        background: #FAF7FD;
        border: 1px solid #E5D5F7;
        border-radius: 12px;
        transition: all 0.2s ease;
    }
    .prof-meta-card:hover {
        border-color: #8C56D4;
        background: #F3ECFB;
    }

    .prof-info-icon-box {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #F3ECFB;
        color: #8C56D4;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    @media (max-width: 575.98px) {
        .prof-info-icon-box {
            width: 24px !important;
            height: 24px !important;
            font-size: 10px !important;
        }
        .prof-meta-card {
            padding: 6px 6px !important;
        }
    }

    /* Action Buttons */
    .prof-btn-save {
        background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 10px !important;
        height: 44px !important;
        padding: 0 24px !important;
        font-weight: 700 !important;
        font-size: 14px !important;
        box-shadow: 0 4px 14px rgba(140, 86, 212, 0.3) !important;
        transition: all 0.2s ease !important;
    }
    .prof-btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(140, 86, 212, 0.45) !important;
        color: #ffffff !important;
    }

    .prof-btn-reset {
        height: 44px !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        background: #ffffff !important;
        color: #475569 !important;
        font-weight: 600 !important;
        padding: 0 20px !important;
        transition: all 0.2s ease !important;
    }
    .prof-btn-reset:hover {
        background: #f8fafc !important;
        color: #1e293b !important;
    }

    /* Mobile view zero padding */
    @media (max-width: 991.98px) {
        .page-content {
            background-color: #ffffff !important;
            padding: 10px !important;
        }
    }

    /* ===== Universal Dark Mode Rules per rules.md ===== */
    body[light-mode="dark"] .page-content,
    body[data-layout-mode="dark"] .page-content,
    html[light-mode="dark"] .page-content,
    html[data-layout-mode="dark"] .page-content,
    body.dark-mode .page-content {
        background-color: #0f172a !important;
    }

    body[light-mode="dark"] .prof-banner-card,
    body[data-layout-mode="dark"] .prof-banner-card,
    body.dark-mode .prof-banner-card,
    html[light-mode="dark"] .prof-banner-card,
    html[data-layout-mode="dark"] .prof-banner-card,
    body[light-mode="dark"] .prof-section-card,
    body[data-layout-mode="dark"] .prof-section-card,
    body.dark-mode .prof-section-card,
    html[light-mode="dark"] .prof-section-card,
    html[data-layout-mode="dark"] .prof-section-card {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .prof-section-card .card-header,
    body[data-layout-mode="dark"] .prof-section-card .card-header,
    body.dark-mode .prof-section-card .card-header,
    html[light-mode="dark"] .prof-section-card .card-header,
    html[data-layout-mode="dark"] .prof-section-card .card-header {
        background-color: #1e293b !important;
        border-bottom-color: #334155 !important;
    }

    body[light-mode="dark"] .prof-form-control,
    body[data-layout-mode="dark"] .prof-form-control,
    body.dark-mode .prof-form-control,
    html[light-mode="dark"] .prof-form-control,
    html[data-layout-mode="dark"] .prof-form-control {
        background-color: #0f172a !important;
        border-color: #334155 !important;
        color: #f8fafc !important;
    }

    body[light-mode="dark"] .prof-form-control:disabled,
    body[data-layout-mode="dark"] .prof-form-control:disabled,
    body.dark-mode .prof-form-control:disabled {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #94a3b8 !important;
    }

    body[light-mode="dark"] .prof-info-icon-box,
    body[data-layout-mode="dark"] .prof-info-icon-box,
    body.dark-mode .prof-info-icon-box {
        background-color: #260B4A !important;
        color: #D2B7F1 !important;
    }

    body[light-mode="dark"] .prof-meta-card,
    body[data-layout-mode="dark"] .prof-meta-card,
    body.dark-mode .prof-meta-card,
    html[light-mode="dark"] .prof-meta-card,
    html[data-layout-mode="dark"] .prof-meta-card {
        background-color: #0f172a !important;
        border-color: #334155 !important;
    }
    body[light-mode="dark"] .prof-meta-card:hover,
    body[data-layout-mode="dark"] .prof-meta-card:hover,
    body.dark-mode .prof-meta-card:hover,
    html[light-mode="dark"] .prof-meta-card:hover,
    html[data-layout-mode="dark"] .prof-meta-card:hover {
        border-color: #8C56D4 !important;
        background-color: #1e293b !important;
    }

    body[light-mode="dark"] .prof-avatar-btn,
    body[data-layout-mode="dark"] .prof-avatar-btn,
    body.dark-mode .prof-avatar-btn {
        border-color: #1e293b !important;
    }

    body[light-mode="dark"] .prof-btn-reset,
    body[data-layout-mode="dark"] .prof-btn-reset,
    body.dark-mode .prof-btn-reset {
        background-color: #1e293b !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }

    body[light-mode="dark"] .text-dark,
    body[data-layout-mode="dark"] .text-dark,
    body.dark-mode .text-dark,
    html[light-mode="dark"] .text-dark,
    html[data-layout-mode="dark"] .text-dark {
        color: #F3ECFB !important;
    }

    body[light-mode="dark"] .border-bottom,
    body[data-layout-mode="dark"] .border-bottom,
    body.dark-mode .border-bottom,
    body[light-mode="dark"] .border-top,
    body[data-layout-mode="dark"] .border-top,
    body.dark-mode .border-top,
    body[light-mode="dark"] .border,
    body[data-layout-mode="dark"] .border,
    body.dark-mode .border {
        border-color: #334155 !important;
    }
</style>

<div class="main-content">
    <div class="page-content" style="padding: 10px !important;">
        <div class="container-fluid px-0">

            <!-- Profile Page Header (Side-by-side on mobile without description) -->
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom flex-nowrap gap-2">
                <div class="d-flex align-items-center gap-2 overflow-hidden">
                    <span style="display: inline-block; width: 4.5px; height: 26px; background: #8C56D4; border-radius: 2px; margin-right: 4px; flex-shrink: 0;"></span>
                    <div class="rounded-3 d-none d-sm-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; background: #F3ECFB; color: #8C56D4;">
                        <i class="fa-solid fa-user-gear fs-6"></i>
                    </div>
                    <div class="overflow-hidden">
                        <h4 class="fw-bold text-dark mb-0 text-truncate" style="font-size: 18px; line-height: 1.3;">
                            <span>প্রোফাইল ও নিরাপত্তা সেটিংস</span>
                        </h4>
                    </div>
                </div>
                <div class="flex-shrink-0" style="padding: 0 0 0 8px;">
                    <a href="/admin-dashboard" class="btn prof-dashboard-btn fw-bold d-inline-flex align-items-center gap-2" style="border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; color: #ffffff !important; border: none; font-size: 13px; padding: 8px 16px; box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25); white-space: nowrap;">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>ড্যাশবোর্ড</span>
                    </a>
                </div>
            </div>

            <!-- Top Profile Banner Card (Image on left, details on right, 1 row on mobile & tablet) -->
            <div class="card prof-banner-card mb-3 mb-md-4">
                <div class="row align-items-center g-2 g-md-3">
                    <!-- Left: Small Avatar (68px) + Name & Role Badge -->
                    <div class="col-12 col-md-5 col-lg-4 mb-2 mb-md-0">
                        <div class="d-flex align-items-center">
                            <!-- Avatar Container with clear right gap on mobile -->
                            <div class="position-relative flex-shrink-0 me-3 me-sm-4">
                                <div class="rounded-circle overflow-hidden shadow-sm border border-2 border-white" style="width: 68px; height: 68px;">
                                    <img id="userProfileImage" src="/assets/img/default-avatar.png" alt="Profile Avatar" class="w-100 h-100 object-fit-cover" />
                                </div>
                                <label for="UpdatedProfileImage" class="prof-avatar-btn" title="ছবি পরিবর্তন করুন">
                                    <i class="fa-solid fa-camera"></i>
                                </label>
                                <input type="file" id="UpdatedProfileImage" accept="image/png, image/jpeg, image/gif" class="d-none" onchange="previewImage(event)" />
                            </div>
                            <!-- Name & Badge -->
                            <div class="overflow-hidden">
                                <h5 id="sidebarUserName" class="fw-bold text-dark mb-1 text-truncate" style="font-size: 16px;">লোড হচ্ছে...</h5>
                                <span class="badge px-2.5 py-1 rounded-pill fw-bold d-inline-block" style="background: #F3ECFB; color: #8C56D4; border: 1px solid #E5D5F7; font-size: 11px;">
                                    <i class="fa-solid fa-shield-halved me-1"></i> শপ অ্যাডমিনিস্ট্রেটর
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: 3 Info items side-by-side (1 Row on mobile & tablet) -->
                    <div class="col-12 col-md-7 col-lg-8 pt-1 pt-md-0">
                        <div class="row g-1.5 g-sm-2 text-start">
                            <!-- ইমেইল এড্রেস -->
                            <div class="col-4">
                                <div class="prof-meta-card p-2 d-flex align-items-center gap-1.5 gap-sm-2">
                                    <div class="prof-info-icon-box flex-shrink-0">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="overflow-hidden" style="min-width: 0;">
                                        <small class="text-muted d-block text-truncate fw-semibold" style="font-size: 10px;">ইমেইল এড্রেস</small>
                                        <span id="sidebarUserEmail" class="fw-bold text-dark text-truncate d-block" style="font-size: 11.5px;" title="admin@anisstore.com">admin@anisstore.com</span>
                                    </div>
                                </div>
                            </div>

                            <!-- মোবাইল নম্বর -->
                            <div class="col-4">
                                <div class="prof-meta-card p-2 d-flex align-items-center gap-1.5 gap-sm-2">
                                    <div class="prof-info-icon-box flex-shrink-0">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="overflow-hidden" style="min-width: 0;">
                                        <small class="text-muted d-block text-truncate fw-semibold" style="font-size: 10px;">মোবাইল নম্বর</small>
                                        <span id="sidebarUserMobile" class="fw-bold text-dark text-truncate d-block" style="font-size: 11.5px;" title="01700000000">01700000000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- স্টোর অবস্থান -->
                            <div class="col-4">
                                <div class="prof-meta-card p-2 d-flex align-items-center gap-1.5 gap-sm-2">
                                    <div class="prof-info-icon-box flex-shrink-0">
                                        <i class="fa-solid fa-store"></i>
                                    </div>
                                    <div class="overflow-hidden" style="min-width: 0;">
                                        <small class="text-muted d-block text-truncate fw-semibold" style="font-size: 10px;">স্টোর অবস্থান</small>
                                        <span class="fw-bold text-dark text-truncate d-block" style="font-size: 11.5px;" title="মেসার্স আনিস ষ্টোর">মেসার্স আনিস ষ্টোর</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Edit Form (Personal Info & Security in responsive layout) -->
            <form onsubmit="event.preventDefault(); onUpdate();">
                <div class="row g-3 g-lg-4 mb-4">
                    
                    <!-- Left: Personal Details Card -->
                    <div class="col-12 col-lg-6">
                        <div class="card prof-section-card h-100 overflow-hidden">
                            <div class="card-header bg-white py-3 border-0">
                                <h5 class="fw-bold text-dark mb-0 fs-6 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-id-card" style="color: #8C56D4;"></i>
                                    <span>ব্যক্তিগত তথ্য (Personal Information)</span>
                                </h5>
                            </div>
                            <div class="card-body p-3 p-md-4 pt-0">
                                <div class="row g-3">
                                    <!-- পূর্ণ নাম -->
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-muted small mb-1">পূর্ণ নাম <span class="text-danger">*</span></label>
                                        <div class="prof-input-wrap">
                                            <i class="fa-solid fa-user prof-input-icon"></i>
                                            <input type="text" id="userProfileFullName" class="prof-form-control fw-semibold" placeholder="পূর্ণ নাম লিখুন" required />
                                        </div>
                                    </div>

                                    <!-- মোবাইল নম্বর -->
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-muted small mb-1">মোবাইল নম্বর <span class="text-danger">*</span></label>
                                        <div class="prof-input-wrap">
                                            <i class="fa-solid fa-phone prof-input-icon"></i>
                                            <input type="text" id="userMobileNumber" inputmode="numeric" pattern="[0-9]*" class="prof-form-control fw-semibold" placeholder="017XXXXXXXX" required />
                                        </div>
                                    </div>

                                    <!-- ইমেইল এড্রেস -->
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-muted small mb-1">ইমেইল এড্রেস</label>
                                        <div class="prof-input-wrap">
                                            <i class="fa-solid fa-envelope prof-input-icon"></i>
                                            <input type="email" id="userEmail" class="prof-form-control fw-semibold" placeholder="user@domain.com" disabled />
                                        </div>
                                        <small class="text-muted mt-1 d-block" style="font-size: 11px;">
                                            <i class="fa-solid fa-circle-info me-1" style="color: #8C56D4;"></i> ইমেইল এড্রেস লগইন সনাক্তকরণের জন্য ব্যবহৃত হয় এবং পরিবর্তনযোগ্য নয়।
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Security & Change Password Card -->
                    <div class="col-12 col-lg-6">
                        <div class="card prof-section-card h-100 overflow-hidden">
                            <div class="card-header bg-white py-3 border-0">
                                <h5 class="fw-bold text-dark mb-0 fs-6 d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-lock text-danger"></i>
                                    <span>পাসওয়ার্ড পরিবর্তন (Security & Password)</span>
                                </h5>
                            </div>
                            <div class="card-body p-3 p-md-4 pt-0">
                                <div class="row g-3">
                                    <!-- নতুন পাসওয়ার্ড -->
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-muted small mb-1">নতুন পাসওয়ার্ড</label>
                                        <div class="prof-input-wrap">
                                            <i class="fa-solid fa-key prof-input-icon"></i>
                                            <input type="password" id="newPassword" class="prof-form-control fw-semibold" placeholder="অপরিবর্তিত রাখতে ফাঁকা রাখুন" />
                                            <button type="button" class="prof-input-eye" onclick="togglePassword('newPassword')" title="পাসওয়ার্ড দেখুন">
                                                <i class="fa-solid fa-eye" id="newPassword_icon"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- পাসওয়ার্ড নিশ্চিত করুন -->
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-muted small mb-1">পাসওয়ার্ড নিশ্চিত করুন</label>
                                        <div class="prof-input-wrap">
                                            <i class="fa-solid fa-key prof-input-icon"></i>
                                            <input type="password" id="confirmPassword" class="prof-form-control fw-semibold" placeholder="নতুন পাসওয়ার্ড নিশ্চিত করুন" />
                                            <button type="button" class="prof-input-eye" onclick="togglePassword('confirmPassword')" title="পাসওয়ার্ড দেখুন">
                                                <i class="fa-solid fa-eye" id="confirmPassword_icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Submit Button Bar -->
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <button type="reset" class="prof-btn-reset">রিসেট</button>
                    <button type="submit" class="prof-btn-save d-inline-flex align-items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>তথ্য সংরক্ষণ করুন</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('userProfileImage').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        getProfile();
    });

    async function getProfile() {
        try {
            if (typeof showLoader === "function") showLoader();
            let res = await axios.get("/user-profile", HeaderToken());
            if (typeof hideLoader === "function") hideLoader();

            let data = res.data;

            const avatarSrc = data.img_url || "/assets/img/default-avatar.png";
            document.getElementById("userProfileImage").src = avatarSrc;
            document.getElementById("userProfileFullName").value = data.name || '';
            document.getElementById("userEmail").value = data.email || '';
            document.getElementById("userMobileNumber").value = data.mobile || '';

            // Update Profile Banner Summary
            document.getElementById("sidebarUserName").innerText = data.name || 'অ্যাডমিন ইউজার';
            document.getElementById("sidebarUserEmail").innerText = data.email || 'N/A';
            document.getElementById("sidebarUserMobile").innerText = data.mobile || 'N/A';

        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error("Profile Fetch Error:", e);
            if (typeof unauthorized === "function" && e.response) {
                unauthorized(e.response.status);
            }
        }
    }

    async function onUpdate() {
        let formData = new FormData();

        formData.append("email", document.getElementById('userEmail').value);
        formData.append("name", document.getElementById('userProfileFullName').value);
        formData.append("mobile", document.getElementById('userMobileNumber').value);
        formData.append("password", document.getElementById('newPassword').value);
        formData.append("password_confirmation", document.getElementById('confirmPassword').value);

        const fileInput = document.getElementById('UpdatedProfileImage');
        if (fileInput.files.length > 0) {
            formData.append("img", fileInput.files[0]);
        }

        try {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };
            if (typeof showLoader === "function") showLoader();

            let res = await axios.post("/user-update", formData, config);
            if (typeof hideLoader === "function") hideLoader();

            if (res.data && res.data['status'] === "success") {
                if (typeof successToast === "function") successToast(res.data['message']);
                await getProfile();
            } else {
                if (typeof errorToast === "function") errorToast(res.data['message'] || 'আপডেট করতে ব্যর্থ হয়েছে!');
                else alert(res.data['message'] || 'আপডেট করতে ব্যর্থ হয়েছে!');
            }
        } catch (error) {
            if (typeof hideLoader === "function") hideLoader();
            console.error("Update Error:", error);
            if (typeof unauthorized === "function" && error.response) {
                unauthorized(error.response.status);
            }
        }
    }

    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId + "_icon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

@endsection
