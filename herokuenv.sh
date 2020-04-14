heroku config:add APP_URL=http://localhost:8000
# database
heroku config:add DB_HOST=ec2-34-193-232-231.compute-1.amazonaws.com
heroku config:add DB_PORT=5432
heroku config:add DB_DATABASE=dbit71n4mioq7q
heroku config:add DB_USERNAME=urwbdxaikemcmn
heroku config:add DB_PASSWORD=63f5d0a85dc84e87c6ba06833ab9a32bdc21bd0845be5553596a6694822b3bdb
# paypal configuratoin
heroku config:add CLIENT_ID=AeEwKTEsfKC5y7pxN5mJVOVL22xzEtIQfGQwGR_clWktSJfJoqjxGEygBMfKFvCtJcx7F27EO61GweLb
heroku config:add CLIENT_SECRET=EIuQDgRENQfwFHvl6NT2BoZjJ2U7ZGQAjiSY1Oh3bIPI7ItOhNEgXRTXkxpB6xBYbBi4aodK9Abx3g9f

#mail configuration
heroku config:add MAIL_DRIVER=smtp
heroku config:add MAIL_HOST=smtp.gmail.com
heroku config:add MAIL_PORT=587
heroku config:add MAIL_USERNAME=ashish336b@gmail.com
heroku config:add MAIL_PASSWORD=xbapaqjzlhsaxjag
heroku config:add MAIL_ENCRYPTION=tls

