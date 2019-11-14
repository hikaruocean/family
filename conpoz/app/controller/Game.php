<?php
namespace Conpoz\App\Controller;

class Game extends \Conpoz\App\Controller\BaseController
{
    public function scoreAction ($bag)
    {
        $this->view->addView('/game/score');
        require($this->view->getView());
    }

    public function mjpegAction ($bag)
    {
        set_time_limit(0);
        $boundary = uniqid();
        header('Content-Type: multipart/x-mixed-replace; boundary=--' . $boundary);

        while (!connection_aborted()) {
            echo '--' . $boundary . PHP_EOL;
            echo 'Content-Type: image/jpeg' . PHP_EOL . PHP_EOL;
            // readfile(CONPOZ_PATH . '/public/img/pr01.jpg');
            $im = imagecreatetruecolor(600, 200);
            $bgColor = imagecolorallocate($im, 31, 71, 136);
            imagefill($im, 0, 0, $bgColor);
            $text_color = imagecolorallocate($im, 255, 255, 255);
            imagestring($im, 36, 5, 5,  date('Y-m-d H:i:s') . 'hikaru', $text_color);

            // Output the image
            imagejpeg($im);

            // Free up memory
            imagedestroy($im);
            unset($im);
            usleep(250000);
        }
        // $fh = fopen(LOG_PATH . '/test.log', 'a');
        // fwrite($fh, time() . PHP_EOL);
        // fclose($fh);
    }
}
