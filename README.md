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
├── routes/                 # URL routing configuration
├── core/                   # Core utilities and helpers
├── public/                 # Public assets (CSS, JS, images)
├── index.php               # Main entry point for the application
├── .htaccess               # Clean URLs
└── README.md               # Project documentation
