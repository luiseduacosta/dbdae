<h1>Solicitações de benefícios</h1>

<?php $i = 1; ?>

<?php echo $paginator->numbers(); ?>
<br>
<?php echo $paginator->prev('<< Anterior ', null, null, array('class'=>'disabled')); ?>
<?php echo $paginator->next(' Posterior >> ', null, null, array('class'=>'disabled')); ?>

<table border='1'>
	<tr>
		<th>Id</th>
		<th><?php echo $paginator->sort('DRE','Aluno.dre'); ?></th>
		<th><?php echo $paginator->sort('Aluno','Aluno.aluno'); ?></th>
		<th><?php echo $paginator->sort('Curso','Aluno.curso'); ?></th>
		<th><?php echo $paginator->sort('Benefício','Aluno.beneficio'); ?></th>
		<th><?php echo $paginator->sort('Renda familiar','Aluno.rendimento_familiar'); ?></th>
		<th><?php echo $paginator->sort('Entrevista','Aluno.Entrevista.data'); ?></th>
		<th><?php echo $paginator->sort('Horário','Aluno.Entrevista.hora'); ?></th>
	</tr>

	<?php foreach ($alunos as $c_aluno): ?>
	<tr>

		<td><?php echo $html->link($i++,'view/'. $c_aluno['Aluno']['id']); ?></td>

		<td><?php echo $html->link($c_aluno['Aluno']['dre'],'view/'. $c_aluno['Aluno']['id']); ?></td>

		<td><?php echo $c_aluno['Aluno']['nome']; ?></td>

		<td><?php echo $c_aluno['Aluno']['curso']; ?></td>

		<td><?php echo $c_aluno['Aluno']['beneficio']; ?></td>

		<td><?php echo $c_aluno['Aluno']['rendimento_familiar']; ?></td>

		<td><?php
                if (!empty($c_aluno['Entrevista'])) {
                    echo
                    $html->link($c_aluno['Entrevista'][0]['data'],'/Entrevistas/view/'.
                    $c_aluno['Entrevista'][0]['id']);
                } else {
                    echo
                    $html->link("Agendar entrevista",'/Entrevistas/add/'.
                    $c_aluno['Aluno']['id']);
                }
                ?></td>

		<td><?php
                if (!empty($c_aluno['Entrevista'])) {
                    echo $c_aluno['Entrevista'][0]['hora'];
                } else {
                    echo "&nbsp";
                }
                ?></td>
	</tr>
	<?php endforeach; ?>
</table>
