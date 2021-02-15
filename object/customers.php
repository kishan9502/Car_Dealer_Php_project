<?php
require_once 'data/database-connection.php';
include_once 'customer.php';
require_once 'object/collection.php';

class customers extends collection
{
    function __construct($customer_uuid)
    {
        global $connection;

        $sqlQuery = "CALL customer_search(:p_customer_uuid)";
        $PDOStatement = $connection->prepare($sqlQuery);
        $PDOStatement->bindParam(':p_customer_uuid', $customer_uuid);

        $PDOStatement->execute();

        while ($row = $PDOStatement->fetch(PDO::FETCH_ASSOC)) {
            $customers = new purchase(
                $row["customer_uuid"],
                $row["product__uuid"],
                $row["quantity"],
                $row["comments"],
                $row["price"],
                $row["subtotal"],
                $row["taxes"],
                $row["grand_total"],
                $row["firstname"],
                $row["lastname"],
                $row["city"]
            );
            $this->add($row["customer_uuid"], $customers);
        }
    }
}