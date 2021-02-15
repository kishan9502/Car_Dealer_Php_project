<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

  
include 'PHP/PHPFUNCTIONS.php';
include 'object/products.php';
include 'object/customer.php';
include 'object/purchase.php';
 createPageHeader("Purchases Page", "change");
    $uid = $_SESSION['User'];
//displayLogo();
//displayNavigationMenu(); 

?>
    <!--dynamic label-->
    <form>
        <table>
            <tr>
                <td><label><b>Show Purchases Made<br>on this date or later:</b></label></td>
                 <td><input type="number" class="inputForm" placeholder="2020-12-14" name="quantity" /></td>
             
            </tr>

        </table>

        <input type="button" onclick="searchCustomer()"  class="btn btnSave" value="Search" name="search" style="align:center;margin-left:200px;color:green;"/>
    
    </form>
    <div id="searchResult"></div>   


<?php
    createPageFooter();
}
else{
        header('location: login.php');
}
?>