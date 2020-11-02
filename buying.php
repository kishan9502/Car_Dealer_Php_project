<?php

include 'PHP/PHPFUNCTIONS.php';

//declaring variables for the form
$ErrorData = "";
$Errorfn = "";
$Errorln="";
$Errorcity="";
$Errorcmt="";
$Errorprice="";
$Errorqn="";					
$Inputpro = "";
$Inputfn = "";
$Inputln="";
$Inputcity="";
$Inputcmt="";
$Inputprice="";
$Inputqn="";
$Arraysn=array();
$SendDetail=array();
$InputField = 0; 
$Detail_Final=array();

createPageHeader("Buying","");
//---------- Variables -----------------------------------

define('CHAR_SIZE',10);
						
//---------- Validation Of Details submited by the customer -----------------------------				
if(isset($_POST['submit'])){
    if((strlen(htmlspecialchars($_POST["inputproduct"]))>CHAR_SIZE+2)){
        $ErrorData= "<br>The product code contains more than 10 ";
        $Inputpro="";
        $Inputpro=null;
    }
    else if(strlen(htmlspecialchars($_POST["inputproduct"]))==0){

        $ErrorData= "<br>The product code cannot be empty ";
        $Inputpro="";
        $Inputpro=null;
        }
        elseif ((!preg_match("/^p/",($_POST["inputproduct"])))&& (!preg_match("/^P/",($_POST["inputproduct"])))) {
                $ErrorData= "<br>The product code should start with P or p ";
                $Inputpro="";
                  $Inputpro=null;
    }
    else{
        $Inputpro=($_POST["inputproduct"]);
    
    }
    if(strlen(htmlspecialchars($_POST["firstname"]))>CHAR_SIZE+10){
        $Errorfn= "<br>The first name contains more than 20 ";
        $Inputfn="";
        $Inputfn=null;
    }
    else if(strlen(htmlspecialchars($_POST["firstname"]))==0){
        $Errorfn= "<br>The first name cannot be empty ";
        $Inputfn="";
        $Inputfn=null;
        }
    else{
        $Inputfn=($_POST["firstname"]);

    }
    if(strlen(htmlspecialchars($_POST["lastname"]))>CHAR_SIZE+10){
        $Errorln= "<br>The last name contains more than 20 ";
        $Inputln="";
        $Inputln=null;
    }
    else if(strlen(htmlspecialchars($_POST["lastname"]))==0){
        $Errorln= "<br>The last name cannot be empty ";
        $Inputln="";
        $Inputln=null;
    }
    else{
        $Inputln=($_POST["lastname"]);

    }
    if(strlen(htmlspecialchars($_POST["city"]))>CHAR_SIZE-2){
        $Errorcity= "<br>The city contains more than 8 characters ";
        $Inputcity="";
        $Inputcity=null;
    }
    else if(strlen(htmlspecialchars($_POST["city"]))==0){
        $Errorcity= "<br>The city cannot be empty ";
      $Inputcity="";
        $Inputcity=null;
        }
    else{
        $Inputcity=($_POST["city"]);
  
    }
    
    if(strlen(htmlspecialchars($_POST["comments"]))>CHAR_SIZE*20){
        $Errorcmt= "<br>The comments contains more than 200 ";
        $Inputcmt="";
        $Inputcmt=null;
    }
    else if(strlen(htmlspecialchars($_POST["comments"]))==0){
        $Errorcmt= "<br>The comments cannot be empty ";
        $Inputcmt="";
        $Inputcmt=null;
        }
    else{
        $Inputcmt=($_POST["comments"]);

    }
    if((($_POST["price"])>0) && (($_POST["price"])<10000)){
        $Inputprice=($_POST["price"]);
   
    }
    else if(strlen(htmlspecialchars($_POST["price"]))==0){
        $Errorprice= "<br>The product price cannot be empty ";
        $Inputprice="";
        $Inputprice=null;
        }
    else{
               $Errorprice= "<br>The product price cannot be more than 10000 and cannot be less than 0 ";
        $Inputprice="";
        $Inputprice=null;  
 
    }
    if((($_POST["quantity"])>0) && (($_POST["quantity"])<99) && (!is_float($_POST["quantity"])) ){
          $Inputqn=($_POST["quantity"]);
  
    }
    else if(strlen(htmlspecialchars($_POST["quantity"]))==0){
        $Errorqn= "<br>The product quantity cannot be empty ";
        $Inputqn="";
        $Inputqn=null;
        }
    else{
              $Errorqn= "<br>The product quantity cannot be more than 99 and cannot be less than 0 ";
        $Inputqn="";
        $Inputqn=null;  

    }

    $SendDetail=Array("code"=>$Inputpro,"fname"=>$Inputfn,"lname"=>$Inputln,"city"=>$Inputcity,"comments"=>$Inputcmt,"price"=>$Inputprice,"quantity"=>$Inputqn);
  
       if(in_array(null,$SendDetail)){
           
           echo "No Data";
       }
       else{
           array_push($Arraysn,$SendDetail);
         
               $file=fopen("purchases.txt","r+");
               $current_data= file_get_contents('purchases.txt');
               $array_data= json_decode($current_data,true);
               $array_data[]=$Arraysn;
             
           
               file_put_contents('purchases.txt',json_encode($array_data));
            fclose($file);
           
       }
   

}
?>    
<br>  
<!-- Creating a form for sales report of the customer-->
<div>
    <form action="buying.php"  align="center" method="POST">
			
Product code: 
<input type="text" name='inputproduct' value="<?php echo $Inputpro;?>"  size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $ErrorData;?>
</font></strong>
   <br /><br />
   
Customer First name :
<input type='text' name='firstname' value="<?php echo $Inputfn; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $Errorfn;?></font></strong>
<br /><br />
Customer Last name :
<input type='text' name='lastname' value="<?php echo $Inputln; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $Errorln;?></font></strong>
<br /><br />
Customer City :
<input type='text' name='city' value="<?php echo $Inputcity; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $Errorcity;?></font></strong>
<br /><br />
Comments :
<input type='text' name='comments' value="<?php echo $Inputcmt; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $Errorcmt;?></font></strong>
<br /><br />
Price :
<input type='text' name='price' value="<?php echo $Inputprice; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $Errorprice;?></font></strong>
<br /><br />
Quantity :
<input type='text' name='quantity' value="<?php echo $Inputqn; ?>" size="12" style="font-size:13pt;font-weight:bold;"> 
<strong><font color=#CC0000>*<?php echo $Errorqn;?></font></strong>
<br /><br />


<!-- Assigning two buttons for the to either submit the details or clear the fields of the form-->
<input name='Clear' type='reset' value='Clear' style="font-size:16pt;font-weight:bold;float:center; color:black;" /> 	
<input  type="Submit" name="submit" value='Submit' style="font-size:16pt;font-weight:bold;float:center; color:black;" > 	
					


</form>
    <br>
    <br>
    <br>
    <br/>
    <br/>
</div>

<?php

createPageFooter();
?>