<?php
/**
* Controller for the Block in the lotus module for D8.
* Add this file to src/Plugin/Block/ folder of the module
**/
namespace Drupal\lotus\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
 * Provides a 'Hello' Block
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 * )
 */
class HelloBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => $this->t('Welcome to Lotus website!'),
    );
  }
}
