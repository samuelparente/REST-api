
        <?php
            // Include the employee.php file to access the Employee class and its methods
            require_once 'api.php';

            // Create a new instance of the Employee class
            $employeeObject = new Employee($conn);

            // Fetch all employees
            $employees = $employeeObject->getAllEmployees();

            // Display employees
            foreach ($employees as $employee) {
                echo "ID: " . $employee['id'] . ", Name: " . $employee['emp_name'] . ", Code: " . $employee['emp_code'] . ", Email: " . $employee['emp_email'] . ", Phone: " . $employee['emp_phone'] . ", Address: " . $employee['emp_address'] . ", Designation: " . $employee['emp_designation'] . ", Joining Date: " . $employee['emp_joining_date'] . "<br>";
            }
        ?>
   