
<?php 
include('server.php');  

if (isset($_POST['make_product'])) {  

    // รับค่าจากฟอร์ม
    $productname = $_POST['product_name']; 
    $producttype = $_POST['product_type'];
    $price = $_POST['product_price']; 
    $productdescription = $_POST['product_detail'];

    // Handle the image upload
    $targetDir = "imgs/"; // Make sure this directory exists and is writable
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    // Allow certain file formats
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // Prepare SQL statement using prepared statements
        $stmt = $conn->prepare("INSERT INTO sp_product (name, img, price,description,type) VALUES (?, ?, ?, ?, ?)");
        
        // Check if statement creation was successful
        if ($stmt === false) {
            die("Error preparing the SQL statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sssss", $productname, $imageName, $price, $productdescription, $producttype);


        // Execute the SQL statement
        if ($stmt->execute()) {
            echo "Product added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        die("Sorry, there was an error uploading your file.");
    }
}
?> 
