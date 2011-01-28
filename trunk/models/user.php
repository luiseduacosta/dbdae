<?php

class User extends AppModel {

	var $name = 'User';
	var $useTable = 'users';
	var $displayField = 'nome';

	var $hasMany = 'Aluno';

}

?>
