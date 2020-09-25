window.addEventListener('load', function () {
	initializeTable();
});

function toggleCollapsibleRow(event) {
    var clickedImage = event.target;
    var clickedRow = clickedImage.parentElement.parentElement;
    var gameTarget = clickedRow.lastElementChild.textContent
    var next = clickedRow.nextElementSibling;
    clickedImage.classList.toggle('close');
    while (gameTarget === next.lastElementChild.textContent) {
      next.classList.toggle("collapse");
      next = next.nextElementSibling;
    }
    recolorParentTable(clickedRow);
}

function initializeTable() {
  var rows = document.querySelectorAll('.gameDemos tr');
  for (var i = 0; i < rows.length-1; i++) {
    if (!rows[i].nextElementSibling) {
      continue;
    }
    if (!rows[i].classList.contains('collapse') &&
      rows[i].nextElementSibling.classList.contains('collapse')) {
      var button = document.createElement('i');
      button.classList.add('expand');
      button.addEventListener('click', toggleCollapsibleRow)
      rows[i].firstElementChild.append(button);
    }
  }
}

function recolorParentTable(sourceRow) {
  var rows = sourceRow.parentElement.querySelectorAll('tr:not(.collapse)');

  for (var i = 0; i < rows.length; i++) {
    const row = rows[i];
    row.classList.remove("color2", "color0");
    i % 2 ? row.classList.add('color0') : row.classList.add('color2');
  }
}
