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

function pop(popUp, splAn, splAl){
    let ancho = screen.width/splAn;
    let alto = screen.height/splAl;
    let x = (screen.width/2) - (ancho / 2);
    let y = (screen.height/2) - (alto / 2);
    let pagForm = window.open(popUp, "_blank", "width="+ancho+", height="+alto+", resizable=yes");
    pagForm.moveTo(x,y);
}

function bienvenidaFehca(){
    let hoy = new Date();
    let fecha = hoy.toLocaleDateString();
    document.getElementById('fecha').textContent = fecha;
}

const VALIDACIONES = [
    ["nombre",    /^[a-zA-ZÀ-ÿ ]{2,100}$/,         "Solo letras, entre 2 y 100 caracteres."],
    ["id",        /^.{8,}$/,                        "El ID debe tener al menos 8 caracteres."],
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

function validaFormulario() {
    let valido = true;
    for (let i = 0; i < VALIDACIONES.length; i++) {
        let id = VALIDACIONES[i][0];
        let campo = document.getElementById(id);
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
        if (error) valido = false;
    }
    return valido;
}

function agregaListenerSubmit() {
    const form = document.querySelector("form");
    form.addEventListener("submit", (e) => {
        if (validaFormulario()) {
            pop("enviado.html", 4, 5);
        }
    });
}

const INACTIVIDAD_MS = 15000;
let timerInactividad = null;

function resetInactividad() {
    clearTimeout(timerInactividad);
    timerInactividad = setTimeout(() => {
        pop("inactividad.html", 4, 5);
    }, INACTIVIDAD_MS);
}

function comprobarInactividad(){
    document.addEventListener("mousemove", resetInactividad);
    document.addEventListener("keydown", resetInactividad);
    document.addEventListener("click", resetInactividad);
    document.addEventListener("scroll", resetInactividad);
    document.addEventListener("input", resetInactividad);
}

document.addEventListener("DOMContentLoaded", () => {
    agregaListenerValidacion();
    agregaListenerSubmit();
    comprobarInactividad();
    setInterval(actualizarContador, TICK_MS);
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
        campo.style.backgroundColor = "#ffe4e4";
        campo.style.color = "#8a0000";
    } else {
        campo.style.borderColor = "#22c55e";
        campo.style.backgroundColor = "#e4ffe8";
        campo.style.color = "#006d28";
    }
}

const SESION_MS = 5 * 60 * 1000;
const TICK_MS = 1000;
let tiempoRestante = SESION_MS;
let intervalSesion = null;
const TITULO_BASE = document.title;

function formatTiempo(ms) {
    const m = Math.floor(ms / 60000);
    const s = Math.floor((ms % 60000) / 1000);
    return `${m}:${s.toString().padStart(2, "0")}`;
}

function actualizarContador() {
    tiempoRestante -= TICK_MS;
    document.title = formatTiempo(tiempoRestante) +" | "+ TITULO_BASE
    document.getElementById("btnEnviar").style.backgroundColor = colorAleatorio();
    if (tiempoRestante <= 0) {
        clearInterval(intervalSesion);
        pop("inactividad.html", 3, 3);
    }
}

function colorAleatorio() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}