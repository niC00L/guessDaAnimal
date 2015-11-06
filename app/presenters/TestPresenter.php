<?php

namespace App\Presenters;

use Nette,
	App\Model;

class TestPresenter extends BasePresenter {

	/** @var array */
	private $allItems;
	private $id;
	private $options;

	public function handleQuestion($id) {
		$this->id = $id+1;
		$this->allItems = $this->db->table('animals')->where('id', $this->id )->fetchAll();
		$this->options = $this->db->table('animals')->limit(3)->order('RAND()')->where('NOT id', $this->id)->fetchAll();
		if ($this->isAjax()) {
			$this->redrawControl('ajaxChange');
		}
	}

	public function renderAnimals() {
		if ($this->id === NULL) {
			$this->id = '1';
		}
		if ($this->allItems === NULL) {
			$this->allItems = $this->db->table('animals')->where('id', $this->id)->fetchAll();
		}
		if($this->options === NULL) {
			$this->options = $this->db->table('animals')->limit(3)->order('RAND()')->where('NOT id', $this->id)->fetchAll();
		}
		$this->template->options = $this->options;
		$this->template->allItems = $this->allItems;
		$this->template->id = $this->id;
	}

	public function actionShowResults() {
		
	}
}
