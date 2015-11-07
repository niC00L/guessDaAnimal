<?php

namespace App\Presenters;

use Nette,
    App\Model;

class TestPresenter extends BasePresenter {

    /** @var array */
    private $quest;
    private $id;
    private $options;
    private $ajax;

    public function handleQuestion() {
        $this->quest = $this->db->table('animals')->order('RAND()')->limit(1)->fetchAll();
        foreach ($this->quest as $a) {
            $this->id = $a['id'];
        }
        $options = $this->db->table('animals')->limit(3)->order('RAND()')->where('NOT id', $this->id)->fetchAll();
        $this->options = array_merge($this->quest, $options);
        shuffle($this->options);
        if ($this->isAjax()) {
            $this->redrawControl('ajaxChange');
        }
        $this->ajax = $this->isAjax();
    }

    public function renderAnimals() {
//        if ($this->quest === NULL) {
//            $this->quest = $this->db->table('animals')->order('RAND()')->limit(1)->fetchAll();
//            foreach ($this->quest as $a) {
//                $this->id = $a['id'];
//            }
//        }
//        if ($this->options === NULL) {
//            $options = $this->db->table('animals')->limit(3)->order('RAND()')->where('NOT id', $this->id)->fetchAll();
//            $this->options = array_merge($this->quest, $options);
//            shuffle($this->options);
//        }
        $this->template->options = $this->options;
        $this->template->quest = $this->quest;
        $this->template->ajax = $this->ajax;
    }

    public function actionShowResults() {
        
    }

}
