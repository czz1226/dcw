<?php only_admin_access(); ?>

<?php
$template_id = $params['data-template_id'];
$template = newsletter_get_template(array("id"=>$template_id));
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>GrapesJS Demo - Free Open Source Newsletter Editor</title>
     	 <script type="text/javascript">
    mw.require("<?php print $config['url_to_module'];?>css/grapes.min.css");
    mw.require("<?php print $config['url_to_module'];?>js/grapes.min.js");
    </script>
    
	<style type="text/css">
	 body,
      html {
        height: 100%;
        margin: 0;
      }
	.gjs-pn-panel {
     height: 42px;
    }
    
	</style>
  </head>

  <body>
 

    <textarea id="gjs" style="height:0px; overflow:hidden;">
    <?php print $template['text']; ?>
	</textarea>
	
	<style>
	body{
		background:#000 !important;
	}
	.mw_modal_container {
        padding: 0px !important;
    }
	</style>
      
   <script type="text/javascript">
      var editor = grapesjs.init({
        showOffsets: 1,
        noticeOnUnload: 0,
        container: '#gjs',
        height: '100%',
        fromElement: true,
        storageManager: { autoload: 0 },
        styleManager : {
          sectors: [{
              name: 'General',
              open: false,
              buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom']
            },{
              name: 'Dimension',
              open: false,
              buildProps: ['width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
            },{
              name: 'Typography',
              open: false,
              buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-shadow'],
            },{
              name: 'Decorations',
              open: false,
              buildProps: ['border-radius-c', 'background-color', 'border-radius', 'border', 'box-shadow', 'background'],
            },{
              name: 'Extra',
              open: false,
              buildProps: ['transition', 'perspective', 'transform'],
            }
          ],
        },
      });
      </script>
  </body>
</html>


