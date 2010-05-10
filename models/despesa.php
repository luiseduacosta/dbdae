<?php

class Despesa extends AppModel {
	
	var $name = 'Despesa';
	var $displayField = 'especificacao';

	var $belongsTo = 'Aluno';
}

?>
