<?php require_once '.\include\connexionmysql.php'?>
<?php
$AfficheFormulaire = TRUE;

/*mail et motdepasse sont deux variables*/
if(!empty($_POST['mail']) AND !empty($_POST['motdepasse']))
{
    /* Cherche si l'utilisateur qui veut se connecter est bien dans la table utilisateur */
    $req = $db->prepare('SELECT * FROM utilisateur where mdpUtilisateur = :mdpUtilisateur AND mailUtilisateur = :mailUtilisateur');
    $req->bindValue(':mailUtilisateur', $_POST['mail'], PDO::PARAM_STR);
    $req->bindValue(':mdpUtilisateur', $_POST['motdepasse'], PDO::PARAM_STR);
    $req->execute();
    $userexist = $req->rowCount();

    if ($userexist == 0)
    {
        echo "Mail ou mot de passe invalide !";
    }
    else
    {
        session_start();
        $resultat = $req->fetch();
        $_SESSION['mail'] = $resultat['mailUtilisateur'];
        $_SESSION['motdepasse'] = $resultat['mdpUtilisateur'];
        $_SESSION['pseudo'] = $resultat['pseudoUtilisateur'];
        header("location: index.php");
    }
    $req->closeCursor();
}
?>