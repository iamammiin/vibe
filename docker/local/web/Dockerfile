FROM nginx:1.17.7

ARG WWW_DATA_USER
ARG WWW_DATA_GROUP

RUN usermod -u ${WWW_DATA_USER} www-data && \
    groupmod -g ${WWW_DATA_GROUP} www-data
