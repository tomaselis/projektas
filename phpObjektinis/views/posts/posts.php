
<?php if(count($this->posts)):?>

<div class="post-wrapper">

<?php foreach($this->posts as $post):?>

<div class="post-colum">
    <a href="http://194.5.157.92/phpObjektinis/index.php/post/show/?id=<?php echo $post->id ?>">
    <img src="<?php echo $post->img ?>">
    <h3><?php echo $post->title ?></h3>

</div>

<?php endforeach;?>

</div>
<?php endif; ?>


