<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsuarioAdministradorSeeder extends Seeder
{
    public function run()
    {
        DB::table('clinica')->insert([
            'nombre'=>'CLÍNICA SANTA TERESA',
            'direccion'=>'Calle Ayacucho Nro 39 entre Cochabamba y Santa Teresa ',
            'telefono'=>'2-6224000',
            'contacto_1'=>'76168781',
            'propietario'=>'Benigno  Gutiérrez Vargas',
            'mision'=>'Brindar atención médica de excelencia, a través de un equipo humano cálido y calificado, logrando la máxima satisfacción de los pacientes',
            'vision'=>'Crecer hacia adelante, progresar e implementar más atenciones y atender a la mayor parte de la población. Así poder ser reconocidos como zona de influencia por la calidad asistencial, seguridad y satisfacción del paciente',
            'descripcion'=>'La Clínica Santa Teresa de la cuidad de Potosí ya tiene 45 años de funcionalidad, está compuesto por un equipo de profesionales que brindan servicios de salud para ayudar a sus pacientes',
            'color'=>'skin-1',
        ]);

        DB::table('roles')->insert([
            'rol'=>'Administrador',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>1
        ]);
        DB::table('roles')->insert([
            'rol'=>'Médico',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
        ]);
        DB::table('roles')->insert([
            'rol'=>'Enfermería',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
        ]);
        DB::table('roles')->insert([
            'rol'=>'Oficinista',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>0
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
            'sigla'=>'GCIA',
            'descripcion'=>'Encargados de dirijir la Clínica'
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Unidad Médica',
            'sigla'=>'UM',
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Unidad de Enfermería',
            'sigla'=>'UENF',
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Administración',
            'sigla'=>'ADM',
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Unidad de Apoyo',
            'sigla'=>'APOYO',
        ]);

        DB::table('cargo')->insert([
            'nombre'=>'Gerente',
            'descripcion'=>'Máxima autoridad'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Jefe Médico',
            'descripcion'=>'Supervisor de todos los médicos'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Médico de Planta',
            'descripcion'=>'Médico geneal'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Jefe de enfermería',
            'descripcion'=>'Supervisor de todos los enfermeros y enfemeras'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Enfermero/a de Planta',
            'descripcion'=>'Los que estan a cargo de los pacientes'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Estudiantes de enfermería',
            'descripcion'=>'Estudiantes de Enfermería y/o medicina'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Receocionista',
            'descripcion'=>'Abre las historias clínicas de pacientes de atención ambulatoria, se toman los datos de pacientes'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Operador de Limpieza',
            'descripcion'=>'Esta encargado de la limpieza e higiene del local su labor es continua'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Secretaria de Gerencia',
            'descripcion'=>'La secretaria de gerencia realiza labor de apoyo al director médico y al gerente de la cliníca'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Camillero',
            'descripcion'=>'Persona encargada de transportar enfermos o heridos en camilla'
        ]);
        DB::table('cargo')->insert([
            'nombre'=>'Chofer',
        ]);
        
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Administrador',
            'url'=>'admin/',
            'orden'=>1,
            'icono'=>'fa-plus'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Clínica',
            'url'=>'admin/clinica/#',
            'orden'=>2,
            'icono'=>'fa-plus'
        ]);
                
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Menú',
            'url'=>'admin/menu/#',
            'orden'=>3,
            'icono'=>'fa-list'
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
            'nombre'=>'Atención',
            'url'=>'admin/ficha/#',
            'orden'=>8,
            'icono'=>'fa-book'
        ]);      
                //Hijos
                DB::table('menu')->insert([
                    'menu_id'=>2,
                    'nombre'=>'Ver Clínica',
                    'url'=>'admin/clinica',
                    'orden'=>1,
                    'icono'=>'fa-asterisk'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>2,
                    'nombre'=>'Servicios',
                    'url'=>'admin/servicio',
                    'orden'=>2,
                    'icono'=>'fa-asterisk'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>2,
                    'nombre'=>'Reportes',
                    'url'=>'admin/reportes',
                    'orden'=>3,
                    'icono'=>'fa-book'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>3,
                    'nombre'=>'Ver Menú',
                    'url'=>'admin/menu',
                    'orden'=>1,
                    'icono'=>'fa-th'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>3,
                    'nombre'=>'Menú-Rol',
                    'url'=>'admin/menu-rol',
                    'orden'=>2,
                    'icono'=>'fa-list'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>4,
                    'nombre'=>'Ver Rol',
                    'url'=>'admin/rol',
                    'orden'=>1,
                    'icono'=>'fa-list'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>4,
                    'nombre'=>'Ver Usuarios',
                    'url'=>'admin/usuario',
                    'orden'=>2,
                    'icono'=>'fa-user'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>4,
                    'nombre'=>'Ver Usuarios con Baja',
                    'url'=>'admin/usuario_inactivo',
                    'orden'=>3,
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
                    'nombre'=>'Ver Personal',
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
                    'menu_id'=>7,
                    'nombre'=>'Ver Paciente con Baja',
                    'url'=>'admin/paciente_inactivo',
                    'orden'=>2,
                    'icono'=>'fa-user'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>8,
                    'nombre'=>'Asignar Ficha',
                    'url'=>'admin/ficha',
                    'orden'=>1,
                    'icono'=>'fa-book'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>8,
                    'nombre'=>'Consulta Externa',
                    'url'=>'admin/ficha/consulta',
                    'orden'=>2,
                    'icono'=>'fa-book'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>8,
                    'nombre'=>'Enfermeria',
                    'url'=>'admin/enfermeria',
                    'orden'=>3,
                    'icono'=>'fa-book'
                ]);
                DB::table('menu')->insert([
                    'menu_id'=>8,
                    'nombre'=>'Internación',
                    'url'=>'admin/internacion',
                    'orden'=>4,
                    'icono'=>'fa-bed'
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
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>22]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>23]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>24]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>25]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>26]);
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
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                //'t_sangre'=>$faker->randomElement(['O negativo', 'O positivo','A negativo','A positivo','B negativo','B positivo','AB negativo','AB positivo',null]),
            ]);
        }
        DB::table('paciente')->insert([
            'nombre'=>'Wilson',
            'apellido_p'=>'Uño',
            'apellido_m'=>'Ortiz',
            'ci'=>'8553148',
            'direccion'=>'Roncal #201',
            'celular'=>$faker->unique()->numberBetween($min = 10000, $max = 999999),
            'fecha_nac'=>'1900-01-01',
            'genero'=>'Hombre',
            'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            //'t_sangre'=>$faker->randomElement(['O negativo', 'O positivo','A negativo','A positivo','B negativo','B positivo','AB negativo','AB positivo',null]),
        ]);
        for($i=0;$i<500;$i++){
            DB::table('personal')->insert([
                'nombre'=>$faker->firstName,
                'apellido'=>$faker->lastName,
                'ci'=>$faker->unique()->numberBetween($min = 1000000, $max = 99999999),
                'direccion'=>$faker->city,
                'celular'=>$faker->unique()->numberBetween($min = 10000, $max = 999999),
                'fecha_ing'=>$faker->dateTimeBetween($startDate = '-20 years', $endDate = 'now'),
                'cargo_id'=>$faker->numberBetween($min = 1, $max = 11),
                'unidad_id'=>$faker->numberBetween($min = 1, $max = 5),
                'genero'=>$faker->randomElement(['Hombre', 'Mujer'])
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
            'descripcion'=>'La sala de corta estancia ofrece el servicio en un ambiente agradable, con infraestructura acorde a la complejidad del problema, también brinda al usuario atención y prevención.',
            'cama'=>'[{"estado":"0"},{"estado":"0"},{"estado":"0"}]'
        ]);
        DB::table('servicio')->insert([
            'nombre'=>'Ginecologia',
            'descripcion'=>'Disminuir los riesgos de enfermedad y muerte de la mujer y del producto del embarazo y optimizar el pronóstico de los mismos a través de la oportuna y adecuada atención intrahospitalaria del parto.'
        ]);
    }
}
