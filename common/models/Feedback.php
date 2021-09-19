<?php

namespace common\models;
use Yii;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property int $id
 * @property string|null $customer
 * @property string $phone
 * @property int $status
 */
class Feedback extends \yii\db\ActiveRecord
{
    const STATUS_ON_MODERATION = 0;
    const STATUS_PROCESSED = 1;
    const STATUS_REJECTED = 2;

    const SCENARIO_SEND = 'send';

    /**
     * {@inheritdoc}
     */
    public static function tableName() : string
    {
        return '{{%feedback}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() : array
    {
        return [
            [['phone'], 'required'],
            [
                ['phone'],
                'match',
                'pattern' => '/\+7\(\d{3}\)\d{3}\-\d{2}\-\d{2}/',
                'message' => Yii::t(
                    'feedback',
                    'The phone number must be in the format {mask}!',
                    ['mask' => '+7(999)999-99-99']
                ),
            ],
            ['status', 'default', 'value' => self::STATUS_ON_MODERATION],
            ['status', 'in', 'range' => [
                self::STATUS_ON_MODERATION,
                self::STATUS_PROCESSED,
                self::STATUS_REJECTED
            ]],
            [['customer', 'phone'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() : array
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_SEND] = ['customer', 'phone'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() : array
    {
        return [
            'id' => Yii::t('feedback', 'ID'),
            'customer' => Yii::t('feedback', 'Customer'),
            'phone' => Yii::t('feedback', 'Phone'),
            'status' => Yii::t('feedback', 'Status'),
        ];
    }


    /**
     * Массив возможных статусов сообщения
     * @return array
     */
    public static function getStatusList() : array
    {
        return [
            self::STATUS_ON_MODERATION => Yii::t('feedback', 'On moderation'),
            self::STATUS_PROCESSED => Yii::t('feedback', 'Processed'),
            self::STATUS_REJECTED => Yii::t('feedback', 'Rejected'),
        ];
    }

    /**
     * Возвращает статус в виде строки
     * @return string
     */
    public function getStatusName() : string
    {
        $statuses = self::getStatusList();
        if (array_key_exists($this->status, $statuses)) {
            return $statuses[$this->status];
        }
        return Yii::t('feedback', 'Unknown status');
    }
}
