<?php

namespace app\modules\sw\modules\gallery\models;

use Yii;

use Gumlet\ImageResize;
use swods\fileloader\FileLoader;

/**
 * This is the model class for table "sw_gallery_item".
 *
 * @property int $id
 * @property int $group_id
 * @property string $name
 * @property string $alt
 * @property string $created
 *
 * @property SwGroup $group
 */
class Item extends \yii\db\ActiveRecord
{
    use \app\modules\sw\modules\base\traits\ImgSrc;
    
    public static $folder = '@webroot/uploads/sw/gallery/';
    public $web_folder = '/uploads/sw/gallery/';
    public $img_obj;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sw_gallery_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id'], 'required'],
            [['group_id'], 'integer'],
            [['created'], 'safe'],
            [['name', 'alt'], 'string', 'max' => 255],
            ['img_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg', 'maxSize' => 2097152],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Группа',
            'name' => 'Имя',
            'alt' => 'Alt',
            'created' => 'Создано',
        ];
    }

    public function uploadFile()
    {
        if (!is_object($this->img_obj)) {
            return;
        }

        $this->name = FileLoader::save([
            'file' => $this->img_obj,
            'dir'  => Yii::getAlias(self::$folder),
        ]);

        $this->saveThumb();
    }

    public function saveThumb()
    {
        $path = Yii::getAlias(self::$folder).$this->name;

        if (!file_exists($path)) {
            return;
        }
        
        $image = new ImageResize($path);
        $image->resizeToLongSide(500);
        $image->save(Yii::getAlias(self::$folder).'thumb_'.$this->name);
    }

    public function getImgThumbSrc()
    {
        if (!file_exists(Yii::getAlias(self::$folder).'thumb_'.$this->name)) {
            return $this->imgSrc;
        }

        return $this->web_folder.'thumb_'.$this->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }
}
