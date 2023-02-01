<?php
require 'users/users.php';

$users = getUsers();

include 'partials/header.php';
?>


<div class="container d-flex justify-content-center flex-column p-5">
    <p class="text-right">
        <a class="btn btn-success" href="create.php">Create new User</a>
    </p>

    <table class="table">
        <thead>
            <tr>
                <th class="p-2">Image</th>
                <th class="p-2">Name</th>
                <th class="p-2">Username</th>
                <th class="p-2">Email</th>
                <th class="p-2">Website</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td class="p-2">
                        <?php if (isset($user['extension'])) : ?>
                            <img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt="">
                        <?php endif; ?>
                    </td>
                    <td class="p-2"><?php echo $user['name'] ?></td>
                    <td class="p-2"><?php echo $user['username'] ?></td>
                    <td class="p-2"><?php echo $user['email'] ?></td>
                    <td class="p-2">
                        <a target="_blank" href="http://<?php echo $user['website'] ?>">
                            <?php echo $user['website'] ?>
                        </a>
                    </td>
                    <td class="d-flex justify-content-between border-top-0">
                        <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                        <a href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;; ?>
        </tbody>
    </table>
</div>