<?php
class Forex{
    public $cuurencyRates = null;
    public function __construct($url = null)
    {
        $this->cuurencyRates = array();
        if($url != null)
        {
            $this->load($url);
        }
    }
    public function load($url)
    {
        $content = file_get_contents($url);
        $xml =  simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA );     
        
        foreach($xml->Cube->Cube->Cube as $rate)
        {
            $key = (String) $rate['currency'];
            $value = $rate['rate'];
            
            $this->set($key, $value);
        }
          
    }
    public function set($currency, $rate)
    {
        $this->cuurencyRates[$currency] = $rate;
    }
    public function convert($from, $to)
    {
        $to = str_replace('.', '.', $this->cuurencyRates[$to]) * 1;
        $from = str_replace('.', '.', $this->cuurencyRates[$from]) * 1;
        return $to/$from;
    }
}
?>
