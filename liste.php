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
  <style>
        .card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-1px);
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
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

                  <div class="col-md-3 " style="line-height:3px;">
                    <div class="card" id="hov">
                        <!-- detail.php -->
                        <a href="detail-sign.php?user_id=<?= htmlspecialchars($sign['photo']) ?>">
                            <img src="<?=($sign['photo']);?>" class="card-img-top" alt="... ">
                        </a>
                        <div class="card-body mb-0" style="text-transform:capitalize;">
                            <h5 class="card-title">
                                <?= htmlspecialchars($sign['nom']) . ' ' . htmlspecialchars($sign['prenom']) .' ';?><span class="text-primary text-end"><?=$sign['age'];?>ans</span>
                            </h5>
                            <p class="card-text"><?=$sign['sexe'];?></p>
                            <span class="d-flex justify-content-between">
                              <p class="card-text" style="font-size:13px;">signaler le :</p><p style="font-size:9px;"><?=$sign['date_signalement'];?></p>
                            </span>
                            <p class="card-text">Disparu a <?=$sign['ville'];?></p>
                            <div class="col-6 ">
                            <a class="text-danger" href="deleteSign.php?id=<?php echo $sign['id']?>"><i class="fa fa-trash-alt text-danger" onclick="return confirm('voulez vous vraiment supprimer cet element ?')"></i></a>
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