<?php only_admin_access(); ?>

<?php 
if (isset($params['id'])) {
    $campaign = newsletter_get_campaign($params['id']);
}
$list = newsletter_get_list($campaign['list_id']);
$template = newsletter_get_template(array("id"=>$list['success_email_template_id']));
$subscribers = newsletter_get_subscribers_for_list($campaign['list_id']);

var_dump($subscribers);
//var_dump($template);
//var_dump($campaign);
//var_dump($list);
?>

Name: <?php print ($campaign['name']); ?> <br />
Subject: <?php print ($campaign['subject']); ?> <br />
From name: <?php print ($campaign['from_name']); ?> <br />
List id: <?php print ($campaign['list_id']); ?> <br />

<br />
Message:
<br />
<?php 
echo $template['text'];
?>