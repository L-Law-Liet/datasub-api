FROM nginx
COPY nginx.conf /etc/nginx
WORKDIR /var/www/datasub-api
