<h1>Entrevistas para beneficio moradia/bolsa auxilio</h1>

<p>
DRE: <?php echo $aluno['Aluno']['dre']; ?><br>
Nome: <?php echo $aluno['Aluno']['nome']; ?><br>
Curso: <?php echo $aluno['Aluno']['curso']; ?><br>
Benefício solicitado: <?php echo $aluno['Aluno']['beneficio']; ?><br>
</p>

<fieldset>
    <legend>
    </legend>

    <?php

    echo $form->create('Entrevista');
    echo $form->input('data', array('label'=>'Data'));
    echo $form->input('hora', array('size'=>'5','label'=>'Hora'));
    echo $form->input('observacoes',
    array('type'=>'text','label'=>'Observações'));
    echo $form->input('aluno_id', array('type'=>'text',
    'value'=>$aluno['Aluno']['id']));
    echo $form->end('Confirmar');

?>

</fieldset>