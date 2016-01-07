<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8" /> 
    <meta http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>
        课堂签到
    </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

    
<?php
//$fromUsername=$_GET["openid"];

  if(isset($_POST["submit"]))
  {
	bangding(urlencode($_POST["txtUserID"]),$_POST["txtUserPwd"]);
      exit();	/**************跳转到新的页面******************/
  }
//$user=$_POST["txtUserID"];
//$password=$_POST["txtUserPwd"];
function bangding($no,$name)
{
            require_once './sql.php';
//mysql_query("set names utf8"); 
    mysql_query("set names 'utf8'");
    			$time=date('y-m-d h:i',time());
                $sql = "insert into student (no, name,time,flag) values( '$no', '$name','$time','1')";
                $a=_insert_data($sql);
    			if($a==1)
                {  $contentStr = "签到成功";echo $_SERVER["REMOTE_ADDR"];}
                else 
                    echo "签到失败<br/>请重新签到";
}
echo' <div id="wrapper">
	<form name="login-form" class="login-form" action="" method="post">
  	<div class="header">
	<h1>请输入签到信息</h1>
	</div>
	<div class="form">
    <form action="http://1.shnucs.sinaapp.com/index.php" method="post">
	<div align="center" class="row">
	<div class="content">
	<input name="txtUserID" type="text" class="input txtUserID" value="" placeholder="学 号[9位]" />
	<input name="txtUserPwd" type="text" class="input txtUserID" value="" placeholder="姓 名" />
	</div>
	<div class="footer">
	<input type="submit" name="submit" value="点击提交" id="btnLogin" class="button" onsubmit="return check()"/>
	<span>Copyright ©2015 Powered By Fancy & Yby Version 1.0.0 </span>
	</div>
	</form>
	</div>
	<div class="gradient"></div> '; 
?>
</body>
</html>