<script>
var config = {
	doc      : $(document),
	base_url : "<?php echo base_url() ?>",
	cookie   : "<?php echo $this->security->get_csrf_hash(); ?>",
	yt_id    : $(".youtube-id").data("id")
}
</script>