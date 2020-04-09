---
title: API Reference

language_tabs:
- bash
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

```bash
curl -X POST \
    "http://expense-manager-back.local/api/v1/auth/login" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"email":"example@email.com","password":"123456"}'

```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/auth/login"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
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

```bash
curl -X PATCH \
    "http://expense-manager-back.local/api/v1/auth/refresh" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/auth/refresh"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('PATCH', url, headers=headers)
response.json()
```



### HTTP Request
`PATCH api/v1/auth/refresh`


<!-- END_37f80330bffb056e64f5a48f9bc90452 -->

<!-- START_a68ff660ea3d08198e527df659b17963 -->
## Logout user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://expense-manager-back.local/api/v1/auth/logout" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/auth/logout"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
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

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/user/profile" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/profile"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/user/profile`


<!-- END_8a4d15dcbadf16adf64dd6109f40540a -->

#Expense Category


<!-- START_ce6221aac373bb69af5f5193c90a2640 -->
## Get expense categories

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/expense/category" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
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

```bash
curl -X POST \
    "http://expense-manager-back.local/api/v1/expense/category" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"category_name":"Shopping"}'

```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
            'Content-Type' => 'application/json',
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
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}',
  'Content-Type': 'application/json'
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

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/expense/category/1" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category/1"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
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

```bash
curl -X PUT \
    "http://expense-manager-back.local/api/v1/expense/category/1" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"category_name":"Travel"}'

```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category/1"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
            'Content-Type' => 'application/json',
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
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}',
  'Content-Type': 'application/json'
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

```bash
curl -X DELETE \
    "http://expense-manager-back.local/api/v1/expense/category/1" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/category/1"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
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

#Income Category


<!-- START_5f8f96bee13321919da58768be0d686c -->
## Get income categories

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/income/category" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
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

```bash
curl -X POST \
    "http://expense-manager-back.local/api/v1/income/category" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"category_name":"Salary"}'

```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
            'Content-Type' => 'application/json',
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
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}',
  'Content-Type': 'application/json'
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

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/income/category/1" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category/1"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
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

```bash
curl -X PUT \
    "http://expense-manager-back.local/api/v1/income/category/1" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"category_name":"Profit"}'

```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category/1"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
            'Content-Type' => 'application/json',
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
  'Accept': 'application/json',
  'Authorization': 'Bearer {token}',
  'Content-Type': 'application/json'
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

```bash
curl -X DELETE \
    "http://expense-manager-back.local/api/v1/income/category/1" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/category/1"
);

let headers = {
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json',
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

#general


<!-- START_3157fb6d77831463001829403e201c3e -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://expense-manager-back.local/api/v1/auth/register" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/auth/register"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
    'http://expense-manager-back.local/api/v1/auth/register',
    [
        'headers' => [
            'Accept' => 'application/json',
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
headers = {
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/v1/auth/register`


<!-- END_3157fb6d77831463001829403e201c3e -->

<!-- START_d7f5c16f3f30bc08c462dbfe4b62c6b9 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/user" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/user`


<!-- END_d7f5c16f3f30bc08c462dbfe4b62c6b9 -->

<!-- START_5de41b48a8c781ad30e8a03f8975e6d6 -->
## Update user password

> Example request:

```bash
curl -X PUT \
    "http://expense-manager-back.local/api/v1/user/password" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/password"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
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
            'Accept' => 'application/json',
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
headers = {
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/v1/user/password`


<!-- END_5de41b48a8c781ad30e8a03f8975e6d6 -->

<!-- START_31f326ae27eb5409177a03e80aa04d00 -->
## Update logged in user

> Example request:

```bash
curl -X PUT \
    "http://expense-manager-back.local/api/v1/user/update" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/update"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
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
            'Accept' => 'application/json',
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
headers = {
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/v1/user/update`


<!-- END_31f326ae27eb5409177a03e80aa04d00 -->

<!-- START_dd3d5501615121fcb8ef0f5ced2a1ecd -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/user/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/user/{id}`


<!-- END_dd3d5501615121fcb8ef0f5ced2a1ecd -->

<!-- START_ad3b44e69f2f97d33193276f45379b9f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://expense-manager-back.local/api/v1/user/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/user/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/v1/user/{id}`


<!-- END_ad3b44e69f2f97d33193276f45379b9f -->

<!-- START_6c9a91483f538cb21d2f06cea559b1ef -->
## Display a listing of the resource.

url: /api/v1/expense

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/expense" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
headers = {
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/expense`


<!-- END_6c9a91483f538cb21d2f06cea559b1ef -->

<!-- START_60579bdd3d33b3083dc46544d75a1b17 -->
## Store a newly created resource in storage.

url: /api/v1/expense

> Example request:

```bash
curl -X POST \
    "http://expense-manager-back.local/api/v1/expense" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
    'http://expense-manager-back.local/api/v1/expense',
    [
        'headers' => [
            'Accept' => 'application/json',
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
headers = {
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/v1/expense`


<!-- END_60579bdd3d33b3083dc46544d75a1b17 -->

<!-- START_bd367ca3c50ad0b153f8451cf7401401 -->
## Generate summary of expenses

url: /api/v1/expense/summary

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/expense/summary" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/summary"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/expense/summary`


<!-- END_bd367ca3c50ad0b153f8451cf7401401 -->

<!-- START_fbc7b9c14edd8f64f10ad0ee83f8fe8e -->
## Display the specified resource.

url: /api/v1/expense/{id}

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/expense/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/expense/{id}`


<!-- END_fbc7b9c14edd8f64f10ad0ee83f8fe8e -->

<!-- START_23c704aa942ff9a6532a082ef98b9a03 -->
## Update the specified resource in storage.

url: /api/v1/expense/{id}

> Example request:

```bash
curl -X PUT \
    "http://expense-manager-back.local/api/v1/expense/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/v1/expense/{id}`


<!-- END_23c704aa942ff9a6532a082ef98b9a03 -->

<!-- START_11815a575159b90d85374e04e539c740 -->
## Remove the specified resource from storage.

url: /api/v1/expense/{id}

> Example request:

```bash
curl -X DELETE \
    "http://expense-manager-back.local/api/v1/expense/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/expense/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/v1/expense/{id}`


<!-- END_11815a575159b90d85374e04e539c740 -->

<!-- START_48796c45c860f3a6b27d767b36ba480c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/income" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
headers = {
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/income`


<!-- END_48796c45c860f3a6b27d767b36ba480c -->

<!-- START_e745a52cafdc8b3cd8351b9b263f7714 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://expense-manager-back.local/api/v1/income" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
    'http://expense-manager-back.local/api/v1/income',
    [
        'headers' => [
            'Accept' => 'application/json',
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
headers = {
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST api/v1/income`


<!-- END_e745a52cafdc8b3cd8351b9b263f7714 -->

<!-- START_6a3e55e453c82aab1bc1d4a98234d371 -->
## Generate summary of incomes

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/income/summary" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/summary"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/income/summary`


<!-- END_6a3e55e453c82aab1bc1d4a98234d371 -->

<!-- START_be9c62ab763c7560ff48e200ea238ad3 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/income/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/income/{id}`


<!-- END_be9c62ab763c7560ff48e200ea238ad3 -->

<!-- START_b5d52bbc5b1845dcc26184745884975f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://expense-manager-back.local/api/v1/income/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/v1/income/{id}`


<!-- END_b5d52bbc5b1845dcc26184745884975f -->

<!-- START_a488b757449676ff235df9e055c9d00c -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://expense-manager-back.local/api/v1/income/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/income/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('DELETE', url, headers=headers)
response.json()
```



### HTTP Request
`DELETE api/v1/income/{id}`


<!-- END_a488b757449676ff235df9e055c9d00c -->

<!-- START_5946f8e504ebe016c6d1726271090af2 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/currency" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/currency"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/currency`


<!-- END_5946f8e504ebe016c6d1726271090af2 -->

<!-- START_1d19b29dd5b536d3d0c1e2f825979a4a -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://expense-manager-back.local/api/v1/currency/1" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/currency/1"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://expense-manager-back.local/api/v1/currency/1',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://expense-manager-back.local/api/v1/currency/1'
headers = {
  'Accept': 'application/json'
}
response = requests.request('PUT', url, headers=headers)
response.json()
```



### HTTP Request
`PUT api/v1/currency/{id}`


<!-- END_1d19b29dd5b536d3d0c1e2f825979a4a -->

<!-- START_ff0287fef8f2f89b741954e56fc156a5 -->
## Current and last month expense summary

url: /api/v1/report/expense/months/summary

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/report/expense/months/summary" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/report/expense/months/summary"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/report/expense/months/summary`


<!-- END_ff0287fef8f2f89b741954e56fc156a5 -->

<!-- START_51ffde53c9dd0a5e13465af0d6c099cf -->
## Current and last month income summary

url: /api/v1/report/income/months/summary

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/report/income/months/summary" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/report/income/months/summary"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/report/income/months/summary`


<!-- END_51ffde53c9dd0a5e13465af0d6c099cf -->

<!-- START_166c1a78f2eec94d46a9b17eafbb9a8a -->
## Current and last month income summary

url: /api/v1/report/transaction

> Example request:

```bash
curl -X GET \
    -G "http://expense-manager-back.local/api/v1/report/transaction" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://expense-manager-back.local/api/v1/report/transaction"
);

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
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
            'Accept' => 'application/json',
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
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```



### HTTP Request
`GET api/v1/report/transaction`


<!-- END_166c1a78f2eec94d46a9b17eafbb9a8a -->

