# Drupal Test Task
## Create event booking system on drupal 8. 

### Requirements
1. Event should have a title, description, date, location (pin on the map), number of places. 
2. Create page (using views) with all available events with ability to click on event and see more details. 
3. On the event page there should be an ability to book places for an event. 
4. Write a block with 5 most recent events (it should be a custom module. Don't use views for this block). 
5. The event should have an author (separate content type).
6. Author page should display events list by this author (using views)


## Usage
1. Run composer install.
2. Go over the dicectory web/.
3. Run command ../bin/drush cim to import config files from directory config/sync. 

