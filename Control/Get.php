<?php



// Function to get categories from the database
function getCategories() {
    global $conn;

    $categories = array();

    // Perform a SELECT query to retrieve categories
    $result = $conn->query("SELECT * FROM Categories");

    // Check if the query was successful
    if ($result) {
        // Fetch the results as an associative array
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }

        // Free the result set
        $result->free();
    }

    return $categories;
}

// Function to get brands from the database
function getBrands() {
    global $conn;

    $brands = array();

    // Perform a SELECT query to retrieve brands
    $result = $conn->query("SELECT * FROM brand");

    // Check if the query was successful
    if ($result) {
        // Fetch the results as an associative array
        while ($row = $result->fetch_assoc()) {
            $brands[] = $row;
        }

        // Free the result set
        $result->free();
    }

    return $brands;
}

// Close the database connection (you should do this at the end of your script)

