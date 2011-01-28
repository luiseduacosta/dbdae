<h2>Ver</h2>

<p>DRE: <?php echo $aluno['Aluno']['dre']; ?><br>
Nome: <?php echo $aluno['Aluno']['nome']; ?><br>
Curso: <?php echo $aluno['Aluno']['curso']; ?><br>
Benefício: <?php echo $aluno['Aluno']['beneficio']; ?></p>

<?php $i = 1; ?>

<table>
	<tr>
		<th>Id</th>
		<th>Data</th>
		<th>Hora</th>
		<th>Observações</th>
		<th>Excluir</th>
	</tr>
	<?php foreach ($entrevista as $c_entrevista): ?>
	<tr>
		<td><?php echo $html->link($i++, '/Entrevistas/view/' . $c_entrevista['Entrevista']['id']); ?>
		<td><?php echo $c_entrevista['Entrevista']['data']; ?></td>
		<td><?php echo $c_entrevista['Entrevista']['hora']; ?></td>
		<td><?php echo $c_entrevista['Entrevista']['observacoes']; ?></td>
		<td><?php echo $html->link('X', '/Entrevistas/excluir/' . $c_entrevista['Entrevista']['id']); ?>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $html->link('Acrescentar','/Entrevistas/add/' .
$aluno['Aluno']['id']); ?>

<?php echo $html->link('Ver aluno','/Alunos/view/' .
$aluno['Aluno']['id']); ?>

<?php echo $html->link('Listar alunos','/Alunos/index/'); ?>

<?php echo $html->link('Pontuação','/Pontuacaos/view/' .
$aluno['Aluno']['id']); ?>