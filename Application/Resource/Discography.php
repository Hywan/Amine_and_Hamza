<?php

namespace Application\Resource;

class Discography
{
    public function get()
    {
        header('Content-Type: application/json');
        echo file_get_contents('hoa://Application/Database/Discography.json');

        return;
    }
}
