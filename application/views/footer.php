<div class="modal fade" id="suggestVideo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Suggest video</h4>
      </div>
      <div class="modal-body">
      	<div class="alert alert-success submit-success">Thank you for suggesting a video and being part of Gagllery. We will check your submission within 24 hours. Please do submit more cool videos.</div>
		<?php echo form_open("index/suggestion", array("id" => "suggestion")); ?>
      	<div class="form-group">
        	<label for="name">Full Name</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" id="name" class="form-control" name="name" required autofocus/>
            </div>
        </div>
      	<div class="form-group">
        	<label for="email">Email Address</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input type="email" id="email" class="form-control" name="email" required/>
            </div>
            <small>We will email you once we approved your suggestion.</small>
        </div>
      	<div class="form-group">
        	<label for="link">Youtube URL</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                <input type="text" id="link" class="form-control" name="link" required/>
            </div>
            <small>We only support youtube videos for now.</small>
        </div>
        <div class="form-group">
        	<label for="title">Title</label>
        	<textarea id="title" class="form-control" name="title"></textarea>
            <small>Optional ( Be creative )</small>
        </div>
        <div class="form-group">
        	<label for="desc">Description</label>
        	<textarea id="desc" class="form-control" name="desc"></textarea>
            <small>Optional ( Be creative )</small>
        </div>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-success">
            <input type="radio" name="nsfw" value="0" required> SAFE
          </label>
          <label class="btn btn-danger">
            <input type="radio" name="nsfw" value="1" required> NSFW
          </label>
        </div>
        <br /><br />
        <div class="error-handler"></div>
        <div class="form-group">
        	<button type="submit" class="btn btn-info btn-sm pull-right suggest-btn">Submit</button>
        </div>
        <div class="clearfix"></div>
		</form>
      </div>
    </div>
  </div>
</div>
<footer>
	<p class="text-center">
    <a class="text-info" href="<?php echo base_url(); ?>privacy">Privacy</a> &nbsp; 
    <a class="text-info" href="https://docs.google.com/forms/d/1wPygbw3hlOimMTF4rpBQe6hYqxL2qCDlgeRX7ubaVbY/viewform" target="_blank">Send Feedback</a>
    </p>
    <p class="text-muted text-center">Gagllery.com &copy; 2014</p>
</footer>
<?php include(__DIR__ . "/includes/scripts.php"); ?>