<?php require_once '.\include\connexionmysql.php';
      if(isset($_POST['sinscrire']))
{
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $type = htmlspecialchars($_POST['type']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['motdepasse']);
    
    /*Si la personne a bien renseigné tous les champs, alors l'insertion dans la table peut s'fectuer*/
    if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['type']) AND !empty($_POST['mail']) AND !empty($_POST['motdepasse']))
    {
        $prenomLongueur = strlen($prenom);
        $nomLongueur = strlen($nom);
        $pseudoLongueur = strlen($pseudo);
        if ($prenomLongueur >= 3 AND $prenomLongueur <= 20)
        {
            if ($nomLongueur >=3 AND $nomLongueur <=40)
            {
                if ($pseudoLongueur >=3 AND $pseudoLongueur <= 30)
                {
        $insertion = $db->prepare("INSERT INTO utilisateur (nomUtilisateur, prenomutilisateur, typeUtilisateur, pseudoUtilisateur, mailUtilisateur, mdpUtilisateur) VALUES (?, ?, ?, ?, ?, ?);");
        $insertion->execute(array($nom, $prenom, $type, $pseudo, $mail, $mdp));
        $erreurInscription = "<font color=red>Vous êtes bien inscrit, vous allez être redirigé vers la page d'accueil</font>";
        session_start();
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['motdepasse'] = $_POST['motdepasse'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header("Refresh: 5; url=index.php");
                } else {$erreurInscription = "<font color=red>Votre pseudo n'est pas valide !</font>";}
            } else {$erreurInscription = "<font color=red>Votre nom n'est pas valide !</font>";}
        } else {$erreurInscription = "<font color=red>Votre prenom n'est pas valide !</font>";}
    }
}
?>
<html>
<head>
<meta charset=utf-8" />
<title>Photo For You</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>
<body>
<div id="container">
	<div id="header">
    	<h1><a href="index.php">Photo4You</a></h1>
        <h2>Des photos pros, pour les pros !</h2>
        <div class="clear"></div>
        <?php require_once('include/header.php');?>
        <form method="POST" action="">
            <h3>Inscription</h3>
            <br>
            <?php if(isset($erreurInscription)) {echo $erreurInscription;} ?>
            <br>
            <label>Prénom :</label>
            <input type="text" name="prenom"/>
                <br>
                </br>
            <label>Nom :</label>
            <input type="text" name="nom"/>
                <br>
                </br>
            <label>Pseudo :</label>
            <input type="text" name="pseudo"/>
                <br>
                </br>
            <label>Etes-vous client ou photographe ?</label>
                <br>
                </br>
            <div><input type="radio" name="type" value="Client" checked="checked"/><label for="Client">Client</label></div>
            <div><input type="radio" name="type" value="Photographe" checked="checked"/><label for="Photographe">Photographe</label></div>
                <br>
                </br>
            <label>Mail :</label>
            <input type="email" name="mail"/>
                <br>
                </br>
            <label>Mot de passe :</label>
            <input type="password" name="motdepasse"/>
                <br>
                </br>
            <input type="submit" name="sinscrire" value="Inscription"/>
        </form>
        </div>
</div>
</body>
</html>