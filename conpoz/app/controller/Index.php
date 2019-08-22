<?php
namespace Conpoz\App\Controller;

class Index extends \Conpoz\App\Controller\BaseController
{
    public function indexAction ($bag)
    {
        $this->view->addView('/htmlTemplate');
        $this->view->addView('/index/index');
        $fh = fopen($bag->config->GDFile['wedding'], 'r');
        $no = 0;
        $photoIdAry = array();
        while (!feof($fh)) {
            $fields = fgetcsv($fh);
            if ($no >= 2) {
                $photoIdAry[] = $fields[1];
            }
            $no++;
        }
        require($this->view->getView());
    }

    public function weddingAction ($bag)
    {
        $this->view->addView('/htmlTemplate');
        $this->view->addView('/index/wedding');
        $fh = fopen($bag->config->GDFile['wedding'], 'r');
        $no = 0;
        $photoIdAry = array();
        while (!feof($fh)) {
            $fields = fgetcsv($fh);
            if ($no >= 2) {
                $photoIdAry[] = $fields[1];
            }
            $no++;
        }
        require($this->view->getView());
    }

    public function dailyAction ($bag)
    {
        $this->view->addView('/htmlTemplate');
        $this->view->addView('/index/wedding');
        $fh = fopen($bag->config->GDFile['daily'], 'r');
        $no = 0;
        $photoIdAry = array();
        while (!feof($fh)) {
            $fields = fgetcsv($fh);
            if ($no >= 2) {
                $photoIdAry[] = $fields[1];
            }
            $no++;
        }
        require($this->view->getView());
    }

}
