<?php require_once '.\include\connexionmysql.php'?>
<?php
$AfficheFormulaire = TRUE;

/*mail et motdepasse sont deux variables*/
if(!empty($_POST['mail']) AND !empty($_POST['motdepasse']))
{
    $req = $db->prepare('SELECT COUNT(*) FROM utilisateur where mdpUtilisateur = :mdpUtilisateur AND mailUtilisateur = :mailUtilisateur');
    $req->bindValue(':mailUtilisateur', $_POST['mail'], PDO::PARAM_STR);
    $req->bindValue(':mdpUtilisateur', $_POST['motdepasse'], PDO::PARAM_STR);
    $req->execute();
    $resultat = $req->fetch();
    $req->closeCursor();
    if ($resultat[0] == 0)
    {
        echo "Mail ou mot de passe invalide !";
    }
    else
    {
        session_start();
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['motdepasse'] = $_POST['motdepasse'];
        header("location: index.php");
    }
}
?>