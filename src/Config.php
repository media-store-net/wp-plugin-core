<?php

namespace MediaStoreNet\WPPluginCore;

/**
 * Configuration handler class.
 *
 * This class is designed to manage and retrieve configuration values
 * from a multi-dimensional configuration array with support for
 * nested keys using dot notation.
 */
class Config
{
	/**
	 * Raw config array.
	 * @var array
	 */
	protected $raw;

	/**
	 * Constructor.
	 *
	 * @param array $raw Raw config array.
	 */
	public function __construct( $raw )
	{
		$this->raw = $raw;
	}

	/**
	 * Returns value stored in given key.
	 * Can acces multidimenssional array values with a DOT(.)
	 * i.e. paypal.client_id
	 *
	 * @param string $key Key.
	 * @param string $sub Child array
	 *
	 * @return mixed
	 */
	public function get( $key, $sub = null )
	{
		if ( empty( $sub ) ) $sub = $this->raw;

		$keys = explode( '.', $key );
		if ( empty( $keys ) ) return;

		if ( array_key_exists( $keys[0], $sub ) ) {
			if ( count( $keys ) == 1 ) {
				return $sub[$keys[0]];
			} else if ( is_array( $sub[$keys[0]] ) ) {
				$sub = $sub[$keys[0]];
				unset( $keys[0] );
				return $this->get( implode( '.', $keys), $sub );
			}
		}
		return;
	}
}
