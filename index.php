<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/reset1.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<nav>
			<div id="logo"><a href="./index.php">中国国画检索系统</a></div>
			<ul>
				<li class="active">首页</li>
             	<li><a href="expert.php">专家检索</a></li>
				<li><a href="html/classify.php">分类浏览</a></li>
			</ul>
		</nav>
		<main>
			<div class="main_top">
				<form action="queryresult.php" method="POST" id="form">
					<select name="sel">
						<option value="name" selected="selected">标题</option>
						<option value="artist">作者名</option>
						<option value="dynasty">朝代</option>
						<option value="size">画幅</option>
						<option value="content">内容</option>
					</select>
					<input name="priquery" id="search" type="text" placeholder="请输入" />
					<a href="queryresult.php"><input type="submit" id="select_btn" value="查询"/></a>
				</form>
				<p class='hai'>(｡･∀･)ﾉﾞ嗨</p>
			</div>
		</main>
		
		<script src="js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.form.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/script.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>

