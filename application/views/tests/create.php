<?php require_once('/../header.php'); ?>

<form class="subject-card" enctype="multipart/form-data" method="POST">
    <div class="flex two-col">
        <?php if (!empty($subjects)) { ?>
            <div class="label">
                <label for="subject_id">Испытуемый</label>
                <select name="subject_id">
                    <?php foreach ($subjects as $subject) { ?>   
                        <option value="<?php echo $subject->id ?>"><?php echo $subject->name . ' ' . $subject->sname ?></option>
                    <?php } ?>
                </select>
            </div>
        <?php } ?>

        <?php if (!empty($subjects)) { ?>
            <div class="label">
                <label for="item_id">Тестовый предмет</label>
                <select name="item_id">
                    <?php foreach ($items as $item) { ?>   
                        <option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
                    <?php } ?>
                </select>
            </div>
        <?php } ?>
    </div>

    <div class="label">
        <label for="comment">Файл с данными (CSV)</label>
        <input type="file" name="csv">
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