<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "queues".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $merchant_id
 * @property int|null $service_id
 * @property int $queue_number
 * @property string|null $queue_status
 * @property string|null $created_at
 *
 * @property Merchant $merchant
 * @property Service $service
 * @property User $user
 */
class Queue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'queues';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'merchant_id', 'service_id', 'queue_number'], 'integer'],
            [['queue_number'], 'required'],
            [['queue_status'], 'string'],
            [['created_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['merchant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Merchant::class, 'targetAttribute' => ['merchant_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'merchant_id' => 'Merchant ID',
            'service_id' => 'Service ID',
            'queue_number' => 'Queue Number',
            'queue_status' => 'Queue Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Merchant]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMerchant()
    {
        return $this->hasOne(Merchant::class, ['id' => 'merchant_id']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
