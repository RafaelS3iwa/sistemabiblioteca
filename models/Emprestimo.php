<?php 

class Emprestimo{

    protected $db;
    protected $table = "emprestimos";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

}