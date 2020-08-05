<?php

defined('BASEPATH') or exit("No direct script access allowed!");

class Home_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_data($number, $offset, $search = NULL)
	{
		if (!empty($search) || !is_null($search)) {
			$this->db->like('book_title', $search);
		}

		$this->db->order_by('book_id','desc');

		return $this->db->get('book', $number, $offset)->result();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('book', "book_id = {$id}")->row();
	}

	public function count_all($search = NULL)
	{
		if (!empty($search) || !is_null($search)) {
			$this->db->like('book_title', $search);
		}

		return $this->db->from('book')->count_all_results();
	}
}
