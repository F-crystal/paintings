<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset1.css"/>
		<link rel="stylesheet" type="text/css" href="../css/classify.css"/>
		<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<style>
			  	.devices-box{
					width: 100%;
					height: 150px;
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
				<li><a href="../index.php">全部艺术品</a></li>
				<!--<li><a href="senior.html">高级检索</a></li>-->
             	<li><a href="../expert.php">专家检索</a></li>
				<li class="active">分类浏览</li>
			</ul>
		</nav>
		<main>
			<div class="main_mid">
				<div class="main_mid-bottom">
					<?php 
					include('../mysql_connect.php');
					$sql = 'select 类别与入口id1.入口id as id1,类别与入口id2.入口id as id2 from 类别与入口id1,类别与入口id2 where 类别与入口id1.类别 = 类别与入口id2.类别';
					$res = mysqli_query($con,$sql);
					$inum = 0;
					foreach($res as $row){
						$inum += 1;
						echo"
					<div>
						<div>
						<div class='devices-box'>
						<a class='image-box' id='box$inum' href='status.php?id={$row['id1']}&pageid=1' style:'z-index:3' target='_blank'>
							<img id='content$inum' src='../所有图片/{$row['id1']}.jpeg' onload='if(this.height >= 300){this.width = 300}'>
						</a>
						</div>
						<p></p>
						<img id='tihuan$inum' class='tihuan' src='../img/换一换.svg'>
						<script>
						$('#tihuan$inum').click(e=>{
							let Img$inum=$('#content$inum')
							let url$inum=$('#box$inum')
							if(Img$inum.attr('src')!='../所有图片/{$row['id1']}.jpeg'){
								Img$inum.attr('src','../所有图片/{$row['id1']}.jpeg')
								url$inum.attr('href','status.php?id={$row['id1']}&pageid=1')
							}else{
								Img$inum.attr('src','../所有图片/{$row['id2']}.jpeg')
								url$inum.attr('href','status.php?id={$row['id2']}&pageid=2')
							}
						})
						</script>
						</div>
					</div>";
					
					};
					?>
				</div>
			</div>
		</main>
	</body>
</html>
