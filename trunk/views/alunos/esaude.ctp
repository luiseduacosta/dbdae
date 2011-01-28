<h1>Formulário de inscrição para benefício moradia/bolsa auxílio</h1>

<fieldset><legend>Saúde</legend> <?php echo 
$form->create('Aluno', array('type' => 'file', 'action' => 'esaude'));
?> Alguem de seu grupo familiar é portador de doença grave/crônica? <?php
$opcoes = array('0'=>'Não', '1'=>'Sim');
echo $form->input("doenca", array("type"=>"select", 'options'=>$opcoes, "size"=>"1", "label"=>false));
?> Especifique: <?php
echo $form->input("doenca_especifique", array("type"=>"text", "size"=>"20", "label"=>false));
?> Existem gastos com medicação que tenham impacto na renda familiar? <?php
$opcoes = array('0'=>'Não', '1'=>'Sim');
echo $form->input("medicacao", array("type"=>"select", 'options'=>$opcoes, "size"=>"1", "label"=>false));
?> Valor mensual: <?php
echo $form->input("medicacao_valor", array("type"=>"text", "size"=>"5", "label"=>false));
?> <?php
echo $form->input("id", array("type"=>"text", "size"=>"5", "value"=>$aluno_id, "label"=>false));
?> <?php echo $form->end('Confirmar'); ?></fieldset>
