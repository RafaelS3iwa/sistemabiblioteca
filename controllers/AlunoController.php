<?php 

class AlunoController
{
    private $alunoModel; 

    public function __construct()
    {
        $this->alunoModel = new Aluno(); 
    }
}

