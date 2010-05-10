<?php pr($despesa); ?>
<h1>Inscrição para benefício moradia/bolsa auxílio</h1>

<p>
DRE: <?php echo $despesa['Aluno']['dre']; ?><br>
Nome: <?php echo $despesa['Aluno']['nome']; ?><br>
Curso: <?php echo $despesa['Aluno']['curso']; ?><br>
Benefício: <?php echo $despesa['Aluno']['beneficio']; ?><br>
</p>

<?php 

echo $form->create('Despesa');
echo $form->input("especificacao", array("type"=>"text", "size"=>"20"));
echo $form->input("valor", array("type"=>"text", "size"=>"5", "label"=>"Valor em números inteiros"));
echo $form->input("comprovacao", array("type"=>"select",
"options"=>array('0'=>'Não','1'=>'Sim'), "size"=>"1"));
echo $form->input("aluno_id", array("type"=>"text", "value"=>$despesa['Aluno']['id']));
echo $form->end('Atualizar despesas');

?>
