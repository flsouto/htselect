<?php

namespace FlSouto;

class HtSelect extends HtChoice{

	protected $caption_text;
	protected $caption_value;

	function caption($text, $value="0"){
		$this->caption_text = $text;
		$this->caption_value = $value;
		return $this;
	}

	protected function renderWritable(){
		$this->resolveOptions();
		$value = $this->value();
		echo "<select {$this->attrs}>\n";
		if($this->caption_text){
			echo "\t<option value=\"$this->caption_value\">$this->caption_text</option>";
		}
		foreach($this->options as $k => $v){
			$selected = $this->compareOptionsValues($k, $value) ? ' selected' : '';
			echo "\t<option value=\"$k\"$selected>$v</option>\n";
		}
		echo "</select>";
	}
	
	protected function renderReadonly(){
		$this->resolveOptions();
		$value = $this->process()->output;
		if(!is_null($value) && isset($this->options[$value])){
			echo $this->options[$value];
		} else {
			echo $this->caption_text;
		}
		$this->attrs(['type'=>'hidden','value'=>$value]);
		echo "<input {$this->attrs}/>";
	}

}






