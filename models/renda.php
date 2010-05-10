<?php

class Renda extends AppModel {
	
	var $name = 'Renda';
	var $displayField = 'aluno_id';

	var $belongsTo = 'Aluno';
}

?>
