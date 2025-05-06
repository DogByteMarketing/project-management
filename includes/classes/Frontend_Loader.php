<?php

namespace DogByteMarketing\Project_Management;

use DogByteMarketing\Project_Management\Frontend\Enqueue;
use DogByteMarketing\Project_Management\Frontend\UI;
use DogByteMarketing\Project_Management\Frontend\WooCommerce;
use DogByteMarketing\Project_Management\Frontend\Shortcodes;

class Frontend_Loader {

  /**
	 * Full path and filename of plugin.
	 *
	 * @var string $version Full path and filename of plugin.
	 */
  private $plugin;

	/**
	 * The version of this plugin.
	 *
	 * @var   string $version The current version of this plugin.
	 */
	private $version;
  
  /**
   * __construct
   *
   * @return void
   */
  public function __construct($plugin, $version) {
    $this->plugin  = $plugin;
    $this->version = $version;
  }
  
  /**
   * Init
   *
   * @return void
   */
  public function init() {
    $enabled = Utils::get_option('general', 'enabled');

    if ($enabled) {
      $this->load_enqueue();
    }
  }
  
  /**
   * Load UI
   *
   * @return void
   */
  public function load_enqueue() {
    $gui = new Enqueue($this->plugin, $this->version);
    $gui->init();
  }

}