<?php

/**
 * @file
 * Contains \Drupal\bs_author\Entity\AuthorType.
 */

namespace Drupal\bs_author\Entity;

use Drupal\entity_generic\Entity\GenericType;

/**
 * Defines the entity type class.
 *
 * @ConfigEntityType(
 *   id = "bs_author_type",
 *   label = @Translation("Author type"),
 *   label_singular = @Translation("Author type"),
 *   label_plural = @Translation("Author types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Author type",
 *     plural = "@count Author types"
 *   ),
 *   handlers = {
 *     "access" = "Drupal\entity_generic\Access\GenericAccessControlHandler",
 *     "permission_provider" = "Drupal\entity_generic\Permission\GenericPermissionProvider",
 *     "list_builder" = "Drupal\entity_generic\GenericTypeListBuilder",
 *     "form" = {
 *       "default" = "Drupal\entity_generic\Form\GenericTypeForm",
 *       "add" = "Drupal\entity_generic\Form\GenericTypeForm",
 *       "edit" = "Drupal\entity_generic\Form\GenericTypeForm",
 *       "delete" = "Drupal\entity_generic\Form\GenericTypeDeleteForm"
 *     },
 *   "route_provider" = {
 *      "default" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer bs_author_type",
 *   config_prefix = "type",
 *   bundle_of = "bs_author",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   links = {
 *     "add-form" = "/admin/authors/types/add",
 *     "delete-form" = "/admin/authors/types/manage/{bs_author_type}/delete",
 *     "edit-form" = "/admin/authors/types/manage/{bs_author_type}",
 *     "admin-form" = "/admin/authors/types/manage/{bs_author_type}",
 *     "collection" = "/admin/authors/types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description",
 *     "help",
 *     "new_revision",
 *   }
 * )
 */
class AuthorType extends GenericType implements AuthorTypeInterface {

}