<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Consulta;
use App\Models\Admin\Ficha;
use App\Models\Admin\Paciente;
use App\Models\Admin\Personal;
use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function index()
    {
        $fecha_actual = new \DateTime();
        $fecha=$fecha_actual->format('Y-m-d'); 
        $per=Personal::where('estado',1)->count();
        $pac=Paciente::count();
        $con=Consulta::count();
        $ficha=Ficha::where('fecha',$fecha)->count();
        return view('welcome', compact('per','pac','con','ficha'));
    }

}
