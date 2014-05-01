$(document).ready(function(){
	$('ul#2 li').click(function(){
		 $('#1').append("<li class='s'>"+$(this).html()+"</li>");
        //console.log($("#1").children().length);
        
	})
    
  $(document).on("click","ul#1 li",function(){
        //console.log("12");
		$(this).remove();
	})  
 
  	$('#clear').click(function(){
		 $('#1').html("");
	})
	
})