

<?php
// Example of order IDs fetched from the database
$orderIDs = [
    "KBD-10-12", "KBD-11-13", "KBD-12-14", "KBD-13-15", "KBD-14-16", "KBD-15-17",
    "KBD-16-18", "KBD-17-19", "KBD-18-20", "KBD-19-21", "KBD-20-22", "KBD-21-23",
    "KBD-22-24", "KBD-23-25", "KBD-24-26", "KBD-25-27", "KBD-26-28", "KBD-27-29",
    "KBD-28-30", "KBD-29-31", "KBD-30-32", "KBD-31-33", "KBD-32-34", "KBD-33-35",
    "KBD-34-36", "KBD-35-37", "KBD-36-38", "KBD-37-39", "KBD-38-40", "KBD-39-41",
    "KBD-40-42", "KBD-41-43", "KBD-42-44", "KBD-43-45", "KBD-44-46", "KBD-45-47",
    "KBD-46-48", "KBD-47-49", "KBD-48-50", "KBD-49-51", "KBD-50-52", "KBD-51-53",
    "KBD-52-54", "KBD-53-55", "KBD-54-56", "KBD-55-57", "KBD-56-58", "KBD-57-59",
    "KBD-58-60", "KBD-59-61", "KBD-60-62", "KBD-61-63", "KBD-62-64", "KBD-63-65"
];

// Select 20 random order IDs from the array without duplication
$randomOrderIDs = array_rand($orderIDs, 20);

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
?>
