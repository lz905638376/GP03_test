<?php
header('Content-Type:text/html;charset=utf-8');

$type = $_GET['type'];
$page = $_GET['page'];
$userId = $_GET['userId'];
$name = $_GET['name'];
$sex = $_GET['sex'];
$age = $_GET['age'];
$phone = $_GET['phone'];

$link = mysqli_connect('localhost','root','root','gp_03');

if(!$link){
	echo '{"err":-1,"msg":"连接失败"}';
	die();
}

if($type === 'page'){
	$all_sql = "select * from user";
	$all_res = mysqli_query($link,$all_sql);
	
	$total = mysqli_affected_rows($link);
	
	$start = ($page - 1)*8;
	
	$page_sql = "select * from user order by id limit $start,8";
	$page_res = mysqli_query($link,$page_sql);
	$page_arr = mysqli_fetch_all($page_res,1);
	$data = json_encode($page_arr);
	if(count($page_arr)>0){
		echo '{"err":1,"msg":"分页数据","total":'.$total.',"data":'.$data.'}';
	}else{
		echo '{"err":0,"msg":"暂无数据","total":"","data":""}';
	}
}else if($type === 'update'){
	$update_sql = "update user set name='$name',sex='$sex',age='$age',phone='$phone' where id='$userId'";
	$update_res = mysqli_query($link,$update_sql);
	$num = mysqli_affected_rows($link);
	if($num > 0){
		echo '{"err":1,"msg":"修改成功"}';
	}else{
		echo '{"err":0,"msg":"修改失败"}';
	}
	
}else if($type === 'delete'){
	$delete_sql = "delete from user where id= $userId";
	$delete_res = mysqli_query($link,$delete_sql);
	$num = mysqli_affected_rows($link);
	if($num > 0){
		echo '{"err":1,"msg":"删除成功"}';
	}else{
		echo '{"err":0,"msg":"删除失败"}';
	}
}else if($type === 'insert'){
	$insert_sql = "insert into user set name='$name',sex='$sex',age='$age',phone='$phone'";
	$insert_res = mysqli_query($link,$insert_sql);
	$num = mysqli_affected_rows($link);
	if($num > 0){
		echo '{"err":1,"msg":"添加成功"}';
	}else{
		echo '{"err":0,"msg":"添加失败"}';
	}
}else{
	echo '{"err":0,"msg":"参数错误"}';
}



mysqli_close($link);
?>