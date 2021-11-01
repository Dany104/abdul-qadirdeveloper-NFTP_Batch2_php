<?php
    include_once '_include/head.php';
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
    include_once '_include/foot.php';
?>