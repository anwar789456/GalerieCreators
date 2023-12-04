<?php
class Evenement{
    public ?int $id_event = null;
    public string $nom_event;
    public string $date_event;
    public string $lieu_event;
    public ?string $img_event = null;
    /*-----------------------  constructor of "Evenement" ---------------------------*/
    public function __construct($id_ev, $nom_ev, $Date_ev, $lieu_ev,$img_ev){
        $this->id_event = $id_ev;
        $this->nom_event = $nom_ev;
        $this->date_event = $Date_ev;
        $this->lieu_event = $lieu_ev;
        $this->img_event = $img_ev;
    }
    public function getIdEvenement(){
        return $this->id_event;
    }
    public function getNomEvent(){
        return $this->nom_event;
    }
    public function setNomEvent($new_name){
        $this->nom_event = $new_name;
        return $this;
    }
    public function setDateEvenement($new_date_evenement){
         $this->date_event = $new_date_evenement;
         return $this;
    }
    public function getDate_evenement(){
        return $this->date_event;
    }
    public function set_lieu($new_lieu){
        $this->lieu_event= $new_lieu;
        return $this;
   }
   public function get_lieu(){
       return $this->lieu_event;
   }
   public function set_img($new_img){
    $this->img_event= $new_img;
    return $this;
    }
    public function get_img(){
    return $this->img_event;
    }
}
?>