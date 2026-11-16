<?php

  session_start();
  $bdd=new PDO("mysql:host=localhost;dbname=missing;charset=utf8;","root","");

  if(!$_SESSION['nom'] AND !$_SESSION['password']){
      header('Location: user_connect.php');
  }
    
 
  if(isset($_POST['save'])){
  if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['old']) AND !empty($_POST['town']) AND !empty($_POST['descrip'])){
  $chemin='img/';
  $name=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $sexe=$_POST['sexe'];
  $age=$_POST['old'];
  $ville=$_POST['town'];
  $photo=$chemin.$_FILES['photo']['name'];
  $description=$_POST['descrip'];
  
  $sql=$bdd->prepare('INSERT INTO signalement(nom,prenom,sexe,age,ville,photo,descriptions,date_signalement) VALUES (?,?,?,?,?,?,?,NOW())');
  $sql->execute(array($name,$prenom,$sexe,$age,$ville,$photo,$description));
  if($sql->rowCount() >0){
    
    header('location: liste.php');
  }else{
  ?>
    <?php echo "Echec";?>
    <?php
  }
}else{
 echo "veillez remplir tout les champs";
}
                        
  }
  
                          ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->

  <link rel="stylesheet" href="style.css">
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

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-4  col-xl-12  ">

              

            </div><!-- End Customers Card -->

            
            <div class="col-12">
              <div class="card contact top-selling overflow-auto">

               

                <div class="card-body pb-0">
                  <h5 class="card-title text-white">Signalement<span></span></h5>
                 

                  
                  <section class="section">
                    <div class="container">
                    <div class="row">
                        <div class="col-12">
                   
                        
                        <form action="" method="post" class="row pb-3" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <input type="text"  name="nom" placeholder="Nom" class="form-control mb-4 shadow rounded-0">
                                <input type="text"  name="prenom" placeholder="Prenom" class="form-control mb-4 shadow rounded-0">
                                <span class="text-white" >Sexe :</span>
                                <label class="text-white " for="">Masculin</label>
                                <input type="radio"  name="sexe" value="Masculin" >
                                <label class="text-white"  for="">Feminin</label>
                                <input type="radio"  name="sexe" value="Feminin" >
                            </div>
                            <div class="col-lg-6">
                                <input type="number"  name="old" placeholder="age" class="form-control mb-4 shadow rounded-0">
                                <input type="text"  name="town" placeholder="ville" class="form-control mb-4 shadow rounded-0">
                                <input type="file"  name="photo" class="form-control " >
                            </div>
                            <textarea  name="descrip" placeholder="Message Descriptif" class="form-control mb-4 shadow rounded-0 mt-3"></textarea>
                            <button type="submit" name="save" class="btn btn-primary">Signaler</button>
                        </form>
                        </div>
                    </div>
                        </div>
                    </section>
                </div>
                </div>

              </div>
            </div>
        </div>


            </div>
          </div>
         
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