<?php
include_once '_include/DataAccess/database.php';
include_once 'models/InvoiceItem.php';

class InvoiceItemRepository{

    // this function will return all invoice items by invoice Id
    public function getInvoiceItems($invoiceId){
        $db = new Database();

        try {
            $conn = $db->getConnection();
        
            $stmt = $conn->prepare("SELECT `Id`, `ProductName`, `Price`, `Quantity`, `invoiceId` FROM `invoice_item` WHERE `invoiceId` = :invoiceId");
            $stmt->bindValue(':invoiceId', $invoiceId);
            $stmt->execute();
           // $stmt->execute([':invoiceId' => $invoiceId]);
            $invoiceItems = $stmt->fetchAll(PDO::FETCH_CLASS,'InvoiceItem');
            
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            echo $e->getLine();
        }
        $conn = null;

        return $invoiceItems;
    }

    public function AddInvoiceItem($invoiceItem){
        $db = new Database();

        try {
            $conn = $db->getConnection();

            $sql = "INSERT INTO `invoice_item`( `ProductName`, `Price`, `Quantity`, `invoiceId`) 
            VALUES (':ProductName',':Price',':Quantity',':invoiceId')";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':productName', $invoiceItem->productName);
            $stmt->bindParam(':price', $invoiceItem->price);
            $stmt->bindParam(':Quantity', $invoiceItem->quantity);
            $stmt->bindParam(':invoiceId', $invoiceItem->invoiceId);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            echo $e->getLine();
        }
        $conn = null;
    }

}