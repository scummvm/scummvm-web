window.addEventListener('load', function () {
	initalizeTable();
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
    resetDemosTable();
}

function initalizeTable() {
  var rows = document.querySelectorAll('.gameDemos tr');
  for (let i = 0; i < rows.length-1; i++) {
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

function resetDemosTable() {
  var rows = document.querySelectorAll('.gameDemos tr:not(.collapse)');

  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    row.classList.remove("color2", "color0");
    i % 2 ? row.classList.add('color0') : row.classList.add('color2');
  }
}
