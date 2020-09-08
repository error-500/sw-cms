<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $tech_name
 * @property int $active
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $text
 * @property string|null $media
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keys
 * @property string|null $created
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tech_name', 'active'], 'required'],
            [['active'], 'integer'],
            [['text'], 'string'],
            [['created'], 'safe'],
            [['tech_name', 'title', 'subtitle', 'media', 'seo_title', 'seo_description', 'seo_keys'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tech_name' => 'Tech Name',
            'active' => 'Active',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'text' => 'Text',
            'media' => 'Media',
            'seo_title' => 'Seo Title',
            'seo_description' => 'Seo Description',
            'seo_keys' => 'Seo Keys',
            'created' => 'Created',
        ];
    }
}
