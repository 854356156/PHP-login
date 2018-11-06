<?php
//连接数据库
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpwd = '';
$dbname = 'login';

$db = new mysqli($dbhost, $dbuser, $dbpwd, $dbname );

if($db->connect_errno !=0){
    echo '连接失败';
    echo $db->connect_error;
}

$db->query('SET NAMES UTF8');

//获取登录数据
$user = $_POST['user'];
$pwd = $_POST['pwd'];

//获取表的名称$table
$result = $db->query('SHOW TABLES');
$tables = [];
while($arr = $result->fetch_assoc()){
    $tables[] = $arr;
}
$table = implode(",", $tables[0]);

//查询
$sql = 'SELECT * FROM '.$table.' WHERE user='.'\''.$user.'\''.' and pwd='.'\''.$pwd.'\'';
$res = $db->query($sql);
//判断有没有值
if($res->num_rows){
    header("location: succ.html");
}else{
    echo "<script>alert('账号或密码出错，请重新输入');location.href='login.html';</script>";

}