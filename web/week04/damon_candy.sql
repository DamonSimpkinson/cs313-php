-- Damon Simpkinson
-- Week 04 Prove: DB Setup

CREATE TABLE system_user
( system_user_id        SERIAL         PRIMARY KEY
, system_user_name      VARCHAR(20)    UNIQUE NOT NULL
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
( candy_item_id         SERIAL         PRIMARY KEY
, candy_item_name       VARCHAR(20)    NOT NULL
, candy_item_price      NUMERIC        NOT NULL
, candy_item_inventory  INTEGER        NOT NULL
, candy_item_image      VARCHAR(50));

CREATE TABLE order_item
( order_item_id         SERIAL         PRIMARY KEY
, customer_id           INTEGER        REFERENCES customer(customer_id)
, candy_item_id         INTEGER        REFERENCES candy_item(candy_item_id));
