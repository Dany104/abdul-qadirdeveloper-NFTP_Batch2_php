<?php
include_once '../../_include/authenticate.php';
include_once '../../_include/head.php';
include_once '../../_include/header.php';
include_once '../../_include/DataAccess/InvoiceItemRepository.php';
include_once '../../models/InvoiceItem.php';


?>
<?php

// show invoice item properties
    // first fetch the invoice item by id
// show delete cancel button
// when user click on delete button, it should post back, and delete invoice item from database
// when user click on cancel button, it should go back to index page

$invoiceItemRepository = new InvoiceItemRepository();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST["invoiceItemId"])){
        $invoiceItemId = $_POST["invoiceItemId"];
        $success = $invoiceItemRepository->deleteInvoiceItemById($invoiceItemId);
        if($success)
            header("location:index.php?invoiceId=1");
        else{
            $invoiceItem = $invoiceItemRepository->getInvoiceItemById($invoiceItemId);
        }
    }else{
       echo "invoiceItemId is not set in post request"; 
       exit;
    }
}else{    
    if(isset($_GET["invoiceItemId"])){
        $invoiceItemId = $_GET['invoiceItemId'];
    }else{
        echo "Invalid request.";
        exit;
    }
    $invoiceItem = $invoiceItemRepository->getInvoiceItemById($invoiceItemId);
}




?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Delete Invoice</h1>
        </div>
    </div>    
    <div class="row">
        <div class="col">
            <h6>Do you really want to delete this invoice item?</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            Product
        </div>
        <div class="col"><?php
            echo $invoiceItem->ProductName
        ?></div>
    </div>
    <div class="row">
        <div class="col">
            Price
        </div>
        <div class="col"><?php
            echo $invoiceItem->Price
        ?></div>
    </div>
    <div class="row">
        <div class="col">
            Quantity
        </div>
        <div class="col"><?php
            echo $invoiceItem->Quantity
        ?></div>
    </div>
    <div class="row">
        <div class="col">
            <form style="display:inline;" action="delete.php" method="post">  
                <input type="hidden" name="invoiceItemId" value="<?php echo $invoiceItem->Id ?>"    />          
                <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i></button>
            </form>
            <a href="" class="btn btn-secondary"><i class="fas fa-times"></i></a>
        </div>
    </div>
</div>

<?php
include_once '../../_include/footer.php';
include_once '../../_include/foot.php';
?>