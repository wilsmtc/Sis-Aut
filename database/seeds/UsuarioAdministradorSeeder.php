<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    public function run()
    {
        DB::table('clinica')->insert([
            'nombre'=>'CLINICA SANTA TERESA',
            'direccion'=>'Cll. Ayacucho N°39 entre Cochabamba y Santa Teresa',
            'telefono'=>'262-26666',
            'contacto_1'=>'76167618',
            'propietario'=>'Dr. Benigno Gutierrez Vargas',
            'mision'=>'Curar personas',
            'vision'=>'ganar dinero',
            'color'=>'skin-1',
            'foto'=>'clinic.jpg',
            'logo'=>'logo.png',
        ]);

        DB::table('roles')->insert([
            'rol'=>'Administrador',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>1
        ]);

        DB::table('roles')->insert([
            'rol'=>'Usuario'
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Gerencia',
            'sigla'=>'GER',
            'descripcion'=>'Cabeza de la institución'
        ]);
        DB::table('usuarios')->insert([
            'usuario'=>'cr7',
            'password'=>bcrypt('123456'),
            'rol_id'=>1,
            'nombre'=>'Wilson',
            'apellido'=>'Uño',
            'email'=>'wils.mtc.cmb@gmail.com'
        ]);
    }
}
