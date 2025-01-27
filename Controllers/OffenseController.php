<?php
require_once('C:\xampp2\htdocs\SexOffenderRegistryWebsite\Models\Offense.class.php');

class OffenseController extends Offense {

    // Add a new offense
    public function addOffense($offenderId, $type, $dateCommitted, $description) {
        return parent::addOffense($offenderId, $type, $dateCommitted, $description);
    }

    // Get all offenses
    public function getAllOffenses() {
        return parent::getAllOffenses();
    }

    // Get offense by ID
    public function getOffenseById($offenseId) {
        return parent::getOffenseById($offenseId);
    }

    // Update offense
    public function updateOffense($offenseId, $offenderId, $type, $dateCommitted, $description) {
        return parent::updateOffense($offenseId, $offenderId, $type, $dateCommitted, $description);
    }

    // Delete offense
    public function deleteOffense($id) {
        return parent::deleteOffense($id);
    }

    // Get total number of offenses
    public function getTotalOffenses() {
        return parent::getTotalOffenses();
    }
}
?>
