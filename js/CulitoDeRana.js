function mostrarMenu(id) {
    document.getElementById(id).style.display = "flex";
}

function ocultarMenu(id) {
    document.getElementById(id).style.display = "none";
}

/*Lo bloquea el navegador al parecer*/ 
function closePop(){
    window.close();
}

function popSesion(popUp){
    let ancho = 548;
    let alto = 412;
    let x = (screen.width/2) - (ancho / 2);
    let y = (screen.height/2) - (alto / 2);
    let ventanaN = "pop_" + Date.now();
    let pagForm = window.open(popUp, ventanaN, "width="+ancho+", height="+alto+", resizable=yes");
    if(pagForm){
        pagForm.moveTo(x,y);
    }
}

function pop(popUp, splAn, splAl){
    let ancho = screen.width/splAn;
    let alto = screen.height/splAl;
    let x = (screen.width/2) - (ancho / 2);
    let y = (screen.height/2) - (alto / 2);
    let pagForm = window.open(popUp, "_blank", "width="+ancho+", height="+alto+", resizable=yes");
    if(pagForm){
        pagForm.moveTo(x,y);
    }
}

function bienvenidaFehca(){
    let hoy = new Date();
    let fecha = hoy.toLocaleDateString();
    document.getElementById('fecha').textContent = fecha;
}







