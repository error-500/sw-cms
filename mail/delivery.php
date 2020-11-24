Имя: <?= $name ?><br>
Email: <?= $email ?><br>
Телефон: <?= $phone ?><br>
Улица: <?= $address ?><br>
Дом: <?= $house ?><br>
Подъезд: <?= $housing ?><br>
Этаж: <?= $floor ?><br>
Квартира: <?= $flat ?><br>
Комментарий:<br>
<p><?= $comment ?></p>
<br>
Заказ:
<ul>
    <?php foreach ($cart['items'] as $item): ?>
        <li><b><?= $item['obj']->name ?> - x<?= $item['count'] ?></b>, цена товара: <?= $item['obj']->price ?>, всего: <?= $item['obj']->price*$item['count'] ?></li>
    <?php endforeach ?>
</ul>
итого: <b><?= $cart['total'] ?></b>

