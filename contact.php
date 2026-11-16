<?php
  session_start();
  $bdd=new PDO("mysql:host=localhost;dbname=missing;charset=utf8;","root","");

  if(!$_SESSION['nom'] AND !$_SESSION['password']){
      header('Location: user_connect.php');
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
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="header  fixed-top bg-dark d-flex align-items-center">
  <?php include('nav-side/header.html');?>
  </header>

  <aside id="sidebar" class="sidebar sides">

    <!-- <ul class="sidebar-nav pb-5" id="sidebar-nav">
    
      <li class="nav-item ">
        <a class="nav-link collapsed" href="accueil.php">
          <span>Accueil</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link collapsed" href="signalement.php">
          <span>Signaler une disparition</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#">
          <span>Rechercher un disparu</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="notification.php">
          <span>Notifications</span>
        </a>
        
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="liste.php">
          </i><span>Liste des disparues</span>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <span>Enfants</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
             <span>Adolescent</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <span>Adultes</span>
            </a>
          </li>
         
        </ul>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav"  href="messageri.php">
          <span>Messagerie</span>
        </a>
        
      </li>
    
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#charts-nav"  href="forum.php">
          <span>Forum</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="contact.php">
         <span>Contact</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#">
          <span>Faire un Don</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <span>Profile</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" href="deconnexion.php">
          <span>Deconnection</span>
        </a>
      </li>
    
      
    
    </ul> -->
    <?php include('nav-side/sidebar.html');?>

  </aside>

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        
            <div class="col-7 ">
              <div>
                <h5>choisissez le contact pour debuter la discussion</h5>
              </div>
            </div>  
            <div class="col-5 text ">
              <div class="card contact top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title text-white">Mes Contacts<span></span></h5>

                  <?php
                              //$id=$_SESSION['id'];
                              $recup=$bdd->query('SELECT * FROM user');
                              //$recup->execute(array($id));
                              while($user=$recup->fetch()){
                          ?>
                     <div class=" card col-lg-12 list-contact" >
                         <a href="messageri.php?id=<?php echo $user['id'];?>">
                          <div class="p-3  bax-shadow-4 d-flex justify-content-evenly">
                              <span><img width="40" src="<?php echo $user['photo'];?>" alt=""></span>
                              <span class="pagetitle"><?php echo $user['nom'];?></span>
                              <span class="text-danger">En ligne</span>
                              <span class="text-success"><i class="bi bi-trash"></i></span>
                          </div>
                         </a>
                     </div>
                     <?php
                              }
                              ?>
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