
<?php echo $html->link('Excluir','/Alunos/excluir/'. $aluno['Aluno']['id']) . " "; ?>
<?php echo $html->link('Editar','/Alunos/edit/'. $aluno['Aluno']['id']) . " "; ?>
<?php echo $html->link('Imprimir','/Alunos/pdf/'. $aluno['Aluno']['id']) . " "; ?>
<?php echo $html->link('Pontuação','/Pontuacaos/view/' . $aluno['Aluno']['id']). " "; ?>
<?php echo $html->link('Listar','/Alunos/index/'); ?>

<br>

<h2><?php echo $html->link("Benefício solicitado",
"/Alunos/ebeneficio/" . $aluno['Aluno']['id']); ?></h2>
<?php
echo "Benefício solicitado: ". $aluno['Aluno']['beneficio'] . "<br>";
echo "Já solicitou benefício anteriormente: ". $aluno['Aluno']['beneficio_anterior'] . "<br>";
echo "Qual: ". $aluno['Aluno']['beneficio_solicitado'] . "<br>";
echo "Em que ano: ". $aluno['Aluno']['beneficio_ano'] . "<br>";
echo "<br>";
echo "Calouro: ". $aluno['Aluno']['calouro'] . "<br>";
echo "Qual semestre: ". $aluno['Aluno']['calouro_semestre'];
?>

<h2><?php echo $html->link("Entrevista", "/Entrevistas/listar/" . $aluno['Aluno']['id']); ?></h2>

<table>
	<thead>
		<tr>
			<th>Data</th>
			<th>Horario</th>
			<th>Observações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($entrevista as $c_entrevista): ?>
		<tr>
			<td><?php echo $c_entrevista['Entrevista']['data']; ?></td>
			<td><?php echo $c_entrevista['Entrevista']['hora']; ?></td>
			<td><?php echo $c_entrevista['Entrevista']['observacoes']; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
	</tfoot>
</table>

<h2><?php echo $html->link("Dados pessoais", "/Alunos/ealuno/" .
$aluno['Aluno']['id']); ?></h2>
<?php
echo "Nome: ". $aluno['Aluno']['nome'] . "<br>";
echo "CPF: ". $aluno['Aluno']['cpf'] . "<br>";
echo "Curso: ". $aluno['Aluno']['curso'] . "<br>";
echo "DRE: ". $aluno['Aluno']['dre'] . "<br>";
echo "Nascimento: ". $aluno['Aluno']['nascimento'] . "<br>";
echo "Sexo: ". $aluno['Aluno']['sexo'] . "<br>";
echo "Estado civil: ". $aluno['Aluno']['estado_civil'] . "<br>";
echo "Naturalidade: ". $aluno['Aluno']['naturalidade'] . "<br>";
echo "Endereço: ". $aluno['Aluno']['endereco'] . "<br>";
echo "Complemento: ". $aluno['Aluno']['complemento'] . "<br>";
echo "Bairro: ". $aluno['Aluno']['bairro'] . "<br>";
echo "Cidade: ". $aluno['Aluno']['cidade'] . "<br>";
echo "Estado: ". $aluno['Aluno']['estado'] . "<br>";
echo "CEP: ". $aluno['Aluno']['cep'] . "<br>";
echo "E-mail: ". $aluno['Aluno']['email'] . "<br>";
echo "Telefone: ". $aluno['Aluno']['telefone'] . "<br>";
echo "Celular: ". $aluno['Aluno']['celular'] . "<br>";
echo "Com quem reside: ". $aluno['Aluno']['reside_com'] . "<br>";
echo "Referência da residência: ". $aluno['Aluno']['referencia_residencia'] . "<br>";
?>

<h2><?php echo $html->link("Grupo
familiar","/Familias/listar/" . $aluno['Aluno']['id']); ?></h2>

<?php if ($familia) {; ?>
<?php $total = NULL; ?>
<?php $i = 1; ?>
<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Parentesco</th>
			<th>Idade</th>
			<th>Instrução</th>
			<th>Profissão</th>
			<th>CPF</th>
			<th>Rendimento</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($familia as $c_familia): ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $c_familia['Familia']['nome']; ?></td>
			<td><?php echo $c_familia['Familia']['parentesco']; ?></td>
			<td><?php echo $c_familia['Familia']['idade']; ?></td>
			<td><?php echo $c_familia['Familia']['instrucao']; ?></td>
			<td><?php echo $c_familia['Familia']['profissao']; ?></td>
			<td><?php echo $c_familia['Familia']['cpf']; ?></td>
			<td><?php echo $c_familia['Familia']['rendimento']; ?> <?php $total = $total + $c_familia['Familia']['rendimento']; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot></tfoot>
</table>
<?php }; ?>

<?php

echo "Rendimento familiar: ". $aluno['Aluno']['rendimento_familiar'] . "<br>";
echo "Observações: " . $aluno['Aluno']['observacoes'] . "<br>";

?>


<h2><?php echo $html->link("Informações sobre familiares (mãe, pai, cônjuge) que não residam com aluno", "/Alunos/enaoresidente/" . $aluno['Aluno']['id']); ?></h2>

Vínculo familiar:
<?php echo $aluno['Aluno']['nao_residente_familiar']; ?>
<br>

Outro vínculo familiar (especificar):
<?php echo $aluno['Aluno']['nao_residente_outro']; ?>
<br>

Nome:
<?php echo $aluno['Aluno']['nao_residente_nome']; ?>
<br>

CPF:
<?php echo $aluno['Aluno']['nao_residente_cpf']; ?>
<br>

Cidade:
<?php echo $aluno['Aluno']["nao_residente_cidade"]; ?>
<br>

Profissão:
<?php echo $aluno['Aluno']["nao_residente_profissao"]; ?>
<br>

Cargo/função:
<?php echo $aluno['Aluno']['nao_residente_cargo']; ?>
<br>

Renda:
<?php echo $aluno['Aluno']["nao_residente_renda"]; ?>
<br>

<p>Aposentado
<p>Data aposentadoria: <?php echo $aluno['Aluno']["nao_residente_data_aposentadoria"]; ?><br>

Profissão que exercia: <?php echo $aluno['Aluno']['nao_residente_profissao_aposentado']; ?><br>

Renda do aposentado: <?php echo $aluno['Aluno']["nao_residente_renda_aposentado"]; ?>
<h2><?php echo $html->link("Outras rendas", "/Rendas/listar/" .
$aluno['Aluno']['id']); ?></h2>
<?php if ($renda) {; ?>
<?php $i = 1; ?>
<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Especificação</th>
			<th>Quem recebe</th>
			<th>Quem paga</th>
			<th>Valor mensal</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($renda as $c_renda): ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $c_renda['Renda']['especificacao']; ?></td>
			<td><?php echo $c_renda['Renda']['quem_recebe']; ?></td>
			<td><?php echo $c_renda['Renda']['quem_paga']; ?></td>
			<td><?php echo $c_renda['Renda']['valor_mensal']; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot></tfoot>
</table>
<?php } else {; ?>
<p>Sem informação</p>
<?php }; ?>


<h2><?php echo $html->link("Despesas", "/Alunos/edespesa/" . $aluno['Aluno']['id']); ?></h2>
<table>

	<thead>
		<tr>
			<th>Especificação</th>
			<th>Valor mensal</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>Luz</td>
			<td><?php echo $aluno['Aluno']['despesa_luz']; ?></td>
		</tr>

		<tr>
			<td>Gâs</td>
			<td><?php echo $aluno['Aluno']['despesa_gas']; ?></td>
		</tr>

		<tr>
			<td>Telefone</td>
			<td><?php echo $aluno['Aluno']['despesa_telefone']; ?></td>
		</tr>

		<tr>
			<td>Água</td>
			<td><?php echo $aluno['Aluno']['despesa_agua']; ?></td>
		</tr>

		<tr>
			<td>Aluguel / Financiamento</td>
			<td><?php echo $aluno['Aluno']['despesa_aluguel']; ?></td>
		</tr>

		<tr>
			<td>Condomínio</td>
			<td><?php echo $aluno['Aluno']['despesa_condominio']; ?></td>
		</tr>

		<tr>
			<td>Plano de saúde</td>
			<td><?php echo $aluno['Aluno']['despesa_saude']; ?></td>
		</tr>

		<tr>
			<td>Outra <?php echo $aluno['Aluno']['despesa_especificar']; ?>
			</td>
			<td><?php echo $aluno['Aluno']['despesa_outro']; ?></td>
		</tr>
	<tbody>
</table>


<h2><?php echo $html->link("Despesas", "/Despesas/listar/" . $aluno['Aluno']['id']); ?></h2>

<?php if ($despesa) {; ?>
<?php $i = 1; ?>
<table>
	<tr>
		<th>Id</th>
		<th>Especificação</th>
		<th>Valor mensal</th>
		<th>Comprovação</th>
	</tr>
	<?php foreach ($despesa as $c_despesa): ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $c_despesa['Despesa']['especificacao']; ?></td>
		<td><?php echo $c_despesa['Despesa']['valor']; ?></td>
		<td><?php echo $c_despesa['Despesa']['comprovacao']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php } else {; ?>
<p>Sem informação</p>
<?php }; ?>


<h2><?php echo $html->link("Saúde","/Alunos/esaude/" . $aluno['Aluno']['id']); ?></h2>

Alguem de seu grupo familiar é portador de doença grave/crônica?
<?php echo $aluno['Aluno']['doenca']; ?>
<br>

Especifique:
<?php echo $aluno['Aluno']['doenca_especifique']; ?>
<br>

Existem gastos com medicação que tenham impacto na renda familiar?
<?php echo $aluno['Aluno']['medicacao']; ?>
<br>

Valor mensual:
<?php echo $aluno['Aluno']['medicacao_valor']; ?>


<h2><?php echo $html->link("Propriedades", "/Alunos/epropriedade/" .
$aluno['Aluno']['id']); ?></h2>

<?php

echo "Imóvel onde reside: " . $aluno['Aluno']['propriedade_imovel'] . "<br>";
echo "Imóvel(eis) residenciais alugados - quantos?: " . $aluno['Aluno']['propriedade_residencial_alugada'] . "<br>";
echo "Imóvel(eis) comerciais alugados - quantos?: " . $aluno['Aluno']['propriedade_comercial_alugada'] . "<br>";
echo "Outros especificar: " . $aluno['Aluno']['propriedade_outro'] . "<br>";
echo "Automóvel(eis). Quantos? " . $aluno['Aluno']['propriedade_automovel'] . "<br>";
echo "Marca: " . $aluno['Aluno']['propriedade_automovel_marca'] . "<br>";
echo "Ano: " . $aluno['Aluno']['propriedade_automovel_ano'] . "<br>";

?>

<h2><?php echo $html->link("Transporte", "/Alunos/etransporte/" .
$aluno['Aluno']['id']); ?></h2>

<?php

echo "O aluno utiliza veículo de sua propriedade ou da família para vir a UFRJ: ". $aluno['Aluno']['transporte_veiculo'] . "<br>";
echo "Número de transportes coletivos utilizados do locas de sua moradia até o campus universitário: " . $aluno['Aluno']['transporte_quantidade'] . "<br>";
echo "Valor total gasto diariamente em conduções: ". $aluno['Aluno']['transporte_gasto'] . "<br>";
echo "Tempo gasto para chegar a UFRJ: ". $aluno['Aluno']['transporte_tempo'] . "<br>";
?>


<h2><?php echo $html->link("Locais onde faz regularmente as refeições",
"/Alunos/erefeicao/" . $aluno['Aluno']['id']); ?></h2>

Local da refeição:
<?php echo $aluno['Aluno']['local_refeicao']; ?>
<br />
Especifique:
<?php echo $aluno['Aluno']['local_refeicao_outro']; ?>


<h2><?php echo $html->link("Informações adicionais", "/Alunos/eadicional/" . $aluno['Aluno']['id']); ?></h2>

<?php echo "Informações adicionais: " . $aluno['Aluno']['informacao_adicional']; ?>
