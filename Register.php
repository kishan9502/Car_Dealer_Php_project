<?php


    include 'PHP/PHPFUNCTIONS.php';
    include 'object/products.php';
    include 'object/customer.php';
    include 'object/purchase.php';
createPageHeader("Register The Acoount","");
displayLogo();
displayNavigationMenu();

$fnameerr = "";
$lnameerr = "";
$cityerr = "";
$provinceerr = "";
$usernameerr = "";
$passworderr = "";
$postalCodeerr="";
$addresserr="";

$fname = "";
$lname = "";
$city = "";
$province = "";
$username = "";
$password = "";
$postalCode="";
$address="";
$Signup="";
#post method calling
if (isset($_POST['submit'])){
    
       $customer= new customer();
    
    $fnameerr = $customer->setFname(htmlspecialchars($_POST["fname"]));
    $usernameerr=$customer->setUname(htmlspecialchars($_POST["username"]));
    $lnameerr= $customer->setLname(htmlspecialchars($_POST["lname"]));
    $passworderr= $customer->setPword(htmlspecialchars($_POST["password"]));
    $cityerr= $customer->setCity(htmlspecialchars($_POST["city"]));
    $addresserr = $customer->setAddress(htmlspecialchars($_POST["address"]));
    $provinceerr= $customer->setProvince(htmlspecialchars($_POST["province"]));
    $postalCodeerr = $customer->setPcode(htmlspecialchars($_POST["postalcode"]));
    
    if ( $fnameerr == " " && $lnameerr == " " && $addresserr == " " && $cityerr == " " && $provinceerr == " " && $postalCodeerr == " " && $usernameerr == " " && $passworderr == " ") {
        $customer->save();
    }
    
}
    
 
?>    
<br>  

     <div>
<form method="POST">	
<br>
<table>

    <tr>
    <td>First name :</td>
    <td><input type='text' name='fname' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $fnameerr; ?></font></strong></td>
    </tr>

    <tr>
    <td>Last name :</td>
    <td><input type='text' name='lname' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $lnameerr; ?></font></strong></td>
    </tr>

    <tr>
    <td>Address : </td>
    <td><input type="text" name='address' value=""  size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $addresserr; ?> </font></strong></td>
    </tr>
    
    <tr>
    <td>City :</td>
    <td><input type='text' name='city' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $cityerr; ?></font></strong></td>
   </tr>

   <tr>
        <td>Province : </td>
    <td><input type="text" name='province' value=""  size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $provinceerr; ?> </font></strong></td>
    </tr>
   
   <tr>
        <td>Postal code : </td>
    <td><input type="text" name='postalcode' value=""  size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $postalCodeerr; ?> </font></strong></td>
    </tr>
   
    <tr>
   <td> Username :</td>
    <td><input type='text' name='username' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $usernameerr; ?></font></strong></td>
   </tr>

   
   <tr>
   <td> Password :</td>
    <td><input type='password' name='password' value="" size="12" style="font-size:13pt;font-weight:bold;"> </td>
    <td><strong><font color=#CC0000>*<?php echo $passworderr; ?></font></strong></td>
   </tr>
<tr>
<td><input  type="submit" name="submit" value='Register' style="font-size:14pt;font-weight:italic;float:center; color:green;" > </td>	

<td><input  type="reset" name="Reset" value='Reset' style="font-size:14pt;font-weight:italic;float:center; color:green;" > </td>
</tr>		
  <strong><font color=#CC0000>*<?php echo $Signup; ?></font></strong>
</table>
    </form> 
</div>

  <a href="cheat_sheet.txt" download>Here You can Download the cheat sheet File</a>

<?php
createPageFooter();

?>