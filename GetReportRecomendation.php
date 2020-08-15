
    <?php
//Realizando Conexão com o Banco de Dados
$db_connect = mysqli_connect("servername", "username", "password", "database");
mysqli_set_charset($db_connect,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

	use Dompdf\Dompdf;

if(isset($_POST["cadastrar"])){
    
      $idauditplan = $_POST["idAuditPlan"];    
   
    $querySelect2 = ("SELECT ProcessActivitie, ResponsabilitiesAudit FROM auditplan WHERE idAuditPlan = $idauditplan");

    $resultSelect2 = mysqli_query($db_connect, $querySelect2);

    $dadosSelect2 = mysqli_fetch_array($resultSelect2);
    
    $querySelect3 = ("SELECT * FROM logfindings WHERE idAuditPlan = $idauditplan");

    $resultSelect3 = mysqli_query($db_connect, $querySelect3);

    $hoje = date('d/m/Y'); 
    
    
	$html = '<table border=1>';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Processo Auditado</th>';
	$html .= '<th>Auditor Responsável</th>';
	$html .= '<th>Data</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
    $html .= '<tr><td>'.$dadosSelect2["ProcessActivitie"]."</td>";
    $html .= '<td>'.$dadosSelect2["ResponsabilitiesAudit"]."</td>";
    $html .= '<td>'.$hoje."</td>";
	$html .= '</tr>';
    $html .= '</tbody>';
    $html .= '<thead>';
    $html .= '<tr>';
	$html .= '<th>Registro no DocumentAnalises</th>';
	$html .= '<th>Critério</th>';
	$html .= '<th>Situação</th>';
	$html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
	while($dadosSelect3 = mysqli_fetch_assoc($resultSelect3)){
		$html .= '<tr><td>'.$dadosSelect3['RegistroNC'] . "</td>";
		$html .= '<td>'.$dadosSelect3['CriterionAudit'] . "</td>";
		$html .= '<td>NÃO CONFORMIDADE</td>';		
	}

	$html .= '</tbody>';
	$html .= '</table';

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">RELATÓRIO DE AUDITORIA</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
}
?>
