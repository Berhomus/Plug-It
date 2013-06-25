<?php
 
function parseZCode($content) {
    // Parsage des balises
     
     
    // Rtours à la ligne
    $content = preg_replace('`\n`isU', '<br />', $content);
     
    return $content;
}
 
if (isset($_POST["string"])) {
    $content = $_POST["string"];
     

    echo parseZCode($content); // Ecriture du contenu parsé.
}
?>