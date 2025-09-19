# monportfolio
Ajout de la fonctionnalité "page contact" pour l'ECF4

Modifications apportées:
1- Dans un premier temps, j'ai aporté quelques modifications pour avoir une application fonctionnelle. Pour cela, j'ai remplacé dans la fichier Router.php, ligne 13 "home" par "Home" et dans le fichier HomeController.php j'ai fait appel à la classe Creation an ajoutant la ligne "use App\Entities\Creation;"
2- Pour ajouter la route supplémentaire vers la vue contact (App/Views/contact/index.php), il a fallut créer puis implémenter le fichier ContactController.php.
3 - Afin de créer la page contact, il était nécessaire de créer une entities "Contact" pour définir les attributs de la nouvelle classe "Contact" et pour mettre en place les getters et les setters pour ces attributs

La classe ContactController permet de recueillir les données du formulaires ou d'afficher le formulaire, si les données duu formulaire ne sont pas définies.
Pour cela, la classe fait appel à la classe Form et instancie un nouveau formulaire lorsque l'utilisateur arrive sur la page "contact" après avoir cliqué sur le lien "Contact" du menu de navigation (base.php).
Pour construire le formulaire, j'utilise les attributs et méthodes de la classe Form en choisissant les champs intéressant à avoir dans un formulaire de contact.
Lorsque l'utilisateur soumet son formulaire, les champs sont alors définis, ce qui nous permet de valider la définition des champs et de passer à la vérification que chaque champs obligatoire a été rempli, seul le champs "message" n'est pas obigatoire.
En cas de non remplissage d'un des champs obligatoires, un message d'alerte s'affiche pour informer l'utilisateur que le formulaire n'a pas été correctement rempli.
Si le formulaire est correctement rempli (champs obligatoire renseignés), la variable "contact" est hydratée par l'utilisation des setters et la fonction "protected_value()" est lancée pour formater les champs saisis par l'utilisateur (y compris le champs "message" s'il n'est pas vide) afin de protégr les données mais aussi pour se protéger des failles XSS
Les données formatées et donc, sécurisées, sont envoyées par la méthode POST et pourront être traitées via php-mailer par exemple.
A l'issue de la soumission du formulaire, si tous les champs obligatoires ont été remplis et au bon format pour la date d'anniversaire (type date) et le numéro (type number), un message apparaît pour la confirmation de la prise en compte de la demande

