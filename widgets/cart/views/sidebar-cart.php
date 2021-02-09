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
           title="<?php echo 'Содержимое корзины'; ?>"
           right
           backdrop
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
        <div>
            <b-list-group>
                <b-list-group-item v-for="(item, idx) in cart.items">
                    <h5 v-html="item.name"></h5>
                    <p v-html="item.description"></p>
                    <p class="d-inline-flex justify-content-end">
                        <span class="ml-1 text-nowrap">Кол-во:&nbsp;<b v-html="item.count"></b></span>
                        <span class="ml-1 text-nowrap">Цена:&nbsp;<b v-html="item.price"></b></span>
                        <span class="ml-1 text-nowrap">Стоимоть:&nbsp;<b v-html="item.summary"></b></span>
                    </p>
                </b-list-group-item>
            </b-list-group>
        </div>
    </template>
</b-sidebar>