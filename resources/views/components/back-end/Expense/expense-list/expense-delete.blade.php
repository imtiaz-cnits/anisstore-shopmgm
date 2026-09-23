<style>
    #confirmationModal {
        z-index: 108000 !important;
    }
    .modal-backdrop {
        z-index: 106500 !important;
    }
    #confirmationModal .modal-dialog {
        max-width: 440px;
    }
    #confirmationModal .modal-content {
        border-radius: 16px;
        border: none;
        overflow: hidden;
        background-color: #ffffff !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }
    #confirmationModal .modal-footer {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 10px !important;
        width: 100% !important;
    }
    #confirmationModal .modal-footer .btn {
        flex: 1 1 0 !important;
        white-space: nowrap !important;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }
    body[light-mode="dark"] #confirmationModal .modal-content,
    body[data-layout-mode="dark"] #confirmationModal .modal-content,
    html[light-mode="dark"] #confirmationModal .modal-content,
    html[data-layout-mode="dark"] #confirmationModal .modal-content,
    body.dark-mode #confirmationModal .modal-content,
    html.dark #confirmationModal .modal-content {
        background-color: #1e293b !important;
        color: #F3ECFB !important;
    }
    body[light-mode="dark"] #confirmationModal .text-dark,
    body[data-layout-mode="dark"] #confirmationModal .text-dark,
    html[light-mode="dark"] #confirmationModal .text-dark,
    html[data-layout-mode="dark"] #confirmationModal .text-dark,
    body.dark-mode #confirmationModal .text-dark,
    html.dark #confirmationModal .text-dark {
        color: #F3ECFB !important;
    }
</style>

<section class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 text-center">
            <div class="modal-header border-0 justify-content-center pb-0">
                <div class="rounded-circle bg-danger-subtle text-danger d-flex align-items-center justify-content-center mb-2" style="width: 56px; height: 56px;">
                    <i class="fa-solid fa-triangle-exclamation fs-3"></i>
                </div>
            </div>
            <div class="modal-body py-2">
                <h5 class="fw-bold text-dark mb-2">খরচ মুছে ফেলবেন?</h5>
                <p class="text-secondary small mb-0">আপনি কি নিশ্চিত যে এই খরচের রেকর্ডটি মুছে ফেলতে চান? এটি আর ফিরিয়ে আনা যাবে না।</p>
                <input type="hidden" id="deleteID" />
            </div>
            <div class="modal-footer border-0 justify-content-center p-0 pt-2 gap-2 w-100 flex-nowrap">
                <button type="button" class="btn py-2 px-3 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="border-radius: 8px; background-color: #ef4444 !important; border: none;">বাতিল</button>
                <button type="button" onclick="itemDelete()" class="btn btn-outline-danger py-2 px-3 fw-bold" style="border-radius: 8px;">
                    <i class="fa-solid fa-trash me-1"></i> হ্যাঁ, মুছে ফেলুন
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#confirmationModal').appendTo("body");
    });

    async function itemDelete() {
        try {
            let id = document.getElementById('deleteID').value;

            if (!id) {
                errorToast("Expense ID is missing. Please try again.");
                return;
            }

            showLoader();

            let res = await axios.post(
                "/api/delete-expense", {
                    id: id
                },
                HeaderToken()
            );

            hideLoader();

            if (res.data && res.data.status === "success") {
                successToast(res.data.message);
                $("#confirmationModal").modal('hide');

                if (typeof getExpenseList === 'function') {
                    await getExpenseList();
                } else {
                    setTimeout(() => location.reload(), 500);
                }
            } else {
                errorToast(res.data ? res.data.message : "Failed to delete expense.");
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            errorToast("An error occurred. Please try again.");
        }
    }
</script>
