
    <?php
//Realizando Conexão com o Banco de Dados
$db_connect = mysqli_connect("servername", "username", "password", "database");
mysqli_set_charset($db_connect,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

include ("include/topo.php"); 

if(isset($_POST["cadastrar"])){
      $idauditplan = $_POST["idAuditPlan"];    
   
    $querySelect2 = ("SELECT ProcessActivitie, ResponsabilitiesAudit FROM auditplan WHERE idAuditPlan = $idauditplan");

    $resultSelect2 = mysqli_query($db_connect, $querySelect2);

    $dadosSelect2 = mysqli_fetch_array($resultSelect2);
    
    $querySelect3 = ("SELECT * FROM logfindings WHERE idAuditPlan = $idauditplan");

    $resultSelect3 = mysqli_query($db_connect, $querySelect3);

    $hoje = date('d/m/Y'); 
        
?>
<table class="table">
    <p class="alert alert-success" >LOG GERADO COM SUCESSO.</p>
 <thead>
    <tr>
      <th scope="col">Processo Auditado</th>
      <th scope="col">Auditor Responsável</th>
      <th scope="col">Log Gerado em:</th>
    </tr>
  </thead>
    <tbody>
     <td><?php echo $dadosSelect2["ProcessActivitie"] ?> </td>
     <td><?php echo $dadosSelect2["ResponsabilitiesAudit"] ?> </td>
     <td><?php echo $hoje ?> </td>
    </tbody>
  <thead>
    <tr>
      <th scope="col">Registro no DocumentAnalises</th>
      <th scope="col">Critério</th>
      <th scope="col">Situação</th>
    </tr>
  </thead>
      <tbody>
   <tr>
<?php
   while($dadosSelect3 = mysqli_fetch_array($resultSelect3)){     ?>
    <td><?php echo $dadosSelect3["RegistroNC"] ?> </td>
    <td><?php echo $dadosSelect3["CriterionAudit"] ?></td>
    <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
    </tr>
  </tbody>
<?php }
    
}
    
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
                    Please! Select Plan and Get the LOG
					</span>
                    <div class="wrap-input100">
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
                <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" value="Cadastrar" name="cadastrar">
								Get the LOG
							</button>
						</div>
					</div>
                                                      
                      </form>                
			</div>
		</div>
	</div>

<?php 
    include ("include/base.php");
}
?>
