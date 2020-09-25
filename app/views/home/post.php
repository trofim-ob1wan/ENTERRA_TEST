<? include 'app/views/default/defaultHeader.php'; ?>

<div class="container">
    <div class="row">
        <div class="col d-flex flex-column align-items-center">
            <div class="img-container w-50 mt-4">
                <img class="post-view-image img-fluid" src="/public/img_post/<?php echo $data['id']; ?>.jpg" alt="">
            </div>
            <div class="w-50 mt-4 align-items-left">
                <h2 class="text-center"><?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?></h2>
                <p class="text-center"><?php echo htmlspecialchars($data['date'], ENT_QUOTES); ?></p>
                <p class="text-center"><?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></p>
                <p><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></p>
                
            </div>
            <a class="btn btn-success w-50 mb-4" href="/">Вернуться на главную</a>
        </div>
    </div>
</div>

<? include 'app/views/default/defaultFooter.php';?>