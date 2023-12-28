<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include './includes/config.php';

$username = $_POST["username"];
$password = $_POST["password"];
$flag = 'true';
//$query = $mysqli->query("SELECT email, password from users");

$result = $mysqli->query('SELECT id,email,password,fname,type from users order by id asc');

if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->email === $username && password_verify($password,$obj->password)  && $obj->type === 'user') {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $obj->type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['fname'] = $obj->fname;
      header("location: ./user/index.php");
    }
    else if($obj->email === $username && password_verify($password,$obj->password) && $obj->type === 'admin') {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $obj->type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['fname'] = $obj->fname;
      header("location: ./admin/lp.php");
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
          
        }
    }
  }
}

function redirect() {
  echo "
  <script>
    alert('Username atau password salah. Silahkan login kembali');
  </script>
";
  header("Refresh: 0; url=login.php");
}


?>
