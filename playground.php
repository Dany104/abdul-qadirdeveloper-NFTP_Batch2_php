<?php

// array index starts from 0
  //  $x = "abc";
  $a = ["a","b","c","d","e","f","g","h","i","j"];
   echo $a[0];
    echo $a[0];
    echo $a[1];
    echo $a[2];

    for($i=0;$i<count($a);$i++){
        echo $a[$i];
        //echo "<br>";
    }


    // table of 2
    for($i=0;$i<10;$i++) {
        echo "2 x ";
        echo $i+1;//9
        echo " = ";
        echo ($i +1)*2;
        echo "<br>";
    }

        // $usb = new InvoiceItem();  // create an instance of class InvoiceItem and assigned it to object usb
    // // echo "after constructor";
    // $usb->setName("Seget 3.0 128 GB");
    // // $usb->name = "";
    // $usb->setPrice(23.45);
    // // $usb->price = 3.0;
    // $usb->setQuantity(2);
    // // $usb->quantity = 2;

    // $usb = new InvoiceItem("Seget 3.0 128 GB", 23.45, 2); // create an instance of class InvoiceItem and
    // echo $usb->getName();
    // echo "<br>";
    // echo $usb->getPrice();
    // echo "<br>";
    // echo $usb->getQuantity();
    // echo "<br>";
    // $usb1 = new InvoiceItem("A4Tech Mouse", 3, 1);

?>