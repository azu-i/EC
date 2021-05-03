<?php
namespace src\domain\products; 
class Comment
{
  private $detail;

  public function __construct(string $detail)
  {
    if(200 < strlen($detail)){
      throw new \Exception('コメントは200文字未満で入力してください');
    }
    $this->detail = $detail;
  }

  public function detail()
  {
    return $this->detail;
  }
}
?>