FROM nginx
RUN mkdir /usr/share/nginx/html/css && \
mkdir /usr/share/nginx/html/js && \
mkdir /usr/share/nginx/html/images && \
mkdir /usr/share/nginx/html/fonts && \
mkdir /usr/share/nginx/html/sass && \
chmod -R 777 /usr/share/nginx/html

COPY ./css/* /usr/share/nginx/html/css/
COPY ./js/* /usr/share/nginx/html/js/
COPY ./images/* /usr/share/nginx/html/images/
COPY ./fonts/* /usr/share/nginx/html/fonts/
COPY ./sass/* /usr/share/nginx/html/sass/
COPY ./index.html /usr/share/nginx/html/index.html 
