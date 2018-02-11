-- Damon Simpkinson
-- Week 05 Prove: PHP Data Access

CREATE TABLE system_user
( system_user_id        SERIAL         PRIMARY KEY
, system_user_title     VARCHAR(20)    NOT NULL
, first_name            VARCHAR(20)    NOT NULL
, last_name             VARCHAR(20)    NOT NULL);

CREATE TABLE customer
( customer_id           SERIAL         PRIMARY KEY
, first_name            VARCHAR(20)    NOT NULL
, last_name             VARCHAR(20)    NOT NULL
, phone_number          VARCHAR(12)    NOT NULL
, street_address        VARCHAR(30)    NOT NULL
, city                  VARCHAR(20)    NOT NULL
, state                 VARCHAR(2)     NOT NULL
, zip                   INTEGER        NOT NULL);

CREATE TABLE candy_item
( candy_item_id           SERIAL         PRIMARY KEY
, candy_item_name         VARCHAR(20)    NOT NULL
, candy_item_price        NUMERIC        NOT NULL
, candy_item_inventory    INTEGER        NOT NULL
, candy_item_description  TEXT           NOT NULL
, candy_item_image        VARCHAR(50)   DEFAULT 'none');

CREATE TABLE order_item
( order_item_id         SERIAL         PRIMARY KEY
, customer_id           INTEGER        REFERENCES customer(customer_id)
, candy_item_id         INTEGER        REFERENCES candy_item(candy_item_id));

INSERT INTO system_user
( system_user_title
, first_name
, last_name)
VALUES
( 'Shop Owner'
, 'Laura'
, 'Simpkinson')
,
( 'Website Admin'
, 'Damon'
, 'Simpkinson')
,
( 'Employee'
, 'Bob'
, 'Jones');


INSERT INTO customer
( first_name
, last_name
, phone_number
, street_address
, city
, state
, zip)
VALUES
( 'Damon'
, 'Simpkinson'
, '407-555-1212'
, '42 End of the Universe Rd'
, 'Vernal'
, 'UT'
, 80111)
,
( 'Mickey'
, 'Mouse'
, '407-555-1928'
, 'PO Box 10040'
, 'Lake Buena Vista'
, 'FL'
, 32830)
,
( 'Iron'
, 'Man'
, '714-555-1963'
, '10880 Malibu Point'
, 'Malibu'
, 'CA'
, 90265)
,
( 'Douglas'
, 'Adams'
, '800-555-4242'
, 'Big Bang Burger Bar'
, 'Key West'
, 'FL'
, '33041');


INSERT INTO candy_item
( candy_item_name
, candy_item_price
, candy_item_inventory
, candy_item_description
, candy_item_image)
VALUES
( 'Devil Ganache'
, 1.00
, 100
, '"The Devil" truffle is made from Callebaut 70-30-38 (70% dark chocolate)
  ganache, covered in the same dark chocolate. It’s extra intense and only for
  serious chocolate lovers.'
, 'devilGanache.jpg')
,
( 'Andrew''s Mints'
, 1.00
, 50
, 'Andrew''s Mints are a little more sophisticated... A minty white chocolate
  ganache is sandwiched between two layers of dark chocolate ganache and
  beautifully enrobed in Callebaut 811 (55% dark chocolate).'
, 'andrewMint.jpg')
,
( 'Dragon Ganache'
, 1.00
, 100
, '"The Dragon" truffle is Callebaut 811 (55% dark chocolate) ganache with a
  cayenne kick, covered in dark chocolate and dusted in cayenne pepper. Each
  8-ounce box contains 18 pieces.'
, 'dragonGanache.jpg');


INSERT INTO order_item
( customer_id
, candy_item_id)
VALUES
( (SELECT customer_id FROM customer WHERE first_name = 'Damon')
, (SELECT candy_item_id FROM candy_item WHERE candy_item_name = 'Devil Ganache'))
,
( (SELECT customer_id FROM customer WHERE first_name = 'Iron')
, (SELECT candy_item_id FROM candy_item WHERE candy_item_name = 'Andrew''s Mints'))
,
( (SELECT customer_id FROM customer WHERE first_name = 'Damon')
, (SELECT candy_item_id FROM candy_item WHERE candy_item_name = 'Dragon Ganache'));
