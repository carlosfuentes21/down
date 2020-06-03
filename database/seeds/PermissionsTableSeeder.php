<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREANDO LOS PERMISOS PARA LAS ASIGNATURAS
        Permission::create([
            'name'          =>'navegar asignaturas',
            'slug'          =>'asignatura.index',
            'description'   =>'lista y navega todas las asignaturas del sistema',
        ]);

        Permission::create([
            'name'          =>'ver detalle de la asignatura',
            'slug'          =>'asignatura.show',
            'description'   =>'lver en detalle cada asignatura del sistema',
        ]);

        Permission::create([
            'name'          =>'creacion de asignaturas',
            'slug'          =>'asignatura.create',
            'description'   =>'crear cualquier dato de las asignaturas del sistema',
        ]);

        Permission::create([
            'name'          =>'edicion de asignaturas',
            'slug'          =>'asignatura.edit',
            'description'   =>'editar cualquier dato de las asignaturas del sistema',
        ]);

        Permission::create([
            'name'          =>'eliminar asignaturas',
            'slug'          =>'asignatura.destroy',
            'description'   =>'eliminar cualquier asignatura del sistema',
        ]);
    }
}
