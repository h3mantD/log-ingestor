[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/2sZOX9xt)

<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->

<a name="readme-top"></a>

### Built With

-   [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Prerequisites

Prerequisites for running the projects are

-   Docker
-   MongoDb database connection URL

### Installation

1. Clone the repo
    ```bash
    git clone https://github.com/h3mantD/log-ingestor.git
    ```
2. Go in project directory
    ```bash
    cd log-ingestor
    ```
3. Create .env file using .env.sample
    ```bash
    cp .env.sample .env
    ```
4. Add your mongodb connection url in .env
    ```bash
    DB_URL=<your-mongodb-connection-string>
    ```
5. Run the docker
    ```
    docker compose up -d
    ```
6. Open the docker containers shell to install the dependency packages
    ```bash
    docker exec -it log-ingestor-laravel.test-1 sh
    ```
7. Once you are in container shell then execute following commands to install dependencies
    ```bash
    composer install
    npm install
    npm run build
    ```
8. Exit the container shell
    ```bash
    exit
    ```
9. Restart the docker container
    ```bash
    docker restart log-ingestor-laravel.test-1
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->

# API Documentation

The purpose of this API is to ingest logs into the database.

## Authentication

No authentication is required.

## Base URL

The base URL for the API is `http://localhost:3000/api/v1`.

## Endpoints

### 1. `POST /ingest-logs`

Ingests logs into the database.

#### Request

```bash
curl -X POST   -H "Accept: application/vnd.api+json"   -H "Content-Type: application/vnd.api+json"   -d '{
    "logs": {
      "level": "error",
      "message": "Failed to connect to DB",
      "resourceId": "server-1234",
      "timestamp": "2023-09-15T08:00:00Z",
      "traceId": "abc-xyz-123",
      "spanId": "span-456",
      "commit": "5e5342f",
      "metadata": {
        "parentResourceId": "server-0987"
      }
    }
  }'   http://localhost:3000/api/v1/ingest-logs
```

### 2. `GET /logs`

Retrieve logs with optional pagination and filtering.

#### Request

```bash
# Retrieve logs, default page size (10 logs per page)
curl -X GET http://localhost:3000/api/v1/logs

# Retrieve logs of page 2
curl -X GET http://localhost:3000/api/v1/logs?page=2

# Retrieve logs of page 2 with page size 1
curl -X GET http://localhost:3000/api/v1/logs?page=2&page_size=1

# Filtering level with error
Curl -X GET http://localhost:3000/api/v1/logs?level=error

# Nesting filtering with level and message
Curl -X GET http://localhost:3000/api/v1/logs?level=error&message=Failed%20to%20connect%20to%20DB

# Filtering with metadata.parentResourceId
Curl -X GET http://localhost:3000/api/v1/logs?metadata.parentResourceId=server-0987
```

# UI Details

Visit localhost:3000 to view the UI

1. Register a new user
2. Login with the registered user
3. Now you can see the the logs in the UI and also you can filter them

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

h3mantd - [@h3mant_d](https://twitter.com/h3mant_d)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com
