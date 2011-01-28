<h1>Agendamento de entrevistas</h1>

<?php echo $paginator->numbers(); ?>
<br>
<?php echo $paginator->prev('<< Anterior ', null, null, array('class'=>'disabled')); ?>
<?php echo $paginator->next(' Posterior >> ', null, null, array('class'=>'disabled')); ?>

<table border='1'>
	<tr>
		<th><?php echo $paginator->sort('DRE','dre'); ?></th>
		<th><?php echo $paginator->sort('Aluno','aluno'); ?></th>
		<th><?php echo $paginator->sort('Curso','curso'); ?></th>
		<th><?php echo $paginator->sort('Benefício','beneficio'); ?></th>
		<th><?php echo $paginator->sort('Data da entrevista','Entrevista.data'); ?></th>
		<th><?php echo $paginator->sort('Hora da entrevista','Entrevista.hora'); ?></th>
	</tr>

	<?php foreach ($alunos as $c_aluno): ?>
	<tr>

		<td><?php echo $c_aluno['Aluno']['id']; ?></td>

		<td><?php echo $c_aluno['Aluno']['nome']; ?></td>

		<td><?php echo $c_aluno['Aluno']['curso']; ?></td>

		<td><?php echo $c_aluno['Aluno']['beneficio']; ?></td>

		<td><?php
                if ($c_aluno['Entrevista']) {
                    $tamanho = sizeof($c_aluno['Entrevista']);
                    echo $c_aluno['Entrevista'][$tamanho-1]['data'];
                } else {
                    echo "Sem entrevista";
                }
                ?></td>

		<td><?php
                if ($c_aluno['Entrevista']) {
                    echo $c_aluno['Entrevista'][$tamanho-1]['hora'];
                } else {
                    echo "&nbsp";
                }
                ?></td>

	</tr>
	<?php endforeach; ?>
</table>
