<?php if ($this->session->flashdata('msg')) { ?>
                  <div class="alert alert-primary alert-dismissible m-1 p-2 alert-fixed" id="success-alert">
                  <i class="icon fas fa-check"></i>Selamat! 
                      <?= $this->session->flashdata('msg') ?>
                  </div>
              <?php } ?>
         <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4 pt-3">
              <a href="<?= base_url('server/addfisikserver')?>" class="badge badge-info p-2 m-1;" style="scale:100% ; margin-left:1px">Tambah Data</a> 
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->
              <div class="row pt-2">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table id="datatable" class="table table-striped" style="align-center" >
                  <h5 class="fw-bold py-2 mb-1">Data Server Fisik</h5>
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Server</th>
                        <th>Alamat IP</th>
                        <th>Sistem Operasi</th>
                        <th>Versi OS</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                    <?php $i=1; 
                      foreach($server as $row) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row->nama_server;?></td>
                        <td><?php echo $row->ip;?></td>
                        <td><?php echo $row->os;?></td>
                        <td><?php echo $row->versi_os;?></td>
                        <td>
                        <a href="<?= base_url('server/getid/'.$row->id_server)?>" class="badge badge-warning p-2 m-1;" style="scale:90% ; margin-left:-11px">Detail Server Fisik</a>
                        <a href="<?= base_url('server/getidappserver/'.$row->id_server)?>" class="badge badge-warning p-2 m-1;" style="scale:90% ; margin-left:-11px">Detail Server App</a>
                        </td>
                      </tr>
                      <?php $i++; } ?>
                    </tbody>  
                  </table>
                </div>
              </div>
            </div>
          </div>
              <!--/ Striped Rows -->
            </div>
            <!-- / Content -->
