<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $serial_number
 * @property int|null $store_id
 * @property string $date
 */
class Device extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['serial_number'], 'required'],
            [['serial_number'], 'string', 'max' => 255],
            [['serial_number'], 'unique'],
            [['store_id'], 'integer']
        ];
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'date',
                'updatedAtAttribute' => 'date',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'serial_number' => 'Serial Number',
            'store_id' => 'Store ID',
            'date' => 'Date',
        ];
    }

    public function getStore(): ActiveQuery
    {
        return $this->hasOne(Store::class, ['id' => 'store_id']);
    }

    public static function getAllStores(): array
    {
        $stores = Store::find()->all();
        return ArrayHelper::map($stores,'id' , 'name');
    }

}
