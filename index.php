<!DOCTYPE html>
<html>
    <body>
<?php

    include 'PHP/PHPFunctions.php';
    
    

    createPageHeader('Home');     
    
    echo '<br><br><h1 id="wc">Welcome To This Sports car website.</h1>';
    echo "<br><br> I am very big fan of sports car.";
    echo "<br><br> I feel very alive when i drive sports car. That is The Reason Why I Have Started This Company.";
    
    shuffle($advertisingParts);
    #echo "<br><br>The selected Drink is : ".$advertisingDrinks[0];
    
    echo '<br><br><img class="advertising" src="'.$advertisingParts[0].'">';
    
############################################################
    
    
    
//    echo '<br><br><img src = "CAR3.jpg">';
//    echo '<br><br><img src = "CAR4.jpg">';
//    echo '<br><br><img src = "CAR5.jpg">';
    
    createPageFooter();

?>
    </body>
</html>>