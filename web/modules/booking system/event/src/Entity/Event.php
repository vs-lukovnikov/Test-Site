<?php

/**
 * @file
 * Contains \Drupal\bs_event\Entity\Event.
 */

namespace Drupal\bs_event\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\entity_generic\Entity\Generic;

/**
 * Defines the entity class.
 *
 * @ContentEntityType(
 *   id = "bs_event",
 *   label = @Translation("Event"),
 *   label_singular = @Translation("Event"),
 *   label_plural = @Translation("Events"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Event",
 *     plural = "@count Events"
 *   ),
 *   bundle_label = @Translation("Event type"),
 *   handlers = {
 *    "access" = "Drupal\entity_generic\Access\GenericAccessControlHandler",
 *     "event" = "Drupal\entity_generic\Event\GenericEvent",
 *     "storage" = "Drupal\entity_generic\GenericStorage",
 *     "permission_provider" = "Drupal\entity_generic\Permission\GenericPermissionProvider",
 *     "view_builder" = "Drupal\entity_generic\GenericViewBuilder",
 *     "list_builder" = "Drupal\bs_event\EventListBuilder",
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
 *   bundle_entity_type = "bs_event_type",
 *   admin_permission = "administer bs_events",
 *   base_table = "bs_event",
 *   data_table = "bs_event_data",
 *   revision_table = "bs_event_revision",
 *   revision_data_table = "bs_event_revision_data",
 *   translatable = TRUE,
 *   fieldable = TRUE,
 *   field_ui_base_route = "entity.bs_event_type.edit_form",
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
 *     "canonical" = "/event/{bs_event}",
 *     "add-page" = "/admin/events/event/add",
 *     "add-form" = "/admin/events/event/add/{bs_event}",
 *     "edit-form" = "/admin/events/event/{bs_event}/edit",
 *     "delete-form" = "/admin/events/event/{bs_event}/delete",
 *     "delete-multiple-form" = "/admin/events/delete",
 *     "revision-history" = "/admin/events/event/{bs_event}/revisions",
 *     "revision" = "/admin/events/event/{bs_event}/revisions/{bs_event_revision}/view",
 *     "collection" = "/admin/events"
 *   },
 *   entity_generic = {
 *     "entity" = "entity_generic",
 *     "callbacks" = {
 *       "entity.bs_event.canonical.title" = "\Drupal\bs_event\Controller\EventViewController::title",
 *       "entity.bs_event.add_page" = "\Drupal\bs_event\Controller\EventController::addPage",
 *       "entity.bs_event.add_entity_title" = "\Drupal\bs_event\Controller\EventController::addGenericEntityTitle",
 *       "entity.bs_event.add_entity" = "\Drupal\bs_event\Controller\EventController::addGenericEntity",
 *       "entity.bs_event.revision_history" = "\Drupal\bs_event\Controller\EventController::revisionOverview",
 *       "entity.bs_event.revision" = "\Drupal\bs_event\Controller\EventController::revisionShow",
 *       "entity.bs_event.revision.title" = "\Drupal\bs_event\Controller\EventController::revisionPageTitle"
 *     }
 *   }
 * )
 */
class Event extends Generic implements EventInterface {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    // Author_id field for the event.
    // Entity reference field, holds the reference to the Author item.
    $fields['author_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Author'))
      ->setDescription(t('Booking author'))
      ->setSetting('target_type', 'bs_author')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'entity_reference_label',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => 60,
          'placeholder' => '',
        ],
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    // Description field for the event entity.
    $fields['description'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Description'))
      ->setDescription(t('Description of the Event.'))
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

    // Geolocation field for the event entity.

    $fields['gps'] = BaseFieldDefinition::create('geolocation')
      ->setLabel(t('GPS Coordinates'))
      ->setDescription(t('The GPS Coordinates of this Destination. You may enter address in the search field and the location will be retrieved via Google Maps.'))
      ->setRevisionable(TRUE)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'geolocation_map',
        'weight' => -2,
        'settings' => [
          'set_marker' => '1',
          'info_text' => 'lat,long: :lat,:lng',
          'google_map_settings' => [
            'type' => 'TERRAIN',
            'zoom' => 9,
            'mapTypeControl' => TRUE,
            'streetViewControl' => FALSE,
            'zoomControl' => TRUE,
            'scrollwheel' => FALSE,
            'disableDoubleClickZoom' => FALSE,
            'draggable' => TRUE,
            'height' => '300px',
            'width' => '100%',
            'info_auto_display' => TRUE,
            'disableAutoPan' => TRUE,
            'preferScrollingToZooming' => FALSE,
            'gestureHandling' => 'auto',
          ],
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'geolocation_googlegeocoder',
        'weight' => -2,
        'title' => t('title thing'),
        'settings' => [
          'set_marker' => '1',
          'info_text' => t('Some info text'),
          'use_overridden_map_settings' => 0,
          'google_map_settings' => [
            'type' => 'TERRAIN',
            'zoom' => 5,
            'mapTypeControl' => TRUE,
            'streetViewControl' => FALSE,
            'zoomControl' => TRUE,
            'scrollwheel' => FALSE,
            'disableDoubleClickZoom' => FALSE,
            'draggable' => TRUE,
            'height' => '300px',
            'width' => '100%',
            'info_auto_display' => TRUE,
            'disableAutoPan' => TRUE,
            'preferScrollingToZooming' => FALSE,
            'gestureHandling' => 'auto',
          ],
          'populate_address_field' => TRUE,
          'target_address_field' => 'address',
          'default_longitude' => 45.39459,
          'default_latitude' => 42.73639,
          'auto_client_location' => FALSE,
          'auto_client_location_marker' => FALSE,
          'allow_override_map_settings' => FALSE,
        ],
      ]);

    // field with number of booking places for the event entity.
    $fields['num_places'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Places'))
      ->setDescription(t('The amount of reserved places.'))
      ->setRevisionable(TRUE)
      ->setTranslatable(TRUE)
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'integer',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'integer',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);


    // date field for the event entity.
    $fields['date'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('Event date'))
      ->setDescription(t('Date when the event will take place.'))
      ->setRevisionable(TRUE)
      ->setTranslatable(TRUE)
      ->setSettings([
        'datetime_type' => 'date',
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'datetime_default',
        'settings' => [
          'format_type' => 'medium',
        ],
        'weight' => 14,
      ])
      ->setDisplayOptions('form', [
        'type' => 'datetime_default',
        'weight' => 14,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
