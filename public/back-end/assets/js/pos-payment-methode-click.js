document.addEventListener("DOMContentLoaded", function () {
  const paymentMethods = document.querySelectorAll(".category label");
  const transactionInput = document.getElementById("transactionInput");

  if (paymentMethods && paymentMethods.length > 0) {
    paymentMethods.forEach((method) => {
      method.addEventListener("click", () => {
        paymentMethods.forEach((m) => m.classList.remove("active"));
        method.classList.add("active");

        if (transactionInput) {
          if (method.classList.contains("cashMethod")) {
            transactionInput.style.display = "none";
          } else {
            transactionInput.style.display = "block";
            if (method.classList.contains("bkashMethod")) {
              transactionInput.placeholder = "Enter BKash Transaction ID";
            } else if (method.classList.contains("nagadMethod")) {
              transactionInput.placeholder = "Enter Nagad Transaction ID";
            } else if (method.classList.contains("rocketMethod")) {
              transactionInput.placeholder = "Enter Rocket Transaction ID";
            } else if (method.classList.contains("bankMethod")) {
              transactionInput.placeholder = "Enter Bank Transaction ID";
            } else if (method.classList.contains("mastercardMethod")) {
              transactionInput.placeholder = "Enter Card Transaction ID";
            } else {
              transactionInput.placeholder = "Enter Transaction ID";
            }
          }
        }
      });
    });
  }
});
