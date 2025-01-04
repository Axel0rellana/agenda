@extends('layouts.app')

@section('content')
<div class="container">
	<div id="agenda"></div>
</div>

<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del evento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formularioEventos" action="" method="" autocomplete="off">
          {!! csrf_field() !!}

        	<div class="form-group mb-3 d-none">
        		<input class="form-control" type="text" name="id" id="id" placeholder="ID" />
        	</div>

        	<div class="form-group mb-3">
        		<input class="form-control" type="text" name="title" id="title" placeholder="Escribe el titulo del evento" required />
        	</div>

        	<div class="form-group mb-3">
        		<textarea class="form-control" style="resize: none;" name="descripcion" id="descripcion" rows="3" placeholder="Descripción del evento" required></textarea>
        	</div>

        	<div class="form-group mb-3 d-none">
        		<input class="form-control" type="date" name="start" id="start" placeholder="Start" required />
        	</div>

        	<div class="form-group mb-3 d-none">
        		<input class="form-control" type="date" name="end" id="end" placeholder="End" required />
        	</div>
        </form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
      	<button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
      	<button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection