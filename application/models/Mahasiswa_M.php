<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_M extends CI_Model {

	public function getDataMahasiswa()
    {
        $this->db->order_by('mahasiswa.id','DESC');
        $query = $this->db->get('mahasiswa');
        return $query;
    }

	public function cek_user($data) {
		$query = $this->db->get_where('user', $data);
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('user');
		if ($id != null) {
			$this->db->where('id_user', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['nama'] = $post['nama'];
		$params['email'] = $post['email'];
		$params['nim'] = $post['nim'];
		$params['nama_kampus'] = $post['nama_kampus'];
		$params['jurusan'] = $post['jurusan'];

		$this->db->insert('mahasiswa', $params);
	}

	public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

	public function edit($post)
    {
        if (!empty($post['nama'])) {
            $params['nama'] = $post['nama'];
        }

        if (!empty($post['email'])) {
            $params['email'] = $post['email'];
        }

        if (!empty($post['nim'])) {
            $params['nim'] = $post['nim'];
        }
        if (!empty($post['nama_kampus'])) {
            $params['nama_kampus'] = $post['nama_kampus'];
        }
        if (!empty($post['jurusan'])) {
            $params['jurusan'] = $post['jurusan'];
        }

        $this->db->where('id', $post['id']);
        $this->db->update('mahasiswa', $params);
    }

    public function import_data_mahasiswa($data)
    {
        return $this->db->insert_batch('mahasiswa', $data);
    }
}