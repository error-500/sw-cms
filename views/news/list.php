<?php

use yii\widgets\ListView;

$header_img = $page->imgSrc ?: '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<!-- <div class="header-title ken-burn white" data-parallax="scroll" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="/theme/main/images/bg-7.jpg"> -->
<div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-image-src="<?= $header_img ?>">
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
            <div class="col-md-12 col-sm-12">
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
        </div>
    </div>
</div>