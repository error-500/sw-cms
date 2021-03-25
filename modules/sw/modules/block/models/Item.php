<?php

namespace sw\modules\block\models;

use app\modules\sw\modules\base\traits\ImgSrc;
use app\modules\sw\modules\page\models\Item as Page;
use sw\modules\block\models\Block;
use sw\modules\block\models\Template;
use Yii;
use swods\fileloader\FileLoader;
use yii\db\ActiveRecord;

/**
* * This is the model class for table "{{%block_item}}".
*
* @property int $id
* @property string $tech_name Техническое название
* @property string|null $img Картинка
* @property string $title Заголовок
* @property string|null $text Текст
* @property string $created Создано
* @property string $updated Обновлено
*
* @property BlockLinkTemplate[] $blockLinkTemplates
* @property BlockTemplate[] $templates
* @property PageBlockLink[] $pageBlockLinks
* @property PageItem[] $pages
*/
class Item extends ActiveRecord
{
    use ImgSrc;

    public static $folder = '@webroot/uploads/sw/block/';
    public $web_folder = '/uploads/sw/block/';
    public $img_obj;
    public $template_id;
    public $page_id;
    public $position;

    public static function tableName()
    {
        return '{{%block_item}}';
    }

    public function rules()
    {
        return [
            [['tech_name', 'title'], 'required'],
            [['tech_name', 'title'], 'string', 'max' => 200],
            [
                'tech_name',
                'match',
                'pattern' => '/^[a-z_]*$/',
                'message' => 'Техничесокое имя должно быть слитно, на английском, в нижнем регистре, допускается знак "_"'
            ],
            ['img_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg, mp4', 'maxSize' => 10485760],
            [['tech_name'], 'unique'],
            [['text'], 'string'],
            [['template_id'], 'exist', 'skipOnError' => true, 'targetClass' => Template::class, 'targetAttribute' => ['template_id' => 'id']],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::class, 'targetAttribute' => ['page_id' => 'id']],
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
            'text' => Yii::t('app', 'Текст'),
            'created' => Yii::t('app', 'Создано'),
            'updated' => Yii::t('app', 'Обновлено'),
            'template_id' => Yii::t('app', 'Шаблон блока'),
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
        $self = Item::find(['tech_name' => $tech_name])->one();

        if (!$self || !$attr) {
            return $self;
        }

        return $self->$attr;
    }
    /**
    * Gets query for [[BlockLinkTemplates]].
    *
    * @return \yii\db\ActiveQuery|BlockLinkTemplateQuery
    */
    public function getBlocks() {
        return $this->hasMany(Block::class, ['id' => 'block_id']);
    }
    /**
    * Gets query for [[Templates]].
    *
    * @return \yii\db\ActiveQuery|BlockTemplateQuery
    */

    public function getTemplates() {
        return $this->hasMany(Template::class, ['id' => 'template_id'])
            ->via('block');
    }
    /**
    * Gets query for [[Pages]].
    *
    * @return \yii\db\ActiveQuery|PageItemQuery
    */
    public function getPages()
    {
       return $this->hasMany(Page::class, ['id' => 'page_id'])
            ->viaTable('{{%page_block_link}}', ['block_id' => 'id']);
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

    /**
    * {@inheritdoc}
    *  @return ItemQuery the active query used by this AR class.
    */
    public static function find()
    {
       return (new ItemQuery(get_called_class()));//->joinWith('block');
    }
}