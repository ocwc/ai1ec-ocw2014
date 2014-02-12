<?php
	$post_id = $event->post->ID;
?>

<?php if ( get_field('event_speaker') ) : ?>
	<h3 class="speakers">Speaker(s): <?php the_field('event_speaker'); ?></h3>
<?php endif; ?>

<?php 
	$date = $event->get_timespan_html(); 
	$date_split = explode(' @ ', $date);
?>

<?php if ( get_field('event_room') ) : ?>
	<h4 class="room"><?php echo get_field_object('event_room')['choices'][get_field('event_room')] ?>, <?php echo $date_split[0]; ?></h4>
<?php else : ?>
	<h4 class="room"><?php echo $date_split[0]; ?></h4>
<?php endif; ?>


<?php $event_categories = wp_get_object_terms($post_id, 'events_categories'); ?>
<?php $event_tags = wp_get_object_terms($post_id, 'events_tags'); ?>
<?php foreach($event_categories as $c) : ?>
	<?php if ( $event_tags ) : ?>
		<h4 class="track">Track: <?php echo $c->name; ?>, <?php echo $event_tags[0]->name; ?></h4>
	<?php else : ?>
 		<h4 class="track">Track: <?php echo $c->name; ?></h4>
 	<?php endif; ?>
<?php endforeach; ?>

<br /><br />


