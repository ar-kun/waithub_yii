<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "merchants".
 *
 * @property int $id
 * @property string $name
 * @property string|null $location
 * @property string|null $category
 * @property string|null $created_at
 *
 * @property Category[] $categories
 * @property MerchantCategory[] $merchantCategories
 * @property Queue[] $queues
 * @property Service[] $services
 */
class Merchant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merchants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['location'], 'string', 'max' => 255],
            [['category'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location' => 'Location',
            'category' => 'Category',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->viaTable('merchant_categories', ['merchant_id' => 'id']);
    }

    /**
     * Gets query for [[MerchantCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantCategories()
    {
        return $this->hasMany(MerchantCategory::class, ['merchant_id' => 'id']);
    }

    /**
     * Gets query for [[Queues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQueues()
    {
        return $this->hasMany(Queue::class, ['merchant_id' => 'id']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::class, ['merchant_id' => 'id']);
    }
}
