Integrantes:
Alcaraz, Mariel 
Badaró, Dylan
Franco, Pablo Daniel
Melgar, Agustin Alberto
Nuñez, Rodrigo


1. Abrir XAMPP o wampServer
2. Descargar composer y nodeJS
3. Inicializar MySQL
4. Abrir la carpeta de trabajo en Visual Studio Code
5. Para lograr ejecutar el proyecto correctamente se debe configurar el archivo ".env", eso en caso que no aparezca el archivo al hacer el git clone del repositorio lo cual debe tener el siguiente contenido:
/*APP_NAME=Laravel

APP_ENV=local

APP_KEY=base64:yh7gsS9QSFZs4l+VXZvNxyDuNnZuCsqR9TeE/ohgnJI=

APP_DEBUG=true

APP_TIMEZONE=UTC

APP_URL=http://localhost

APP_LOCALE=en

APP_FALLBACK_LOCALE=en

APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file

# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=algo
DB_USERNAME=root
DB_PASSWORD=
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null
BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
CACHE_STORE=database
CACHE_PREFIX=
MEMCACHED_HOST=127.0.0.1
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false
VITE_APP_NAME="${APP_NAME}"*/

6. Inicializar la terminal (ctrl + ñ) o (ctrl + shift + ñ) 
7. Ejecutar "php artisan migrate" o "php artisan migrate:refresh", esto crea la base de datos con las tablas
8. Ejecutar el comando: "composer require barryvdh/laravel-dompdf"
9. Por ultimo ejecutar "php artisan seve"


Con estos pasos logramos ejecutar la aplicación de laravel 

Pasos para ver el funcionamiento de la aplicación:
1.  Crear materias
    Nueva Materia -> Escribir nombre de la materia -> Guardar Materia

2.  Crear cursos
    Nuevo Curso -> Escribir nombre del curso -> Seleccionar Materia -> Guardar Curso

3. Crear profesores
    Nuevo Profesor -> Escribir nombre del profesor -> Guardar Profesor

4. Crear comisiones
    Nueva Comisión -> Escribir: Aula, seleccionar horario y curso de la nueva comisión -> Guardar Comisión 

5. Crear estudiantes
    Nuevo Estudiante -> Escribir: Nombre, Email del estudiante. Seleccionar curso al que pertenece 

6. Crear inscripciones a curso
    Nueva Inscripción -> Seleccionar: Estudiante, Curso y Comisión -> Guardar Inscripción

   A tener en cuenta:
   *Para crear un cruso se necesita crear un materia primero
   *Para crear un estudiante y comision se debe crear un curso antes
   *Para crear un profesor no es necesario que tenga una comision asignada, ya que pueden haber profesores que no tengan comisiones asignadas por faltas de horas
   *Y para generar una inscripcion debe haber estudiante, curso y comision

(Recomendamos que se creen como mínimo 3 de todo y que sean distintos)


Una vez tengamos todos estos datos creados en cada sección existe la posibilidad de filtrarlos, y descargar un pdf de todos:

Profesores: 
Se puede filtrar por nombre de el profesor y descargar la lista de todos los profesores o de los profesores con mismos nombres.
Se puede editar los datos del profesor o eliminarlos en caso de desearlo
Una vez ya tengamos creada las comisiones, al crear un nuevo profesor aparecerá un listado con las comisiones disponibles creadas

Materia:
Se puede filtrar por nombre de la materia y descargar la lista de todas las materias o de las materias con mismos nombres.
Se puede editar los datos o eliminarlos en caso de desearlo.

Cursos:
Tenemos una sección que se puede ver "Todas las materias" o seleccionar una del listado de materias.
También se puede buscar por nombre

Comisiones: 
Se pude seleccionar por curso y horario, de lo contrario se puede buscar por el nombre y presionando el botón "Filtrar"

Estudiantes:
Se puede buscar por nombre o por selección de los cursos, tenemos la posibilidad de limpiar los filtros.

Inscripciones:
Se puede buscar inscripción por curso y comisión, tenemos los botones de "Filtrar" que es para buscar y el botón de "Limpiar" que es para limpiar los filtros seleccionados
