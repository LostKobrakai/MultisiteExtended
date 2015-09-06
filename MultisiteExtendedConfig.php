<?php

class MultisiteExtendedConfig extends ModuleConfig {
	public function getDefaults() {
		return array(
			"subdomainOptions" => array("www"),
			"clearCache" => 0
		);
	}

	public function getInputfields() {
		$inputfields = parent::getInputfields();

		$c = $this->modules->get('InputfieldCheckboxes'); 
		$c->attr('name', 'subdomainOptions'); 
		$c->label = $this->_("Subdomains");
		$c->description = $this->_("Should the module check certain subdomains for subdomainless domains as well? E.g. for domain.com:");
		$c->addOption("www", "www.domain.com");
		$c->addOption("api", "api.domain.com");
		// $c->addOption("*", "*.domain.com");
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