<?php
function custom_dashboard_widget() {
	echo "<p>Custom Dashboard Article</p>";
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'Custom Dashboard Title', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');
?>