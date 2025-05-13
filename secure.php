<?php
// アクセスを許可するファイル一覧（ホワイトリスト）
$whitelist = ['hello.txt'];

// ユーザー入力取得
$filename = $_GET['file'] ?? '';

// 入力がホワイトリストにあるか確認
if (!in_array($filename, $whitelist, true)) {
  http_response_code(403);
  exit("アクセスブロックしました！見せられないよ！");
}

// パス構築（files ディレクトリ内）
$path = __DIR__ . '/files/' . $filename;

if (file_exists($path)) {
  echo nl2br(file_get_contents($path));
} else {
  http_response_code(404);
  echo "File not found.";
}
?>