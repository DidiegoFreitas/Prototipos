# Prototipo para Tecnofit

## Dependencias
```
Apache2
PHP 7.2.24^
Composer 1.6.3
MariaDB 10
```

## Passos para a preparação do ambiente após o git clone
#### Criar um .env apartir do exemplo
```
cp .env.example .env
```
#### Comando para rodar o composer
```
composer dump-autoload
```
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

[install-composer](https://cursos.alura.com.br/forum/topico-instalando-no-linux-304622)

[create-user](https://mariadb.com/kb/en/create-user/)

[create-database](https://mariadb.com/kb/en/create-database/)

[Fetch_API](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch)

---
