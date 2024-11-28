<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CourseStudentController extends Controller
{
    public function index(Request $request)
    {
        $query = CourseStudent::with(['student', 'course', 'commission']);

        // Filtros por curso, estudiante y comisión
        if ($request->has('course_id') && $request->course_id) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->has('commission_id') && $request->commission_id) {
            $query->where('commission_id', $request->commission_id);
        }

        if ($request->has('student_id') && $request->student_id) {
            $query->where('student_id', $request->student_id);
        }

        $enrollments = $query->paginate(10);

        // Datos necesarios para los filtros
        $courses = Course::all();
        $students = Student::all();
        $commissions = Commission::all();

        return view('course_students.index', compact('enrollments', 'courses', 'students', 'commissions'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_students.create', compact('students', 'courses', 'commissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        // Verificar si ya existe una inscripción para evitar duplicados
        $exists = CourseStudent::where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->where('commission_id', $request->commission_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['msg' => 'El estudiante ya está inscrito en esta comisión para este curso.']);
        }

        CourseStudent::create($request->all());

        return redirect()->route('course_students.index')->with('success', 'Inscripción creada con éxito');
    }

    public function edit(CourseStudent $courseStudent)
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_students.edit', compact('courseStudent', 'students', 'courses', 'commissions'));
    }

    public function update(Request $request, CourseStudent $courseStudent)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        // Verificar si ya existe otra inscripción igual (ignorar la actual)
        $exists = CourseStudent::where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->where('commission_id', $request->commission_id)
            ->where('id', '!=', $courseStudent->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['msg' => 'El estudiante ya está inscrito en esta comisión para este curso.']);
        }

        $courseStudent->update($request->all());

        return redirect()->route('course_students.index')->with('success', 'Inscripción actualizada con éxito');
    }

    public function destroy(CourseStudent $courseStudent)
    {
        $courseStudent->delete();

        return redirect()->route('course_students.index')->with('success', 'Inscripción eliminada con éxito');
    }

    public function downloadPDF(Request $request)
    {
        $query = CourseStudent::with(['student', 'course', 'commission']);

        // Aplicar filtros si se proporcionan
        if ($request->has('course_id') && $request->course_id) {
            $query->where('course_id', $request->course_id);
        }

        if ($request->has('commission_id') && $request->commission_id) {
            $query->where('commission_id', $request->commission_id);
        }

        if ($request->has('student_id') && $request->student_id) {
            $query->where('student_id', $request->student_id);
        }

        $students = $query->get(); // Renombrado para coincidir con la vista

        // Generar el PDF con los datos filtrados
        $pdf = Pdf::loadView('course_students.pdf', compact('students'));

        return $pdf->download('inscripciones.pdf');
    }
}
