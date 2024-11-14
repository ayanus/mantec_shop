<?php
// Database connection
$pdo = new PDO("mysql:host=localhost;dbname=mantec_shop", "username", "password");

// รับค่าหน้าที่ต้องการ
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$itemsPerPage = 5; // จำนวนสินค้าต่อหน้า
$start = ($page - 1) * $itemsPerPage;

// ดึงข้อมูลสินค้าพร้อมกับประเภท
$stmt = $pdo->prepare("SELECT p.id, p.name, p.price, p.img, tp.title AS type 
                       FROM sp_product p 
                       LEFT JOIN tb_type_product tp ON p.type = tp.id 
                       LIMIT :start, :itemsPerPage");
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// นับจำนวนสินค้าทั้งหมดเพื่อคำนวณหน้าทั้งหมด
$totalItems = $pdo->query("SELECT COUNT(*) FROM sp_product")->fetchColumn();
$totalPages = ceil($totalItems / $itemsPerPage);

echo json_encode([
    'products' => $products,
    'totalPages' => $totalPages,
    'currentPage' => $page
]);
?>