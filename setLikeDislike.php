<?php
include('./_config.php');
if(isset($_POST['type']) && $_POST['type']!='' && isset($_POST['id']) && $_POST['id']>0){
	$type=mysqli_real_escape_string($conn,$_POST['type']);
	$id=mysqli_real_escape_string($conn,$_POST['id']);
	
	if($type=='like'){
		if(isset($_COOKIE['like_'.$id])){
			setcookie('like_'.$id,"yes",1);
			$sql="UPDATE `pageview` set like_count=like_count-1 where id='$id'";
			$opertion="unlike";
		}else{
			
			if(isset($_COOKIE['dislike_'.$id])){
				setcookie('dislike_'.$id,"yes",1);
				mysqli_query($conn,"UPDATE `pageview` set dislike_count=dislike_count-1 where id='$id'");
			}
			
			setcookie('like_'.$id,"yes",time()+60*60*24*365*5);
			$sql="UPDATE `pageview` set like_count=like_count+1 where id='$id'";
			$opertion="like";
		}
	}
	
	if($type=='dislike'){
		if(isset($_COOKIE['dislike_'.$id])){
			setcookie('dislike_'.$id,"yes",1);
			$sql="UPDATE `pageview` set dislike_count=dislike_count-1 where id='$id'";
			$opertion="undislike";
		}else{
			
			if(isset($_COOKIE['like_'.$id])){
				setcookie('like_'.$id,"yes",1);
				mysqli_query($conn,"UPDATE `pageview` set like_count=like_count-1 where id='$id'");
			}
			
			setcookie('dislike_'.$id,"yes",time()+60*60*24*365*5);
			$sql="UPDATE `pageview` set dislike_count=dislike_count+1 where id='$id'";
			$opertion="dislike";
		}
	}
	mysqli_query($conn,$sql);

	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from `pageview` where id='$id'"));
	
	echo json_encode([
		'opertion'=>$opertion,
		'like_count'=>$row['like_count'],
		'dislike_count'=>$row['dislike_count']
	]);
}
?>