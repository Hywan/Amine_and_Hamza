<?php

namespace Application\Resource;

class Album
{
    public function get($albumId)
    {
        header('Content-Type: application/json');
        $discography = json_decode(
            file_get_contents('hoa://Application/Database/Discography.json'),
            false
        );

        $gotcha = false;

        foreach ($discography as $album) {
            if ($album->id === $albumId) {
                $gotcha = true;
                break;
            }
        }

        if (false === $gotcha) {
            header('HTTP/1.1 404 Not Found');
            echo 'false';

            return;
        }

        echo json_encode($album);

        return;
    }
}
