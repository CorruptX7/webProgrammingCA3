
        <nav>
            <ul>
                <!-- display links for all roles -->
                <?php foreach($roles as $role) : ?>
                <li>
                    <a href="?role_id=<?php 
                              echo $role['clan_roleID']; ?>">
                        <?php echo $role['roleName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

