<?php
    include_once '_include/head.php';
?>
<?php
    include_once '_include/header.php';
?>

<?php
    class InvoiceItem{
        private $name;
        private $price;
        private $quantity;

        // access modifiers Private, Public

        // accessors = getter, setter
        
        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getPrice(){
            return $this->price;
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function getQuantity(){
            return $this->quantity;
        }

        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }
    }
    $usb = new InvoiceItem();  // create an instance of class InvoiceItem and assigned it to object usb
    $usb->setName("Seget 3.0 128 GB");
    // $usb->name = "";
    $usb->setPrice(23.45);
    // $usb->price = 3.0;
    $usb->setQuantity(2);
    // $usb->quantity = 2;
    echo $usb->getName();
    echo "<br>";
    echo $usb->getPrice();
    echo "<br>";
    echo $usb->getQuantity();
    echo "<br>";
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
    include_once '_include/footer.php';
?>
<?php     
    include_once '_include/foot.php';
?>