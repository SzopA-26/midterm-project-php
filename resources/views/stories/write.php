<?php $this->layout('layouts/writeLayout', ['tab' => 'stories']) ?>

<form>
    <div class="container">
        <label for="title">Story title</label>
        <input required type="text" name="title" id="title-input" value="<?= $title ?>">
        <input type="hidden" id="post_id" value="<?= $post_id ?>">

        <!-- <div class="col-7">
        <input type="text" class="form-control" name="title" id="title-input" value="<?= $title ?>">
        <input type="hidden" id="post_id" value="<?= $post_id ?>">
        
    </div>
    
    <div class="col">
        </div> -->
        <div id="summernote"><?= $content ?></div>

        <br>
        <br>
        <?php if ($type == 'new') : ?>
            <div class="col text-right">
                <button type="button" class="btn btn-outline-secondary" id="submit-story-btn">Submit</button>
            </div>
        <?php else : ?>
            <div class="col text-right">
                <button type="button" class="btn btn-outline-secondary" id="update-story-btn">Update</button>
            </div>
        <?php endif; ?>
    </div>
</form>