var base_href = $('base').attr('href');
var rand_img = $('a#screenshots_random img');
var image_regexp = /(data\/screenshots\/(?:.+)-full\.png)/;
var screenshots = [];
var position = 0;

/* Change screenshot. */
function changeScreenshot (pos) {
	position += pos;
	if (position < 0) {
		position = screenshots.length-1;
	} else if (position >= screenshots.length) {
		position = 0;
	}
	rand_img.attr('src', screenshots[position][0].replace('-full.png', '.jpg'));
	rand_img.get(0).parentNode.title = screenshots[position][1];
}

/* Find the position for the random screenshot. */
function findPosition () {
	var rand_url = rand_img.attr('src').replace('.jpg', '-full.png');
	rand_url = rand_url.replace(base_href, '');
	for (var i=0, i_max=screenshots.length; i < i_max; i++) {
		if (screenshots[i][0] == rand_url) {
			position = i;
			break;
		}
	}
	
	changeScreenshot(0);
}

/* Update the preview when closing slimbox. */
function handleClosure () {
	var cur_img = $('#lbImage').css('background-image');
	rand_img.attr('src', image_regexp.exec(cur_img)[0]);
	findPosition();
}

$(document).ready(function () {
	/* Fetch the screenshots. */
	$.post(
		'?p=screenshots',
		'json=1',
		function (data) {
			screenshots = data;
			findPosition();
		},
		'json'
	);

	/* Next screenshot. */
	$('a#screenshots_next').click(function (evt) {
		evt.preventDefault();
		changeScreenshot(1);
	});

	/* Previous screenshot. */
	$('a#screenshots_prev').click(function (evt) {
		evt.preventDefault();
		changeScreenshot(-1);
	});

	/* Clicking the image. */
	rand_img.click(function (evt) {
		evt.preventDefault();
		$.slimbox(screenshots, position);
	});

	/* Update the random screenshot box on closure. */
	$('a#lbCloseLink').click(handleClosure);
	/* Piggyback on the slimbox overlay. */
	$('div#lbOverlay').bind('mouseleave', function (evt) {
		if ($('div#lbOverlay:visible').length == 0) {
			handleClosure();
		}
	});
});
