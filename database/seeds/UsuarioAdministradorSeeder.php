<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
            'color'=>'skin-1'
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
        DB::table('usuarios')->insert([
            'usuario'=>'cr7',
            'password'=>bcrypt('123456'),
            'rol_id'=>1,
            'nombre'=>'Wilson',
            'apellido'=>'Uño',
            'email'=>'wils.mtc.cmb@gmail.com'
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Gerencia',
            'sigla'=>'GER',
            'descripcion'=>'Cabeza de la institución'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Gerente',
            'descripcion'=>'Cabeza de la institución'
        ]);
        
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Clínica',
            'url'=>'admin/clinica/#',
            'orden'=>1,
            'icono'=>'fa-plus'
        ]);
                
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Menú',
            'url'=>'admin/menu/#',
            'orden'=>2,
            'icono'=>'fa-list'
        ]);
                
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Rol',
            'url'=>'admin/rol/#',
            'orden'=>3,
            'icono'=>'fa-tag'
        ]);
                
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Usuario',
            'url'=>'admin/usuario/#',
            'orden'=>4,
            'icono'=>'fa-user'
        ]);
                

        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Unidad',
            'url'=>'admin/unidad/#',
            'orden'=>5,
            'icono'=>'fa-th'
        ]);
                
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Personal',
            'url'=>'admin/personal/#',
            'orden'=>6,
            'icono'=>'fa-user'
        ]);
                
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Paciente',
            'url'=>'admin/paciente/#',
            'orden'=>7,
            'icono'=>'fa-tint'
        ]); 
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Fichaje',
            'url'=>'admin/ficha/#',
            'orden'=>8,
            'icono'=>'fa-book'
        ]);      
                //Hijos
                DB::table('menu')->insert([
                    'menu_id'=>1,
                    'nombre'=>'Ver Clínica',
                    'url'=>'admin/clinica',
                    'orden'=>1,
                    'icono'=>'fa-asterisk'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>1,
                    'nombre'=>'Servicios',
                    'url'=>'admin/servicio',
                    'orden'=>2,
                    'icono'=>'fa-asterisk'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>2,
                    'nombre'=>'Ver Menú',
                    'url'=>'admin/menu',
                    'orden'=>1,
                    'icono'=>'fa-th'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>2,
                    'nombre'=>'Menú-Rol',
                    'url'=>'admin/menu-rol',
                    'orden'=>2,
                    'icono'=>'fa-list'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>3,
                    'nombre'=>'Ver Rol',
                    'url'=>'admin/rol',
                    'orden'=>1,
                    'icono'=>'fa-list'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>4,
                    'nombre'=>'Ver Usuarios Activos',
                    'url'=>'admin/usuario',
                    'orden'=>1,
                    'icono'=>'fa-user'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>4,
                    'nombre'=>'Ver Usuarios Inactivos',
                    'url'=>'admin/usuario_inactivo',
                    'orden'=>2,
                    'icono'=>'fa-user'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>5,
                    'nombre'=>'Ver Unidad',
                    'url'=>'admin/unidad',
                    'orden'=>1,
                    'icono'=>'fa-forward'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>6,
                    'nombre'=>'Cargo',
                    'url'=>'admin/cargo',
                    'orden'=>1,
                    'icono'=>'fa-play-circle'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>6,
                    'nombre'=>'Ver Personal Activo',
                    'url'=>'admin/personal',
                    'orden'=>2,
                    'icono'=>'fa-eye'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>6,
                    'nombre'=>'Ver Personal Retirado',
                    'url'=>'admin/personal_inactivo',
                    'orden'=>3,
                    'icono'=>'fa-eye'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>7,
                    'nombre'=>'Ver Paciente',
                    'url'=>'admin/paciente',
                    'orden'=>1,
                    'icono'=>'fa-search'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>8,
                    'nombre'=>'Asignar Ficha',
                    'url'=>'admin/ficha',
                    'orden'=>1,
                    'icono'=>'fa-book'
                ]);
              
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>1]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>2]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>7]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>8]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>9]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>3]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>4]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>5]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>6]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>10]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>11]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>12]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>13]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>14]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>15]);  
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>16]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>17]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>18]);   
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>19]);   
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>20]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>21]);
        $faker=Faker::create();
        for($i=0;$i<1000;$i++){
            DB::table('paciente')->insert([
                'nombre'=>$faker->firstName,
                'apellido_p'=>$faker->lastName,
                'apellido_m'=>$faker->lastName,
                'ci'=>$faker->unique()->numberBetween($min = 1000000, $max = 99999999),
                'direccion'=>$faker->city,
                'celular'=>$faker->unique()->numberBetween($min = 10000, $max = 999999),
                'fecha_nac'=>$faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now'),
                'genero'=>$faker->randomElement(['Hombre', 'Mujer']),
                't_sangre'=>$faker->randomElement(['O negativo', 'O positivo','A negativo','A positivo','B negativo','B positivo','AB negativo','AB positivo',null]),
            ]);
        }

        DB::table('servicio')->insert([
            'nombre'=>'Consulta Externa',
            'descripcion'=>'Atención a todos los pacientes en general'
        ]);
        DB::table('servicio')->insert([
            'nombre'=>'Enfermeria',
            'descripcion'=>'Fomentar el cuidado integral al individuo, familia y comunidad, aplicando el Proceso de Atención de Enfermería a nivel de promoción, prevención, recuperación y rehabilitación.'
        ]);
        DB::table('servicio')->insert([
            'nombre'=>'Internaciones',
            'descripcion'=>'La sala de corta estancia ofrece el servicio en un ambiente agradable, con infraestructura acorde a la complejidad del problema, también brinda al usuario atención y prevención.'
        ]);
        DB::table('servicio')->insert([
            'nombre'=>'Ginecologia',
            'descripcion'=>'Disminuir los riesgos de enfermedad y muerte de la mujer y del producto del embarazo y optimizar el pronóstico de los mismos a través de la oportuna y adecuada atención intrahospitalaria del parto.'
        ]);
    }
}
