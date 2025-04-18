# TEST BACK END

## Description

This is a backend API built using Laravel for testing the Skuberg company

## Features

- CRUD `user` data API
- CRUD `wallet` data API
- CRUD `order` data API
- CRUD `trade` data API
- CRUD `currency` data API

## ER-Diagram

![สกรีนช็อต 2025-04-18 131117](https://github.com/user-attachments/assets/c346ec63-928d-4107-b2ee-b569647f6e9e)

## Installation

1. move to directory test_backend:
```
cd test_backend
```
2. create database name test_backend:
3. Run the migrations database:
```
php artisan migrate
```
4. create dummy data:
```
php artisan db:seed --class=Usereeder
php artisan db:seed --class=CurrencySeeder
php artisan db:seed --class=WalletSeeder
php artisan db:seed --class=OrderSeeder
php artisan db:seed --class=TradeSeeder
```
5. run the application:
```
php artisan serve
```

## API Endpoints
### 1. User API

<details>
  <summary><b>POST /user — Create User</b></summary>

- **Method:** `POST`
- **Endpoint:** `api/user`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "name": "string",
    "email": "email",
    "password": "string"
}
```
- **Request Example:**
```
curl -X POST http://127.0.0.1:8000/api/user \
  -H "Content-Type: application/json" \
  -d "{\"name\": \"test\", \"email\": \"test@test.com\", \"password\": \"password123\"}"
```
- **Response Example:**
```
[
    "created success",
    {
        "id": 51,
        "name": "test",
        "email": "test@test.com",
        "email_verified_at": null,
        "password": "$2y$12$SV3wkktzgkUZwARs/0hUcuwGKJGnVtzKOANK3s2ClqxXlEhnjirwu",
        "remember_token": null,
        "created_at": "2025-04-18T06:48:40.000000Z",
        "updated_at": "2025-04-18T06:48:40.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /user/:id — Get User by ID</b></summary>

- **Method:** `GET`
- **Endpoint:** `/api/user/:id`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/user/1
```
- **Response Example:**
```
[
    "fetch by id success",
    {
        "id": 1,
        "name": "Ms. Dora Gulgowski",
        "email": "nwelch@example.net",
        "email_verified_at": "2025-04-18T06:06:05.000000Z",
        "created_at": "2025-04-18T06:06:06.000000Z",
        "updated_at": "2025-04-18T06:06:06.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /user — Get All User</b></summary>

- **Method:** `GET`
- **Endpoint:** `api/user`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/user
```
- **Response Example:**
```
[
    "fetch success",
    [
        {
            "id": 1,
            "name": "Ms. Dora Gulgowski",
            "email": "nwelch@example.net",
            "email_verified_at": "2025-04-18T06:06:05.000000Z",
            "password": "$2y$12$Q7hKgZLokoxeIQUxZcvimu5stz6RB1pD7ZoCDboi6vowb6eF35DuK",
            "remember_token": "AFPtwMdBxR",
            "created_at": "2025-04-18T06:06:06.000000Z",
            "updated_at": "2025-04-18T06:06:06.000000Z"
        },
        {
            "id": 2,
            "name": "Terence Murray",
            "email": "jhane@example.com",
            "email_verified_at": "2025-04-18T06:06:06.000000Z",
            "password": "$2y$12$Q7hKgZLokoxeIQUxZcvimu5stz6RB1pD7ZoCDboi6vowb6eF35DuK",
            "remember_token": "BGJpDhnLoB",
            "created_at": "2025-04-18T06:06:06.000000Z",
            "updated_at": "2025-04-18T06:06:06.000000Z"
        },
    ]
]
```
</details>

<details>
  <summary><b>PUT /user/:id — Update User</b></summary>

- **Method:** `PUT`
- **Endpoint:** `/api/user/:id`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "name": "string",
    "email": "email",
    "password": "string"
}
```
- **Request Example:**
```
curl -X PUT http://127.0.0.1:8000/api/user/1 \
  -H "Content-Type: application/json" \
  -d "{\"name\": \"test1\", \"email\": \"test1@test.com\", \"password\": \"password123\"}"
```
- **Response Example:**
```
[
    "updated success",
    {
        "id": 2,
        "name": "test1",
        "email": "test1@test.com",
        "email_verified_at": "2025-04-18T06:06:06.000000Z",
        "password": "$2y$12$RXVh4MCAZvCy3wK8zmNwh.QcCw7xMe39v7jXkOw2v64ofJE7OmNs.",
        "remember_token": "BGJpDhnLoB",
        "created_at": "2025-04-18T06:06:06.000000Z",
        "updated_at": "2025-04-18T06:56:25.000000Z"
    }
]
```
</details>

<details>
  <summary><b>DELETE /user/:id — Delete User</b></summary>

- **Method:** `DELTE`
- **Endpoint:** `api/user/:id`
- **Request Example:**
```
curl -X DELETE http://127.0.0.1:8000/api/user/1
```
- **Response Example:**
```
{
  "deleted success"
}
```
</details>

### 2. Currency API

<details>
  <summary><b>POST /currency — Create Currency</b></summary>

- **Method:** `POST`
- **Endpoint:** `api/currency`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "name": "string",
    "rate": "numeric",
}
```
- **Request Example:**
```
curl -X POST http://127.0.0.1:8000/api/currency \
  -H "Content-Type: application/json" \
  -d "{\"name\": \"test\", \"rate\": \"1.23\"}"
```
- **Response Example:**
```
[
    "created success",
    {
        "id": 6,
        "name": "test",
        "rate": 1.23,
        "created_at": "2025-04-18T07:04:29.000000Z",
        "updated_at": "2025-04-18T07:04:29.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /currency/:id — Get Currency by ID</b></summary>

- **Method:** `GET`
- **Endpoint:** `/api/currency/:id`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/currency/1
```
- **Response Example:**
```
[
    "fetch by id success",
    {
        "id": 1,
        "name": "BTC",
        "rate": "7.63",
        "created_at": "2025-04-18T06:06:18.000000Z",
        "updated_at": "2025-04-18T06:06:18.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /currency — Get All Currency</b></summary>

- **Method:** `GET`
- **Endpoint:** `api/currency`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/currency
```
- **Response Example:**
```
[
    "fetch success",
    [
        {
            "id": 1,
            "name": "BTC",
            "rate": "7.63",
            "created_at": "2025-04-18T06:06:18.000000Z",
            "updated_at": "2025-04-18T06:06:18.000000Z"
        },
        {
            "id": 2,
            "name": "ETH",
            "rate": "3.81",
            "created_at": "2025-04-18T06:06:18.000000Z",
            "updated_at": "2025-04-18T06:06:18.000000Z"
        },
        {
            "id": 3,
            "name": "XRP",
            "rate": "8.79",
            "created_at": "2025-04-18T06:06:18.000000Z",
            "updated_at": "2025-04-18T06:06:18.000000Z"
        },
        {
            "id": 4,
            "name": "LTC",
            "rate": "2.32",
            "created_at": "2025-04-18T06:06:18.000000Z",
            "updated_at": "2025-04-18T06:06:18.000000Z"
        },
        {
            "id": 5,
            "name": "DOGE",
            "rate": "8.72",
            "created_at": "2025-04-18T06:06:18.000000Z",
            "updated_at": "2025-04-18T06:06:18.000000Z"
        }
    ]
]
```
</details>

<details>
  <summary><b>PUT /currency/:id — Update Currency</b></summary>

- **Method:** `PUT`
- **Endpoint:** `/api/currency/:id`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "name": "string",
    "rate": "numeric",
}
```
- **Request Example:**
```
curl -X PUT http://127.0.0.1:8000/api/currency/1 \
  -H "Content-Type: application/json" \
  -d "{\"name\": \"test\", \"rate\": \"1.23\"}"
```
- **Response Example:**
```
[
    "updated success",
    {
        "id": 6,
        "name": "test2",
        "rate": 1.23,
        "created_at": "2025-04-18T07:04:29.000000Z",
        "updated_at": "2025-04-18T07:09:00.000000Z"
    }
]
```
</details>

<details>
  <summary><b>DELETE /currency/:id — Delete Currency</b></summary>

- **Method:** `DELTE`
- **Endpoint:** `api/currency/:id`
- **Request Example:**
```
curl -X DELETE http://127.0.0.1:8000/api/currency/1
```
- **Response Example:**
```
{
  "deleted success"
}
```
</details>

### 3. Wallet API

<details>
  <summary><b>POST /wallet — Create Wallet</b></summary>

- **Method:** `POST`
- **Endpoint:** `api/wallet`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "user_id": "integer",
    "currency_id": "integer",
    "amount": "numeric"
}
```
- **Request Example:**
```
curl -X POST http://127.0.0.1:8000/api/wallet \
  -H "Content-Type: application/json" \
  -d "{\"user_id\": \"2\", \"currency_id\": \"2\", \"amount\": \"2\"}"
```
- **Response Example:**
```
[
    "created success",
    {
        "id": 51,
        "user_id": 2,
        "currency_id ": 2,
        "amount": 2,
        "created_at": "2025-04-18T07:12:12.000000Z",
        "updated_at": "2025-04-18T07:12:12.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /wallet/:id — Get Wallet by ID</b></summary>

- **Method:** `GET`
- **Endpoint:** `/api/wallet/:id`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/wallet/1
```
- **Response Example:**
```
[
    "fetch by id success",
    {
        "id": 1,
        "user_id": 43,
        "currency_id": 2,
        "amount": "0.76",
        "created_at": "2025-04-18T06:06:54.000000Z",
        "updated_at": "2025-04-18T06:06:54.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /wallet — Get All Wallet</b></summary>

- **Method:** `GET`
- **Endpoint:** `api/wallet`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/wallet
```
- **Response Example:**
```
[
    "fetch success",
    [
        {
            "id": 52,
            "user_id": 2,
            "currency_id ": 2,
            "amount": "2.00",
            "created_at": "2025-04-18T07:13:06.000000Z",
            "updated_at": "2025-04-18T07:13:06.000000Z"
        },
        {
            "id": 51,
            "user_id": 2,
            "currency_id ": 2,
            "amount": "2.00",
            "created_at": "2025-04-18T07:12:12.000000Z",
            "updated_at": "2025-04-18T07:12:12.000000Z"
        },
    ]
]
```
</details>

<details>
  <summary><b>PUT /wallet/:id — Update wallet</b></summary>

- **Method:** `PUT`
- **Endpoint:** `/api/wallet/:id`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "user_id": "integer",
    "currency_id": "integer",
    "amount": "numeric"
}
```
- **Request Example:**
```
curl -X PUT http://127.0.0.1:8000/api/wallet/1 \
  -H "Content-Type: application/json" \
  -d "{\"user_id\": \3\", \"currency_id\": \"4\", \"amount\": \"2\"}"
```
- **Response Example:**
```
[
    "updated success",
    {
        "id": 52,
        "user_id": 3,
        "currency_id ": 4,
        "amount": 2,
        "created_at": "2025-04-18T07:13:06.000000Z",
        "updated_at": "2025-04-18T07:16:31.000000Z"
    }
]
```
</details>

<details>
  <summary><b>DELETE /wallet/:id — Delete Wallet</b></summary>

- **Method:** `DELTE`
- **Endpoint:** `api/wallet/:id`
- **Request Example:**
```
curl -X DELETE http://127.0.0.1:8000/api/wallet/1
```
- **Response Example:**
```
{
  "deleted success"
}
```
</details>

### 4. Order API

<details>
  <summary><b>POST /order — Create Order</b></summary>

- **Method:** `POST`
- **Endpoint:** `api/order`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "user_id": "integer",
    "currency_id": "integer",
    "amount": "numeric",
    "method": "numeric"
}
```
- **Request Example:**
```
curl -X POST http://127.0.0.1:8000/api/order \
  -H "Content-Type: application/json" \
  -d "{\"user_id\": \"1\", \"currency_id\": \"1\", \"amount\": \"2\", \"method\": \"0\"}"
```
- **Response Example:**
```
[
    "created success",
    {
        "id": 51,
        "user_id": 2,
        "currency_id": 1,
        "method": 0,
        "amount": 20,
        "created_at": "2025-04-18T07:23:46.000000Z",
        "updated_at": "2025-04-18T07:23:46.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /order/:id — Get Order by ID</b></summary>

- **Method:** `GET`
- **Endpoint:** `/api/order/:id`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/order/1
```
- **Response Example:**
```
[
    "fetch by id success",
    {
        "id": 1,
        "user_id": 14,
        "currency_id": 2,
        "method": 0,
        "amount": "8.33",
        "created_at": "2025-04-18T06:06:50.000000Z",
        "updated_at": "2025-04-18T06:06:50.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /order — Get All Order</b></summary>

- **Method:** `GET`
- **Endpoint:** `api/order`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/order
```
- **Response Example:**
```
[
    "fetch success",
    [
        {
            "id": 53,
            "user_id": 2,
            "currency_id": 1,
            "method": 0,
            "amount": "2.00",
            "created_at": "2025-04-18T07:24:27.000000Z",
            "updated_at": "2025-04-18T07:24:27.000000Z"
        },
        {
            "id": 51,
            "user_id": 2,
            "currency_id": 1,
            "method": 0,
            "amount": "20.00",
            "created_at": "2025-04-18T07:23:46.000000Z",
            "updated_at": "2025-04-18T07:23:46.000000Z"
        },
    ]
]
```
</details>

<details>
  <summary><b>PUT /order/:id — Update Order</b></summary>

- **Method:** `PUT`
- **Endpoint:** `/api/order/:id`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "user_id": "integer",
    "currency_id": "integer",
    "amount": "numeric",
    "method": "numeric"
}
```
- **Request Example:**
```
curl -X PUT http://127.0.0.1:8000/api/order/1 \
  -H "Content-Type: application/json" \
  -d "{\"user_id\": \"4\", \"currency_id\": \"4\", \"amount\": \"20\", \"method\": \"1\"}"
```
- **Response Example:**
```
[
    "updated success",
    {
        "id": 53,
        "user_id": 4,
        "currency_id": 4,
        "method": 1,
        "amount": 20,
        "created_at": "2025-04-18T07:24:27.000000Z",
        "updated_at": "2025-04-18T07:29:38.000000Z"
    }
]
```
</details>

<details>
  <summary><b>DELETE /order/:id — Delete Order</b></summary>

- **Method:** `DELTE`
- **Endpoint:** `api/order/:id`
- **Request Example:**
```
curl -X DELETE http://127.0.0.1:8000/api/order/1
```
- **Response Example:**
```
{
  "deleted success"
}
```
</details>

### 5. Trade API

<details>
  <summary><b>POST /trade — Create Trade</b></summary>

- **Method:** `POST`
- **Endpoint:** `api/trade`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "buy_order_id": "integer",
    "sell_order_id": "integer",
    "message": "string",
    "amount": "numeric"
}
```
- **Request Example:**
```
curl -X POST http://127.0.0.1:8000/api/trade \
  -H "Content-Type: application/json" \
  -d "{\"buy_order_id\": \"1\", \"sell_order_id\": \"2\", \"message\": \"test\", \"amount\": \"10\"}"
```
- **Response Example:**
```
[
    "created success",
    {
        "id": 51,
        "buy_order_id": 2,
        "sell_order_id": 1,
        "message": "test",
        "amount": 20,
        "created_at": "2025-04-18T07:32:46.000000Z",
        "updated_at": "2025-04-18T07:32:46.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /trade/:id — Get Trade by ID</b></summary>

- **Method:** `GET`
- **Endpoint:** `/api/trade/:id`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/trade/1
```
- **Response Example:**
```
[
    "fetch by id success",
    {
        "id": 1,
        "buy_order_id": 8,
        "sell_order_id": 14,
        "message": "Consequuntur ratione molestiae dolor corrupti beatae dolores qui.",
        "amount": "2.15",
        "created_at": "2025-04-18T06:06:57.000000Z",
        "updated_at": "2025-04-18T06:06:57.000000Z"
    }
]
```
</details>

<details>
  <summary><b>GET /trade — Get All Trade</b></summary>

- **Method:** `GET`
- **Endpoint:** `api/trade`
- **Request Example:**
```
curl http://127.0.0.1:8000/api/trade
```
- **Response Example:**
```
[
    "fetch success",
    [
        {
            "id": 52,
            "buy_order_id": 1,
            "sell_order_id": 2,
            "message": "test",
            "amount": "10.00",
            "created_at": "2025-04-18T07:33:08.000000Z",
            "updated_at": "2025-04-18T07:33:08.000000Z"
        },
        {
            "id": 51,
            "buy_order_id": 2,
            "sell_order_id": 1,
            "message": "test",
            "amount": "20.00",
            "created_at": "2025-04-18T07:32:46.000000Z",
            "updated_at": "2025-04-18T07:32:46.000000Z"
        },
    ]
]
```
</details>

<details>
  <summary><b>PUT /trade/:id — Update Trade</b></summary>

- **Method:** `PUT`
- **Endpoint:** `/api/trade/:id`
- **Header:**
```json
{
  "Content-Type: application/json"
}
```
- **Request Payload:**
```json
{
    "buy_order_id": "integer",
    "sell_order_id": "integer",
    "message": "string",
    "amount": "numeric"
}
```
- **Request Example:**
```
curl -X PUT http://127.0.0.1:8000/api/trade/1 \
  -H "Content-Type: application/json" \
  -d "{\"buy_order_id\": \"5\", \"sell_order_id\": \"6\", \"message\": \"test55\", \"amount\": \"11\"}"
```
- **Response Example:**
```
[
    "updated success",
    {
        "id": 1,
        "buy_order_id": 5,
        "sell_order_id": 6,
        "message": "test55.",
        "amount": "11",
        "created_at": "2025-04-18T06:06:57.000000Z",
        "updated_at": "2025-04-18T06:06:57.000000Z"
    }
]
```
</details>

<details>
  <summary><b>DELETE /currency/:id — Delete Trade</b></summary>

- **Method:** `DELTE`
- **Endpoint:** `api/trade/:id`
- **Request Example:**
```
curl -X DELETE http://127.0.0.1:8000/api/trade/1
```
- **Response Example:**
```
{
  "deleted success"
}
```
</details>
