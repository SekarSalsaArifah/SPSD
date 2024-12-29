<?php if ($this->session->flashdata('msg')) { ?>
                  <div class="alert alert-primary alert-dismissible m-1 p-2 alert-fixed" id="success-alert">
                  <i class="icon fas fa-check"></i>Selamat! 
                      <?= $this->session->flashdata('msg') ?>
                  </div>
              <?php } ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y mx-4  ">
            <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add User </span> Data Domain dan Server</h5>
        <!-- <hr class="my-5" /> -->
        <!-- Striped Rows -->
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-6">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Tambah Dinas Baru</h5>

                    </div>
                    <div class="card-body">
                    <?php if($this->session->flashdata('success')) :?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                      </div>
                    <?php endif; ?>
                      <form method="POST" action="<?php echo site_url('dashadmin/saveinstansi');?>" enctype="multipart/form-data">
                            <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Dinas</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control mt-n1" id="basic-default-name" name="nama_instansi" placeholder="" required/>
                                        </select>
                                    </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Alamat</label>
                                <div class="col-sm-12">
                                    <textarea type="text" class="form-control mt-n1" id="basic-default-name" name="alamat_instansi" placeholder="" required></textarea>
                                </div>
                            </div>

                            <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Telepon</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control mt-n1" id="basic-default-name" name="no_telepon" placeholder="" required/>
                                    </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Keterangan</label>
                                <div class="col-sm-12">
                                    <textarea type="text" class="form-control mt-n1" id="basic-default-name" name="keterangan" placeholder=""></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <button type="submit" class="btn btn-success mb px-4" style="scale:80%; margin-left:-8px;">Simpan</button>
                                </div>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-10 col-lg-6">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Tambah User Baru</h5>

                    </div>
                    <div class="card-body">
                      <form method="POST" action="<?php echo site_url('dashadmin/save');?>" enctype="multipart/form-data">
                            <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name" >Dinas</label>
                                    <div class="col-sm-12">
                                        <select  class="form-control mt-n1" name="id_instansi" placeholder="" required>
                                        <?php foreach($instansi as $item) { ?>
                                        <option value="<?php echo $item->id_instansi;?>"><?php echo $item->nama_instansi;?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                            </div>

                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Username</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control mt-n1" id="basic-default-name" name="username" placeholder="" required/>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-3 col-form-label" for="username">Password</label>
                                <div class="col-sm-12">
                                        <input type="text" name="password" class="form-control mt-n1" placeholder="" required>
                                </div>
                            </div>

                            <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">User Role</label>
                                    <div class="col-sm-12">
                                        <select  class="form-control mt-n1" name="id_role" placeholder="Role" required>
                                        <?php foreach($user_role as $item) { ?>
                                        <option value="<?php echo $item->id;?>"><?php echo $item->role;?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-left">
                                    <button type="submit" class="btn btn-success mb px-4" style="scale:80%; margin-left:-8px;">Simpan</button>
                                </div>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>

            </div>

            
        </div>
</div>
