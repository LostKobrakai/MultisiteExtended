<?php

class MultisiteExtendedConfig extends ModuleConfig {
	public function getDefaults() {
		return array(
			"tryWWW" => 0,
			"clearCache" => 0
		);
	}

	public function getInputfields() {
		$inputfields = parent::getInputfields();

		$c = $this->modules->get('InputfieldCheckbox'); 
		$c->attr('name', 'tryWWW'); 
		$c->label = $this->_("Try www.*");
		$c->description = $this->_("Should the module check www.* for subdomainless domains as well?");
		$inputfields->add($c); 

		$c = $this->modules->get('InputfieldCheckbox'); 
		$c->attr('name', 'clearCache'); 
		$c->label = $this->_("Clear Cache");
		$c->description = $this->_("Clear the cache on the next module's instanciation.");
		$c->collapsed = Inputfield::collapsedBlank;
		$inputfields->add($c); 

		return $inputfields; 
	}
}