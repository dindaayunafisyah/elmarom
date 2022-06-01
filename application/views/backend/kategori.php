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
                  <h4 class="card-title">Kategori page</h4>
                </div>
              </div>
              <div class="card-body">
                <div class="card-block">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Tambahkategori">
                    <i class="ft-plus"> Tambah kategori</i>
                  </button>
                 <br></br> 
                 <table id="example" class="table table-striped" cellspacing="0" style="width:100%">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Nama kategori </th>
                      <th style="text-align: center;"> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($kategori as $kat) {
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $kat->kategori; ?></td>
                        <td style="text-align:center;">
                          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Editkategori<?= $kat->id_kategori ?>"><i class="fa fa-pencil"></i>
                          </button>
                          <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Hapuskategori<?= $kat->id_kategori ?>"><i class="fa fa-trash"></i>
                          </button>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
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