<?php

namespace app\modules\sw\modules\page\models;

use sw\modules\block\models\Item as BlockMeta;
use sw\modules\page\models\Block;
use sw\modules\page\models\ItemQuery;
use Yii;
use swods\fileloader\FileLoader;

/**
* This is the model class for table "{{%page_item}}".
*
* @property int $id
* @property string $tech_name Техническое название
* @property string|null $img Картинка
* @property string $title Заголовок
* @property string|null $description Описание
* @property string|null $keywords Ключевые слова
* @property string|null $text Текст
* @property string $created Создано
* @property string $updated Обновлено
* @property string|null $menu_name Наименование пункта меню
* @property int $active Доступна на сайте
*
* @property PageBlockLink[] $pageBlockLinks
* @property BlockItem[] $blocks
*/
class Item extends \yii\db\ActiveRecord
{
    use \app\modules\sw\modules\base\traits\ImgSrc;

    public static $folder = '@webroot/uploads/sw/page/';
    public $web_folder = '/uploads/sw/page/';
    public $img_obj;

    public static function tableName()
    {
        return '{{%page_item}}';
    }

    public function rules()
    {
        return [
            [['tech_name', 'title'], 'required'],
            [['description', 'keywords', 'text'], 'string'],
            [['tech_name', 'title'], 'string', 'max' => 200],
            [['menu_name'], 'string', 'max' => 100, 'skipOnEmpty' => true],
            [['menu_name'], 'unique'],
            ['active', 'boolean', 'skipOnEmpty' => true, 'trueValue' => true, 'falseValue' => false],
            ['active', 'default', 'value' => true],
            [
                'tech_name',
                'match',
                'pattern' => '/^[a-z_]*$/',
                'message' => 'Техничесокое имя должно быть слитно, на английском, в нижнем регистре, допускается знак "_"'
            ],
            ['img_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg', 'maxSize' => 2097152],
            [['tech_name', 'menu_name'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
           'tech_name' => Yii::t('app', 'Техническое название'),
           'img' => Yii::t('app', 'Картинка'),
           'img_obj' => Yii::t('app', 'Картинка'),
           'title' => Yii::t('app', 'Заголовок'),
           'description' => Yii::t('app', 'Описание'),
           'keywords' => Yii::t('app', 'Ключевые слова'),
           'text' => Yii::t('app', 'Текст'),
           'created' => Yii::t('app', 'Создано'),
           'updated' => Yii::t('app', 'Обновлено'),
           'menu_name' => Yii::t('app', 'Наименование пункта меню'),
           'active' => Yii::t('app', 'Доступна на сайте'),
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

    public static function get($tech_name, $attr)
    {
        $self = self::findOne(['tech_name' => $tech_name]);

        if (!$self || !$attr) {
            return $self;
        }

        return $self->$attr;
    }
    public function getBlocks()
    {
        return $this->hasMany(Block::class, ['id' => 'page_id'])
            ->joinWith(['blocksMeta meta' => function($query){
                return $query->joinWith(['blocksMeta.blocks', 'blocksMeta.blocks.templates']);
            }])
            ->orderBy(['position' => \SORT_ASC]);
    }
    public function getBlocksMeta()
    {
        return $this->hasMany(BlockMeta::class, ['id' => 'page_id'])
            ->viaTable("{{%page_block_link}}", ['block_id' => 'id']);
    }

    /**
    * {@inheritdoc}
    * @return ItemQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }
    // public static function byTechName($tech_name)
    // {
    //     $page = self::findOne(['tech_name' => $tech_name]);

    //     $patterns = [
    //         '/{title}/',
    //         '/{tech_name}/',
    //         '/{img}/',
    //         '/{keywords}/',
    //         '/{description}/',
    //     ];

    //     $replacements = [
    //         $page->title,
    //         $page->tech_name,
    //         (new self)->web_folder.$page->img,
    //         $page->keywords,
    //         $page->description,
    //     ];

    //     $page->text = preg_replace($patterns, $replacements, $page->text);

    //     $pattern = '/\{file:(.+?)\}/';
    //     preg_match_all($pattern, $page->text, $matches);

    //     if (!empty($matches[1])) {
    //         foreach ($matches[1] as $match) {
    //             $file = Yii::$app->swo->module('file_manager', 'Item')->byTechName($match);
    //             if (!empty($file)) {
    //                 $page->text = preg_replace(sprintf('/{file:%s}/', $match), $file->path.$file->file, $page->text);
    //             }
    //         }
    //     }

    //     return $page;
    // }
}