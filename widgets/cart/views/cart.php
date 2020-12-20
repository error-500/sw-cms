<?php

use yii\helpers\Url;

?>
<?php if ($cart && $full): ?>
<li class="dropdown cart">
    <a href="#"
       class="dropdown-toggle"
       data-toggle="dropdown">
        <span class="fa-stack fa-lg">
            <i class="fa fa-shopping-cart fa-stack-2x"></i>
            <b class="fa fa-stack-1x img-circle">
                <?= array_sum(array_column($cart['items'], 'count')) ?>
            </b>
        </span>
    </a>
    <ul class="dropdown-menu"
        style="background-color: rgba(255,255,255, .8) !important">
        <?php foreach ($cart['items'] as $id => $item): ?>
        <li class="cart-item">
            <img src="<?= $item['obj']->imgThumbSrc ?>"
                 alt="<?= $item['obj']->name ?>">
            <span class="cart-content">
                <q><?= $item['obj']->name ?></q>
                <b class="cart-quantity">
                    <?= $item['count'] ?> x <?= number_format($item['obj']->price) ?> ₽
                </b>
            </span>
        </li>
        <?php endforeach ?>
        <li role="separator"
            class="divider"></li>
        <li class="cart-checkout">

            <span class="cart-total">
                Итого: <span><?= number_format($cart['total']) ?> ₽</span>
            </span>
            <span class="cart-buttons">
                <!-- <a href="#" class="btn btn-xs cart-view">Корзина</a> -->
                <a href="<?= Url::to(['/site/cart']) ?>"
                   class="btn btn-success">Корзина</a>
            </span>
            <!--hr class="space xs" /-->
        </li>
    </ul>
</li>
<?php endif ?>

<?php if ($cart && !$full): ?>
<a href="<?= Url::to(['/site/cart']) ?>"
   style="padding: 0 !important;"
   class="css-pointer dropdown-toggle"
   data-toggle="">
    <span class="fa-stack fa-lg">
        <i class="fa fa-shopping-cart fa-stack-2x"></i>
        <b class="fa fa-stack-1x bg-green-select img-circle">
            <?= array_sum(array_column($cart['items'], 'count')) ?>
        </b>
    </span>
</a>
<?php endif ?>