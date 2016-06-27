<?php

namespace ComponentApi;

class Components
{	
	private $components;

	public function __construct()
	{
		$this->initComponents();
	}

	public function initComponents()
	{
		$this->components = array();
		$this->addComponents();
	}

	public function addComponents()
	{
		$component = new \stdClass();
		$component->key = 'header';
		$component->template = '<div>Hello Dude this is great!</div>';

		$this->addComponent($component);

	}

	public function addComponent($component)
	{
		$this->components[$component->key] = $component;
	}

	public function getComponent($component)
	{
		return $this->components[$component];
	}

}