<div class="">
    
    @if(session('info'))
    <div class="alert alert-success" role="alert">
        <strong> {{session('info')}} </strong>
    </div>
    @endif()


    <div class="card bg-light">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" type="text" class="form-control w-100" placeholder="Escriba un nombre">
            <br>
            <a href="{{route('admin.users.create')}}" class="btn btn-info"><i class="fas fa-user-plus"></i> Crear Usuario</a>
        </div>
        
        @if($users->count()>0)
            <div class="card-body">
                <table class="table table-striped table-responsive-sm table-bordered ">
                    <thead class="bg-primary">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="inline-block " width="10px" colspan="2"><a class="btn btn-success" href="{{ route('admin.users.edit',$user)}}" >Editar</a></td>
                                <!-- <td class="inline-block " width="10px">                                
                                    <form action="{{route('admin.users.destroy',$user)}}" method="POST">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                    
                                </td>-->
                            </tr>
                        @empty
                            <tr>
                                <td colspn="4">No hay Usuarios Registrados</td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer text-muted br-dark">
                {{$users->links()}} 
            </div>
        @else 
            <div class="alert alert-warning inline-flex w-50" role="alert">
                <p><i class="text-danger fas fa-exclamation-triangle"></i> Usuario "{{$this->search}}" no se encontró</p>
            </div>
        @endif
    </div>
</div>
