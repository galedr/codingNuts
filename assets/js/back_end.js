$(document).ready(function(){

	$('#content_table tr').mouseover(function(){

		$(this).find('.article_option').css('visibility','visible');	

	}) 

	$('#content_table tr').mouseleave(function(){

		$(this).find('.article_option').css('visibility','hidden');	

	}) 

})

function send_cate(article_cate)
{
	
	var search_key = "category";

	$.ajax({
		url: base_url+'back_end_search',
		data: {search_txt: article_cate,
				search_key: search_key},
		type: "GET",
		dataType: "JSON",
	})
	
}

