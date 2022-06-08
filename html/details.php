<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset1.css"/>
		<link rel="stylesheet" type="text/css" href="../css/details.css"/>
		<style>
			  	.devices-box{
					width: 100%;
					height: 350px;
					background: #ccc;
					box-sizing: border-box;
					margin-right: 20px;
				}
				.image-box{
					width: 100%;
					height: 100%;
					display: flex;
					justify-content: center;
					align-items: center;
				}
				img{
					max-width: 100%;
					max-height: 100%;
					object-fit: scale-down;
				}
		</style>
	</head>
	<body>
		<nav>
			<div id="logo"><a href="../index.php">中国国画检索系统</a></div>
			<ul>
				<li class="active"><a href="../index.php">首页</a></li>
             	<li><a href="../querysys/expert.html">专家检索</a></li>
				<li><a href="../html/classify.php">分类浏览</a></li>
			</ul>
		</nav>
		<?php
		include('../mysql_connect.php');
		$id = $_GET['id'];
		$sql = "select * from 汇总数据 where id = '{$id}';";
		$res = mysqli_query($con,$sql);
		$array = mysqli_fetch_array($res);
		?>
		<main>
			<div class="left">
				<div>名称：<?php echo $array["标题"]?></div>
				<div>作者：<span><?php echo $array["作者"]?></span></div>
				<div>画幅：<?php echo $array["画幅"]?></div>
				<div>创作时代：<?php echo $array["创作时代"]?></div>
				<div>内容：<?php echo $array["内容"]?></div>
			</div>
			<div class="right">
				<div class="devices-box">
     			<div class="image-box">
				<img src='../所有图片/<?php echo $array["id"]?>.jpeg' onload="if(this.height >= 320){this.width = 320}">
				</div>
				</div>
			</div>
		</main>

		
		<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<!--
			<script type="text/javascript">
			$.get('../server.php','hide=details',data=>{
				$("left").append(
					$(`<div>名称：${data.title}</div>
					<div>作者：<span>${data.name}</span></div>
					<div>画幅：${data.haufu}</div>
					<div>创作时代：${data.date}</div>
					<div>情绪：${data.heart}</div>
					<div>内容：${data.main}</div>`)
				);
				$("right").append(
					$(`<img src="${data.imgUrl}" />`)
				)
			},"JSON")
		</script>
		-->
	</body>
</html>
