function alldelete(checkboxname, modelname) {
	//herein str cannot be initialized as ''
	//otherwise the url would be '.../alldelete/', which would cause error
	var str = 0;
	$('input[name="' + checkboxname + '"]:checked').each(function(){
		if (str) {
			str += ',' + $(this).val();
		} else {
			str += $(this).val();
		}
	});
	if (confirm('确认删除多条吗?')) {
		location.href = modelname + 'save/alldelete/' + str;
	} else {
		return;
	}
}

//function multidelete(checkboxname, modelname) {
//	var str = '';
//	$('input[name="' + checkboxname + '"]:checked').each(function(){
//		if (str) {
//			str += ',' + $(this).val();
//		} else {
//			str += $(this).val();
//		}
//	});
//	if (confirm('确认删除多条吗?')) {
//		location.href = modelname + 'save?action=alldelete&id=' + str;
//	} else {
//		return;
//	}
//}

//confirm delete
function confirmdelete(id) {
	$('#myModal').show();
	$('#idfordelete').val(id);
}

//cancel delete
function canceldelete() {
	$('#myModal').hide();
}

//single delete...
function singledelete(modelname) {
	var id = $('#idfordelete').val();
	$.ajax({
		url: modelname + 'save/delete/' + id,
	    type: 'POST',
	    data: {},
	    success: function (arr) {
	    	$('#myModal').hide();
	    	location.reload(true);
	    },
	    error: function () {
	        alert('<font color="red">ajax错误，请检查路径</font>');
	    }
	});
}

//all select
function allselect(checkboxname) {
	$('input[name="' + checkboxname + '"]').attr("checked", true);
}

//all deselect
function alldeselect(checkboxname) {
	$('input[name="' + checkboxname + '"]').attr("checked", false);
}

//sort
function sort(column, modelname) {
	var orderby = $('#orderby').val();
	orderby = (orderby == 'desc') ? 'asc' : 'desc';		//反写排序方式
	location.href = modelname + 'retrieve?page=1&orderby=' + orderby + '&column=' + column;
}