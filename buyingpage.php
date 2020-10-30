<?php
    
    include 'PHP/PHPFunctions.php';

    createPageHeader('Pictures');
    
    echo "<br>Have A Look At Some Amazing Racing Sport Car images";
    
    $cars = array('car-1', 'car-2', 'car-3', 'car-4', 'car-5', 'car-6');

    echo "<ol>";
    
    #create a FOR loop to display all the Items
    for($index = 0; $index < count($cars); $index++)
    {
        echo "<li>".$cars[$index]."</li>";
    }
    echo "<ol>";
    
    #<img src = " ' .FOLDER_IMAGES . PICTURE_CAR2. ' ">;
    #echo '<br><br><img src="./images/CAR2.jpg" alt="myPic" />';
    echo '<br><br><img src = " '.PICTURE_CAR2.' ">';
    
    #echo '<br><br><img src = " '.PICTURE_CHICKEN.' ">';
    echo '<br><br><img src="./images/car-1.jpg" alt="myPic" />';

    
    createPageFooter();

?>