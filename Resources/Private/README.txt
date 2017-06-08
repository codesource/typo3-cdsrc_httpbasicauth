############ CGI #############
CGI php require this rule

<IfModule mod_rewrite.c>
    RewriteEngine on

    RewriteRule ^.*$ - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
</IfModule>