<main class="flex-shrink-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center mt-5">Berita</h2>
            <div class="row">
            <?php foreach ($berita->articles as $data) : ?>
                <div class="col-lg-3 m-4 col-md-12 col-sm-12">
                    <div class="card" style="width: 18rem;">
                        <img src="<?=$data->urlToImage?>" class="card-img-top" alt="">
                            <div class="card-body">
                            <h5 class="card-title"><?=$data->title?></h5>
                            <p class="card-text"><?=$data->description?></p>
                            <a href="<?=$data->url?>" class="btn btn-primary" target="_blank">Lihat Berita</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
      </div>
    </div>
</main>