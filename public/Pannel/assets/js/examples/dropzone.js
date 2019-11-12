'use strict';

// Dropzone.autoDiscover = false;

// $(document).ready(function () {

//     new Dropzone("#my-awesome-dropzone", {
// 		dictDefaultMessage:"فایل ها را برای ارسال اینجا بکشید",
// 		dictFallbackMessage:"مرورگر شما از کشیدن و رها سازی برای ارسال فایل پشتیبانی نمی کند.",
// 		dictFallbackText:"لطفا از فرم زیر برای ارسال فایل های خود مانند گذشته استفاده کنید.",
// 		dictFileTooBig:"فایل خیلی بزرگ است ({{filesize}}MiB). حداکثر اندازه مجاز: {{maxFilesize}}MiB.",
// 		dictInvalidFileType:"شما مجاز به ارسال این نوع فایل نیستید.",
// 		dictResponseError:"سرور با کد {{statusCode}} پاسخ داد.",
// 		dictCancelUpload:"لغو ارسال",
// 		dictUploadCanceled:"ارسال لغو شد.",
// 		dictCancelUploadConfirmation:"آیا از لغو این ارسال اطمینان دارید؟",
// 		dictRemoveFile:"حذف فایل",
// 		dictRemoveFileConfirmation:"آیا از حذف این فایل اطمینان دارید؟",
// 		dictMaxFilesExceeded:"شما نمی توانید فایل دیگری ارسال کنید."
// 	});

// });

Dropzone.options.dropzone =
{
			maxFilesize: 1100,
			renameFile: function(file) {
							var dt = new Date();
							var time = dt.getTime();
						return time+file.name;
			},
			acceptedFiles: ".xls",
			addRemoveLinks: true,
			timeout: 5000,
			success: function(file, response) 
			{
							console.log(response);
			},
			error: function(file, response)
			{
						return false;
			}
};