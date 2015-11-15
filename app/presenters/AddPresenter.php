<?php

namespace App\Presenters;

use Nette,
    App\Model,
    Nette\Application\UI\Form,
    Nette\Http\FileUpload;

class AddPresenter extends BasePresenter {

    public function renderDefault() {
        
    }

    protected function createComponentSignInForm() {
        $form = new Form;
        $form->addText('username', 'Zadaj meno:')
                ->setAttribute('class', 'form-control')
                ->setAttribute('placeholder', 'Zadaj meno')
                ->setRequired('Zadaj tajné meno.');

        $form->addPassword('password', 'Zadaj heslo:')
                ->setAttribute('placeholder', 'Zadaj heslo')
                ->setAttribute('class', 'form-control')
                ->setRequired('Zadaj tajné heslo.');

        $form->addSubmit('send', 'Prihlásiť')
                ->setAttribute('class', 'btn btn-primary');

        $form->onSuccess[] = array($this, 'signInFormSucceeded');
        return $form;
    }

    public function signInFormSucceeded($form) {
        $values = $form->values;
        try {
            $this->getUser()->login($values->username, $values->password);
            $this->redirect('Add:add');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Incorrect username or password.');
        }
    }

    public function actionAdd() {
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Add:default');
        }
    }

    protected function createComponentAddForm() {
        $form = new Form;

        $form->addText('svk_name', 'Slovensky nazov')
                ->setAttribute('class', 'form-control')
                ->setAttribute('placeholder', 'Zadaj meno');
        $form->addText('eng_name', 'Anglicky nazov')
                ->setAttribute('class', 'form-control')
                ->setAttribute('placeholder', 'Zadaj meno');
        $form->addUpload('img', 'Obrázok ako odpoved')
                ->setAttribute('class', 'form-control')
                ->addRule(Form::IMAGE, _('Obrázok musí byť vo JPEG, PNG alebo GIF.'));
        $form->addUpload('img_black', 'Obrázok ako otazka')
                ->setAttribute('class', 'form-control')
                ->addRule(Form::IMAGE, _('Obrázok musí byť vo JPEG, PNG alebo GIF.'));

        $form->addSubmit('send', 'Odoslat')
                ->setAttribute('class', 'btn btn-primary');

        $form->onSuccess[] = array($this, 'addFormSucceeded');
        return $form;
    }

    public function addFormSucceeded($form) {
        $values = $form->values;        
        
        $img = $values['img'];
        $values['img'] = $img->name;
        $img->move( 'img/animals/'.$values['img']);
        
        $img_black = $values['img_black'];
        $values['img_black'] = $img_black->name;
        $img_black->move('img/animals/black/'.$values['img_black']);

        $this->db->table('animals')->insert($values);
    }

}
