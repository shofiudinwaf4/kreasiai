 <div class="col-md-6">
     <!-- general form elements -->
     <div class="card card-primary">
         <!-- /.card-header -->
         <!-- form start -->
         <!-- form_open_multipart(base_url('Admin/Layanan/Save'))  -->
         <?= $validation->listErrors() ?>
         <form role="form" class="form form-vertical" action="<?= base_url('admin/saveLayanan') ?>" method="post" enctype="multipart/form-data">
             <div class="card-body">
                 <div class="form-group">
                     <label> Nama Layanan</label>
                     <input type="text" name="nama_layanan" class="form-control <?= ($validation->hasError('nama_layanan')) ? 'is-invalid' : ""; ?>" placeholder="Nama Layanan" autofocus>
                     <div class="invalid-feedback">
                         <?= $validation->getError('nama_layanan'); ?>
                     </div>
                 </div>
                 <div class="form-group">
                     <label>Deskripsi Layanan</label>
                     <textarea id="editor" name="deskripsi_layanan" class="form-control" placeholder="Deskripsi Layanan" cols="30" rows="5"><?= old('deskripsi_layanan'); ?></textarea>
                 </div>

             </div>
             <!-- /.card-body -->

             <div class="card-footer">
                 <button type="submit" class="btn btn-primary">Tambah</button>
             </div>
         </form>
     </div>
 </div>
 <!-- /.card -->
 <script>
     $(function() {
         // Summernote
         $('#summernote').summernote({
             height: 200,
         })

         // CodeMirror
         CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
             mode: "htmlmixed",
             theme: "monokai"
         });
     })
 </script>