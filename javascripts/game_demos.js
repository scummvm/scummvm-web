$(document).ready(function () {
	hideDuplicates();
	resetDemosTable();
	attachSubcatListeners();
});

function attachSubcatListeners() {
	$(".gameDemos .subcatToggle").live("click", function() {
		var clickedImage = $(this);
		var clickedTarget = $(this).parent().parent().children("td:nth-child(2)").html();
		var doOpen = (clickedImage.attr("src") == "images/subcat-open.png");
		
		$(this).parent().parent().nextAll().each(function() {
			var curRow = $(this);
			var curTarget  = curRow.children("td:nth-child(2)").html();
			if (curTarget == clickedTarget) {
				if (doOpen) {
					clickedImage.attr("src", "images/subcat-close.png");
					curRow.fadeIn("fast", function() {
						resetDemosTable();
					});
				} else {
					clickedImage.attr("src", "images/subcat-open.png");
					curRow.fadeOut("fast", function() {
						resetDemosTable();
					});
				}
			}
		});
	});
}

function hideDuplicates() {
	$(".gameDemos tbody tr").each(function() {
		var curRow = $(this);
		var curTarget  = curRow.children("td:nth-child(2)").html();
		var prevTarget = curRow.prev().children("td:nth-child(2)").html();
		var nextTarget = curRow.next().children("td:nth-child(2)").html();
		var buttonHTML = "";
		
		if (curTarget == prevTarget) {
			curRow.hide();
			buttonHTML = "<img src='images/cat-blank.png' class='noSubcat'>";
		} else if (curTarget != prevTarget && curTarget == nextTarget) {
			buttonHTML = "<img src='images/subcat-open.png' class='subcatToggle'>";
		} else {
			buttonHTML = "<img src='images/cat-blank.png' class='noSubcat'>";
		}
		
		curRow.children("td:nth-child(1)").html(buttonHTML + curRow.children("td:nth-child(1)").html());
	});
}

function resetDemosTable() {
	$(".gameDemos").each(function() {
		$(this).filter("tbody tr:visible:odd" ).removeClass("color2 color0").addClass("color2");
		$(this).filter("tbody tr:visible:even").removeClass("color2 color0").addClass("color0");
	});
}
