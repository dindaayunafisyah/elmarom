  <?php if ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
      Swal.fire(
      'Data produk!',
      'Berhasil ditambahkan!',
      'success'
      )
    </script>
    <?php elseif ($this->session->flashdata('msg') == 'diedit') : ?>
    <script type="text/javascript">
      Swal.fire(
      'Data produk!',
      'Berhasil diedit!',
      'info'
      )
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'dihapus') : ?>
    <script type="text/javascript">
      Swal.fire(
      'Data produk!',
      'Berhasil dihapus!',
      'success'
      )
    </script>
  <?php elseif($this->session->flashdata('gagal') == 'gagal') : ?>
   <script type="text/javascript">
    Swal.fire(
      'Data produk!',
      'Gagal diedit ! pastikan semua terisi dengan benar',
      'error'
      )
    </script>
  <?php endif; ?>


  <!-- Kategori -->

    <?php if ($this->session->flashdata('kat') == 'success') : ?>
    <script type="text/javascript">
      Swal.fire(
      'Data kategori!',
      'Berhasil ditambahkan!',
      'success'
      )
    </script>
    <?php elseif ($this->session->flashdata('kat') == 'edit') : ?>
    <script type="text/javascript">
      Swal.fire(
      'Data produk!',
      'Berhasil diedit!',
      'info'
      )
    </script>
  <?php elseif ($this->session->flashdata('kat') == 'hapus') : ?>
    <script type="text/javascript">
      Swal.fire(
      'Data produk!',
      'Berhasil dihapus!',
      'success'
      )
    </script>
  <?php elseif($this->session->flashdata('gagal') == 'gagal') : ?>
   <script type="text/javascript">
    Swal.fire(
      'Data kategori!',
      'Gagal ! pastikan isi dengan benar',
      'error'
      )
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('dibaca') == 'success') : ?>
    <script type="text/javascript">
      Swal.fire(
      'Data Message!',
      'Pesan berhasil dibaca!',
      'success'
      )
    </script>
  <?php elseif($this->session->flashdata('hapus_pesan') == 'success') : ?>
   <script type="text/javascript">
    Swal.fire(
      'Data Message!',
      'Message berhasil dihapus!',
      'success'
      )
    </script>
  <?php endif; ?>

  <!-- EDIT PROFIL USER -->
  <?php if ($this->session->flashdata('success') == 'user') : ?>
    <script type="text/javascript">
      Swal.fire(
        'Data profil!',
        'Berhasil diupdate!',
        'success'
      )
    </script>
  <?php elseif ($this->session->flashdata('error') == 'user') : ?>
    <script type="text/javascript">
      Swal.fire(
        'Data Profil!',
        'Pastikan semua tidak kosong !',
        'error'
      )
    </script>
    <?php elseif ($this->session->flashdata('error') == 'image') : ?>
    <script type="text/javascript">
      Swal.fire(
        'Data Profil!',
        'Pastikan type file gif, jpg dan png !',
        'error'
      )
    </script>
  <?php endif; ?>
<!-- END -->

<!-- Ganti password -->
  <?php if ($this->session->flashdata('success') == 'password') : ?>
    <script type="text/javascript">
      Swal.fire(
        'Update password!',
        'Password berhasil diupdate!',
        'success'
      )
    </script>
  <?php elseif ($this->session->flashdata('error') == 'passKosong') : ?>
    <script type="text/javascript">
      Swal.fire(
        'Update password!',
        'Pastikan isi password lama anda !',
        'error'
      )
    </script>
    <?php elseif ($this->session->flashdata('error') == 'passLama') : ?>
    <script type="text/javascript">
      Swal.fire(
        'Update password!',
        'Password lama anda tidak cocok !',
        'error'
      )
    </script>
    <?php elseif ($this->session->flashdata('error') == 'passSama') : ?>
    <script type="text/javascript">
      Swal.fire(
        'Update password!',
        'Password baru tidak boleh sama dengan password lama !',
        'error'
      )
    </script>
  <?php endif; ?>
<!-- END -->