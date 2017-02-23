function getStart(){

	$('#index_search button').click(function(){

		var search_txt = $('input[name="search_txt"]').val();
		
		var search_key = "tag";
		
		location.href = base_url+"header_search?search_key="+search_key+"&search_txt="+search_txt;

	})

	$('.classList li').click(function(){

		var search_txt = $(this).html();

		var search_key = "category";

		location.href = base_url+"header_search?search_key="+search_key+"&search_txt="+search_txt;

	})

}



window.addEventListener('load',getStart);
