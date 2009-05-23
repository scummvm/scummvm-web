$(document).ready(function() {
	/* Change the links so slimbox2 can use them. */
	$('a[rel^=lightbox] img').each(function (i, img) {
		img.parentNode.href = img.src.replace('.jpg', '-full.png');
	});

	/* Activate slimbox on the images. */
	$("a[rel^=lightbox]").slimbox(
		{
			captionAnimationDelay: 1,
			initialHeight: 500,
			initialWidth: 660,
			loop: true,
			resizeDuration: 200
		},
		null,
		function (el) {
			return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
		}
	);
});
