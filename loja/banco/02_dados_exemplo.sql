-- 02_dados_exemplo.sql
-- Dados de teste para a loja. Rode DEPOIS do 01_criar_tabelas.sql.
-- No SQLite Portable: aba Executar SQL > cole tudo > Executar > Escrever modificações (Ctrl+S).

-- Clientes
INSERT INTO cliente (nome, email, telefone, cidade) VALUES
('Ana Souza', 'ana.souza@email.com', '(11) 98765-4321', 'São Paulo'),
('Bruno Lima', 'bruno.lima@email.com', '(11) 97654-3210', 'Osasco'),
('Carla Mendes', 'carla.mendes@email.com', '(11) 96543-2109', 'Barueri'),
('Diego Santos', 'diego.santos@email.com', '(11) 95432-1098', 'Carapicuíba'),
('Eduarda Rocha', 'eduarda.rocha@email.com', '(11) 94321-0987', 'Santana de Parnaíba'),
('Fernanda Alves', 'fernanda.alves@email.com', '(11) 93210-9876', 'Cotia');

-- Produtos (as imagens são links da internet; depois você pode trocar)
INSERT INTO produto (nome, descricao, preco, imagem) VALUES
('Notebook 15 polegadas',
 '8 GB de memória, SSD de 256 GB e tela Full HD.',
 3499.90,
 'https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Laptop/3D/laptop_3d.png'),
('Smartphone 128 GB',
 'Tela de 6,5 polegadas e câmera dupla.',
 1899.90,
 'https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Mobile%20phone/3D/mobile_phone_3d.png'),
('Fone de Ouvido Bluetooth',
 'Até 20 horas de bateria e cancelamento de ruído.',
 249.90,
 'https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Headphone/3D/headphone_3d.png'),
('Teclado Gamer',
 'Teclas com iluminação colorida, padrão ABNT2.',
 189.90,
 'https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Keyboard/3D/keyboard_3d.png'),
('Câmera Digital',
 '24 megapixels e gravação em Full HD.',
 2199.00,
 'https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Camera/3D/camera_3d.png'),
('Relógio Inteligente',
 'Conta passos, mede batimentos e mostra notificações.',
 599.90,
 'https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Watch/3D/watch_3d.png'),
('Mochila para Notebook',
 'Bolso acolchoado para notebook de até 15,6 polegadas.',
 159.90,
 'https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Backpack/3D/backpack_3d.png'),
('Smart TV 50 polegadas',
 'Resolução 4K e aplicativos de streaming.',
 2799.00,
 'https://raw.githubusercontent.com/microsoft/fluentui-emoji/main/assets/Television/3D/television_3d.png');

-- Vendas (valor_total = preço do produto x quantidade)
INSERT INTO venda (cliente_id, produto_id, quantidade, valor_total, data_venda) VALUES
(1, 1, 1, 3499.90, '2026-10-01'),
(2, 3, 2, 499.80, '2026-10-03'),
(3, 2, 1, 1899.90, '2026-10-06'),
(1, 7, 1, 159.90, '2026-10-09'),
(4, 4, 3, 569.70, '2026-10-14'),
(5, 6, 1, 599.90, '2026-10-20');