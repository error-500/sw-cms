<?php

use yii\helpers\Url;

?>
<?php if ($cart && $full): ?>
    <i class="fa fa-shopping-cart"><span class="cart-count bg-green-select"><?= array_sum(array_column($cart['items'], 'count')) ?></span></i>
    <div class="shop-menu">
        <ul class="shop-cart">
            <?php foreach ($cart['items'] as $id => $item): ?>
                <li class="cart-item">
                    <img src="<?= $item['obj']->imgThumbSrc ?>" alt="<?= $item['obj']->name ?>">
                    <div class="cart-content">
                        <h5><?= $item['obj']->name ?></h5>
                        <span class="cart-quantity">
                            <?= $item['count'] ?> x <?= number_format($item['obj']->price) ?> ₽
                        </span>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
        <p class="cart-total">
            Итого: <span><?= number_format($cart['total']) ?> ₽</span>
        </p>
        <p class="cart-buttons">
            <!-- <a href="#" class="btn btn-xs cart-view">Корзина</a> -->
            <a href="<?= Url::to(['/cart']) ?>" class="btn btn-xs cart-checkout">Корзина</a>
        </p>
        <hr class="space xs" />
    </div>
<?php endif ?>

<?php if ($cart && !$full): ?>
    <a style="padding: 0 !important;" href="<?= Url::to(['/page/cart']) ?>" class="css-pointer dropdown-toggle">
        <i class="fa fa-shopping-cart fsc pull-left"></i>
        <span class="cart-number"><?= array_sum(array_column($cart['items'], 'count')) ?></span>
    </a>
<?php endif ?>