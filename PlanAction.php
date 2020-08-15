
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

include ("include/topo.php"); 
    
 ?>

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                    <form class="form-inline" action="GetPlanAction" name="cadastro" method="post" enctype="multipart/form-data" style="justify-content: center;">
                    <span class="login100-form-title p-b-26">				
                    Please! Select Plan and Get the Plan Action
					</span>
                    <div class="wrap-input100">
                         <p>
                            <label for="idAuditPlan">Select the Plan Audit Name</label>
                            <select class="form-control" name="idAuditPlan" class="form-control">
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
								Get Plan Action in PDF
							</button>
						</div>
					</div>                                 
                      </form>                
			</div>
		</div>
	</div>

 <?php include ("include/base.php")?>