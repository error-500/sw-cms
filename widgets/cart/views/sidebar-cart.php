<?php
/*
 echo var_export($cart, true);
 exit();
 */

use app\models\Cart;
use yii\helpers\Json;

$cart = new Cart();
if (!isset(Yii::$app->vueApp->data['cart'])) {
    Yii::$app->vueApp->data = [
        'cart' => Json::encode($cart->toArray()),
    ];
}
Yii::$app->vueApp->methods = [
    'addToCart' => 'function(itemId, event){
        const icon = jQuery(event.target).find("i");
        const cartBtn = document.querySelectorAll(".cart.invisible, .btn-cart.invisible");
        jQuery.ajax({
            url: "/cart/add",
            data: {
                id: itemId,
            },
            beforeSend: function () {
                icon.toggleClass("im-add-cart im-arrow-refresh");
            },
            success: (data) => {
                jQuery(".shop-menu-cnt").html(data["full"]);
                jQuery(".cart-li-mobile").html(data["mobile"]);
                icon.toggleClass("im-arrow-refresh im-yes");
                cartBtn.forEach((btn) => {
                    jQuery(btn).removeClass("invisible");
                });
                const response = JSON.parse(data);
                console.log("Response total:", response);
                this.$set(this.$data, "cart", response.cart);
                if (response.total) {
                    jQuery(".fa.fa-stack-1x.img-circle").text(response.total);
                }
                setTimeout(function () {
                    icon.toggleClass("im-yes im-add-cart");
                }, 1500);
            },
            error: (data) => {
                icon.toggleClass("im-arrow-refresh im-close");
            }
        });
    }'
];
?>
<b-sidebar id="cart-sidebar"
           title="<?php echo 'Корзина'; ?>"
           right
           backdrop
           sidebar-class="w-xs-100 w-sm-50"
           shadow>
    <template #footer="{ hide }">
        <div class="d-flex flex-row align-items-center">
            <p class="ml-3 mr-auto">
                Всего на сумму: {{ cart.total }}₽
            </p>
            <b-button href="/site/cart">Оформить заказ</b-button>
        </div>
    </template>
    <template #default>
        <b-media v-for="(item, idx) in cart.items"
                 no-body>
            <b-media-aside vertical-align="center"
                           class="justify-content-around m-1">
                <b-img :src="item.thumb"
                       thumbnail
                       lazy
                       width="128"></b-img>
            </b-media-aside>
            <b-media-body>
                <b-row cols="2"
                       no-gutters>
                    <b-col cols="10">
                        <h5 v-html="item.name"></h5>
                        <p v-html="item.description"></p>
                        <p class="d-inline-flex">
                            <span class="ml-1 text-nowrap">Кол-во:&nbsp;<b v-html="item.count"></b></span>
                            <span class="ml-1 text-nowrap">Цена:&nbsp;<b v-html="item.price"></b></span>
                            <span class="ml-1 text-nowrap">Стоимоть:&nbsp;<b v-html="item.summary"></b></span>
                        </p>
                    </b-col>
                    <b-col cols="2">
                        <b-button-group size="sm">
                            <b-button variant="default"
                                      class="bg-transparent">
                                <b-icon icon="cart-dash"
                                        variant="dark"></b-icon>
                            </b-button>
                            <b-button variant="default"
                                      class="bg-transparent">
                                <b-icon icon="cart-plus"
                                        variant="dark"></b-icon>
                            </b-button>
                            <b-button variant="default"
                                      class="bg-transparent">
                                <b-icon icon="trash"
                                        variant="dark"></b-icon>
                            </b-button>
                        </b-button-group>
                    </b-col>
                </b-row>
            </b-media-body>
        </b-media>
    </template>
</b-sidebar>