<?php

namespace sw\modules\block\models;

use app\modules\sw\modules\page\models\Item;
use Yii;


/**
 * This is the model class for table "{{%block_link_template}}".
 *
 * @property int $block_id Идентификатор блока
 * @property int $template_id Идентификатор шаблона
 * @property string $template_vars Значения переменных шаблона
 *
 * @property BlockItem $block
 * @property BlockTemplate $template
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%block_link_template}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_id', 'template_id'], 'required'],
            [['block_id', 'template_id'], 'integer'],
            [['template_vars'], 'string'],
            [['block_id', 'template_id'], 'unique', 'targetAttribute' => ['block_id', 'template_id']],
            [['block_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::class, 'targetAttribute' => ['block_id' => 'id']],
            [['template_id'], 'exist', 'skipOnError' => true, 'targetClass' => Template::class, 'targetAttribute' => ['template_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'block_id' => Yii::t('app', 'Идентификатор блока'),
            'template_id' => Yii::t('app', 'Идентификатор шаблона'),
            'template_vars' => Yii::t('app', 'Значения переменных шаблона'),
        ];
    }

    /**
     * Gets query for [[Block]].
     *
     * @return \yii\db\ActiveQuery|ItemQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::class, ['id' => 'block_id']);
    }

    /**
     * Gets query for [[Template]].
     *
     * @return \yii\db\ActiveQuery|TemplateQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(Template::class, ['id' => 'template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Item::class, ['id' => 'page_id'])
            ->viaTable("{{%page_block_link}}",['block_id' => 'id']);
    }
    /**
     * {@inheritdoc}
     * @return BlockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return (new BlockQuery(get_called_class()))
                ->joinWith('item');
    }
}