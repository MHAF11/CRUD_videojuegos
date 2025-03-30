@extends('layout')

@section('title')
    - Listado
@endsection
@section('body')
@if($msj = Session::get('success'))
    <div class="row" id="alerta">
        <div class="col-md-4 offset-md-4">
            <div class="alert alert-success">
                <p><i class="fa-solid fa-check"></i>{{$msj}}</p>
            </div>
        </div>
    </div>
@endif
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>NIVELES</th>
                            <th>LANZAMIENTO</th>
                            <th>IMAGEN</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($games as $i => $row)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->levels}}</td>
                            <td>{{$row->release}}</td>
                            <td>
                                <img class="img-fluid" width="120" src="/storage/{{ $row->image }}">
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('games.edit', $row->id)}}">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form id="frm_{{$row->id}}" method="POST" action="{{route('games.destroy',$row->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button data-bs-toggle="modal" data-bs-target="#modalConfirmacion" 
                                    onclick="setInfo({{$row->id}},'{{$row->name}}')"
                                    type="button" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modalConfirmacion">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">¿Seguro de eliminar?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="fa-solid fa-warning fs-3 text-warning"></i>
            <label id="lbl_nombre"></label>
      </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"
         data-bs-dismiss="modal">Cancelar</button>
        <button id="btnEliminar" type="button" class="btn btn-success">Si, Eliminar</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
    @vite('resources/js/Games/index.js')
@endsection