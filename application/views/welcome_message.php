<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lasso Crop Tool in CodeIgniter</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.4.0/fabric.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		function downloadImage() {
			const croppedImageData = canvas.toDataURL({
				format: 'png'
			});
			const downloadLink = document.createElement('a');
			downloadLink.href = croppedImageData;
			downloadLink.download = 'cropped_image.png';
			downloadLink.click();
		}

		function uploadImage() {
			const input = document.getElementById('imageInput');
			const file = input.files[0];

			if (file) {
				const formData = new FormData();
				formData.append('image', file);

				$.ajax({
					url: '<?php base_url("upload/process") ?>',
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						alert(response);
					},
					error: function() {
						alert('Error uploading image.');
					}
				});
			}
		}
	</script>
</head>


<body>
	<input type="file" id="imageInput" accept="image/*">
	<button onclick="uploadImage()">Upload Image</button>
	<canvas id="imageCanvas"></canvas>
	<button onclick="downloadImage()">Download Cropped Image</button>


	<script src="<?= base_url('assets/crop.js') ?>"></script>
</body>

</html>