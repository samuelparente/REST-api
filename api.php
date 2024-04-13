<?php
// ** Developed by Samuel Parente
// ** For testing purposes only
// ** API endpoint for handle requests

require_once 'config.php';
require_once 'employee.php';

// Create a new instance of the Employee class
$employeeObject = new Employee($conn);

// Get the request method
$method = $_SERVER['REQUEST_METHOD'];

// Get the requested endpoint
$endpoint = $_SERVER['PATH_INFO'];

// Set the response content type
header('Content-Type: application/json');

// Process the request
switch ($method)
{
    case 'GET':
        if($endpoint === '/employees')
        {
            //Get all employees
            $employees = $employeeObject->getAllEmployees();
            echo json_encode($employees);
        }
        else if(preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches))
        {
            //Get employee by its ID
            $employeeId = $matches[1];
            $employee = $employeeObject->getEmployeeById($employeeId);
            echo json_encode($employee);
        }
        break;

    case 'POST':
        if($endpoint === '/employees')
        {
            //Add new employee
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $employeeObject->addEmployee($data);
            echo json_encode(['success'=>$result]);
        }
        break;

    case 'PUT':
        if(preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches))
        {
            //Update employee by ID
            $employeeId = $matches[1];
            $data = json_decode(file_get_contents('php://input'), true);
            $result = $employeeObject->updateEmployee($employeeId, $data);
            echo json_encode(['success'=>$result]);
        }
        break;
    
    case 'DELETE':
        if(preg_match('/^\/employees\/(\d+)$/', $endpoint, $matches))
        {
            //Delete employee by ID
            $employeeId = $matches[1];
            $result = $employeeObject->deleteEmployee($employeeId);
            echo json_encode(['success'=>$result]);
        }
        break;
}
?>