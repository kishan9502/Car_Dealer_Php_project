<?php

define("PROCODE_LENGTH", 12);
define("DESCRIPTION_LENGTH", 100);

class product
{
    private $product_uuid = "";
    private $customer_uuid = "";
    private $procode = "";
    private $description = "";
    private $price = 0.0;
    private $cost = 0.0;


    public function __construct(
        $product_uuid = "",
        $procode = "",
        $description = "",
        $price = 0.0,
        $customer_uuid = ""
    ) {
        if ($product_uuid != "") {
            $this->product_uuid = $product_uuid;
            $this->customer_uuid = $customer_uuid;
            $this->procode = $procode;
            $this->description = $description;
            $this->price = $price;

        }
    }

    function getProduct_uuid()
    {
        return $this->product_uuid;
    }

    function getProCode()
    {
        return $this->procode;
    }

    function getDescription()
    {
        return $this->description;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getCost()
    {
        return $this->cost;
    }
    function getCustomer_uuid()
    {
        return $this->$customer_uuid;
    }

    #setter method for product description and Validation of it
    function setDescription($newDescription)
    {
        if (mb_strlen($newDescription) > DESCRIPTION_MAX_LENGTH) {
            return 'The firstname cannot conatin more than ' .
                DESCRIPTION_LENGTH .
                ' characters ';
        } else {
            $this->description = $newDescription;
            return "";
        }
    }
    
     #setter method for product code and validation of it
    function setProCode($newprocode)
    {
        if (mb_strlen($newprocode) == 0) {
            return "Product Code could not be NULL or Empty";
        } elseif (mb_strlen($newprocode) > PROCODE_LENGTH) {
            return 'The lasttname cannot contain more than ' .
                PRODUCTCODE_MAX_LENGTH .
                ' characters ';
        } else {
            if (strpos(strtolower($newprocode), "p") !== 0) {
                return "Product code must start with P ";
            } else {
                $this->procode($newprocode);
                return "";
            }
        }
    }

    function setProduct_uuid($product_uuid)
    {
        $this->product_uuid = $product_uuid;
    }

    public function save()
    {
        try {
            global $connection;

            if ($this->person_uuid == "") {
                $sqlQuery =
                    "CALL product_insert(:product_code, :description, :price, :cost,:customer_uuid)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':product_code', $this->procode);
                $PDOStatement->bindParam(':description', $this->description);
                $PDOStatement->bindParam(':price', $this->price);
                $PDOStatement->bindParam(':cost', $this->cost);
                $PDOStatement->bindParam(
                    ':customer_uuid',
                    $this->customer_uuid
                );

                $PDOStatement->execute();

                return true;
            } else {
                $sqlQuery =
                    "CALL product_update(:product_uuid,product_code, :description, :price)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':product_code', $this->procode);
                $PDOStatement->bindParam(':description', $this->description);
                $PDOStatement->bindParam(':price', $this->price);
                $PDOStatement->bindParam(':product_uuid', $this->product_uuid);

                $PDOStatement->execute();

                return true;
            }
        } catch (Exception $error) {
            $error->getMessage();
        }
    }

 public function load($product_uuid)
    {
        try {
            global $connection;

            $sqlQuery = "CALL product_load(:product_uuid)";

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':product_uuid', $product_uuid);

            $PDOStatement->execute();

            if ($row = $PDOStatement->fetch(PDO::FETCH_ASSOC)) {
                $this->person_uuid = $row['product_uuid'];
                $this->procode = $row['product_code'];
                $this->description = $row['description'];
                $this->price = $row['price'];

                return true;
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
    
    public function delete()
    {
        try {
            global $connection;

            $sqlQuery = "CALL product_delete(:product_uuid)";

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':product_uuid', $this->product_uuid);

            $affectedRows = $PDOStatement->execute();

            return $affectedRows;
        } catch (Exception $error) {
            $error->getMessage();
        }
    }
}