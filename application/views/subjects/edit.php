<?php require_once('/../header.php'); ?>

<form class="subject-card" enctype="multipart/form-data" method="POST">
    <div class="flex">
        <div class="image">
            <?php if(file_exists(getcwd() . "/upload/subjects/images/{$item->id}.jpg")) { ?>
                <img src="/upload/subjects/images/<?php echo $item->id ?>.jpg">
            <?php } else { ?>
                <img src="/upload/noimg.jpg">
            <?php } ?>
            <input type="file" name="image">
        </div>
        <div class="names">
            <div class="label">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $item->name ?>">
                <?php if ($this->form_validation->error('name')) { ?>
                    <div class="error"><?php echo $this->form_validation->error('name') ?></div>
                <?php } ?>
            </div>

            <div class="label">
                <label for="sname">Фамилия</label>
                <input type="text" name="sname" id="sname" value="<?php echo isset($_POST['sname']) ? $_POST['sname'] : $item->sname ?>">
                <?php if ($this->form_validation->error('sname')) { ?>
                    <div class="error"><?php echo $this->form_validation->error('sname') ?></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="label">
        <label for="comment">Комментарий</label>
        <textarea name="comment" id="comment"><?php echo isset($_POST['comment']) ? $_POST['comment'] : $item->comment ?></textarea>
        <?php if ($this->form_validation->error('name')) { ?>
            <div class="error"><?php echo $this->form_validation->error('comment') ?></div>
        <?php } ?>
    </div>

    <input class="button" type="submit" value="Сохранить">
</form>

<?php require_once('/../footer.php'); ?>