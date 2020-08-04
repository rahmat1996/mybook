<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{

	private $table = 'book'; // table book

	private $array_search = ['book_title', 'book_year']; // array for search data

	private $array_order = [null, 'book_title', 'book_year']; // array for order data

	public function __construct()
	{
		parent::__construct();
	}

	// function to get all data
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

	// function to make a query for get all data.
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

	// function getting all data via query.
	private function _get_data()
	{
		$this->_get_data_query();
		if (@$_POST['length'] != -1) {
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	// function to count filtered data from getting data.
	private function count_filtered()
	{
		$this->_get_data_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// function to get all count data.
	private function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// function to give a detail book.
	public function getdata_by_id($id)
	{
		$data = $this->db->select('book.*,language.lang_name')->join('language', 'book.book_language = language.lang_id', 'left')
			->get_where($this->table, ['book_id' => $id])->row();

		$this->db->select('book_category.*,category.category_name');
		$this->db->from('book_category');
		$this->db->join('category', 'book_category.category_id = category.category_id', 'left');
		$this->db->where('book_category.book_id', $data->book_id);
		$data->categories = $this->db->get()->result();

		$this->db->select('book_author.*,author.author_name');
		$this->db->from('book_author');
		$this->db->join('author', 'book_author.author_id = author.author_id', 'left');
		$this->db->where('book_author.book_id', $data->book_id);
		$data->authors = $this->db->get()->result();

		return $data;
	}

	// function to add a new data book.
	public function insert_data()
	{
		$post = $this->input->post();

		$date_now = date('Y-m-d H:i:s');

		$this->db->trans_start();

		$data_insert_book = [
			'book_title' => $post['book_title'],
			'book_year' => $post['book_year'],
			'book_description' => $post['book_description'],
			'book_image' => '',
			'book_file' => '',
			'book_language' => $post['book_language'],
			'date_added' => $date_now,
			'date_modified' => $date_now
		];

		$this->db->insert($this->table, $data_insert_book);

		$book_id = $this->db->insert_id();

		$data_update_book = [
			'book_image' => $book_id . '.jpg',
			'book_thumb_image' => $book_id . '_thumb.jpg',
			'book_file' => $book_id . '.pdf'
		];

		$this->db->update($this->table, $data_update_book, array('book_id' => $book_id));

		$data_insert_category = [];
		$i = 0; // number of array simple batch insert category
		foreach ($post['book_category'] as $category) {
			if (!$category == '') {
				$data_insert_category[$i] = ['book_id' => $book_id, 'category_id' => $category];
				$i++;
			}
		}

		// check if category is not zero, because can make error on insert batch.
		if (count($data_insert_category) > 0) {
			$this->db->insert_batch('book_category', $data_insert_category);
		}

		$data_insert_author = [];
		$j = 0; // number of array simple batch insert author
		foreach ($post['book_author'] as $author) {
			if (!$author == '') {
				$data_insert_author[$j] = ['book_id' => $book_id, 'author_id' => $author];
				$j++;
			}
		}

		// check if author is not zero, because can make error on insert batch.
		if (count($data_insert_author) > 0) {
			$this->db->insert_batch('book_author', $data_insert_author);
		}

		$this->db->trans_complete();

		if ($this->db->trans_status()) {
			return ['id' => $book_id, 'has_inserted' => TRUE];
		} else {
			return ['id' => '', 'has_inserted' => FALSE];
		}
	}

	// function to update data book
	public function update_data()
	{
		$post = $this->input->post();

		$date_now = date('Y-m-d H:i:s');

		$this->db->trans_start();

		$data_update_book = [
			'book_title' => $post['book_title'],
			'book_year' => $post['book_year'],
			'book_description' => $post['book_description'],
			'book_language' => $post['book_language'],
			'date_modified' => $date_now
		];

		$this->db->update($this->table, $data_update_book, ['book_id' => $post['book_id']]);

		// Delete from book_category table before inserted new data.
		$this->db->delete('book_category', ['book_id' => $post['book_id']]);

		$data_insert_category = [];
		$i = 0; // number of array simple batch insert category
		foreach ($post['book_category'] as $category) {
			if (!$category == '') {
				$data_insert_category[$i] = ['book_id' => $post['book_id'], 'category_id' => $category];
				$i++;
			}
		}

		// check if category is not zero, because can make error on insert batch.
		if (count($data_insert_category) > 0) {
			$this->db->insert_batch('book_category', $data_insert_category);
		}

		// Delete from book_author table before inserted new data.
		$this->db->delete('book_author', ['book_id' => $post['book_id']]);

		$data_insert_author = [];
		$j = 0; // number of array simple batch insert author
		foreach ($post['book_author'] as $author) {
			if (!$author == '') {
				$data_insert_author[$j] = ['book_id' => $post['book_id'], 'author_id' => $author];
				$j++;
			}
		}

		// check if author is not zero, because can make error on insert batch.
		if (count($data_insert_author) > 0) {
			$this->db->insert_batch('book_author', $data_insert_author);
		}

		$this->db->trans_complete();

		if ($this->db->trans_status()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// function to delete data book.
	public function delete_data($id)
	{
		$this->db->trans_start();
		$this->db->delete($this->table, ['book_id' => $id]);
		$this->db->delete('book_category', ['book_id' => $id]);
		$this->db->delete('book_author', ['book_id' => $id]);
		$this->db->trans_complete();
		if ($this->db->trans_status()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// function to get list language
	public function data_languages()
	{
		$records = $this->db->where('is_used', '1')->order_by('lang_name', 'asc')->get('language')->result_array();
		$languages = [];
		foreach ($records as $record) {
			$languages[$record['lang_id']] = $record['lang_name'];
		}
		return $languages;
	}

	// function to get list language
	public function data_categories()
	{
		$records = $this->db->order_by('category_name', 'asc')->get('category')->result_array();
		$categories = [];
		foreach ($records as $record) {
			$categories[$record['category_id']] = $record['category_name'];
		}
		return $categories;
	}

	// function to get list language
	public function data_authors()
	{
		$records = $this->db->order_by('author_name', 'asc')->get('author')->result_array();
		$authors = [];
		foreach ($records as $record) {
			$authors[$record['author_id']] = $record['author_name'];
		}
		return $authors;
	}
}

/* End of file Book_model.php */
