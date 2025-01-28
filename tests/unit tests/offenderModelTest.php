<?php
    use PHPUnit\Framework\TestCase;
    require_once "C:\xampp\htdocs\SexOffenderRegistryWebsite\Models\Offender.class.php"

    class OffenderModelTest extends TestCase
    {
        private $offenderModel;

        // Set up before each test
        protected function setUp(): void
        {
            $this->offenderModel = new Offender(); 
        }

        // Test: Add Offender
        public function testAddOffender()
        {
            $result = $this->offenderModel->addOffender("John Doe", "2023-01-15", "123 Main St", "High");
            $this->assertTrue($result, "Adding an offender should return true on success.");
        }

        // Test: Update Offender
        public function testUpdateOffender()
        {
            $result = $this->offenderModel->updateOffender(1, "John Doe", "2023-01-15", "123 Main St", "High");
            $this->assertTrue($result, "Updating an offender should return true on success.");
        }

        // Test: Delete Offender
        public function testDeleteOffender()
        {
            $result = $this->offenderModel->deleteOffender(1);
            $this->assertTrue($result, "Deleting an offender should return true on success.");
        }

        // Test: Get Offender by ID
        public function testGetOffenderById()
        {
            $offender = $this->offenderModel->getOffenderById(1);
            $this->assertIsArray($offender, "The returned offender should be an array.");
            $this->assertArrayHasKey('Name', $offender, "The offender array should have a 'Name' key.");
        }

        // Test: Search Offenders
        public function testSearchOffenders()
        {
            $results = $this->offenderModel->getOffenderByName("Doe");
            $this->assertIsArray($results, "Search results should be an array.");
            $this->assertNotEmpty($results, "Search results should not be empty for valid queries.");
        }

    }

?>
