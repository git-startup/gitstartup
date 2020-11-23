//Dropzone script
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#mvp_myDrop",
		{
				paramName: "images", // The name that will be used to transfer the file
				addRemoveLinks: true,
				uploadMultiple: true,
				autoProcessQueue: false,
				parallelUploads: 20,
				maxFilesize: 10, // MB
				acceptedFiles: ".png, .jpeg, .jpg, .gif, .zip, .pdf",
				url: "http://localhost:8000/mvp/images/upload?mvp_id={{ $mvp->id }}",
		});
/* Add Files Script*/
myDropzone.on("success", function(file, images){
		//$("#msg").html(images);
		setTimeout(function(){window.location.href="http://localhost:8000/mvp/{{ $mvp->slug }}"},800);
	 //$("#msg").html('<div class="alert alert-success">تم تحميل الصور بنجاح</div>');
	//document.getElementById('msg').style.display = 'block';
});
myDropzone.on("error", function (data) {
		$("#mvp_msg").html('<div class="alert alert-danger">حصل خطأ اثناء التحميل الرجاء اعادة المحاولة في وقت لاحق</div>');
});
myDropzone.on("complete", function(file) {
		myDropzone.removeFile(file);
});
$("#upload_mvp_images").on("click",function (){
		myDropzone.processQueue();
});


function open_add_project() {
	var mvp = document.getElementById("add_mvp");
	if (mvp.style.display === 'block') {
	    mvp.style.display = 'none';
	    //overlayBg.style.display = "none";
	} else {
	    mvp.style.display = 'block';
	    //overlayBg.style.display = "block";
	}
}

function close_add_project() {
    mvp.style.display = "none";
    //overlayBg.style.display = "none";
}
