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
5. Inicializar la terminal 
6. Ejecutar "php artisan migrate", esto crea la base de datos con las tablas
7. Ejecutar "php artisan seve"

Con estos pasos logramos ejecutar la aplicación de larabel 

Pasos para ver el funcionamiento de la aplicación:
1. Crear profesores
    Nuevo Profesor -> Escribir nombre del profesor -> Guardar Profesor

2. Crear materias
    Nueva Materia -> Escribir nombre de la materia -> Guardar Materia

3. Crear cursos
    Nuevo Curso -> Escribir nombre del curso -> Seleccionar Materia -> Guardar Curso

4. Crear comisiones
    Nueva Comisión -> Escribir: Aula, seleccionar horario y curso de la nueva comisión -> Guardar Comisión 

5. Crear estudiantes
    Nuevo Estudiante -> Escribir: Nombre, Email del estudiante. Seleccionar curso al que pertenece 

6. Crear inscripciones a curso
    Nueva Inscripción -> Seleccionar: Estudiante, Curso y Comisión -> Guardar Inscripción 


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
