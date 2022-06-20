# Delaunay's evelopment enviroment

## 環境変数

- PHP | 7.4.5
- node | 11.7.0
- npm | 6.9.0

## ファイル構成

```
- _public : gulp init後生成、公開用フォルダ
- _public : gulp init後生成、公開用Wordpressフォルダ
- _src : 編集するファイル一式(☆)
- その他開発用の.jsonファイルなど
```


## 開発始める時

- dockerをインストールしておいてください。

```
docker compose up
````


## windowsの方へ
phpのビルトインサーバを使用して、ローカルサーバを立ち上げています。Macの場合はデフォルトで入っていますが、windows環境の場合は、下記を確認してください。
https://half-half.info/?p=707
