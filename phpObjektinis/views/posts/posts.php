<?php if (count($this->posts)): ?>

    <div class="post-wrapper">
        <h2>ALL POSTS ON OUR BLOG PAGE</h2>
        <div class="post-row">

                <?php foreach ($this->posts as $post): ?>
            <div class="cellone">
                    <a href="http://194.5.157.92/phpObjektinis/index.php/post/show/<?php echo $post->id ?>">
                    <div class="cell">
                        <img src="<?php echo $post->img ?>">
                    </div>
                    <div class="text">
                        <h3><?php echo $post->title ?></h3>
                    </a>
                        <a href="http://194.5.157.92/phpObjektinis/index.php/post/edit/<?php echo $post->id ?>">EDIT</a>
                        <a href="http://194.5.157.92/phpObjektinis/index.php/post/delete/<?php echo $post->id ?>"
                        onClick="return confirm('Are you sure you want to delete this post: <?php $post->title ?>');">DELETE</a>

            </div>
            </div>
                <?php endforeach; ?>

        </div>
    </div>
<?php endif; ?>

