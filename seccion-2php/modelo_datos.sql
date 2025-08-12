-- Modelo de datos: puntos, usuarios y visitas
CREATE TABLE puntos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    direccion VARCHAR(255),
    lat DECIMAL(10,7) NOT NULL,
    lng DECIMAL(10,7) NOT NULL,
    categoria VARCHAR(80),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    email VARCHAR(180) UNIQUE,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE visitas (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    punto_id INT NOT NULL,
    usuario_id INT,
    inicio DATETIME NOT NULL,
    fin DATETIME NULL,
    notas TEXT,
    duracion_seg INT GENERATED ALWAYS AS (
        IF(fin IS NULL, NULL, TIMESTAMPDIFF(SECOND, inicio, fin))
    ) VIRTUAL,
    FOREIGN KEY (punto_id) REFERENCES puntos(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

