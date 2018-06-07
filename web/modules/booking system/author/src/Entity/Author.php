<?php

/**
 * @file
 * Contains \Drupal\bs_author\Entity\Author.
 */

namespace Drupal\bs_author\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\entity_generic\Entity\Generic;

/**
 * Defines the entity class.
 *
 * @ContentEntityType(
 *   id = "bs_author",
 *   label = @Translation("Author"),
 *   label_singular = @Translation("Author"),
 *   label_plural = @Translation("Authors"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Author",
 *     plural = "@count Authors"
 *   ),
 *   bundle_label = @Translation("Author type"),
 *   handlers = {
 *    "access" = "Drupal\entity_generic\Access\GenericAccessControlHandler",
 *     "event" = "Drupal\entity_generic\Event\GenericEvent",
 *     "storage" = "Drupal\entity_generic\GenericStorage",
 *     "permission_provider" = "Drupal\entity_generic\Permission\GenericPermissionProvider",
 *     "view_builder" = "Drupal\entity_generic\GenericViewBuilder",
 *     "list_builder" = "Drupal\bs_author\AuthorListBuilder",
 *     "views_data" = "Drupal\entity_generic\GenericViewsData",
 *     "translation" = "Drupal\entity_generic\GenericTranslationHandler",
 *     "form" = {
 *       "default" = "Drupal\entity_generic\Form\GenericForm",
 *       "add" = "Drupal\entity_generic\Form\GenericForm",
 *       "edit" = "Drupal\entity_generic\Form\GenericForm",
 *       "delete" = "Drupal\entity_generic\Form\GenericDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\entity_generic\Routing\GenericRouteProvider",
 *       "delete-multiple" = "Drupal\entity\Routing\DeleteMultipleRouteProvider"
 *     }
 *   },
 *   bundle_entity_type = "bs_author_type",
 *   admin_permission = "administer bs_authors",
 *   base_table = "bs_author",
 *   data_table = "bs_author_data",
 *   revision_table = "bs_author_revision",
 *   revision_data_table = "bs_author_revision_data",
 *   translatable = TRUE,
 *   fieldable = TRUE,
 *   field_ui_base_route = "entity.bs_author_type.edit_form",
 *   common_reference_target = TRUE,
 *   entity_keys = {
 *     "id" = "id",
 *     "revision" = "vid",
 *     "label" = "name",
 *     "langcode" = "langcode",
 *     "uuid" = "uuid",
 *     "status" = "status",
 *     "created" = "created",
 *     "changed" = "changed",
 *     "uid" = "uid"
 *   },
 *   links = {
 *     "canonical" = "/author/{bs_author}",
 *     "add-page" = "/admin/authors/author/add",
 *     "add-form" = "/admin/authors/author/add/{bs_author}",
 *     "edit-form" = "/admin/authors/author/{bs_author}/edit",
 *     "delete-form" = "/admin/authors/author/{bs_author}/delete",
 *     "delete-multiple-form" = "/admin/authors/delete",
 *     "revision-history" = "/admin/authors/author/{bs_author}/revisions",
 *     "revision" = "/admin/authors/author/{bs_author}/revisions/{bs_author_revision}/view",
 *     "collection" = "/admin/authors"
 *   },
 *   entity_generic = {
 *     "entity" = "entity_generic",
 *     "callbacks" = {
 *       "entity.bs_author.canonical.title" = "\Drupal\bs_author\Controller\AuthorViewController::title",
 *       "entity.bs_author.add_page" = "\Drupal\bs_author\Controller\AuthorController::addPage",
 *       "entity.bs_author.add_entity_title" = "\Drupal\bs_author\Controller\AuthorController::addGenericEntityTitle",
 *       "entity.bs_author.add_entity" = "\Drupal\bs_author\Controller\AuthorController::addGenericEntity",
 *       "entity.bs_author.revision_history" = "\Drupal\bs_author\Controller\AuthorController::revisionOverview",
 *       "entity.bs_author.revision" = "\Drupal\bs_author\Controller\AuthorController::revisionShow",
 *       "entity.bs_author.revision.title" = "\Drupal\bs_author\Controller\AuthorController::revisionPageTitle"
 *     }
 *   }
 * )
 */
class Author extends Generic implements AuthorInterface {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    // Description field for the author entity.
    $fields['description'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Description'))
      ->setDescription(t('Description of the Author.'))
      ->setSettings([
        'default_value' => '',
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'text_default',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'text_textarea',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
