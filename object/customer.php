<?php

define("FNAME_LENGTH", 20);
define("LNAME_LENGTH", 20);
define("UNAME_LENGTH", 12);
define("PWORD_LENGTH", 255);
define("ADDRESS_LENGTH", 25);
define("CITY_LENGTH", 8);
define("PROVINCE_LENGTH", 15);
define("PCODE_LENGTH", 7);



class customer
{
    private $customer_uuid = "";
    private $fname = "";
    private $lname = "";
    private $address = "";
    private $city = "";
    private $province = "";
    private $pcode = "";
    private $uname = "";
    private $pword = "";

    public function __construct(
        $customer_uuid = "",
        $fname = "",
        $lname = "",
        $address = "",
        $city = "",
        $province = "",
        $pcode = "",
        $uname = "",
        $pword = ""
    ) {
        if ($customer_uuid != "") {
            #will fill all the properties of object
            $this->uname($uname);
            $this->pword($pword);
            $this->fname($fname);
            $this->lname($lname);
            $this->address($address);
            $this->city($city);
            $this->province($province);
            $this->pcode($pcode);
        }
    }
    function getFname()
    {
        return $this->fname;
    }
    function getLname()
    {
        return $this->lname;
    }
    function getUname()
    {
        return $this->uname;
    }
        function getPword()
    {
        return $this->pword;
    }
    function getAddress()
    {
        return $this->address;
    }
    function getCity()
    {
        return $this->city;
    }
    function getProvince()
    {
        return $this->province;
    }
    function getPcode()
    {
        return $this->pcode;
    }


    function setFname($newFname)
    {
        if (mb_strlen($newFname) == 0) {
            return 'The fname cannot be empty';
        } else {
            if (mb_strlen($newFname) >= FNAME_LENGTH) {
                return 'The fname cannot contain more than ' .
                    FNAME_LENGTH .
                    ' characters ';
                //constant self
            } else {
                $this->fname = $newFname;
                return " ";
            }
        }
    }
    function setLname($newLname)
    {
        if (mb_strlen($newLname) == 0) {
            return 'The lasttname cannot be empty';
        } else {
            if (mb_strlen($newLname) >= LNAME_LENGTH) {
                return 'The lasttname cannot contain more than ' .
                    LNAME_LENGTH .
                    ' characters ';
            //constant self
            } else {
                $this->lname = $newLname;
                return " ";
            }
        }
    }
    function setUname($newUname)
    {
        if (mb_strlen($newUname) == 0) {
            return 'The Username cannot be empty';
        } else {
            if (mb_strlen($newUname) >= UNAME_LENGTH) {
                return 'The usename cannot contain more than ' .
                    UNAME_LENGTH .
                    ' characters ';
                //constant self
            } else {
                $this->uname = $newUname;
                return " ";
            }
        }
    }
    function setPword($newPword)
    {
        if (mb_strlen($newPword) == 0) {
            return 'The Password cannot be empty';
        } else {
            if (mb_strlen($newPword) >= LNAME_LENGTH) {
                return 'The Password cannot contain more than ' .
                    PWORD_LENGTH .
                    ' characters ';
                //constant self
            } else {
                $this->pword =$newPword;
                return " ";
            }
        }
    }
    function setAddress($newAddress)
    {
        if (mb_strlen($newAddress) == 0) {
            return 'The Address cannot be empty';
        } else {
            if (mb_strlen($newAddress) >= ADDRESS_LENGTH) {
                return 'The Address cannot contain more than ' .
                    ADDRESS_LENGTH .
                    ' characters ';
                //constant self
            } else {
                $this->address = $newAddress;
                return " ";
            }
        }
    }
    function setCity($newCity)
    {
        if (mb_strlen($newCity) == 0) {
            return 'The city cannot be empty';
        } else {
            if (mb_strlen($newCity) >= CITY_LENGTH) {
                return 'The city cannot contain more than ' .
                    CITY_LENGTH .
                    ' characters ';
                //constant self
            } else {
                $this->city = $newCity;
                return " ";
            }
        }
    }
    function setProvince($newProvince)
    {
        if (mb_strlen($newProvince) == 0) {
            return 'The province cannot be empty';
        } else {
            if (mb_strlen($newProvince) >= PROVINCE_LENGTH) {
                return 'The province cannot contain more than ' .
                    PROVINCE_LENGTH .
                    ' characters ';
                //constant self
            } else {
                $this->province = $newProvince;
                return " ";
            }
        }
    }
    function setPcode($newPcode)
    {
        if (mb_strlen($newPcode) == 0) {
            return 'The postal code cannot be empty';
        } else {
            if (mb_strlen($newPcode) >= PCODE_LENGTH) {
                return 'The postal code cannot contain more than ' .
                    PCODE_LENGTH .
                    ' characters ';
                //constant self
            } else {
                $this->pcode = $newPcode;
                return " ";
            }
        }
    }
    
    public function save()
    {
        try {
            global $connection;
            if ($this->customer_uuid == "") {
                $sqlQuery =
                    "CALL customer_insert(:p_fname, :p_lname, :p_address, :p_city, :p_province, :p_pcode, :p_uname, :p_pword)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':p_fname', $this->fname);
                $PDOStatement->bindParam(':p_lname', $this->lname);
                $PDOStatement->bindParam(':p_address', $this->address);
                $PDOStatement->bindParam(':p_city', $this->city);
                $PDOStatement->bindParam(':p_pcode', $this->pcode);
                $PDOStatement->bindParam(':p_uname', $this->uname);
                $PDOStatement->bindParam(':p_pword', $this->pword);
                $PDOStatement->bindParam(':p_province', $this->province);

                $PDOStatement->execute();
                return 'Login Successful';
            }
        } catch (Exception $error) {
            echo $error->getMessage();
            return 'Login Failed';
        }
    }
        public function update($customer_uuid)
    {
        try {
            global $connection;
            if ($this->customer_uuid == "") {
                $sqlQuery ="CALL customer_update(:p_fname, :p_lname, :p_address, :p_city, :p_province, :p_pcode, :customer_uuid, :p_uname, :p_pword)";

                $PDOStatement = $connection->prepare($sqlQuery);

                $PDOStatement->bindParam(':p_fname', $this->fname);
                $PDOStatement->bindParam(':p_lname', $this->lname);
                $PDOStatement->bindParam(':p_address', $this->address);
                $PDOStatement->bindParam(':p_city', $this->city);
                $PDOStatement->bindParam(':p_pcode', $this->pcode);
                $PDOStatement->bindParam(':p_uname', $this->uname);
                $PDOStatement->bindParam(':p_pword', $this->pword);
                $PDOStatement->bindParam(':p_province', $this->province);
                $PDOStatement->bindParam(':customer_uuid', $customer_uuid);

                $PDOStatement->execute();
//                echo $_SESSION['User'];
                return 'Update Successful';
            }
        } catch (Exception $error) {
            echo $error->getMessage();
            return 'Update Failed';
        }
    }

    public function load($customer_uuid)
    {
        try {
            global $connection;

            $sqlQuery = "CALL customer_load(:customer_uuid);";

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':customer_uuid', $customer_uuid);

            $PDOStatement->execute();

            if ($row = $PDOStatement->fetch()) {
                $this->customer_uuid = $row['customer_uuid'];
                $this->fname = $row['firstname'];
                $this->lname = $row['lastname'];
                $this->address = $row['address'];
                $this->city = $row['city'];
                $this->province = $row['province'];
                $this->pcode = $row['postalcode'];

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

            $sqlQuery = "CALL customer_delete(:customer_uuid)";

            $PDOStatement = $connection->prepare($sqlQuery);

            $PDOStatement->bindParam(':customer_uuid', $this->customer_uuid);

            $affectRows = $PDOStatement->execute();

            return $affectRows;
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
?>