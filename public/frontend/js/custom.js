$('.addToCartBtn').click(function (e) {
    e.preventDefault();
    var product_id = $(this).closest('.product_data').find('.prod_id').val();
    var product_qty = $(this).closest('.product_data').find('.qty-input').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/add-to-cart",
        data: {
            'product_id': product_id,
            'product_qty': product_qty,
        },
        // success: function (response) {
        //     alert (response.status);

        // }
        success: function (response) {
            // swal({
            //     title: "Success!",
            //     text: response.status,
            //     icon: "success",
            //     button: "OK",
            //     timer: 2000,  // auto close after 2s
            // });

            fetch('/cart/count')
                .then(response => response.json())
                .then(data => {
                    // document.getElementById('cart-count').textContent = data.count;
                    // document.getElementById('desktop-cart-count').textContent = data.count;
                    const mobileBadge = document.getElementById('cart-count-mobile');
                    const desktopBadge = document.getElementById('cart-count-desktop');

                    if (mobileBadge) mobileBadge.textContent = data?.count;
                    if (desktopBadge) desktopBadge.textContent = data?.count;
                    console.log(`data from cart count ${data.count}`);

                    return Swal.fire({
                        title: "Success",
                        text: response.status,
                        icon: "success",
                        confirmButtonText: "View Cart",
                        timer: 2000,

                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/cart";
                        }
                    })
                }).catch(error => console.log('Error fetching cart count:', error));

        },
        error: function (response) {
            swal({
                title: "Error!",
                text: response.status,
                icon: "error",
                button: "OK",
            });
        }
    });
});

$(document).ready(function () {
    $('.increment-btn').click(function (e) {
        e.preventDefault();


        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;

            $(this).closest('.product_data').find('.qty-input').val(value);

        }
    });
    $('.decrement-btn').click(function (e) {
        e.preventDefault();


        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);

        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,

            },
            success: function (response) {
                window.location.reload(true);
                alert(response.status);
                //swal("", response.status, "success");

            }
        });

    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload(true);
            }
        });
    });

});