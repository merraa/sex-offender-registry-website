<?php
require_once('C:\xampp2\htdocs\SexOffenderRegistryWebsite\Models\Location.class.php');

class LocationController extends Location {

    // Add a new location
    public function addLocation($OffenderId, $city, $region) {
        return parent::addLocation($OffenderId, $city, $region);
    }

    // Get all locations
    public function getAllLocations() {
        return parent::getAllLocations();
    }

    // Get location by ID
    public function getLocationById($locationId) {
        return parent::getLocationById($locationId);
    }

    // Update location
    public function updateLocation($id, $offenderId, $city, $region) {
        return parent::updateLocation($id, $offenderId, $city, $region);
    }

    // Delete location
    public function deleteLocation($id) {
        return parent::deleteLocation($id);
    }
}
?>
