CREATE DATABASE IF NOT EXISTS user_auth_db;

-- Use the newly created database
USE user_auth_db;

-- Create the users table
CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       full_name VARCHAR(50) UNIQUE NOT NULL,
                       email VARCHAR(100) UNIQUE NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       is_active BOOLEAN DEFAULT true,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE monitors (
                          id INT AUTO_INCREMENT PRIMARY KEY,        -- Identificador único y autoincremental
                          url VARCHAR(255) NOT NULL,                 -- URL, máximo 255 caracteres
                          state TINYINT(1) NOT NULL,                 -- Estado del monitor, ahora como TINYINT (0 o 1 o cualquier valor entero pequeño)
                          timedown DATETIME,                         -- Hora de caída (cuando el monitor está caído)
                          timeup DATETIME,                           -- Hora de recuperación (cuando el monitor está activo de nuevo)
                          user_id INT,                               -- ID del usuario asociado (esto puede ser una clave foránea)
                          monitor_interval INT,                      -- Intervalo de monitoreo (en segundos, por ejemplo)
                          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación, por defecto la hora actual
                          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Fecha de actualización, se actualiza automáticamente

                          FOREIGN KEY (user_id) REFERENCES users(id) -- Relación con la tabla 'users' (esto depende de tu estructura)
);
