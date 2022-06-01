<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper">
      <div class="container-fluid"><div class="row">
      </div>
      <!--Basic Table Starts-->
      <section id="simple-table">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title-wrap bar-success">
                  <h4 class="card-title">Produk page</h4>
                </div>
              </div>
              <div class="card-body">
                <div class="card-block">
                 <a href="<?php echo base_url('admin/Produk/page_tambah') ?>" class="btn btn-success"><span class="ft-plus"></span> Tambah produk</a>
                 <br></br> 
                 <table id="example" class="table table-striped" cellspacing="0" style="width:100%">
                  <thead>
                    <tr>
                      <th> Gambar </th>
                      <th> Nama </th>
                      <th> Tanggal </th>
                      <th> Berat </th>
                      <th> Harga </th>
                      <th> Kategori </th>
                      <th style="text-align: center;"> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($joinproduk as $pro) : ?>
                      <tr>
                        <td><img src="<?php echo base_url() . 'backend/img/' . $pro->gambar1; ?>" style="width:50px;"></td>
                        <td><?php echo $pro->nama_produk; ?></td>
                        <td><?php echo $pro->tanggal; ?></td>
                        <td><?php echo $pro->berat; ?></td>
                        <td>Rp.<?php echo number_format($pro->harga,0,',','.') ?>,-</td>
                        <td><?php echo $pro->kategori; ?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-outline-primary" href="<?php echo base_url() . 'admin/Produk/page_edit/' . $pro->id_produk; ?>"><i class="fa fa-pencil"></i></a> 
                          <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Modalhapus<?php echo $pro->id_produk; ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Basic Table Ends-->
    </div>
  </div>
</div>
</div>