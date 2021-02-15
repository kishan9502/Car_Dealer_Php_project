<?php
require_once 'data/database-connection.php';
include_once 'purchase.php';
include_once 'object/collection.php';

class purchases extends collection
{
    function __construct($customer_uuid)
    {
        global $connection;

        $sqlQuery = "CALL purchase_select(:p_customer_uuid)";
        $PDOStatement = $connection->prepare($sqlQuery);
        $PDOStatement->bindParam(':p_customer_uuid', $customer_uuid);

        $PDOStatement->execute();

        while ($row = $PDOStatement->fetch(PDO::FETCH_ASSOC)) {
            $purchases = new purchase(
                $row["purchase_uuid"],
                $row["product_uuid"],
                $row["quantity"],
                $row["comments"],
                $row["price"],
                $row["subtotal"],
                $row["taxes"],
                $row["grand_total"]
               
            );
            $this->add($row["purchase_uuid"], $purchases);
        }
    }
}