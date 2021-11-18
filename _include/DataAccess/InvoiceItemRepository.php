<?php
include_once 'database.php';
include_once '../../models/InvoiceItem.php';

class InvoiceItemRepository{

    // this function will return all invoice items by invoice Id
    public function getInvoiceItems($invoiceId){
        $db = new Database();

        try {
            $conn = $db->getConnection();
        
            $stmt = $conn->prepare("SELECT `Id`, `ProductName`, `Price`, `Quantity`, `InvoiceId` FROM `invoice_item` WHERE `InvoiceId` = :InvoiceId");
            $stmt->bindValue(':InvoiceId', $invoiceId);
            $stmt->execute();
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

            $sql = "INSERT INTO `invoice_item`( `ProductName`, `Price`, `Quantity`, `InvoiceId`) 
            VALUES (:ProductName,:Price,:Quantity,:InvoiceId)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ProductName', $invoiceItem->ProductName);
            $stmt->bindParam(':Price', $invoiceItem->Price);
            $stmt->bindParam(':Quantity', $invoiceItem->Quantity);
            $stmt->bindParam(':InvoiceId', $invoiceItem->InvoiceId);

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
    
    public function UpdateInvoiceItem($invoiceItem){
        $db = new Database();

        try {
            $conn = $db->getConnection();

            $sql = "UPDATE  `invoice_item`
                    SET     `ProductName`=:ProductName,
                            `Price`=:Price,
                            `Quantity`=:Quantity
                    WHERE   `Id` = :Id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':Id', $invoiceItem->Id);
            $stmt->bindParam(':ProductName', $invoiceItem->ProductName);
            $stmt->bindParam(':Price', $invoiceItem->Price);
            $stmt->bindParam(':Quantity', $invoiceItem->Quantity);
            
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

    public function deleteInvoiceItemById($invoiceItemId){
        $db = new Database();

        try {
            $conn = $db->getConnection();

            $sql = "DELETE FROM `invoice_item` WHERE `Id` = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $invoiceItemId);

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
    public function getInvoiceItemById($id) {
        $db = new Database();

        try {
            $conn = $db->getConnection();
        
            $stmt = $conn->prepare("SELECT `Id`, `ProductName`, `Price`, `Quantity`, `InvoiceId` FROM `invoice_item` WHERE `Id`=:id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $invoiceItems = $stmt->fetchAll(PDO::FETCH_CLASS,'InvoiceItem');
            
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            echo $e->getLine();
        }
        $conn = null;

        return $invoiceItems[0];
    }
}