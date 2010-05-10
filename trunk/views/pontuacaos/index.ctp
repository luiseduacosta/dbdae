<?php 

$javascript->link(array("dataTables/media/js/jquery", "dataTables/media/js/jquery.dataTables"), false);

$javascript->codeBlock('
    $(document).ready(function() {
    $("#tabela").dataTable();
});
', array('inline' => false)); 

?>

<?php echo $html->css(array('/webroot/js/dataTables/media/css/demo_table'), null, null, false); ?>

<h1>Pontuação</h1>

<?php $i = 1; ?>
<table border="1" id="tabela">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Curso</th>
        <th>Entrevista</th>
        <th>Visita domiciliar</th>
        <th>Per capita</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pontuacao as $c_pontuacao): ?>
    <tr>
        <td><?php echo $html->link($i++, "/Alunos/view/" . $c_pontuacao['Aluno']['id']); ?>
        <td><?php echo $html->link($c_pontuacao['Aluno']['nome'], 'view/' . $c_pontuacao['Aluno']['id']); ?></td>
        <td><?php echo $c_pontuacao['Aluno']['curso']; ?></td>
        <td><?php
                if (empty($c_pontuacao['Entrevista'])) {
                    echo "&nbsp;";
                } else {
                    echo $c_pontuacao['Entrevista'][0]['data'];
                }
                ?>
        </td>
        <td> </td>
        <td><?php echo $c_pontuacao['Pontuacao']['percapita']; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
