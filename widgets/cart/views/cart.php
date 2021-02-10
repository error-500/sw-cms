<?php

use yii\helpers\Url;

?>
<?php if ($full): ?>
<li class="dropdown cart <?php if(!$cart): ?>invisible<?php endif; ?>">
    <a v-b-toggle.cart-sidebar>
        <span class="fa-stack fa-sm">
            <b class="fa fa-shopping-bag fa-stack-2x mr-5"></b>
            <b class="fa fa-circle fa-stack-2x text-success ml-4"></b>
            <b class="text-bold cart-total fa fa-stack-1x fa-inverse ml-4">
                <?php if(!empty($cart['items'])): echo array_sum(array_column($cart['items'], 'count')); else: echo '0'; endif; ?>
            </b>
        </span>
    </a>
</li>
<?php endif ?>

<?php if (!$full): ?>
<a v-b-toggle.cart-sidebar
   style="padding: 0 !important;"
   class="css-pointer btn-cart <?php if (!$cart): ?>invisible<?php endif; ?>">
    <span class="fa-stack fa-sm">
        <b class="fa fa-shopping-bag fa-stack-2x mr-5"></b>
        <b class="fa fa-circle fa-stack-2x text-success ml-4"></b>
        <b class="text-bold cart-total fa fa-stack-1x fa-inverse ml-4">
            <?php if(!empty($cart['items'])): echo array_sum(array_column($cart['items'], 'count')); else: echo '0'; endif; ?>
        </b>
    </span>
</a>
<?php endif ?>