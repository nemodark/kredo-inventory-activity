Inventory System

users - user_id, username, email, password, firstname, lastname, permission(admin, user)

category - category_id, category_name

items - item_id, category_id, item_name, item_price, item_quantity, item_status(available, soldout)

purchase - purchase_id, item_id, quantity, subtotal, purchase_status(pending, done, cancelled)

delivery - deliver_id, purchase_id, deliver_status(otw, delivered, cancelled)

x
admin:
CRUD - login, category, users, items, check/change purchase history, check/update delivery status


user:
login -> select category -> select items -> purchase items

-> check delivery status
-> check user purchase history

test