<?php
namespace Conpoz\App\Lib;

class ScoreStream
{
    public $width = 0;
    public $height = 0;
    public $image = null;
    public $bgColor = null;
    public $textColor = null;
    public $font = null;
    public $type = null;
    public $boundary = null;

    public function __construct ($width, $height, $font, $type = 1, $bgColorAry = array(31, 71, 136), $textColorAry = array(255, 255, 255))
    {
        set_time_limit(0);
        $this->boundary = uniqid();
        header('Content-Type: multipart/x-mixed-replace; boundary=--' . $this->boundary);
        $this->width = $width;
        $this->height = $height;
        $this->image = imagecreatetruecolor($this->width, $this->height);
        $this->bgColor = imagecolorallocate($this->image, ...$bgColorAry);
        $this->textColor = imagecolorallocate($this->image, ...$textColorAry);
        $this->font = $font;
        $this->type = $type;
    }

    public function __destruct ()
    {
        imagedestroy($this->image);
    }

    public function clearImage ()
    {
        imagedestroy($this->image);
    }

    public function drawFrame ()
    {
        switch ($this->type) {
            case 1:
                imagefilledrectangle($this->image, 0, 0, $this->width, $this->height, $this->bgColor);
                imagefilledrectangle($this->image, 0, 0, 450, 2, $this->textColor);
                imagefilledrectangle($this->image, 0, 0, 2, 300, $this->textColor);
                imagefilledrectangle($this->image, 447, 0, 450, 300, $this->textColor);
                imagefilledrectangle($this->image, 0, 297, 450, 300, $this->textColor);
                imagefilledrectangle($this->image, 0, 149, 450, 151, $this->textColor);
                imagefilledrectangle($this->image, 200, 0, 202, 300, $this->textColor);
                imagefilledrectangle($this->image, 324, 0, 326, 300, $this->textColor);
                break;
        }
    }


    public function drawScore ($team1Ary, $team2Ary)
    {
        switch ($this->type) {
            case 1:
                imagettftext($this->image, 36, 0, 20, 90, $this->textColor, $this->font, $team1Ary['name']);
                imagettftext($this->image, 36, 0, 20, 240, $this->textColor, $this->font, $team2Ary['name']);
                imagettftext($this->image, 36, 0, 230, 90, $this->textColor, $this->font, $team1Ary['score1']);
                imagettftext($this->image, 36, 0, 354, 90, $this->textColor, $this->font, $team1Ary['score2']);
                imagettftext($this->image, 36, 0, 230, 240, $this->textColor, $this->font, $team2Ary['score1']);
                imagettftext($this->image, 36, 0, 354, 240, $this->textColor, $this->font, $team2Ary['score2']);
                break;
        }
    }

    public function render ()
    {
        echo '--' . $this->boundary . PHP_EOL;
        echo 'Content-Type: image/jpeg' . PHP_EOL . PHP_EOL;
        imagejpeg($this->image);
    }
}
