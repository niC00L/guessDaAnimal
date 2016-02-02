<?php

namespace App\Presenters;

use Nette,
    App\Model,
    Nette\Application\UI\Form;

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

    public function handleAddResult($name, $correct, $wrong, $time) {
        $values = array(
            'name' => $name,
            'correct_ans' => $correct,
            'wrong_ans' => $wrong,
            'time' => $time
        );
        $this->db->table('answers')->insert($values);
    }

    public function renderAnimals() {
        $this->template->options = $this->options;
        $this->template->quest = $this->quest;
        $this->template->ajax = $this->ajax;
        $this->template->names = $this->db->table('answers')->select('name')->fetchAll();
        $this->template->imgs = $this->db->table('animals')->select('img, img_black')->fetchAll();
    }

    public function renderShow() {
        $this->template->values = $this->db->table('answers')->fetchAll();
    }
}
