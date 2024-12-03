CREATE TABLE plato (
    id_Plato INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT(500) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cliente (
    id_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    telefono INT NOT NULL,
    correo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE ventas (
    id_Venta INT AUTO_INCREMENT PRIMARY KEY,
    Id_empleado INT NOT NULL,
    id_cliente INT NOT NULL,
    fechaVenta VARCHAR(50) NOT NULL,
    IdPlato INT NOT NULL,
    Total_Venta DECIMAL(10,2) NOT NULL,
    Descripcion VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE empleados (
    id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono INT NOT NULL,
    correo VARCHAR(100) NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    fecha_ingreso VARCHAR(50) NOT NULL,
    hora_llegada VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE RESERVA (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    fecha_reserva VARCHAR(50) NOT NULL,
    numero_personas INT NOT NULL,
    hora_llegada VARCHAR(50) NOT NULL,
    hora_salida VARCHAR(50) NOT NULL,
    mesaID INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    platoid INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    precioTotal INT NOT NULL,
    stock INT NOT NULL,
    cantidad INT NOT NULL,
    image VARCHAR(255)
);