<?php

use yii\widgets\ListView;

$header_img = $item->imgSrc ?: '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $item->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<!-- <div class="header-title ken-burn white" data-parallax="scroll" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="/theme/main/images/bg-7.jpg"> -->
<div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-image-src="<?= $header_img ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1><?= $item->title ?></h1>
            <p><?= date('d.m.Y', strtotime($item->created)) ?></p>
        </div>
    </div>
</div>
<div class="section-empty section-item">
    <div class="container content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <?= $item->text ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group btn-group-icons" role="group">
                            <a data-social="share-facebook" class="btn btn-default">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a data-social="share-twitter" class="btn btn-default">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a data-social="share-google" class="btn btn-default">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="tag-row">
                            <span><i class="fa fa-calendar"></i> <a href="#"><?= date('d.m.Y', strtotime($item->created)) ?></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>