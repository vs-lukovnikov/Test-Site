<?php
namespace Drupal\event_lister\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Event Lister Block' Block.
 *
 * @Block(
 *   id = "event_lister_block",
 *   admin_label = @Translation("Most recent events:"),
 * )
 */
class EventListerBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $query = \Drupal::database()->select('bs_event_data', 'e');
    $query->fields('e', ['id', 'name', 'date']);
    $query->condition('e.date', date("Y-m-d", time()), '>');
    $query->orderBy('e.date', 'ASC');
    $query->join('bs_author_data', 'a', 'a.id = e.author_id');
    $query->fields('a', ['name']);
    $query->range(0, 5);

    $events = $query->execute()->fetchAllAssoc('id');
    $events = json_decode(json_encode($events), TRUE);
    return [
      '#theme' => 'event_lister',
      '#events' => $events,
    ];
  }

}