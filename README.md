# Sex Offender Registry System

## 1. Project Description
The **Sex Offender Registry System** is a web-based platform that helps users and administrators manage and track offender data efficiently. Built using **PHP with the MVC architecture**, the system supports user authentication, offender management, offense tracking, and reporting functionalities.

The system differentiates between:
- **Administrators**: Can add, update, delete offender details and manage offenses and reports.
- **General Users**: Can only view offender-related information.

---

## 2. Features

### Key Features:
1. **User Authentication**: Secure login system for admins and general users.
2. **Offender Management**: Add, update, and delete offender records.
3. **Offense Tracking**: Link offenses to offenders, including offense types, dates, and descriptions.
4. **User Roles**:
   - **Admin**: Full CRUD (Create, Read, Update, Delete) access.
   - **General User**: View-only access to offender details.
5. **Report Management**: Track and manage offender-related reports.
6. **MVC Architecture**: Clean separation of concerns (Model-View-Controller) for better maintainability.
7. **Search and Filter**: Easily search for offenders by name, location, or risk level.
8. **Responsive UI**: Accessible user interface for different roles.

---

## 3. Technologies Used

### Technologies:
- **Backend**: PHP (MVC Architecture)
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap
- **Web Server**: Apache
- **Tools**: phpMyAdmin

---

## 4. File Structure

Here is the file structure for the project:

```plaintext
sex-offender-registry/
│
├── config/                 # Database configuration files
├── controllers/            # Application controllers (AuthController, OffenderController, etc.)
├── models/                 # Database models (User.php, Offender.php, Report.php, etc.)
├── views/                  # Frontend views (HTML/PHP pages)
├── public/                 # Public assets (CSS, JS, images)
   ├── index.php               # Main entry point for the application
└── README.md               # Project documentation

## 5 Database

The project uses a MySQL database exported as `registry.db`. The database schema includes the following types of tables:

### Tables

1. **Offenders**
   - `ID` (INTEGER PRIMARY KEY AUTO_INCREMENT)
   - `Name` (VARCHAR(255))
   - `Age` (INTEGER)
   - `Address` (TEXT)
   - `Crime` (VARCHAR(255))
   - `DateOfConviction` (DATE)

---

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/sex-offender-registry.git
   cd sex-offender-registry
   ```

2. **Set Up Local Server**:
   - Use XAMPP, WAMP, or any PHP server environment.
   - Place the project folder in the `htdocs` directory (for XAMPP) or the equivalent for your server.

3. **Import Database**:
   - Start the MySQL server via XAMPP.
   - Open phpMyAdmin by navigating to `http://localhost/phpmyadmin`.
   - Create a new database (e.g., `sex_offender_registry`).
   - Click on the "Import" tab, choose the `registry.db` file, and click "Go."

4. **Configure Database Connection**:
   - Update the database connection settings in your PHP project:
     ```php
     $host = 'localhost';
     $dbname = 'sex_offender_registry';
     $username = 'root'; // Default for XAMPP
     $password = '';     // Default for XAMPP

     $conn = new mysqli($host, $username, $password, $dbname);

     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     ```

5. **Run the Application**:
   - Start your local server and navigate to `http://localhost/sex-offender-registry` in your browser.

---

## Usage

1. **Perform CRUD Operations**:
   - Use the interface to add, update, delete, or search for offender records.

2. **Search Feature**:
   - Use the search bar to locate specific offenders by name, address, or crime.

---

## Database Export

The MySQL database (`registry.db`) is included in the repository for convenience. You can find it in the `database` directory.

### Exporting the Database

To export the database schema or data:

```sql
mysqldump -u root -p sex_offender_registry > registry_dump.sql
```

---

## 6 Contributions

Contributions are welcome! Please fork the repository and submit a pull request.

---

## Contact

For questions or support, please contact:

- **Email**: meronmuluye22@gmail.com
- **GitHub**: https://github.com/merraa
