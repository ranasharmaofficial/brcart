<?php
class Product
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = "";
    private $database = "ubazar_db";
    private $productTable = 'products';
    private $dbConnect = false;
    public function __construct()
    {
        if (!$this->dbConnect) {
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if ($conn->connect_error) {
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else {
                $this->dbConnect = $conn;
            }
        }
    }
    private function getData($sqlQuery)
    {
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if (!$result) {
            die('Error in query: ' . mysqli_error());
        }
        $data = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    private function getNumRows($sqlQuery)
    {
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if (!$result) {
            die('Error in query: ' . mysqli_error());
        }
        $numRows = mysqli_num_rows($result);
        return $numRows;
    }
    public function cleanString($str)
    {
        return str_replace(' ', '_', $str);
    }
    // public function getCategories()
    // {
    //     $sqlQuery = "SELECT *
    //         FROM categories
    //         GROUP BY name";
    //     // $fields = "b.category_id,a.name as category_name";
    //     // $sqlQuery = "SELECT $fields from categories a LEFT JOIN products b ON b.category_id = a.id order by b.id ASC";
    //     return $this->getData($sqlQuery);
    // }
    public function getCategories()
    {
        $sqlQuery = "
            SELECT category_id
            FROM " . $this->productTable . "
            GROUP BY category_id";
        // $sqlQuery = "SELECT a.category_id, b.name as category_name from " . $this->productTable . " a LEFT JOIN categories b ON b.id=a.category_id order by a.id ASC";
        return $this->getData($sqlQuery);
    }
    public function getBrand()
    {
        $sql = '';
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $category = $_POST['category'];
            $sql .= " WHERE category_id IN ('" . implode("','", $category) . "')";
        }
        $sqlQuery = "
			SELECT distinct brand
			FROM " . $this->productTable . "
			$sql GROUP BY brand";
        return $this->getData($sqlQuery);
    }
    // public function getMaterial()
    // {
    //     $sql = '';
    //     if (isset($_POST['brand']) && $_POST['brand'] != "") {
    //         $brand = $_POST['brand'];
    //         $sql .= " WHERE brand IN ('" . implode("','", $brand) . "')";
    //     }
    //     $sqlQuery = "
    //         SELECT distinct material
    //         FROM " . $this->productTable . "
    //         $sql GROUP BY material";
    //     return $this->getData($sqlQuery);
    // }
    // public function getProductSize()
    // {
    //     $sql = '';
    //     if (isset($_POST['brand']) && $_POST['brand'] != "") {
    //         $brand = $_POST['brand'];
    //         $sql .= " WHERE brand IN ('" . implode("','", $brand) . "')";
    //     }
    //     $sqlQuery = "
    //         SELECT distinct size
    //         FROM " . $this->productTable . "
    //         $sql GROUP BY size";
    //     return $this->getData($sqlQuery);
    // }
    public function getTotalProducts()
    {
        $sql = "SELECT DISTINCT id FROM " . $this->productTable . " WHERE status=1";
        // $sql = "SELECT distinct id FROM " . $this->productTable . "  WHERE qty != 0";
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $category = $_POST['category'];
            $sql .= " AND category_id IN ('" . implode("','", $category) . "')";
        }
        if (isset($_POST['brand']) && $_POST['brand'] != "") {
            $brand = $_POST['brand'];
            $sql .= " AND  brand IN ('" . implode("','", $brand) . "')";
        }
        // if (isset($_POST['material']) && $_POST['material'] != "") {
        //     $material = $_POST['material'];
        //     $sql .= " AND material IN ('" . implode("','", $material) . "')";
        // }
        // if (isset($_POST['size']) && $_POST['size'] != "") {
        //     $size = $_POST['size'];
        //     $sql .= " AND size IN (" . implode(',', $size) . ")";
        // }
        $productPerPage = 9;
        $rowCount = $this->getNumRows($sql);
        $totalData = ceil($rowCount / $productPerPage);
        return $totalData;
    }
    public function getProducts()
    {
        $productPerPage = 15;
        if (isset($_POST['totalRecord'])) {
            $totalRecord = strtolower(trim(str_replace("/", "", $_POST['totalRecord'])));
        } else {
            $totalRecord = 10;
        }

        // $totalRecord = strtolower(trim(str_replace("/", "", $_POST['totalRecord'])));
        $start = ceil($totalRecord * $productPerPage);
        $sql = "SELECT * FROM " . $this->productTable . " WHERE status = 1";
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $sql .= " AND category_id IN ('" . implode("','", $_POST['category']) . "')";
        }
        if (isset($_POST['brand']) && $_POST['brand'] != "") {
            $sql .= " AND brand IN ('" . implode("','", $_POST['brand']) . "')";
        }
        if (isset($_POST['material']) && $_POST['material'] != "") {
            $sql .= " AND material IN ('" . implode("','", $_POST['material']) . "')";
        }
        if (isset($_POST['size']) && $_POST['size'] != "") {
            $sql .= " AND size IN (" . implode(',', $_POST['size']) . ")";
        }

        if (isset($_POST['sorting']) && $_POST['sorting'] != "") {
            $sorting = implode("','", $_POST['sorting']);
            if ($sorting == 'newest' || $sorting == '') {
                $sql .= " ORDER BY id DESC";
            } else if ($sorting == 'low') {
                $sql .= " ORDER BY price ASC";
            } else if ($sorting == 'high') {
                $sql .= " ORDER BY price DESC";
            }
        } else {
            $sql .= " ORDER BY id DESC";
        }
        $sql .= " LIMIT $start, $productPerPage";
        $products = $this->getData($sql);
        $rowcount = $this->getNumRows($sql);
        $productHTML = '';
        if (isset($products) && count($products)) {
            foreach ($products as $key => $product) {
                $productHTML .= '<article class="col-md-4 col-sm-6">';
                $productHTML .= '<div class="thumbnail product">';
                $productHTML .= '<figure>';
                $productHTML .= '<a href="#"><img src="../uploads/' . $product['photo'] . '" alt="' . $product['name'] . '" /></a>';
                $productHTML .= '</figure>';
                $productHTML .= '<div class="caption">';
                $productHTML .= '<a href="" class="product-name">' . $product['name'] . '</a>';
                $productHTML .= '<div class="price">$' . $product['price'] . '</div>';
                $productHTML .= '<h6>Brand : ' . $product['brand'] . '</h6>';
                $productHTML .= '<h6>Material : ' . $product['category_id'] . '</h6>';
                $productHTML .= '<h6>Size : ' . $product['category_id'] . '</h6>';
                $productHTML .= '</div>';
                $productHTML .= '</div>';
                $productHTML .= '</article>';
            }
        }
        return $productHTML;
    }
}