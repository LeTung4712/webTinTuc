$(document).ready(function(){
	$('.btnDel').on('click',function(){
		var id = $(this).prev();
		var id_value = id.val();
		var	modal = $(this).next();
		var modal_confirm = modal.find('.btnConf');
		var case_name = modal_confirm.data('casetype');
		$(modal_confirm).on('click',function(){
			if(case_name == 'category')
				window.location.href='admin/category/delete/'+id_value;
			else if(case_name == 'newstype')
				window.location.href='admin/newstype/delete/'+id_value;
			else if(case_name == 'news')
				window.location.href='admin/news/delete/'+id_value;
			else if(case_name == 'comment')
				window.location.href='admin/comment/delete/'+id_value;
			else if(case_name == 'user')
				window.location.href='admin/user/delete/'+id_value;
		})
	});

	$('.catefield').on('change',function(){
		var cate_id = $(this).val();

		$.get('admin/ajax/getnewstype/'+cate_id,function(data){
			if(data == '')
				$('.subcatefield').html('<option>Không có dữ liệu..</option>');
			else
				$('.subcatefield').html(data);
		})
	});

	$('input:radio[name="change_password"]').on('change',function(){
		if(this.checked && this.value == 0)
			$('.disabled-field').attr('disabled',true);
		else
			$('.disabled-field').attr('disabled',false);
	});

	setInterval(timestamp,1000); //hàm hiển thị thời gian 

	function timestamp(){ //hàm hiển thị thời gian
		$.ajax({
			url: 'admin/ajax/timestamp',
			type: 'GET',
			success:function(data){
				$('#timestamp').html(data);
			}
		});
	}
})
