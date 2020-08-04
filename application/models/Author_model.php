<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Author_model extends CI_Model
{

	private $table = 'author'; // default table

	public function __construct()
	{
		parent::__construct();
	}

	// get all data.
	public function get_data()
	{
		$records = [
			'draw' => @$_POST['draw'],
			'recordsTotal' => $this->count_all(),
			'recordsFiltered' => $this->count_filtered(),
			'data' => $this->_get_data()
		];

		return $records;
	}

	// generate query to get all data.
	private function _get_data_query()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if (@$_POST['search']['value']) {
			$this->db->like('author_name', $_POST['search']['value']);
		}
		$this->db->order_by('author_name', $_POST['order']['0']['dir']);
	}

	// getting all data after query data.
	private function _get_data()
	{
		$this->_get_data_query();
		if (@$_POST['length'] != -1) {
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	// count a filtered data.
	private function count_filtered()
	{
		$this->_get_data_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// count total data.
	private function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get a detail data by id.
	public function getdata_by_id($id)
	{
		return $this->db->get_where($this->table, ['author_id' => $id])->row();
	}

	// inserting data.
	public function insert_data()
	{
		$post = $this->input->post();

		$data = [
			'author_name' => $post['author']
		];

		$this->db->insert($this->table, $data);

		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}

	// updating data.
	public function update_data()
	{
		$post = $this->input->post();

		$data = [
			'author_name' => $post['author']
		];

		$this->db->update($this->table, $data, ['author_id' => $post['author_id']]);

		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}

	// deleting data.
	public function delete_data($id)
	{
		$this->db->delete($this->table, ['author_id' => $id]);
		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}
}

/* End of file Author_model.php */
