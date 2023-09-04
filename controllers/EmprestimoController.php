<?php

class EmprestimoController
{
    private $emprestimoModel; 

    public function __construct()
    {
        $this->emprestimoModel = new Emprestimo(); 
    }
}
