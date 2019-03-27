/** Buscar y reemplazar palabras malsonantes **/
var textobusq = "";
var textorempl = "";
var textolisto = "";
var palabras = ["puta", "gilipollas", "maricon", "polla"];

//Hasta que no se cargue la página no se ejecuta la función
window.onload = function () {
    document.getElementById("comentario").addEventListener("keyup", listenEvent);
}

function listenEvent(){
    var comment = document.getElementById('comentario').value;
    var words = comment.split(" ");

    for(id in words){
        var position = palabras.indexOf(words[id]);
        if(palabras.indexOf(words[id]) != -1){
            comment = comment.replace(palabras[position], ''.padStart(palabras[position].length, "*"))
        }
    }

    document.getElementById('comentario').value = comment;
}

function mostrar() {
    document.getElementById("comment").style.display = "block";
    document.getElementById("abrir").style.display = "none";
    document.getElementById("cerrar").style.display = "inline";
}

function ocultar() {
    document.getElementById("comment").style.display = "none";
    document.getElementById("abrir").style.display = "inline";
    document.getElementById("cerrar").style.display = "none";
}
