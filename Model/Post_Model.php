<?php

class Post{
    private ?int $id = null;
    private ?string $description;
    private ?string $id_Artiste;
    private ?string $titre;
    private ?string $source;
    private ?string $datePublication;
    private ?string $contenu;
    
    public function __construct($id,$titre,$contenu,$source,$datePublication,$nom,$prenom){
        $this->id = $id;
        $this->description = $titre;
        $this->id_Artiste = $contenu;
        $this->titre = $source;
        $this->source = $datePublication;
        $this->datePublication = $nom;
        $this->contenu = $prenom;
    }

    public function getId(){
        return $this->id;
    }

    public function getdescription(){
        return $this->description;
    }

    public function setdescription($new_description){
        $this->description = $new_description;
        return $this;
    }

    public function getidArtiste(){
        return $this->id_Artiste;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function setTitre($new_titre){
        $this->titre = $new_titre;
        return $this;
    }

    public function getSource(){
        return $this->source;
    }

    public function setSource($new_source){
        $this->source = $new_source;
        return $this;
    }

    public function getDatePublication(){
        return $this->datePublication;
    }

    public function setDatePublication($new_datePublication){
        $this->datePublication = $new_datePublication;
        return $this;
    }

    public function getContenu(){
        return $this->contenu;
    }

    public function setContenu($new_contenu){
        $this->contenu = $new_contenu;
        return $this;
    }
}

class Artiste{
    private ?int $id_Artiste = null;
    private ?string $nom_Artiste;
    private ?string $prenom_Artiste;
    private ?string $specialite_Artiste;
    private ?string $biographie_Artiste;

    public function __construct($id,$nom,$prenom, $specialite, $biographie){
        $this->id_Artiste = $id;
        $this->nom_Artiste = $nom;
        $this->prenom_Artiste = $prenom;
        $this->specialite_Artiste = $specialite;
        $this->biographie_Artiste = $biographie;
    }

    public function getId(){
        return $this->id_Artiste;
    }
    public function getNom(){
        return $this->nom_Artiste;
    }
    public function setNom($new_name){
        $this->nom_Artiste = $new_name;
        return $this;
    }
    public function getPrenom(){
        return $this->prenom_Artiste;
    }
    public function setPrenom($new_prenom){
        $this->prenom_Artiste = $new_prenom;
        return $this;
    }
    public function getSpecialite(){
        return $this->specialite_Artiste;
    }
    public function setSpecialite($new_specialite){
        $this->specialite_Artiste = $new_specialite;
        return $this;
    }
    public function getBiographie(){
        return $this->biographie_Artiste;
    }
    public function setBiographie($new_biographie){
        $this->biographie_Artiste = $new_biographie;
        return $this;
    }
}

?>

