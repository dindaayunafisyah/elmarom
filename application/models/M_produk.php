<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{
    function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->db->order_by('id_produk', 'DESC');

        $hsl = $this->db->get();
        return $hsl;
    }

    function portofolio()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->db->order_by('id_produk', 'ASC');
        $this->db->limit(6);
        $hsl = $this->db->get();
        return $hsl;
    }

    function joinproduk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->db->order_by('id_produk', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result();
    }

    function add_produk($nama, $isi, $berat, $harga, $kategori, $shopee, $tokopedia, $dataInfo = array())
    {

        $data = array(
            'nama_produk'   => $nama,
            'isi_produk'    => $isi,
            'berat'         => $berat,
            'harga'         => $harga,
            'id_kategori'   => $kategori,
            'shopee'        => $shopee,
            'tokopedia'     => $tokopedia,
            'gambar1'       => $dataInfo[0]['file_name'] ? $dataInfo[0]['file_name'] : null,
            'gambar2'       => !empty($dataInfo[1]['file_name']) ? $dataInfo[1]['file_name'] : null,
            // cek if else ada atau tidak
            'gambar3'       => !empty($dataInfo[2]['file_name']) ? $dataInfo[2]['file_name'] : null,
            'gambar4'       => !empty($dataInfo[3]['file_name']) ? $dataInfo[3]['file_name'] : null,
            'gambar5'       => !empty($dataInfo[4]['file_name']) ? $dataInfo[4]['file_name'] : null,
        );

        $result = $this->db->insert('produk', $data);
        return $result;
    }

    function edit_get($kode)
    {
        $this->db->select('*');
        $this->db->from('produk');
        // $this->db->join('kategori','kategori.id_kategori=produk.id_kategori');
        $this->db->where('id_produk', $kode);
        $query = $this->db->get();
        return $query->result();
    }

    function edit_produk($id, $nama, $isi, $berat, $harga, $kategori, $shopee, $tokopedia, $dataInfo = array())
    {
        $data = array(
            'nama_produk'   => $nama,
            'isi_produk'    => $isi,
            'berat'         => $berat,
            'harga'         => $harga,
            'id_kategori'   => $kategori,
            'shopee'        => $shopee,
            'tokopedia'     => $tokopedia,
            'gambar1'       => $dataInfo[0]['file_name'] ? $dataInfo[0]['file_name'] : null,
            'gambar2'       => !empty($dataInfo[1]['file_name']) ? $dataInfo[1]['file_name'] : null, // cek if else ada atau tidak
            'gambar3'       => !empty($dataInfo[2]['file_name']) ? $dataInfo[2]['file_name'] : null,
            'gambar4'       => !empty($dataInfo[3]['file_name']) ? $dataInfo[3]['file_name'] : null,
            'gambar5'       => !empty($dataInfo[4]['file_name']) ? $dataInfo[4]['file_name'] : null,
        );

        $this->db->where('id_produk', $id);
        $result = $this->db->update('produk', $data);
        return $result;
    }

    function hapus($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }

    //Kategori
    function kategori()
    {
        $hsl = $this->db->query("SELECT * FROM kategori ORDER BY id_kategori ASC");
        return $hsl;
    }

    function tambah_kategori($kat)
    {
        $data = array(
            'kategori' => $kat
        );

        $result = $this->db->insert('kategori', $data);
        return $result;
    }

    function edit_kategori($kode, $kat)
    {
        $data = array(
            'kategori' => $kat
        );

        $this->db->where('id_kategori', $kode);
        $result = $this->db->update('kategori', $data);
        return $result;
    }

    function hapus_kategori($kode)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->db->where('id_kategori', $kode);
        $this->db->delete(array('kategori', 'produk'));
    }

    function detail_produk($kode)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->db->where('id_produk', $kode);
        $query = $this->db->get();
        return $query->result();
    }


    function produk_terbaru()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->db->order_by('id_produk', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    function pagination()
    {

        return $this->db->count_all('produk');
    }

    function getproduk($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_produk', $keyword);
        }
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    function pagination_filter_kategori($id_kategori = '')
    {

        $this->db->where('kategori.id_kategori', $id_kategori);

        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $query = $this->db->get('produk');
        return $query->num_rows();
    }

    function filter_kategori($sampai, $dari, $id_kategori = '')
    {

        $this->db->where('kategori.id_kategori', $id_kategori);

        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $query = $this->db->get('produk', $sampai, $dari);
        return $query->result_array();
    }

    function pagination_search($keyword = '')
    {
        if ($keyword) {
            $this->db->like('nama_produk', urldecode($keyword)); //pencarian dengan spasi + ganti config
        }
        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $query = $this->db->get('produk');
        return $query->num_rows();
    }

    function hasil_search($sampai, $dari, $cari = '')
    {

        if ($cari) {
            $this->db->like('nama_produk', urldecode($cari)); //pencarian dengan spasi + ganti config
        }

        $this->db->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $query = $this->db->get('produk', $sampai, $dari);
        return $query->result_array();
    }
}
