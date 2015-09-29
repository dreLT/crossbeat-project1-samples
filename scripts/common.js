// Shop Product Detail Page - Clicking image thumbnail replaces main image with that thumbnail

$(document).ready(function() {
	console.log('ready');
	var $secondaryImage = $(".secondary-image");
	var $primaryImage = $(".primary-image");
	$secondaryImage.on('click', function(e) {
		var clickedCSSValue = ($(e.target).css("background-image"));
		$primaryImage.css("background-image", clickedCSSValue);
	});
});


// Shop Product Detail Page - Increase or decrease product quantity via up/down arrows

$(document).ready(function() {

	var $quantityInput = $(".quantity .quantity-input");
	//console.log($(".quantity .quantity-input").val());
	$(".quantity-up").on("click", function() {
		$quantityInput.val( function(i, oldval) {
	    	return ++oldval;
		});
	});

	$(".quantity-down").on("click", function() {
		if ($quantityInput.val() > 1) {
			$quantityInput.val( function(i, oldval) {
		    	return --oldval;
			});
		}
	});
});


// Site's Main Navigation - Social icons slide out horizontally on clicking "Follow"

$("#nav-top-left-follow").on('click', function() {
	$("#nav-top-left-follow ul").toggleClass("active");
});

// Onboarding Start 
$(document).ready(function() {

    //console.log('Onboarding');
    $( "#member-main-carousel-next" ).click(function() {
	  var topValue = $( this ).css( "top" );
	  //console.log(topValue);
	  if (topValue === "168px") {
	  	 console.log('Show Nav');
	  	 $( "#member-main-carousel-prev" ).css( "top", "38%" );
	  }
	});

});

// Nutrition Plan Page - Toggle video lightbox modal on "Watch Video" button click

$("#shop-nutrition-plan-wrapper .cta").on("click", function() {
	$("#nutrition-plan-video-modal").addClass("show");
});

$("#nutrition-plan-video-modal").on("click", function(event) {
	event.preventDefault();
	event.stopPropagation();
	$("#nutrition-plan-video-modal").removeClass("show");
	$("#nutrition-plan-video-modal iframe").stopVideo();
});

$("#nutrition-plan-video-modal .close-button").on("click", function() {
	$("#nutrition-plan-video-modal").removeClass("show");
});