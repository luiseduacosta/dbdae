<h2>Editar</h2>

<p>
DRE: <?php echo $aluno['Aluno']['dre']; ?><br>
Nome: <?php echo $aluno['Aluno']['nome']; ?><br>
Curso: <?php echo $aluno['Aluno']['curso']; ?><br>
Benefício: <?php echo $aluno['Aluno']['beneficio']; ?><br>
</p>

<?php if ($renda) {; ?>

<?php $i = 1; ?>

<table>
    <tr>
    	<th>Id</th>
        <th>Especificação</th>
        <th>Quem recebe</th>
        <th>Quem paga</th>
        <th>Valor mensal</th>
        <th>Excluir</th>
    </tr>
    
    <?php foreach ($renda as $c_renda): ?>
    <tr>
        <td>
	<?php echo 
	$html->link($i++,'/Rendas/edit/'.$c_renda['Renda']['id']);
	?>
	</td>
	<td>
            <?php echo $c_renda['Renda']['especificacao']; ?>
        </td>
        <td>
            <?php echo $c_renda['Renda']['quem_recebe']; ?>
        </td>
        <td>
            <?php echo $c_renda['Renda']['quem_paga']; ?>
        </td>
        <td>
            <?php echo $c_renda['Renda']['valor_mensal']; ?>
        </td>
        <td>
            <?php echo $html->link('X','excluir/' . $c_renda['Renda']['id']); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php }; ?>

<?php echo $html->link("Inserir renda","/Rendas/inserir/".$aluno['Aluno']['id']); ?>

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