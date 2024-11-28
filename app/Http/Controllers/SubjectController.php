<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SubjectController extends Controller
{
    // Listar materias
    public function index()
    {
        $subjects = Subject::paginate(10);
        return view('subjects.index', compact('subjects'));
    }

    // Formulario de creación
    public function create()
    {
        return view('subjects.create');
    }

    // Almacenar nueva materia
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:subjects',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Materia creada con éxito');
    }

    // Formulario de edición
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    // Actualizar materia
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name,' . $subject->id,
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Materia actualizada con éxito');
    }

    // Eliminar materia
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Materia eliminada con éxito');
    }
    public function searchSubject(Request $request)
    {
        $query = $request->input('query');

        // Buscar materias por coincidencia en el nombre
        $subjects = Subject::where('name', 'LIKE', '%' . $query . '%')->paginate(10);

        // Devolver la vista con los resultados
        return view('subjects.index', compact('subjects'));
    }
        public function downloadPdf()
    {
        $subjects = Subject::all();  // Obtiene todas las materias (o usa la paginación si necesitas la lista actual filtrada)

        $pdf = PDF::loadView('subjects.pdf', compact('subjects')); // Carga la vista que genera el PDF
        return $pdf->download('lista_de_materias.pdf'); // Descarga el archivo PDF
    }
}