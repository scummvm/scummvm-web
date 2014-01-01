$(document).ready(function () {
	hideDuplicates();
	resetDemosTable();
	attachSubcatListeners();
});

function getRowGameDesc(row) {
	var desc = row.children("td:nth-child(1)").text();
	var leftBracketIndex = desc.indexOf("(");
	if (leftBracketIndex == -1)
		return desc;
	
	return desc.slice(0, leftBracketIndex - 1);
}

function getRowGameVariant(row) {
	var desc = row.children("td:nth-child(1)").text();
	var leftBracketIndex = desc.indexOf("(");
	if (leftBracketIndex == -1)
		return desc;
	
	var rightBracketIndex = desc.indexOf(")");
	return desc.slice(leftBracketIndex + 1, rightBracketIndex);
}

function attachSubcatListeners() {
	$(".gameDemos .subcatToggle").live("click", function() {
		var clickedImage = $(this);
		var clickedDesc = getRowGameDesc(clickedImage.parent().parent());
		var doOpen = (clickedImage.attr("src") == "images/subcat-open.png");
		
		$(this).parent().parent().nextAll().each(function() {
			var curRow = $(this);
			var curDesc  = getRowGameDesc(curRow);
			if (curDesc == clickedDesc) {
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
			} else {
				return false;
			}
		});
	});
}

function hideDuplicates() {
	$(".gameDemos tbody tr").each(function() {
		var curRow = $(this);
		var curDesc  = getRowGameDesc(curRow);
		var prevDesc = getRowGameDesc(curRow.prev());
		var nextDesc = getRowGameDesc(curRow.next());
		var buttonHTML = "";
		
		if (curDesc == prevDesc) {
			curRow.hide();
			buttonHTML = "<img src='images/cat-blank.png' class='noSubcat'>";
		} else if (curDesc != prevDesc && curDesc == nextDesc) {
			buttonHTML = "<img src='images/subcat-open.png' class='subcatToggle'>";
		} else {
			buttonHTML = "<img src='images/cat-blank.png' class='noSubcat'>";
		}
		
		var curCell = curRow.children("td:nth-child(1)");
		curCell.html(buttonHTML + curCell.html());
	});
}

function resetDemosTable() {
	$(".gameDemos").each(function() {
		var curRow = $(this);
		curRow.filter("tbody tr:visible:odd" ).removeClass("color2 color0").addClass("color2");
		curRow.filter("tbody tr:visible:even").removeClass("color2 color0").addClass("color0");
	});
}
