<?php
include "../../../Controller/UtilisateurC.php";
include "../../../Model/Utilisateur_Model.php";

if (isset($_POST["nom_utilisateur"]) && isset($_POST["prenom_utilisateur"])
    && isset($_POST["tel_utilisateur"]) && isset($_POST["email_utilisateur"])
    && isset($_POST["role_utilisateur"])){
    $nom_Utilisateur = $_POST["nom_utilisateur"];
    $prenom_Utilisateur = $_POST["prenom_utilisateur"];
    $tel_Utilisateur = $_POST["tel_utilisateur"];
    $email_Utilisateur = $_POST["email_utilisateur"];
    $role_Utilisateur = $_POST["role_utilisateur"];

    if (!empty($nom_Utilisateur)&&!empty($prenom_Utilisateur)&&!empty($tel_Utilisateur)&&!empty($email_Utilisateur)&&!empty($role_Utilisateur)){
        $user = new Utilisateur(null,$nom_Utilisateur,$prenom_Utilisateur,$tel_Utilisateur,$email_Utilisateur,$role_Utilisateur);
        var_dump($user);
        $userC = new UtilisateurC();
        $userC->addUtilisateur($user);
        header('Location:utilisateur.php');
    }
}?>