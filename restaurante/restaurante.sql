CREATE TABLE cliente(id_cliente int PRIMARY KEY AUTO_INCREMENT, tipo_cliente varchar(30) not null);

CREATE TABLE mesa(id_mesa int PRIMARY KEY AUTO_INCREMENT,
tema varchar(100) not null, disponivel tinyint not null);

CREATE TABLE cliente_cadastrado(id_cadastrado int NOT null,
CONSTRAINT FOREIGN KEY (id_cadastrado) REFERENCES cliente(id_cliente),
nome varchar(255) NOT null, telefone varchar(9) NOT null);

CREATE TABLE cliente_generico(id_generico int not null,
CONSTRAINT FOREIGN KEY (id_generico) REFERENCES cliente(id_cliente),
descricao varchar(500) NOT null);

CREATE TABLE conta(id_conta int PRIMARY KEY AUTO_INCREMENT,
id_cliente int NOT null, CONSTRAINT FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
id_mesa int NOT null, CONSTRAINT FOREIGN KEY (id_mesa) references mesa(id_mesa),
data_conta datetime NOT null, valor double NOT null, aberta tinyint not null);

INSERT INTO `mesa` (`id_mesa`, `tema`, `disponivel`) VALUES (NULL, 'Italiana', '1'), (NULL, 'Alemã', '1'), (NULL, 'Brasileira', '1'), 
(NULL, 'Francesa', '1'), (NULL, 'Japonesa', '1');

CREATE table cardapio(cod_cardapio int PRIMARY KEY AUTO_INCREMENT,
preco double not null, nome_cardapio varchar(255) not null);

CREATE TABLE pedido(id_pedido int PRIMARY KEY AUTO_INCREMENT, id_cliente int NOT null,
id_conta int not null, cod_cardapio int NOT null,
CONSTRAINT FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
CONSTRAINT FOREIGN KEY (id_conta) REFERENCES conta(id_conta),
CONSTRAINT FOREIGN KEY (cod_cardapio) REFERENCES cardapio(cod_cardapio));

CREATE TABLE lote(cod_lote int PRIMARY KEY AUTO_INCREMENT, data_entrada datetime not null,
local_armazenado varchar(255) NOT null, preco_lote double NOT null,
validade_prod datetime NOT null, fornecedor varchar(255) not null);

CREATE TABLE produto(cod_produto int PRIMARY KEY AUTO_INCREMENT,
nome_prod varchar(255) not null, qtd_prod double not null, tipo_prod varchar(255) NOT null,
cod_lote int NOT null, CONSTRAINT FOREIGN KEY (cod_lote) REFERENCES lote(cod_lote));

CREATE TABLE materia_prima(cod_matprim int null, medida varchar(255) not null,
CONSTRAINT FOREIGN KEY (cod_matprim) REFERENCES produto(cod_produto));

CREATE TABLE industrializado(cod_indus int null, tipo_beb varchar(255) not null,
armazenamento varchar(255) NOT null, CONSTRAINT FOREIGN KEY (cod_indus) REFERENCES produto(cod_produto));

CREATE TABLE ingrediente(cod_cardapio int not null, nome_ing varchar(255) not null,
qtd_ing double not null, tempo_preparo time not null, cod_produto int not null,
CONSTRAINT FOREIGN KEY (cod_cardapio) REFERENCES cardapio(cod_cardapio),
CONSTRAINT FOREIGN KEY (cod_produto) REFERENCES produto(cod_produto));
