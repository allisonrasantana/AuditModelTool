<?php
//Realizando Conexão com o Banco de Dados
$db_connect = mysqli_connect("servername", "username", "password", "database");
mysqli_set_charset($db_connect,"utf8");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} 

//Função que organiza as datas para serem salvas ou exibidas
require "include/datafunc.php"; 


//Recebendo o Arquivo
$arquivo = $_FILES["file"]["tmp_name"];
$nome = $_FILES["file"]["name"];
$idauditplan = $_POST["idAuditPlan"];

//Realizando Validação (Cria um arrays considerando o . como divisor, Ex: alunos.csv - posição aluno[0] e posição CSV[1])
$ext = explode(".", $nome);

//Extensão passa a ser CSV
$extensao = end($ext);

//Analisa se extensão é CSV
if($extensao != "csv") {

    header("Location:CriterionAudit.php?erroarquivo=erroarquivo");
    
} else {
        //Função fopen ler arquivos, o 'r' siguinifica Read 
        $objeto = fopen($arquivo,'r');
        
        //fgetcsv = busca os dados no arquivo em forma de array
        while(($dados = fgetcsv($objeto, 1000, ";")) !== FALSE)
        {
            $int = ($dados[0]);
            $float = ($dados[1]);
            $date = ($dados[2]);
            
            $Salvardata = gravaData($date);
           
            $queryInsert = ("INSERT INTO documentanalises (INT_TYPE, DATE_TYPE, FLOAT_TYPE, idAuditPlan) VALUES ('$int', '$Salvardata', '$float', '$idauditplan')");
    
            $resultInsert = mysqli_query($db_connect, $queryInsert);

           }
              header("Location:index.php?inserido=inserido");         
       }            
   

?>