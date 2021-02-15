<?php

class collection
{
    #declaration of items array.
    public $items = [];

    #function to take care of the list to ADD the data of the objects like products,customers,purchases
    public function add($primary_key, $item)
    {
        $this->items[$primary_key] = $item;
    }

    #fuction to take care of the list to Remove the data of the object products,customers,purchases
    public function remove($primary_key)
    {
        if (isset($this->items[$primary_key])) {
            unset($this->items[$primary_key]);
        }
    }
    
    #function to get the data for the user
    public function get($primary_key)
    {
        if (isset($this->items[$primary_key])) {
            return $this->items[$primary_key];
        }
    }
    
    #function to return the total number of records in the list
    public function count($primary_key)
    {
        return count($this->items);
    }
}