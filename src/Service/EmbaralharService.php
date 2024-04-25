<?php

namespace App\Service;

class EmbaralharService
{
    public function embaralhar(string $carateres): array
    {
        $array = explode(',', $carateres);

        shuffle($array);

        return [
            'caracteres_embaralhados' => implode(', ', $array)
        ];
    }
}