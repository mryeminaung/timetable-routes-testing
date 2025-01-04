# Scheduling Exam Timetable using CSP Solutions

## Overview

The project aims to create an exam schedule using Constraint Satisfaction Problem (CSP) solutions that accommodates the needs of all stakeholders. This schedule will address constraints such as:
- Allowing invigilators teaching a subject to be exempt from waiting for the exam room except the requested.
- Ensuring that each invigilator spends time in the exam room at least once a day as soon as possible.
- Guaranteeing that each student can only take one exam per day.

By using **CSP solutions**, this project aims to efficiently and effectively develop a timetable that meets the requirements of all parties involved in the examination process.

**Note:** This repository is intended solely for CSP project API testing.

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

-   PHP (version 7.3 or higher)
-   Composer
-   Node.js and npm (for front-end dependencies)
-   A web server (Apache)
-   A database server (MySQL)

## Steps

1. **Clone the Repository**

    ```bash
    git clone https://github.com/mryeminaung/timetable-routes-testing.git
    ```

2. **Change directory**
    ```bash
    cd timetable-routes-testing
    ```

3. **Install Dependencies**
   Run the following command to install PHP dependencies:

    ```bash
    composer install
    ```

4. **Copy the Environment File**
   Laravel requires a `.env` file for environment configuration. Copy the example file:

    ```bash
    cp .env.example .env
    ```

5. **Generate the Application Key**
   The application key is used for encryption. Generate it with:

    ```bash
    php artisan key:generate
    ```

6. **Configure the `.env` File**
   Open the `.env` file and set up your database credentials and other configurations:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

7. **Run Database Migrations**
   To create the necessary database tables, run:

    ```bash
    php artisan migrate
    ```

   **Optional Steps:**
   
   **Seed the Database**
   After running migrations, populate the database with initial data if the repository includes database seeders:
   ```bash
   php artisan db:seed
   ```

8. **Install Frontend Dependencies** (if applicable)
   If the project uses frontend tools, install the dependencies:

    ```bash
    npm install
    ```

    Optionally, compile the frontend assets:

    ```bash
    npm run dev
    ```

9. **Start the Development Server**
   To start a local development server, use:
    ```bash
    php artisan serve
    ```
    The server will be available at [http://localhost:8000](http://localhost:8000).

---

You should now have the Laravel project up and running!
