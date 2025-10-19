<?php

class HomeController {
    private $productModel;
    
    public function __construct() {
        $this->productModel = new Product();
    }
    
    public function index() {
        // Verificar sesión
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        
        $products = $this->productModel->getAll();
        $userName = $_SESSION['user_name'] ?? 'Usuario';
        $userRole = $_SESSION['user_role'] ?? 'cliente';
        
        require_once __DIR__ . '/../views/home.php';
    }
}
