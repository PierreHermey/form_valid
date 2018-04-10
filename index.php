<?php

if(!empty($_POST)) {
    $errors = [];

    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    if(empty($name)){
        $errors['name'] = "Vous n'avez pas renseigné votre nom";
    }

    if(empty($firstname)){
        $errors['firstname'] = "Vous n'avez pas renseigné votre prénom";
    }

    if(empty($subject)){
        $errors['subject'] = "Vous n'avez pas renseigné le sujet de votre mail";
    }

    if(empty($message)){
        $errors['message'] = "Vous n'avez pas renseigné votre message";
    }

    if(empty($errors)) {
        //si le formulaire est validé
        $to = 'pierre.h@codeur.online';
        $headers ='From: <site@local.dev>'."\n";
        $headers .='Content-Type: text/html; charset="utf-8"'."\n";
        
        $msg .= 'Nom: '.$name;
        $msg .= ' Prénom: '.$firstname;
        $msg .= ' Message: '.$message;
        
        if(mail( 'pierre.h@codeur.online', $subject, $msg, $headers))
        {
            echo '<script language="javascript">
            alert("Le message a été envoyé");
            </script>'; 
        } else {
            echo '<script language="javascript">
            alert("Le message n\'a pas pu être envoyé");
            </script>';
        }	
            
    }
}




?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Aladin" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>

    <form method="POST" action="index.php">
    <h1>Formulaire de contact</h1>
        <fieldset>
            <label for="input_name">Nom</label>
            <p><?php if(isset($errors['name'])) echo $errors['name'];?></p>
            <input type="text" name="name" id="input_name" placeholder="Nom">
            

            <label for="input_firstname">Prénom</label>
            <p><?php if(isset($errors['firstname'])) echo $errors['firstname'];?></p>
            <input type="text" id="input-firstname" name="firstname" placeholder="Prénom">
            
        </fieldset>

        <fieldset>
            <label for="input_subject">Sujet</label>
            <p><?php if(isset($errors['subject'])) echo $errors['subject'];?></p>
            <input type="text" name="subject" if="input_subject" placeholder="Sujet">
            
        </fieldset>

        <fieldset>
            <label for="input_message">Message</label>
            <p><?php if(isset($errors['message'])) echo $errors['message'];?></p>
            <textarea id="input_message" name="message" placeholder="Votre message"></textarea>
            

            <button type="submit">Envoyer</button>

        

        </fieldset>
    </form>
</body>
</html>