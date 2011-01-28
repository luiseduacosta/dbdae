<h1>Inscrição para benefício moradia/bolsa auxílio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<h3>Reside com: <?php echo $aluno['Aluno']['reside_com']; ?></h3>

<?php if ($familia) {
    ; ?>

<?php $i = 1; ?>

<table>
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Parentesco</th>
		<th>Idade</th>
		<th>Instrução</th>
		<th>Profissão</th>
		<th>CPF</th>
		<th>Rendimento</th>
		<th>Excluir</th>
	</tr>
	<?php foreach ($familia as $c_familia): ?>
	<tr>
		<td><?php echo
        $html->link($i++,'/Familias/edit/'.$c_familia['Familia']['id']); ?>
		</td>
		<td><?php echo $c_familia['Familia']['nome']; ?></td>
		<td><?php echo $c_familia['Familia']['parentesco']; ?></td>
		<td><?php echo $c_familia['Familia']['idade']; ?></td>
		<td><?php echo $c_familia['Familia']['instrucao']; ?></td>
		<td><?php echo $c_familia['Familia']['profissao']; ?></td>
		<td><?php echo $c_familia['Familia']['cpf']; ?></td>
		<td><?php echo $c_familia['Familia']['rendimento']; ?></td>
		<td><?php echo $html->link("X", "excluir/" . $c_familia['Familia']['id']); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php } else {
    ; ?>

<p>Sem familiares</p>

<?php }; ?>

Rendimento familiar:
<?php echo $aluno['Aluno']['rendimento_familiar']; ?>
<br />

<?php echo $html->link("Inserir familiar","/Familias/inserir/" . $aluno['Aluno']['id']); ?>

<br />

Editar:
<?php echo $html->link(" Dados pessoais","/Alunos/edit/" . $aluno['Aluno']['id']); ?>

<?php echo $html->link(" Transporte","/Alunos/etransporte/" . $aluno['Aluno']['id']); ?>

<?php echo $html->link(" Rendas","/Rendas/listar/" . $aluno['Aluno']['id']); ?>

<?php echo $html->link(" Propriedade","/Alunos/epropriedade/" . $aluno['Aluno']['id']); ?>

<?php echo $html->link(" Despesas","/Despesas/listar/" . $aluno['Aluno']['id']); ?>

<br />

<?php echo $html->link("Ver aluno","/Alunos/view/" . $aluno['Aluno']['id']); ?>

<?php echo $html->link("Listar alunos","/Alunos/index/"); ?>

<?php echo $html->link("Pontuação","/Pontuacaos/view/".$aluno['Aluno']['id']); ?>
