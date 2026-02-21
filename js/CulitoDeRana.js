function mostrarMenu(id) {
    document.getElementById(id).style.display = "flex";
}

function ocultarMenu(id) {
    document.getElementById(id).style.display = "none";
}

function pop(popUp, splAn, splAl){
    let ancho = screen.width/splAn;
    let alto = screen.height/splAl;
    let x = (screen.width/2) - (ancho / 2);
    let y = (screen.height/2) - (alto / 2);
    let pagForm = window.open(popUp, "_blank", "width="+ancho+", height="+alto+", resizable=yes");
    pagForm.moveTo(x,y);
}

const VALIDACIONES = [
    ["nombre",    /^[a-zA-ZÀ-ÿ ]{2,50}$/,         "Solo letras, entre 2 y 50 caracteres."],
    ["id",        /^.{6,}$/,                        "El ID debe tener al menos 6 caracteres."],
    ["edad",      /^(1[89]|[2-9]\d|100)$/,          "La edad debe estar entre 18 y 100."],
    ["provincia", /^(?!$).+$/,                       "Selecciona una provincia."],
    ["email",     /^[^\s@]+@[^\s@]+\.[^\s@]+$/,     "Introduce un email válido."],
    ["telefono",  /^[6789]\d{8}$/,                  "Teléfono español válido (9 dígitos)."],
    ["fecha",     /^\d{4}-\d{2}-\d{2}$/,            "Introduce una fecha válida."],
    ["terminos",  /^acepto$/,                        "Debes aceptar los términos y condiciones."],
];

function validaCampo(id, value) {
    value=value.trim()
    for (let i = 0; i < VALIDACIONES.length; i++) {
        if (VALIDACIONES[i][0] === id) {
            if (!VALIDACIONES[i][1].test(value)){
                return VALIDACIONES[i][2];
            }
            return null;
        }
    }
    return "Campo no encontrado";
}