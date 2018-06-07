<?php

namespace Drupal\bs_author\Controller;

use Drupal\entity_generic\Controller\GenericViewController;
use Drupal\Core\Entity\EntityInterface;

/**
 * Defines a controller to render a single entity.
 */
class AuthorViewController extends GenericViewController {

  /**
   * {@inheritdoc}
   */
  public function title(EntityInterface $bs_author_property) {
    return parent::title($bs_author_property);
  }
}
