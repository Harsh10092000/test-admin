<?php

// Define the order IDs
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

// Define the cart types and their allotment limits
$cartTypes = [
    'fruit_cart' => 6,
    'book_cart' => 6,
    'soup_cart' => 6,
    'chaat_cart' => 6,
    'vegetable_cart' => 6,
    'golgappe_cart' => 20,
];

// Simulate user choices using order IDs (for demonstration purposes)
$userChoices = [
    'fruit_cart' => ["KRD-10-12", "KRD-11-13", "KRD-12-14", "KRD-13-15", "KRD-14-16", "KRD-15-17", "KRD-16-18"], // 7 users chose fruit cart
    'book_cart' => ["KRD-20-22", "KRD-21-23", "KRD-22-24"], // 3 users chose book cart
    'soup_cart' => ["KRD-30-32", "KRD-31-33", "KRD-32-34", "KRD-33-35", "KRD-34-36", "KRD-35-37"], // 6 users chose soup cart
    'chaat_cart' => ["KRD-40-42", "KRD-41-43", "KRD-42-44", "KRD-43-45", "KRD-44-46", "KRD-45-47", "KRD-46-48", "KRD-47-49"], // 8 users chose chaat cart
    'vegetable_cart' => ["KRD-50-52", "KRD-51-53"], // 2 users chose vegetable cart
    'golgappe_cart' => array_slice($orderIDs, 0, 25), // 25 users chose golgappe cart
];

// Function to randomly select users based on the allotment limit
function allocateCarts($users, $limit) {
    if (count($users) <= $limit) {
        return $users; // All users get the cart if the number of users is less than or equal to the limit
    }
    // Randomly select $limit users
    shuffle($users); // Shuffle the array to randomize selection
    return array_slice($users, 0, $limit); // Select the first $limit users
}

// Allocate carts for each type
$allocatedCarts = [];
foreach ($cartTypes as $cartType => $limit) {
    $allocatedCarts[$cartType] = allocateCarts($userChoices[$cartType], $limit);
}

// Display the results
foreach ($allocatedCarts as $cartType => $selectedOrders) {
    $unselectedOrders = array_diff($userChoices[$cartType], $selectedOrders);
    echo "<br />" . "Selected orders for $cartType: " . implode(", ", $selectedOrders);
    echo "<br />" . "Unselected orders for $cartType: " . implode(", ", $unselectedOrders);
    echo "<br />";
}
?>