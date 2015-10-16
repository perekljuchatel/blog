# Minicurso - Desenvolvimento Web com AngularJS e PHP

Material utilizado nas aulas do minicurso de Desenvolvimento Web com AngularJS e PHP
**Dias:** 20 e 21/10 de 2015
**Horário:** 19h - 22h
**Local:** CEULP/ULBRA, Palmas, Tocantins, Brasil
**Inscreva-se:** [www.ulbra-to.br/encoinfo](www.ulbra-to.br/encoinfo)

**Instrutores:**

- [Diego Olveira](https://github.com/diegopso)
- [Van Neves](https://github.com/vaneves)

## Ambiente de Desenvolvimento

Instalação dos softwares utilizados no curso.

### MySQL
Instalação
	
	sudo apt-­get install mysql­-server mysql­-client

Teste para ver se a instalação foi um sucesso:

	mysql --version

Saída:

	mysql  Ver 14.14 Distrib 5.5.44, for debian-linux-gnu (i686) using readline 6.

### PHP
Instalação

	sudo apt­-get install php5-­fpm
	sudo apt­-get install php5-­cli php5-­curl php-­apc

Teste para ver se a instalação foi um sucesso:

	php -v

Saída:

	PHP 5.6.13-1+deb.sury.org~trusty+3 (cli) 
	Copyright (c) 1997-2015 The PHP Group
	Zend Engine v2.6.0, Copyright (c) 1998-2015 Zend Technologies
	    with Zend OPcache v7.0.6-dev, Copyright (c) 1999-2015, by Zend Technologies
	    with Xdebug v2.3.2, Copyright (c) 2002-2015, by Derick Rethans


### Composer
Instalação

	curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

Teste para ver se a instalação foi um sucesso:

	composer --version

Saída:

	Composer version 1.0-dev (afd98b74f13b9def1b2447f16fd0bfd4d96dff94) 2015-08-31 09:58:50


### Node.JS
Instalação

	sudo apt­-get install nodejs

Teste para ver se a instalação foi um sucesso:

	node -v

Saída:
	
	v0.10.25

### NPM
Instalação

	sudo apt­-get install npm

Teste para ver se a instalação foi um sucesso:
	
	npm -v

Saída:

	1.3.10

### Bower
	sudo npm install ­-g bower

Teste para ver se a instalação foi um sucesso:

	bower -v

Saída:

	1.5.2