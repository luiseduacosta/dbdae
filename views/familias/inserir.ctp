<h1>Formulário de inscrição para benefício moradia/bolsa auxilío</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<h3>Reside com: <?php echo $aluno['Aluno']['reside_com']; ?></h3>

<?php if ($familia) {; ?>

<?php $total = NULL; ?>
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
        <td>
        <?php echo $html->link($i++,'edit/'.$c_familia['Familia']['id']); ?>
        </td>
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
        <td>
        <?php echo $html->link('X',"excluir/".$c_familia['Familia']['id']); ?>
        </td>
    </tr>
   <?php endforeach; ?>
</table>
    <?php }; ?>

<fieldset>

    <legend>
        Preencher os dados de todas as pessoas que moram na casa
    </legend>

    <?php

    echo $form->create('Familia', array('action'=>'inserir/'.$aluno['Aluno']['id']));
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
        echo $form->input("cpf", array("type"=>"text", 'value'=>$aluno['Aluno']['cpf'],"size"=>"12", "label"=>"CPF"));
    } else {
        echo $form->input("cpf", array("type"=>"text", "size"=>"14", "label"=>"CPF"));
    }
    echo $form->input("rendimento", array("type"=>"text", "size"=>"5",
    "label"=>"Rendimento em números inteiros: R$"));
    echo $form->input("aluno_id", array("type"=>"text", "value"=>$aluno_id));
    echo $form->end('Inserir integrante da família');

?>

</fieldset>
