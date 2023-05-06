<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-10">

            <!-- tombol tambah menu terhubung dengan modal-->
            <a class="btn btn-primary mb-3" href="<?php echo base_url(); ?>admin/tambah_user">Tambah Data User</a>

            <?php if (empty($kelolaUser)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data tidak ditemukan
                </div>
            <?php endif ?>

            <!-- flashdata message -->
            <?php echo $this->session->flashdata('message'); ?>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal dibuat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($kelolaUser as $ku) : ?>
                        <tr>
                            <!-- tidak urut sesuai table mysql, tidak apa2 -->
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $ku['name']; ?></td>
                            <td><?php echo $ku['email']; ?></td>
                            <td><?php if ($ku['is_active'] == 1) {
                                    echo "<span class='badge-success'>Aktif</span>";
                                } else {
                                    echo "<span class='badge-danger'>Tidak Aktif</span>";
                                } ?></td>
                            <td><?php echo date('d F Y', $ku['date_created']); ?></td>
                            <td>
                                <a class="badge badge-warning" href="<?php echo base_url(); ?>admin/change_status_user/<?php echo $ku['id'] . '/' . $ku['is_active']; ?>" onclick="return confirm('Status user akan diganti, yakin?');">ubah status</a>
                                <a class="badge badge-danger" href="<?php echo base_url(); ?>admin/delete_user/<?php echo $ku['id'] ?>" onclick="return confirm('User akan dihapus, yakin?');">delete</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->