#!/usr/bin/env bash

#cp /opt/lampp/htdocs/webalizer/jwt/resources/model/Banco.class.php Banco.class.php
git init
git remote add origin git@github.com:gusleaooliveira/manipulaBanco.git
# git remote add origin https://github.com/gusleaooliveira/posts.git
git add .
git commit -m "alteração feita em:$(date +%d/%m/%Y-%k:%M:%S)"
git push -u origin master
