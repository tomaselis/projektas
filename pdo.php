<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function connect()
{

    $host = '127.0.0.1';
    $db = 'PamokaPHP';
    $user = 'tomaselis';
    $password = '123P3tr4s123!';

    try {
        $pdo = new PDO("mysql:host=$host; dbname=$db; charset=utf8", $user, $password);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
    return $pdo;
}


$name = $_POST['name'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$sku = $_POST['sku'];
$description = $_POST['description'];
$active = $_POST['active'];
$weight = $_POST['weight'];
$img = $_POST['img'];





function addNewProduct($name, $price, $qty, $sku, $description, $active, $weight, $img)
{
    $sql = "INSERT INTO prekes(name, price, qty, sku, description, active, weight, img) VALUES(:name, :price, :qty, :sku, :description, :active, :weight, :img)";

    $stmt = connect()->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR_CHAR);
    $stmt->bindValue(':price', $price);
    $stmt->bindValue(':qty', $qty, PDO::PARAM_INT);
    $stmt->bindValue(':sku', $sku, PDO::PARAM_STR_CHAR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR_CHAR);
    $stmt->bindValue(':active', (int)$active, PDO::PARAM_BOOL);
    $stmt->bindValue(':weight', $weight, PDO::PARAM_INT);
    $stmt->bindValue(':img', $img, PDO::PARAM_STR_CHAR);
    $stmt->execute();

    //print_r($stmt->errorInfo());
    echo "Product succsessfuly Created!";

}

submitProduct($name, $price, $qty, $sku, $description, $active, $weight, $img);
$stmt = connect()->query('SELECT * FROM prekes');
$data = $stmt->fetchAll();


function renderListItem()
{
    $stmt = connect()->query('SELECT * FROM prekes');
    foreach ($stmt as $row) {
        $html = '';
        $html .= '<tr>';
        $html .= '<td>' . $row[0] . '</td>';
        $html .= '<td>' . $row['name'] . '</td>';
        $html .= '<td>' . $row['price'] . ' €</td>';
        $html .= '<td>' . $row['qty'] . '</td>';
        $html .= '<td>' . $row['sku'] . '</td>';
        $html .= '<td>' . $row['description'] . '</td>';
        $html .= '<td>' . $row['active'] . '</td>';
        $html .= '<td>' . $row['weight'] . '</td>';
        $html .= '<td><img src="' . $row["img"] . '"></td>';
        $html .= '</tr>';
        return $html;
    }
}

function renderGrid($data)
{
    $html = '';
    $html .= '<table>';
    $html .= '<tr>';
    $html .= '<th>ID</th>';
    $html .= '<th>Name</th>';
    $html .= '<th>PRICE</th>';
    $html .= '<th>QTY</th>';
    $html .= '<th>SKU</th>';
    $html .= '<th>DESCRIPTION</th>';
    $html .= '<th>ACTIVE</th>';
    $html .= '<th>WEIGHT</th>';
    $html .= '<th>IMAGE</th>';
    $html .= '</tr>';


    foreach ( $data as $row) {
        $html .= renderListItem($row);
    }

    $html .= '</table>';

    return $html;

}

echo renderGrid($data);





function skuInDb($sku)
{
    $sql = "SELECT * FROM prekes WHERE sku = ? ";
    $stmt = connect()->prepare($sql);
    $stmt->execute([$sku]);
    if (!$stmt->fetch()) {
        return true;
    }
    return false;
}


function submitProduct($name, $price, $qty, $sku, $description, $active, $weight, $img)
{
    //$email = prepareEmail($email);
    //die('IKI CIA');
    // var_dump(secPswMatch($password, $pswRepeat));
    //var_dump(emailValid($email));
    //var_dump(emailInDb($email));
    if (!skuInDb($sku)) {

        return false;
    }

    //$name = sanitizeInput($name);

    //$password = generatePass($password);

    addNewProduct($name, $price, $qty, $sku, $description, $active, $weight, $img);

}


?>


<style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }

    img {
        max-width: 100px;
    }
</style>



















































//function prepareEmail($str)
//{
//
//    $str = strtolower($str);
//    return $str;
//
//}

//function generatePass($password)
//{
//
//    return md5(md5($password));
//}

//function sanitizeInput($input)
//{
//
//    $input = trim($input);
//    return strip_tags($input);
//}

//function secPswMatch($password, $pswRepeat)
//{
//
//    if ($password === $pswRepeat) {
//        return true;
//    }
//    return false;
//}



//function emailValid($email)
//{
//
//
//    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        return true;
//    }
//    return false;
//}

//function emailInDb($email)
//{
//    $sql = "SELECT * FROM example WHERE email = ? ";
//    $stmt = connect()->prepare($sql);
//    $stmt->execute([$email]);
//    if (!$stmt->fetch()) {
//        return true;
//    }
//    return false;
//}


//print_r($_POST);