# S4 Computer Engineering Results Website

This project is a simple web application for publishing and viewing exam results for S4 Computer Engineering students.

## Features

*   Students can view results by entering their PRN.
*   Admin panel for adding new results.
*   Responsive design (works on mobile and desktop).

## Technologies Used

*   PHP
*   MySQL
*   HTML
*   CSS
*   XAMPP

## Database Structure

The database is named `exam_results` and contains two tables: `users` (for admin login) and `results` (for student results).  The `exam_results.sql` file contains the SQL commands to create the database and tables.

## Setup Instructions

1.  **Install XAMPP:** Download and install XAMPP.
2.  **Start Apache and MySQL:** Open the XAMPP Control Panel and start Apache and MySQL.
3.  **Create Database:**
    *   Open phpMyAdmin (usually at `http://localhost/phpmyadmin`).
    *   Import the `exam_results.sql` file to create the database and tables.
    *    **Important:** After importing, immediately change the default admin password in the `users` table to a strong, unique password.  Do *not* use the default password in a production environment.
4.  **Place Files:** Clone this repository into your XAMPP `htdocs` directory:

    ```bash
    cd /path/to/your/xampp/htdocs
    git clone https://github.com/rahulpr365/exam_results.git
    ```
    (Or download the ZIP file and extract it to `htdocs`.)

5.  **Configure Database Connection (IMPORTANT):**
    *   Edit the `config/config.php` file.
    *   If you created a MySQL user other than `root`, update the `$user` and `$pass` variables accordingly.  It is *highly recommended* that you create a separate MySQL user with limited privileges, rather than using `root`.

6.  **Access the Website:** Open your web browser and go to `http://localhost/exam_results/`.

## Usage

*   **Student:** Go to `http://localhost/exam_results/` and enter your PRN to view your results.
*   **Admin:** Go to `http://localhost/exam_results/login.php` and log in with the admin credentials (username: `Admin`, password: *the password you set after importing the database*).  Then go to `http://localhost/exam_results/admin/admin.php` to add results.

## Important Considerations

*   **Security:** This is a basic example and has significant security vulnerabilities.  It is *not* suitable for a production environment without major security improvements, including:
    *   **Password Hashing:** Use `password_hash()` and `password_verify()` to securely store and verify passwords.
    *   **Prepared Statements:** Use prepared statements with parameterized queries to prevent SQL injection.
    *   **Input Validation:** Thoroughly validate all user input.
    *   **Session Security:** Implement proper session security measures.
    *  **Database User Privileges**: Create a dedicated MySQL user with restricted privileges for your application.  Do not use the `root` user.

*   **Credentials:**  *Never* store sensitive credentials (like database passwords) directly in your code, especially in a public GitHub repository.  Use environment variables or a separate configuration file that is *not* committed to the repository.
