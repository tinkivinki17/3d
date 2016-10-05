<?php require_once('/../header.php'); ?>

<div class="items-list">
    <div class="item">
        <a href="/subjects/create/" class="create-button">Добавить новую запись</a>
    </div>

    <?php if(!empty($items)) { ?>
        <?php foreach($items as $item) { ?>
            <div class="item flex">
                <div class="image"><img src="/upload/subjects/images/<?php echo $item->id ?>.jpg"></div>
                
                <div class="data">
                    <div class="name">
                    <span><?php echo $item->name ?></span> 
                    <?php echo $item->sname ?>
                </div>
                    <div class="buttons">
                        <a href="/subjects/edit/<?php echo $item->id ?>">Редактировать</a>
                        <a href="/subjects/delete/<?php echo $item->id ?>">Удалить</a>
                    </div>
                </div>
            </div>    
        <?php } ?>
    <?php } ?>
</div>

<?php require_once('/../footer.php'); ?>