<?php
require_once 'connection.php';

// Get all users
try {
    $stmt = $pdo->query("SELECT * FROM profile_users ORDER BY id DESC");
    $users = $stmt->fetchAll();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!-- Display Users -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?= htmlspecialchars($user['id']) ?></td>
        <td><?= htmlspecialchars($user['fname']) ?></td>
        <td><?= htmlspecialchars($user['sname']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= htmlspecialchars($user['phonenumber']) ?></td>
        <td>
            <a href="update.php?id=<?= $user['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>