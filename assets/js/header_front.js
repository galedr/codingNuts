function getStart(){

	$('.classList li').click(function(){

		var s_val = $(this).attr('value');

		var s_key = "category";

		location.href = base_url+"category/1?s_key="+s_key+"&s_val="+s_val;

	})

}

function tag_search(num_page){

	$('#tag_form').attr('action',base_url+"header_search/tag/none/"+num_page).submit();

}

function collect_check(a_id){

	$.ajax({

		url: base_url+"collect_check",
		type: "POST",
		data: {a_id:a_id},
		dataType: "JSON",
		success: function(data){
			if (data['status'] == 'success') {

				if (data['data'] == true) {
					alert('您已經成功收藏本文');
					window.location.reload();
				} else {
					alert('您已經不在收藏本文');
					window.location.reload();
				}

			}
		}

	})

}

function unset_collect(a_id, m_account){

	$.ajax({

		url: base_url+"unset_collect",
		type: "POST",
		data: {a_id:a_id, m_account:m_account},
		dataType: "JSON",
		success: function(data){
			if (data['status'] == 'success') {
				alert('已移除此收藏');
				window.location.reload();
			}
		}
	})

}


window.addEventListener('load',getStart);
