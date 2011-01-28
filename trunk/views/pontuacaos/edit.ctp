<h2>Editar</h2>

<?php echo $html->link('Editar aluno', '/Alunos/edit/' . $aluno['Aluno']['id']); ?>

<p>DRE: <?php echo $aluno['Aluno']['dre']; ?><br>
Nome: <?php echo $aluno['Aluno']['nome']; ?><br>
Curso: <?php echo $aluno['Aluno']['curso']; ?><br>
Benefício: <?php echo $aluno['Aluno']['beneficio']; ?><br>
</p>

<?php

echo $form->create('Pontuacao');
echo $form->input('percapita', array('label'=>'Renda per capita'));
echo $form->input('aluno_id', array('type'=>'text',
'value'=>$aluno['Aluno']['id']));
echo $form->end('Atualizar');

?>
