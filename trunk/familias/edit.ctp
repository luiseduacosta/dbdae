<h2>Editar</h2>

<h3>Reside com: <?php echo $aluno['Aluno']['reside_com']; ?></h3>

<?php

echo "Família do aluno " . $aluno['Aluno']['nome'];

echo $form->create('Familia');
echo $form->input('nome', array('size'=>'70'));
echo $form->input('parentesco', array('size'=>'15'));
echo $form->input('idade', array('size'=>'2'));
echo $form->input('instrucao', array('size'=>'20', 'label'=>'Instrução'));
echo $form->input('profissao', array('size'=>'20', 'label'=>'Profissão'));
echo $form->input('cpf', array('size'=>'14', 'label'=>'CPF'));
echo $form->input('rendimento', array('size'=>'5','label'=>'Rendimento em R$'));
echo $form->input('aluno_id', array('type'=>'text', 'value'=>$aluno['Aluno']['id']));
echo $form->end('Atualizar');

?>
