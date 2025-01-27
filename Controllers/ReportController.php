<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\Models\Report.class.php';

class ReportController extends Report {

    // Add a new report
    public function addReport($userId, $offenderId, $details, $dateReported) {
        return parent::addReport($userId, $offenderId, $details, $dateReported);
    }

    // Get all reports
    public function getAllReports() {
        return parent::getAllReports();
    }

    // Get report by ID
    public function getReportById($reportId) {
        return parent::getReportById($reportId);
    }
    
    // Get total number of reports
    public function getTotalReports() {
        return parent::getTotalReports();
    }

    // Delete a report
    public function deleteReport($id) {
        return parent::deleteReport($id);
    }
}
?>
