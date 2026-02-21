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
    let pagForm = window.open("formulario.html", "Registro", "width="+ancho+", height="+alto+", resizable=yes");
    pagForm.moveTo(x,y);
}

const VALIDACIONES = [
    ["nombre",    /^[a-zA-ZÀ-ÿ ]{2,100}$/,         "Solo letras, entre 2 y 100 caracteres."],
    ["id",        /^.{8}$/,                        "El ID debe tener al menos 8 caracteres."],
    ["edad",    /^(1[89]|[2-9]\d|1[0-4]\d)$/,       "La edad debe estar entre 18 y 149."],
    ["provincia", /^.+$/,                       "Selecciona una provincia."],
    ["email",     /^[^\s@]+@[^\s@]+\.[^\s@]+$/,     "Introduce un email válido."],
    ["telefono",  /^[6789]\d{8}$/,                  "Teléfono español válido (9 dígitos)."],
    ["fecha",     /^\d{4}-\d{2}-\d{2}$/,            "Introduce una fecha válida."],
    ["terminos",  /^acepto$/,                        "Debes aceptar los términos y condiciones."],
    ["mensaje",   /^.+$/,                          "El mensaje no puede estar vacío."],
    ["nomina",    /\.pdf$/i,                          "El fichero debe ser un PDF."],
    ["colorFav",  /^#[0-9a-fA-F]{6}$/,               "Selecciona un color."],
    ["valoracion",/^(9[0-9]|100)$/,                  "¿Por qué no nos quieres? ¿Qué te hicimos? Te estamos observando, estoy en tus paredes (Somos peor que duolingo)"],
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

function agregaListenerValidacion() {
    for (let i = 0; i < VALIDACIONES.length; i++) {
        let id = VALIDACIONES[i][0];
        let campo = document.getElementById(id);
        console.log(id)
        campo.addEventListener("blur", () => {
            let value;
            if (id === "terminos") {
                value = campo.checked ? "acepto" : "";
            } else if (id === "nomina") {
                value = campo.files.length > 0 ? campo.files[0].name : "";
            } else {
                value = campo.value;
            }
            let error = validaCampo(id, value);
            muestraError(id, error);
        });
    }
}

function agregaListenerSubmit() {
    const form = document.querySelector("form");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        if (validaFormulario()) {
            // popup de formulario enviado
        }
    });
}

document.addEventListener("DOMContentLoaded", () => {
    agregaListenerValidacion();
    agregaListenerSubmit();
});

function muestraError(id, error) {
    const campo = document.getElementById(id);
    const existente = document.getElementById("error-" + id);
    if (existente) existente.remove();

    if (error) {
        const span = document.createElement("span");
        span.id = "error-" + id;
        span.textContent = error;
        span.style.cssText = "color:#cc0000;font-size:0.78rem;display:block;margin-top:4px;padding-left:4px;";
        campo.parentElement.appendChild(span);
        campo.style.borderColor = "#cc0000";
    } else {
        campo.style.borderColor = "#22c55e";
    }
}