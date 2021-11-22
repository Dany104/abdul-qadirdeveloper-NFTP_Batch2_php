

<?php
include_once '../../_include/authenticate.php';
include_once '../../_include/head.php';
include_once '../../_include/header.php';
include_once '../../_include/DataAccess/InvoiceItemRepository.php';
include_once '../../Models/InvoiceItem.php';

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
        <div class="col">
            <table class="table  table-striped  table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col" style="width: 111px;">
                        <a class="btn btn-primary" href="add.php"><i class="fas fa-plus"></i></a>
                    </th>
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
                            <td>
                                <a href="edit.php?invoiceItemId=<?php echo $invoiceItem->Id ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="delete.php?invoiceItemId=<?php echo $invoiceItem->Id ?>" class="btn  btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<?php
include_once '../../_include/footer.php';
include_once '../../_include/foot.php';
?>