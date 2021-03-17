<?php

use yii\helpers\Json;
use yii\widgets\ListView;
use yii\helpers\Url;

$header_img = $item->imgSrc ?: '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $item->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<!-- <div class="header-title ken-burn white" data-parallax="scroll" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="/theme/main/images/bg-7.jpg"> -->
<div class="header-title ken-burn white"
     data-parallax="scroll"
     data-bleed="0"
     data-position="top"
     data-image-src="<?= $header_img ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1><?= $item->title ?></h1>
            <!-- <p><?= date('d.m.Y', strtotime($item->created)) ?></p> -->
        </div>
    </div>
</div>
<div class="section-empty section-item">
    <div class="container content">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <?= $item->text ?>
                <?php if(count($item->galleries)): ?>
                <?php foreach($item->galleries as $idx => $gallery): ?>
                <?php Yii::$app->vueApp->data = [
                            'gallery'.$idx => Json::encode($gallery->toArray()),
                        ]; ?>
                <sw-image-gallery v-bind="<?php echo 'gallery'.$idx; ?>"
                                  no-labels></sw-image-gallery>
                <?php endforeach; ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group btn-group-icons"
                             role="group">
                            <a data-social="share-facebook"
                               class="btn btn-default">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a data-social="share-twitter"
                               class="btn btn-default">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="tag-row">
                            <span><i class="fa fa-calendar"></i> <a
                                   href="#"><?= date('d.m.Y', strtotime($item->created)) ?></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 widget">
                <div class="list-group list-blog list-group-flush">
                    <h5 class="list-group-header">Категории</h5>
                    <?php foreach ($groups as $group): ?>
                    <a href="<?= Url::to(['/news', 'category' => $group->tech_name]) ?>"
                       class="list-group-item"><?= $group->name ?></a>
                    <?php endforeach ?>
                </div>
                <div class="list-group list-blog list-group-flush">
                    <h5 class="list-group-header">Случайные публикации</h5>
                    <?php foreach ($random_posts as $random_post): ?>
                    <div class="list-group-item">
                        <div class="tag-row icon-row">
                            <span><i
                                   class="fa fa-calendar"></i><?= date('d.m.Y', strtotime($random_post->created)) ?></span>
                            <span><i class="fa fa-bookmark"></i><?= $random_post->group->name ?></span>
                        </div>
                        <a href="<?= Url::to(['/news/single', 'id' => $random_post->id]) ?>">
                            <h5><?= $random_post->title ?></h5>
                        </a>
                        <p>
                            <?= mb_substr(strip_tags($random_post->preview_text), 0, 100) . ' ...' ?>
                        </p>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
