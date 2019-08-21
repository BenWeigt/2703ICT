/* What are the names of customers who live in Nathan? */
SELECT Name FROM Customers WHERE Address LIKE '%Nathan';

/* What are the names of customers who have bought Fred's Fries? */
SELECT DISTINCT Customers.Name
FROM Customers
INNER JOIN Orders
	ON Customers.Id = Orders.CustId
INNER JOIN Stock
	ON Orders.ItemId = Stock.Id
WHERE Stock.Name = 'Fred''s Fries';