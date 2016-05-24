<?php

namespace app\actions;

use app\modules\dropzonejs\models\UploadedFiles;
use Yii;
use yii\base\Action;
use Yii\image\drivers\Image;

class ImgAction extends Action
{
    private $sizes = [
        'a'            => [
            'height' => 100,
            'width'  => 100,
        ],
        'm'            => [
            'height' => 150,
            'width'  => 150,
        ],
        'main'         => [
            'height' => 250,
            'width'  => 250,
        ],
        'mm'           => [
            'height' => 350,
            'width'  => 350,
        ],
        'f'            => [
            'height' => 650,
            'width'  => 650,
        ],
        'ff'           => [
            'height' => 1250,
            'width'  => 1250,
        ],
        'b'            => [
            'height' => 950,
            'width'  => 950,
        ],
        'auctionThumb' => [
            'height' => 120,
            'width'  => 148,
        ],
        'gallery'      => [
            'height' => 70,
            'width'  => 70,
        ],
    ];

    public function run($id = null, $format = 'b')
    {
        $dummy = Yii::getAlias('@webroot/images/ava.gif');
        if (!$id) {
            $this->setLastModified('2015-01-01 00:00:00');
            header('Content-Type: image/gif');
            die(readfile($dummy));
        }

        $info = UploadedFiles::find()->where(['id' => $id])->one();
        if (!$info) {
            $this->setLastModified('2015-01-01 00:00:00');
            header('Content-Type: image/gif');
            die(readfile($dummy));
        }
        $file = Yii::getAlias('@app/web/') . Yii::$app->getModule('dropzonejs')->uploadPath . $info->path . $info->name . '.' . $info->ext;
//        dx($file);
        if (!file_exists($file) || !filesize($file)) {
            $this->setLastModified('2015-01-01 00:00:00');
            header('Content-Type: image/gif');
            die(readfile($dummy));
        }

        if (!empty($this->sizes[$format])) {
            $this->setLastModified(date('Y-m-d H:i:s', $info->created_at));
            header("Content-Type: image/jpg");
            $image = Yii::$app->image->load($file);
            echo $image->resize($this->sizes[$format]['width'], $this->sizes[$format]['height'], Image::PRECISE)->render();
        }
    }


    private function setLastModified($date)
    {
        $LastModified_unix = strtotime($date);
        $LastModified = gmdate('D, d M Y H:i:s \G\M\T', strtotime($date));
        $IfModifiedSince = false;
        if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
            $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));
        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
            $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
        if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
            exit;
        }
        header('Last-Modified: ' . $LastModified);
    }


}