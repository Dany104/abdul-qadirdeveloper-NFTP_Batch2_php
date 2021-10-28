<?php
    include '_include/head.php';
?>
<?php
     $productName=null;
     $Price = null;
     $Quantity = null;
     if(isset($_POST["num1"])){
         $num1 = $_POST["num1"];
     }
     if(isset($_POST["num1"])){
         $num2 = $_POST["num2"];
     }
     if(isset($_POST["num1"])){
         $operator = $_POST["operator"];
     }
     if(ValidateInput()){
         echo "Product submitted!";
     }
     function ValidateInput(){

     }

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

                </table>
            </div>

        </div>

    </div>

<?php     
    include '_include/foot.php';
?>