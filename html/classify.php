<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset1.css"/>
		<link rel="stylesheet" type="text/css" href="../css/classify.css"/>
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
				<!--<div class="main_mid-top">
				</div>-->
				<div class="main_mid-bottom">
					<?php 
					include('../mysql_connect.php');
					$sql = 'select 类别与入口id1.入口id as id1,类别与入口id2.入口id as id2 from 类别与入口id1,类别与入口id2 where 类别与入口id1.类别 = 类别与入口id2.类别';
					$res = mysqli_query($con,$sql);
					foreach($res as $row){
						echo"
					<div>
						<div>
						<div class=\"devices-box\">
						<div class=\"image-box\">
								<img src='../所有图片/{$row['id1']}.jpeg' onload='if(this.height >= 300){this.width = 300}'>
							</div>
							</div>
							<p></p>
							<i style='display: none;''>1</i>
							<img class='tihuan' src='../img/换一换.svg'>
						</div>
						<script>
						$('.tihuan').click()e=>{
							let target=$(e.srcElement);
							let Img=target.prev().prev().prev().children()
							if(Img.attr('src')!='所有图片/{$row['id1']}.jpeg'){
								Img.attr('src','所有图片/{$row['id1']}.jpeg')
							}else{
								Img.attr('src','所有图片/{$row['id2']}.jpeg')
							}
						})
						</script>
					</div>";
					};
					?>
					<!--<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>
					<div>
						<div>
							<div>
								<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
							</div>
							<p>粉黛生春古典花卉图-010</p>
							<i style="display: none;">1</i>
							<img class="tihuan" src="../img/换一换.svg" >
						</div>
					</div>-->
					
				</div>
			</div>
		</main>
		
		<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/classify.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
