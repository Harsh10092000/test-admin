<!-- 

//<?//php
//?>
$host="localhost";
$username="u414768521_testcronjob";
$password="mFBrp2]D ";
$dbname="u414768521_testcronjob";
$conn=new mysqli($host,$username,$password,$dbname);
if(!$conn){
    die("Connection was not made");
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    

    $stmt = $conn->prepare("INSERT INTO selected_ids (order_id) Values (?) ");
    $stmt->bind_param("s", $selectedOrderIDs);
    $stmt->execute();
    $stmt->close();
}


// Example of order IDs fetched from the database
$orderIDs = [
    "KRD-10-12", "KRD-11-13", "KRD-12-14", "KRD-13-15", "KRD-14-16", "KRD-15-17",
    "KRD-16-18", "KRD-17-19", "KRD-18-20", "KRD-19-21", "KRD-20-22", "KRD-21-23",
    "KRD-22-24", "KRD-23-25", "KRD-24-26", "KRD-25-27", "KRD-26-28", "KRD-27-29",
    "KRD-28-30", "KRD-29-31", "KRD-30-32", "KRD-31-33", "KRD-32-34", "KRD-33-35",
    "KRD-34-36", "KRD-35-37", "KRD-36-38", "KRD-37-39", "KRD-38-40", "KRD-39-41",
    "KRD-40-42", "KRD-41-43", "KRD-42-44", "KRD-43-45", "KRD-44-46", "KRD-45-47",
    "KRD-46-48", "KRD-47-49", "KRD-48-50", "KRD-49-51", "KRD-50-52", "KRD-51-53",
    "KRD-52-54", "KRD-53-55", "KRD-54-56", "KRD-55-57", "KRD-56-58", "KRD-57-59",
    "KRD-58-60", "KRD-59-61", "KRD-60-62", "KRD-61-63", "KRD-62-64", "KRD-63-65"
];

// Select 20 random order IDs from the array without duplication
$randomOrderIDs = array_rand($orderIDs, 1);

// If $randomOrderIDs is an array (because array_rand can return a single key or multiple keys)
if (is_array($randomOrderIDs)) {
    $selectedOrderIDs = array_map(function($index) use ($orderIDs) {
        return $orderIDs[$index];
    }, $randomOrderIDs);
} else {
    // If only one order ID is selected (which shouldn't happen in this case)
    $selectedOrderIDs = array($orderIDs[$randomOrderIDs]);
}

// Create an array of unselected values
$unselectedOrderIDs = array_diff($orderIDs, $selectedOrderIDs);
// Print the selected random order IDs
//echo "Selected random order IDs: ";
//print_r($selectedOrderIDs);
echo "<br />" . "Selected random order IDs: " . implode(", ", $selectedOrderIDs);
// Print the unselected order IDs
//echo "Unselected order IDs: ";
//print_r($unselectedOrderIDs);
echo "<br />" . "Unselected order IDs: " . implode(", ", $unselectedOrderIDs);
?> -->


<?php
// Database connection details
$host = "localhost";
$username = "u414768521_testcronjob";
$password = "mFBrp2]D";
$dbname = "u414768521_testcronjob";

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example of order IDs fetched from the database
$orderIDs = [
    "KRD-10-12", "KRD-11-13", "KRD-12-14", "KRD-13-15", "KRD-14-16", "KRD-15-17",
    "KRD-16-18", "KRD-17-19", "KRD-18-20", "KRD-19-21", "KRD-20-22", "KRD-21-23",
    "KRD-22-24", "KRD-23-25", "KRD-24-26", "KRD-25-27", "KRD-26-28", "KRD-27-29",
    "KRD-28-30", "KRD-29-31", "KRD-30-32", "KRD-31-33", "KRD-32-34", "KRD-33-35",
    "KRD-34-36", "KRD-35-37", "KRD-36-38", "KRD-37-39", "KRD-38-40", "KRD-39-41",
    "KRD-40-42", "KRD-41-43", "KRD-42-44", "KRD-43-45", "KRD-44-46", "KRD-45-47",
    "KRD-46-48", "KRD-47-49", "KRD-48-50", "KRD-49-51", "KRD-50-52", "KRD-51-53",
    "KRD-52-54", "KRD-53-55", "KRD-54-56", "KRD-55-57", "KRD-56-58", "KRD-57-59",
    "KRD-58-60", "KRD-59-61", "KRD-60-62", "KRD-61-63", "KRD-62-64", "KRD-63-65"
];

// Function to select random order IDs
function selectRandomOrderIDs($orderIDs, $count = 20) {
    shuffle($orderIDs); // Shuffle the array
    return array_slice($orderIDs, 0, $count); // Select the first $count elements
}

// Select 20 random order IDs
$selectedOrderIDs = selectRandomOrderIDs($orderIDs, 20);

// Insert selected order IDs into the database
$stmt = $conn->prepare("INSERT INTO selected_ids (order_id) VALUES (?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $orderID);

foreach ($selectedOrderIDs as $orderID) {
    if (!$stmt->execute()) {
        echo "Error inserting order ID: $orderID - " . $stmt->error . "<br />";
    }
}

$stmt->close();
$conn->close();

// Print the selected random order IDs
echo "Selected random order IDs: " . implode(", ", $selectedOrderIDs) . "<br />";

// Create an array of unselected values
$unselectedOrderIDs = array_diff($orderIDs, $selectedOrderIDs);

// Print the unselected order IDs
echo "Unselected order IDs: " . implode(", ", $unselectedOrderIDs) . "<br />";
?>