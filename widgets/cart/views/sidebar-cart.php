<?php
/*
 echo var_export($cart, true);
 exit();
 */

use app\models\Cart;
use main\helpers\AutoUrl;
use yii\helpers\Json;

$prefix = '/'.implode(
    '/',
    array_filter([
        AutoUrl::rootModuleId(),
        AutoUrl::getLanguageSection()
        ])
);
Yii::info(
    Yii::t('app', 'Cart widget rendered in {0}', [Yii::$app->controller->uniqueId])
);
$cart = new Cart();
if (!isset(Yii::$app->vueApp->data['cart'])) {
    Yii::$app->vueApp->data = [
        'cart' => Json::encode($cart->toArray()),
    ];
}
Yii::$app->vueApp->methods = [
    'rmFromCart' => 'function(itemId, event){
        jQuery.ajax({
            url:"/cart/remove",
            data: {
                id: itemId,
            },
            success: (data) => {
                const response = JSON.parse(data);
                console.log("Response total:", response);
                this.$set(this.$data, "cart", response.cart);
            }
        });
    }',
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
                /*if (response.total) {
                    jQuery(".cart-total").text(response.total);
                }*/
                setTimeout(function () {
                    icon.toggleClass("im-yes im-add-cart");
                }, 1500);
            },
            error: (data) => {
                icon.toggleClass("im-arrow-refresh im-close");
            }
        });
    }',
    'clearItem' => 'function(itemId, event){
        jQuery.ajax({
            url:"/cart/remove",
            data: {
                id: itemId,
                all: 1,
            },
            success: (data) => {
                const response = JSON.parse(data);
                console.log("Response total:", response);
                this.$set(this.$data, "cart", response.cart);
            }
        });
    }',
];
Yii::$app->vueApp->computed = [
    'cartCount' => 'function(){
        const cart = this.cart.items.slice().map(item => item.count);
        if(!cart.length) {
            return 0;
        }
        return cart.reduce((item1, item2) => {return item1 + item2;});
    }'
]
?>
<b-sidebar id="cart-sidebar"
           title="<?php echo Yii::t('app', 'Корзина'); ?>"
           right
           backdrop
           sidebar-class="w-xs-100 w-sm-50"
           shadow>
    <template #footer="{ hide }">
        <div class="d-flex flex-column align-items-center mb-3">
            <h4 class="text-center">
                <?php echo Yii::t('app', 'Итого'); ?>: {{ cart.total }}₽
            </h4>
            <b-button href="<?php echo $prefix; ?>/checkout"
                      size="small"
                      class="w-75"
                      variant="outline-dark"><?php echo Yii::t('app', 'Оформить заказ'); ?></b-button>
        </div>
    </template>
    <template #default>
        <b-media v-for="(item, idx) in cart.items"
                 :key="`cart-item-${idx}`"
                 no-body
                 class="m-2 align-items-center"
                 vertical-align="center">
            <b-media-aside vertical-align="center"
                           class="w-25 justify-content-end align-items-start">
                <b-img :src="item.thumb"
                       fluid
                       lazy
                       class="w-100 align-self-center"></b-img>
            </b-media-aside>
            <b-media-body class="flex-grow-2">
                <b-row cols="2"
                       no-gutters
                       class="flex-wrap justify-content-between">
                    <b-col cols="12"
                           cols-sm="8">
                        <h5 v-html="item.name"></h5>
                        <b-button-group size="sm">
                            <b-button variant="default"
                                      :disabled="item.count < 2"
                                      @click="rmFromCart(item.id, $event)"
                                      class="bg-transparent border-0">
                                <b-icon icon="bag-dash"
                                        variant="dark"></b-icon>
                            </b-button>
                            <span class="ml-3 mr-3">{{ item.count }}</span>
                            <b-button variant="default"
                                      @click="addToCart(item.id, $event)"
                                      class="bg-transparent border-0">
                                <b-icon icon="bag-plus"
                                        variant="dark"></b-icon>
                            </b-button>

                        </b-button-group>
                    </b-col>
                    <b-col cols="12"
                           cols-sm="4">
                        <h4 class="text-nowrap text-right"
                            style="font-size: 15px">
                            <span class="ml-1 text-nowrap">&nbsp;<b v-html="item.summary"></b></span>
                            <b-link variant="default"
                                    @click="clearItem(item.id, $event)"
                                    class="bg-transparent border-0">
                                <b-icon icon="bag-x"
                                        variant="dark"></b-icon>
                            </b-link>
                        </h4>
                        <p v-if="item.count > 1"
                           class="text-right">
                            <span class="ml-1 text-nowrap">
                                <b v-html="item.count"></b>&nbsp;Х&nbsp;<b v-html="item.price"></b>
                            </span>
                        </p>
                    </b-col>
                </b-row>
            </b-media-body>
        </b-media>
    </template>
</b-sidebar>