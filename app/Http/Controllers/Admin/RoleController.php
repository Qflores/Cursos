<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('can:Listar role')->only('index');
        $this->middleware('can:Crear role')->only('create','store');
        $this->middleware('can:Editar role')->only('edit','update');
        $this->middleware('can:Eliminar role')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperar la lsiat de roles
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','min:5','max:20'],
            'permissions' => 'required'

        ]);

        $role = Role::where('name',$request->name)->get()->take(1);
        
        $sms ="";
        if(!$role){
            $role = Role::create([
                'name'=>$request->name,
            ]);

            $role->permissions()->attach( $request->permissions);

            $sms ="El rol Creado con éxito";
        }else{
            $sms ="Error: el Rol ya existe";
        }
       
        // agregando los persmisos a la tabla intermedia

        //mensaje de session
        return redirect()->route('admin.roles.index')->with('info',$sms);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        
        return view('admin.roles.edit',compact('role','permissions'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $request->validate([
            'name'=>['required','min:5','max:20'],
            'permissions' => 'required'

        ]);      
        
        $role->update([
            'name'=>$request->name,
        ]);

        //con elmetodo async eliminamos los permisos asignados de rol

        $role->permissions()->sync($request->permissions);

        $permissions = Permission::all();

        return redirect()->route('admin.roles.edit',$role)->with('info','El rol se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role = Role::find($role->id)->delete();

        return redirect()->route('admin.roles.index',$role)->with('info','El rol se Eliminó  con éxito'); 

    }
}
