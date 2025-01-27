<?php
require_once('C:\xampp\htdocs\SexOffenderRegistryWebsite\config\Db.class.php');

class Offender extends Db
{
    // Create a new offender
    public function addOffender($name, $dob, $address, $riskLevel) {
        $sql = "INSERT INTO offender (Name, DOB, Address, RiskLevel) VALUES (?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('ssssi', $name, $dob, $address, $riskLevel);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error adding offender: " . $e->getMessage();
            return false;
        }
    }

    // Get all offenders
    public function getAllOffenders() {
        $sql = "SELECT * FROM offender";
        try {
            $result = $this->getConnection()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Error retrieving offenders: " . $e->getMessage();
            return [];
        }
    }

    // Get offender by ID
    public function getOffenderById($offenderId) {
        $sql = "SELECT * FROM offender WHERE OffenderId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('i', $offenderId);

        try {
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (Exception $e) {
            echo "Error retrieving offender: " . $e->getMessage();
            return null;
        }
    }
    // Get offender by Name
    public function getOffenderByName($name) {
        $sql = "SELECT * FROM offender WHERE Name = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('s', $name);

        try {
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Error retrieving offender: " . $e->getMessage();
            return null;
        }
    }

    // Update offender details
    public function updateOffender($id, $name, $dob, $address, $riskLevel) {
        $sql = "UPDATE offender SET Name = ?, DOB = ?, Address = ?, RiskLevel = ? WHERE OffenderId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('ssssi', $name, $dob, $address, $riskLevel, $id);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error updating offender: " . $e->getMessage();
            return false;
        }
    }

    // Delete offender
    public function deleteOffender($id) {
        $sql = "DELETE FROM offender WHERE OffenderId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('i', $id);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error deleting offender: " . $e->getMessage();
            return false;
        }
    }

    // Get total number of offenders
    public function getTotalOffenders() {
        $sql = "SELECT COUNT(*) AS total FROM offender";
        try {
            $result = $this->getConnection()->query($sql);
            return $result->fetch_assoc()['total'];
        } catch (Exception $e) {
            echo "Error counting offenders: " . $e->getMessage();
            return 0;
        }
    }
    //Get offenders By location
    public function getOffendersByLocation($city,$region) {
        $query = "SELECT o.OffenderId, o.Name, o.DOB, o.Address, o.RiskLevel
                       FROM Offender o
                       JOIN Location l ON o.OffenderId = l.OffenderId
                       WHERE l.City = ? AND l.Region = ?";
                      
         $stmt = $this->getConnection()->prepare($query);
         $stmt->bind_Param('ss', $city,$region);
        
         try{ 
             $stmt->execute();
             $result = $stmt->get_result(); // Fetch the result
             return $result->fetch_all(MYSQLI_ASSOC);
         } catch (Exception $e) {
                 echo "Error fetching offenders: " . $e->getMessage();
                 return false;
         } finally {
                $stmt->close();
        }
    }
}
?>
