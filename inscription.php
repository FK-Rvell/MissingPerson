<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=missing;charset=utf8;","root","");

if(isset($_POST['save'])){
    if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['pwd'])){
    $name=$_POST['nom'];
    $email=$_POST['mail'];
    $pass=$_POST['pwd'];
    $photo=$_FILES['photo']['name'];
    // $photoname=$photo;
    // echo $photo;
    $sql=$bdd->prepare('INSERT INTO user(nom, email, password, photo) VALUES (?,?,?,?)');
    $sql->execute(array($name,$email,$pass,$photo));
}else{
    echo "veillez remplir tout les champs";
}

if($sql->rowCount() >0){
    $_SESSION['nom']=$_POST['nom'];
    $_SESSION['id']=$sql->fetch()['id'];
    header("location: contact.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/bootstrap.min.css">
    <script src="vendor/jquery-3.7.1.js"></script>
    <script src="vendor/dataTables.js"></script>
    <script src="vendor/dataTables.bootstrap5.js"></script>
    <script src="vendor/jquery-ui.js"></script>
    <link rel="stylesheet" href="vendor/fontawesome.all.min.css">
    <script src="vendor/fontawesome.all.min.js"></script>
    <script src="vendor/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link id="pagestyle" href="assets/css/material-dashboard.css" rel="stylesheet" />
</head>
<body class="bg-dark">
    
            <div class="container">
                <div class="row">

     <div class=" text-center col-xl-12 mt-6">
        <div class="row">
        <div class="card card-plain mx-auto  bg-white col-sm-5 p-3">
            <div class="card-header  bg-dark">
                <h4 class="font-weight-bolder text-white">INSCRIPTION</h4>
                <p class="mb-0">Entrer vos informations personneles</p>
            </div>
            <div class="card-body mt-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" class="form-control" name="nom" placeholder="Nom">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="email" class="form-control" name="mail" placeholder="Email">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="password" class="form-control" name="pwd" placeholder="Mot de passe">
                    </div>
                
                    <div class="input-group input-group-outline mb-3">
                        <input type="file" class="form-control " name="photo"  >
                    </div>
                    <div class="text-center">
                        <button type="submit" name="save"
                            class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">S'inscrire</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-2 text-sm mx-auto">
                    j'ai deja un compte?
                    <a href="user_connect.php"
                        class="text-primary text-gradient font-weight-bold">Se connecter</a>
                </p>
            </div>
        </div>
    </div>
</div>
    </div>
            </div>


    
</body>
</html>