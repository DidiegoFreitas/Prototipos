# Prototipo para Tecnofit

## Passos para a instalação do ambiente

#### Comando para criar e popular o banco de dados
```
mysql -u admin -p < ./scripts/dataBaseTecnofit.sql
```
---

## Comandos auxiliares

#### Exemplo de comando para acessar o banco por linha de comando
```
mysql -u admin -p testeTecnofit
```
---

## Alteração apache2 para que o gerenciamento de rotas funcione
#### Acessar o arquivo `/etc/apache2/sites-available/000-default.conf`
```
vim /etc/apache2/sites-available/000-default.conf
```
#### Adicionar esta configuração
```
<VirtualHost *:80>
    DocumentRoot /var/www/html
    <Directory "/var/www/html">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
#### Reiniciar o apache2 para aplicar as configurações
```
sudo systemctl restart apache2
```

## Fontes (referencias utilizadas para a execução do prototipo)

[install-mariadb-on-ubuntu](https://www.digitalocean.com/community/tutorials/how-to-install-mariadb-on-ubuntu-18-04)

[create-user](https://mariadb.com/kb/en/create-user/)

[create-database](https://mariadb.com/kb/en/create-database/)

[Fetch_API](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch)

---

Dependencias
```
Apache2
PHP 7.4^
Composer 
MariaDB 10
```

Comandos utilizados para preparar o ambiente
```
php -m | grep mysqli
vim /etc/php/7.2/fpm/php.ini
vim /etc/php/7.2/cli/php.ini
sudo systemctl restart php7.2-fpm
composer dump-autoload
```