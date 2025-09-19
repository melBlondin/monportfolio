<?php $title = "Ajout de Contact" ?>

<div class="alert alert-success" role="alert">
<?php if(!empty($message)){
    echo $message ;}
?>
</div>

<?php
    if(isset($addForm)){
        echo $addForm;
    }
?>