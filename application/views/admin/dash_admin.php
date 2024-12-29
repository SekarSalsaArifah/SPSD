<?php if ($this->session->flashdata('msg')) { ?>
                  <div class="alert alert-primary alert-dismissible m-1 p-2 alert-fixed" id="success-alert">
                  <i class="icon fas fa-check"></i>Selamat! 
                      <?= $this->session->flashdata('msg') ?>
                  </div>
              <?php } ?>
<!-- Deklarasi nama_instansi -->
              <?php
                $nama_instansi = $this->session->userdata('nama_instansi');
              ?>
          <!-- Content wrapper -->
          <div class="content-wrapper pt-4">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
            <a href="<?= base_url('dashadmin/addpengajuan')?>" class="badge badge-info p-2 m-1;" style="scale:100% ; margin-left:1px">Tambah Data</a> 
              
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->
              <div class="row pt-2">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table id='datatable' class="table table-striped">
                  <h5 class="fw-bold py-2 mb-1">Data Domain dan Server</h5>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Instansi</th>
                        <th>Dokumen</th>  
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                    <?php 
                    $i=1;
                    foreach($subdomain as $item) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $item->nama_instansi;?></td>
                        <td>
                          <a href="<?php echo base_url('uploads/'.$item->buktiupload);?>" class="badge badge-success p-2 m-1;;" style="scale:90% ; margin-left:-11px target="_blank><i class="fas fa-file"></i>  Dokumen</a>
                        </td>
                        <td><?php echo $item->keterangan;?></td>
                        <td>
                          <?php if($item->status === 'P'): ?>
                            <div class="badge badge-danger p-2">Tertunda</div>
                          <?php else: ?>
                            <div class="badge badge-warning p-2">Diterima</div>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if($item->status === 'P'): ?>
                            <a href="<?php echo site_url('dashadmin/getidinstansi/'.$item->id_subdomain);?>" class="badge badge-warning p-2 m-1;" style="scale:90% ; margin-left:-11px target="_blank><i class="fas fa-check"></i> Setuju</a> 
                          <?php else: ?>
                            <div class="badge badge-info p-2">Sudah ditinjau</div>
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
