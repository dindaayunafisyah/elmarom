<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_testimoni extends CI_Model
{
    function testimoni()
    {
        $tst = $this->db->query("SELECT * FROM testimoni");
        return $tst;
    }

    function tampiltesti()
    {
        $tst = $this->db->query("SELECT * FROM testimoni ORDER BY id_testimoni DESC LIMIT 5");
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

     function hapus_testimoni($id_testimoni)
    {
		$this->db->where($id_testimoni); 
		$this->db->delete('testimoni');

        // $this->db->select('*');
        // $this->db->from('testimoni');
        // $this->db->where('id_testimoni', $id_testimoni);
        // $this->db->delete(array('id_testimoni', 'testimoni'));
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
