# Employee Management REST API

This REST API provides functionalities to manage employee data. It allows GET requests to retrieve employee information, POST requests to create new employees, PUT requests to update existing employees, and DELETE requests to remove employees.

## Endpoints

### GET

* **URL:** `/employees`
* **Description:** Retrieves a list of all employees in the system.
* **Response:**
    * **Status Codes:**
        * 200 OK: Successful request.
    * **Example:**

```json
[
  {
    "id": 1,
    "name": "John Doe",
    "email": "john.doe@example.com"
  },
  {
    "id": 2,
    "name": "Jane Smith",
    "email": "jane.smith@example.com"
  }
]


URL: /employees/:id
Description: Retrieves an employee by their ID.
Parameters:
id: (integer, required) The ID of the employee to retrieve.
Response:
Status Codes:
200 OK: Employee found successfully.
404 Not Found: Employee with the specified ID does not exist.
Example (Success):
JSON
{
  "id": 1,
  "name": "John Doe",
  "email": "john.doe@example.com"
}


POST
URL: /employees
Description: Creates a new employee.
Request Body: JSON object with the following properties:
name: (string, required) The name of the new employee.
email: (string, required) The email address of the new employee.
Response:
Status Codes:
201 Created: Employee successfully created.
400 Bad Request: Invalid request body format or missing required fields.
Example (Success):
JSON
{
  "success": true
}


PUT
URL: /employees/:id
Description: Updates an existing employee.
Parameters:
id: (integer, required) The ID of the employee to update.
Request Body: JSON object with the properties to be updated (e.g., name, email).
Response:
Status Codes:
200 OK: Employee successfully updated.
400 Bad Request: Invalid request body format or missing required fields.
404 Not Found: Employee with the specified ID does not exist.
Example (Success):
JSON
{
  "success": true
}


DELETE
URL: /employees/:id
Description: Deletes an employee by their ID.
Parameters:
id: (integer, required) The ID of the employee to delete.
Response:
Status Codes:
200 OK: Employee successfully deleted.
404 Not Found: Employee with the specified ID does not exist.
Example (Success):
JSON
{
  "success": true
}
