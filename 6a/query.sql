SELECT 
cashier.cashier_name, 
product.product_name, 
category.category_name, 
product.product_price
FROM 
product INNER JOIN category INNER JOIN cashier 
WHERE 
product.category_id=category.category_id AND product.cashier_id=cashier.cashier_id