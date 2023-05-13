# Task Management System

This is a task management system built with Laravel and JavaScript, allowing users to create, update, and prioritize tasks within different projects.

## Features

- Create, edit, and delete tasks
- Assign tasks to specific projects
- Prioritize tasks using drag-and-drop functionality

## Installation

### Prerequisites

- PHP (>= 8.1)
- Composer
- Node.js (>= 12.0)
- npm

### Clone the repository

```shell
git clone https://github.com/Ali-Hamza-Abbas/task-management-system-with-drag-and-drop.git
```

Navigate to the project directory

```shell
cd task-management-system
```

Install dependencies:

```shell
composer install
npm install && npm run dev
```

Configure environment variables:

Create a copy of the .env.example file and rename it to .env.
Update the file with your own database credentials and other necessary configurations.
Generate application key:

```shell
php artisan key:generate
```

Run migrations:
```shell
php artisan migrate
```

Start the local development server:
```shell
php artisan serve
```

Usage
Create a new project and add tasks to it.
Drag and drop tasks to change their priority.
Edit or delete tasks as needed.
Deployment
Follow these steps to deploy the application on a server:

Set up a web server (e.g., Apache, Nginx) and configure it to point to the project's public directory.

Create a new database on your server and update the .env file with the database credentials.

Copy the project files to your server.

Install the project dependencies:

```shell
composer install --optimize-autoloader --no-dev
npm install && npm run prod
```

Generate an application key:

```shell
php artisan key:generate --force
```

Run migrations:

```shell
php artisan migrate --force
```

Set proper file permissions to the required directories.

Configure any necessary server-specific settings (e.g., environment variables, virtual hosts).

Access the application through your server's domain or IP address.

Contributing
Contributions are welcome! Feel free to fork the repository and submit pull requests.

License
This project is licensed under the MIT License. See the LICENSE file for more information.


