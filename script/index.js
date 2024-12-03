$(document).on('click', '.hide', function() {
    let row = $(this).closest('tr');
    let productId = row[0].id;

    $.ajax({
        type: 'POST',
        url: 'logic/hide_product.php',
        data: { id: productId },
        success: function(response) {
            if (response === '{"success":true}') {
                row.hide();
            }
        }
    });
});

$(document).on('click', '.plus', function() {
    let row = $(this).closest('tr');
    let quantityElement = row.find('.PRODUCT_QUANTITY');
    let quantity = parseInt(quantityElement.text()) + 1;
    quantityElement.text(quantity);

    let productId = row[0].id;
    $.ajax({
        url: 'logic/update_quantity.php',
        method: 'POST',
        data: { id: productId, quantity: quantity }
    });
});

$(document).on('click', '.minus', function() {
    let row = $(this).closest('tr');
    let quantityElement = row.find('.PRODUCT_QUANTITY');
    let quantity = parseInt(quantityElement.text()) - 1;
    if (quantity >= 0) {
        quantityElement.text(quantity);

        let productId = row[0].id;
        $.ajax({
            url: 'logic/update_quantity.php',
            method: 'POST',
            data: { id: productId, quantity: quantity }
        });
    }
});