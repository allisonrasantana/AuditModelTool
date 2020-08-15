
    <?php
//Realizando Conexão com o Banco de Dados
$db_connect = mysqli_connect("servername", "username", "password", "database");
mysqli_set_charset($db_connect,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

 include ("include/topo.php");

if(isset($_POST["analyze"])){
    $idauditplan = $_GET["idauditplan"];
	$Operation1 = $_POST["operation1"];
    $Criterion1 = $_POST["criteriun1"];
    $Operation2 = $_POST["operation2"];
    $Criterion2 = $_POST["criteriun2"];
    $Operation3 = $_POST["operation3"];
    $Criterion3 = $_POST["criteriun3"];
   
    echo $idauditplan;
    $querySelect2 =  ("SELECT * FROM documentanalises WHERE idAuditPlan = '$idauditplan'");
    
    $resultSelect2 = mysqli_query($db_connect, $querySelect2);
    
       while($dadosSelect2 = mysqli_fetch_array($resultSelect2)){ 
           
           ?>
<table class="table">
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
               
                 switch($Operation1) {
                 
                  case ($Operation1 == 1 ): 
                         
                         if ($dadosSelect2["INT_TYPE"] >= $Criterion1 ) {
                         ?>
                       <td><?php echo $dadosSelect2["INT_TYPE"] ?> </td>
                       <td>Deve ser Maior ou Igual a <?php echo $Criterion1 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php
                             
                         } else {                              
                              ?>
                       <td><?php echo $dadosSelect2["INT_TYPE"] ?> </td>
                       <td>Deve ser Maior ou Igual a <?php echo $Criterion1 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                         
                                  $INT_TYPE_NC_INSERT = $dadosSelect2["INT_TYPE"];
                                  $INT_TYPE_CRITERION_NC_INSERT = 'Deve ser Maior ou Igual a '.$Criterion1;
                             
                                  $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$INT_TYPE_NC_INSERT', '$INT_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                                  
                         }
                         
                         break; 
                  case ($Operation1 == 2 ): 
                        
                          if ($dadosSelect2["INT_TYPE"] <= $Criterion1) {
                             
                               ?>
                       <td><?php echo $dadosSelect2["INT_TYPE"] ?> </td>
                       <td>Deve ser Menor ou Igual a <?php echo $Criterion1 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php     
                         } else { 
                           ?>
                      <td><?php echo $dadosSelect2["INT_TYPE"] ?> </td>
                       <td>Deve ser Menor ou Igual a <?php echo $Criterion1 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                                  $INT_TYPE_NC_INSERT = $dadosSelect2["INT_TYPE"];
                                  $INT_TYPE_CRITERION_NC_INSERT = 'Deve ser Menor ou Igual a '.$Criterion1;    
                              
                              $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$INT_TYPE_NC_INSERT', '$INT_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                          }
                         
                         break; 
                  case ($Operation1 == 3 ): 
                        
                         if ($dadosSelect2["INT_TYPE"] == $Criterion1) {
                             
                             ?>
                        <td><?php echo $dadosSelect2["INT_TYPE"] ?> </td>
                       <td>Deve ser Igual a <?php echo $Criterion1 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php
                                 
                         } else { 
                         ?>
                       <td><?php echo $dadosSelect2["INT_TYPE"] ?> </td>
                       <td>Deve ser Igual a <?php echo $Criterion1 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                             
                                  $INT_TYPE_NC_INSERT = $dadosSelect2["INT_TYPE"];
                                  $INT_TYPE_CRITERION_NC_INSERT = 'Deve ser Igual a '.$Criterion1; 
                             
                             $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$INT_TYPE_NC_INSERT', '$INT_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                             
                         }
                         
                         break; 
                         
                          }
           
?>
</tr>
<tr>     
<?php
           
                   switch($Operation2) {     
                        case ($Operation2 == 1 ): 
                         
                         if ($dadosSelect2["DATE_TYPE"] >= $Criterion2) {
                             
                              ?>
                       <td><?php echo $dadosSelect2["DATE_TYPE"] ?> </td>
                       <td>Deve ser Maior ou Igual a <?php echo $Criterion2 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php
                             
                         } else { 
                         ?>
                       <td><?php echo $dadosSelect2["DATE_TYPE"] ?> </td>
                       <td>Deve ser Maior ou Igual a <?php echo $Criterion2 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                             
                                  $DATE_TYPE_NC_INSERT = $dadosSelect2["DATE_TYPE"];
                                  $DATE_TYPE_CRITERION_NC_INSERT = 'Deve ser Maior ou Igual a '.$Criterion2;
                             
                             $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$DATE_TYPE_NC_INSERT', '$DATE_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                             
                         }
                         
                         break; 
                  case ($Operation2 == 2 ): 
                        
                          if ($dadosSelect2["DATE_TYPE"] <= $Criterion2) {
                             
                              ?>
                           <td><?php echo $dadosSelect2["DATE_TYPE"] ?> </td>
                       <td>Deve ser Menor ou Igual a <?php echo $Criterion2 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php
                              
                         } else { 
                          ?>
                        <td><?php echo $dadosSelect2["DATE_TYPE"] ?> </td>
                       <td>Deve ser Menor ou Igual a <?php echo $Criterion2 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                          
                               $DATE_TYPE_NC_INSERT = $dadosSelect2["DATE_TYPE"];
                               $DATE_TYPE_CRITERION_NC_INSERT = 'Deve ser Menor ou Igual a '.$Criterion2;
                              
                              $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$DATE_TYPE_NC_INSERT', '$DATE_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                              
                          }
                         
                         break; 
                  case ($Operation2 == 3 ): 
                        
                         if ($dadosSelect2["DATE_TYPE"] == $Criterion2) {
                             
                              ?>
                       <td><?php echo $dadosSelect2["DATE_TYPE"] ?> </td>
                       <td>Deve ser Igual a <?php echo $Criterion2 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php
                                  
                         } else { 
                         
                         ?>
                    <td><?php echo $dadosSelect2["DATE_TYPE"] ?> </td>
                       <td>Deve ser Igual a <?php echo $Criterion2 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                          
                             $DATE_TYPE_NC_INSERT = $dadosSelect2["DATE_TYPE"];
                             $DATE_TYPE_CRITERION_NC_INSERT = 'Deve Igual a '.$Criterion2;
                             
                             $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$DATE_TYPE_NC_INSERT', '$DATE_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                             
                         }
                         
                         break;         
                    } 
           
?>
</tr>
<tr>     
<?php
           
                    switch($Operation3) {
                           case ($Operation3 == 1 ): 
                         
                         if ($dadosSelect2["FLOAT_TYPE"] >= $Criterion3) {
                             
                              ?>
                        <td><?php echo $dadosSelect2["FLOAT_TYPE"] ?> </td>
                       <td>Deve ser Maior ou Igual a <?php echo $Criterion3 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php
                             
                         } else { 
                         
                         ?>
                       <td><?php echo $dadosSelect2["FLOAT_TYPE"] ?> </td>
                       <td>Deve ser Maior ou Igual a <?php echo $Criterion3 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                             
                            $FLOAT_TYPE_NC_INSERT = $dadosSelect2["FLOAT_TYPE"];
                             $FLOAT_TYPE_CRITERION_NC_INSERT = 'Deve ser Maior ou Igual a '.$Criterion3;
                             
                             $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$FLOAT_TYPE_NC_INSERT', '$FLOAT_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                             
                         }
                         
                         break; 
                  case ($Operation3 == 2 ): 
                        
                          if ($dadosSelect2["FLOAT_TYPE"] <= $Criterion3) {
                             ?>
                       <td><?php echo $dadosSelect2["FLOAT_TYPE"] ?> </td>
                       <td>Deve ser Menor ou Igual a <?php echo $Criterion3 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php
                         } else { 
                          
                          ?>
                        <td><?php echo $dadosSelect2["FLOAT_TYPE"] ?> </td>
                       <td>Deve ser Menor ou Igual a <?php echo $Criterion3 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                            
                             $FLOAT_TYPE_NC_INSERT = $dadosSelect2["FLOAT_TYPE"];
                             $FLOAT_TYPE_CRITERION_NC_INSERT = 'Deve ser Menor ou Igual a '.$Criterion3;
                              
                              $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$FLOAT_TYPE_NC_INSERT', '$FLOAT_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                              
                          }
                         
                         break; 
                  case ($Operation3 == 3 ): 
                        
                         if ($Criterion3 == $dadosSelect2["FLOAT_TYPE"]) {
                              ?>
                       <td><?php echo $dadosSelect2["FLOAT_TYPE"] ?> </td>
                       <td>Deve ser Igual a <?php echo $Criterion3 ?></td>
                       <td class="alert alert-success" role="alert">Conforme</td>
                         <?php
                         } else { 
                         
                               ?>
                       <td><?php echo $dadosSelect2["FLOAT_TYPE"] ?> </td>
                       <td>Deve ser Igual a <?php echo $Criterion3 ?></td>
                       <td class="alert alert-danger" role="alert">NÃO CONFORMIDADE</td>
                         <?php
                             
                             $FLOAT_TYPE_NC_INSERT = $dadosSelect2["FLOAT_TYPE"];
                             $FLOAT_TYPE_CRITERION_NC_INSERT = 'Deve ser Igual a '.$Criterion3;
                             
                             $queryInsert = ("INSERT INTO logfindings (idAuditPlan,RegistroNC,CriterionAudit) VALUES ('$idauditplan', '$FLOAT_TYPE_NC_INSERT', '$FLOAT_TYPE_CRITERION_NC_INSERT')");
    
                                  $resultInsert = mysqli_query($db_connect, $queryInsert);
                             
                         }
                         
                         break; 
                 
                        }
           
           ?>
</tr>
  </tbody>
</table>
<?php
           }
           
           
       }
        
  include ("include/base.php")?>
