<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 23.05.16
 * Time: 20:48
 */

namespace app\modules\post\models;


use creocoder\taggable\TaggableQueryBehavior;

class PostQuery extends \yii\db\ActiveQuery
{
    public function behaviors()
    {
        return [
            TaggableQueryBehavior::className(),
        ];
    }
}