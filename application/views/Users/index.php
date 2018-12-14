<html>
<body>
<h2><?php echo $title;?></h2>

<?php foreach ($user as $user_item): ?>

        <h3><?php
        echo $user_item['name']; ?></h3>
        <div class="main">
                <?php echo $user_item['address']; ?>
        </div>
        <p><a href="<?php echo site_url('Users/'.$user_item['type']); ?>">Link</a></p>

<?php endforeach; ?>
</body>
</html>