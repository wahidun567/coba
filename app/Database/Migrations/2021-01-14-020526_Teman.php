<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Teman extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_lengkap'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'jenis_kelamin'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'tempat_lahir'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'tanggal_lahir'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'agama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'foto_teman'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '225',
			],
			'created_at'       => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
			'updated_at'       => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('orang');
	}

	public function down()
	{
		$this->forge->dropTable('orang');
	}
}
