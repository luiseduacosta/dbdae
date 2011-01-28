<h1>Inscrição para benefício moradia/bolsa auxilio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<fieldset><legend>Transporte</legend> <?php
echo $form->create("Aluno", array("action"=>"etransporte"));
?> O aluno utiliza veículo de sua propriedade ou da família para vir a
UFRJ? <?php
$opcoes = array('0'=>'Não','1'=>'Sim','2'=>'Eventualmente','3'=>'Na maioria das vezes');
echo $form->input("transporte_veiculo", array("type"=>"select", 'options'=>$opcoes, "size"=>"1", "label"=>false));
?> Número de transportes coletivos utilizados do local da moradia até o
campus universitário: <?php
echo $form->input("transporte_quantidade", array("type"=>"text", "size"=>"2", "label"=>false));
?> Valor total gasto diariamente em conduções (R$): <?php
echo $form->input("transporte_gasto", array("type"=>"text",
"size"=>"5", "label"=>false));
?> Tempo gasto para chegar a UFRJ (ex. 30 minutos = 0:30, 1 hora e 30
minutos = 1:30): <?php
echo $form->input("transporte_tempo", array("type"=>"text", "size"=>"5", "label"=>false));
?> <?php
echo $form->input("aluno_id", array("type"=>"hidden", "value"=>$aluno_id));
?> <?php echo $form->end('Confirmar'); ?></fieldset>
