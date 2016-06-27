<?php

namespace ComponentApi;

class Components
{	
	private $components;
	private $twig;
	private $loader;

	public function __construct()
	{
		$this->initComponents();
	}

	public function initComponents()
	{

		$this->loader = new \Twig_Loader_Array(array(
		    'index' => 'Hello {{ name }}!',
		));

		$this->twig = new \Twig_Environment($this->loader);
		
		$this->components = array();
		$this->addComponents();
	}

	public function addComponents()
	{

		$component = new \stdClass();
		$component->key = 'header';
		$component->template = $this->twig->render('index', array('name' => 'Fabien'));

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