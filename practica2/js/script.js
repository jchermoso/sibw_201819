/** Buscar y reemplazar palabras malsonantes **/
var textobusq = "";
var textorempl = "";
var textolisto = "";
var palabras = ["puta", "gilipollas", "maricon", "polla"];

//Hasta que no se cargue la página no se ejecuta la función
window.onload = function () {
    document.getElementById("comentario").addEventListener("keyup", listenEvent);
    document.getElementById("comentario").addEventListener("focus", validate);
    document.getElementById("div").addEventListener("mouseover", enable)
    document.getElementById("form").addEventListener("submit", submit);
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

function submit(event){
    event.preventDefault();
    document.getElementById('copy_values').style.display = "block";
    document.getElementById('copy_name').textContent  = document.getElementById('nombre').value;
    document.getElementById('copy_email').textContent  = document.getElementById('email').value;
    document.getElementById('copy_comment').textContent  = document.getElementById('comentario').value;
    
    document.getElementById('form').reset()
}

function validate(){
    var txtName = document.getElementById('nombre').value;
    var txtCorreo = document.getElementById('email').value;
    
    if(txtName.className == undefined && txtCorreo.className == undefined) {
        document.getElementById("comentario").setAttribute("disabled", true);
    }
}

function enable(){
    var txtName = document.getElementById('nombre').value;
    var txtCorreo = document.getElementById('email').value;
    
    if(txtName && txtCorreo) {
        document.getElementById("comentario").removeAttribute("disabled");
    }
}

function mostrar() {
    document.getElementById("comment").style.display = "block";
    document.getElementById("abrir").style.display = "none";
    document.getElementById("cerrar").style.display = "inline-table";
}

function ocultar() {
    document.getElementById("comment").style.display = "none";
    document.getElementById("abrir").style.display = "inline-table";
    document.getElementById("cerrar").style.display = "none";
}
