<?php
require_once 'page.php';

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $command = "DELETE FROM fruits WHERE " .
        "fruitId=?";
    $params = array($_GET['fruitId']);
    showExecuteCommand($command, $params);
} elseif (isset($_POST['fruitId']) && isset($_POST['fruitName']) && isset($_POST['fruitColor'])) {
    $command = "UPDATE fruits SET " .
        "fruitName=?, fruitColor=? WHERE"
        . " fruitId=?";
    $params = array($_POST['fruitName'], $_POST['fruitColor'], $_POST['fruitId']);
    showExecuteCommand($command, $params);
} elseif (isset($_POST['fruitName']) && isset($_POST['fruitColor'])) {
    $command = "INSERT INTO fruits (fruitname,fruitColor)" .
        " VALUES (?,?)";
    $params = array($_POST['fruitName'], $_POST['fruitColor']);
    showExecuteCommand($command, $params);
} else {
    showMainTable();
}

function showExecuteCommand($command, $params)
{
    PageHeader();
    ?>
        <section class="container">
            <h2>Result</h1>
            <div>
<?php
$pdo = getPDO();
    $stmt = $pdo->prepare($command);
    $stmt->execute($params);
    $affectedRows = $stmt->rowCount();
    echo "<b>$affectedRows</b> rows affected";
    ?>

            </div>
            <a href="index.php">Back to list</a>
        </section>
<?php
PageFooter();
}

function showMainTable()
{
    PageHeader();
    ?>
        <section class="container">
            <h2>Fruits</h1>
            <table class="table table-hover">
                <tr>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
<?php
$pdo = getPDO();
    $stmt = $pdo->prepare('SELECT * FROM fruits');
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['fruitName'] . '</td>';
        echo '<td>' . $row['fruitColor'] . '</td>';
        echo '<td><a href="index.php?action=delete&fruitId=' . $row['fruitId'] . '">Delete</a></td>';
        echo '<td><a href="new.php?action=update&fruitId=' .
            $row['fruitId'] .
            "&fruitName=" . $row['fruitName'] .
            "&fruitColor=" . $row['fruitColor'] .
            '">Edit</a></td>';
        echo '</tr>';
    }
    ?>
            </table>
        </section>
<?php
PageFooter();
}

function getPDO()
{
    $host = '127.0.0.1';
    $db = 'mydatabase';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
        die("This is the end!");
    }
    return $pdo;
}