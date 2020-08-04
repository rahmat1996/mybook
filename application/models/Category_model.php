<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

	private $table = 'category'; // default table

	private $array_search = ['category_id', 'category_name']; // array to search data

	private $array_order = [null, 'category_id', 'category_name']; // array yo order data

	public function __construct()
	{
		parent::__construct();
	}

	// return all data from table.
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

	// query to generate data.
	private function _get_data_query()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		// Search from value datatables
		if (@$_POST['search']['value']) {
			$this->db->group_start();
			for ($i = 0; $i < count($this->array_search); $i++) {
				if ($i == 0) {
					$this->db->like($this->array_search[$i], $_POST['search']['value']);
				} else {
					$this->db->or_like($this->array_search[$i], $_POST['search']['value']);
				}
			}
			$this->db->group_end();
		}
		// Order from value datatables
		$this->db->order_by($this->array_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	// getter to get data after query data.
	private function _get_data()
	{
		$this->_get_data_query();
		if (@$_POST['length'] != -1) {
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	// count filtered data.
	private function count_filtered()
	{
		$this->_get_data_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// count all data.
	private function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data detail by id.
	public function getdata_by_id($id)
	{
		return $this->db->get_where($this->table, ['category_id' => $id])->row();
	}

	// inserting a data.
	public function insert_data()
	{
		$post = $this->input->post();

		$data = [
			'category_id' => $post['category_id'],
			'category_name' => $post['category_name']
		];

		$this->db->insert($this->table, $data);

		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}

	// updating a data.
	public function update_data()
	{
		$post = $this->input->post();

		$data = [
			'category_name' => $post['category_name']
		];

		$this->db->update($this->table, $data, ['category_id' => $post['category_id']]);

		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}

	// delete.
	public function delete_data($id)
	{
		$this->db->delete($this->table, ['category_id' => $id]);
		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}
}

/* End of file Category_model.php */
