
    <?php
//Realizando Conexão com o Banco de Dados
$db_connect = mysqli_connect("servername", "username", "password", "database");
mysqli_set_charset($db_connect,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

    $querySelect = ("SELECT A.idAuditTechnique, A.AuditPlan, B.ProcessActivitie, B.idAuditPlan FROM audittechnique A INNER JOIN auditplan B ON A.idAuditTechnique = B.idAuditTechnique");

    $resultSelect = mysqli_query($db_connect, $querySelect);
    
  include ("include/topo.php"); ?>

  <?php if(!empty($_GET['erroarquivo'])){ ;?>
                    <br>
                 <div class="alert alert-danger" role="alert">
                     <p>Error: Invalid Extension. Please select a file .CSV!</p>
                 </div>
                <?php }; ?> 


 <script type="text/javascript">
function validaCampo()
{
if(document.cadastro.idAuditPlan.value=="")
	{ 
	alert("Attention: Audit Plan Name it's Mandatory!");
	return false;
	}
else
	if(document.cadastro.file.value=="")
	{
	alert("Attention: Document Analises (.CSV) it's Mandatory!");
	return false;
	}
else
return true;
}
</script>


<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                        <form class="form-inline" action="DocumentAnalisesImport.php" name="cadastro" method="post" enctype="multipart/form-data" onsubmit="return validaCampo(); return false;" style="justify-content: center;">
                    <div class="wrap-input100">
                    <span class="login100-form-title p-b-18">
                       Insert the Document Analises
                    </span>
                         <p>
                            <label for="idAuditPlan">Select the Plan Audit Name:</label>
                            <select name="idAuditPlan" class="form-control">
                                <option value=""></option>
                                <?php while($reg = mysqli_fetch_array($resultSelect)){ ?>
                                          <option value="<?php echo $reg["idAuditPlan"]?>"> Plano: <?php echo $reg["AuditPlan"]?> / Processo: <?php echo $reg["ProcessActivitie"]?></option>
                                <?php }?>
                            </select>
                        </p>
                      </div>
                     <div class="wrap-login100">
                            <label>Insert the Document:</label>
                            <input type="file" name="file">
                                            
                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Send
							</button>
						</div>
					</div>
                         </div>  
                                              
                      </form>                
			</div>
		</div>
	</div>
	
 <?php include ("include/base.php")?>
