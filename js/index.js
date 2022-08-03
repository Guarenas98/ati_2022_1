document.title = `${config.sitio.join(" ")}`;

putText = (selec, text) => (document.querySelector(selec).innerText = text);
putHtml = (selec, text) => (document.querySelector(selec).innerHTML = text);

putHtml(
  ".logo",
  `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`
);

putText(".saludo", `${config.saludo}, ${"Valeria Acuña"}`);

input = document.querySelector(".busqueda input[type=text]");
input.placeholder = `${config.nombre}`;
button = document.querySelector(".busqueda input[type=button]");
button.value = `${config.buscar}`;

putText("footer", `${config.copyRight}`);

renderGrid = () => {
  query = document.querySelector(".busqueda input[type=text]").value;
  pattern = query.toLowerCase();

  res = listado.filter((elem) => elem.nombre.toLowerCase().startsWith(pattern));

  content = res
    .sort((a, b) => b.nombre < a.nombre)
    .map(
      (elem, idx) => `
        <div class="carousel-item grid-container ${!idx ? "active" : ""}">
          <div class="carousel-item-container">
            <a href="${
              elem.ci === "26915574" ? elem.ci + "/perfil.html" : "#"
            }" class="grid-item">
              <img src="${elem.imagen}" alt="no foto">
              <span>${elem.nombre}</span>
            </a>
          </div>
        </div>`
    );

  content.length && putHtml(".carousel-inner", content.join("\n"));
  putText(
    ".error-notfound",
    content.length ? "" : `${config.error.replace("[query]", query)}`
  );
  if (!content.length) return;

  $('#recipeCarousel').carousel({
    interval :2000
  })
  
  $('.carousel .carousel-item').each(function(){
      var next = $(this).next();
      if (!next.length) {
      next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      
      for (var i=0;i<2;i++) {
          next=next.next();
          if (!next.length) {
            next = $(this).siblings(':first');
          }
          
          next.children(':first-child').clone().appendTo($(this));
        }
  });
};

renderGrid();

button.addEventListener("click", renderGrid);

input.addEventListener("keydown", (event) => {
  if (event.keyCode === 13) {
    event.preventDefault();
    button.click();
  }
});

$("#carousel").swipe({
  swipe: function (direction) {
    if (direction == "left") $(this).carousel("next");
    if (direction == "right") $(this).carousel("prev");
  },
  allowPageScroll: "vertical",
});

$("#carousel").bind("mousewheel", function (e) {
  if (e.originalEvent.wheelDelta / 120 > 0) {
    $(this).carousel("next");
  } else {
    $(this).carousel("prev");
  }
});
