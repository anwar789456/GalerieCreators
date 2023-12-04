<?php

class Utilisateur{
    public ?int $id_user=null;
    public string $nom;
    public string $prenom;
    public string $tel;
    public string $email;
    public string $role;
    /*-----------------------  constructor of "Utilisateur" ---------------------------*/
    public function __construct($id_use, $nom_user, $prenom_user, $tel_user, $email_user, $role_user){
        $this->id_user = $id_use;
        $this->nom = $nom_user;
        $this->prenom = $prenom_user;
        $this->tel = $tel_user;
        $this->email = $email_user;
        $this->role = $role_user;
    }
    public function getIdUser(){
        return $this->id_user;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }
    public function getpreNom(){
        return $this->prenom;
    }
    public function setpreNom($prenom){
        $this->prenom = $prenom;
        return $this;
    }

    public function getemail(){
        return $this->email;
    }
    public function setemail($new_email){
        $this->email = $new_email;
        return $this;
    }

    public function gettel(){
        return $this->tel;
    }
    public function settel($new_tel){
        $this->tel = $new_tel;
        return $this;
    }

    public function getrole(){
        return $this->role;
    }
    public function setrole($new_role){
        $this->role = $new_role;
        return $this;
    }
}
?>