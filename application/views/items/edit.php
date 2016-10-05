<?php require_once('/../header.php'); ?>

<form class="subject-card" enctype="multipart/form-data" method="POST">
    <div class="flex">
        <div class="image">
            <?php if(file_exists(getcwd() . "/upload/<?php echo $this->module_name ?>/images/{$item->id}.jpg")) { ?>
                <img src="/upload/<?php echo $this->module_name ?>/images/<?php echo $item->id ?>.jpg">
            <?php } else { ?>
                <img src="/upload/noimg.jpg">
            <?php } ?>
            <input type="file" name="image">
        </div>
        <div class="names">
            <div class="label">
                <label for="name">Название</label>
                <input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $item->name ?>">
                <?php if ($this->form_validation->error('name')) { ?>
                    <div class="error"><?php echo $this->form_validation->error('name') ?></div>
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