<?php

use yii\helpers\Url;

?>
<?php if ($full): ?>
<li class="dropdown cart <?php if(!$cart): ?>invisible<?php endif; ?>">
    <a href="<?= Url::to(['/site/cart']) ?>"
       class="btn-cart"
       data-toggle="dropdown">
        <span class="fa-stack fa-lg">
            <i class="fa fa-shopping-cart fa-stack-2x"></i>
            <b class="fa fa-stack-1x img-circle">
                <?php if(!empty($cart['items'])): echo array_sum(array_column($cart['items'], 'count')); endif; ?>
                <?php /*echo var_export($cart, true); */?>
            </b>
        </span>
    </a>
    <?php if(!empty($cart['items'])): ?>
    <!--ul class="dropdown-menu"
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
                <a href="<?= Url::to(['/site/cart']) ?>"
                   class="btn btn-success">Корзина</a>
            </span>
        </li>
    </ul-->
    <?php endif; ?>
</li>
<?php endif ?>

<?php if (!$full): ?>
<a href="<?php echo Url::to(['/site/cart']); ?>"
   style="padding: 0 !important;"
   class="css-pointer btn-cart <?php if (!$cart): ?>invisible<?php endif; ?>">
    <span class="fa-stack fa-lg">
        <i class="fa fa-shopping-cart fa-stack-2x"></i>
        <b class="fa fa-stack-1x img-circle">
            <?php if(!empty($cart['items'])): echo array_sum(array_column($cart['items'], 'count')); endif; ?>
        </b>
    </span>
</a>
<?php endif ?>