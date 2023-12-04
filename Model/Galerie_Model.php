<?php
class Galerie{
    public ?int $id_galerie = null;
    public string $nom_galerie;
    public string $propriete_galerie;
    public string $lieu_galerie;
    public ?string $img_galerie = null;

    /*-----------------------  constructor of "Galerie" ---------------------------*/
    public function __construct($id_gal, $nom_gal, $propriete_gal, $lieu_gal, $img_gal){
        $this->id_galerie = $id_gal;
        $this->nom_galerie = $nom_gal;
        $this->propriete_galerie = $propriete_gal;
        $this->lieu_galerie = $lieu_gal;
        $this->img_galerie = $img_gal;
    }
    public function getIdGalerie(){
        return $this->id_galerie;
    }
    public function getNomGalerie(){
        return $this->nom_galerie;
    }
    public function setNomGalerie($new_name){
        $this->nom_galerie = $new_name;
        return $this;
    }
    public function setProprieteGalerie($new_propriete){
         $this->propriete_galerie= $new_propriete;
         return $this;
    }
    public function GetProprieteGalerie(){
        return $this->propriete_galerie;
    }
    public function set_lieuGalerie($new_lieu){
        $this->lieu_galerie= $new_lieu;
        return $this;
   }
   public function get_lieuGalerie(){
       return $this->lieu_galerie;
   }
   public function set_imgGalerie($new_img){
        $this->img_galerie = $new_img;
        return $this;
    }
    public function get_imgGalerie(){
        return $this->img_galerie;
    }
}

class link_galerie{
    public ?int $id_link = null;
    public int $id_galerie;
    public string $link_galerie;

    public function __construct($id_lien, $id_gal, $link_gal){
        $this->id_link = $id_lien;
        $this->id_galerie = $id_gal;
        $this->link_galerie = $link_gal;
    }
    public function getIdLink(){
        return $this->id_link;
    }
    public function getIdGalerie(){
        return $this->id_galerie;
    }
    public function setIdGalerie($new_id_gal){
        $this->id_galerie = $new_id_gal;
        return $this;
    }
    public function getLinkGalerie(){
        return $this->link_galerie;
    }
    public function setLinkGalerie($new_link_gal){
        $this->link_galerie = $new_link_gal;
        return $this;
    }
}
?>