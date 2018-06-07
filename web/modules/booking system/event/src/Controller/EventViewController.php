<?php

namespace Drupal\bs_event\Controller;

use Drupal\entity_generic\Controller\GenericViewController;
use Drupal\Core\Entity\EntityInterface;

/**
 * Defines a controller to render a single entity.
 */
class EventViewController extends GenericViewController {

  /**
   * {@inheritdoc}
   */
  public function title(EntityInterface $bs_event_property) {
    return parent::title($bs_event_property);
  }
}
