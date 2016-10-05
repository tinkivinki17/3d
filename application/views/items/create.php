<?php require_once('/../header.php'); ?>

<form class="subject-card" enctype="multipart/form-data" method="POST">
    <div class="flex">
        <div class="image">
            <img src="/upload/noimg.jpg">
            <input type="file" name="image">
        </div>
        <div class="names">
            <div class="label">
                <label for="name">Название</label>
                <input type="text" name="name" id="name">
                <?php if ($this->form_validation->error('name')) { ?>
                    <div class="error"><?php echo $this->form_validation->error('name') ?></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="label">
        <label for="comment">Комментарий</label>
        <textarea name="comment" id="comment"></textarea>
        <?php if ($this->form_validation->error('name')) { ?>
            <div class="error"><?php echo $this->form_validation->error('comment') ?></div>
        <?php } ?>
    </div>

    <input class="button" type="submit" value="Сохранить">
</form>

<?php require_once('/../footer.php'); ?>