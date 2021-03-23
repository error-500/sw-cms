<?php

use yii\widgets\ListView;
use yii\helpers\Url;

$header_img = $page->imgSrc ?? '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
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
            <?= $page->text ?>
        </div>
    </div>
</div>
<div class="section-empty section-item">
    <div class="container content">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="grid-list one-row-list">
                    <div class="grid-box row">

                        <?= ListView::widget([
						    'dataProvider' => $newsProvider,
						    'itemView' => '_item',
						    'layout' => '{items}{pager}'
						]); ?>

                    </div>
                    <!-- <div class="list-nav">
                        <ul class="pagination pagination-grid hide-first-last" data-page-items="3" data-pagination-anima="show-scale" data-options="scrollTop:true"></ul>
                    </div> -->
                </div>
            </div>
            <div class="col-md-3 col-sm-12 widget">
                <div class="list-group list-blog list-group-flush">
                    <h5 class="list-group-header"><?php echo Yii::t('app', 'Категории'); ?></h5>
                    <?php foreach ($groups as $group): ?>
                    <a href="<?= Url::to(['/news', 'category' => $group->tech_name]) ?>"
                       class="list-group-item"><?= $group->name ?></a>
                    <?php endforeach ?>
                </div>
                <div class="list-group list-blog list-group-flush">
<<<<<<< HEAD:themes/qartuliru_default/modules/main/views/news/list.php
                    <h5 class="list-group-header"><?php echo Yii::t('app', 'Случаные публикации'); ?></h5>
=======
                    <h5 class="list-group-header">Случайные публикации</h5>
>>>>>>> develop:themes/qartuliru_default/views/news/list.php
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