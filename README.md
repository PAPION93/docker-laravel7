# Docker를 이용한 Laravel 개발환경 구축
> 그리고 Laravel 학습

# Docker

> 로드밸런싱

`docker-compose scale db=1 laravel=3 nginx=1`

# LOCUST 스트레스 테스트

[참고 자료](https://bcho.tistory.com/1369)  
`locust -f .\locustfile.py --port 8080`

# Laravel

### env 환경설정

-   APP_DEBUG : 운영환경에서는 false로 시스템정보 노출하지 않아야 한다.
-   'timezone' => 'Asia/Seoul'
-   'locale' => 'ko'

### [artisan command](https://github.com/PAPION93/TIL/blob/master/Laravel/artisan_command.md)
