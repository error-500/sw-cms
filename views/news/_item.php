<?php

use yii\helpers\Url;

?>
<div class="grid-item col-md-12">
    <div class="advs-box niche-box-blog">
        <div class="block-top">
            <div class="block-infos">
                <div class="block-data">
                    <p class="bd-day"><?= date('d.m.Y', strtotime($model->created)) ?></p>
                    <!-- <p class="bd-month"></p> -->
                </div>
                <!-- <a class="block-comment" href="#">2 <i class="fa fa-comment-o"></i></a> -->
            </div>
            <div class="block-title">
                <h2><a href="<?= Url::to(['/news/single', 'id' => $model->id]) ?>"><?= $model->title ?></a></h2>
                <div class="tag-row">
                    <span><i class="fa fa-bookmark"></i> <a href="#"><?= $model->group->name ?></a></span>
                    <!-- <span><i class="fa fa-pencil"></i><a>Admin</a></span> -->
                </div>
            </div>
        </div>
        <a class="img-box" href="<?= Url::to(['/news/single', 'id' => $model->id]) ?>">
            <img src="<?= $model->imgSrc ?? '/theme/main/images/gallery/large-1.jpg' ?>" alt="">
        </a>
        <p class="excerpt">
            <?= $model->preview_text ?>
        </p>
        <a class="btn btn-xs" href="<?= Url::to(['/news/single', 'id' => $model->id]) ?>">Читать далее </a>
        <hr class="space" />
    </div>
</div>