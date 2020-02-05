<?php $this->layout('layouts/writeLayout' ,['tab' => 'story']) ?>


<div>
    <label for="title">Post title</label>
    <input type="text" name="title" id="title-input">
</div>
    
<div id="summernote"></div>
<div id="content"></div>
<br>
<div class="col text-right">
    <button type="button" class="btn btn-outline-secondary" id="submit-story-btn">Submit</button>
</div>