<?php

namespace sw\modules\block\models;

use app\modules\sw\modules\block\models\Item;
use Yii;

/**
 * This is the model class for table "{{%block_template}}".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование шаблона
 * @property string $params Список переменных шаблона
 * @property string $path Путь к файлу шаблона
 *
 * @property BlockLinkTemplate[] $blockLinkTemplates
 * @property BlockItem[] $blocks
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%block_template}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['params'], 'string'],
            [['name', 'path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор'),
            'name' => Yii::t('app', 'Наименование шаблона'),
            'params' => Yii::t('app', 'Список переменных шаблона'),
            'path' => Yii::t('app', 'Путь к файлу шаблона'),
        ];
    }

    /**
     * Gets query for [[BlockLinkTemplates]].
     *
     * @return \yii\db\ActiveQuery|BlockLinkTemplateQuery
     */
    public function getBlockLinkTemplates()
    {
        return $this->hasMany(BlockLinkTemplate::class, ['template_id' => 'id']);
    }

    /**
     * Gets query for [[Blocks]].
     *
     * @return \yii\db\ActiveQuery|BlockItemQuery
     */
    public function getBlocks()
    {
        return $this->hasMany(BlockItem::class, ['id' => 'block_id'])->viaTable('{{%block_link_template}}', ['template_id' => 'id']);
    }

    public function getItem(){
        return $this->hasMany(Item::class, ['block_']);
    }
    /**
     * {@inheritdoc}
     * @return TemplateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TemplateQuery(get_called_class());
    }
}