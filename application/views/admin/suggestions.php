<?php include(__DIR__ . "/../header.php"); ?>
<?php
	$nsfw = array("Safe", "NSFW");
?>
<section class="suggestion-form">
    <div class="container">
    <div class="row">
    <div class="col-xs-12">
    	<table class="table table-striped table-hover">
        	<thead>
            	<tr>
                	<th>Name</th>
                    <th>Email</th>
                    <th>Hash</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>NSFW</th>
                    <th>Actions</th>
                </tr>
            </thead>

			<tbody>
            <?php foreach($suggestions as $suggest) { ?>
            	<tr>
                	<td><?php echo $suggest->full_name; ?></td>
                    <td><?php echo $suggest->email; ?></td>
                    <td><?php echo $suggest->link; ?></td>
                    <td title="<?php echo $suggest->title; ?>"><?php echo substr($suggest->title, 0, 25); ?></td>
                    <td title="<?php echo $suggest->description; ?>"><?php echo substr($suggest->description, 0, 25); ?></td>
                    <td title="<?php echo $suggest->nsfw; ?>"><?php echo $nsfw[$suggest->nsfw]; ?></td>
                    <td>
                        <a href="#" class="btn btn-default btn-xs edit-suggest" data-toggle="modal" data-target="#suggestVideo" 
                        data-id="<?php echo $suggest->suggestion_id; ?>">
                        <span class="fa fa-pencil"></span>&nbsp;Edit</a>
                    	<a href="<?php echo base_url(); ?>admin/accept/<?php echo $suggest->suggestion_id; ?>" 
                        class="btn btn-success btn-xs">
                        <span class="fa fa-check"></span>&nbsp;Accept</a>
                        <a href="<?php echo base_url(); ?>admin/disapprove/<?php echo $suggest->suggestion_id; ?>" 
                        class="btn btn-danger btn-xs">
                        <span class="fa fa-times"></span>&nbsp;Disapprove</a>
                    </td>
                </tr>
			<?php } ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
	</div>
</section>

<?php include(__DIR__ . "/../footer.php"); ?>