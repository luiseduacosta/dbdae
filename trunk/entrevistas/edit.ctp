<h2>Editar</h2>

<p>
    DRE: <?php echo $entrevista[0]['Aluno']['dre']; ?><br>
    Nome: <?php echo $entrevista[0]['Aluno']['nome']; ?><br>
    Curso: <?php echo $entrevista[0]['Aluno']['curso']; ?><br>
    Benefício: <?php echo $entrevista[0]['Aluno']['beneficio']; ?><br>
</p>

<?php $i = 1; ?>

<table>
    <tr>
        <th>Id</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Observações</th>
        <th>Excluir</th>
    </tr>
    <?php foreach ($entrevista as $c_entrevista): ?>
    <tr>
        <td><?php echo $html->link($i++, '/Entrevistas/edit/' . $c_entrevista['Entrevista']['id']); ?>
        <td><?php echo $c_entrevista['Entrevista']['data']; ?></td>
        <td><?php echo $c_entrevista['Entrevista']['hora']; ?></td>
        <td><?php echo $c_entrevista['Entrevista']['observacoes']; ?></td>
        <td><?php echo $html->link('X', '/Entrevistas/excluir/' . $c_entrevista['Entrevista']['id']); ?>
    </tr>
    <?php endforeach; ?>
</table>

<?php

echo $form->create('Entrevista');
echo $form->input('data', array('size'=>'1', array('label'=>'Data')));
echo $form->input('hora', array('size'=>'10', array('label'=>'Hora')));
echo $form->input('observacoes', array('type'=>'textarea', 'row'=>'10',
array('label'=>'Observações')));
echo $form->input('aluno_id', array('type'=>'text',
'value'=>$entrevista[0]['Aluno']['id']));
echo $form->end('Atualizar');

?>