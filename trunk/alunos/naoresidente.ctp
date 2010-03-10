<h1>Formulário de inscrição para benefício moradia/bolsa auxílio</h1>

<h2>Uma vez inseridos os familiares não residentes 
<?php echo
$html->link("continuar", "/Rendas/add/" . $aluno_id);
?>
</h2>

<fieldset>
<legend>Informações sobre familiares (mãe, pai, cônjuge) que não residam com aluno</legend>

<?php echo 
$form->create('Aluno', array('type' => 'file', 'action'=>'naoresidente'));
?>

Vínculo familiar:
<?php
$opcoes=array('1'=>'Mae ou Pai', '2'=>'Cônjuge', '3'=>'Outro');
echo $form->input('nao_residente_familiar', array('type'=>'select', 'options'=>$opcoes, 'label'=>false));
?>

Outro vínculo familiar (especificar):
<?php
echo $form->input('nao_residente_outro', array('type'=>'text', 'size'=>'15', "label"=>false));
?>

Nome:
<?php
echo $form->input('nao_residente_nome', array('type'=>'text', 'size'=>'70', "label"=>false));
?>

CPF:
<?php
echo $form->input("nao_residente_cpf", array("type"=>'text', 'size'=>'14', "label"=>'Formato: xxx.xxx.xxx-xx'));
?>

Cidade:
<?php
echo $form->input("nao_residente_cidade", array("type"=>'text', 'size'=>'20',
"value"=>"Rio de Janeiro", "label"=>false));
?>

Profissão:
<?php
echo $form->input("nao_residente_profissao", array("type"=>'text',
'size'=>'15', "label"=>false));
?>

Cargo/função:
<?php
echo $form->input("nao_residente_cargo", array("type"=>'text',
'size'=>'15', "label"=>false));
?>

Renda:
<?php
echo $form->input("nao_residente_renda", array("type"=>'text',
'size'=>'5', "label"=>false));
?>

<fieldset>
<legend>Aposentado</legend>

Data aposentadoria:
<?php
echo $form->input("nao_residente_data_aposentadoria", array("type"=>'text',
'size'=>'5', "label"=>false));
?>

Profissão que exercia:
<?php
echo $form->input("nao_residente_profissao_aposentado", array("type"=>'text',
'size'=>'15', "label"=>false));
?>

Renda do aposentado:
<?php
echo $form->input("nao_residente_renda_aposentado", array("type"=>'text',
'size'=>'15', "label"=>false));
?>
</fieldset>

<fieldset>
<legend>Familiar falecido</legend>

Data falecimento:
<?php
echo $form->input("nao_residente_data_falecimento", array("type"=>'text',
'size'=>'5', "label"=>false));
?>

Profissão que exercia:
<?php
echo $form->input("nao_residente_profissao_falecido", array("type"=>'text',
'size'=>'15', "label"=>false));
?>

Pensão:
<?php
echo $form->input("nao_residente_pensao", array("type"=>'text',
'size'=>'5', "label"=>false));
?>

Beneficiário:
<?php
echo $form->input("nao_residente_beneficiario", array("type"=>'text',
'size'=>'15', "label"=>false));
?>

</fieldset>

<?php
echo $form->input("id", array("type"=>'text', 'value'=>$aluno_id, 'size'=>'5', "label"=>false));
?>

<?php echo $form->end('Continuar'); ?>

</fieldset>
