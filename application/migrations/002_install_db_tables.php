<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Install_db_tables extends CI_Migration
{

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up()
	{

		// drop category table if exist
		$this->dbforge->drop_table('category', TRUE);

		// create category table
		$this->dbforge->add_field([
			'category_id' => [
				'type' => 'VARCHAR',
				'constraint' => '3',
			],
			'category_name' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			]
		]);

		$this->dbforge->add_key('category_id', TRUE);
		$this->dbforge->create_table('category');

		// drop author table if exist
		$this->dbforge->drop_table('author', TRUE);

		// create author table
		$this->dbforge->add_field([
			'author_id' => [
				'type' => 'INT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'author_name' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			]
		]);

		$this->dbforge->add_key('author_id', TRUE);
		$this->dbforge->create_table('author');

		// drop table book if exist
		$this->dbforge->drop_table('book', TRUE);

		// create book table
		$this->dbforge->add_field([
			'book_id' => [
				'type' => 'INT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'book_title' => [
				'type' => 'VARCHAR',
				'constraint' => '200'
			],
			'book_year' => [
				'type' => 'YEAR'
			],
			'book_description' => [
				'type' => 'TEXT',
			],
			'book_image' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'book_thumb_image' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'book_file' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'book_language' => [
				'type' => 'VARCHAR',
				'constraint' => '2'
			],
			'date_added' => [
				'type' => 'DATETIME'
			],
			'date_modified' => [
				'type' => 'DATETIME'
			]
		]);

		$this->dbforge->add_key('book_id', TRUE);
		$this->dbforge->create_table('book');

		// drop table book_author if exist
		$this->dbforge->drop_table('book_author', TRUE);

		// create table book_author
		$this->dbforge->add_field([
			'book_id' => [
				'type' => 'INT',
				'constraint' => '8',
				'unsigned' => TRUE
			],
			'author_id' => [
				'type' => 'INT',
				'constraint' => '8',
				'unsigned' => TRUE
			]
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('book_author');

		// drop table book_category if exist
		$this->dbforge->drop_table('book_category', TRUE);

		// create table book_category
		$this->dbforge->add_field([
			'book_id' => [
				'type' => 'INT',
				'constraint' => '8',
				'unsigned' => TRUE,
			],
			'category_id' => [
				'type' => 'VARCHAR',
				'constraint' => '3'
			]
		]);

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('book_category');

		$list_category = [
			['category_id' => '000', 'category_name' => 'Computer Science, Information, and General
			Works'],
			['category_id' => '100', 'category_name' => 'Philosophy and Psychology'],
			['category_id' => '200', 'category_name' => 'Religion'],
			['category_id' => '300', 'category_name' => 'Social Sciences'],
			['category_id' => '400', 'category_name' => 'Language'],
			['category_id' => '500', 'category_name' => 'Science'],
			['category_id' => '600', 'category_name' => 'Technology'],
			['category_id' => '700', 'category_name' => 'Arts and Recreation'],
			['category_id' => '800', 'category_name' => 'Literature'],
			['category_id' => '900', 'category_name' => 'History and Geography']
		];

		$this->db->insert_batch('category', $list_category);
	}

	public function down()
	{
		$this->dbforge->drop_table('category', TRUE); // drop table category
		$this->dbforge->drop_table('author', TRUE); // drop table author
		$this->dbforge->drop_table('book', TRUE); // drop table book
		$this->dbforge->drop_table('book_author', TRUE); // dropt table book_author
		$this->dbforge->drop_table('book_category', TRUE); // drop table book_category
	}
}
