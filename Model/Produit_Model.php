<?php
class Produit{
    public ?int $id_produit = null;
    public string $nom_produit;
    public float $prix_produit;
   
    public ?string $img_produit = null;
    /*-----------------------  constructor of "Produit" ---------------------------*/
    public function __construct($id_pr, $nom_pr, $prix_pr, $img_pr){
        $this->id_produit = $id_pr;
        $this->nom_produit = $nom_pr;
        $this->prix_produit = $prix_pr;
        
        $this->img_produit = $img_pr;
    }
    public function getIdProduit(){
        return $this->id_produit;
    }
    public function getNomProduit(){
        return $this->nom_produit;
    }
    public function setNomProduit($new_name){
        $this->nom_produit = $new_name;
        return $this;
    }
    
    public function set_prix($new_prix){
        $this->prix_produit= $new_prix;
        return $this;
   }
   public function get_prix(){
       return $this->prix_produit;
   }
   public function set_img($new_img){
    $this->img_produit= $new_img;
    return $this;
    }
    public function get_img(){
    return $this->img_produit;
    }
}
?>