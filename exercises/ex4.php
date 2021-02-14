We started using a reverse proxy that helps to speed up the website, if well done.

Our websites will soon implement a new behaviour that will make the website show a different text + image depending on the region where the user comes from:

From Canada/From USA/From USA, New-York

As you can see, the websites differ depending on the IP and we must be sure the reverse proxy take this in consideration.

Our current Nginx configuration is the following:

#/etc/nginx/sites-enabled/caching-server
proxy_cache_path /tmp/nginx levels=1:2 keys_zone=assets_zone:10m inactive=60m;
proxy_cache_key "$scheme$request_method$host$request_uri”;

server {
listen 80;
server_name ourDomain.com;
access_log /var/log/nginx/caching-server.log;

location /static/ {
proxy_cache assets_zone;
resolver ip.of.local.US;
add_header X-Proxy-Cache $upstream_cache_status;
include proxy_params;
proxy_pass http://localhost:1212/US;
}

location /static/ {
proxy_cache assets_zone;
resolver ip.of.local.Canada;
add_header X-Proxy-Cache $upstream_cache_status;
include proxy_params;
proxy_pass http://localhost:1212/Canada;
}

location /static/ {
proxy_cache assets_zone;
resolver ip.of.local.NY;
add_header X-Proxy-Cache $upstream_cache_status;
include proxy_params;
proxy_pass http://localhost:1212/NY;
}
}

Your task:
1/ How would you adapt this configuration to take the new constraint in consideration?
2/ If possible, suggest a new Nginx configuration file to handle this new constraint.

Sollution:

inside the http in nginx.conf:

http {
#/etc/nginx/sites-enabled/caching-server
proxy_cache_path /tmp/nginx levels=1:2 keys_zone=assets_zone:10m inactive=60m;
proxy_cache_key "$scheme$request_method$host$request_uri”;

server {
listen 80;
server_name ourDomain.com;
access_log /var/log/nginx/caching-server.log;

location /static/ {
proxy_cache assets_zone;
resolver ip.of.local.US;
add_header X-Proxy-Cache $upstream_cache_status;
include proxy_params;
proxy_pass http://localhost:1212/US;
}

location /static/ {
proxy_cache assets_zone;
resolver ip.of.local.Canada;
add_header X-Proxy-Cache $upstream_cache_status;
include proxy_params;
proxy_pass http://localhost:1212/Canada;
}

location /static/ {
proxy_cache assets_zone;
resolver ip.of.local.NY;
add_header X-Proxy-Cache $upstream_cache_status;
include proxy_params;
proxy_pass http://localhost:1212/NY;
}
}
}