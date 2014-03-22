<?php include(__DIR__ . "/../header.php"); ?>

<section class="youtube-form">
    <div class="container">
        <div class="row">
        <div class="col-md-4 col-md-offset-4">
        	<?php echo form_open("admin/process", array("role" => "form")); ?>
            	<div class="form-group">
                	<label for="youtube-id">Youtube ID</label>
                    <input type="text" id="youtube-id" class="form-control" name="hash"/>
                </div>
            	<div class="form-group">
                	<label for="youtube-title">Cusom Title</label>
                    <input type="text" id="youtube-title" class="form-control" name="sub_title"/>
                </div>
            	<div class="form-group">
                	<label for="youtube-desc">Cusom Descriptions</label>
                    <textarea id="youtube-desc" class="form-control" name="sub_descriptions"></textarea>
                </div>
            <?php echo form_close(); ?>
		</div>
		</div>
        </div>
	</div>
</section>

<?php include(__DIR__ . "/../footer.php"); ?>