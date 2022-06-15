<?php
foreach ($this->data as $key => $item){
    if ((int)$item->id == $userId){
        unset($this->data[$key]);
        $this->data = array_values($this->data); //reasign array keys
        break;
    }
}
//Array ( [0] => Bank\DB\JsonDbdata [1] => Bank\DB\JsonDbfile )


