<?php

namespace App\Ship\DaData;



use MoveMoveIo\DaData\Facades\DaDataAddress;

class DaData
{
    public function standardizationExample(string $str) : ?array
    {
        $result = null;
        try {
            $result = DaDataAddress::standardization($str);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return $result;
    }
}