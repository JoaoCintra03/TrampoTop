CREATE TABLE compras ( id INT AUTO_INCREMENT PRIMARY KEY, ativo VARCHAR(10) NOT NULL, quantidade INT NOT NULL, valor_unitario DECIMAL(10,2) NOT NULL, data_compra DATE NOT NULL );

CREATE TABLE dividendos ( id INT AUTO_INCREMENT PRIMARY KEY, ativo VARCHAR(10) NOT NULL, valor DECIMAL (10,2) NOT NULL, data_recebimento DATE NOT NULL );
