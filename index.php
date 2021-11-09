<?php
    include_once '_include/head.php';
    include_once '_include/header.php';
    include_once 'models/InvoiceItem.php';
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName="invoicesDB";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

    // do your queries
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
  $conn = null;
?>
<?php   
    
    // we will use looping technique to print the elements of array
    // for looping
    $invoiceItems = [
        new InvoiceItem("Seget 3.0 128 GB", 23.45, 2),
        new InvoiceItem("A4Tech Mouse", 3, 1),
        new InvoiceItem("Keyboard",5,1),
        new InvoiceItem("100 Inch LED display",500,1)
    ];
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
                        <?php for($i=0;$i<count($invoiceItems);$i++) { ?>
                        <tr>
                            <td><?php
                                 echo $invoiceItems[$i]->getName();
                            ?></td>
                            <td><?php
                                 echo $invoiceItems[$i]->getPrice();
                            ?></td>
                            <td><?php
                                 echo $invoiceItems[$i]->getQuantity();
                            ?></td>
                            <td>
                                <?php
                                     echo $invoiceItems[$i]->getQuantity()*$invoiceItems[$i]->getPrice();
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