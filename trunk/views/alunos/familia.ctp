<h1>Formulário de inscrição para benefício moradia/bolsa auxilio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<?php $total = NULL; ?>

<?php if ($familia) {
    ; ?>
<table>
    <?php foreach ($familia as $c_familia): ?>
    <tr>
        <td>
        <?php echo $c_familia['Familia']['nome']; ?>
        </td>
        <td>
        <?php echo $c_familia['Familia']['parentesco']; ?>
        </td>
        <td>
        <?php echo $c_familia['Familia']['idade']; ?>
        </td>
        <td>
        <?php echo $c_familia['Familia']['instrucao']; ?>
        </td>
        <td>
        <?php echo $c_familia['Familia']['profissao']; ?>
        </td>
        <td>
        <?php echo $c_familia['Familia']['cpf']; ?>
        </td>
        <td>
        <?php echo $c_familia['Familia']['rendimento']; ?>
        <?php $total = $total + $c_familia['Familia']['rendimento']; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    <?php }; ?>

<fieldset>
    <legend>Rendimento familiar</legend>

<?php echo $form->create('Aluno', array('type'=>'file',
'action'=>'familia')); ?>

    Total de rendimentos familiares: R$
    <?php
    echo $form->input("rendimento_familiar", array("type"=>"text", "size"=>"6", 'value'=>$total, "label"=>false));
?>

    Observações (utilize este espaço para informações adicionais ou esclarecimentos):
    <?php
    echo $form->input("observacoes", array("type"=>"textarea", "rows"=>"5", 'cols'=>'70', "label"=>false));
?>

    <?php
    echo $form->input('id', array('type'=>'hidden', 'value'=>$aluno_id));
?>

<?php echo $form->end('Continuar'); ?>

</fieldset>
