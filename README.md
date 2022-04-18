# 導入手順

## docker インストール

## docker-compose インストール

## 環境セットアップ
```bash
$ docker-compose up -d --build
```

### vue
```bash
$ docker-compose exec vue bash
$ yarn install
$ yarn build
$ exit
```

### api
```bash
$ docker-compose exec api bash
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ exit
```

#### Linux 環境の場合、下記も実行
```bash
$ chmod 777 storage/logs/
$ chmod 777 storage/framework/cache/
$ chmod 777 storage/framework/sessions/
$ chmod 777 storage/framework/views/
```

### db
```bash
$ docker-compose exec api bash
$ php artisan migrate
$ exit
```

#### テストデータを投入するとき
```bash
$ php artisan migrate:refresh --seed
```

# Heroku Deploy
## ログイン
```

```
* Heloku でアカウントを作成してください。

## アプリ作成
```
$ heroku apps:create [アプリ名]
$ heroku addons:add cleardb:ignite [アプリ名]
$ heroku buildpacks:set heroku/php -a [アプリ名]
$ heroku buildpacks:add heroku/nodejs -a [アプリ名]
$ heroku stack:set container -a [アプリ名]
```
