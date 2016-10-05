<?php require_once('/../header.php'); ?>

<div class="items-list">
    <div class="item">
        <a href="/<?php echo $this->module_name ?>/create/" class="create-button">Добавить новую запись</a>
    </div>

    <?php if (!empty($items)) { ?>
        <?php foreach ($items as $item) { ?>
            <div class="item flex">
                <div class="image">
                    <?php if (file_exists(getcwd() . "/upload/{$this->module_name}/images/{$item->id}.jpg")) { ?>
                        <img src="/upload/<?php echo $this->module_name ?>/images/<?php echo $item->id ?>.jpg">
                    <?php } else { ?>
                        <img src="/upload/noimg.jpg">
                    <?php } ?>
                </div>
                
                <div class="data">
                    <div class="name">
                    <span><?php echo $item->name ?></span>
                </div>
                    <div class="buttons">
                        <a href="/<?php echo $this->module_name ?>/edit/<?php echo $item->id ?>">Редактировать</a>
                        <a href="/<?php echo $this->module_name ?>/delete/<?php echo $item->id ?>">Удалить</a>
                    </div>
                </div>
            </div>    
        <?php } ?>
    <?php } ?>
</div>

<?php require_once('/../footer.php'); ?>