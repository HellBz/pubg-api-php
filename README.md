# PUBG-PHP




# Example Request Get Matches from users

 ### params 
 
 
``` 
Realm Matches;
page[offset] integer (query) Allows paging over results.
Usage: page[offset]=0

page[limit] integer (query) Use to limit the number of results returned.

Value Range: 1-5

Default Value: 5

Usage: page[limit]=5"

sort string (query) Sort match results based on creation time.

Values:

createdAt -createdAt Default: createdAt (ascending)

Usage: sort=createdAt"

filter[createdAt-start] string (query) Filter matches based on their creatdAt times.

Note:

The data retention period is 14 days. The max search time span between createdAt-start and createdAt-end is 14 days. Must occur before end time. Format is iso8601. Value Range: [now() - 14 days] -> now()

Default: now() - 14 days

Usage: filter[createdAt-start]=2018-01-01T00:00:00Z"

filter[createdAt-end] string (query) Filter matches based on their creatdAt times.

Note:

The max search time span between createdAt-start and createdAt-end is 14 days. Default:

now() Usage: filter[createdAt-end]=2018-01-01T00:00:00Z"

filter[playerIds] string (query) Filters by player Ids.

Usage: filter[playerIds]=playerId-1,playerId-2,…

filter[gameMode] string (query) Filter by game mode

Usage: filter[gameMode]=squad,...
```

### Request 

```php
$plataform = 'pc-sa';
$sort = '-createdAt';
$limit = 5; 
$offset = 0; 
$filter_start = date(DateTime::ISO8601);
$filter_end = date(DateTime::ISO8601);
$player_ids = array('76561198078739619'); 
$game_mode = 'squad'; // solo,squad ... 
print_r($pubg->matches($plataform,$sort,$limit,$offset,$filter_start,$filter_end,$player_ids,$game_mode));
```

# GET Match by ID

```php



$plataform = 'pc-sa';
$gameid = '00000000-0000-0000-0000-000000000000';
print_r($pubg->get_match_by_id($plataform,$gameid));

```


# GET API STATUS

```php



print_r($pubg->status());


```