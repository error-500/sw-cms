<?php

use yii\web\View;

$header_img = $group->imgSrc ?: '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<!-- <div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="<?= $header_img ?>"> -->
<div class="header-title ken-burn white"
     data-parallax="scroll"
     data-bleed="0"
     data-position="top"
     data-image-src="<?= $header_img ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1><?= $group->name ?></h1>
            <p><?= $group->text ?></p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <nav class="nav mb-5 d-none d-md-flex justify-content-start text-uppercase main-menu-categories">
        <a class="nav-link active"
           data-toggle="custom-collapse"
           data-target=".card-collapse"
           data-parent="#items-list"
           data-filter="maso-item">Все</a>
        <?php foreach ($groups as $sub_group): ?>
        <a class="nav-link"
           data-filter="<?php echo $sub_group->tech_name; ?>"
           data-target=".<?php echo $sub_group->tech_name; ?>"
           data-toggle="custom-collapse"
           data-parent="#items-list">
            <?php echo $sub_group->name; ?>
        </a>
        <?php endforeach ?>
    </nav>
    <div class="navbar navbar-inner d-md-none">
        <div class="navbar-toggle"
             data-toggle="collapse"
             data-target="#mobMenu"><i class="fa fa-bars"></i><span>Разделы</span><i class="fa fa-angle-down"></i></div>
        <div class="collapse navbar-collapse"
             id="mobMenu">
            <ul class="navbar-nav">
                <li class="active">
                    <a data-toggle="custom-collapse"
                       data-target=".card-collapse"
                       data-parent="#items-list"
                       data-filter="maso-item">Все</a>
                </li>
                <?php foreach ($groups as $sub_group): ?>
                <li>
                    <a data-filter="<?php echo $sub_group->tech_name; ?>"
                       data-target=".<?php echo $sub_group->tech_name; ?>"
                       data-toggle="custom-collapse"
                       data-parent="#items-list">
                        <?php echo $sub_group->name; ?>
                    </a>
                </li>
                <?php endforeach ?>
                <!-- <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li> -->
            </ul>
        </div>
    </div>
    <div class="row"
         id="items-list">
        <?php foreach ($items as $item): ?>
        <div class="col-xs-12 col-md-6 card-collapse <?php echo $item->group->tech_name; ?>"
             aria-labelledby="a_<?php echo $item->group->tech_name; ?>">
            <div class="card m-2">
                <div class="row align-items-center no-gutters">
                    <div class="col-xs-12 col-md-5">
                        <img src="<?php echo $item->imgSrc ?>"
                             class="card-img m-3" />
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <div class="card-body ml-3">
                            <h5 class="card-title"><?php echo trim($item->name); ?></h5>
                            <p class="card-text">
                                <?php echo !empty($item->consist)
                                        ? "{$item->consist}<br>" : '';
                                    ?>
                                <?php echo !empty($item->volume)
                                        ? "{$item->volume}" : ''; ?>
                            </p>
                            <p class="card-text text-black text-right">
                                <?php echo $item->price; ?>₽
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
<?php $this->registerJs(
    '
        document.querySelectorAll(".card-collapse").forEach((el)=>{
            jQuery(el).collapse("show");
        });
        document.querySelectorAll("[data-toggle=\"custom-collapse\"]").forEach((btn) => {
            jQuery(btn).on("click", (event) => {
                if(jQuery(btn).data("target") !== ".card-collapse") {
                    document.querySelectorAll(`${jQuery(btn).data("parent")} .card-collapse:not(${jQuery(btn).data("target")})`)
                        .forEach((el) => {
                            jQuery(el).collapse("hide");
                        });
                    document.querySelectorAll(`${jQuery(btn).data("parent")} ${jQuery(btn).data("target")}`)
                        .forEach((el) => {
                            jQuery(el).collapse("show");
                        });
                } else {
                    document.querySelectorAll(`${jQuery(btn).data("parent")} .card-collapse`)
                        .forEach((el) => {
                            jQuery(el).collapse("show");
                        });
                }
            });
        });
    ',
    View::POS_READY
);