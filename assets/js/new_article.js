
function ckeditor(){

	//啟動文字編輯器

	CKFinder.setupCKEditor();
	CKEDITOR.config.height = 450;
	var editor = CKEDITOR.replace('postContent',{});

	//點擊設定文章分類

	$('.postClass').click(function(){

		$('.postClass_set').css('display','block');

		$('.postClass').css('background-color','#FFEE99');

	})

	//已有文章類別選擇

	$('input[name="usedClass"]').change(function(){

		var selected_class = $(this).val();
		
		//初始化css狀態

		$('.set_already label').css('background-color','white');
		$('.set_already label').css('color','black');

		var label_id = $('input[name="usedClass"]:checked').val();

		//change後變更變選取的css狀態

		$('label[for="'+label_id+'"]').css('background-color','#FF8800');
		$('label[for="'+label_id+'"]').css('color','white');
		
	})

	//從舊有文章類別選擇

	$('#setClass_submit').click(function(){

		var selected_class = $('input[name="usedClass"]:checked').val();

		$('.postClass span').html(selected_class);

		$('.postClass_set').css('display','none');

		$('.postClass').css('background-color','white');

	})

	//新輸入的文章分類

	$('#insertClass_submit').click(function(){

		var insert_class = $('input[name="insertClass"]').val();

		$('.postClass span').html(insert_class);

		$('.postClass_set').css('display','none');

		$('.postClass').css('background-color','white');

	})

	//文章Tag選擇

	$('.postTag').click(function(){
		
		$('.postTag_set').css('display','block');

		$('.postTag').css('background-color','#FFEE99');

	})

	//文章Tag確認設定

	$('#insertTag_submit').click(function(){

		$('.postTag_set').css('display','none');

		var post_tag = $('#insertTag').val();

		$('#postTag').html(post_tag);

	})

	//文章Tag輸入內容
	$('#insertTag').keydown(function(event){

		if (event.which == 188) {

			$('.used_tag').empty();

			return;

		}

		var input_text = $('#insertTag').val();

		var text_arr = input_text.split(",");

		if (text_arr.length > 1) {
			
			var search_text = input_text.split(",").pop();

		} else {

			var search_text = input_text;

		}

		$.ajax({

			url: base_url+'tag_search',
			data: {search_text:search_text},
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
			if (data['status'] == 'success') {
				$('.used_tag').html(data['data']);
				}
			}

		})//end of ajax

	})

	//設定日期

	$('.postDate').click(function(){

		$('.set_postDate').css('display','block');

		$('.postDate').css('background-color','#FFEE99');

	})

	//日期radio事件，決定現在或設定日期

	$('input[name="setDate"]').change(function(){

		var setDate_way = $('input[name="setDate"]:checked').val();

		if (setDate_way == 'choose') {

			$('.chooseDate').css('display','block');

		} else {

			$('.chooseDate').css('display','none');

		}

	})

	//選擇日期

	$('.setDate_submit').click(function(){

		var setDate_way = $('input[name="setDate"]:checked').val();
		
		if (setDate_way == 'now') {

			$('#postTime').html('立刻發佈');

		} else {

			var chooseDate = $('input[name="postDate"]').val();
			
			var today = Date();

			if (chooseDate < today) {
				alert('選則的日期必須是今天以後');
				$('input[value="now"]').attr('checked','checked');
			} else {
				$('#postTime').html(chooseDate);	
			}

		}

		$('.set_postDate').css('display','none');
		$('.postDate').css('background-color','white');
		$('.chooseDate').css('display','none');

	})

	//發佈鈕按下後事件

	$('#submitPost').click(function(){
		
		var postTitle = $('input[name="postTitle"]').val();
		
		var postContent = editor.getData();

		var postDate = $('#postTime').html();
		
		var postClass = $('.postClass span').html();

		if (postTitle != '' && postTitle != undefined) {
			if (postContent != '' && postContent != undefined) {
				
				$.ajax({
					url: base_url+'add_article',
					type: 'POST',
					data: {postTitle: postTitle,
							postContent: postContent,
							postDate: postDate,
							postClass: postClass},
					dataType: 'JSON',
					success: function(data){
						alert('新增文章成功');
						location.href = base_url+'backEnd';
					}
				})

			} else {
				alert('內文尚未輸入')
			}
		} else {
			alert('標題尚未輸入');
		}

	})

}



window.addEventListener('load',ckeditor);