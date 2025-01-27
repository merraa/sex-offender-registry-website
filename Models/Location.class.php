<?php
require_once('C:\xampp2\htdocs\SexOffenderRegistryWebsite\config\Db.class.php');

class Location extends Db {

    // Create a new location
    public function addLocation($offenderId, $city, $region) {
        $sql = "INSERT INTO location (OffenderId, City, Region) VALUES (?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('iss', $offenderId, $city, $region);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error adding location: " . $e->getMessage();
            return false;
        } finally {
            $stmt->close();
        }
    }

    // Get all locations
    public function getAllLocations() {
        $sql = "SELECT * FROM location";
        try {
            $result = $this->getConnection()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Error fetching locations: " . $e->getMessage();
            return [];
        }
    }

    // Get location by ID
    public function getLocationById($locationId) {
        $sql = "SELECT * FROM location WHERE LocationId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('i', $locationId);

        try {
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (Exception $e) {
            echo "Error fetching location: " . $e->getMessage();
            return null;
        } finally {
            $stmt->close();
        }
    }
    // Update location
    public function updateLocation($id, $offenderId, $city, $region) {
        $sql = "UPDATE location SET OffenderId = ?, City = ?, Region = ? WHERE LocationId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('issi', $offenderId, $city, $region, $id);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error updating location: " . $e->getMessage();
            return false;
        } finally {
            $stmt->close();
        }
    }

    // Delete location
    public function deleteLocation($id) {
        $sql = "DELETE FROM location WHERE LocationId = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bind_param('i', $id);

        try {
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error deleting location: " . $e->getMessage();
            return false;
        } finally {
            $stmt->close();
        } 
    }
}
?>
