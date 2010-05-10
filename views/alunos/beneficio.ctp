<h1>Formulário de inscrição para benefício moradia/bolsa auxílio</h1>

<fieldset>
<legend>Solicitação de Benefício</legend>

<?php echo 
$form->create('Aluno', array('type' => 'file', 'action' => 'beneficio'));
?>

<p>
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

</p>  

</fieldset>

<fieldset>
<legend>Dados pessoais</legend>

Nome:
<?php
echo $form->input('nome', array('type'=>'text', 'size'=>'70', "label"=>false));
?>

CPF:
<?php
echo $form->input("cpf", array("type"=>'text', 'size'=>'12', "label"=>false));
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
"value"=>"Brasileiro", "label"=>false));
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
echo $form->input("cep", array("type"=>'text', 'size'=>'10', "label"=>false));
?>

Email:
<?php
echo $form->input("email", array("type"=>"text", "size"=>"60", "label"=>false));
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
echo $form->input("cep", array("type"=>'text', 'size'=>'10', "label"=>false));
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

</fieldset>

<fieldset>

<legend>Dados sócio-econômicos</legend>

Locais onde faz regularmente as refeições:
<?php
$opcoes = array('0'=>'Traillers','1'=>'Cantinas da UFRJ','2'=>'Pensão','3'=>'Restaurantes no campus','4'=>'Sua própria casa','5'=>'Casa dos pais','6'=>'Outros');
echo $form->input("local_refeicao", array("type"=>"select", 'options'=>$opcoes, "size"=>"1", "label"=>false));
?>

Especificar outros:
<?php
echo $form->input("local_refeicao_outro", array("type"=>"text", "size"=>"15", "label"=>false));
?>

<fieldset>

<legend>Transporte</legend>

O aluno utiliza veículo de sua propriedade ou da família para vir a UFRJ?
<?php
$opcoes = array('0'=>'Não','1'=>'Sim','2'=>'Eventualmente','3'=>'Na maioria das vezes');
echo $form->input("transporte_veiculo", array("type"=>"select", 'options'=>$opcoes, "size"=>"1", "label"=>false));
?>

Número de transportes coletivos utilizados do local da moradia até o campus universitário:
<?php
echo $form->input("transporte_quantidade", array("type"=>"text", "size"=>"2", "label"=>false));
?>

Valor total gasto diariamente em conduções (R$):
<?php
echo $form->input("transporte_gasto", array("type"=>"text", "size"=>"2", "label"=>false));
?>

Tempo gasto para chegar a UFRJ (ex. 30 minutos = 0:30, 1 hora e 30 minutos = 1:30):
<?php
echo $form->input("transporte_tempo", array("type"=>"text", "size"=>"5", "label"=>false));
?>

</fieldset>

<?php
echo $form->input("id", array("type"=>"text", "size"=>"5",
"value"=>$aluno_id, "label"=>false));
?>

<?php echo $form->end('Continuar'); ?>

</fieldset>
