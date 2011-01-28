<h1>Pontuação</h1>

<?php echo $html->link('Editar aluno', '/Alunos/edit/' . $aluno['Aluno']['id']); ?>

<p>DRE: <?php echo $aluno['Aluno']['dre']; ?><br>
Nome: <?php echo $aluno['Aluno']['nome']; ?><br>
Curso: <?php echo $aluno['Aluno']['curso']; ?><br>
Benefício solicitado: <?php echo $aluno['Aluno']['beneficio']; ?><br>
</p>
<br>

<?php
echo $form->create('Pontuacao');
?>

<table border='1'>
	<tr>
		<td colspan='2'>Situação sócio-econômica</td>
	</tr>

	<tr>
		<td>Renda per capita: <br>
		<?php 
echo $html->link("Rendimento familiar: ","/Familias/listar/".$aluno['Aluno']['id']);
?> <?php echo $aluno['Aluno']['rendimento_familiar']; ?> <br>
		<?php
echo $html->link("Outras rendas: ","/Rendas/listar/".$aluno['Aluno']['id']); ?>
		<?php echo $renda_total; ?> <br>
		Total integrantes da família: <?php echo $total; ?></td>

		<td><?php
echo $form->input('percapita', array('label'=>'Renda per capita',
'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td><?php
echo $html->link("Composição familiar","/Familias/listar/" . $aluno['Aluno']['id']) . "<br>";
?> Total integrantes da família: <?php echo $total; ?><br>
		<table>
			<tr>
				<th>Parentesco</th>
				<th>Profissão</th>
				<th>Remuneração</th>
			</tr>
			<?php foreach ($familia as $c_familia): ?>
			<tr>
				<td><?php echo $c_familia['Familia']['parentesco']; ?></td>
				<td><?php echo $c_familia['Familia']['profissao']; ?></td>
				<td><?php echo $c_familia['Familia']['rendimento']; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
		</td>

		<td><?php
echo $form->input('composicao_familiar', array('label'=>'Composição familar', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td><?php echo $html->link("Bens", "/Alunos/epropriedade/" . $aluno['Aluno']['id']); ?>
		<br />

		Propriedade imóvel: <?php echo $aluno['Aluno']['propriedade_imovel']; ?><br />

		Propriedade residencial alugada: <?php echo $aluno['Aluno']['propriedade_residencial_alugada']; ?><br />

		Propriedade comercial alugada: <?php echo $aluno['Aluno']['propriedade_comercial_alugada']; ?>
		<br />

		Outra propriedade: <?php echo $aluno['Aluno']['propriedade_outro']; ?>
		<br />

		Automóvel: <?php echo $aluno['Aluno']['propriedade_automovel']; ?> <br />

		Marca: <?php echo $aluno['Aluno']['propriedade_automovel_marca']; ?> <br />

		Ano: <?php echo $aluno['Aluno']['propriedade_automovel_ano']; ?></td>
		<td><?php
echo $form->input('bens', array('label'=>'Bens', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td><?php echo $html->link("Despesas com habitação (aluguel ou prestação da casa)", "/Despesas/listar/" . $aluno['Aluno']['id']); ?>
		<br />

		<?php if ($despesa) {; ?>
		<table>
			<tr>
				<th>Especificação</th>
				<th>Valor</th>
				<th>Comprovação</th>
			</tr>
			<?php $total = NULL; ?>
			<?php foreach ($despesa as $c_despesa): ?>
			<tr>
				<td><?php echo $c_despesa['Despesa']['especificacao']; ?></td>
				<td><?php echo $c_despesa['Despesa']['valor']; ?></td>
				<td><?php echo $c_despesa['Despesa']['comprovacao']; ?></td>
				<?php $total = $total + $c_despesa['Despesa']['valor']; ?>
				<?php endforeach; ?>
			</tr>
		</table>
		Total despesas: <?php echo $total; ?> <?php } else {; ?> <?php echo "Sem informação"; ?>
		<?php }; ?></td>

		<td><?php
echo $form->input('despesa_habitacao', array('label'=>'Despesas com
habitação', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td><?php echo $html->link("Despesas gerais", "/Despesas/view/" . $aluno['Aluno']['id']); ?>
		<br />
		<?php if ($despesa) {; ?>
		<table>
			<tr>
				<th>Especificação</th>
				<th>Valor</th>
				<th>Comprovação</th>
			</tr>
			<?php $total = NULL; ?>
			<?php foreach ($despesa as $c_despesa): ?>
			<tr>
				<td><?php echo $c_despesa['Despesa']['especificacao']; ?></td>
				<td><?php echo $c_despesa['Despesa']['valor']; ?></td>
				<td><?php echo $c_despesa['Despesa']['comprovacao']; ?></td>
				<?php $total = $total + $c_despesa['Despesa']['valor']; ?>
				<?php endforeach; ?>
			</tr>
		</table>
		Total despesas: <?php echo $total; ?> <?php } else {; ?> <?php echo "Sem informação"; ?>
		<?php }; ?></td>
		<td><?php
echo $form->input('despesa_gerais', array('label'=>'Despesas gerais', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td>Condições verificadas a partir da visita domiciliar realizada
		</td>
		<td><?php
echo $form->input('visita_domiciliar', array('label'=>'Visita
domiciliar', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td colspan='2'>Distância</td>
	</tr>

	<tr>
		<td><?php echo $html->link("Local da moradia da famíla do aluno", "/Alunos/edit/" . $aluno['Aluno']['id']); ?>
		<br />

		Endereço: <?php echo $aluno['Aluno']['endereco']; ?><br>
		Complemento: <?php echo $aluno['Aluno']['complemento']; ?><br>
		Bairro: <?php echo $aluno['Aluno']['bairro']; ?><br>
		Cidade: <?php echo $aluno['Aluno']['cidade']; ?><br>
		Estado: <?php echo $aluno['Aluno']['estado']; ?><br>

		Endereço família: <?php echo $aluno['Aluno']['familia_endereco'];
?><br>
		Bairro família: <?php echo $aluno['Aluno']['familia_bairro']; ?><br>
		Cidade família: <?php echo $aluno['Aluno']['familia_cidade']; ?><br>
		Estado família: <?php echo $aluno['Aluno']['familia_estado']; ?></td>
		<td><?php
echo $form->input('moradia', array('label'=>'Distância da moradia', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td>Condições do local de moradia</td>
		<td><?php
echo $form->input('moradia_condicao', array('label'=>'Condição da moradia', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td><?php echo $html->link("Condições da moradia - aluno reside com a família", "/Alunos/edit/" . $aluno['Aluno']['id']); ?>
		<br />
		Com quem reside o aluno: <?php echo $aluno['Aluno']['reside_com']; ?>
		</td>
		<td><?php
echo $form->input('moradia_condicao_familia', array('label'=>'Condição
da moradia quando o aluno reside com a familia', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td><?php echo $html->link("Moradia alternativa para aluno cuja família reside em outro local", "/Alunos/edit/" . $aluno['Aluno']['id']); ?>
		<br />
		Com quem reside o aluno: <?php echo $aluno['Aluno']['reside_com']; ?>
		</td>
		<td><?php
echo $form->input('moradia_alternativa', array('label'=>'Condição
da moradia alternativa', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td><?php echo $html->link("Tempo gasto para chegar à UFRJ", "/Alunos/etransporte/" . $aluno['Aluno']['id']); ?>
		<br />
		Tempo para chegar à UFRJ: <?php echo
$aluno['Aluno']['transporte_tempo']; ?></td>
		<td><?php
echo $form->input('tempo', array('label'=>'Tempo gasto para chegar', 'value'=>0, 'size'=>5));
?></td>
	</tr>

	<tr>
		<td><?php echo $html->link("Número de conduções utilizadas", "/Alunos/etransporte/" . $aluno['Aluno']['id']); ?>
		<br />
		Conduções utilizadas: <?php echo
$aluno['Aluno']['transporte_quantidade']; ?></td>
		<td><?php
echo $form->input('conducoes', array('label'=>'Conduções', 'value'=>0, 'size'=>5));
?></td>
	</tr>

</table>

<?php
echo $form->input('aluno_id', array('type'=>'hidden', 'value'=>$aluno['Aluno']['id']));
echo $form->end('Confirmar');
?>