<?php include 'includes/page-head.php' ?>
<?php include 'includes/page-header.php' ?>
<?php


// Check if magazine_id is set in the URL
if(isset($_GET['magazine_id'])) {
    $magazine_id = $_GET['magazine_id'];

    // Query to fetch magazine name based on magazine_id
    $query = "SELECT title FROM magazine WHERE magazine_id = $magazine_id";
    $result = mysqli_query($mysqli, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
    } else {
        $title = "Magazine Not Found"; // Default text if magazine is not found
    }
} else {
    $title = "Magazine ID Not Provided"; // Default text if magazine_id is not provided in the URL
}
?>
<body>
    <div class="container">
    	<h1 class="mt-5 mb-5"><?php echo $title; ?></h1>

    	<div class="card">
    		<!-- <div class="card-header">Sample Product</div> -->
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<!-- <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div> -->
                            <!-- </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p> -->
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Feedback"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
</div>
  	</div>
</div>


<script>
   $(document).ready(function() {
    var rating_data = 0;

    $('#add_review').click(function(){
        $('#review_modal').modal('show');
    });

    $(document).on('mouseenter', '.submit_star', function(){
        var rating = $(this).data('rating');
        reset_background();
        for(var count = 1; count <= rating; count++) {
            $('#submit_star_'+count).addClass('text-warning');
        }
    });

    function reset_background() {
        for(var count = 1; count <= 5; count++) {
            $('#submit_star_'+count).addClass('star-light');
            $('#submit_star_'+count).removeClass('text-warning');
        }
    }

    $(document).on('mouseleave', '.submit_star', function(){
        reset_background();
        for(var count = 1; count <= rating_data; count++) {
            $('#submit_star_'+count).removeClass('star-light');
            $('#submit_star_'+count).addClass('text-warning');
        }
    });

    $(document).on('click', '.submit_star', function(){
        rating_data = $(this).data('rating');
    });

    $('#save_review').click(function(){
        var user_review = $('#user_review').val();
        if( user_review == '') {
            alert("Please Fill Both Field");
            return false;
        }
        else {
            var magazine_id = <?php echo $_GET["magazine_id"]; ?>;
            var uid = <?php echo $_GET["uid"]; ?>;
            // console.log(magazine_id);
            // console.log(uid);
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{ magazine_id: magazine_id, uid: uid, rating_data: rating_data, user_review: user_review },
                success:function(data) {
                    $('#review_modal').modal('hide');
                    load_rating_data();
                    alert(data);
                }
            })
        }
    });

    load_rating_data();

    function load_rating_data() {
        var magazine_id = <?php echo $_GET["magazine_id"]; ?>;
        var uid = <?php echo $_GET["uid"]; ?>;
        // console.log(magazine_id);
        // console.log(uid);
    $.ajax({
        url: "ld.php",
        method: "POST",
        data: { action: 'load_data',magazine_id: magazine_id, uid: uid }, // Include the action parameter
        dataType: "JSON",
        success: function(data) {
            

            console.log("Received data:", data);
            $('#average_rating').text(data.average_rating);
            $('#total_review').text(data.total_review);
            
            // Reset star ratings
            $('.main_star').removeClass('text-warning star-light');

            // Calculate the average rating and round it to the nearest integer
            var averageRating = Math.round(data.average_rating);
            
            // Highlight stars based on average rating
            $('.main_star').each(function(index) {
                if (index < averageRating) {
                    $(this).addClass('text-warning star-light');
                }
            });

            $('#total_five_star_review').text(data.five_star_review);
            $('#total_four_star_review').text(data.four_star_review);
            $('#total_three_star_review').text(data.three_star_review);
            $('#total_two_star_review').text(data.two_star_review);
            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');
            $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');
            $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');
            $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');
            $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

            if(data.review_data.length > 0)
            {
                var html = '';

                for(var count = 0; count < data.review_data.length; count++)
                {
                    html += '<div class="row mb-3">';
                    html += '<div class="col-sm-11">';
                    html += '<div class="card">';
                    html += '<div class="card-header">' + data.review_data[count].username + '</div>';
                    html += '<div class="card-body">';
                    
                    // Highlight stars in the card based on the rating
                    for(var star = 1; star <= 5; star++)
                    {
                        var class_name = '';

                        if(data.review_data[count].user_rating >= star)
                        {
                            class_name = 'text-warning';
                        }
                        else
                        {
                            class_name = 'star-light';
                        }

                        html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                    }

                    html += '<br />';
                    html += data.review_data[count].user_review;
                    html += '</div>';
                    // html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                }

                $('#review_content').html(html);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
        }
    });
}

});
</script>


<?php include 'includes/page-footer.php' ?>
