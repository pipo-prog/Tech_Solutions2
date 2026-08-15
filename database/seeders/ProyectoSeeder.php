<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Proyecto;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario por defecto para asociar los proyectos
        $usuario = Usuario::create([
            'nombre' => 'Camila Beltrán',
            'correo' => 'camila@techsolutions.cl',
            'clave' => Hash::make('desarrollo_software_1'),
        ]);

        Proyecto::create([
            'nombre' => 'Modernización Sitio Web Corporativo',
            'fecha_inicio' => '2026-01-15',
            'estado' => 'En Progreso',
            'responsable' => 'Sofía Vergara',
            'monto' => 4500000.00,
            'created_by' => $usuario->id,
        ]);

        Proyecto::create([
            'nombre' => 'Implementación ERP SAP',
            'fecha_inicio' => '2026-03-01',
            'estado' => 'Planificado',
            'responsable' => 'Carlos Muñoz',
            'monto' => 15200000.00,
            'created_by' => $usuario->id,
        ]);

        Proyecto::create([
            'nombre' => 'Migración a la Nube AWS',
            'fecha_inicio' => '2025-06-10',
            'estado' => 'Completado',
            'responsable' => 'Alejandro Silva',
            'monto' => 8900000.00,
            'created_by' => $usuario->id,
        ]);

        Proyecto::create([
            'nombre' => 'Desarrollo App Móvil Clientes',
            'fecha_inicio' => '2026-05-20',
            'estado' => 'Planificado',
            'responsable' => 'Daniela Rojas',
            'monto' => 6200000.00,
            'created_by' => $usuario->id,
        ]);

        Proyecto::create([
            'nombre' => 'Auditoría de Ciberseguridad',
            'fecha_inicio' => '2025-11-05',
            'estado' => 'Completado',
            'responsable' => 'Ricardo Lagos',
            'monto' => 3400000.00,
            'created_by' => $usuario->id,
        ]);
    }
}
