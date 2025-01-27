<?php
require_once 'C:\xampp2\htdocs\SexOffenderRegistryWebsite\config\Db.class.php';

// Report class handles all operations related to the "reports" table
class Report extends Db 
{
    // Create a new report
    public function addReport($userId, $offenderId, $details, $dateReported) 
    {
        // SQL query to insert a new report
        $sql = "INSERT INTO report (user_id, offender_id, details, date_reported) VALUES (?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($sql);

        try {
            // Bind parameters to the query
            $stmt->bind_param('iiss', $userId, $offenderId, $details, $dateReported);
            // Execute the query
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            // Handle any errors that occur during query execution
            echo "Error adding report: " . $e->getMessage();
            return false;
        }
    }

    // Retrieve all reports
    public function getAllReports() 
    {
        // SQL query to fetch all reports
        $sql = "SELECT * FROM report";
        
        try {
            $result = $this->getConnection()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            // Handle errors if the query fails
            echo "Error retrieving reports: " . $e->getMessage();
            return [];
        }
    }

    // Retrieve a report by its ID
    public function getReportById($reportId) 
    {
        // SQL query to fetch a specific report
        $sql = "SELECT * FROM report WHERE ReportId = ?";
        $stmt = $this->getConnection()->prepare($sql);

        try {
            // Bind parameter to the query
            $stmt->bind_param('i', $reportId);
            $stmt->execute();
            // Fetch and return the result
            return $stmt->get_result()->fetch_assoc();
        } catch (Exception $e) {
            // Handle errors during query execution
            echo "Error retrieving report: " . $e->getMessage();
            return null;
        }
    }

    // Delete a report by its ID
    public function deleteReport($id) 
    {
        // SQL query to delete a report
        $sql = "DELETE FROM report WHERE ReportId = ?";
        $stmt = $this->getConnection()->prepare($sql);

        try {
            // Bind parameter to the query
            $stmt->bind_param('i', $id);
            // Execute the deletion
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            // Handle errors during query execution
            echo "Error deleting report: " . $e->getMessage();
            return false;
        }
    }
    // Get the total number of Reorts in the database
    public function getTotalUsers()
    {
        $query = "SELECT COUNT(*) AS total FROM report";
        $result = $this->getConnection()->query($query);
        return $result->fetch_assoc()['total'];
    }
}
?>
