<!DOCTYPE html>
<html>
    <body>
<?php

    include 'PHP/PHPFunctions.php';
    
    

    createPageHeader('Home');     
    //adding some lines about the company
    echo '<br><br><h3 id="wc">Welcome To This Sports car website.</h3>';
    echo "<br><br> I am very big fan of sports car.";
    echo "<br><br> I feel very alive when i drive sports car. That is The Reason Why I Have Started This Company.";
    //advertisement 
    shuffle($advertisingParts);
   
//    echo '<a href="https://www.newegg.ca/"><img src="./images/car-3.jpg"></a>';    
    echo '<br><br><a href="https://www.newegg.ca/"> <img class="advertising" src="'.$advertisingParts[0].'"></a>';

    
############################################################
    
    
    
    createPageFooter();

?>
    </body>
</html>>