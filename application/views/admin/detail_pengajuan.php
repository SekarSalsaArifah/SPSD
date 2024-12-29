<?php if ($this->session->flashdata('msg')) { ?>
                  <div class="alert alert-primary alert-dismissible m-1 p-2 alert-fixed" id="success-alert">
                  <i class="icon fas fa-check"></i>Selamat! 
                      <?= $this->session->flashdata('msg') ?>
                  </div>
              <?php } ?>
          <!-- Content wrapper -->
          <div class="content-wrapper pt-4">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->
              <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
              <?php if ($this->session->flashdata('msg')) { ?>
                  <div class="alert alert-primary alert-dismissible m-1 p-2 alert-fixed" id="success-alert">
                  <i class="icon fas fa-check"></i>Selamat!
                      <?= $this->session->flashdata('msg') ?>
                  </div>
              <?php } ?>
                <div class="table-responsive text-nowrap">
                  <table id="datatable" class="table table-striped" style="align-center" >
                  <h5 class="fw-bold py-2 mb-1">Data Pengajuan</h5>
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Website</th>
                        <th>Dokumen</th>
                        <th>Nama Instansi</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                    <?php $i=1;foreach($subdomain as $row) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row->website;?></td>
                        <td>
                          <a href="<?php echo base_url('uploads/'.$row->buktiupload);?>" class="badge badge-success p-2 m-1;;" style="scale:90% ; margin-left:-11px target="_blank><i class="fas fa-file"></i>  Dokumen</a>
                        </td>
                        <td><?php echo $row->nama_instansi;?></td>
                        <td>
                          <?php if($row->status === 'P'): ?>
                            <div style="color: red" class="">Tertunda</div>
                          <?php else: ?>
                            <div class="">Diterima</div>
                          <?php endif; ?>
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
