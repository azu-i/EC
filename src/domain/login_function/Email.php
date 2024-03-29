<?php
namespace src\domain\login_function;

// ini_set('display_errors', "On");
class Email
{
  private $mail;

  public function __construct(string $mail)
  {
    if (!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $mail)) {
      throw new \Exception('メールアドレスの入力が正しくありません');
    }
    $this->mail = $mail;
  }

  public function mail(): string
  {
    return $this->mail;
  }
}