// Sign in And Sign up Start.......
function switchCard(e) {
    if (e && e.preventDefault) e.preventDefault();
    const signInCard = document.getElementById("signInCard");
    const signUpCard = document.getElementById("signUpCard");

    if (signInCard && signUpCard) {
        if (signInCard.style.display === "none") {
            signInCard.style.display = "flex";
            signUpCard.style.display = "none";
        } else {
            signInCard.style.display = "none";
            signUpCard.style.display = "flex";
        }
        return;
    }

    const loginCard = document.querySelector(".container .card:nth-child(1)");
    const registerCard = document.querySelector(".container .card:nth-child(2)");

    if (loginCard && registerCard) {
        if (loginCard.style.display === "none") {
            loginCard.style.display = "block";
            registerCard.style.display = "none";
        } else {
            loginCard.style.display = "none";
            registerCard.style.display = "block";
        }
    }
}
// Sign in And Sign up End.....................


// ..................... Invoice Sheet Print Function Start..............//
function printMarksheet() {
    const marksheet = document.querySelector(".invoice-container");
    if (!marksheet) {
        window.print();
        return;
    }

    const originalContent = document.body.innerHTML;
    document.body.innerHTML = marksheet.outerHTML;
    window.print();
    document.body.innerHTML = originalContent;
    location.reload();
}
// ..................... Invoice Sheet Print Function End..............//


// ..................... Barcode Print page quantity Function Start..............//
function increase() {
  const input = document.getElementById("ProductGenarateQuantity");
  if (input) {
    let value = parseInt(input.value, 10) || 0;
    input.value = value + 1;
  }
}

function decrease() {
  const input = document.getElementById("ProductGenarateQuantity");
  if (input) {
    let value = parseInt(input.value, 10) || 0;
    if (value > 0) {
      input.value = value - 1;
    }
  }
}
// ..................... Barcode Print page quantity Function End..............//
