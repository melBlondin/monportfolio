<?php

namespace App\Entities;

class Contact
{
   //Définition des attributs
   private $id_contact;
   private $nom;
   private $prenom;
   private $date_naissance; 
   private $adresse; 
   private $telephone; 
   private $mail;
   private $message;


   //get the value of id_contact

   public function getId_contact()
   {
        return $this->id_contact;
   }

    //set the value of id_contact

   public function setId_contact($id_contact)
   {
        $this->id_contact=$id_contact;
        return $this; //a voir pourquoi on met le return
   }

     //get the value of iprenom

     public function getPrenom()
     {
          return $this->prenom;
     }
  
      //set the value of prenom
  
     public function setPrenom($prenom)
     {
          $this->prenom=$prenom;
          return $this; //a voir pourquoi on met le return
     }


     // get value nom
    public function getNom()
    {
        return $this->nom;
    }

    // set value nom
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    //get value date_naissance
    public function getDate_naissance()
    {
        return $this->date_naissance;
    }

    //set value date_naissance
    public function setDate_naissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    // get value adresse
    public function getAdresse()
    {
        return $this->adresse;
    }

    // set value adresse
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
    $this->message = $message;

        return $this;
    }
}