<?php
   session_start();
   $bdd=new PDO("mysql:host=localhost;dbname=missing;charset=utf8;","root","");
 
   if(!$_SESSION['nom'] AND !$_SESSION['password']){
       header('Location: user_connect.php');
   }

    if(isset($_POST['valider'])){
        $message=htmlspecialchars($_POST['message']);
        $insetMsg=$bdd->prepare('INSERT INTO forum(messages,id_auteur,date_send) VALUES(?,?,NOW())');
        $insetMsg->execute(array($message,$_SESSION['id']));
    }
    
else{
    echo "aucun utilisateur trouver";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
      <h1>Forum de Discussion</h1>
      
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row ">
              <div class="card bg-dark ">
                <div class="p-2 row msg-scroll">
                    <?php
                        $recupuser=$bdd->query('SELECT * FROM forum ');
                                        
                        while($messages=$recupuser->fetch()){

                            $recupU=$bdd->prepare('SELECT * FROM user WHERE id=?');
                            $recupU->execute(array($messages['id_auteur']));
                            $user=$recupU->fetch();

                            if($messages['id_auteur']==$_SESSION['id']){
                            ?>
                            

                            <div class="bt2">
                              <div class=" user user-name">
                              <img width=45 src="<?=$user['photo'];?>" alt="">
                              <span class="">moi</span>
                              </div>
                              <div class="bt p-3 card">
                                <p ><?=$messages['messages'];?></p>
                                <p style="font-size:13px; margin-top:20px;margin-bottom:0px;" class="text-end time small"><?=$messages['date_send'];?></p>
                          </div>
                            </div>
                            <?php
                                }
                            else{
                            ?>
                            <div class="p">
                              <div class="user ">
                              <img width=45 src="<?=$user['photo'];?>" alt="">
                              <span class=""><?=$user['nom'];?></span>
                              </div>
                              <div class="bt p-3 card">
                                <p ><?=$messages['messages'];?></p>
                                <p style="font-size:13px; margin-top:20px;margin-bottom:0px;" class="text-end time small"><?=$messages['date_send'];?></p>
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
                      <button class="btn btn-success pl-2" name="valider">Envoyer</button>
                    </form>
                  </div>
                </div>
              </div>
 
                   

              </div>
            </div><!-- End Top Selling -->

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
  </footer><!-- End Footer -->

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