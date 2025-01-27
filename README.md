Развертывание и запуск
---
- Окружение, на котором проверялось: Ubuntu 22.04, docker v27.0, docker-compose v1.29
- В папке проекта выполнить: ```git clone https://github.com/Machirodont/meleton .```
- Порты 80 и 3306 должны быть свободны
- Скопировать ./laravel/.env.exapmle в ./laravel/.env
  ```cp ./laravel/.env.example ./laravel/.env```
- Запустить команду ```make install``` (на Linux) или соответствущую последовательность команд из Makefile (Windows/Mac)
