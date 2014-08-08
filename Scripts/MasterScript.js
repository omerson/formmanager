$(document).on( "click", '.field-add', function(){
    var field = $('.field-obj').eq(0).clone();
    field.find('input, label').val('');
    field.find('select').val('');
    field.find("option").removeAttr("selected");
    field.find('a.add-multi:not(:first)').remove();
    field.find('input:not(.field-name:first):not(.field-options:first)').remove();
    field.find('.del-multi:not(:first)').remove();
    field.find('.del-multi:first').hide();
    field.find('.add-multi:first').show();
    field.find('.multi-area').hide();
    field.find('.multi-area').find('input').val('');
    $(this).closest('.form-group').after(field);
    field.find('.field-del').show();    
	DeleteShow($('.field-del'));
	AddShow($('.field-add'));
});

$(document).on( "click", '.field-del', function() {
    $(this).closest('.form-group').remove();
	DeleteShow($('.field-del'));
	AddShow($('.field-add'));
});

DeleteShow($('.field-del'));
AddShow($('.field-add'));

function DeleteShow(del){
	if(del.length > 1){
		$('.field-del').show();
	}else{
		$('.field-del').hide();
	}
}

function AddShow(add) {
	$('.field-add').hide();
	$('.field-add').eq($('.field-obj').length-1).show();
}

$(document).on( "change", '#ctr-types', function() {
	if($(this).find(":selected").attr('multi') == 1){
		var fieldBlock = $(this).closest('.field-obj');
		var multiArea = fieldBlock.find('.multi-area');
		multiArea.show();
		multiArea.find('input, label').val('');
	    multiArea.find('select').val('');
	    multiArea.find('a.add-multi:not(:first)').remove();
	    multiArea.find('input:not(:first)').remove();
	    multiArea.find('.del-multi:not(:first)').remove();
		$('#ismultivalue').val(1);
		fieldBlock.find('.field-name').blur();
	}else{
		$(this).closest('.field-obj').find('.multi-area').hide();
		$(this).closest('.field-obj').find('.multi-area').find('input').val('');
		$('#ismultivalue').val(0);
	}
});

$(document).on( "click", '.add-multi', function() {
	var fieldBlock = $(this).closest('.field-obj');
	var multiField = fieldBlock.find('.field-options').eq(0).clone();
    multiField.val('');
	$(this).before(multiField);
	var delMulti = fieldBlock.find('.del-multi').eq(0);
	delMulti.show();
	if($('.field-options').length > 1){
		multiField.after(delMulti.clone());	
	}	
	fieldBlock.find('.field-name').blur();
});

$(document).on( "click", '.del-multi', function() {
	$(this).prev('input').remove();
	$(this).remove();
	if($('.field-options').length == 1){
		$('.del-multi').eq(0).hide();
	}	
});

$(document).on( "blur", '.field-name', function() {
	$(this).closest('.field-obj').find('input.field-options').attr('name', $(this).val()+'[]');
});

