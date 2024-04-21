<?php

namespace App\Service;

class CpfService
{
    public function gerarCpf()
    {
        $noveDigitos = '';
        for ($i = 0; $i < 9; $i++) {
            $noveDigitos .= mt_rand(0, 9);
        }

        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += $noveDigitos[$i] * (10 - $i);
        }
        $primeiroDigito = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);

        $cpf = $noveDigitos . $primeiroDigito;

        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += $cpf[$i] * (11 - $i);
        }
        $segundoDigito = ($soma % 11 < 2) ? 0 : 11 - ($soma % 11);

        $cpf .= $segundoDigito;

        return [
            'cpf_gerado' => $cpf,
        ];
    }
}