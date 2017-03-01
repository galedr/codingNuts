$(document).ready(function(){

	$('#content_table tr').mouseover(function(){

		$(this).find('.article_option').css('visibility','visible');	

	}) 

	$('#content_table tr').mouseleave(function(){

		$(this).find('.article_option').css('visibility','hidden');	

	}) 

})

function tag_search(num_page){

	$('#tag_form').attr('action',base_url+"back_end_search/tag/none/"+num_page).submit();

}


