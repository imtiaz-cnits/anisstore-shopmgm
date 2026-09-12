// Create Product modal to New Brand Modal Start................
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".newbrand");
    const openModalBtn = document.querySelector(".newbrand-open");
    if (!modal || !openModalBtn) return;
    const closeModalBtn = modal.querySelector(".newbrand-close");
    const cancelBtn = modal.querySelector(".cancel-btn");

    if (openModalBtn) {
      openModalBtn.addEventListener("click", () => {
        modal.classList.add("show");
      });
    }

    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", () => {
        modal.classList.remove("show");
      });
    }

    if (cancelBtn) {
      cancelBtn.addEventListener("click", () => {
        modal.classList.remove("show");
      });
    }

    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("show");
      }
    });
});

// Create Product modal to New Category Modal End................
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".newcategory");
    const openModalBtn = document.querySelector(".newcategory-open");
    if (!modal || !openModalBtn) return;
    const closeModalBtn = modal.querySelector(".newcategory-close");

    openModalBtn.addEventListener("click", () => {
      modal.classList.add("show");
    });

    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", () => {
        modal.classList.remove("show");
      });
    }

    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("show");
      }
    });
});

// Draft Delete Confirmation Modal Start....................
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("confirmationModal");
    if (!modal) return;
    const deleteButtons = document.querySelectorAll(".deleteButton");
    const confirmButtons = [
        document.getElementById("confirmYes"),
        document.getElementById("confirmNo"),
    ].filter(Boolean);

    const openModal = () => {
        modal.style.display = "flex";
        document.body.style.overflow = "hidden";
        document.documentElement.style.overflow = "hidden";
    };

    const closeModal = () => {
        modal.style.display = "none";
        const backdrops = document.querySelectorAll(".modal-backdrop");
        backdrops.forEach((backdrop) => backdrop.remove());
        document.body.style.overflow = "";
        document.documentElement.style.overflow = "";
    };

    deleteButtons.forEach((button) => {
        button.addEventListener("click", openModal);
    });

    confirmButtons.forEach((button) => {
        button.addEventListener("click", closeModal);
    });

    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
});

// Table Action Edit Modal Start....................
document.addEventListener("DOMContentLoaded", () => {
    const editModal = document.getElementById("editModal");
    if (!editModal) return;
    const editButtons = document.querySelectorAll(".editButton");
    const closeModalButtons = document.querySelectorAll(".close");

    const openModal = () => {
      editModal.style.display = "flex";
      document.body.style.overflow = "hidden";
    };

    const closeModal = () => {
      editModal.style.display = "none";
      document.body.style.overflow = "";
    };

    editButtons.forEach((button) => {
      button.addEventListener("click", openModal);
    });

    closeModalButtons.forEach((button) => {
      button.addEventListener("click", closeModal);
    });

    window.addEventListener("click", (event) => {
      if (event.target === editModal) {
        closeModal();
      }
    });
});

// Create Product Modal Start........
document.addEventListener("DOMContentLoaded", () => {
    function createModal(modalId, btnId, closeClass) {
      const modal = document.getElementById(modalId);
      const btn = document.getElementById(btnId);
      if (!modal || !btn) return;
      const closeBtn = modal.getElementsByClassName(closeClass)[0];

      btn.addEventListener('click', function () {
        modal.style.display = "block";
        document.documentElement.style.overflowY = "hidden";
      });

      if (closeBtn) {
        closeBtn.onclick = function () {
          modal.style.display = "none";
          document.documentElement.style.overflowY = "auto";
        };
      }

      window.addEventListener('click', function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
          document.documentElement.style.overflowY = "auto";
        }
      });
    }

    createModal("createProduct", "openModalBtns", "closes");
});

// Finance Pop Up Modal Start.............
document.addEventListener("DOMContentLoaded", () => {
    function createModal(modalId, btnId, closeClass) {
      const modal = document.getElementById(modalId);
      const btn = document.getElementById(btnId);
      if (!modal || !btn) return;
      const closeBtn = modal.getElementsByClassName(closeClass)[0];

      btn.onclick = function () {
        modal.style.display = "block";
        document.documentElement.style.overflowY = "hidden";
      };

      if (closeBtn) {
        closeBtn.onclick = function () {
          modal.style.display = "none";
          document.documentElement.style.overflowY = "auto";
        };
      }

      window.addEventListener('click', function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
          document.documentElement.style.overflowY = "auto";
        }
      });
    }

    createModal("myModal", "openModalBtn", "close");
});

// Add New Product Modal Start................
document.addEventListener("DOMContentLoaded", () => {
  const openAddProductModal = document.getElementById("addProductButton");
  const closeAddProductModal = document.getElementById("closeAddProductModal");
  const addProductModal = document.querySelector(".add-product-modal");

  if (openAddProductModal && addProductModal) {
    openAddProductModal.addEventListener("click", () => {
      document.body.style.overflow = "hidden";
      addProductModal.style.display = "flex";
      setTimeout(() => addProductModal.classList.add("show"), 10);
    });
  }

  if (closeAddProductModal && addProductModal) {
    closeAddProductModal.addEventListener("click", () => {
      addProductModal.classList.remove("show");
      setTimeout(() => {
        addProductModal.style.display = "none";
        document.body.style.overflow = "";
      }, 300);
    });
  }

  if (addProductModal) {
    window.addEventListener("click", (e) => {
      if (e.target === addProductModal && closeAddProductModal) {
        closeAddProductModal.click();
      }
    });
  }
});

// Add New Product modal to Add New Warehouse Modal Start................
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".addnewwarehouse");
    const openModalBtn = document.querySelector(".addnewwarehouse-open");
    if (!modal || !openModalBtn) return;
    const closeModalBtn = modal.querySelector(".addnewwarehouse-close");

    openModalBtn.addEventListener("click", () => {
      modal.classList.add("show");
    });

    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", () => {
        modal.classList.remove("show");
      });
    }

    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("show");
      }
    });
});

// Add New Product modal to Add Customer Modal Start................
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".addnewbrand");
    const openModalBtn = document.querySelector(".addnewbrand-open");
    if (!modal || !openModalBtn) return;
    const closeModalBtn = modal.querySelector(".addnewbrand-close");

    openModalBtn.addEventListener("click", () => {
      modal.classList.add("show");
    });

    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", () => {
        modal.classList.remove("show");
      });
    }

    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("show");
      }
    });
});

// Add New Product modal to Add New Select Supplier Modal start.................
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".selectsupplier-modal");
    const openModalBtn = document.querySelector(".selectsupplier-modal-open");
    if (!modal || !openModalBtn) return;
    const closeModalBtn = modal.querySelector(".selectsupplier-modal-close");

    openModalBtn.addEventListener("click", () => {
      modal.classList.add("show");
    });

    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", () => {
        modal.classList.remove("show");
      });
    }

    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("show");
      }
    });
});

// Add New Product modal to Add New Select Unit Modal Start.................
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".selectunit-modal");
    const openModalBtn = document.querySelector(".selectunit-modal-open");
    if (!modal || !openModalBtn) return;
    const closeModalBtn = modal.querySelector(".selectunit-modal-close");

    openModalBtn.addEventListener("click", () => {
      modal.classList.add("show");
    });

    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", () => {
        modal.classList.remove("show");
      });
    }

    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("show");
      }
    });
});

// Add New Product modal to Add New Category Modal Start................
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector(".addnewcategory");
    const openModalBtn = document.querySelector(".addnewcategory-open");
    if (!modal || !openModalBtn) return;
    const closeModalBtn = modal.querySelector(".addnewcategory-close");

    openModalBtn.addEventListener("click", () => {
      modal.classList.add("show");
    });

    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", () => {
        modal.classList.remove("show");
      });
    }

    modal.addEventListener("click", (event) => {
      if (event.target === modal) {
        modal.classList.remove("show");
      }
    });
});

// Recent Draft modal open close Start..........
document.addEventListener("DOMContentLoaded", function () {
    const orderModal = document.querySelector(".recent-draft-modal-wrapper");
    const openModalBtn = document.getElementById("recent-draftModal");
    const closeModalBtn = document.querySelector(".button-close");

    if (orderModal && openModalBtn) {
      openModalBtn.addEventListener("click", function () {
        orderModal.classList.add("show");
        orderModal.classList.remove("hide");
      });
    }

    if (orderModal && closeModalBtn) {
      closeModalBtn.addEventListener("click", function () {
        orderModal.classList.add("hide");
        setTimeout(() => {
          orderModal.classList.remove("show");
          orderModal.classList.remove("hide");
        }, 300);
      });
    }

    if (orderModal) {
      orderModal.addEventListener("click", function (e) {
        if (e.target === orderModal) {
          orderModal.classList.add("hide");
          setTimeout(() => {
            orderModal.classList.remove("show");
            orderModal.classList.remove("hide");
          }, 300);
        }
      });
    }

    const orderItems = document.querySelectorAll(".order-item");
    const orderDetails = document.querySelectorAll(".order-details");
    const orderSummaries = document.querySelectorAll(".order-summary");

    orderItems.forEach((orderItem) => {
      orderItem.addEventListener("click", function () {
        const orderId = orderItem.dataset.order;
        orderItems.forEach((item) => item.classList.remove("active"));
        orderItem.classList.add("active");
        orderDetails.forEach((orderDetail) => {
          if (orderDetail.id === `order-${orderId}`) {
            orderDetail.classList.remove("hidden");
          } else {
            orderDetail.classList.add("hidden");
          }
        });
        orderSummaries.forEach((orderSummary) => {
          if (orderSummary.id === `summary-${orderId}`) {
            orderSummary.classList.remove("hidden");
          } else {
            orderSummary.classList.add("hidden");
          }
        });
      });
    });
});

// Recent Draft Table Function Start.............
document.addEventListener("DOMContentLoaded", function () {
    const orderItems = document.querySelectorAll(".order-item");
    const orderDetails = document.querySelectorAll(".order-details");
    const orderSummaries = document.querySelectorAll(".order-summary");

    if (orderItems.length === 0) return;

    function calculateSubtotal(orderId) {
      const tableRows = document.querySelectorAll(`#order-${orderId} tbody tr`);
      let subtotal = 0;

      tableRows.forEach((row) => {
        const qty = parseInt(row.cells[2].textContent, 10);
        const price = parseFloat(row.cells[3].textContent.replace("$", ""));
        subtotal += qty * price;
      });

      const summarySubtotal = document.querySelector(`#summary-${orderId} p strong`);
      if (summarySubtotal) {
        summarySubtotal.textContent = `Sub-Total: $${subtotal.toFixed(2)}`;
      }

      const discountPercent = orderId === "1" ? 3 : 5;
      const discountAmount = (subtotal * discountPercent) / 100;
      const shippingCost = 20;
      const tax = 0;

      const summary = document.getElementById(`summary-${orderId}`);
      if (summary) {
        summary.innerHTML = `
        <p><strong>Sub-Total:</strong> $${subtotal.toFixed(2)}</p>
        <p><strong>Tax (0.0%):</strong> $${tax.toFixed(2)}</p>
        <p><strong>Discount (${discountPercent}%):</strong> $${discountAmount.toFixed(2)}</p>
        <p><strong>Shipping Cost:</strong> $${shippingCost.toFixed(2)}</p>
      `;
      }
    }

    function showOrder(orderId) {
      orderDetails.forEach((table) => table.classList.add("hidden"));
      orderSummaries.forEach((summary) => summary.classList.add("hidden"));
      orderItems.forEach((item) => item.classList.remove("active"));

      const targetOrder = document.getElementById(`order-${orderId}`);
      const targetSummary = document.getElementById(`summary-${orderId}`);
      const targetItem = document.querySelector(`#order-item-${orderId}`);

      if (targetOrder) targetOrder.classList.remove("hidden");
      if (targetSummary) targetSummary.classList.remove("hidden");
      if (targetItem) targetItem.classList.add("active");

      if (targetOrder) calculateSubtotal(orderId);
    }

    orderItems.forEach((item) => {
      item.addEventListener("click", function () {
        const orderId = this.getAttribute("data-order");
        showOrder(orderId);
      });
    });

    if (document.getElementById('order-1')) {
      showOrder(1);
    }
});

// Draft modal Start......
document.addEventListener("DOMContentLoaded", function () {
    const orderModal = document.querySelector(".draftmodal-wrapper");
    const openModalBtn = document.getElementById("draftModal");
    const closeModalBtn = document.querySelector(".close-btn");

    if (orderModal && openModalBtn) {
      openModalBtn.addEventListener("click", function () {
        orderModal.classList.add("show");
        orderModal.classList.remove("hide");
      });
    }

    if (orderModal && closeModalBtn) {
      closeModalBtn.addEventListener("click", function () {
        orderModal.classList.add("hide");
        setTimeout(() => {
          orderModal.classList.remove("show");
          orderModal.classList.remove("hide");
        }, 300);
      });
    }

    if (orderModal) {
      orderModal.addEventListener("click", function (e) {
        if (e.target === orderModal) {
          orderModal.classList.add("hide");
          setTimeout(() => {
            orderModal.classList.remove("show");
            orderModal.classList.remove("hide");
          }, 300);
        }
      });
    }
});

// Add Warehouse Modal Start ................
document.addEventListener("DOMContentLoaded", function () {
  const uniqueModal = document.getElementById("uniqueWarehouseModal");
  const uniqueOpenModalBtn = document.getElementById("uniqueOpenModalBtn");
  const uniqueCancelBtn = document.getElementById("uniqueCancelBtn");

  if (uniqueOpenModalBtn && uniqueModal) {
    uniqueOpenModalBtn.addEventListener("click", () => {
      uniqueModal.classList.add("show");
    });
  }

  if (uniqueCancelBtn && uniqueModal) {
    uniqueCancelBtn.addEventListener("click", () => {
      uniqueModal.classList.remove("show");
    });
  }

  if (uniqueModal) {
    document.addEventListener("click", (e) => {
      if (e.target === uniqueModal) {
        uniqueModal.classList.remove("show");
      }
    });
  }
});

// Add Customer Modal End ................
document.addEventListener("DOMContentLoaded", function () {
  const addCustomerModal = document.getElementById("addCustomerModal");
  const addCustomerOpenModalBtn = document.getElementById("addCustomerBtn");
  const addCustomerCancelBtn = document.getElementById("addCustomerCancelBtn");

  if (addCustomerOpenModalBtn && addCustomerModal) {
    addCustomerOpenModalBtn.addEventListener("click", () => {
      addCustomerModal.classList.add("show");
    });
  }

  if (addCustomerCancelBtn && addCustomerModal) {
    addCustomerCancelBtn.addEventListener("click", () => {
      addCustomerModal.classList.remove("show");
    });
  }

  if (addCustomerModal) {
    document.addEventListener("click", (e) => {
      if (e.target === addCustomerModal) {
        addCustomerModal.classList.remove("show");
      }
    });
  }
});
