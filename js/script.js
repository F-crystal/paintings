// $.get('server.php','hide=home',data=>{
// 	data.forEach(v=>{
// 		$(".main_mid-bottom").append(
// 			$(`<div>
// 					<div>
// 						<img src="${v.src}" >
// 					</div>
// 					<p>${v.name}</p>
// 					<i style="display:none">${v.id}</i>
// 				</div>`)
// 		)
// 	})
// },"JSON")
$("main>.main_mid>.main_mid-bottom>div>div>img").click(e=>{
	e=event;
	var target=$(e.srcElement);
	var id=target.parent().next().next().html();
	sessionStorage.id=id;
	this.open("html/details.html","_blank");
})

$(".seek").click(()=>{
	$(".tishi").toggle()
})