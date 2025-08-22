# PHP CRUD Application

This is a simple PHP CRUD (Create, Read, Update, Delete) application that allows users to manage records and upload images to the server.

## Project Structure

```
php-crud-app
├── src
│   ├── config.php          # Configuration settings for the application
│   ├── db.php              # Database connection and instance retrieval
│   ├── index.php           # Main entry point displaying records
│   ├── create.php          # Handles creation of new records and image uploads
│   ├── read.php            # Retrieves and displays a specific record
│   ├── update.php          # Manages updating of existing records
│   ├── delete.php          # Handles deletion of records
│   └── uploads             # Directory for storing uploaded images
├── public
│   └── images              # Directory for publicly accessible images
├── composer.json           # Composer configuration file
└── README.md               # Project documentation
```

## Requirements

- PHP 7.4 or higher
- A web server (e.g., Apache, Nginx)
- MySQL or MariaDB database

## Setup Instructions

1. Clone the repository:
   ```
   git clone https://github.com/microsoft/vscode-remote-try-php.git
   ```

2. Navigate to the project directory:
   ```
   cd php-crud-app
   ```

3. Install dependencies using Composer:
   ```
   composer install
   ```

4. Configure the database connection in `src/config.php`:
   - Update the database host, username, password, and database name.

5. Create the database and necessary tables:
   - Use the provided SQL scripts or create the tables manually.

6. Start the web server and navigate to `http://localhost/php-crud-app/src/index.php` to access the application.

## Usage

- **Create**: Use the create form to add new records and upload images.
- **Read**: Click on a record to view its details.
- **Update**: Edit existing records and update their information.
- **Delete**: Remove records from the database.

## Contributing

Feel free to fork the repository and submit pull requests for any improvements or bug fixes.