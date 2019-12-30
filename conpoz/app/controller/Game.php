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
        $scoreObj = new \Conpoz\App\Lib\ScoreStream(450, 300, CONPOZ_PATH . '/public/SourceHanSansTC-Medium.otf', 1, array(31, 71, 136), array(255, 255, 255));
        while (!connection_aborted()) {
            $scoreObj->drawFrame();
            $team1Ary = $bag->mem->get('scoreTeam1');
            $team2Ary = $bag->mem->get('scoreTeam2');
            $team1Ary = array_merge(array('name' => '--', 'score1' => '--', 'score2' => '--'), $team1Ary);
            $team2Ary = array_merge(array('name' => '--', 'score1' => '--', 'score2' => '--'), $team2Ary);
            $scoreObj->drawScore($team1Ary, $team2Ary);
            $scoreObj->render();
            usleep(1000000);
        }

        // $fh = fopen(LOG_PATH . '/test.log', 'a');
        // fwrite($fh, time() . PHP_EOL);
        // fclose($fh);
    }

    public function setScoreAction ($bag)
    {
        try {
            $jsonData = $bag->req->getPost('jsonData');
            $dataAry = json_decode($jsonData, true);
            $bag->mem->set('scoreTeam1', $dataAry['scoreTeam1']);
            $bag->mem->set('scoreTeam2', $dataAry['scoreTeam2']);
            echo json_encode(array('result' => 0));
        } catch (\Exception $e) {
            echo json_encode(array('result' => -1, 'msg' => $e->getMessage()));
        }
    }
}
