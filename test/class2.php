<?php
class file_writer{
    
    public $text ="";
    public $file ;
    public const APPEND = FILE_APPEND;

    function __construct($file)
    {
        $this->file = $file;
    }
    public function add_text($text){
        $this->text .= $text;
        return $this;
    }

    public function space(){
        $this->text .= PHP_EOL;
        return $this;
    }

    public function commit($flag =null){
        file_put_contents($this->file,$this->text);
        $this->text = "";
        return $this;

    }

}

$kaguya = new file_writer('sample.txt');

$kaguya->add_text('ラップだよー')->space()->add_text('こんりんざい会長に教えるのは懲り懲りだよー')->commit(file_writer::APPEND);