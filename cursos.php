<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Disponibles</title>
    <link rel="stylesheet" href="style.css">
    <script>
        async function cargarCursos() {
            const response = await fetch('backend/cargar_cursos.php');
            const cursos = await response.json();
            const container = document.getElementById('cursos');
            cursos.forEach(curso => {
                const div = document.createElement('div');
                div.className = 'course-card';
                div.innerHTML = `
                    <h2>${curso.nombre}</h2>
                    <p>${curso.descripcion}</p>
                    <p><strong>Duración:</strong> ${curso.duracion}</p>
                    <a href="inscripcion.php?curso_id=${curso.id}">Inscribirse</a>
                `;
                container.appendChild(div);
            });
        }
        window.onload = cargarCursos;
    </script>
</head>
<body>
    <h1>Cursos Disponibles</h1>
    <div class="container" id="cursos">
    </div>
</body>
</html>
