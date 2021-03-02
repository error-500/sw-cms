<?php

namespace app\modules\sw\modules\blog\models;

use app\modules\sw\modules\gallery\models\Group as Gallery;
use Yii;
use swods\fileloader\FileLoader;

/**
 * exp: Yii::$app->swo->module('info_block', 'Item')->byGroupTechName('main_slider');
 */
class Item extends \yii\db\ActiveRecord
{
    use \app\modules\sw\modules\base\traits\ImgSrc;

    const ACTIVE = 1;

    public static $folder = '@webroot/uploads/sw/blog/';
    public $web_folder = '/uploads/sw/blog/';
    public $img_obj;
    public $gallery_id;

    public static function tableName()
    {
        return '{{%blog_item}}';
    }

    public function rules()
    {
        return [
            [['group_id', 'title', 'preview_text'], 'required'],
            [['group_id', 'pos', 'active'], 'integer'],
            [['text', 'preview_text'], 'string'],
            [['created', 'updated', 'gallery_id'], 'safe'],
            [['href'], 'string', 'max' => 50],
            [['alt', 'title'], 'string', 'max' => 200],
            ['img_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg', 'maxSize' => 2097152],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_id' => 'Галлерея',
            'group_id' => 'Группа',
            'pos' => 'Позиция',
            'active' => 'Активен',
            'img' => 'Картинка',
            'img_obj' => 'Картинка',
            'href' => 'Ссылка',
            'alt' => 'Альт (SEO)',
            'title' => 'Заголовок',
            'preview_text' => 'Превью',
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
        return $this->hasOne(Group::class, ['id' => 'group_id']);
    }

    public function getGalleries()
    {
        return $this->hasMany(Gallery::class, ['id' => 'gallery_id'])
            ->viaTable('{{%blog_gallery_link}}', ['blog_id' => 'id']);
    }
}
