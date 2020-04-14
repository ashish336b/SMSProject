heroku config:add APP_URL=http://localhost:8000
# database
heroku config:add DB_HOST=ec2-34-193-232-231.compute-1.amazonaws.com
heroku config:add DB_PORT=5432
heroku config:add DB_DATABASE=dbit71n4mioq7q
heroku config:add DB_USERNAME=urwbdxaikemcmn
heroku config:add DB_PASSWORD=63f5d0a85dc84e87c6ba06833ab9a32bdc21bd0845be5553596a6694822b3bdb
# paypal configuratoin
heroku config:add CLIENT_ID=AadsjYS4GJKqBF-mHF4cKhPm--O5OarGqwAXjsWbm78aL_bGp2rD4_24DQnLSM88uc__mLpte-l3uFME
heroku config:add CLIENT_SECRET=EIcZK4ngTTCpQyuf0e7fNiMrpeHAKj5pLFPlAJXawLNVFYC49xudAqgRfhSHDYE7nIIf1QtNOuaPep9X

#mail configuration
heroku config:add MAIL_DRIVER=smtp
heroku config:add MAIL_HOST=smtp.gmail.com
heroku config:add MAIL_PORT=587
heroku config:add MAIL_USERNAME=shrijanmalakar@gmail.com
heroku config:add MAIL_PASSWORD=tybzblhqmetfphiu
heroku config:add MAIL_ENCRYPTION=tls

