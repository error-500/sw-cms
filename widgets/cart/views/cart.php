<?php

use yii\helpers\Url;

?>
<?php if ($full): ?>

<a v-b-toggle.cart-sidebar
   :class="{'btn-cart': true, 'my-auto': true, 'mx-2': true, 'd-none': !Boolean(cartCount)}">
    <span class="fa-stack fa-sm text-m">
        <b class="fa fa-shopping-bag fa-stack-2x mr-5"></b>
        <b class="fa fa-circle fa-stack-2x text-success ml-3"></b>
        <b class="text-bold cart-total fa fa-stack-1x fa-inverse ml-3"
           v-html="cartCount">
            <?php if(!empty($cart['items'])): echo array_sum(array_column($cart['items'], 'count')); else: echo '0'; endif; ?>
        </b>
    </span>
</a>
<?php endif ?>

<?php if (!$full): ?>
<a v-b-toggle.cart-sidebar
   style="padding: 0 !important;"
   :class="{'css-point': true, 'btn-cart': true, invisible: !Boolean(cartCount)}"
   style="margin-top: -.9em;">
    <span class="fa-stack fa-sm">
        <b class="fa fa-shopping-bag fa-stack-2x mr-5"></b>
        <b class="fa fa-circle fa-stack-2x text-success ml-4"></b>
        <b class="text-bold cart-total fa fa-stack-1x fa-inverse ml-4"
           v-html="cartCount">
            <?php if(!empty($cart['items'])): echo array_sum(array_column($cart['items'], 'count')); else: echo '0'; endif; ?>
        </b>
    </span>
</a>
<?php endif ?>