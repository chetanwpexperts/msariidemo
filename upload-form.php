 <?php
include('upload.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dummy</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
  box-sizing: border-box;
  margin:0px;
  padding: 0px;
  overflow-x: hidden;
}
.row > .column {
  margin: .5%; 
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.column {
  float: left;
  width: 24%;
}
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: #363333ab;
}
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}
.gallerySlides {
  display: none;
}
.cursor {
  cursor: pointer;
}
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
  background: #00000066;
}
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
.numbertext {
    color: #171717;
    font-size: 20px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    font-weight: bold;
}
.column img {
    object-fit: contain;
    padding: 5px;
    border: 6px solid #d3d575bf;
    border-radius: 14px;
}
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}
img.hover-shadow {
  transition: 0.3s;
}
.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.uploadpage{
    padding: 2rem;
    background: #f7f7f7;
    margin: 5% auto;
}
.frm {
    background: #ffffff;
    width: 44%;
    padding: 1rem;
    border-radius: 6px;
}
.imgname{
	background: #e1e1e97a;
    margin-top: 0.15rem;
    padding: 0.35rem;
    text-align: center;
    letter-spacing: 1px;
    font-weight: 700;
    border-radius: 7px;
    color: #2d71a1de;
	box-shadow: 2px 7px 14px -8px #000000;
}
.successmessage {
    padding: 0.5rem;
    text-align: center;
    background: #426843ba;
    margin: auto;
    width: 83%;
    color: #f9f9f9;
    font-weight: 600;
    margin-top: 2rem;
    border-radius: 1rem;
}
.errormessage{
	padding: 0.5rem;
    text-align: center;
    background: #d73b22ba;
    margin: auto;
    width: 83%;
    color: #f9f9f9;
    font-weight: 600;
    margin-top: 2rem;
    border-radius: 1rem;
}
</style>
</head>
<body>
<div class="container-lg">
    <div class="uploadpage">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
					<div class="col-sm-12">
						<h1>Upload Gallery Images </h1>
						<p>&nbsp;</p>
						<form class="frm" method="post" enctype="multipart/form-data">
							<input type="file" name="image_gallery[]" multiple>
							<input type="submit" class="btn btn-success" value="Upload Now" name="submit">
						</form>
						<p>&nbsp;</p>
						<h1>All Images</h1>
						<p>&nbsp;</p>
						<?php
						require('gallery.php');
						?>

						<div class="row">	
							<?php
							if(!empty($fetchImage))
							{
								$sn=1;
								foreach ($fetchImage as $img) 
								{
									
									?>
									<div class="column">
										<img src="uploads/<?php echo $img['image_name']; ?>" style="width:100%" onclick="openModal(); currentSlide(<?php echo $sn; ?> )" class="hover-shadow cursor">
										<p class="imgname"><?php echo $img['image_name']; ?></p>
									</div>
									<?php
									$sn++;
								}
							}else{
								echo "No Image is saved in database";
							}
							?>
						</div>
						<!--<div id="galleryModal" class="modal">
							<span class="close cursor" onclick="closeModal()">&times;</span>
							<div class="modal-content">
							<?php
							if(!empty($fetchImage))
							{
								$sn=1;
								foreach ($fetchImage as $img) 
								{
									?>
									<div class="gallerySlides">
										<div class="numbertext"> / 4</div>
										<img src="uploads/<?php echo $img['image_name']; ?>" style="width:100%">
									</div>
									<?php
									$sn++;
								}
							}else{
								echo "No Image is saved in database";
							}
							?>
							<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
							<a class="next" onclick="plusSlides(1)">&#10095;</a>
							<div class="caption-container">
								<p id="caption"></p>
							</div>
						  </div>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
function openModal() {
  document.getElementById("galleryModal").style.display = "block";
}
function closeModal() {
  document.getElementById("galleryModal").style.display = "none";
}
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("gallerySlides");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}
</script>
</body>
</html>