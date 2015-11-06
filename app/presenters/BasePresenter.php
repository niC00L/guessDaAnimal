<?php

namespace App\Presenters;

use Nette,
	App\Model;

class BasePresenter extends Nette\Application\UI\Presenter  {
	/** @var Nette\Database\Context */
    protected $db;

    public function __construct(\Nette\Database\Context $db) {
        parent::__construct();
        $this->db = $db;
    }	
}
