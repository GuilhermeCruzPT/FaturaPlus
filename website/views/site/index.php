<div class="header">
    <div class="inner-header flex">
        <img class="img-fit" src="<?= DIRIMG ?>FaturaPlus_Oficial.png" alt="<?= APP_NAME ?>">
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
                O melhor programa de faturação do mercado! Tenha tudo na ponta dos dedos para criar a sua fatura.
                Com o Fatura Plus terá mais facilidade de encontrar os seus clientes e associar os produtos para uma faturação
                mais rápida.
            </p>
        </div>
        <div class="col-md-4 text-center">
            <div class="img-fluid logo">
                <img class="rounded-circle img-fit" src="<?= DIRIMG ?>FaturaPlus.png" alt="<?= APP_NAME ?>" title="<?= APP_NAME ?>" >
            </div>
        </div>
    </div>
</div>


<section class="about-section">
    <div class="container p-5">
        <a name="about" id="about"><h1 class="text-center">Sobre Nós</h1></a><br><hr><br><br>
        <div class="row">
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="title">------------------------</span>
                        <h2>Somos Líderes no <br> Mercado de Faturação <br> Deste 2007</h2>
                    </div>
                    <div class="text">Apesar de só existir no mercado com a marca Fatura Plus desde 2007,
                        a qualidade, caraterísticas inovadoras e os elevados padrões de performance fazem
                        com que actualmente o nosso programa seja conhecido e reconhecido por clientes, parceiros
                        e concorrentes como líder no segmento do software de faturação online em Portugal.</div>
                    <ul class="list-style-one">
                        <li><i class='bx bxs-chevrons-right bx-tada' ></i><span>Simples</span></li>
                        <li><i class='bx bxs-chevrons-right bx-tada' ></i><span>Seguro</span></li>
                        <li><i class='bx bxs-chevrons-right bx-tada' ></i><span>Acessível</span></li>
                    </ul>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                    <figure class="image-1"><img src="<?= DIRIMG ?>mockup1.PNG" alt=""></figure>
                    <figure class="image-2"><img src="<?= DIRIMG ?>mockup2.PNG" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>