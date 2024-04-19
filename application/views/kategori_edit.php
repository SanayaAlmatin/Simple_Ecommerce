<div class="container min-vh-100">
    <h5>Edit Kategori</h5>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="<?php echo $kategori['nama_kategori'] ?>">
        </div>
        <div class="mb-3">
            <label class="mb-3">Foto Kategori Lama</label>
            <br>
            <img src="<?php echo base_url("assets/kategori/" .$kategori['foto_kategori']) ?>" alt="Fotor Kategori Lama" width="100">
        </div>
        <div class="mb-3">
            <label>Foto Kategori Baru</label>
            <input type="file" name="foto_kategori" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>