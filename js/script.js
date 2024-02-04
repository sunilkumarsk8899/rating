$(document).ready(function() {
    
    $(document).on('click','#rateYo',()=>{
        var rating = $('#rating_val').val();
        $.ajax({
            type: "POST",
            url: "./function.php",
            data: {
                'action' : 'rating',
                'rating_val' : rating
            },
            success: function (response) {
                console.log(response);
                if(response == true){
                    $('#message').html('<span style="color:blue;font-weight:700;font-size:20px;">Update rating successfully</span>');
                }else{
                    $('#message').html('<span style="color:red;font-weight:700;font-size:20px;">Somthing went wrong</span>');
                }
                setTimeout(() => {
                    $('#message').html('');
                }, 5000);
            }
        });
    });

});