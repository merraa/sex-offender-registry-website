<?php
require_once('C:\xampp2\htdocs\SexOffenderRegistryWebsite\config\Db.class.php');

// User class extends the Db class for database interactions
class User extends Db
{
    // Create a new user with provided details
    public function createUser($name, $email, $password, $role)
    {
        // Hash the password for secure storage
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Use a prepared statement to insert the user data
        $query = "INSERT INTO user (Name, Email, Password, Role) VALUES (?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($query);

        try {
            $stmt->bind_param('ssss', $name, $email, $hashedPassword, $role);
            $stmt->execute();
            return true;
        } catch (Exception $er) {
            // Handle database exceptions
            echo "Error creating user: " . $er->getMessage();
            return false;
        }
    }

    // Retrieve a user by their ID
    public function getUserById($id)
    {
        $query = "SELECT * FROM user WHERE UserId = ?";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Retrieve a user by their email address
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM user WHERE Email = ?";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Get a list of all users
    public function getAllUsers()
    {
        $query = "SELECT * FROM user";
        $result = $this->getConnection()->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Update a user's details
    public function updateUser($id, $name, $email, $role)
    {
        $query = "UPDATE user SET Name = ?, Email = ?, Role = ? WHERE UserId = ?";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bind_param('sssi', $name, $email, $role, $id);
        return $stmt->execute();
    }

    // Delete a user by their ID
    public function deleteUser($id)
    {
        $query = "DELETE FROM user WHERE UserId = ?";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    // Get the total number of users in the database
    public function getTotalUsers()
    {
        $query = "SELECT COUNT(*) AS total FROM user";
        $result = $this->getConnection()->query($query);
        return $result->fetch_assoc()['total'];
    }

    // Verify a user's login credentials
    public function verifyLogin($email, $password)
    {
        // Fetch user by email
        $user = $this->getUserByEmail($email);

        if ($user) {
            // Verify the hashed password
            if (password_verify($password, $user['Password'])) {
                return $user; // Return user details if the password is correct
            }
        }
        return false; // Return false if email or password is incorrect
    }
}
?>
