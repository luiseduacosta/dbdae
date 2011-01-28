<h1>Formulário de inscrição para benefício moradia/bolsa auxilio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<fieldset><legend>Informações adicionais que o aluno
queira prestar para justificar o pedido do benefício</legend> <?php echo $form->create('Aluno', array('type'=>'file', 'action'=>'adicional')); ?>

<?php
echo $form->input("inforacoa_adicional", array("type"=>"textarea", "rows"=>"5", 'cols'=>'70', "label"=>false));
?> <?php
echo $form->input('id', array('type'=>'hidden', 'value'=>$aluno_id));
?> <?php echo $form->end('Continuar'); ?></fieldset>
