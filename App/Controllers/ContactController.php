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
            if(Form::validatePost($_POST, ['prenom','nom', 'date_naissance', 'adresse', 'telephone', 'mail'])){
              
                // On instancie l'entité "lecteur"
                $contact= new Contact();
                    
                //On hydrate
                $contact->setNom(protected_values($_POST['nom'])); 
                $contact->setPrenom(protected_values($_POST['prenom'])); 
                $contact->setDate_naissance(protected_values($_POST['date_naissance'])); 
                $contact->setAdresse(protected_values($_POST['adresse'])); 
                $contact->setTelephone(protected_values($_POST['telephone'])); 
                $contact->setMail(protected_values($_POST['mail'])); 

                if(isset($_POST['nom']) && $_POST['nom']!=""){
                    $contact->setMessage(protected_values($_POST['message']));
                }

                $message="L'ajout du contact s'est correctement réalisé!";
                $this->render('contact/index',['message'=>$message]);
                var_dump($contact);
            }
        }else{
            $form = new Form();

            //On construit le formulaire d'ajout
            $form->startForm("#","POST",["enctype"=>"multipart/form-data"]);
            $form->addLabel("nom","Nom",["class"=>"form-label"]);
            $form->addInput("text","nom",["id"=>"nom", "class"=>"form-control", "placeholder"=>""]);
            $form->addLabel("prenom","Prénom",["class"=>"form-label"]);
            $form->addInput("prenom","prenom",["id"=>"prenom", "class"=>"form-control", "placeholder"=>""]);
            $form->addLabel("date_naissance","Date de naissance",["class"=>"form-label"]);
            $form->addInput("date","date_naissance",["id"=>"date_naissance", "class"=>"form-control"]);
            $form->addLabel("adresse","Adresse",["class"=>"form-label"]);
            $form->addInput("text","adresse",["id"=>"adresse", "class"=>"form-control mb-2"]);
            $form->addLabel("telephone","Téléphone",["class"=>"form-label"]);
            $form->addInput("number","telephone",["id"=>"telephone", "class"=>"form-control mb-2"]);
            $form->addLabel("mail","Email",["class"=>"form-label"]);
            $form->addInput("mail","mail",["id"=>"mail", "class"=>"form-control mb-2"]);
            $form->addLabel("message","Message",["class"=>"form-label"]);
            $form->addInput("message","message",["id"=>"message", "class"=>"form-control mb-2"]);
            $form->addInput("submit","add",["value"=>"Ajouter", "class"=>"mt-3 btn btn-primary"]);
            $form->endForm();

             $this->render('inscription/index',["addForm"=> $form->getFormElements()]);

    }    }
}