<h1>Calendário de entrevistas</h1>

<?php echo $paginator->numbers(); ?>
<br>
<?php echo $paginator->prev('<< Anterior ', null, null, array('class'=>'disabled')); ?>
<?php echo $paginator->next(' Posterior >> ', null, null, array('class'=>'disabled')); ?>

<table border='1'>
    <tr>
        <th><?php echo $paginator->sort('DRE','Aluno.dre'); ?></th>
        <th><?php echo $paginator->sort('Aluno','Aluno.nome'); ?></th>
        <th><?php echo $paginator->sort('Curso','Aluno.curso'); ?></th>
        <th><?php echo $paginator->sort('Data','Entrevista.0.data'); ?></th>
        <th><?php echo $paginator->sort('Horario','Entrevista.0.hora'); ?></th>
        <th>Observações</th>
    </tr>

    <?php foreach ($entrevista as $c_entrevista): ?>
    <tr>

        <td><?php echo $html->link($c_entrevista['Aluno']['dre'],
                '/Alunos/view/'. $c_entrevista['Aluno']['id']); ?></td>

        <td><?php echo $c_entrevista['Aluno']['nome']; ?></td>

        <td><?php echo $c_entrevista['Aluno']['curso']; ?></td>

        <td><?php
                if ($c_entrevista['Entrevista']) {
                    $tamanho = sizeof($c_entrevista['Entrevista']);
                    echo $html->link($c_entrevista['Entrevista'][$tamanho-1]['data'], 'view/'.
                    $c_entrevista['Entrevista'][$tamanho-1]['id']);
                } else {
                    echo $html->link("Sem entrevista", 'add/'.
                    $c_entrevista['Aluno']['id']);
                }
                ?>
        </td>

        <td>
                <?php
                if ($c_entrevista['Entrevista']) {
                    $tamanho = sizeof($c_entrevista['Entrevista']);
                    echo $c_entrevista['Entrevista'][$tamanho-1]['hora'];
                } else {
                    echo "&nbsp";
                }
                ?>
        </td>

        <td>
                <?php
                if ($c_entrevista['Entrevista']) {
                    $tamanho = sizeof($c_entrevista['Entrevista']);
                    echo $c_entrevista['Entrevista'][$tamanho-1]['observacoes'];
                } else {
                    echo "&nbsp";
                }
                ?>
        </td>

    </tr>
    <?php endforeach; ?>
</table>