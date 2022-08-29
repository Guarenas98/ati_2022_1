const contenido = () => {
  document.title = `${perfil.nombre}`;
  document.getElementById(
    "logo"
  ).innerHTML = `${config.sitio[0]}<small>${config.sitio[1]}</small> ${config.sitio[2]}`;
  document.getElementById(
    "saludo"
  ).textContent = `${config.saludo}, ${perfil.nombre}`;
  document.getElementById("busqueda").textContent = `${config.home}`;
};

const perfilEstudiante = () => {
  //img
  ig = document.getElementById("img");
  const imag = document.createElement("img");
  imag.src = `${perfil.imagen}`;
  ig.setAttribute("src", imag.src);

  //nombre
  document.getElementById("titulo").textContent = `${perfil.nombre}`;

  //descripcion
  document.getElementById("descrip").textContent = `${perfil.descripcion}`;

  //tabla
  tabla = document.getElementById("tabla");
  let filas = tabla.rows.length;
  let colum = Object.values(config);
  let datos = Object.values(perfil);

  for (let i = 0; i < filas; i++) {
    for (let j = 0; j < tabla.rows[i].cells.length; j++) {
      if (j == 0) {
        tabla.rows[i].cells[j].textContent = `${colum[i + 6]}:`;
      } else {
        tabla.rows[i].cells[j].textContent = `${datos[i + 2]}`;
        if (i + 2 == 6) {
          let text = "";
          datos[6].forEach((element) => {
            console.log(element);
            if (element != "c++") {
              text += element + ", ";
            } else {
              text += element;
            }
            tabla.rows[i].cells[j].textContent = `${text} `;
          });
        }
      }
    }
  }

  //mail
  document.getElementById("mail").textContent = `${config.email.slice(0, 54)}`;
  const ma = document.getElementById("mail");
  const a = document.createElement("a");
  a.href = `mailto:${perfil.email}`;
  a.textContent = `${perfil.email}`;
  ma.appendChild(a);

  //footer
  const pie = document.createElement("footer");
  pie.textContent = `${config.copyRight}`;
  document.body.appendChild(pie);
};

window.addEventListener("load", () => {
  contenido();
  perfilEstudiante();
});
