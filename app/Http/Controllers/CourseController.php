<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CourseController extends Controller
{
    // Listar cursos con filtros
    public function index(Request $request)
    {
        $query = Course::query()->with(['subject']);

        if ($request->filled('subject_id')) {
            $query->where('subject_id', $request->subject_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $courses = $query->paginate(10);
        $subjects = Subject::all();

        return view('courses.index', compact('courses', 'subjects'));
    }

    // Descargar lista de cursos en PDF con filtros
    public function downloadList(Request $request)
    {
        // Realizamos la misma consulta que en el index para obtener los datos filtrados
        $query = Course::query()->with(['subject']);

        if ($request->filled('subject_id')) {
            $query->where('subject_id', $request->subject_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $courses = $query->get();  // Usamos get() para obtener todos los cursos que cumplen con el filtro

        // Generamos el PDF con los datos
        $pdf = Pdf::loadView('courses.pdf', compact('courses'));

        // Descargamos el PDF con el nombre 'lista_cursos.pdf'
        return $pdf->download('lista_cursos.pdf');
    }

    // Formulario de creación
    public function create()
    {
        $subjects = Subject::all();

        return view('courses.create', compact('subjects'));
    }

    // Almacenar nuevo curso
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);
        
        Course::create($validated);

        return redirect()->route('courses.index');
    }

    // Formulario de edición
    public function edit(Course $course)
    {
        $subjects = Subject::all();
        return view('courses.edit', compact('course', 'subjects'));
    }

    // Actualizar curso
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito');
    }

    // Eliminar curso
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado con éxito');
    }
}