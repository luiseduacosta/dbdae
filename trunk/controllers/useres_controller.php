<?php

class UseresController extends AppController {

    var $name = 'Useres';

    function login() {

    }

    function logout() {

        $this->redirect($this->Auth->logout());

    }
}

?>
