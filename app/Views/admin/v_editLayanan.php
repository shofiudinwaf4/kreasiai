 <section id="basic-vertical-layouts">
     <div class="row match-height">
         <div class="col-md-12 col-12">
             <div class="card">
                 <div class="card-content">
                     <div class="card-body">
                         <form class="form form-vertical" action="<?= base_url('admin/updateLayanan/' . $getlayanan['layanan_id']); ?>" method="post" enctype="multipart/form-data">
                             <div class="form-body">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="form-group">
                                             <label for="first-name-vertical">Nama Layanan</label>
                                             <input type="text" id="first-name-vertical" class="form-control" name="nama_layanan" placeholder="Nama Layanan" value="<?= $getlayanan['nama_layanan']; ?>">
                                             <p class="text-danger">
                                                 <?= $validation->getError('nama_layanan'); ?></p>
                                         </div>
                                         <div class="form-group mb-3">
                                             <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Layanan</label>
                                             <textarea class="form-control" id="summernote" rows="3" name="deskripsi_layanan"><?= $getlayanan['deskripsi_layanan']; ?></textarea>
                                             <p class="text-danger"><?= $validation->getError('deskripsi_layanan'); ?></p>
                                         </div>
                                     </div>
                                     <div class="col-12 d-flex justify-content-end">
                                         <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                         <a href="<?= base_url('admin/layanan'); ?>" class="btn btn-success me-1 mb-1">Kembali</a>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
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