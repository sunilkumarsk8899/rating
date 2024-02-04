<!DOCTYPE html> 
<html> 

<head> 
	<title>rating</title> 
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"> 

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> 
</head> 

<body> 
	<div style="width: 600px;margin: 30px auto;display: flex;align-items: center;justify-content: center;"> 
		<div id="rateYo"></div> 
        <input type="hidden" id="rating_val" value=""><span id="message"></span>
	</div> 

    <?php
        $con = mysqli_connect('localhost','root','','rating');
        $after_rating = mysqli_query($con,'SELECT * FROM `rating`');

        $current_rating = '';
        if($num_row = mysqli_num_rows($after_rating) > 0){
            if($result = mysqli_fetch_object($after_rating)){
                $current_rating = $result->rating;
            }
        }
    ?>

	<script> 
		$("#rateYo").rateYo({ 
			rating: <?php echo $current_rating; ?>, 
			spacing: "10px", 
			numStars: 5, 
			minValue: 0, 
			maxValue: 5, 
			normalFill: 'black', 
			ratedFill: 'orange', 
            starWidth: "40px",
            multiColor: {
            
            "startColor": "#FF0000", //RED
            "endColor"  : "#00FF00"  //GREEN
            },
            onInit: function (rating, rateYoInstance) {
               console.log("RateYo initialized! with " + rating);
               $('#rating_val').val(rating);
            },
            onSet: function (rating, rateYoInstance) {
               console.log("Rating is set to: " + rating);
               $('#rating_val').val(rating);
            }
		}) 
	</script> 

<script src="./js/script.js"></script>

</body> 

</html> 
