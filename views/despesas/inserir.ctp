<h1>Formulario de inscricao para beneficio moradia/bolsa auxilio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<?php if ($despesa) {
    ; ?>

    <?php $i = 1; ?>

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
        <?php echo $html->link($i++,'edit/'. $c_despesa['Despesa']['id']); ?>
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
        <?php echo $html->link('X','excluir/' . $c_despesa['Despesa']['id']); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    <?php }; ?>

<fieldset>
    <legend>
        Despesas da família
    </legend>

    <?php

    echo $form->create('Despesa', array('action'=>'inserir/' . $aluno['Aluno']['id']));

    echo $form->input("especificacao", array("type"=>"text", "size"=>"20"));
    echo $form->input("valor", array("type"=>"text", "size"=>"5", "label"=>"Valor em números inteiros"));
    echo $form->input("comprovacao", array("type"=>"select", "options"=>array('0'=>'Não','1'=>'Sim'), "size"=>"1"));
    echo $form->input("aluno_id", array("type"=>"text", "value"=>$aluno_id));

    echo $form->end('Inserir despesas');

?>

</fieldset>
