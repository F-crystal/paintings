<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/reset1.css"/>
		<link rel="stylesheet" type="text/css" href="css/primary.css"/>
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
			<div id="logo"><a href="index.php">中国国画检索系统</a></div>
			<ul>
				<li><a href="index.php">首页</a></li>
             	<li><a href="expert.php">专家检索</a></li>
				<li><a href="html/classify.php">分类浏览</a></li>
			</ul>
		</nav>
		<main>
			<div class="main_top">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="form">
					<select name="sel">
						<option value="name" selected="selected">标题</option>
						<option value="artist">作者名</option>
						<option value="dynasty">朝代</option>
						<option value="size">画幅</option>
						<option value="content">内容</option>
					</select>
					<input name="priquery" id="search" type="text" placeholder="请输入" />
					<input type="submit" id="sub" value="查询"/>
				</form>
			</div>
			<div class="main_mid">
				<div id="restitle" class="main_mid-top"></div>
				<ul id="contain" class="main_mid-bottom">
					<?php
						//调用$con
    					include('mysql_connect.php');
						//处理提交数据
						if ($_SERVER["REQUEST_METHOD"] == "POST"){
							$gjc = $_POST["priquery"];//获得检索框内容
							$content = $_POST['sel'];//获得下拉选择
							//分不同的情况处理，支持模糊检索
							switch($content){
								case "name":
									$mid = "select 受控词 from 标题受控词表 where 非受控词 like '%{$gjc}%'";
									$midvalue = mysqli_query($con,$mid);
									$midva = mysqli_fetch_array($midvalue)[0];
									if ($midva == ""){
										$sql = "select 标题,id from 汇总数据,作者作品数目 where 汇总数据.作者=作者作品数目.作者 and 标题 like '%{$gjc}%' order by 作品数目 desc" ;
									}else{
										$sql = "select 标题,id from 汇总数据,作者作品数目 where 汇总数据.作者=作者作品数目.作者 and 标题 like '%{$midva}%' order by 作品数目 desc" ;
									};
									break;
								case "artist":
									$mid = "select 受控词 from 作者受控词表 where 非受控词 like '%{$gjc}%'";
									$midvalue = mysqli_query($con,$mid);
									$midva = mysqli_fetch_array($midvalue)[0];
									if ($midva == ""){
										$sql = "select 标题,id from 汇总数据,作者作品数目 where 汇总数据.作者=作者作品数目.作者 and 汇总数据.作者 like '%{$gjc}%' order by 作品数目 desc" ;
									}else{
										$sql = "select 标题,id from 汇总数据,作者作品数目 where 汇总数据.作者=作者作品数目.作者 and 汇总数据.作者 like '%{$midva}%' order by 作品数目 desc" ;
									};
									break;
								case "dynasty":
									$sql = "select 标题,id from 汇总数据,作者作品数目 where 汇总数据.作者=作者作品数目.作者 and 创作时代 like '%{$gjc}%' order by 作品数目 desc" ;
									break;
								case "size":
									$sql = "select 标题,id from 汇总数据,作者作品数目 where 汇总数据.作者=作者作品数目.作者 and 画幅 like '%{$gjc}%' order by 作品数目 desc" ;
									break;
								case "content":
									$mid="select 受控词 from 内容受控词表 where 非受控词 like '%{$gjc}%'";
									$midvalue = mysqli_query($con,$mid);
									$midva = mysqli_fetch_array($midvalue)[0];
									if ($midva == ""){
										$sql = "select 标题,id from 汇总数据,作者作品数目 where 汇总数据.作者=作者作品数目.作者 and 内容 like '%{$gjc}%' order by 作品数目 desc" ;
									}else{
										$sql = "select 标题,id from 汇总数据,作者作品数目 where 汇总数据.作者=作者作品数目.作者 and 内容 like '%{$midva}%' order by 作品数目 desc" ;
									};
									break;
							};
						};
						$res=mysqli_query($con,$sql);
						$inum = 0;
						//循环生成内容
						foreach ($res as $row){					
								$inum += 1;
								echo "					
								<div id='container'>
								<a href='html/details.php?id={$row['id']}'>
									<div class=\"devices-box\">
									<div class=\"image-box\">
										<img src='所有图片/{$row['id']}.jpeg' >
									</div>
									</div>
									<p>{$row['标题']}</p>
									<i style='display: none;'>1</i>
								</a>
								</div>	
								";
						};
						echo "<script> var x = document.getElementById('restitle');x.innerHTML = '搜索结果有{$inum}条';</script>";
						echo "<script> var y = document.getElementById('search');y.placeholder = '{$gjc}';</script>"
					?>
				</ul>
			</div>
		</main>
		
		<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/senior.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>