<?php
class Commande{
    public ?int $id_commande = null;
    public string $nom_client;
    public string $produit_commande;
    public string $quantite_commande;
    public string $date_commande;
    /*-----------------------  constructor of "Evenement" ---------------------------*/
    public function __construct($id_commande, $nom_client, $produit_commande,$quantite_commande, $Date_commande){
        $this->id_commande = $id_commande;
        $this->nom_client = $nom_client;
        $this->quantite_commande = $quantite_commande;
        $this->produit_commande = $produit_commande;
        $this->date_commande = $Date_commande;
    }
    public function getIdCommande(){
        return $this->id_commande;
    }
    public function getNomCommande(){
        return $this->nom_client;
    }
    public function setNomCommande($new_name){
        $this->nom_client = $new_name;
        return $this;
    }
    public function setDate_commande($new_date_commande){
         $this->date_commande = $new_date_commande;
         return $this;
    }
    public function getDate_commande(){
        return $this->date_commande;
    }
    public function set_quantite($new_quantite){
        $this->quantite_commande= $new_quantite;
        return $this;
   }
   public function get_quantite(){
       return $this->quantite_commande;
   }
   public function set_produit($new_prod){
    $this->produit_commande= $new_prod;
    return $this;
    }
    public function get_produit(){
    return $this->produit_commande;
    }
}
?>