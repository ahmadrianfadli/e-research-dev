$('#username').val('');
$('#password').val('');

const inputs = document.querySelectorAll(".input");

function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}

inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

$(document).on("submit", "#formLogin", function (e) {
	e.preventDefault();
	var form = $(this),
		url = $(this).attr("action");
	$.ajax({
		method: "POST",
		url: url,
		data: form.serialize(),
		cache: false,
		dataType: "JSON",
		success: function (data) {
			if(data.responCode == "01"){
                toastr["info"](data.responDesc, "INFORMATION");
            }else{
                window.open(data.url, "_self");
            }
		}
	});
    return false;
});
