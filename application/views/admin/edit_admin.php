          <!-- Content wrapper -->
          <div class="content-wrapper pt-4">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->
              <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">

                <div class="table-responsive text-nowrap">
                  <table id="datatable" class="table table-striped">
                  <h5 class="fw-bold py-2 mb-1">Data Domain dan Server</h5>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Instansi</th>
                        <th>Website</th>
                        <th>Layanan</th>
                        <th>Email</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php $i=1;foreach($subdomain as $item) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $item->nama_instansi;?></td>
                        <td><?php echo $item->website;?></td>
                        <td><?php echo $item->layanan;?></td>
                        <td><?php echo $item->email;?></td>
                        <td><?php echo $item->keterangan;?></td>
                        <td>
                        <?php if($item->statusAktif=='Y') { ?>
                                <div class="badge badge-success">Aktif</d iv>
                          <?php
                        }else{
                          ?>
                          <div class="badge badge-danger">Tidak Aktif</div>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <?php if($item->statusAktif=='Y'){ ?>
                          <a href="<?php echo site_url('dashadmin/non_aktif/'.$item->id_subdomain);?>"class="badge badge-danger">Non Aktifkan</a>
                            <?php
                          }else{
                            ?>
                          <a href="<?php echo site_url('dashadmin/aktif/'.$item->id_subdomain);?>"class="badge badge-success">Aktifkan</a>
                          <?php } ?>
                          </td>
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
