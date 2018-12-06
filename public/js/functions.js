function search() {
	var category_id = $("#category_id").val();
	var search_txt = $("#search_txt").val();
	if (search_txt.length > 40) {
		alert("Your input has to be within 40 characters.");
	} else {
		search_txt = $.trim(search_txt);
		for (var i = 0; i < search_txt.length; ++i) {
			var tmp = search_txt[i];
			if (!((tmp >= 'a' && tmp <= 'z') || (tmp >= 'A' && tmp <= 'Z') || (tmp >= '0' && tmp <= '9'))) {
				alert("Your input has to be alphabetic or numeric characters.");
				return;
			}
		}
		location.href = "index?category_id=" + category_id + "&search_txt=" + search_txt;
	}
}

function change(category_id) {
	location.href = "index?category_id=" + category_id;
}

function message(msg) {
	alert(msg);
}

function cancel() {
	self.opener = null;
    self.close();
}








function oldregister() {
	var is_checked = $("#terms").prop("checked");
	if (is_checked) {
		alert("You have successfully registered!");
		location.href = "index";
	} else {
		alert("You have to agree to our terms before registration!");
	}
}

function oldfilter(filter_id) {
	var category_id = $("#category_id").val();
	var search_txt = $("#search_txt").val();
	if (search_txt.length > 40) {
		alert("sorry, text for search has to be less than 40 characters");
	} else {
    	if (category_id == 0) {
    		location.href = "index?category_id=" + filter_id + "&search_txt=" + search_txt;
    	} else {
    		location.href = "index?category_id=" + category_id + "&filter_id=" + filter_id;
    	}
	}
}

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
	if (confirm('delete them all?')) {
		location.href = modelname + 'save/alldelete/' + str;
	} else {
		return;
	}
}

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

function jsdelete(modelname, id) {
	if (confirm("confirm this delete?")) {
		$.ajax({
			url: "/" + modelname + "delete/" + id,
		    type: "POST",
		    data: {},
		    success: function () {
		    	location.href = "/" + modelname + "retrieve";
		    },
		    error: function () {
		        alert("please wait");
		    }
		});
	}
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
	orderby = (orderby == 'desc') ? 'asc' : 'desc';		//reverse the order
	location.href = modelname + 'retrieve?page=1&orderby=' + orderby + '&column=' + column;
}