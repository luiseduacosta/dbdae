<h1>Formulário de inscrição para benefício moradia/bolsa auxílio</h1>

<fieldset>
<legend>Dados pessoais</legend>

<?php echo 
$form->create('Aluno', array('type' => 'file', 'action'=>'ealuno'));
?>

Nome:
<?php
echo $form->input('nome', array('type'=>'text', 'size'=>'70', "label"=>false));
?>

CPF:
<?php
echo $form->input("cpf", array("type"=>'text', 'size'=>'14', "label"=>false));
?>

Curso:
<?php
echo $form->input("curso", array("type"=>'text', "size"=>'20', "label"=>false));
?>

DRE:
<?php
echo $form->input("dre", array("type"=>'text', 'size'=>'9', "label"=>false));
?>

Data de nascimento:
<?php
echo $form->input("nascimento", array("type"=>'date', 'size'=>'1',
"minYear"=>"1900", "label"=>false));
?>

Sexo:
<?php
echo $form->input("sexo", array("type"=>'select', 'options'=>array('0'=>'Feminino','1'=>'Masculino'), 'size'=>'1', "label"=>false));
?>

Estado civil:
<?php
echo $form->input("estado_civil", array("type"=>'text', 'size'=>'15', "label"=>false));
?>

Naturidade:
<?php
echo $form->input("naturidade", array("type"=>'text', 'size'=>'20',
"label"=>false));
?>

Endereço:
<?php
echo $form->input("endereco", array("type"=>'text', 'size'=>'50', "label"=>false));
?>

Complemento/No.:
<?php
echo $form->input("complemento", array("type"=>'text','size'=>'15', "label"=>false));
?>

Bairro:
<?php
echo $form->input("bairro", array("type"=>'text', 'size'=>'20', "label"=>false));
?>

Cidade:
<?php
echo $form->input("cidade", array("type"=>'text', 'size'=>'20',
"value"=>"Rio de Janeiro", "label"=>false));
?>

Estado:
<?php
echo $form->input("estado", array("type"=>'text', 'size'=>'2',
"value"=>"RJ", "label"=>false));
?>

CEP:
<?php
echo $form->input("cep", array("type"=>'text', 'size'=>'9', "label"=>false));
?>

Email:
<?php
echo $form->input("email", array("type"=>"text", "size"=>"70", "label"=>false));
?>

Telefone:
<?php
echo $form->input("telefone", array("type"=>"text", "size"=>"9", "label"=>false));
?>

Celular:
<?php
echo $form->input("celular", array("type"=>"text", "size"=>"9", "label"=>false));
?>

Especificar com quem reside (família, parente, amigos, vaga alugada, etc):
<?php
echo $form->input("reside_com", array("type"=>"text", "size"=>"15", "label"=>false));
?>

Indicar pontos de referência da residência:
<?php
echo $form->input("residencia_referencia", array("type"=>"textarea", "rows"=>"5", 'cols'=>'70', "label"=>false));
?>

<fieldset>
<legend>Preencher somente se o endereço da família não for o mesmo do aluno</legend>

Endereço da família:
<?php
echo $form->input("familia_endereco", array("type"=>"text", "size"=>"70", "label"=>false));
?>

Bairro da família
<?php
echo $form->input("familia_bairro", array("type"=>'text', 'size'=>'20', "label"=>false));
?>

Cidade da família:
<?php
echo $form->input("familia_cidade", array("type"=>'text', 'size'=>'20', "label"=>false));
?>

Estado da família:
<?php
echo $form->input("familia_estado", array("type"=>'text', 'size'=>'2', "label"=>false));
?>

CEP do endereço da família:
<?php
echo $form->input("familia_cep", array("type"=>'text', 'size'=>'9', "label"=>false));
?>

Telefone da família:
<?php
echo $form->input("familia_telefone", array("type"=>"text", "size"=>"9", "label"=>false));
?>

Indicar pontos de referência da residência da família:
<?php
echo $form->input("residencia_referencia", array("type"=>"textarea", "rows"=>"5", 'cols'=>'70', "label"=>false));
?>

</fieldset>

<?php
echo $form->input("id", array("type"=>"hidden", "size"=>"5", "value"=>$aluno_id, "label"=>false));
?>

<?php echo $form->end('Confirmar'); ?>

</fieldset>
