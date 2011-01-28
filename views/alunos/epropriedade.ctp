<h1>Inscrição para benefício moradia/bolsa auxilio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<fieldset><legend>Propriedades da família</legend> <?php echo $form->create('Aluno', array('action' => 'epropriedade')); ?>

<p>Imóvel onde reside: <?php
$opcoes=array('0'=>'Não proprietario','1'=>'Quitado','2'=>'Em
financiamento');
echo $form->input('propriedade_imovel', array('type'=>'select', 'options'=>$opcoes, 'label'=>false));
?> Imóvel(eis) residenciais alugado(s) - quantos?: <?php
echo $form->input('propriedde_residencial_alugada',
array('type'=>'text', 'size'=>'2', 'value'=>'0', 'label'=>false));
?> Imóvel(eis) comerciais alugado(s) - quantos?: <?php
echo $form->input('propriedde_comercial_alugada',
array('type'=>'text', 'size'=>'2', 'value'=>'0', 'label'=>false));
?> Outros: especificar <?php echo
$form->input('propriedade_outro', array('type'=>'text', 'size'=>'15', 'label'=>false));
?> Automóvel(eis). Quantos: <?php
echo $form->input('propriedade_automovel', array("type"=>'text',
"size"=>'2', "label"=>false));
?> Automóvel. Marca: <?php
echo $form->input('propriedade_automovel_marca', array("type"=>'text',
"size"=>'15', "label"=>false));
?> Automóvel. Ano: <?php
echo $form->input('propriedade_automovel_ano', array("type"=>'text',
"size"=>'4', "label"=>false));
?> <?php
echo $form->input("id", array("type"=>"hidden", "value"=>$aluno_id));
?> <?php echo $form->end('Confirmar'); ?>
</fieldset>
