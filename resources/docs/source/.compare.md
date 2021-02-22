---
title: API Reference

language_tabs:
- javascript
- php
- python

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://expense-manager-back.local/docs/collection.json)

<!-- END_INFO -->

#Auth


<!-- START_2be1f0e022faf424f18f30275e61416e -->
## Get token

> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "example@email.com",
    "password": "123456"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://expense-manager-back.local/api/v1/auth/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'email' => 'example@email.com',
            'password' => '123456',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/auth/login'
payload = {
    "email": "example@email.com",
    "password": "123456"
}
headers = {
  'Content-Type': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST api/v1/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | User email.
        `password` | string |  required  | User password.
    
<!-- END_2be1f0e022faf424f18f30275e61416e -->

<!-- START_37f80330bffb056e64f5a48f9bc90452 -->
## Refresh token

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/auth/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://expense-manager-back.local/api/v1/auth/refresh',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/auth/refresh'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PATCH', url, headers=headers)
response.json()
```



### HTTP Request
`PATCH api/v1/auth/refresh`


<!-- END_37f80330bffb056e64f5a48f9bc90452 -->

<!-- START_3157fb6d77831463001829403e201c3e -->
## Register user

> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ipsum",
    "email": "non",
    "password": "nostrum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://expense-manager-back.local/api/v1/auth/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'name' => 'ipsum',
            'email' => 'non',
            'password' => 'nostrum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/auth/register'
payload = {
    "name": "ipsum",
    "email": "non",
    "password": "nostrum"
}
headers = {
  'Content-Type': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST api/v1/auth/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | User name
        `email` | string |  required  | User email
        `password` | string |  required  | User password
    
<!-- END_3157fb6d77831463001829403e201c3e -->

<!-- START_a68ff660ea3d08198e527df659b17963 -->
## Logout user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://expense-manager-back.local/api/v1/auth/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/auth/logout'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/v1/auth/logout`


<!-- END_a68ff660ea3d08198e527df659b17963 -->

<!-- START_8a4d15dcbadf16adf64dd6109f40540a -->
## Get authenticated user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/user/profile',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/user/profile'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/user/profile`


<!-- END_8a4d15dcbadf16adf64dd6109f40540a -->

#Charts


<!-- START_634da4633d8de5b894f5dd049e5ec8d6 -->
## Income expense categories

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/chart/income-expense/category"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/chart/income-expense/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/chart/income-expense/category'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/chart/income-expense/category`


<!-- END_634da4633d8de5b894f5dd049e5ec8d6 -->

<!-- START_9ffc4765520fcbcb8b3ad722760369f9 -->
## Month wise

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/chart/income-expense/month-wise"
);

let params = {
    "month": "6",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/chart/income-expense/month-wise',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'month'=> '6',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/chart/income-expense/month-wise'
params = {
  'month': '6',
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```



### HTTP Request
`GET api/v1/chart/income-expense/month-wise`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `month` |  optional  | Number of month to get data (default: 12)

<!-- END_9ffc4765520fcbcb8b3ad722760369f9 -->

<!-- START_f04ff288fa5d56f67118d32a9751d926 -->
## Month and category wise

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/chart/income-expense/category-wise"
);

let params = {
    "month": "6",
    "category_id": "6",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/chart/income-expense/category-wise',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'month'=> '6',
            'category_id'=> '6',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/chart/income-expense/category-wise'
params = {
  'month': '6',
  'category_id': '6',
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```



### HTTP Request
`GET api/v1/chart/income-expense/category-wise`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `month` |  optional  | Number of month to get data (default: 12)
    `category_id` |  required  | Category id to get data

<!-- END_f04ff288fa5d56f67118d32a9751d926 -->

#Currency


<!-- START_5946f8e504ebe016c6d1726271090af2 -->
## Get currencies

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/currency"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/currency',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/currency'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/currency`


<!-- END_5946f8e504ebe016c6d1726271090af2 -->

<!-- START_1d19b29dd5b536d3d0c1e2f825979a4a -->
## Update currency

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/currency/id"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "currency_id": 18
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/currency/id',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'currency_id' => 18,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/currency/id'
payload = {
    "currency_id": 18
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PUT api/v1/currency/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | User id of whom to update currency
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `currency_id` | integer |  required  | Currency id to update
    
<!-- END_1d19b29dd5b536d3d0c1e2f825979a4a -->

#Expense


<!-- START_6c9a91483f538cb21d2f06cea559b1ef -->
## Get expenses

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense"
);

let params = {
    "per_page": "10",
    "sort_col": "created_at",
    "sort_order": "desc",
    "search_col": "category_name",
    "search_by": "Lent",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/expense',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'per_page'=> '10',
            'sort_col'=> 'created_at',
            'sort_order'=> 'desc',
            'search_col'=> 'category_name',
            'search_by'=> 'Lent',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense'
params = {
  'per_page': '10',
  'sort_col': 'created_at',
  'sort_order': 'desc',
  'search_col': 'category_name',
  'search_by': 'Lent',
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```



### HTTP Request
`GET api/v1/expense`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `per_page` |  optional  | Rows per page (default: 10)
    `sort_col` |  optional  | Column name to sort (default: id)
    `sort_order` |  optional  | Column sort order (asc\|desc)
    `search_col` |  optional  | Column name to search
    `search_by` |  optional  | Text to search for

<!-- END_6c9a91483f538cb21d2f06cea559b1ef -->

<!-- START_60579bdd3d33b3083dc46544d75a1b17 -->
## Store expense

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "expense_date": "2020-03-30 21:08:36",
    "category_id": 1,
    "amount": 100,
    "spent_on": "Breakfast",
    "remarks": "Coffee and toast"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://expense-manager-back.local/api/v1/expense',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'expense_date' => '2020-03-30 21:08:36',
            'category_id' => 1,
            'amount' => 100.0,
            'spent_on' => 'Breakfast',
            'remarks' => 'Coffee and toast',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense'
payload = {
    "expense_date": "2020-03-30 21:08:36",
    "category_id": 1,
    "amount": 100,
    "spent_on": "Breakfast",
    "remarks": "Coffee and toast"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST api/v1/expense`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `expense_date` | datetime |  required  | Expense date
        `category_id` | integer |  required  | Expense category id
        `amount` | float |  required  | Expense amount
        `spent_on` | string |  required  | Expense reason
        `remarks` | string |  required  | Expense remarks
    
<!-- END_60579bdd3d33b3083dc46544d75a1b17 -->

<!-- START_bd367ca3c50ad0b153f8451cf7401401 -->
## Summary of expenses

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/summary"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/expense/summary',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/summary'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/expense/summary`


<!-- END_bd367ca3c50ad0b153f8451cf7401401 -->

<!-- START_fbc7b9c14edd8f64f10ad0ee83f8fe8e -->
## Show expense

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/expense/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/expense/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Expense id to show

<!-- END_fbc7b9c14edd8f64f10ad0ee83f8fe8e -->

<!-- START_23c704aa942ff9a6532a082ef98b9a03 -->
## Update expense

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "category_id": 1,
    "amount": 100,
    "spent_on": "Breakfast",
    "remarks": "Coffee and toast"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/expense/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'category_id' => 1,
            'amount' => 100.0,
            'spent_on' => 'Breakfast',
            'remarks' => 'Coffee and toast',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/1'
payload = {
    "category_id": 1,
    "amount": 100,
    "spent_on": "Breakfast",
    "remarks": "Coffee and toast"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PUT api/v1/expense/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Expense id to update
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `category_id` | integer |  required  | Expense category id
        `amount` | float |  required  | Expense amount
        `spent_on` | string |  required  | Expense reason
        `remarks` | string |  required  | Expense remarks
    
<!-- END_23c704aa942ff9a6532a082ef98b9a03 -->

<!-- START_11815a575159b90d85374e04e539c740 -->
## Delete expense

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://expense-manager-back.local/api/v1/expense/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/v1/expense/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Expense id to delete

<!-- END_11815a575159b90d85374e04e539c740 -->

#Expense Category


<!-- START_ce6221aac373bb69af5f5193c90a2640 -->
## Get expense categories

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/expense/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/category'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/expense/category`


<!-- END_ce6221aac373bb69af5f5193c90a2640 -->

<!-- START_33cdc2251c046e82181014862c60a9fb -->
## Store expense category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "category_name": "Shopping"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://expense-manager-back.local/api/v1/expense/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'category_name' => 'Shopping',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/category'
payload = {
    "category_name": "Shopping"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST api/v1/expense/category`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `category_name` | string |  required  | -
    
<!-- END_33cdc2251c046e82181014862c60a9fb -->

<!-- START_8b1e6798f87645262280e6f62beb6dc0 -->
## Show a category info

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/expense/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/category/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/expense/category/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Category id to show

<!-- END_8b1e6798f87645262280e6f62beb6dc0 -->

<!-- START_042c6582866c0e8b628c81cd5f5a4bca -->
## Update a category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "category_name": "Travel"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/expense/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'category_name' => 'Travel',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/category/1'
payload = {
    "category_name": "Travel"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PUT api/v1/expense/category/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Category id to update
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `category_name` | string |  required  | New category name to update
    
<!-- END_042c6582866c0e8b628c81cd5f5a4bca -->

<!-- START_5a6ba88e3aac8a1cd69028afa7001529 -->
## Delete a category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://expense-manager-back.local/api/v1/expense/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/expense/category/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/v1/expense/category/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Category id to delete

<!-- END_5a6ba88e3aac8a1cd69028afa7001529 -->

#Income


<!-- START_48796c45c860f3a6b27d767b36ba480c -->
## Get incomes

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income"
);

let params = {
    "per_page": "10",
    "sort_col": "created_at",
    "sort_order": "desc",
    "search_col": "category_name",
    "search_by": "Salary",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/income',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'per_page'=> '10',
            'sort_col'=> 'created_at',
            'sort_order'=> 'desc',
            'search_col'=> 'category_name',
            'search_by'=> 'Salary',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income'
params = {
  'per_page': '10',
  'sort_col': 'created_at',
  'sort_order': 'desc',
  'search_col': 'category_name',
  'search_by': 'Salary',
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers, params=params)
response.json()
```



### HTTP Request
`GET api/v1/income`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `per_page` |  optional  | Rows per page (default: 10)
    `sort_col` |  optional  | Column name to sort (default: id)
    `sort_order` |  optional  | Column sort order (asc\|desc)
    `search_col` |  optional  | Column name to search
    `search_by` |  optional  | Text to search for

<!-- END_48796c45c860f3a6b27d767b36ba480c -->

<!-- START_e745a52cafdc8b3cd8351b9b263f7714 -->
## Store income

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "income_date": "2020-03-30 21:08:36",
    "category_id": 1,
    "amount": 100,
    "source": "Salary",
    "notes": "Through bank"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://expense-manager-back.local/api/v1/income',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'income_date' => '2020-03-30 21:08:36',
            'category_id' => 1,
            'amount' => 100.0,
            'source' => 'Salary',
            'notes' => 'Through bank',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income'
payload = {
    "income_date": "2020-03-30 21:08:36",
    "category_id": 1,
    "amount": 100,
    "source": "Salary",
    "notes": "Through bank"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST api/v1/income`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `income_date` | datetime |  required  | Income date
        `category_id` | integer |  required  | Income category id
        `amount` | float |  required  | Income amount
        `source` | string |  required  | Income from
        `notes` | string |  required  | Income notes
    
<!-- END_e745a52cafdc8b3cd8351b9b263f7714 -->

<!-- START_6a3e55e453c82aab1bc1d4a98234d371 -->
## Summary of incomes

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/summary"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/income/summary',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/summary'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/income/summary`


<!-- END_6a3e55e453c82aab1bc1d4a98234d371 -->

<!-- START_be9c62ab763c7560ff48e200ea238ad3 -->
## Show income

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/income/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/income/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Income id to show

<!-- END_be9c62ab763c7560ff48e200ea238ad3 -->

<!-- START_b5d52bbc5b1845dcc26184745884975f -->
## Update income

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "income_date": "2020-03-30 21:08:36",
    "category_id": 1,
    "amount": 100,
    "source": "Business",
    "notes": "Cash"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/income/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'income_date' => '2020-03-30 21:08:36',
            'category_id' => 1,
            'amount' => 100.0,
            'source' => 'Business',
            'notes' => 'Cash',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/1'
payload = {
    "income_date": "2020-03-30 21:08:36",
    "category_id": 1,
    "amount": 100,
    "source": "Business",
    "notes": "Cash"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PUT api/v1/income/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Income id to update
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `income_date` | datetime |  required  | Income date
        `category_id` | integer |  required  | Income category id
        `amount` | float |  required  | Income amount
        `source` | string |  required  | Income from
        `notes` | string |  required  | Income notes
    
<!-- END_b5d52bbc5b1845dcc26184745884975f -->

<!-- START_a488b757449676ff235df9e055c9d00c -->
## Delete income

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://expense-manager-back.local/api/v1/income/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/v1/income/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Income id to delete

<!-- END_a488b757449676ff235df9e055c9d00c -->

#Income Category


<!-- START_5f8f96bee13321919da58768be0d686c -->
## Get income categories

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/income/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/category'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/income/category`


<!-- END_5f8f96bee13321919da58768be0d686c -->

<!-- START_e764dbf71438b5a3ef519b6e505fbce8 -->
## Store income category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "category_name": "Salary"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://expense-manager-back.local/api/v1/income/category',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'category_name' => 'Salary',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/category'
payload = {
    "category_name": "Salary"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST api/v1/income/category`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `category_name` | string |  required  | -
    
<!-- END_e764dbf71438b5a3ef519b6e505fbce8 -->

<!-- START_4d10562df3dc7389d8a10214ade54eb1 -->
## Show a category info

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/income/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/category/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/income/category/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Category id to show

<!-- END_4d10562df3dc7389d8a10214ade54eb1 -->

<!-- START_78509b665b00ca17b2dfa251a58ddc61 -->
## Update a category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "category_name": "Profit"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/income/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'category_name' => 'Profit',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/category/1'
payload = {
    "category_name": "Profit"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PUT api/v1/income/category/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Category id to update
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `category_name` | string |  required  | New category name to update
    
<!-- END_78509b665b00ca17b2dfa251a58ddc61 -->

<!-- START_2eb49be540117c6a29333c70cbcfaf58 -->
## Delete a category

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://expense-manager-back.local/api/v1/income/category/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/income/category/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/v1/income/category/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | Category id to delete

<!-- END_2eb49be540117c6a29333c70cbcfaf58 -->

#Summary


<!-- START_ff0287fef8f2f89b741954e56fc156a5 -->
## Current &amp; last month expenses

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/report/expense/months/summary"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/report/expense/months/summary',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/report/expense/months/summary'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/report/expense/months/summary`


<!-- END_ff0287fef8f2f89b741954e56fc156a5 -->

<!-- START_51ffde53c9dd0a5e13465af0d6c099cf -->
## Current &amp; last month incomes

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/report/income/months/summary"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/report/income/months/summary',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/report/income/months/summary'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/report/income/months/summary`


<!-- END_51ffde53c9dd0a5e13465af0d6c099cf -->

<!-- START_166c1a78f2eec94d46a9b17eafbb9a8a -->
## Get all transactions

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/report/transaction"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/report/transaction',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/report/transaction'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/report/transaction`


<!-- END_166c1a78f2eec94d46a9b17eafbb9a8a -->

#User


<!-- START_d7f5c16f3f30bc08c462dbfe4b62c6b9 -->
## Get users

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/user',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/user'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/user`


<!-- END_d7f5c16f3f30bc08c462dbfe4b62c6b9 -->

<!-- START_5de41b48a8c781ad30e8a03f8975e6d6 -->
## Update password

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/password"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "old_password": "123456",
    "new_password": "234567",
    "confirm_password": "234567"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/user/password',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'old_password' => '123456',
            'new_password' => '234567',
            'confirm_password' => '234567',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/user/password'
payload = {
    "old_password": "123456",
    "new_password": "234567",
    "confirm_password": "234567"
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PUT api/v1/user/password`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `old_password` | string |  required  | Old password
        `new_password` | string |  required  | New password
        `confirm_password` | string |  required  | Confirm password
    
<!-- END_5de41b48a8c781ad30e8a03f8975e6d6 -->

<!-- START_31f326ae27eb5409177a03e80aa04d00 -->
## Update logged in user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/update"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "Triss",
    "email": "tiss@email.com",
    "currency_id": 13
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/user/update',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'name' => 'Triss',
            'email' => 'tiss@email.com',
            'currency_id' => 13,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/user/update'
payload = {
    "name": "Triss",
    "email": "tiss@email.com",
    "currency_id": 13
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PUT api/v1/user/update`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | User name
        `email` | string |  required  | User email
        `currency_id` | integer |  required  | User currency id
    
<!-- END_31f326ae27eb5409177a03e80aa04d00 -->

<!-- START_dd3d5501615121fcb8ef0f5ced2a1ecd -->
## Show a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://expense-manager-back.local/api/v1/user/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/user/1'
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/user/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | User id to show

<!-- END_dd3d5501615121fcb8ef0f5ced2a1ecd -->

<!-- START_ad3b44e69f2f97d33193276f45379b9f -->
## Update user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "Ciri",
    "email": "cir@email.com",
    "currency_id": 1
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/user/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'name' => 'Ciri',
            'email' => 'cir@email.com',
            'currency_id' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/user/1'
payload = {
    "name": "Ciri",
    "email": "cir@email.com",
    "currency_id": 1
}
headers = {
  'Content-Type': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PUT api/v1/user/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | User id to update
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | User name
        `email` | string |  required  | User email
        `currency_id` | integer |  required  | User currency id
    
<!-- END_ad3b44e69f2f97d33193276f45379b9f -->


