// Grass blade generation
var numberOfBlades = 700;
var grass = document.getElementsByClassName('grass')[0];

for (var i = 0; i < numberOfBlades; i++) {
  	var blade = document.createElement('div');
  	assignRandomStyles(blade);
  	grass.appendChild(blade);
}

function assignRandomStyles(blade) {
	var randomHeight =  Math.floor(Math.random() * 50);
	var randomLeft = Math.floor(Math.random() * (window.innerWidth - 8));
	var randomRotation = Math.floor(Math.random() * 10) - 5;
	blade.style.height = (randomHeight) + 'px';
	blade.style.zIndex = randomHeight;
	blade.style.opacity = randomHeight * 0.02;
	blade.style.left = randomLeft + 'px';
	blade.style.transform = 'rotate(' + randomRotation + 'deg)';
}


// Password validation feedback

// Registration
$("#password, #confirm_password").change(function(){
	// TODO: Regex validation for main password field
	// Use #password_warning for output
    				
	if ($('#password').val() != $('#confirm_password').val()) {
		setPasswordWarnings(false)
	} else {
		setPasswordWarnings(true)
	}
})

// Edit User
$("#old_password, #new_password").change(function(){
	// TODO: Regex validation for main password field
	// Use #password_warning for output
	    				
	if ($('#new_password').val() != $('#confirm_password').val()) {
		setPasswordWarnings(false)
	} else {
		setPasswordWarnings(true)
	}
})

$(".username_field").change(function(){
	if ($('.username_field').val() == "") $('.submit_button').addClass("disabled")
	else $('.submit_button').removeClass("disabled")
})

function setPasswordWarnings(isConfirmed) {
	if (isConfirmed == true) {
		$('.confirm_password_warning').text("")
		$('.submit_button').removeClass("disabled")
	} else {
		$('.confirm_password_warning').text("Must match password")
		$('.confirm_password_warning').css("color", "red")
		$('.submit_button').addClass("disabled")
	}
}