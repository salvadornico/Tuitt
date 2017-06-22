--1
select * from customers where country = 'Philippines';

--2
select contactFirstName, contactLastName from customers 
	where customerName = 'La Rochelle Gifts';

--3
select MSRP from products 
	where productName like "%Titanic%";

--4
select firstName, lastName from employees 
	where email = 'jfirrelli@classicmodelcars.com';

--5
select customerName from customers where state is null;

--6
select email from employees 
	where firstName = 'Steve' and lastName = 'Patterson';

--7
select customerName, creditLimit from customers
	where country != 'USA' and creditLimit > 3000;

--8
select productName, productLine, quantityInStock from products
	where quantityInStock < 1000 or productLine = 'planes';

--9
select productName, (MSRP - buyPrice) as profit from products;

--10
select orderNumber, productName, (quantityOrdered * priceEach) as subtotal
	from orderdetails join products
	on orderdetails.productCode = products.productCode;

select productName, sum(quantityOrdered * priceEach) as subtotal
	from orderdetails join products
	on orderdetails.productCode = products.productCode
	group by productName;

select orderNumber, sum(quantityOrdered * priceEach) as subtotal
	from orderdetails join products
	on orderdetails.productCode = products.productCode
	group by orderNumber;

--11
select firstName, lastName from employees join offices
	on employees.officeCode = offices.officeCode
	where offices.city = 'Tokyo';

--12
select customerName from customers join employees
	on customers.salesRepEmployeeNumber = employees.employeeNumber
	where employees.firstName = 'Leslie' and employees.lastName = 'Thompson';

--13
select productName from products join orderdetails join orders join customers 
	on products.productCode = orderdetails.productCode
	and orderdetails.orderNumber = orders.orderNumber
	and orders.customerNumber = customers.customerNumber
	where customerName = 'Baane Mini Imports';

--14
select firstName, lastName, offices.country 
	from employees join customers join offices
	on offices.officeCode = employees.officeCode
	and employees.employeeNumber = customers.salesRepEmployeeNumber
	where customers.country = offices.country;



--1
-- Who is the customer with the total payments?
select customerName, format(sum(amount), 2) as 'Total Receipts'
	from customers join payments
	on payments.customerNumber = customers.customerNumber
	group by customerName
	order by sum(amount) desc limit 1;

--2
-- Who are the employees who do not directly serve customers?
select concat(employees.firstName, ' ', employees.lastName) as 'Employee', count(customers.customerName) as 'Customers Served'
	from employees left join customers
	on customers.salesRepEmployeeNumber = employees.employeeNumber	
	group by employees.employeeNumber
	having count(customers.customerName) = 0;

--3
-- How many products are there per product line?
select productLine, count(products.productName) as 'Products Contained'
	from products group by productLine;

--4
-- List the names of all the employees and the number of customers they serve
select concat(employees.firstName, ' ', employees.lastName) as 'Employee', count(customers.customerName) as 'Customers Served'
	from employees left join customers
	on customers.salesRepEmployeeNumber = employees.employeeNumber
	group by employees.employeeNumber;

--5
insert into offices(officeCode, city, phone, addressLine1, addressLine2, state, country, postalCode, territory)
	values(8, 'Barcelona', '(+34 93) 5555 5555', '1234 Plaça de Catalunya', 'Eixample', 'Catalunya', 'Spain', 08150, 'EMEA'), 
		(9, 'Manila', '(+63 2) 555 5555', '3F Caswynn Building', 'Timog Avenue, Quezon City', 'NCR', 'Philippines', 1100, 'APAC');

--6
insert into customers(customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit)
	values(497, 'Casa de la Tires', 'Cinquecento', 'Luigi', '+1 333 5555 5555', '101 Main Street', '', 'Radiator Springs', 'NM', '87111', 'USA', 1337, 1000000);
--7
update employees set extension = 'x003' where jobTitle = 'Sales Rep';

--8
delete from offices where officeCode in (8, 9);