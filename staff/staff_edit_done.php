<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> ユビーネット</title>
</head>
<body>

<?php

try
{

$staff_name = $_POST['name'];
$staff_pass = $_POST['pass'];


$staff_code = $_POST['code'];

$staff_name = htmlspecialchars($staff_name);
$staff_pass = htmlspecialchars($staff_pass);


$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_name;
$data[] = $staff_pass;
$data[] = $staff_code;

$stmt->execute($data);

$dbh = null;

print $staff_name;
print 'さんを修正しました。<br />';

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="staff_list.php"> 戻る</a>

</body>
</html>
