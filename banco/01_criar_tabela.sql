CREATE TABLE cliente (
    id        INTEGER PRIMARY KEY AUTOINCREMENT,
    nome      TEXT NOT NULL,
    email     TEXT,
    telefone  TEXT,
    cidade    TEXT
);

-- O que a loja vende
CREATE TABLE produto (
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    nome        TEXT NOT NULL,
    descricao   TEXT,
    preco       REAL NOT NULL,
    imagem      TEXT
);

-- Cada venda liga UM cliente a UM produto
CREATE TABLE venda (
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    cliente_id  INTEGER NOT NULL,
    produto_id  INTEGER NOT NULL,
    quantidade  INTEGER NOT NULL,
    valor_total REAL NOT NULL,
    data_venda  TEXT NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES cliente (id),
    FOREIGN KEY (produto_id) REFERENCES produto (id)
);