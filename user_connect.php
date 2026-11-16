<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=missing;charset=utf8;","root","");
 if(isset($_POST['save'])){
   $nom=$_POST['nom'];
   $pwd=$_POST['pwd'];
   
   $sql=$bdd->prepare('SELECT * FROM user WHERE nom=? AND password=?');
   $sql->execute(array($nom,$pwd));
   //$exe=mysqli_query($conn ,$sql);
   
   if($sql->rowCount() > 0){
    session_start();
    $_SESSION['auth'] = true;
    $_SESSION['nom']=$_POST['nom'];
    $_SESSION['password']=$_POST['pwd'];
    // $_SESSION['email']=$sql->fetch()['email'];
    // $_SESSION['photo']=$sql->fetch()['photo'];
    // $_SESSION['id']=$sql->fetch()['id'];
    $_SESSION['id']=$sql->$user['id'];
    
    
    header("location: liste.php");
    
   }
   else{
    $error= "Email ou mot de passe non valide";
   }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="vendor/bootstrap.min.css">
    <script src="vendor/bootstrap.bundle.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="assets/js/main.js"></script>
    <link id="pagestyle" href="assets/css/material-dashboard.css" rel="stylesheet" />
    
</head>
<body class="bg-dark p-5">
    <div class="container">
    <div class="row">

<div class=" text-center col-xl-12 mt-6">
    <div class="row">
        <div class="card card-plain mx-auto  bg-white col-sm-5 p-3">
            <div class="card-header  bg-dark">
                <h4 class="font-weight-bolder text-white">CONNEXION</h4>
                <p class="mb-0">Entrer des informations valides</p>
                
            </div>
            <div class="card-body mt-4">
                <?php if(isset($error)){echo '<p class="mb-2 text-sm mx-auto text-primary text-gradient font-weight-bold">'.$error.'</p>';}?>
                <form action="" method="post">
                    <div class="input-group input-group-outline mb-3">
                        <input type="text"  name="nom" class="form-control" placeholder="nom">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="password" name="pwd" class="form-control" placeholder="Mot de passe">
                    </div>

                    <div class="text-center">
                        <button type="submit" name="save"
                            class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Se connecter</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-2 text-sm mx-auto">
                    je n'ai pas de compte?
                    <a href="inscription.html" class="text-primary text-gradient font-weight-bold">creer un compte</a>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>