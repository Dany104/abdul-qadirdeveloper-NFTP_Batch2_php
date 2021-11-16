<?php

class InvoiceItem_Old{
    // access modifiers Private, Public
    private $name;
    private $price;
    private $quantity;

    // parameter less constructor = no parameter constructor
    
    function __construct($name, $price, $quantity){
        // Learnt: member in paramter list, is actually a requirement
        // echo "in constructor";
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }


    // accessors = getter, setter
    
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
}