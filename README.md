# Education Management System

Legacy core PHP school management project with separate admin and student panels.

This update keeps the original folder structure, but adds:

- environment-based database configuration
- prepared statements in the shared data layer
- password hashing with legacy plain-text password upgrade support
- safer admin route loading
- cleaner setup files and demo database imports

## Requirements

- PHP 8.1+ recommended
- MySQL 8+ or MariaDB 10.5+
- `mysqli` with `mysqlnd`
- Apache, Nginx, XAMPP, MAMP, or PHP built-in server

## Project Structure

- `index.php`: public landing page
- `meadmin/`: admin panel
- `students/`: student panel
- `setting/config.php`: shared bootstrap and database layer
- `database/schema.sql`: clean database schema
- `database/demo-data.sql`: demo records for local testing
- `project2.sql`: original legacy dump kept for backward compatibility

## Fresh Setup

1. Clone or copy the project into your web root.
2. Copy `.env.example` to `.env`.
3. Update `.env` with your local database credentials.
4. Create the database:

```sql
CREATE DATABASE project2 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

5. Import the clean schema:

```bash
mysql -u root -p project2 < database/schema.sql
```

6. Import demo data:

```bash
mysql -u root -p project2 < database/demo-data.sql
```

7. Start the project in your local server.

If you want to use PHP's built-in server:

```bash
php -S 127.0.0.1:8000
```

8. Open:

- `http://127.0.0.1:8000/`
- `http://127.0.0.1:8000/meadmin/`
- `http://127.0.0.1:8000/students/`

## Demo Accounts

- Admin login
  - Username: `ravi@ravi`
  - Password: `Admin1234`
- Student login
  - Username: `ravi2056`
  - Password: `Student1234`

## Legacy Upgrade Path

If you already have an old database created from `project2.sql`, you can still use it.

1. Point `.env` to that database.
2. Log in with the old credentials.
3. On successful login, legacy plain-text passwords are automatically re-hashed by the updated code.

This lets you move forward without breaking older installs immediately.

## Suggested Next Phase

- split the shared database class into service classes
- add CSRF protection to forms
- move repeated layouts into shared partials
- replace template text and placeholder W3Layouts content
- add automated tests for login and CRUD flows
