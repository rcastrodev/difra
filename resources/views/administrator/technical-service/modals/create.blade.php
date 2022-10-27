<div class="modal fade" id="modal-create-element">
    <form action="{{ route('technical-service.content.generic-section.store') }}" method="post" class="modal-dialog" data-info="reset" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="section_id" value="7">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
            </div>
            <div class="form-group">
                <input type="text" name="content_1" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="content_2" class="ckeditor"></textarea>
            </div>
            <div class="form-group">
                <label for="">Icono <small>debe ser 53x53</small></label>
                <input type="file" name="image" class="form-control-file">
            </div>    
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>