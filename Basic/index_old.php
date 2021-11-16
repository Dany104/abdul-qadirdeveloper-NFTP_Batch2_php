<?php
include_once '_include/head.php';
include_once '_include/header.php';
include_once 'models/InvoiceItem.php';
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "invoicesDB";


// step 2: execute query
    // step 2.1: prepare a statement by providing it a query string
    // step 2.2 execute satement , it will fill statement with an array of result
// step 3: loop statment to display data in table

try {
    // step 1: connect with database
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // step 2: execute query
    // step 2.1: prepare a statement by providing it a query string
    $stmt = $conn->query("SELECT `Id`, `ProductName`, `Price`, `Quantity`, `invoiceId` FROM `invoice_item`");

    // step 2.2 execute satement , it will fill statement with an array of result
    $invoiceItems2 = $stmt->fetchAll(PDO::FETCH_CLASS,'InvoiceItem');
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    echo $e->getLine();
}


// // PDO::FETCH_NUM
// try {
//     // step 1: connect with database
//     $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
//     // step 2: execute query
//     // // step 2.1: prepare a statement by providing it a query string
//     $stmt = $conn->prepare("SELECT `Id`, `ProductName`, `Price`, `Quantity`, `invoiceId` FROM `invoice_item`");
        
//     //  // step 2.2 execute satement , it will fill statement with an array of result
//     $stmt->execute();
       
//      $stmt->setFetchMode(PDO::FETCH_NUM);
    
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//     echo $e->getLine();
// }

$conn = null;


?>
<?php

// we will use looping technique to print the elements of array
// for looping
// $invoiceItems = [
//     new InvoiceItem("Seget 3.0 128 GB", 23.45, 2),
//     new InvoiceItem("A4Tech Mouse", 3, 1),
//     new InvoiceItem("Keyboard", 5, 1),
//     new InvoiceItem("100 Inch LED display", 500, 1)
// ];
?>


<div class="container">
    <div class="row">
        <div class="col">
            <h1>Invoice</h1>
        </div>
    </div>
    <div class="row">
        <div class="col"><a class="btn btn-primary" href="addInvoice.php">Add Invoice</a></div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table  table-striped  table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                     <?php 
                         //for ($i = 0; $i < count($invoiceItems); $i++) { 
                         // foreach ($invoiceItems as $invoiceItem) {
                         ?> 

                        <?php 
                        // step 3: loop statment to display data in table
                        //foreach ($stmt as $row) { ?>
                        <?php foreach ($invoiceItems2 as $invoiceItem){?>
                        <tr>
                            <td><?php
                                //echo $invoiceItems[$i]->getName();
                                //echo $row[1];
                                echo $invoiceItem->ProductName;
                                ?></td>
                            <td><?php
                                //echo $invoiceItems[$i]->getPrice();
                                //echo $row[2];
                                echo $invoiceItem->Price;
                                ?></td>
                            <td><?php
                                // echo $invoiceItems[$i]->getQuantity();
                                // echo $row[3];
                                echo $invoiceItem->Quantity;
                                ?></td>
                            <td>
                                <?php
                               // echo $invoiceItems[$i]->getQuantity() * $invoiceItems[$i]->getPrice();
                            //    echo $row[2]*$row[3];
                            echo $invoiceItem->Price * $invoiceItem->Quantity;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<?php
include_once '_include/footer.php';
include_once '_include/foot.php';
?>