<?php
include ("./includes/header.php");
?>

<!-- Download Section -->
<!-- <section id="download" class="download-section content-section text-center"> -->
<section id="download" class="content-section text-center">
    <div class="container">
    <div class="col-lg-8 mx-auto">
        <h2>List of reviewed electronic devices</h2>
        <p>You can find here an up to date list of all the electronic devices we thoroughly tested and reviewed.</p>
        <p class="text-dark">Courtesy of ACME Webshop, which provided us with all the products listed below.</p>

<?php

// Step 1: Retrieve data via an endpoint (RESTful API)
$endpoint = "http://localhost/UPPGIFT-2/api/products/";
$data = file_get_contents($endpoint);
// Run a test on $data
// echo $data;

if(empty($data)){
    echo "<h2>Problem retrieving data!<h2>";
    echo "<h2>Please contact the webmaster.<h2>";
    exit;
}

// Step 2: Convert JSON -> PHP-Array
$array = json_decode($data, true);
if(!is_array($array)){
    echo "<h2>Problem retrieving data!</h2>";
}

// Step 3: Present the info
echo "<table class='table table-hover'>";
echo "<thead class='thead-inverse'>";
echo "<tr> <th>Product No.</th> <th>Product name</th> <th>Description</th> <th>Price</th> <th>Review</th></tr>";
foreach($array as $key => $value) {
    echo "<tr>";
    echo "<td>" . $value['product_id'] . "</td>";
    echo "<td>" . $value['name'] . "</td>";
    echo "<td>" . $value['description'] . "</td>";
    echo "<td>" . ($value['price']+0) . "</td>";
    echo "<td>" . "<a href='#'>Review</a>" . "</td>";
    // echo "<td class='table-dark'>" . "<a href='#' class='btn btn-default btn-lg'>Review</a>" . "</td>";
    echo "</tr>";
}

echo "</table>";

// TEST
// echo "<pre>";
// print_r ($array);
// echo "</pre>";

?>

        <a href="./index.php" class="btn btn-default btn-lg">Return to home page</a>
        </div>
    </div>
</section>

<?php
include ("./includes/footer.php");
?>

