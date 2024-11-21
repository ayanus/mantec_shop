<?php
session_start();

// Database connection (Update with your database connection details)
$pdo = new PDO("mysql:host=localhost;dbname=mantec_shop", "username", "password");

// Initialize products and cart
$products = [];
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$currentPage = 1;
$itemsPerPage = 1;

// Fetch all products
function getAllProducts($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM products");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function renderPage($products, $currentPage, $itemsPerPage) {
    $start = ($currentPage - 1) * $itemsPerPage;
    $paginatedProducts = array_slice($products, $start, $itemsPerPage);
    
    foreach ($paginatedProducts as $index => $product) {
        echo '<div onclick="openProductDetail(' . $index . ')" class="product-items ' . $product['type'] . '">';
        echo '<img class="product-img" src="./imgs/' . $product['img'] . '" alt="">';
        echo '<p style="font-size: 1.2vw;">' . htmlspecialchars($product['name']) . '</p>';
        echo '<p style="font-size: 1vw;">' . numberWithCommas($product['price']) . ' THB</p>';
        echo '</div>';
    }
}

function numberWithCommas($x) {
    return number_format($x, 0, '', ',');
}

// Handle search
function searchProduct($term, $products) {
    $results = array_filter($products, function($product) use ($term) {
        return stripos($product['name'], $term) !== false;
    });
    return $results;
}

// Handle adding item to cart
function addToCart($index) {
    global $cart, $products;
    $product = $products[$index];
    $found = false;

    foreach ($cart as &$item) {
        if ($item['id'] === $product['id']) {
            $item['count']++;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $cart[] = [
            'index' => $index,
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'img' => $product['img'],
            'count' => 1,
        ];
    }
    $_SESSION['cart'] = $cart;
}

// Handle purchase request
function buynow() {
    global $cart;
    // Assuming `buynow.php` is an API endpoint that processes orders
    $url = './api/buynow.php';

    // Initialize a cURL session
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['product' => $cart]));

    // Execute and capture response
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $data = json_decode($response, true);
        if ($data['RespCode'] == 200) {
            $_SESSION['cart'] = []; // Clear cart
            echo "Purchase successful!";
        } else {
            echo "Failed to process your order.";
        }
    } else {
        echo "Error communicating with the API.";
    }
}

// Sample usage for pagination and rendering
$products = getAllProducts($pdo);
renderPage($products, $currentPage, $itemsPerPage);
?>

<!-- HTML for product list and cart count -->
<div id="productlist">
    <?php renderPage($products, $currentPage, $itemsPerPage); ?>
</div>
<div id="cartcount"><?php echo count($cart); ?></div>