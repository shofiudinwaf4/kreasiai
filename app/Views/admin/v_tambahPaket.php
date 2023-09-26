 <section id="basic-vertical-layouts">
     <div class="row match-height">
         <div class="col-md-12 col-12">
             <div class="card">
                 <div class="card-content">
                     <div class="card-body">
                         <form class="form form-vertical" action="<?= base_url('admin/savePaket/' . $getlayanan['slug_nama']) ?>" method="post" enctype="multipart/form-data">
                             <div class="form-body">
                                 <div class="row">
                                     <div class="col-12">
                                         <div class="form-group">
                                             <label for="first-name-vertical">Nama Layanan</label>
                                             <label class="form-control"><?= $getlayanan['nama_layanan']; ?></label>
                                             <input type="text" id="first-name-vertical" class="form-control" name="nama_layanan" placeholder="Nama Layanan" value="<?= $getlayanan['layanan_id']; ?>" hidden>
                                         </div>
                                         <div class="form-group">
                                             <label for="first-name-vertical">Nama Paket</label>
                                             <input type="text" id="first-name-vertical" class="form-control <?= ($validation->hasError('nama_paket')) ? 'is-invalid' : ""; ?>" name="nama_paket" placeholder="Nama Paket" value="<?= old('nama_paket'); ?>">
                                             <div class="invalid-feedback">
                                                 <i class="bx bx-radio-circle"></i>
                                                 <?= $validation->getError('nama_paket'); ?>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="first-name-vertical">Harga Paket</label>
                                             <div class="input-group">
                                                 <span class="input-group-text">Rp.</span>
                                                 <input type="text" id="first-name-vertical" class="form-control <?= ($validation->hasError('nama_paket')) ? 'is-invalid' : ""; ?>" name="harga_paket" placeholder="Harga Paket" value="<?= old('harga_paket'); ?>">
                                                 <div class="invalid-feedback">
                                                     <i class="bx bx-radio-circle"></i>
                                                     <?= $validation->getError('Harga_paket'); ?>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="first-name-vertical">Potongan Harga</label>
                                             <div class="input-group">
                                                 <span class="input-group-text">Rp.</span>
                                                 <input type="text" id="first-name-vertical" class="form-control <?= ($validation->hasError('potongan_paket')) ? 'is-invalid' : ""; ?>" name="potongan_paket" placeholder="Potongan Harga" value="<?= old('potongan_paket'); ?>">
                                                 <div class="invalid-feedback">
                                                     <i class="bx bx-radio-circle"></i>
                                                     <?= $validation->getError('potongan_paket'); ?>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="form-group mb-3">
                                             <label for="exampleFormControlTextarea1" class="form-label">Detail Paket</label>
                                             <textarea class="form-control" id="summernote" rows="3" name="detail_paket"><?= old('detail_paket'); ?></textarea>
                                             <div class="invalid-feedback">
                                                 <?= $validation->getError('detail_paket'); ?>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-12 d-flex justify-content-end">
                                         <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                         <a href="<?= base_url('admin/daftarLayanan/' . $getlayanan['slug_nama']); ?>" class="btn btn-success me-1 mb-1">Kembali</a>
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
     //  $(function() {
     //      // Summernote
     //      $('#summernote').summernote({
     //          height: 200,
     //      })
     //      // CodeMirror
     //      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
     //          mode: "htmlmixed",
     //          theme: "monokai"
     //      });
     //  })
     $('#summernote').summernote({
         height: 200,
         toolbar: [
             // [groupName, [list of button]]
             ['style', ['bold', 'italic', 'underline', 'clear']],
             ['font', ['strikethrough', 'superscript', 'subscript']],
             ['fontsize', ['fontsize']],
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']],
             ['height', ['height']]
         ]
     })
     // CodeMirror
     CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
         mode: "htmlmixed",
         theme: "monokai"
     });
 </script>