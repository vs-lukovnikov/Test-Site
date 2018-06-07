<?php

/**
 * @file
 * Contains \Drupal\bs_event\Entity\EventType.
 */

namespace Drupal\bs_event\Entity;

use Drupal\entity_generic\Entity\GenericType;

/**
 * Defines the entity type class.
 *
 * @ConfigEntityType(
 *   id = "bs_event_type",
 *   label = @Translation("Event type"),
 *   label_singular = @Translation("Event type"),
 *   label_plural = @Translation("Event types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Event type",
 *     plural = "@count Event types"
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
 *   admin_permission = "administer bs_event_type",
 *   config_prefix = "type",
 *   bundle_of = "bs_event",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   links = {
 *     "add-form" = "/admin/events/types/add",
 *     "delete-form" = "/admin/events/types/manage/{bs_event_type}/delete",
 *     "edit-form" = "/admin/events/types/manage/{bs_event_type}",
 *     "admin-form" = "/admin/events/types/manage/{bs_event_type}",
 *     "collection" = "/admin/events/types"
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
class EventType extends GenericType implements EventTypeInterface {

}