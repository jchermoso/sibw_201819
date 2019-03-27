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

/** Buscar y reemplazar palabras malsonantes **/
var textobusq = "";
var textorempl = "";
var textolisto = "";
var palabras = ["puta", "gilipollas", "maricon", "polla"];

//Recoge el texto que se desea buscar para su posterior remplazo
function find(){
    textobusq = document.getElementById("text0").value;
    return  textobusq;
}

function STRTemp(textremp){
    //Recoge el texto con el que se desea remplazar
    //textorempl = document.getElementById("text1").value;
    textorempl = "*";
    
    textolisto = textremp.replace(new RegExp(find(),"g") ,textorempl);
  
    
    return  textolisto;
   
}

function filtro(){
    var text = document.getElementById("comentario").value;
    if (textremp.search(find()) < 0) {
        alert("No hay resultados");
    } else {
                document.getElementById("tremp").value = STRTemp(textremp);
            }
}
function replace(){
  //Comprueba que hay texto en las casillas
    if (find().length == 0) {
        alert("No hay palabra para buscar");
    } else {
        
        var textremp = document.getElementById("tremp").value;
        
            if (textremp.search(find()) < 0) {
                alert("No hay resultados");
            } else {
                document.getElementById("tremp").value = STRTemp(textremp);
            }
    }
    
}