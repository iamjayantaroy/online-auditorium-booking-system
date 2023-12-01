<?php
// Step 1: Connect to the database
$mysqli = new mysqli("localhost","root","","Auditorium");

// Step 2: Get the user's location
$userLatitude = 22.6067; // Example latitude
$userLongitude = 88.4129; // Example longitude

// Step 3: Retrieve the database locations
$query = "SELECT * FROM `auditorium details`";
$result = $mysqli->query($query);

// Step 4: Calculate the distance and store in an array
$fetch = array();
while ($row = $result->fetch_assoc()) {
    $distance = calculateDistance($userLatitude, $userLongitude, $row['latitude'], $row['longitude']);
    $fetch[] = array('distance' => $distance, 'name' => $row['name'], 
                'id' => $row['id'],'price' => $row['price'],'description' => $row['description'],
            'rating' => $row['rating'],'location' => $row['location'],'capacity' => $row['capacity'],
        'pimage' => $row['pimage'],'image2' => $row['image2'],'image3' => $row['image3'],
    'image4' => $row['image4'],'Slocation' => $row['Slocation']);
}

// Step 5: Sort the locations by distance
usort($fetch, function($a, $b) {
    return $a['distance'] - $b['distance'];
});

// Step 6: Display the sorted locations
foreach ($fetch as $fetch) {
    echo "Distance: " . $fetch['distance'] . " km, Value: " . $fetch['name'] . "<br>";
}

// Function to calculate distance using Haversine formula
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Radius of the Earth in kilometers

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;

    return $distance;
}
?>