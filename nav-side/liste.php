<?php
  session_start();
  $bdd=new PDO("mysql:host=localhost;dbname=missing;charset=utf8;","root","");

  if(!$_SESSION['nom'] AND !$_SESSION['password']){
      header('Location: user_connect.php');
  }
 
  $recupsign = $bdd->query('SELECT * FROM signalement');
if(isset($_GET['search']) AND !empty($_GET['search'])){
    $recherche=htmlspecialchars($_GET['search']);
    $recupsign=$bdd->query('SELECT id,nom,prenom,sexe,age,ville,photo,descriptions,id_auteur,date_signalement  FROM signalement WHERE nom LIKE "%'.$recherche.'%"');
    
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="vendor/fontawesome.all.min.css">
  <script src="vendor/fontawesome.all.min.js"></script>
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="header  fixed-top bg-dark d-flex align-items-center">
    <?php include('nav-side/header.html');?>
  </header>

  <aside id="sidebar" class="sidebar sides">
    <?php include('nav-side/sidebar.html');?>
  </aside>

  <main id="main" class="main">
    <section class="row section ">      
      <div class="col-sm-12  first">
        <div class="pagetitle text-center">
          <h1>Liste des Signalements</h1>
        </div>
        <div class="row  d-flex justify-content-space-evenly">
                  <!-- </?php
                      
                              // $recupsign=$bdd->query('SELECT * FROM signalement');
                              // while($sign=$recupsign->fetch()){
                          ?>
                          <div class="col-sm-3 m-1 "> -->
<!-- 
                            <div class="row card p-2  bg-white">
                              <div class="col-6"><img width=100% class="img" src="</?/=$sign['photo']?>" alt=""></div>                   
                                <div class="col-6 ">
                                  <h4 style="text-transform:capitalize;"></?=$sign['nom'];?> </?=$sign['prenom'];?> <span class="text-primary"></?=$sign['age'];?>ans</span></h4>
                                  <p></?=$sign['sexe'];?></p>
                                </div>
                                <p class="top">signaler le :</?=$sign['date_signalement'];?> </p>                          
                                <p>Disparu a </?=$sign['ville'];?></p>
                                <input type="submit" value="voir plus">                             -->
                            <!-- </div>
                          </div> -->
                     <!-- </?php
                              //}
                              ?> -->


                  
                                    <?php
                      if ($recupsign->rowcount() >0){
                      // $recupsign=$bdd->query('SELECT * FROM signalement');
                      while($sign=$recupsign->fetch()){
                  ?>
                        
                        <div class=" m-2 p-0 card cd" style="width: 15rem;background-color:rgb(218, 219, 219);line-height:3px;">
                    <img src="<?=$sign['photo']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" style="text-transform:capitalize;"><?=$sign['nom'];?> <?=$sign['prenom'];?> <span class="text-primary"><?=$sign['age'];?>ans</span></h5>
                      <p class="card-text"><?=$sign['sexe'];?></p>
                      <p class="card-text" style="font-size:13px;">signaler le :<t style="font-size:13px;"><?=$sign['date_signalement'];?></t></p>
                      <p class="card-text">Disparu a <?=$sign['ville'];?></p>
                      <div class="font row d-flex justify-content-space-between">
                        <div class="col-6">
                        <a href="#" class="btn btn-primary">voir plus</a>
                        </div>
                        
                        <div class="col-6 text-end">
                        <a class="text-danger" href="deleteSign.php?id=<?php echo $sign['id']?>"><i class="fa fa-trash-alt text-danger" onclick="return confirm('voulez vous vraiment supprimer cet element ?')"></i></a>
                          <!-- <i class="fa fa-trash-alt "></i> -->
                          <i class="fa fa-edit text-success"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                      <?php }}
                      else{
                        ?>
                        <p style="text-align:center;">aucun element ne correspond a votre recherche try again......</p>
                      
                        <i class="fas fa-search-minus" style="font-size:70px"></i>
                        <?php
                      }?>
                      </div>         

      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Alertesdisparition</span></strong>. All Rights Reserved
      </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>