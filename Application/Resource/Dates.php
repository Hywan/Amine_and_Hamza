<?php

namespace Application\Resource;

class Dates
{
    public function get($limit = 1024)
    {
        header('Content-Type: application/json');
        $dates = json_decode(file_get_contents('hoa://Application/Database/Dates.json'), true);

        echo json_encode(array_slice($dates, 0, $limit));

        return;
    }
}
