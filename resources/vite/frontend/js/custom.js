// $('.addToCartBtn').click(function (e) {
//     e.preventDefault();
//     var product_id = $(this).closest('.product_data').find('.prod_id').val();
//     var product_qty = $(this).closest('.product_data').find('.qty-input').val();

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//         method: "POST",
//         url: "/add-to-cart",
//         data: {
//             'product_id': product_id,
//             'product_qty': product_qty,
//         }, 
//         success: function (response) { 

//             fetch('/cart/count')
//             // fetch('{{ route("cart.count") }}')
//                 .then(response => response.json())
//                 .then(data => {
//                     document.getElementById('cart-count').textContent = data.count;
//                     // console.log(`data from cart count ${data.count}`);
//                 }).then(
//                     Swal.fire({
//                         title: "Success",
//                         text: response.status,
//                         icon: "success",
//                         confirmButtonText: "View Cart"

//                     }).then((result) => {
//                         if (result.isConfirmed) {
//                             window.location.href = "/cart";
//                         }
//                     })


//                 );

//         },
//         error: function (response) {
//             swal({
//                 title: "Error!",
//                 text: response.status,
//                 icon: "error",
//                 button: "OK",
//             });
//         }
//     });
// });
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
            product_id: product_id,
            product_qty: product_qty
        },
        success: function (response) {
            fetch('/cart/count')
                .then(res => res.json())
                .then(data => {
                    document.getElementById('cart-count').textContent = data.count;
 
                    // Call SweetAlert AFTER data is updated
                    Swal.fire({
                        title: "Success",
                        text: response.status,
                        icon: "success",
                        confirmButtonText: "View Cart"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/cart";
                        }
                    });
                });
        },
        error: function (response) {
            Swal.fire({
                title: "Error!",
                text: response.status,
                icon: "error",
                confirmButtonText: "OK"
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
        var data = {
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