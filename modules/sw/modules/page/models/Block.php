<?php

namespace sw\modules\page\models;

use Yii;

/**
 * This is the model class for table "en_page_block_link".
 *
 * @property int $page_id
 * @property int $block_id
 * @property int|null $position
 *
 * @property EnPageItem $page
 * @property EnBlockItem $block
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_page_block_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'block_id'], 'required'],
            [['page_id', 'block_id', 'position'], 'integer'],
            [['page_id', 'block_id'], 'unique', 'targetAttribute' => ['page_id', 'block_id']],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnPageItem::className(), 'targetAttribute' => ['page_id' => 'id']],
            [['block_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnBlockItem::className(), 'targetAttribute' => ['block_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'page_id' => Yii::t('app', 'Page ID'),
            'block_id' => Yii::t('app', 'Block ID'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * Gets query for [[Page]].
     *
     * @return \yii\db\ActiveQuery|EnPageItemQuery
     */
    public function getPage()
    {
        return $this->hasOne(EnPageItem::className(), ['id' => 'page_id']);
    }

    /**
     * Gets query for [[Block]].
     *
     * @return \yii\db\ActiveQuery|EnBlockItemQuery
     */
    public function getBlock()
    {
        return $this->hasOne(EnBlockItem::className(), ['id' => 'block_id']);
    }

    /**
     * {@inheritdoc}
     * @return BlockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlockQuery(get_called_class());
    }
}
