function mostrarMenu(id) {
    document.getElementById(id).style.display = "flex";
}

function ocultarMenu(id) {
    document.getElementById(id).style.display = "none";
}

function abrirForm(){
    let ancho = screen.width/3;
    let alto = screen.height/3;
    let x = (screen.width/2) - (ancho / 2);
    let y = (screen.height/2) - (alto / 2);
    let pagForm = window.open("PagForm.html", "Registro", "width="+ancho+", height="+alto+", resizable=yes");
    pagForm.moveTo(x,y);
}
