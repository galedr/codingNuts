
function get_start(){

	//啟動文字編輯器
	tinymce.init({
		language:'zh_TW',
		selector:'#postContent',
		height:'460',
			plugins: [
				    "advlist autolink lists link image charmap print preview anchor",
				    "searchreplace visualblocks code fullscreen",
				    "insertdatetime media table contextmenu paste jbimages"
				  ],

  			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

		    menubar: false,
		image_advtab: true,
	});

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

		$('label[for="cate_'+label_id+'"]').css('background-color','#FF8800');
		$('label[for="cate_'+label_id+'"]').css('color','white');

		//選取後變更 input 的 value

		$('input[name="insertClass"]').attr('value',label_id);
		
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

		var post_tag = $('#insertTag').val();

		$('#postTag').html(post_tag);

		$('.postTag_set').css('display','none');

		$('.postTag').css('background-color','white');

	})

	//文章Tag輸入內容
	$('#insertTag').keyup(function(event){

		if (event.which == 188) {

			$('.used_tag').empty();

			return;

		}

		var input_text = $('#insertTag').val();

		if (input_text == '') {

			$('.used_tag').empty();

			return;

		}
		
		var text_arr = input_text.split(",");

		if (text_arr.length > 1) {
			
			var search_text = input_text.split(",").pop();

		} else {

			var search_text = input_text;

		}

		$.ajax({

			url: base_url+'new_article/tag_search',
			data: {search_text:search_text},
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
			if (data['status'] == 'success') {
				$('.used_tag').html(data['data']);
				}
			}

		})

	})

	$('.postImg').click(function(){

		$('.img_input').css('display','block');

	})

	$('input[name="a_img"]').change(function(){

		$('.img_preview').css('display','block');

		$('.postImg').html('您選擇的圖片 ：');

		readSRC(this);

	})

	function readSRC(input){

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e){
				$('#img_preview').attr('src',e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
			var aa = input.files[0];
			// console.log(aa);
		}
	}

}

function submit_check(form)
{	
	if (form.postTitle.value == '' || form.a_intro.value == '') {
		var error = "文章標題，主要圖片，文章簡介為必填欄位";
		alert(error);
	} else {
		form.submit();
	}
	
}

window.addEventListener('load',get_start);