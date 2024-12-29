          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Alasan dan keterangan ditolak</span> Domain dan Server</h4>
  
              <div class="row">

                <div class="col-12 col-md-8 col-lg-8">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Alasan Data di<?=$ket;?></h5>

                    </div>
                    <div class="card-body">
                      <form method="POST" action="<?=base_url('dashadmin/non_aktif/')?>" enctype="multipart/form-data">
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" for="basic-default-message">Alasan</label>
                          <div class="col-sm-9">
                            <textarea
                              id="basic-default-message"
                              class="form-control"
                              name="keterangan"
                              placeholder="dapat berisi alasan, saran, dll."
                              aria-label="Keterangan"
                              aria-describedby="basic-icon-default-message2"
                              required
                            ></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 text-left">
                            <a href="<?=base_url('dashadmin/edit')?>"><button type="submit" class="btn btn-primary">Submit</button></a>
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
