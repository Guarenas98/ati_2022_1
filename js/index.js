const contenido = () => {
  document.title = `${config.sitio[0]}${config.sitio[1]} ${config.sitio[2]}`;
  document.getElementById(
    "logo"
  ).innerHTML = `${config.sitio[0]}<small>${config.sitio[1]}</small> ${config.sitio[2]}`;
  document.getElementById(
    "saludo"
  ).innerHTML = `${config.saludo}, Ariana Medina`;
  document.getElementById("nombre").placeholder = `${config.nombre}...`;
  document.getElementById("buscar").value = `${config.buscar}`;
  document.getElementById("footer").innerHTML = `${config.copyRight}`;
};

let pri = 0;
let Estudiante = [];
const listaEstudiantes = (lista, valor) => {
  if (lista.length > 0) {
    lista.forEach((estudiante) => {
      const li = document.createElement("li");
      const img = document.createElement("img");
      const p = document.createElement("p");
      const a = document.createElement("a");
      img.src = estudiante.imagen;
      a.href = "#";
      a.textContent = estudiante.nombre;
      p.appendChild(a);
      li.setAttribute("id", estudiante.ci);
      li.setAttribute("class", "estudiante");
      li.appendChild(img);
      li.appendChild(p);
      document.getElementById("lista").appendChild(li);
      let nueEst = {
        ci: estudiante.ci,
        imagen: estudiante.imagen,
        nombre: estudiante.nombre.toLowerCase(),
      };
      pri == 0 ? Estudiante.push(nueEst) : null;
    });
  } else {
    const p = document.createElement("p");
    let lista = document.getElementById("lista");
    removeAllChildNodes(lista);
    p.textContent = `${config.sinnombre}  ${valor}`;
    p.setAttribute("id", "sinNombre");
    document.getElementById("lista").appendChild(p);
  }
};

function removeAllChildNodes(parent) {
  while (parent.firstChild) {
    parent.removeChild(parent.firstChild);
  }
}

let lis = [];
const buscarEstudiante = () => {
  let valor = document.getElementById("nombre");
  let valor2 = valor.value.toLowerCase();
  for (let i = 0; i < valor2.length; i++) {
    let lista = document.getElementById("lista");
    removeAllChildNodes(lista);
    lis = Estudiante.filter((estudiante) => estudiante.nombre.includes(valor2));
    listaEstudiantes(lis, valor.value);
    lis = [];
  }
  if (valor2.length == 0) {
    let lista = document.getElementById("lista");
    removeAllChildNodes(lista);
    listaEstudiantes(listado);
  }
};

window.addEventListener("load", () => {
  contenido();
  listaEstudiantes(listado);
  pri = 1;
  const element = document.getElementById("nombre");
  element.addEventListener("keyup", buscarEstudiante);
});
