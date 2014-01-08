<?php

session_start();

$dbServer = 'mysql008.phy.lolipop.lan';
$dbUser = 'LAA0425409';
$dbPass = 'Newworld';
$dbName = 'LAA0425409-alessprep';
$con = mysql_connect($dbServer, $dbUser, $dbPass);
mysql_select_db($dbName, $con);
$query = "select time from alesstime_female where id = 1";
$sql = mysql_query($query, $con);
$row = mysql_fetch_array($sql);
$queryStr = "create table if not exists aless_female (id int primary key auto_increment , time int, orders int ,groupnum int , R int ,G int, B int , category int)";
$sql1 = mysql_query($queryStr, $con);
mysql_close($con);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["category"] === "Angry") {
        $dbServer = 'mysql008.phy.lolipop.lan';
        $dbUser = 'LAA0425409';
        $dbPass = 'Newworld';
        $dbName = 'LAA0425409-alessprep';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $query = "insert into aless_female (time,orders,groupnum,R,G,B,category) values(" . $row[0] . "," . $_SESSION['pos'] . "," . $_SESSION['img'][$_SESSION['pos']] . "," . $_SESSION['R'][$_SESSION['pos']] . "," . $_SESSION['G'][$_SESSION['pos']] . "," . $_SESSION['B'][$_SESSION['pos']] . ",1)";
        $sql = mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['pos'] ++;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    } else if ($_POST["category"] === "Sadness") {
        $dbServer = 'mysql008.phy.lolipop.lan';
        $dbUser = 'LAA0425409';
        $dbPass = 'Newworld';
        $dbName = 'LAA0425409-alessprep';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $query = "insert into aless_female (time,orders,groupnum,R,G,B,category) values(" . $row[0] . "," . $_SESSION['pos'] . "," . $_SESSION['img'][$_SESSION['pos']] . "," . $_SESSION['R'][$_SESSION['pos']] . "," . $_SESSION['G'][$_SESSION['pos']] . "," . $_SESSION['B'][$_SESSION['pos']] . ",2)";
        $sql = mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['pos'] ++;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    } else if ($_POST["category"] === "Tired") {
        $dbServer = 'mysql008.phy.lolipop.lan';
        $dbUser = 'LAA0425409';
        $dbPass = 'Newworld';
        $dbName = 'LAA0425409-alessprep';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $query = "insert into aless_female (time,orders,groupnum,R,G,B,category) values(" . $row[0] . "," . $_SESSION['pos'] . "," . $_SESSION['img'][$_SESSION['pos']] . "," . $_SESSION['R'][$_SESSION['pos']] . "," . $_SESSION['G'][$_SESSION['pos']] . "," . $_SESSION['B'][$_SESSION['pos']] . ",3)";
        $sql = mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['pos'] ++;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    } else if ($_POST["category"] === "Joy") {
        $dbServer = 'mysql008.phy.lolipop.lan';
        $dbUser = 'LAA0425409';
        $dbPass = 'Newworld';
        $dbName = 'LAA0425409-alessprep';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $query = "insert into aless_female (time,orders,groupnum,R,G,B,category) values(" . $row[0] . "," . $_SESSION['pos'] . "," . $_SESSION['img'][$_SESSION['pos']] . "," . $_SESSION['R'][$_SESSION['pos']] . "," . $_SESSION['G'][$_SESSION['pos']] . "," . $_SESSION['B'][$_SESSION['pos']] . ",4)";
        $sql = mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['pos'] ++;
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        exit();
    }
}
if (empty($_SESSION['pos']) || $_SESSION['pos'] === 0) {
    $_SESSION['pos'] = 0;
        $number = range(1, 8, 1);
        $numR = range(0,256,32);
        $numG = range(0,256,32);
        $numB = range(0,256,32);
        
        shuffle($number);
        shuffle($numR);
        shuffle($numG);
        shuffle($numB);
        
        for ($i = 0; $i < 8; $i++) {
            $_SESSION['img'][$i] = $number[$i];
            $_SESSION['R'][$i] = $numR[$i];
            $_SESSION['G'][$i] = $numG[$i];
            $_SESSION['B'][$i] = $numB[$i];
        }
        $_SESSION['pos'] = 0;
        $dbServer = 'mysql008.phy.lolipop.lan';
        $dbUser = 'LAA0425409';
        $dbPass = 'Newworld';
        $dbName = 'LAA0425409-alessprep';
        $con = mysql_connect($dbServer, $dbUser, $dbPass);
        mysql_select_db($dbName, $con);
        $time = $row[0] + 1;
        $query = "update alesstime_female set time = " . $time . " where id = 1";
        $sql = mysql_query($query, $con);
        mysql_close($con);
}
$main_img = "images/" . $_SESSION['img'][$_SESSION['pos']];
if($_SESSION['pos'] >= 8){
    
    unset($_SESSION['pos']);
    for($i = 0;$i<8;$i++){
        unset($_SESSION['img'][$i]);
        unset($_SESSION['R'][$i]);
        unset($_SESSION['G'][$i]);
        unset($_SESSION['B'][$i]);
    }
    echo 'Thank you for your help!!!';
    exit();
    session_destroy();
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body onload="loadwindow()">
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function loadwindow(){
                document.body.style.backgroundColor = 'rgb(' + "<?php echo $_SESSION['R'][$_SESSION['pos']] ?>" + ',' + "<?php echo $_SESSION['G'][$_SESSION['pos']] ?>" + ',' + "<?php echo $_SESSION['B'][$_SESSION['pos']] ?>" + ')'; 
            }
            var i = 1;
            var interval;
            function showphoto(){
                if(i === 1){
                    var img = document.getElementById("facephoto");
                    img.style.visibility = "visible";
                }
                var img = document.getElementById("facephoto");
                img.src = "<?php echo $main_img ?>" + "/" + i + ".jpg";
                if(i === 6){
                    clearInterval(interval);
                    var img = document.getElementById("facephoto");
                    img.style.visibility = "hidden";
                    setTimeout("show()",5000);
                }
                i++;
            }
            function show(){
                var form = document.getElementById("form");
                var title = document.getElementById("title");
                title.style.visibility = "visible";
                form.style.visibility = "visible";
            }
            interval = setInterval("showphoto()",400);
        </script>
        <h1 id="title" style="visibility: hidden">表示された写真たちが属するのに最も適切だと思うカテゴリーを選んでください</h1>
        <img id="facephoto" style="visibility: hidden; opacity: 0.1"/>
        <div id="form" style="visibility: hidden">
            <form method="post" action="">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <input type="submit" name="category" value="Angry" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <input type="submit" name="category" value="Sadness" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <input type="submit" name="category" value="Tired" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <input type="submit" name="category" value="Joy" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
                <h5 style="text-align: right">あと <?php echo (7 - $_SESSION['pos']) ?> 回</h5>
            </form>
        </div>
        <text title="<?= $_SESSION['pos'] ?>">
    </body>
</html>