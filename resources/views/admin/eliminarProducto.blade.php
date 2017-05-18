<form action="{{url('eliminarProducto')}}/{{$p->id_producto}}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">¿Deseas eliminar el producto?</h4>
      </div>
      <div class="modal-body">
        ¡No se podrá recuperar el registro!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>
