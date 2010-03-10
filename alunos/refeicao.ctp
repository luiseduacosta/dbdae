<h1>Formulário de inscrição para benefício moradia/bolsa auxílio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<fieldset>

<legend>Locais onde faz regularmente as refeições:</legend>

<?php echo 
$form->create('Aluno', array('type' => 'file', 'action'=>'refeicao'));
?>

<?php
$opcoes = array('0'=>'Traillers','1'=>'Cantinas da UFRJ','2'=>'Pensão','3'=>'Restaurantes no campus','4'=>'Sua própria casa','5'=>'Casa dos pais','6'=>'Outros');
echo $form->input("local_refeicao", array("type"=>"select", 'options'=>$opcoes, "size"=>"1", "label"=>false));
?>

Especificar outros:
<?php
echo $form->input("local_refeicao_outro", array("type"=>"text", "size"=>"15", "label"=>false));
?>

<?php
echo $form->input("id", array("type"=>"text", "size"=>"5", "value"=>$aluno_id, "label"=>false));
?>

<?php echo $form->end('Continuar'); ?>

</fieldset>
