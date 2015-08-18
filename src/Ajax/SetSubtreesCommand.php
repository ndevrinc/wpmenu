<?php

/**
 * @file
 * Contains \Drupal\toolbar\Ajax\SetSubtreesCommand.
 */

namespace Drupal\wpmenu\Ajax;

use Drupal\Core\Ajax\CommandInterface;

/**
 * Defines an AJAX command that sets the wpmenu subtrees.
 */
class SetSubtreesCommand implements CommandInterface {

  /**
   * The wpmenu subtrees.
   *
   * @var array
   */
  protected $subtrees;

  /**
   * Constructs a SetSubtreesCommand object.
   *
   * @param array $subtrees
   *   The toolbar subtrees that will be set.
   */
  public function __construct($subtrees) {
    $this->subtrees = $subtrees;
  }

  /**
   * {@inheritdoc}
   */
  public function render() {
    return [
      'command' => 'setWpmenuSubtrees',
      'subtrees' => array_map('strval', $this->subtrees),
    ];
  }

}
