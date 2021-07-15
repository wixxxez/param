<?php
class DecodeService  {

    private $jsonArray;
    private $filename = "config.json";
    public function __construct()
    {
        $this->jsonArray = json_decode(file_get_contents($this->filename),true);
    }
    public function decodeArray($array){
        if(!empty($array)){
            $newjson=json_encode($array);
            if(file_put_contents($this->filename,$newjson)){
                $this->jsonArray =$newjson;
            }
            else {
                return "Not valid comment";
            }
            return $this->jsonArray;
        }
        
    }

    public function getEncodedArray(){
        return $this->jsonArray;
    }

}
$service = new DecodeService;

$service->decodeArray($_POST);



?>
