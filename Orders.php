<?php
    
    include 'PHP/PHPFUNCTIONS.php';
   
    createPageHeader("Orders","");
    ?>
    <?php 
    //declaring the variables for calculating the tax on total amount of the product
    $tax=0.15;
    $subTotal=0.0;
    $taxAmount=0.0;
    //saving data in the text file via json code
    $retrieveData= file_get_contents("purchases.txt");
    $retrieveData = json_decode($retrieveData, true);


    //creating a table to show the details entered by the customer in a particular format
        echo "<table border='1'>";
        echo "<tr> <th> Product-Code </th>";
        echo "<th>Customer-First-name</th>";
        echo "<th>Customer-Last-name</th>";
        echo "<th>Customer-City</th>";
        echo "<th>Comments</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>Subtotal</th>";
         echo "<th>Taxes</th>";
         echo "<th>Grand-total</th>";
        foreach ($retrieveData as $retrieveDatas) {
            
            echo "<tr>";
            echo "<td>".$retrieveDatas[0]["code"]."</td>";
            echo "<td>".$retrieveDatas[0]["fname"]."</td>";
            echo "<td>".$retrieveDatas[0]["lname"]."</td>";
            echo "<td>".$retrieveDatas[0]["city"]."</td>";
             
            echo "<td>".$retrieveDatas[0]["comments"]."</td>";
            echo "<td>".$retrieveDatas[0]["price"]."</td>";
            echo "<td>".$retrieveDatas[0]["quantity"]."</td>";

            echo "<td>".$subTotal=$retrieveDatas[0]["price"]*$retrieveDatas[0]["quantity"]."</td>";
            echo "<td>".$taxAmount=$retrieveDatas[0]["price"]*$retrieveDatas[0]["quantity"]*($tax)."</td>";
            echo "<td>".(($retrieveDatas[0]["price"]*$retrieveDatas[0]["quantity"])+($retrieveDatas[0]["price"]*$retrieveDatas[0]["quantity"]*($tax)))."</td>";
            echo "</tr>";
        } 
       
		echo"</table>";	
    ?>    
    <?php
    createPageFooter();
    
   ?>