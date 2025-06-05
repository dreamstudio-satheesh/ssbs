# API Endpoints

The application exposes a JSON API under the `/api` prefix. The routes are defined in `routes/api.php` and handled by controllers located in `app/Http/Controllers/Api`.

## Available Endpoints

| Method | Endpoint | Description |
| ------ | -------- | ----------- |
| `GET` | `/api/products` | List all products |
| `GET` | `/api/products/{id}` | Get details of a specific product |
| `GET` | `/api/services` | List all services |
| `GET` | `/api/services/{id}` | Get details of a specific service |
| `GET` | `/api/projects` | List all projects |
| `GET` | `/api/projects/{id}` | Get details of a specific project |
| `GET` | `/api/galleries` | List all gallery items |
| `GET` | `/api/galleries/{id}` | Get details of a specific gallery item |
| `GET` | `/api/awards` | List all awards |
| `GET` | `/api/awards/{id}` | Get details of a specific award |
| `GET` | `/api/contacts` | List all contact form submissions |
| `GET` | `/api/contacts/{id}` | Get details of a specific contact submission |

## Planned Endpoints

The repository contains controllers for additional functionality that currently do not have routes:

- `HomeController` for `/api/home` – returns recent projects, sliders, and calculator configuration.
- `AboutController` for `/api/about` – returns company information, management team, and awards.
- `ContactController@store` for `POST /api/contact` – handles contact form submissions.

These endpoints may be enabled in the future to support the front end.

