<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionMenu;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::getMenu();
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.crear');
    }

    public function store(ValidacionMenu $request)
    {
        //dd($request->all()); 
        Menu::create($request->all());
        return redirect('admin/menu')->with('mensaje', 'Menú creado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data=Menu::findOrfail($id);
        return view('admin.menu.editar', compact('data'));
    }

    public function update(ValidacionMenu $request, $id)
    {
        Menu::findOrFail($id)->update($request->all());
        return redirect('admin/menu')->with('mensaje', 'Menú actualizado con exito');
    }

    public function destroy($id)
    {
        $hijos = Menu::where([
            ['menu_id','=',$id]
        ])->count();
        if($hijos==0){
            Menu::destroy($id);
            return redirect('admin/menu')->with('mensaje', 'El Menú fue eliminado con exito');
        }           
        return redirect('admin/menu')->with('mensajeerror', 'El Menú no puede ser eliminado, porque tiene Sub-Menús');
    }
    //funcion para guardar los menus
    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
