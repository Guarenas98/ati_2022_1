
const photoDefault = './default/usuario.png';

const containerListadoEstudiantes = document.getElementById("containerListadoEstudiantes");
//const query = "maria"


const LeerJsonConf = () => {
    document.getElementById("logo").innerHTML = `${config["sitio"][0]}  <span> ${config["sitio"][1]}</span>  ${config["sitio"][2]}`;

    document.getElementById("saludo").innerHTML = `${config["saludo"]} Maria Fernanda`;

    document.getElementById("copyRight").innerHTML = `${config["copyRight"]}`;

}

const LeerListado = () => {
    try {

        const searchLengthListado = listado.length;


        for (let index = 0; index < searchLengthListado; index++) {

            const section = document.createElement("section");

            section.className = "containerPerfil";

            const img = document.createElement("img");

            img.id = index;

            img.src = `./${listado[index]["imagen"]}`;

            const linkUsuario = document.createElement("a");

            linkUsuario.textContent = listado[index]["nombre"];

            section.appendChild(img);

            section.appendChild(linkUsuario);

            containerListadoEstudiantes.appendChild(section);

            img.addEventListener('error', (event) => {

                event.target.src = photoDefault;

            });
        }

    } catch (error) {
        console.log("error =====> try Catch", error);
    }

}

const BuscarAndFilter = () => {

    const searchValue = document.getElementById("searchAtiName");//event.target.value;

    const exit = document.getElementById("containerMensajeError");

    const value = searchValue.value;

    const searchContainer = document.querySelectorAll('section.containerPerfil');

    let sumaEstudiante = 0;

    searchContainer.forEach((container) => {

        const searchName = container.innerText;

        const existEstudiante = new RegExp(value, 'ig').test(searchName);

        if (!existEstudiante) {
            container.style.display = 'none';
            sumaEstudiante += 1;
        } else {
            container.style.display = 'flex';
        }
    });

    
    if (sumaEstudiante === searchContainer.length) {

        //console.log("existe el container", exit);

        if (exit) {

            exit.style.display = 'flex';
            exit.className = "textMensaje";
            exit.innerText = `${config["mensajetNoHAyEstudiante"]} ${value}`;

        } else {

            const section = document.createElement("section");

            section.id = "containerMensajeError";

            const text = document.createElement("p");

            text.className = "textMensaje";

            text.innerText = `${config["mensajetNoHAyEstudiante"]} ${value}`;

            section.appendChild(text);
            
            containerListadoEstudiantes.insertAdjacentElement("beforebegin",section);

        }

        containerListadoEstudiantes.style.display = 'none';

    } else {
        containerListadoEstudiantes.style.display = 'grid';

        if (exit) {
            exit.style.display = 'none';
        }

    }

    searchValue.value = '';
}

// searchAtiName.addEventListener('change', (event) =>{
//     //console.log(event)
//     BuscarAndFilter();
// });

botonBuscar.addEventListener('click', () => {
    BuscarAndFilter();
});

// searchAtiName.addEventListener('keyup', (event) => {
//     //console.log("entre aqui a ver si esto funciona keyup", event)
//    // console.log(event.keyCode)
//     if (event.keyCode === 13) {
//         BuscarAndFilter();
//     }

// });

LeerJsonConf();
LeerListado();
