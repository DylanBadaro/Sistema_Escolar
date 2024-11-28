<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    // Listar estudiantes con filtro
    public function index(Request $request)
    {
        $search = $request->input('search');
        $courseId = $request->input('course');

        $students = Student::query()
            ->when($search, fn($query) => $query->where('name', 'like', "%{$search}%"))
            ->when($courseId, fn($query) => $query->where('course_id', $courseId))
            ->with('course') // Carga el curso relacionado
            ->paginate(10);

        $courses = Course::all();

        return view('students.index', compact('students', 'courses'));
    }

    public function downloadPDF(Request $request)
    {
        $search = $request->input('search');
        $courseId = $request->input('course');

        $students = Student::query()
            ->when($search, fn($query) => $query->where('name', 'like', "%{$search}%"))
            ->when($courseId, fn($query) => $query->where('course_id', $courseId))
            ->with('course') // Cargar curso relacionado
            ->get(); // Obtener todos los estudiantes que cumplen los filtros

        $pdf = Pdf::loadView('students.pdf', compact('students'));
        
        // Descargar el PDF
        return $pdf->download('lista_estudiantes.pdf');
    }
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    // Almacenar nuevo estudiante
        public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'course_id' => 'required|exists:courses,id', // Validar que el curso exista
        ]);

        // Crear el estudiante
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id, // Asegúrate de que el 'course_id' se guarde correctamente
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante creado con éxito');
    }

    // Formulario de edición
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Actualizar estudiante
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado con éxito');
    }

    // Eliminar estudiante
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado con éxito');
    }
}
