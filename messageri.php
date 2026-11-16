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

  <title>Messagerie privee</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header id="header" class="header  fixed-top bg-dark d-flex align-items-center">
    <?php include('nav-side/header.html');?>
  </header>

  <aside id="sidebar" class="sidebar sides">
    <?php include('nav-side/sidebar.html');?>
  </aside>

  <main id="main" class="main">

    <div class="pagetitle text-center">
      <h1>Messagerie</h1>
      
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

              <div class="card bg-dark ">

                <div class="p-2 row msg-scroll">
                  <!-- <h5 class="card-title">Message avec <span>| Foko</span></h5> -->

                  <!-- <div class=""> -->
                    <?php

                        if(isset($_GET['id']) AND !empty($_GET['id'])){                       
                          $getid=$_GET["id"];
                          //echo $getid;
                          $recup=$bdd->prepare('SELECT * FROM user WHERE id=?');
                          $recup->execute(array($getid));

                          

                          if($recup->rowCount()>0){
                              if(isset($_POST['valider'])){
                                  $message=htmlspecialchars($_POST['message']);
                                  $insetMsg=$bdd->prepare('INSERT INTO message(msg,id_destinataire,id_auteur,date_message) VALUES(?,?,?,NOW())');
                                  $insetMsg->execute(array($message,$getid,$_SESSION['id']));
                              }
                              
                          }else{
                              echo "aucun utilisateur trouver";
                          }
                        }else{
                          echo "aucun identifiant trouver";
                         
                        }


                        $recupuser=$bdd->prepare('SELECT * FROM message WHERE (id_auteur=? AND id_destinataire=?) OR (id_auteur=? AND id_destinataire=?)');
                        $recupuser->execute(array($_SESSION['id'],$getid,$getid,$_SESSION['id']));
                        //$recup=$bdd->query('SELECT * FROM user,messages where user.id=messages.id_auteur');
                        //$recup=$bdd->query('SELECT * FROM user where id=?');
                        // while($user=$recup->fetch()){

                            
                        while($messages=$recupuser->fetch()){

                            $recupU=$bdd->prepare('SELECT * FROM user WHERE id=?');
                            $recupU->execute(array($messages['id_auteur']));
                            $user=$recupU->fetch();
                            if($messages['id_destinataire']==$_SESSION['id']){
                            ?>
                            

                            <div class="p">
                              <div class=" user">
                              <img width=45 src="<?=$user['photo'];?>" alt="">
                              <span class=""><?=$user['nom'];?></span>
                              </div>
                              <div class="bt p-3 card">
                                <p><?=$messages['msg'];?></p>
                                <p style="font-size:13px; margin-top:20px;margin-bottom:0px;" class="text-end time small"><?=$messages['date_message'];?></p>
                          </div>
                            </div>
                            <?php
                                }
                            else{
                            ?>
                            <div class="bt2">
                              <div class="user user-name">
                              <img width=45 src="<?=$user['photo'];?>" alt="">
                              <span class="">moi</span>
                              </div>
                              <div class="bt p-3 card">
                                <p><?=$messages['msg'];?></p>
                                <p style="font-size:13px; margin-top:20px;margin-bottom:0px;" class="text-end time small"><?=$messages['date_message'];?></p>
                                </div>
                            </div>
                            <?php
                            }
                            }
                            ?>
                      </div>
                  
                <!-- </div> -->
                <!-- </div> -->
                <div class="pb-2 pt-2 row">

                  <div class="search-bar col-lg-11">
                    <form class="search-form d-flex align-items-center" method="POST" action="">
                      <i class="bi bi-plus"></i>
                      <input type="text" name="message" class="form-control" placeholder="ecriver votre message" title="saisissew votre message">
                      <button class="btn btn-success" name="valider">Envoyer</button>
                    </form>
                  </div>
                </div>
              </div>
 
    

    

</div>

            </div><!-- End Customers Card -->

          

            <!-- Top Selling -->
            <!-- <div class="col-12">
              <div class="card top-selling overflow-auto">

               

                <div class="card-body pb-0">
                  <h5 class="card-title">Mes Contacts<span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Price</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Foko Folang</a></td>
                        <td>$64</td>
                        
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Jean Simo</a></td>
                        <td>$46</td>
                        
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Pierre Salomon</a></td>
                        <td>$59</td>
                       
                      </tr>
                      
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        

            </div>
          </div><!-- End Recent Activity -->
         
        </div> 

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Alertesdisparition</span></strong>. All Rights Reserved
    </div>
   
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>