#include <iostream>
#include <math.h>

using namespace std;

class Punto {
  private:
      float x,y;
	  
  public:
     Punto() {x=0.0; y=0.0;}
     Punto(float x1, float y1) {x=x1; y=y1;}
     float getX(){
		 return x;
	  }
     float getY(){
		 return y;
	  }
     void setX(float x1){
		 x=x1;
	  }
     void setY(float y1){
		 y=y1;
	  }
     void show(){
		  cout << "x="<< x <<", y="<< y << endl;
	  }
};

class Circulo{
	private:
		float radio;
		Punto origen;
	
	public:
		Circulo(){ 
			radio=0.0;
		}
		Circulo(float r){
			radio=r;
		}
		Circulo(Punto p, float r){
			radio = r;
			origen = p;
		}
		bool pertenece(Punto p){
			return pow(p.getX(),2)+pow(p.getY(),2) <= pow(radio,2);
		}
      void show(){
  		  cout << "x="<< origen.getX() <<", y="<< origen.getY() <<", radio="<< radio << endl;
  	   }
};

int main() {
   Punto p(3,2); //punto con coordenadas x=3, y=2
	p.show();
	
	Circulo c(2); //circulo de radio 10, centrado en el orgien, uso constructor Circulo(float r)
	c.show();
   
   //printf("¿El punto pertenece? ");
	if(c.pertenece(p)){
	   cout << "El punto pertenece al círculo\n" << endl;
	} else {
		cout << "El punto NO pertenece al círculo\n"<< endl;
	}
}