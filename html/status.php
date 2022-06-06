<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset1.css"/>
		<link rel="stylesheet" type="text/css" href="../css/status.css"/>
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
					搜索结果有250条
				</div>-->
				<div class="main_mid-bottom">
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
						<i style="display: none;">1</i>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
					<div>
						<div>
							<img src="../img/5cc006adccb56d2448a31bbb.jpeg" >
						</div>
						<p>粉黛生春古典花卉图-010</p>
					</div>
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
