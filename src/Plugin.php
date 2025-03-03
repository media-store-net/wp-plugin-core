<?php

namespace MediaStoreNet\WPPluginCore;

use MediaStoreNet\MVC_Core as Engine;

/**
 * Abstract class representing a Plugin.
 *
 * This class serves as a base class for plugins. It provides essential
 * properties and a constructor for initializing configuration and the
 * MVC engine.
 */
abstract class Plugin
{
	/**
	 * Configuration file.
	 * @var array
	 */
	protected $config;

	/**
	 * MVC engine.
	 * @var Engine;
	 */
	protected $mvc;

	/**
	 * Main constructor
	 *
	 * @param array $config Configuration options.
	 */
	public function __construct( Config $config )
	{
		$this->config = $config;
		$this->mvc = new Engine(
			$this->config->get('paths.views'),
			$this->config->get('paths.controllers'),
			$this->config->get('namespace')
		);
	}
}
