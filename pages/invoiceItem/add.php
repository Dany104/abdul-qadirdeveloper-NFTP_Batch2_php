<?php
include_once '../../_include/head.php';
include_once '../../_include/header.php';
include_once '../../_include/DataAccess/InvoiceItemRepository.php';
include_once '../../models/InvoiceItem.php';
?>
<?php

    $invoiceItem = new InvoiceItem();
     $name_error = null;
     $price_error = null;
     $quantity_error = null;
     $is_error = false;

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        function ValidateInput($invoiceItem){
            global $name_error, $price_error, $quantity_error, $is_error;
            if(strlen(trim($invoiceItem->ProductName)) <2){
               $name_error = "Invalid product name";
               $is_error = true;
            }
            if($invoiceItem->Price < 1){
                $price_error = "Invalid price";
                $is_error = true;
            }
            if($invoiceItem->Quantity < 1){
                $quantity_error = "Invalid quantity";
                $is_error = true;
            }
   
            if($is_error == true) {
                return false;
            }
           return true;
        }
        if(isset($_POST["name"])){
            $invoiceItem->ProductName = $_POST["name"];
        }
        if(isset($_POST["price"])){
            $invoiceItem->Price = $_POST["price"];
        }
        if(isset($_POST["quantity"])){
            $invoiceItem->Quantity = $_POST["quantity"];
        }
        if(ValidateInput($invoiceItem)){
            // insert input values to database
            $invoiceItem->InvoiceId = 1;
            echo $invoiceItem->ProductName;
            $invoiceItemRepository = new InvoiceItemRepository();
            $success = $invoiceItemRepository->AddInvoiceItem($invoiceItem);

            // redirect the request to index.php
             if($success)
                header("location:index.php?invoiceId=1");
                
        }else{
            echo "there are errors";
        }
     }   
     
?>



    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Product Editor</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="<?php echo $invoiceItem->ProductName ?>" class="form-control <?php echo $name_error?'is-invalid':'' ?>" name="name" placeholder="Product Name" required>
                        <div class="invalid-feedback">
                            <?php echo $name_error ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" value="<?php echo $invoiceItem->Quantity ?>" class="form-control <?php echo $quantity_error?'is-invalid':'' ?>" name="quantity" placeholder="Product Quantity" required>
                        <div class="invalid-feedback">
                            <?php echo $quantity_error ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number"  value="<?php echo $invoiceItem->Price ?>" step="0.5" class="form-control <?php echo $price_error?'is-invalid':'' ?>" name="price" placeholder="Product Price" required>
                        <div class="invalid-feedback">
                            <?php echo $price_error ?> 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>               
            </div>
        </div>
    </div>

    
<?php     
include_once '../../_include/footer.php';
include_once '../../_include/foot.php';
?>