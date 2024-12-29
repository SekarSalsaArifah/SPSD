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

          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y m-4 pt-3">
              <!-- <hr class="my-5" /> -->
              <a href="<?= base_url('dashdinas/add')?>" class="badge badge-info p-2 m-1;" style="scale:100%; margin-left:1px">Tambah Data</a>
              
              <div class="row pt-2">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">

                <div class="table-responsive text-nowrap">
                  <table id="datatable" class="table table-striped" style="align-center" >
                  <h5 class="fw-bold py-2">Data Domain dan Server <?php
                  if (!empty($nama_instansi)) {
                      echo "$nama_instansi";
                  } else {
                      echo "";
                  }
                  ?></h5>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Website</th>
                        <th>Layanan</th>
                        <th>Dokumen</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <!-- <th class="border-left px-4">Status</th> -->
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                    <?php $i=1;foreach($subdomain as $item) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $item->website;?></td>
                        <td><?php echo $item->layanan;?></td>
                        <td><a href="<?php echo base_url('uploads/'.$item->buktiupload);?>" target="_blank"><?php echo $item->buktiupload;?></a></td>
                        <td><?php echo $item->keterangan;?></td>
                        <td>
                        <?php if($item->statusAktif=='Y') { ?>
                                <div class="badge badge-success">Aktif</div>
                          <?php
                        }else{
                          ?>
                          <div class="badge badge-danger">Tidak Aktif</div>
                          <?php
                        }
                        ?>
                        </td>
                      </tr>
                      <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
            </div>
