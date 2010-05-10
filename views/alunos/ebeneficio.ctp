<h1>Formulário de inscrição para benefício moradia/bolsa auxílio</h1>

<fieldset>
<legend>Solicitação de Benefício</legend>

<?php echo 
$form->create('Aluno', array('type' => 'file', 'action' => 'ebeneficio'));
?>

Benêficio pretendido:
<?php
$opcoes=array('1'=>'Benefício moradia', '2'=>'Bolsa auxílio');
echo $form->input('beneficio', array('type'=>'select', 'options'=>$opcoes, 'label'=>false));
?>

Já solicitou algun benefício junto a Divisão de Assistência ao Estudante:
<?php
echo $form->input('beneficio_anterior', array('type'=>'select', 'options'=>array('0'=>'Não','1'=>'Sim'), 'size'=>'1', 'label'=>false));
?>

Qual(is):
<?php 
$opcoes=array('0'=>'Não corresponde', '1'=>'Benefício moradia', '2'=>'Bolsa auxílio');
echo $form->input('beneficio_solicitado', array('type'=>'select', 'options'=>$opcoes, 'size'=>'1', 'label'=>false));
?>

Em que ano:
<?php
echo $form->input('beneficio_ano', array("type"=>'text', "size"=>'4', "label"=>false));
?>

Calouro?
<?php
echo $form->input('calouro', array('type'=>'select', 'options'=>array('0'=>'Não','1'=>'Sem'), 'size'=>'1', 'label'=>false));
?>

Qual semestre:
<?php
echo $form->input('calouro_semestre', array('type'=>'select', 'options'=>array('0'=>'Não corresponde', '1'=>'Primeiro semestre', '2'=>'Segundo semestre'), 'size'=>'1', 'label'=>false));
?>

<?php
echo $form->input('id', array("type"=>'hidden', "size"=>'4', "value"=>$aluno_id, "label"=>false));
?>

<?php echo $form->end('Confirmar'); ?>

</fieldset>
