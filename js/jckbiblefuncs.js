/** Archivo: select-enlazado.js */
 
var selBook = document.querySelector('#bib_book');
var selChapter = document.querySelector('#bib_chapter');
 
fillBookChapters(selBook.value);

/*
	Función listener que caputar el evento onChange sobre el select de libros de la biblia
*/
document.addEventListener('input', function (event) {
    if (event.target.id !== 'bib_book') return;
		fillBookChapters(event.target.value);
}, false);
 
/*
	Elimina el contenido del select de capítulos, para llenarlo según la selección del libro
*/
function fillBookChapters(selectValue) {
	selChapter.innerHTML = '';
	var optChp ;
	var nNumChp ;

	for(var i = 0; i < arrChp[parseInt(selectValue)]; i++) {
		nNumChp = i + 1;
		optChp = document.createElement("option");
		optChp.text = nNumChp.toString();
		optChp.value = nNumChp.toString();
		
		// Comparo para saber que option dejar como selected
		if (nNumChp === selChp) {
			optChp.selected = true ;
		}

		selChapter.appendChild(optChp);
	}

}