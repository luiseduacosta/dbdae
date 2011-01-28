<h1>Formulario de inscricao para beneficio moradia/bolsa auxilio</h1>

<h3>Uma vez finalizado de preencher este quadro com outras rendas <?php echo $html->link('continue','/Alunos/despesa/'. $aluno_id); ?>
</h3>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<?php if ($renda) {; ?>

<table>
	<tr>
		<th>Especificação</th>
		<th>Quem recebe</th>
		<th>Quem paga</th>
		<th>Valor mensal</th>
	</tr>
	<?php foreach ($renda as $c_renda): ?>
	<tr>
		<td><?php echo $c_renda['Renda']['especificacao']; ?></td>
		<td><?php echo $c_renda['Renda']['quem_recebe']; ?></td>
		<td><?php echo $c_renda['Renda']['quem_paga']; ?></td>
		<td><?php echo $c_renda['Renda']['valor_mensal']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php }; ?>

<fieldset><legend> Outras rendas do aluno e de sua
família (contribuição de parentes, mesada, bolsa acadêmica, bolsa
estágio, alugueis de imóveis, etc.): </legend> <?php

echo $form->create('Renda');

echo $form->input("especificacao", array("type"=>"text", "size"=>"50"));
echo $form->input("quem_recebe", array("type"=>"text", "size"=>"50"));
echo $form->input("quem_paga", array("type"=>"text", "size"=>"50"));
echo $form->input("valor_mensal", array("type"=>"text", "value"=>'0',
"size"=>"5", "label"=>"Digite o valor mensal em números inteiros"));
echo $form->input("aluno_id", array("type"=>"text", "value"=>$aluno_id));
echo $form->end('Inserir outras rendas do aluno e da família');

?></fieldset>
