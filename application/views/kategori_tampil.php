<div class="container min-vh-100">
        <h5>Data Kategori</h5>
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Opsi</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $key => $value): ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $value['nama_kategori']; ?></td>
                    <td>
                        <img src="<?php echo base_url("assets/kategori/".$value["foto_kategori"]) ?>" alt="Foto Kategori" width="200">
                    </td>
                    <td>
                        <a href="<?php echo base_url("kategori/edit/" .$value["id_kategori"]) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url("kategori/hapus/".$value["id_kategori"]) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a href="<?php echo base_url('kategori/tambah') ?>" class="btn btn-primary">Tambah Data</a>
    </div>