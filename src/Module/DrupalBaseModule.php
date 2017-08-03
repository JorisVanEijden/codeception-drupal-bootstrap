<?php

namespace Codeception\Module;

abstract class DrupalBaseModule extends Module {

  protected $config = ['root' => NULL];

  /**
   * Get the Drupal root directory.
   *
   * @return string
   *   The root directory of the Drupal installation.
   */
  public function getDrupalRoot() {
    // We can't get getcwd() as a default parameter, so this will have to do.
    if ($this->config['root'] === NULL) {
      $rootDir = codecept_root_dir();
    }
    // Allow a user to pass an relative or an absolute path.
    elseif (isset($this->config['relative']) && $this->config['relative'] === 'yes') {
      $rootDir = codecept_root_dir($this->config['root']);
    }
    else {
      $rootDir = $this->config['root'];
    }
    return $rootDir;
  }

}
