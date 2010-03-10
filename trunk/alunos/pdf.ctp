<?php

App::import("Vendor", "tcpdf");

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Universidade Federal do Rio de Janeiro');
$pdf->SetTitle('DAE');
$pdf->SetSubject('Alunos');
$pdf->SetKeywords('Assistência estudantil, Serviço Social');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

//set some language-dependent strings
// $pdf->setLanguageArray($l);

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

$tabela  = "<h2>Benefício solicitado</h2>";
$tabela .= "Benefício solicitado: " . $aluno['Aluno']['beneficio'] . "<br>";
$tabela .= "Já solicitou benefício anteriormente: ". $aluno['Aluno']['beneficio_anterior'] . "<br>";
$tabela .= "Qual: ". $aluno['Aluno']['beneficio_solicitado'] . "<br>";
$tabela .= "Em que ano: ". $aluno['Aluno']['beneficio_ano'] . "<br>";
$tabela .= "<br>";
$tabela .= "Calouro: ". $aluno['Aluno']['calouro'] . "<br>";
$tabela .= "Qual semestre: ". $aluno['Aluno']['calouro_semestre'];

$tabela .= "<h2>Entrevista</h2>";

$tabela .=
"
<table border='3' cellpading='2' cellspacing='0'>
<thead>
    <tr>
        <th>Data</th>
        <th>Horario</th>
        <th>Observações</th>
    </tr>
</thead>
<tbody>
";

foreach ($entrevista as $c_entrevista) {

$tabela .=
"<tr>" .
        "<td> " . $c_entrevista['Entrevista']['data'] . "</td>" .
        "<td> " . $c_entrevista['Entrevista']['hora'] . "</td>" .
        "<td> " . $c_entrevista['Entrevista']['observacoes'] . "</td>" .
"</tr>";

}

$tabela .= "
</tbody>
<tfoot>
</tfoot>
</table>
";

$tabela .= "<h2>Dados pessoais</h2>";

$tabela .= "Nome: ". $aluno['Aluno']['nome'] . "<br>";
$tabela .= "CPF: ". $aluno['Aluno']['cpf'] . "<br>";
$tabela .= "Curso: ". $aluno['Aluno']['curso'] . "<br>";
$tabela .= "DRE: ". $aluno['Aluno']['dre'] . "<br>";
$tabela .= "Nascimento: ". $aluno['Aluno']['nascimento'] . "<br>";
$tabela .= "Sexo: ". $aluno['Aluno']['sexo'] . "<br>";
$tabela .= "Estado civil: ". $aluno['Aluno']['estado_civil'] . "<br>";
$tabela .= "Naturalidade: ". $aluno['Aluno']['naturalidade'] . "<br>";
$tabela .= "Endereço: ". $aluno['Aluno']['endereco'] . "<br>";
$tabela .= "Complemento: ". $aluno['Aluno']['complemento'] . "<br>";
$tabela .= "Bairro: ". $aluno['Aluno']['bairro'] . "<br>";
$tabela .= "Cidade: ". $aluno['Aluno']['cidade'] . "<br>";
$tabela .= "Estado: ". $aluno['Aluno']['estado'] . "<br>";
$tabela .= "CEP: ". $aluno['Aluno']['cep'] . "<br>";
$tabela .= "E-mail: ". $aluno['Aluno']['email'] . "<br>";
$tabela .= "Telefone: ". $aluno['Aluno']['telefone'] . "<br>";
$tabela .= "Celular: ". $aluno['Aluno']['celular'] . "<br>";
$tabela .= "Com quem reside: ". $aluno['Aluno']['reside_com'] . "<br>";
$tabela .= "Referência da residência: ". $aluno['Aluno']['referencia_residencia'];

$tabela .= "<h2>Grupo familiar</h2>";

$tabela .=
"
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Parentesco</th>
        <th>Idade</th>
        <th>Instrução</th>
        <th>Profissão</th>
        <th>CPF</th>
        <th>Rendimento</th>
    </tr>
    </thead>
    <tbody>
";

$i = 1;
foreach ($familia as $c_familia) {

$tabela .=
"<tr>" .
	"<td>" . $i++ . "</td>" .
        "<td>" . $c_familia['Familia']['nome'] . "</td>" .
        "<td>" . $c_familia['Familia']['parentesco'] . "</td>" .
        "<td>" . $c_familia['Familia']['idade'] . "</td>" .
        "<td>" . $c_familia['Familia']['instrucao'] . "</td>" .
        "<td>" . $c_familia['Familia']['profissao'] . "</td>" .
        "<td>" . $c_familia['Familia']['cpf'] . "</td>" .
        "<td>" . $c_familia['Familia']['rendimento'] . "</td>" .
"</tr>";

}

$tabela .=
"
</tbody>
<tfoot></tfoot>
</table>
";

// $pdf->writeHTML($tabela, true, 0, true, 0);
$pdf->writeHTML($tabela, true, false, false, false, '');

$pdf->lastPage();
$pdf->AddPage();

$tabela1 =
"<h2>Informações sobre familiares (mãe, pai, cônjuge) que não residam com aluno</h2>" .

"Vínculo familiar: " . $aluno['Aluno']['nao_residente_familiar'] . "<br>" .
"Outro vínculo familiar (especificar): " . $aluno['Aluno']['nao_residente_outro'] . "<br>" .
"Nome: " . $aluno['Aluno']['nao_residente_nome'] . "<br>" .
"CPF: " . $aluno['Aluno']['nao_residente_cpf'] . "<br>" .
"Cidade: " . $aluno['Aluno']["nao_residente_cidade"] . "<br>" .
"Profissão: " . $aluno['Aluno']["nao_residente_profissao"] . "<br>" .
"Cargo/função: " . $aluno['Aluno']['nao_residente_cargo'] . "<br>" .
"Renda: " . $aluno['Aluno']["nao_residente_renda"] . 

"<p><strong>Aposentado</strong><p>" .

"Data aposentadoria: " . $aluno['Aluno']["nao_residente_data_aposentadoria"] . "<br>" .
"Profissão que exercia: " . $aluno['Aluno']['nao_residente_profissao_aposentado'] . "<br>" .
"Renda do aposentado: " . $aluno['Aluno']["nao_residente_renda_aposentado"]; 

$tabela1 .=
"<h2>Outras rendas</h2>";

$tabela1 .=
"<table>
    <thead>
    <tr>
    	<th>Id</th>
        <th>Especificação</th>
        <th>Quem recebe</th>
        <th>Quem paga</th>
        <th>Valor mensal</th>
    </tr>
    </thead>
    <tbody>
";

if ($renda) {
$i = 1;
foreach ($renda as $c_renda) {

$tabela1 .=

"<tr>" .
"<td>" . $i++ . "</td>" .
"<td>" . $c_renda['Renda']['especificacao'] . "</td>" .
"<td>" . $c_renda['Renda']['quem_recebe']   . "</td>" .
"<td>" . $c_renda['Renda']['quem_paga']     . "</td>" .
"<td>" . $c_renda['Renda']['valor_mensal']  . "</td>" .
"</tr>";

}

$tabela1 .=
"
</tbody>
<tfoot></tfoot>
</table>
";

} else {

$tabela1 .=
"<p>Sem informação</p>";

}

$tabela1 .=
"
<h2>Despesas</h2>

<table>

<thead>
<tr>
<th>Especificação</th>
<th>Valor mensal</th>
</tr>
</thead>

<tbody>
<tr>
<td>
Luz
</td>
<td>
" . $aluno['Aluno']['despesa_luz'] . "
</td>
</tr>

<tr>
<td>
Gâs
</td>
<td>
" . $aluno['Aluno']['despesa_gas'] . "
</td>
</tr>

<tr>
<td>
Telefone
</td>
<td>
" . $aluno['Aluno']['despesa_telefone'] . "
</td>
</tr>

<tr>
<td>
Água
</td>
<td>
" . $aluno['Aluno']['despesa_agua'] . "
</td>
</tr>

<tr>
<td>
Aluguel / Financiamento
</td>
<td>
" . $aluno['Aluno']['despesa_aluguel'] . "
</td>
</tr>

<tr>
<td>
Condomínio
</td>
<td>
" . $aluno['Aluno']['despesa_condominio'] . "
</td>
</tr>

<tr>
<td>
Plano de saúde
</td>
<td>
" . $aluno['Aluno']['despesa_saude'] . "
</td>
</tr>

<tr>
<td>
Outra " . $aluno['Aluno']['despesa_especificar'] . "
</td>
<td>
" . $aluno['Aluno']['despesa_outro'] . "
</td>
</tr>
<tbody>
</table>
";

$tabela1 .=
"<h2>Saúde</h2>" .

"Alguem de seu grupo familiar é portador de doença grave/crônica?" . 
$aluno['Aluno']['doenca'] . "<br>" .

"Especifique: " .
$aluno['Aluno']['doenca_especifique'] . "<br>" .

"Existem gastos com medicação que tenham impacto na renda familiar?" .
$aluno['Aluno']['medicacao'] . "<br>" .

"Valor mensual: " .
$aluno['Aluno']['medicacao_valor'] . "<br>";

$pdf->writeHTML($tabela1, true, 0, true, 0);

$pdf->lastPage();
$pdf->AddPage();

$tabela2 =
"<h2>Propriedades</h2>" .

"Imóvel onde reside: " . $aluno['Aluno']['propriedade_imovel'] . "<br>" .
"Imóvel(eis) residenciais alugados - quantos?: " . $aluno['Aluno']['propriedade_residencial_alugada'] . "<br>" .
"Imóvel(eis) comerciais alugados - quantos?: " . $aluno['Aluno']['propriedade_comercial_alugada'] . "<br>" . 
"Outros especificar: " . $aluno['Aluno']['propriedade_outro'] . "<br>" . 
"Automóvel(eis). Quantos? " . $aluno['Aluno']['propriedade_automovel'] . "<br>" .
"Marca: " . $aluno['Aluno']['propriedade_automovel_marca'] . "<br>" . 
"Ano: " . $aluno['Aluno']['propriedade_automovel_ano'];

$tabela2 .= 
"<h2>Transporte</h2>" .

"O aluno utiliza veículo de sua propriedade ou da família para vir a UFRJ: ". $aluno['Aluno']['transporte_veiculo'] . "<br>" . 
"Número de transportes coletivos utilizados do locas de sua moradia até o campus universitário: " . $aluno['Aluno']['transporte_quantidade'] . "<br>" . 
"Valor total gasto diariamente em conduções: ". $aluno['Aluno']['transporte_gasto'] . "<br>" .
"Tempo gasto para chegar a UFRJ: ". $aluno['Aluno']['transporte_tempo'];

$tabela2 .= 
"<h2>Locais onde faz regularmente as refeições</h2>" .

"Local da refeição: " . $aluno['Aluno']['local_refeicao'] . "<br>" .
"Especifique: " . $aluno['Aluno']['local_refeicao_outro']. "<br>";

$tabela2 .=
"<h2>Informações adicionais</h2>" .

"<textarea>" . $aluno['Aluno']['informacao_adicional'] . "</textarea>";

$pdf->writeHTML($tabela2, true, 0, true, 0);

$pdf->lastPage();

//Close and output PDF document
$pdf->Output('solicitacao_beneficio.pdf', 'I'); 

?>
