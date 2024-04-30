
## Start
```
php artisan doctrine:schema:create
php artisan doctrine:generate:proxies
```

## Create book 
### CLI
```
php artisan book:create 
```
### API
**/api/create**
#### Request
```json
{
"title": "test",
"price": 20.2,
"author": 2,
"publisher": 1
}
```
#### Response
```json
{
    "result": "success"
}
```
