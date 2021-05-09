<?php

namespace src\domain\products;

class Comment
{
  private $detail;

  public function __construct(string $detail)
  {
    try {
      if (200 < strlen($detail)){
        throw new \Exception('コメントは200文字未満で入力してください');
      }
      if(empty($detail)){
        throw new \Exception('コメントが未入力です');
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
      die;
    }
    $this->detail = $detail;
  }

  public function detail()
  {
    return $this->detail;
  }
}
