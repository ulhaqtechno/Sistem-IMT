


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <p class="text-primary"><?= $this->session->flashdata('success'); ?></p> 
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-6">
                  <h3 class="justify-content-start">Data IMT Management</h3>
                </div>

                <div class="col-6">
                  <a class="btn bg-gradient-primary  w-100 justify-content-end" href="<?= base_url('/petugas/petugas/tambah_data_imt') ?>" type="button">Tambah Data +</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                    <div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                      <div class="table-responsive ">
                        <table id="example" class="table align-items-center table-flush">
                          <thead class="thead-light">
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                          <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Usia</th> -->
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">B B</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">T B</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">rfid</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($data_imt as $value) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->berat_badan ?></td>
                            <td><?= $value->tinggi_badan ?></td>
                            <td><?= $value->created ?></td>
                            <td><?= $value->id_rfid ?></td>
                            <td>
                            tombol
                            </td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      