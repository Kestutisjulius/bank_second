<?php

namespace Bank\DB;
use Bank\DB\DataBase;

class JsonDb implements DataBase
{
    private $data, $file;

    public function __construct($file)
    {
        $this->file = $file;
        if (!file_exists(__DIR__.'/../../data/'.$file.'.json')){
            file_put_contents(__DIR__.'/../..data/'.$file.'.json', json_encode([]));
            file_put_contents(__DIR__.'/../../data/'.$file.'_id.json', 0);
        }
        $this->data = json_decode(file_get_contents(__DIR__.'/../../data/'.$file.'.json'));
    }
    public function __destruct()
    {
        file_put_contents(__DIR__.'/../../data/'.$this->file.'.json', json_encode($this->data));
    }

    public function showAll(): array
    {
        return $this->data;
    }

    private function getId(){
        $id = (int) file_get_contents(__DIR__.'/../../data/'.$this->file.'_id.json');
        $id++;
        file_put_contents(__DIR__.'/../../data/'.$this->file.'_id.json', $id);
        return $id;
    }

    public function create(array $data): void
    {
        $data['id'] = $this->getId();
        $this->data[] = $data;
    }

    public function getUserById(int $userId): array
    {
        $db = $this->data;
        $user = [];
        foreach ($db as $item){
            if ((int)$item->id == $userId){
                foreach ($item as $key=>$value){
                    $user[$key] = $value;
                }
            }
        }

        return $user;
    }
}