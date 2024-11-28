<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Commission;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ProfessorController extends Controller
{
    public function index(Request $request)
    {
        $query = Professor::with('commissions');

        // Búsqueda por nombre
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $professors = $query->paginate(10);
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        $commissions = Commission::all();
        return view('professors.create', compact('commissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'commissions' => 'array',
            'commissions.*' => 'exists:commissions,id',
        ]);

        $professor = Professor::create(['name' => $request->name]);

        if ($request->has('commissions')) {
            $professor->commissions()->sync($request->commissions);
        }

        return redirect()->route('professors.index')->with('success', 'Profesor creado con éxito');
    }

    public function edit(Professor $professor)
    {
        $commissions = Commission::all();
        return view('professors.edit', compact('professor', 'commissions'));
    }

    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'commissions' => 'array',
            'commissions.*' => 'exists:commissions,id',
        ]);

        $professor->update(['name' => $request->name]);

        if ($request->has('commissions')) {
            $professor->commissions()->sync($request->commissions);
        }

        return redirect()->route('professors.index')->with('success', 'Profesor actualizado con éxito');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();

        return redirect()->route('professors.index')->with('success', 'Profesor eliminado con éxito');
    }

    public function downloadList(Request $request)
    {
        // Aplicamos los mismos filtros que en la vista de la lista
        $query = Professor::with('commissions');

        // Si hay un filtro por nombre
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Obtenemos los datos filtrados
        $professors = $query->get();

        // Generamos el PDF
        $pdf = Pdf::loadView('professors.pdf', compact('professors'));

        // Devolvemos el PDF con la descarga
        return $pdf->download('lista_professores.pdf');
    }
}
