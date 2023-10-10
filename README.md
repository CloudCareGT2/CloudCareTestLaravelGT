# Laravel Web Application with Token-Based Authentication and Punk API Proxy

This project is an implementation of a web application using Laravel that provides token-based authentication after a user logs in with their username and password.

## Table of Contents

- [Laravel Web Application with Token-Based Authentication and Punk API Proxy](#laravel-web-application-with-token-based-authentication-and-punk-api-proxy)
  - [Description](#description)
  - [Features](#features)
  - [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
  - [Usage](#usage)
  - [Contributing](#contributing)
  - [License](#license)
  - [Acknowledgments](#acknowledgments)

## Description

This project implements a web application using Laravel that offers the following functionality:

- User authentication via username and password (registration not required, pre-populated with a user: "root" and password: "password").
- Token-based authentication for secure API access.
- An API proxy exposing Punk API to display a paginated list of beers.

Please note that the graphical interface of this project, although functional, is intentionally designed with a basic and minimalistic appearance for educational purposes.

## Features

- User authentication with tokens.
- API proxy to Punk API for beer data.
- Pre-populated user: "root" and password: "password."

## Getting Started

To get this project up and running, follow these steps:

### Prerequisites

Ensure you have the following prerequisites installed on your system:

- Docker
- Docker Compose

### Installation

Getting this project up and running is as easy as enjoying a cold beer (or two). Follow these steps:

         _.._..,_,_
        (          )
         ]~,"-.-~~[
       .=])' (;  ([
       | ]:: '    [
       '=]): .)  ([
         |:: '    |
          ~~----~~

1. Clone this repository to your local machine:

   ```bash
   git clone https://github.com/your-username/your-project.git
   cd your-project

2. Start the Docker containers in the background:
    ```bash
    docker-compose up -d

3.  Migrate the database:
    ```bash
    docker-compose exec app php artisan migrate

4.  Run tests:
    ```bash
    docker-compose exec app php artisan test

5.  Seed database with initial data:
    ```bash
    docker-compose exec app php artisan db:seed --class=UserSeeder

Or symply:

    (docker-compose up -d \
    && docker-compose exec app php artisan migrate \
    && docker-compose exec app php artisan test \
    && docker-compose exec app php artisan db:seed --class=UserSeeder )

6.  Open your web browser and navigate to:

    http://localhost:8000

Now your project should be up and running with Docker, and you can access it by opening your web browser and pointing it to localhost:8000. Enjoy!

## Usage

To use this web application, follow these steps:

1. Log in using your username and password.

   - Username: "root"
   - Password: "password"

2. After logging in successfully, you will be redirected to the main page.

3. On the main page, you will see a list of beers fetched from the Punk API.

4. To navigate through the list of beers, use the pagination buttons.

   - Click the "Next" button to view the next page of beers.
   - Click the "Previous" button to go back to the previous page.

Feel free to explore the beer catalog and enjoy browsing through the selection!

## Contributing

We appreciate contributions from the community to make this project better. If you'd like to contribute, please follow these guidelines:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes, and ensure that your code adheres to our coding standards.
4. Write tests if applicable.
5. Submit a pull request.

We would like to extend our gratitude to My for being a constant source of knowledge and inspiration. Additionally, we want to thank all the developers who paved the way and persevered before us. Your dedication and hard work have made projects like this possible.

Let's continue building great software together!

## License

This project is licensed under the terms of the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

We would like to express our gratitude to the following:

- [Docker](https://www.docker.com/) for simplifying containerization and deployment.
- [Laravel](https://laravel.com/) for providing a robust and elegant framework for web development.

Thank you to the open-source communities behind Docker and Laravel for their invaluable contributions to the world of software development.
