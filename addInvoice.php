<?php
    include_once '_include/head.php';
    include_once '_include/DataAccess/InvoiceItemRepository.php';
?>
<?php
     $name=null;
     $price = null;
     $quantity = null;
     $name_error = null;
     $price_error = null;
     $quantity_error = null;
     $is_error = false;

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        function ValidateInput(){
            global $name, $price, $quantity,
            $name_error, $price_error, $quantity_error, $is_error;
            if(strlen(trim($name)) <2){
               $name_error = "Invalid product name";
               $is_error = true;
            }
            if($price < 1){
                $price_error = "Invalid price";
                $is_error = true;
            }
            if($quantity < 1){
                $quantity_error = "Invalid quantity";
                $is_error = true;
            }
   
            if($is_error == true) {
                return false;
            }
           return true;
        }
        if(isset($_POST["name"])){
            $name = $_POST["name"];
        }
        if(isset($_POST["price"])){
            $price = $_POST["price"];
        }
        if(isset($_POST["quantity"])){
            $quantity = $_POST["quantity"];
        }
        if(ValidateInput()){
            // insert input values to database
            $invoiceItem = new InvoiceItem();
            $invoiceItem->ProductName = $name;
            $invoiceItem->Price = $price;
            $invoiceItem->Quantity = $quantity;
            $invoiceItem->InvoiceId = 1;
            $invoiceItemRepository = new InvoiceItemRepository();
            $invoiceItems = $invoiceItemRepository->AddInvoiceItem($invoiceItem);

            // redirect the request to index.php
            header("location:index.php");
        }else{
            echo "there are errors";
            // echo "<br>";
            // echo $name_error;
            // echo "<br>";
            // echo $price_error;
            // echo "<br>";
            // echo $quantity_error;
            // echo "<br>";
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
                <form action="addInvoice.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="<?php echo $name ?>" class="form-control <?php echo $name_error?'is-invalid':'' ?>" name="name" placeholder="Product Name" required>
                        <div class="invalid-feedback">
                            <?php echo $name_error ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" value="<?php echo $quantity ?>" class="form-control <?php echo $quantity_error?'is-invalid':'' ?>" name="quantity" placeholder="Product Quantity" required>
                        <div class="invalid-feedback">
                            <?php echo $quantity_error ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number"  value="<?php echo $price ?>" step="0.5" class="form-control <?php echo $price_error?'is-invalid':'' ?>" name="price" placeholder="Product Price" required>
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
    include_once '_include/foot.php';
?>