<?php

include_once 'connexion.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cars Location</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="loc_Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>
    <header>
    <div class="card">
  <div class="card-header" style="font-size:x-large; font-weight:bold;">
  Location Car
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    <form name="formauto"  method="POST" action="">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <input type="submit" class="btn btn-outline-secondary" name="btsubmit" type="button" style="background-color:white;" id="button-addon1" value="Rechercher" >
  </div>
  <input type="text" class="form-control" name="motcle" placeholder="  Rechercher par Marque..." aria-label="Example text with button addon" aria-describedby="button-addon1">
</div>
    </form> 
    </blockquote>
  </div>
</div>
    </header>
    <?php
    if(isset($_POST['btsubmit']))
    {
      $mc = $_POST['motcle'];
      $reqSelect = "SELECT * FROM automobile WHERE Marque LIKE '%$mc%' ";
    }
    else
    {
      $reqSelect = "SELECT * FROM automobile";
    }
    $resultat = mysqli_query($conn, $reqSelect);
    while ($row = mysqli_fetch_assoc($resultat)) {
    ?>

      <div class="card"  style="width: 18rem; display:inline-block; margin:7px; padding:2px;">
        <img src="<?php echo $row['Photo'] ?>" class="card-img-top" >
        <div class="card-body">
          <h5 class="card-title"> <?php echo $row['Marque'] ?> </h5>
          <?php echo $row['Prix_Loc'] ?>DT
        </div>
       </div>

    <?php
    }
    ?>
    
</body>
</html>