function showImage(){
	
	var att= $('#archivo').prop('files')[0];
	console.log(att);
	$('#tema').after("<img>" );
	
}