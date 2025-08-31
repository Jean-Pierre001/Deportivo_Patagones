# Deportivo_Patagones
Proyecto de la Escuela Tecnica N°1 de Carmen de Patagones, donde se busca crear un sitio web de ventas de productos deportivos 

## 👤 Creación de cuentas de usuario (SQL)

Para poder iniciar sesión en el sistema es necesario insertar cuentas en la tabla `users` mediante **SQL** desde **phpMyAdmin**.

---

### 🔹 Insertar un usuario administrador
1. Abrir **phpMyAdmin**.
2. Seleccionar la base de datos del proyecto.
3. Ir a la pestaña **SQL**.
4. Ejecutar el siguiente comando:

```sql
INSERT INTO users (username, password, role)
VALUES ('admin', SHA2('123', 256), 'admin');
