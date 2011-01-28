<h1>Pontuação</h1>

<?php echo $paginator->numbers(); ?>
<br>
<?php echo $paginator->prev('<< Anterior ', null, null, array('class'=>'disabled')); ?>
<?php echo $paginator->next(' Posterior >> ', null, null, array('class'=>'disabled')); ?>

<table border='1'>
	<tr>
		<th><?php echo $paginator->sort('DRE','Aluno.dre'); ?></th>
		<th><?php echo $paginator->sort('Aluno','Aluno.nome'); ?></th>
		<th><?php echo $paginator->sort('Curso','Aluno.curso'); ?></th>
		<th><?php echo $paginator->sort('Data','Pontuacao.percapita'); ?></th>
	</tr>

	<?php foreach ($pontuacao as $c_pontuacao): ?>
	<tr>

		<td><?php echo $c_pontuacao['Aluno']['dre']; ?></td>

		<td><?php echo $c_pontuacao['Aluno']['nome']; ?></td>

		<td><?php echo $c_pontuacao['Aluno']['curso']; ?></td>

		<td><?php echo $c_pontuacao['Pontuacao']['percapita']; ?></td>

	</tr>
	<?php endforeach; ?>
</table>
