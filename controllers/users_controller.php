<?php

class UsersController extends AppController {

    var $name = 'Users';

    function login() {

        var_dump(($this->Auth->data));
        
    }

    function logout() {

        $this->redirect($this->Auth->logout());

    }
}

?>
