<?php

namespace Application\Resource;

class Dates
{
    public function get()
    {
        header('Content-Type: application/json');
        echo file_get_contents('hoa://Application/Database/Dates.json');

        return;
    }
}
