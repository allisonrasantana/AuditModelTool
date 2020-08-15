    <?php
  include ("include/topo.php"); ?>
      
     <div class="container"> <!-- Inicio Conteudo -->        
      
    <?php if(!empty($_GET['inserido'])){ ;?>
                    <br>
                 <div class="alert alert-success" role="alert">
                     <p>Registration Successful!</p>
                 </div>
                <?php }; ?> 
         
    <div class="alert alert-warning">
        
        <h5>Developer Information</h5>
 
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Name:</th>
      <th scope="col">Contact:</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Allison R. A. Santana</th>
      <td>allison-valente@hotmail.com</td>
    </tr>
    <tr>
      <th scope="row">Dr. Paulo Caetano da Silva</th>
      <td>paulo.caetano@unifacs.br</td>
    </tr>
  </tbody>
</table>
        </div>
    </div><!-- Fim Conteudo -->

 <?php include ("include/base.php")?>
 