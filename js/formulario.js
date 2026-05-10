let nombreDisponible = true;

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

/*campos */

function validaNombre(id = 'nombre') {
    console.log("Validando nombre...");
    const campo = document.getElementById(id);
    if (!campo) return true;
    const ok = /^[a-zA-ZÀ-ÿ ]{2,100}$/.test(campo.value.trim());
    muestraError(id, ok ? null : "Solo letras, entre 2 y 100 caracteres.");
    return ok;
}

function validaContrasenia(id = 'contrasenia') {
    console.log("Validando contrasenia...");
    
    const campo = document.getElementById(id);
    if (!campo) return true;
    console.log("valor: " + campo.value.trim());
    const ok = /^[^\s]{8,}$/.test(campo.value.trim());
    muestraError(id, ok ? null : "Mínimo 8 caracteres y sin espacios.");
    return ok;
}

function validaTerminos() {
    console.log("Validando terminos...");
    const campo = document.getElementById('terminos');
    if (!campo) return true;
    muestraError('terminos', campo.checked ? null : "Debes aceptar los términos y condiciones.");
    return campo.checked;
}

function validaConfirmarPwd() {
    console.log("Validando confirmar pwd...");
    const nueva     = document.getElementById('nueva_pwd')?.value ?? '';
    const confirmar = document.getElementById('confirmar_pwd')?.value ?? '';
    const ok = nueva === confirmar;
    muestraError('confirmar_pwd', ok ? null : "Las contraseñas no coinciden.");
    return ok;
}

/*formularios */

function validaInicioSesion() {
    console.log("Validando inicio de sesión...");
    let v = true;
    v = validaNombre()      && v;
    //v = validaContrasenia() && v;
    return v;
}

function validaRegistro() {
    console.log("Validando registro...");
    let v = true;
    v = validaNombre()      && v;
    v = validaContrasenia() && v;
    v = validaTerminos()    && v;
    if (!nombreDisponible) {
        muestraError('nombre', 'Este nombre de usuario ya está en uso.');
        v = false;
    }
    return v;
}

function validaPerfil() {
    console.log("Validando perfil...");
    let v = true;
    v = validaNombre("nuevo_username")  && v;
    v = validaContrasenia('pwd_actual') && v;
    v = validaContrasenia('nueva_pwd')  && v;
    v = validaConfirmarPwd()            && v;
    return v;
}

/*listeners */

function agregaListenerBlur() {
    const form = document.querySelector("form");
    if (!form) return;

    const listeners = {
        nombre:         () => validaNombre(),
        nuevo_username: () => validaNombre('nuevo_username'),
        contrasenia:    () => validaContrasenia(),
        terminos:       () => validaTerminos(),
        pwd_actual:     () => validaContrasenia('pwd_actual'),
        nueva_pwd:      () => validaContrasenia('nueva_pwd'),
        confirmar_pwd:  () => validaConfirmarPwd(),
    };

    for (const [id, fn] of Object.entries(listeners)) {
        console.log("Agregando listener blur a " + id);
        const campo = document.getElementById(id);
        if (campo) campo.addEventListener("blur", fn);
    }
}

function agregaListenerSubmit() {
    const form = document.querySelector("form");
    if (!form) return;

    const validadores = {
        formLogin:   validaInicioSesion,
        formRegistro:validaRegistro,
        formPerfil:  validaPerfil,
    };

    form.addEventListener("submit", (e) => {
        const fn = validadores[form.id];
        if (fn && !fn()) e.preventDefault();
    });
}

function agregaListenerNombre() {
    const campo = document.getElementById('nombre');
    if (!campo) return;
    campo.addEventListener('input', function () {
        const nombre = this.value;
        const mensaje = document.getElementById('mensajeNombre');
        if (!mensaje) return;
        if (nombre.length < 3) {
            mensaje.textContent = '';
            nombreDisponible = true;
            return;
        }
        fetch('../php/comprobarUsuario.php?nombre=' + encodeURIComponent(nombre))
            .then(r => r.json())
            .then(data => {
                nombreDisponible = !data.existe;
                mensaje.textContent = data.existe ? 'Usuario en uso' : 'Usuario disponible';
                mensaje.style.color = data.existe ? 'red' : 'green';
            });
    });
}

document.addEventListener("DOMContentLoaded", () => {
    agregaListenerBlur();
    agregaListenerSubmit();
    muestraErrorCredenciales();
    agregaListenerNombre();
});

/*otros */

function muestraErrorCredenciales() {
    const params = new URLSearchParams(window.location.search);
    if (params.get('error') !== 'credenciales') return;
    const me = document.getElementById('mensajeError');
    if (me) {
        me.style.display = 'block';
        me.style.color = 'red';
    }
}

function confirmarEliminar() {
    if (confirm('¿Estás seguro de que quieres eliminar tu cuenta?\nEsta acción no se puede deshacer.')) {
        document.getElementById('formEliminar').submit();
    }
} 



/*

const VALIDACIONES = {
    nombre:     { fn: (v) => /^[a-zA-ZÀ-ÿ ]{2,100}$/.test(v),        msg: "Solo letras, entre 2 y 100 caracteres." },
    contrasenia:{ fn: (v) => /^[^\s]{8,}$/.test(v),                   msg: "La contraseña debe tener mínimo 8 caracteres y sin espacios." },
    id:         { fn: (v) => v.length >= 8,                            msg: "El ID debe tener al menos 8 caracteres." },
    terminos:   { fn: (v) => v === "acepto",                           msg: "Debes aceptar los términos y condiciones." },
};


function validaCampo(id, value) {
    value = value.trim();
    const validacion = VALIDACIONES[id];
    if (!validacion) return "Campo no encontrado";
    return validacion.fn(value) ? null : validacion.msg;
}

let nombreDisponible = true;

function validaFormulario() {
    let valido = true;
    for (let id in VALIDACIONES) {
        let campo = document.getElementById(id);
        let value;
        if (!campo) continue;
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

    if (document.getElementById('nombre') && !nombreDisponible) {
        muestraError('nombre', 'Este nombre de usuario ya está en uso.');
        valido = false;
    }

    return valido;
}

function agregaListenerValidacion() {
    for (let i = 0; i < VALIDACIONES.length; i++) {
        let id = VALIDACIONES[i][0];
        let campo = document.getElementById(id);
        if(campo){
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
}

function agregaListenerSubmit() {
    const form = document.querySelector("form");
    form.addEventListener("submit", (e) => {
        if (!validaFormulario()) {
            e.preventDefault();
        }
    });
}

document.addEventListener("DOMContentLoaded", () => {
    agregaListenerValidacion();
    agregaListenerSubmit();
});




let nombre_campo=document.getElementById('nombre');
if(nombre_campo){
    nombre_campo.addEventListener('input', function(){
        const nombre = this.value;
        const mensaje = document.getElementById('mensajeNombre');
        if(!mensaje){
            return;
        }
        if(nombre.length < 3){
            mensaje.textContent = '';
            return;
        }


        fetch('../php/comprobarUsuario.php?nombre=' + encodeURIComponent(nombre)) .then(r => r.json()) 
        .then(data => {
            nombreDisponible = !data.existe;
        })
    })
}


const params = new URLSearchParams(window.location.search);

if (params.get('error') === 'credenciales') {
    let me=document.getElementById('mensajeError');
    if(me){
        me.style.display = 'block'
        me.style.color = 'red';
    }
}
*/

