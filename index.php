<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>List stagaires</title>
   <style>
    
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand  text-white" href="#"   >Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active  text-white" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  text-white" href="#">Ajoute</a>
        </li>
        
        
     
    </div>
  </div>
</nav>
<a href="ajouteStagair.php" class='btn btn-success btn-sm link float-end'>Ajouter</a>
    <?php 
      require_once 'learnsql.php';
      //REQUEST 
      $sqlState=$pdo->query('SELECT * FROM stagiares');
      $stagiares=$sqlState->fetchAll(PDO::FETCH_OBJ);
     
    
    ?>
    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Age</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach($stagiares as $stagiare){
        ?>
        <?php 
         //  >=20 bg-danger
         //  <20 bg-success
         //  >30  bg-warning
         $color='';
         if($stagiare->age >=30){
          $color='bg-danger';
         }
         else if($stagiare->age >=20){
          $color='bg-success';
         }
         else{
          $color='bg-warning';
         }
        ?>
        <tr>
               <td><?= $stagiare->id ?></td>
               <td><?= $stagiare->nom ?></td>
               <td><?= $stagiare->prenom ?></td>
               <td><span class="badge rounded-pill <?php echo "$color" ;?>"><?= $stagiare->age ?></span></td>
            
       
                <td>
             <form method="post">
                  <input class='btn btn-primary btn-sm'  type="submit" value="Modife" name="modif" onclick="modifi()">
                  <input class='btn btn-danger btn-sm' type="submit" value="Suprime" name="supp"  onclick="delet()">
             </form>
                </td>
           
        </tr>
        <?php 
      }
      ?>


  </tbody>
</table>

</div>

</body>
</html>
