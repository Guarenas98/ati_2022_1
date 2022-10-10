function carousel(){
    $('#list_students').slick({
        variableWidth: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        adaptiveHeight: false,
        arrows: false,
        rows: 0
      }).on('wheel', (function(e) {
      e.preventDefault();
      if (e.originalEvent.deltaY < 0) {
        $(this).slick('slickNext');
      } else {
        $(this).slick('slickPrev');
      }
    }));
}