FROM nginx:1.22

RUN ln -sf /dev/stdout /var/log/nginx/access.log && \
    ln -sf /dev/stderr /var/log/nginx/error.log && \
    rm -rf /etc/nginx/conf.d/*

COPY docker/nginx/conf/api.conf /etc/nginx/conf.d/default.conf