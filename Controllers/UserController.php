<?php
require_once('C:\xampp2\htdocs\SexOffenderRegistryWebsite\Models\User.class.php');

class UserController extends User {

    // Create a new user
    public function createUser($name, $email, $password, $role) {
        return parent::createUser($name, $email, $password, $role);
    }

    // Get user by ID
    public function getUserById($id) {
        return parent::getUserById($id);
    }

    // Get user by email
    public function getUserByEmail($email) {
        return parent::getUserByEmail($email);
    }

    // Get all users
    public function getAllUsers() {
        return parent::getAllUsers();
    }

    // Update a user's information
    public function updateUser($id, $name, $email, $role) {
        return parent::updateUser($id, $name, $email, $role);
    }

    // Delete a user by ID
    public function deleteUser($id) {
        return parent::deleteUser($id);
    }

    // Get total number of users
    public function getTotalUsers() {
        return parent::getTotalUsers();
    }

    // Verify user login
    public function verifyLogin($email, $password) {
        return parent::verifyLogin($email, $password);
    }
}
?>
