<?php

namespace Application\Resource;

use Hoa\File;
use Hoa\Xml;

class FileReader extends File\Read
{
    public function rewind()
    {
        return;
    }
}

class Videos
{
    public function get()
    {
        header('Content-Type: application/json');

        $youtubeFeed   = 'https://www.youtube.com/feeds/videos.xml?channel_id=UCWv6CFTtY7oakCV8n12_h2Q';
        $youtubeStream = new FileReader($youtubeFeed);
        $xmlReader     = new Xml\Read($youtubeStream);
        $out           = [];

        foreach ($xmlReader->entry as $entry) {
            $media = $entry->children('http://search.yahoo.com/mrss/')->group;

            $out[] = [
                'title'       => (string) ($entry->title),
                'url'         => $entry->link->readAttribute('href'),
                'published'   => (string) ($entry->published),
                'poster'      => $media->thumbnail->readAttribute('url'),
                'description' => (string) ($media->description)
            ];
        }

        echo json_encode($out);

        return;
    }
}
