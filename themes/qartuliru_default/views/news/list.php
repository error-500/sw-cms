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
                <div class="list-group list-blog">
                    <p class="list-group-item">Категории</p>
                    <?php foreach ($groups as $group): ?>
                    <a href="<?= Url::to(['/news', 'category' => $group->tech_name]) ?>"
                       class="list-group-item"><?= $group->name ?></a>
                    <?php endforeach ?>
                </div>
                <div class="list-group list-blog">
                    <p class="list-group-item">Случаные публикации</p>
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
                <!--                 <div class="list-group latest-post-list list-blog">
                    <p class="list-group-item active">Latest posts</p>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="img-box circle">
                                    <img src="../images/gallery/square-4.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="#">
                                    <h5>Return to the future day</h5>
                                </a>
                                <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="img-box circle">
                                    <img src="../images/gallery/square-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="#">
                                    <h5>We can do</h5>
                                </a>
                                <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="img-box circle">
                                    <img src="../images/gallery/square-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="#">
                                    <h5>Hacking team 24</h5>
                                </a>
                                <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group list-blog">
                    <p class="list-group-item active">Tags</p>
                    <div class="tagbox">
                        <span>Hello!</span><span>Big deal</span><span>A new happy time</span><span>Food</span><span>Cheese</span><span>Food</span>
                        <div class="clear"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>