# Mailhog/Symfony POC
## About
Project to try using mailhog with symfony.  This project has two goals:
- Send mail from a basic form and catch it to mailhog
- Use mailhog api to test Mailer without mock (don't mock what you don't own)
## Requirements
- Make 
- Docker
## Usage
- Start project :
```shell
make up
```
- Init project :
```shell
make init
```
- Go inside php container
```shell
make run
```
- Go to [http://localhost/mail](http://localhost/mail) to send mail from form.
- Go to [http://localhost:8025/](http://localhost:8025/) for use mailhog
## Tests
- Launch tests :
```shell
make test
```
- Launch phpunit watcher
```shell
make watch-test
```
  