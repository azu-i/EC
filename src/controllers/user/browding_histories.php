<?php
require_once (__DIR__ . '/../../Auth/Auth.php');
require_once (__DIR__ . '/../../models/BrowdingHistoriesDao.php');

$auth_id = Auth::id();
$browdingHistoriesDao = new BrowdingHistoriesDao();

$browding_histories = $browdingHistoriesDao->tableJoin();
$auth_browding_histories = [];
foreach ($browding_histories as $browding_history) {
  if ($browding_history['user_id'] == $auth_id) $auth_browding_histories[$browding_history['product_id']] = $browding_history;
}
if (count($auth_browding_histories) > 5) {
  $reverse_browding_histories = array_reverse($auth_browding_histories);
  $auth_browding_histories = array_slice($reverse_browding_histories, 0, 5);
}else{
  array_reverse($auth_browding_histories);
}