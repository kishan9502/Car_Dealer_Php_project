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
define('PAGE_HOME', 'Home.php');
define('PAGE_LOGIN', 'login.php');
define('PAGE_BUY', 'buy.php');
define('PAGE_ACCOUNT', 'account.php');
define('PAGE_PURCHASES', 'purchases.php');

##################   FOR CSS    ##################
define('FOLDER_CSS', 'CSS/');
define('FILE_CSS', FOLDER_CSS.'style.css');

//creating array of the cars by for advertise by declaring global variable
$advertisingParts = array(FILE_AD_CAR3,FILE_AD_CAR4,FILE_AD_CAR5,FILE_AD_CAR6,FILE_AD_CAR7);

//creating header and footer funtions without using echo
function createPageHeader($title)
{   #common HTML page Header
    
        displayNavigationMenu();
    ?><!DOCTYPE HTML>
            <html>
            <head>
                <meta charset="UTF-8">
                <title><?php echo $title; ?></title>
                <link rel="stylesheet" href="<?php echo FILE_CSS; ?>">
                <script type="text/javascript" src="javascript/ajax.js"></script>

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

function login_pass($uname, $pword)
    {
        $uid="";
        global $connection;
        try {
            $sqlQuery = "CALL customer_login(:uname);";
            

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':uname', $uname);

            $PDOStatement->execute();

            $row = $PDOStatement->fetch();
            if ($row != null) {
                $dbpass = $row["c_password"];
                $uid = $row["customer_uuid"];
                
            }
            else{
                return "Invalid ID";
            }
            $dp=password_hash($dbpass, PASSWORD_DEFAULT);
            if(password_verify($pword, $dp))
            {
                 $_SESSION['login']=true;
                 $_SESSION['User']=$uid;
                  header('location: Home.php');
                  return "";
            }
                else {
                return "Invalid Login OR Password";
            }
               
          
        } catch (PDOException $E) {
            echo $E->getMessage();
        }
    }
//function for logo
function displayLogo(){
    
    echo '<br><br><img id="logo" src = " '.PICTURE_CAR_LOGO.'">';
    echo "<h2 id='sc'>Sports Car</h2>";
}
//function for diplaying copyright
function displayCopyright(){
    
    echo '<br><br>';
    echo "<h3 id='copyright'> &copy; Kishan Thakkar-2013644 ".date("Y")."</h3>";
    
}
//function for creating navigation menu
function displayNavigationMenu(){
    
    echo '&nbsp<a href = " '.PAGE_HOME.'">HOME PAGE</a>';
    echo '&nbsp&nbsp&nbsp&nbsp&nbsp<a href = "'.PAGE_LOGIN.'">LOGIN PAGE</a>';
    echo '&nbsp&nbsp&nbsp&nbsp&nbsp<a href = "'.PAGE_BUY.'">BUY PAGE</a>';
    echo '&nbsp&nbsp&nbsp&nbsp&nbsp<a href = "'.PAGE_ACCOUNT.'">ACCOUNT PAGE</a>';
    echo '&nbsp&nbsp&nbsp&nbsp&nbsp<a href = "'.PAGE_PURCHASES.'">PURCHASES PAGE</a>';    
}

?>