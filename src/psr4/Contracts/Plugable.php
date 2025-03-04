<?php

namespace MediaStoreNet\WPPluginCore\Contracts;

/**
 * Interface for defining pluggable modules or plugins.
 */
interface Plugable
{
    /**
     * Called on Plugin's init function.
     * @since 1.0
     */
    public function init();

    /**
     * Called on Plugin's on_admin function.
     * Admin Dashboard.
     * @since 1.0
     */
    public function on_admin();
}
