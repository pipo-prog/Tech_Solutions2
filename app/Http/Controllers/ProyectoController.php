<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::orderBy('created_at', 'desc')->get();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string|in:Planificado,En Progreso,Completado,Suspendido',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        $validated['created_by'] = Auth::id();

        Proyecto::create($validated);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente.');
    }

    public function show(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string|in:Planificado,En Progreso,Completado,Suspendido',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
        ]);

        $proyecto->update($validated);

        return redirect()->route('proyectos.show', $proyecto->id)->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function deleteConfirm(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.delete', compact('proyecto'));
    }

    public function destroy(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado exitosamente.');
    }
}
