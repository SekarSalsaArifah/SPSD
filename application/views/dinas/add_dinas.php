          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Deklarasi nama_instansi -->
                          <?php
                $nama_instansi = $this->session->userdata('nama_instansi');
              ?>

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
              <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light"></h4>
              <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Input Data Domain & Server</h5>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="<?php echo site_url('dashdinas/save');?>" enctype="multipart/form-data">
                      
                      <?php foreach($instansi->result() as $item):?>
                        <input id="id_instansi" class="form-control mt-n1" name="id_instansi" type="hidden" placeholder="instansi" value="<?php echo $item->id_instansi;?>"/>
                      <?php endforeach;?>
                      <div class="row mb-2">
                        <label class="col-sm-3 col-form-label" for="basic-default-name" >Dinas</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control mt-n1" id="basic-default-name" name="instansi" placeholder="<?= $nama_instansi?>" disabled>
                        </div>
                      </div>
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Website</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control mt-n1" id="basic-default-name" name="website" placeholder="" required/>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Layanan</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control mt-n1" id="basic-default-name" name="layanan" placeholder="" required/>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Unggah Dokumen</label>
                          <div class="col-sm-12">
                          <input type="file" class="mt-n1" id="fileUpload" name="buktiupload" required>
                          <p style="color: red">Ekstensi yang diperbolehkan .pdf maksimal 2 MB</p>
                          </div>
                        </div> 
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-message">Keterangan</label>
                          <div class="col-sm-12">
                            <textarea id="basic-default-message" class="form-control mt-n1" name="keterangan" placeholder="" aria-label="Keterangan" aria-describedby="basic-icon-default-message2"
                            ></textarea>
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
            <!-- / Content -->
