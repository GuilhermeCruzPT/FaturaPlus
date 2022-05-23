
<div class="header">
    <div class="inner-header flex">
        <img class="img-fit" src="<?= DIRPAGE ?>public/img/FaturaPlus_Oficial.png" alt="<?= APP_NAME ?>">
    </div>

    <!--Waves Container-->
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <!--Waves end-->
</div>

<div class="container p-5">
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-5"><?= APP_NAME ?> é a melhor empresa de faturação do mundo!</h1>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type
                book. It has survived not only five centuries, but also the leap into electronic
                typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
        <div class="col-md-4 text-center">
            <div class="img-fluid logo">
                <img class="rounded-circle img-fit" src="<?= DIRPAGE ?>public/img/FaturaPlus.png" alt="<?= APP_NAME ?>" title="<?= APP_NAME ?>" >
            </div>
        </div>
    </div>
</div>


<!--<a href="http://localhost/pws_202122/MVCTemplate/router.php?c=site&a=show">Show()</a>-->
<a href="<?= APP_BASE_URL ?>?c=site&a=show">Show()</a>

