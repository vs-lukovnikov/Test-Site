<?php

/**
 * @file
 * Contains \Drupal\bs_event\EventListBuilder.
 */

namespace Drupal\bs_event;

use Drupal\entity_generic\GenericListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Event list builder.
 */
class EventListBuilder extends GenericListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {

    $header['name'] = $this->t('Name');
    $header['description'] = $this->t('Description');

    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {

    $row['name'] = $entity->toLink();
    $row['description'] = $entity->get('description')->value;

    return $row + parent::buildRow($entity);
  }

}
