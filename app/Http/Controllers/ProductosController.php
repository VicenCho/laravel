<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function insertandoproducto($mensaje = null)
    {
        return view('producto.insertproducto', compact('mensaje'));
    }
    public function buscandoproducto($mensaje = null, $producto = null)
    {
        if ($producto == null) {
            $producto = DB::table('tbl_productos')->get(); // Obtener todos los productos
        }
        return view('producto.searchproducto', compact('mensaje', 'producto'));
    }

    public function InsertProducto(Request $request)
    {
        //echo "entre";
        $rules = [
            'name' => 'required|string|min:5',
            'CantPro' => 'required|int',
            'CatePro' => 'required|string|min:5',
            'PrecPro' => 'required|int',
        ];
        $messages = [
            'required' => 'El nombre del producto es requerido',
            'string' => 'El nombre del producto debe ser un texto',
            'min' => 'El nombre del producto debe tener al menos 1',
            'int' => 'el precio del producto debe ser numerico',
            'boolean' => 'El numero debe ser entero'
        ];
        $this->validate($request, $rules, $messages);
        if ($this->buscar($request->name == 0)) {
            DB::table('tbl_productos')->insert([
                'VCH_NOMBRE_PRODUCTO' => $request->name,
                'INT_PRECIO_PRODUCTO' => $request->PrecPro,
                'INT_CANTIDAD_PRODUCTO' => $request->CantPro,
                'VCH_CATEGORIA_PRODUCTO' => $request->CatePro,
            ]);
            return redirect()->route('loginsuccess')->with('success', 'Producto registrado correctamente');
        } else {
            return redirect()->route('insertandoproducto')->with('error', 'El producto ya existe');
        }
    }

    public function buscar($nom)
    {
        $argumentos = ["VCH_NOMBRE_PRODUCTO"];
        $producto = DB::table('tbl_productos')
            ->where($argumentos[0], 'LIKE', "%" . $nom . "%")->get();
        if ($producto <> null) {
            return 1;
        } else {
            return 0;
        }
    }

    public function SearchProducto(Request $request)
    {
        $rules = [
            'name' => 'required|string'
        ];
        $messages = [
            'required' => 'Ingrese el nombre del producto a buscar',
            'string' => 'El nombre del producto debe ser una cadena de texto'

        ];
        $this->validate($request, $rules, $messages);
        $argumentos = ["VCH_NOMBRE_PRODUCTO"];
        $producto = DB::table('tbl_productos')
            ->where($argumentos[0], 'LIKE', "%" . $request->name . "%")->get();
        return $this->buscandoproducto('busqueda realizada', $producto);
    }

    public function edit($id){
        $producto=DB::table('tbl_productos')->where("ID_PRODUCTO","=",$id)->first();
        return view('producto.Editproducto',compact('producto'));
    }

    public function update(Request $request, $id){
    $rules=[
        'VCH_NOMBRE_PRODUCTO'=>'required|string',
        'INT_PRECIO_PRODUCTO'=>'required|numeric',
        'VCH_CATEGORIA_PRODUCTO'=>'required|string',
        'INT_CANTIDAD_PRODUCTO'=>'required|numeric'
    ];
    $messages=[
        'required'=>'Campo obligatorio',
        'string'=>'Debe ingresar un valor valido para este campo',
        'numeric'=>'Solo numeros permitidos'
    ];
    $this->validate($request,$rules,$messages);
    $update = DB::table('tbl_productos')->where('ID_PRODUCTO','=', $id)->update($request->except(['_token','_method']));
    return redirect()->route('buscandoproducto');
    }

    public function show($id){
        $producto=DB::table('tbl_productos')->where("ID_PRODUCTO","=",$id)->first();
        return view('producto.Deleteproducto',compact('producto'));
    }

    public function destroy($id){
        $id=DB::table('tbl_productos')->where('ID_PRODUCTO','=', $id)->delete();
        return redirect()->route('buscandoproducto');
    }
}
