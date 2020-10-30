<?php

// We can use the echo for reusing the header or else the other way is implemented down here
//function createPageHeader()
//{
//    echo "<!DOCTYPE HTML";
//    echo "<html>";
//    echo "<head>";
//    echo "<meta charset=\"UTF-8\">";
//    echo "<title></title>";
//    echo "</head>";
//    echo "<body>";
//}

################## FOR IMAGES #######################
define('FOLDER_IMAGES', 'images/');
define('PICTURE_CAR1', FOLDER_IMAGES."car-1.jpg");
define('PICTURE_CAR2', FOLDER_IMAGES."car-2.jpg");
define('PICTURE_CAR_LOGO', FOLDER_IMAGES."carlogo.png");
define('FILE_AD_CAR3', FOLDER_IMAGES.'car-3.jpg');
define('FILE_AD_CAR4', FOLDER_IMAGES.'car-4.jpg');
define('FILE_AD_CAR5', FOLDER_IMAGES.'car-5.jpg');
define('FILE_AD_CAR6', FOLDER_IMAGES.'car-6.jpg');
define('FILE_AD_CAR7', FOLDER_IMAGES.'car-7.jpg');

################## FOR PHP #######################
define('PAGE_INDEX', 'index.php');
define('PAGE_PICTURES', 'pictures.php');
define('PAGE_CONTACT', 'contact-us.php');

##################   FOR CSS    ##################
define('FOLDER_CSS', 'CSS/');
define('FILE_CSS', FOLDER_CSS.'style.css');

//creating array for the drinks by declaring global variable
$advertisingParts = array(FILE_AD_CAR3,FILE_AD_CAR4,FILE_AD_CAR5,FILE_AD_CAR6,FILE_AD_CAR7);

//creating header and footer funtions without using echo
function createPageHeader($title)
{   #common HTML page Header
    
        displayNavigationMenu();
    ?><!DOCTYPE HTML>
            <html>
            <head>
                <meta charset=\"UTF-8\">
                <title><?php echo $title; ?></title>
                <link rel="stylesheet" href="<?php echo FILE_CSS; ?>">
            </head>
            <body>
        
    <?php
        displayLogo();
}

function createPageFooter()
{   #common HTML page Footer
    ?>
            </body>
            </html>
    
    <?php
    displayCopyright();
}

function displayLogo(){
    
    echo '<br><br><img id="logo" src = " '.PICTURE_CAR_LOGO.'">';
    echo "Sports Car";
}

function displayCopyright(){
    
    echo '<br><br>';
    echo "<h3 id='copyright'> &copy; Kishan Thakkar ".date("Y")."</h3>";
    
}

function displayNavigationMenu(){
    
    echo '&nbsp<a href = " '.PAGE_INDEX.'">HOME PAGE</a>';
    echo '&nbsp<a href = "'.PAGE_PICTURES.'">BUYING PAGE</a>';
    echo '&nbsp<a href = "'.PAGE_CONTACT.'">ORDERS PAGE</a>';
    
}

?>