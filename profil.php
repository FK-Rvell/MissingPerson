<?php
   session_start();
   $bdd=new PDO("mysql:host=localhost;dbname=missing;charset=utf8;","root","");
 
   if(!$_SESSION['nom'] AND !$_SESSION['password']){
       header('Location: user_connect.php');
   }

  
    
else{
    echo "aucun utilisateur trouver";
}


$userId = $_SESSION['id']; 
$stmt = $bdd->prepare("SELECT * FROM user WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if (!$user) {
    echo "Utilisateur non trouvé.";
    exit;
}

if (isset($_POST['modifier'])) {
    
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $chemin='img/';
    $photo =$chemin.$_FILES['photo']['name']; 
    $stmt = $bdd->prepare("UPDATE user SET nom = ?, email = ?, password = ?, photo = ? WHERE id = ?");
    $stmt->execute([$nom, $email, $pwd, $photo, $userId]);
    $stmt = $bdd->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
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
  <div class="container-fluid row mt-5 mb-4 d-flex">
      <div class="text-center col-6">
        <h2 class="text-center pagetitle">Mon Profil</h2>
        <img src="<?php echo ($user['photo']); ?>" alt="Photo de Profil" class="profile-img " style="width: 40%; border-radius: 50%;">
    </div>
   
    <div class="text-center mt-3 col-6">
    <h3><?php echo  htmlspecialchars($user['nom'] ?? 'Nom non défini'); ?></h3>
    <p>Email: <?php echo htmlspecialchars($user['email'] ?? 'Email non défini'); ?></p>
    <p>Téléphone: <?php echo htmlspecialchars($user['phone'] ?? 'Téléphone non défini'); ?></p>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modifierModal">Modifier le profil</button>
    <a href="logout.php" onclick="return confirm('voulez vous vraiment vous deconnecter')"><button class='btn btn-danger'>Se deconnecter</button></a>
</div>


    <!-- Modal pour modifier le profil -->
    <!-- Modal pour modifier le profil -->
<div class="modal" id="modifierModal" style="width: 100%;" tabindex="-1" aria-labelledby="modifierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifierModalLabel">Modifier le Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <!-- <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="</?php echo htmlspecialchars($user['prenom'] ?? ''); ?>" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">password</label>
                        <input type="tel" class="form-control" id="telephone" name="pwd" value="<?php echo htmlspecialchars($user['password'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo de Profil</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                  
                    <div class="text-center">
                        <button type="submit" name="modifier" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
    
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