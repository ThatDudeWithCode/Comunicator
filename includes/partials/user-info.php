<div class="card shadow-custom">
    <div class="card-body">
        <div class="pt-3">
                                <span class="float-left">
                                    <img class="img-fluid border-round" src="<?php echo $user['profile_pic']; ?>" title="<?php echo $user['username']; ?>" alt="" style="width: 60px">
                                </span>
            <span class="float-right">
                                    <h5 class="profile-name" title="<?php echo $user['username']; ?>"><?php echo $user['first_name'] . " " . $user['last_name']; ?></h5>
                <p class="text-sm2 pb-0 mb-0">
                    <span><a href="">Friends 0</a></span>
                    <span> | </span>
                    <span><a href="">Likes <?php echo $user['num_likes']; ?></a></span>
                    <span> | </span>
                    <span><a href="">Posts <?php echo $user['num_posts']; ?></a></span>
                </p>
                                    <p><a class="view-profile mt-0 pt-0" href="<?php echo $user['username']; ?>" title="View <?php echo $user['first_name'] . " " . $user['last_name']; ?>'s Profile">View Profile</a></p>
                                </span>
        </div>
    </div>
</div>
