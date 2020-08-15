<?php 
//Realizando Conexão com o Banco de Dados
$db_connect = mysqli_connect("servername", "username", "password", "database");
mysqli_set_charset($db_connect,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(isset($_POST["cadastrar"])){
	$ojectiveaudit = $_POST["objectiveaudit"];
	$auditpalan = $_POST["auditpalan"];
    
    $queryInsert = ("INSERT INTO audittechnique(ObjectiveAudit, AuditPlan) VALUES('$ojectiveaudit', '$auditpalan')");
    
    $resultInsert = mysqli_query($db_connect, $queryInsert);
    
            if (!$resultInsert) {
                $message  = 'Invalid query: ' . mysql_error() . "\n";
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
if(document.cadastro.objectiveaudit.value=="")
	{ 
	alert("Attention: Objective Audit it's Mandatory!");
	return false;
	}
else
	if(document.cadastro.auditpalan.value=="")
	{
	alert("Attention: Audit Palan it's Mandatory!");
	return false;
	}
else
return true;
}
</script>


<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" name="cadastro" method="post" onsubmit="return validaCampo(); return false;" >
					<span class="login100-form-title p-b-26">				
                    Please! fill in the following data
					</span>
                            <div class="wrap-input100">
                            <p><label for="objectiveaudit">Select the Audit Objective</label>
                               <select name="objectiveaudit" class="form-control">
                                  <option value=""></option>
                                  <option value="1">Level 1 - Routine Verification</option>
                                   <option value="2">Level 2 - Verification of Conformity</option>
                                   <option value="3">Level 3 - Reanalysis Verification</option>
                               </select>
                            </p>
                            </div>
                    <div class="wrap-input100">
						<input class="input100" type="text" name="auditpalan">
						<span class="focus-input100" data-placeholder="Insert the Audit Plan Name"></span>
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