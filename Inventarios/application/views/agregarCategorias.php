<h2>Lista de Categorías</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?php echo $categoria['id']; ?></td>
                <td><?php echo $categoria['nombre']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
