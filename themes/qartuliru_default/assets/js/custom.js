jQuery
    .when(
        jQuery.ready
    )
    .done(() => {
        jQuery('.advs-box-delivery').hover(function() {
            jQuery(this).find('.extra-content').toggleClass('bg-green bg-green-select');

        }, function() {
            jQuery(this).find('.extra-content').toggleClass('bg-green bg-green-select');
        });

        /*jQuery('.add-to-cart').on('click', function() {
            const icon = jQuery(this).find('i');
            const cartBtn = document.querySelectorAll(".cart.invisible, .btn-cart.invisible");
            jQuery.ajax({
                url: '/cart/add',
                data: {
                    id: jQuery(this).data('id')
                },
                beforeSend: function() {
                    icon.toggleClass('im-add-cart im-arrow-refresh');
                },
                success: function(data) {
                    jQuery('.shop-menu-cnt').html(data['full']);
                    jQuery('.cart-li-mobile').html(data['mobile']);
                    icon.toggleClass('im-arrow-refresh im-yes');
                    cartBtn.forEach((btn) => {
                        jQuery(btn).removeClass('invisible');
                    });
                    const response = JSON.parse(data);
                    console.log('Response total:', response);
                    if (response.total) {
                        jQuery('.fa.fa-stack-1x.img-circle').text(response.total);
                    }
                    setTimeout(function() {
                        icon.toggleClass('im-yes im-add-cart');
                    }, 1500);
                },
                error: function(data) {
                    icon.toggleClass('im-arrow-refresh im-close');
                }
            });
        });*/
        const toggleCloseLinks = document.querySelectorAll('[data-toggle="collapse-close"');
        toggleCloseLinks.forEach((lnk) => {
            jQuery(lnk).on('click', () => {
                jQuery(lnk.data('target')).removeClass('show');
            });
        });
    });