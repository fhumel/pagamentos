# Rotas da aplica��o
**M�todo:** `POST`

**Endpoint:** `/user`

**Request Payload (application/json):**
```
    {
        "name": "Fernando",
        "cpf": "421.738.448-30,",
        "email": "fhumel@hotmail.com",
        "password": "123456",
        "type": "comum"
    }

    {
        "name": "Loja",
        "cpf": "421.738.448-30,",
        "email": "fhumel@hotmail.com",
        "password": "123456",
        "type": "logista"
    }
```

**Response (201 - Created):**
```
{
   "descricao" => "Usuário criado com sucesso.",
   "user" => {
        "id": "1",
        "cpf": "558.895.950-75",
        "name": "Fernando",
        "email": "fhumel@hotmail.com",
        "type": "comum"
    {
}
```

**Response (422 - Unprocessable Entity):**
```
{
    "errors": {
        "cpf": [
            "The cpf has already been taken.",
            "The cpf may not be greater than 14 characters."
        ],
        "email": [
            "The email has already been taken."
        ],
        "type": [
            "The type must be an integer."
        ]
    }
}
```

**Método:** `POST`

**Endpoint:** `/deposit`

**Request Payload (application/json):**
```
{
    "id": 2,
    "money": 100.10
}
```

**Response (200 - OK):**
```
{
    "codigo": 201,
    "descricao": "Valor depositado com sucesso.",
    "money": 800.1,
    "tranferId": 2
}
```

**M�todo:** `POST`

**Endpoint:** `/transaction`

**Request Payload (application/json):**
```
{
    "value": 0.2,
    "payee": 3,
    "payer": 2
}
```

**Response (200 - OK):**
```
{
    "descricao" => "Valor transferido com sucesso.",
    "money" => 510.20,
}
```
**Método:** `GET`

**Endpoint:** `/balance`

**Request Payload (application/json):**
```
{
    "id": 1
}
```

**Response (200 - OK):**
```
{
    "codigo": 302,
    "descricao": "Carteira listada com sucesso.",
    "wallet": {
        "id": 1,
        "money": "3.600",
        "created_at": "2020-12-08T20:39:03.000000Z",
        "updated_at": "2020-12-08T20:39:03.000000Z"
    }
}
```

**M�todo:** `GET`

**Endpoint:** `/transaction`

**Request Payload (application/json):**
```
{
    "id": 1
}
```

**Response (200 - OK):**
```
{
    "codigo": 302,
    "descricao": "Carteira listada com sucesso.",
    "wallet": {
        "id": 1,
        "money": "3.600",
        "created_at": "2020-12-08T20:39:03.000000Z",
        "updated_at": "2020-12-08T20:39:03.000000Z"
    }
}
```

**M�todo:** `GET`

**Endpoint:** `/list`

**Request Payload (application/json):**
```
{
}
```

**Response (200 - OK):**
```
[
    {
        "id": 1,
        "name": "lucas",
        "cpf": "1540123d2sd3dddd00",
        "email": "lucas@hddotmdaddsdiil.com",
        "wallet_id": 12,
        "type": 1,
        "created_at": "2020-12-08T20:47:06.000000Z",
        "updated_at": "2020-12-08T20:47:06.000000Z"
    }
]
```

