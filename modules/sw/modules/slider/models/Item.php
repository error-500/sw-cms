<?php

namespace app\modules\sw\modules\slider\models;

use Yii;
use swods\fileloader\FileLoader;

/**
 * exp: Yii::$app->swo->module('info_block', 'Item')->byGroupTechName('main_slider');
 */
class Item extends \yii\db\ActiveRecord
{
    use \app\modules\sw\modules\base\traits\ImgSrc;

    const ACTIVE = 1;

    public static $folder = '@webroot/uploads/sw/slider/';
    public $web_folder = '/uploads/sw/slider/';
    public $img_obj;

    public static function tableName()
    {
        return '{{%slider_item}}';
    }

    public function rules()
    {
        return [
            [['group_id'], 'required'],
            [['group_id', 'pos', 'active'], 'integer'],
            [['text'], 'string'],
            [['created', 'updated'], 'safe'],
            [['href'], 'string', 'max' => 50],
            [['alt', 'title'], 'string', 'max' => 200],
            ['img_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg', 'maxSize' => 2097152],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Группа',
            'pos' => 'Позиция',
            'active' => 'Активен',
            'img' => 'Картинка',
            'img_obj' => 'Картинка',
            'href' => 'Ссылка',
            'alt' => 'Альт (SEO)',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'created' => 'Создано',
            'updated' => 'Обновлено',
        ];
    }

    public function uploadFile()
    {
        if (!is_object($this->img_obj)) {
            return;
        }

        $this->img = FileLoader::save([
            'file' => $this->img_obj,
            'dir'  => Yii::getAlias(self::$folder),
        ]);
    }

    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }
}