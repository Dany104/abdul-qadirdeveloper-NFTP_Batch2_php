select count(*)
 from invoice_item
 where Quantity = 2

/*
INSERT INTO `invoice_item` 
( `ProductName`, `Price`, `Quantity`) 
VALUES ( 'Product 6', '2', '2')
, ( 'Product 7', '1', '2');
*/

/*
select *
from invoice_item
where price = 3
*/

-- select max(Price) AS "Price"
-- from invoice_item;;;;;;;;;;;