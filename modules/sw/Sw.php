<?php

namespace app\modules\sw;

use Yii;

use app\modules\sw\modules\page\models\Item as Page;
use app\modules\sw\modules\constant\models\Item as Constant;
use app\modules\sw\modules\slider\models\Group as SliderGroup;
use app\modules\sw\modules\blog\models\Group as BlogGroup;
use app\modules\sw\modules\blog\models\Item as BlogItem;
use app\modules\sw\modules\gallery\models\Group as GalleryGroup;

class Sw
{
    public function getModule($module) {
        return Yii::$app->getModule('sw')->getModule($module);
    }

    //TODO

    public function getConstant($tech_name, $attr = false)
    {
        return Constant::get($tech_name, $attr);
    }

    public function getInfoBlockGroup($tech_name, $attr = false)
    {
        return SliderGroup::get($tech_name, $attr);
    }

    public function getBlogGroup($tech_name, $attr = false)
    {
        return BlogGroup::get($tech_name, $attr);
    }

    public function getBlogItemById($id)
    {
        return BlogItem::findOne($id);
    }

    public function getPage($tech_name, $attr = false)
    {
        return Page::get($tech_name, $attr);
    }

    public function getGalleryGroups()
    {
        return GalleryGroup::find()->joinWith('items')->all();
    }

    public function getGallaryGroupById($id)
    {
        return GalleryGroup::findOne($id);
    }
}
