<?php
require_once('C:\xampp\htdocs\SexOffenderRegistryWebsite\Models\Offender.class.php');

class OffenderController extends Offender {

    // Add a new offender
    public function addOffender($name, $dob, $address, $riskLevel) {
        return parent::addOffender($name, $dob, $address, $riskLevel);
    }

    // Get all offenders
    public function getAllOffenders() {
        return parent::getAllOffenders();
    }

    // Get offender by ID
    public function getOffenderById($offenderId) {
        return parent::getOffenderById($offenderId);
    }
    
    // Get offender by Name
    public function getOffenderByName($name) {
        return parent::getOffenderByName($name);
    }

    //Get Offender By Location
    public function getOffendersByLocation($city,$region){
        return parent::getOffendersByLocation($city,$region);
    }

    // Update offender details
    public function updateOffender($id, $name, $dob, $address, $riskLevel) {
        return parent::updateOffender($id, $name, $dob, $address, $riskLevel);
    }

    // Delete offender
    public function deleteOffender($id) {
        return parent::deleteOffender($id);
    }

    // Get total number of offenders
    public function getTotalOffenders() {
        return parent::getTotalOffenders();
    }
}
?>

