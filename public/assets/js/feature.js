//Dropzone script
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#feature_myDrop",
		{
				paramName: "file", // The name that will be used to transfer the file
				addRemoveLinks: true,
				uploadMultiple: false,
				autoProcessQueue: false,
				parallelUploads: 20,
				maxFilesize: 10, // MB
				acceptedFiles: ".png, .jpeg, .jpg, .gif, .zip, .pdf",
				url: "http://localhost:8000/feature/files/upload?mvp_id={{ $mvp->id }}",
		});
/* Add Files Script*/
myDropzone.on("success", function(file, images){
		//$("#msg").html(images);
		setTimeout(function(){window.location.href="http://localhost:8000/mvp/{{ $mvp->slug }}"},800);
	 //$("#msg").html('<div class="alert alert-success">تم تحميل الصور بنجاح</div>');
	//document.getElementById('msg').style.display = 'block';
});
myDropzone.on("error", function (data) {
		$("#feature_msg").html('<div class="alert alert-danger">حصل خطأ اثناء التحميل الرجاء اعادة المحاولة في وقت لاحق</div>');
});
myDropzone.on("complete", function(file) {
		myDropzone.removeFile(file);
});
$("#upload_mvp_features_files").on("click",function (){
		myDropzone.processQueue();
});
