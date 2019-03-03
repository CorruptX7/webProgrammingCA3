<?php include '../view/header.php'; ?>
<main>

    <h1>Army List</h1>

    <section>
        <!-- display a table of members -->
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Rating</th>
                
            </tr>
            <?php foreach ($armies as $army) : ?>
                <tr>
                    <td><?php echo $army['armyName']; ?></td>
                    <td><?php echo $army['armyDesc']; ?></td>
                    <td><?php echo $army['armyRating']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p><a href="?action=list_army">Add Armies</a></p>
        <p><a href="../index.php">Back</a></p>

    </section>

</main>
<?php include '../view/footer.php'; ?>