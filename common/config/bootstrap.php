<?php

Yii::setAlias('@web', getenv('BASE_URL') ?: '');
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@app/web', Yii::getAlias('@backend') . '/web');
