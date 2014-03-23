<?php include(__DIR__ . "/../header.php"); ?>

<section class="youtube-form">
    <div class="container">
        <div class="row">
        <div class="col-md-4 col-md-offset-4">
        	<?php echo form_open("admin/process", array("role" => "form")); ?>
            	<div class="form-group">
                	<label for="youtube-id">Youtube ID</label>
                    <div class="input-group">
                    	<input type="text" id="youtube-id" class="form-control" name="hash" required autofocus/>
                    	<span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                    </div>
                </div>
            	<div class="form-group">
                	<label for="youtube-title">Cusom Title</label>
					<textarea id="youtube-title" class="form-control" name="sub_title" required></textarea>
                </div>
            	<div class="form-group">
                	<label for="youtube-desc">Cusom Descriptions</label>
                    <textarea id="youtube-desc" class="form-control" name="sub_descriptions" required></textarea>
                </div>
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-success">
                    <input type="radio" name="nsfw" value="0"> SFW
                  </label>
                  <label class="btn btn-danger">
                    <input type="radio" name="nsfw" value="1"> NSFW
                  </label>
                </div>
                <br/>
                <div class="clearfix"></div>
                <div class="form-group">
                	<button type="submit" class="btn btn-primary btn-sm pull-right">
                    <span class="fa fa-heart"></span> &nbsp; Add to Gagllery</button>
                </div>
            <?php echo form_close(); ?>
		</div>
		</div>
        </div>
	</div>
</section>

<?php include(__DIR__ . "/../footer.php"); ?>