<?php

session_start();

$dbServer = '';
$dbUser = '';
$dbPass = '';
$dbName = '';
$con = mysql_connect($dbServer, $dbUser, $dbPass);
mysql_select_db($dbName, $con);
$query = "select time from alessprep where id = 1";
$sql = mysql_query($query, $con);
$row = mysql_fetch_array($sql);
$query1 = "create table if not exists img (id int primary key auto_increment,imgno int,categories int)";
$sql1 = mysql_query($query1, $con);
mysql_close($con);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["category"] === "Angry") {
        $dbServer = 'mysql008.phy.lolipop.lan';
        $dbUser = '';
        $dbPass = '';
        $dbName = '';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $query = "insert into img (imgno,categories) values(" . $_SESSION['img'][$_SESSION['pos']] . ",1)";
        $sql = mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['pos'] ++;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    } else if ($_POST["category"] === "Sadness") {
        $dbServer = '';
        $dbUser = '';
        $dbPass = '';
        $dbName = '';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $query = "insert into img (imgno,categories) values(" . $_SESSION['img'][$_SESSION['pos']] . ",2)";
        $sql = mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['pos'] ++;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    } else if ($_POST["category"] === "Tired") {
        $dbServer = '';
        $dbUser = '';
        $dbPass = '';
        $dbName = '';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $query = "insert into img (imgno,categories) values(" . $_SESSION['img'][$_SESSION['pos']] . ",3)";
        $sql = mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['pos'] ++;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    } else if ($_POST["category"] === "Joy") {
        $dbServer = '';
        $dbUser = '';
        $dbPass = '';
        $dbName = '';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $query = "insert into img (imgno,categories) values(" . $_SESSION['img'][$_SESSION['pos']] . ",4)";
        $sql = mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['pos'] ++;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    }
}
if (empty($_SESSION['pos']) || $_SESSION['pos'] === 0) {
    $_SESSION['pos'] = 0;
    if ($row[0] % 4 == 1) {
        $number = range(1, 97, 4);
        shuffle($number);
        for ($i = 0; $i < 25; $i++) {
            $_SESSION['img'][$i] = $number[$i];
        }
        $_SESSION['pos'] = 0;
        $dbServer = '';
        $dbUser = '';
        $dbPass = '';
        $dbName = '';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $time = $row[0] + 1;
        $query = "update alessprep set time = " . $time . " where id = 1";
        $sql = mysql_query($query, $con);
        mysql_close($con);
    } else if ($row[0] % 4 == 2) {
        $number = range(2, 98, 4);
        shuffle($number);
        for ($i = 0; $i < 25; $i++) {
            $_SESSION['img'][$i] = $number[$i];
        }
        $_SESSION['pos'] = 0;
        $dbServer = '';
        $dbUser = '';
        $dbPass = '';
        $dbName = '';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $time = $row[0] + 1;
        $query = "update alessprep set time = " . $time . " where id = 1";
        $sql = mysql_query($query, $con);
        mysql_close($con);
    } else if ($row[0] % 4 == 3) {
        $number = range(3, 99, 4);
        shuffle($number);
        for ($i = 0; $i < 25; $i++) {
            $_SESSION['img'][$i] = $number[$i];
        }
        $_SESSION['pos'] = 0;
        $dbServer = '';
        $dbUser = '';
        $dbPass = '';
        $dbName = '';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $time = $row[0] + 1;
        $query = "update alessprep set time = " . $time . " where id = 1";
        $sql = mysql_query($query, $con);
        mysql_close($con);
    } else if ($row[0] % 4 == 0) {
        $number = range(4, 100, 4);
        shuffle($number);
        for ($i = 0; $i < 25; $i++) {
            $_SESSION['img'][$i] = $number[$i];
        }
        $_SESSION['pos'] = 0;
        $dbServer = '';
        $dbUser = '';
        $dbPass = '';
        $dbName = '';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $time = $row[0] + 1;
        $query = "update alessprep set time = " . $time . " where id = 1";
        $sql = mysql_query($query, $con);
        mysql_close($con);
    }
}
$main_img = $main_img = "images/" . $_SESSION['img'][$_SESSION['pos']] . ".jpg";
if($_SESSION['pos'] >= 25){
    
    unset($_SESSION['pos']);
    for($i = 0;$i<25;$i++){
        unset($_SESSION['img'][$i]);
    }
    echo 'Thank you for your help!!!';
    exit();
    session_destroy();
}
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>以下の写真が属するのに最も適切だと思うカテゴリーを選んでください</h1>
        <img src="<?= $main_img ?>"/>
        <div>
            <form method="post" action="">
                <input type="submit" name="category" value="Angry">
                <input type="submit" name="category" value="Sadness">
                <input type="submit" name="category" value="Tired">
                <input type="submit" name="category" value="Joy">
            </form>
        </div>
        <text title="<?= $_SESSION['pos'] ?>">
    </body>
</html>