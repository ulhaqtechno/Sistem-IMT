    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="justify-content-start">Tambah Data IMT Management</h3>
                            </div>

                            <div class="col-6">
                                <!-- <a class="btn bg-gradient-primary  w-100 justify-content-end" href="<?= base_url('/petugas/petugas/tambah_data_imt') ?>" type="button">Tambah Data +</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <p class="text-danger"><?= $this->session->flashdata('error'); ?></p>
                            <form action="<?php echo base_url('petugas/petugas/insert') ?>" method="post">
                                <div class="row mt-4 mb-4">
                                    <div class="col-md-4 mb-lg-0 mb-4">
                                        <label for="">Berat badan</label>
                                        <input type="text" class="form-control" name="berat_badan" value="<?= $berat_badan ?>" placeholder="nilai berat badan">
                                    </div>
                                    <div class="col-md-4 mb-lg-0 mb-4">
                                        <label for="">Tinggi badan</label>
                                        <input type="text" class="form-control" name="tinggi_badan" value="<?= $tinggi_badan ?>" placeholder="nilai Tinggi badan">
                                    </div>
                                    <div class="col-md-4 mb-lg-0 mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">RF ID</label>
                                                <input type="text" name="rf_id" id="rf_id" value="<?= $rfid ?>" class="form-control" placeholder="nilai RF ID" readonly>
                                            </div>
                                            <span id="data_member">
                                                <div class="col-md-12">
                                                    <label for="">Nama</label>
                                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Jenis Kelamin</label>
                                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Instansi</label>
                                                    <select class="form-control" name="code_instansi" id="code_instansi">
                                                        <?php
                                                            $instansi = $this->db->get('instansi')->result();
                                                            foreach ($instansi as $instansis) :
                                                        ?>
                                                        <option value="<?= $instansis->code_instansi ?>"><?= $instansis->instansi ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4 mb-4 ml-4">
                                        <div class="row">
                                            <div class="ml-auto">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>
            $('document').ready(function() {
                $.getJSON("<?= base_url() ?>/api/rfid/cek_member", {rfid : $('#rf_id').val()}, function (response) {
                    console.log(response);
                    if (response.data == null) {
                        $('#data_member').show();
                    }else{
                        $('#data_member').hide();
                    }
                })
            });
        </script>