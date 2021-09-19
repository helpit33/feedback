<?php
return [
    'user1' => [
        'username' => 'admin',
        'email' => 'admin@domain.dev',
        'auth_key' => 'K3nF70it7tzNsHddEiq0BZ0i-OU8S3xV',
        'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
        'created_at' => Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s')),
        'updated_at' => Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'))

    ],
];