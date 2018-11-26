<style>
.mw-ui-field-full-width {
	width:100%;
}
.js-danger-text {
	padding-top: 5px;
	color: #c21f1f;
}
</style>


<script type="text/javascript">
function edit_iframe_template(template_id) {
	var modal = mw.tools.open_module_modal('newsletter/edit_template_iframe', {template_id:template_id}, 
			{overlay: true, iframe:true, width:1960,height:1950,  skin: 'simple'});

	console.log(modal);
}

initEditor = function(){
    if(!window.editorLaunced){
        editorLaunced = true;
        mw.editor({
            element:mwd.getElementById('editorAM'),
            hideControls:['format', 'fontsize', 'justifyfull']
        });
    }
};

$(document).ready(function () {

	$(".js-edit-template-form").submit(function(e) {
		
		e.preventDefault(e);
			
		 var errors = {};
         var data = mw.serializeFields(this);

         $.ajax({
	            url: mw.settings.api_url + 'newsletter_save_template',
	            type: 'POST',
	            data: data,
	            success: function (result) {
		            
	                mw.notification.success('<?php _e('Template saved'); ?>');
				       
	                // Reload the modules
	                mw.reload_module('newsletter/templates_list')
	                mw.reload_module_parent('newsletter');

	                $(".js-edit-template-form")[0].reset();
	                
	                list_templates();
	
	            },
				error: function(e) {
					alert('Error processing your request: ' + e.responseText);
				}
	      });
         
	});
	
});
</script>


<form class="js-edit-template-form">
	<div class="mw-ui-field-holder">
		<label class="mw-ui-label"><?php _e('Template title'); ?></label> 
		<input name="title" type="text" value="" class="mw-ui-field mw-ui-field-full-width js-validation js-edit-template-title" />
		<div class="js-field-message"></div>
	</div>
	<div class="mw-ui-field-holder">
		<label class="mw-ui-label"><?php _e('Template design'); ?></label> 
		<br />
		Variables:
		<br />
		{first_name}  , {Last_name} , {email} , {unsubscribe} {site_url} 
		<br />
		
		<button onclick="edit_iframe_template($('.js-edit-template-id').val())" type="button" class="mw-ui-btn" style="float:right;"><?php _e('Edit template'); ?></button>
		
		<textarea id="editorAM" name="text" class="js-edit-template-text" style="border:3px solid #cfcfcf; width:100%;height:500px;margin-top:5px;"></textarea>
		
		 <div class="js-template-design"></div>
		<div class="js-field-message"></div>
	</div>
	<br />
	<button type="submit" class="mw-ui-btn"><?php _e('Save'); ?></button>
	
	<a class="mw-ui-btn mw-ui-btn-icon" href="javascript:;" onclick="delete_template($('.js-edit-template-id').val())"> <span class="mw-icon-bin"></span> </a>
	<input type="hidden" value="0" class="js-edit-template-id" name="id" />
	
</form>