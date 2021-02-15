<?php

include 'PHP/PHPFUNCTIONS.php';
include 'object/customer.php';
include 'object/purchases.php';
include 'object/product.php';


session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

    $customer = new customer();
    $customer_uuid = $_SESSION['User'];
    $customer->load($customer_uuid);

 //    if (isset($_POST["searchQuery"])) { 
        echo"hello";
//        $searchDate = $_POST["searchQuery"];
        $puchases = new purchases($customer_uuid);

        echo"<table cellpadding='0' cellspacing='0' border='2'>";
        echo '<tr>';
        echo "<th>DELETE</th>";
        echo "<th>Product ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>City</th>";
        echo "<th>Comment</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>SubTotal</th>";
        echo "<th>Taxes</th>";
        echo "<th>Grand Total</th>";
        echo "</tr>";
        foreach ($puchases->items as $purchase) {
            echo "<tr>";
            $product = new product();
            $product->load($purchase->getProductuuid());

            echo '<td><button value="DELETE">DELETE</button></td>';
            echo"<td>" . $product->getProCode() . "</td>";
            echo"<td>" . $customer->getFname() . "</td>";
            echo"<td>" . $customer->getLname() . "</td>";
            echo"<td>" . $customer->getCity() . "</td>";
            echo"<td>" . $purchase->getComment() . "</td>";
            echo"<td>" . $product->getPrice() . "$</td>";
            echo"<td>" . $purchase->getQuantity() . "</td>";
            echo"<td>" . $purchase->getSubtotal() . "$</td>";
            echo"<td>" . $purchase->getTaxes() . "$</td>";
            echo"<td>" . $purchase->getGrandtotal() . "$</td>";
            echo"</tr>";
        }
        echo'</table>';
    }
//}
?>