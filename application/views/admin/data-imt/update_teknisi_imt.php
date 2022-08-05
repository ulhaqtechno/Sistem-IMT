

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card ">
            
            <div class="card-body ">
              <form action="<?= base_url('admin/change/data_imt_teknisi/teknisi_imt_edit') ?>" enctype="multipart/form-data" method="post">
                <?php foreach ($data_imt as $u) { ?>
                    <!-- <div class="">
                        <div class="hero text-white hero-bg-image" data-background="<?= base_url('assets/') ?>stisla-assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg">
                            <div class="col-md-4 mx-auto rounded-circle bg-white p-3" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                                <img src="<?= base_url() . 'assets/profile_picture/' . $u->image; ?>" class="card-img-top  rounded-circle img-responsive" alt="...">
                            </div>
                            <div class="input-group mt-3 mx-auto" style="width: 50%;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Upload Photo</label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <br>
                    <div id="detail" class="col-md-12 bg-white " style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                        <h1 class="font-weight-bold card-title text-center" style="color: black;">Update Data
                            IMT
                        </h1>
                        <p class="text-center my-4" style="line-height: 5px;">Silahkan isi data dibawah untuk update
                        data, dan upload file diatas untuk update data profile picture</p>
                        <hr>
                        <input type="text" class="form-control" name="uid_biodata" value="<?= $u->uid_biodata ?>" hidden>
                        <input type="text" class="form-control" name="id" value="<?= $u->id ?>" hidden>
                        <!-- <div class="form-group">
                            <label for="nama_prestasi" class="font-weight-bold" style="font-size: 20px;">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $u->nama ?>" id="nama_prestasi">
                        </div> -->

                        <!-- <div class="form-group">
                          <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                          <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                            <option value="<?= $u->jenis_kelamin ?>">choose..</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div> -->
                        <div class="row">
                          <div class="form-group col-sm-4">
                            <label for="nama_prestasi" class="font-weight-bold" style="font-size: 20px;">Tinggi Badan</label>
                            <input type="text" class="form-control" name="tinggi_badan" value="<?= $u->tinggi_badan ?>" id="nama_prestasi">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="nama_file" class="font-weight-bold" style="font-size: 20px;">Berat Badan</label>
                            <input type="text" class="form-control" name="berat_badan" value="<?= $u->berat_badan ?>" id="nama_file">
                        </div>
                        <!-- <div class="form-group col-sm-4">
                            <label for="nama_file" class="font-weight-bold" style="font-size: 20px;">Usia</label>
                            <input type="text" class="form-control" name="usia" value="<?= $u->usia ?>" id="nama_file">
                        </div> -->
                        </div>
                        <input type="submit" value="Update ⭢" class="btn btn-success btn-block">
                    </div>
                <?php } ?>
            </form>
            </div>
          </div>
        </div>
      </div>

 