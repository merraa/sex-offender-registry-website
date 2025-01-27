<?php
require_once('C:\xampp2\htdocs\SexOffenderRegistryWebsite\config\Db.class.php');

class Offense extends Db
{
    // Create a new offense
    public function addOffense($offenderId, $type, $dateCommitted, $description) {
        $sql = "INSERT INTO offense (OffenderId, OffenseType, DateCommitted, Description) VALUES (?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('isss', $offenderId, $type, $dateCommitted, $description);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error adding offense: " . $e->getMessage();
            return false;
        }
    }

    // Get all offenses
    public function getAllOffenses() {
        $sql = "SELECT * FROM offense";
        try {
            $result = $this->getConnection()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Error retrieving offenses: " . $e->getMessage();
            return [];
        }
    }

    // Get offense by ID
    public function getOffenseById($offenseId) {
        $sql = "SELECT * FROM offense WHERE OffenseId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('i', $offenseId);

        try {
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (Exception $e) {
            echo "Error retrieving offense: " . $e->getMessage();
            return null;
        }
    }
    //Get offense by OffenderId
    public function getOffenseByOffenderId($offenderId) {
        $sql = "SELECT * FROM offense WHERE OffenderId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('i', $offenderId);

        try {
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Error retrieving offense: " . $e->getMessage();
            return null;
        }
    }

    // Update offense
    public function updateOffense($offenseId, $offenderId, $type, $dateCommitted, $description) {
        $sql = "UPDATE offense SET OffenderId = ?, OffenseType = ?, DateCommitted = ?, Description = ? WHERE OffenseId = ?";

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('isssi', $offenderId, $type, $dateCommitted, $description, $offenseId);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error updating offense: " . $e->getMessage();
            return false;
        }
    }

    // Delete offense
    public function deleteOffense($id) {
        $sql = "DELETE FROM offense WHERE OffenseId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('i', $id);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error deleting offense: " . $e->getMessage();
            return false;
        }
    }

    // Get total number of offenses
    public function getTotalOffenses() {
        $sql = "SELECT COUNT(*) AS total FROM offense";
        try {
            $result = $this->getConnection()->query($sql);
            return $result->fetch_assoc()['total'];
        } catch (Exception $e) {
            echo "Error counting offenses: " . $e->getMessage();
            return 0;
        }
    }
}
?>
