# TRAVERSAL-TEST

ディレクトリトラバーサル（Directory Traversal）の脆弱性を学習・検証するための超簡易PHPアプリケーション

## できること

- 脆弱なファイルアクセスの再現 (`vulnerable.php`)
- 安全なファイルアクセスの実装例 (`secure.php`)
- `../` を使った不正アクセスの試行と防御方法の理解

---

## ディレクトリ構成

```
traversal-test/
├── files/
│   └── hello.txt          # 公開ファイル
├── secret/
│   └── flag.txt           # 閲覧されてはならない機密ファイル
├── vulnerable.php         # 脆弱なファイル読み込み処理（NG例）
└── secure.php             # ホワイトリストで制限する安全な実装（OK例）
```

---

## ローカル起動方法

### 必要条件

- PHP（8系以上推奨）
- macOS / Linux / Windows（WSLでも可）

### 起動コマンド

```bash
php -S localhost:8000
```

ブラウザで以下のURLにアクセスしてください：

- **脆弱なアクセス例**  
  [http://localhost:8000/vulnerable.php?file=../secret/flag.txt](http://localhost:8000/vulnerable.php?file=../secret/flag.txt)

- **安全なアクセス例**  
  [http://localhost:8000/secure.php?file=hello.txt](http://localhost:8000/secure.php?file=hello.txt)

---

## 安全な実装のポイント

- ユーザー入力をそのまま使わない
- ホワイトリスト方式でアクセス可能なファイル名を制限
- `realpath()` を使ってルートディレクトリ外のアクセスをブロックする方法も有効（今後追加予定）

