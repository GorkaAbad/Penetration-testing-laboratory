var containersConseguidos = [];
var containers = [];
var containersNoConseguidos = [];
var cve;
/**
 * Marca como conseguido los containers conseguidos por el ususario
 */
function pintarConseguidos(containersRecibidos) {
    for (let i in containersRecibidos) {
        let elemento = document.getElementById(containersRecibidos[i]);
        //Cambiar el color
        if (elemento !== null) {
            elemento.insertAdjacentHTML("afterbegin", "<span class=\"badge badge-success\">Done</span>");
        }else{
            desactivarFlag();
        }
    }

    containersNoConseguidos = containers.filter(value => !containersConseguidos.includes(value));
    console.log("Containers no conseguidos " + containersNoConseguidos);
    console.log("Containers conseguidos " + containersConseguidos);
}

/**
 * Vuelva de PHPa JS todos los containers
 * @param container
 */
function obtenerConseguidos() {
    return jQuery.ajax({
        type: "POST",
        url: './obtenerConseguidos.php',
        dataType: 'json',
        data: {},

        success: function (obj, textstatus) {
            if (!('error' in obj)) {
                containersConseguidos = obj;
                pintarConseguidos(obj);
            } else {
                console.log(obj.error);
                return;
            }
        }
    });
}

function obtenerConseguidosConId(id) {
    console.log(id);
    return jQuery.ajax({
        type: "POST",
        url: './obtenerConseguidos.php',
        dataType: 'json',
        data: {"id": id},

        success: function (obj, textstatus) {
            if (!('error' in obj)) {
                containersConseguidos = obj;
                pintarConseguidos(obj);
                mostrarConseguidos();
            } else {
                console.log(obj.error);
                return;
            }
        }
    });
}

function mostrarTodos() {
    try {
        let botonDone = document.getElementById("done");
        let botonUndone = document.getElementById("undone");
        let botonAll = document.getElementById("all");
        botonDone.classList.remove("active");
        botonUndone.classList.remove("active");
        botonAll.classList.add("active");
    } catch (e) {
        console.log("No hya botones por lo que es de otro usuario");
    }
    if (containers.length != 0) {
        for (let i in containers) {
            let elemento = document.getElementById(containers[i] + "CARD");
            if (elemento.style.display === "none") {
                elemento.style.display = "block";
            }
        }
    }
}

/**
 * Muestra solo los containers no conseguidos
 */
function mostrarNoConseguidos() {
    mostrarTodos();
    let botonDone = document.getElementById("done");
    let botonUndone = document.getElementById("undone");
    let botonAll = document.getElementById("all");
    botonDone.classList.remove("active");
    botonUndone.classList.add("active");
    botonAll.classList.remove("active");
    if (containersConseguidos.length != 0) {
        for (let i in containersConseguidos) {
            let elemento = document.getElementById(containersConseguidos[i] + "CARD");
            if (elemento.style.display !== "none") {
                //None esconde el elemento
                elemento.style.display = "none";
            }
        }
    }
}

/**
 * Muestra solo los containers conseguidos
 */
function mostrarConseguidos() {
    mostrarTodos();
    try {
        let botonDone = document.getElementById("done");
        let botonUndone = document.getElementById("undone");
        let botonAll = document.getElementById("all");
        botonDone.classList.add("active");
        botonUndone.classList.remove("active");
        botonAll.classList.remove("active");
    } catch (e) {
        console.log("No hya botones por lo que es de otro usuario");
    }
    if (containersNoConseguidos.length != 0) {
        for (let i in containersNoConseguidos) {
            let elemento = document.getElementById(containersNoConseguidos[i] + "CARD");
            if (elemento.style.display !== "none") {
                //None esconde el elemento
                elemento.style.display = "none";
            }
        }

    }
}

/**
 * Busca en los contenedores POR ID. Muestra en pantallas los cotenedores relacuonados
 * @param e
 */
function search(e) {
    if (event.key === 'Enter') {
        console.log(e.value);
        let ocultarContainers = [];
        mostrarTodos();
        //Buscon en todos los containers, los que tengan algo pareceido a lo que ha escrito el usuario
        for (let i in containers) {
            //Si lo que busca no esta en la lista de containers, lo meto a un array
            if (!containers[i].includes(e.value)) {
                console.log(containers[i]);
                ocultarContainers.push(containers[i]);
            }


        }
        //Oculto los elementos que no tienen nada que ver con lo que ha buscado el usuario
        for (let i in ocultarContainers) {
            let elemento = document.getElementById(ocultarContainers[i] + "CARD");
            elemento.style.display = "none";
        }
    }
}

function guardarContainers(container) {
    containers = container;

    console.log("Containers cargados " + containers);

}

function desactivarFlag() {
    if (containersConseguidos.includes(cve)) {//Si el container lo ha hecho desactivar el boton
        console.log("Desactivar boton");
        document.getElementById("botonFlag").disabled = true;
    }
}

function setActual(_cve) {
    cve = _cve;
}