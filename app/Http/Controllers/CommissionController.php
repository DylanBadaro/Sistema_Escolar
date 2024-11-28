<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Course;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CommissionController extends Controller
{
    protected $availableSchedules = [
        '8-12', '12-16', '16-20'
    ];

    public function index(Request $request)
{
    $courses = Course::all();

    // Definir los horarios posibles
    $allSchedules = ['8-12', '12-16', '16-20'];

    // Filtrar los horarios que se usan más de 3 veces
    $usedSchedules = Commission::select('schedule')
        ->groupBy('schedule')
        ->havingRaw('COUNT(*) >= 3')
        ->pluck('schedule')
        ->toArray();

    // Obtener los horarios disponibles (sin los que ya han sido usados más de 3 veces)
    $schedules = array_diff($allSchedules, $usedSchedules);

    // Asegurarse de que los horarios predeterminados siempre estén disponibles
    $schedules = array_merge($schedules, array_diff($allSchedules, $schedules));

    // Filtrar comisiones según los parámetros
    $commissions = Commission::query();

    if ($request->has('course_id') && $request->course_id != '') {
        $commissions->where('course_id', $request->course_id);
    }

    if ($request->has('schedule') && $request->schedule != '') {
        $commissions->where('schedule', $request->schedule);
    }

    if ($request->has('name') && $request->name != '') {
        $commissions->where('classroom', 'like', '%' . $request->name . '%');
    }

    $commissions = $commissions->paginate(10);

    return view('commissions.index', compact('commissions', 'courses', 'schedules'));
}   
    public function create()
    {
        $courses = Course::all();
        $schedules = $this->getAvailableSchedules();
        return view('commissions.create', compact('courses', 'schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'classroom' => 'required|string|max:255',
            'schedule' => 'required|in:' . implode(',', $this->availableSchedules),
            'course_id' => 'required|exists:courses,id',
        ]);

        // Verificar que el horario no se repita más de tres veces
        $this->validateSchedule($request->schedule);

        Commission::create($request->all());

        return redirect()->route('commissions.index')->with('success', 'Comisión creada con éxito');
    }

    public function edit(Commission $commission)
    {
        $courses = Course::all();
        $schedules = $this->getAvailableSchedules($commission->schedule);
        return view('commissions.edit', compact('commission', 'courses', 'schedules'));
    }

    public function update(Request $request, Commission $commission)
    {
        $request->validate([
            'classroom' => 'required|string|max:255',
            'schedule' => 'required|in:' . implode(',', $this->availableSchedules),
            'course_id' => 'required|exists:courses,id',
        ]);

        // Verificar que el horario no se repita más de tres veces
        $this->validateSchedule($request->schedule, $commission->id);

        $commission->update($request->all());

        return redirect()->route('commissions.index')->with('success', 'Comisión actualizada con éxito');
    }

    public function destroy(Commission $commission)
    {
        $commission->delete();

        return redirect()->route('commissions.index')->with('success', 'Comisión eliminada con éxito');
    }

    private function getAvailableSchedules($currentSchedule = null)
{
    // Traemos los horarios que ya están siendo utilizados más de 3 veces
    $usedSchedules = Commission::select('schedule')
        ->groupBy('schedule')
        ->havingRaw('COUNT(*) >= 3')
        ->pluck('schedule')
        ->toArray();

    // Todos los horarios posibles, incluyendo los que deben aparecer en el filtro
    $allSchedules = ['8-12', '12-16', '16-20'];

    // Filtramos los horarios que ya han sido utilizados más de 3 veces
    $available = array_diff($allSchedules, $usedSchedules);

    // Si hay un horario actual (en la vista de edición), lo agregamos de vuelta a la lista
    if ($currentSchedule) {
        $available[] = $currentSchedule;
    }

    return $available;
}

    private function validateSchedule($schedule, $ignoreId = null)
    {
        $query = Commission::where('schedule', $schedule);

        if ($ignoreId) {
            $query->where('id', '<>', $ignoreId);
        }

        if ($query->count() >= 3) {
            abort(422, 'El horario ya ha sido asignado a tres comisiones. No se puede asignar más.');
        }
    }

        public function downloadList(Request $request)
    {
        // Construir la consulta de comisiones con los filtros
        $query = Commission::with('course');

        // Filtro por curso si se aplica
        if ($request->filled('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        // Filtro por horario si se aplica
        if ($request->filled('schedule')) {
            $query->where('schedule', $request->schedule);
        }

        // Filtro por aula (classroom) si se aplica
        if ($request->filled('name')) {
            $query->where('classroom', 'like', '%' . $request->name . '%');
        }

        // Obtener las comisiones filtradas
        $commissions = $query->get(); // Cambié paginate() por get() porque en el PDF no necesitamos paginación

        // Generar el PDF con los datos filtrados
        $pdf = Pdf::loadView('commissions.pdf', compact('commissions'));

        // Descargar el PDF
        return $pdf->download('comisiones.pdf');
    }
}