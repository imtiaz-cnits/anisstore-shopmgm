<style>
    #confirmationModal {
        z-index: 105090 !important;
    }
    #confirmationModal.modal {
        position: fixed !important;
        inset: 0 !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        z-index: 105090 !important;
        overflow-x: hidden !important;
        overflow-y: auto !important;
        padding: 16px !important;
        margin: 0 !important;
        outline: 0 !important;
        box-sizing: border-box !important;
    }
    #confirmationModal.modal.show {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    #confirmationModal .modal-dialog {
        position: relative !important;
        transform: none !important;
        width: 100% !important;
        max-width: 400px !important;
        margin: auto !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        pointer-events: none !important;
        background: transparent !important;
        border: none !important;
    }
    #confirmationModal .modal-content {
        position: relative !important;
        display: flex !important;
        flex-direction: column !important;
        width: 100% !important;
        max-width: 400px !important;
        pointer-events: auto !important;
        background-color: #ffffff !important;
        border-radius: 18px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4) !important;
        padding: 24px !important;
        text-align: center !important;
        margin: auto !important;
    }
    body[light-mode="dark"] #confirmationModal .modal-content,
    body[data-layout-mode="dark"] #confirmationModal .modal-content,
    body.dark-mode #confirmationModal .modal-content {
        background-color: #1e293b !important;
        border: 1px solid #334155 !important;
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #confirmationModal #confirmationModalLabel,
    body[data-layout-mode="dark"] #confirmationModal #confirmationModalLabel,
    body.dark-mode #confirmationModal #confirmationModalLabel {
        color: #f8fafc !important;
    }
    body[light-mode="dark"] #confirmationModal .text-muted,
    body[data-layout-mode="dark"] #confirmationModal .text-muted,
    body.dark-mode #confirmationModal .text-muted {
        color: #94a3b8 !important;
    }
    body[light-mode="dark"] #confirmationModal .delete-icon-circle,
    body[data-layout-mode="dark"] #confirmationModal .delete-icon-circle,
    body.dark-mode #confirmationModal .delete-icon-circle {
        background-color: rgba(239, 68, 68, 0.18) !important;
        color: #f87171 !important;
    }
</style>

<section class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-4 text-center">
            <div class="delete-icon-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; border-radius: 50%; background: #FEE2E2; color: #DC2626;">
                <i class="fa-solid fa-trash-can fs-3"></i>
            </div>
            <h5 class="fw-bold text-dark mb-2" id="confirmationModalLabel">কাস্টমার মুছে ফেলতে চান?</h5>
            <p class="text-muted small mb-4">আপনি কি নিশ্চিত যে এই কাস্টমারটি মুছে ফেলতে চান? এটি মুছে ফেললে সংশ্লিষ্ট বকেয়া ও হিসাব প্রভাবিত হতে পারে।</p>
            <input type="hidden" id="deleteID" />
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn flex-grow-1 py-2 fw-bold text-white shadow-sm" data-bs-dismiss="modal" style="height: 44px; border-radius: 10px; background-color: #ef4444 !important; border: none;">
                    <i class="fa-solid fa-xmark me-1"></i> বাতিল
                </button>
                <button type="button" onclick="itemDelete()" class="btn flex-grow-1 py-2 fw-bold text-white shadow-sm" style="height: 44px; border-radius: 10px; background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important; border: none; box-shadow: 0 4px 12px rgba(140, 86, 212, 0.25);">
                    <i class="fa-solid fa-trash-can me-1"></i> মুছে ফেলুন
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
                errorToast("কাস্টমার আইডি পাওয়া যায়নি। আবার চেষ্টা করুন।");
                return;
            }

            showLoader();

            let res = await axios.post(
                "/api/delete-customer", {
                    id: id
                },
                HeaderToken()
            );

            hideLoader();

            if (res.data && res.data.status === "success") {
                successToast(res.data.message || "কাস্টমার সফলভাবে মুছে ফেলা হয়েছে।");
                $("#confirmationModal").modal('hide');

                if (typeof getList === 'function') {
                    getList();
                } else {
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                }
            } else {
                errorToast(res.data ? res.data.message : "কাস্টমার মুছতে ব্যর্থ হয়েছে।");
            }
        } catch (e) {
            hideLoader();
            console.error(e);
            errorToast((e.response && e.response.data && e.response.data.message) ? e.response.data.message : (e.message || "একটি ত্রুটি ঘটেছে। আবার চেষ্টা করুন।"));
        }
    }
</script>
