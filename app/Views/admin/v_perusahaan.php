<div class="col-md-12">
    <div class="card card-outline card-info">
        <!-- <div class="card-header">
            <h3 class="card-title">
                Summernote
            </h3>
        </div> -->
        <?php session();
        $validasi = \Config\Services::validation();
        ?>
        <?php echo form_open_multipart('admin/updateperusahaan') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->get('pesan')) {
                echo '<div Class="alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <div class="form-group">
                <label>Nama Perusahaan</label>
                <input name="nama_perusahaan" class="form-control" value="<?= $perusahaan['nama_perusahaan'] ?>"> </input>
                <p class="text-danger">
                    <?= $validasi->getError('nama_perusahaan'); ?></p>
            </div>
            <div class="form-group">
                <label>Alamat Perusahaan</label>
                <input name="alamat_perusahaan" class="form-control" placeholder="Alamat Perusahaan" value="<?= $perusahaan['alamat_perusahaan'] ?>"> </input>
                <p class="text-danger">
                    <?= $validasi->getError('alamat_perusahaan'); ?></p>
            </div>
            <div class="form-group">
                <label>Tentang Kami</label>
                <textarea name="tentang_Kami" id="summernote" class="form-control" width="1000px"><?= $perusahaan['tentang_kami'] ?></textarea>
                <p class="text-danger"><?= $validasi->getError('tentang_kami'); ?></p>
            </div>
            <div class="row">
                <div class="form-group">
                    <img src="<?= base_url('img/' . $perusahaan['logo_header']); ?>" width="25%">
                </div>
                <div class="form-group">
                    <label>Ganti Logo Header</label>
                    <input type="file" accept=".png" name="logo_header" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('logo_header'); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <img src="<?= base_url('img/' . $perusahaan['logo']); ?>" width="50%">
                </div>
                <div class="form-group">
                    <label>Ganti Logo</label>
                    <input type="file" accept=".png" name="logo" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('logo'); ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <a href="<?= base_url('admin/perusahaan'); ?>" class="btn btn-success btn-flat">Kembali</a>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.col-->

<!-- js summernote -->
<script>
    $(function() {
        // Summernote
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
    })
</script>
<script>
    $(function() {
        // Summernote
        $('#summernote1').summernote({
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
    })
</script>