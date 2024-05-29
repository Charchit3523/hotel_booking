<?php
// Database connection details
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbw';

// Establish connection to the database
$con = mysqli_connect($hname, $uname, $pass, $db);
if (!$con) {
    die("Cannot connect to Database " . mysqli_connect_error());
}

// Function to sanitize and filter input data
function filteration($data) {
    foreach ($data as $key => $value) {
        $value = trim($value); // Remove whitespace from both ends of a string
        $value = stripslashes($value); // Un-quotes a quoted string
        $value = strip_tags($value); // Strip HTML and PHP tags from a string
        $value = htmlspecialchars($value); // Convert special characters to HTML entities
        $data[$key] = $value; // Update the value in the array
    }
    return $data; // Return the filtered data
}

// Function to execute a SELECT query with prepared statements
function select($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // Bind parameters
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt); // Get the result set
            mysqli_stmt_close($stmt); // Close the statement
            return $res; // Return the result set
        } else {
            mysqli_stmt_close($stmt); // Close the statement
            die("Query cannot be executed - select");
        }
    } else {
        die("Query cannot be prepared - select");
    }
}

// Function to execute an UPDATE query with prepared statements
function update($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // Bind parameters
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt); // Get the number of affected rows
            mysqli_stmt_close($stmt); // Close the statement
            return $res; // Return the number of affected rows
        } else {
            mysqli_stmt_close($stmt); // Close the statement
            die("Query cannot be executed - Update");
        }
    } else {
        die("Query cannot be prepared - Update");
    }
}

// Function to execute an INSERT query with prepared statements
function insert($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // Bind parameters
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt); // Get the number of affected rows
            mysqli_stmt_close($stmt); // Close the statement
            return $res; // Return the number of affected rows
        } else {
            mysqli_stmt_close($stmt); // Close the statement
            die("Query cannot be executed - insert");
        }
    } else {
        die("Query cannot be prepared - insert");
    }
}

// Function to select all records from a specified table
function selectAll($table) {
    $con = $GLOBALS['con'];
    $res = mysqli_query($con, "SELECT * FROM $table"); // Execute the query
    return $res; // Return the result set
}

// Function to execute a DELETE query with prepared statements
function delete($sql, $values, $datatypes) {
    // Get the database connection from the global scope
    $con = $GLOBALS['con'];

    // Prepare the SQL statement
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind the parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Get the number of affected rows
            $res = mysqli_stmt_affected_rows($stmt);

            // Close the statement and return the result
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            // Close the statement and display an error message
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - delete");
        }
    } else {
        // Display an error message if the query cannot be prepared
        die("Query cannot be prepared - delete");
    }
}
?>
