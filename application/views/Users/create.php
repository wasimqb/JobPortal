<!-- <h2><?php echo $title; ?></h2> -->

<?php echo validation_errors(); ?>

<form action="create" method="post">

    <label for="title">Name</label>
    <input type="input" name="name" /><br />

    <label for="text">Address</label>
    <input type="input" name="address" /><br />

    <input type="submit" name="submit" value="Create user" />

</form>