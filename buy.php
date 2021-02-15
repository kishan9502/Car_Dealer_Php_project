<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

    include 'PHP/PHPFUNCTIONS.php';
    include 'object/products.php';
    include 'object/customer.php';
    include 'object/purchase.php';
    define('RATE', 0.157);
    $uid = "";

    createPageHeader("Buy Page", "change");
    $uid = $_SESSION['User'];
//    displayLogo();
//    displayNavigationMenu();

    $purchase = new purchase();
    $product= new product();

   
    $quantityno = 0;
    $quantityerr = "";
    $ProductErrorMessage = "";
    $price = 0.0;
    $subTotal = 0.0;
    $taxesAmount = 0.0;
    $subtotalErrorMessage = "";
    $taxesErrorMessage = "";
    $grandtotalErrorMessage = "";
    $product_cd = "";

    if (isset($_POST["submit"])) {
        $product_code = htmlspecialchars($_POST['dropprod']);
        $quantityno = (int) $_POST['quantity'];
        
        $quantityerr = $purchase->setQuantity($quantityno);

        if ($quantityerr == " ") {

            $product->load($product_code);
            $product_cd = $product->getProCode();

            $price = $product->getPrice();

            $subTotal = $quantityno * $price;

            $taxesAmount = $subTotal * RATE;
            $grandTotal = $subTotal + $taxesAmount;

            $purchase->setProductuuid($product_code);
            $purchase->setCustomeruuid($_SESSION['User']);
            $purchase->setPrice($price);
            $purchase->setTaxes($taxesAmount);
            $purchase->setSubtotal($subTotal);
            $purchase->setGrandtotal($grandTotal);
            $redirect = $purchase->save();
            if ($redirect == true) {
                    header('location: purchases.php');
            }
        }
    }
    ?>

    <!--dynamic label-->
    <form action="buy.php" method="POST">
        <table>
            <?php
            $products = new products();
 

            echo '<tr>';
            echo '<td> <label><b>Product Code:</b></label></td>';
          echo '<td> <select name="dropprod">';

            foreach ($products->items as $productc) {
                echo "<option value='" . $productc->getProduct_uuid() ."'>" .$productc->getProCode() ." - " .$productc->getDescription() . "</option>";
            }
         echo "</select><span style='color:red;'>*</span></td>";
            echo "<td></td> ";

            echo '</tr>';
            ?>

            <tr>
                <td> <label for="comment"><b>Comment:</b></label></td>
                <td><input  type="text" class="inputForm" name="comment" placeholder="Comment" value="<?php echo isset(
                    $_POST["comment"]
                )
                    ? $_POST["comment"]
                    : ''; ?>" /></td>
            </tr>
            <tr>
                <td><label for="quantity"><b>Quantity:</b></label></td>
                <td><input  type="text" class="inputForm" name="quantity" placeholder="quantity" value="<?php echo isset(
                    $_POST["quantity"]
                )
                    ? $_POST["quantity"]
                    : ''; ?>" /></td>
                <td><span style="color:red;"><?php echo $quantityerr; ?>*</span></td>
            </tr>

        </table>

        <input type="submit"  class="btn btnSave" value="BUY" name="submit"/>
        <input type="reset"  class="btn btnCancel" value="CLEAR DATA"/>

    </form>

<?php createPageFooter();
} else {
    header('location: login.php');
}
?>