<?php
require_once (__DIR__ . '/../../auth/Auth.php');
require_once (__DIR__ . '/../../models/BrowdingHistoriesDao.php');

$authId = Auth::id();
$browdingHistoriesDao = new BrowdingHistoriesDao();

$browdingHistories = $browdingHistoriesDao->tableJoin();
$authBrowdingHistories = [];
foreach ($browdingHistories as $browdingHistory) {
  if ($browdingHistory['user_id'] == $authId) $authBrowdingHistories[$browdingHistory['product_id']] = $browdingHistory;
}
if (count($authBrowdingHistories) > 5) {
  $reverseBrowdingHistories = array_reverse($authBrowdingHistories);
  $authBrowdingHistories = array_slice($reverseBrowdingHistories, 0, 5);
}else{
  array_reverse($authBrowdingHistories);
}