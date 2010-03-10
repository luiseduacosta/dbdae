<h1>Formulario de inscricao para beneficio moradia/bolsa auxilio</h1>

<h2>Aluno: <?php echo $aluno['Aluno']['nome']; ?></h2>

<fieldset>
<legend>Despesas da família que podem ser comprovadas</legend>

<?php echo $form->create('Aluno', array('action' => 'despesa')); ?>

<table border='1'>
<thead>
<tr>
<th>Especificação</th>
<th>Valor mensal</th>
</tr>
</thead>

<tbody>
<tr>
<td style="text-align:left">
Luz
</td>
<td>
<?php
echo $form->input('despesa_luz', array('type'=>'text', 'size'=>'5', 'label'=>false));
?>
</td>
</tr>

<tr>
<td style="text-align:left"> 
Gâs
</td>
<td>
<?php
echo $form->input('despesa_gas', array('type'=>'text', 'size'=>'5', 'label'=>false));
?>
</td>
</tr>

<tr>
<td style="text-align:left">
Telefone
</td>
<td>
<?php
echo $form->input('despesa_telefone', array('type'=>'text', 'size'=>'5', 'label'=>false));
?>
</td>
</tr>

<tr>
<td style="text-align:left">
Água
</td>
<td>
<?php
echo $form->input('despesa_agua', array('type'=>'text', 'size'=>'5', 'label'=>false));
?>
</td>
</tr>

<tr>
<td style="text-align:left">
Aluguel / Financiamento
</td>
<td>
<?php
echo $form->input('despesa_aluguel', array('type'=>'text', 'size'=>'5', 'label'=>false));
?>
</td>
</tr>

<tr>
<td style="text-align:left">
Condomínio
</td>
<td>
<?php
echo $form->input('despesa_condominio', array('type'=>'text', 'size'=>'5', 'label'=>false));
?>
</td>
</tr>

<tr>
<td style="text-align:left">
Plano de saúde
</td>
<td>
<?php
echo $form->input('despesa_saude', array('type'=>'text', 'size'=>'5', 'label'=>false));
?>
</td>
</tr>

<tr>
<td style="text-align:left">
Outra(s)  
<?php
echo $form->input('despesa_especificar', array('type'=>'text',
'size'=>'15', 'label'=>false));
?>
</td>
<td>
<?php
echo $form->input('despesa_outro', array('type'=>'text', 'size'=>'5', 'label'=>false));
?>
</td>
</tr>
<tbody>
<tfoot>
</tfoot>
</table>

<?php echo $form->input("id", array("type"=>"text", "value"=>$aluno_id)); ?>

<?php echo $form->end('Continuar'); ?>

</fieldset>
