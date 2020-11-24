<?php

namespace app\components;

use Yii;

class Instagram
{
    public static function getFeed()
    {
        $key = Yii::$app->sw->getModule('constant')->item('findOne', ['tech_name' => 'instagram_key'])->value ?? 'not_set';
        $instagram_json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token='.$key);

        $instagram_obj = json_decode($instagram_json);

        $img_arr = [];
        if (!empty($instagram_obj->data)) {
            foreach ($instagram_obj->data as $obj) {
                $img_arr[$obj->id]['img'] = $obj->images->standard_resolution->url;
                $img_arr[$obj->id]['link'] = $obj->link;
            }
        }

        return $img_arr;
    }
}