<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use PhpParser\Node\Expr\Cast\Array_;

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
                

        DB::table('menu')->insert([  //5
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
                
        DB::table('menu')->insert([ //7
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
                DB::table('menu')->insert([   //17
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
                DB::table('menu')->insert([   //21
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
                    'nombre'=>'Agendación y Fichaje',
                    'url'=>'admin/fichaje',
                    'orden'=>1,
                    'icono'=>'fa-calendar'
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
        DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>7]);
        DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>21]);
        DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>22]);
        DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>8]);
        DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>24]);
        DB::table('menu_rol')->insert(['rol_id'=>2,'menu_id'=>26]);
        DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>7]);
        DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>21]);
        DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>22]);
        DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>8]);
        DB::table('menu_rol')->insert(['rol_id'=>3,'menu_id'=>25]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>5]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>17]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>6]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>18]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>19]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>20]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>7]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>21]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>22]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>8]);
        DB::table('menu_rol')->insert(['rol_id'=>4,'menu_id'=>23]);
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
        $cama=array();
        for($i=0;$i<3;$i++){
            $cama[$i]['orden']=$i+1;
            $cama[$i]["estado"]='libre';
        }
        $cama=json_encode($cama);
        DB::table('servicio')->insert([
            'nombre'=>'Internaciones',
            'descripcion'=>'La sala de corta estancia ofrece el servicio en un ambiente agradable, con infraestructura acorde a la complejidad del problema, también brinda al usuario atención y prevención.',
            'cama'=>'[{"orden":1,"estado":"ocupado"},{"orden":2,"estado":"libre"},{"orden":3,"estado":"libre"}]'
        ]);
        DB::table('servicio')->insert([
            'nombre'=>'Ginecologia',
            'descripcion'=>'Disminuir los riesgos de enfermedad y muerte de la mujer y del producto del embarazo y optimizar el pronóstico de los mismos a través de la oportuna y adecuada atención intrahospitalaria del parto.'
        ]);

        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-16 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-16 08:00:00',
            'end'=>'2021-06-16 12:00:00',
            'intervalo'=>30,
            'num_consultas'=>8,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"ocupado"},{"orden":8,"hora":"11:30","estado":"libre"}]'
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-17 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-17 08:00:00',
            'end'=>'2021-06-17 12:00:00',
            'intervalo'=>30,
            'num_consultas'=>8,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"ocupado"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"}]'
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-18 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-18 08:00:00',
            'end'=>'2021-06-18 12:00:00',
            'intervalo'=>30,
            'num_consultas'=>8,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"ocupado"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"ocupado"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"}]'
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-21 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-21 08:00:00',
            'end'=>'2021-06-21 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>20,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"},{"orden":9,"hora":"12:00","estado":"libre"},{"orden":10,"hora":"12:30","estado":"libre"},{"orden":11,"hora":"13:00","estado":"libre"},{"orden":12,"hora":"13:30","estado":"libre"},{"orden":13,"hora":"14:00","estado":"ocupado"},{"orden":14,"hora":"14:30","estado":"ocupado"},{"orden":15,"hora":"15:00","estado":"libre"},{"orden":16,"hora":"15:30","estado":"ocupado"},{"orden":17,"hora":"16:00","estado":"ocupado"},{"orden":18,"hora":"16:30","estado":"libre"},{"orden":19,"hora":"17:00","estado":"libre"},{"orden":20,"hora":"17:30","estado":"libre"}]',
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-22 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-22 08:00:00',
            'end'=>'2021-06-22 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>20,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"ocupado"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"},{"orden":9,"hora":"12:00","estado":"libre"},{"orden":10,"hora":"12:30","estado":"libre"},{"orden":11,"hora":"13:00","estado":"libre"},{"orden":12,"hora":"13:30","estado":"libre"},{"orden":13,"hora":"14:00","estado":"libre"},{"orden":14,"hora":"14:30","estado":"ocupado"},{"orden":15,"hora":"15:00","estado":"libre"},{"orden":16,"hora":"15:30","estado":"libre"},{"orden":17,"hora":"16:00","estado":"libre"},{"orden":18,"hora":"16:30","estado":"libre"},{"orden":19,"hora":"17:00","estado":"libre"},{"orden":20,"hora":"17:30","estado":"libre"}]'
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-23 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-23 08:00:00',
            'end'=>'2021-06-23 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>20,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"},{"orden":9,"hora":"12:00","estado":"libre"},{"orden":10,"hora":"12:30","estado":"libre"},{"orden":11,"hora":"13:00","estado":"libre"},{"orden":12,"hora":"13:30","estado":"libre"},{"orden":13,"hora":"14:00","estado":"libre"},{"orden":14,"hora":"14:30","estado":"libre"},{"orden":15,"hora":"15:00","estado":"libre"},{"orden":16,"hora":"15:30","estado":"libre"},{"orden":17,"hora":"16:00","estado":"libre"},{"orden":18,"hora":"16:30","estado":"libre"},{"orden":19,"hora":"17:00","estado":"libre"},{"orden":20,"hora":"17:30","estado":"libre"}]',
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-24 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-24 08:00:00',
            'end'=>'2021-06-24 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>20,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"},{"orden":9,"hora":"12:00","estado":"libre"},{"orden":10,"hora":"12:30","estado":"libre"},{"orden":11,"hora":"13:00","estado":"libre"},{"orden":12,"hora":"13:30","estado":"libre"},{"orden":13,"hora":"14:00","estado":"libre"},{"orden":14,"hora":"14:30","estado":"libre"},{"orden":15,"hora":"15:00","estado":"libre"},{"orden":16,"hora":"15:30","estado":"libre"},{"orden":17,"hora":"16:00","estado":"libre"},{"orden":18,"hora":"16:30","estado":"libre"},{"orden":19,"hora":"17:00","estado":"libre"},{"orden":20,"hora":"17:30","estado":"libre"}]',
        ]);
        DB::table('calendario_consulta')->insert([
            'fecha'=>'2021-06-25 00:00:00',
            'title'=>'Día Hábil',
            'color'=>'green',
            'textColor'=>'white',
            'start'=>'2021-06-25 08:00:00',
            'end'=>'2021-06-25 18:00:00',
            'intervalo'=>30,
            'num_consultas'=>20,
            'horario'=>'[{"orden":1,"hora":"08:00","estado":"libre"},{"orden":2,"hora":"08:30","estado":"libre"},{"orden":3,"hora":"09:00","estado":"libre"},{"orden":4,"hora":"09:30","estado":"libre"},{"orden":5,"hora":"10:00","estado":"libre"},{"orden":6,"hora":"10:30","estado":"libre"},{"orden":7,"hora":"11:00","estado":"libre"},{"orden":8,"hora":"11:30","estado":"libre"},{"orden":9,"hora":"12:00","estado":"libre"},{"orden":10,"hora":"12:30","estado":"libre"},{"orden":11,"hora":"13:00","estado":"libre"},{"orden":12,"hora":"13:30","estado":"libre"},{"orden":13,"hora":"14:00","estado":"libre"},{"orden":14,"hora":"14:30","estado":"libre"},{"orden":15,"hora":"15:00","estado":"libre"},{"orden":16,"hora":"15:30","estado":"libre"},{"orden":17,"hora":"16:00","estado":"libre"},{"orden":18,"hora":"16:30","estado":"libre"},{"orden":19,"hora":"17:00","estado":"libre"},{"orden":20,"hora":"17:30","estado":"libre"}]',
        ]);
        DB::table('ficha')->insert(['paciente_id'=>1001,'servicio_id'=>1,'fecha'=>'2021-06-16','hora'=>'11:00:00','estado'=>1,'turno'=>7]);
        DB::table('ficha')->insert(['paciente_id'=>13,'servicio_id'=>1,'fecha'=>'2021-06-17','hora'=>'09:30:00','estado'=>1,'turno'=>4]);
        DB::table('ficha')->insert(['paciente_id'=>490,'servicio_id'=>1,'fecha'=>'2021-06-18','hora'=>'08:00:00','estado'=>1,'turno'=>1]);
        DB::table('ficha')->insert(['paciente_id'=>99,'servicio_id'=>1,'fecha'=>'2021-06-18','hora'=>'09:30:00','estado'=>0,'turno'=>4]);
        DB::table('consulta')->insert([
            'ficha_id'=>1,
            'motivo'=>'cansancio y fatiga muscular',
            'sintoma'=>"dolor de garganta \nojos llorosos",
            'diagnostico'=>'resfrió común',
            'doctor'=>'Dr. Wilson Uño'
        ]);
        DB::table('signos_vitales')->insert([
            'consulta_id'=>1, 'paciente_id'=>1001, 'altura'=>163, 'peso'=>60, 'temperatura'=>36, 'p_a'=>'120/80','f_c'=>60, 'f_r'=>12,'estado'=>1
        ]);
        DB::table('receta')->insert([
            'consulta_id'=>1,
            'receta'=>"-->  24 Unids    de:  ibuprofeno   TOMAR:  1  CADA:   8  Horas    Durante:  3  Días \n-->  6 Unids    de:  paracetramol   TOMAR:  1  CADA:   12  Horas    Durante:  3  Días",
            'indicacion'=>'ninguna'
        ]);
        DB::table('consulta')->insert([
            'ficha_id'=>2,
            'motivo'=>'caida 2do piso',
            'sintoma'=>"dolor de espalda y pies",
            'diagnostico'=>'multiples contusiones',
            'doctor'=>'Dr. Wilson Uño'
        ]);
        DB::table('signos_vitales')->insert([
            'consulta_id'=>2, 'paciente_id'=>13, 'altura'=>160, 'peso'=>58, 'temperatura'=>36, 'p_a'=>'120/80','f_c'=>60, 'f_r'=>12,'estado'=>1
        ]);
        DB::table('gabinete')->insert([
            'consulta_id'=>2,
            'estudio_g'=>"--> Radiografia torax \n--> ultrasonido",
            'indicacion_g'=>'ninguna'
        ]);
        DB::table('internacion')->insert([
            'consulta_id'=>2,
            'paciente_id'=>13,
            'cama'=>1,
            'fecha_ingreso'=>'2021-06-17',
            'motivo_i'=>"seguimiento posibles contusiones",
            'e_fisico'=>'S/P',
            'craneo_cara'=>'S/P',
            'cuello_tiroides'=>'S/P',
            'torax'=>'inflamación lumbar',
            'genitales'=>'S/P',
            'columna'=>'dolores en piernas',
            'e_neurologico'=>'S/P',
            'impresion_d'=>"1.-\n2.-\n3.-",
            'conducta'=>'S/P',
            'estado'=>0,
        ]);
        DB::table('consulta')->insert([
            'ficha_id'=>3,
            'motivo'=>'cansancio y fatiga muscular',
            'sintoma'=>"dolor de garganta \nojos llorosos",
            'diagnostico'=>'resfrió común',
            'doctor'=>'Dr. Wilson Uño'
        ]);
        DB::table('signos_vitales')->insert([
            'consulta_id'=>3, 'paciente_id'=>490, 'altura'=>173, 'peso'=>70, 'temperatura'=>36, 'p_a'=>'120/80','f_c'=>60, 'f_r'=>12,'estado'=>1
        ]);

        $faker=Faker::create();
        for($i=0;$i<20;$i++){  //20 curaciones
            $fecha=$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');
            $fecha=$fecha->format('Y-m-d');
            DB::table('enfermeria')->insert([
                'fecha'=>$fecha,
                'paciente_id'=>$faker->unique()->numberBetween($min = 1, $max = 100),
                'detalles_c'=>$faker->randomElement(['Cambio de vendas', 'Limpieza de herida','Costura menor','Retiro de vendas', 'curación menor']),
                'atencion_c'=>1,
            ]);
            $fecha=$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');
            $fecha=$fecha->format('Y-m-d');
            DB::table('enfermeria')->insert([ //20 inyectables
                'fecha'=>$fecha,
                'paciente_id'=>$faker->unique()->numberBetween($min = 1, $max = 100),
                'tipo_i'=>$faker->randomElement(['intramuscular', 'intravenosa','intradermica','subcutanea']),
                'medicamento_i'=>$faker->randomElement(['Lidocaina', 'Naloxona','Neptisol','Omeprezol','cloruro potasico','salbutamol','diamina']),
                'atencion_i'=>1,
            ]);
        }
        for($i=0;$i<10;$i++){ 
            $fecha=$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');
            $fecha=$fecha->format('Y-m-d');
            DB::table('enfermeria')->insert([ //10 curaciones con inyectable
                'fecha'=>$fecha,
                'paciente_id'=>$faker->unique()->numberBetween($min = 1, $max = 100),
                'detalles_c'=>$faker->randomElement(['Cambio de vendas', 'Limpieza de herida','Costura menor','Retiro de vendas', 'curación menor']),
                'atencion_c'=>1,
                'tipo_i'=>$faker->randomElement(['intramuscular', 'intravenosa','intradermica','subcutanea']),
                'medicamento_i'=>$faker->randomElement(['Lidocaina', 'Naloxona','Neptisol','Omeprezol','cloruro potasico','salbutamol','diamina']),
                'atencion_i'=>1,
            ]);
        }
        for($i=0;$i<5;$i++){ 
            $fecha=$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');
            $fecha=$fecha->format('Y-m-d');
            DB::table('enfermeria')->insert([ //5sueros
                'fecha'=>$fecha,
                'paciente_id'=>$faker->unique()->numberBetween($min = 1, $max = 100),
                'tipo_s'=>$faker->randomElement(['solucion salina normal', 'solucion salina hipotonica','suero glucosalino','solucion de ringer con lactato']),
                'atencion_s'=>1,
            ]);
        }
            DB::table('ficha')->insert(['paciente_id'=>85,'servicio_id'=>1,'fecha'=>'2021-06-21','hora'=>'14:00:00','estado'=>0,'turno'=>13]);
            DB::table('ficha')->insert(['paciente_id'=>53,'servicio_id'=>1,'fecha'=>'2021-06-21','hora'=>'14:30:00','estado'=>0,'turno'=>14]);
            DB::table('ficha')->insert(['paciente_id'=>148,'servicio_id'=>1,'fecha'=>'2021-06-21','hora'=>'15:30:00','estado'=>0,'turno'=>16]);
            DB::table('ficha')->insert(['paciente_id'=>1,'servicio_id'=>1,'fecha'=>'2021-06-21','hora'=>'16:00:00','estado'=>0,'turno'=>17]);

            DB::table('ficha')->insert(['paciente_id'=>86,'servicio_id'=>1,'fecha'=>'2021-06-22','hora'=>'10:00:00','estado'=>0,'turno'=>5]);
            DB::table('ficha')->insert(['paciente_id'=>54,'servicio_id'=>1,'fecha'=>'2021-06-22','hora'=>'14:30:00','estado'=>0,'turno'=>14]);
            DB::table('ficha')->insert(['paciente_id'=>149,'servicio_id'=>1,'fecha'=>'2021-06-22','hora'=>'15:30:00','estado'=>0,'turno'=>16]);
    }
}
