<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sucursale;
use App\Http\Controllers\UserController;

class SucursalController extends Controller
{

  public function index() {
    return view('pages.sucursales');
  }

    public function getAll() {
        return Sucursale::all();
    }

    public function create(Request $request){

        // inserta los datos
        Sucursale::insert([
          'nombre' => $request->input('nombre'),
          'direccion' => $request->input('direccion'),
          'telefono' => $request->input('telefono'),
        ]);
        
        // respuesta JSON
        $response['message'] = "Guardo exitosamente";
        $response['success'] = true;
  
        return $response;
      }

      public function update(Request $request, Sucursale $sucursal){

        $sucursal->Nombre = $request->nombre;
        $sucursal->Direccion = $request->direccion;
        $sucursal->Telefono = $request->telefono;
        $sucursal->save();
  
        // respesta JSON
        $response['message'] = "Actualizo exitosamente";
        $response['success'] = true;
  
        return $response;
  
      }

      public function delete($id){
        // Eliminar
        Sucursale::where('Cv_Sucursal', $id)->delete();
        // respesta JSON
        $response['message'] = "Elimino exitosamente";
        $response['success'] = true;
  
        return $response;
      }
}
