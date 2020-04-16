# Docker를 이용한 Laravel 개발환경 구축
## Docker


## LOCUST 스트레스 테스트
[참고 자료](https://bcho.tistory.com/1369)  
`locust -f .\locustfile.py --port 8080`  

## Laravel
### env 환경설정
 - APP_DEBUG : 운영환경에서는 false로 시스템정보 노출하지 않아야 한다.
 - 'timezone' => 'Asia/Seoul'  
 - 'locale' => 'ko'  

### Model 생성
```
$ php artisan make:model Post
$ php artisan make:model Author
```
> 모델명은 단수, 테이블명은 복수

### DB Migration 생성
```
$ php artisan make:migration create_posts_table
$ php artisan make:migration create_authors_table
$ php artisan make:migration add_name_to_authors_table
```
> 생성 후 database/migrations 디렉토리 하위에 생성된 파일 작업  

### 마이그레이션과 롤백 그리고 초기화
```
$ php artisan migrate
$ php artisan migrate:rollback    // 직전 롤백
$ php artisan migrate:reset       // 데이터베이스 초기화
$ php artisan migrate:refresh     // reset -> 처음부터 다시 실행
```

### RESTful Resource Controller 만들기
```
php artisan make:controller PostsController --resource
```

### Frontend 스캐폴딩  
1. composer require laravel/ui --dev  
2. php artisan ui react --auth
    - 스캐폴딩 삭제방법 `php artisan preset none`
3. CSS 작성 필요

