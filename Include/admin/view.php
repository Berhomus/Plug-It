<!--********************************************************
Made by : AS Amiens - Bovin Antoine/Bensaid Borhane/Villain Benoit
Last Update : 26/06/2013
Name : view.php => Plug-it
*********************************************************-->

<?php
 
if (isset($_POST["string"])) {
    $content = $_POST["string"];

    echo nl2br($content); // Ecriture du contenu parsé.
}
?>