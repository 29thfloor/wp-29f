$(function(){
	var $search = $('.searchbox');
	original_val = $search.val();
	$search.focus(function(){
		$(this).addClass('hasvalue');
		if($(this).val()===original_val){
			$(this).val('');
		}
	})
	.blur(function(){
		if($(this).val()===''){
			$(this).val(original_val); 
			$(this).removeClass('hasvalue');
		}
	});
});