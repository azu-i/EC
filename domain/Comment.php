<?php 
class Comment
{
  private $detail;

  public function __construct(string $detail)
  {
    if($detail > 200){
      throw new Exception('コメントは200文字未満で入力してください');
    }
    $this->detail = $detail;
  }

  public function detail()
  {
    return $this->detail;
  }
}
?>