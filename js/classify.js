/*$(".tihuan").click(e=>{
	let target=$(e.srcElement);
	let Img=target.prev().prev().prev().children()
	if(Img.attr('src')!='../img/5cc006e4ccb56d2448a31c68.jpeg'){
		Img.attr('src','../img/5cc006e4ccb56d2448a31c68.jpeg')
	}else{
		Img.attr('src','../img/5cc006adccb56d2448a31bbb.jpeg')
	}
})*/

/*$.get('php/server.php','hide=classify',data=>{
	data.forEach(v=>{
		$(".main_mid-bottom").append(
			$(`<div>
					<div>
						<div>
							<img src="${v.imgUrl}" >
						</div>
						<p>${v.title}</p>
						<i style="display: none;">${v.id}</i>
						<img class="tihuan" src="../img/换一换.svg" >
					</div>
				</div>`)
		)
	})
},"JSON")
$("main>.main_mid>.main_mid-bottom>div>div>div>img").click(e=>{
	e=event;
	var target=$(e.srcElement);
	var id=target.parent().next().next().html();
	sessionStorage.id=id;
	this.open("status.php");
})*/