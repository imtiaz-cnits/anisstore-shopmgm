function increaseQuantityOldTable(button) {
    var quantitySpan = button.previousElementSibling;
    if (quantitySpan) {
        var quantity = parseInt(quantitySpan.textContent) || 1;
        quantity++;
        quantitySpan.textContent = quantity;
        updateOldTableTotal(button, quantity);
    }
}

function decreaseQuantityOldTable(button) {
    var quantitySpan = button.nextElementSibling;
    if (quantitySpan) {
        var quantity = parseInt(quantitySpan.textContent) || 1;
        if (quantity > 1) {
            quantity--;
            quantitySpan.textContent = quantity;
            updateOldTableTotal(button, quantity);
        }
    }
}

function updateOldTableTotal(button, quantity) {
    var row = button ? button.closest('tr') : null;
    if (row) {
        var priceCell = row.querySelector('td:nth-child(5)');
        var price = priceCell ? parseFloat(priceCell.textContent.replace('$', '')) || 0 : 0;
        var total = quantity * price;
        var totalCell = row.querySelector('.total');
        if (totalCell) totalCell.textContent = '$' + total.toFixed(2);
    }
}