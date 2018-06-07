<?php

/**
 * @file
 * Contains \Drupal\bs_author\AuthorListBuilder.
 */

namespace Drupal\bs_author;

use Drupal\entity_generic\GenericListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Author list builder.
 */
class AuthorListBuilder extends GenericListBuilder {

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
