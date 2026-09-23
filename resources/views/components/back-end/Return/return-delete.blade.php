<style>
    #returnDeleteModal {
        z-index: 108000 !important;
    }
    #returnDeleteModal .modal-dialog {
        max-width: 440px;
    }
    #returnDeleteModal .modal-content {
        border-radius: 16px;
        border: none;
        overflow: hidden;
        background-color: #ffffff !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }
    #returnDeleteModal .modal-footer {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 10px !important;
        width: 100% !important;
    }
    #returnDeleteModal .modal-footer .btn {
        flex: 1 1 0 !important;
        white-space: nowrap !important;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }
    body[light-mode="dark"] #returnDeleteModal .modal-content,
    body[data-layout-mode="dark"] #returnDeleteModal .modal-content,
    html[light-mode="dark"] #returnDeleteModal .modal-content,
    html[data-layout-mode="dark"] #returnDeleteModal .modal-content,
    body.dark-mode #returnDeleteModal .modal-content,
    html.dark #returnDeleteModal .modal-content {
        background-color: #1e293b !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] #returnDeleteModal .text-dark,
    body[data-layout-mode="dark"] #returnDeleteModal .text-dark,
    html[light-mode="dark"] #returnDeleteModal .text-dark,
    html[data-layout-mode="dark"] #returnDeleteModal .text-dark,
    body.dark-mode #returnDeleteModal .text-dark,
    html.dark #returnDeleteModal .text-dark {
        color: #F3ECFB !important;
    }
</style>

<section class="modal fade" id="returnDeleteModal" tabindex="-1" aria-labelledby="returnDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 text-center">
            <div class="modal-header border-0 justify-content-center pb-0">
                <div class="rounded-circle bg-danger-subtle text-danger d-flex align-items-center justify-content-center mb-2" style="width: 56px; height: 56px;">
                    <i class="fa-solid fa-triangle-exclamation fs-3"></i>
                </div>
            </div>
            <div class="modal-body py-2">
                <h5 class="fw-bold text-dark mb-2">রিটার্ন রেকর্ড মুছে ফেলবেন?</h5>
                <p class="text-secondary small mb-0">আপনি কি নিশ্চিত যে এই রিটার্ন রেকর্ডটি মুছে ফেলতে চান? এটি আর ফিরিয়ে আনা যাবে না।</p>
                <input type="hidden" id="deleteReturnID" />
            </div>
            <div class="modal-footer border-0 justify-content-center p-0 pt-2 gap-2 w-100 flex-nowrap">
                <button type="button" class="btn py-2 px-3 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="border-radius: 8px; background-color: #ef4444 !important; border: none;">বাতিল</button>
                <button type="button" onclick="confirmDeleteReturn()" class="btn btn-outline-danger py-2 px-3 fw-bold" style="border-radius: 8px;">
                    <i class="fa-solid fa-trash me-1"></i> হ্যাঁ, মুছে ফেলুন
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#returnDeleteModal').appendTo("body");
    });

    function triggerDeleteReturn(id) {
        document.getElementById('deleteReturnID').value = id;
        $('#returnDeleteModal').modal('show');
    }

    async function confirmDeleteReturn() {
        try {
            let id = document.getElementById('deleteReturnID').value;

            if (!id) {
                if (typeof errorToast === 'function') errorToast("রিটার্ন আইডি পাওয়া যায়নি।");
                return;
            }

            if (typeof showLoader === "function") showLoader();

            let res = await axios.post(
                "/api/delete-return", {
                    id: id,
                    mode: typeof activeReturnTab !== 'undefined' ? activeReturnTab : 'sales'
                },
                HeaderToken()
            );

            if (typeof hideLoader === "function") hideLoader();

            if (res.data && res.data.status === "success") {
                if (typeof successToast === 'function') successToast(res.data.message);
                $("#returnDeleteModal").modal('hide');

                if (typeof fetchActiveReturnList === 'function') {
                    await fetchActiveReturnList();
                } else {
                    setTimeout(() => location.reload(), 500);
                }
            } else {
                if (typeof errorToast === 'function') errorToast(res.data ? res.data.message : "রিটার্ন মুছতে ব্যর্থ হয়েছে।");
            }
        } catch (e) {
            if (typeof hideLoader === "function") hideLoader();
            console.error("Delete Return Error:", e);
            if (typeof errorToast === 'function') errorToast("একটি সমস্যা হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।");
        }
    }
</script>
