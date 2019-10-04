<?php
namespace Conpoz\App\Controller;

class Game extends \Conpoz\App\Controller\BaseController
{
    public function scoreAction ($bag)
    {
        $this->view->addView('/game/score');
        require($this->view->getView());
    }

}
