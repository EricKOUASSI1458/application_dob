<?php
namespace Core\HTML;
class Form{
	
	/**
	*@var string Données utilisées par le formulaire
	*/
	private $data;

	/**
	*@var string Tag utilisé pour entourer les champs
	*/
	public $surround = 'p';

	/**
	*param array $data données utilisées par le formulaire
	*/
	public function __construct($data = array()){
		$this->data = $data;
	}


	/**
	*@param $html string code HTML a entourer
	*@return string 
	*/
	public function surround($html){
		return "<{$this->surround}>{$html}</{$this->surround}";
	}
    

	protected function getValue($index){
		if(is_object($this->data)){
			return $this->data->$index;
		}
		return isset($this->data[$index]) ? $this->data[$index] : null;	
	}


	/**
	*@param $name string
	*@return string 
	*/
	public function input($name, $label, $options=[]){
		$type = isset($options['type']) ? $options['type'] : 'text';
		return $this->surround('
			<input type="'.$type.'" name="'. $name .'" 
			value="'. $this->getValue($name) .'"
		');
	}


	/**
	*@return string 
	*/
	public function submit(){
		return $this->surround('<button type="submit">Envoyer</button>');
	}

}
?>