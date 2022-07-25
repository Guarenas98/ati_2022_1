
document.getElementById('title').textContent = perfil.nombre;
document.getElementById('logo').textContent = config.sitio[0] + config.sitio[1] + config.sitio[2]  ;
document.getElementById('busqueda').textContent = perfil.nombre;
document.getElementById('saludo').textContent = config['saludo'].replace('[nombre]',perfil.nombre);
document.getElementById('pie').textContent = config['copyRight'];
document.getElementById('fullName').textContent = perfil['nombre'];
document.getElementById('descripcion').textContent = perfil['descripcion'];
document.getElementById('textColor').textContent = config['color_text'].replace('[color]',perfil['color'])
document.getElementById('textBook').textContent = config['libro_text'].replace('[libro]',perfil['libro'])
document.getElementById('textMusic').textContent = config['musica_text'].replace('[musica]',perfil['musica'])
document.getElementById('textVideoGame').textContent = config['video_juego_text'].replace('[video_juego]',perfil['video_juego'])
document.getElementById('lenguajes').textContent = config['lenguajes_text'].replace('[lenguajes]',perfil['lenguajes'])
document.getElementById('emailText').textContent = config['email_text'].replace('[email]','')
// console.log(document.getElementById('emailLink').textContent)
document.getElementById('emailLink').textContent = perfil['email']
