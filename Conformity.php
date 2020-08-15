
    <?php
$db_connect = mysqli_connect("servername", "username", "password", "database");
mysqli_set_charset($db_connect,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

include ("include/topo.php"); 

if(isset($_POST["cadastrar"])){
      $idauditplan = $_POST["idAuditPlan"];    
   

    //Obtem os critérios referente lançados no CritérioAuidt
    $querySelect2 = ("SELECT * FROM criterionaudit WHERE idAuditPlan = $idauditplan");

    $resultSelect2 = mysqli_query($db_connect, $querySelect2);

     $dadosSelect = mysqli_fetch_array($resultSelect2);
?>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                    <form class="form-inline" action="ConformityAnalyse.php?idauditplan=<?php echo $idauditplan; ?>" name="cadastro" method="post" enctype="multipart/form-data" onsubmit="return validaCampo(); return false;">       
                    <span class="login100-form-title p-b-18">				
                        Defin Criterion 
                    </span>                 
                        <div class="wrap-input100">
                               <select name="operation1" >
                                  <option value=""></option>
                                  <option value="1">Maior Igual</option>
                                   <option value="2">Menor Igual</option>
                                   <option value="3">Igual a</option>
                               </select> - 
                               <select name="criteriun1" >
                                  <option value="<?php echo $dadosSelect["INT_TYPE"]?>"><?php echo $dadosSelect["INT_TYPE"]?></option>
                               </select>    
                       </div>  
                      <div class="wrap-input100">
                               <select name="operation2" >
                                  <option value=""></option>
                                  <option value="1">Maior Igual</option>
                                   <option value="2">Menor Igual</option>
                                   <option value="3">Igual a</option>
                               </select> - 
                               <select name="criteriun2" >
                                  <option value="<?php echo $dadosSelect["DATE_TYPE"]?>"><?php echo $dadosSelect["DATE_TYPE"]?></option>
                               </select>
                       </div>
                      <div class="wrap-input100">
                               <select name="operation3" >
                                  <option value=""></option>
                                  <option value="1">Maior Igual</option>
                                   <option value="2">Menor Igual</option>
                                   <option value="3">Igual a</option>
                               </select> - 
                               <select name="criteriun3" >
                                  <option value="<?php echo $dadosSelect["FLOAT_TYPE"]?>"><?php echo $dadosSelect["FLOAT_TYPE"]?></option>
                               </select>
                       </div>
                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="analyze">
								Analyze The Conformity
							</button>
						</div>
					</div>
                      </form>                
			</div>
		</div>
	</div>
<?php } 
    
else
    
{
    $querySelect = ("SELECT A.idAuditTechnique, A.AuditPlan, B.ProcessActivitie, B.idAuditPlan FROM audittechnique A INNER JOIN auditplan B ON A.idAuditTechnique = B.idAuditTechnique");

    $resultSelect = mysqli_query($db_connect, $querySelect);
    
 ?>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                    <form class="form-inline" action="" name="cadastro" method="post" enctype="multipart/form-data" onsubmit="return validaCampo(); return false;" style="justify-content: center;">
                    <span class="login100-form-title p-b-26">				
                    Please! Select Plan for Defin Criterion
					</span>
                    <div class="wrap-input100">
                         <p>
                            <label for="idAuditPlan">Select the Plan Audit Name</label>
                            <select class="form-control" name="idAuditPlan" >
                                <option value=""></option>
                                <?php while($reg = mysqli_fetch_array($resultSelect)){ ?>
                                          <option value="<?php echo $reg["idAuditPlan"]?>"> Plano: <?php echo $reg["AuditPlan"]?> / Processo: <?php echo $reg["ProcessActivitie"]?></option>
                                <?php }?>
                            </select>
                        </p>
                        </div>  
                <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" value="Cadastrar" name="cadastrar">
								Defin Criterion
							</button>
						</div>
					</div>
                                                      
                      </form>                
			</div>
		</div>
	</div>

<?php 
}
include ("include/base.php")?>
