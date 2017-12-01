var isClicked = document.getElementById("openbtn") ;
var isClosed = document.getElementById("closebtn") ;
//document.getElementById("mySidenav").style.width = "0";
function openNav() {
	if($(window).width() < 960){
    document.getElementById("mySidenav").style.width = "250px";
}

}

function closeNav() {
	if($(window).width() < 960){
    document.getElementById("mySidenav").style.width = "0";
}

}
isClosed = isClosed.addEventListener("click",closeNav);
isClicked = isClicked.addEventListener("click", openNav);

var width = $(window).width();

$(window).resize(function(){
	width = $(window).width();
	console.log (width);
if(width <= 960 ){
	document.getElementById("mySidenav").style.width = "0";
	isClosed = isClosed.addEventListener("click", closeNav);
	isClicked = isClicked.addEventListener("click", openNav);
	
	
	console.log ('this is working');
}
else{
 document.getElementById("mySidenav").style.width = "75%";
}
});

console.log (width);


