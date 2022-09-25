const photoDefault = './default/usuario.png';

const leerJsonConf = () => {
    if (!config) {
        return;
    }
    document.getElementById('logo').innerHTML = `${config['sitio'][0]}  <span> ${config['sitio'][1]}</span>  ${config['sitio'][2]}`;
    document.getElementById('saludo').innerHTML = `${config['saludo']} Maria Fernanda`;
    document.getElementById('copyRight').innerHTML = `${config['copyRight']}`;
};

const testImage = (imageSrc) => {
    return new Promise((resolve, reject) => {
        let imageTest = new Image();
        imageTest.onload = () => {
            resolve(imageTest.currentSrc);
        };
        imageTest.onerror = () => {
            resolve(photoDefault);
        };
        imageTest.src = imageSrc;
    });
}

const generarCarruselItem = async (data) => {
    try {
        const section = document.createElement('section');
        section.id = 'usuario';
        section.className = 'containerPerfil card card-body h-100';

        const img = document.createElement('img');
        img.id = data.ci;
        img.className='img-fluid';
        img.src = await testImage(`./${data.imagen}`);

        const linkUsuario = document.createElement('a');
        linkUsuario.textContent = data.nombre;

        section.appendChild(img);
        section.appendChild(linkUsuario);

        return section;
    } catch (err) {
        console.error(err);
    }
}

const leerListado = async () => {
    if (!listado) {
        return;
    }
    
    const containerListadoEstudiantes = document.getElementById('containerListadoEstudiantes');

    let lista = [];

    try {
        for (const estudiante of listado) {
            const html = await generarCarruselItem(estudiante);
            lista.push(html);
        }
        return lista;
    } catch (err) {
        console.error(err);
    }
};

const loadItems = (lista) => {
    for (let i = 1; i < 5; i++) {
        let current = document.getElementById(`activeItem${i}`);
        if (current.firstElementChild) {
            current.removeChild(current.firstElementChild);
        }
        current.appendChild(lista[i-1]);
    }
}

let currentPlace = 0;
let listadoNodos;

const nextPage = () => {
    currentPlace++;
    if (currentPlace > listadoNodos.length) {
        currentPlace = 1;
    }
    let resultado = listadoNodos.slice(currentPlace, currentPlace + 4);
    if (resultado.length < 4) {
        resultado.push(...listadoNodos.slice(0, 4 - resultado.length));
    }
    loadItems(resultado);
}

const prevPage = () => {
    currentPlace--;
    if (currentPlace < 0) {
        currentPlace = listadoNodos.length - 1;
    }
    let resultado = listadoNodos.slice(currentPlace, currentPlace + 4);
    if (resultado.length < 4) {
        resultado.push(...listadoNodos.slice(0, 4 - resultado.length));
    }
    loadItems(resultado);
}

window.onload = async () => {
    $('#siguiente').click(() => console.log(111111));
    leerJsonConf();
    listadoNodos = await leerListado();
    setInterval(nextPage, 1000);
    nextPage();
}