# Desarrollo Web en Entorno Servidor (DWES)

Este repositorio contiene todo el material de la asignatura **Desarrollo Web en Entorno Servidor** (backend), incluyendo ejercicios, prácticas y exámenes realizados durante el curso.

## 📋 Contenido del Repositorio

- **Ejercicios por tema**: Resolución de ejercicios organizados según los temas del temario
- **Prácticas**: Proyectos prácticos más completos que integran diferentes conceptos
- **Exámenes**: Resoluciones de exámenes y pruebas de evaluación
- **Material de apoyo**: Ejemplos de código y recursos adicionales

## 🛠️ Tecnologías Utilizadas

- **PHP**: Lenguaje de programación del lado del servidor
- **MySQL**: Sistema de gestión de bases de datos
- **Apache**: Servidor web (mediante XAMPP/LAMPP)
- **HTML/CSS/JavaScript**: Para el frontend cuando sea necesario

## 📥 Instalación y Uso

### Clonar el repositorio

Puedes clonar este repositorio usando SSH o HTTPS:

```bash
# Con SSH
git clone git@github.com:sfloresdev/DWES.git nombre-carpeta

# Con HTTPS
git clone https://github.com/sfloresdev/DWES.git nombre-carpeta
```

### Configuración del entorno

1. **Instala XAMPP/LAMPP** en tu sistema si aún no lo tienes
2. **Copia los archivos** del repositorio en la carpeta `htdocs` de tu instalación de XAMPP/LAMPP:
   ```bash
   cp -r nombre-carpeta /ruta/a/xampp/htdocs/
   ```
3. **Inicia los servicios** de Apache y MySQL desde el panel de control de XAMPP
4. **Accede desde el navegador** a `http://localhost/nombre-carpeta`

### Configuración de la base de datos

Si algún proyecto requiere base de datos:
1. Accede a phpMyAdmin: `http://localhost/phpmyadmin`
2. Importa los archivos `.sql` que encuentres en las carpetas de prácticas
3. Verifica la configuración de conexión en los archivos PHP

## ⚠️ Aviso Importante

Este repositorio es **público** con fines educativos. Está disponible para:
- Consultar soluciones y enfoques diferentes
- Aprender de ejemplos prácticos
- Usar como referencia para estudiar

### Sobre el uso responsable

**NO me hago responsable del mal uso de este material.** Este código está aquí para ayudar a aprender, no para copiar y pegar sin entenderlo. 

Si eres estudiante:
- ✅ Úsalo para **comparar** tu solución con otras alternativas
- ✅ Úsalo para **aprender** nuevas técnicas o enfoques
- ✅ Úsalo como **referencia** cuando estés atascado
- ❌ **NO lo copies** directamente sin entender el código

El verdadero aprendizaje viene de enfrentarte a los problemas, equivocarte y encontrar tus propias soluciones. Animo! 🤓☺️

## 📂 Estructura del Repositorio

```
DWES/
├── tema-1/
│   ├── ejercicio-1/
│   ├── ejercicio-2/
│   └── ...
├── tema-2/
│   └── ...
├── practicas/
│   ├── practica-1/
│   ├── practica-2/
│   └── ...
├── examenes/
│   ├── examen-1/
│   └── ...
└── README.md
```
---

**Recuerda**: El objetivo es aprender, no solo aprobar. Buena suerte! 💪
