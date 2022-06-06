<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset1.css"/>
		<link rel="stylesheet" type="text/css" href="../css/status.css"/>
		<style>
			  	.devices-box{
					width: 100%;
					height: 225px;
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
             	<li><a href="../expert.php">专家检索</a></li>
				<li class="active">分类浏览</li>
			</ul>
		</nav>
		<main>
			<div class="main_mid">
				<div class="main_mid-top" id="restitle"></div>
				<div class="main_mid-bottom">
				<?php 
					include('../mysql_connect.php');
					$id=$_GET['id'];
					$pageid=$_GET['pageid'];
					if($pageid == 1){
						$sql = "select 标题,结果id from 入口id1与结果id,汇总数据 where 入口id1与结果id.入口id = '{$id}' and 汇总数据.id = 入口id1与结果id.结果id";
					}else{
						$sql = "select 标题,结果id from 入口id2与结果id,汇总数据 where 入口id2与结果id.入口id = '{$id}' and 汇总数据.id = 入口id2与结果id.结果id";
					};
					$res = mysqli_query($con,$sql);
					$inum = 0;
					foreach($res as $row){
						$inum += 1;
						echo"
						<div id='container'>
						<a href='details.php?id={$row['结果id']}'>
							<div class=\"devices-box\">
							<div class=\"image-box\">
								<img src='../所有图片/{$row['结果id']}.jpeg' >
							</div>
							</div>
							<p>{$row['标题']}</p>
							<i style='display: none;'>1</i>
						</a>
						</div>
						";
					};
					echo "<script> var x = document.getElementById('restitle');x.innerHTML = '分类结果有{$inum}条';</script>";
				?>
				</div>
			</div>
		</main>
		
		<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$("main>.main_mid>.main_mid-bottom>div>div>img").click(e=>{
				e=event;
				var target=$(e.srcElement);
				var id=target.parent().next().next().html();
				sessionStorage.id=id;
				this.open("details.html");
			})
		</script>
	</body>
</html>
