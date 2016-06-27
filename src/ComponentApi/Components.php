<?php

namespace ComponentApi;

class Components
{	
	private $components;
	private $twig;
	private $loader;
	private $templateDir;

	public function __construct()
	{
		$this->initComponents();
	}

	public function initComponents()
	{
		
		$this->templateDir = __DIR__ . '/templates';

		$this->loader = new \Twig_Loader_Filesystem($this->templateDir);

		$this->twig = new \Twig_Environment($this->loader);
		
		$this->components = array();
		$this->addComponents();
	}

	public function addComponents()
	{

		$component = new \stdClass();
		$component->key = 'header';
		$component->template = $this->twig->render('header.html', array('name' => 'Fabien'));

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