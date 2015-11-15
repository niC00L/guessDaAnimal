<?php

namespace App\Presenters;

use Nette;

class HomepagePresenter extends BasePresenter {
    public function renderDefault() {
        $this->template->imgs = $this->db->table('animals')->select('img, img_black')->fetchAll();        
    }
}
