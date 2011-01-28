<?php

class Pontuacao extends AppModel {

	var $name = 'Pontuacao';
	var $useTable = 'pontuacaos';
	var $displayField = 'aluno_id';

	var $belongsTo = 'Aluno';
}

?>
