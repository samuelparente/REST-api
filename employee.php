<?php
// ** Developed by Samuel Parente
// ** For testing purposes only
// ** Class file with methods to interact with the database

class Employee
{
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Method to retrieve all employees from the database
    public function getAllEmployees()
    {
        $query = "SELECT * FROM employee";
        $result = mysqli_query($this->conn, $query);
        $employees = [];

        // Fetch each row and append it to the employees array
        while ($row = mysqli_fetch_assoc($result))
        {
            $employees[] = $row;
        }

        return $employees;
    }

    // Method to retrieve an employee by ID from the database
    public function getEmployeeById($id)
    {
        $query = "SELECT * FROM employee WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $employee = mysqli_fetch_assoc($result);

        return $employee;
    }

    // Method to add a new employee to the database
    public function addEmployee($data)
    {
        $query = "INSERT INTO employee (emp_name, emp_code, emp_email, emp_phone, emp_address, emp_designation, emp_joining_date)
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $data['emp_name'], $data['emp_code'], $data['emp_email'], $data['emp_phone'], $data['emp_address'], $data['emp_designation'], $data['emp_joining_date']);
        $result = mysqli_stmt_execute($stmt);

        return $result;
    }

    // Method to update an existing employee in the database
    public function updateEmployee($id, $data)
    {
        $query = "UPDATE employee SET emp_name = ?, emp_code = ?, emp_email = ?, emp_phone = ?, emp_address = ?, emp_designation = ?, emp_joining_date = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssssi", $data['emp_name'], $data['emp_code'], $data['emp_email'], $data['emp_phone'], $data['emp_address'], $data['emp_designation'], $data['emp_joining_date'], $id);
        $result = mysqli_stmt_execute($stmt);

        return $result;
    }

    // Method to delete an employee from the database
    public function deleteEmployee($id)
    {
        $query = "DELETE FROM employee WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);

        return $result;
    }
}
?>
