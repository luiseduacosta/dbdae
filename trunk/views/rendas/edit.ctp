<h2>Editar</h2>

<p>
DRE: <?php echo $aluno['Aluno']['dre']; ?><br>
Nome: <?php echo $aluno['Aluno']['nome']; ?><br>
Curso: <?php echo $aluno['Aluno']['curso']; ?><br>
Benefício: <?php echo $aluno['Aluno']['beneficio']; ?><br>
</p>

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
    </tr>
    <?php endforeach; ?>
</table>
<?php }; ?>

<?php

echo $form->create('Renda');
echo $form->input('especificacao', array('size'=>'50'));
echo $form->input('quem_recebe', array('size'=>'50'));
echo $form->input('quem_paga', array('size'=>'50'));
echo $form->input('valor_mensal', array('size'=>'5'));
echo $form->input('aluno_id', array('type'=>'text',
'value'=>$aluno['Aluno']['id']));
echo $form->end('Atualizar');

?>
