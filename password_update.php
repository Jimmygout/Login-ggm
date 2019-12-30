<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=user_exemple;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT prenom,nom,pk_ggm_contact, pass FROM ggm_contact');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
    ?>

    <?php
    // récuperation de l'id
    $id = $donnees['pk_ggm_contact'];
    // 60 caractères
    $options = [
        'cost' => 12,
    ];
    // Si le pass est toujours en base64 alor on decode puis on encrypte en AEGON2ID
    if(strlen($donnees['pass']) < 50)
    {
        $new_password = password_hash(base64_decode($donnees['pass']), PASSWORD_ARGON2ID, $options);
        $update = $bdd->query("UPDATE ggm_contact SET pass = '$new_password' WHERE pk_ggm_contact = '$id'");
        echo $donnees['prenom'].' '.$donnees['nom'].' pass =' . $new_password; ?><br/>
        <?php
    }
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>

