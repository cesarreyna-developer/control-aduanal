<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transportistas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl uppercase font-bold">mis transportistas</h2>
                </div>

                <div class="p-6">
                    <a href="{{route('tps.create')}}">
                        <x-primary-button>
                            {{ __('Agregar transportista') }}
                        </x-primary-button>
                    </a>
                </div>

                <div class="p-6">
                    <table class="table table-striped uppercase" id="tps">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tps as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->nombre}}</td>
                                <td>
                                    <div class="flex gap-2">
                                        <a href="{{route('tps.edit',$row->id)}}">
                                            <button class="btn btn-warning"><i
                                                    class="bi bi-pencil-square"></i>Editar</button>
                                        </a>

                                        <form action="{{route('tps.destroy',$row->id)}}" class="delete"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"><i class="bi bi-trash3"></i>Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

             
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('delete') =='ok' )
<script>
    Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
</script>
@endif

<script>
$('.delete').submit(function (event){
event.preventDefault();

Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        this.submit();
    }
    })

})
        
</script>
<script>
    $('#tps').DataTable();
</script>