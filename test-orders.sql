select * from order_details,products,orders,clients
where (order_details.product_id = products.id)
and (order_details.order_id = orders.id)
and (orders.client_id = clients.id)
order by order_details.product_id, order_details.price desc


select * from order_details
left join products on order_details.product_id = products.id
left join orders on order_details.order_id = orders.id
left join clients on orders.client_id = clients.id
order by order_details.product_id, order_details.price 