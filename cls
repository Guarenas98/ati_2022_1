[1mdiff --git a/figura.cpp b/figura.cpp[m
[1mindex bf41579..f822677 100644[m
[1m--- a/figura.cpp[m
[1m+++ b/figura.cpp[m
[36m@@ -338,7 +338,7 @@[m [mpublic:[m
 	char periChar='*';[m
 	char backChar=' ';[m
 	char fillChar='*';[m
[31m-	char lineChar='.';[m
[32m+[m	[32mchar lineChar='*';[m
 	[m
    for (int y = cuadrante.getCajaY(); y >= 0; --y) {[m
 	  if(y % cuadrante.getIntervalo() == 0) {[m
[36m@@ -401,6 +401,8 @@[m [mpublic:[m
 int main() {[m
 [m
   int x0,y0,x1,y1,x2,y2,x3,y3;[m
[32m+[m[41m [m
[32m+[m[32m  printf("Hola [21071997]");[m
   printf("Ingrese coordenada 1 (x y): "); scanf("%d %d",&x0, &y0);[m
   printf("Ingrese coordenada 2 (x y): "); scanf("%d %d",&x1, &y1); [m
   printf("Ingrese coordenada 3 (x y): "); scanf("%d %d",&x2, &y2);[m
