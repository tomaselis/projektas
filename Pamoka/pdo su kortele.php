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
    //echo "<div class='center'>Product succsessfuly Created</div>";

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




submitProduct($name, $price, $qty, $sku, $description, $active, $weight, $img);


function renderListItems(){
    $stmt = connect()->query('SELECT * FROM prekes');
    foreach ($stmt as $row) {
        $html = '';

        $html .= '<div>';
        $html .= '<p class="p"><img src="' . $row["img"] . '"></p>';
        $html .= '<h2>' . $row["name"] . '</h2>';
        $html .= '<h2>' . $row["price"] . '€</h2>';
        $html .= '<h3>Apie preke</h3>';
        $html .= '<p>' . $row["description"] . '</p>';
        $html .= '</div>';
        echo $html;
    }
}
function renderGrid(){
    $html = '';
    $html .= '<section>';
    $html .= renderListItems();
    $html .= '</section>';
    echo $html;
}
echo renderGrid();







?>



<style>
    body {
        /*flex-direction: column;*/
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    div: first-child{
        display: flex;
        justify-content: center;
        height: 100px;
        width: 1024px;
    }
    div {
        flex-grow: 1;
        width: 25%;
        margin: 10px;
        padding: 10px;
        border: 1px solid black;
        border-radius: 5px;
        box-sizing: border-box;
    }
    img {
        max-width: 200px;
    }
    .p {
        text-align: center;
    }

    h3:first-child {
        display: block;
        margin: 0 auto;
    }


</style>



