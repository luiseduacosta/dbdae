<h1>Formulario de inscricao para beneficio moradia/bolsa auxilio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<?php if ($despesa) {; ?>

<h3>Uma vez finalizado de preencher este quadro com despesass
<?php echo $html->link('continue','/Alunos/propriedade/' . $aluno_id); ?>
</h3>

<br />

<table>
    <tr>
        <th>Especificação</th>
        <th>Valor mensal</th>
        <th>Comprovação</th>
    </tr>
    <?php foreach ($despesa as $c_despesa): ?>
    <tr>
        <td>
            <?php echo $c_despesa['Despesa']['especificacao']; ?>
        </td>
        <td>
            <?php echo $c_despesa['Despesa']['valor']; ?>
        </td>
        <td>
            <?php echo $c_despesa['Despesa']['comprovacao']; ?>
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

echo $form->create('Despesa');

echo $form->input("especificacao", array("type"=>"text", "size"=>"20"));
echo $form->input("valor", array("type"=>"text", "size"=>"5", "label"=>"Valor em números inteiros"));
echo $form->input("comprovacao", array("type"=>"select",
"options"=>array('0'=>'Não','1'=>'Sim'), "size"=>"1"));
echo $form->input("aluno_id", array("type"=>"text", "value"=>$aluno_id));
echo $form->end('Inserir despesas');

?>

</fieldset>
