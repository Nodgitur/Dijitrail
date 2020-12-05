<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" >
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minumum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rating System</title>
	<script src="https://kit.fontawesome.com/64628dcc28.js" crossorigin="anonymous"></script>
	</head>
<body>
	<div align="center" style="background: #000; padding: 50px;">
		<i class="fa fa-star fa-2x" data-index="0"></i>
		<i class="fa fa-star fa-2x" data-index="1"></i>
		<i class="fa fa-star fa-2x" data-index="2"></i>
		<i class="fa fa-star fa-2x" data-index="3"></i>
		<i class="fa fa-star fa-2x" data-index="4"></i>
		</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
	<script>
		var ratedIndex = -1;

		$(document).ready(function () {
			resetStarcolors();

		if (localStorage.getItem ('ratedIndex') !=null)
		setStars(parseInt(localStorage.getItem('ratedIndex')));

		$('.fa-star').on('click', function (){
		ratedIndex = parseInt($(this).data('index'));
		localStorage.setItem('ratedIndex', ratedIndex);
		});

			$('.fa-star').mouseover(function () {
				resetStarcolors();
			var currentIndex = parseInt($(this).data('index'));
			setStars(currentIndex);
			});

			$('.fa-star').mouseleave(function () {
				resetStarcolors();

		if (ratedIndex != -1)
			setStars(ratedIndex);
			});
		});

		function setStars(max){
		for (var i=0; i <= max; i++)
		$('.fa-star:eq('+i+')').css('color', 'green');
		}
		function resetStarcolors() {
			$('.fa-star').css('color', 'white');
        }


		</script>
	</body>
</html>