<?php

class purchase {

    private $product_uuid = "";
    private $customer_uuid = "";
    private $purchase_uuid = "";
    private $procode = "";
    private $fname = "";
    private $lname = "";
    private $quantity = 0;
    private $price = 0.0;
    private $subtotal = 0.0;
    private $taxes = 0.0;
    private $grandtotal = 0.0;
    private $comment = "";
    private $city = "";

    public function __construct(
            $purchase_uuid = "",
            $product_uuid = "",
            $quantity = "",
            $comment = "",
            $price = "",
            $subtotal = "",
            $taxes = "",
            $grand_total = ""
            
    ) {
        if ($purchase_uuid != "") {
            #fill all the object properties
            $this->purchase_uuid = $purchase_uuid;
            $this->product_uuid = $product_uuid;
            $this->quantity = $quantity;
            $this->comment = $comment;
            $this->price = $price;
            $this->subtotal = $subtotal;
            $this->taxes = $taxes;
            $this->grandtotal = $grand_total;
        }
    }

    function getFname() {
        return $this->fname;
    }

    function getLname() {
        return $this->lname;
    }

    function getCity() {
        return $this->city;
    }

    function getProCode() {
        return $this->procode;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getPrice() {
        return $this->price;
    }

    function getSubtotal() {
        return $this->subtotal;
    }

    function getTaxes() {
        return $this->taxes;
    }

    function getGrandtotal() {
        return $this->grandtotal;
    }

    function getComment() {
        return $this->comment;
    }

    function getProductuuid() {
        return $this->product_uuid;
    }

    function getpurchaseuuid() {
        return $this->purchase_uuid;
    }

    function getCustomeruuid() {
        return $this->customer_uuid;
    }

    function setProCode($procode) {
        $this->procode = $procode;
    }

    function setProductuuid($product_uuid) {
        $this->product_uuid = $product_uuid;
    }

    function setCustomeruuid($customer_uuid) {
        $this->customer_uuid = $customer_uuid;
    }

    function setQuantity($quantity) {
        $quantity = (int)$quantity;
        if (mb_strlen($quantity) == 0) {
            return "Product quantity could not be NULL or Empty";
        } else {
            $this->quantity = $quantity;
            return " ";
        }
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    function setTaxes($taxes) {
        $this->taxes = $taxes;
    }

    function setGrandtotal($grandtotal) {
        $this->grandtotal = $grandtotal;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    public function save() {
        try {
            global $connection;
            if ($this->purchase_uuid == "") {
                $sqlQuery = "CALL purchase_insert(:p_quantity, :p_comments, :p_price, :p_subtotal, :p_taxes,:p_customer_uuid,:p_grandtotal,:p_product_uuid)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':p_product_uuid',$this->product_uuid);
                $PDOStatement->bindParam(':p_customer_uuid',$this->customer_uuid);
                $PDOStatement->bindParam(':p_quantity', $this->quantity);
                $PDOStatement->bindParam(':p_comments', $this->comment);
                $PDOStatement->bindParam(':p_price', $this->price);
                $PDOStatement->bindParam(':p_taxes', $this->taxes);
                $PDOStatement->bindParam(':p_subtotal', $this->subtotal);
                $PDOStatement->bindParam(':p_grandtotal', $this->grandtotal);

                $PDOStatement->execute();
                return true;
            }
        } catch (Exception $error) {
            echo $error->getMessage();
            return false;
        }
    }

}
