<?php

header('content-type:text/html;charset=utf-8');

$conn=mysqli_connect('localhost','root','qhbbjdx60913','chinese_painting_data') or die('数据库连接出错！');
mysqli_query($conn,'set names utf8');
$cc=isset($_GET['shopname'])?$_GET['shopname']:'';
if (!empty($cc)) {
	$a=str_replace('TI','标题',$cc);
	$b=str_replace('AU','作者',$a);
	$c=str_replace('DY','创作时代',$b);
	$d=str_replace('FR','画幅',$c);
	$e=str_replace('CO','内容',$d);
	$f=str_replace('%','like ',$e);
	$g=str_replace('+',' or ',$f);

$s="/\((.*)\)/s";
preg_match_all($s,$g,$ss);

if(!empty($ss[0])){
if(strpos($ss[1][0],'like')){
	$fs=explode( 'like',$ss[1][0]);
	$fp=explode( 'or',$fs[1]);
	$lk=$fs[0]." like '%".trim(str_replace('\'','',$fp[0])). "%' or ".$fs[0]."like '%".trim(str_replace('\'','',$fp[1]))."%'";
	$gg=explode('and', $g);
	
	$ww=explode('=', $gg[0]);

	$ww1=$ww[0]." like '%".str_replace('\'','',$ww[1])."%'";
		
		$gg[0]=$ww1;
		
		$g=implode(' and ', $gg);
		$g=str_replace($ss[1][0],$lk,$g);
}else{
	$ft=explode('=',$g);
	$fd=explode('-',$ft[1]);
	$ff=preg_match_all("/[\x{4e00}-\x{9fa5}]+/u",$fd[0],$th);
	$lik='';
	foreach ($th[0] as  $k=>$v) {
		if($k==count($th[0])-1){
			$lik .= $ft[0]." like '%".$v."%' ";
		}else{
			$lik .= $ft[0]." like '%".$v."%' and ";
		}
	

	}
		$lik='('.$lik.')';

		$lik.= ' and '.$ft[0]." not like '%".str_replace('\'','',$fd[1])."%'";
$g=$lik;
}

}else{
$q= explode(' ', $g);
$ks=99;
foreach ($q as  $k=>$va) {
	if(strpos($va,'*')){
$qq= explode('=', $va);
$qqq=str_replace('\'','',$qq);
if(strpos($qqq[1],'*')){
	$sg=explode('*', $qqq[1]);

	$likf='('.$qqq[0]." like '%".$sg[0]."%' or ".$qqq[0]." like '%".$sg[1]."%' ) ";

}
$ks=$k;

	}
}

if($ks!= 99){
	unset($q[$ks]);
	$g='';
	foreach ($q as  $val) {
$g.=' '.$val;
		
	}
	$g=$likf.=$g;
}
}
$sql="select * from `内容-动物` where ".$g;

$rs=mysqli_query($conn,$sql);
}				
/*TI='龚雪'and DY='当代'and (AU % '龚'+'龚')
TI='北宋'*'崔白' and CO='动物'
TI=('国画'+'南宋')*'佚名'-'柏'*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/reset1.css"/>
		<link rel="stylesheet" type="text/css" href="css/expert.css"/>
	</head>
	<body>
		<nav>
			<div id="logo"><a href="./index.php">中国国画检索系统</a></div>
			<ul>
				<li><a href="./index.php">全部艺术品</a></li>
				<!--<li><a href="html/senior.html">高级检索</a></li>-->
             	<li class="active">专家检索</li>
				<li><a href="html/classify.php">分类浏览</a></li>
			</ul>
		</nav>
		<main>
			<div class="main_top">
				<form action="" method="get">
					<input name="shopname" id="search" placeholder="藏品搜索" style="color: black" />
					<input type="hidden" name="hide" id="" value="chaz" />
					<input type="submit" value="查询"/ style="background-color:#CEA97D ;">
				</form>
				<div class="seek">示例</div>
				<div class="tishi">
					可检索字段：</br>
                TI=标题，AU=作者名，DY=朝代，FR=画幅，CO=主题</br>
                </br>
                示例：</br>
                1）TI='秋风'and DY='唐'and (AU % '陈'+'王')可以检索到标题包含"秋风"并且朝代包含"唐"并且作者为"陈"姓和"王"姓的所有画作;</br>
                2）TI='秋风'*'玉露' and CO='花'可以检索到标题包含"秋风"及"玉露"并且内容中包含"花"的所有画作;</br>
                3）TI=('霜'+'露')*'秋'-'冬'可检索标题含有"霜"或"露"有关"秋"的画作，并且可以去除与"冬"有关的部分画作内容;</br>
				</div>
			</div>
			<div class="main_mid">
				<div class="main_mid-top">
					搜索结果有250条
				</div>
				<div class="main_mid-bottom">
					<?php if(!empty($cc)){
						while($row=mysqli_fetch_assoc($rs)){

						
						?>
					<div>
						<div>
							<img src="<?php echo $row['图片']?>" >
						</div>
						<p><?php echo $row['标题']?></p>
						<i style="display: none;">1</i>
					</div>
					<?php }}?>
					
				</div>
			</div>
		</main>
		
		<script src="js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.form.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/script.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
