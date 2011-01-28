<?php

class Aluno extends AppModel {

	var $name = 'Aluno';
	// var $actsAs = array('CakeBr.Validacao');

	var $displayField = 'nome';

	var $belongsTo = array('User');
	var $hasMany = array('Familia', 'Entrevista', 'Renda', 'Despesa');
	var $hasOne = array('Pontuacao');
	/*
	 var $validate = array(
	 'beneficio_ano'=>array(
		'rule'=>'numeric',
		'required'=>true,
		'allowEmpty'=>true,
		'message'=>'Digite somente números'),
		'nome'=> array(
		"rule"=>'notEmpty',
		'required'=>true,
		'allowEmpty'=>false,
		'message'=>'Obrigatório'),
		'curso'=>array(
		'rule'=>'notEmpty',
		'required'=>true,
		'allwEmpty'=>false,
		'message'=>'Obrigatório'),
		'dre'=>array(
		'rule'=>'numeric',
		'required'=>true,
		'allowEmpty'=>false,
		'message'=>'Digite seu DRE'),
		'email'=> array(
		'rule'=>'email',
		'message'=>'Digite um email válido'),
		'nascimento' => array(
		'rule'=>'date'),
		'reside_com'=>array(
		'rule'=>'notEmpty',
		'required'=>true,
		'allowEmpty'=>false,
		'message'=>'Informe com quem reside'),
		'familia_cep'=>array(
		'rule'=>'cep',
		'required'=>true,
		'allowEmpty'=>true,
		'message'=>'Digite o CEP no formato xxxxx-xx'),
		'transporte_quantidade'=>array(
		'rule'=>'numeric',
		'required'=>true,
		'allowEmpty'=>true,
		'message'=>'Digite somente números'),
		'transporte_gasto'=>array(
		'rule'=>array('decimal', 2),
		'required'=>true,
		'allowEmpty'=>true,
		'message'=>'Digite número decimal')
		);
		*/
}

?>
