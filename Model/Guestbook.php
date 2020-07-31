<?php


class Guestbook
{
    private $masterArray = [];

    public function getAllPosts(): array
    {
        return $this->masterArray;
    }

    public function pushToMaster($session)
    {
        $this->masterArray[] = $session;
    }

    public function messageLoader($array)
    {
        $data = json_encode($array);
        file_put_contents("data/messages.json",$data);
    }

    public function loaderDecoder()
    {
        return json_decode(file_get_contents("data/messages.json"), true);
    }


}