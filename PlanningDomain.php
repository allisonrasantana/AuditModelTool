    <?php
//Realizando Conexão com o Banco de Dados
$db_connect = mysqli_connect("servername", "username", "password", "database");
mysqli_set_charset($db_connect,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

    $querySelect = ("SELECT idAuditTechnique, AuditPlan FROM audittechnique");
    
    $resultSelect = mysqli_query($db_connect, $querySelect);
    
            if (!$resultSelect) {
                $message  = 'Invalid query: ' . mysqli_error() . "\n";
                $message .= 'Whole query: ' . $querySelect;
                die($message);
             } 


if(isset($_POST["cadastrar"])){

	$processactivitie = $_POST["ProcessActivitie"];
    $typeaudit = $_POST["TypeAudit"];
    $responsabilitiesaudit = $_POST["ResponsabilitiesAudit"];
    $scopeauditl = $_POST["ScopeAuditL"];
    $scopeauditc = $_POST["ScopeAuditC"];
    $periodaudit = $_POST["PeriodAudit"];
    $auditplan = $_POST["AuditPlan"]; 
    
	
    $queryInsert = ("INSERT INTO auditplan (ProcessActivitie, TypeAudit, ResponsabilitiesAudit,	ScopeAuditL, ScopeAuditC,	PeriodAudit,	idAuditTechnique) VALUES ('$processactivitie','$typeaudit','$responsabilitiesaudit','$scopeauditl','$scopeauditc','$periodaudit','$auditplan')");
     
    $resultInsert = mysqli_query($db_connect, $queryInsert);
    
    if (!$resultInsert) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryInsert;
    die($message);
    } 
    
      header("Location:index.php?inserido=inserido");
    
} 

include ("include/topo.php"); 
?>

<script type="text/javascript">
    function validaCampo()
    {
        if(document.cadastro.AuditPlan.value=="")
            {
            alert("Attention: Plan Audit Name it's Mandatory!");
            return false;
            }
        else
            if(document.cadastro.TypeAudit.value=="")
            {
            alert("Attention: Type Audit (Intenal or External) it's Mandatory!");
            return false;
            }
        else
            if(document.cadastro.ProcessActivitie.value=="")
            {
            alert("Attention: Process Activitie it's Mandatory!");
            return false;
            }
        else
            if(document.cadastro.PeriodAudit.value=="")
            {
            alert("Attention: Period Audit (Date) it's Mandatory!");
            return false;
            }
        else
            if(document.cadastro.ResponsabilitiesAudit.value=="")
            {
            alert("Attention: Responsabilities Audit it's Mandatory!");
            return false;
            }
        else
            if(document.cadastro.ScopeAuditL.value=="")
            {
            alert("Attention: Scope Audit Herarchical Level (Operational or Strategic) it's Mandatory!");
            return false;
            }
        else
            if(document.cadastro.ScopeAuditC.value=="")
            {
            alert("Attention: Scope Palan Report Confidentiality it's Mandatory!");
            return false;
            }  
    else
    return true;
    }
</script>


<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" name="cadastro" method="post" onsubmit="return validaCampo(); return false;">
                    <span class="login100-form-title p-b-18">				
                        Please! Fill the data 
                    </span>
                    <div class="wrap-input100">
                         <p>
                            <label for="AuditPlan">Select the Plan Audit Name</label>
                            <select name="AuditPlan" class="form-control">
                                <option value=""></option>
                                <?php while($reg = mysqli_fetch_array($resultSelect)){ ?>
                                          <option value="<?php echo $reg["idAuditTechnique"]?>"> <?php echo $reg["AuditPlan"]?></option>
                                <?php }?>
                            </select>
                        </p>
                    </div>
                    <div class="wrap-input100">
                        <p>
                            <label for="TypeAudit">Select Type Audit:</label>
                            <br>
                            <select name="TypeAudit" class="form-control">
                                <option value=""></option>
                                <option value="1">Internal</option>
                                <option value="2">External</option>
                            </select>
                        </p>
                    </div>
                    <div class="wrap-input100">
						<input class="input100" type="text" name="ProcessActivitie">
						<span class="focus-input100" data-placeholder="Process Activitie"></span>
					</div>
                    <div class="wrap-input100" >
                        <p>Period Audit - Date</p>
						<input class="input100" type="date" name="PeriodAudit">
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="text" name="ResponsabilitiesAudit">
						<span class="focus-input100" data-placeholder="Responsabilities Audit"></span>
					</div>
                    <span class="login100-form-title p-b-18">
                        Select Scope Audit Data
					</span> 
                    <div class="wrap-input100">
                        <p>
                            <label for="ScopeAuditL">Select Herarchical Level:</label>
                            <br>
                           <select name="ScopeAuditL" class="form-control">
                              <option value=""></option>
                              <option value="1">Operational</option>
                              <option value="2">Strategic</option>
                           </select>
                        </p>
                    </div>
                    <div class="wrap-input100">
                    <p>
                        <label for="ScopeAuditC">Report Confidentiality:</label>
                        <br>
                       <select name="ScopeAuditC" class="form-control">
                          <option value=""></option>
                          <option value="1">Yes</option>
                          <option value="2">No</option>
                       </select>
                    </p>
                    </div>
                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" value="Cadastrar" name="cadastrar">
								Register
							</button>
						</div>
					</div>
                    
				</form>
			</div>
		</div>
	</div>
	
 <?php include ("include/base.php")?>