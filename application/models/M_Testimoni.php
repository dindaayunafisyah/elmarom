<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_testimoni extends CI_Model
{
    function testimoni()
    {
        $tst = $this->db->query("SELECT * FROM testimoni");
        return $tst;
    }

    function tambah_testimoni($nama, $ket)
    {
        $data = array(
            'nama'      => $nama,
            'keterangan' => $ket
        );

        $result = $this->db->insert('testimoni', $data);
        return $result;
    }

    function edit_testimoni($nama, $ket)
    {
        $data = array(
            'nama'       => $nama,
            'keterangan' => $ket
        );

        $this->db->where('nama', $nama);
        $result = $this->db->update('testimoni', $data);
        return $result;
    }

     function hapus_testimoni($nama)
    {
        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->where('nama', $nama);
        $this->db->delete(array('nama', 'testimoni'));
    }

    // public function hapus($where, $table)
    // {
    //     return $this->db->delete($table, $where);
    // }

    function counttestimoni()
    {
        $sql = "select count(*) as testimoni from testimoni";
        $result = $this->db->query($sql);
        return $result->row()->testimoni;
    }
}
