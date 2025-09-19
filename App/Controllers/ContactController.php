<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\Form;
use App\Entities\Contact;


class ContactController extends Controller
{
    public function index(){

        $message="";

        // On vérifie la définition des champs
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['adresse']) && isset($_POST['telephone']) && isset($_POST['mail'])){
            // On vérifie que les champs ne sont pas vides
            if(Form::validatePost($_POST, ['prenom','nom', 'date_naissance', 'adresse', 'telephone', 'mail'])){
              
                // On instancie l'entité "contact"
                $contact= new Contact();
                    
                //On hydrate
                $contact->setNom($this->protected_values($_POST['nom'])); 
                $contact->setPrenom($this->protected_values($_POST['prenom'])); 
                $contact->setDate_naissance($this->protected_values($_POST['date_naissance'])); 
                $contact->setAdresse($this->protected_values($_POST['adresse'])); 
                $contact->setTelephone($this->protected_values($_POST['telephone'])); 
                $contact->setMail($this->protected_values($_POST['mail'])); 
                
                // si le champs "message" est rempli, on protège le champs de la faille XSS
                if(isset($_POST['message']) && $_POST['message']!=""){
                    $contact->setMessage(protected_values($_POST['message']));
                }

                //Si l'ajout se réalise correctement
                $message="<div class='alert alert-success' role='alert'>Votre demande de contact a bien été prise en compte!</div>";
                $this->render('contact/index',['message'=>$message]);
                //var_dump($contact);
            }else{

                // en cas de formulaire incorrectement rempli
                $message="<div class='alert alert-warning' role='alert'>Le formulaire n'a pas éte correctement rempli</div>";
                $this->render('contact/index',['message'=>$message]);

                }
        // Si les champs ne sont pas définis, on construit le formulaire de demande de contact        
        }else{
            // Nouvelle instance de formulaire
            $form = new Form();

            //On construit le formulaire d'ajout
            $form->startForm("#","POST",["enctype"=>"multipart/form-data"]);
            $form->addLabel("nom","Nom*",["class"=>"form-label"]);
            $form->addInput("text","nom",["id"=>"nom", "class"=>"form-control", "placeholder"=>""]);
            $form->addLabel("prenom","Prénom*",["class"=>"form-label"]);
            $form->addInput("prenom","prenom",["id"=>"prenom", "class"=>"form-control", "placeholder"=>""]);
            $form->addLabel("date_naissance","Date de naissance*",["class"=>"form-label"]);
            $form->addInput("date","date_naissance",["id"=>"date_naissance", "class"=>"form-control"]);
            $form->addLabel("adresse","Adresse*",["class"=>"form-label"]);
            $form->addInput("text","adresse",["id"=>"adresse", "class"=>"form-control mb-2"]);
            $form->addLabel("telephone","Téléphone*",["class"=>"form-label"]);
            $form->addInput("number","telephone",["id"=>"telephone", "class"=>"form-control mb-2"]);
            $form->addLabel("mail","Email*",["class"=>"form-label"]);
            $form->addInput("mail","mail",["id"=>"mail", "class"=>"form-control mb-2"]);
            $form->addLabel("message","Message",["class"=>"form-label"]);
            $form->addInput("message","message",["id"=>"message", "class"=>"form-control mb-2"]);
            $form->addInput("submit","add",["value"=>"Ajouter", "class"=>"mt-3 btn btn-primary"]);
            $form->addLabel("obligatoire","*Champs obligatoire",["class"=>" px-5 form-label"]);
            $form->endForm();

            //On renvoie le formulaire construit vers la vue contact
             $this->render('contact/index',["addForm"=> $form->getFormElements()]);

    }    }
}