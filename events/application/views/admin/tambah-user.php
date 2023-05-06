<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading / fitur history halaman -->
    <h1 class="h3 mb-4 text-gray-800"><a href="<?php echo base_url('admin/kelolaUser'); ?>">Kelola User / </a><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

            <form class="" action="<?php echo base_url('admin/tambah_user'); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="new_pasword1">New Password</label>
                    <input type="password" class="form-control" id="new_pasword1" name="new_pasword1">
                    <?php echo form_error('new_pasword1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="new_pasword2">Repeat Password</label>
                    <input type="password" class="form-control" id="new_pasword2" name="new_pasword2">
                    <?php echo form_error('new_pasword2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add user</button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->