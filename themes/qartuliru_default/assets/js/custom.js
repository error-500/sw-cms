$('.advs-box-delivery').hover(function() {
    $(this).find('.extra-content').toggleClass('bg-green bg-green-select');

}, function() {
    $(this).find('.extra-content').toggleClass('bg-green bg-green-select');
});

$('.add-to-cart').on('click', function() {
    const icon = $(this).find('i');
    const cartBtn = document.querySelectorAll(".cart.invisible, .btn-cart.invisible");
    $.ajax({
        url: '/cart/add',
        data: {
            id: $(this).data('id')
        },
        beforeSend: function() {
            icon.toggleClass('im-add-cart im-arrow-refresh');
        },
        success: function(data) {
            $('.shop-menu-cnt').html(data['full']);
            $('.cart-li-mobile').html(data['mobile']);
            icon.toggleClass('im-arrow-refresh im-yes');
            cartBtn.forEach((btn) => {
                $(btn).removeClass('invisible');
            });
            const response = JSON.parse(data);
            console.log('Response total:', response);
            if (response.total) {
                $('.fa.fa-stack-1x.img-circle').text(response.total);
            }
            setTimeout(function() {
                icon.toggleClass('im-yes im-add-cart');
            }, 1500);
        },
        error: function(data) {
            icon.toggleClass('im-arrow-refresh im-close');
        }
    })
});