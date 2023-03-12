<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@asmami.com',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
            'akses' => 'admin',
        ];
        $this->db->table('user')->insert($data);
    }
}
