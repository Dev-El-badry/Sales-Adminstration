<?php
	namespace App\Html;

	/**
	* To Generate Bootstrap Forms Dynamic
	*/
	class BootstrapForm extends Form
	{
		private $data;

		public function __construct($data = array())
		{
			$this->data = $data;
		}

		protected function surround($index) {
			return "<div class='control-form'>".$index."</div>";
		}

		protected function getValue($index) {
			if (is_object($this->data)) {
				return $this->data->$index;
			} 
			
			return isset($this->data[$index]) ?	$this->data[$index] : null;
		}

		
		public function input($label, $name, $attributes = []) {
			$label = "<label>".$label."</label>";
			$name = "<input class='form-control' name=".$name." value='".$this->getValue($name)."' ".$this->extractAttr($attributes)."/>";

			return $this->surround($label.$name);
		}

		public function file($name, $attributes = []) {
			$name = '<input type="file" name="'.$name.'" '.$this->extractAttr($attributes).' />';

			return $this->surround($name);
		}

		public function select($label, $name, $attributes = [], $options, $first_blank = false) {
			$label = "<label>".$label."</label>";

			$select = "<select class='form-control' name='".$name."' ".$this->extractAttr($attributes).">";
			if ($first_blank) {
				$select .="<option value=''></option>";
			}
			foreach ($options as $key => $value) {
				$attrOpt = '';
				if ($key == $this->getValue($name)) {
					$attrOpt = 'selected';
				}

				$select .="<option value='".$key."' ".$attrOpt.">".$value."</option>";
			}

			$select .= "</select>";  

			return $this->surround($label.$select);
		}

		public function button($name, $value) {
			return "<button type='submit' class='btn btn-primary' name=".$name." style='margin-top: 10px'>".$value."</button>";
		}
	}