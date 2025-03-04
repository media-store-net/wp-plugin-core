<?php

namespace MediaStoreNet\WPPluginCore;

use ReflectionClass;
use MediaStoreNet\WPPluginCore\Contracts\Plugable;
use MediaStoreNet\MVC_Core\Engine;

/**
 * Abstract class that provides the structure for addons implementing the Plugable interface.
 */
abstract class Addon implements Plugable
{
    /**
     * Plugin object reference.
     * @var object Plugin
     * @since 1.0
     */
    protected $main;

    /**
     * MVC engine.
     * @var object Plugin
     * @since 1.0
     */
    protected $mvc;

    /**
     * Default constructor.
     * @since 1.0
     *
     * @param object $main Plugin object.
     */
    public function __construct( $main )
    {
        $reflection = new ReflectionClass($this);
        $this->main = $main;
        $this->mvc = new Engine(
            dirname( $reflection->getFileName() ) . '/views/',
            dirname( $reflection->getFileName() ) . '/controllers/',
            $reflection->getNamespaceName()
        );
    }

    /**
     * Called on init.
     * @since 1.0
     *
     * @param object &$main Main plugin object as reference.
     *
     * @return void
     */
    public function init()
    {
        // TODO custom code.
    }

    /**
     * Called on admin.
     * @since 1.0
     *
     * @param object &$main Main plugin object as reference.
     *
     * @return void
     */
    public function on_admin()
    {
        // TODO custom code.
    }
}
