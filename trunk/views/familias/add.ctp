<h1>Formulario de inscricao para beneficio moradia/bolsa auxilio</h1>

<h3>Reside com: <?php echo $aluno['Aluno']['reside_com']; ?></h3>

<?php if ($familia) {; ?>
<h3>Uma vez finalizado de preencher o quadro familiar
    <?php echo $html->link('continue','/Alunos/familia/'. $aluno_id); ?>
 para confirmar a renda familiar.
</h3>
<?php }; ?>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<?php if ($familia) {; ?>
<table>
    <tr>
        <th>Nome</th>
        <th>Parentesco</th>
        <th>Idade</th>
        <th>Instrução</th>
        <th>Profissão</th>
        <th>CPF</th>
        <th>Rendimento</th>
    </tr>
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
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    <?php }; ?>

<fieldset>

    <legend>
        Preencher os dados de todas as pessoas que moram na sua casa, inclusive o próprio aluno.
    </legend>

    <?php

    echo $form->create('Familia');
    if (!$familia) {
        echo $form->input("nome", array("type"=>"text", 'value'=>$aluno['Aluno']['nome'], "size"=>"70"));
        echo $form->input("parentesco", array("type"=>"text", 'value'=>'PRÓPRIO', "size"=>"15"));
    } else {
        echo $form->input("nome", array("type"=>"text", "size"=>"70"));
        echo $form->input("parentesco", array("type"=>"text", "size"=>"15"));
    }
    echo $form->input("idade", array("type"=>"text", "size"=>"3"));
    echo $form->input("instrucao", array("type"=>"text", "size"=>"20", "label"=>"Instrução"));
    echo $form->input("profissao", array("type"=>"text", "size"=>"20", "label"=>"Profissão"));
    if (!$familia) {
        echo $form->input("cpf", array("type"=>"text", 'value'=>$aluno['Aluno']['cpf'],"size"=>"14", "label"=>"CPF"));
    } else {
        echo $form->input("cpf", array("type"=>"text", "size"=>"14", "label"=>"CPF"));
    }
    echo $form->input("rendimento", array("type"=>"text", "size"=>"5",
    "label"=>"Rendimento em números inteiros: R$"));
    echo $form->input("aluno_id", array("type"=>"text", "value"=>$aluno_id));
    echo $form->end('Inserir integrante da família');

?>

</fieldset>
