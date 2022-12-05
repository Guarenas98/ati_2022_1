var multipleCardCarousel = document.querySelector(
    "#carouselExampleControls"
  );
  if (window.matchMedia("(min-width: 768px)").matches) {
    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
      interval: false,
    });
    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
    /*var cardWidth = $(".carousel-item").width();*/   /* NULL */
    var cardWidth = carouselWidth/10; 
    var scrollPosition = 0;
    $("#carouselExampleControls .carousel-control-next").on("click", function () {
        console.log('scrollPosition '+  scrollPosition);
        console.log('carouselWidth '+ carouselWidth);
        console.log('cardWidth '+ cardWidth);
      if (scrollPosition < carouselWidth + cardWidth*5 ) {
        scrollPosition += cardWidth;
        console.log('scrollPosition '+  scrollPosition);
        $("#carouselExampleControls .carousel-inner").animate(
          { scrollLeft: scrollPosition },
          600
        );
      }
    });
    $("#carouselExampleControls .carousel-control-prev").on("click", function () {
        
      if (scrollPosition > 0) {
        scrollPosition -= cardWidth;
        $("#carouselExampleControls .carousel-inner").animate(
          { scrollLeft: scrollPosition },
          600
        );
      }
    });
  } else {
    $(multipleCardCarousel).addClass("slide");
  }