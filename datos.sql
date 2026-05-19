
-- INSERTS USERS
INSERT INTO users
    (name, email, password, created_at, updated_at)
VALUES
    ('Carlos Pérez', 'carlos@gmail.com', '$2a$12$/Oe0g0Ln4PKlm2tC9Fc3l.7Nz9q6be2vjAPyGIbTPBKLpCm/VtkiC', '2026-05-18 10:00:00', '2026-05-18 10:00:00'),
    ('Ana López', 'ana@gmail.com', '$2a$12$/Oe0g0Ln4PKlm2tC9Fc3l.7Nz9q6be2vjAPyGIbTPBKLpCm/VtkiC', '2026-05-18 10:05:00', '2026-05-18 10:05:00'),
    ('Miguel Torres', 'miguel@gmail.com', '$2a$12$/Oe0g0Ln4PKlm2tC9Fc3l.7Nz9q6be2vjAPyGIbTPBKLpCm/VtkiC', '2026-05-18 10:10:00', '2026-05-18 10:10:00');

-- INSERTS VIDEOJUEGOS
INSERT INTO videojuegos
    (nombre, descripcion, cantidad, activo, precio_unitario, categoria, created_at, updated_at)
VALUES
    ('FIFA 25', 'Juego de fútbol', 20, 1, 59.99, 'Deportes', '2026-05-18 11:00:00', '2026-05-18 11:00:00'),
    ('Call of Duty', 'Juego de disparos', 15, 1, 69.99, 'Acción', '2026-05-18 11:05:00', '2026-05-18 11:05:00'),
    ('Minecraft', 'Juego de construcción', 30, 1, 29.99, 'Aventura', '2026-05-18 11:10:00', '2026-05-18 11:10:00'),
    ('The Witcher 3', 'Juego RPG de fantasía', 10, 1, 49.99, 'RPG', '2026-05-18 11:15:00', '2026-05-18 11:15:00');

INSERT INTO ventas
    (videojuego_id, user_id, cantidad, precio_venta, subTotal, porcentajeIva, iva, total, created_at, updated_at)
VALUES
    (1, 1, 1, 59.99, 59.99, 13.00, 7.80, 67.79, '2026-05-18 12:00:00', '2026-05-18 12:00:00'),
    (2, 2, 2, 69.99, 139.98, 13.00, 18.20, 158.18, '2026-05-18 12:10:00', '2026-05-18 12:10:00'),
    (3, 3, 3, 29.99, 89.97, 13.00, 11.70, 101.67, '2026-05-18 12:20:00', '2026-05-18 12:20:00'),
    (4, 1, 1, 49.99, 49.99, 13.00, 6.50, 56.49, '2026-05-18 12:30:00', '2026-05-18 12:30:00');