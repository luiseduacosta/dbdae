<h1>Inscrição para benefício moradia/bolsa auxílio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<?php if ($despesa) {; ?>
<table>
    <tr>
        <th>Id</th>
	<th>Especificação</th>
        <th>Valor mensal</th>
        <th>Comprovação</th>
        <th>Excluir</th>
    </tr>
    <?php foreach ($despesa as $c_despesa): ?>
    <tr>
    	<td>
	<?php echo $html->link($c_despesa['Despesa']['id'],"/Despesas/edit/".$c_despesa['Despesa']['id']); ?>
	</td>
        <td>
            <?php echo $c_despesa['Despesa']['especificacao']; ?>
        </td>
        <td>
            <?php echo $c_despesa['Despesa']['valor']; ?>
        </td>
        <td>
            <?php echo $c_despesa['Despesa']['comprovacao']; ?>
        </td>
        <td>
            <?php echo $html->link('X', 'excluir/' . $c_despesa['Despesa']['id']); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php }; ?>


<?php echo $html->link("Inserir despesa","/Despesas/inserir/". $aluno['Aluno']['id']); ?>

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