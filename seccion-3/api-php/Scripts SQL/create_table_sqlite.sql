CREATE TABLE IF NOT EXISTS usuarios (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nombre TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE,
  fecha_registro TEXT NOT NULL
);
CREATE INDEX IF NOT EXISTS idx_fecha ON usuarios (fecha_registro);

