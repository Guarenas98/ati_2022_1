#include <stdio.h>

class Coordenada {
private:
  int x, y;

public:
  Coordenada() {
    x = 0;
    y = 0;
  }
  Coordenada(int x1, int y1) {
    x = x1;
    y = y1;
  }
  int getX() { 
	  return x; 
  }
  int getY() { 
	  return y; 
  }
  void setX(int x1) { 
	  x = x1; 
  }
  void setY(int y1) { 
	  y = y1; 
  }
  void show() { 
	  printf("x=%d, y=%d\n",x,y); 
  }
};

class Cuadrante {
  int numCuadrante;
  int maxX, maxY;
  int cajaX, cajaY;
  int intervalo;

private:
   bool pertenecePrimerCuadrante(Coordenada c) {
     // x y y deben ser positivo y menorese que maxX o maxY
     bool per = true;
     if (c.getX() < 0 || c.getX() > maxX) {
       per = false;
     }
     if (c.getY() < 0 || c.getY() > maxY) {
       per = false;
     }
     return per;
   }

   bool perteneceSegundoCuadrante(Coordenada c) {
     // x debe ser positivo y menores que maxX, y y debe ser negativo y menor que
     // maxY
     bool per = true;
     if (c.getX() < 0 || c.getX() > maxX) {
       per = false;
     }
     if (c.getY() > 0 || c.getY() > maxY) {
       per = false;
     }
     return per;
   }

   bool perteneceTercerCuadrante(Coordenada c) {
     // x y y deben ser negativos y mayores que maxX o maxY
     bool per = true;
     if (c.getX() > 0 || c.getX() < maxX) {
       per = false;
     }
     if (c.getY() > 0 || c.getY() < maxY) {
       per = false;
     }
     return per;
   }

   bool perteneceCuartoCuadrante(Coordenada c) {
     // x debe ser negativo y mayor que maxX, y y debe ser positivo y menor que
     // maxY
     bool per = true;
     if (c.getX() > 0 || c.getX() < maxX) {
       per = false;
     }
     if (c.getY() < 0 || c.getY() > maxY) {
       per = false;
     }
     return per;
   }

public:
  Cuadrante() {
    numCuadrante = 1;
    maxX = 45;
    maxY = 45;
    cajaX = 50;
    cajaY = 50;
    intervalo = 2;
  }
  
  Cuadrante(int num, int mX, int mY, int cX, int cY, int inter) {
    numCuadrante = num;
    maxX = mX;
    maxY = mY;
    cajaX = cX;
    cajaY = cY;
    intervalo = inter;
  }

  bool pertenece(Coordenada c) {
    bool per = false;
    switch (numCuadrante) {
	    case 1:
	      per = pertenecePrimerCuadrante(c);
	      break;
	    case 2:
	      per = perteneceSegundoCuadrante(c);
	      break;
	    case 3:
	      per = perteneceTercerCuadrante(c);
	      break;
	    case 4:
	      per = perteneceCuartoCuadrante(c);
	      break;			    
	 }
    return per;
  }
 
  int getNumCuadrante(){
	  return numCuadrante;
  }
  
  int getMaxX(){
	  return maxX;
  }
  
  int getMaxY(){
	  return maxY;
  }

  int getCajaX(){
	  return cajaX;
  }
  
  int getCajaY(){
	  return cajaY;
  }
  
  int getIntervalo(){
	  return intervalo;
  }
};

class Rectangulo {
private:
  Coordenada puntos[4];
  Cuadrante cuadrante;
  bool valido;
  bool pertenece;
  int longitud, ancho;

  void revisarValido() {
    valido = false;
    float auxiliar1 = 0;
    float auxiliar2 = 0;
	 
    if (puntos[0].getX() == puntos[1].getX()
		  && puntos[2].getX() == puntos[3].getX() 
	 	  && puntos[0].getY() == puntos[2].getY() 
	     && puntos[1].getY() == puntos[3].getY()) {
			  valido = true;
            auxiliar1 = puntos[1].getY() - puntos[0].getY();
            auxiliar2 = puntos[3].getX() - puntos[1].getX();
				Coordenada tem = puntos[3];
				puntos[3]=puntos[2];
				puntos[2]=tem;				
     }
     
	  if (puntos[0].getX() == puntos[1].getX()
		  && puntos[2].getX() == puntos[3].getX() 
	 	  && puntos[0].getY() == puntos[3].getY()
	     && puntos[1].getY() == puntos[2].getY()) {
			  valido = true;
          auxiliar1 = puntos[1].getY() - puntos[0].getY();
          auxiliar2 = puntos[2].getX() - puntos[1].getX();
    }
	 
    if (puntos[0].getX() == puntos[2].getX()
		  && puntos[1].getX() == puntos[3].getX()
		  && puntos[0].getY() == puntos[1].getY()
		  && puntos[2].getY() == puntos[3].getY()) {
			  valido = true;
            auxiliar1 = puntos[2].getY() - puntos[0].getY();
            auxiliar2 = puntos[3].getX() - puntos[2].getX();
				Coordenada tem = puntos[1];
				puntos[1]=puntos[2];
				puntos[2]=puntos[3];
				puntos[3]=tem;		
   }
   if (puntos[0].getX() == puntos[2].getX()
		  && puntos[1].getX() == puntos[3].getX()
		  && puntos[0].getY() == puntos[3].getY()
		  && puntos[2].getY() == puntos[1].getY()) {
			  valido = true;
            auxiliar1 = puntos[2].getY() - puntos[0].getY();
            auxiliar2 = puntos[1].getX() - puntos[2].getX();
				Coordenada tem = puntos[1];
				puntos[1]=puntos[2];
				puntos[2]=tem;
    }
    if (puntos[0].getX() == puntos[3].getX()
		  && puntos[1].getX() == puntos[2].getX()
		  && puntos[0].getY() == puntos[1].getY()
		  && puntos[3].getY() == puntos[2].getY()) {
			  valido = true;
            auxiliar1 = puntos[3].getY() - puntos[0].getY();
            auxiliar2 = puntos[2].getX() - puntos[3].getX();
				Coordenada tem = puntos[1];
				puntos[1]=puntos[3];
				puntos[3]=tem;
    }
    if (puntos[0].getX() == puntos[3].getX()
		  && puntos[1].getX() == puntos[2].getX()
		  && puntos[0].getY() == puntos[2].getY()
		  && puntos[1].getY() == puntos[3].getY()) {
			  valido = true;
            auxiliar1 = puntos[3].getY() - puntos[0].getY();
            auxiliar2 = puntos[3].getX() - puntos[1].getX();
				Coordenada tem = puntos[1];
				puntos[1]=puntos[3];
				puntos[3]=puntos[2];
				puntos[2]=tem;
    }

    if (auxiliar1 < 0) {
      auxiliar1 = -auxiliar1;
    }
	 
    if (auxiliar2 < 0) {
      auxiliar2 = -auxiliar2;
    }
	 
    if (auxiliar1 > auxiliar2) {
      longitud = auxiliar1;
      ancho = auxiliar2;
    } else {
      longitud = auxiliar2;
      ancho = auxiliar1;
    }
  }

public:
  Rectangulo() {
    cuadrante = Cuadrante(1, 20, 20, 25, 25, 1);
    puntos[0] = Coordenada(0, 0);
    puntos[1] = Coordenada(0, 1);
    puntos[2] = Coordenada(1, 1);
    puntos[3] = Coordenada(1, 0);
    valido = true;
	 pertenece = true;
    longitud = 1;
    ancho = 1;
  }

  Rectangulo(Coordenada p1, Coordenada p2, Coordenada p3, Coordenada p4) {
    cuadrante = Cuadrante(1, 20, 20, 25, 25, 2);
    puntos[0] = p1;
    puntos[1] = p2;
    puntos[2] = p3;
    puntos[3] = p4;
	 
    if(cuadrante.pertenece(p1) && cuadrante.pertenece(p2) && 
	    cuadrante.pertenece(p3) && cuadrante.pertenece(p4)){
		 pertenece = true;   	
	    revisarValido();
    } else {
		 pertenece = false;
    	 valido = false;
    }
  }
  
  bool esValido() {
	  return valido;
  }	
  
  bool pertenecer() {
	  return pertenece;
  }  
  
  int valorMaximoY() {
	  return cuadrante.getMaxY();
  }  
  
  int valorMaximoX() {
	  return cuadrante.getMaxX();
  }  
  
  int getLongitud() { 
	  return longitud; 
  }

  int getAncho() { 
	  return ancho; 
  }

  int getArea() { 
	  return longitud * ancho; 
  }

  int getPerimetro() { 
	  return (longitud + ancho) * 2; 
  }
  
  bool esCuadrado(){
	  return longitud == ancho;
  }
  
  Coordenada getCoordenada1(){
	  return puntos[0];
  }
  
  Coordenada getCoordenada2(){
	  return puntos[1];
  }
  
  Coordenada getCoordenada3(){
	  return puntos[2];
  }
  
  Coordenada getCoordenada4(){
	  return puntos[3];
  }
  
  void dibujar(){
	  printf("Dibujo del rectangulo con las coordenadas (%d,%d), (%d,%d), (%d,%d), (%d,%d)\n", 
 			puntos[0].getX(), puntos[0].getY(), puntos[1].getX(), puntos[1].getY(),
 			puntos[2].getX(), puntos[2].getY(), puntos[3].getX(), puntos[3].getY());
	
	char periChar='*';
	char backChar=' ';
	char fillChar='*';
	char lineChar='*';
	
   for (int y = cuadrante.getCajaY(); y >= 0; --y) {
	  if(y % cuadrante.getIntervalo() == 0) {
		  printf("%2d-|",y);
	  } else {
	  	  printf("   |");
	  }
     for (int x = 0; x < cuadrante.getCajaX()+1; ++x) {
       	if ((puntos[0].getX() == x && puntos[0].getY() == y) ||
             (puntos[1].getX() == x && puntos[1].getY() == y)) {
                // imprimo lado horizontal del rectangulo         
					while (x <= puntos[3].getX() ) {
						printf("%c ",periChar);
						++x;
					}
					// imprimo lo que queda del cuadrante
					printf("%c ",backChar);
		 	  } else if ((( x <= puntos[3].getX() && x >= puntos[0].getX())) &&
					puntos[1].getY() >= y && puntos[0].getY() <= y ) {
            	// imprimo lado vertical del rectangulo
					printf("%c ",periChar);
					// imprimo dentro del rectangulo
					for ( x++; x < puntos[3].getX(); ) {
						printf("%c ",fillChar);
            		++x;
      			}
      			printf("%c ",periChar);
			  } else {
				  if ((puntos[0].getX() == x && y < puntos[0].getY()) || (puntos[3].getX() == x && y < puntos[3].getY())){
				  	 	printf("%c ",lineChar);	
				  } else if ((puntos[0].getY() == y && x < puntos[0].getX()) || (puntos[1].getY() == y && x < puntos[1].getX())){
				  	 	printf("%c ",lineChar);	
				  } else {
				  	printf("%c ",backChar);
				  }			  	
    	 	  }
	   }
		printf("\n");
  	}
	printf("    -");
	for (int x = 1; x <= cuadrante.getCajaX(); ++x) {
	  	  if(x % cuadrante.getIntervalo() == 0) {
	  		  printf("--");
	  	  } else {
	  	  	  printf("--");
	  	  }			
	}
	printf("\n    0");
	for (int x = 1; x <= cuadrante.getCajaX(); ++x) {
	  	  if(x % cuadrante.getIntervalo() == 0) {
	  		  printf("%2d",x);
	  	  } else {
	  	  	  printf("  ");
	  	  }			
	}
	printf("\n");
  }
};

int main() {

  int x0,y0,x1,y1,x2,y2,x3,y3;
  //Rectangulo rectangulo(Coordenada(3,2), Coordenada(5,-6), Coordenada(7,6), Coordenada(7,2));	
  //Rectangulo rectangulo(Coordenada(3,2), Coordenada(3,6), Coordenada(7,6), Coordenada(7,2));
  //Rectangulo rectangulo(Coordenada(0,2), Coordenada(0,6), Coordenada(7,6), Coordenada(7,2));
  //Rectangulo rectangulo(Coordenada(2,0), Coordenada(7,0), Coordenada(2,6), Coordenada(7,6));
  //Rectangulo rectangulo(Coordenada(12,12), Coordenada(18,12), Coordenada(18,20), Coordenada(12,20));
  printf("Hola 23685724");
  printf("Ingrese coordenada 1 (x y): "); scanf("%d %d",&x0, &y0);
  printf("Ingrese coordenada 2 (x y): "); scanf("%d %d",&x1, &y1); 
  printf("Ingrese coordenada 3 (x y): "); scanf("%d %d",&x2, &y2);
  printf("Ingrese coordenada 4 (x y): "); scanf("%d %d",&x3, &y3);
  
  Rectangulo rectangulo(Coordenada(x0,y0), Coordenada(x1,y1), Coordenada(x2,y2), Coordenada(x3,y3));

  if(rectangulo.esValido()){
	  printf("El ancho es: %d\n", rectangulo.getAncho());
	  printf("La longitud es: %d\n", rectangulo.getLongitud());
	  printf("El área es: %d\n", rectangulo.getArea());
	  printf("El perimetro es: %d\n", rectangulo.getPerimetro());
	  if(rectangulo.esCuadrado()){
		  printf("Es un cuadrado\n");
	  }
	  rectangulo.dibujar();
  } else {
	   if(rectangulo.pertenecer()){
	  		printf("La figura con las coordenadas (%d,%d), (%d,%d), (%d,%d), (%d,%d), no es valida\n", 
					rectangulo.getCoordenada1().getX(), rectangulo.getCoordenada1().getY(),
					rectangulo.getCoordenada2().getX(), rectangulo.getCoordenada2().getY(),
					rectangulo.getCoordenada3().getX(), rectangulo.getCoordenada3().getY(),
					rectangulo.getCoordenada4().getX(), rectangulo.getCoordenada4().getY());	   	
	   } else {
	  		printf("Alguna de las coordenadas (%d,%d), (%d,%d), (%d,%d), (%d,%d) no pertence al cuadrante o es menor que %d\n", 
					rectangulo.getCoordenada1().getX(), rectangulo.getCoordenada1().getY(),
					rectangulo.getCoordenada2().getX(), rectangulo.getCoordenada2().getY(),
					rectangulo.getCoordenada3().getX(), rectangulo.getCoordenada3().getY(),
					rectangulo.getCoordenada4().getX(), rectangulo.getCoordenada4().getY(),
					rectangulo.valorMaximoY());
	   	
	   }
  }
}