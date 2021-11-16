<?php
include_once '_include/head.php';
include_once '_include/header.php';
include_once '_include/DataAccess/InvoiceItemRepository.php';
include_once 'models/InvoiceItem.php';

$invoiceId = $_GET['invoiceId'];
$invoiceItemRepository = new InvoiceItemRepository();
$invoiceItems = $invoiceItemRepository->getInvoiceItems($invoiceId);



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
                        <?php foreach ($invoiceItems as $invoiceItem){?>
                        <tr>
                            <td><?php
                                echo $invoiceItem->ProductName;
                                ?></td>
                            <td><?php
                                echo $invoiceItem->Price;
                                ?></td>
                            <td><?php
                                echo $invoiceItem->Quantity;
                                ?></td>
                            <td>
                                <?php
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