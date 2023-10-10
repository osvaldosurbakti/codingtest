<?php

namespace App\Controllers;

class User extends BaseController
{

    protected $bd, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }


    public function index()
    {
        $data['title'] = "My Profile";


        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups.name', 'pegawai');

        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('user/index', $data);
    }
}
