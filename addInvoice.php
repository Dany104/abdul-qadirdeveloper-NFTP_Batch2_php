<?php
    include '_include/head.php';
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Product Editor</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="Quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Product Quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.5" class="form-control" name="price" placeholder="Product Price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>               
            </div>
        </div>
    </div>

    
<?php     
    include '_include/foot.php';
?>