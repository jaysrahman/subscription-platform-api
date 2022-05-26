## How to Use

There are eight endpoints in this API. You can add a website and then add subscribers. After that you can subscribe to the desired website. When you add a post, subscribers of the website will get an email containing the title and description.

- Get the lists
```http
GET /api/post/list
```
```http
GET /api/website/list
```
```http
GET /api/subscriber/list
```
```http
GET /api/subscribe/list
```

- Create a new post
```http
GET /api/post/create?title=TitleTest1&description=DescTest1&id_website=1
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `title` | `string` | **Required**. Post Title |
| `description` | `string` | **Required**. Post Description |
| `id_website` | `string` | **Required**. Website Id |

- Create a new website
```http
GET /api/website/create?domain=www.bismillah.com
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `domain` | `string` | **Required**. Website Domain |

- Create a new subscriber
```http
GET /api/subscriber/create?email=guasislow123@gmail.com
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `email` | `string` | **Required**. Subscriber Email |

- Subscribe to the website
```http
GET /api/subscribe?id_subscriber=3&id_website=2
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `id_subscriber` | `string` | **Required**. Subscriber Id |
| `id_website` | `string` | **Required**. Website Id |

## Responses

Many API endpoints return the JSON representation of the resources created or edited. However, if an invalid request is submitted, or some other error occurs, this API returns a JSON response in the following format:

```javascript
{
    "status": {
        "status": string,
        "message": string
    },
    "result": string or Array of string
}
```

The `status` attribute describes if the transaction was successful or not.

The `message` attribute contains a message commonly used to indicate errors or, in the case of deleting a resource, success that the resource was properly deleted.

The `result` attribute contains any other metadata associated with the response. This will be an escaped string containing JSON data.

## Status Codes

This API returns the following status codes :

| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |
| 201 | `CREATED` |
| 400 | `BAD REQUEST` |
